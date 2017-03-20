<?php 
$title  ="Payment print";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";

require 'MainConfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
	    $dat1 = $_POST['date'];
		 $dat = date("Y-m-d",strtotime(str_replace('/','-',$dat1)));
       
        $time1 = $_POST['go1'];
       	$name1 = $_POST['labname1'];//name	
	
		$qnty1 = "Labour";//designation
		
		$txt11 = $_POST['txt1'];//design Type
		
		$pay11 = $_POST['amt1'];//amount
	
		$pay = $_POST['nam1'];//payment type
		
		$remark1 = $_POST['remark1'];//remarks

		$remark11 = $_POST['txt21'];//employee id

		$advance = $_POST['labcredit'];//advance amount
	
		$debit = $_POST['labdebit'];//debit amount
		
		$minusbalance = $_POST['labbalance'];//minus balance
	
		$minusadvance = $_POST['labadvance'];//minus advance
	
		$orgbal1 = $_POST['add1'];//org balance

		$orgadv1 = $_POST['sub1'];//org advance

$debitamount = $pay11 +$debit;
$upadv	= $orgadv1-$minusadvance; 
$advpay = $pay11+$minusadvance;
$upbal = $orgbal1-$minusbalance;
$balpay = $pay11-$minusbalance;

if (count($_POST["ids"]) > 0 ) 
	{ 
$o=$_POST["ids"];
$resu = count($o);	  
$all = implode(",", $o); 
    }
$nam1="firstone";

