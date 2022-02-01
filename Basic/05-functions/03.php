<?php
//Create a person object with name, surname and age.
//Create a function that will determine if the person has reached 18 years of age.
//Print out if the person has reached age of 18 or not.

$person = new stdClass();
$person->name = "Juris";
$person->surname = "Liepa";
$person->age = 19;

function hasReachedLegalAge(stdClass $persons): bool
{
    return $persons->age > 18;
}
if(hasReachedLegalAge($person))
{
    echo "You have reached age of 18. Welcome to the adult life". PHP_EOL;
}else
{
    echo "Sorry you have not reached age of 18" . PHP_EOL;
}
