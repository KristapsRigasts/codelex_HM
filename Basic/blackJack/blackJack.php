<?php


class Cards
{
    private array $cardsOnDesk;
    public function __construct($cardsOnDesk)
    {
        $this->cardsOnDesk =$cardsOnDesk;
    }

    public function getCardsOnDesk(): array
    {
        return $this->cardsOnDesk;
    }

    public function setCardsOnDesk(array $cardsOnDesk): void
    {
        $this->cardsOnDesk = $cardsOnDesk;
    }
    public function pickACard($cards)
{
    shuffle($cards);
    $pickCard = $cards[0];
    array_splice($cards, 0, 1);
    return [$pickCard,$cards];
}
}
class Player
{

    private array $playerCards=[];

    public function getPlayerCards(): array
    {
        return $this->playerCards;
    }

    public function addPlayerCards($playerCard): void
    {
        $this->playerCards[] = $playerCard;
    }
    public function countCards()
    {
        return array_sum($this->playerCards);

    }
}
class Computer
{
    private array $computerCards=[];

    public function getComputerCards(): array
    {
        return $this->computerCards;
    }

    public function addComputerCards($playerCards): void
    {
        $this->computerCards[] = $playerCards;
    }
    public function countCards()
    {
         return array_sum($this->computerCards);

    }
}
$cardsForDesk =[ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'jack'=>10, 'queen'=>10, 'king'=>10, 'ace'=>10];
$cardsOnDesk =new Cards($cardsForDesk);
$player =new Player();
$computer = new Computer();
$computerCount =0;

list($pickCard,$cards) = $cardsOnDesk->pickACard($cardsForDesk);
$cardsOnDesk->setCardsOnDesk($cards);
$player->addPlayerCards($pickCard);
list($pickCard,$cards) = $cardsOnDesk->pickACard($cardsForDesk);
$cardsOnDesk->setCardsOnDesk($cards);
$player->addPlayerCards($pickCard);


foreach ($player->getPlayerCards() as $card)
{
    echo "$card ";
}
echo "Total: {$player->countCards()}". PHP_EOL;
while (true)
{
    if($player->countCards() > 21)
    {
        echo 'You lost';
        exit;}
echo '[1] Pick one more' .PHP_EOL;
echo '[2] Hold' .PHP_EOL;
$option = readline('Enter your option:');

switch($option)
{
    case 1:

            list($pickCard, $cards) = $cardsOnDesk->pickACard($cardsForDesk);
            $cardsOnDesk->setCardsOnDesk($cards);
            $player->addPlayerCards($pickCard);
            echo "Player: ";
            foreach ($player->getPlayerCards() as $card) {
                echo "$card ";
            }
            echo "Total: {$player->countCards()}" . PHP_EOL;

        break;

    case 2:
        while ($computerCount <=17) {
            list($pickCard, $cards) = $cardsOnDesk->pickACard($cardsForDesk);
            $cardsOnDesk->setCardsOnDesk($cards);
            $computer->addComputerCards($pickCard);
            echo 'Computer ';
            foreach ($computer->getComputerCards() as $card) {
                echo "$card ";
            }
            echo "Total: {$computer->countCards()}" . PHP_EOL;

            $computerCount += $computer->countCards();
            sleep(1);
        }
            if ($computer->countCards() <= 21 && $computer->countCards() > $player->countCards()) {
                echo "You lost! Computer:{$computer->countCards()}, player {$player->countCards()}";
            } else if ($computer->getComputerCards() == $player->countCards()) {
                echo "It was a tie! Computer:{$computer->countCards()}, player {$player->countCards()}";
            } else {
                echo "You won! Computer:{$computer->countCards()}, player {$player->countCards()}";
        }
    default:
        exit;
        break;

}}






//    foreach ($cards as $i => $cards1) {
//        $cardsOnDeck[$i] = array_rand($cards1, 1);
////        $z=array_slice($cards,$cardsOnDeck[$i],1);
////var_dump($z);
//    }
//    for ($i=0; $i<=1;$i++) {
//        $i++;
//        foreach ($cardsOnDeck as $ii => $value) {
//            $z = rand($value, 1);
//            echo "$ii $z";
//
//        }
//    }
//$playerCard[] = array_rand($cardsOnDeck,1);
//    var_dump($cardsOnDeck);



//var_dump($cardsOnDeck);

//var_dump($cardsOnDeck);
//$arr =array_rand($cards1, 1);
//var_dump($arr);
