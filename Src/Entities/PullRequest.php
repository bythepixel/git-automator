<?php

namespace ByThePixel\Entities;

class PullRequest
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $htmlUrl;

    /**
     * @var string
     */
    private $diffUrl;

    /**
     * @var string
     */
    private $patchUrl;

    /**
     * string
     */
    private $issueUrl;

    /**
     * @var string
     */
    private $commitsUrl;

    /**
     * @var string
     */
    private $reviewCommentsUrl;

    /**
     * @var string
     */
    private $reviewCommentUrl;

    /**
     * @var string
     */
    private $commentsUrl;

    /**
     * @var string
     */
    private $statusesUrl;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var branch
     */
    private $headBranch;

    /**
     * @var branch
     */
    private $baseBranch;

    public function __construct(
        $id,
        $url,
        $htmlUrl,
        $diffUrl,
        $patchUrl,
        $issueUrl,
        $commitsUrl,
        $reviewCommentsUrl,
        $reviewCommentUrl,
        $commentsUrl,
        $statusesUrl,
        $number,
        $state,
        $title,
        $body,
        $headBranch,
        $baseBranch
    ) {
        $this->id = $id;
        $this->url = $url;
        $this->htmlUrl = $htmlUrl;
        $this->diffUrl = $diffUrl;
        $this->patchUrl = $patchUrl;
        $this->issueUrl = $issueUrl;
        $this->commitsUrl = $commitsUrl;
        $this->reviewCommentsUrl = $reviewCommentsUrl;
        $this->reviewCommentUrl = $reviewCommentUrl;
        $this->statusesUrl = $statusesUrl;
        $this->number = $number;
        $this->state = $state;
        $this->title = $title;
        $this->body = $body;
        $this->commentsUrl = $commentsUrl;
        $this->headBranch = $headBranch;
        $this->baseBranch = $baseBranch;
    }
}
