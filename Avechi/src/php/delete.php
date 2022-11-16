<?php
require_once 'config.php';
    $item = $_GET['item'];
    if (!empty($_SESSION["shopping_cart"])) {
        array_splice($_SESSION["shopping_cart"], $item, 1);
        echo "<script>window.location.href='basket.php';</script>";
          
    }
    if (!empty($_SESSION["wishlist"])) {
        array_splice($_SESSION["wishlist"], $item, 1);
        echo "<script>window.location.href='wishlist.php';</script>";
          
    }
?>