<?php
$title  ="Manage account";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0); 
require 'MainConfig.php';
$result = $link->query("select vno from vehicle");

?>
<?php require("Template/header.php"); ?>

<script type="text/javascript">
$(document).ready(function()
{
$("#vchn").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxvehiclepay.php",
data: dataString,
cache: false,
success: function(html)
{
$("#payment").html(html);
} 
});
});
});
</script>
<script type="text/javascript"> 
function disablefield1()
{ 
if (document.getElementById('ext1').checked == 1)
{
document.getElementById('labcre').disabled='';
document.getElementById('labdep').disabled='disabled';
document.getElementById('labdep').value='0';
}
else if (document.getElementById('dxt1').checked == 1)
{ 
document.getElementById('labcre').value='0';
document.getElementById('labcre').disabled='disabled';
document.getElementById('labdep').disabled='';
}
} 
</script>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Accounts</h3>
              </div>
              
			  </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vehicle Payment<small></small></h2>
                    <div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <br>
                    <form action="vehicle_payment_print" class="form-horizontal form-label-left" data-parsley-validate method="post">                  
					<div class="form-group">				 
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6 ">
                          <input id="date" name="pick" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                        </div>                 
                        </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vehicle No <span class="required"style="color: red;">*</span></label>
                        </label>
						<div class ="col-md-4 col-sm-4 col-xs-10" >
						<select class="form-control" name="vno" id="vchn">
						<option>Select Vehicle No</option>
					  <?php while ($row = $result->fetch_assoc()){$id = $row['vno'];echo '<option>'.$id.'</option>';}?>        </select>	
                      </div>
					  </div>
					   <input type="text" id="hide1" name="name" style="display:none" >
					   <input type="text" id="hide2" name="vehicleid" style="display:none" >
					   <div id="payment"></div>
								
                        <div class="form-group">
					   <label  class="control-label col-md-4 col-sm-3 col-xs-6"> <input type="radio" id="ext1" value="Advance" name="nam1" OnChange="disablefield1()"/>Advance <i class="fa fa-inr"></i>  </label> 
						 <div class="col-md-2">						 
                          <input type="text" name="labcredit" id="labcre" required="required" value="" placeholder="00.00"class="common form-control col-md-7 col-xs-12"disabled onkeypress="return isNumberKey(event,this.id)" />       
						  </div>
						  <label  class="control-label col-md-1 col-sm-3 col-xs-6"> <input type="radio" id="dxt1" value="Pending" name="nam1" OnChange="disablefield1()"/>Debit <i class="fa fa-inr"></i> </label>
						   <div class="col-md-2">					
                          <input type="text" name="labdebit" id="labdep" required="required"value="" placeholder="00.00"class="form-control col-md-7 col-xs-12"disabled onKeyup="sub4()" onkeypress="return isNumberKey(event,this.id)" />
                        </div>                             
                       </div>	
                    <input type="text" id="hide" name="hid" style="display:none" />					

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount<span class="required"style="color: red;">*</span><i class="fa fa-inr"></i>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="amt1" id="amut" required="required" class="form-control col-md-7 col-xs-12" placeholder="0.000" onkeypress="return isNumberKey(event,this.id)">
                        </div> 
					   </div>

 					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Remarks
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-10">
                          <input type="text" name="remark" id="first-name2"  class="form-control col-md-7 col-xs-12" >
                        </div>
					   </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                          
                          <input type="hidden" name="aaa" value="firstone">
						   <input type="submit" name="ok"class="btn btn-success"value="Submit">	
                          <button type="clear" class="btn btn-primary">Cancel</button>    
                        </div>
                      </div>
                    </form>
					</div>
</div></div></div>
                        </form>
						  </div>
						  </div>
						  </div>
						  </div>
                  </div>
                </div>
              </div>
          
		   <!-- /page content -->

        <!-- footer content -->
         <?php require("Template/footer.php"); ?>
	<!--- time and date--->	
<script>
$('.common').change(function() {
    var sum = 0;
    $('.common').each(function(index) {
        if($(this).val()) {
        sum += parseFloat($(this).val());
        }
    });
    $('#amut').val(sum);
});
</script>
<script type="text/javascript">
			function sub4() {
            var txtfirstNumberValue = document.getElementById('hide').value;
            var txtSecondNumberValue = document.getElementById('labdep').value;
            var result = parseFloat(txtfirstNumberValue) - parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('amut').value = +result;
            }
			}
</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#vchn").change(function()
			{	var id=$(this).val();
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: "ajaxvehicleown.php",
					data: dataString,
					cache: false,
					success: function(value){
					var data = value.split(",");                    
				     $("#hide1").val(data[0]);
                     $("#hide2").val(data[1]);
					} 
				});
			});
		});
</script>	
	<script type="text/javascript">	
	window.onload=function(){
	displayDate();}
	function displayDate() {
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = (day)+ "/" + (month) + "/"  + now.getFullYear();
	    document.getElementById("date").value = today;
		}
	</script>
<!-----Date picker------->
	<script>
      $(document).ready(function() {
        $('#date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2",
			  maxDate: new Date
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>
<!-----Ajax------->
	  
		<script type="text/javascript">
		$(document).ready(function(){
			$("#mat").change(function()
			{	var id=$(this).val();
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: "ajaxqunty.php",
					data: dataString,
					cache: false,
					success: function(html){$(".res").html(html);} 
				});
			});
		});
</script>
<script type="application/javascript">
function isNumberKey(evt,id){	
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