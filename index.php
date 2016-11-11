<?php

require "vendor/autoload.php";

use Aura\Router\RouterContainer;
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
    $pullRequest = \ByThePixel\Factories\PullRequestFactory::create( $request );

    $issueNumbers = [ ];
    preg_match( '/^\d+/', $pullRequest->getHeadBranch()->getRef(), $issueNumbers );
    $issueNumber = $issueNumbers[0];

    // @todo inject client into controller
    $client   = new \GuzzleHttp\Client();
    
    // @todo url should be more dynamic, owner and repo should come from $pullRequest
    $response = $client->request( 'GET',
                                  "https://api.github.com/repos/bythepixel/git-webhooks/issues/{$issueNumber}/labels" );

    $labels = \ByThePixel\Factories\LabelFactory::create( $response );

    $postLabels = [ ];
    foreach ( $labels as $label ) {
        $postLabels[] = $label->getName();
    }

    $response = $client->post( "https://api.github.com/repos/bythepixel/git-webhooks/issues/{$pullRequest->getNumber()}/labels?access_token=d7b3cd5030daf45f1e19ef3052cdc2a7d5ca91b7",
                               ['json' => $postLabels]
    );

    var_dump($response);
} );

// Match the request to a mapped route
$matcher = $routerContainer->getMatcher();
$route = $matcher->match( $request );
$callable = $route->handler;
$response = $callable( $request );
