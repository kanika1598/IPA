<?php

$host = "localhost";
$password = "";
$database = "registeration_records";
$user = "root";

$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['add_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $qualification = $_POST['edit_quali'];
    $password = $_POST['password'];

    $quali_final = implode(", ",$qualification);

    $dob = $date.' '.$month.', '.$year;

    $email_query = "SELECT * FROM data_entries WHERE Email='$email' ";
    $query = mysqli_query($connection, $email_query);
    $email_count = mysqli_num_rows($query);
    if($email_count > 0) {
        echo '<script>alert("This User already Exists!")</script>';
    }
    else {
        $sql = "INSERT INTO  data_entries(name, email, password, contact, dob, qualification) VALUES('$name', '$email', '$password', '$contact', '$dob', '$quali_final')";
    
        $result = mysqli_query($connection, $sql);
        if($result) {
            echo "<script>alert('Record Added Successfully!')</script>";
            echo "<script>location.href = 'index.php'</script>";
           
    }
    else {
        echo "<script>alert('Failed!')</script>";
        
    }
    }

    
}









?>