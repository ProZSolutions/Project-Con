<?php
include('Config.php');
if($_POST['id'])
{
$id=$_POST['id'];
				   

$sql = "SELECT * FROM material_in WHERE dealer = '$id' ";
$query = mysqli_query($link,$sql);

 while($rs = mysqli_fetch_array($query)){  
$data=$rs['id'];
$data1=$rs['date'];
$data2=$rs['Time'];
$data3=$rs['Material_name'];
$data4=$rs['dealer'];
$data5=$rs['Lorry_no'];
$data6=$rs['Received_qty'];
$data7=$rs['From'];
$data8=$rs['To'];

echo '<tr><td>'.$data.'</td>';
echo '<td>'.$data1.'</td>';
echo '<td>'.$data2.'</td>';
echo '<td>'.$data3.'</td>';
echo '<td>'.$data4.'</td>';
echo '<td>'.$data5.'</td>';
echo '<td>'.$data6.'</td>';
echo '<td>'.$data7.'</td>';
echo '<td>'.$data8.'</td></tr>';?>         
  <?php } ?>         
              
                    

<?php } ?>