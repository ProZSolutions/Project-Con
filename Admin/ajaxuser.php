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
.auto-style {
	margin-left: 50px;
}
.auto-style1 {
	margin-left: 105px;
}
.auto-style2 {
	margin-left: 122px;
}
.auto-style3 {
	margin-left: 85px;
}
.auto-style4 {
	margin-left: 100px;
}
.auto-style5 {
	margin-left: 88px;
}
.auto-style6 {
	margin-left: 200px;
}

</style>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
require 'Config.php';
$id2 = $_POST['id'];
$sql = "SELECT * FROM user WHERE usrno = '$id2' ";
$result = mysqli_query($link,$sql);
while($rs = mysqli_fetch_object($result)){ 	
	?>
    <form action="usermanagement.php" class="form-horizontal form-label-left" novalidate method="POST"> 
	<label class="auto-style">User Id</label><input type="text" name="user" value="<?php echo stripslashes($rs->usrno); ?> "readonly class="auto-style1" style="width: 221px" ><br><br>  	
	<label class="auto-style">Role</label><input type="text" name="role" value="<?php echo stripslashes($rs->role); ?> " class="auto-style2" style="width: 221px"><br><br>
	<label class="auto-style">Username</label><input type="text" name="username" value="<?php echo stripslashes($rs->username); ?>" class="auto-style3" style="width: 222px"><br><br>
	<label class="auto-style">Password</label><input type="text" name="pass" 
	value="<?php $one = $rs->password;echo stripslashes($one); ?>" class="auto-style5" style="width: 221px"><br><br>
	<?php } ?>
	<!--<td><button type="submit" id="Btn" style="width: 92px; height: 30px" class="p btn btn-round btn-success"name="ids[]"value="<?php echo $rs->username; ?>">Update</button></td>
	<td><button type="submit" id="Btn" style="width: 92px; height: 30px" class="p btn btn-round btn-success"name="ids[]"value="<?php echo $rs->username; ?>">Delete</button></td>
    <input type="reset"class="cls auto-style12 btn btn-round btn-primary"value="cancel" style="width: 92px; height: 30px">-->
    <input type="hidden" name="action" value="submit"/>
    
	<input type="submit" name="send" value="update"class="auto-style6 btn btn-warning">
	<input type="reset"class="cls  btn btn-primary"value="cancel" >
  


</form>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>
 
<script>
var span1 = document.getElementsByClassName("cls")[0];
span1.onclick = function() {
    modal.style.display = "none";}	
</script>


</body>
</html>