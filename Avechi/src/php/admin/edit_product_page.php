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


<?php

if (isset ($_GET["edit"])) {
        require_once("connect.php");
        $product_id = $_GET["edit"]; // get id through query string


        $qry = mysqli_query($conn,"select * from product where product_id='$product_id'"); // select query

        $data = mysqli_fetch_array($qry); // fetch data

        

?>

    <h1 class="head">Add Product</h1>
    <section id="add-product">
        <form action="edit_product.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>">

            <label for="product_name" class="labels">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="inputs" value="<?php echo $data['product_name']?>">

            <label for="product_description" class="labels">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="inputs" value="<?php echo $data['product_description']?>">

            <label for="product_image" class="labels">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="inputs" value="<?php echo $original_file_name?>"  >

            <label for="price" class="labels">Price</label>
            <input type="number" name="price" id="number" class="inputs" value="<?php echo $data['product_price']?>">

            <label for="available_quantity" class="labels">Available Quantity</label>
            <input type="number" name="available_quantity" id="available quantity" class="inputs" value="<?php echo $data['available_quantity']?>">

            <input type="submit" value="Save" name="submit_product" class="btn-add">
        </form>

    </section>
    <?php }  ?>

</body>
</html>