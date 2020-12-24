<?php

error_reporting(0);
$host = "localhost";
$password = "";
$database = "registeration_records";
$user = "root";

$connection = mysqli_connect($host, $user, $password, $database);

if(!$connection) {
    echo "<script>alert('Connection not Established!')</script>";
}

if(isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $quali = $_POST['quali'];
    $password = $_POST['password'];
    $files = $_FILES['file'];

    $filename = $files['name'];
    $filetmp = $files['tmp_name'];
    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png', 'jpg', 'jpeg');

    if(in_array($filecheck, $fileextstored)) 
    {
        $destinationfile = 'uploads/'.$filename;
        move_uploaded_file($filetmp, $destinationfile);
    }

    $final_dob = $date.' '.$month.','.$year;
    $final_quali = implode(", ", $quali);


    $email_query = "SELECT * FROM data_entries WHERE Email='$email' ";
    $sql = mysqli_query($connection, $email_query);
    $email_count = mysqli_num_rows($sql);
    if($email_count > 0) {
        echo '<script>alert("This User already Exists!")</script>';
    }
else {
    $query = "INSERT INTO data_entries(name, email, password, qualification, contact, dob, profile) VALUES('$name', '$email', '$password', '$final_quali', '$contact', '$final_dob', '$destinationfile')";
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