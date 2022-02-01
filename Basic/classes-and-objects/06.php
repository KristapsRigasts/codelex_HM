<?php
class EnergyDrink
{
    private int $surveyed;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks)
    {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }
    public function calculate_energy_drinkers():int
    {
        return $this->surveyed * $this->purchased_energy_drinks;
    }
    public function calculate_prefer_citrus():int
    {
        return $this->calculate_energy_drinkers() * $this->prefer_citrus_drinks;
    }
    public function getSurveyed(): int
    {
        return $this->surveyed;
    }
}


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;
$energy = new EnergyDrink($surveyed,$purchased_energy_drinks,$prefer_citrus_drinks);

echo "Total number of people surveyed " . $energy->getSurveyed() . PHP_EOL;
echo "Approximately " . $energy->calculate_energy_drinkers() . " bought at least one energy drink" . PHP_EOL;
echo $energy->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
