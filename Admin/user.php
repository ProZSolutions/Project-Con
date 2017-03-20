<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100px;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
.style{margin-left:370px;}

</style>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery-1.12.3.js"></script>
 <script src="js/jquery.min.js"></script>
 <!--<script type="text/javascript"-->

 <script type="text/javascript">
$(document).ready(function()
{
$('#btn').click(function(){            
   var id = [];  

   $(':checkbox:checked').each(function(i){  
   id[i] = $(this).val();  
   });                
               
          $.ajax({  
          url:'ajaxamount.php',  
          method:'POST',  
          data:{id:id},  
          success:function(html)  
             {  
          $("#amut,#hide").val(html); 
             }  
           });               
         
          
      });  
});
</script>
</head>
<body>

<?php
require'Config.php';
error_reporting(0);
$id2=$_POST['id'];

if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}


$sql = "SELECT * FROM material_in WHERE dealer = '$id2' AND paid='0' AND `delete` = '0'";
$result = mysqli_query($link,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

echo " <table id='datatable-buttons' class='table table-striped table-bordered'>
<tr>
                          <th>#</th>
						  <th>Si No</th>
						  <th>ID</th>
						  <th>DATE</th>
                          <th>TIME</th>
                          <th>MATERIAL NAME</th>
						  <th>DEALER</th>
                          <th>LORRY NO</th>
                          <th>RECEIVED QUANTITY</th>
						  <th>Amount</th>
						  <th>FROM</th>
						  <th>To</th>
						  <th>Amount to be</th>
						  
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
	$r=$row['paid'];
	$v = $row['date'];
	$da = str_replace('-', '/', $v);
     $d = date('d-m-Y',strtotime($da)); 
    echo "<tr>";
	echo "<td>
           <input id='doubt' type='checkbox' name='ids[]'  value=".$row['id']." >  </td>";
    echo "<td>" . $i . "</td>";      
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $d . "</td>";
    echo "<td>" . $row['Time'] . "</td>";
    echo "<td>" . $row['Material_name'] . "</td>";
	echo "<td>" . $row['dealer'] . "</td>";
    echo "<td>" . $row['Lorry_no'] . "</td>";
	echo "<td>" . $row['Received_qty'] . "</td>";
	echo "<td>" . round($row['Totalamount']) . "</td>";
	echo "<td>" . $row['From'] . "</td>";
	echo "<td>" . $row['To'] . "</td>";
	 if($r==0)
	{ echo "<td><label disabled><font color='#ff0000'>unpaid</font></label></td>";
	} 
	else{echo "<td><label disabled><font color='#00FF00'>paid</font></label></td>";}
    echo "</tr>";
$i++;}
echo "</table>";

echo '<input type="button" id="btn"name="aja"class="style btn btn-info"value="calculate"></br></br>';?>

<?php $que1 = "SELECT sum(Amount) FROM dealerpayment WHERE `Name` = '$id2' AND `Payment_type`='Pending' AND `del` = '0' AND `Pi`='0'";
$res1 = mysqli_query($link,$que1);
 while($row1 = mysqli_fetch_array($res1)) { 
	$noo = $row1['sum(Amount)'];
	 ?>
            <div class="form-group">
			<label  class="control-label col-md-2 col-sm-3 col-xs-6"> Pending Amount: <i class="fa fa-inr"></i> </label>		            
			<div class="col-md-2">
			
            <input type="text" name="add" id="ok2"class="control-label col-md-6" value="<?php echo $noo; ?>" readonly style="border:none"><?php } ?> </div><?php if($noo == 0) {?>
			<label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check" name="twice" disabled onchange ="disable1()"/>Paid From Pending <i class="fa fa-inr"></i> </label><?php } else {?><label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check" name="twice" disabled onchange ="disable()"/>Paid From Advance <i class="fa fa-inr"></i> </label><?php } ?>
			<div class="col-md-2">					
            <input type="text" name="balance" id="adv" required="required" placeholder="00.00" class="form-control col-md-7 col-xs-12" disabled onKeyup="add1()" onkeypress="return isNumberKey(event,this.id)" >
            </div>                             
            </div>
			<?php $que1 = "SELECT sum(Amount) FROM dealerpayment WHERE `Name` = '$id2' AND `Payment_type`='Advance' AND `del` = '0' AND `Pi`='0'";
