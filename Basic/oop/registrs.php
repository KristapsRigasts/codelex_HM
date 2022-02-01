<?php

class Person
{
    private string $name;
    private string $surname;
    private string $personalCode;

    public function __construct($name, $surname, $personalCode)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalCode = $personalCode;
    }

    public function getPersonName(): string
    {
        return $this->name;
    }

    public function getPersonSurname(): string
    {
        return $this->surname;
    }

    public function getPersonPersonalCode(): string
    {
        return $this->personalCode;
    }
}

class Registrs
{
    private array $persons = [];

    public function addToRegistrs(Person $person): void
    {
        $this->persons[] = $person;
    }

    public function getRegistrs(): array
    {

        return $this->persons;
    }
}

$registrDatabase = new Registrs();

while (true) {
    echo "Options: " . PHP_EOL;
    echo "[1] Add person to the register" . PHP_EOL;
    echo "[2] View register" . PHP_EOL;

    $option = readline('Enter your option:');
    echo PHP_EOL;

    switch ($option) {
        case 1:
            $name = readline('Enter name: ');
            $surname = readline('Enter surname: ');
            $personalCode = readline('Enter personal code: ');

            $registrDatabase->addToRegistrs(new Person($name, $surname, $personalCode));

            echo "Person has been added to the database." . PHP_EOL;
            echo "------------------" . PHP_EOL;
            break;

        case 2:

            foreach ($registrDatabase->getRegistrs() as $persons) {
                echo "{$persons->getPersonName()} {$persons->getPersonSurname()} {$persons->getPersonPersonalCode()}"."\n";
            }
            echo PHP_EOL;
            break;
        default:
            exit;

    }
}





