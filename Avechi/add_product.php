<?php 
require_once 'config.php';
include_once 'templates/header.php';
?>
<main><br><br><br><br>
    <a class='getstarted' href='view_products.php'>Back</a><br><br>  
    <h1>Add Product</h1>
    <section id="sect">
        <form class='add-form'  action="product_addition.php" enctype="multipart/form-data" method="POST">
            <label for="product_manufacturer" class="labels">Product Manufacturer</label><br>
            <input type="text" name="product_manufacturer" id="product_manufacturer" class="inputs"><br><br>

            <label for="product_name" class="labels">Product Name</label><br>
            <input type="text" name="product_name" id="product_name" class="inputs"><br><br>

            <label for="product_image" class="labels">Product Image</label><br>
            <input type="file" name="product_image" id="product_image" class="inputs"><br><br>

            <label for="price" class="labels">Product Price</label><br>
            <input type="number" name="price" id="number" class="inputs"><br><br>

            <label for="available_quantity" class="labels">Available Quantity</label><br>
            <input type="number" name="available_quantity" id="available quantity" class="inputs"><br><br>

            <label for="category" class="labels">Category Id</label><br>
            <input type="text" name="category_id" id="category" class="inputs"><br><br>

            <input type="submit" value="Add" name="submit_product" class="btn btn-primary">
        </form>

    </section>

</body>
</html>