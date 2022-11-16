<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../admincss/add_product.css">
</head>
<body>
    <h1 class="head">Add Product</h1>
    <section id="add-product">
        <form action="product_addition.php" enctype="multipart/form-data" method="POST">
            <label for="product_name" class="labels">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="inputs">

            <label for="product_description" class="labels">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="inputs">

            <label for="product_image" class="labels">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="inputs">

            <label for="price" class="labels">Price</label>
            <input type="number" name="price" id="number" class="inputs">

            <label for="available_quantity" class="labels">Available Quantity</label>
            <input type="number" name="available_quantity" id="available quantity" class="inputs">

            <input type="submit" value="Add" name="submit_product" class="btn-add">
        </form>

    </section>

</body>
</html>