<?php

require_once("dbconnect.php");
if (isset($_POST["submit_subcategory"])) {
        $subcategory_name = $_POST['subcategory_name'];
        $sql = "INSERT INTO subcategory(subcategory_name) VALUES('$subcategory_name')";

        if(setData($sql)){
            echo "Successful";
        }
        else {
            echo "Unsuccessful";
        }

    };

    



?>