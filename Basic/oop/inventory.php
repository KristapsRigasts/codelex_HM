<?php
class Weapon
{
    public string $weaponName;
    public int $power;

    public function __construct($weaponName, $power)
    {
        $this->weaponName = $weaponName;
        $this->power = $power;
    }
}
class Inventory
{
public array $inventory =[];

    public function addWeapon(Weapon $weapon): void
{
    $this->inventory[] = $weapon;
}
}

$weapon1 =new Weapon('knife', 10);
$weapon2 =new Weapon('gun', 100);
$weapon3 =new Weapon('machine gun', 500);


$inventory = new Inventory();
$inventory->addWeapon($weapon1);
$inventory->addWeapon($weapon2);
$inventory->addWeapon($weapon3);

foreach ($inventory as $invent) {
    foreach ($invent as $weapon) {
        echo " $weapon->weaponName  $weapon->power" . PHP_EOL;
    }
}


