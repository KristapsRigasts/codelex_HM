<?php
//Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.
function display_board(array $board): void
{
    foreach($board as $value)
    {
        foreach($value as $item)
            echo $item ;
        echo PHP_EOL;
    }
}

$board = array_fill(0,3, array_fill(0,3, '-'));
$combinations =
    [
        [
            [0, 0], [0, 1], [0, 2]
        ],
        [
            [1, 0], [1, 1], [1, 2]
        ],
        [
            [2, 0], [2, 1], [2, 2]
        ],
        [
            [0, 0], [1, 0], [2, 0]
        ],
        [
            [0, 1], [1, 1], [2, 1]
        ],
        [
            [0, 2], [1, 2], [2, 2]
        ],
        [
            [2, 0], [1, 1], [0, 2]
        ],
        [
            [0, 0], [1, 1], [2, 2]
        ],

    ];
$player1 = 'X';
$player2 = 'O';
$activePlayer = $player1;

function doWeHaveAWinner(array $combinations, array $board, string $activePlayer): bool
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
while (!isBoardFull($board) && !doWeHaveAWinner($combinations, $board, $activePlayer)) {
    display_board($board);
    $position = readline("Player {$activePlayer} enter position: ");
    [$row, $column] = explode(',', $position);


    if (!isset($board[$row][$column]) || $board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (doWeHaveAWinner($combinations, $board, $activePlayer)) {

        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;


//$count = 0;
//while (true) {
//
//    if ($count % 2 === 0)
//    {
//        $turn = "x";
//    } else
//    {
//        $turn = "o";
//    }
//    display_board($board);
//
//    $coordinatesRow = (int)readline(" {$turn} choose your row: ") - 1; // koordinates ievada reali nevis pec 0 principa
//    $coordinatesColumn = (int)readline(" {$turn} choose your column: ") - 1;
//    $notOnBoard =$board[$coordinatesRow][$coordinatesColumn] ?? null;
//    if($notOnBoard === null)
//    {
//        echo "Wrong coordinates!". PHP_EOL;
//        exit;
//    }
//
//    if ($board[$coordinatesRow][$coordinatesColumn] == 'x' || $board[$coordinatesRow][$coordinatesColumn] == 'o' )
//    {
//        echo "Coordinates are taken, choose different" . PHP_EOL;
//    }else {
//        $board[$coordinatesRow][$coordinatesColumn] = $turn;
//        $count++;
//    }
//
//if (in_array("-", $board[0]) || in_array("-", $board[1]) || in_array("-", $board[2]) ) {
//
//
//    if ($board[0][0] == $board[0][1] && $board[0][1] == $board[0][2] && $board[0][2] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[0][0] == $board[0][1] && $board[0][1] == $board[0][2] && $board[0][2] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[1][0] == $board[1][1] && $board[1][1] == $board[1][2] && $board[1][2] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[2][0] == $board[2][1] && $board[2][1] == $board[2][2] && $board[2][2] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[0][0] == $board[1][0] && $board[1][0] == $board[2][0] && $board[2][0] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[0][1] == $board[1][1] && $board[1][1] == $board[2][1] && $board[2][1] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[0][2] == $board[1][2] && $board[1][2] == $board[2][2] && $board[2][2] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[0][0] == $board[1][1] && $board[1][1] == $board[2][2] && $board[2][2] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//    if ($board[0][2] == $board[1][1] && $board[1][1] == $board[2][0] && $board[2][0] != "-") {
//        echo "{$turn} won the game" . PHP_EOL;
//        exit;
//    }
//} else
//{
//    echo "It`s a tie!" .PHP_EOL;
//    exit;
//}
//}