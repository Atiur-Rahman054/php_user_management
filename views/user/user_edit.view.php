<?php
    require_once "inc/header.php";
?>


<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header">
                        <h2>Edit form</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="my-2">
                                <input type="text" name="name" value="<?= $data['name']?>" class="form-control">
                                <?php
                                if(isset($errors['name_err'])){
                                    echo "<p class='text-danger'>" . $errors['name_err'] . 
                                    "</p>";
                                }
                                ?>
                            </div>
                            <div class="my-2">
                                <input type="text" name="email" value="<?= $data['email']?>" class="form-control">
                                <?php
                                if(isset($errors['email_err'])){
                                    echo "<p class='text-danger'>" . $errors['email_err'] . 
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
                            <?php if($data['image']){?>
                                <div class="my-2">
                                    <img src="profile/<?= $data['image']?>" width="60" height="60">
                                </div>
                            <?php } ?>
                            <div class="my-2">
                                <button type="submit" name="submit" value="" class="form-control btn btn-sm btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php
    require_once "inc/footer.php";
?>