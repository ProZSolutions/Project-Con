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
.style{margin-left:370px;}

</style>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery-1.12.3.js"></script>
 <script src="js/jquery.min.js"></script>
 <!--<script type="text/javascript"-->

 <script type="text/javascript">
$(document).ready(function()
{
$('#btn1').click(function(){            
   var id = [];  

   $(':checkbox:checked').each(function(i){  
   id[i] = $(this).val();  
   });                
               
          $.ajax({  
          url:'ajaxlabouramount.php',  
          method:'POST',  
          data:{id:id},  
          success:function(html)  
             {  
          $("#amount,#over").val(html); 
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


$sql = "SELECT * FROM labour_attend WHERE Name = '$id2' AND status='0' AND `del` = '0'";
$result = mysqli_query($link,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

echo " <table id='datatable-buttons' class='table table-striped table-bordered'>
<tr>
                          <th>#</th>
						  <th>Si No</th>						 
						  <th>DATE</th>
                          <th>DESIGNATION</th>
                          <th>NO OF MASION</th>
						  <th>NO OF CO-MASION</th>
                          <th>OT NO OF MASION</th>
                          <th>OT NO OF COMASION</th>
						  <th>AMOUNT</th>						 
						  <th>STATUS</th>
						  
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
	$r=$row['status'];
	$v = $row['Date'];
	$da = str_replace('-', '/', $v);
     $d = date('d-m-Y',strtotime($da)); 
    echo "<tr>";
	echo "<td>
           <input id='doubt' type='checkbox' name='ids[]'  value=".$row['A_L_no']." >  </td>";
    echo "<td>" . $i . "</td>";      
    echo "<td>" . $d . "</td>";  
    echo "<td>" . $row['Designation_1'] . "</td>";
	echo "<td>" . $row['no_of_works'] . "</td>";
    echo "<td>" . $row['no_of_coworks'] . "</td>";
	echo "<td>" . $row['ot_works'] . "</td>";
	echo "<td>" . $row['ot_coworks'] . "</td>";
	echo "<td>" . round($row['Total_amount']) . "</td>";
	
	 if($r==0)
	{ echo "<td><label disabled><font color='#ff0000'>unpaid</font></label></td>";
	} 
	else{echo "<td><label disabled><font color='#00FF00'>paid</font></label></td>";}
    echo "</tr>";
$i++;}
echo "</table>";

echo '<input type="button" id="btn1" name="aja"class="style btn btn-info"value="calculate"></br></br>';

 $que1 = "SELECT sum(Amount) FROM dealerpayment WHERE `Name` = '$id2' AND `Payment_type`='Pending' AND `del` = '0' AND `Pi`='0'";
$res1 = mysqli_query($link,$que1);
 while($row1 = mysqli_fetch_array($res1)) { 
	$noo = $row1['sum(Amount)'];
	
	 ?>
            <div class="form-group">
			<label  class="control-label col-md-2 col-sm-3 col-xs-6"> Pending Amount: <i class="fa fa-inr"></i> </label>		            
			<div class="col-md-2">			
            <input type="text" name="add1" id="pend"class="control-label col-md-6" value="<?php echo $noo; ?>" readonly style="border:none"> </div>
			<?php }if($noo == 0) {?>
			<label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check2" name="twice" disabled />Paid For Pending <i class="fa fa-inr"></i> </label><?php }else { ?>
			<label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check2" name="twice" disabled onchange ="disable1()"/>Paid For Pending <i class="fa fa-inr"></i> </label><?php } ?>
			<div class="col-md-2">					
            <input type="text" name="labbalance"id="labbal" required="required" placeholder="00.00" class="form-control col-md-7 col-xs-12" disabled onKeyup="a1()" onkeypress="return isNumberKey(event,this.id)" >
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
            <input type="text" name="sub1" id="advance"class="control-label col-md-6" value="<?php echo $no; ?>" readonly style="border:none"> <?php } ?></div>
			<?php if($no == 0) { ?>
			<label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check3" name="twice" disabled />Paid From Advance <i class="fa fa-inr"></i> </label><?php } else {?>
			<label  class="control-label col-md-3 col-sm-3 col-xs-6"> <input type="checkbox" id="check3" name="twice" disabled onchange ="disable1()"/>Paid From Advance <i class="fa fa-inr"></i> </label><?php } ?>
			<div class="col-md-2">					
            <input type="text" name="labadvance"id="labadv" required="required" placeholder="00.00"class="form-control col-md-7 col-xs-12"disabled onKeyup="s2()" onkeypress="return isNumberKey(event,this.id)"  >
            </div>                             
            </div></br></br></br>

			<script type="text/javascript"> 
		    function s2() {
            var txtfirstNumberValue = document.getElementById('over').value;
            var txtSecondNumberValue = document.getElementById('labadv').value;
            var result =parseInt(txtfirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('amount').value = +result;
            }}
			function a1() {
            var txtfirstNumberValue = document.getElementById('over').value;
            var txtSecondNumberValue = document.getElementById('labbal').value;
            var result =parseInt(txtfirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('amount').value = +result;
            }}
			</script>
	<script>
	$(document).ready(function () {
    $("#labadv").on('input', function () {
		var txtbalance = $('#advance').val();
		var txtda = $('#labadv').val();
		
		if (txtbalance ==""){
			alert("Didn't Have Adavance amount");
			$('#labadv').val("");
		}
		
        if ( parseInt(txtbalance) < parseInt(txtda) ) {
            alert("Entered amount is Greater than Advance Amount");
			$('#labadv').val("");
        }
    });
});

$(document).ready(function () {
    $("#labbal").on('input', function () {
		var txtbalance = $('#pend').val();
		var txtday = $('#labbal').val();
		
		if (txtbalance ==""){
			alert("Didn't Have Pending amount");
			$('#labbal').val("");
		}
		
        if ( parseInt(txtbalance) < parseInt(txtday) ) {
            alert("Entered amount is Greater than Pending Amount");
			$('#labbal').val("");
        }
    });
});
</script>
<script>
$('#btn1').click(function () {    
        $('#check2').removeAttr('disabled'); 
		 $('#check3').removeAttr('disabled');        
   
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
function disable1()
{ 
if (document.getElementById('check3').checked == 1)
{ 
document.getElementById('labadv').disabled='';
}
else { document.getElementById('labadv').disabled='disabled';}
if (document.getElementById('check2').checked == 1){ 
document.getElementById('labbal').disabled=''; }
else { document.getElementById('labbal').disabled='disabled';}
}
</script>
</body>
</html>