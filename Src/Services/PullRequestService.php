<?php

namespace ByThePixel\Services;

use ByThePixel\Entities\Issue;
use ByThePixel\Entities\PullRequest;
use ByThePixel\Entities\Request;
use ByThePixel\Factories\IssueFactory;
use Github\Client;

class PullRequestService
{
    /**
     * @var PullRequest
     */
    private $pullRequest;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Request
     */
    private $request;

    public function __construct( Client $client, Request $request, PullRequest $pullRequest )
    {

        $this->pullRequest = $pullRequest;
        $this->client = $client;
        $this->request = $request;
    }

    public function updateLabels( Issue $issue )
    {
        // If there are no labels for the related issue, exit early
        if ( !sizeof( $issue->getLabels() ) ) {
            return;
        }

        // Create an array of just label names
        $labels = [ ];
        foreach ( $issue->getLabels() as $label ) {
            $labels[] = $label->getName();
        }

        // Add labels to PR from related issue
        $this->client->issue()->labels()->add(
            $this->request->getOrganization()->getLogin(),
            $this->pullRequest->getHeadBranch()->getRepository()->getName(),
            $this->pullRequest->getNumber(),
            $labels
        );
    }

    /**
     * @param Issue $issue
     */
    public function updateMilestone( Issue $issue )
    {
        // Return early if there are no milestone
        // @todo break this all out into a service as labels would block milestone assignment currently
        if ( !$issue->getMilestone() ) {
            return;
        }

        $this->client->issue()->update(
            $this->request->getOrganization()->getLogin(),
            $this->pullRequest->getHeadBranch()->getRepository()->getName(),
            $this->pullRequest->getNumber(),
            [
                'milestone' => $issue->getMilestone()->getNumber(),
            ]
        );
    }

    /**
     * @return Issue
     */
    public function getRelatedIssue(  )
    {
        // Get related issue number from PR head branch name
        preg_match( '/(?!issue-)?\d+/', $this->pullRequest->getHeadBranch()->getRef(), $issueNumbers );

        // Get the issue related tot he Pull Request
        $response = $this->client->issue()->show(
            $this->request->getOrganization()->getLogin(),
            $this->pullRequest->getHeadBranch()->getRepository()->getName(),
            $issueNumbers[0]
        );
        return IssueFactory::createFromArray( $response );
    }
}
