<?php
    require_once "data.php";
    session_start();
    $conn = connect();
    if(isset($_POST['login'])){
            $sql = "SELECT * FROM users WHERE PhoneNo = " .$_POST['phone_number']. " AND BINARY Password = '" .$_POST['password']. "'";
            $result = $conn->query($sql);
            if($row = $result->fetch_assoc()){
                    $_SESSION["UserId"] = $row['UserId'];
                    $_SESSION["FirstName"] = $row['FirstName'];
                    $_SESSION["LastName"] = $row['LastName'];
                    $_SESSION["PhoneNo"] = $row['PhoneNo'];
                    $_SESSION["Type"] = $row['Type'];
                    if($_SESSION["Type"] == "Administrator"){
                        header('location: admin.php');
                    }  
                    else if($_SESSION["Type"] == "Client"){
                        header('location: menu.php');
                    }                 
            }   
            else{
                echo "<p style=\"color: red\">Error: Invalid Credentials</p>";
            }
        }      
?>