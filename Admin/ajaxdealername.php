<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select Designation from contact  where  Name ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['Designation'];
echo $data;

}
}

?>