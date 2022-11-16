<?php
    require_once 'data.php';
    $conn = connect();
    $query = "DELETE FROM `order_items` WHERE `order_items`.`OrderItemId` = ".$_GET['id'];
    if(mysqli_query($conn, $query)){
        header("location:order.php");
    }
    else{
        echo '<script>alert("Cannot delete order due to a technical error. Try again later");</script>';
    }
?>