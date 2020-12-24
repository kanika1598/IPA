<?php

$host = "localhost";
$password = "";
$database = "registeration_records";
$user = "root";

$connection = mysqli_connect($host, $user, $password, $database);
if(isset($_POST['update_btn'])) {
    $name = $_POST['edit_name'];
    $email = $_POST['email'];
    $contact = $_POST['edit_contact'];
    $date = $_POST['edit_date'];
    $month = $_POST['edit_month'];
    $year = $_POST['edit_year'];
    $quali = $_POST['edit_quali'];
    $password = $_POST['edit_password'];

    $final_dob = $date.' '.$month.','.$year;
    $final_quali = implode(", ", $quali);

$sql = "UPDATE data_entries SET name='$name', contact='$contact', dob='$final_dob', qualification='$final_quali' WHERE email='$email' ";

$result = mysqli_query($connection, $sql);
if(!$result) {
    echo "<script>alert('Failed Updating!')</script>";
}
else {
        echo "<script>alert('Record Updated Successfully!')</script>";
        echo "<script>location.href = 'index.php'</script>";
}

}


?>