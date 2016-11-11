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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getHtmlUrl()
    {
        return $this->htmlUrl;
    }

    /**
     * @return string
     */
    public function getDiffUrl()
    {
        return $this->diffUrl;
    }

    /**
     * @return string
     */
    public function getPatchUrl()
    {
        return $this->patchUrl;
    }

    /**
     * @return mixed
     */
    public function getIssueUrl()
    {
        return $this->issueUrl;
    }

    /**
     * @return string
     */
    public function getCommitsUrl()
    {
        return $this->commitsUrl;
    }

    /**
     * @return string
     */
    public function getReviewCommentsUrl()
    {
        return $this->reviewCommentsUrl;
    }

    /**
     * @return string
     */
    public function getReviewCommentUrl()
    {
        return $this->reviewCommentUrl;
    }

    /**
     * @return string
     */
    public function getCommentsUrl()
    {
        return $this->commentsUrl;
    }

    /**
     * @return string
     */
    public function getStatusesUrl()
    {
        return $this->statusesUrl;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return branch
     */
    public function getHeadBranch()
    {
        return $this->headBranch;
    }

    /**
     * @return branch
     */
    public function getBaseBranch()
    {
        return $this->baseBranch;
    }
}
