<?php
    require_once "inc/header.php"
?>


<table class="table">
  <thead>
    <tr class="table-info">
      <th>ID</th>
      <th>title</th>
      <th>post</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?= $data['id']?></th>
      <td><?= $data['title']?></td>
      <td><?= $data['post']?></td>
      <td>
      <?php if($data['image']){?>
        <img src="post_image/<?= $data['image']?>" alt="<?= $data['image']?>" 
        width="50" height="50">
        <?php }else{
            echo "--";
        } ?>
      </td>
      <td>
      <a href="post_edit.php?id=<?= $data['id']?>" class="btn btn-sm btn-info">Edit your post</a>
      </td>
    </tr>
  </tbody>
</table>





<?php
    require_once "inc/footer.php";
?>