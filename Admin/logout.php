<?php
session_start();
error_reporting(0);
$one = session_id();
include'Config.php';
$to=$_SESSION['mysesi'];
   $sql2 = "UPDATE `logstamp` SET  `Active`='0',`lastlogout` = NOW() WHERE username='$to'"; 
   $query1 = mysqli_query($link,$sql2);

     $sql = "UPDATE `session` SET `session_id`= '0',`lastlogout` = NOW(),`Active`='0' WHERE name='$to'";            
     $query = mysqli_query($link,$sql); 
			
         if ($query === TRUE) {
    header("location:../index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
session_destroy();
?>
