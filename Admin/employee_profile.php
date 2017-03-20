<?php
$title  ="Employee Profile";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
require 'MainConfig.php';

$data=$_SESSION["favanimal"];

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
                <h3>Employee Profile</h3>
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
 <form class="avatar-form" action="#" enctype="multipart/form-data" method="post">
                    

           <?php 
						
                $na= "select * from contact where `No` ='$data' and `trunc`='0' " ;
				$dd= mysqli_query($link,$na);
			
				while($s=mysqli_fetch_array($dd))
				{ 
					 $dna= $s['Name'];  
					$img1 = $s["photo"];			
		 	$abc= base64_encode($img1);
              
            ?>


                   <div class="col-md-4 col-sm-4 col-xs-12 profile_left">

                      <div class="profile_title">
                        
                        <div class="col-md-6">
                        

                      
                        
                 
                         <h3><?php echo  $s['Name'];  ?>
						 </h3>
                      <ul class="list-unstyled user_data">
					   <i class="fa fa-external-link user-profile-icon"></i><?php echo $s['Design_type'];?>
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $s['Address'];?>
                        </li>

                        <li>
                          <i class="fa fa-mobile user-profile-icon"></i> <?php echo $s['Mobile_no'];?>
                        </li>

                        <li class="m-top-xs">
                         
                      </ul>					 
			

                      <br />
                 
                        
                      </div>
					  </div>
                      
                        </div> 
						<div class="col-md-4 col-sm-4 col-xs-12 profile_center">

                      <div class="profile_img">

                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                          <!-- Current avatar -->
            	
                          <!-- Current avatar -->
						  <?php if($abc==""){?><img src="images/user.png" alt="..." class="img-circle img-responsive"><?php }else{ ?>						  
							  
                          <img class="img-circle img-responsive" src="data:image/jpeg;base64,<?php echo $abc; ?>" alt="Avatar" title="Change the avatar"><?php } } ?>		
			

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
												  <div class="col-md-4 col-sm-4 col-xs-12  profile_right">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph <small>Sessions</small></h2>
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
                    <canvas id="mybarChart"></canvas>
                  </div>
                </div>
              </div>
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
					 </form>            
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <br/>               
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">TOTAL DETAILS</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">PAYMENT</a>
                        </li>                
						</ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="total details-tab">
						<div class="form-group">
                 <?php
				$rq= "select sum(Amount) from payment where empid ='$data' and `del`='0'";
                    $dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['sum(Amount)'];              ?> 
					<label class="control-label col-md-3 col-sm-3 col-xs-6">Total Payments   <?php echo $s ?></label>
                     <?php  }?>		  
						<div class="clearfix"></div>
						</div>
						</div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">              
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="x_content">
				  <div id="divToPrint">
				   
                     <table id="datatable-buttons" class="table table-striped table-bordered">					
                      <thead>
                        <tr> 
						<th style="text-align:center;">No</th>
						<th style="text-align:center;">Date</th>
						<th style="text-align:center;">Name</th>
                          <th style="text-align:center;">Position</th>
                          <th style="text-align:center;">Payment Type</th>
						  <th style="text-align:center;">Amount</th>
                          <th style="text-align:center;">Remarks</th>
                          
                        </tr>
                      </thead>
                      <tbody>   
					  				<?php
$sql = "SELECT * FROM `payment` WHERE `empid` = '$data' and `del`='0'";
$query = mysqli_query($link,$sql);
$i=1;
 while($rs = mysqli_fetch_object($query)){ 
	 					$v = $rs->Date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da));?>
					
	
          <tr>
              <td style="text-align:center;"><?php echo $i; ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->Name); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->Design_ty); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rs->Payment_type); ?> </td>
				  <td style="text-align:center;"><?php echo stripslashes($rs->Amount); ?> </td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs->Remarks); ?> </td>
					 	 
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
	
  </body>
</html>