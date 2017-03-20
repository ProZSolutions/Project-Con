<?php
$title  ="Load Entry";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";	
error_reporting(0); 
require'MainConfig.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$go =$_POST['id11'];
$go1=$_POST['id12'];
$date = new DateTime($go1);
$dat= $date->format('Y-m-d'); 
$go3=$_POST['id13'];
$qty=$_POST['id14'];
$rate=$_POST['id15'];
$tot=$_POST['id16'];
$go7=$_POST['id17'];

 $tmpName  = $_FILES['img']['tmp_name']; 
      $fp = fopen($tmpName, 'r');
      $adata = fread($fp, filesize($tmpName));
      fclose($fp);
      $adata = addslashes($adata);
if($adata==""){
    $sql = "UPDATE `stockentry` SET `Date`='$dat',`Itemname`='$go3',`Quantity`='$qty',`Rate`='$rate',`Discount`='$go7',`Total`='$tot' WHERE `stno` ='$go'";
}else
	{ $sql = "UPDATE `stockentry` SET `Date`='$dat',`Itemname`='$go3',`Quantity`='$qty',`Rate`='$rate',`Discount`='$go7',`Total`='$tot',`Bill`='$adata' WHERE `stno` ='$go'";
	}
    if (!mysqli_query($link,$sql))
      {
      die('Error:'. mysqli_error($link));
      }
	 if (count($_POST["ids"]) > 0 ) {
  $all = implode(",", $_POST["ids"]);
  
}
$sql = "UPDATE `stockentry` SET `del`= '1' WHERE 1 AND stno IN($all)";	
 
$query = mysqli_query($link,$sql);
	  mysqli_close($link);
}

?>
   <!---------header.php---------------->
<?php require("Template/header.php"); ?>
<!---------body.php---------------->

<style>
.click{
	margin-left: 390px;
}
</style>
</head>
<?php require("Template/body.php"); ?>   
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Stocks Handling</h3>
              </div>              
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Stocks </h2>                  
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
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab1"> <?php } ?>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                         <tr>
						  <th  style="text-align:center;">No</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Itemname</th>
                          <th style="text-align:center;">Quantity</th>
                          <th style="text-align:center;">Rate</th>
						  <th style="text-align:center;">Discount</th>
                          <th style="text-align:center;">Total</th>	
						  <?php if($role=='admin' || $role=='manager') { ?>
			              <th style="text-align:center;">Action</th>	
						   <?php } ?>     
                        </tr>
                      </thead>
					   <tbody>
<?php 
require'Config.php';
$sql = "SELECT * FROM `stockentry` Where `del`='0'";
$query = mysqli_query($link,$sql);
$j=1;
  while($rs = mysqli_fetch_array($query)){ 
	 $v = $rs['Date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da)); 
	 ?>	 
          <tr class="even pointer">           
			 <td style="text-align:center;"><?php echo stripslashes($j); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			 <td style="text-align:center;"><?php echo stripslashes($rs['Itemname']);?></td>
				 	 <td style="text-align:center;"><?php echo stripslashes($rs['Quantity']); ?> </td>
					 <td style="text-align:center;"><?php echo stripslashes($rs['Rate']); ?> </td>
					 	  <td style="text-align:center;"><?php echo stripslashes($rs['Discount']); ?> </td>
						  <td style="text-align:center;"><?php echo stripslashes($rs['Total']); ?> </td>
						  <?php if($role=='admin' || $role=='manager') { ?>
						 <td style="text-align:center;"><button type="submit" id="Btn" class="p btn btn-info btn-xs"name="ids[]"value="<?php echo $rs['stno']; ?>">edit</button></td>
                                <?php } ?>                 
								   </tr>
                            	<?php $j++; } ?>			                            
						</tbody>
						</table> 
						</div>  
 <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF">Stock Edit<h>
        <button type="button" class="close" style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>  
	<div class="modal-footer"></div>
  </div>
</div>
</div>

  <?php if($role=='admin' ) { ?>
		<div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="search-tab1">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                 <form name="input"action="<?= $_SERVER['PHP_SELF'] ?>"class="form-horizontal form-label-left" data-parsley-validate  method="post">
                        <table id="datatable-buttons3" class="table table-striped table-bordered ">
                      <thead>
                         <tr>
						  <th style="text-align:center;">
                          <input type="checkbox" id="show"class="all"/>
                          </th>
                          <th style="text-align:center;">No</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Itemname</th>
						  <th style="text-align:center;">Quantity</th>
                          <th style="text-align:center;">Rate</th>
						  <th style="text-align:center;">Discount</th>
                          <th style="text-align:center;">Total</th>                      
                        </tr>
                      </thead>
					   <tbody>
<?php
$sql = "SELECT * FROM `stockentry` Where `del`='0'";
$query = mysqli_query($link,$sql);
$i=1;
 while($rs = mysqli_fetch_object($query)){
	 ?>
          <tr class="even pointer">
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="flat clg" value="<?php echo stripslashes($rs->stno); ?>" id="chk"></td>
			 <td style="text-align:center;"><?php echo stripslashes($i); ?> </td>
              <td style="text-align:center;"><?php echo stripslashes($d); ?> </td>
			   <td style="text-align:center;"><?php echo stripslashes($rs->Itemname); ?> </td>
				<td style="text-align:center;"><?php echo stripslashes($rs->Quantity); ?> </td>
				 <td style="text-align:center;"><?php echo stripslashes($rs->Rate); ?> </td>
				  <td style="text-align:center;"><?php echo stripslashes($rs->Discount); ?> </td>
                   <td style="text-align:center;"><?php echo stripslashes($rs->Total); ?> </td>	
				   </tr>
                   <?php $i++;} ?>					                            
						</tbody>
						</table>              
                        <input type="submit" value="Delete"id="btn" class="btn btn-round btn-warning click"onClick="return confirm('Do you want to delete this Item?')"disabled>
						<input type="reset" value="Cancel"class="btn btn-round btn-info"id="can">
						</form>
						</div>                 
                      </div>   <?php } ?>                 
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
url: "ajaxeditstock.php",
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
              dom: "frtp",
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
              dom: "frtp",
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