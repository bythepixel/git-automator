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
}
