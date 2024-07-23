function validPass() {
    var pass = document.getElementsByClassName("psw");
    if (pass[1].value == pass[2].value) {
      return true;
    } else {
      alert("Password do not match");
      return false;
    }
  }
  
  function showPass() {
    var pass = this.parentElement.parentElement.previousElementSibling;
    if (this.checked) {
      pass.type = "text";
    } else {
      pass.type = "password";
    }
  }
  
  function validMail() {
    var mail = this.value;
    var warn = this.nextElementSibling;
  
    var regx =
      /^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9]+)\.([a-z]{2,10})(.[a-z]{2,8})?$/;
    if (regx.test(mail) | (mail == "")) {
      warn.style.display = "none";
      return true;
    } else {
      warn.innerHTML = "Email invalid";
      warn.style.display = "inline";
      warn.style.color = "red";
      return false;
    }
  }
