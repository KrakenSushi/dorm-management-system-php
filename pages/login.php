<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo.png">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/misc.css">
    <title>Login</title>
</head>
<body>
<?php
require('../mysql/mysqli.php');
session_start();
    //If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        
        $username = ($_REQUEST['username']);
        $password = ($_REQUEST['password']);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if($rows==1){
            $_SESSION['username'] = $username;
            header("Location: admin_dash.php");
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Wrong account credentials, Try Again")'; 
            echo '</script>';
            header("Refresh:0");
        }
        }else{}
?>
    <!--Window-->
    <div class="container">
        <a href="../index.php"><img src="../logo.png" alt="logo" srcset=""></a>
        <h2>Ocean Knowledge Dormitory | Log In</h2>
        <!--Log In Form-->
        <form action = "" method = "POST">  
            <label for="user"> Username: </label>  
                <input type = "text" class="form-control" id ="" name  = "username" placeholder="Enter Username" required/>  <br>
            <label for="pass"> Password: </label>  
                <input type = "password" class="form-control" id ="" name  = "password" placeholder="Enter Password" required/>  <br>
            <!--LogIn Button-->
            <input type =  "submit" class="btn btn-primary" id = "btn" value = "Login" />  
        </form>
        <!--Check is there's already a user-->
        <?php         
            $query = "SELECT username FROM `users`";
            $result = mysqli_query($con, $query);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if(!isset($row['username'])) {
                echo "<p>Don't have an account yet? Click <a href=register.php>here</a> to register.</p>";
        } ?>
    </div>
</body>
</html>