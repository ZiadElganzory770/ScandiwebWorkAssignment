<?php
    require_once 'includes/Autoloader.php';
    use classes\products;

    // Initialize products class
    $products = new products();
    $productIdsToDelete = [];
    // Check if delete form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-checkbox'])) {
        // Get the IDs of the products to delete
        foreach($_POST['delete-checkbox'] as $value){
            $list=explode(',',$value);
            array_push($productIdsToDelete,$list);
        }
        $products->deleteProducts($productIdsToDelete);
    }
    // var_dump($list);
    // var_dump($productIdsToDelete);


    header("Location:index.php");

?>
