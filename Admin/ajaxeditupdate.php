	<?php
	session_start();
	error_reporting(0); 
require'Config.php';
include'sconfig.php'; 
$go1=$_POST['id1'];
$go2=$_POST['id2'];
$go3=$_POST['id3'];
$go4=$_POST['id4'];
$go5=$_POST['id5'];
$go6=$_POST['id6'];
$go7=$_POST['id7'];
$go8=$_POST['id8'];
$go9=$_POST['id9'];
echo $go1;
echo $go2;
echo $go3;
echo $go4;
echo $go5;
echo $go6;
echo $go7;
echo $go8;
echo $go9;
    $sql = "UPDATE `material_in` SET `date`='$go2' WHERE `id` ='$go1'";
    if (!mysqli_query($link,$sql))
      {
      die('Error:'. mysqli_error($link));
      }
	  else
	  mysqli_close($link);	

?>