<?php
$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
?>
<div class="jumbotron">


  <form action="" method="post" name="displayCourseForm" id="displayCourseForm" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="hidden" name="id" class="id" value="<?php echo $this->data['course']['id']; ?>">
    <input type="hidden" name="totalStudents" class="totalStudents" value=" <?php echo $this->data['totalStudents']; ?>">

    <p class="h4 text-center mb-4">
       <?php
       if (isset($route[2]) && $route[2] != '') {
        echo 'Edit course';
       }
       else{
        echo 'Add course';
       }
       ?>
       </p>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <button type="button" name="saveCourse" class="saveCourse btn btn-success pull-left">Save</button>
        </div>
        <div class="col-sm-6">
          <button type="button" id="deleteCourse" data-id="<?php echo $this->data['course']['id'] ?>" class="btn btn-danger pull-right">Delete</button>
        </div>
      </div>

      <div class="form-group">
        <label for="courseName">Name : </label>
        <input type="text" name="courseName" value="<?php echo $this->data['course']['courseName'] ?>" class="courseName form-control "
          placeholder="Enter the name">
      </div>
      <div class="form-group">
        <label for="courseDescription">Description : </label>
        <textarea name="courseDescription" class="courseDescription form-control" rows="3">
          <?php echo $this->data['course']['courseDescription']; ?>
        </textarea>
      </div>


      <div class="form-group image-upload">
        <label for="fileToUpload">
        <?php if (empty($route[2])){?>
          <img src="/school/images/placeholder2.png" />
       <?php }
        else {?>
          <img src="/school/uploads/<?php echo  $this->data['course']['courseImage'];?>" />
        <?php }?>
        </label>
        <input type="hidden" name="hiddenImage" value="<?php echo $this->data['course']['courseImage'] ?>" class="hiddenImage form-control">

        <input type="file" class="courseImage form-control-file" name="fileToUpload" value="<?php echo $this->data['course']['courseImage'] ?>">
      </div>



      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Total</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" value=" <?php echo $this->data['totalStudentsByCourse']; ?> students taking this course"
            placeholder="Readonly input here…" readonly>
        </div>
      </div>


  </form>
  <?php
if (isset($this->data['error'])) {
	echo "<p id='addCourserr' class='text-danger'>{$this->data['error']}</p>";
} else {
	echo "<p id='addCourserr' class='hide'></p>";
}
?>
    </div>
</div>

</div>
<!-- END OF ROW -->
</div>
<!--container END -->
</div>