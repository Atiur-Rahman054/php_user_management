<?php
    session_start(); 
    require_once "inc/db.php"; 

    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }


    if(isset($_POST['submit'])){
        
        $errors = [];

        $title = htmlentities(trim($_POST['title']));
        $post = htmlentities(trim($_POST['post']));
        $post_image = $_FILES['post_image'];

        if(empty($title)){
            $errors['title_err'] = "Enter your title";
        }elseif(strlen($title) > 50){
            $errors['title_err'] = "Title must be less than 50 character";
        }

        if($post_image['name']){

            $type = ['jpg', 'png', 'jpeg'];

            $file_ext = explode(".", $post_image['name']);
            if(!in_array(end($file_ext), $type)){
                $errors['image_err'] = "Enter valid image";
            }elseif($post_image['size'] > 1000000){
                $errors['image_err'] = "Enter 1 mb size image only";
            }else{
                $image_name = uniqid() . "." . end($file_ext);
                move_uploaded_file($post_image['tmp_name'], 'post_image/'. $image_name);
            }
        }else{
            $image_name = NULL;
        }

        if(!$errors){
            $query = "INSERT INTO `posts`(`title`, `post`, `image`) VALUES 
            ('$title', '$post', '$image_name')";
            $result = mysqli_query($conn, $query);
            if($result){
                $_SESSION['successmsg'] = "Post uploded";
                header('location:all_post.php');
            }else{
                header('location:all_post.php');
                $_SESSION['errmsg'] = "Post upload failed";
            }
        }

        
    }

   









    require_once "views/post/create_post.view.php";