<?php
    session_start();
    require_once "inc/db.php";
    
    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }

    $id = $_GET['id'];

    if($id && (int) $id){
        
        //select query
        $select_query = "SELECT id,name,email,password,status,image,created_at FROM `users`
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

        if($id == $_SESSION['auth']['id']){
            //delete query for authenticate user
            // $delete_query = "DELETE FROM `users` WHERE id = $id";
            // $delete_result = mysqli_query($conn, $delete_query);
            // if($delete_query){
            //     unset($_SESSION['auth']);
            //     header('location:login.php');
            // }
            $_SESSION['successmsg'] = "authenticate user! Unable to Delete";
            header('location:all_user.php');
        }else{
            //delete query for unauthenticate user

            $delete_query = "DELETE FROM `users` WHERE id = $id";
            $delete_result = mysqli_query($conn, $delete_query);
            if($delete_query){
                $_SESSION['successmsg'] = "user deleted!";
                header('location:all_user.php');
            }
        }


    }else{
        header('location:404.php');
    }

?>