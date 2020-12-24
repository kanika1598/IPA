<?php

session_start();
$host = "localhost";
$password = "";
$database = "registeration_records";
$user = "root";

$user_name = $_SESSION['user'];
$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['update_btn'])) {
    $name = $_POST['edit_name'];
    $contact = $_POST['edit_contact'];
    $date = $_POST['edit_date'];
    $month = $_POST['edit_month'];
    $year = $_POST['edit_year'];
    $quali = $_POST['edit_quali'];

    $final_dob = $date.' '.$month.','.$year;
    $final_quali = implode(", ", $quali);

$sql = "UPDATE data_entries SET name='$name', contact='$contact', dob='$final_dob', qualification='$final_quali' WHERE email= '$user_name' ";

$result = mysqli_query($connection, $sql);
if(!$result) {
    echo "<script>alert('Failed Updating!')</script>";
}
else {
    echo "<script>alert('Admin Profile Updated Successfully!')</script>";
    echo "<script>location.href = 'index.php'</script>";
}
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);

}


?>