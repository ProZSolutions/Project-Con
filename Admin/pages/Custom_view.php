<?php
$title  ="View Loads";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
require 'MainConfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$id21=$_POST['material'];

$id22=$_POST['date'];
$dat = date("Y-m-d",strtotime(str_replace('/','-',$id22)));   

$id23=$_POST['date1'];
$dat2 = date("Y-m-d",strtotime(str_replace('/','-',$id23)));   

$id24=$_POST['to'];
	}	?>
<?php require("Template/header.php"); ?>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>	
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Material Handling </h3>
              </div>              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Loads <small>custom</small></h2>                   
                    <div class="clearfix"></div>
                  </div>				 
				  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab1" role="tab" data-toggle="tab" aria-expanded="true">Custom Loads</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab1" data-toggle="tab" aria-expanded="false">View Loads</a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content3" role="tab" id="search-tab2" data-toggle="tab" aria-expanded="false">Full View Loads</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab1">
					 <form name="input" action="Custom_view" class="form-horizontal form-label-left" data-parsley-validate  method="post">   
                 		<select name="material" id="mat"  style="width: 180px; height: 25px">
						<option>Select Material Name</option>
						<?php  $res ="select `material_name` from material";
                        $result=mysqli_query($link,$res); 
						while ($row = mysqli_fetch_assoc($result)) {      
                         $id = $row['material_name'];
                         echo '<option>'.$id.'</option>';    } 	?>                 			 
                      </select>                 
					  
                        <label>From <span class="required" style="color: red;">*</span>
                        </label>                       
                          <input id="date" name="date" class="date-picker " required="required" type="text" > 
                        <label>To <span class="required" style="color: red;">*</span></label>                
                          <input id="date1" name="date1" class="date-picker " required="required" type="text" >             
                         <input type="submit" class="btn btn-primary btn-xs" name="to" id="dat" value="Go">
                        </form>

                  <div class="x_content">
				  </br>
					  <div class="table-responsive">
           		        <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr class="headings">
                            <th>No </th>
                            <th style="text-align:center;">ID </th>
                            <th style="text-align:center;">DATE</th>
                            <th style="text-align:center;">TIME </th>
                            <th style="text-align:center;">MATERIAL_NAME </th>
                            <th style="text-align:center;">DEALER</th>
                           <th style="text-align:center;">LORRY NO</th>
                           <th style="text-align:center;">RECEIVED QUANTITY</th>
						   <th style="text-align:center;">RATE</th>
						   <th style="text-align:center;">AMOUNT</th>
						   <th style="text-align:center;">FROM</th>
						   <th style="text-align:center;">TO</th>                          
                          </tr>
                        </thead>             
					    <tbody>
	<?php  if($id24 =='Go'){
	$sql1 = "SELECT * FROM material_in  WHERE date BETWEEN '$dat' AND '$dat2' and Material_name = '$id21' and `delete`='0'";
    $result1 = mysqli_query($link,$sql1);          $i=1;             
	 while($rs = mysqli_fetch_object($result1)){ 
     $v = $rs->date;
	$da = str_replace('-', '/', $v);
     $d = date('d-m-Y',strtotime($da)); 
	 ?>  <tr>  
		  <td style="text-align:center;"><?php echo stripslashes($i); ?> </td>
		  <td style="text-align:center;"><?php echo stripslashes($rs->id); ?> </td>
           <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->Time); ?> </td>
			 	<td style="text-align:center;"><?php echo stripslashes($rs->Material_name); ?> </td>
				  <td style="text-align:center;"><?php echo stripslashes($rs->dealer); ?> </td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs->Lorry_no); ?> </td>
					 	<td style="text-align:center;"><?php echo stripslashes($rs->Received_qty); ?> </td>
						<td style="text-align:center;"><?php echo stripslashes($rs->rate); ?> </td>
						<td style="text-align:center;"><?php echo stripslashes(round($rs->Totalamount)); ?> </td>
						   <td style="text-align:center;"><?php echo stripslashes($rs->From); ?> </td>
							  <td style="text-align:center;"><?php echo stripslashes($rs->To); ?></td>
							<?php	$i++; }?> </tr>			
			<tr>
		<td><font color='#FFFFFF'>i</font> </td>			        
               	
		<td>  </td>
		   <td>  </td>
		   <td>  </td>			        
           <td>  </td>
		   <td>  </td>			
		   <td style="text-align:center;"><b><i>Total Received Quantity</i></b></td>
			<?php
			$q="Select `quantitytype` From `material` where `material_name` ='$id21'";
		    $r= mysqli_query($link,$q);
			while($ro = mysqli_fetch_array($r)) {
             $s1=$ro['quantitytype'];}

