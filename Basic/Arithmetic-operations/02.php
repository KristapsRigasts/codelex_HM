<?php
//Write a program called CheckOddEven which prints "Odd Number"if the int variable “number” is odd,
// or “Even Number” otherwise. The program shall always print “bye!” before exiting.

$number = (int) readline('Enter your number: ');

function checkOddEven( int $number): bool
{
    return $number % 2 == 0;
}

    if (checkOddEven($number)) {
        echo "Even Number" . PHP_EOL;

    } else {
        echo "Odd Number" . PHP_EOL;
    }
exit("bye!");
