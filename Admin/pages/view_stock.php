<?php
$title  ="View Stock";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
session_start();
error_reporting(0);
require'MainConfig.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$id22=$_POST['date'];
$dat = date("Y-m-d",strtotime(str_replace('/','-',$id22)));

$id23=$_POST['date1'];
$dat2 = date("Y-m-d",strtotime(str_replace('/','-',$id23)));

$id=$_POST['item'];
$id2=$_POST['to'];
 }
?>
        
<!-- header.php -->
<?php require("Template/header.php"); ?>
<style>
body .modal {
    /* new custom width */
    width: 560px;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left:280px;
}
</style>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
    window.close();	
	document.body.innerHTML = restorepage;
}
</script>
</head><!-- body.php -->
<?php require("Template/body.php"); ?>    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Stock Details</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
				  <h2>View Stock List</h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <br/>
				   <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Custom View Stock</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">View Stock</a>
                        </li>						
                      </ul>
					  <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="new-tab">
                         <form name="input" action="view_stock" class="form-horizontal form-label-left" data-parsley-validate  method="post">  
                        <label>Item <span class="required" style="color: red;">*</span>
                        </label>  
						 <select id="DropDown" name="item">
        				<option>Select Item</option>
						<?php $result1 = $link->query("select stockname from stocklist"); while ($row1 = $result1->fetch_assoc())  { $id1 = $row1['stockname'];
                         echo '<option>'.$id1.'</option>';  } ?> 
					</select>
					<label>From <span class="required" style="color: red;">*</span>
                        </label>  
                          <input id="date" name="date" class="date-picker " required="required" type="text" > 
                        <label>To <span class="required" style="color: red;">*</span></label>                
                          <input id="date1" name="date1" class="date-picker " required="required" type="text" >             
                         <input class="btn btn-primary btn-xs" type="submit" name="to" id="dat" value="Go">
                        </form>
                       <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
						<thead><tr>
<th style="text-align:center;">No</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Itemname</th>
<th style="text-align:center;">Quantity</th>
<th style="text-align:center;">Rate</th>
<th style="text-align:center;">Discount</th>
<th style="text-align:center;">Total</th>
</tr>
</thead>
<?php if($id2 =='Go'){	if($id=="Select Item"){$result = $link->query("SELECT * FROM `stockentry` WHERE Date BETWEEN '$dat' AND '$dat2' AND `del`='0'");}
else{$result = $link->query("SELECT * FROM `stockentry` WHERE Date BETWEEN '$dat' AND '$dat2' AND `del`='0' AND `Itemname`='$id'"); } $i=1;
 while ($row = $result->fetch_assoc()){ $v = $row['Date'];	$da = str_replace('-', '/', $v); $d = date('d-m-Y',strtotime($da)); ?>
<tr>                      <td style="text-align:center;"><?php echo $i; ?></td>
                          <td style="text-align:center;"><?php echo $d; ?></td>
                          <td style="text-align:center;"><?php echo $row['Itemname'] ; ?></td>
                          <td style="text-align:center;"><?php echo $row['Quantity'] ; ?></td>
                          <td style="text-align:center;"><?php echo $row['Rate'] ; ?> </td>
						  <td style="text-align:center;"><?php echo $row['Discount']; ?></td>						   
						  <td style="text-align:center;"><?php echo $row['Total'];?></td>	<?php $i++; } ?>		 
                        </tr><tr>
		   <td><font color='#FFFFFF'>i</font> </td>     
		   <td>  </td>			
		   <td style="text-align:center;"><b><i>Total Received Quantity</i></b></td>
			<?php	
if($id=="Select Item")
	{
$sql2 = "SELECT sum(Quantity),sum(Total) FROM stockentry WHERE Date BETWEEN '$dat' AND '$dat2' AND `del`='0'";
	}
	else
	{
		$sql2 = "SELECT sum(Quantity),sum(Total) FROM stockentry WHERE Date BETWEEN '$dat' AND '$dat2' AND `del`='0' AND `Itemname`='$id' ";
	}
$result2 = mysqli_query($link,$sql2);
while($row2 = mysqli_fetch_array($result2)) {
$s=$row2['sum(Quantity)'];
$s1=$row2['sum(Total)'];
} ?>
<td style="text-align:center;"><b><i><?php echo $s; ?></i></b> </td>

			<td> </td>
			<td> <b><i>Total Amount </i></b> </td>
			<td> <b><i><?php echo $s1; ?> </i></b> </td>
			
		   </tr>
                 <?php } ?>     
                    </table>
                  </div>
                  </div>
				  </div>
				   <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="designation-tab">
                   <div class="col-md-12 col-sm-12 col-xs-12">
<div id="myModal" class="modal">  
  <div class="modal-content">
   <span class="close">X</span>
   <div id="log"></div>    
  </div>
  </div>		  
                 
	  
                  
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                        <table id="datatable-buttons1" class="table table-striped table-bordered">
                      
<thead>
<tr>
<th style="text-align:center;">No</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Itemname</th>
<th style="text-align:center;">Quantity</th>
<th style="text-align:center;">Rate</th>
<th style="text-align:center;">Discount</th>
<th style="text-align:center;">Total</th>
<th style="text-align:center;">Bill</th>


</tr>
</thead>
<?php $result = $link->query("select * from stockentry where `del`='0'");
$i=1;
 while ($row = $result->fetch_assoc()){
  	 $v = $row['Date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da));?>
<tr>                      <td style="text-align:center;"><?php echo $i; ?></td>
                          <td style="text-align:center;"><?php echo $d; ?></td>
                          <td style="text-align:center;"><?php echo $row['Itemname'] ; ?></td>
                          <td style="text-align:center;"><?php echo $row['Quantity'] ; ?></td>
                          <td style="text-align:center;"><?php echo $row['Rate'] ; ?> </td>
						  <td style="text-align:center;"><?php echo $row['Discount']; ?></td>						   
						  <td style="text-align:center;"><?php echo $row['Total'];?></td>
						  <td style="text-align:center;"><button type="submit" id="Btn" class="p btn btn-info btn-xs" name="ids" value="<?php echo $row['stno'];?>">View Bill</button></td> 			 
                        </tr>
                      <?php $i++; } ?>
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
		  <div class="clearfix"></div>
        </div>
		</div>
       </div>
		</div>
     

       <!-- /page content -->
		<?php require("Template/footer.php"); ?> 
 <script>
      $(document).ready(function() {
        $('#date').daterangepicker({
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
        $('#date1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
			  maxDate: new Date
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>
     <script type="text/javascript">
window.onload=function(){
displayDate();
displayDate1();
}
function displayDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (day) + "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date").value = today;
}
function displayDate1() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (day) + "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date1").value = today;
}
</script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "excelFlash",
                  className: "btn btn-success"
                },
                
                {
                  extend: "print",
                  className: "btn btn-primary"
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
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "excelFlash",
                  className: "btn btn-success"
                },
                
                {
                  extend: "print",
                  className: "btn btn-primary"
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
url: "ajaxviewbill.php",
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
    modal.style.display = "none";}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <!---/Date--->
  </body>
</html>