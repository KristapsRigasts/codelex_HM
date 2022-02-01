<?php
//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday. Using loop (by your choice)
//print out every persons personal data.
function createPerson(string $name, string $surname, int $age, string $birthday): stdClass
{
    $people = new stdClass();
    $people->name = $name;
    $people->surname = $surname;
    $people->age = $age;
    $people->birthday = $birthday;
    return $people;
}

$person = [
    createPerson("Juris", "Ozols", 23, "22. december"),
    createPerson("Aldis", "Priede", 20, "20. november"),
    createPerson("Gatis", "Liepa", 28, "12. march"),
    ];


foreach($person as $people)
{
    print_r($people);
}
