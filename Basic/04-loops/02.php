<?php
//Create an array with integers (up to 10) and print them out using for loop

$arrayOfIntegers = [1, 3, 5, 7, 11, 12, 15, 17];

for ($i = 0; $i < sizeof($arrayOfIntegers); $i++)
{
    echo $arrayOfIntegers[$i] . " ";
}