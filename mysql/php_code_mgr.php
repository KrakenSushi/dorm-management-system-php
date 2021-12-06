

<?php 
require("mysqli.php");
    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
	// initialize variables
	$std_name = "null";
    $update = false;
	$std_id = "0";


    /* START
    *   FOR USE WITH manage_log.php
    */
    /* Save a record */
	if (isset($_POST['save'])) {
		$std_name = $_POST['std_name'];
		$std_id = $_POST['std_id'];
        $log_type= $_POST['log_type'];        
        $dnt_now = date_create()->format('Y-m-d H:i:s');

		mysqli_query($con, "INSERT INTO student_info (student_name, student_id, log_type, date_time) VALUES ('$std_name', '$std_id','$log_type', '$dnt_now')"); 
		header('location: ../pages/manage_log.php');
	}
    /* Update a record */
    if (isset($_POST['update'])) {
        $log_id = $_POST['log_id'];
		$std_name = $_POST['std_name'];
		$std_id = $_POST['std_id'];
        $log_type= $_POST['log_type'];    
    
        mysqli_query($con, "UPDATE student_log SET student_name='$std_name', student_id='$std_id', log_type='$log_type' WHERE log_id=$log_id");
        header('location: ../pages/manage_log.php');
    }
    /* Delete a record */
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($con, "DELETE FROM student_log WHERE log_id=$id");
        header('location: ../pages/manage_log.php');
    }
    /*END */
?>

<?php
    /* START
    *   FOR USE WITH student_info.php
    */
    /* Save a record */
	if (isset($_POST['save'])) {
        
		$std_name = $_POST['std_name'];
		$std_id = $_POST['std_id'];
        $yr_sc= $_POST['yr_sc'];
		$gender = $_POST['gender'];
		$sch_yr = $_POST['sch_yr'];
        $perm_addr= $_POST['perm_addr']; 
		$assigned_dorm = $_POST['assigned_dorm'];

		mysqli_query($con, "INSERT INTO student_info (student_name, student_id, year_section, gender, school_year, perm_addr, assigned_dorm) VALUES ('$std_name', '$std_id','$yr_sc', '$gender', '$sch_yr', '$perm_addr', '$assigned_dorm')"); 
		header('location: ../pages/student_info.php');

		
	}
    /* Update a record */
    if (isset($_POST['update'])) {
        $occupant_id = $_POST['occupant_id'];
		$std_name = $_POST['std_name'];
		$std_id = $_POST['std_id'];
        $yr_sc= $_POST['yr_sc'];
		$gender = $_POST['gender'];
		$sch_yr = $_POST['sch_yr'];
        $perm_addr= $_POST['perm_addr']; 
		$assigned_dorm = $_POST['assigned_dorm'];   
    
        mysqli_query($con, "UPDATE student_info SET student_name='$std_name', student_id='$std_id', year_section='$yr_sc', gender='$gender', school_year='$sch_yr', perm_addr='$perm_addr', assigned_dorm='$assigned_dorm' WHERE occupant_id=$occupant_id");
        header('location: ../pages/student_info.php');
    }
    /* Delete a record */
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($con, "DELETE FROM student_info WHERE occupant_id=$id");
        header('location: ../pages/student_info.php');
    } 
    /*END*/
?>
