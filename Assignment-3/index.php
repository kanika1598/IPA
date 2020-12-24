<?php

error_reporting(0);



$host = "localhost";
$dbuser = "root";
$password = "";
$dbname = "registeration_records";

$connection = mysqli_connect($host, $dbuser, $password, $dbname);

if(mysqli_connect_errno()) {
  die("Connection Failed!");
}

if(isset($_POST['submit'])) {
  $fname = $_POST['Fname'];
  $lname = $_POST['Lname'];
  $email = $_POST['Email'];
  $password = $_POST['Password'];
  $confirm = $_POST['Conpassword'];
  $gender = $_POST['Gender'];
  $quali = $_POST['quali'];
  $address = $_POST['Address'];
  $contact = $_POST['Contact'];
  $date = $_POST['Date'];
  $month = $_POST['Month'];
  $year = $_POST['Year'];
  $file = $_POST['Myfile'];
  $agree = $_POST['Agree'];

  
  $name = $fname. " ".$lname;
  $quali_each = implode(", ", $quali);
  $dob = $date."th ".$month.",".$year;

  if(empty($fname)) {
    $error_fname = "First Name is Required!";
  }
  if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
    $error_fname = "Only Letters are Allowed!";
  }
  
  if(empty($lname)) {
    $error_lname = "Last Name is Required!";
  }
  if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
    $error_lname = "Only Letters are Allowed!";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_email = "Provide a Valid Email!";
  }

  if(empty($password)) {
    $password_error = "Password is Required!";
  }
  if(empty($confirm)) {
    $confirm_error = "Confirm your Password!";
  }
if($password !== $confirm) {
  $confirm_error = "Passwords do not Match!";
}
if(empty($gender)) {
  $error_gender = "Provide your Gender!";
}
if(empty($quali)) {
  $error_quali = "Give your Qualification!";
}

if(empty($address)) {
  $error_address = "Please Enter your Address!";
}
if(empty($contact)) {
  $error_contact = "Contact is Required!";
}
if(strlen($contact) < 10) {
  $error_contact = "Contact must include 10 Digits!";
}
if(strlen($contact) > 10) {
  $error_contact = "Contact must include 10 Digits!";
}

if(empty($file)) {
  $file_error = "Required!";
}

if(!isset($_POST['Agree'])) {
  $agree_error = "Agree to the Terms & Conditions!";
}


else {
  $sql = "INSERT INTO data_entries(Name, Email, Password, Gender, Qualification, Address, Contact, Date_of_Birth) VALUES('$name', '$email', '$password', '$gender', '$quali_each', '$address', '$contact', '$dob')";

  $result = mysqli_query($connection, $sql);
  if(!$result) {
    echo "<script>alert(Data not Inserted!)</script>";
  }
  else {
    echo "<script>alert(Data Inserted Successfully!)</script>";
  }
}
}
?>

<html>

<head>
  <title>Registeration Form</title>
  <link rel="stylesheet" href="stylesheet.css">
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
  <script type="text/javascript" src="validation.js"></script>
</head>

<body>
  <h1 class="heading_style">Register Here</h1>
  <form name="myForm" method="POST" class="main_div">
    <table class="table_div">
      <tr>
        <th>First Name:</th>
        <td><input type="text" placeholder="First Name" name="Fname">
        <span class="error">*</span></td>
        <td class="error"><?php echo $error_fname;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Last Name:</th>
        <td><input type="text" placeholder="Last Name" name="Lname">
        <span class="error">*</span></td>
        <td class="error"><?php echo $error_lname;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Email:</th>
        <td><input type="email" placeholder="Email Id" name="Email">
        <span class="error">*</span></td>
        <td class="error"><?php echo $error_email;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Password:</th>
        <td>
          <input type="password" placeholder="Password" name="Password">
          <span class="error">*</span>
        </td>
        <td class="error"><?php echo $password_error;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Confirm Password:</th>
        <td>
          <input type="password" placeholder="Confirm Password" name="Conpassword">
          <span class="error">*</span>
        </td>
        <td class="error"><?php echo $confirm_error;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Gender:</th>
        <td>
          <input type="radio" value="Male" name="Gender">Male&nbsp;&nbsp;
          <input type="radio" value="Female" name="Gender">Female
          <span class="error">*</span>
        </td>
        <td class="error"><?php echo $error_gender;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Qualification:</th>
        <td>
          <input type="checkbox" value="X" name="quali[]">X&nbsp;&nbsp;
          <input type="checkbox" value="XII" name="quali[]">XII
          <span class="error">*</span>
        </td>
        <td class="error"><?php echo $error_quali;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Address:</th>
        <td><textarea rows="3" cols="35" name="Address"></textarea>
        <span class="error">*</span></td>
        <td class="error"><?php echo $error_address;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Contact Number:</th>
        <td><input type="number" name="Contact">
        <span class="error">*</span></td>
        <td class="error"><?php echo $error_contact;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <th>Date of Birth:</th>
        <td>
          <select name="Date" required>
            <option value="" selected>DD</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
          <select name="Month" required>
            <option value="" selected>MM</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <select name="Year" required>
            <option value="" selected>YYYY</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
          </select>
          <span class="error">*</span>
        </td>
      </tr>
      <tr></tr>
      <tr>
        <th>Upload your Photo:</th>
        <td><input type="file" name="Myfile">
        <td class="error"><?php echo $file_error;   ?></td>
      </tr>
      <tr></tr>
      <tr>
        <td>
          <input type="checkbox" id="Agree" name="Agree">&nbsp;
          <b>I agree the Company's Terms and Conditions</b>
          <span class="error">*</span>
        </td>
        <td class="error"><?php echo $agree_error;   ?></td>
      </tr>
      <tr>
        <td align="center">
          <button class="submit_btn" type="submit" name="submit">Submit</button>
        </td>
        <td align="center">
          <button class="reset_btn" type="reset">Reset</button>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>