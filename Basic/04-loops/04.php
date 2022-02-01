<?php
//Create a non associative array with integers and print out only integers that divides by 3 without any left.

$arrayOfIntegers = [1, 3, 5, 6, 8, 9, 11, 12];
foreach ($arrayOfIntegers as $number)
{
    if ($number % 3 === 0)
    {
        echo $number . " ";
    }
}