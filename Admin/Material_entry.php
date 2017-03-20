<?php
$title  ="Material Entry";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
session_start();
error_reporting(0);
require 'MainConfig.php';
$msg="";
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$mname=$_POST['material'];
		$qnty=$_POST['qty'];		
          if (mysqli_connect_errno($link))
           {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
           } 

		   $nam1="first";
           $nam2="second";
if(isset($_POST['ok'])) {
    $data1 = $_POST['aaa'];
	
if($nam1==$data1)
	{
	         $s="select * from material where `material_name` = '$mname' AND `quantitytype` = '$qnty'";
			 $query = mysqli_query($link,$s);		    
			 while ($row = $query->fetch_assoc())
				 {
				    $mname1=$row['material_name'];
					$qnty1=$row['quantitytype'];
			      }
					  if($mname == $mname1 || $qnty1 == $qnty)
		                  {
						  $msg="Already Added ";
						  }
					  else
		                  {
                          $sql = "INSERT INTO `material` (`material_name`,`quantitytype`)
                           VALUES('$mname','$qnty')";
                                 if (!mysqli_query($link,$sql))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }
		                  }
	}
}

if(isset($_POST['hide'])) {
    $data2 = $_POST['hide'];	
	$id1=$_POST['id11'];	
	$id2=$_POST['id12'];
	$id3=$_POST['id13'];	
	$id4=$_POST['send'];
	if($nam2==$data2)
	{
  
	if($id4=='update')
	{
		$sql = "UPDATE `material` SET `material_name`='$id1',`quantitytype`='$id2' WHERE `MNo` ='$id3'";
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
		$my="DELETE FROM `material` WHERE `MNo`='$d'";
        mysqli_query($link,$my); 
				
	}
}
?>    <!---------header.php---------------->
<?php require("Template/header.php"); ?>
<style>
body .modal-content {
    /* new custom width */
    width: 560px;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left:280px;
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
                <h3>Material List</h3>
              </div>             
			  </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-5 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New Material</h2>
                     <div class="clearfix"></div>					
					</div>
   <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF"> Material Entry<h>
        <button type="button" class="close"  style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>
	<div class="modal-footer"></div>
  </div>
</div>                 <br/>
					   <div class="" role="tabpanel" data-example-id="togglable-tabs">                     
                      <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="EmployeePayment-tab">	 
                    <form action="Material_entry" class="form-horizontal form-label-left" data-parsley-validate  method="post">
                      
                      <div class="form-group"><span class="required" style="color: red;"><?php echo "$msg";?></span>
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Material Name<span class="required" style="color: red;">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="material" id="first-name" required onvalid="this.setCustomValidity('Please fill out Material Name')" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Quantity Type <span class="required" style="color: red;">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" name="qty" id="first-name" required="required" class="form-control col-md-7 col-xs-12">                           
                        </div>
                      </div>					  
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                          
                           <input type="hidden" name="aaa" class="btn btn-success" value="first">
						   <input type="submit" name="ok" class="btn btn-success" value="Submit">	
                          <button type="reset" class="btn btn-primary">Clear</button>       
                        </div>
                      </div>
                     </form>
					</div>					 
				   </div>
				  </div>
                 </div>
                </div>
              </div>          
		       <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Material List </h2>                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">              					 
                      <table id="datatable-buttons" class="table table-striped table-bordered ">
                      <thead>
                         <tr>						                  
                          <th style="text-align:center;">Material Name</th>
                          <th style="text-align:center;">Quantity Type</th>
                            <?php if($role=='admin' || $role=='manager') { ?>					
						  <th style="text-align:center;">Action</th> <?php } ?>                          
                        </tr>
                      </thead>
					   <tbody>
				<?php $sql = "SELECT * FROM `material` ";$query = mysqli_query($link,$sql); while($rs = mysqli_fetch_array($query)){ ?>
				<tr class="even pointer">           
					<td style="text-align:center;"><?php echo stripslashes($rs['material_name']); ?> </td>
					<td style="text-align:center;"><?php echo stripslashes($rs['quantitytype']); ?> </td>			
					<?php if($role=='admin' || $role=='manager') { ?> <td style="text-align:center;"> <button type="submit" id="Btn" class="p btn btn-info btn-xs" name="ids" value="<?php echo $rs['MNo'];?>">Edit</button>
					<?php if($role == 'admin') { ?>
					  <form action="Material_entry" class="form-horizontal form-label-left" data-parsley-validate  method="post" style="display:inline;">
					   <input type="hidden" name="noo" value="<?php echo stripslashes($rs['MNo']); ?> ">
					   <input type="hidden" name="hide"class="btn btn-success" value="secvalue">
	                  <input type="submit" name="send" value="Delete" class="btn btn-danger btn-xs"></td>	
	                  </form>
                	<?php } } ?>
					</td>
                    </tr>
                    <?php } ?>					                            
						</tbody>
						</table>  
						 </div>
						 </div>
						 </div>
						 </div>
						 </div>
						 </div> 
						 </div>   
        <!-- /page content -->    
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
url: "ajaxmaterial.php",
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
              dom: "frt",
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
  </body>
</html>