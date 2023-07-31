<?php
    session_start();
    require_once "inc/db.php";
    
    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }

    $id = $_GET['id'];

    if($id && (int) $id){
        
        //select query
        $select_query = "SELECT id,title,post,status,image,created_at FROM `posts`
        WHERE id = $id";
        $select_result = mysqli_query($conn, $select_query);
        if(mysqli_num_rows($select_result) > 0){
            $data = mysqli_fetch_assoc($select_result);
        }
        
        //image path unlink
        $path = "profile/".$data['image'];
        if(file_exists($path) && $data['image']){
            unlink($path);
        }

        //delete query

        $delete_query = "DELETE FROM `posts` WHERE id = $id";
        $delete_result = mysqli_query($conn, $delete_query);
        if($delete_query){
            $_SESSION['successmsg'] = "post deleted!";
            header('location:all_post.php');
        }


    }else{
        header('location:404.php');
    }

?>