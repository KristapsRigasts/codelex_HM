<?php
//Foo Corporation needs a program to calculate how much to pay their hourly employees.
//The US Department of Labor requires that employees get paid time
//and a half for any hours over 40 that they work in a single week.
//For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay.
//The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
//Foo Corp requires that an employee not work more than 60 hours in a week.
//
//Summary
//An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
//For every hour over 40, they get overtime = (base pay) × 1.5.
//The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
//If the number of hours is greater than 60, print an error message.
function declareEmployee(string $name, float $basePay, float $workedHours ): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->basePay = $basePay;
    $person->workedHours = $workedHours;
    return $person;
}

$employee = [
    declareEmployee("Employee1", 7.5, 35),
    declareEmployee("Employee2", 8.2, 47),
    declareEmployee("Employee3", 10, 73)

];


function calculateEmployeeWage (float $basePay, float $hoursWorked) // kā pareizāk definēt return type??
{
$minimumWage = 8;
$maximumWorkingHours = 60;

if ($basePay < $minimumWage || $hoursWorked > $maximumWorkingHours)
{
    return "Error";
}
else {
    if ($hoursWorked > 40)
    {
      return $basePay * 40 + 1.5 * $basePay * ($hoursWorked - 40);

    }
    else
    {
      return $basePay * $hoursWorked;
    }
}
}

foreach ($employee as $worker)
{
    $salary= calculateEmployeeWage($worker->basePay, $worker->workedHours);
    echo  "{$worker->name} {$salary} $" . PHP_EOL;

}
