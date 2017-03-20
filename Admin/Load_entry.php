<?php
$title  ="Load Entry";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
session_start();
error_reporting(0);
require 'MainConfig.php';
//********************delear selction and material selection***********************************//
    $result = $link->query("select material_name,quantitytype from material");
    $result1 = $link->QUERY("select * from contact where Designation='dealer'");
//*****************Self server WOrking*******************************************************//
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
			$msg='';
			$databasetable = "material_in";
			set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
			include 'PHPExcel/IOFactory.php';			
			// This is the file path to be uploaded.
			$inputFileName = $_FILES["file"]["tmp_name"];
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			$highestColumm = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();			
			$arrayCount = count($allDataInSheet); 			// Here get total count of row in that Excel sheet	
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumm); //no of column			
			if($highestColumnIndex == '8')	{
			for($i=2;$i<=$arrayCount;$i++){
			$date = trim($allDataInSheet[$i]["A"]);
			$mat = trim($allDataInSheet[$i]["F"]);
			$trip = trim($allDataInSheet[$i]["B"]);
			$lorry = trim($allDataInSheet[$i]["C"]);
			$rec = trim($allDataInSheet[$i]["D"]);
			$rem = trim($allDataInSheet[$i]["E"]);
			$frm = trim($allDataInSheet[$i]["G"]);
			$to = trim($allDataInSheet[$i]["H"]);
			if($date =="")
				{$msg="Invalid Column value";
				}
				else if($trip =="")
					{$msg="Invalid Column value";
				}
				else if($lorry=="")
						{$msg="Invalid Column value";
				}
					else if($rec=="")
							{$msg="Invalid Column value";
				}
							else if($rem=="")
								{$msg="Invalid Column value";
				}
								else if($mat=="")
									{$msg="Invalid Column value";
				}
								else if($frm=="")
										{$msg="Invalid Column value";
				}
									else if($to!="")
											{
											$sq="insert into material_in_temp(`id`,`date`,`Material_name`,`dealer`,`Lorry_no`,`Received_qty`,`From`,`To`)values('".$trip."','".$date."','".$mat."','".$rem."','".$lorry."','".$rec."','".$frm."','".$to."')";
					                        mysqli_query($link,$sq);  
										}
										else{
											$msg="Invalid Column value";
										}                     
					  }			       
			}
	
	else{$msg="Invalid Update format";	}

