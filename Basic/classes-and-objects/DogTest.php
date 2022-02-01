<?php
require_once '07.php';
class DogTest
{
    public function dogTestFamilyTree(): void
    {
        $dog = new Dog('Max', 'male', 'Lady', 'Rocky');

        if($dog->getMotherName() === 'Lady' && $dog->getFatherName() === 'Rocky')
        {
            echo "TRUE";
        }else {
            echo "FAIL";
        }

    }

    public function checkIfDogFatherMethodIsCorrect(): string
    {
        $dog = new Dog('Coco', 'female', 'Molly' ,  'Buster');

       return $dog->getFatherName() === 'Buster'? "TRUE": "FAIL";
    }
    public function checkIfHasSameMotherIsCorrect(): string
    {
        $dogCoco = new Dog('Coco', 'female', 'Molly' ,  'Buster');
        $dogRocky = new Dog('Rocky', 'male', 'Molly','Sam');

        return $dogCoco->HasSameMotherAs($dogRocky) === true? "TRUE": "FAIL";
    }
}
$dogMax = new Dog('Max', 'male', 'Lady', 'Rocky');
$dogRocky = new Dog('Rocky', 'male', 'Molly','Sam');
$dogSparky= new Dog('Sparky', 'male');
$dogBuster = new Dog('Buster', 'male', 'Lady','Sparky');
$dogSam = new Dog('Sam', 'male');
$dogLady = new Dog('Lady', 'female');
$dogMolly = new Dog('Molly', 'female');
$dogCoco = new Dog('Coco', 'female', 'Molly' ,  'Buster');

$dogTest = new DogTest();
echo "Test dog family tree: ";
$dogTest->dogTestFamilyTree();
echo PHP_EOL;
echo "Test if dog has father: ";
echo $dogTest->checkIfDogFatherMethodIsCorrect();
echo PHP_EOL;
echo "Test if 2 dogs has same mother: ";
echo $dogTest->checkIfHasSameMotherIsCorrect();
echo PHP_EOL;
