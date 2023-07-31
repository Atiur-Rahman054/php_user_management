<?php
    session_start();
    require_once "inc/db.php";
    require_once "inc/header.php";
    
?>
<?php

if(isset($_POST['submit'])){

    $errors = [];

    $name = htmlentities(trim($_POST['name']));
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
    $encpass = md5($password);
    $image = $_FILES['image'];

    if(empty($name)){
        $errors['name_err'] = "Enter your name";
    }elseif($name > 50){
        $errors['name_err'] = "Enter less than 50 character";
    }

    if(empty($password)){
        $errors['pass_err'] = "Enter your password";
    }elseif(strlen($password) < 6){
        $errors['pass_err'] = "Password must be 6 digit long";
    }
        //EMAIL_SELECT_QUERY
        $select_query = "SELECT id,name,email,password,image,status,created_at FROM 
        `users` WHERE email = '$email'";
        $result = mysqli_query($conn, $select_query);
        if(mysqli_num_rows($result) > 0){
            $users_data = mysqli_fetch_all($result, true);
            foreach($users_data as $data){
                $exist_mail = $data['email'];
                if($exist_mail){
                    $errors['email_err'] = "This email already exists in database";
                }
            }
        }


    if(empty($email)){
        $errors['email_err'] = "Enter your email";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email_err'] = "Enter your valid email";
    }

    if($image['name']){
        $type = ['jpg', 'png', 'jpeg', 'gif'];
        $file_ext = explode(".", $image['name']);
        if(!in_array(end($file_ext), $type)){
            $errors['image_err'] = "Enter valid image";
        }elseif($image['size'] > 1000000){
            $errors['image_err'] = "Enter less than 1 mb size";
        }else{
            $image_name = uniqid() . "." . end($file_ext);
            move_uploaded_file($image['tmp_name'], 'profile/'.$image_name);
        }
    }else{
        $image_name = NULL;
    }


    if(!$errors){
        if($users_data){

        }
        $query = "INSERT INTO `users`(`name`, `email`, `password`, `image`) VALUES 
        ('$name', '$email', '$encpass', '$image_name')";
        $result = mysqli_query($conn, $query);
        if($result){
            //selectquery
            $select_query = "SELECT id,name,email,password,image,status,created_at FROM `users` WHERE email = '$email'
            AND password = '$encpass'";
            $select_result = mysqli_query($conn, $select_query);
            if(mysqli_num_rows($select_result) > 0){
                $data = mysqli_fetch_assoc($select_result);
                $_SESSION['auth'] = $data;
                $_SESSION['successmsg'] = "Congratulations! You are loggedin!";
                header('location:all_user.php');
            }


        }else{
            $errmsg = "signup err! try again";
        }
    }

    



    

}




?>


<?php

require_once "views/user/signup.view.php";

?>