<?php

namespace ByThePixel\Controllers;

use ByThePixel\Entities\PullRequest;
use ByThePixel\Factories\PullRequestFactory;
use ByThePixel\Factories\RequestFactory;
use ByThePixel\Services\PullRequestService;
use Github\Client;
use Zend\Diactoros\ServerRequest;

class PullRequestController extends BaseController
{
    public function create( ServerRequest $request )
    {
        
        // @todo inject client into controller
        $client = new Client();
        $client->authenticate( getenv( "githubToken" ), null, Client::AUTH_HTTP_TOKEN );

        $gitRequest = RequestFactory::createFromRequest( $request );
        $pullRequest   = PullRequestFactory::create( $request );

        // Only take action when creating a new pull request
        if ( $gitRequest->getAction() !== PullRequest::ACTION_OPENED ) {
            return;
        }

        $pullRequestService = new PullRequestService($client, $gitRequest, $pullRequest);
        $issue = $pullRequestService->getRelatedIssue();

        $pullRequestService->updateLabels($issue);
        $pullRequestService->updateMilestone($issue);
    }
}
