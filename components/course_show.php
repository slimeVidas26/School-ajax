<div class="jumbotron">
  <form action="" method="post" name="courseShow">

    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <p class="h4 text-center mb-4 pull-left">
            <?php echo $this->data['course']['courseName'] ?>
          </p>
        </div>
        <div class="col-sm-6">
          <button id="updateCourse" type="button" data-id="<?php echo $this->data['course']['id'] ?>" class="btn btn-warning pull-right">Edit</button>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group image-upload">
            <label for="inputFile">
              <img src="/school/uploads/<?php echo $this->data['course']['courseImage'] ?>" />
            </label>
            <!-- <input type="file" class="form-control-file" id="inputFile" aria-describedby="fileHelp"> -->
          </div>
        </div>

        <div class="col-sm-10">
          <div class="form-group">
            <textarea class="form-control" id="Textarea" name="textarea" rows="8" >
              <?php echo $this->data['course']['courseDescription'] ?>
            </textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <?php for ($i = 0; $i < count($this->data['studentsByCourse']); $i++) {?>
          <div class="form-group image-upload">
            <label for="inputFile">
              <img src="/school/uploads/<?php echo $this->data['studentsByCourse'][$i]['studentImage']; ?>" />
            </label>
            <p class="name">
              <?php echo $this->data['studentsByCourse'][$i]['studentName']; ?>
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