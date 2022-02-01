<?php

require_once 'Tires.php';
require_once 'Odometer.php';
require_once 'FuelGauge.php';
require_once 'Lights.php';
require_once 'Battery.php';
require_once 'Car.php';


$name = readline('Car name: ');
$fuelGaugeAmount = (int) readline('Fuel Gauge amount: ');
$driveDistance = (int) readline('Drive distance: ');

$car = new Car($name, 1234, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

$pinCode = (int) readline('Enter car pin code: ');
$car->start($pinCode);

if (!$car->hasStarted())
{
    echo "{$car->getName()} has not started." . PHP_EOL;
}

while ($car->getFuel() > 0 && $car->validateTires() && $car->validateLights() && $car->hasStarted()) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;

    foreach ($car->getTireTear() as $tire)
    {
        echo "{$tire->getName()} tire: {$tire->getTireTear()} %" . PHP_EOL;
    }
    foreach ($car->getLight() as $cLight)
    {
        echo "{$cLight->getName()} light, quality: {$cLight->getQuality()} %" . PHP_EOL;
    }
    echo "Battery is charged {$car->getBatteryCharge()} %" . PHP_EOL;

    $car->drive($driveDistance);

    sleep(1);
}