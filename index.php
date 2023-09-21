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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
    <title>Products</title>
    <link rel="stylesheet" href="Style/index.css">   
</head>
<body>
    <header> 
        <div class="header">
            <h1>Product List</h1>
                <form action="delete-products.php"  method="POST">
                    <div class="buttons">
                        <a href="home.php" class="btn">Add</a>
                        <button type="submit" id="delete-product-btn" class="btn">Mass Delete</button>
                    </div>
                    <hr>
                    <div class="container">
                        <?php
                            
                        $products = new products();

                        // Call the getAllData function to retrieve product data
                        $productData = $products->getAllData();

                        // Loop through the product data and generate cards
                        foreach ($productData as $product) {
                            echo '<div class="card">';
                            echo '<input type="checkbox" name="delete-checkbox[]" value="'.$product['sku'].','.$product['type'].'"class="delete-checkbox"/>';
                            echo '<p>' . $product['sku'] . '</p>';
                            echo '<p>' . $product['name'] . '</p>';
                            echo '<p>' . $product['price'].'$' . '</p>';
                                
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
                        <hr>
                        <p>Scandiweb Test Assignment</p>
                    </div>
            </form>
        </div>
    </header>
    <hr>
</body>
</html>