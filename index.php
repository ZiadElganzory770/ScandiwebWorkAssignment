<?php

    require_once 'includes/Autoloader.php';
    use classes\AbstractProduct;
    use classes\Book;
    use classes\DVD;
    use classes\Furniture;
    use classes\products;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="Style/home.css">   
</head>
<body>
    <header> 
        <h1>Product List</h1>
        <form action="home.php">
        <button type="submit">Add Product</button>
        <button>Mass Delete</button>
        </form>
        
    </header>
    <hr>
    <div class="container">
        <?php
        
        $products = new products();

        // Call the getAllData function to retrieve product data
        $productData = $products->getAllData();

        // Loop through the product data and generate cards
        foreach ($productData as $product) {
            echo '<div class="card">';
            echo '<input type="checkbox" class="input"/>';
            echo '<p>' . $product['sku'] . '</p>';
            echo '<p>' . $product['name'] . '</p>';
            echo '<p>' . $product['price'] . '</p>';
            
            // Output additional fields based on the product type
            if ($product['type'] === 'Dvd') {
                echo '<p>Size: ' . $product['size'] .' MB'. '</p>';
            } elseif ($product['type'] === 'Book') {
                echo '<p>Weight: ' . $product['weight'] .' KG'. '</p>';
            } elseif ($product['type'] === 'Furniture') {
                echo '<p>Dimentions: ' . $product['height'].'x'.$product['width'].'x'.$product['length']. '</p>';
            }
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>