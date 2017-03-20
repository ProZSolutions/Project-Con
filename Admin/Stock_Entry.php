<?php
$title = "Stock entry";
$_csheet = 1;
$_cjava = 1;
$_sheet = 0;
$_script = "D";
session_start();
error_reporting(0);
require'MainConfig.php';
if($_SERVER['REQUEST_METHOD']=='POST'){ 
  $date = $_POST['dat'];
  $dat1 = date("Y-m-d",strtotime(str_replace('/','-',$date)));
  $item = $_POST['item']; 
  $quantity1 = $_POST['quantity'];
  $rate1 = $_POST['rate'];
  $discount1 = $_POST['discount']; 
  $amt = $_POST['amount'];
    $tot= $_POST['total'];
    $nam1 = "dd";
if (isset($_POST['ok'])) {
    $data = $_POST['aaa'];	
	$tmpName  = $_FILES['image1']['tmp_name']; 
    $fp = fopen($tmpName, 'r');
    $adata = fread($fp, filesize($tmpName));
    fclose($fp);
    $adata = addslashes($adata);
if($nam1==$data)
	{
    $sql = "INSERT INTO `stockentry` (`Date`,`Itemname`,`Quantity`,`Rate`,`Amount`,`Discount`,`Bill`,`Total`)
    VALUES('$dat1','$item','$quantity1','$rate1','$amt','$discount1','$adata',$tot)";
    if(mysqli_query($link,$sql))
    {
$success =  "Stock Item Saved Successfully";
    }
    else{ $success =  "Stock Save Unsuccessfully"; }
	}
}
}	
?>
<?php 
require("JSON/stockentry.php");
require("Template/header.php"); ?>
<style>
.editableBox {
    width: 140px;
    height: 30px;
}

.timeTextBox {
    width: 40px;
    margin-left: -78px;
    height: 25px;
    border: none;
}
</style>
<script>
$(document).ready(function(){
   
    $("#editableBox").change(function(){         
        $(".timeTextBox").val($("#editableBox option:selected").html());
    });
});
</script>
<script>
    function E(id) { return document.getElementById(id); }
    function changeit(drp,txf)
    {
        dd = E(drp);
        E(txf).value = dd.options[ dd.selectedIndex ].text;
    }
</script>
<!---------header.php---------------->
</head>
<?php require("Template/body.php"); ?>            
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Stock Details</h3>
              </div>
             </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
				  <h2> Stock Entry</h2>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <br/>
                  
                   <div class="page-title">
                   <?php if(!$success=="") { echo "<script type='text/javascript'>alert('$success');</script>"; } ?>
                       <form action="Stock_Entry" class="form-horizontal form-label-left" data-parsley-validate  method="post" enctype="multipart/form-data">
					  <div class="form-group">
					  <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date<span class="required"></span>
            		  </label>
                      <div class="col-md-3 col-sm-3 col-xs-6 ">
                       <input  id="date" name="dat" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                       </div>
					   </div>
                         <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-8" for="first-name">Item Name <span class="required" style="color:red;">*</span>
                         </label>
                      	<div class="col-md-3 col-sm-6 col-xs-12">						
                        <select id="DropDown" name="item" class="form-control col-md-7 col-xs-12" >
        				<option>Select Item</option>
						<?php $sqlq = "select stockname from stocklist";
                        $res =mysqli_query($link,$sqlq);
                        while ($row = mysqli_fetch_assoc($res))  {                 
                        $id = $row['stockname'];
                        echo '<option>'.$id.'</option>';  }  ?> 
					</select>				
				</div>
				</div>
			   <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-8" for="first-name">Quantity<span class="required" style="color:red;">*</span>
                  </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                       <input type="text" name="quantity" id="id1" required="required" class="form-control col-md-7 col-xs-12" onKeyup="sum()" onkeypress="return isNumberKey(event,this.id)">
                         </div>
					       </div>
					         <div class="item form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-8" for="textarea">Rate <span class="required" style="color:red;">*</span>
                                 </label>
						             <div class="col-md-3 col-sm-6 col-xs-12">
                                       <input type="text" name="rate" id="id2" required="required" class="form-control col-md-7 col-xs-12" onchange="sum()" onkeypress="return isNumberKey(event,this.id)">
                                         </div>
						                   </div>
										     <div class="item form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Amount <span class="required" style="color:red;">*</span>
                                 </label>
						             <div class="col-md-3 col-sm-6 col-xs-12">
                                       <input type="text" name="amount" id="id3" required="required" class="form-control col-md-7 col-xs-8" onkeypress="return isNumberKey(event,this.id)" readonly>
                                         </div>
						                   </div>
                                <div class="item form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-8" for="textarea">Discount 
                                 </label>
                                <div class="col-md-3 col-sm-6 col-xs-8">
                                <input type="text" name="discount" id="id4"  class="form-control col-md-7 col-xs-12" onKeyup="sub()" onkeypress="return isNumberKey(event,this.id)">
                                </div>
                                </div>	
                                <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-8" for="textarea">Grant Total
                                 </label>
                                 <div class="col-md-3 col-sm-6 col-xs-8">
                                  <input type="text" name="total" id="id5"  class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event,this.id)" readonly>
                                  </div>
						          </div>	                                           
								  <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-10" for="first-name"> Bill
                                  </label>
                                 <div class="col-md-5 col-sm-6 col-xs-12">
                                 <input name="image1"  accept="image/jpeg" type="file" class="btn btn-info">
                                 </div>
								 </div>
						               <div class="ln_solid"></div>
                                       <div class="form-group">
                                       <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						               <input type="hidden" name="aaa" value="dd">                         
                                       <input type="submit" name="ok" class="btn btn-success" value="Submit">	
						               <button type="clear" class="btn btn-primary">Cancel</button>
                                    </div>
                                 </div>
                              </form>  
							  </div>
							  </div>
							  </div>
							  </div>
							  </div>
							  </div>
							  </div>
							  </div>			 
        <!-- /page content -->
		<?php require("Template/footer.php"); ?> 
	<!--- Date -->
	<script type="text/javascript">
    function sum() {
            var txtfirstNumberValue = document.getElementById('id1').value;
            var txtSecondNumberValue = document.getElementById('id2').value;
            var result =parseFloat(txtfirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('id3').value = +result;
            }
			}       
                function sub() {
            var txtfirstNumberValue = document.getElementById('id3').value;
            var txtSecondNumberValue = document.getElementById('id4').value;
            var result =parseFloat(txtfirstNumberValue) - parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('id5').value = +result;
            }
			}       
</script>	
<script type="text/javascript">	
window.onload=function(){
displayDate();
}
function displayDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (day) + "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date").value = today;
}
</script>	
<script>
      $(document).ready(function() {
        $('#date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
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
	</body>
	</html>
		
 
