<?php 
$title  ="Payment print";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);

require 'MainConfig.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{ 
$aa=$_POST['date']; //get date
$dat1 = date("Y-m-d",strtotime(str_replace('/','-',$aa))); 
$time=$_POST['time']; //get Time
$dealer=$_POST['abc']; //get dealer name
$tw=$_POST['two']; //get designation(dealer or employee)
$mob1=$_POST['amount']; //amount
$cree=$_POST['credit'];
$debi=$_POST['debit']; 
$design2=$_POST['nam']; //payment for----advance or pending

$bal=$_POST['balance'];//get from balance amount

$advance=$_POST['advance'];//get from advance amount

$orgadv=$_POST['sub'];//get original adv amount

$orgbal=$_POST['add'];//get original bal amount

$mo1=$_POST['re']; //get remarks
$mo=$_POST['one'];//get dealerid
$bal1=$mob1-$bal;
$tot=$mob1-$debi;
$tot1=$mob1+$debi;
$bal2=$mob1+$advance;
$upadv=$orgadv-$advance;
$upbal=$orgbal-$bal;
if (count($_POST["ids"]) > 0 ) 
	{ 
$o=$_POST["ids"];
$resu = count($o);	  
$all = implode(",", $o); 
    }

$nam2="secondone";
if (isset($_POST['ok1']))
$data1 = $_POST['second'];
{
		if($data1==$nam2)
		{

			if($design2 == '' && $cree== '' && $debi=='' && $bal=='' && $advance=='')
			{ 
				 $sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
            mysqli_query($link,$sql); 
			 
				$sqq9 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Payment_type`,`Design_ty`,`A_credit`,`A_debit`,`Amount`,`Totalamount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','Bill','$tw','$cree','$advance','$mob1','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq9);	
			}
			/*if($design2 != '')
			{
					$sqq3 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Design_ty`,`credit`,`debit`,`Amount`,`Totalamount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','6','$dealer','$tw','$cree','$debi','$mob1','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq3);
			}	*/	
			
    if($design2=="Advance")
			{ $sqq = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Design_ty`,`Payment_type`,`Amount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','$tw','$design2','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq);

		$sqq2 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Design_ty`,`Payment_type`,`A_credit`,`A_debit`,`Totalamount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','$tw','Advance','$cree','$advance','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq2);	
			}
			if($design2=="Pending")
			{
				 $sqq1 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Design_ty`,`Payment_type`,`Amount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','$tw','$design2','$debi','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq1);  

		  $sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
            mysqli_query($link,$sql); 

		$sqq2 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Payment_type`,`Design_ty`,`b_credit`,`b_debit`,`Amount`,`Totalamount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','Bill','$tw','$cree','$debi','$tot1','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq2);
			}
			
	
	if($advance != '')
	{
		 $del= "DELETE FROM dealerpayment WHERE `Name`='$dealer' AND `Design_ty`='Dealer' AND `Payment_type`= 'Advance'";
		    mysqli_query($link,$del);
				$sqq6 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Design_ty`,`Payment_type`,`Amount`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','$tw','Advance','$upadv','$user','$mo')";
        mysqli_query($link,$sqq6);

  $sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
            mysqli_query($link,$sql); 

		$sqq4 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Payment_type`,`Design_ty`,`A_credit`,`A_debit`,`Amount`,`Totalamount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','Bill','$tw','$cree','$advance','$bal2','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq4);
	}
if($bal != '')
	{
           $del1= "DELETE FROM dealerpayment WHERE `Name`='$dealer' AND `Design_ty`='dealer' AND `Payment_type`= 'Pending'";
		    mysqli_query($link,$del1);

				$sqq7 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Design_ty`,`Payment_type`,`Amount`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','$tw','Pending','$upbal','$user','$mo')";
        mysqli_query($link,$sqq7);

  $sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
            mysqli_query($link,$sql); 

		$sqq4 = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Payment_type`,`Design_ty`,`b_credit`,`b_debit`,`Amount`,`Totalamount`,`Remarks`,`no_of_loads`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$dealer','Bill','$tw','$bal','$debi','$bal1 ','$mob1','$mo1','$resu','$user','$mo')";
        mysqli_query($link,$sqq4);
			}
		
	}
	}
   /*   if($adv!="")
		{
		   $del= "DELETE FROM dealerpayment WHERE `Name`='$design1' AND `Design_ty`='dealer'";
		    mysqli_query($link,$del);
			$sqq1 = "INSERT INTO `dealerpayment` (`Date`,`Time`,`Name`,`Design_ty`,`Amount`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$design1','$tw','Advance','$add1','$user','$mo')";
        mysqli_query($link,$sqq1);
			
		    $sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
            mysqli_query($link,$sql); 

          $sqq = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Design_ty`,`Amount`,`Remarks`,`no_of_loads`,`Cre`,`Dre`,`Cashier`,`empid`)
                  VALUES('$dat1','$time','$design1','$tw','$design2','$mob1','$mo1','$resu','$cree','$adv','$user','$mo')";
        mysqli_query($link,$sqq);

}
else
		{
	$sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
 mysqli_query($link,$sql); 
//if u want deale id 

  $sq = "INSERT INTO `payment` (`Date`,`Time`,`Name`,`Design_ty`,`Amount`,`Remarks`,`no_of_loads`,`Cre`,`Dre`,`Cashier`,`empid`)
    VALUES('$dat1','$time','$design1','$tw','$design2','$mob1','$mo1','$resu','$cree','$debi','$user','$mo')";
    if (!mysqli_query($link,$sq))
      {
      die('Error: ' . mysqli_error($link));
      }
	            
		}
			}

		}
}*/
	
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
        mywindow.document.write('</head><body >');
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
	 document.location.href = "payment";
	//document.body.innerHTML = restorepage;
}
</script>
</head>
<?php require("Template/body.php"); ?>
  
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
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

