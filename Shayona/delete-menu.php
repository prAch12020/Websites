<?php
    require_once 'data.php';
    $conn = connect();
    $query = "DELETE FROM `menu_items` WHERE `menu_items`.`MenuId` = ".$_GET['id'];
    if(mysqli_query($conn, $query)){
        header("location:admin.php");
    }
    else{
        echo '<script>alert("Cannot delete menu due to a technical error. Try again later");</script>';
    }
?>