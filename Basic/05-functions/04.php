<?php
//Create a array of objects that uses the function of exercise 3 but in loop printing out
//if the person has reached age of 18.

function createPerson(string $name, string $surname, int $age): stdClass
{
    $people = new stdClass();
    $people->name = $name;
    $people->surname = $surname;
    $people->age = $age;
    return $people;
}

$person = [
    createPerson("Juris", "Ozols", 18),
    createPerson("Aldis", "Liepa", 17),
    createPerson("Uldis", "Priede", 21),
];


function hasReachedLegalAge(stdClass $person): bool
{
   return $person->age < 18;
}

foreach($person as $people)

        if(hasReachedLegalAge($people))
        {
            echo "Sorry {$people->name} {$people->surname} you have not reached age of 18" . PHP_EOL;
        }else
        {
            echo "{$people->name} {$people->surname} you have reached age of 18. Welcome to the adult life". PHP_EOL;
        }

