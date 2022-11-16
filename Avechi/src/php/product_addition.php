<?php

require_once("config.php");



if (isset($_POST["submit_product"])) {
    $file = addslashes(file_get_contents($_FILES["product_image"]["tmp_name"]));
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_manufacturer'];
    $price = $_POST['price'];
    $available_quantity = $_POST['available_quantity'];


    $sql = "INSERT INTO tbl_products(category_id, manufacturer, product_name, product_image, product_price, available_quantity ) VALUES('$_POST[category_id]', '$product_description', '$product_name', '$file',
    '$price','$available_quantity')";

    if(mysqli_query($GLOBALS['conn'], $sql)){
        echo "Successful";
        header("location:view_products.php");
    }
    else {
        echo "Unsuccessful";
    }

    }

 


?>