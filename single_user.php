<?php
    session_start();

    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }
    
    require_once "inc/db.php";
    $id = $_GET['id'];

if($id && (int) $id){
    $query = "SELECT id,name,email,image FROM `users` WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }else{
        header("location:404.php");
    }
}else{
    header("Location:404.php");
}











require_once "views/user/single_user.view.php";