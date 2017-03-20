<?php
$title  ="Trip Print";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
session_start();
error_reporting(0); 
include'sconfig.php';
require'Config.php';
require'usrctrl.php';
require'images/rec.php';
$result = $link->query("select * from payment");
if($_SERVER['REQUEST_METHOD']=='POST')
{
        $dat = $_POST['date'];
		$dat1 = date("Y-m-d",strtotime(str_replace('/','-',$dat)));       
		$a1=$_POST['go'];
		$a2=$_POST['material'];
		$a3=$_POST['dealer']; 
		$a4=strtoupper($_POST['lorry']);		
		$a5=$_POST['received'];
		$a6=$_POST['frm'];
		$a7=$_POST['to'];	
		$a8=$_POST['txt'];
		$a9=$_POST['pri'];
		$a10=$_POST['rate'];
		
		//*****************submit forms************************************//

		
			 $sql = "INSERT INTO `material_in` (`date`,`time`,`Material_name`,`dealer`,`Lorry_no`,`Received_qty`,`From`,`To`,`rate`,`Totalamount`,`dealerid`,`cashier`)VALUES('$dat1','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a10','$a9','$a8','$user')";
			 if (!mysqli_query($link,$sql))
				 {die('Error: ' . mysqli_error($link));}
             	
}			
?>
   <!---------header.php---------------->
<?php require("Template/header.php"); ?>
<style>
.btn{
	margin-left:360px;
}
</style>

<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');	     
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
        mywindow.close();
        return true;
    }

</script>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	 document.location.href = "Load_entry";
	//document.body.innerHTML = restorepage;
}
</script>
 </head>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                     
                  </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Trip Slip <small>Users</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="page">
                    <div id="divToPrint">
                    <table id="datatable-buttons" class="table table-striped">
                      <thead>
                        <tr>
						<th></th>
                        <th>Abirami Construction</th>
						<th></th>
                        </tr>
                      </thead>     
					    <tbody>
						
					<?php
					   $sql1=$link->query("select * from material_in order by id desc limit 1");					   
					  while ($row = $sql1->fetch_assoc()){
						  $v = $row['date'];
	                      $da = str_replace('-', '/', $v);
                          $d = date('d-m-Y',strtotime($da));?>					 
								
                    <tr><td>Date : <?php echo $d ?></td>
					<td>Time : <?php echo $row['Time'] ?></td>
					<td>ID : <?php echo $row['id'] ?></td></tr>

					<tr><td>Dealer Name :<?php echo $row['dealer'] ?></td>
					<td>Material Name : <?php echo $row['Material_name'] ?></td>
					<td></td></tr>

					<tr><td>Received Quantity: <?php echo $row['Received_qty'] ?></td>
					<td>Total Amount: <?php echo $row['Totalamount'] ?></td>
					<td></td></tr>

					<tr><td>Lorry No:<?php echo $row['Lorry_no']?></td>
					<td>Any Suggession:</td>
					<td></td></tr> 

					<tr><td>Driver Signature:</td>
					<td></td>
					<td>Authorized Signature</td></tr><br> <?php }?>
					
                </tbody>
						</table>
						
						</div>
						
						<button class="btn btn-success"onclick="printContent('divToPrint')">Print</button>
						</div>
						</div>
						</div>
						</div>
						</div>


            <!-- /page content -->

        <!-- footer content -->
        <?php require("Template/footer.php"); ?>
		<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
				        "aaSorting": []
              dom: "",
              buttons: [
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
	</body>
	</html>