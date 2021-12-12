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
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/misc.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Student Log</title>
</head>
<body>
    <div class="header"> 
    <a href="index.php"><img src="logo.png" alt="logo" srcset=""></a>
        <h2 id="">Ocean Knowledge Dormitory | Student Log</h2>
        
        <!--Search Container-->  
        <div class="search-container">  
            <form action="" method="POST" id="searchForm">
                <input type="text" placeholder="Search.." name="search" id="searchBox" class="form-control">                
                <button type="submit" class="btn btn-primary">&#x1F50D;</button>
                <a href="index.php"><input type="button" value="Clear" class="btn btn-danger"></a>
            </form>
        </div>
            <!--<a href="pages/check_log.php"><input type="button" value="Check Log" class="btn btn-success"></a>-->    
       
        <!--Account-->
        <div class="account">
           <a href="pages/login.php"><b>Dorm Manager Login</b></a>
        </div> 
    </div>
    <!--Window-->
    <div class="">     
        <!--Page Title-->        
            
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
                        <select name="log_type" id="log_type" class="form-select" required>
                            <option value="N/A" disabled selected hidden>Select Type</option>
                            <option value="In">In</option>
                            <option value="Out">Out</option>
                        </select><br>                        
                
                <button type="submit" class="btn btn-primary" name="save">Save</button><br>
                <!--Status Indicator-->   
                <?php session_start();
                        if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <br><div class="alert alert-success" role="alert"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                        header( "refresh:3;url=index.php" );
                    }
                    ?>          
            </form>
            <!--Student Log Count-->  
            <?php 
                $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
                    $sql_in="SELECT COUNT(log_type)  AS log_in FROM `student_log` WHERE student_name LIKE '%$query%' AND log_type = 'In'";
                    $sql_out="SELECT COUNT(log_type)  AS log_out FROM `student_log` WHERE student_name LIKE '%$query%' AND log_type = 'Out'";
                $result_in = $con->query($sql_in);
                $result_out = $con->query($sql_out);
            ?>         
                <?php if(isset($_POST['search']))
                {   
                    echo '<br><h5>Log Ins:</h5>';
                    while($row_log = $result_in->fetch_assoc())
                    { 
                        echo $row_log['log_in'];
                    } 
                } 
                ?>        
                <?php if(isset($_POST['search']))
                {   
                    echo '<br><h5>Log Outs:</h5>';
                    while($row_log = $result_out->fetch_assoc())
                    { 
                        echo $row_log['log_out'];
                    }
                }
            ?>        
        </div>
        <div class="container-right">
            <!--Search Mechanism--> 
                <?php $sql = "SELECT * FROM student_log";
                if( isset($_POST['search']) ){
                    $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
                    $sql = "SELECT * FROM student_log WHERE student_name LIKE '%$query%' OR student_id LIKE '%$query%' OR log_type='$query' OR date_time LIKE '$query'";
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