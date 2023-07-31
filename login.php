<?php
    session_start();
    require_once "inc/db.php";
   
?>

<?php

    if(isset($_POST['submit'])){

        $errors = [];

        $email = htmlentities(trim($_POST['email']));
        $password = htmlentities(trim($_POST['password']));
        $enc_pass = md5($password);

        if(empty($email)){
            $errors['email_err'] = "Please enter your email";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email_err'] = "Please provide valid email address";
        }

        if(empty($password) || strlen($password) < 4){
            $errors['pass_err'] = "Please Enter correct password";
        }


        if(!$errors){
           
            //select_query
            $select_query = "SELECT id,name,email,password,image,status,created_at FROM `users` WHERE email = '$email'
            AND password = '$enc_pass'";
            $select_result = mysqli_query($conn, $select_query);

            if(mysqli_num_rows($select_result) > 0){
                $data  = mysqli_fetch_assoc($select_result);
                $_SESSION['auth'] = $data;
                $_SESSION['successmsg'] = "Congratulations! You are loggedin!";
                header('location:all_user.php');
            }else{
                $errmsg = "Email or password not matched!";
            }

        }





    }


    require_once "views/user/login_view.php";

?>






