<?php
$title  ="Profile";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
session_start();
$na2 = session_id();
error_reporting(0);

require 'MainConfig.php';

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	

     $tmpName  = $_FILES['image1']['tmp_name']; 
      $fp = fopen($tmpName, 'r');
      $adata = fread($fp, filesize($tmpName));
      fclose($fp);
      $adata = addslashes($adata);

	//$name = $_POST["name"];
	$new = md5($_POST["password2"]);
	$old =  md5($_POST["oldpassword"]);

 if ($user == '' || $old == '') 
	    {
        $msg = "You must enter all fields";
		} 
		else 
			{
        $sql = "SELECT * FROM `user` WHERE `username` = '$user' AND `password` = '$old'";
        $query = mysqli_query($link,$sql);
		if (mysqli_num_rows($query) > 0) {
          $sq="UPDATE `user` SET `password` ='$new' WHERE `username` = '$user'"; 
          mysqli_query($link,$sq); 
		   $sq11="UPDATE `session` SET `image`='$adata',`lastpassword`= NOW() WHERE `name` = '$user' "; 
          mysqli_query($link,$sq11); 
		$msg = "<span style='color:#008000;text-align:center;'>Password Changed Successfully..!</span>";          
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

             
            </div>
            <div class="clearfix"></div>           
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
					
					
                    <form action="<?= $_SERVER['PHP_SELF']?>" class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">  
				    <div class="item form-group">
                                                <?php 
						 $s ="Select * from user where `username`='$user'"; 
						 $res=Mysqli_query($link,$s);
						 while($ro=mysqli_fetch_assoc($res))
						 { 
						 ?>
						<div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User ID :
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <label id="name" class="control-label col-sm-1 col-md-1 col-xs-12" ><?php echo $ro['usrno'];?></label>
                        </div>
						 <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Role :
                        </label>
						<div class="col-md-3 col-sm-6 col-xs-12">
                        <label id="name" class="control-label col-sm-1 col-md-1 col-xs-12" ><?php echo $ro['role'];?></label>
                        </div>
                        </div><?php } ?></br>                 
					   

					   <div class="item form-group">
                        <label for="password2" class="control-label col-md-4 col-sm-3 col-xs-12"> </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                        <?php echo $msg; ?>
                        </div>
                        </div>
                        
						 <div class="item form-group">
                        <label for="password2" class="control-label col-md-4 col-sm-3 col-xs-12">Old Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password2" type="password" name="oldpassword"  class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                        </div>
                     
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-4">New Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-4 col-sm-3 col-xs-12">Confirm Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>					
				       

					   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Upload Profile Photo
                        </label>
                          <div class="col-md-5 col-sm-5 col-xs-12">
						<input name="image1" accept="image/jpeg" type="file"class="btn btn-warning">                        
                        </div>
					   </div>
					   
                      <div class="form-group">
					   <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        </label>
                      <div class="col-md-8 col-sm-5 col-xs-12">
					  <input type="hidden" name="aaa" value="firstone"> 
					<button id="send" type="submit" class="btn btn-success">Save Changes</button>
					</div>
					</div>
					</form>

					<div id="usr"></div>
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						<a href="#"> <button id="send" type="" class="btn btn-success">OK</button></a>
                          <button type="reset" class="btn btn-primary">Cancel</button>                         
                        </div>
                      </div>                 
                  </div>
                </div>
              </div>
            </div>
 <div class="row">          
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change   <small>Details</small></h2>
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
				   <form action="#" class="form-horizontal form-label-left" novalidate>          
                   					
					
					 <?php 
						 $s1 ="Select * from session where `name`='$user'"; 
						 $res1=Mysqli_query($link,$s1);
						 while($ro1=mysqli_fetch_assoc($res1))
						 { 
						$v=$ro1['lastlogin'];
						$da = str_replace('-', '/', $v);
                        $d = date('d-m-Y H:i:s',strtotime($da));

						$v1=$ro1['lastpassword'];
					    $da1 = str_replace('-', '/', $v1);
                        $d1 = date('d-m-Y H:i:s',strtotime($da1));
						 ?>
					<div class="item form-group">
					<label class="control-label col-md-5 col-sm-3 col-xs-12">Last Login :</label>
					<div class="col-md-3 col-sm-6 col-xs-10">					
					 <label id="name" class="control-label col-sm-6 col-md-6 col-xs-12" ><?php echo $d;  ?></label>
					</div>
					</div>

					 
					<div class="item form-group">
					<label class="control-label col-md-5 col-sm-3 col-xs-12">Last Password change : </label>
					<div class="col-md-3 col-sm-6 col-xs-10">					
				<label id="name" class="control-label col-sm-6 col-md-6 col-xs-12" ><?php echo $d1; } ?></label>
					</div>
					</div>

					<div id="usr"></div>
                       <div class="ln_solid"></div>
                     <!-- <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						 <button id="send" type="submit" class="btn btn-success">Submit</button>
                          <button type="reset" class="btn btn-primary">Cancel</button>                         
                        </div>
                      </div>-->
                    </form> 
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