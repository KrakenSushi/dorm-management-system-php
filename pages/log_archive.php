<?php
    include("../mysql/auth.php");
    include("../mysql/mysqli.php");
    include("../mysql/php_code_mgr.php");
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
    <link rel="stylesheet" href="../css/check_log.css">
    <link rel="stylesheet" href="../css/manage_log.css">
    <title>Student Log Archive</title>
</head>
<body>
    <div class="header">
        <a href="../pages/admin_dash.php"><img src="../logo.png" alt="logo" srcset=""></a>
            <h2 id="">Ocean Knowledge Dormitory | Student Log Archive</h2>
                       
        <!--Search Container-->
            <div class="search-container">  
                <form action="" method="POST" id="searchForm">
                    <input type="text" placeholder="Search.." name="search" class="form-control" id="searchBox">                
                    <button type="submit" class="btn btn-primary" >&#x1F50D;</button>
                    <a href="../pages/log_archive.php"><input type="button" value="Clear" class="btn btn-danger"></a>
                </form>
            </div> 
            
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
    </div>
    <div class="del_archive">
        <form action="../mysql/php_code_mgr.php" method="post" onsubmit="return confirm('Are you sure you want to clear the log archive? \nIt will be deleted forever!');">
            <button type="submit" class="btn btn-danger" name="delete_all">Clear Log Archive</button>
        </form> 
    </div>
     
           
    <!--Database Table-->        
        <div class="container">
            
        <?php $sql = "SELECT * FROM student_log_archive";
            if( isset($_POST['search']) ){
                $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
                $sql = "SELECT * FROM student_log_archive WHERE student_name LIKE '%$query%' OR student_id LIKE '%$query%'";
            }
            $result = $con->query($sql);
        ?>
        <!--Table Output-->
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Type</th>
                    <th>Time & Date</th>
                </tr>
            </thead>

            <!--Fetching database table values-->
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['log_id']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['log_type']; ?></td>
                    <td><?php echo $row['date_time']?></td>
                </tr>
            <?php } ?>
        </table>
        </div>
    </div>  
</body>
</html>