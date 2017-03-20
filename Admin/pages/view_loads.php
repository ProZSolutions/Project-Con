 
	<?php
	
	error_reporting(0); 
require'Config.php';
include'sconfig.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$go1=$_POST['id12'];
$go2=$_POST['id13'];
$date = new DateTime($go2);
$dat= $date->format('Y-m-d'); 
$go3=$_POST['id14'];
$go4=$_POST['id15'];
$go5=$_POST['id16'];
$go6=$_POST['id17'];
$go7=$_POST['id18'];
$go8=$_POST['id19'];
$go9=$_POST['id11'];

    $sql = "UPDATE `material_in` SET `date`='$dat',`Time`='$go3',`Material_name`='$go4',`Lorry_no`='$go5',`dealer`='$go6',`Received_qty`='$go7',`From`='$go8',`To`='$go9' WHERE `id` ='$go1'";
    if (!mysqli_query($link,$sql))
      {
      die('Error:'. mysqli_error($link));
      }
	 if (count($_POST["ids"]) > 0 ) {
  $all = implode(",", $_POST["ids"]);
  
}
$sql = "UPDATE `material_in` SET `delete`= '1' WHERE 1 AND id IN($all)";	
 
$query = mysqli_query($link,$sql);
	  mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ProZ Solutions | Project Con </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!--<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>-->
   

<script language="JavaScript">
	function selectAll(source) {
		checkboxes = document.getElementsByName('ids[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>
	






   <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">

              <a href="index.html" class="site_title"><i class="fa fa-paypal"></i> <span>ProZ Solutions</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
 <!-- project con to name of the user to be displayed  <?php echo'<img src="data:image/jpeg;base64,'.$ss.'" class="img-circle profile_img">'; ?>-->
            <div class="profile">
              <div class="profile_pic">
			  <img src="data:image/jpeg;base64,<?php echo $ss; ?> "alt="..." class="img-circle profile_img">
  
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2><?php echo $user; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="javascript:void(0)"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-calculator"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					 <li><a href="manage_account.php">Mangae Account</a>
                      </li>
                      <li><a href="view_payment.php">View Account</a>
                      </li>
                      <li><a href="payment.php">Payment</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-truck"></i> Material <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="View_loads.php">Manage Loads</a>
                      </li>
					  <li><a href="custom_view.php">Load Details</a>
                      </li>
                      <li><a href="Load_entry.php">Load Entry</a>
					 </li>
					  <li><a href="Material_entry.php">Material List</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-slideshare"></i> Contacts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_contact.php">View Contacts</a>
                      </li>
                      <li><a href="create_contact.php">Create Contact</a>
                      </li>
                    </ul>
                  </li>

                </ul>
              </div>
	<!--- some more menus------>
              <div class="menu_section">
                <h3>Coming Soon</h3>
                <ul class="nav side-menu">
                    </ul>
                </ul>
              </div>
			  <ul class="nav side-menu">
			  <li><a href="page_500.html"><i class="fa fa-list-alt"></i> attendance </a>
                  </li>
                    </ul>
         

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="data:image/jpeg;base64,<?php echo $ss; ?> "alt=""><?php echo $user; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

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
                    <h2>View  Materials <small>Users</small></h2>
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
<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab1" role="tab" data-toggle="tab" aria-expanded="true">Edit Loads</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab1" data-toggle="tab" aria-expanded="false">Delete Loads</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab1">
						
  
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                         <tr>
						  <th  style="text-align:center;">ID</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Time</th>
                          <th style="text-align:center;">Material_Name</th>
                          <th style="text-align:center;">Vechile_No</th>
						   <th style="text-align:center;">Dealer</th>
                          <th style="text-align:center;">Received quantity</th>
						  <th style="text-align:center;">From</th>
						  <th style="text-align:center;">To</th>
						  <th style="text-align:center;">Action</th>
						  
                        </tr>
                      </thead>
					   <tbody>
					   				<?php require'Config.php';
								
$sql = "SELECT * FROM `material_in` WHERE `delete` = '0' ";
$query = mysqli_query($link,$sql);

?>
 <?php while($rs = mysqli_fetch_array($query)){ 
	 $v = $rs['date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?>
	 
          <tr class="even pointer">
           
			 <td style="text-align:center;"><?php echo stripslashes($rs['id']); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs['Time']); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rs['Material_name']);?></td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs['Lorry_no']); ?> </td>
					 <td style="text-align:center;"><?php echo stripslashes($rs['dealer']); ?> </td>
					 	 <td style="text-align:center;"><?php echo stripslashes($rs['Received_qty']); ?> </td>
						 	 <td style="text-align:center;"><?php echo stripslashes($rs['From']); ?> </td>
							 	 <td style="text-align:center;"><?php echo stripslashes($rs['To']); ?></td>
								 <td style="text-align:center;"><button type="submit" id="Btn" class="p btn btn-info"name="ids[]"value="<?php echo $rs['id']; ?>">edit</button></td>
                                           
								   </tr>
                            	<?php } ?>			                            
						</tbody>
						</table> 			         

        </div>  
		<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">X</span>
	<div id="log"></div>
    
  </div>

</div>

		




		<div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab1">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                 <form name="input"action="<?= $_SERVER['PHP_SELF'] ?>"class="form-horizontal form-label-left" data-parsley-validate  method="post">
                        <table id="datatable-buttons3" class="table table-striped table-bordered ">
                      <thead>
                         <tr>
						 <th>
                             <input type="checkbox" id="selectall" onClick="selectAll(this)" />
                            </th>
                          <th  style="text-align:center;">ID</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Time</th>
                          <th style="text-align:center;">Material_Name</th>
						  <th style="text-align:center;">Dealer</th>
                          <th style="text-align:center;">Vechile_No</th>
                          <th style="text-align:center;">Received quantity</th>
						  <th style="text-align:center;">From</th>
						  <th style="text-align:center;">To</th>
						  
                             
                        </tr>
                      </thead>
					   <tbody>
					   				<?php
$sql = "SELECT * FROM `material_in` WHERE `delete` = '0' ";
$query = mysqli_query($link,$sql);
?>
 <?php while($rs = mysqli_fetch_object($query)){


	 ?>
          <tr class="even pointer">
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="flat" value="<?php echo stripslashes($rs->id); ?>" id="chk"></td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->id); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->Time); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rs->Material_name); ?> </td>
				 <td style="text-align:center;"><?php echo stripslashes($rs->dealer); ?> </td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs->Lorry_no); ?> </td>
					 	 <td style="text-align:center;"><?php echo stripslashes($rs->Received_qty); ?> </td>
						 	 <td style="text-align:center;"><?php echo stripslashes($rs->From); ?> </td>
							 	 <td style="text-align:center;"><?php echo stripslashes($rs->To); ?> </td>
                                   </tr>
                            <?php } ?>					                            
						</tbody>
						</table>
                
                   
                 
					
                      
                        <input type="submit" value="Delete"id="btn" class="btn btn-round btn-warning "onClick="return confirm('Do you want to delete this Item?')"disabled>
						<input type="reset" value="Cancel"class="btn btn-round btn-info">
                       
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
	
		
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Admin templates verification <a href="https://pro-z.in">ProZ Solutions</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
	 <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
	<script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
	<!-- Datatables -->
			<script>
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("input[type='submit']");
	reset = $("input[type='reset']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
reset.click(function(){
	submitButt.attr("disabled",true);
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