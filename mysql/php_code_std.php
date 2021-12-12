

<?php 
require("mysqli.php");
    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
	// initialize variables
	$std_name = "null";
    $update = false;
	$std_id = "0";


    
    /* Save a record */
	if (isset($_POST['save'])) {
		$std_name = $_POST['std_name'];
		$std_id = $_POST['std_id'];
        $log_type= $_POST['log_type'];        
        $dnt_now = date_create()->format('H:i:s A m/d/Y');

		mysqli_query($con, "INSERT INTO student_log (student_name, student_id, log_type, date_time) VALUES ('$std_name', '$std_id','$log_type', '$dnt_now')");
        
        session_start();
        $_SESSION['success_message'] = "Record saved successfully.";

		header('location: ../index.php');
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
        header('location: ../pages/manage_log');
    }
    /* Save a record */
	if (isset($_POST['save_admin'])) {
		$std_name = $_POST['std_name'];
		$std_id = $_POST['std_id'];
        $log_type= $_POST['log_type'];        
        $dnt_now = date_create()->format('H:i:s A m/d/Y');

		mysqli_query($con, "INSERT INTO student_log (student_name, student_id, log_type, date_time) VALUES ('$std_name', '$std_id','$log_type', '$dnt_now')"); 
		header('location: ../pages/manage_log.php');
	}
?>

