<?php

class BlackPeter
{
    private Deck $deck;

    public function __construct()
    {
        $this->deck = New Deck;
    }

    public function deal(): Card
    {
        return $this->deck->draw();
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }


}