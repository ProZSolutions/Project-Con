<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select No from contact  where `Designation` ='Labour' AND  `Name` ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['No'];
echo $data;

}
}

?>