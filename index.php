<?php

require "vendor/autoload.php";

use Aura\Router\RouterContainer;
use ByThePixel\Entities\PullRequest;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
// @todo leverage a container (PHP-DI or PHP League Container)

// create a log channel
$log = new Logger( 'name' );
$log->pushHandler( new StreamHandler( '/srv/logs/git-websockets.log', Logger::NOTICE ) );

$log->warning('Started processing');

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// Routes
// @todo move routes into autoloaded routes.php file
$routerContainer = new RouterContainer();
$map             = $routerContainer->getMap();

// @todo move logic into controller and additional classes
// @todo create tests to mock api requests
$map->post( 'root', '/pullrequest', function ( \Zend\Diactoros\ServerRequest $request ) use($log) {
    $log->notice('Handling Pull Request');

    // @todo inject client into controller
    $client = new \Github\Client();
    $client->authenticate("ef40cff653d841d3df0216137cfeffe6b6d8d939", null, \Github\Client::AUTH_HTTP_TOKEN);

    $githubRequest = \ByThePixel\Factories\RequestFactory::createFromRequest($request);
    $pullRequest = \ByThePixel\Factories\PullRequestFactory::create( $request );

    // Only take action when creating a new pull request
    if( $githubRequest->getAction() !== PullRequest::ACTION_OPENED ) {
        return;
    }

    // Get related issue number from PR head branch name
    preg_match( '/^\d+/', $pullRequest->getHeadBranch()->getRef(), $issueNumbers );
    $issueNumber = $issueNumbers[0];

    // Get the issue related tot he Pull Request
    $response = $client->issue()->show(
        $githubRequest->getOrganization()->getLogin(),
        $pullRequest->getHeadBranch()->getRepository()->getName(),
        $issueNumber
    );
    $issue = \ByThePixel\Factories\IssueFactory::createFromArray($response);

    // If there are no labels for the related issue, exit early
    if(!sizeof($issue->getLabels())) {
        return;
    }

    // Create an array of just label names
    $labels = [ ];
    foreach ($issue->getLabels() as $label) {
        $labels[] = $label->getName();
    }

    // Add labels to PR from related issue
    $client->issue()->labels()->add(
        $githubRequest->getOrganization()->getLogin(),
        $pullRequest->getHeadBranch()->getRepository()->getName(),
        $pullRequest->getNumber(),
        $labels
    );

    // Return early if there are no milestone
    // @todo break this all out into a service as labels would block milestone assignment currently
    if(!$issue->getMilestone()) {
        return;
    }

    $client->issue()->update(
        $githubRequest->getOrganization()->getLogin(),
        $pullRequest->getHeadBranch()->getRepository()->getName(),
        $pullRequest->getNumber(),
        [
            'milestone' => $issue->getMilestone()->getNumber()
        ]
    );

} );

// Match the request to a mapped route
$matcher = $routerContainer->getMatcher();
$route = $matcher->match( $request );
$callable = $route->handler;
$response = $callable( $request );
