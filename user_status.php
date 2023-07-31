<?php
session_start();
require_once "inc/db.php";

if(!isset($_SESSION['auth'])){
    header('location:login.php');
}

$id = $_GET['id'];

if($id && (int) $id){
    $query = "SELECT id,status FROM `users` WHERE id = $id";//select query
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }

    //status update query
    if($data['status'] == 1){
        $query = "UPDATE `users` SET status = 2 WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $_SESSION['successmsg'] = "Status update successfull";
        header("location:all_user.php");
    }else{
        $query = "UPDATE `users` SET status = 1 WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $_SESSION['successmsg'] = "Status update successfull";
        header("location:all_user.php");
    }
    


}else{
    header("location:404.php");
}


?>