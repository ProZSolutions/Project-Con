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
	margin-left: 102px;
}
.auto-style2 {
	margin-left: 74px;
	padding-left:4px;
}

.auto-style3 {
	margin-left: 90px;
	padding-left:4px;
}
.auto-style4 {
	margin-left: 104px;
	padding-left:4px;
}
.auto-style5 {
	margin-left: 106px;
	padding-left:4px;
}
.auto-style6 {
	margin-left: 26px;
	padding-left:4px;
}

.auto-style7 {
	margin-left: 118px;
	padding-left:4px;
}
.auto-st8 {
	margin-left: 159px;
	padding-left:4px;
}
</style>
</head>
<body>

<?php
session_start();
require'Config.php';
require'usrrole.php';
$id2 = $_POST['id'];
$sql = "SELECT * FROM vehicle WHERE `nos` = '$id2' ";
$result = mysqli_query($link,$sql);
 while($rs = mysqli_fetch_object($result)){ 

	 ?>
	
     <form action="view_contact.php"method="POST"> 
	 <input type="hidden" name="id18"value="<?php echo stripslashes($rs->nos); ?> ">
	<label class="auto-style1">Vehicle No</label><input type="text" name="id11"value="<?php echo stripslashes($rs->vno); ?>"class="auto-style1" style="width: 221px" ><br><br>    
	<label class="auto-style1">Vehicle Owner</label><input type="text" name="id12"value="<?php echo stripslashes($rs->vown); ?>" class="auto-style2" style="width: 221px"><br><br>
	<label class="auto-style1">Driver Wage</label><input type="text" name="id13"value="<?php echo stripslashes($rs->vwege); ?>" class="auto-style3" style="width: 221px"><br><br>
	<label class="auto-style1">Hour Cost</label><input type="text" name="id14"value="<?php echo stripslashes($rs->hour_cost); ?>" class="auto-style4" style="width: 221px"><br><br>
	<label class="auto-style1">Mobile No</label><input type="text" name="id15"value="<?php echo stripslashes($rs->mobile); ?>" class="auto-style5" style="width: 221px"><br><br>
	<label class="auto-style1">Alternative Mobile No</label><input type="text" name="id16"value="<?php echo stripslashes($rs->amobile); ?>" class="auto-style6" style="width: 221px"><br><br>
	<label class="auto-style1">Address</label><input type="text" name="id17"value="<?php echo stripslashes($rs->address); ?>" class="auto-style7" style="width: 221px"><br><br>
	<?php } ?>

	<input type="hidden" name="hide" class="btn btn-success" value="second">
	<input type="submit" name="send" value="update" class="auto-st8 btn btn-warning">	
	<?php  if($role=='admin') { ?>
	<input type="submit" name="send" value="delete" class="btn btn-danger"><?php } ?>	
	<input type="reset" class="cls  btn btn-primary"value="cancel" >
  </form>

   <script>	
var span1 = document.getElementsByClassName("cls")[0];
span1.onclick = function() 
	{
    modal.style.display = "none";
	}
	
</script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>
</body>
</html>