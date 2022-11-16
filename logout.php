<?php
    require_once 'portal.php';
    if(loggedIn()){
        $_SESSION = array();
        session_destroy();
        header("location:login.php");
    }
?>