<?php

include ('../config/register_config.php');

$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['save_image'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

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

    $email_query = "SELECT * FROM photo_data WHERE email='$email' ";
    $sql = mysqli_query($connection, $email_query);
    $email_count = mysqli_num_rows($sql);
    if($email_count > 0) {
        $query_update = "UPDATE photo_data SET photo = '$destinationfile' WHERE email = '$email'";
        $sql_run_new = mysqli_query($connection, $query_update);
        if($sql_run_new) {
            header ('location:admin.php');
        }
    }
else

    $query_insert = "INSERT INTO photo_data (name, email, photo) VALUES ('$name', '$email', '$destinationfile')";
    $sql_run = mysqli_query($connection, $query_insert);

    if($sql_run) {
        header ('location:admin.php');
    }
}



?>