<?php
class BankAccount
{
    private string $name;
    private float $balance;

public function __construct($name, $balance)
{
    $this->name = $name;
    $this->balance = $balance;
}
    public function showUserNameAndBalance(): string
    {
        $amount= $this->balance;
        if($amount < 0)
        {
            $amount = abs($amount);
        }
        return $this->name . ', $' . number_format($amount, 2);
    }
}

$ben = new BankAccount('Benson', -17.5);
echo $ben->showUserNameAndBalance() . PHP_EOL;

$alfonso = new BankAccount('Alfonso', 17.2);
echo $alfonso->showUserNameAndBalance() . PHP_EOL;
