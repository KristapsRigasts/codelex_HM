<?php

class SavingsAccount
{
    private float $balance;
    private int $annualInterestRate;
    private float $totalDepositSum = 0;
    private float $totalWithdrawalSum = 0;
    private float $totalInterestEarned = 0;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function withdrawal($amount): void
    {
        $this->balance -= $amount;
        $this->totalWithdrawalSum += $amount;
    }

    public function deposit($amount): void
    {
        $this->balance += $amount;
        $this->totalDepositSum += $amount;
    }

    public function getBalance(): float
    {

        return $this->balance;
    }

    /**
     * @return float|int
     */
    public function getTotalDepositSum()
    {
        return $this->totalDepositSum;
    }

    /**
     * @return float|int
     */
    public function getTotalWithdrawalSum()
    {
        return $this->totalWithdrawalSum;
    }

    /**
     * @return float|int
     */
    public function getTotalInterestEarned()
    {
        return $this->totalInterestEarned;
    }

    public function setAnnualInterestRate(float $annualInterestRate): void
    {
        $this->annualInterestRate = $annualInterestRate;
    }
    public function monthlyInterestRate(): void
    {
        $monthlyInterestRate = $this->annualInterestRate / 12;
        $monthlyInterest = $this->balance * $monthlyInterestRate;
        $this->balance += $monthlyInterest;
        $this->totalInterestEarned += $monthlyInterest;
    }
}

$moneyInAccount = (int) readline('How much money is in the account?: ');
$savingsAccount = new SavingsAccount($moneyInAccount);

$annualInterestRate = (int) readline('Enter the annual interest rate: ');
$savingsAccount->setAnnualInterestRate($annualInterestRate);

$openedAccountTime = (int) readline('How long has the account been opened? ');
$count =1;
while ($count <= $openedAccountTime)
{
    $depositedAmount = (int) readline("Enter amount deposited for month: {$count}: ");
    $savingsAccount->deposit($depositedAmount);

    $withdrawnAmount = (int) readline("Enter amount withdrawn for month: {$count}: ");
    $savingsAccount->withdrawal($withdrawnAmount);

    $savingsAccount->monthlyInterestRate();
    $count ++;

}

echo 'Total deposited: $' . number_format($savingsAccount->getTotalDepositSum(),
        2, '.', ',') . PHP_EOL;
echo 'Total withdrawn: $' .  number_format($savingsAccount->getTotalWithdrawalSum(),
        2, '.', ',') . PHP_EOL;
echo 'Interest earned: $' .  number_format($savingsAccount->getTotalInterestEarned(),
        2, '.', ',') . PHP_EOL;
echo 'Ending balance: $' .  number_format($savingsAccount->getBalance(),
        2, '.', ',') . PHP_EOL;

