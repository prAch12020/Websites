<?php

require_once("dbconnect.php");
if (isset($_POST["submit_product"])) {
    $file = $_FILES["product_image"];
    $file_path="asset/";

    $original_file_name = $_FILES['product_image']['name'];
    $file_tmp_location = $_FILES['product_image']['tmp_name'];

    if(move_uploaded_file($file_tmp_location, $file_path.$original_file_name)){
        $product_name = $_POST["product_name"];
        $product_price = $_POST["price"];
        $product_id = $_POST['product_id'];
        $product_description = $_POST['product_description'];
        $available_quantity = $_POST['available_quantity'];

        $sql = "UPDATE product set product_name='$product_name', product_image ='$original_file_name',
        product_price ='$product_price', product_description ='$product_description', available_quantity ='$available_quantity' where `product_id`='$product_id'";

        if(setData($sql)){
            header("location:view_products.php");
        }
        else {
            echo "Unsuccessful";
        }
        

    };

    
}


?>