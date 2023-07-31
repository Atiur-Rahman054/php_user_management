<?php
    session_start();
    require_once "inc/db.php";

    if(!isset($_SESSION['auth'])){
        header('location:login.php');
    }
$id = $_GET['id'];

if($id && (int) $id){

    //select query
    $query = "SELECT id,name,email,image FROM `users` WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }
}else{
    header('location:404.php');
}

//user update work
if(isset($_POST['submit'])){

    $errors = [];

    $name = htmlentities(trim($_POST['name']));
    $email = htmlentities(trim($_POST['email']));
    $image = $_FILES['image'];

    if(empty($name)){
        $errors['name_err'] = "Enter your name";
    }elseif(strlen($name) > 50){
        $errors['name_err'] = "Please Enter less than 50 character";
    }

    if(empty($email)){
        $errors['email_err'] = "Enter your email";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email_err'] = "Please enter valid email";
    }

    if($image['name']){
        $type = ['jpg', 'png', 'jpeg', 'gif'];
        $file_ext = explode(".", $image['name']);

        if(!in_array(end($file_ext), $type)){
            $errors['image_err'] = "Enter valid image";
        }elseif($image['size'] > 1000000){
            $errors['image_err'] = "Enter less than 1 mb size image";
        }else{
            $path = "profile/".$data['image'];
            if(file_exists($path) && $data['image']){
                unlink($path);
            }
            $image_name = uniqid() . "." . end($file_ext);
            move_uploaded_file($image['tmp_name'], 'profile/' .$image_name);
        }
    }else{
        $image_name = $data['image'];
    }

    if(!$errors){
        $query = "UPDATE `users` SET name='$name',email='$email',image='$image_name' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        
        if($result){
            $_SESSION['successmsg'] = "User update successfull";
            header('location:all_user.php');
        }else{
            $_SESSION['errmsg'] = "Update error";
            header('location:all_user.php');
        }
    }


}















    require_once "views/user/user_edit.view.php";