<?php
    require_once "inc/header.php";
?>



<div class="container">

            <form action="search_user.php" method="POST" class="d-flex" role="search">
            <input type="search" name="search" required class="me-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-success" name="submit">Search</button>
        </form>
    <?php
        if(isset($user_name_data)){?>

            
            <table class="table">
                <h2 class="text-center my-2 text-danger">Search Result</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <!-- <th>name</th> -->
                    <th>name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
                foreach($user_name_data as $data):?>
                    <tr>
                        <td><?= $data['id']?></td>
                        <!-- <td>
                            <?php
                               $name_length = strlen($data['name']);
                               
                               for ($i = 0; $i < $search_char_length; $i++) {
                                   for ($j = 0; $j < $name_length; $j++) {
                                       if ($search_char[$i] == $data['name'][$j]) {?>
                                           <p class="bg-<?= $data['name'][$j] ? "warning":"white"?>">
                                           <?= $data['name'][$j]?></p>
                                        <?php
                                       }
                                   }
                               }
                           ?>
                           
                        </td> -->
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
        }elseif(isset($user_id_or_email_data)){
            foreach($user_id_or_email_data as $data){
            ?>
            
            <h2 class="text-center my-5 text-danger">Welcome <?= $data['name']?></h2>
            <p class="text-primary text-center">Here your user information:</p>
            <p class="text-center text-danger">ID: <?= $data['id']?></P>
            <p class="text-center text-danger">Name: <?= $data['name']?></P>
            <p class="text-center text-danger">Email: <?= $data['email']?></P>
            
            <div class="d-flex justify-content-center">
            <a href="single_user.php?id=<?= $data['id']?>" class="btn btn-sm btn-primary">View More about you</a>
            </div>
       
    <?php
        }}else{?>

            <h2 class="text-center my-5 text-danger"><?= $not_found?></h2>

        <?php
            
        }

        

    ?>



    
</div>









<?php
    require_once "inc/footer.php";
?>