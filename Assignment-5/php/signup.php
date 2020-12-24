<html>

<head>
    <title>Register Page</title>

    <!-------------CDN Links------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        /* Made with love by Mutiullah Samim*/

        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background: #566573;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Lora', serif;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 1150px;
            margin-top: 30px;
            margin-bottom: auto;
            width: 550px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .card-header h3 {
            color: white;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #566573;
            color: white;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .register_btn {
            color: white;
            background-color: #566573;
            width: 120px;
        }

        .register_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>REGISTER</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="insert.php" enctype="multipart/form-data">
                        <div class="input-group form-group" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input autocomplete="off" type="text" class="form-control" placeholder="Your Name"
                                name="name" required>

                        </div>
                        <div class="input-group form-group" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input autocomplete="off" type="text" class="form-control" placeholder="Email ID"
                                name="email" required>

                        </div>
                        <div class="input-group form-group" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input autocomplete="off" type="tel" class="form-control" placeholder="Contact"
                                name="contact" required>
                        </div>
                        <div class="input-group form-group" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input autocomplete="off" type="password" class="form-control" placeholder="Password"
                                name="password" required>
                        </div>
                        <div>
                            <label class="text-white">DATE OF BIRTH:</label><br>
                            <input class="form-control" type="text" name="date_of_birth" id="date_of_birth"  placeholder="Date of Birth">
                        </div><br>
                        <div>
                            <label class="text-white">BASIC EDUCATION:</label><br>
                            <input class="form-control" type="text" name="basic_education" id="basic_education"  placeholder="Basic Education">
                        </div><br>
                        <div>
                            <label class="text-white">PROFESSIONAL EDUCATION:</label><br>
                            <input class="form-control" type="text" name="professional_education"
                                id="professional_education"  placeholder="Professional Education">
                        </div><br>
                        <div style="color: white;">
                            <label class="text-white">HOBBIES:</label><br>
                            <input style="color: white;" type="checkbox" value="X" name="hobbies[]">&nbsp;Writing&nbsp;
                            <input style="color: white;" type="checkbox" value="XII"
                                name="hobbies[]">&nbsp;Documentation&nbsp;
                            <input style="color: white;" type="checkbox" value="XII"
                                name="hobbies[]">&nbsp;Studying&nbsp;
                            <input style="color: white;" type="checkbox" value="XII" name="hobbies[]">&nbsp;Policy&nbsp;
                        </div>
                        <div class="form-group">
                            <label class="text-white">ADDRESS:</label><br>
                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                        </div>
                        <div>
                            <label class="text-white">ORGANIZATION NAME WITH ADDRESS:</label><br>
                            <textarea class="form-control" name="org_address" placeholder="Organization Name with Address"></textarea>
                        </div><br>
                        <div>
                            <label class="text-white">OCCUPATION:</label><br>
                            <input type="text" name="occupation" class="form-control"  placeholder="Occupation">

                        </div><br>
                        <div style="color: white;">
                            <label class="text-white">MEMBERSHIP AT KENDRA:</label><br>
                            <input style="color: white;" type="checkbox" value="Central
                            Executive" name="members[]">&nbsp;Central
                            Executive&nbsp;
                            <input style="color: white;" type="checkbox" value="Eastern
                            Unit" name="members[]">&nbsp;Eastern
                            Unit&nbsp;
                            <input style="color: white;" type="checkbox" value="Dwarka
                            Unit" name="members[]">&nbsp;Dwarka
                            Unit&nbsp;
                            <input style="color: white;" type="checkbox" value="Group" name="members[]">&nbsp;Group&nbsp;
                            <input style="color: white;" type="checkbox" value="Category"
                                name="members[]">&nbsp;Category&nbsp;
                        </div><br>

                        <div>
                            <a href="login.php" name="login" class="text-white">Already have an Account?
                                LOGIN</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn float-right register_btn"
                                name="register_btn">REGISTER</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd',
        })
        $("#date_of_birth").datepicker();
    });
</script>

</html>