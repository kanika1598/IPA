<?php

session_start();
if(!isset($_SESSION['user'])) {
    header('location:login.php');
}
if(!isset($_SESSION['email'])) {
    header('location:login.php');
}

include ('../config/register_config.php');

$connection = mysqli_connect($host, $user, $password, $database);

$user_name = $_SESSION['user'];
$email = $_SESSION['email'];

$sql = "SELECT * FROM data_entries WHERE email = '$email'";
$sql_run = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($sql_run);

$sql_new = "SELECT photo FROM photo_data WHERE email = '$email'";
$sql_run_new = mysqli_query($connection, $sql_new);
$row_new = mysqli_fetch_assoc($sql_run_new);


?>


<html>

<head>
  <title>Admin Panel Page</title>
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style>
    table {
      width: 750px;
      border-collapse: collapse;
      margin: 50px auto;
    }

    /* Zebra striping */
    tr:nth-of-type(odd) {
      background: #eee;
    }

    th {
      background: #566573;
      color: white;
      font-weight: bold;
    }

    td,
    th,
    input {
      padding: 5px;
      border: 1px solid #ccc;
      text-align: left;
      font-size: 15px;
    }

    /* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

      table {
        width: 100%;
      }

      /* Force table to not be like tables anymore */
      table,
      thead,
      tbody,
      th,
      td,
      tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      tr {
        border: 1px solid #ccc;
      }

      td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
      }

      td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        /* Label the data */
        content: attr(data-column);

        color: #000;
        font-weight: bold;
      }

    }

    a:hover {
      color: white;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <nav>

    <header>
      <span><img style="border-radius:50%; width:60px; height:60px;"
          src="<?php echo $row_new['photo']; ?>"></span>
      <?php echo $user_name; ?>
    </header>

    <ul style="color: white;">
      <li>Navigation</li>
      <li><a class="active" href="admin.php">Dashboard</a></li>
      <li><a href="edit.php">Edit Details</a></li>
    </ul>

  </nav>

  <main>

    <h1>Admin Dashboard
      <span style="float:right; margin:23px; font-size: 13px;"><a href="logout.php">
          <h4>LOGOUT</h4>
        </a></span>
    </h1>
   
    <section id="my_details">
     <form action="update.php" method="POST">
      <table style="margin-top:-5px;">
        <thead  style="font-size:13px;">
        <!-- <tr>
            <th>Profile</th>
            <td><img style="margin:45px;" src="<?php echo $row['profile']; ?>"></td>
          </tr> -->
          <tr>
            <th>Name</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_name" type="text" class="form-control" value="<?php echo $row['name']; ?>"></td>
          </tr>
      
          <tr>
            <th>E-Mail</th>
            <td><input  style="font-size:13px;" autocomplete="off" type="text" class="form-control" readonly value="<?php echo $row['email']; ?>"></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_password"  type="text" class="form-control" value="<?php echo $row['password']; ?>"></td>
          </tr>
        
          <tr>
            <th>Contact</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_contact" type="text" class="form-control" value="<?php echo $row['contact']; ?>"></td>
          </tr>
          <tr>
            <th>Date of Birth(yyyy-mm-dd)</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_dob" type="text" class="form-control" value="<?php echo $row['dob']; ?>"></td>
          </tr>
          <tr>
            <th>Basic Education</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_basic_education" type="text" class="form-control" value="<?php echo $row['basic_education']; ?>"></td>
          </tr>
          <tr>
            <th>Professional Education</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_professional_education" type="text" class="form-control" value="<?php echo $row['professional_education']; ?>"></td>
          </tr>
          <tr>
            <th>Hobbies</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_hobbies" type="text" class="form-control" value="<?php echo $row['hobbies']; ?>"></td>
          </tr>
          <tr>
            <th>Address</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_address" type="text" class="form-control" value="<?php echo $row['address']; ?>"></td>
          </tr>
          <tr>
            <th>Occupation</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_occupation" type="text" class="form-control" value="<?php echo $row['occupation']; ?>"></td>
          </tr>
          <tr>
            <th>Organization</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_org_address" type="text" class="form-control" value="<?php echo $row['org_address']; ?>"></td>
          </tr>
          <tr>
            <th>Membership at Kendra</th>
            <td><input  style="font-size:13px;" autocomplete="off" name="edit_members" type="text" class="form-control" value="<?php echo $row['membership_kendra']; ?>"></td>
          </tr>

        </thead>
      </table>
        <div>
            <button style="float:right; margin:20px; background: #566573" type="submit" name="update_btn" class="btn btn-primary">Update</button>
            <a onclick="cancelPage()" style="float:right; margin:20px; color: white;"  class="btn btn-danger">Cancel</a>
        </div>
    </form>
    </section>
  </main>

</body>

<script>
    function cancelPage() {
        location.href='admin.php';
    }
</script>

</html>