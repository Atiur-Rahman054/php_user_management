<?php
    require_once "inc/header.php";
?>



<section class="mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php
                if(isset($successmsg)):
            ?>
            <div class="alert alert-success">
                <p><?= $successmsg ?>
            </div>
            <?php
                endif;
                if(isset($errmsg)):
            ?>
            <div class="alert alert-danger">
                <p><?= $errmsg ?>
            </div>
            <?php
                endif;
            ?>
            
            <div class="card">
                <div class="card-header">
                    <h2>Add Post</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="text" name="title" class="form-control" placeholder="Post title">
                            <?php
                                if(isset($errors['title_err'])){
                                    echo "<p class='text-danger'>" . $errors['title_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <textarea class="form-control" name="post" rows="5" placeholder="Write your post"></textarea>
                            <?php
                                if(isset($errors['post_err'])){
                                    echo "<p class='text-danger'>" . $errors['post_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <input type="file" name="post_image">
                            <?php
                                if(isset($errors['image_err'])){
                                    echo "<p class='text-danger'>" . $errors['image_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <button type="submit" name="submit" class="form-control btn btn-sm btn-success">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>







<?php
    require_once "inc/footer.php";
?>