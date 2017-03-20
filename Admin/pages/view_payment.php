<?php
session_start();
error_reporting(0); 
include'sconfig.php';
require'Config.php';
 require'usrctrl.php';
  require'images/rec.php';
$result = $link->query("select * from `payment`");
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
<script language="JavaScript">
	function selectAll(source) {
		checkboxes = document.getElementsByName('ids[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>
	<!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  
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
 <!-- project con to name of the user to be displayed -->
            <div class="profile">
              <div class="profile_pic">
                <img src="data:image/jpeg;base64,<?php echo $ss; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
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
                      <li><a href="view_payment.php">View Accounts</a>
                      </li>
                      <li><a href="payment.php">Payment</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-truck"></i> Material <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="View_loads.php">View Loads</a>
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
                    <img src="data:image/jpeg;base64,<?php echo $ss; ?>" alt=""><?php echo $user; ?>
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
                <h3>
                      Users
                      <small>
                          Some examples to get you started
                      </small>
                  </h3>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Accounts <small>Users</small></h2>
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
				  <div class="table-responsive">
                       <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="selectall" onClick="selectAll(this)"/>
                            </th>
                            <th class="column-title">DATE </th>
                            <th class="column-title">NAME</th>
                            <th class="column-title">DESIGNATION </th>
                            <th class="column-title">PAYMENT TYPE </th>
                            <th class="column-title">AMOUNT</th>
                            <th class="column-title">REMARKS</th>
                            
                            </th>
                            
                          </tr>
                        </thead>
                    
                    
					   <tbody>
						   <?php
                            while ($row = $result->fetch_assoc()) 
		            {
						$v = $row['Date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da));?>
					
                  <tr>
					
                            <td class="a-center ">
                              <input type="checkbox" name="ids[]" class="flat" value="" >
                            </td>
                          <td><?php echo $d; ?></td>
                          <td><?php echo $row['Name']; ?></td>
                          <td><?php echo $row['Designation']; ?></td>
                          <td><?php echo $row['Payment_type']; ?></td>
                          <td><?php echo $row['Amount']; ?></td>
						  <td><?php echo $row['Remarks']; ?></td>
                          
                        </tr> 
                  
               
				<?php	}  ?>
                       
                      
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
	<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                
                {
                  extend: "excel",
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
    <!-- /Datatables -->
  
	
  </body>
</html>