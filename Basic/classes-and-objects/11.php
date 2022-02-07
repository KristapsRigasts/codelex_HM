<?php
class Account
{
    private string $name;
    private float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return round($this->balance,2);
    }
    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        $this->balance -= $amount;
    }
    public static function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->withdraw($howMuch);
        $to->deposit($howMuch);
    }
}
$firstAccount = new Account('First account', 100.0);
$firstAccount->deposit(20);
echo "{$firstAccount->getName()} | Balance: {$firstAccount->getBalance()} $" . PHP_EOL;
echo "------------------------------------------" . PHP_EOL;

$mattAccount = new Account("Matt's account", 1000);
$myAccount = new Account('My account',0);
$mattAccount->withdraw(100);
$myAccount->deposit(100);

echo "{$mattAccount->getName()} | Balance: {$mattAccount->getBalance()} $" . PHP_EOL;
echo "{$myAccount->getName()} | Balance: {$myAccount->getBalance()} $" . PHP_EOL;
echo "------------------------------------------" . PHP_EOL;

$aAccount = new Account('A', 100);
$bAccount = new Account('B', 0);
$cAccount = new Account('C',0);

Account::transfer($aAccount, $bAccount, 50);
Account::transfer($bAccount, $cAccount, 25 );

echo "{$aAccount->getName()} | Balance: {$aAccount->getBalance()} $" . PHP_EOL;
echo "{$bAccount->getName()} | Balance: {$bAccount->getBalance()} $" . PHP_EOL;
echo "{$cAccount->getName()} | Balance: {$cAccount->getBalance()} $" . PHP_EOL;
echo "------------------------------------------" . PHP_EOL;



