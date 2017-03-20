<?php
error_reporting(0);
include('Config.php');
if($_POST['id'])
{
  $o=$_POST["id"];	  	  
  $all = implode(",", $o);
 
$sql="select sum(round(Total_amount)) from `labour_attend`  WHERE 1 AND `A_L_no` IN($all)";
$re=mysqli_query($link,$sql);

while($row=mysqli_fetch_array($re))
	{
$s=$row['sum(round(Total_amount))'];

 echo $s;
 //echo '<input type="checkbox"id="doubt" name="ids"  value='.$row['id'].'> ';

}
}

?>