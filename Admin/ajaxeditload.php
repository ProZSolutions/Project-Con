<!DOCTYPE html>
<html>
<head >
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
	margin-left: 97px;
}
.auto-style3 {
	margin-left: 83px;
}
.auto-style4 {
	margin-left: 30px;
}
.auto-style5 {
	margin-left: 65px;
	
}
.auto-style7 {
	margin-left: 96px;
	
}
.auto-style8 {
	margin-left: 120px;
}
.auto-style9 {
	margin-left: 12px;
}
.auto-style10 {
	margin-left: 105px;
}
.auto-style12 {
	margin-left: 23px;
}
.auto-style13 {
	margin-left: 400px;
}
.auto-sty {
	margin-left: 97px;
}
.auto-sty1 {
margin-left: 45px;
}
.auto-sty2 {
margin-left: 123px;
}
.auto-sty23 {
margin-left: 600px;
}
.auto-sty24 {
margin-left: 92px;
}
</style>

</head>
<body>

<?php
require'Config.php';
$id2=$_POST['id'];

$sql = "SELECT * FROM material_in WHERE id = '$id2'";
$result = mysqli_query($link,$sql);
?>
 <?php while($rs = mysqli_fetch_object($result)){ 
	  $v = $rs->date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
$pai =$rs->paid;
if($pai == 0){ ?>
     <form action="Manage_loads" method="POST">   	
	<label class="auto-style1">ID</label><input type="text" name="id12"value="<?php echo stripslashes($rs->id); ?> "readonly class="auto-sty2" style="width:221px" ><br>
    <label class="auto-sty23">Date</label><input type="text" name="id13"value="<?php echo stripslashes($d); ?>" class="auto-style7" style="width:221px"><br> 
	<label class="auto-style1">Time</label><input type="text" name="id14"value="<?php echo stripslashes($rs->Time); ?>" class="auto-style10" style="width: 221px"><br>
	<label class="auto-sty23">Material Name</label><input type="text"name="id15" value="<?php echo stripslashes($rs->Material_name);?>" class="auto-style4" style="width: 221px"><br>
	<label class="auto-style1">Vechile No</label><input type="text" name="id16"  value="<?php echo stripslashes($rs->Lorry_no);?>" class="auto-style5" style="width: 225px"><br>
	<label class="auto-sty23">Dealer</label><input type="text" name="id17"value="<?php echo stripslashes($rs->dealer);?>" class="auto-style3" style="width: 221px"><br>
	<label class="auto-style1">Received Quantity</label><input  name="id18"value="<?php echo stripslashes($rs->Received_qty); ?>" onKeyup="sum()"  id="no1" class="auto-style9" style="width: 223px"><br>
	<label class="auto-sty23">Rate</label><input  name="rate" value="<?php echo stripslashes($rs->rate); ?>" onKeyup="sum()" class="auto-sty" id="no2" style="width: 218px"><br>
	<label class="auto-style1">Total Amount</label><input  name="total" value="<?php echo stripslashes(round($rs->Totalamount)); ?>" id="no3" class="auto-sty1" style="width: 225px" readonly><br>
	<label class="auto-sty23">From</label><input type="text" name="id19"value="<?php echo stripslashes($rs->From); ?> " class="auto-sty24" style="width: 221px">
	<label class="auto-style1">To</label><input type="text" name="id11"value="<?php echo stripslashes($rs->To); ?>" class="auto-style8" style="width: 227px"><br><br>
	<div class="form-group">
	<input type="submit"value="submit"id="sub" class="auto-style13 btn btn-round btn-success" style="width: 91px; height:30px">
    <input type="reset"class="cls auto-style12 btn btn-round btn-primary"value="cancel" style="width: 92px; height: 30px">
	 <?php } else { 
		 echo "<font color='#ff0000'>The Load is not Editable because Amount is Paid</font>";
	 } ?>
	<?php } ?>
 <div>
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
            var result =parseFloat(txtfirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('no3').value = +result;
            }
}       
</script>
</body>
</html>