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
	margin-left: 75px;
}
.auto-style2 {
	margin-left: 96px;
}
.auto-style3 {
	margin-left: 62px;
}
.auto-style4 {
	margin-left: 70px;
}
.auto-style5 {
	margin-left: 98px;
}
.auto-style6 {
	margin-left: 36px;
}
.auto-style7 {
	margin-left: 67px;
}
.auto-style8 {
	margin-left: 93px;
}
#auto-style9 {
	margin-left: 195px;
	margin-top:-25px;
}
.auto-style10 {
	margin-left: 192px;
}

.auto-sty2 {
margin-left: 137px;
}
</style>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
require'Config.php';
$id2=$_POST['id'];

$sql = "SELECT * FROM stockentry WHERE `stno` = '$id2'";
$result = mysqli_query($link,$sql);
?>
 <?php while($rs = mysqli_fetch_object($result)){ 
	  $v = $rs->Date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
?>
     <form action="Manage_stock"method="POST" enctype="multipart/form-data">   	
	<input type="hidden" name="id11"value="<?php echo stripslashes($rs->stno); ?>">
    <label class="auto-style1">Date</label><input type="text" name="id12"value="<?php echo stripslashes($d); ?>" class="auto-style2" style="width:221px"><br><br> 
	<label class="auto-style1">Itemname</label><input type="text" name="id13"value="<?php echo stripslashes($rs->Itemname); ?>" class="auto-style3" style="width: 221px"><br><br>
	<label class="auto-style1">Quantity</label><input id="no1" type="text"name="id14"value="<?php echo stripslashes($rs->Quantity);?>" onKeyup="sum()" class="auto-style4" style="width: 221px"><br><br>
	<label class="auto-style1">Rate</label><input id="no2" type="text" name="id15"value="<?php echo stripslashes($rs->Rate);?>" onKeyup="sum()" class="auto-style5" style="width: 223px"><br><br>
	<label class="auto-style1">Total Amount</label><input id="no3" type="text" name="id16"value="<?php echo stripslashes($rs->Total);?>" class="auto-style6" readonly style="width: 221px"><br><br>
	<label class="auto-style1">Discount</label><input  name="id17"value="<?php echo stripslashes($rs->Discount); ?>" class="auto-style7" style="width: 218px"><br><br>
	
	<label class="auto-style1">Bill</label><input name="img" accept="image/jpeg" type="file"class="btn btn-warning" id="auto-style9"  style="width:221px" >     <br><br>	
	
	<input type="submit"value="submit"id="sub" class="auto-sty2 btn btn-round btn-success" style="width: 91px; height:30px">
    <input type="reset"class="cls auto-style12 btn btn-round btn-primary"value="cancel" style="width: 92px; height: 30px">
	
	<?php } ?>
	
 
  </form>

   <script>
	

var span1 = document.getElementsByClassName("cls")[0];


span1.onclick = function() {
    modal.style.display = "none";
}

	
</script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>
<script type="text/javascript">
function sum() {
            var txtfirstNumberValue = document.getElementById('no1').value;
            var txtSecondNumberValue = document.getElementById('no2').value;
            var result =parseInt(txtfirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('no3').value = +result;
            }
}

       
		</script>
</body>
</html>