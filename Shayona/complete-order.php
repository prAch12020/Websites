<?php 
    require_once 'data.php';
    $conn = connect();
    $sql = "UPDATE `orders` SET `Completed` = 'YES' WHERE `orders`.`OrderId` = $_GET[id];";
    if(mysqli_query($conn, $sql)){
        header("location:admin.php");
    }
    else{
        echo '<script>alert("Cannot update order due to a technical error. Try again later");</script>';
    }
?>