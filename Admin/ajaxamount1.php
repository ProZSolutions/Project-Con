<?php
error_reporting(0);
include('Config.php');
if($_POST['id'])
{
  $o=$_POST["id"];	  	  
  $all = implode(",", $o);
$sql="select SUM(round(Amount))  FROM vehicle_entry   WHERE 1 AND `sno` IN($all)";
$re=mysqli_query($link,$sql);

while($row=mysqli_fetch_array($re))
	{
$s=$row['SUM(round(Amount))'];
echo $s;
  //echo '<input type="checkbox"id="doubt" name="ids"  value='.$row['id'].'> ';

}
}

?>