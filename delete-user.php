<?php
    require_once 'data.php';
    $conn = connect();
    $query = "DELETE FROM `users` WHERE `users`.`UserId` = ".$_GET['id'];
    $result = $conn->query($query);
    if($result){
        header("location:admin.php");
    }
    else{
        echo '<script>alert("Cannot delete user until all his/her orders are fulfilled");</script>';
    }
?>