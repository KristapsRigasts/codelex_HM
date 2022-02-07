<?php

require_once 'Card.php';
require_once 'Deck.php';
require_once 'Player.php';
require_once 'BlackPeter.php';


$game = new BlackPeter();
$player = new Player();
$npc = new Player();

// Deal Cards

for ($i = 0; $i < 25; $i++) {
    $player->addCards($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCards($game->deal());
}

$count = 1;

while (count($player->getCards()) > 1 || count($npc->getCards()) > 1) {
    echo "Player: ";
    foreach ($player->getCards() as $card) {
        echo "[{$card->getDisplayValue()}] ";
    }
    echo PHP_EOL;
    echo "Npc: ";
    foreach ($npc->getCards() as $card) {
        echo "[{$card->getDisplayValue()}] ";
    }
    echo PHP_EOL;
echo "-------------------------------------------------" . PHP_EOL;

    $player->disBand();
    $npc->disBand();

    switch ($count) {
        case $count % 2 === 0:

            $player->addCards($npc->pickCardFromPlayer());
            sleep(1);
            $player->disBand();
            $count++;

            break;

        case $count % 2 != 0:

            $npc->addCards($player->pickCardFromPlayer());
            sleep(1);
            $npc->disBand();
            $count++;

            break;

        default:
            break;
    }
}

if (count($player->getCards()) === 0) {
    echo "Player won!" . PHP_EOL;
    echo "Npc has ";
    foreach ($npc->getCards() as $card) {
        echo "[{$card->getDisplayValue()}] ";
    }
    echo PHP_EOL;

} else {
    echo "Npc won! " . PHP_EOL;
    echo "Player has ";
    foreach ($player->getCards() as $card) {
        echo "[{$card->getDisplayValue()}] ";
    }
    echo PHP_EOL;
}


