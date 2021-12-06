<?php
    include("mysql/mysqli.php");
    include("mysql/php_code_std.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/misc.css">
    <link rel="stylesheet" href="css/index.css">
    
    <title>Home</title>
</head>
<body>
        <!--Accounts-->
    </div>
    <!--Window-->
    <div class="">     
        <!--Page Title-->        
        <a href="../pages/admin_dash.php"><img src="logo.png" alt="logo" srcset=""></a>
        <h2 id="">Ocean Knowledge Dormitory | Student Log</h2>
        
        <!--Search-->  
        <div class="search-container">  
            <form action="" method="POST" id="searchForm">
                <input type="text" placeholder="Search.." name="search" id="searchBox" class="form-control">                
                <button type="submit" class="btn btn-primary">&#x1F50D;</button>
                <a href="index.php"><input type="button" value="Clear" class="btn btn-danger"></a>
            </form>
        </div>      
        <!--Account-->
        <div class="account">
           <a href="pages/login.php"><b>Dorm Manager Login</b></a>
        </div>     
        <div class="container-left">
            <!--Textboxes-->
            <form method="post" action="mysql/php_code_std.php" >
                <!--Name Field-->		
                    <label for="std_name">Student Name:</label>
                        <input type="text" class=form-control id="" name="std_name" placeholder="Enter Student Name..." required><br>
                
                <!--Student ID Field-->                        
                    <label for="std_id">Student ID:</label>                  
                        <input type="text" class=form-control id="" name="std_id" placeholder="Enter Student ID..." required><br>
                    
                <!--Log Type Field-->
                    <label for="log_type">Log Type:</label>
                        <select name="log_type" id="log_type" class="form-select">
                            <option value="N/A" disabled selected hidden>Select Type</option>
                            <option value="In">In</option>
                            <option value="Out">Out</option>
                        </select><br>                        
                
                <button type="submit" class="btn btn-primary" name="save">Save</button>             
            </form>  
        </div>
        <div class="container-right">
            <!--Database Table--> 
                <?php $sql = "SELECT * FROM student_log";
                if( isset($_POST['search']) ){
                    $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
                    $sql = "SELECT * FROM student_log WHERE student_name LIKE '%$query%' OR student_id LIKE '%$query%'";
                }
                $result = $con->query($sql);
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Log ID</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Type</th>
                        <th>Date & Time</th>
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