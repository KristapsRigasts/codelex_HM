<?php
class Date
{
    private string $day;
    private string $month;
    private string $year;

    public function __construct($day, $month, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function getYear(): string
    {
        return $this->year;
    }


    public function displayDate(): string
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}";
    }
}


