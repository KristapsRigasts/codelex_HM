<?php
class Player
{
    private array $cards;

    public function addCards(Card $card)
    {
        $this->cards[] = $card;
    }
    public function getCards(): array
    {
        return $this->cards;
    }

    public function disBand()
    {
        $symbols =[];
        foreach ($this->cards as $card)
        {
            $symbols[] = $card->getSymbol() . $card->getcolor();
        }

        $uniqueCardsCount= array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count)
        {
            if ($count ===1) continue;
            if ($count ===2 || $count === 4)
            {
                foreach ($this->cards as $index => $card)
                {
                    if ($card->getSymbol() . $card->getcolor() === (string) $symbol )
                    {
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count ===3)
            {
                for ($i=0; $i<2; $i++)
                {
                    foreach ($this->cards as $index => $card)
                    {
                        if ($card->getSymbol() . $card->getcolor() === (string) $symbol)
                        {
                            unset($this->cards[$index]);
                            break;
                        }
                    }

                }

            }
        }
    }
    public function pickCardFromPlayer(): Card
    {

        shuffle($this->cards);
        $card = $this->cards[0];
        array_splice($this->cards,0,1);

        return $card;
    }
}