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
	margin-left: 85px;
}
.auto-style4 {
	margin-left: 32px;
}
.auto-style5 {
	margin-left: 57px;
}
.auto-style7 {
	margin-left: 94px;
}
.auto-style8 {
	margin-left: 111px;
}
.auto-style9 {
	margin-left: 12px;
}
.auto-style10 {
	margin-left: 93px;
}
.auto-style12 {
	margin-left: 23px;
}
.auto-style13 {
	margin-left: 192px;
}
</style>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
require'Config.php';
$id2=$_POST['id'];

$sql = "SELECT * FROM user WHERE username = '$id2' ";
$result = mysqli_query($link,$sql);
?>
 <?php while($rs = mysqli_fetch_object($result)){ 	
	 ?>
     	
	<label class="auto-style1">username</label><input type="text" name="id12"value="<?php echo stripslashes($rs->username); ?> "readonly class="auto-style1" style="width: 221px" ><br><br>  	
	<label class="auto-style1">From</label><input type="text" name="id19"value="<?php echo stripslashes($rs->role); ?> " class="auto-style7" style="width: 221px"><br><br>
	<label class="auto-style1">To</label><input type="text" name="id11"value="<?php echo stripslashes($rs->username); ?>" class="auto-style8" style="width: 222px"><br><br>
	<?php } ?>
	<td><button type="submit" id="Btn" class="p btn btn-info btn-xs"name="ids[]"value="<?php echo $rs->username; ?>">Save</button></td>
    <input type="reset"class="cls auto-style12 btn btn-round btn-primary"value="cancel" style="width: 92px; height: 30px">




<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>

</body>
</html>