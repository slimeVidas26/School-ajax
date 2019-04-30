<?php
$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
?>


<div class="jumbotron">

  <form action="#" method="post" name="displayStudentForm" id="displayStudentForm" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">

    <input type="hidden" name="id" class="id" value="<?php echo $this->data['student']['id']; ?>">
    <p class="h4 text-center mb-4">
    <?php
       if (isset($route[2]) && $route[2] != '') {
        echo 'Edit student';
       }
       else{
        echo 'Add student';
       }
       ?>
    </p>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <button type="button" name="saveStudent" class="saveStudent btn btn-success pull-left">Save</button>
        </div>
        <div class="col-sm-6">
          <button type="button" id="deleteStudent" data-id="<?php echo $this->data['student']['id']; ?>" class=" btn btn-danger pull-right">Delete</button>

        </div>
      </div>



      <div class="form-group">
        <label for="studentName">Name : </label>
     
        <input type="text" name="studentName" value="<?php echo $this->data['student']['studentName'] ?>" class="studentName form-control "
          placeholder="Enter the name">

      </div>
      <div class="form-group">
        <label for="studentPhone">Phone : </label>
        <input type="text" name="studentPhone" value="<?php echo $this->data['student']['studentPhone']; ?>" class="studentPhone form-control "
          placeholder="Enter the phone">
      </div>
      <div class="form-group">
        <label for="studentEmail">Email : </label>
        <input type="text" name="studentEmail" value="<?php echo $this->data['student']['studentEmail']; ?>" class="studentEmail form-control "
          placeholder="Enter the mail">
      </div>



      <div class="form-group image-upload">
        <label for="fileToUpload">
        <?php if (empty($route[2])){ ?>
          <img src="/school/images/placeholder.jpg"/>
        <?php }

        else { ?>
          <img src="/school/uploads/<?php echo $this->data['student']['studentImage'];?>" />
        <?php } ?> 
        </label>  
        <input type="hidden" name="hiddenImage" value="<?php echo $this->data['student']['studentImage'] ?>" class="hiddenImage form-control"

        <input type="file" class="studentImage form-control-file" name="fileToUpload" value="<?php echo $this->data['student']['studentImage']; ?>">
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-6">
            <div class="custom-control custom-checkbox">


            <?php
            
            $studentCourseID =null;
            $studentCourseID['value']=null;
            $studentCourseList = [];
            $route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
            if (isset($route[2]) && $route[2] != '') {
            $studentCourseList = $this->data['studentCourses'];//data_getAllCoursesByStudent($route[2])
            for($j=0;$j < count($studentCourseList);$j++){
            $studentCourseID = $this->data['studentCourses'][$j];
            $studentCourseID['value'] = "no";
            array_push($studentCourseID , $studentCourseID['value']);
                            }
                           }
          
  $courses = $this->data['courses'];//data_getAllCourses()
  for ($i = 0; $i < count( $courses); $i++) {
    $courseID =$this->data['courses'][$i]['id'];
    for($j=0; $j < count($studentCourseList);$j++){
      if( $courseID == $studentCourseList[$j]['id']){
      $studentCourseID['value'] = "yes";
    }
    else{
      $studentCourseID['value'] = "no"; 
    }
    } 
   
     
    ?>
  
  <input type="checkbox" name="coursesGroup[]"  value="<?php echo  $courseID; ?>" class="custom-control-input"
                   id="customCheck"   <?php if($studentCourseID['value'] == 'yes') echo 'checked="checked"';?>> 
                 <label class="custom-control-label" for="customCheck">
                   <?php echo $this->data['courses'][$i]['courseName']; ?>
                 </label>
                 </br>
    
 
   <?php } 

?>

                <div>

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