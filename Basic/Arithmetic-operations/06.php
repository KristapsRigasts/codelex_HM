<?php
//Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
//The program shall print "Coza" in place of the numbers which are multiples of 3,
//"Loza" for multiples of 5, "Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on.
//1 2 Coza 4 Loza Coza Woza 8 Coza Loza 11
//Coza 13 Woza CozaLoza 16 17 Coza 19 Loza CozaWoza 22
//23 Coza Loza 26 Coza Woza 29 CozaLoza 31 32 Coza

for ($i =1; $i <= 110; $i++)
{
    if ($i % 3 == 0 && $i % 5 == 0)
    {
        echo "CozaLoza ";
    }
    else if ($i % 3 == 0 && $i % 7 == 0)
    {
        echo "CozaWoza ";
    }
    else if ($i % 5 == 0 && $i % 7 == 0)
    {
        echo "LozaWoza ";
    }

    else if ($i % 3 == 0)
    {
        echo "Coza ";
    }
    else if ($i % 5 == 0)
    {
        echo "Loza ";
    }
    else if ($i % 7 == 0)
    {
        echo "Woza ";
    }
    else
    {
        echo $i . " " ;
    }
    if ($i % 11 == 0)
    {
        echo PHP_EOL;
    }
}


