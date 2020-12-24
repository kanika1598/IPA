<?php

session_start();
include ('../config/register_config.php');

$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['login_btn'])) {
     $email = $_POST['email'];
     $password = $_POST['password'];

     $sql = "SELECT * FROM data_entries WHERE Email = '$email' AND Password='$password'";
     $query = mysqli_query($connection, $sql);
     $row = mysqli_fetch_assoc($query);
     $name_user = $row['name'];

        $row = mysqli_num_rows($query);
    
        if($row > 0) {
                $_SESSION['user'] = $name_user;
                $_SESSION['email'] = $email;
                echo "<script>location.href = 'admin.php'</script>";
     
}
        else {
                echo "<script>alert('Create an Account First!')</script>";
                echo "<script>location.href = 'login.php'</script>";
}
}
?>