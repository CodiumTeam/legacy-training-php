<?php

class User
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $biography;


    public function __construct(string $name, string $biography)
    {
        $this->name = $name;
        $this->biography = $biography;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

}