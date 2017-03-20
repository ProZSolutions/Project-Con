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
.auto-style3 {
	margin-left: 88px;
}
.auto-style2 {
	margin-left: 100px;
}
.auto-style4 {
	margin-left: 85px;
}
.auto-style5 {
	margin-left: 57px;
}
.auto-style7 {
	margin-left: 88px;
}
.auto-style8 {
	margin-left: 111px;
}
.auto-style9 {
	margin-left: 82px;
}
.auto-style10 {
	margin-left: 60px;
}
.auto-style12 {
	margin-left: 23px;
}
.auto-style13 {
	margin-left: 192px;
}
</style>
</head>
<body>

<?php
require'Config.php';
$id2=$_POST['id'];

$sql = "SELECT * FROM payment WHERE sno = '$id2' ";
$result = mysqli_query($link,$sql);
?>
 <?php while($rs = mysqli_fetch_object($result)){ 
	  $v = $rs->Date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?>
     <form action="Manage_account" method="POST">   	
	 <input type="hidden" name="id11"value="<?php echo stripslashes($rs->sno); ?>">
	 <input type="hidden" name="id111"value="<?php echo stripslashes($rs->empid); ?>">
	<label class="auto-style1">Date</label><input type="text" name="id12"value="<?php echo stripslashes($d); ?> "class="auto-style1" style="width: 221px" ><br><br> 
    <label class="auto-style1">Name</label><input type="text" name="id13"value="<?php echo stripslashes($rs->Name); ?>" class="auto-style2" style="width: 221px"><br><br>
	<label class="auto-style1">Designation</label><input type="text" name="id14"value="<?php echo stripslashes($rs->Designation); ?>" class="auto-style10" style="width: 221px"><br><br>
	<label class="auto-style1">Position</label><input type="text"name="id15"value="<?php echo stripslashes($rs->Design_ty);?>" class="auto-style4" style="width: 221px"><br><br>
	<label class="auto-style1">Payment For</label><input type="text" name="id16" value="<?php echo stripslashes($rs->Payment_type);?>" class="auto-style5" style="width: 223px"><br><br>
	<label class="auto-style1">Amount</label><input type="text" name="id17"value="<?php echo stripslashes(round($rs->Totalamount));?>" class="auto-style3" style="width: 221px"><br><br>
	<label class="auto-style1">Remarks</label><input  name="id18"value="<?php echo stripslashes($rs->Remarks); ?> " class="auto-style9" style="width: 218px"><br><br>
	<label class="auto-style1">Cashier</label><input type="text" name="id19"value="<?php echo stripslashes($rs->Cashier); ?> " class="auto-style7" style="width: 221px"><br><br>
	
	<?php } ?>
	<input type="submit"value="submit"id="sub" class="auto-style13 btn btn-round btn-success" style="width: 91px; height:30px">
    <input type="reset"class="cls auto-style12 btn btn-round btn-primary"value="cancel" style="width: 92px; height: 30px">
  
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