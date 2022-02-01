<?php

class Tires
{
    private float $tireTear;
    private string $name;

    public function __construct($name, $tireTear = 100)
    {
        $this->name = $name;
        $this->tireTear = $tireTear;
    }

    public function tireTearPerMileage(): float
    {
        return $this->tireTear -= rand(1, 3);
    }

    public function getTireTear(): float
    {
        return $this->tireTear;
    }

    public function getName(): string
    {
        return $this->name;
    }
}