<?php

require_once("dbconnect.php");
if (isset($_POST["submit_product"])) {
    // $file = $_FILES["product_image"];
    // $file_path="asset/";

    // $original_file_name = $_FILES['product_image']['name'];
    // $file_tmp_location = $_FILES['product_image']['tmp_name'];

    // if(move_uploaded_file($file_tmp_location, $file_path.$original_file_name)){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $user_id = $_POST['user_id'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "UPDATE tbl_users set first_name='$first_name',last_name ='$last_name', email ='$email', gender ='$gender' where `user_id`='$user_id'";

        if(setData($sql)){
            header("location:users.php");
        }
        else {
            echo "Unsuccessful";
        }
        

    };

    



?>