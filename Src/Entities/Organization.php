<?php

namespace ByThePixel\Entities;

class Organization
{
    private $login;

    private $id;

    private $url;

    private $reposUrl;

    private $eventsUrl;

    private $hooksUrl;

    private $issuesUrl;

    private $membersUrl;

    private $publicMembersUrl;

    private $avatarUrl;

    private $description;

    public function __construct(
        $login,
        $id,
        $url,
        $reposUrl,
        $eventsUrl,
        $hooksUrl,
        $issuesUrl,
        $membersUrl,
        $publicMembersUrl,
        $avatarUrl,
        $description
    ){

        $this->login = $login;
        $this->id = $id;
        $this->url = $url;
        $this->reposUrl = $reposUrl;
        $this->eventsUrl = $eventsUrl;
        $this->hooksUrl = $hooksUrl;
        $this->issuesUrl = $issuesUrl;
        $this->membersUrl = $membersUrl;
        $this->publicMembersUrl = $publicMembersUrl;
        $this->avatarUrl = $avatarUrl;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getReposUrl()
    {
        return $this->reposUrl;
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
    public function getHooksUrl()
    {
        return $this->hooksUrl;
    }

    /**
     * @return mixed
     */
    public function getIssuesUrl()
    {
        return $this->issuesUrl;
    }

    /**
     * @return mixed
     */
    public function getMembersUrl()
    {
        return $this->membersUrl;
    }

    /**
     * @return mixed
     */
    public function getPublicMembersUrl()
    {
        return $this->publicMembersUrl;
    }

    /**
     * @return mixed
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
}
