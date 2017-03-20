<?php
session_start();
error_reporting(0);
include'Config.php';
require'sconfig.php';
require'usrctrl.php';
require'images/rec.php'; 
 $result1 = $link->QUERY("select * from contact where Designation='dealer'");
 
echo $setCounter;
 if($_SERVER['REQUEST_METHOD']=='POST')
{ $name=$_POST['pick'];
$dat = str_replace('/', '-', $name);
$dat1 = date('Y-d-m',strtotime($dat));
  $design1=$_POST['one'];
  $design2=$_POST['pay'];
  $mob1=$_POST['to'];
   if (count($_POST["ids"]) > 0 ) {
  $all = implode(",", $_POST["ids"]);  
}
$sql = "UPDATE `material_in` SET `paid`= '1' WHERE 1 AND id IN($all)";	 
 mysqli_query($link,$sql); 
//if u want deale id 
  $sq = "INSERT INTO `dealerpayment` (`Date`,`Name`,`Paymentfor`,`Amount`,`Cashier`)
    VALUES('$dat1','$design1','$design2','$mob1',' $user')";
    if (!mysqli_query($link,$sq))
      {
      die('Error: ' . mysqli_error($link));
      }
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
  
   <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--<script>
function showUser(str) {
	
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","user.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>-->
<script type="text/javascript">
function showUser()
{  
    
    if (window.XMLHttpRequest)
     {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
     }
  else
    {// code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

  xmlhttp.onreadystatechange=function()
    {
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","role.php?,true);
    xmlhttp.send();
}



</script>
<script>
$(document).ready(function()
{
$("#id1,#onselect1").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "user.php",
data: dataString,
cache: false,
success: function(html)
{
$("#Hint").html(html);
} 
});

});
});
</script>
<script>
    function E(id) { return document.getElementById(id); }
    function changeit(drp,txf)
    {
        dd = E(drp);
        E(txf).value = dd.options[ dd.selectedIndex ].text;
    }
</script>


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
                      <li><a href=""id="one" onClick="showUser()">View Accounts</a>
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
                    <img src="data:image/jpeg;base64,<?php echo $ss; ?>" alt=""><?php echo $user;?>
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
                <h3>Accounts</h3>
              </div>
              
			  </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dealer payments<small>only in English</small></h2>
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
                    <br>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>"class="form-horizontal form-label-left" data-parsley-validate method="post">                  
					<div class="form-group">				 
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="date">Date<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6 ">
                          <input id="date"name="pick" class="date-picker form-control col-md-2 col-xs-10" required="required" type="text" >
                        </div>                 
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Time</label>
                        </label>
						<div class ="col-md-3 col-sm-3 col-xs-6 " >
						<div id="clockbox" >
						</div>
						</div>
					   
                        </div>
                     				 
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
                        <div class="col-md-6 col-sm-6 col-xs-10">
                         <!-- onchange="showUser(this.value)"-->
							<select class="form-control va" name="abc" id="roam">
                            <option>Select Name</option>
                           <option>Employee</option>
                         <option>Labour</option>
						 <option>Dealer</option>
                          </select>
                        </div>
						</div>
                   <!--    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required"> *</span>
						</label>
                        <div class="col-md-6 col-sm-9 col-xs-6">
                          <select class="form-control"name="pay"id="id1">
						  <option id="text1">Select Name</option>
                            <option id="text1"> </option>
                          </select>
                        </div>
                      </div>-->
					   <div class="form-group">
					   <label  class="control-label col-md-3 col-sm-3"> Designation Category <span class="required">*</span></label>
					      <div class="col-md-5 col-sm-6 col-xs-12">
                        <!-- <input type="text"list="brow"class= "form-control" id="first"name="sel"class="reserve">-->
					 <input type="text"list="onselect"name="sel"id="id1"class="form-control"style="width:373px; height:27.1176px; position:absolute; top:1px; left:10px; z-index:2; " >
						 <datalist id="onselect"class="reserve">
                         						 
                          </datalist>
						   
						   <select id="onselect1"class="reserve form-control" onchange="changeit('onselect1','id1')"  style="position: absolute; top: 0px; left: 10px; z-index: 1;    width: 391px; height:28.1176px" >>
                             <option id="onselect"class="reserve"></option>
                             </select>
						  </div>
					  </div>

					  

                     <div class="clearfix"></div>
					    <div class="x_content">
					 
                   <div id="Hint"class="row"></div>
                                 
			</div>
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment For<span class="required"> *</span>
						</label>
                        <div class="col-md-6 col-sm-9 col-xs-6">
                          <select class="form-control"name="pay">
                            <option>Select Payment</option>
                            <option>Advance</option>
                            <option>Bill</option>
                          </select>
                        </div>
                      </div>

					  

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-10">
                          <input type="text" name="to"id="first-name3" required="required" placeholder="00.00"class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
						 
                        </div>
                      </div>

                    </form>
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
	<!-- bootstrap-daterangepicker -->
	<script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
	<!--- time and date--->
	
	<script type="text/javascript">
function GetClock(){
	
var d=new Date();
   
    var day = ("0" + d.getDate()).slice(-2);
    var month = ("0" + (d.getMonth() + 1)).slice(-2);
    var today = (month)+ "/" + (day) + "/"  + d.getFullYear();
    document.getElementById("date").value = today;
var nhour=d.getHours(),nmin=d.getMinutes(),ap;
if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;

document.getElementById('clockbox').innerHTML=""+nhour+":"+nmin+ap+"";
}

window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}
</script>

	<script>
      $(document).ready(function() {
        $('#date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
			   maxDate: new Date()
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>
  </body>
</html>