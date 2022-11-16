<?php
if(isset($_POST['updateOrder'])){
    require_once 'data.php';
    $conn = connect();
    $query = "UPDATE `order_items` SET Quantity = '$_POST[newNum]', Size = '$_POST[newSize]', Total = $_POST[newPrice] WHERE OrderItemId = " .$_GET['id'];
    if(mysqli_query($conn, $query)){
        header("location:order.php");
    }
    else{
        echo '<script>alert("Cannot delete order due to a technical error. Try again later");</script>';
    }
}
?>