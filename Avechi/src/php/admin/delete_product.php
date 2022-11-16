<?php

session_start();

    require("connect.php");
    if(isset($_GET['delete'])){
        $product_id = $_GET['delete'];
        $conn->query("DELETE FROM product WHERE product_id = '$product_id'");
        if ($conn->error) {
            die("Deletion failed: " . $conn->error);
          }
          echo "Deleted ";
          header("location:view_products.php");
          
    }



?>

