<?php

class Board
{
    private array $board;

    public function __construct($board)
    {
        $this->board = $board;
    }

    public function setBoard(Player $options): void
    {
        foreach ($this->board as $rowIndex => $item) {
            foreach ($item as $columnIndex => $value) {
                $this->board[$rowIndex][$columnIndex] = array_rand($options->getOptions());
            }
        }
    }

    public function display_board(): void
    {
        foreach ($this->board as $value) {
            foreach ($value as $item)
                echo "$item ";
            echo PHP_EOL;
        }
    }

    public function getBoard(): array
    {
        return $this->board;
    }
}

class Player
{
    private array $options;
    private int $moneyOnHand;
    private int $spinCost;

    public function __construct($options, $moneyOnHand, $spinCost)
    {
        $this->options = $options;
        $this->moneyOnHand = $moneyOnHand;
        $this->spinCost = $spinCost;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getMoneyOnHand(): int
    {
        return $this->moneyOnHand;
    }

    public function setMoneyOnHand(int $moneyOnHand): void
    {
        $this->moneyOnHand = $moneyOnHand;
    }

    public function getSpinCost(): int
    {
        return $this->spinCost;
    }

    public function setSpinCost(int $spinCost): void
    {
        $this->spinCost = $spinCost;
    }
}

class Combinations
{
    private array $combinations;

    public function __construct($combinations)
    {
        $this->combinations = $combinations;
    }

    public function createCombinationBoard(Board $board): array
    {
        $combinationBoard = [];
        foreach ($this->combinations as $index => $combination) {
            foreach ($combination as $r => $c) {
                $combinationBoard[$index][] = $board->getBoard()[$c][$r];
            }
        }
        return $combinationBoard;
    }

    public function calculateWinning($combinationBoard, Player $options, Player $spinCost): int
    {
        $playerWonAmount = 0;
        foreach ($combinationBoard as $combination) {
            if (count(array_unique($combination)) === 1) {
                $playerWonAmount += $options->getOptions()[$combination[0]] * $spinCost->getSpinCost();
            }
        }
        return $playerWonAmount;
    }
}

echo "[1] 3x3" . PHP_EOL;
echo "[2] 3x4" . PHP_EOL;
echo "[Any] to exit" . PHP_EOL;
$chooseSize = readline('What size slot machine you would like to play?');
echo PHP_EOL;

switch ($chooseSize) {
    case 1:
        $board = new Board(array_fill(0, 3, array_fill(0, 3, '-')));
        $playerAndOptions = new Player(["A" => 5, "B" => 10, "C" => 20], 20, 1);
        $combinations = new Combinations([
            [0, 0, 0],
            [1, 1, 1],
            [2, 2, 2],
            [0, 1, 2],
            [2, 1, 0]
        ]);
        break;

    case 2:
        $board = new Board(array_fill(0, 3, array_fill(0, 4, '-')));
        $playerAndOptions = new Player(["A" => 5, "B" => 10, "C" => 20, "D" => 50], 20, 1);
        $combinations = new Combinations([
            [0, 0, 0, 0],
            [1, 1, 1, 1],
            [2, 2, 2, 2],
            [0, 1, 2, 2],
            [2, 1, 0, 0]
        ]);
        break;

    default:
        exit;
}

while (true) {
    echo "You have {$playerAndOptions->getMoneyOnHand()} $" . PHP_EOL;
    echo "[1] Play the slot machine" . PHP_EOL;
    echo "[2] Change spin cost" . PHP_EOL;
    echo "[Any] Cash out exit" . PHP_EOL;
    $playerChoice = readline();

    switch ($playerChoice) {

        case 1:
            if ($playerAndOptions->getSpinCost() > $playerAndOptions->getMoneyOnHand()) {
                echo "You do not have that much money, if You want you can change spin cost or exit" . PHP_EOL;
                break;
            }
            $board->setBoard($playerAndOptions);

            $board->display_board();
            $playerAndOptions->setMoneyOnHand($playerAndOptions->getMoneyOnHand() - $playerAndOptions->getSpinCost());

            $combinationBoard = $combinations->createCombinationBoard($board);
            $playerWonAmount = $combinations->calculateWinning($combinationBoard, $playerAndOptions, $playerAndOptions);

            if ($playerWonAmount > 0) {
                $playerAndOptions->setMoneyOnHand($playerAndOptions->getMoneyOnHand() + $playerWonAmount);
                echo "You won {$playerWonAmount} $" . PHP_EOL;
            } else {
                echo "You did not have any combinations" . PHP_EOL;
            }

            break;
        case 2:
            echo "You have {$playerAndOptions->getMoneyOnHand()} $" . PHP_EOL;
            $chanceToChangeSpinCost = readline("Enter your chosen spin cost (multiplier)");

            if ($chanceToChangeSpinCost <= $playerAndOptions->getMoneyOnHand()) {

                $playerAndOptions->setSpinCost($chanceToChangeSpinCost);
                echo "Your spin cost is changed to {$playerAndOptions->getSpinCost()}" . PHP_EOL;
            } else {
                echo "Sorry, you don`t have that much money" . PHP_EOL;
            }

            break;

        default:
            echo "Thank you for playing. Exiting" . PHP_EOL;
            exit;

    }
}