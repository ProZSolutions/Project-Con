<?php
session_start();
error_reporting(0); 
require'Config.php';
$id21=$_POST['id3'];
$id22=$_POST['id1'];
$id23=$_POST['id2'];

if (!$link) {
    die('Could not connect: ' . mysqli_error($con));
}


 $sql1 = "SELECT * FROM material_in WHERE Year(Date) = '$id23' and Month(Date) = '$id22' and `Material_name` = '$id21'";$result = mysqli_query($link,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
  



    <!-- Bootstrap -->
   
    <script src="js/bootstrap.min.js"></script>		

	<!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
   
  
   <!-- Custom Theme Style -->
  
  </head>

  <body class="nav-md">    

               
                 
				  <div class="table-responsive">
                   <table id="datatable-buttons" class="table table-striped table-bordered">	
				   
                      <thead>
                        <tr> 
						<th style="text-align:center;">ID</th>
						<th style="text-align:center;">DATE</th>
                          <th style="text-align:center;">TIME</th>
                          <th style="text-align:center;">MATERIAL NAME</th>
						  <th style="text-align:center;">DEALER</th>
                          <th style="text-align:center;">LORRY NO</th>
                          <th style="text-align:center;">RECEIVED QUANTITY</th>
						  <th style="text-align:center;">FROM</th>
						  <th style="text-align:center;">To</th>
                        </tr>
                      </thead>

 <?php while($rs = mysqli_fetch_object($result)){ 
$v = $rs->date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?><tbody>
          <tr>          
				<td style="text-align:center;"><?php echo stripslashes($rs->id); ?> </td>
           <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->Time); ?> </td>
			 	<td style="text-align:center;"><?php echo stripslashes($rs->Material_name); ?> </td>
				  <td style="text-align:center;"><?php echo stripslashes($rs->dealer); ?> </td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs->Lorry_no); ?> </td>
					 	<td style="text-align:center;"><?php echo stripslashes($rs->Received_qty); ?> </td>
						   <td style="text-align:center;"><?php echo stripslashes($rs->From); ?> </td>
							  <td style="text-align:center;"><?php echo stripslashes($rs->To); ?> </td></tr> <?php } ?>                                                 
                     </tbody>
                    
	
				</table>
						</div>
						
						
					

 
	
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
   
	<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
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