<?php
//Write a program that picks a random number from 1-100. Give the user a chance to guess it.
//If they get it right, tell them so. If their guess is higher than the number, say "Too high."
//If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)


    $number = (int) readline('Guess a number (1 - 100): ');
    $randomNumber = rand(1, 100);
     if ($number === $randomNumber)
     {
         echo "You guessed it. Number was {$number}" . PHP_EOL;
     }
     else if ($number < $randomNumber)
     {
         echo "Sorry, you are too low.  I was thinking of {$randomNumber}" . PHP_EOL;
     }else
     {
         echo "Sorry, you are too high.  I was thinking of {$randomNumber}" . PHP_EOL;
     }

