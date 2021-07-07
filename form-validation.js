function validateForm() {
  var name = document.forms["myForm"]["name"].value;
  var username = document.forms["myForm"]["username"].value;
  var email = document.forms["myForm"]["email"].value;
  var password = document.forms["myForm"]["password"].value;
  var age = document.forms["myForm"]["age"].value;
  
  if (name == "") {
    alert("Name must be filled out");
    return false;
  }
  if (username == "") {
    alert("username must be filled out");
    return false;
  }
  if (email == "") {
    alert("Email must be filled out");
    return false;
  }
  if (password == "") {
    alert("Password must be filled out");
    return false;
  }
  if (age <= 18 || age >= 23) {
    alert("Please enter age between 18 and 23");
    return false;
  }
} 