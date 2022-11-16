
<?php
include_once 'templates/header.php';

if (isset ($_GET["edit"])) {
        require_once("config.php");
        $product_id = $_GET["edit"]; // get id through query string


        $qry = mysqli_query($conn,"select * from tbl_products where product_id='$product_id'"); // select query

        $data = mysqli_fetch_array($qry); // fetch data

        

?>
<main><br><br><br><br><a class='getstarted' href='view_products.php'>Back</a><br><br>
    <h1>Edit Product</h1>
    <section id="sect">
        <form class='add-form' action="edit_product.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>">
        <label for="category" class="labels">Category Id</label><br>
            <input type="text" name="category" id="category" class="inputs" value="<?php echo $data['category_id']?>"><br><br>

        <label for="product_description" class="labels">Manufacturer</label><br>
            <input type="text" name="product_description" id="product_description" class="inputs" value="<?php echo $data['manufacturer']?>"><br><br>

            <label for="product_name" class="labels">Product Name</label><br>
            <input type="text" name="product_name" id="product_name" class="inputs" value="<?php echo $data['product_name']?>"><br><br>

            
            <label for="product_image" class="labels">Product Image</label><br>
            <input type="file" name="product_image" id="product_image" class="inputs" value="<?php echo "<img src='data:image/jpeg;base64,".base64_encode($row['product_image'])."' height='150' width='200'/>"; ?>"  ><br><br>

            <label for="price" class="labels">Price</label><br>
            <input type="number" name="price" id="number" class="inputs" value="<?php echo $data['product_price']?>"><br><br>

            <label for="available_quantity" class="labels">Available Quantity</label><br>
            <input type="number" name="available_quantity" id="available quantity" class="inputs" value="<?php echo $data['available_quantity']?>"><br><br>

            <input type="submit" value="Save" name="submit_product" class="btn btn-primary">
        </form>

    </section>
    <?php }  ?>

</body>
</html>