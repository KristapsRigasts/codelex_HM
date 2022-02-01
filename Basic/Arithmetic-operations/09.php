<?php
//Write a program that calculates and displays a person's body mass index (BMI).
//A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
//Where weight is measured in pounds and height is measured in inches.
//Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
//A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
//If the BMI is less than 18.5, the person is considered underweight. If the BMI value is greater than 25,
//the person is considered overweight.
//
//Your program must accept metric units.
$weightInKg = readline("Enter your wight in kg: ");
$heightInCm = readline("Enter your height in cm: ");
$weightInPounds = $weightInKg * 2.2;
$heightInInches = $heightInCm / 2.54;


function calculateBMI(float $weight, float $height): float
{
   return $weight * 703 / ($height * $height);
}

if (calculateBMI($weightInPounds, $heightInInches) < 18.5)
{
    echo "You are underweight" . PHP_EOL;
}
else if (calculateBMI($weightInPounds, $heightInInches) >= 18.5 && calculateBMI($weightInPounds, $heightInInches) <= 25)
{
        echo "You have optimal weight" . PHP_EOL;
}
else
{
    echo "You are overweight" . PHP_EOL;
};
