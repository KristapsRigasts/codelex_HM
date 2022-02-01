<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;

    private array $tires = [];

    private array $lights = [];

    private Battery $battery;

    private int $pinCode;
    private bool $started = false;


    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km

    public function __construct(string $name, int $pinCOde, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->pinCode = $pinCOde;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();

        $this->tires[] = new Tires('Front left');
        $this->tires[] = new Tires('Front right');
        $this->tires[] = new Tires('Back left');
        $this->tires[] = new Tires('Back right');

        $this->lights[] = new CloseLights('Close left');
        $this->lights[] = new CloseLights('Close right');
        $this->lights[] = new HighLights('High left');
        $this->lights[] = new HighLights('High right');

        $this->battery = new Battery(10);
    }

    public function hasStarted(): bool
    {
        return $this->started;
    }

    public function start(int $pinCode): void
    {
        if($this->pinCode === $pinCode && $this->battery->getBatteryPercent() > 5) {
            $this->started = true;
        }
    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);

        foreach ($this->tires as $tire) {
            $tire->tireTearPerMileage();
        }
        foreach ($this->lights as $light) {
            $light->lightQualityChanges();
        }

        if ($this->battery->getBatteryPercent() <= 100) {
            $this->battery->chargeBattery($distance);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function getTireTear(): array
    {
        return $this->tires;
    }

    public function validateTires()
    {
        foreach ($this->tires as $tire) {
            if ($tire->getTireTear() <= 0) {
                return false;
            }
            return true;
        }
    }

    public function getLight(): array
    {
        return $this->lights;
    }

    public function validateLights()
    {
        foreach ($this->lights as $lights) {
            if ($lights->getQuality() <= 50) {
                return false;
            }
            return true;
        }
    }

    public function getBatteryCharge(): int
    {
        return $this->battery->getBatteryPercent();
    }

}