$sql2 = "SELECT sum(Received_qty) FROM material_in WHERE date BETWEEN '$dat' AND '$dat2' and Material_name = '$id21' and `delete`='0'";
$result2 = mysqli_query($link,$sql2);
while($row2 = mysqli_fetch_array($result2)) {
$s=$row2['sum(Received_qty)'];} ?>
<td style="text-align:center;"><b><i><?php echo $s . '&nbsp' . $s1 ;?></i></b> </td>

			<td>  </td>
			<td>  </td>
			<td>  </td>
			<td>  </td>
		   </tr>			
			        </tbody>
					<?php }	?>
						</table>						                    
						</div>						
						  </div>
						</div>
							<div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab1">
                          <div class="col-md-12 col-sm-12 col-xs-12">
						        <table id="datatable-buttons1" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th>No </th>
                            <th style="text-align:center;">ID </th>
                            <th style="text-align:center;">DATE</th>
                            <th style="text-align:center;">TIME </th>
                            <th style="text-align:center;">MATERIAL_NAME </th>
                            <th style="text-align:center;">DEALER</th>
                           <th style="text-align:center;">LORRY NO</th>
                           <th style="text-align:center;">RECEIVED QUANTITY</th>
						   <th style="text-align:center;">RATE</th>
						   <th style="text-align:center;">AMOUNT</th>
						  <th style="text-align:center;">FROM</th>
						  <th style="text-align:center;">To</th>                    
                          </tr>
                        </thead>            
					   <tbody>
			 <?php 		   $sql = "SELECT * FROM material_in WHERE `delete`='0' AND `date` >= now()-interval 2 month";
                           $result = mysqli_query($link,$sql);
                           $i=1;
                            while ($row = $result->fetch_assoc())    {
					  $v = $row['date'];
	                  $da = str_replace('-', '/', $v);
                      $d = date('d-m-Y',strtotime($da));?>			 
                  <tr>					                                                 
                          <td> <?php echo $i;?></td>
						  <td><?php echo $row['id']; ?></td>
                          <td><?php echo $d; ?></td>                          
                          <td><?php echo $row['Time']; ?></td>
                          <td><?php echo $row['Material_name']; ?></td>
                          <td><?php echo $row['dealer']; ?></td>
						  <td><?php echo $row['Lorry_no']; ?></td>
						  <td><?php echo $row['Received_qty']; ?> </td>
						  <td><?php echo $row['rate']; ?> </td>
						  <td><?php echo round($row['Totalamount']); ?> </td>
                          <td><?php echo $row['From']; ?></td>
                          <td><?php echo $row['To']; ?></td>  </tr>               
				<?php	$i++;}  ?>   
				</tbody>		
						</table>                       
						  </div>
						  </div>
						  <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="search-tab2">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                          <table id="datatable-buttons2" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th>No </th>
                            <th style="text-align:center;">ID </th>
                            <th style="text-align:center;">DATE</th>
                            <th style="text-align:center;">TIME </th>
                            <th style="text-align:center;">MATERIAL_NAME </th>
                            <th style="text-align:center;">DEALER</th>
                           <th style="text-align:center;">LORRY NO</th>
                           <th style="text-align:center;">RECEIVED QUANTITY</th>
						   <th style="text-align:center;">RATE</th>
						   <th style="text-align:center;">AMOUNT</th>
						  <th style="text-align:center;">FROM</th>
						  <th style="text-align:center;">To</th>                          
                          </tr>
                        </thead>                    
					   <tbody>
				<?php   $sql3 = "SELECT * FROM material_in WHERE `delete`='0' ";
                           $result3 = mysqli_query($link,$sql3);
                           $i=1;
                            while ($row3 = $result3->fetch_assoc())   {
					  $v3 = $row3['date'];
	                  $da3 = str_replace('-', '/', $v3);
                      $d3 = date('d-m-Y',strtotime($da3));?>					 
                  <tr>					                                                 
                          <td> <?php echo $i;?></td>
						  <td><?php echo $row3['id']; ?></td>
                          <td><?php echo $d; ?></td>                          
                          <td><?php echo $row3['Time']; ?></td>
                          <td><?php echo $row3['Material_name']; ?></td>
                          <td><?php echo $row3['dealer']; ?></td>
						  <td><?php echo $row3['Lorry_no']; ?></td>
						  <td><?php echo $row3['Received_qty']; ?> </td>
						  <td><?php echo $row3['rate']; ?> </td>
						  <td><?php echo round($row3['Totalamount']); ?> </td>
                          <td><?php echo $row3['From']; ?></td>
                          <td><?php echo $row3['To']; ?></td>
						   </tr>        
				<?php	$i++;}  ?> 
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
						<!----page content--->

               <!-- footer content -->

     <?php require("Template/footer.php"); ?> 
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
	  <script>
      $(document).ready(function() {
        $('#date1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
			  maxDate: new Date
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>

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
                  className: "btn btn-info	"
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
  <script type="text/javascript">
window.onload=function(){
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
	
  </body>
</html>