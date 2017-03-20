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
	margin-left: 50px;
}
.auto-style3 {
	margin-left: 175px;
}
.auto-style6 {
	margin-left: 110x;
}
.auto-style8 {
	margin-left: 75px;
}
</style>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body >

<?php
session_start();
require'Config.php';
require'usrrole.php';
$id2=$_POST['id'];
$sql = "SELECT * FROM material WHERE `MNo` = '$id2' ";
$result = mysqli_query($link,$sql);
 while($rs = mysqli_fetch_object($result)){ 

	 ?>
     <form action="Material_entry"method="POST"> 
	 <input type="hidden" name="id13"value="<?php echo stripslashes($rs->MNo); ?> ">
	<label class="auto-style1">Material Name</label><input type="text" name="id11"value="<?php echo stripslashes($rs->material_name); ?>"class="auto-style8" style="width: 221px" ><br><br></br>
    
	<label class="auto-style1">Quantity Type</label><input type="text" name="id12"value="<?php echo stripslashes($rs->quantitytype); ?>" class="auto-style8" style="width: 221px"><br><br></br>
	<?php } ?>
	<div id="pu">
	<input type="hidden" name="hide"class="btn btn-success"value="second">
	<input type="submit" name="send" value="update"class="auto-style3 btn btn-warning">	
	<input type="reset"class="cls  btn btn-primary"value="cancel" ></div>
	
  
   <script>
	

var span1 = document.getElementsByClassName("cls")[0];


span1.onclick = function() {
    modal.style.display = "none";
}

	
</script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>
</body>
<footer class="exam">
</footer>
</html>