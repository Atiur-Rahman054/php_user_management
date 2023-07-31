<?php
    require_once "inc/header.php";
?>



<div class="container">
    <?php
        if(isset($_SESSION['successmsg'])){?>
        <div class="alert alert-success">
            <p><?= $_SESSION['successmsg']?></p>
        </div>
        <?php
        }
        if(isset($_SESSION['errmsg'])){
        ?>
        <div class="alert alert-danger">
            <p><?= $_SESSION['errmsg']?></p>
        </div>
        <?php
        }

        if(isset($active_users)){?>

        <form action="search_user.php" method="POST" class="d-flex" role="search">
            <input type="search" required name="search" class="me-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-success" name="submit">Search</button>
        </form>
            
            <table class="table">
                <h2 class="text-center my-2 text-success">All Active Users</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($active_users as $data):
                ?>
                    <tr>
                        <th><?= $data['id']?></th>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td>
                            <?php if($data['image']){?>
                            <img src="profile/<?=$data['image']?>" alt="<?= $data['image']?>" width="60" height="60">
                            <?php 
                            }
                            else{
                                echo "--";
                            }
                             ?>
        
                        </td>
                        <td>
                            <span class="badge bg-<?= $data['status'] == 1 ? "success" :
                                "warning"?>">
                                <?= $data['status'] == 1 ? "Active" : "Deactive"?>
                            </span>
                        </td>
                        <td><?= $data['created_at']?></td>
                        <td>
                            <a href="single_user.php?id=<?= $data['id']?>" class="btn btn-sm btn-primary">View</a>
                            <a href="user_edit.php?id=<?= $data['id']?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="user_delete.php?id=<?= $data['id']?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="user_status.php?id=<?= $data['id']?>" class="btn btn-sm btn-<?= $data['status'] == 1 ? "warning" : "success"?>">
                            <?= $data['status'] == 1 ? "Deactive" : "Active"?></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
    </table>
    <?php
        }else{
    ?>
        <h2 class="text-center my-5 text-danger"><?= $blank_database?></h2>
    <?php
        }
    ?>
    
</div>






<div class="container">
        <?php

        if(isset($deactive_users)){?>
            
            <table class="table">
                <h2 class="text-center my-2 text-danger">All Deactive Users</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($deactive_users as $data):?>
                    
                    <tr>
                        <th><?= $data['id']?></th>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td>
                            <?php if($data['image']){?>
                            <img src="profile/<?=$data['image']?>" alt="<?= $data['image']?>" width="60" height="60">
                            <?php 
                            }
                            else{
                                echo "--";
                            }
                             ?>
        
                        </td>
                        <td>
                            <span class="badge bg-<?= $data['status'] == 1 ? "success" :
                                "warning"?>">
                                <?= $data['status'] == 1 ? "Active" : "Deactive"?>
                            </span>
                        </td>
                        <td><?= $data['created_at']?></td>
                        <td>
                            <a href="single_user.php?id=<?= $data['id']?>" class="btn btn-sm btn-primary">View</a>
                            <a href="user_edit.php?id=<?= $data['id']?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="user_delete.php?id=<?= $data['id']?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="user_status.php?id=<?= $data['id']?>" class="btn btn-sm btn-<?= $data['status'] == 1 ? "warning" : "success"?>">
                            <?= $data['status'] == 1 ? "Deactive" : "Active"?></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
    </table>
    <?php
        }else{
    ?>
        <h2 class="text-center my-5 text-danger"><?= $blank_database?></h2>
    <?php
        }
    ?>
    
</div>









<?php
    require_once "inc/footer.php";
    unset($_SESSION['successmsg']);
    unset($_SESSION['errmsg']);
?>