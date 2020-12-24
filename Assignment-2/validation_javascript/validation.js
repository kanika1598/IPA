function validateBox() {
  var fname = document.forms["myForm"]["Fname"];
  var lname = document.forms["myForm"]["Lname"];
  var email = document.forms["myForm"]["Email"];
  var password = document.forms["myForm"]["Password"];
  var conpassword = document.forms["myForm"]["Conpassword"];
  var address = document.forms["myForm"]["Address"];
  var gender = document.forms["myForm"]["Gender"];
  var date = document.forms["myForm"]["Date"];
  var day = document.forms["myForm"]["Day"];
  var month = document.forms["myForm"]["Month"];
  var agree = document.getElementById["Agree"];
  var myfile = document.forms["myForm"]["Myfile"];
  var contact = document.forms["myForm"]["Contact"];
  var ten = document.forms["myForm"]["Ten"];
  var twelve = document.forms["myForm"]["Twelve"];

  var first_pattern = /^([A-Z]{1,1})+([a-z])+$/
  var last_pattern = /^([A-Z]{1,1})+([a-z])+$/
  var mail_pattern = /^([A-Za-z]{1,1})+([A-Za-z0-9._])+@(([A-Za-z0-9])+\.)+([A-Za-z]{2,3})+$/;


  if (fname.value == "") {
    alert("Please provide your First Name");
    fname.focus();
    return false;
  }
  if (!first_pattern.test(fname.value)) {
    alert("Enter First Name with First letter as Capital");
    fname.focus();
    return false;
  }
  if (lname.value == "") {
    alert("Please provide your Last Name");
    lname.focus();
    return false;
  }
  if (!last_pattern.test(lname.value)) {
    alert("Enter Last Name with First letter as Capital");
    lname.focus();
    return false;
  }
  if (email.value == "") {
    alert("Please provide your Email");
    email.focus();
    return false;
  }
  if (!mail_pattern.test(email.value)) {
    alert("Please enter a Valid Email ID");
    email.focus();
    return false;
  }
  if (password.value != conpassword.value) {
    alert("Password and Confirm Password doesn't match!");
    return false;
  }
  if (password.value == "") {
    alert("Please provide your Password!");
    password.focus();
    return false;
  }
  if (conpassword.value == "") {
    alert("Please confirm your Password");
    conpassword.focus();
    return false;
  }
  if (password.value.length < 5) {
    alert("Password must atleast 5 characters!");
    return false;
  }
  if (address.value == "") {
    alert("Please provide your Address");
    address.focus();
    return false;
  }
  if (gender.value == "") {
    alert("Enter your Gender");
    return false;
  }
  if (contact.value == "" || contact.value.length != 10) {
    alert("Enter your Contact! Must Contain 10 digits!");
    contact.focus();
    return false;
  }
  if (date.selectedIndex == 0) {
    alert("Date Field must not be Empty");
    return false;
  }
  if (day.selectedIndex == 0) {
    alert("Day Field must not be Empty");
    return false;
  }
  if (month.selectedIndex == 0) {
    alert("Month Field must not be Empty");
    return false;
  }
  if (ten.checked == false && twelve.checked == false) {
    alert("Please enter your Qualification!");
    return false;
  }
  if (!myfile.value) {
    alert("Please provide File!");
    return false;
  }
  if (agree.checked == false) {
    alert("Agree to all the terms and Conditions.");
    agree.focus();
    return false;
  }
  return true;
}
