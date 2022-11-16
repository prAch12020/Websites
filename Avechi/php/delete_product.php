<?php


    require("config.php");
    $conn = connect();
    if(isset($_GET['delete'])){
        $product_id = $_GET['delete'];
        $conn->query("DELETE tbl_products.product_id, tbl_products.product_name, tbl_products.manufacturer,
         tbl_products.product_image, tbl_products.product_price, tbl_products.available_quantity
        FROM tbl_products INNER JOIN tbl_categories ON tbl_categories.product_id = tbl_products.product_id 
        WHERE tbl_products.product_id = '$product_id'");
        if ($conn->error) {
            die("Deletion failed: " . $conn->error);
          }
          echo "Deleted ";
          header("location:view_products.php");
          
    }



?>

