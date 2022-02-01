<?php
//$personData = explode( ',',file_get_contents('juris.txt'));

[$name, $cash] = explode(',', file_get_contents('juris.txt'));

$person = new stdClass();
$person->name = $name; //$personData[0]
$person->cash = (int) $cash; //$personData[1]


function createProduct(string $name, int $price, string $description, int $amount): stdClass
{
    $products = new stdClass();
    $products->name = $name;
    $products->price = $price;
    $products->description = $description;
    $products->amount = $amount;
    return $products;
}

$products =[];

//nolasa produktus no csv faila
$row = 1;
if (($handle = fopen("product.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {

       [$name, $price, $description, $amount] = $data;
       $products[] = createProduct($name, (int) $price, $description, (int) $amount);
    }
    fclose($handle);
}

echo "{$person->name} has {$person->cash} $" . PHP_EOL;

$basket =[];

if(file_exists('basket.txt')) {
    $basket = explode(',', file_get_contents('basket.txt'));
}

while (true)
{
    echo '[1] Purchase' .PHP_EOL;
    echo '[2] Checkout' .PHP_EOL;
    echo '[3] Product description' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;
    $option = (int) readline("Select an option: ");

    switch($option) {
        case 1:
            foreach ($products as $index => $product) {
                echo "[{$index}] {$product->name} {$product->price}$" . PHP_EOL;
            }
            $selectedProductIndex = (int)readline("Select product: ");
            $product = $products[$selectedProductIndex] ?? null;

            if ($product === null) {
                echo "Product not found" . PHP_EOL;
                exit;
            }


            $basket[] = $selectedProductIndex;

            echo "Added $product->name to the basket" . PHP_EOL;

            break;

        case 2:
            $totalSum = 0;
            foreach($basket as $productIndex)
            {
                $product = $products[$productIndex];
                $totalSum += $product->price;
                echo $product->name .PHP_EOL;
            }
            echo '----------------' . PHP_EOL;
            echo "Total: {$totalSum} $" . PHP_EOL;

            if ($person->cash >= $totalSum)
            {
                echo 'Successful payment.';
            } else {
                echo 'Payment failed. Not enough cash.';
            }
            echo PHP_EOL;
//clear/delete file
            if(file_exists('basket.txt')) {
                unlink('basket.txt');
            }
            exit;
            break;
        case 3:
            foreach ($products as $index => $product) {
                echo "[{$index}] {$product->name} " . PHP_EOL;
            }
            $selectedProductIndex = (int)readline("Select product: ");
            $product = $products[$selectedProductIndex] ?? null;
            echo "{$product->name} {$product->price}$ {$product->description}" . PHP_EOL;
            echo "---------------------" . PHP_EOL;

            if ($product === null) {
                echo "Product not found" . PHP_EOL;
                exit;
            } break;


        default:
            $productIndexes = implode(',', $basket);
            file_put_contents('basket.txt',$productIndexes);
            exit;

    }

}