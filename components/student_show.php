<div class="jumbotron">
  <form action="" method="post" name="studentShow">

    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <p class="h4 text-center mb-4 pull-left">
            <?php echo $this->data['student']['studentName'] ?>
          </p>
        </div>
        <div class="col-sm-6">
          <button id="updateStudent" type="button" data-id="<?php echo $this->data['student']['id'] ?>" class="btn btn-warning pull-right">Edit</button>

        </div>

      </div>
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group image-upload">
            <label for="inputFile">
              <img src="/school/uploads/<?php echo $this->data['student']['studentImage'] ?>" />
            </label>
          </div>
        </div>

        <div class="col-sm-10">
          <div class="form-group">
            <div class="form-control" id="textarea" rows="6">
              
              <p>Name : <?php echo $this->data['student']['studentName'] ?></p>
              <p>Phone : <?php echo $this->data['student']['studentPhone'] ?></p>
              <p>Email : <?php echo $this->data['student']['studentEmail'] ?></p>
              
</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <?php for ($i = 0; $i < count($this->data['studentsByCourse']); $i++) {?>

          <div class="form-group image-upload">
            <label for="inputFile">
              <img src="/school/uploads/<?php echo $this->data['studentsByCourse'][$i]['courseImage']; ?>" />
            </label>
            <p class="name">
              <?php echo $this->data['courses'][$i]['courseName']; ?>
            </p>


          </div>
          <?php }?>


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