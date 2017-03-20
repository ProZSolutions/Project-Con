<?php
session_start();
ob_start();
require'Config.php';
$data=$_GET['value1'];
$_SESSION["favanimal"] = $data;
  $mm= "select Designation from contact where `No` ='$data' " ;
				$nn= mysqli_query($link,$mm);
			
				while($s=mysqli_fetch_array($nn))
				{ 
					 $dna3= $s['Designation'];  
					
				}
 if($dna3=='Employee')
			{
header("location:employee_profile");	
}       
elseif($dna3=='Dealer')
{	
	header("location:dealer_profile");
}
else
{
	header("location:Labour_profile");
}



?>