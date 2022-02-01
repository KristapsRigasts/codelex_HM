<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
////Create a function that determines if fruit has weight over 10kg.
////Create a secondary array with shipping costs per weight. Meaning that you can say that over 10 kg
////shipping costs are 2 euros, otherwise its 1 euro.
////Using foreach loop print out the values of the fruits and how much it would cost to ship this product.csv.
$fruitsAndWeight = [
    [
        "fruit" => "apple",
        "weight" => 9
    ],
    [
        "fruit" => "orange",
        "weight" => 20
    ],
    [
        "fruit" => "pear",
        "weight" => 15
    ],
];
$shippingCoasts = [
    "less than 10kg" => 1,
    "over 10kg" =>2
];

function weightOver10kg (int $weight): bool
{
   return $weight > 10;
}

foreach ($fruitsAndWeight as $fruits)
{
    if(weightOver10kg($fruits["weight"]))
    {
        $coast = $fruits["weight"] * $shippingCoasts["over 10kg"];
        echo "To ship {$fruits["weight"]} kg of {$fruits["fruit"]}, it will coast {$coast} eur" . PHP_EOL;
    }else
    {
        $coast = $fruits["weight"] * $shippingCoasts["less than 10kg"];
        echo "To ship {$fruits["weight"]} kg of {$fruits["fruit"]}, it will coast {$coast} eur" . PHP_EOL;
    }
}

