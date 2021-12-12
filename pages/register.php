<?php
    //To secure registration page
    include("../mysql/auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo.png">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/misc.css">
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
    <div class="container">
        <a href="../index.php"><img src="../logo.png" alt="logo" srcset=""></a>
    <!--Page Title-->
        <h2>Ocean Knowledge Dormitory | Register</h2>

    <!--Registration Form-->
        <div class="form">
                <form name="reg" action="" method="post">
                    <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required /><br>
                    <label for="email">Email Address:</label>    
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required /><br>
                    <label for="pass">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required /><br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Register" />
                </form>
                
            <!--Check if there's already a user registered-->
                <?php         
                    $query = "SELECT username FROM `users`";
                    $result = mysqli_query($con, $query);

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if(!isset($row['username'])) {
                        echo '<p>Already an existing user? Click <a href="login.php" id="here">here</a>.</p>';
                } ?>                
        </div>
    </div>
<?php } ?>
</body>
</html>