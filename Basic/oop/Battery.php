<?php

class Battery
{
    private int $batteryPercent;

    public function __construct($batteryPercent)
    {
        $this->batteryPercent = $batteryPercent;
    }

    public function chargeBattery($distance)
    {
        $this->batteryPercent += (0.3 * $distance);
    }

    public function getBatteryPercent(): int
    {
        return $this->batteryPercent;
    }
}