<!--<table id="datatable-buttons" class="table table-striped">
                      <thead>
                        <tr>
						<th></th>
                        <th>Construction Company</th>
						<th></th>
                        </tr>
                      </thead>     
					    <tbody>
					<?php
					   $sql1=$link->query("select * from `payment` order by sno desc limit 1");	
					 
					  while ($row = $sql1->fetch_assoc()){
						  $v = $row['Date'];
	$da = str_replace('-', '/', $v);
$d = date('d-m-Y',strtotime($da));
$nam1=$row['Amount'];
$nam2=$row['Cre'];
$nam3=$row['Dre'];
$cre=$nam1-$nam2;
$dre=$nam1+$nam3;
 if($nam2=="0")
				{								
                			
                    echo "<tr><td>DATE :$d</td> <td>TIME :{$row['Time']}</td> <td>Dealer Name:{$row['Name']}</td></tr>
					<tr><td colspan='3'>Bill No :$all</td><td></td><td></td></tr>
					
					<tr><td>Total Amount: $dre</td><td>Debit:$nam3</td><td></td></tr>
					<tr><td></td><td>Grand Total: $nam1</td><td></td></tr>
					<tr><td> </td><td></td><td style='text-align:center;'>SIGNNATURE</td></tr>
					<tr><td> </td><td></td><td style='text-align:center;'>{$row['Cashier']}</td></tr><br> "; 
					  }
else
			  {
			
                    echo "<tr><td>DATE :$d</td> <td>TIME :{$row['Time']}</td> <td>Dealer Name:{$row['Name']}</td></tr>
					<tr><td colspan='3'>Bill No :$all</td><td></td><td></td></tr>
					
					<tr><td>Total Amount: $cre</td><td>Extra:$nam2</td><td></td></tr>
					<tr><td></td><td>Grand Total: $nam1</td><td></td></tr>
					<tr><td> </td><td></td><td style='text-align:center;'>SIGNNATURE</td></tr>
					<tr><td> </td><td></td><td style='text-align:center;'>{$row['Cashier']}</td></tr><br> ";
					 }

					  }		
					?>
                </tbody>
						</table>
