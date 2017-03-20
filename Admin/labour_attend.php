<?php
$title  ="Profile";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
require 'MainConfig.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['ok'])) {
$date1 =	$_POST['date'];
 $dat1 = date("Y-m-d",strtotime(str_replace('/','-',$date1)));

	$name=$_POST['labname'];
	$design=$_POST['labdesign'];
	$id=$_POST['hideid'];
	$wo=$_POST['noofwo'];
	$cowo=$_POST['noofcowo'];
	$otwo=$_POST['otwork'];
	$otcowo=$_POST['otcowork'];
	$rqq = "SELECT masion,assit_masion,ot_masion,ot_assit_masion FROM contact WHERE `No`='$id' AND `trunc`='0' " ; 			
                    $dgq = mysqli_query($link,$rqq);					 
				    while($dq = mysqli_fetch_assoc($dgq)) 
						{
					$lab1=$dq['masion']; 
					$lab2=$dq['assit_masion']; 
					$lab3=$dq['ot_masion']; 
					$lab4=$dq['ot_assit_masion'];  						
						}
						$val1=$wo*$lab1;						
						$val2=$cowo*$lab2;
						$val3=$otwo*$lab3;
						$val4=$otcowo*$lab4;
						$tot=$val1+$val2+$val3+$val4;
						$rq = "SELECT ot_works,ot_coworks,Total_amount FROM labour_attend WHERE `labourid`='$id' AND `del`='0' AND `Date` ='$dat1'" ; 
						$dg = mysqli_query($link,$rq);					 
				        while($d = mysqli_fetch_assoc($dg))
	                         {
						$la1=$d['ot_works'];					
					    $la2=$d['ot_ot_coworks'];  
						$la3=$d['Total_amount'];  
							 }							
					if($la1 == 0 && $la2 == 0 )
				 {
			$gtot=$la3+$tot;								 
			$sql = "UPDATE `labour_attend` SET `ot_works`='$otwo',`ot_coworks`='$otcowo',`Total_amount`='$gtot' where `Name`='$name' and `labourid`='$id'";    
            if (!mysqli_query($link,$sql))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }	
				}
if($otwo == 0 && $otcowo == 0)
	{
 $sql = "INSERT INTO `labour_attend`(`Date`,`Name`,`Designation_1`,`no_of_works`,`no_of_coworks`,`labourid`,`ot_works`,`ot_coworks`,`Total_amount`)
    VALUES('$dat1','$name','$design','$wo','$cowo','$id','$otwo','$otcowo','$tot')";
 if (!mysqli_query($link,$sql))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }	
	}
if($otwo != '' && $otcowo != '' && $wo != '' && $woco != '')
	{
 $sql1 = "INSERT INTO `labour_attend`(`Date`,`Name`,`Designation_1`,`no_of_works`,`no_of_coworks`,`labourid`,`ot_works`,`ot_coworks`,`Total_amount`)
    VALUES('$dat1','$name','$design','$wo','$cowo','$id','$otwo','$otcowo','$tot')";
 if (!mysqli_query($link,$sql1))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }	

}

}
}

?>

<?php require("Template/header.php"); ?>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Attenance</h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Labour Attenance<small>Users</small></h2>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
        <form action="labour_attend" class="form-horizontal form-label-left" data-parsley-validate method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                       <div class="col-md-3 col-sm-3 col-xs-6 ">
                        <input id="date" name="date" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Labour Name <span class="required">*</span>
						</label>
                        <div class="col-md-3 col-sm-9 col-xs-6">
						  <select class="form-control" name="labname" id="lab">
                            <option>Select Name</option>
						<?php
						$s1 = "select `Name` from contact where `Designation`='Labour' AND `trunc`='0'";
						$r1 = mysqli_query($link,$s1);
						while($ro1 = mysqli_fetch_assoc($r1))
						{?>    <option><?php echo $ro1['Name']; ?></option>   <?php } ?>
						   </select>
                        </div>
						<input type="text" name="labdesign" id="des" class="control-label col-md-1" value="<?php echo $no; ?>" readonly style="border:none">
                      </div>                   
                       <input type="text" id="hide" name="hideid" style="display:none" class="common" >                   
                    
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of Workers 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="noofwo"  class="form-control col-md-7 col-xs-12"  onkeypress="return isNumberKey(event)" maxlength="3">
                        </div>						
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of Co-Workers 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="noofcowo" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="3">
                        </div>						
                      </div>

					    <div class="form-group">
					      <label  class="control-label col-md-3 col-sm-3"></label>    				
		                  <input type="checkbox" id="chk" name="name1" value="Employee" onChange="disablefield()"/>Over Time                               
					      </div>


					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of Workers 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="ot1" name="otwork"  class="form-control col-md-7 col-xs-12" disabled  onkeypress="return isNumberKey(event)" maxlength="3">
                        </div>						 
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No of Co-Workers 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                         <input type="text" id="ot2" name="otcowork"  class="form-control col-md-7 col-xs-12" disabled  onkeypress="return isNumberKey(event)" maxlength="3">
                        </div> 	  
					    </div>	
						<div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						 <button type="submit" name="ok" class="btn btn-success">Submit</button>
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
              </div>
            </div>       

        <!-- /page content -->

        <!-- footer content -->
        <?php require("Template/footer.php"); ?>
 <script type="application/javascript">
 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>
<script type="text/javascript">
$(document).ready(function()
{
$("#lab").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "ajaxlabourname.php",
data: dataString,
cache: false,
success: function(html)
{
$("#des").val(html);
} 
});
});
});
</script> 
<script type="text/javascript">
$(document).ready(function()
{
$("#lab").change(function()
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
$("#hide").val(html);
} 
});
});
});
</script>
	<script type="text/javascript"> 
  $(function () {
        $("#chk").click(function () {
            if ($(this).is(":checked")) {
                $("#ot2").removeAttr("disabled");
				 $("#ot1").removeAttr("disabled");
                $("#ot2").focus();
				 $("#ot1").focus();
            } else {
                $("#ot2").attr("disabled", "disabled");
				$("#ot1").attr("disabled", "disabled");
				 $("#ot2").val('0');
				  $("#ot1").val('0');
            }
        });
    });
</script>
    <!-- bootstrap-daterangepicker -->
 <script>
      $(document).ready(function() {
        $('#date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
			  maxDate: new Date
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>
    <!-- /bootstrap-daterangepicker -->
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

  </body>
</html>