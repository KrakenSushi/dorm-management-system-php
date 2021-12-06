<?php
    include("../mysql/auth.php");
    include("../mysql/mysqli.php");
    include("../mysql/php_code_mgr.php");

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM student_log WHERE log_id=$id");
	}
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
    <link rel="stylesheet" href="../css/manage_log.css">
    <title>Admin Student Log</title>
</head>
<body>
    <div class="header">
        <a href="../pages/admin_dash.php"><img src="../logo.png" alt="logo" srcset=""></a>
            <h2 id="">Ocean Knowledge Dormitory | Admin Student Log</h2>
                       
            <!--Search-->
            <div class="search-container">  
                <form action="" method="POST" id="searchForm">
                    <input type="text" placeholder="Search.." name="search" class="form-control" id="searchBox">                
                    <button type="submit" class="btn btn-primary" >&#x1F50D;</button>
                    <a href="../pages/manage_log.php"><input type="button" value="Clear" class="btn btn-danger"></a>
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
    <!--Window-->
    <div class="">
        <div class="container-left">
            <!--Textboxes-->
            <form method="post" action="../mysql/php_code_mgr.php" >
                <input type="hidden" name="log_id" value="<?php echo $id; ?>">
                <!--ID Display-->
                <input type="hidden" name="log_id" value="<?php echo $id; ?>">
                <?php if ($update == true): ?>
                    <label for="log_id">ID:</label>
                    <input type="number" class=form-control id="" name="log_id" value="<?php echo $id;?>" disabled><br>
                <?php else: ?>
                    <label for="log_id">ID:</label>
                    <input type="number" class=form-control id="" name="log_id" disabled><br>
                <?php endif ?>

                <!--Name Field-->		
                    <label for="std_name">Student Name:</label>
                    <?php if ($update == true): ?>
                        <?php while ($row = $record->fetch_assoc()) { ?>
                            <input type="text" class=form-control id="" name="std_name" value="<?php echo $row['student_name']; ?>"><br>
                            <?php $std_id = $row['student_id']?>
                            <?php $log_type = $row['log_type']?>
                            <?php $date_time = $row['date_time']?>
                        <?php }?>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="std_name" placeholder="Enter Product Name..." required><br>
                    <?php endif ?>
                
                <!--Quantity Field-->                        
                <label for="qty">Student ID:</label>
                    <?php if ($update == true): ?>
                        <input type="text" class=form-control id="" name="std_id" value="<?php echo $std_id;?>" min="0"><br>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="std_id" placeholder="Enter Quantity..." min="0" required><br>
                    <?php endif ?>

                <!--Manufacturer Field-->
                <label for="log_type">Log Type:</label>
                    <select name="log_type" id="log_type" class="form-select">
                    <?php if ($update == true): ?>
                            <option value="<?php echo $log_type;?>" disabled selected hidden><?php echo $log_type;?></option>
                            <option value="In">In</option>
                            <option value="Out">Out</option>
                    <?php else: ?>
                            <option value="N/A" disabled selected hidden>Select Type</option>
                            <option value="In">In</option>
                            <option value="Out">Out</option>
                    <?php endif ?>
                    </select><br>
                        
                <!--Action Button-->
                    <?php if ($update == true): ?>
                            <button class="btn btn-success" type="submit" name="update" style="">Update</button>
                            <a href="../pages/manage_log.php"> Cancel</a>
                        <?php else: ?>
                            <button class="btn btn-primary" type="submit" name="save" >Save</button>
                        <?php endif ?>
                
            </form>
       </div>
        <!--Database Table-->        
        <div class="container-right">
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
                    <th colspan="2">Action</th>
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
                    <td>
                        <a href="../pages/manage_log.php?edit=<?php echo $row['log_id']; ?>" class="btn btn-primary" >Edit</a>
                        <a href="../mysql/php_code_mgr.php?del=<?php echo $row['log_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</body>
</html>