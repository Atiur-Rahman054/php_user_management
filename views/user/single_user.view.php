<?php
    require_once "inc/header.php"
?>


<table class="table">
  <thead>
    <tr class="table-info">
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?= $data['id']?></th>
      <td><?= $data['name']?></td>
      <td><?= $data['email']?></td>
      <td>
      <?php if($data['image']){?>
        <img src="profile/<?= $data['image']?>" alt="<?= $data['image']?>" 
        width="50" height="50">
        <?php }else{
            echo "--";
        } ?>
      </td>
      <td>
        <a href="password_reset.php" class="btn btn-sm btn-primary">Reset password</a>
      </td>
    </tr>
  </tbody>
</table>





<?php
    require_once "inc/footer.php";
?>