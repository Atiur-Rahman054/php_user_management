<?php
session_start();
include "inc/db.php";

if(!isset($_SESSION['auth'])){
    header('location:login.php');
}

$id = $_SESSION['auth']['id'];

//select query
if(isset($_POST['submit'])){
    $errors = [];

    $old_password = htmlentities(trim($_POST['old_password']));
    $enc_old_password = md5($old_password);
    $new_password = htmlentities(trim($_POST['new_password']));
    $enc_new_password = md5($new_password);
    $confirm_password = htmlentities(trim($_POST['confirm_password']));
    $enc_confirm_password = md5($confirm_password);

    if(empty($old_password)){
        $errors['old_passerr'] = "Enter current password";
    }

    if(empty($new_password)){
        $errors['new_passerr'] = "Enter new password";
    }elseif(strlen($new_password) < 4){
        $errors['new_passerr'] = "New password must be 4 digit long";
    }

    if(empty($confirm_password)){
        $errors['confirm_passErr'] = "Enter confirm password";
    }elseif($new_password != $confirm_password){
        $errors['confirm_passErr'] = "New password and confirm password not matched!";
    }

    $query = "SELECT id,password FROM `users` WHERE id=$id";
    $result = mysqli_query($conn, $query);//print_r($result);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }
    $current = $data['password'];
    
    

    if(!$errors){
        if($current == $enc_old_password){
            if($enc_old_password != $enc_new_password){
                $query = "UPDATE `users` SET password='$enc_new_password' WHERE id=$id";
                $result = mysqli_query($conn, $query);
                if($result){
                    $_SESSION['successmsg'] = "Password reset successfull!";
                    header('Location:all_user.php');
                }else{
                    $_SESSION['errmsg'] = "Reset Error!";
                }
            }else{
                $errors['new_passerr'] = "Current and new password cannot be same";
            }
        }else{
            $errors['old_passerr'] = "Please enter correct old password";
        }
    }

}








require_once "views/user/password_reset_view.php";

