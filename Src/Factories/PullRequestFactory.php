<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\Branch;
use ByThePixel\Entities\PullRequest;
use ByThePixel\Entities\Repository;
use Symfony\Component\Validator\Validation;
use Zend\Diactoros\ServerRequest;

// @todo abstract class for factories to extend
class PullRequestFactory
{
    // @todo possibly different static create methods for difference types
    /**
     * @param ServerRequest $request
     *
     * @return PullRequest
     */
    static public function create( ServerRequest $request )
    {
        $payload = json_decode($request->getParsedBody()['payload']);

        $repository = new Repository(
            $payload->pull_request->base->repo->id,
            $payload->pull_request->base->repo->name,
            $payload->pull_request->base->repo->full_name,
            $payload->pull_request->base->repo->description,
            $payload->pull_request->base->repo->private,
            $payload->pull_request->base->repo->fork,
            $payload->pull_request->base->repo->url,
            $payload->pull_request->base->repo->branches_url
        );

        $headBranch = new Branch(
            $payload->pull_request->head->label,
            $payload->pull_request->head->ref,
            $payload->pull_request->head->sha,
            $repository
        );

        $baseBranch = new Branch(
            $payload->pull_request->base->label,
            $payload->pull_request->base->ref,
            $payload->pull_request->base->sha,
            $repository
        );

        $pullRequest = new PullRequest(
            $payload->pull_request->id,
            $payload->pull_request->url,
            $payload->pull_request->html_url,
            $payload->pull_request->diff_url,
            $payload->pull_request->patch_url,
            $payload->pull_request->issue_url,
            $payload->pull_request->commits_url,
            $payload->pull_request->review_comments_url,
            $payload->pull_request->review_comment_url,
            $payload->pull_request->comments_url,
            $payload->pull_request->statuses_url,
            $payload->pull_request->number,
            $payload->pull_request->state,
            $payload->pull_request->title,
            $payload->pull_request->body,
            $headBranch,
            $baseBranch,
            Validation::createValidator()
        );

        return $pullRequest;
    }
}
