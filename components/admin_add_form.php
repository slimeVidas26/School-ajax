<?php
$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
?>

<div class="jumbotron">
  <form action="" method="post" name="displayAdminForm" id="displayAdminForm" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="hidden" name="id" class="id" value="<?php echo $this->data['admin']['id']; ?>">
    <p class="h4 text-center mb-4">
    <?php
       if (isset($route[2]) && $route[2] != '') {
        echo 'Edit administrator';
       }
       else{
        echo 'Add administrator';
       }
       ?>
    </p>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <button type="button" name="saveAdmin" class="saveAdmin btn btn-success pull-left">Save</button>
        </div>
        <div class="col-sm-6">
          <button type="button" id="deleteAdmin" data-id="<?php echo $this->data['admin']['id'] ?>" class="btn btn-danger pull-right">Delete</button>
        </div>
      </div>

      <div class="form-group">
        <label for="adminName">Name : </label>
        <input type="text" name="adminName" value="<?php echo $this->data['admin']['adminName'] ?>" class="adminName form-control "
          placeholder="Enter the name">
      </div>

      <div class="form-group">
        <label for="adminRole">Role : </label>
        <select name="adminRole" class="adminRole form-control" placeholder="Enter the role">

          <option value="owner">Owner</option>
          <option value="manager">Manager</option>
          <option value="sale">Sale</option>

        </select>
      </div>



      <div class="form-group">
        <label for="adminPhone">Phone : </label>
        <input type="text" name="adminPhone" value="<?php echo $this->data['admin']['adminPhone'] ?>" class="adminPhone form-control "
          placeholder="Enter the phone">
      </div>
      <div class="form-group">
        <label for="adminEmail">Email : </label>
        <input type="email" name="adminEmail" value="<?php echo $this->data['admin']['adminEmail'] ?>" class="adminEmail form-control"
          id="email" placeholder="Enter email">
      </div>



      <div class="form-group">
        <label for="adminHash">hash : </label>
        <input type="text" name="adminHash" value="<?php echo $this->data['admin']['adminHash'] ?>" class="adminHash form-control"
          placeholder="Enter the hash">
      </div>
      <input type="hidden" name="hiddenImage" value="<?php echo $this->data['admin']['adminImage'] ?>" class="hiddenImage form-control"

      <div class="form-group image-upload">
        <label for="fileToUpload">
        <?php if (empty($route[2])){?>
          <img src="/school/images/placeholder.jpg" />
        <?php }
        else {?>
          <img src="/school/uploads/<?php echo $this->data['admin']['adminImage'];?>" />
        <?php }?>        </label>
        <input type="file"  class="adminImage form-control-file" name="fileToUpload" value="<?php echo $this->data['admin']['adminImage']; ?>">
       
      </div>
  </form>

  </div>
</div>

</div>
<!-- END OF ROW -->
</div>
<!--container END -->
</div>