if(isset($_POST['ok'])) {
  $data1 = $_POST['aaa'];	
if($nam1==$data1)
	{     
	if($pay == '' && $advance == '' && $debit =='' && $minusbalance =='' && $minusadvance =='')
			{

		$sql = "UPDATE `labour_attend` SET `status`= '1' WHERE 1 AND A_L_no IN($all)";	 
        mysqli_query($link,$sql); 

		 $sqq2 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Designation`,`Payment_type`,`Design_ty`,`Totalamount`,`Remarks`,`Cashier`,`empid`)
              VALUES('$dat','$time1','$name1','$qnty1','Salary','$txt11','$pay11','$remark1','$user','$remark11')";
        mysqli_query($link,$sqq2);
		
			}
	if($pay=="Advance")
		{
		 $sql3 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Designation`,`Design_ty`,`Payment_type`,`Amount`,`Remarks`,`Cashier`,`empid`)
        VALUES('$dat','$time1','$name1','$qnty1','$txt11','$pay','$pay11','$remark1','$user','$remark11 ')";
          mysqli_query($link,$sql3);

		 $sqq2 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Designation`,`Payment_type`,`Design_ty`,`A_credit`,`A_debit`,`Totalamount`,`Remarks`,`Cashier`,`empid`)
              VALUES('$dat','$time1','$name1','$qnty1','advance','$txt11','$advance','$debit','$pay11','$remark1','$user','$remark11')";
        mysqli_query($link,$sqq2);	
			
		}
		else{
	if($pay=="Pending")
		{ 
		 $sql4 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Designation`,`Design_ty`,`Payment_type`,`Amount`,`Remarks`,`Cashier`,`empid`)
        VALUES('$dat','$time1','$name1','$qnty1','$txt11','$pay','$debit','$remark1','$user','$remark11 ')";
          mysqli_query($link,$sql4);

		  $sql = "UPDATE `labour_attend` SET `status`= '1' WHERE 1 AND A_L_no IN($all)";	 
        mysqli_query($link,$sql); 

		 $sqq5 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Designation`,`Payment_type`,`Design_ty`,`A_credit`,`b_debit`,`Amount`,`Totalamount`,`Remarks`,`Cashier`,`empid`)
              VALUES('$dat','$time1','$name1','$qnty1','Salary','$txt11','$advance','$debit','$debitamount','$pay11','$remark1','$user','$remark11')";
        mysqli_query($link,$sqq5);	
		
		}
	if($minusadvance != 0)	
			{
		$del= "DELETE FROM dealerpayment WHERE `Name`='$name1' AND `Designation`='Labour' AND `Payment_type`= 'Advance'";
		mysqli_query($link,$del);

		$sql = "UPDATE `labour_attend` SET `status`= '1' WHERE 1 AND A_L_no IN($all)";	 
        mysqli_query($link,$sql); 
                                     
		 $sql6 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Designation`,`Payment_type`,`Design_ty`,`Amount`,`Remarks`,`Cashier`,`empid`)
        VALUES('$dat','$time1','$name1','$qnty1','Advance','$txt11','$upadv','$remark1','$user','$remark11 ')";
         if(!mysqli_query($link,$sql6))
		   {
                                         die('Error: ' . mysqli_error($link));
                                      }

		 $sqq7 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Designation`,`Payment_type`,`Design_ty`,`A_credit`,`A_debit`,`Amount`,`Totalamount`,`Remarks`,`Cashier`,`empid`)
              VALUES('$dat','$time1','$name1','$qnty1','Salary','$txt11','$advance','$minusadvance','$advpay','$pay11','$remark1','$user','$remark11')";
        if(!mysqli_query($link,$sqq7))
		   {
                                         die('Error: ' . mysqli_error($link));
                                      }
			}
if($minusbalance != 0)
			{
	        $del= "DELETE FROM dealerpayment WHERE `Name`='$name1' AND `Designation`='Labour' AND `Payment_type`= 'Pending'";
		    mysqli_query($link,$del);

			$sql = "UPDATE `labour_attend` SET `status`= '1' WHERE 1 AND A_L_no IN($all)";	 
        mysqli_query($link,$sql); 

		 $sql6 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Designation`,`Design_ty`,`Payment_type`,`Amount`,`Remarks`,`Cashier`,`empid`)
        VALUES('$dat','$time1','$name1','$qnty1','$txt11','Pending','$upbal','$remark1','$user','$remark11 ')";
          mysqli_query($link,$sql6);

		 $sqq7 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Designation`,`Payment_type`,`Design_ty`,`b_credit`,`Amount`,`Totalamount`,`Remarks`,`Cashier`,`empid`)
              VALUES('$dat','$time1','$name1','$qnty1','Salary','$txt11','$minusbalance','$balpay','$pay11','$remark1','$user','$remark11')";
        mysqli_query($link,$sqq7);
			}



		                
	}  
	} 
				 
				 
		}


	?>
 <!---------header.php---------------->
<?php require("Template/header.php"); ?>
<!---------body.php---------------->

<style>
.auto-style1 {
	margin-left: 555px;
}
.auto-style {
	margin-left: 450px;
}
.auto-style2 {
	margin-left: 900px;
}
.buttons-excel{
  background-color: Olive ;
  color: white;
}
</style>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	window.close();
	 document.location.href = "payment";
	//document.body.innerHTML = restorepage;
}
</script>
 </head>

<?php require("Template/body.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>

             
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                  <div class="x_title">
                    <h2>Plain Page</h2>
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
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					</div>
					<div id="divToPrint">


<?php
$sql1=$link->query("select * from `payment` order by sno desc limit 1");						 
while ($row = $sql1->fetch_assoc()){
	$v = $row['Date'];
	$da = str_replace('-', '/', $v);
    $d = date('d-m-Y',strtotime($da));
	$one  = $row['A_credit'];
	$two  = $row['A_debit'];
	$three = $row['b_credit'];
	$four = $row['b_debit'];
	$subtot = $row['Amount'];
	$total = $row['Totalamount'];
	

		
	if($one != 0)
			{
?>
<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date : <?php echo $d;?></td>
				<td>Time : <?php echo $row['Time']; ?></td>				
				<td></td></tr>
				<tr>
			    <td>Labour Name :<?php echo $row['Name'];?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount: </td>
				<td>Advance Amount : <?php echo $one ;?></td>
				<td>Grand Total : <?php echo $total;?></td>
				</tr>
				<tr>
				<td style="text-align:center;">Labour Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr>
				<tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>
<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label><br></p>
<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:330px">Time <?php echo $row['Time']?></label><br><p>
<label style="margin-left:10px">Labour Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label><br></p><p><div></label></p><p></br></br>
<label style="margin-left:100px">Total Amount<label style="margin-left:10px">:</label></label>
<label style="margin-left:100px">Advance Amount<label style="margin-left:8px">:<?php echo $one;?></label></label></p><p>
<label style="margin-left:100px">Grand Total<label style="margin-left:16px">:<?php echo $total;?></label></label></p></br></br>
<p><label style="margin-left:550px">Signature</label></p>
<label style="margin-left:560px"><?php echo $row['Cashier']; ?></label--><?php } if($two != 0) {?>

<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date : <?php echo $d;?></td>
				<td>Time : <?php echo $row['Time']; ?></td>				
				<td></td></tr>
				<tr>
				<td>Labour Name : <?php echo $row['Name'];?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount : <?php echo $subtot;?></td>
				<td>Paid From Advance Amount : <?php echo $two ;?></td>
				<td>Grand Total : <?php echo $total;?></td>
				</tr>
				<tr>
				<td style="text-align:center;">Labour Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr>
				<tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>


<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label><br></p>
<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:300px">Time <?php echo $row['Time']?></label><br><p>
<label style="margin-left:10px">Labour Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label><br></p><p><div></label></p></br></br><p>
<label style="margin-left:100px">Total Amount<label style="margin-left:8px">:<?php echo $subtot;?></label></label>
<label style="margin-left:100px">Debit From Advance Amount<label style="margin-left:8px">:<?php echo $two;?></label></label></p><p>
<label style="margin-left:100px">Grand Total<label style="margin-left:18px">:<?php echo $total;?></label></label></p></br></br>
<p><label style="margin-left:550px">Signature</label></P>
<label style="margin-left:560px"><?php echo $row['Cashier']; ?></label--><?php } if($three != 0) {?>

<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date :<?php echo $d;?></td>
				<td>Time :<?php echo $row['Time']; ?></td>		
				<td></td></tr>
				<tr>
				<td>Labour Name :<?php echo $row['Name'];?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount :<?php echo $subtot;?></td>
				<td>Paid From Pending Amount :<?php echo $three ;?></td>
				<td>Grand Total :<?php echo $total;?></td>
				</tr>
				<tr>
				<td style="text-align:center;">Labour Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr><tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>

<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label><br></p>
<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:300px">Time <?php echo $row['Time']?></label><br><p>
<label style="margin-left:10px">Labour Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label><br></p><p><div></label></p></br></br><p>
<label style="margin-left:100px">Total Amount<label style="margin-left:8px">:<?php echo $subtot;?></label></label>
<label style="margin-left:100px">Paid From Pending Amount<label style="margin-left:8px">:<?php echo $three;?></label></label></p><p>
<label style="margin-left:100px">Grand Total<label style="margin-left:18px">:<?php echo $total;?></label></label></p></br></br>
<p><label style="margin-left:550px">Signature</label></P>
<label style="margin-left:560px"><?php echo $row['Cashier']; ?></label--><?php  }  if($four != 0) {?>

<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date :<?php echo $d;?></td>
				<td>Time :<?php echo $row['Time']; ?></td>
				<td></td></tr><tr>
				<td>Labour Name :<?php echo $row['Name'];?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount : <?php echo $subtot;?></td>
				<td>Debit Amount : <?php echo $four ;?></td>
				<td>Grand Total : <?php echo $total;?></td>
				</tr>
				<tr>
				<td style="text-align:center;">Labour Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr>
				<tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>

<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label><br></p>
<label style="margin-left:10px">Date <label style="margin-left:80px">:<?php echo $d;?></label></label><label style="margin-left:330px">Time <?php echo $row['Time']?></label><br><p>
<label style="margin-left:10px">Labour Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label><br></p><p><div></label></p><p></br></br>
<label style="margin-left:100px">Total Amount<label style="margin-left:8px">:<?php echo $subtot;?></label></label>
<label style="margin-left:100px">Debit Amount<label style="margin-left:8px">:<?php echo $four;?></label></label></p><p>
<label style="margin-left:100px">Grand Total<label style="margin-left:18px">:<?php echo $total;?></label></label></p></br></br>
<p><label style="margin-left:550px">Signature</label></p>
<label style="margin-left:560px"><?php echo $row['Cashier']; ?></label--><?php } if($one == 0 && $two== 0 && $three== 0 && $four== 0) {?>



<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date :<?php echo $d;?></td>
				<td>Labour Name :<?php echo $row['Name'];?></td>
				<td></td></tr><tr>
				<td></td>
				<td></td>
				<td></td></tr><tr>
				<td>Total Amount :<?php echo $total;?></td>
				<td>Advance Amount :</td>
				<td>Grand Total :<?php echo $total;?></td>
				</tr>
				<tr>
				<td style="text-align:center;">Labour Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr><tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>
<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label><br></p>
<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:300px">Time <?php echo $row['Time']?></label><br><p>
<label style="margin-left:10px">Labour Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label><br></p><p><div></label></p></br></br><p>
<label style="margin-left:100px">Total Amount<label style="margin-left:16px">:<?php echo $total;?></label></label>
<label style="margin-left:100px">Advance Amount<label style="margin-left:8px">:</label></label></p><p>
<label style="margin-left:100px">Grand Total<label style="margin-left:18px">:<?php echo $total;?></label></label></p></br></br>
<p><label style="margin-left:550px">Signature</label></P>
<label style="margin-left:560px"><?php echo $row['Cashier']; ?></label--><?php } } } ?>
                 
                </div>
				<button class="btn btn-success" onclick="printContent('divToPrint')">Print</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

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