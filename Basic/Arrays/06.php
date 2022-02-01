<?php
//Write a program to play a word-guessing game like Hangman.

function playAgain()
{
    $wordFile = file_get_contents('words-for-hangman.txt');

    $words = explode(',', $wordFile);
    shuffle($words);
    $randomWord = $words[0];

    $tries = 10;

    $randomWordToGuess = str_split($randomWord);

    $wordToGuess = array_fill(0, count($randomWordToGuess), '-');
    $wrongGuessLetters = [];
    $triesLeft = $tries;

    while (count($wrongGuessLetters) < $tries) {
        echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL;
        echo "Word: ";
        foreach ($wordToGuess as $word) {
            echo $word;
        }
        echo PHP_EOL;
        echo "Misses: ";
        foreach ($wrongGuessLetters as $letter) {
            echo $letter;
        }
        echo PHP_EOL;
        echo "Wrong tries left: {$triesLeft}" . PHP_EOL;
        echo "Choose a letter: " . PHP_EOL;
        $guessedLetter = (string)readline();

        switch ($guessedLetter) {

            case in_array($guessedLetter, $randomWordToGuess):

                foreach ($randomWordToGuess as $index => $letter) {
                    if ($guessedLetter == $letter) {
                        $wordToGuess2 = array_replace($wordToGuess, [$index => $letter]);
                        $wordToGuess = $wordToGuess2;
                    }
                }
                if ($randomWordToGuess == $wordToGuess) {
                    echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL;
                    echo "Word was: ";
                    foreach ($wordToGuess as $word) {
                        echo $word;
                    }
                    echo PHP_EOL;
                    echo "You won!" . PHP_EOL;
                    $playAgain = readline('Play "again" or "quit"? ');
                    if ($playAgain == 'again') {

                        playAgain();

                    } else {
                        echo 'Exiting' . PHP_EOL;
                        exit;
                    }
                }

                break;
            case !in_array($guessedLetter, $randomWordToGuess):

                $wrongGuessLetters[] = $guessedLetter;
                $triesLeft -= 1;
                if (count($wrongGuessLetters) == $tries) {
                    echo "You lost!" . PHP_EOL;
                    echo "Word was: ";
                    foreach ($randomWordToGuess as $word) {
                        echo $word;
                    }
                    echo PHP_EOL;
                    $playAgain = readline('Play "again" or "quit"? ');
                    if ($playAgain == 'again') {

                        playAgain();

                    } else {
                        echo 'Exiting' . PHP_EOL;
                        exit;
                    }
                }

                break;

            default;

                exit;
                break;
        }
    }
}

playAgain();



