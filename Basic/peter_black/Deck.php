<?php
class Deck
{
    private array $cards = [];
    private array $symbols = [
        '♣', '♦', '♥', '♠'
    ];

    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->shuffle();
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function draw(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        array_splice($this->cards, $randomCardIndex, 1);
        return $card;
    }

    private function shuffle(): void
    {
        $this->cards = [];
        $this->cards[] = new Card('♠', 'J','black');

        for ($i = 1; $i <= 12; $i++) {
            for ($j = 0; $j < 4; $j++) {
                switch ($i) {

                    case 11:

                        $this->cards[] = new Card($this->symbols[$j], 'Q', self::checkForColor($this->symbols[$j]));
                        break;
                    case 12:

                        $this->cards[] = new Card($this->symbols[$j], 'K', self::checkForColor($this->symbols[$j]));
                        break;
                    default:

                        $this->cards[] = new Card($this->symbols[$j], $i, self::checkForColor($this->symbols[$j]));
                        break;
                }
            }
        }
    }
    public static function checkForColor($symbol): string
    {
        if($symbol == '♠' || $symbol == '♣') {
        return 'black';
    }
    else {
        return 'red';
    }

    }

}