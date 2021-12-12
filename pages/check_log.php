<?php
    include("../mysql/mysqli.php");
    include("../mysql/php_code_std.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/misc.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Student Log</title>
</head>
<body>
    <div class="header"> 
    <a href="../index.php"><img src="../logo.png" alt="logo" srcset=""></a>
        <h2 id="">Ocean Knowledge Dormitory | Student Log</h2>
        
        <!--Search Container-->  
        <div class="search-container">  
            <form action="" method="POST" id="searchForm">
                <input type="text" placeholder="Search.." name="search" id="searchBox" class="form-control">                
                <button type="submit" class="btn btn-primary">&#x1F50D;</button>
                <a href="../pages/check_log.php"><input type="button" value="Clear" class="btn btn-danger"></a>
            </form>
        </div>      
        <!--Account-->
        <div class="account">
           <a href="../pages/login.php"><b>Dorm Manager Login</b></a>
        </div> 
    </div>
    <div class="container">
    <?php $sql = "SELECT * FROM student_log";
                if( isset($_POST['search']) ){
                    $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
                    $sql = "SELECT * FROM student_log WHERE student_name LIKE '%$query%' OR student_id LIKE '%$query%'";
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
<!--SELECT COUNT(DISTINCT log_type) FROM `student_log` WHERE student_name LIKE '%Miko%' AND log_type = 'Out'-->
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

    <!--Student Log Count-->   
    <div id="count">
    <?php 
        $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
            $sql_in="SELECT COUNT(log_type)  AS log_in FROM `student_log` WHERE student_name LIKE '%$query%' AND log_type = 'In'";
            $sql_out="SELECT COUNT(log_type)  AS log_out FROM `student_log` WHERE student_name LIKE '%$query%' AND log_type = 'Out'";
        $result_in = $con->query($sql_in);
        $result_out = $con->query($sql_out);
    ?>         
        <?php if(isset($_POST['search']))
        {   
            echo '<h5>Log Ins:</h5>';
            while($row_log = $result_in->fetch_assoc())
            { 
                echo $row_log['log_in'];
            } 
        } 
        else{}
        ?>        
        <?php if(isset($_POST['search']))
        {   
            echo '<h5>Log Outs:</h5>';
            while($row_log = $result_out->fetch_assoc())
            { 
                echo $row_log['log_out'];
            }
        } 
        else{}
       ?>       
    </div>
</body>
</html>


