<?php

namespace ByThePixel\Controllers;

use ByThePixel\Entities\PullRequest;
use ByThePixel\Factories\PullRequestFactory;
use ByThePixel\Factories\RequestFactory;
use ByThePixel\Services\PullRequestService;
use Zend\Diactoros\ServerRequest;

class PullRequestController extends BaseController
{
    public function create( ServerRequest $request )
    {
        $gitRequest = RequestFactory::createFromRequest( $request );
        $pullRequest   = PullRequestFactory::create( $request );

        // Only take action when creating a new pull request
        if ( $gitRequest->getAction() !== PullRequest::ACTION_OPENED ) {
            return;
        }

        $pullRequestService = new PullRequestService($this->client, $gitRequest, $pullRequest);
        $issue = $pullRequestService->getRelatedIssue();

        $pullRequestService->updateLabels($issue);
        $pullRequestService->updateMilestone($issue);
    }
}
