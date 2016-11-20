<?php

namespace ByThePixel\Entities;

class Milestone
{
    private $url;

    private $htmlUrl;

    private $labelsUrl;

    private $id;

    private $number;

    private $title;

    private $description;

    /**
     * @var User
     */
    private $creator;

    private $openIssues;

    private $closedIssues;

    private $createdAt;

    private $updatedAt;

    private $dueOn;

    private $closedAt;

    private $state;

    public function __construct( 
        $url,
        $htmlUrl,
        $labelsUrl,
        $id,
        $number,
        $title,
        $description,
        User $creator,
        $openIssues,
        $closedIssues,
        $state,
        $createdAt,
        $updatedAt,
        $dueOn,
        $closedAt
    ){

        $this->url = $url;
        $this->htmlUrl = $htmlUrl;
        $this->labelsUrl = $labelsUrl;
        $this->id = $id;
        $this->number = $number;
        $this->title = $title;
        $this->description = $description;
        $this->creator = $creator;
        $this->openIssues = $openIssues;
        $this->closedIssues = $closedIssues;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->dueOn = $dueOn;
        $this->closedAt = $closedAt;
        $this->state = $state;
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
    public function getHtmlUrl()
    {
        return $this->htmlUrl;
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return mixed
     */
    public function getOpenIssues()
    {
        return $this->openIssues;
    }

    /**
     * @return mixed
     */
    public function getClosedIssues()
    {
        return $this->closedIssues;
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
    public function getDueOn()
    {
        return $this->dueOn;
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
    public function getState()
    {
        return $this->state;
    }
}
