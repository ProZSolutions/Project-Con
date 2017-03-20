<?php  
				$date1=date("W");
                $prev=$date1-1;
				$ps= "SELECT COALESCE(Round(sum(Totalamount)),0) FROM `payment` WHERE week(Date)=$prev and `del`='0'";
				$dg=mysqli_query($link,$ps);
				while($d=mysqli_fetch_assoc($dg))
					  {
        $emparray2 = $d;
    }
  


	

	 //write to json file
    $fp2 = fopen('JSON/prev_week_pay.json', 'w');
    fwrite($fp2, json_encode($emparray2));
    fclose($fp2);
?>
<?php  
				$date2=date("W");
                $current=$date2;
				$ps1= "SELECT COALESCE(Round(sum(Totalamount)),0) FROM `payment` WHERE week(Date)=$current and `del`='0'";
				$dg1=mysqli_query($link,$ps1);
				while($d1=mysqli_fetch_assoc($dg1))
			    {
                $emparray1 = $d1;
				}
	//write to json file
    $fp1 = fopen('JSON/cur_week_pay.json', 'w');
    fwrite($fp1, json_encode($emparray1));
    fclose($fp1);
?>