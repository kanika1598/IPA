<html>

<?php

session_start();
$host = "localhost";
$password = "";
$database = "registeration_records";
$user = "root";

$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['login_btn'])) {
     $email = $_POST['email'];
     $password = $_POST['password'];

     $sql = "SELECT * FROM data_entries WHERE Email = '$email' AND Password='$password'";
     $query = mysqli_query($connection, $sql);

        $row = mysqli_num_rows($query);
    
        if($row > 0) {

                echo "<script>alert('Login Successful!')</script>";
                $_SESSION['user'] = $email;
                echo "<script>location.href = 'index.php'</script>";
     
}
        else {
                echo "<script>alert('Create an Account First!')</script>";
                echo "<script>location.href = 'login.php'</script>";
}
}
?>

<head>
    <title>Login Page</title>

    <!-------------CDN Links------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>LOG IN</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group form-group"  required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email ID" name="email" required>

                        </div>
                        <div class="input-group form-group"  required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div>
                            <a href="signup.php" name="login" class="text-white">Do not have an Account? LOG IN</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn float-right login_btn" name="login_btn">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>