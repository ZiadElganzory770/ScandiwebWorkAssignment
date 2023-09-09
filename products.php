<?php
    require_once 'bootstrap.php';



$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['productType'];
$size = $_POST['size']?$_POST['size']:null;
$weight = $_POST['weight']?$_POST['weight']:null;
$height = $_POST['height']?$_POST['height']:null;
$width = $_POST['width']?$_POST['width']:null;
$length = $_POST['length']?$_POST['length']:null;


$arr_products = [
    'sku' => $sku,
    'name' => $name,
    'price'=>$price,
    'size'=>$size,
    'weight'=>$weight,
    'height'=>$height,
    'width'=>$width,
    'length'=>$length
];

$products = new products();
$products = $products->addProduct($arr_products);

header("Location:index.php");
?>