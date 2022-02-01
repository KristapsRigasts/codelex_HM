<?php

//Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
//Range should be stored within the 2 separated variables $y and $z.

$x = 50;
$y = 20;
$z = 80;

if ($x >= $y && $x <= $z)
{
    echo "Correct";
} else
{
    echo "Incorrect";
}