<?php
      //fetch table rows from mysql db
    $sql = "select count(No) from contact where `designation`='Employee' and `trunc`='0'";
    $result = mysqli_query($link, $sql) or die("Error in Selecting " . mysqli_error($connection));
	    while($row =mysqli_fetch_assoc($result))
    {
        $emparray = $row;
		
    }


	

	 //write to json file
    $fp = fopen('JSON/empdata.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
?>
<?php
      //fetch table rows from mysql db
    $sql1 = "select count(No) from contact where `designation`='Labour' and `trunc`='0'";
    $result1 = mysqli_query($link, $sql1) or die("Error in Selecting " . mysqli_error($connection));
	    while($row1 =mysqli_fetch_assoc($result1))
    {
        $emparray1 = $row1;
    }


	

	 //write to json file
    $fp1 = fopen('JSON/labdata.json', 'w');
    fwrite($fp1, json_encode($emparray1));
    fclose($fp1);
?>
<?php
      //fetch table rows from mysql db
    $sql2 = "select count(No) from contact where `designation`='Dealer' and `trunc`='0'";
    $result2 = mysqli_query($link, $sql2) or die("Error in Selecting " . mysqli_error($connection));
	    while($row2 =mysqli_fetch_assoc($result2))
    {
        $emparray2 = $row2;
    }


	

	 //write to json file
    $fp2 = fopen('JSON/dealdata.json', 'w');
    fwrite($fp2, json_encode($emparray2));
    fclose($fp2);
?>

