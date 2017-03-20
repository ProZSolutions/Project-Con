    <?php
	   include'Config.php';
	   require'usrctrl.php';
	$sql1 = "SELECT * FROM `session` where name='$user'";	
    $query1 = mysqli_query($link,$sql1);
    while($row = mysqli_fetch_assoc($query1)){
        //number of cells in row
         $img = $row["image"];
		 	$ss= base64_encode($img);

	        } 
    
    ?>