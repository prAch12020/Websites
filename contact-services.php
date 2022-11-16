<?php 
    require_once 'data.php';
    $conn = connect();
    $sql = "UPDATE `services` SET `Contacted` = 'YES' WHERE `services`.`ServiceId` = $_GET[id];";
    if(mysqli_query($conn, $sql)){
        header("location:admin.php");
    }
    else{
        echo '<script>alert("Cannot update order due to a technical error. Try again later");</script>';
    }
?>