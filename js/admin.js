$(function () {
  $("#displayAdminForm .saveAdmin").on('click', function (e) {
   
    var uploadFile = $('#displayAdminForm .adminImage').val().trim(); 
    var adminId = $('#displayAdminForm .id').val().trim();
    if (adminId == '' && validateAdminForm(true, true, true,true, true, true)) {
      $("#displayAdminForm").attr('action', '/school/administration/add');
       $("#displayAdminForm").submit();
    } else if (adminId != '' && validateAdminForm(true, true, true,false, true, true)) {
      if(!uploadFile){
      e.preventDefault();
      alert('Sorry , this will not work without uploading again image');
    }
    else{
      $("#displayAdminForm").attr('action', '/school/administration/add');
      $("#displayAdminForm").submit(); 
    }
    }
   });
  /////////////////////////////////////////////////////////////////////////////////

 

  function validateAdminForm(name, role, phone, image, email, hash) {
    $('#message .errorMessage').empty();
    var ret = {};
    var err = [];

    if (name) {
      ret.adminName = $('#displayAdminForm .adminName').val().trim();
      if (ret.adminName == '') {
        err.push('Name ');
      }
    }
    if (role) {
      ret.adminRole = $('#displayAdminForm .adminRole').val().trim();
      if (ret.adminRole == '') {
        err.push('Role ');
      }
    }
    if (phone) {
      ret.adminPhone = $('#displayAdminForm .adminPhone').val().trim();
      if (ret.adminPhone == '') {
        err.push('Phone ');
      }
    }
    if (image) {
      ret.adminImage = $('#displayAdminForm .adminImage').val().trim();
      if (ret.adminImage == '') {
        err.push('Image ');
      }
    
    }

    if (email) {
      ret.adminEmail = $('#displayAdminForm .adminEmail').val().trim();
      if (ret.adminEmail == '') {
        err.push('Email ');
      }
    }
    if (hash) {
      ret.adminHash = $('#displayAdminForm .adminHash').val().trim();
      if (ret.adminHash == '') {
        err.push('Hash ');
      }
    }
    if (err.length > 0) {
      $('#message .errorMessage').html('<p>Missing: ' + err.join(', ') + '</p>');
      ret = null;
    }
    return ret;
  }


  
  // update course
  $("#updateAdmin").on('click', function (e) {
    
    var id = $(this).attr('data-id');
    $(location).attr('href', '/school/administration/displayAdminForm/' + id);
   
  
  });
  

  
  

  // delete course
  $("#deleteAdmin").on('click', function (e) {
    if (confirm("Delete this admin ?")) {
      var id = $(this).attr('data-id');
      $(location).attr('href', '/school/administration/delete/' + id);
    }

   
  });



});