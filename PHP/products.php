<?php
require_once '../includes/Autoloader.php';
use classes\AbstractProduct;
use classes\Book;
use classes\DVD;
use classes\Furniture;
use classes\products;
use classes\AllProducts;

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['productType'];
$size = $_POST['size']?$_POST['size']:null;
$weight = $_POST['weight']?$_POST['weight']:null;
$height = $_POST['height']?$_POST['height']:null;
$width = $_POST['width']?$_POST['width']:null;
$length = $_POST['length']?$_POST['length']:null;

$products = new AllProducts($sku, $name, $price, $type, $size, $weight, $height, $width, $length);
$productData= [];

$productData['sku'] = $products->getSKU();
$productData['name'] = $products->getName();
$productData['price'] = $products->getPrice();
$productData['type'] = $products->getType();
$productData['size'] = $products->getSize();
$productData['weight'] = $products->getWeight();
$productData['height'] = $products->getHeight();
$productData['width'] = $products->getWidth();
$productData['length'] = $products->getLength();

$datainsert = new products();
$datainsert = $datainsert->addProduct($productData);

header("Location:../index.php");

?>