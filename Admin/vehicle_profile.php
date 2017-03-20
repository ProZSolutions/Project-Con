<?php
session_start();
$title  = "vehicle Profile";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
require 'MainConfig.php';
$data=$_SESSION["favvehicle"];
$nam2="second";
if(isset($_POST['send'])) {
    $data2 = $_POST['hide'];
	echo $data2;
	$id1=$_POST['id11'];
	
	$id2=$_POST['id12'];

	$id3=$_POST['id13'];

	
	
	$id6=$_POST['send'];

	if($nam2==$data2)
	{
  
	if($id6=='update')
	{
	$sql = "UPDATE `vehicle` SET `vwege`='$id2',`hour_cost`='$id3' WHERE `nos` ='$id1'";
    mysqli_query($link,$sql); 
	}
	}
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$id22=$_POST['date'];
$dat = date("Y-m-d",strtotime(str_replace('/','-',$id22)));

$id23=$_POST['date1'];
$dat2 = date("Y-m-d",strtotime(str_replace('/','-',$id23)));

$id=$_POST['to'];
}
?>
    <!---------header.php---------------->
<?php require("Template/header.php"); ?>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Vehicle Profile</h3>
              </div>              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                      <div class="profile_img">

                        <!-- end of image cropping -->
               <div id="crop-avatar">
						<?php 					
                $na= "select * from vehicle where `nos` ='$data' and `del`='0' " ;
				$dd= mysqli_query($link,$na);
			
				while($s=mysqli_fetch_array($dd))
				{ 
					 $dna= $s['vown']; 
					$vno= $s['vno'];
				
            
						?>
                          <!-- Current avatar -->
						 
						  <img src="images/user.png" alt="..." class="img-circle img-responsive">	  
                          

                          <!-- Cropping modal -->
                          <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                               
                                  <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                                    <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="avatar-body">

                                      <!-- Upload image and data -->
                                      <div class="avatar-upload">
                                        <input class="avatar-src" name="avatar_src" type="hidden">
                                        <input class="avatar-data" name="avatar_data" type="hidden">
                                        <label for="avatarInput">Local upload</label>
                                        <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                      </div>

                                      <!-- Crop and preview -->
                                      <div class="row">
                                        <div class="col-md-9">
                                          <div class="avatar-wrapper"></div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="avatar-preview preview-lg"></div>
                                          <div class="avatar-preview preview-md"></div>
                                          <div class="avatar-preview preview-sm"></div>
                                        </div>
                                      </div>

                                      <div class="row avatar-btns">
                                        <div class="col-md-9">
                                          <div class="btn-group">
                                            <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                          </div>
                                          <div class="btn-group">
                                            <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                  </div> -->
                                <!--</form>-->
                              </div>
                            </div>
                          </div>
                          <!-- /.modal -->

                          <!-- Loading state -->
                          <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->

                      </div>                      
                     </div> 
 
                   <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        
                        <div class="col-md-6">                        
                 
                         <h3><?php echo $dna; ?>
						 </h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-truck" user-profile-icon"></i> <?php echo $vno;?>
                        </li>

                        <li>
                          <i class="fa fa-mobile user-profile-icon"></i> <?php echo $s['mobile'];?>,<?php echo $s['amobile'];?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i><?php echo $s['address'];?>
                        </li>
                      </ul>                      
                      <br />
					  <?php } ?>                        
                      </div>
					  </div>                      
                      </div>                     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <br/>
                  <!--<form class="form-horizontal form-label-left" data-parsley-validate>-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">TOTAL DETAILS</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">ATTENDANCE</a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content3" role="tab" id="search-tab1" data-toggle="tab" aria-expanded="false">PAYMENT</a>
                        </li>										
                      </ul>
                    <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="total details-tab">
					<div class="form-group">					
                         <div class="col-md-5">    
						<table class="table table-striped table-bordered ">
						<thead>						
						<tr>
						<th>Driver Wege</th>
						<th>Hour Cost</th>						
						<?php if($role=='admin' || $role=='manager') { ?>
			              <th>Action</th>	
						   <?php } ?>     
						</tr>
						</thead>						
					<?php					
					$rqq = "SELECT vwege,hour_cost FROM vehicle WHERE `nos`='$data' AND `del`='0' " ; 			
                    $dgq = mysqli_query($link,$rqq);					 
				    while($dq = mysqli_fetch_assoc($dgq)) 
						{							
							?>
					<tbody>
					<tr>
						<td><?php echo $dq['vwege']; ?></td>
						<td><?php echo $dq['hour_cost']; } ?></td>
					    <?php if($role=='admin' || $role=='manager') { ?>
						<td><button type="submit" id="Btn" class="p btn btn-info btn-xs" name="first" value="<?php echo $data ; ?>">edit</button></td>
						 <?php } ?>
						</tr>
						</tbody>
						</table>
						</div>
 <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF">Edit Wege<h>
     <button type="button" class="close" style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>  
	<div class="modal-footer"></div>
  </div>
