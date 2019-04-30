$(function () {
 


  $("#displayCourseForm .saveCourse").on('click', function (e) {
    var uploadFile = $('#displayCourseForm .courseImage').val().trim(); 

    var courseId = $('#displayCourseForm .id').val().trim();
    if (courseId == '' && validateCourseForm(true, true, true)) {

      $("#displayCourseForm").attr('action', '/school/course/add');
      $("#displayCourseForm").submit();
    } else if (courseId != '' && validateCourseForm(true, true, false)) {
      if(!uploadFile){
        e.preventDefault();
        alert('Sorry , this will not work without uploading again image');
      }
      else{
        $("#displayCourseForm").attr('action', '/school/course/add');
        $("#displayCourseForm").submit(); 
      }
   
    }
  
  });

  
  /////////////////////////////////////////////////////////////////////////////////

  $("#displayStudentForm .saveStudent").on('click', function (e) {
    var uploadFile = $('#displayStudentForm .courseImage').val().trim(); 

    var studentId = $('#displayStudentForm .id').val().trim();
    if (studentId == '' && validateStudentForm(true, true, true, true)) {

      $("#displayStudentForm").attr('action', '/school/student/add');
      $("#displayStudentForm").submit();
    } else if (studentId != '' && validateStudentForm(true, true, true, false)) {
      if(!uploadFile){
        e.preventDefault();
        alert('Sorry , this will not work without uploading again image');
      }
      else{
        $("#displayStudentForm").attr('action', '/school/student/add');
        $("#displayStudentForm").submit(); 
      }
      
    }
  });




  // update course
  $("#updateCourse").on('click', function (e) {
    var id = $(this).attr('data-id');
    $(location).attr('href', '/school/course/displayCourseForm/' + id);
  });
  // delete course

  $("#deleteCourse").on('click', function (e) {
    var totalStudents = $("#displayCourseForm .totalStudents").val();
    if (totalStudents < 0) {
      if (confirm("Delete this course?")) {
        var id = $(this).attr('data-id');
        $(location).attr('href', '/school/course/delete/' + id);
      }
    } else {
      alert("You can't delete a course that has students");
      return false;
    }
  });

  // update student
  $("#updateStudent").on('click', function (e) {
    var id = $(this).attr('data-id');
    $(location).attr('href', '/school/student/displayStudentForm/' + id);
  });
  // delete student
  $("#deleteStudent").on('click', function (e) {
    if (confirm("Delete this student?")) {
      var id = $(this).attr('data-id');
      $(location).attr('href', '/school/student/delete/' + id);
    }
  });

  //////////////////////////////////////////////////////////////////////////////////////////////
  function validateCourseForm(name, description, image) {
    $('#message .errorMessage').empty();
    var ret = {};
    var err = [];

    if (name) {
      ret.courseName = $('#displayCourseForm .courseName').val().trim();
      if (ret.courseName == '') {
        err.push('Name');
      }
    }
    if (description) {
      ret.courseDescription = $('#displayCourseForm .courseDescription').val().trim();
      if (ret.courseDescription == '') {
        err.push('Description ');
      }
    }
    if (image) {
      ret.courseImage = $('#displayCourseForm .courseImage').val().trim();
      if (ret.courseImage == '') {
        err.push('Image ');
      }
    }
    if (err.length > 0) {
      $('#message .errorMessage').html('<p>Missing: ' + err.join(', ') + '</p>');
      ret = null;
    }
    return ret;
  }


  //////////////////////////////////////////////////////////////////////////////////////////////
  function validateStudentForm(name, phone, email, image) {
    $('#message .errorMessage').empty();
    var ret = {};
    var err = [];

    if (name) {
      ret.studentName = $('#displayStudentForm .studentName').val().trim();
      if (ret.studentName == '') {
        err.push('Name ');
      }
    }
    if (phone) {
      ret.studentPhone = $('#displayStudentForm .studentPhone').val().trim();
      if (ret.studentPhone == '') {
        err.push('Phone ');
      }
    }
    if (email) {
      ret.studentEmail = $('#displayStudentForm .studentEmail').val().trim();
      if (ret.studentEmail == '') {
        err.push('Email ');
      }
    }
    if (image) {
      ret.studentImage = $('#displayStudentForm .studentImage').val().trim();
      if (ret.studentImage == '') {
        err.push('Image ');
      }
    }
    if (err.length > 0) {
      $('#message .errorMessage').html('<p>Missing: ' + err.join(', ') + '</p>');
      ret = null;
    }
    return ret;
  }


});
////////////////////////////////////////////////////////////////////////////////////////////