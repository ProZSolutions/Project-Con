<?php
require'Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{   $no='ok';
   $no1='ok1';
	
	
	
if(isset($_POST['sub'])) {
    $data1 = $_POST['sub1'];
	
	if($no==$data1)
	{
		$mu="SELECT DISTINCT`dealer`,`dealerid` FROM `material_in_temp` where `dealerid`='0'";
		$my=mysqli_query($link,$mu);
		while($res=mysqli_fetch_assoc($my))
		{
			$m=$res['dealer'];
			$m1=$res['dealerid'];
			echo '<table class="three"><tr class="two"><td class="one">' .$m.'</td></tr></table>';
		}
			if($m1=='0')
			{
				echo "The Above Dealer Name Doesn't Exist";
			}
		
else
		{
$s="INSERT INTO `material_in` (`id`,`date`,`Time`,`Material_name`,`dealer`,`Lorry_no`,`Received_qty`,`From`,`To`,`delete`,`paid`,`dealerid`) SELECT * FROM `material_in_temp` ";

if(!mysqli_query($link,$s))
			{
	  die('Error: ' . mysqli_error($link));
			}
echo  "<script type='text/javascript'>";
        echo "window.close();";
        echo "</script>";
		$sql1="TRUNCATE TABLE material_in_temp";
		mysqli_query($link,$sql1);
		}
	}
}
	if(isset($_POST['reset'])) {
    $data2 = $_POST['sub2'];
	
	if($no1==$data2)
	{
		$sql1="TRUNCATE TABLE material_in_temp";
		mysqli_query($link,$sql1);
		echo  "<script type='text/javascript'>";
        echo "window.close();";
        echo "</script>";
	}
	}


}
?>
<html>
<head>
<style>
.one{
	border: 1px solid red;
    padding: 1px;
}
.two{
	border: 1px solid red;
    padding: 1px;
}
.three{
	width: 100px;
    padding: 1px;
}
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}

.auto-style2 {
	margin-top: 50px;
	margin-left: 400px;
}

  form { display: inline; }

</style>
</head>
<body>
 <table id="datatable-buttons1" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th>No </th>
                            <th style="text-align:center;">ID </th>
                            <th style="text-align:center;">DATE</th>
                            <th style="text-align:center;">TIME </th>
                            <th style="text-align:center;">MATERIAL_NAME </th>
                            <th style="text-align:center;">DEALER</th>
                           <th style="text-align:center;">LORRY NO</th>
                          <th style="text-align:center;">RECEIVED QUANTITY</th>
						  <th style="text-align:center;">FROM</th>
						  <th style="text-align:center;">To</th>
                          
                            
                          </tr>
                        </thead>
                    
                    
					   <tbody>
						   <?php
						   $sql3 = "SELECT * FROM material_in_temp";
                           $result3 = mysqli_query($link,$sql3);
                           $i=1;
                            while ($row = $result3->fetch_assoc()) 
		            {
					  $v = $row['date'];
	                  $da = str_replace('-', '/', $v);
                      $d = date('d-m-Y',strtotime($da));?>
					 
                  <tr>					                                                 
                          <td> <?php echo $i;?></td>
						  <td><?php echo $row['id']; ?></td>
                          <td><?php echo $d; ?></td>                          
                          <td><?php echo $row['Time']; ?></td>
                          <td><?php echo $row['Material_name']; ?></td>
                          <td><?php echo $row['dealer']; ?></td>
						  <td><?php echo $row['Lorry_no']; ?></td>
						  <td><?php echo $row['Received_qty']; ?></td>
                          <td><?php echo $row['From']; ?></td>
                          <td><?php echo $row['To']; ?></td>
						   </tr> 
                          
                    
                  
               
				<?php	$i++;}  ?>   

					</tbody>		
					</table></br>
					 <form action="<?= $_SERVER['PHP_SELF']?>"class="form-horizontal form-label-left" data-parsley-validate    method="post"enctype="multipart/form-data">
					<input type="hidden"name="sub1"value="ok">
					<input type="submit"name="sub"value="Save" class='auto-style2' style="width: 95px">
					</form>
					 <form action="<?= $_SERVER['PHP_SELF']?>"class="form-horizontal form-label-left" data-parsley-validate method="post"enctype="multipart/form-data">  
					<input type="hidden"name="sub2"value="ok1">
					<input type="submit"value="Cancel"name="reset" class="auto-style1" style="width: 93px">
					</form>
</body>
</html>