$sql1="select e.No, e.Name, v.dealer from contact e RIGHT OUTER JOIN material_in_temp v ON v.dealer = e.Name ";
	 $q=mysqli_query($link,$sql1);
	 while($r=mysqli_fetch_array($q))
	 {
		$ra= $r["No"];
		$ra1=$r["Name"];
		
		$ra2=$r["dealer"];	
		
	$link1 = "<script>  var winURL = 'preview_excel.php';
    var winName = 'win1';
    var winSize = 'width=660,height=620,scrollbars=yes';
    var ref = window.open(winURL, winName, winSize); </script>";

   $sq="UPDATE `material_in_temp` SET `dealerid`='$ra' WHERE `dealer` = '$ra1'";
   mysqli_query($link,$sq);
	  
	 }  		
}
?>    
<!---------header.php---------------->
<?php
require("JSON/totalload.php");
require("Template/header.php"); ?>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Material Details</h3>
              </div>
			 </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Load Entry<small>Entry</small></h2>                  
                    <div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <br>
                     <span class="required" style="color: red;"><?php echo "$msg";?></span>
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">MaterialEntry</a></li>
					<li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Upload</a>
                    </li>
					</ul>
                   <div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="EmployeePayment-tab">	 
				     <form action="material_plain" class="form-horizontal form-label-left" data-parsley-validate method="post">          
									
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date</label>
                        <div class="col-md-3 col-sm-3 col-xs-6 ">
                        <input id="date" name="date" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >					
                        </div>
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Time :</label>										
						<input class="control-label col-md-1 col-sm-3 col-xs-6" type="text" id="clockbox" name="go" style="border:none" readonly>				
						</div>

					 <div class="form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12">Material Name <span class="required" style="color: red;">*</span></label>
					 <div class ="col-md-3 col-sm-6 col-xs-10" >
					 <select class="form-control" name="material" id="mat">
					 <option>SelectMaterial</option>
					 <?php while ($row = $result->fetch_assoc()){$id = $row['material_name'];echo '<option>'.$id.'</option>';}?>   </select>
					 </div>
					 </div>

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Delar <span class="required" style="color: red;">*</span></label>
					<div class="col-md-3 col-sm-6 col-xs-10">
					<select class="form-control" id="del" name="dealer">
					<option>Select Delar</option>
					<?php while ($row1 = $result1->fetch_assoc()){$name= $row1['Name'];echo '<option>'.$name.'</option>';}?>	</select>
					</div>
					</div>

				    <div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Lorry No <span class="required" style="color: red;">*</span></label>
					<div class="col-md-3 col-sm-6 col-xs-10">
					<input type="text" name="lorry" id="first-name" required="required" style="text-transform:uppercase" class="form-control col-md-7 col-xs-12" maxlength="10">
					</div>
					<input type="text" id="abc" name="txt" class='abc' style="display: none;">
					</div>

			         <div class="form-group">						
					 <label  class="control-label col-md-3 col-sm-3 col-xs-6"> Received Quantity <span class="required" style="color: red;">*</span></label>	 <div class="col-md-2">
				     <input type="text" name="received" id="rec" required="required" placeholder="00" class="form-control col-md-7 col-xs-12" onKeyup="sum();" onkeypress="return isNumberKey(event,this.id)" /> 
					 </div>
					<label class="res"></label>
				    <label  class="control-label col-md-1 col-sm-3 col-xs-6">Rate <span class="required" style="color: red;">*</span><i class="fa fa-inr"></i></label>
					<div class="col-md-2">					
                    <input type="text" name="rate" id="rate" required="required" placeholder="00.00" class="form-control col-md-7 col-xs-12" onKeyup="sum();" onkeypress="return isNumberKey(event,this.id)" />
                    </div>						 
                    </div>	

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Amount<span class="required" style="color: red;">*</span> <i class="fa fa-inr"></i>
					</label>
					<div class="col-md-3 col-sm-6 col-xs-10">
					<input type="text" name="pri" id="price"  placeholder="00" required="required" readonly class="form-control col-md-7 col-xs-12">
					</div>
					</div>

 					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">From <span class="required" style="color: red;">*</span></label>
					<div class="col-md-3 col-sm-6 col-xs-10">
					<input type="text" name="frm" id="val3" required="required" class="form-control col-md-7 col-xs-12">
					</div>
					</div>

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">To <span class="required" style="color: red;">*</span>
					</label>
					<div class="col-md-3 col-sm-6 col-xs-10">
				    <input type="text" name="to" id="first-name3" required="required" class="form-control col-md-7 col-xs-12">
					</div>
					</div>		<div class="ln_solid">
									</div>
									<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                    
									<input type="hidden" name="aaa" value="firstone">
									<input type="submit" name="ok" class="btn btn-success" value="Submit">	
									<button type="reset" class="btn btn-primary">Cancel</button>    
									</div>
									</div>
								</form>
								</div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="search-tab">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="<?= $_SERVER['PHP_SELF']?>" class="form-horizontal form-label-left" data-parsley-validate    method="post" enctype="multipart/form-data">
                        <?php echo $link1;?>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select file <span class="required" style="color: red;">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">	                        
                        <input type="file" name="file" id="file" class="btn btn-warning">                         
                        </div>
                      </div>					 
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                          
                          <input type="hidden" name="second" value="secondone">
						  <input type="submit" name="sub" class="btn btn-success" value="Upload">	
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

<script type="text/javascript">
	function GetClock(){
	var d=new Date();
	var nhour=d.getHours(),nmin=d.getMinutes(),ap;
	if(nhour==0){ap=" AM";nhour=12;}
	else if(nhour<12){ap=" AM";}
	else if(nhour==12){ap=" PM";}
	else if(nhour>12){ap=" PM";nhour-=12;}

	if(nmin<=9) nmin="0"+nmin;
	document.getElementById('clockbox').value=""+nhour+":"+nmin+ap+"";}
	window.onload=function(){
	GetClock();
	displayDate();
	setInterval(GetClock,1000);
	}

function displayDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today =  (day)+ "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date").value = today;
	}
		
	</script>
<!-----Date picker-->

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
<script type="text/javascript">
		$(document).ready(function(){
			$("#del").change(function(){
				var id=$(this).val();
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: "ajaxdealerid.php",
					data: dataString,
					cache: false,
					success: function(html){$(".abc").val(html);} 
					});
			});
		});
</script>
<script type="text/javascript">
function sum() {
            var txtfirstNumberValue = document.getElementById('rec').value;
            var txtSecondNumberValue = document.getElementById('rate').value;
            var result = parseFloat(txtfirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
            document.getElementById('price').value = +result;
			}
			}       
		</script>
  </body>
</html>