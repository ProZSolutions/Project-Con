<?php
session_start();
$na2 = session_id();
error_reporting(0);
include 'Config.php';
require 'usrctrl.php';
require'sconfig.php';
require'images/rec.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$name = $_POST["name"];
	$new = md5($_POST["password2"]);
	$old =  md5($_POST["oldpassword"]);
echo "$user";
 if ($name == '' || $old == '') 
	    {
        $msg = "You must enter all fields";
		} 
		else 
			{
        $sql = "SELECT * FROM `user` WHERE `username` = '$user' AND `password` = '$old'";
        $query = mysqli_query($link,$sql);
		if (mysqli_num_rows($query) > 0) {
          $sq="UPDATE `user` SET `username`='$name',`password` ='$new' WHERE username = '$user'"; 
          mysqli_query($link,$sq); 
		   $sq1="UPDATE `session` SET `name`='$name' WHERE `name` = '$user' "; 
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
              
                  
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12"  name="name" required="required" type="text">
                        </div>
                        </div>
                     
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">New Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
					 
					
				
					    <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Old Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="oldpassword"  class="form-control col-md-7 col-xs-12" required="required">
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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

  </body>
</html>