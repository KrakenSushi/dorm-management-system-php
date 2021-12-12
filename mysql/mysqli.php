<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","dorm","3306");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  date_default_timezone_set('Asia/Manila');


  $archive_sql ="INSERT INTO student_log_archive SELECT * FROM student_log;";
?>