<?php
class Cards
{
    private string $name;
    private string $card;
    public function __construct($name, $card)
    {
        $this->name =$name;
        $this->card =$card;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCard(): string
    {
        return $this->card;
    }
}
class CardsInDeck
{
    private array $cards;

    public function __construct()

    {
        $this->cards[]= new Cards('diamond', 1);
        $this->cards[]= new Cards('diamond', 2);
        $this->cards[]= new Cards('diamond', 3);
        $this->cards[]= new Cards('diamond', 4);
        $this->cards[]= new Cards('diamond', 5);
        $this->cards[]= new Cards('diamond', 6);
        $this->cards[]= new Cards('diamond', 7);
        $this->cards[]= new Cards('diamond', 8);
        $this->cards[]= new Cards('diamond', 9);
        $this->cards[]= new Cards('diamond jack', 10);
        $this->cards[]= new Cards('diamond queen', 10);
        $this->cards[]= new Cards('diamond king', 10);
        $this->cards[]= new Cards('diamond ace', 11);

        $this->cards[]= new Cards('spade', 1);
        $this->cards[]= new Cards('spade', 2);
        $this->cards[]= new Cards('spade', 3);
        $this->cards[]= new Cards('spade', 4);
        $this->cards[]= new Cards('spade', 5);
        $this->cards[]= new Cards('spade', 6);
        $this->cards[]= new Cards('spade', 7);
        $this->cards[]= new Cards('spade', 8);
        $this->cards[]= new Cards('spade', 9);
        $this->cards[]= new Cards('spade jack', 10);
        $this->cards[]= new Cards('spade queen', 10);
        $this->cards[]= new Cards('spade king', 10);
        $this->cards[]= new Cards('spade ace', 11);

        $this->cards[]= new Cards('heart', 1);
        $this->cards[]= new Cards('heart', 2);
        $this->cards[]= new Cards('heart', 3);
        $this->cards[]= new Cards('heart', 4);
        $this->cards[]= new Cards('heart', 5);
        $this->cards[]= new Cards('heart', 6);
        $this->cards[]= new Cards('heart', 7);
        $this->cards[]= new Cards('heart', 8);
        $this->cards[]= new Cards('heart', 9);
        $this->cards[]= new Cards('heart jack', 10);
        $this->cards[]= new Cards('heart queen', 10);
        $this->cards[]= new Cards('heart king', 10);
        $this->cards[]= new Cards('heart ace', 11);

        $this->cards[]= new Cards('clubs', 1);
        $this->cards[]= new Cards('clubs', 2);
        $this->cards[]= new Cards('clubs', 3);
        $this->cards[]= new Cards('clubs', 4);
        $this->cards[]= new Cards('clubs', 5);
        $this->cards[]= new Cards('clubs', 6);
        $this->cards[]= new Cards('clubs', 7);
        $this->cards[]= new Cards('clubs', 8);
        $this->cards[]= new Cards('clubs', 9);
        $this->cards[]= new Cards('clubs jack', 10);
        $this->cards[]= new Cards('clubs queen', 10);
        $this->cards[]= new Cards('clubs king', 10);
        $this->cards[]= new Cards('clubs ace', 11);

    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function setCards(array $cards): void
    {
        $this->cards = $cards;
    }
    public function shuffle(): array
    {
         shuffle($this->cards);
         return $this->cards;
    }
public function getRandomCard(): Cards
{
    return $this->cards[0];

}
public function removeRandomCard(): array
{
    array_splice($this->cards,0,1);
    return $this->cards;
}
}
class Player
{
    private array $playerCards;


    public function addPlayerCard(Cards $cardInDeck)
    {

        $this->playerCards[] = $cardInDeck;
    }

    public function getPlayerCards(): array
    {
        return $this->playerCards;
    }
    public function countPlayerCards(): int
    {
        $sum = 0;
        foreach ($this->playerCards as $card) {

            $sum += $card->getCard();
        }return $sum;
    }
}
class Computer
{
    private array $computerCards;


    public function addComputerCard(Cards $cardInDeck)
{

    $this->computerCards[] = $cardInDeck;
}

    public function getComputerCards(): array
    {
        return $this->computerCards;
    }
    public function countComputerCards(): int
    {
        $sum = 0;
        foreach ($this->computerCards as $card) {

            $sum += $card->getCard();
        }return $sum;
    }
}

$cardsInDeck =new CardsInDeck();
$playerCards = new Player();
$computerCards = new Computer();

$cardsInDeck->setCards($cardsInDeck->shuffle());



$playerCards->addPlayerCard($cardsInDeck->getRandomCard());
$cardsInDeck->setCards($cardsInDeck->removeRandomCard());
$playerCards->addPlayerCard($cardsInDeck->getRandomCard());
$cardsInDeck->setCards($cardsInDeck->removeRandomCard());
$computerCards->addComputerCard($cardsInDeck->getRandomCard());
$cardsInDeck->setCards($cardsInDeck->removeRandomCard());

    foreach ($playerCards->getPlayerCards() as $card) {
        echo "[{$card->getName()}] {$card->getCard()} ";
    }
    echo "   Total: {$playerCards->countPlayerCards()}";
    echo PHP_EOL;
while(true) {

    if ($playerCards->countPlayerCards() > 21) {
        echo 'You lost';
        echo PHP_EOL;
        exit;
    }

    echo '[1] Pick one more' . PHP_EOL;
    echo '[2] Hold' . PHP_EOL;
    $option = readline('Enter your option:');

    switch ($option) {
        case 1:

            $playerCards->addPlayerCard($cardsInDeck->getRandomCard());
            $cardsInDeck->setCards($cardsInDeck->removeRandomCard());
            foreach ($playerCards->getPlayerCards() as $card) {
                echo " [{$card->getName()}] {$card->getCard()} ";
            }
            echo "   Total: {$playerCards->countPlayerCards()}";
            echo PHP_EOL;

            break;

        case 2:
            while ($computerCards->countComputerCards() < 21) {
                if($computerCards->countComputerCards() >= 17) return;
                $computerCards->addComputerCard($cardsInDeck->getRandomCard());
                $cardsInDeck->setCards($cardsInDeck->removeRandomCard());
                echo "Computer: ";
                foreach ($computerCards->getComputerCards() as $card) {
                    echo " [{$card->getName()}] {$card->getCard() }";
                }
                echo "   Total: {$computerCards->countComputerCards()}";
                echo PHP_EOL;

                sleep(1);
           }
            if ($computerCards->countComputerCards() <= 21 && $computerCards->countComputerCards() > $playerCards->countPlayerCards()) {
                echo "You lost! Computer:{$computerCards->countComputerCards()}, player {$playerCards->countPlayerCards()}";
                echo PHP_EOL;
            } else if ($computerCards->countComputerCards() == $playerCards->countPlayerCards()) {
                echo "It was a tie! Computer: {$computerCards->countComputerCards()}, player: {$playerCards->countPlayerCards()}";
                echo PHP_EOL;
            } else {
                echo "You won! Computer:{$computerCards->countComputerCards()}, player {$playerCards->countPlayerCards()}";
                echo PHP_EOL;
            }exit;

            break;

        default:
            exit;
    }
}