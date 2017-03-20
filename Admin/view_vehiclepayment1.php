<?php
$title  ="Manage account";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0); 
require 'MainConfig.php';
     $result = $link->query("select vno from vehicle");
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
	$id6=$_POST['id16'];
	$id7=$_POST['id17'];
	$id8=$_POST['id18'];	
	$id9=$_POST['id19'];
	$id10=$_POST['id10'];	
	$id111=$_POST['send'];

	if($nam2==$data2)
	{
  
	if($id111=='update')
	{
		$sql = "UPDATE `vehicle_entry` SET `Date`='$dat1',`Vehicle_no`='$id3',`Vehicle_name`='$id4',`hour`='$id6',`owner`='$id5',`drivername`='$id7',`driverwege`='$id8',`cashier`='$id9',`remark`='$id10' WHERE `sno`='$id1'";
  if (!mysqli_query($link,$sql))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }
	}
	else
		{
		$my1="DELETE FROM `vehicle_entry` WHERE `sno`='$id1'";
        mysqli_query($link,$my1); 
		if (!mysqli_query($link,$my1))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }
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
                <h3>Accounts</h3>
              </div>
              
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                   <h2>Vehicle Payment<small>users</small></h2>
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
                      </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                   <br/>
                <!--  <form class="form-horizontal form-label-left" data-parsley-validate>-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Payment</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">View</a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content3" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Manage Payment</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab">
					 
					 <form action="material_plain.php"class="form-horizontal form-label-left" data-parsley-validate method="post">                  
					<div class="form-group">				 
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6 ">
                          <input id="date"name="pick" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                        </div>                 
                        </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vehicle No <span class="required"style="color: red;">*</span></label>
                        </label>
						<div class ="col-md-4 col-sm-4 col-xs-10" >
						<select class="form-control" name="material" id="mat1">
						<option>Select Vehicle No</option>
					  <?php while ($row = $result->fetch_assoc()){$id = $row['vno'];echo '<option>'.$id.'</option>';}?></select>	
                      </div>
					  </div>
					
					   <div class="form-group">
					   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Hours<span class="required"style="color: red;">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-10">
                         <input type="text"name="lorry" id="first-name" required="required" style="text-transform:uppercase" class="form-control col-md-7 col-xs-12">
						 
                        </div><input type="text" id="abc"name="txt"class='abc'style="display: none;">
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount<span class="required"style="color: red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-10">
                          <input type="text" id="first-name1"name="received"required="required"placeholder="0" class="form-control col-md-7 col-xs-12">
                        </div><label class="res"></label>
					   </div>
 					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Remarks<span class="required"style="color: red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-10">
                          <input type="text" name="frm"id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
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
          <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab">
          <div class="col-md-12 col-sm-12 col-xs-12">
						 table2
						  </div>
						  </div>
    					
   <div id="myModal" class="modal">  
  <div class="modal-content">
    <span class="close">X</span>
	<div id="log"></div>    
  </div>
</div>           
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="search-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
			
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						<th>S No</th>
						 <th>Date</th>
                          <th>Vehicle No</th>
                          <th>Total Hours</th>
                          <th>Amount</th>
						  <th>Cashier</th>
                          <th>Remarks</th>
						  <th>Action</th>
                           </tr>
                      </thead>
                        <tbody>
					<?php
						$j=1;
						$sql1 = "SELECT * FROM `vehicle_entry` ";
			            $result1 = mysqli_query($link,$sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) 			
							{
						$v = $row1['Date'];
	                    $da = str_replace('-', '/', $v);
                        $d = date('d-m-Y',strtotime($da));
						?>
						<tr>
                          <td><?php echo $j; ?></td> 
                          <td><?php echo $d; ?></td>
                          <td><?php echo $row1['Vehicle_no']; ?></td>							 
						 
						  <td><?php echo $row1['hour']; ?></td>
						  
						  <td><?php echo $row1['drivername']; ?></td>						 
						 
						  <td><?php echo $row1['remark']; ?></td>
                          <td><?php echo $row1['cashier']; ?></td>						   
					<td><button type="submit" id="Btn" class="p btn btn-info btn-xs" name="first" value="<?php echo $row1['sno']; ?>">edit</button> </td>   
                        </tr> 
						<?php	$j++; }  ?>            
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
          </div>     <div class="clearfix"></div>
        </div>
		<!--</form>-->
		</div>
</div>

        <!-- /page content -->

       <!-- footer content -->
         <?php require("Template/footer.php"); ?>
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
url: "ajaxvehiclepayment.php",
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

    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
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