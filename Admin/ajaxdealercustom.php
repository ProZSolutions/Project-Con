<!DOCTYPE html>
<html>
<head>

<link href="css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
require'Config.php';

$id22=$_POST['id'];
$dat = date("Y-m-d",strtotime(str_replace('/','-',$id22)));

$id23=$_POST['name'];
$dat2 = date("Y-m-d",strtotime(str_replace('/','-',$id23)));

$id=$_POST['nam'];

?>

                 <table id="datatable-buttons2" class="table table-striped table-bordered ">
					 <thead>
                        <tr> 
						  <th style="text-align:center;">No</th>
						  <th style="text-align:center;">id</th>
						  <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Time</th>
                          <th style="text-align:center;">Material_name</th>
						  <th style="text-align:center;">dealer</th>
                          <th style="text-align:center;">Lorry_no</th>
						  <th style="text-align:center;">Received Quantity</th>
						  <th style="text-align:center;">Rate</th>
						  <th style="text-align:center;">Amount</th>
                          <th style="text-align:center;">From</th>
						  <th style="text-align:center;">To</th>
						  <th style="text-align:center;">Status</th>
						                 
                        </tr>
                      </thead>

<?php

$sql1 = "SELECT * FROM `material_in` WHERE date BETWEEN '$dat' AND '$dat2'  AND `delete`='0' AND `dealerid`='$id' ";
$query1 = mysqli_query($link,$sql1);
$i=1;
while($rs = mysqli_fetch_object($query1)){ 
$v = $rs->date;
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?>
          <tr>
             <td style="text-align:center;"><?php echo $i; ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->id); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs->Time); ?> </td>
			 	 <td style="text-align:center;"><?php echo stripslashes($rs->Material_name); ?> </td>
				  <td style="text-align:center;"><?php echo stripslashes($rs->dealer); ?> </td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs->Lorry_no); ?> </td>
					 	 <td style="text-align:center;"><?php echo stripslashes($rs->Received_qty); ?> </td>
						<td style="text-align:center;"><?php echo stripslashes($rs->rate); ?> </td>
						<td style="text-align:center;"><?php echo stripslashes($rs->Totalamount); ?> </td>
						 	 <td style="text-align:center;"><?php echo stripslashes($rs->From); ?> </td>
							 	 <td style="text-align:center;"><?php echo stripslashes($rs->To); ?> </td>  
								 			<?php $r=$rs->paid;
					                 if($r==0)
	{
    echo "<td><label disabled><font color='#ff0000'>unpaid</font></label></td>";
	} 
	else
		{
		echo "<td><label disabled><font color='#00FF00'>paid</font></label></td>";
	}
			?>

					 </tr><?php $i++; } ?>
					 
			<tr>
		   <td><font color='#FFFFFF'>i</font> </td>     	
		   <td>  </td>
		   <td>  </td>
		   <td>  </td>			        
           <td>  </td>
		   <td>  </td>			
		   <td style="text-align:center;"><b><i>Total Received Quantity</i></b></td>
			<?php
			/*$q="Select `quantitytype` From `material` where `material_name` ='$id21'";
		    $r= mysqli_query($link,$q);
			while($ro = mysqli_fetch_array($r)) {
             $s1=$ro['quantitytype'];}*/

$sql2 = "SELECT sum(Received_qty),sum(Totalamount) FROM material_in WHERE date BETWEEN '$dat' AND '$dat2' AND `delete`='0' AND `dealerid`='$id'";
$result2 = mysqli_query($link,$sql2);
while($row2 = mysqli_fetch_array($result2)) {
$s=$row2['sum(Received_qty)'];
$s1=$row2['sum(Totalamount)'];
} ?>
<td style="text-align:center;"><b><i><?php echo $s; ?></i></b> </td>

			<td> <b><i>Total Amount </i></b></td>
			<td> <b><i><?php echo $s1; ?> </i></b> </td>
			<td>  </td>
			<td>  </td>
			<td>  </td>
		   </tr>
		   </tbody>
		   </table>

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
</body>
</html>