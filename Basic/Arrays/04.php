<?php
//Write a program that creates an array of ten integers. It should put ten random numbers from 1 to 100 in the array.
//It should copy all the elements of that array into another array of the same size.

//Create an array of ten integers
//Fill the array with ten random numbers (1-100)
//Copy the array into another array of the same capacity
//Change the last value in the first array to a -7
//Display the contents of both arrays

$randomNumber = range(1,100);
shuffle($randomNumber);
$randomNumber = array_slice($randomNumber, 0, 10);
$randomNumberCopy = [];

foreach ($randomNumber as $number)
{
    $randomNumberCopy[] = $number;
}
array_splice($randomNumber, -1, 1, -7);

echo "Array1: ";
foreach ($randomNumber as $number)
{
    echo "{$number} ";
} echo PHP_EOL;

echo "Array2: ";
foreach ($randomNumberCopy as $numbers)
{
    echo "{$numbers} ";
}echo PHP_EOL;

