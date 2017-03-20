<?php
error_reporting(0);
include('Config.php');
if($_POST['id'])
{
  $o=$_POST["id"];	  	  
  $all = implode(",", $o);
$sql="select sum(round(Totalamount)) from `material_in`  WHERE 1 AND `id` IN($all)";
$re=mysqli_query($link,$sql);

while($row=mysqli_fetch_array($re))
	{
$s=$row['sum(round(Totalamount))'];

 echo $s;
 //echo '<input type="checkbox"id="doubt" name="ids"  value='.$row['id'].'> ';

}
}

?>