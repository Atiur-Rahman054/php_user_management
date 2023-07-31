<?php
    require_once "inc/header.php"
?>
<section class="mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php 
                if(isset($successmsg)){
            ?>
        <div class="alert alert-success">
            <p><?= $successmsg ?></p>
        </div>
            <?php
                }
                if(isset($errormsg)){
            ?>
        <div class="alert alert-danger">
            <p><?= $errormsg ?></p>
        </div>
        <?php
            }
        ?>
            <div class="card mb-3">
                <div class="card-header">
                    <h2>Password Reset</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="my-2">
                            <input type="pasword" name="old_password" class="form-control" placeholder="Current pasword">
                            <?php 
                                if(isset($errors['old_passerr'])){
                                    echo"<p class='text-danger'>" . $errors['old_passerr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <input type="pasword" name="new_password" class="form-control" placeholder="New Password">
                            <?php 
                                if(isset($errors['new_passerr'])){
                                    echo"<p class='text-danger'>" . $errors['new_passerr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <input type="pasword" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            <?php 
                                if(isset($errors['confirm_passErr'])){
                                    echo"<p class='text-danger'>" . $errors['confirm_passErr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <button type="submit" name="submit" value="Update" class="form-control btn btn-sm btn-primary">Reset</button>
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