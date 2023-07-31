<?php
    session_start();
    require_once "inc/db.php";

    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }

    //all active users
    $query = "SELECT id,name,email,image,status,created_at FROM `users` WHERE status = 1";
    $result = mysqli_query($conn, $query);//print_r($result);
    if(mysqli_num_rows($result) > 0){
        $active_users = mysqli_fetch_all($result, true);
    }else{
        $blank_database = "No active users found";
    }

    //all deactive users
    $query = "SELECT id,name,email,image,status,created_at FROM `users` WHERE status != 1";
    $result = mysqli_query($conn, $query);//print_r($result);
    if(mysqli_num_rows($result) > 0){
        $deactive_users = mysqli_fetch_all($result, true);
    }else{
        $blank_database = "No deactive users found";
    }
















    require_once "views/user/all_user.view.php";