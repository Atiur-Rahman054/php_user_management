<?php
    session_start();
    require_once "inc/db.php";
    
    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }

    if(isset($_POST['submit'])){
        
        $search = htmlentities(trim($_POST['search']));
        if(empty($search)){
            header('location:all_user.php');
        }else{
            //selectquery for user name
            // $search_char = $_POST['search'];
            // $search_char_length = strlen($search_char);
            $select_query = "SELECT id,name,email,image,status,created_at FROM `users`
             WHERE name like '%$search%'";
            $result = mysqli_query($conn, $select_query);
            if(mysqli_num_rows($result) > 0){
                $user_name_data = mysqli_fetch_all($result, true);
                
            }else{
                $not_found = "No user found!";
            }

            //selectquery for user id or user email
            $select_query = "SELECT id,name,email,image,status,created_at FROM `users`
            WHERE email = '$search' OR id = '$search'";
           $result = mysqli_query($conn, $select_query);
           if(mysqli_num_rows($result) > 0){
               $user_id_or_email_data = mysqli_fetch_all($result, true);
           }else{
               $not_found = "No user found!";
           }
        }
    }



    require_once "views/user/search_user.view.php";