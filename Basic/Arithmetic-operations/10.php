<?php
//Design a Geometry class with the following methods:
//A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//Area = π * r * 2
//Use Math.PI for π and r for the radius of the circle
//A static method that accepts the length and width of a rectangle and returns the area of the rectangle.
//Use the following formula:
//Area = Length x Width
//A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle.
//Use the following formula:
//Area = Base x Height x 0.5
class Geometry{
    static function areaOfCircle(float $radius): float
    {
        return pi() * $radius * $radius;
    }
    static function areaOfRectangle(float $length, float $width ): float
    {
        return $length * $width;
    }
    static function areaOfTriangle(float $base, float $height): float
    {
        return $base * $height * 0.5;
    }
}
while (true) {
    echo PHP_EOL;
    echo "Geometry Calculator:" . PHP_EOL;
    echo PHP_EOL;
    echo "[1] Calculate the Area of a Circle" . PHP_EOL;
    echo "[2] Calculate the Area of a Rectangle" . PHP_EOL;
    echo "[3] Calculate the Area of a Triangle" . PHP_EOL;
    echo "[4] Quit" . PHP_EOL;
    $choice = (int)readline("Enter your choice (1-4) : ");

    if ($choice == 1) {
        calculateCircle();
    } else if ($choice == 2) {
        calculateRectangle();
    } else if ($choice == 3) {
        calculateTriangle();
    } else if ($choice == 4) {
        exiting();
    } else {
        echo "Sorry, Geometry Calculator does not have this function. Exiting." . PHP_EOL;
        exit;
    };
}

function calculateCircle()
{
    echo "Calculate the Area of a Circle" . PHP_EOL;
    $radius = (float) readline("Enter radius of Circle: ");
    if ($radius < 0)
    {
        echo "Error: Negative number was entered";
    }
    else {
        echo "Area of Circle is with radius {$radius} is " . Geometry::areaOfCircle($radius) . PHP_EOL;
    }
}
function calculateRectangle()
{
    echo "Calculate the Area of a Rectangle" . PHP_EOL;
    $length = (float) readline("Enter length of Rectangle: ");
    $width = (float) readline("Enter width of Rectangle: ");
    if ($length < 0 || $width < 0)
    {
        echo "Error: Negative number was entered";
    }
    else {
        echo "Area of Rectangle with length {$length} and width {$width} is " . Geometry::areaOfRectangle($length, $width) . PHP_EOL;
    }
}
function calculateTriangle()
{
    echo "Calculate the Area of a Triangle" . PHP_EOL;
    $base = (float) readline("Enter base of Rectangle: ");
    $height = (float) readline("Enter height of Rectangle: ");
    if ($base < 0 || $height < 0)
    {
        echo "Error: Negative number was entered";
    }
    else {
        echo "Area of Triangle with base {$base} and height {$height} is " . Geometry::areaOfTriangle($base, $height) . PHP_EOL;
    }
}
function exiting()
{
    echo "Exiting Geometry Calculator" . PHP_EOL;
    exit;
}