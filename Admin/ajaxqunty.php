<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select quantitytype from material  where  material_name ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['quantitytype'];
echo $data;

}
}

?>