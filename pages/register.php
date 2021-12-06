<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo.png">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <title>Register</title>
</head>
<body>
<?php
    require('../mysql/mysqli.php');
    //If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){

        //Variable Declarations
        $username = ($_REQUEST['username']);
        $email = ($_REQUEST['email']);
        $pass = ($_REQUEST['password']);

            //MySQL query
            $query = "INSERT into `users` (username, password, email) VALUES ('$username', '$pass', '$email')";
            $result = mysqli_query($con,$query);
            if($result){

                //Redirects to Log in page after successful registration
                header("Location: login.php");
            }
        }
        else
        {
        ?>
    <!--Window-->
    <div class="container">
        <!--Content-->
        <h3 id="windowTitle">INTECH2201 | Project</h3>
        <div class="form">
            <h1>Registration</h1>
            
                <!--Registration Form-->
                <form name="reg" action="" method="post">
                    <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required /><br>
                    <label for="email">Email Address:</label>    
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required /><br>
                    <label for="pass">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required /><br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Register" />
                </form>
                <p id="regStub">Already an existing user? Click <a href="login.php" id="here">here</a>.</p>
        </div>
    </div>
<?php } ?>
</body>
</html>