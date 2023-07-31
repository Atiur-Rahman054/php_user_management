<?php
session_start();
require_once "inc/db.php";

if(!isset($_SESSION['auth'])){
    header('location:login.php');
}

    $id = $_GET['id'];

    if($id && (int) $id){
        
        //select query
        $select_query = "SELECT id,status FROM `posts` WHERE id = $id";
        $result = mysqli_query($conn, $select_query);
        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
        }
        
        //update query

        if($data['status'] == 1){
            $update = "UPDATE `posts` SET status = 2 WHERE id = $id";
            $result = mysqli_query($conn, $update);
            $_SESSION['successmsg'] = "Post Drafted!";
            header('location:all_post.php');
        }else{
            $update = "UPDATE `posts` SET status = 1 WHERE id = $id";
            $result = mysqli_query($conn, $update);
            $_SESSION['successmsg'] = "Post activated!";
            header('location:all_post.php');
        }
    }
    
?>