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
	margin-left: 44px;
}
.auto-style4 {
	margin-left: 98px;
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


</head>
<body>
<?php
session_start();
require'Config.php';
require'usrrole.php';
$id2 = $_POST['id'];
$sql = "SELECT * FROM `vehicle_entry` WHERE `sno` = '8' ";
$result = mysqli_query($link,$sql);
while($rs = mysqli_fetch_object($result)){ 
$v = $rs->Date;
$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
$pai = $rs->paid;
if($pai == 0){ ?>
<form action="view_vehicle" method="POST">   	
<input type="hidden" name="id11" value="<?php echo stripslashes($rs->sno); ?> ">
<label class="auto-style1">Date</label><input type="text" name="id12" value="<?php echo stripslashes($d); ?>" class="auto-style10" style="width: 221px"><br><br>
<label class="auto-style1">Vehicle No</label><input type="text" name="id13" value="<?php echo stripslashes($rs->Vehicle_no); ?>" class="auto-style2" style="width: 221px"><br><br>
<label class="auto-style1">Owner Name</label><input type="text" name="id14" value="<?php echo stripslashes($rs->owner);?>" class="auto-style3" style="width: 221px"><br><br>
<label class="auto-style1">Hour</label><input type="text" name="id15" id="tim" value="<?php echo stripslashes($rs->hour);?>" class="clstime auto-style4" style="width: 223px" data-inputmask="'mask' : '99:99'"><br><br>	   
<?php } else { 	echo "<font color='#ff0000' style='margin-left:50px;'> It's not Editable....... --Payment is Paid--</font>"; } ?> <?php } ?>
<input type="hidden" name="hide" class="btn btn-success" value="second">
<input type="submit" name="send" value="update" class="auto-style11 btn btn-warning">
<input type="reset" class="cls btn btn-primary" value="cancel" >  
</form>
<script>
var span1 = document.getElementsByClassName("cls")[0];
span1.onclick = function() {
modal.style.display = "none";
}	
</script>
<!-- <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script-->
<!-- date -->
</body>
</html>
