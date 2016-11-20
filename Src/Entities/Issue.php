<?php

namespace ByThePixel\Entities;

class Issue
{

    private $url;

    private $repositoryUrl;

    private $labelsUrl;

    private $commentsUrl;

    private $eventsUrl;

    private $htmlUrl;

    private $id;

    private $number;

    private $title;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Label[]
     */
    private $labels;

    private $state;

    private $locked;

    /**
     * @var null
     */
    private $assignee;

    /**
     * @var array
     */
    private $assignees;

    /**
     * @var null
     */
    private $milestone;

    /**
     * @var int
     */
    private $comments;

    private $createdAt;

    private $updatedAt;

    private $closedAt;

    private $body;

    private $closedBy;

    public function __construct(
        $url,
        $repositoryUrl,
        $labelsUrl,
        $commentsUrl,
        $eventsUrl,
        $htmlUrl,
        $id,
        $number,
        $title,
        User $user,
        $labels,
        $state,
        $locked,
        $assignee = null,
        $assignees = [ ],
        $milestone = null,
        $comments = 0,
        $createdAt,
        $updatedAt,
        $closedAt,
        $body,
        $closedBy
    ){
        $this->url = $url;
        $this->repositoryUrl = $repositoryUrl;
        $this->labelsUrl = $labelsUrl;
        $this->commentsUrl = $commentsUrl;
        $this->eventsUrl = $eventsUrl;
        $this->htmlUrl = $htmlUrl;
        $this->id = $id;
        $this->number = $number;
        $this->title = $title;
        $this->user = $user;
        $this->labels = $labels;
        $this->state = $state;
        $this->locked = $locked;
        $this->assignee = $assignee;
        $this->assignees = $assignees;
        $this->milestone = $milestone;
        $this->comments = $comments;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->closedAt = $closedAt;
        $this->body = $body;
        $this->closedBy = $closedBy;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getRepositoryUrl()
    {
        return $this->repositoryUrl;
    }

    /**
     * @return mixed
     */
    public function getLabelsUrl()
    {
        return $this->labelsUrl;
    }

    /**
     * @return mixed
     */
    public function getCommentsUrl()
    {
        return $this->commentsUrl;
    }

    /**
     * @return mixed
     */
    public function getEventsUrl()
    {
        return $this->eventsUrl;
    }

    /**
     * @return mixed
     */
    public function getHtmlUrl()
    {
        return $this->htmlUrl;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Label[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @return null
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * @return array
     */
    public function getAssignees()
    {
        return $this->assignees;
    }

    /**
     * @return Milestone
     */
    public function getMilestone()
    {
        return $this->milestone;
    }

    /**
     * @return int
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getClosedBy()
    {
        return $this->closedBy;
    }
    
}
