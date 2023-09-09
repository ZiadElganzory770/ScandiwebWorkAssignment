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

$dvd = new DVD($sku, $name, $price, $size);
$book = new Book($sku, $name, $price, $weight);
$furniture = new Furniture($sku, $name, $price, $height, $width, $length);
$productData = [];

// Use a switch statement to handle different product types
switch ($type) {
    case 'Dvd':
        $productData['sku'] = $dvd->getSKU();
        $productData['name'] = $dvd->getName();
        $productData['price'] = $dvd->getPrice();
        $productData['size'] = $dvd->getSize();
        $productData['type'] = $type;
        break;
    case 'Book':
        $productData['sku'] = $book->getSKU();
        $productData['name'] = $book->getName();
        $productData['price'] = $book->getPrice();
        $productData['weight'] = $book->getWeight();
        $productData['type'] = $type;
        break;
    case 'Furniture':
        $productData['sku'] = $furniture->getSKU();
        $productData['name'] = $furniture->getName();
        $productData['price'] = $furniture->getPrice();
        $productData['height'] = $furniture->getHeight();
        $productData['width'] = $furniture->getWidth();
        $productData['length'] = $furniture->getLength();
        $productData['type'] = $type;
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