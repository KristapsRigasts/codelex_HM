<?php
Class Product
{
    public string $productName;
    public float $price;
    public int $amount;
    public function __construct($productName, $price, $amount)
    {
        $this->productName = $productName;
        $this->price =$price;
        $this->amount = $amount;
    }
}
class Shop
{
    public array $shop = [];

    public function addProducts(Product $product): void
    {
        $this->shop[] = $product;
    }
    public function totalSum(): float
    {
        $sum =0;
        foreach ($this->shop as $product)
        {
            $sum += $product->price * $product->amount;
        } return $sum;
    }
    public function totalAmount(): int
    {
        $total = 0;
        foreach ($this->shop as $product)
        {
            $total += $product->amount;
        } return $total;
    }
}

$inShop = new Shop();
$inShop->addProducts(new Product('maize', 0.83, 6));
$inShop->addProducts(new Product('piens', 0.65, 8));
$inShop->addProducts(new Product('ūdens', 0.39, 20));

foreach ($inShop as $inventory) {
    foreach ($inventory as $product) {
        echo "{$product->productName} {$product->price}$ {$product->amount}" . PHP_EOL;
    }
}
echo '-----------------------' . PHP_EOL;
echo 'Total: ' . $inShop->totalSum() . '$ ' . $inShop->totalAmount() . PHP_EOL;
