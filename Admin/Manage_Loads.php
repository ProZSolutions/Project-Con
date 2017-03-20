<?php
$title  = "Load Entry";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";	
error_reporting(0); 
require 'MainConfig.php';
if($role == user){
      header("Location: page_500.html");
    }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$go1=$_POST['id12'];
$go2=$_POST['id13'];
$date = new DateTime($go2);
$dat= $date->format('Y-m-d'); 
$go3=$_POST['id14'];
$go4=$_POST['id15'];
$go5=strtoupper($_POST['id16']);
$go6=$_POST['id17'];
$go7=$_POST['id18'];
$go8=$_POST['id19'];
$go9=$_POST['id11'];
$ra=$_POST['rate'];
$tot=$_POST['total'];

    $sql = "UPDATE `material_in` SET `date`='$dat',`Time`='$go3',`Material_name`='$go4',`Lorry_no`='$go5',`dealer`='$go6',`Received_qty`='$go7',`rate`='$ra',`Totalamount`='$tot',`From`='$go8',`To`='$go9' WHERE `id` ='$go1'";
   mysqli_query($link,$sql);
     
	 if (count($_POST["ids"]) > 0 ) {
  $all = implode(",", $_POST["ids"]);
  
}
$sql = "UPDATE `material_in` SET `delete`= '1' WHERE 1 AND id IN($all)";	
 
$query = mysqli_query($link,$sql);
	  mysqli_close($link);
}

?>
   <!--header.php-->
<?php require("Template/header.php"); ?>

<style>
body .modal-content {
    /* new custom width */
    width: 1000px;

    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left:270px;
	margin-right:10px;
}
h
 {
 text-align:center;
 margin-left:390px;
 font-size:22px;
 }
</style>	
<style>
.click{
	margin-left: 500px;
}
</style>
</head>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>  
               <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Material Handling</h3>
              </div>              
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manage Loads<small></small></h2>                   
					<div class="clearfix"></div>
                  </div>
				  <?php if($role=='admin') { ?>
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab1" role="tab" data-toggle="tab" aria-expanded="true">Edit Loads</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab1" data-toggle="tab" aria-expanded="false">Delete Loads</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab1">
						<?php } ?>
                      <?php if($role=='admin' || $role=='manager')  { ?>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                         <tr>
						 <th  style="text-align:center;">No</th>
						  <th  style="text-align:center;">ID</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Time</th>
                          <th style="text-align:center;">Material_Name</th>
                          <th style="text-align:center;">Vechile_No</th>
						  <th style="text-align:center;">Dealer</th>
                          <th style="text-align:center;">Received quantity</th>
						  <th style="text-align:center;">Rate</th>
						  <th style="text-align:center;">Amount</th>
						  <th style="text-align:center;">From</th>
						  <th style="text-align:center;">To</th>
						    <?php if($role=='admin' || $role=='manager') { ?>
						  <th style="text-align:center;">Action</th>
						   <?php } ?>     
                        </tr>
                      </thead>
					   <tbody><?php require "Config.php" ;
$sql = "SELECT * FROM `material_in` WHERE `delete` = '0' ";
$query = mysqli_query($link,$sql);
$i=1;
while($rs = mysqli_fetch_array($query)){ 
	 $v = $rs['date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 	 ?>	 
          <tr class="even pointer"> 
		   <td style="text-align:center;"><?php echo $i; ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs['id']); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs['Time']); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rs['Material_name']);?></td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs['Lorry_no']); ?> </td>
					 <td style="text-align:center;"><?php echo stripslashes($rs['dealer']); ?> </td>
					 	  <td style="text-align:center;"><?php echo stripslashes($rs['Received_qty']); ?> </td>
						  <td style="text-align:center;"><?php echo stripslashes($rs['rate']); ?> </td>
						  <td style="text-align:center;"><?php echo stripslashes(round($rs['Totalamount'])); ?> </td>
						 	 <td style="text-align:center;"><?php echo stripslashes($rs['From']); ?> </td>
							 	 <td style="text-align:center;"><?php echo stripslashes($rs['To']); ?></td>
								   <?php if($role=='admin' || $role=='manager') { ?>
								 <td style="text-align:center;"><button type="submit" id="Btn" class="p btn btn-info btn-xs"name="ids[]"value="<?php echo $rs['id']; ?>">edit</button></td>
                                    <?php } ?>       
								   </tr>
                            	<?php $i++; } ?>			                            
						</tbody>
						</table> 			         

   </div>  
   <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF"> Edit Loads<h>
        <button type="button" class="close"  style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>  
	<div class="modal-footer"></div>
  </div>
