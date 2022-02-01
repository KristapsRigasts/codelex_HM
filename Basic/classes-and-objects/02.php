<?php
class Point
{
    private int $x;
    private int $y;
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function getX()
    {
        return $this->x;
    }
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    /**
     * @param int $y
     */
    public function setY(int $y): void
    {
        $this->y = $y;
    }

}
class Swap
{
   public function swapPoint (Point $point1, Point $point2)
    {
        $temp = new Point($point1->getX(), $point1->getY());
        $temp2 = new Point($point2->getX(), $point2->getY());

        $point1->setX($temp2->getX());
        $point1->setY($temp2->getY());

        $point2->setX($temp->getX());
        $point2->setY($temp->getY());

    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$swap = new Swap();

$swap->swapPoint($p1,$p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")" . PHP_EOL;
echo "(" . $p2->getX() . ", " . $p2->getY() . ")" . PHP_EOL;
