<?php
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
    
    <title>Home</title>
</head>
<body>
    <div class="container">        
        <a href="../pages/admin_dash.php"><img src="../logo.png" alt="logo" srcset=""></a>
        <h2 id="">Ocean Knowledge Dormitory | Admin Dashboard</h2>
        <!--Accounts-->
        <div class="account">
            <?php
                $user=$_SESSION['username'];
                if(isset($_SESSION['username'])){
                    echo "<b>Hi, $user!</b> | ";
                    echo '&nbsp; <a href="../mysql/logout.php"><b>Logout</b></a>';
                }else{
                    echo '<a href="../pages/login.php"><b>Login</b></a> &nbsp; |&nbsp; 
                    <a href="../pages/register.php"><b>Register</b></a>';
                }
            ?>
        </div>
        <a href="../pages/manage_log.php">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;" id="card-left">
                    <div class="card-header">Manage Students</div>
                    <div class="card-body">
                        <h5 class="card-title">Student Log</h5>
                        <p class="card-text">Manage the student log.</p>
                    </div>
                </div>
            </a>

            <a href="../pages/student_info.php">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;" id="card-right">
                    <div class="card-header">Student Info</div>
                    <div class="card-body">
                        <h5 class="card-title">Student Info</h5>
                        <p class="card-text">Manage the student info.</p>
                    </div>
                </div>
            </a>
    </div>
</body>
</html>