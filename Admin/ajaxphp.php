<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];

$sql="select Name from contact  where  Designation ='$id'";
$re=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($re))
{
$data=$row['Name'];
echo '<option>'.$data.'</option>';

}
}

?>