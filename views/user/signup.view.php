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
                    <h2>SignUp Form</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="text" name="name" class="form-control" placeholder="User name">
                            <?php
                                if(isset($errors['name_err'])){
                                    echo "<p class='text-danger'>" . $errors['name_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <input type="email" name="email" class="form-control" placeholder="User email">
                            <?php
                                if(isset($errors['email_err'])){
                                    echo "<p class='text-danger'>" . $errors['email_err'] . 
                                    "</p>";
                                }elseif(isset($errors['email_err'])){
                                    echo "<p class='text-danger'>" . $errors['email_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <input type="password" name="password" class="form-control" placeholder="User password">
                            <?php
                                if(isset($errors['pass_err'])){
                                    echo "<p class='text-danger'>" . $errors['pass_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <input type="file" name="image" class="form-control">
                            <?php
                                if(isset($errors['image_err'])){
                                    echo "<p class='text-danger'>" . $errors['image_err'] . 
                                    "</p>";
                                }
                            ?>
                        </div>
                        <div class="my-2">
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
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