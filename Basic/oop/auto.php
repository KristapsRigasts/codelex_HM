<?php
Class Car
{
    public string $carName;
    public string $carModel;
    public function __construct($carName, $carModel)
    {
        $this->carName =$carName;
        $this->carModel = $carModel;
    }
}
Class Stock
{
    public array $cars;

    public function addAllCars(Car $car)
    {
        $this->cars[] = $car;
    }
    public function reservedCar(int $number): array
    {
       return array_splice($this->cars, $number,1);
    }
}

$allCars = new Stock();
$allCars->addAllCars(new Car('Audi', 'A4'));
$allCars->addAllCars(new Car('BMW', 'X5'));
$allCars->addAllCars(new Car('Nissan', 'Sky-Line'));
$reservedCar =[];

while(sizeof($allCars->cars) != 0) {

    echo "Available cars: " . PHP_EOL;
    foreach ($allCars as $inventory) {
        foreach ($inventory as $i => $car) {
            echo "[{$i}] {$car->carName} {$car->carModel}" . PHP_EOL;
        }
    }
    echo PHP_EOL;

if(sizeof($reservedCar) > 0)
{
    echo "Reserved cars:" . PHP_EOL;
    foreach ($reservedCar as $inventory) {
        foreach ($inventory as $car) {
            echo " {$car->carName} {$car->carModel}" . PHP_EOL;
        }
    }
    } echo PHP_EOL;

    $reserveCar = (int)readline('I would like to reserve car number: ');
    $reservedCar[] = $allCars->reservedCar($reserveCar);
}
echo "----------------------------------------" . PHP_EOL;
echo "Reserved cars:" . PHP_EOL;
foreach ($reservedCar as $inventory) {
    foreach ($inventory as $car) {
        echo " {$car->carName} {$car->carModel}" . PHP_EOL;
    }
} echo PHP_EOL;




