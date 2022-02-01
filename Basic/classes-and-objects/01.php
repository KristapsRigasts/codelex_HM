<?php

class Products
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct($name, $startPrice, $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStartPrice(): float
    {
        return $this->startPrice;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function setStartPrice(int $price): void
    {
        $this->startPrice = $price;
    }
}

class Shop
{
    private array $productList = [];

    public function addProduct($product)
    {
        $this->productList[] = $product;
    }

    public function printProductList(): void
    {
        foreach ($this->productList as $index => $product) {
            echo "[{$index}] {$product->getName()}, price {$product->getStartPrice()}, amount {$product->getAmount()}" . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function printProduct(): array
    {
        return $this->productList;
    }
}

$shopList = new Shop();

$banana = new Products ('Banana', 1.1, 13);
$logitech = new Products ('Logitech mouse', 70.00, 14);
$iPhone = new Products ('iPhone 5s', 999.99, 3);
$epson = new Products ('Epson EB-U05', 440.46, 1);

$shopList->addProduct($banana);
$shopList->addProduct($logitech);
$shopList->addProduct($iPhone);
$shopList->addProduct($epson);

while (true) {

    echo "[1] View all products." . PHP_EOL;
    echo "[2] Change product amount." . PHP_EOL;
    echo "[3] Change product price." . PHP_EOL;
    echo "[Any] To exit." . PHP_EOL;
    echo "--------------------------------" . PHP_EOL;

    $option = readline('What you would like to do?: ');
    echo PHP_EOL;


    switch ($option) {
        case 1:

            $shopList->printProductList();

            break;

        case 2:

            $shopList->printProductList();

            $productOption = readline('Enter product which amount you want to change: ');

            $amountToChange = readline("Enter new amount for {$productOption}: ");
            echo PHP_EOL;

            $shopList->printProduct()[$productOption]->setAmount($amountToChange);

            break;

        case 3:

            $shopList->printProductList();

            $productOption = readline('Enter product which price you want to change: ');

            $priceToChange = readline("Enter new price for {$productOption}: ");
            echo PHP_EOL;

            $shopList->printProduct()[$productOption]->setStartPrice($priceToChange);

            break;

        default:

            exit;
    }
}
