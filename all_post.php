<?php
  session_start();
  if(!isset($_SESSION['auth'])){
    header('location:login.php');
}
  require_once "inc/db.php";
  

  //all active post
    $query = "SELECT id,title,post,image,status,created_at FROM `posts` WHERE status = 1";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $active_post = mysqli_fetch_all($result, true);
    }else{
        $blank_database = "No published post available";
    }

      //all draft post
      $query = "SELECT id,title,post,image,status,created_at FROM `posts` WHERE status != 1";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0){
          $draft_post = mysqli_fetch_all($result, true);
      }else{
          $blank_database = "No Draft post found";
      }

    




    require_once "views/post/all_post.view.php";




  





