<?php

namespace ByThePixel\Entities;

class Request
{
    private $action;

    /**
     * @var Organization
     */
    private $organization;

    /**
     * @var User
     */
    private $sender;

    public function __construct(
        $action,
        Organization $organization,
        User $sender
    )
    {

        $this->action = $action;
        $this->organization = $organization;
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @return User
     */
    public function getSender()
    {
        return $this->sender;
    }
    
}