</div>
</div>
		
<!--
						<?php
						//$rq= "SELECT  COUNT(m.id) FROM   material_in m LEFT JOIN  contact h ON m.dealer = h.Name " ; 
					$rq= "SELECT  COUNT(id) FROM   material_in where dealerid='$data' and `delete`='0'" ; 			
                    $dg=mysqli_query($link,$rq);
				    while($d= mysqli_fetch_assoc($dg)) 
						{
					$g= $d['COUNT(id)'];
	                     }
						 ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Total Hour: <?php echo $g; ?>   </label>   
                 <?php
				    $rq = "select sum(Amount) from payment where `empid`='$data' and `del`='0'";
                    $dg = mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['sum(Amount)'];
                ?> 
					<label class="control-label col-md-3 col-sm-3 col-xs-6">Total Driver Wege  : <?php echo $s ?></label>
                     <?php  }
					 ?>

                <?php
				$rq= "select count(*) from material_in where  dealerid ='$data' and paid ='1' and `delete`='0'";
                    $dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['count(*)'];
                   ?> 
					 <label class="control-label col-md-3 col-sm-3 col-xs-6">Total Paids :  <?php echo $s ?></label>
					  
					  <?php }
					  ?>
					  </div>
					  <div class="form-group">
					  <?php
				   $rq= "select sum(Received_qty) from material_in where dealerid ='$data' and `delete`='0'";
                    $dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['sum(Received_qty)'];
                     ?> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Total quantity  :  <?php echo $s ?></label>
						<?php  }
					?>
					<?php
				$rq= "select count(*) from material_in where  dealerid ='$data' and paid='0' and `delete`='0'";
                    $dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['count(*)'];
                    ?> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">No of bending    <?php echo $s ?></label>
                        
						<?php }
						?>
							<?php
						//$rq= "SELECT  COUNT(m.id) FROM   material_in m LEFT JOIN  contact h ON m.dealer = h.Name " ; 
					$rq1= "SELECT  sum(Amount) FROM   dealerpayment where `empid` ='$data' and `del`='0' and `Payment_type`= 'Advance'" ; 			
                    $dg1=mysqli_query($link,$rq1);
				    while($d1= mysqli_fetch_assoc($dg1)) 
						{
					$g1= $d1['sum(Amount)'];
	                     }
					    ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Total Advance: <?php echo $g1; ?>   </label>  
                 <?php
				$rq2= "SELECT  sum(Amount) FROM   dealerpayment where `empid` ='$data' and `del`='0' and `Payment_type`= 'Pending'";
                    $dg2=mysqli_query($link,$rq2);
					while($d2=mysqli_fetch_assoc($dg2))
					{
					$s2=$d2['sum(Amount)'];
                ?> 
					<label class="control-label col-md-3 col-sm-3 col-xs-6">Total Pending Payment  : <?php echo $s2 ?></label>
                     <?php  }	 ?>
						<div class="clearfix"></div-->
						</div>     
						</div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">                
                    
                   
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="x_content">
				  <div id="divToPrint">          
					 <div class="table-responsive">
					 <table id="datatable-buttons" class="table table-striped table-bordered ">					
                      <thead>
                        <tr class="headings">
                           <th style="text-align:center;">No</th>
						   <th style="text-align:center;">Date</th>
						   <th style="text-align:center;">Owner Name</th>	
						   <th style="text-align:center;">Hour</th>	 
						   <th style="text-align:center;">Driver Wege</th>
						    <th style="text-align:center;">Amount</th>
							<th style="text-align:center;">Total Amount</th>
							<th style="text-align:center;">Status</th>
						   
						                                                    
                          </tr>
                      </thead>
                      <tbody>
					  				<?php
