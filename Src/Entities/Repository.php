<?php

namespace ByThePixel\Entities;

class Repository
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $private;

    /**
     * @var bool
     */
    private $fork;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $branches_url;

    public function __construct(
        $id,
        $name,
        $fullName,
        $description,
        $private,
        $fork,
        $url,
        $branches_url
    ){

        $this->id = $id;
        $this->name = $name;
        $this->fullName = $fullName;
        $this->description = $description;
        $this->private = $private;
        $this->fork = $fork;
        $this->url = $url;
        $this->branches_url = $branches_url;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function isPrivate()
    {
        return $this->private;
    }

    /**
     * @return boolean
     */
    public function isFork()
    {
        return $this->fork;
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
    public function getBranchesUrl()
    {
        return $this->branches_url;
    }
}
