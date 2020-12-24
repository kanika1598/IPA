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
    th {
      padding: 10px;
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

    /* #img_contain{
  border:1px solid grey;
  margin-top:10px;
  width:350px; */

    /* } */

    #file-input {

      padding: 10px;
      background-color: gray;
    }

    #image-preview {
      height: 150px;
      width: auto;
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding: 5px;
      float: right;
      border: black;
      border-radius: 18px;

    }

    .photo {
      display: none;
    }

    label {
      text-align: center;
    }

    label span {
      position: relative;
      display: inline-block;
      margin: 0 auto;
      padding: 10px;
      border-radius: 50px;
      background: linear-gradient(45deg, blue, #00ffa1);
      color: #fff;
      font-weight: 700;
      overflow: hidden;
      cursor:pointer;
    }

    label.progress-photo-bar span:before {
      content: '';
      position: absolute;
      top: -100px;
      left: -400px;
      width: 250px;
      height: 400px;
      background: #00000080;
      border-radius: 30% 40% 50% 40%;
      animation: rotate 20s linear infinite;
    }


    @keyframes rotate {
      100% {
        left: 0;
        transform: rotate(720deg);
      }
    }

    label.upload-photo-complete span:after {
      content: 'Edit Profile';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, #00de59, #4caf50);
      text-align: center;
      padding: 10px;
      font-weight: 700;
    }

    label.upload-photo-complete span {
      padding: 10px;
      transition: all ease 0.5s;

    }

    label.progress-photo-bar {
      pointer-events: none;

    }
  </style>
</head>

<body>
  <nav>

    <header>
      <span><img style="border-radius:50%; width:60px; height:60px; font-size:13px;"
          src="<?php echo $row_new['photo']; ?>" alt="Insert Profile"></span>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <body>
      <form id="form1" runat="server" method="POST" action="photo_insert.php" enctype="multipart/form-data">

        <div id='img_contain' class="row" style="float:right;">
          <img id="image-preview" src="<?php echo $row_new['photo']; ?>"
            alt="Choose your Photo and Click Save" title='' style="float:left;" />
        </div>
        <div class="form-group row" style="float:right; height:5px;">
          <label class=" upload-photo">
            <input style="display: none;" type="file" class="photo" name="file" id="file-input">
            <span class="upload-file-photo">Edit Profile</span>
           
          </label>
        </div>

        </div>
        <input type="hidden" value="<?php echo $row['name']; ?>" name="name">
        <input type="hidden" value="<?php echo $row['email']; ?>" name="email">
        <button style="float:right; margin-top:150px; margin-right:-150px;" type="submit" class="btn btn-secondary" name="save_image">Save</button>
      </form>
    </body>
    <section id="my_details">

      <table style="margin-top:10%;">
        <thead>
          <!-- <tr>
            <th>Profile</th>
            <td><img style="margin:45px;" src="<?php echo $row['profile']; ?>"></td>
          </tr> -->
          <tr>
            <th>Name</th>
            <td><?php echo $row['name']; ?></td>
          </tr>

          <tr>
            <th>E-Mail</th>
            <td><?php echo $row['email']; ?></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><?php echo $row['password']; ?></td>
          </tr>
          <tr>
            <th>Contact</th>
            <td><?php echo $row['contact']; ?></td>
          </tr>
          <tr>
            <th>Date of Birth(yyyy-mm-dd)</th>
            <td><?php echo $row['dob']; ?></td>
          </tr>
          <tr>
            <th>Basic Education</th>
            <td><?php echo $row['basic_education']; ?></td>
          </tr>
          <tr>
            <th>Professional Education</th>
            <td><?php echo $row['professional_education']; ?></td>
          </tr>
          <tr>
            <th>Hobbies</th>
            <td><?php echo $row['hobbies']; ?></td>
          </tr>
          <tr>
            <th>Address</th>
            <td><?php echo $row['address']; ?></td>
          </tr>
          <tr>
            <th>Organization</th>
            <td><?php echo $row['org_address']; ?></td>
          </tr>
          <tr>
            <th>Occupation</th>
            <td><?php echo $row['occupation']; ?></td>
          </tr>
          <tr>
            <th>Membership at Kendra</th>
            <td><?php echo $row['membership_kendra']; ?></td>
          </tr>
        </thead>
      </table>
    </section>
  </main>

</body>


<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image-preview').attr('src', e.target.result);
        $('#image-preview').hide();
        $('#image-preview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file-input").change(function () {
    readURL(this);
  });

</script>
<script>
  $('.photo').on('change', function (e) {
    var photo = e.target.files[0].name;
    $('.photo').text(photo);
    $('.upload-photo').addClass('progress-photo-bar');
    setTimeout(function () {
      $('.upload-photo').removeClass('progress-photo-bar');
      $('.upload-photo').addClass('upload-photo-complete');
    }, 1000);
  })
</script>

</html>