</div>
</div>
<?php } if($role=='admin') { ?>
		<div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab1">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                 <form name="input"action="<?= $_SERVER['PHP_SELF'] ?>"class="form-horizontal form-label-left" data-parsley-validate  method="post">
                        <table id="datatable-buttons3" class="table table-striped table-bordered ">
                      <thead>
                         <tr>
						 <th>
                          <input type="checkbox" id="show"class="all"/></th>
                          <th  style="text-align:center;">ID</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Time</th>
                          <th style="text-align:center;">Material_Name</th>
						  <th style="text-align:center;">Dealer</th>
                          <th style="text-align:center;">Vechile_No</th>
                          <th style="text-align:center;">Received quantity</th>
						  <th style="text-align:center;">Rate</th>
						  <th style="text-align:center;">Amount</th>
						  <th style="text-align:center;">From</th>
						  <th style="text-align:center;">To</th>                            
                        </tr>
                      </thead>
					   <tbody>
<?php 
	$sql = "SELECT * FROM `material_in` WHERE `delete` = '0' ";
$query = mysqli_query($link,$sql);
 while($rs = mysqli_fetch_object($query)){
	 ?>
          <tr class="even pointer">
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="flat clg" value="<?php echo stripslashes($rs->id); ?>" id="chk"></td>
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
							 	 <td style="text-align:center;"><?php echo stripslashes($rs->To); ?> </td>
                                   </tr>
                            <?php } ?>					                            
						</tbody>
						</table>              
                        <input type="submit" value="Delete"id="btn" class="btn btn-round btn-danger click" onClick="return confirm('Do you want to delete this Item?')"disabled>
						<input type="reset" value="Cancel"class="btn btn-round btn-info" id="can">
						</form>
						</div>                 
                      </div> <?php } ?>                   
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
$('.clg').change(function () {
    if ($(".clg:checked").length >= 1) {
        $('#btn').removeAttr('disabled');
    } else {
        $('#btn').attr('disabled', 'disabled');
    }
});
$('#can').click(function () {
    $('.clg').prop('checked', false);
    $('.clg').trigger('change')
});

$('#show').change(function () {
    if ($("#show:checked").length >= 1) {
       $('.clg').prop('checked', true);
	   $('.clg').trigger('change')
    } else {
		 $('.clg').prop('checked', false);
        $('.clg').trigger('change')
    }
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
url: "ajaxeditload.php",
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
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "frtip",
              buttons: [
                
                {
                  extend: "excelFlash",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
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

	   <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons3").length) {
            $("#datatable-buttons3").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "frtip",
              buttons: [
                
                {
                  extend: "excelFlash",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
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
	<script>
      $(document).ready(function() {
        $('').daterangepicker({
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
        $('').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
			  maxDate: new Date
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>
	  <script>
	  window.onload=function(){
displayDate();
displayDate1();
}
function displayDate() {
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (month)+ "/" + (day) + "/"  + now.getFullYear();

    document.getElementById("").value = today;
}
function displayDate1() {
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (month) + "/" +(day)+ "/"  + now.getFullYear();

    document.getElementById("").value = today;
}
</script>

    <!-- /Datatables -->
  </body>
</html>