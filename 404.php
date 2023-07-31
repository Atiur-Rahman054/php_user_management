<?php
    require_once "inc/header.php";

    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }
    
    echo "404 id not found";
?>