$res1 = mysqli_query($link,$que1);
 while($row1 = mysqli_fetch_array($res1)) {
	$no = $row1['sum(Amount)'];
	
	 ?>
            <div class="form-group">
			<label  class="control-label col-md-2 col-sm-3 col-xs-6"> Advance Amount: <i class="fa fa-inr"></i></label>		            
			<div class="col-md-2">
			
            <input type="text" name="sub" id="ok1"class="control-label col-md-6" value="<?php echo $no; ?>" readonly style="border:none" > <?php } ?></div><?php if($no == 0) {?>
			<label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check1" name="twice" disabled onchange ="disable1()"/>Paid From Advance <i class="fa fa-inr"></i> </label><?php } else {?><label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check1" name="twice" disabled onchange ="disable()"/>Paid From Advance <i class="fa fa-inr"></i> </label><?php } ?>
			<div class="col-md-2">					
            <input type="text" name="advance"id="adv1" required="required" placeholder="00.00" class="form-control col-md-7 col-xs-12" disabled onKeyup="sub1()" onkeypress="return isNumberKey(event,this.id)" >
            </div>                             
            </div></br></br></br>


			<script type="text/javascript"> 
		    function add1() {
            var txtfirstNumberValue = document.getElementById('hide').value;
            var txtSecondNumberValue = document.getElementById('adv').value;
            var result =parseInt(txtfirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('amut').value = +result;
            }}
			  function sub1() {
            var txtfirstNumberValue = document.getElementById('hide').value;
            var txtSecondNumberValue = document.getElementById('adv1').value;
            var result =parseInt(txtfirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('amut').value = +result;
            }}
			</script>
	<script>
	$(document).ready(function () {
    $("#adv1").on('input', function () {
		var txtbalance = $('#ok1').val();
		var txtdays = $('#adv1').val();
		
		if (txtbalance ==""){
			alert("Didn't Have Adavance amount");
			$('#adv1').val("");
		}
		
        if ( parseInt(txtbalance) < parseInt(txtdays) ) {
            alert("Entered amount is Greater than Advance Amount");
			$('#adv1').val("");
        }
    });
});

$(document).ready(function () {
    $("#adv").on('input', function () {
		var txtbalance = $('#ok2').val();
		var txtdays = $('#adv').val();
		
		if (txtbalance ==""){
			alert("Didn't Have Pending amount");
			$('#adv').val("");
		}
		
        if ( parseInt(txtbalance) < parseInt(txtdays) ) {
            alert("Entered amount is Greater than Pending Amount");
			$('#adv').val("");
        }
    });
});
</script>
<script>
$('#btn').click(function () {
    
        $('#check').removeAttr('disabled'); 
		 $('#check1').removeAttr('disabled');
        
   
});
</script>
<script type="application/javascript">
function isNumberKey(evt,id)
{	
        var charCode = (evt.which) ? evt.which : event.keyCode;  
        if(charCode==46){
            var txt=document.getElementById(id).value;
            if(!(txt.indexOf(".") > -1)){	
                return true;
            }
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57) )
            return false;
        return true;	
}
</script> 
<script type="text/javascript"> 
function disable()
{ 
if (document.getElementById('check').checked == 1)
{ 
document.getElementById('adv').disabled='';
}
else
	{document.getElementById('adv').disabled='disabled';
	}
if (document.getElementById('check1').checked == 1)
{ 
document.getElementById('adv1').disabled='';
}
else
	{document.getElementById('adv1').disabled='disabled';
	}
}
</script>
</body>
</html>