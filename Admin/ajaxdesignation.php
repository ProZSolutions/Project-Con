<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select Design_name from designation  where type ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['Design_name'];
echo '<option>'.$data.'</option>';

}
}

?>