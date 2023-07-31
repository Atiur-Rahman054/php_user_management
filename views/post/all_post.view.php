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

        if(isset($active_post)){?>
            <table class="table my-3">
            <h2 class ="text-success text-center my-3">All active post here</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>post</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($active_post as $data):?>
                    <tr>
                        <th><?= $data['id']?></th>
                        <td><?= $data['title']?></td>
                        <td><?= substr($data['post'], 0, 10)?></td>
                        <td>
                            <?php if($data['image']){?>
                            <img src="post_image/<?=$data['image']?>" alt="<?= $data['title']?>" width="60" height="60">
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
                                <?= $data['status'] == 1 ? "publish" : "Draft"?>
                            </span>
                        </td>
                        <td><?= $data['created_at']?></td>
                        <td>
                            <a href="single_post.php?id=<?= $data['id']?>" class="btn btn-sm btn-primary">view</a>
                            <a href="post_edit.php?id=<?= $data['id']?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="post_delete.php?id=<?= $data['id']?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="post_status.php?id=<?= $data['id']?>" class="btn btn-sm btn-<?= $data['status'] == 1 ? "warning" : "success"?>">
                            <?= $data['status'] == 1 ? "Draft" : "Active"?></a>
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
        if(isset($draft_post)){?>
            <table class="table">
            <h2 class ="text-danger text-center my-3">Draft Post</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>post</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($draft_post as $data):?>
                    <tr>
                        <th><?= $data['id']?></th>
                        <td><?= $data['title']?></td>
                        <td><?= substr($data['post'], 0, 10)?></td>
                        <td>
                            <?php if($data['image']){?>
                            <img src="post_image/<?=$data['image']?>" alt="<?= $data['title']?>" width="60" height="60">
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
                                <?= $data['status'] == 1 ? "Active" : "Draft"?>
                            </span>
                        </td>
                        <td><?= $data['created_at']?></td>
                        <td>
                            <a href="single_post.php?id=<?= $data['id']?>" class="btn btn-sm btn-primary">view</a>
                            <a href="post_edit.php?id=<?= $data['id']?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="post_delete.php?id=<?= $data['id']?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="post_status.php?id=<?= $data['id']?>" class="btn btn-sm btn-<?= $data['status'] == 1 ? "warning" : "success"?>">
                            <?= $data['status'] == 1 ? "Draft" : "Active"?></a>
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