<?php
//Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
//Create a for loop that iterates non-associative array using php in-built
//function that determines count of elements in the array.
//Create a function that doubles the integer number.
//Within the loop using php in-built function print out the double of the number value (using your custom function).

$array = [3, 4, 5, 3.5, "6"];

function double(int $number): int
{
    return $number * 2;
}

for ($i = 0; $i < sizeof($array); $i++)
{
    if (is_integer($array[$i]))
    {
        $doubled = double($array[$i]);
        echo $doubled . PHP_EOL;

    }
}