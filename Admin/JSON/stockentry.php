<?php
      //fetch table rows from mysql db
    $sql = "select count(stno) from stockentry where del='0'";
    $result = mysqli_query($link, $sql) or die("Error in Selecting " . mysqli_error($connection));
	    while($row =mysqli_fetch_assoc($result))
    {
        $emparray = $row;
		
    }


	

	 //write to json file
    $fp = fopen('JSON/stock.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
?>