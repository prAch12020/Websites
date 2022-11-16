<?php

session_start();
unset($_SESSION['shopping_cart']);
header("Location: product_category.php");
exit();

?>