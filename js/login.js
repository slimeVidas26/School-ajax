  var f = document.forms.loginForm;
  f.elements.login.onclick = function () {

    if (validate()) {
      f.action = '/school/login';
      f.submit();
    }
  }



  function validate() {
    if (f.elements.adminEmail.value.trim() == '' || f.elements.adminPassword.value.trim() == '') {
      document.getElementById("message").className = '';
      document.getElementById("message").innerHTML = "Both email + password required!";

      return false;
    } else {
      return true;
    }
  }