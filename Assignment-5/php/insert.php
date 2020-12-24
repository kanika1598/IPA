<?php

// error_reporting(0);
include ('../config/register_config.php');

$connection = mysqli_connect($host, $user, $password, $database);

if(!$connection) {
    echo "<script>alert('Connection not Established!')</script>";
}

if(isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $date_of_birth = $_POST['date_of_birth'];
    $basic_education = $_POST['basic_education'];
    $professional_education = $_POST['professional_education'];
    $hobbies = $_POST['hobbies'];
    $final_hobbies = implode(', ',$hobbies);
    $address = $_POST['address'];
    $org_address = $_POST['org_address'];
    $occupation = $_POST['occupation'];
    $members = $_POST['members'];
    $final_members = implode(', ',$members);

    $password = $_POST['password'];
  


    $email_query = "SELECT * FROM data_entries WHERE email='$email' ";
    $sql = mysqli_query($connection, $email_query);
    $email_count = mysqli_num_rows($sql);
    if($email_count > 0) {
        echo '<script>alert("This User already Exists!")</script>';
    }
else {
    $query = "INSERT INTO data_entries(name, email, password, contact, dob, basic_education, professional_education, hobbies,address, org_address, occupation, membership_kendra) VALUES('$name', '$email', '$password', '$contact', '$date_of_birth', '$basic_education', '$professional_education', '$final_hobbies', '$address', '$org_address', '$occupation', '$final_members')";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        echo '<script>alert("Failed!")</script>';
        echo "<script>location.href = 'signup.php'</script>";
    }
    else {
        echo '<script>alert("Successfully Inserted!")</script>';
        echo "<script>location.href = 'login.php'</script>";
    }
}

}

?>