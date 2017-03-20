<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select Design_type from contact  where  Name ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['Design_type'];
echo $data;

}
}

?>