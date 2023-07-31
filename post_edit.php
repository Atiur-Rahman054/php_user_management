<?php
    
    session_start();
    require_once "inc/db.php";

    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }

    $id = $_GET['id'];

    if($id && (int) $id){

        //selectquery
        $select_query = "SELECT id,title,post,status,image FROM `posts` WHERE id = $id";
        $result = mysqli_query($conn, $select_query);
        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
        }
        

        //updatequery
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
                    $path = "post_image/".$data['image'];
                    if(file_exists($path) && $data['image']){
                        unlink($path);
                    }
                    $image_name = uniqid() . "." . end($file_ext);
                    move_uploaded_file($post_image['tmp_name'], 'post_image/'. $image_name);
                }
            }else{
                $image_name = $data['image'];
            }
    
            if(!$errors){
                $query = "UPDATE `posts` SET title='$title',post='$post',image='$image_name' WHERE id = $id";
                $result = mysqli_query($conn, $query);
                if($result){
                    $_SESSION['successmsg'] = "Post Edited";
                    header('location:all_post.php');
                }else{
                    $_SESSION['errmsg'] = "Post Edit failed";
                }
            }
    
            
        }
    }













    require_once "views/post/post_edit.view.php";