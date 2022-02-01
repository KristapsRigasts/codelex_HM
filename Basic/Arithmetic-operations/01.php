<?php
//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

$number1 = (int) readline('Enter first number: ');
$number2 = (int) readline('Enter second number: ');

if ($number1 === 15 || $number2 === 15 || $number1 + $number2 === 15 || abs($number1 - $number2) === 15)
{
    echo "True" . PHP_EOL;
} else
{
    echo "False" . PHP_EOL;
}

