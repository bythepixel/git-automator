<?php

namespace ByThePixel\Entities;

class Label
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
    private $name;

    /**
     * @var string
     */
    private $color;

    /**
     * @var bool
     */
    private $default;

    public function __construct(
        $id,
        $url,
        $name,
        $color,
        $default
    ){

        $this->id = $id;
        $this->url = $url;
        $this->name = $name;
        $this->color = $color;
        $this->default = $default;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }
}
