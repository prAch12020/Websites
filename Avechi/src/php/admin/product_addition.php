<?php

require_once("dbconnect.php");



if (isset($_POST["submit_product"])) {
    $file = $_FILES["product_image"];
    $file_path="asset/";

    $original_file_name = $_FILES['product_image']['name'];
    $file_tmp_location = $_FILES['product_image']['tmp_name'];

    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $available_quantity = $_POST['available_quantity'];


    $sql = "INSERT INTO product(product_name, product_description, product_image ,product_price, 
    available_quantity ) VALUES('$product_name','$product_description', '$original_file_name',
    '$price','$available_quantity')";

    if (setData($sql)) {
        echo "Successful";
        header("location:view_products.php");
    }
    else {
        echo "Unsuccessful";
    }

    }

 


?>