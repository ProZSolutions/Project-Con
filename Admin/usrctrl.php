<?php
session_start();
error_reporting(0);
require'Config.php';
$na2 = session_id();

$sql12 = "SELECT name FROM session WHERE session_id = '$na2' ";
$q = mysqli_query($link,$sql12);
  while ($row = mysqli_fetch_assoc($q)) 
		{
	 $user = $row['name'];
		}
?>	   