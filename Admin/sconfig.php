<?php
error_reporting(0);
session_start();
include'Config.php';
$na=$_SESSION['mysesi'];
$na1 = session_id();
$sql123 = "SELECT * FROM session WHERE name = '$na' ";
$query1 = mysqli_query($link,$sql123);
while ($row = mysqli_fetch_assoc($query1)) 
		{
		$id2 = $row['session_id'];
		}	   
		if($id2==$na1)
		{ 
		}
	    else 
		{
		 $sql = "UPDATE `session` SET `session_id`= '0',`lastlogout` = NOW(),`Active`='0' WHERE name='$na'";            
         $query = mysqli_query($link,$sql); 
         header("location:../index.php");
         }
?>
