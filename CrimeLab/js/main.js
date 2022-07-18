function showPasswordFunction() {
    var x = document.getElementsById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

var check = function () {
  if (document.getElementById('myInput').value ==
      document.getElementById('myInput2').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Passwords Match';
  } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Passwords not matching';
  }
}

function showConfirmPasswordFunction() {
  var y = document.getElementsById("myInput2");
  if (y.type === "password") {
      y.type = "text";
  } else {
      y.type = "password";
  }
}

function matchPassword() {  
    var pw1 = document.getElementById("password").value;  
    var pw2 = document.getElementById("confirmPassword").value;  
    if(pw1 != pw2)  
    {   
      alert("Passwords did not match");  
    } else { 
      alert("Password created successfully");  
    }  
  }  