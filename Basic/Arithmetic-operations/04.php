<?php
//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10),
//as an int. Take note that it is the same as factorial of N.

function calculate(int $x, int $y): int
{
    $result = $x;
    for ($i = $x; $i <= $y; $i++)
        $result *= $i;
    return $result;
}

echo(calculate(1, 4));
echo PHP_EOL;
