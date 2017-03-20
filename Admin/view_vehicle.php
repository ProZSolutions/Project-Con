<?php
$title  ="View Vehicle";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
require 'MainConfig.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
if(isset($_POST['hide'])) {
    $data2 = $_POST['hide'];
	$nam2="second";
	$id1=$_POST['id11'];
	$id2=$_POST['id12'];
	$date = new DateTime($id2);		
    $dat1= $date->format('Y-m-d');
	$id3=$_POST['id13'];
	$id4=$_POST['id14'];
	$id5=$_POST['id15'];
		  
			$one = explode(':',$id5);
            $name = $one[0];	
            $surname = $one[1];

	       $id111 = $_POST['send'];

           $result1 = $link->query("select `vwege`,`hour_cost` from vehicle where `vno`='$id3' ");
           while ($row = $result1->fetch_assoc())
			   {
			   $wege = $row['vwege'];
			   $cost = $row['hour_cost'];
			   }	
	
			   $worktime = $name + $surname/60;              
               $pay = round($worktime * $cost); 
                 $amt = $pay+$wege;
	if($nam2==$data2)
	{
  
	if($id111=='update')
	{
		$sql = "UPDATE `vehicle_entry` SET `Date`='$dat1',`Vehicle_no`='$id3',`hour`='$id5',`owner`='$id4',`Amount`='$pay',`Totalamount`='$amt' WHERE `sno`='$id1'";
mysqli_query($link,$sql);                                    
	}
		}
}

}
if(isset($_POST['hide'])) {
    $d = $_POST['noo'];
	$d1 = $_POST['hide'];	
if($d1=="secvalue")
	{
	$my1="DELETE FROM `vehicle_entry` WHERE `sno`='$d'";
        mysqli_query($link,$my1); 
				
	}
}
?>
    <!-- header.php -->
<?php require("Template/header.php"); ?>
<style>
body .modal-content {
    /* new custom width */
    width: 560px;
	width: 560px;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left:300px;	 
}
</style>
</head>
<!--body.php-->
<?php require("Template/body.php"); ?>            
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Attendance</h3>
              </div>             
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                       <h2>Vehicle Attendance <small>Users</small></h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <br/>
              <?php if($role=='admin'||$role=='manager') { ?>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Vehicle Attendance</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Manage Vehicle</a>
                        </li>						
                      </ul>					 
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab"> <?php } ?>        
                    <div class="col-md-12 col-sm-12 col-xs-12">
					  <div class="x_content">
					  <div class="clearfix"></div>
                  </div>                 
                   <table id="datatable-buttons" class="table table-striped table-bordered">                       
                         <thead>
					      <tr class="headings">
                           <th style="text-align:center;">No</th>
						   <th style="text-align:center;">Date</th>
						   <th style="text-align:center;">Vehicle No</th>						  					
						   <th style="text-align:center;">Owner/Transport Name</th>
						    <th style="text-align:center;">Hour</th>						  
						   <th style="text-align:center;">Cashier</th>						                                                  
                          </tr>
                        </thead>            
					   <tbody>
	<?php $j=1;	  $sql = "SELECT * FROM `vehicle_entry` WHERE `del`='0' ";     $result = mysqli_query($link,$sql);     while ($row = mysqli_fetch_assoc($result)) 
		{	$v1 = $row['Date'];      $da1 = str_replace('-', '/', $v1);         $d1 = date('d-m-Y',strtotime($da1)); ?>
						<tr>
                          <td><?php echo $j; ?></td> 
                          <td><?php echo $d1; ?></td>
                          <td><?php echo $row['Vehicle_no']; ?></td>							 
						  <td><?php echo $row['owner']; ?></td>
						  <td><?php echo $row['hour']; ?></td>						
						  <td><?php echo $row['cashier']; ?></td>                                               
                        </tr> 	<?php	$j++; }  ?>                           
						</tbody>
						</table>
						</div>
						</div>						
<div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF">Attendance Edit<h>
      <button type="button" class="close" style="color:#000000" data-dismiss="modal">&times;</button>       
  </div>
  <div class="modal-body" id="log">
  </div>
<label for="date">Date</label>
      
  <div class="modal-footer"></div>
  </div>
</div>
</div>   <?php if($role=='admin'||$role=='manager') { ?>
                <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab">
                 <div class="col-md-12 col-sm-12 col-xs-12">  <input type="text" id="date" name="date">	                 
                  <div class="x_content">
                   <div class="table-responsive">
                     <table id="datatable-buttons1" class="table table-striped table-bordered">
                      <thead>
                        <tr class="headings">
                           <th style="text-align:center;">No</th>
						   <th style="text-align:center;">Date</th>
						   <th style="text-align:center;">Vehicle No</th>   						
						   <th style="text-align:center;">Owner/Transport Name</th>
						   <th style="text-align:center;">hour</th>						  
						   <th style="text-align:center;">Cashier</th>
						   <th style="text-align:center;">Action</th>   
                         </tr>
                         </thead>
                         <tbody>
		        <?php
				$j=1;
				$sql1 = "SELECT * FROM `vehicle_entry` WHERE `del`='0'";
			        $result1 = mysqli_query($link,$sql1);
                                while ($row1 = mysqli_fetch_assoc($result1)) {
				$v = $row1['Date'];
	                        $da = str_replace('-', '/', $v);
                                $d = date('d-m-Y',strtotime($da)); ?>
			   <tr>
                          <td><?php echo $j; ?></td> 
                          <td><?php echo $d; ?></td>
                          <td><?php echo $row1['Vehicle_no']; ?></td>
			  <td><?php echo $row1['owner']; ?></td>
			  <td><?php echo $row1['hour']; ?></td>						
                          <td><?php echo $row1['cashier']; ?></td>						   
			  <td style="text-align:center;"><button type="submit" id="Btn" class="p btn btn-info btn-xs" name="first" value="<?php echo $row1['sno']; ?>">edit</button>
<?php if($role == 'admin') { ?>
	<form action="view_vehicle" class="form-horizontal form-label-left" data-parsley-validate  method="post" style="display:inline;">
        <input type="hidden" name="noo" value="<?php echo stripslashes($row1['sno']); ?> ">
	<input type="hidden" name="hide" class="btn btn-success" value="secvalue">
	<input type="submit" name="send" value="Delete" class="btn btn-danger btn-xs">	
	</form><?php } ?>
			</td>   
                        </tr> <?php $j++; }  ?>            
		      </tbody>
		     </table>                  
		    </div>
		   </div>
		  </div>
                 </div><?php } ?>
                </div>
               </div>            
              </div>
             </div>
            </div>     <div class="clearfix"></div>
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
$('#date').daterangepicker({
singleDatePicker: true,
calender_style: "picker_2",
maxDate: new Date
}, function(start, end, label) {
console.log(start.toISOString(), end.toISOString(), label);
        });
      });
</script>
<!---date---->
<script>
$(document).ready(function() {
$('#tim').daterangepicker({
singleDatePicker: true,
calender_style: "picker_2",
maxDate: new Date
}, function(start, end, label) {
console.log(start.toISOString(), end.toISOString(), label);
});
});
</script>
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
url: "ajaxvehicleentry.php",
data: dataString,
cache: false,
success: function(data)
{
$("#log").html(data); 
 $("#tim").daterangepicker();
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
  </body>
</html>
