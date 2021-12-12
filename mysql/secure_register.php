<?php
require('../mysql/mysqli.php');
?>
<?php         
    $query = "SELECT username FROM `users`";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset($row['username'])) {
        header("Location: ../pages/login.php");
        exit();
} ?>