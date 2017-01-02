<?php

namespace ByThePixel\Controllers;

use ByThePixel\Entities\PullRequest;
use ByThePixel\Factories\PullRequestFactory;
use ByThePixel\Factories\RequestFactory;
use ByThePixel\Services\PullRequestService;
use Zend\Diactoros\ServerRequest;

class PullRequestController extends BaseController
{

    public function __construct( )
    {
        parent::__construct();
    }

    public function create( ServerRequest $request )
    {
        $gitRequest = RequestFactory::createFromRequest( $request );
        $pullRequest   = PullRequestFactory::create( $request );

        // Only take action when creating a new pull request
        if ( $gitRequest->getAction() !== PullRequest::ACTION_OPENED ) {
            return;
        }

        // New instance of the Pull Request service
        $pullRequestService = new PullRequestService( $this->client, $gitRequest, $pullRequest );

        // If there were any validation violations during creation of the PR, just close it
        if(sizeof($pullRequest->getViolations())) {
            $pullRequestService->close();
            return;
        }

        // Get related issues milestones and lebels and apply them to the pull request
        $issue = $pullRequestService->getRelatedIssue();

        $pullRequestService->updateLabels($issue);
        $pullRequestService->updateMilestone($issue);
    }
}
