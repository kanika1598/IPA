<html>

<head>
    <title>Login Page</title>

    <!-------------CDN Links------------->
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
    background: #566573;
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Lora', serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 270px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.card-header h3{
color: white;
}

.input-group-prepend span{
width: 50px;
background-color: #566573;
color: white;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.login_btn{
color: white;
background-color: #566573;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
    </style>
    
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>LOG IN</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="login_done.php">
                        <div class="input-group form-group"  required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input autocomplete="off" type="text" class="form-control" placeholder="Email ID" name="email" required>

                        </div>
                        <div class="input-group form-group"  required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input autocomplete="off" type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div>
                            <a href="signup.php" name="login" class="text-white">Do not have an Account? REGISTER</a>
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