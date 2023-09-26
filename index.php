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
    <link rel="stylesheet" href="Styles/index.css">   
</head>
<body>
    <header> 
        <div class="header">
            <h1>Product List</h1>
                <form action="PHP/delete-products.php"  method="POST">
                    <div class="buttons">
                        <a href="home.html" class="btn">Add</a>
                        <button type="submit" id="delete-product-btn" class="btn">Mass Delete</button>
                    </div>
                    <hr>
                    <div class="container">
                        <?php
                            $products = new products();
                            $productDataDVD = $products->getDVDData();
                            $productDataBook = $products->getBookData();
                            $productDataFurniture = $products->getFurnitureData();
                            foreach($productDataDVD as $product){
                                $dvd = new DVD($product['sku'], $product['name'], $product['price'], $product['type'],$product['size']);
                                $dvd->display();
                            }
                            foreach($productDataBook as $product){
                                $book = new Book($product['sku'], $product['name'], $product['price'], $product['type'],$product['weight']);
                                $book->display();
                            }
                            foreach($productDataFurniture as $product){
                                $furniture = new Furniture($product['sku'], $product['name'], $product['price'], $product['type'], $product['height'], $product['width'], $product['length']);
                                $furniture->display();
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