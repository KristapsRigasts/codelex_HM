<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types. Create an object (person)
//that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
//Guns are objects stored within an array.
//Each gun has license letter, price & name. Using PHP in-built functions determine
//if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name = "Juris";
$person->license = ["A", "B"]; // A,B,C
$person->cash = 2000;

function createWeapon(string $name, int $price, string $license = null): stdClass
{
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->price = $price;
    $weapon->license = $license;

    return $weapon;
}
$weapons = [
    createWeapon("Glock",300, "A"),
    createWeapon("Ak47",700,"B"),
    createWeapon("AWP", 1300, "C"),
    createWeapon("Knife", 100 )
];

    echo "{$person->name} has {$person->cash} $" . PHP_EOL;
$basket = [];

while (true)
{
    echo '[1] Purchase' .PHP_EOL;
    echo '[2] Checkout' .PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;
    $option = (int) readline("Select an option: ");

    switch($option) {
        case 1:
            foreach ($weapons as $index => $weapon) {
                echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}" . PHP_EOL;
            }
            $selectedWeaponIndex = (int)readline("Select weapon: ");
            $weapon = $weapons[$selectedWeaponIndex] ?? null;

            if ($weapon === null) {
                echo "Weapon not found" . PHP_EOL;
                exit;
            }

            if ($weapon->license !== null && !in_array($weapon->license, $person->license)) {
                echo "Invalid license." . PHP_EOL;
            }

            $basket[] = $weapon;
            echo "Added $weapon->name to the basket" . PHP_EOL;

            break;

        case 2:
            $totalSum = 0;
            foreach($basket as $weapon)
            {
                $totalSum += $weapon->price;
                echo $weapon->name .PHP_EOL;
            }
            echo '----------------' . PHP_EOL;
            echo "Total: {$totalSum} $" . PHP_EOL;

            if ($person->cash >= $totalSum)
            {
                echo 'Successful payment.';
            } else {
                echo 'Payment failed. Not enough cash.';
            }
            echo PHP_EOL;
            exit;
            break;



        default:
            exit;
            break;
    }

}
