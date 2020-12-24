<?php

session_start();
include ('../config/register_config.php');

$email = $_SESSION['email'];
$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['update_btn'])) {
    $name = $_POST['edit_name'];
    $contact = $_POST['edit_contact'];
    $dob = $_POST['edit_dob'];
    $basic_education = $_POST['edit_basic_education'];
    $professional_education = $_POST['edit_professional_education'];
    $hobbies = $_POST['edit_hobbies'];
    $address = $_POST['edit_address'];
    $occupation = $_POST['edit_occupation'];
    $org_address = $_POST['edit_org_address'];
    $members = $_POST['edit_members'];
  
    $password = $_POST['edit_password'];

$sql = "UPDATE data_entries SET name='$name', contact='$contact', dob='$dob', basic_education='$basic_education', professional_education = '$professional_education',hobbies = '$hobbies', address = '$address', occupation = '$occupation', org_address = '$org_address', membership_kendra = '$members', password='$password' WHERE email= '$email' ";

$result = mysqli_query($connection, $sql);
if(!$result) {
    echo "<script>alert('Failed Updating!')</script>";
}
else {
    echo "<script>alert('Admin Profile Updated Successfully!')</script>";
    echo "<script>location.href = 'admin.php'</script>";
}

}


?>