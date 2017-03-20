<?php
$title  ="Payment";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
require 'MainConfig.php';
$result1 = $link->QUERY("select * from contact where Designation = 'dealer'");
$result = $link->query("SELECT * FROM `contact`");
/* while ($row = $result->fetch_assoc()) 
{
 $name = $row['Name'];	
}*/
?>	
 <!---------header.php---------------->
<?php
require("JSON/payment.php");
require("Template/header.php"); ?>
<script type="text/javascript">
$(document).ready(function()
{
$("#labname").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxdesigntype.php",
data: dataString,
cache: false,
success: function(html)
{
$("#abc").val(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$(".flat1").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxphp.php",
data: dataString,
cache: false,
success: function(html)
{
$(".reserve").html(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$("#labname").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxlabourid.php",
data: dataString,
cache: false,
success: function(html)
{
$("#abcd").val(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$("#labname").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "ajaxemppayment.php",
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

<script>
    function E(id) { return document.getElementById(id); }
    function changeit(drp,txf)
    {
    dd = E(drp);
    E(txf).value = dd.options[ dd.selectedIndex ].text;
    }
</script>
   
<script>
$(document).ready(function()
{
$("#roam").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "user.php",
data: dataString,
cache: false,
success: function(html)
{
$('#p').html(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$("#roam").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxdealerid.php",
data: dataString,
cache: false,
success: function(html)
{
$(".re").val(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$("#roam").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxdealername.php",
data: dataString,
cache: false,
success: function(html)
{
$(".re1").val(html);
} 
});

});
});
</script>

<script type="text/javascript"> 
function disablefield()
{ 
if (document.getElementById('ext').checked == 1)
{ 
document.getElementById('cre').disabled='';
document.getElementById('dep').disabled='disabled';
document.getElementById('dep').value='0';
}
else if (document.getElementById('dxt').checked == 1)
{ 
document.getElementById('cre').value='0';
document.getElementById('cre').disabled='disabled';
document.getElementById('dep').disabled='';
}
} 
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

</head>
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
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                       <h2>Payment <small></small></h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                 
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Labour</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Dealer</a>
                        </li>						
                      </ul>
                      <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="EmployeePayment-tab">	
                    <form action="payment_print" class="form-horizontal form-label-left" data-parsley-validate method="post">                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6 ">
                        <input id="date" name="date" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                        </div>
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Time :</label>										
						<input class="control-label col-md-1 col-sm-3 col-xs-6" type="text" id="clockbox1" name="go1" style="border:none" readonly>				
						</div>	
						
					  <div class="form-group">                      
					 <label class="control-label col-md-3 col-sm-3 col-xs-12">Labour Name <span class="required" style="color: red;">*</span>
						</label>
                        <div class="col-md-3 col-sm-9 col-xs-6">
						  <select class="form-control" name="labname1" id="labname">
                            <option>Select Name</option><?php
						$s1 = "select `Name` from contact where `Designation`='Labour' AND `trunc`='0'";
						$r1 = mysqli_query($link,$s1);
						while($ro1 = mysqli_fetch_assoc($r1)){		?>                        
                            <option><?php echo $ro1['Name']; ?></option><?php } ?> </select>
                        </div><input type="text" id="abc" name="txt1" style="display:none"><input type="text" id="abcd" name="txt21" style="display:none">
                      </div><div id="payment"></div>

                     <div class="form-group">
					   <label  class="control-label col-md-4 col-sm-3 col-xs-6"> <input type="radio" id="ext1" value="Advance" name="nam1" OnChange="disablefield1()"/>Advance <i class="fa fa-inr"></i>  </label> 
						 <div class="col-md-2">						 
                          <input type="text" name="labcredit" id="labcre" required="required" value="" placeholder="00.00" class="comm form-control col-md-7 col-xs-12" disabled onkeypress="return isNumberKe(event,this.id)" />       
						  </div>
						  <label  class="control-label col-md-1 col-sm-3 col-xs-6"> <input type="radio" id="dxt1" value="Pending" name="nam1" OnChange="disablefield1()"/>Debit <i class="fa fa-inr"></i> </label>
						   <div class="col-md-2">					
                          <input type="text" name="labdebit" id="labdep" required="required" value="" placeholder="00.00" class="form-control col-md-7 col-xs-12"disabled onKeyup="sub4()" onkeypress="return isNumberKe(event,this.id)" />
                        </div>                             
                       </div>	
					   <input type="text" id="over" name="hid" style="display:none" class="comm" >
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount<span class="required"style="color: red;">*</span><i class="fa fa-inr"></i>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="amt1" id="amount" required="required" class="form-control col-md-7 col-xs-12"placeholder="0.000" onkeypress="return isNumberKe(event,this.id)" />
                        </div> 
					   </div>
					    
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Remarks 
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text"name="remark1" id="first-name" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>
					    
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="aaa" value="firstone">
						   <input type="submit" name="ok"class="btn btn-success"value="Submit">	
                          <button type="reset" class="btn btn-primary">Cancel</button>                        
                         </div>
                      </div>
                     </form>                   
                  </div>
				
                   <!----dealer payment----------------> 
                 <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="search-tab">
                 <div class="col-md-12 col-sm-12 col-xs-12">               
                     <form action="Dealer_pay_print" class="form-horizontal form-label-left" data-parsley-validate method="post"> 					  
					<div class="form-group">				 
                    <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date<span class="required"></span> </label>
                    <div class="col-md-3 col-sm-3 col-xs-6 ">
                    <input id="date1" name="date" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                    </div>                 
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Time :</label>									
					<input class="control-label col-md-1 col-sm-3 col-xs-6" type="text" id="clockbox"name="time"style="border:none"readonly> 
                    </div>                     				 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Delar <span class="required"style="color: red;">*</span></label>
                      <input type="text" class="re" id="text1" name="one" style="display:none"><input type="text" class="re1" id="text2" name="two" style="display:none">
					  
					  <div class="col-md-4 col-sm-6 col-xs-10">
                         <!-- onchange="showUser(this.value)"-->
							<select class="form-control va" name="abc" id="roam">
                            <option>Select Delar</option>							           
                            <?php														
                            while ($row1 = $result1->fetch_assoc()) 
							{                 
                            $name= $row1['Name'];   				            
							echo '<option>'.$name.'</option>';     }         ?>                        
                          </select>
                        </div>
                      </div>		  
 
                     <div class="clearfix"></div>
					    <div class="x_content">					 
                   <div><p id="p"></p></div>
				   <div class="form-group">                       
					   <div class="form-group">
					   <label  class="control-label col-md-4 col-sm-3 col-xs-6"> <input type="radio" id="ext" value="Advance" name="nam" OnChange="disablefield()"/>Advance <i class="fa fa-inr"></i>  </label> 
						 <div class="col-md-2">						 
                          <input type="text" name="credit" id="cre" required="required" value="" placeholder="00.00" class="common form-control col-md-7 col-xs-12" disabled onkeypress="return isNumberKey(event,this.id)"/>       
						  </div>
						  <label  class="control-label col-md-1 col-sm-3 col-xs-6"> <input type="radio" id="dxt" value="Pending" name="nam" OnChange="disablefield()"/>Debit <i class="fa fa-inr"></i> </label>
						   <div class="col-md-2">					
                          <input type="text" name="debit" id="dep" required="required" value="" placeholder="00.00" class="form-control col-md-7 col-xs-12" disabled onKeyup="sub3()" onkeypress="return isNumberKey(event,this.id)" />
                        </div>                             
                       </div>	
					   <input type="text" id="hide" name="hid" style="display:none" class="common" >
					
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount <i class="fa fa-inr"></i> <span class="required" style="color: red;">*</span>
                        </label> 
                        <div class="col-md-4 col-sm-6 col-xs-10">
                          <input type="text" name="amount" id="amut" required="required" placeholder="00.00" class="amtu form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event,this.id)"  />
                        </div>
					   </div>


					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Remarks 
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="re" id="firstnam" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div> 
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="second" value="secondone">
						  <input type="submit" name="ok1" class="btn btn-success" value="Submit">	
                          <button type="reset" class="btn btn-primary">Cancel</button>                          		 
                    </div>
                   </div>          
				  </form> 
				 </div>
				</div> 
			   </div>
			  </div>
			 </div>
			</div> 
           </div>     <div class="clearfix"></div>
          </div>		
		 </div>
		</div>
		</div>		
		 </div>
		</div>
        <!-- /page content -->

        <!-- footer content -->
		<?php require("Template/footer.php"); ?> 
<script type="application/javascript">
function isNumberKey(evt,id)
{
	try{
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
	}catch(w){
		alert(w);
	}
}
</script> 
<script type="application/javascript">
function isNumberKe(evt,id)
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
<script>
$('.comm').change(function() {
    var sum = 0;
    $('.comm').each(function(index) {
        if($(this).val()) {
        sum += parseFloat($(this).val());
        }
    });
    $('#amount').val(sum);
});
</script>

<script type="text/javascript">
			function sub4() {
            var txtfirstNumberValue = document.getElementById('over').value;
            var txtSecondNumberValue = document.getElementById('labdep').value;
            var result = parseFloat(txtfirstNumberValue) - parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('amount').value = +result;
            }
			}
</script>

<script type="text/javascript">
			function sub3() {
            var txtfirstNumberValue = document.getElementById('hide').value;
            var txtSecondNumberValue = document.getElementById('dep').value;
            var result = parseFloat(txtfirstNumberValue) - parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('amut').value = +result;
            }
			}
</script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "print",
                  className: "btn-sm"
                },
                
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
	
	<!--- Date -->
	
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
	  <script>
      $(document).ready(function() {
        $('#date1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2",
			  maxDate: new Date
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>  	


	<script type="text/javascript">
	function GetClock(){
	var d=new Date();
	var nhour=d.getHours(),nmin=d.getMinutes(),ap;
	if(nhour==0){ap=" AM";nhour=12;}
	else if(nhour<12){ap=" AM";}
	else if(nhour==12){ap=" PM";}
	else if(nhour>12){ap=" PM";nhour-=12;}

	if(nmin<=9) nmin="0"+nmin;
	document.getElementById('clockbox').value=""+nhour+":"+nmin+ap+"";
	document.getElementById('clockbox1').value=""+nhour+":"+nmin+ap+"";}
window.onload=function(){
GetClock();
setInterval(GetClock,1000);
displayDate();
displayDate1();
}
function displayDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (day) + "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date").value = today;
}
function displayDate1() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (day) + "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date1").value = today;
}
</script>
    <!---/Date--->
  </body>
</html>