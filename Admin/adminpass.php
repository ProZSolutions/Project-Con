<?php
session_start();
$na2 = session_id();
error_reporting(0);
include 'Config.php';
require'usrctrl.php';
require'images/rec.php';
require'sconfig.php';

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$use = $_POST["user"];
	$name = $_POST["name"];
	$new = md5($_POST["password2"]);
	$old =  md5($_POST["oldpassword"]);

 if ($name == '' || $old == '') 
	    {
        $msg = "You must enter all fields";
		} 
		else 
			{if($old == '')
				{
        $sql = "SELECT * FROM `user` WHERE `username` = '$use' ";
        $query = mysqli_query($link,$sql);
				}
				else
				{
	    $sql = "SELECT * FROM `user` WHERE `username` = '$use'";
        $query = mysqli_query($link,$sql);
				}
		if (mysqli_num_rows($query) > 0) {
          $sq="UPDATE `user` SET `username`='$name',`password` ='$new' WHERE username='$use'"; 
          mysqli_query($link,$sq); 
		   $sq1="UPDATE `session` SET `name`='$name' WHERE `name`='$use'"; 
          mysqli_query($link,$sq1); 
		$msg = "<span style='color:#008000;text-align:center;'>Username & Password Changed Successfully..!</span>";              
        }
		else
			{ 
			$msg ="<span style='color:#FF0000;text-align:center;'>Please Enter Correct User Credential..!</span>";
			} 
				
}	
}
	?>
<!---------header.php---------------->
<?php require("Template/header.php"); ?>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>


       <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                     Setting
                  </h3>
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
 <!-- form input mask -->
              
                  
           
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Account <small>Setting</small></h2>
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
				   <div class="x_content">
				   <form action="<?= $_SERVER['PHP_SELF']?>" class="form-horizontal form-label-left" novalidate method="post">          
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name"> 
                        </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $msg;?>
                        </div>
						</div>
					
					
					 
					<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Users <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-10">
					
					<select class="form-control"id="nam" name="user">
					<option>Select User</option>
					<?php
					$q="select role from user where `username`='$user'";
					$qu=mysqli_query($link,$q);
					while($r=mysqli_fetch_array($qu))
					{
						$rol=$r['role'];
					}
					if($rol=='a1')
					{
				   $result1 = $link->QUERY("SELECT * FROM user WHERE  `role` NOT IN ('a')"); 
					while ($row1 = $result1->fetch_assoc()){$name= $row1['username'];echo '<option>'.$name.'</option>';
					}
					}
					else
					{
				    $result1 = $link->QUERY("select username from user");
                    while ($row1 = $result1->fetch_assoc()){$name= $row1['username'];echo '<option>'.$name.'</option>';
					}
					}?>
					</select>
					</div>
					</div>

					<div id="usr"></div>
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						 <button id="send" type="submit" class="btn btn-success">Submit</button>
                          <button type="reset" class="btn btn-primary">Cancel</button>                         
                        </div>
                      </div>
                    </form> 
                  </div>
                </div>
              </div>
            </div>


 <div class="row">
          
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Account <small>Setting</small></h2>
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
				   <div class="x_content">
				   <form action="<?= $_SERVER['PHP_SELF']?>" class="form-horizontal form-label-left" novalidate method="post">          
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name"> 
                        </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $msg;?>
                        </div>
						</div>
					
					
					 
					<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Users <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-10">
					
					<select class="form-control"id="nam" name="user">
					<option>Select User</option>
					<?php
					$q="select role from user where `username`='$user'";
					$qu=mysqli_query($link,$q);
					while($r=mysqli_fetch_array($qu))
					{
						$rol=$r['role'];
					}
					if($rol=='a1')
					{
				   $result1 = $link->QUERY("SELECT * FROM user WHERE  `role` NOT IN ('a')"); 
					while ($row1 = $result1->fetch_assoc()){$name= $row1['username'];echo '<option>'.$name.'</option>';
					}
					}
					else
					{
				    $result1 = $link->QUERY("select username from user");
                    while ($row1 = $result1->fetch_assoc()){$name= $row1['username'];echo '<option>'.$name.'</option>';
					}
					}?>
					</select>
					</div>
					</div>

					<div id="usr"></div>
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						 <button id="send" type="submit" class="btn btn-success">Submit</button>
                          <button type="reset" class="btn btn-primary">Cancel</button>                         
                        </div>
                      </div>
                    </form> 
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/bernii/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->

	 <script src="../vendors/validator/validator.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
	<script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
	   <script type="text/javascript">
$(document).ready(function()
{
$("#nam").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "passchan.php",
data: dataString,
cache: false,
success: function(html)
{
$("#usr").html(html);
} 
});

});
});
</script>
  </body>
</html>