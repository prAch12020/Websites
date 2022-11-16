<?php

require_once("config.php");
if (isset($_POST["submit_category"])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $sql = "INSERT INTO tbl_categories VALUES('$category_id', '$category_name')";

        if(mysqli_query($GLOBALS['conn'], $sql)){
            echo "Successful";
            header("location:all_categories.php");
        }
        else {
            echo "Unsuccessful";
        }

    };

    



?>