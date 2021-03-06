<?php


session_start();
if(!isset($_SESSION['user'])) {
    header('location: login.php');
}

$host = "localhost";
$password = "";
$database = "registeration_records";
$user = "root";

$user_name = $_SESSION['user'];

$connection = mysqli_connect($host, $user, $password, $database);
$sql = "SELECT * FROM data_entries WHERE email = '$user_name' ";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);

// show all records

$sql_new = "SELECT * FROM data_entries";
$query_new = mysqli_query($connection, $sql_new);

?>

<html>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-------------CDN Links------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body class="bg-right">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">ADMIN DASHBOARD</li>&nbsp;
                        <li style="margin-left: 70%;"><a href="logout.php" class="btn btn-danger">LOGOUT</a></li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-lg-3 col-md-4 d-md-block">
                        <div class='card bg-common card-left'>
                            <div class="card-body">
                                <ul class="nav d-md-block d-none">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active" href="#profile"><i
                                                class="fa fa-user mr-2"></i>User
                                            Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#add"><i
                                                class="fa fa-user-plus mr-2"></i>Add</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#show_all"><i
                                                class="fa fa-users mr-2"></i>Show
                                            All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9">
                        <div class="card">
                            <div class="card-header border-bottom mb-3 d-md-none">
                                <ul class="nav nav-tabs card-header-tabs nav-fill">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active" href="#profile"><i
                                                class="fa fa-user"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#add"><i
                                                class="fa fa-user-plus"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#show_all"><i
                                                class="fa fa-users"></i></a>
                                    </li>
                                </ul>
                            </div>


                            <!---------Admin Profile--------->
                            <div class="card-body tab-content border-0" id="admin">
                                <div class="tab-pane active" id="profile">
                                    <h5>Admin Information</h5>
                                    <h5 style="color: darkorange;">Welcome, <?php echo $user_name ?></h5>
                                    <img class="profile_image" src="<?= $row['profile'];?>" style="float: right; margin-top: -35px; border-radius: 50%; height: 80px; width: 80px;">
                                    <form action="edit.php" method="POST">
                                        <div>
                                            <label>NAME:</label><br>
                                            <input type="text" value="<?= $row['name']; ?>" readonly>
                                        </div><br>
                                        <div>
                                            <label>E-MAIL:</label><br>
                                            <input type="email" value="<?= $row['email']; ?>" readonly><br>
                                        </div><br>
                                        <div>
                                            <label>CONTACT:</label><br>
                                            <input type="tel" value="<?= $row['contact']; ?>" readonly><br>
                                        </div><br>
                                        <div>
                                            <label>DATE OF BIRTH:</label><br>
                                            <input type="text" value="<?= $row['dob']; ?>" readonly><br>
                                        </div><br>
                                        <div>
                                            <label>QUALIFICATION:</label><br>
                                            <input type="text" value="<?= $row['qualification']; ?>" readonly><br>
                                        </div>
                                        <div>
                                            <button class="btn btn-danger" id="edit_btn" name="edit_btn">EDIT</button>
                                        </div>

                                    </form>
                                </div>

                                <!--------Adding Records------->
                                <div class="tab-pane" id="add">
                                    <h5>Add New Record</h5>
                                    <form action="add_records.php" method="POST">
                                        <div>
                                            <label>NAME:</label><br>
                                            <input type="text" name="name" placeholder="Enter the Name" required>
                                        </div><br>
                                        <div>
                                            <label>E-MAIL:</label><br>
                                            <input type="email" name="email" placeholder="Enter the E-Mail"
                                                required><br>
                                        </div><br>
                                        <div>
                                            <label>CONTACT:</label><br>
                                            <input type="tel" name="contact" placeholder="Enter the Contact"
                                                required><br>
                                        </div><br>
                                        <div>
                                            <label>PASSWORD:</label><br>
                                            <input type="password" name="password" placeholder="Enter Password"
                                                required><br>
                                        </div><br>
                                        <div>
                                            <label>DATE OF BIRTH:</label><br>
                                            <select name="date" required>
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
                                            <select name="month" required>
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
                                            <select name="year" required>
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
                                        </div><br>
                                        <div>
                                            <label>QUALIFICATION:</label><br>
                                            <input type="checkbox" value="X" name="edit_quali[]">X
                                            <input type="checkbox" value="XII" name="edit_quali[]">XII
                                        </div>
                                        <div>
                                            <button class="btn btn-success" id="add_btn" name="add_btn">ADD</button>
                                        </div>

                                    </form>
                                </div>

                                <!-------Show All Records------>
                                <div class="tab-pane" id="show_all">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 mb-5">
                                                <h2 class="text-center p-2 text-primary">
                                                    ALL RECORDS</h2>
                                                <table class="table table-bordered" style="margin-left: -70px;">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact</th>
                                                        <th>DOB</th>
                                                        <th>Qual.</th>
                                                        <!-- <th>EDIT</th>
                                                        <th>DEL</th> -->
                                                    </tr>
                                                    <?php  while($new_row = mysqli_fetch_assoc($query_new)) { ?>
                                                    <tr style="font-size: 15px;">
                                                        <td><?php echo $new_row['id']; ?></td>
                                                        <td><?php echo $new_row['name']; ?></td>
                                                        <td><?php echo $new_row['email']; ?></td>
                                                        <td><?php echo $new_row['contact']; ?></td>
                                                        <td><?php echo $new_row['dob']; ?></td>
                                                        <td><?php echo $new_row['qualification']; ?></td>
                                                        <!-- <td>
                                                            <form action="edit_record.php" method="POST">
                                                                <input type="hidden" name="edit_id"
                                                                    value="<?php echo $new_row['id']; ?>">
                                                                <button class="btn btn-success"
                                                                    name="edit_btn">EDIT</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="delete_record.php" method="POST">
                                                                <input type="hidden" name="delete_id"
                                                                    value="<?php echo $new_row['id']; ?>">
                                                                <button class="btn btn-danger"
                                                                   name="delete_btn">DEL</button>
                                                            </form>

                                                        </td> -->
                                                    </tr>

                                                    <?php  } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>