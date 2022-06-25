<?php


class Player
{
    private string $name;
    private string $city;

    public function __construct(string $name)
    {
         $this->name = $name;
        return $this;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;

    }
    public function getCity(): string
    {
        if (isset($this->city))
        {
            return " (" .$this->city . ")";

        }

        return "";

    }
    public function getName(): string
    {
        return $this->name;
    }
}

