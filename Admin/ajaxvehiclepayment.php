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
	margin-left: 107px;
}
.auto-style2 {
	margin-left: 60px;
}
.auto-style3 {
	margin-left: 40px;
}
.auto-style4 {
	margin-left: 44px;
}
.auto-style5 {
	margin-left: 96px;
}
.auto-style6 {
	margin-left: 45px;
}
.auto-style7 {
	margin-left: 44px;
}
.auto-style8 {
	margin-left: 80px;
}
.auto-style9 {
	margin-left: 67px;
}
.auto-style10 {
	margin-left: 100px;
}
.auto-style11 {
	margin-left: 200px;
}
</style>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
require'Config.php';
$id2=$_POST['id'];

$sql = "SELECT * FROM `vehicle_entry` WHERE `sno` = '$id2' ";
$result = mysqli_query($link,$sql);
?>
 <?php while($rs = mysqli_fetch_object($result)){ 
	  $v = $rs->Date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?>
     <form action="view_vehicle.php"method="POST">   	
	  <input type="hidden" name="id11"value="<?php echo stripslashes($rs->sno); ?> ">
	<label class="auto-style1">Date</label><input type="text" name="id12"value="<?php echo stripslashes($d); ?>" class="auto-style10" style="width: 221px"><br><br>
	<label class="auto-style1">Vehicle No</label><input type="text" name="id13"value="<?php echo stripslashes($rs->Vehicle_no); ?>" class="auto-style2" style="width: 221px"><br><br>
	<!--label class="auto-style1">Vehicle Name</label><input type="text"name="id14"value="<?php echo stripslashes($rs->Vehicle_name);?>" class="auto-style3" style="width: 221px"><br><br-->
	<label class="auto-style1">Owner Name</label><input type="text" name="id15"value="<?php echo stripslashes($rs->owner);?>" class="auto-style4" style="width: 223px"><br><br>
	<label class="auto-style1">Hour</label><input type="text" name="id16"value="<?php echo stripslashes($rs->hour);?>" class="auto-style5" style="width: 221px"><br><br>
	
	<label class="auto-style1">Driver Wege</label><input type="text" name="id18"value="<?php echo stripslashes($rs->driverwege); ?> " class="auto-style7" style="width: 221px"><br><br>
	<label class="auto-style1">Cahier</label><input type="text" name="id19"value="<?php echo stripslashes($rs->cashier); ?>" class="auto-style8" style="width: 222px"><br><br>
	<label class="auto-style1">Remarks</label><input type="text" name="id10"value="<?php echo stripslashes($rs->remark); ?>" class="auto-style9" style="width: 222px"><br><br>
	<?php } ?>
	<input type="hidden" name="hide" class="btn btn-success"value="second">
	<input type="submit" name="send"  value="update"class="auto-style11 btn btn-warning">
	<input type="submit" name="send" value="delete"class="btn btn-danger">	
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