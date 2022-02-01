<?php

class Lights
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}

class CloseLights extends Lights
{
    private int $quality;

    public function __construct($name, $quality = 100)
    {
        parent::__construct($name);
        $this->quality = $quality;

    }

    public function lightQualityChanges(): int
    {
        return $this->quality -= rand(5, 10);
    }

    public function getQuality(): int
    {
        return $this->quality;
    }
}

class HighLights extends Lights
{
    private int $quality;

    public function __construct($name, $quality = 100)
    {
        parent::__construct($name);
        $this->quality = $quality;
    }

    public function lightQualityChanges(): int
    {
        return $this->quality -= rand(1, 3);
    }

    public function getQuality(): int
    {
        return $this->quality;
    }
}