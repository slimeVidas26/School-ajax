<div class="jumbotron">
  <form action="" method="post" name="adminShow">

    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <p class="h4 text-center mb-4 pull-left">
            <?php echo $this->data['admin']['adminName'] ?>
          </p>
        </div>
        <div class="col-sm-6">
          <button id="updateAdmin" type="button" data-id="<?php echo $this->data['admin']['id'] ?>" class="btn btn-warning pull-right">Edit</button>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group image-upload">
            <label for="inputFile">
              <img src="/school/uploads/<?php echo $this->data['admin']['adminImage'] ?>" />
            </label>
          </div>
        </div>

        <div class="col-sm-10">
          <div class="form-group">
            <div class="form-control" id="Textarea" name="textarea" rows="6" >
             <p class="bld">Name :  <?php echo $this->data['admin']['adminName'] ?></p>
              <p class="bld">Role : <?php echo $this->data['admin']['adminRole'] ?></p>
              <p class="bld">Phone : <?php echo $this->data['admin']['adminPhone'] ?></p>
              <p class="bld">Email : <?php echo $this->data['admin']['adminEmail'] ?></p>
</div>
          </div>
        </div>
      </div>


  </form>
  </div>
</div>

</div>
<!-- END OF ROW -->
</div>
<!--container END -->
</div>