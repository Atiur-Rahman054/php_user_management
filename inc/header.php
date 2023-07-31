<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>TL_FIRST_PROJECT</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <?php
                            if(isset($_SESSION['auth'])):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="all_user.php">All User</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="create_post.php">Create Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="all_post.php">All Post</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                    if($_SESSION['auth']['image']){
                                ?>
                                    <img class="rounded-circle" src="profile/<?= $_SESSION['auth']['image']?>" alt="<?= $_SESSION['auth']['name']?>"width = "40" height="40">
                                <?php
                                    }
                                    else{
                                        echo $_SESSION['auth']['name'];
                                    }
                                ?>
                            </a>
                            <ul class="dropdown-menu" style="left:auto;right:0">
                                <a class="dropdown-item" aria-current="page"><?= $_SESSION['auth']['name']?></a>
                                <a class="dropdown-item" aria-current="page"><?= $_SESSION['auth']['email']?></a>
                                <a class="dropdown-item" aria-current="page" href="logout.php">Logout</a>
                            </ul>
                        </li>


                        <?php 
                            endif;
                            if(!isset($_SESSION['auth'])):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                        </li>
                        <?php
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
</body>
</html>
