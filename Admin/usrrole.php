<?php
error_reporting(0);
require'Config.php';
$na=$_SESSION['mysesi'];
$na3 = session_id();
$sql12 = "SELECT role FROM session WHERE name = '$na' AND session_id = '$na3' ";
$q = mysqli_query($link,$sql12);
  while ($row = mysqli_fetch_assoc($q)) 
		{
	 $role = $row['role'];
	
		}
?>	   