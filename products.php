<?php
    require_once 'includes/Autoloader.php';
    use classes\AbstractProduct;
    use classes\Book;
    use classes\DVD;
    use classes\Furniture;
    use classes\products;

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['productType'];
$size = $_POST['size']?$_POST['size']:null;
$weight = $_POST['weight']?$_POST['weight']:null;
$height = $_POST['height']?$_POST['height']:null;
$width = $_POST['width']?$_POST['width']:null;
$length = $_POST['length']?$_POST['length']:null;

// $dvd = new DVD($sku, $name, $price, $type, $size);
// $book = new Book($sku, $name, $price, $type, $weight);
// $furniture = new Furniture($sku, $name, $price, $type, $height, $width, $length);

$productData = [
    'sku' => $sku,
    'name' => $name,
    'price' => $price,
];

// Use a switch statement to handle different product types
switch ($type) {
    case 'Dvd':
        $productData['size'] = $size;
        break;
    case 'Book':
        $productData['weight'] = $weight;
        break;
    case 'Furniture':
        $productData['height'] = $height;
        $productData['width'] = $width;
        $productData['length'] = $length;
        break;
    default:
        // Handle any other product types or errors here
        break;
}

// Add the product data to an array based on its type in $productsByType
$productsByType = [];

if (!empty($type)) {
    $productsByType[$type][] = $productData;
}

$products = new products();
$products = $products->addProduct($productsByType);

header("Location:index.php");


?>