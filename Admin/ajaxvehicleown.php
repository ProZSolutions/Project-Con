<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];

$sql="select vown,nos from vehicle  where `vno`='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data = $row['vown'];
$data1 = $row['nos'];
echo $data.",".$data1;
}
}

?>