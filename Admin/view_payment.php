<?php
$title  ="View Payment";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
require 'MainConfig.php';
		/* $sql = "SELECT Date,Name,Payment_type,A_credit,A_debit,b_credit,b_debit,Amount,Totalamount,Remarks,Cashier FROM `dealerpayment` WHERE `Design_ty`='Dealer' AND `del`='0' AND `Amount`>'0'  UNION SELECT Date,Name,Payment_type,A_credit,A_debit,b_credit,b_debit,Amount,Totalamount,Remarks,Cashier FROM `payment` WHERE `Design_ty`='Dealer' AND `del`='0' AND `Amount`>'0' ";
        $result1 = mysqli_query($link,$sql);
}
		else{*/
			$sql = "SELECT * FROM `payment` WHERE `Design_ty`='Dealer' AND `del`='0' ";
			$result1 = mysqli_query($link,$sql);		


			$sql1 = "SELECT * FROM `payment` WHERE `Designation`='Labour' AND `del`='0' ";
			$result = mysqli_query($link,$sql1);
		
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
                <h3>Accounts</h3>
              </div>             
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                       <h2>View Payment <small></small></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <br/>               
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Employee/Labour Payment</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Dealer Payment</a>
                        </li>						
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab"> 
          <form  class="form-horizontal form-label-left" data-parsley-validate method="post">
                  
					  
					            
                   <table id="datatable-buttons" class="table table-striped table-bordered">                      
                         <thead>
					      <tr class="headings">
                           <th style="text-align:center;">No</th>
						   <th style="text-align:center;">Date</th>
						   <th style="text-align:center;">Name</th>	
						   <th style="text-align:center;">Designation</th>
						   <th style="text-align:center;">Position</th>
						   <th style="text-align:center;">Payment</th>
						   <th style="text-align:center;">Total Amount</th>
						   <th style="text-align:center;">Remarks</th>
						   <th style="text-align:center;">Cashier</th>                                                  
                          </tr>
                        </thead>                  
					   <tbody>
					<?php
						$j=1;
                        while ($row = mysqli_fetch_assoc($result)) 
						{
						$v1 = $row['Date'];
	                    $da1 = str_replace('-', '/', $v1);
                        $d1 = date('d-m-Y',strtotime($da1));
						?>
						<tr>
                          <td><?php echo $j; ?></td> 
                          <td><?php echo $d1; ?></td>
                          <td><?php echo $row['Name']; ?></td>							 
						  <td><?php echo $row['Designation']; ?></td>
						  <td><?php echo $row['Design_ty']; ?></td>
						  <td><?php echo $row['Payment_type']; ?></td>
						  <td><?php echo round($row['Totalamount']); ?></td>						 
						  <td><?php echo $row['Remarks']; ?></td>
                          <td><?php echo $row['Cashier']; ?></td>                         
                         </tr> 	<?php	$j++; }  ?>                  
						</tbody>
						</table>
                        </div>
                                       
                <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab">
                <div class="col-md-12 col-sm-12 col-xs-12">    
                    
                    <div class="x_content">
                    <div class="table-responsive">
                        <table id="datatable-buttons1" class="table table-striped table-bordered">
                       <thead>
                          <tr class="headings">
                           <th style="text-align:center;">No</th>
						   <th style="text-align:center;">Date</th>
						   <th style="text-align:center;">Name</th>		
						   <th style="text-align:center;">Payment</th>					                             
						   <th style="text-align:center;">Total Amount</th>
						   <th style="text-align:center;">Remarks</th>
						   <th style="text-align:center;">Cashier</th>                                                  
                          </tr>
                        </thead>           
					   <tbody>
					<?php $j=1; while ($row1 = mysqli_fetch_assoc($result1)) {
						$v = $row1['Date'];
	                    $da = str_replace('-', '/', $v);
                        $d = date('d-m-Y',strtotime($da));		?>
						 <tr>
                          <td><?php echo $j; ?></td> 
                          <td><?php echo $d; ?></td>
                          <td><?php echo $row1['Name']; ?></td>						 						  				
                          <td><?php echo $row1['Payment_type']; ?></td>	
						  <td><?php echo round($row1['Totalamount']); ?></td>						 
						  <td><?php echo $row1['Remarks']; ?></td>
                          <td><?php echo $row1['Cashier']; ?></td>                         
                        </tr> <?php	$j++; }  ?>            
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
          </div>     <div class="clearfix"></div>
        </div>
	</form>
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
              dom: "Bfrtp",
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
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtp",
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
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>
    <!---/Date--->
  </body>
</html>