<?php

    require_once("config.php");
    $conn = connect();
    if (isset($_POST["submit_product"])) {
        $file = addslashes(file_get_contents($_FILES["product_image"]["tmp_name"]));
        $product_name = $_POST["product_name"];
        $product_price = $_POST["price"];
        $cat = $_POST["category"];
        $product_id = $_POST['product_id'];
        $product_description = $_POST['product_description'];
        $available_quantity = $_POST['available_quantity'];

        $sql = "UPDATE tbl_products set product_name='$product_name', category_id = '$cat', product_image ='$file',
        product_price ='$product_price', manufacturer ='$product_description', available_quantity ='$available_quantity' where `product_id`='$product_id'";

    if(mysqli_query($GLOBALS['conn'], $sql)){
        header("location:view_products.php");
    }
    else {
        echo "Unsuccessful";
    }
            
}

?>