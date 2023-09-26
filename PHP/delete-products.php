<?php
    require_once '../includes/Autoloader.php';

    use classes\products;

    $products = new products();

    $productIdsToDelete = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-checkbox'])) {

        foreach($_POST['delete-checkbox'] as $value){

            array_push($productIdsToDelete,$value);
            
            $products->deleteProducts($productIdsToDelete);
        }
    }
    
    header("Location:../index.php");

?>
