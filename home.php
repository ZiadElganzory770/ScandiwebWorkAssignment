<?php

    require_once 'includes/Autoloader.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/home.css">   
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Scripts/productTypes.js"></script>
    <script src="Scripts/validation.js"></script>

</head>
<body>
    <form id="product_form" action="products.php" method="POST">
        <header>
            <h1>Product Add</h1>
            <div class="buttons">
                <a href=""><button class="btn" type="submit">Save</button></a>
                <a href=""><button class="btn" type="reset">Cancel</button></a>
            </div>
            <hr>
        </header>
        <main class="main">
            <div class="inputs">
                <label for="sku">SKU</label>
                <input type="text"  id="sku" name="sku" required><br>
            </div>
            <div class="inputs">
                <label for="name">Name</label>
                <input type="text"   id="name" name="name" required><br>
            </div>
            <div class="inputs">
                <label for="price">Price($)</label>
                <input type="text"   id="price" name="price" required><br>
            </div>
            <div class="inputs">
                <label for="productType">Type Switcher</label>
                <select name="productType" id="productType">
                    <option value="default">Type Switcher</option>
                    <option value="Dvd">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select><br>
            </div>
            <div class="inputs">
                <div id="dvd-fields" class="product-table" data-product-type="Dvd">
                    <label for="size">Size(MB)</label>
                    <input type="text" name="size"   id="size" required>
                    <p>Please Provide Size</p>
                </div>
            </div>
            <div class="inputs">
                <div id="book-fields" class="product-table" data-product-type="Book">
                    <label for="weight">Weight(KG)</label>
                    <input type="text" name="weight"   id="weight" required>
                    <p>Please Provide Weight</p>
                </div>
            </div>


            </div>
            <div class="inputs"></div>

            <div id="furniture-fields" class="product-table" data-product-type="Furniture">
            <div class="inputs">
                <label for="height">Height(CM)</label>
                <input type="text" name="height"   id="height" required><br>
            </div>
            
            <div class="inputs">
                <label for="width">Width(CM)</label>
                <input type="text" name="width"   id="width" required><br>
            </div>

            <div class="inputs">
                <label for="length">Length(CM)</label>
                <input type="text" name="length" id="length" required>
                <p>Please Provide Dimensions</p>
            </div>
            </div>
</main>
        <footer>
            <hr>
            <p>Scandiweb Test assignment</p>
            <hr>
        </footer>
    </form>

</body>
</html>