<?php

require_once("dbconnect.php");
if (isset($_POST["submit_category"])) {
        $category_name = $_POST['category_name'];
        $sql = "INSERT INTO category(category_name) VALUES('$category_name')";

        if(setData($sql)){
            echo "Successful";
            header("location:all_categories.php");
        }
        else {
            echo "Unsuccessful";
        }

    };

    



?>