$sql = "SELECT * FROM `vehicle_entry` WHERE `vehicle_id`='$data'";
$result = mysqli_query($link,$sql);
$j=1;
  while ($row1 = $result->fetch_assoc())
	  {
	$st = $row1['paid'];
	$v = $row1['Date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); ?>				
                  <tr>
				         <td><?php echo $j; ?></td> 
                         <td><?php echo $d; ?></td>
                         <td><?php echo $row1['owner']; ?></td>	
						 <td><?php echo $row1['hour']; ?></td>	
						 <td><?php echo $row1['driver_wege']; ?></td>	
						 <td><?php echo $row1['Amount']; ?></td>	
						 <td><?php echo $row1['Totalamount']; ?></td>				
                          <?php if($st==0) { ?>
	<td><label disabled><font color='#ff0000'>unpaid</font></label></td>
	 <?php }else { ?>
	<td><label disabled><font color='#00FF00'>paid</font></label></td> <?php } ?>                     
                        </tr> 
						<?php	$j++; }  ?>
                       </tbody>
                    </table>
                     </div>
					
					</div>
					</div>
                          </div>
						 </div>
                         <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="search-tab1">
                          <div class="col-md-12 col-sm-12 col-xs-12">						
						<div class="form-group">                      
                      </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="x_content">
				  <div id="divToPrint">
				   <div class="table-responsive">
                     <table id="datatable-buttons1" class="table table-striped table-bordered ">
					 <thead>
                        <tr> 
						  <th style="text-align:center;">No</th>
						  <th style="text-align:center;">Date</th>
						  <th style="text-align:center;">Vehicle No</th>                         
                          <th style="text-align:center;">Payment</th>
						  <th style="text-align:center;">Totalamount</th>  
                          <th style="text-align:center;">Remarks</th>                                        
                        </tr>
                      </thead>

<?php
$sql1 = "SELECT * FROM `vehicle_payment` WHERE `vehicle_id` = '$data' and `del`='0' ";
$query1 = mysqli_query($link,$sql1);
$i=1;
while($rs = mysqli_fetch_object($query1)){ 
$v = $rs->Date;
$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?>
          <tr>
             <td style="text-align:center;"><?php echo $i; ?> </td>	
            <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>			 
			 	 <td style="text-align:center;"><?php echo stripslashes($rs->vehicle_no); ?> </td>
				  <td style="text-align:center;"><?php echo stripslashes($rs->payment_mode); ?> </td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs->Totalamount); ?> </td>
					 	 <td style="text-align:center;"><?php echo stripslashes($rs->remark); ?> </td>
						       

			 </tr><?php $i++; } ?>
				</tbody>            
                    </table>
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

 <!-- Datatables -->
 <script type="text/javascript">

$(document).ready(function()
{
$("button").click(function()
{

var id=$(this).val();
var dataString = {id: id};

$.ajax
({
type: "POST",
url: "ajaxvehiclewege.php",
data: dataString,

cache: false,
success: function(html)
{
$("#log").html(html);
} 
});

});
});
</script>
<script>

var modal = document.getElementById('myModal');
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

$(".p").click(function(){
   modal.style.display = "block";
 
});
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

 


 <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtip",
              buttons: [
				  		{
                  extend: "excelFlash",
                  className: "btn btn-info"
                },
                {
                  extend: "print",
                  className: "btn btn-warning"
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
        $('#datatable-data').DataTable({
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
<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtip",
              buttons: [
                
                {
                  extend: "excelFlash",
                  className: "btn-info"
                },
               
                {
                  extend: "print",
                  className: "btn btn-warning"
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
	<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons2").length) {
            $("#datatable-buttons2").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtip",
              buttons: [
                
                {
                  extend: "excelFlash",
                  className: "btn-info"
                },
               
                {
                  extend: "print",
                  className: "btn btn-warning"
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
    
  </body>
</html>