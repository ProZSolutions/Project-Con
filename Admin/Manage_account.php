<?php
$title  ="Manage account";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0); 
require 'MainConfig.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$go1=$_POST['id12'];
$go2=$_POST['id13'];
$date = new DateTime($go1);
$dat= $date->format('Y-m-d'); 
$go3=$_POST['id14'];
$go4=$_POST['id15'];
$go5=$_POST['id16'];
$go6=$_POST['id17'];
$go7=$_POST['id18'];
$go8=$_POST['id19'];
$go9=$_POST['id11'];
$eid=$_POST['id111'];
if($go5=='Salary')
	{
    $sql2 = "UPDATE `payment` SET `Date`='$dat',`Name`='$go2',`Designation`='$go3',`Design_ty`='$go4',`Totalamount`='$go6',`Remarks`='$go7',`Cashier`='$go8' WHERE `sno` ='$go9'";
mysqli_query($link,$sql2);
}
if($go5=='advance'){
	$sql23 = "UPDATE `payment` SET `Date`='$dat',`Name`='$go2',`Designation`='$go3',`Design_ty`='$go4',`Totalamount`='$go6',`Remarks`='$go7',`Cashier`='$go8' WHERE `sno` ='$go9'";
	mysqli_query($link,$sql23);

	$sql1 = "UPDATE `dealerpayment` SET `Date`='$dat',`Name`='$go2',`Designation`='$go3',`Design_ty`='$go4',`Amount`='$go6',`Remarks`='$go7',`Cashier`='$go8' WHERE `empid` ='$eid' and `Payment_type` = 'Advance'";
	mysqli_query($link,$sql1);

    if (!mysqli_query($link,$sql1))
      {
      die('Error:'. mysqli_error($link));
      }
}
	 if (count($_POST["ids"]) > 0 ) {
  $all = implode(",", $_POST["ids"]);
  
}
$sql = "UPDATE `payment` SET `del`= '1' WHERE 1 AND sno IN($all)";	 
$query = mysqli_query($link,$sql);	 
}

?>	 <!---------header.php---------------->
<?php require("Template/header.php"); ?>
<style>
.click{
	margin-left: 760px;
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
                <h3>Accounts</h3>
              </div>             
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manage Accounts <small></small></h2>
                    
					<div class="clearfix"></div>
                  </div>
				  <?php if($role=='admin') {  ?>
                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab1" role="tab" data-toggle="tab" aria-expanded="true">Edit Payment</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab1" data-toggle="tab" aria-expanded="false">Delete Payment</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab1">
						<?php } ?>  
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                         <tr>
						 <th style="text-align:center;">No</th>
						  <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Name</th>
                          <th style="text-align:center;">Designation</th>
						  <th style="text-align:center;">Position</th>	
                          <th style="text-align:center;">Total Amount</th>
                          <th style="text-align:center;">Remarks</th>
						  <th style="text-align:center;">Cashier</th>
						   <?php if($role=='admin' || $role=='manager') { ?>
						  <th style="text-align:center;">Action</th> <?php } ?>
                        </tr>
                      </thead>
					   <tbody>
<?php $sqll = "SELECT * FROM `payment` WHERE `del` = '0' ";
$queryl = mysqli_query($link,$sqll); $i=1;
while($rsl = mysqli_fetch_array($queryl)){ 
$vl = $rsl['Date'];
$dal = str_replace('-', '/', $vl);
$dl= date('d-m-Y',strtotime($dal)); 	 ?>
          <tr class="even pointer"> 
		   <td style="text-align:center;"><?php echo $i; ?> </td>
		 <td style="text-align:center;"><?php echo stripslashes($dl); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rsl['Name']); ?> </td>
			  <td style="text-align:center;"><?php echo stripslashes($rsl['Designation']); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rsl['Design_ty']); ?> </td>				 
				 	 <td style="text-align:center;"><?php echo stripslashes(round($rsl['Totalamount'])); ?> </td>
					 	 <td style="text-align:center;"><?php echo stripslashes($rsl['Remarks']); ?> </td>
						 	 <td style="text-align:center;"><?php echo stripslashes($rsl['Cashier']); ?> </td>
							  <?php if($role=='admin' || $role=='manager') { ?>
								 <td style="text-align:center;"><button type="submit" id="Btn" class="p btn btn-info btn-xs" name="first[]" value="<?php echo $rsl['sno']; ?>">edit</button></td>   
								  <?php } ?>  </tr>    	<?php $i++; } ?>			                            
						</tbody>
						</table>
						</div>  
 <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF">Edit Account<h>
     <button type="button" class="close" style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>  
	<div class="modal-footer"></div>
  </div>
</div>
</div>
 <?php if($role=='admin') { ?>
		<div role="tabpanel" class="tab-pane fade active " id="tab_content2" aria-labelledby="search-tab1">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <form name="input" action="Manage_account" class="form-horizontal form-label-left" data-parsley-validate  method="post">
                    <table id="datatable-buttons1" class="table table-striped table-bordered ">
                      <thead>
                         <tr>
						  <th style="text-align:center;"><input type="checkbox" id="show" class="all"/></th>                       
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Name</th>
                          <th style="text-align:center;">Designation</th>						
                          <th style="text-align:center;">Total Amount</th>
                          <th style="text-align:center;">Remarks</th>
						  <th style="text-align:center;">Cashier</th>                 
                        </tr>
                      </thead>
					   <tbody>
					   				<?php
$sql = "SELECT * FROM `payment` WHERE `del` = '0' ";
$query = mysqli_query($link,$sql);
while($rs = mysqli_fetch_object($query)){
	 ?>
          <tr class="even pointer">
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="flat clg" value="<?php echo stripslashes($rs->sno); ?>"></td>		 
            <td style="text-align:center;"><?php echo stripslashes($dl); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->Name); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rs->Design_ty); ?> </td>				 
				 	 <td style="text-align:center;"><?php echo stripslashes(round($rs->Totalamount)); ?> </td>
					 	 <td style="text-align:center;"><?php echo stripslashes($rs->Remarks); ?> </td>
						 	 <td style="text-align:center;"><?php echo stripslashes($rs->Cashier); ?> </td>							 	
                         </tr>
                            <?php } ?>					                            
						</tbody>
						</table>						
                        <input type="submit" value="Delete" id="btn" class="btn btn-round btn-warning click" onClick="return confirm('Do you want to delete this Item?')" disabled>
						<input type="reset" value="Cancel" class="btn btn-round btn-info" id="can">
						</form>
			           </div>
					   </div>	
					   <?php }?>
					   </div>                       
                      </div>                   
                     </div>
                     </div>         
			       <div class="clearfix"></div>
			     </div>
                </div>					    
<!-- footer content -->
<?php require("Template/footer.php"); ?>
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
url: "ajaxpayment.php",
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
	<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "frtip",
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