<div class="row">
    <div class="col-sm-2">
        <div class="list-group">
            <a href="/school/course/displayCourseForm" class="list-group-item active">
                Courses
                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            </a>
            <?php for ($i = 0; $i < count($this->data['courses']); $i++) {
	?>
            <article class="list-group-item">
                <div class="clearfix image">


                    <a href="/school/course/show/<?php echo $this->data['courses'][$i]['id']; ?>">
                        <img src="/school/uploads/<?php echo $this->data['courses'][$i]['courseImage']; ?>" alt="..." class="pull-left">
                    </a>
                    <p class="name">
                        <?php echo $this->data['courses'][$i]['courseName']; ?>
                    </p>
                    <p class="phone">
                        <?php echo $this->data['courses'][$i]['coursePhone']; ?>
                    </p>



                </div>
            </article>
            <?php }?>




        </div>


    </div>

    <div class="col-sm-2">
        <div class="list-group">
            <a href="/school/student/displayStudentForm" class="list-group-item active">
                Students
                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>

            </a>
            <?php for ($i = 0; $i < count($this->data['students']); $i++) {
	?>
            <article class="list-group-item">
                <div class="clearfix image">
                    <a href="/school/student/show/<?php echo $this->data['students'][$i]['id']; ?>">
                        <img src="/school/uploads/<?php echo $this->data['students'][$i]['studentImage']; ?>" alt="..." class="pull-left">
                    </a>
                    <p class="name">
                        <?php echo $this->data['students'][$i]['studentName']; ?>
                    </p>
                    <p class="phone">
                        <?php echo $this->data['students'][$i]['studentPhone']; ?>
                    </p>
                </div>
            </article>
            <?php }?>



        </div>


    </div>

    <div class="col-sm-8">
        <!-- <div class="content school">
                    number of students , number of courses
                </div> -->