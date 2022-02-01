<?php
require_once '05.php';
class DateTest
{

    public function checkIfDateIsCorrect(Date $date)
    {

            echo $date->displayDate() == "12/33/1999"? 'Pass': 'Fail';
            echo PHP_EOL;
    }
    public function testDate(Date $date)
    {

        if (checkdate($date->getMonth(), $date->getDay(), $date->getYear()) === true) {
           echo "Correct date: {$date->displayDate()}";
    } else {
            echo 'Wrong dates provided!';
        }echo PHP_EOL;

    }
}

$date= new Date(33,12,1999);

$dateTest = new DateTest();

$dateTest->checkIfDateIsCorrect($date);
$dateTest->testDate($date);
