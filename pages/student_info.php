<?php
    include("../mysql/auth.php");
    include("../mysql/mysqli.php");
    include("../mysql/php_code_mgr.php");

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM student_info WHERE occupant_id=$id");
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
    <link rel="stylesheet" href="../css/student_info.css">
    <link rel="stylesheet" href="../css/misc.css">
    <title>Student Information</title>
</head>
<body>
    
    <div class="header">
        <a href="../pages/admin_dash.php"><img src="../logo.png" alt="logo" srcset=""></a>
                <h2 id="">Ocean Knowledge Dormitory | Student Information</h2>   

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
                <!--Search Container-->
                <div class="search-container">  
                    <form action="" method="POST" id="searchForm">
                        <input type="text" placeholder="Search.." name="search" class="form-control" id="searchBox">                
                        <button type="submit" class="btn btn-primary" >&#x1F50D;</button>
                        <a href="../pages/student_info.php"><input type="button" value="Clear" class="btn btn-danger"></a>
                    </form>
                </div>
    </div>
    <!--Fillup Form-->
    <div class="">      
        <div class="container-left" id="st_info"> 
            <form method="post" action="../mysql/php_code_mgr.php" >
                <input type="hidden" name="occupant_id" value="<?php echo $id; ?>">
                <!--ID Display-->
                <input type="hidden" name="occupant_id" value="<?php echo $id; ?>">
                <?php if ($update == true): ?>
                    <label for="occupant_id">Occupant ID:</label>
                    <input type="number" class=form-control id="" name="occupant_id" value="<?php echo $id;?>" disabled><br>
                <?php else: ?>
                    <label for="occupant_id">Occupant ID:</label>
                    <input type="number" class=form-control id="" name="occupant_id" disabled><br>
                <?php endif ?>

                <!--Student Name Field-->		
                    <label for="std_name">Student Name:</label>
                    <?php if ($update == true): ?>
                        <?php while ($row = $record->fetch_assoc()) { ?>
                            <input type="text" class=form-control id="" name="std_name" value="<?php echo $row['student_name']; ?>"><br>
                            <?php 
                            $std_id = $row['student_id'];
                            $year_section = $row['year_section'];
                            $gender = $row['gender'];
                            $sy = $row['school_year'];
                            $perm_addr = $row['perm_addr'];
                            $assigned_dorm = $row['assigned_dorm'];
                            ?>
                        <?php }?>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="std_name" placeholder="Enter Student Name..." required><br>
                    <?php endif ?>
                
                <!--Student ID Field-->                        
                <label for="qty">Student ID:</label>
                    <?php if ($update == true): ?>
                        <input type="text" class=form-control id="" name="std_id" value="<?php echo $std_id;?>" min="0"><br>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="std_id" placeholder="Enter Student ID..." min="0" required><br>
                    <?php endif ?>

                 <!--Year Section Field-->                        
                 <label for="yr_sc">Year & Section</label>
                    <?php if ($update == true): ?>
                        <input type="text" class=form-control id="" name="yr_sc" value="<?php echo $year_section;?>" min="0"><br>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="yr_sc" placeholder="Enter Year & Section..." min="0" required><br>
                    <?php endif ?>

                <!--Gender-->
                <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-select">
                    <?php if ($update == true): ?>
                            <option value="<?php echo $gender;?>" selected hidden><?php echo $gender;?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                    <?php else: ?>
                            <option value="N/A" disabled selected hidden>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                    <?php endif ?>
                    </select><br>

                <!--School Year-->
                <label for="sch_yr">School Year</label>
                    <?php if ($update == true): ?>
                        <input type="text" class=form-control id="" name="sch_yr" value="<?php echo $sy;?>" min="0"><br>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="sch_yr" placeholder="Enter School Year..." min="0" required><br>
                    <?php endif ?>

                <!--Permanent Address-->
                <label for="perm_addr">Permanent Address</label>
                    <?php if ($update == true): ?>
                        <input type="text" class=form-control id="" name="perm_addr" value="<?php echo $perm_addr;?>"><br>
                    <?php else: ?>
                        <input type="text" class=form-control id="" name="perm_addr" placeholder="Enter Permanent Adddress..." required><br>
                    <?php endif ?>

                <!--Assigned Dorm-->
                <label for="assigned_dorm">Assigned Dorm</label>
                <select name="assigned_dorm" id="assigned_dorm" class="form-select">
                    <?php if ($update == true): ?>
                            <option value="<?php echo $assigned_dorm	;?>" selected hidden><?php echo $assigned_dorm	;?></option>
                            <option value="" disabled>--Male--</option>
                            <option value="Zeus">Zeus</option>
                            <option value="Poseidon">Poseidon</option>
                            <option value="" disabled>--Female--</option>
                            <option value="Hera">Hera</option>
                            <option value="Aphrodite">Aphrodite</option>
                            <option value="Athena">Athena</option>
                    <?php else: ?>
                            <option value="" disabled selected hidden>Select Dorm</option>
                            <option value="" disabled>--Male--</option>
                            <option value="Zeus">Zeus</option>
                            <option value="Poseidon">Poseidon</option>
                            <option value="" disabled>--Female--</option>
                            <option value="Hera">Hera</option>
                            <option value="Aphrodite">Aphrodite</option>
                            <option value="Athena">Athena</option>
                    <?php endif ?>
                </select><br>

                <!--Update/Submit Button-->
                    <?php if ($update == true): ?>
                            <!--Update Button-->
                            <button class="btn btn-success" type="submit" name="update" style="">Update</button>
                            <a href="../pages/student_info.php"> Cancel</a><br>
                            <!--Update Status Indicator-->   
                            <?php 
                                if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                                    <br><div class="alert alert-success" role="alert"><?php echo $_SESSION['success_message']; ?></div>
                                    <?php
                                    unset($_SESSION['success_message']);
                                    header("refresh: 2; url=../pages/student_info.php");
                                }
                            ?>
                        <?php else: ?>
                            <!--Save Button-->
                            <button class="btn btn-primary" type="submit" name="save" >Save</button><br>
                            <!--Save Status Indicator-->   
                            <?php
                                if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                                    <br><div class="alert alert-success" role="alert"><?php echo $_SESSION['success_message']; ?></div>
                                    <?php
                                    unset($_SESSION['success_message']);
                                    header( "refresh:2;url=../pages/student_info.php" );
                                }
                            ?>
                        <?php endif ?>
                
            </form>
             <!--Delete Indicator-->   
             <?php 
                if (isset($_SESSION['delete_message']) && !empty($_SESSION['delete_message'])) { ?>
                    <br><div class="alert alert-danger" role="alert"><?php echo $_SESSION['delete_message']; ?></div>
                <?php
                unset($_SESSION['delete_message']);
                header( "refresh:2;url=../pages/student_info.php" );
            }
            ?> 
        </div>
        <!--Search Mechanism-->        
        <div class="container-right" id="st_table">
        <?php $sql = "SELECT * FROM student_info";
            if( isset($_POST['search']) ){
                $query = mysqli_real_escape_string($con, htmlspecialchars($_POST['search']));
                $sql = "SELECT * FROM student_info WHERE student_name LIKE '%$query%' OR student_id LIKE '%$query%'";
            }
            $result = $con->query($sql);
        ?>
        <!--Table Output-->
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Occupant ID</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Year & Section</th>
                    <th>Gender</th>
                    <th>School Year</th>
                    <th>Permanent Address</th>
                    <th>Assigned Dorm</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <!--Fetching database table values-->
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['occupant_id']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['year_section']; ?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['school_year']?></td>
                    <td><?php echo $row['perm_addr']?></td>
                    <td><?php echo $row['assigned_dorm']?></td>
                    <td>
                        <a href="../pages/student_info.php?edit=<?php echo $row['occupant_id']; ?>" class="btn btn-primary" >Edit</a>
                        <a href="../mysql/php_code_mgr.php?del_info=<?php echo $row['occupant_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</body>
</html>