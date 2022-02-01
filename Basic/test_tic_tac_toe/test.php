<?php


// TicTacToe

function display_board(array $board): void
    {
foreach($board as $value)
{
    foreach($value as $item)
    echo "$item ";
    echo PHP_EOL;
}
}
$gameFile = file_get_contents('default.txt');
[$boardFile, $combinationFile] = explode("
", $gameFile);
$boardFile1 =str_replace('board:','' ,$boardFile);
[$boardRow, $boardColumn] = explode('x', $boardFile1);
$board = array_fill(0,$boardRow, array_fill(0,$boardColumn, '-'));

$combinationFile1 = str_replace('coordinates:','' ,$combinationFile);
[$combination1, $combination2, $combination3, $combination4 ] = explode('|',$combinationFile1);

$coordinates1 = getCombinations($combination1);
$coordinates2 = getCombinations($combination2);
$coordinates3 = getCombinations($combination3);
$coordinates4 = getCombinations($combination4);

function getCombinations (string $combination): array
{
    $coordinates[] = explode(';', $combination);
    $combo = [];

    foreach ($coordinates as $value)
        foreach ($value as $item) {
            $combo[] = array_map('intval', explode(',', $item));

        } return $combo;
}

$combinations = [
    $coordinates1,
    $coordinates2,
    $coordinates3,
    $coordinates4
];


$player1 = readline('Player 1 enter your character: ');
$player2 = readline('Player 2 enter your character: ');

if($player1 == $player2)
{
    echo "Character is taken!" . PHP_EOL;
    $player2 = readline('Player2 enter your character: ');
    if($player1 == $player2)
    {
        echo "Character is taken!" . PHP_EOL;
        exit;
    }
}

$activePlayer = $player1;

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item) {

            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}


while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    display_board($board);
    $position = readline("player {$activePlayer} enter position: ");
    [$row, $column] = explode(',', $position);


    if (!isset($board[$row][$column]) || $board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {

        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;
