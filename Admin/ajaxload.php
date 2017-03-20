<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
require'Config.php';

$id21=$_POST['id3'];
$id22=$_POST['id1'];
$id23=$_POST['id2'];

if (!$link) {
    die('Could not connect: ' . mysqli_error($con));
}


 $sql1 = "SELECT * FROM material_in WHERE Year(Date) = '2016' and Month(Date) = '04' and `Material_name` = 'BRICKS QUARTERS'";$result = mysqli_query($link,$sql1);

if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}


echo " <table id='datatable-buttons' class='table table-striped table-bordered'>
<tr>
                          
						<th style='text-align:center;'>ID</th>
						<th style='text-align:center;'>DATE</th>
                          <th style='text-align:center;'>TIME</th>
                          <th style='text-align:center;'>MATERIAL NAME</th>
						  <th style='text-align:center;'>DEALER</th>
                          <th style='text-align:center;'>LORRY NO</th>
                          <th style='text-align:center;'>RECEIVED QUANTITY</th>
						  <th style='text-align:center;'>FROM</th>
						  <th style='text-align:center;'>To</th>
                       
						  
</tr>";
while($row = mysqli_fetch_array($result)) {
$v = $row['date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	
    echo "<tr>";
	
           
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" .$d . "</td>";
    echo "<td>" . $row['Time'] . "</td>";
    echo "<td>" . $row['Material_name'] . "</td>";
	echo "<td>" . $row['dealer'] . "</td>";
    echo "<td>" . $row['Lorry_no'] . "</td>";
	echo "<td>" . $row['Received_qty'] . "</td>";
	echo "<td>" . $row['From'] . "</td>";
	echo "<td>" . $row['To'] . "</td>";
	
}echo "</tr>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td>Total Quantity </td>";
$sql2 = "SELECT sum(Received_qty) FROM material_in  WHERE Year(Date) = '2016' and Month(Date) = '04' and `Material_name` = 'BRICKS QUARTERS'";
$result2 = mysqli_query($link,$sql2);
while($row2 = mysqli_fetch_array($result2)) {
	$s=$row2['sum(Received_qty)'];

echo "<td> <input type='text'value='".$s."'readonly ></td>";
}
echo "<td> </td>";
echo "<td> </td>";
echo "</table>";

mysqli_close($link);

?>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
</body>
</html>