</form-->
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


				if($one != 0){?>
				<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date : <?php echo $d;?></td>
				<td>Dealer Name : <?php echo $row['Name'];?></td>
				<td>Time : <?php echo $row['Time'];?></td></tr>
				<tr>
				<td colspan="2">Bill No : <?php echo $all;?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Advance Amount : <?php echo $one ;?></td>
				<td>Grand Total : <?php echo $total;?></td>
				<td></td></tr>
				<tr>
				<td style="text-align:center;">Dealer Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr>
				<tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>
<!--<p><label id="Label1" style="margin-left:250px">COMPANY NAME</label></br> </br> </br></p>

<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:300px">Time <?php echo $row['Time']?></label></br></br></br>
<p>
<label style="margin-left:10px">Dealer Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label></br></br></br></p>
<p><label style="margin-left:10px">Bill No :<?php echo $all;?></label></p><p></br></br></br>


<label style="margin-left:100px">Total Amount<label style="margin-left:10px">:</label></label>
<label style="margin-left:100px">Advance Amount<label style="margin-left:8px">: <?php echo $one ;?></label></label></p><p>
<label style="margin-left:100px">Grand1 Total<label style="margin-left:16px">: <?php echo $total;?></label></label></p>
<div><label style="margin-left:550px">Signature</label></div>
<label style="margin-left:560px"><?php echo $row['Cashier']?></label>-->
<?php }

		if($two != 0)	  {?>
		<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date : <?php echo $d;?></td>
				<td>Dealer Name :<?php echo $row['Name'];?></td>
				<td>Time : <?php echo $row['Time'];?></td></tr>
				<tr>
				<td colspan="2">Bill No : <?php echo $all;?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount : <?php echo $subtot;?></td>
				<td>Advance Amount : <?php echo $two;?></td>
				<td>Grand Total : <?php echo $total;?></td></tr>
				<tr>
				<td style="text-align:center;">Dealer Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr>
				<tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>
			 <!-- <p><label id="Label1" style="margin-left:250px">COMPANY NAME</label></br></br></br></p>
<p>
<label style="margin-left:10px">Date<label style="margin-left:60px"> :<?php echo $d;?></label><label style="margin-left:300px">Time :<?php echo $row['Time']?></label></br></br></br></p>
<p>
<label style="margin-left:10px">Dealer Name<label style="margin-left:8px">: <?php echo $row['Name'];?></label></label></br></br></br></p>
<p>
<label style="margin-left:10px">Bill No :<?php echo $all ;?></label></p><p>
<label style="margin-left:100px">Total Amount<label style="margin-left:8px">:<?php echo $subtot;?></label></label>
<label style="margin-left:100px">Advance Amount<label style="margin-left:8px">:<?php echo $two;?></label></label></p><p>
<label style="margin-left:100px">Grand Total<label style="margin-left:16px">:<?php echo $total;?></label></label></p></br></br></br>
<div><label style="margin-left:550px">Signature</label></div>
<label style="margin-left:560px"><?php echo $row['Cashier']?></label-->

      <?php }
	  				if($four != 0){?>
					<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date :<?php echo $d;?></td>
				<td>Dealer Name :<?php echo $row['Name'];?></td>
				<td>Time :<?php echo $row['Time'];?></td></tr>
				<tr>
				<td colspan="2">Bill No :<?php echo $all;?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount : <?php echo $subtot;?></td>
				<td>Advance Amount : <?php echo $four;?></td>
				<td>Grand Total : <?php echo $total;?></td></tr>
				<td style="text-align:center;">Dealer Signature</td></tr>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td></tr>
				<tr>
				<td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>
<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label><br></br></br></p>

<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:300px">Time <?php echo $row['Time']?></label></br></br></br>
<p>
<label style="margin-left:10px">Dealer Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label><br></br></br></p>
<p>
<label style="margin-left:10px">Bill No :<?php echo $all ;?></label></p><p></br></br></br>
<label style="margin-left:100px">Total Amount:<label style="margin-left:8px"><?php echo $subtot;?></label></label>
<label style="margin-left:10px">Pending Amount:<label style="margin-left:8px"><?php echo $four ;?></label></label></p><p>
<label style="margin-left:100px">Grand3 Total:<label style="margin-left:16px"><?php echo $total;?></label></label></p></br></br></br>
<div><label style="margin-left:550px">Signature</label></div>
<label style="margin-left:560px"><?php echo $row['Cashier']?></label-->
<?php }
	  				if($three != 0){?>
					<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date :<?php echo $d;?></td>
				<td>Dealer Name :<?php echo $row['Name'];?></td>
				<td>Time :<?php echo $row['Time'];?></td></tr>
				<tr>
				<td colspan="2">Bill No :<?php echo $all;?></td>
				<td></td>
				<td></td></tr>
				<tr>
				<td>Total Amount : <?php echo $subtot;?></td>
				<td>Advance Amount : <?php echo $three;?></td>
				<td>Grand Total : <?php echo $total;?></td></tr>
				<tr>
				<td style="text-align:center;">Dealer Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr>
				<tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>
<!--p><label id="Label1" style="margin-left:250px">COMPANY NAME</label></br></br></br></p>

<label style="margin-left:10px">Date <label style="margin-left:60px">:<?php echo $d;?></label></label><label style="margin-left:300px">Time <?php echo $row['Time']?></label></br></br></br>
<p>
<label style="margin-left:10px">Dealer Name<label style="margin-left:8px">:<?php echo $row['Name'];?></label></label></br></br></br></p>
<p><label style="margin-left:10px">Bill No :<?php echo $all ;?></label></p><p></br></br></br>
<label style="margin-left:100px">Total Amount:<label style="margin-left:8px"><?php echo $subtot;?></label></label>
<label style="margin-left:10px">Pending Amount:<label style="margin-left:8px"><?php echo $three ;?></label></label></p><p>
<label style="margin-left:100px">Grand3 Total:<label style="margin-left:16px"><?php echo $total;?></label></label></p></br></br></br>
<div><label style="margin-left:550px">Signature</label></div>
<label style="margin-left:560px"><?php echo $row['Cashier']?></label-->
<?php }
if($one == 0 && $two== 0 && $three== 0 && $four== 0){?>
<table id="datatable-buttons" class="table table-striped">
				<thead>
				<th></th>
				<th><?php echo $ctitle; ?></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Date :<?php echo $d;?></td>
				<td>Dealer Name :<?php echo $row['Name'];?></td>
				<td>Time :<?php echo $row['Time'];?></td></tr><tr>
				<td colspan="2">Bill No :<?php echo $all;?></td>
				<td></td>
				<td></td></tr><tr>
				<td>Total Amount : <?php echo $subtot;?></td>
				<td>Advance Amount : <?php echo $two;?></td>
				<td>Grand Total : <?php echo $total;?></td></tr>
				<tr>
				<td style="text-align:center;">Dealer Signature</td>
				<td></td>
				<td style="text-align:center;">Authroized Signature</td>
				</tr><tr><td></td>
				<td></td>
				<td style="text-align:center;"><?php echo $row['Cashier'];?></td></tr>
				</tbody>
				</table>		
<?php }	} ?>
                  </div>  
 			<button class="btn btn-success" style="margin-left:400px;" onclick="printContent('divToPrint')">Print</button>
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
   
    
    

 