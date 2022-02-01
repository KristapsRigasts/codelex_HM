<?php
$players = ['A', 'B', 'C', 'D'];
$playerAmount = (int)readline("Enter player amount 1-4: ");
if ($playerAmount > 4 || $playerAmount < 2) {
    echo 'Invalid player amount.';
    exit;
}

$bet = (int)readline('Enter your bet amount: ');
$playersCompeting = array_slice($players, 0, $playerAmount);
echo "Players ready to go: ";
foreach ($playersCompeting as $play) {
    echo "{$play}  ";
}
echo PHP_EOL;

$betOn = (string)readline('Enter your winner: ');
if (!in_array($betOn, $playersCompeting)) {
    echo "Invalid player.";
    exit;
}

$move = rand(1, 3);
$track = array_fill(0, $playerAmount, array_fill(0, 15, '_'));
$stepCount = 0;
$trackWithPlayers = [];
$winnerTable = [];

foreach ($track as $key => $addPlayers) {
    $racers = array_replace($addPlayers, [0 => $players[$key]]);
    $trackWithPlayers [] = $racers;
}

function makeAMove(array $trackWithPlayers, array $players): array
{
    $newTrackWithPlayers = [];
    foreach ($trackWithPlayers as $index => $play) {
        if (end($play) === $players[$index]) {
            $newTrackWithPlayers[] = $play;

        } else {
            $key = array_search($players[$index], $play);
            $out = array_slice($play, $key, 1);
            $play[$key] = '_';
            $move = $key + rand(1, 3);
            array_splice($play, $move, 1, $out);
            $newTrackWithPlayers[] = $play;
        }
    }
    return $newTrackWithPlayers;
}

while ($playerAmount != sizeof($winnerTable)) {

    foreach ($trackWithPlayers as $key => $track) {
        echo "Player $players[$key] : ";
        foreach ($track as $value) {
            echo $value;
        }
        echo PHP_EOL;
    }

    $trackWithPlayers = makeAMove($trackWithPlayers, $players);

    foreach ($trackWithPlayers as $key => $value) {
        if (end($value) === $players[$key] && !isset($winnerTable[$players[$key]])) {
            $winnerTable[$players[$key]] = $stepCount;
            echo "Player {$players[$key]} finished" . PHP_EOL;
        }
    }

    $stepCount += 1;
    sleep(1);
}

$winnerTable2 = [];

foreach ($winnerTable as $letter => $table) {
    $winnerTable2[$table][] = $letter;
}

$winnerTable3 = array_combine(range(1, count($winnerTable2)), array_values($winnerTable2));

echo "Finishing order: " . PHP_EOL;
foreach ($winnerTable3 as $count => $winners) {
    echo "{$count} place: ";
    foreach ($winners as $player) {
        echo " $player ";
    }
    echo PHP_EOL;
}
if (in_array($betOn, $winnerTable3[1])) {
    $moneyWon = $bet * sizeof($playersCompeting) * 5;
    echo "You bet on {$betOn} and won {$moneyWon} $." . PHP_EOL;
} else {
    echo "You did bet on {$betOn} but he did not finish first." . PHP_EOL;
}