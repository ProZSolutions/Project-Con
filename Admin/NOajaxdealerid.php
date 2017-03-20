<?php
include('Config.php');
if($_POST['id1'])
{
$id=$_POST['id1'];
$sql="select Dealerid from dealercont  where  Name ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['Dealerid'];
echo $data;

}
}

?>