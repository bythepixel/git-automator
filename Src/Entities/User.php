<?php

namespace ByThePixel\Entities;

class User
{
    private $login;

    private $id;

    private $avatarUrl;

    private $gravatarId;

    private $url;

    private $htmlUrl;

    private $followersUrl;

    private $followingUrl;

    private $gistsUrl;

    private $starredUrl;

    private $subscriptionsUrl;

    private $organizationsUrl;

    private $reposUrl;

    private $eventsUrl;

    private $receivedEventsUrl;

    private $type;

    private $siteAdmin;

    public function __construct(
        $login,
        $id,
        $avatarUrl,
        $gravatarId,
        $url,
        $htmlUrl,
        $followersUrl,
        $followingUrl,
        $gistsUrl,
        $starredUrl,
        $subscriptionsUrl,
        $organizationsUrl,
        $reposUrl,
        $eventsUrl,
        $receivedEventsUrl,
        $type,
        $siteAdmin
    ){

        $this->login = $login;
        $this->id = $id;
        $this->avatarUrl = $avatarUrl;
        $this->gravatarId = $gravatarId;
        $this->url = $url;
        $this->htmlUrl = $htmlUrl;
        $this->followersUrl = $followersUrl;
        $this->followingUrl = $followingUrl;
        $this->gistsUrl = $gistsUrl;
        $this->starredUrl = $starredUrl;
        $this->subscriptionsUrl = $subscriptionsUrl;
        $this->organizationsUrl = $organizationsUrl;
        $this->reposUrl = $reposUrl;
        $this->eventsUrl = $eventsUrl;
        $this->receivedEventsUrl = $receivedEventsUrl;
        $this->type = $type;
        $this->siteAdmin = $siteAdmin;
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
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @return mixed
     */
    public function getGravatarId()
    {
        return $this->gravatarId;
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
    public function getFollowersUrl()
    {
        return $this->followersUrl;
    }

    /**
     * @return mixed
     */
    public function getFollowingUrl()
    {
        return $this->followingUrl;
    }

    /**
     * @return mixed
     */
    public function getGistsUrl()
    {
        return $this->gistsUrl;
    }

    /**
     * @return mixed
     */
    public function getStarredUrl()
    {
        return $this->starredUrl;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionsUrl()
    {
        return $this->subscriptionsUrl;
    }

    /**
     * @return mixed
     */
    public function getOrganizationsUrl()
    {
        return $this->organizationsUrl;
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
    public function getReceivedEventsUrl()
    {
        return $this->receivedEventsUrl;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getSiteAdmin()
    {
        return $this->siteAdmin;
    }
    
    
    
}
