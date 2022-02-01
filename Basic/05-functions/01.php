<?php
//Create a function that accepts any string and returns the same value with added "codelex" by the end of it.
//Print this value out.

function printTheValue(string $value): string
{
    return "{$value} codelex" . PHP_EOL;
}
echo(printTheValue("Let`s study at"));