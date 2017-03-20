 <?php 
	require'Config.php';
    $id2=$_POST['id']; 
	$sql1 = "SELECT * FROM `stockentry` where `stno`='$id2'";	
    $query1 = mysqli_query($link,$sql1);
    while($row = mysqli_fetch_assoc($query1)){        
    $img = $row["Bill"];
	$ss= base64_encode($img); 
			?><div id="divToPrint"> 
			<img src="data:image/jpeg;base64,<?php echo $ss; ?>" alt="No Bill Preview" class="img-responsive avatar-view"></br>
			</div>
			<button style="margin-left:250px" class="btn btn-primary" onclick="printContent('divToPrint')">Print</button>
	    <?php    }	?>	