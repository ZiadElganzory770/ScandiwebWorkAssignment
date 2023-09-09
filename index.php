<?php

require_once 'bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Scripts/productTypes.js"></script>
    <script src="Scripts/validation.js"></script>

</head>
<body>
    <form id="product_form" action="products.php" method="POST">
        <header>
            <h1>Product Add</h1>
            <a href=""><button type="submit">Save</button></a>
            <a href=""><button type="reset">Cancel</button></a>
            <hr>
        </header>
        <section>
            <label for="sku">SKU</label>
            <input type="text"  id="sku" name="sku" required><br>
            <label for="name">Name</label>
            <input type="text"   id="name" name="name" required><br>
            <label for="price">Price($)</label>
            <input type="text"   id="price" name="price" required><br>
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType">
                <option value="default">Type Switcher</option>
                <option value="Dvd">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select><br>
            <div id="dvd-fields" class="product-table" data-product-type="Dvd">
                <label for="size">Size(MB)</label>
                <input type="text" name="size"   id="size" required>
                <p>Please Provide Size</p>
            </div>
            <div id="book-fields" class="product-table" data-product-type="Book">
                <label for="weight">Weight(KG)</label>
                <input type="text" name="weight"   id="weight" required>
                <p>Please Provide Weight</p>
            </div>
            <div id="furniture-fields" class="product-table" data-product-type="Furniture">
                <label for="height">Height(CM)</label>
                <input type="text" name="height"   id="height" required><br>
                <label for="width">Width(CM)</label>
                <input type="text" name="width"   id="width" required><br>
                <label for="length">Length(CM)</label>
                <input type="text" name="length" id="length" required>
                <p>Please Provide Dimensions</p>
             </div>
        </section>
        <footer>
            <hr>
            <p>Scandiweb Test assignment</p>
        </footer>
    </form>

</body>
</html>