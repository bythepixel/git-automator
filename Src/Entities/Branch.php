<?php

namespace ByThePixel\Entities;

class Branch
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $sha;

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(
        $label,
        $ref,
        $sha,
        Repository $repository
    ){

        $this->label = $label;
        $this->ref = $ref;
        $this->sha = $sha;
        $this->repository = $repository;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @return string
     */
    public function getSha()
    {
        return $this->sha;
    }

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}
