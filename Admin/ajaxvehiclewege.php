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
.auto-style1 {
	margin-left: 150px;
}
.auto-style3 {
	margin-left: 200px;
}
.auto-style6 {
	margin-left: 110x;
}
.auto-style8 {
	margin-left: 35px;
}
.auto-style9 {
	margin-left: 50px;
}


</style>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
require'Config.php';
$id2=$_POST['id'];
$sql = "SELECT * FROM vehicle WHERE `nos` = '$id2' ";
$result = mysqli_query($link,$sql);
 while($rs = mysqli_fetch_object($result)){ 

	 ?>
	
     <form action="vehicle_profile.php"method="POST"> 
	 <input type="hidden" name="id11"value="<?php echo stripslashes($rs->nos); ?> ">
	<label class="auto-style1">Driver Wege</label><input type="text" name="id12"value="<?php echo stripslashes($rs->vwege); ?>"class="auto-style8" style="width: 221px" ><br><br></br>
    
	<label class="auto-style1">Hour Cost</label><input type="text" name="id13"value="<?php echo stripslashes($rs->hour_cost); ?>" class="auto-style9" style="width: 221px"><br><br></br>
	
	<?php } ?>
	<input type="hidden" name="hide"class="btn btn-success"value="second">
	<input type="submit" name="send" value="update"class="auto-style3 btn btn-warning">	
	<input type="reset"class="cls  btn btn-primary"value="cancel" >
  </form>

   <script>
	

var span1 = document.getElementsByClassName("cls")[0];


span1.onclick = function() {
    modal.style.display = "none";
}

	
</script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>
</body>
</html>