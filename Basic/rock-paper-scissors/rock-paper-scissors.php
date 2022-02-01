<?php

$chooseFrom = ['rock', 'paper', 'scissors', 'lizard', 'spock'];
$computerChooseFrom = $chooseFrom;
shuffle($computerChooseFrom);
$computerChoice = $computerChooseFrom[0];

$winingCombinations = [
    'rock' => ['scissors', 'lizard'],
    'paper' => ['rock', 'lizard'],
    'scissors' => ['paper', 'spock'],
    'lizard' => ['scissors', 'rock']
];

function weHaveWinner(string $playerDecided, array $winingCombinations,string $computerChoice): bool
{
    if (in_array($computerChoice,$winingCombinations[$playerDecided]))
    {
        return true;
    } return false;
}
$result = [];

while (true){

echo '[1]Play' . PHP_EOL;
echo '[2] Exit' . PHP_EOL;
$continue = readline('Enter your wish: ');

switch ($continue){
    case 1:
        foreach ($chooseFrom as $index => $item)
        {
            echo "[{$index}] {$item}" . PHP_EOL;
        }
        $playerChoice =(int) readline('Enter your choice: ');
        $option = $chooseFrom[$playerChoice] ?? null;

        if ($option === null) {
            echo "This option does not exist." . PHP_EOL;
            exit;

        }
        $playerDecided =$chooseFrom[$playerChoice];

    if ($playerDecided === $computerChoice){
        echo "It`s a tie. You both chose {$playerDecided}" . PHP_EOL;
    $result[] = $playerDecided;
    $result[] = $computerChoice;
    $result[] = 'tie';
}
    else if (weHaveWinner($playerDecided, $winingCombinations, $computerChoice))
    {
        echo "You won! I had {$computerChoice}"  . PHP_EOL;
        $result[] = $playerDecided;
        $result[] = $computerChoice;
        $result[] = 'won';
    }else {

    echo "Sorry you lost. I had {$computerChoice}" . PHP_EOL;
        $result[] = $playerDecided;
        $result[] = $computerChoice;
        $result[] = 'lost';
    }
    break;
    case 2:
echo 'Exiting and saving results.' .PHP_EOL;
$resultOutput = implode(',', $result);
file_put_contents('log.txt',$resultOutput);
        exit;
        break;
    default:
        break;
}

}



