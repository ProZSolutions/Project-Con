<?php
$title  ="Edit Profile";
$_csheet= 1;
$_cjava = 0;
$_sheet = 0;
$_script= "D";
session_start();
error_reporting(0);
require 'MainConfig.php';

$gd=$_GET['value'];
$ts="select * from contact where `No`= '$gd' ";
 
?>
<?php require("Template/header.php"); ?>
<!---------body.php---------------->


<script type="text/javascript">
$(document).ready(function()
{
$("#emp,#lab").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "ajaxdesignation.php",
data: dataString,
cache: false,
success: function(html)
{
$(".reserve").html(html);
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
<?php require("Template/body.php"); ?>
  

            
        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Contact</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                 
                  <div class="x_content">
              <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Edit Profile</h2>
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
                  <div class="x_content"><?php echo $msg;?>
                    <br />
                    <form action="view_contact.php"class="form-horizontal form-label-left" data-parsley-validate method="post"enctype="multipart/form-data">
					<?php 
                   $d=mysqli_query($link,$ts);
				   while($df=mysqli_fetch_assoc($d))
				   {

				   ?>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" name="name"id="first-name"  class="form-control col-md-7 col-xs-12" value="<?php echo $df['Name'] ?>"> 
                        </div>
					   </div>
                      <div class="form-group">
                               <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Designation
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" name="design"id="first"  class="form-control col-md-7 col-xs-12" value="<?php echo $df['Designation'] ?>"> 
                        </div>
					     </div>
						   <div class="form-group">
                               <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Design_Type
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" name="type"id="first1"  class="form-control col-md-7 col-xs-12" value="<?php echo $df['Design_type'] ?>"> 
                        </div>
					     </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" name="mob"id="first-name"  class="form-control col-md-7 col-xs-12" value="<?php echo $df['Mobile_no']?>">
                        </div>
					   </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alternate No
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" name="amob"id="first-name"  class="form-control col-md-7 col-xs-12" value="<?php echo $df['Alternative_no']?>">
                        </div>
					   </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address 
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <textarea id="textarea"name="addr"   class="form-control col-md-7 col-xs-12"><?php echo $df['Address']?></textarea>
                        </div>
						</div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agency Name
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" name="agn"id="firstA" class="form-control col-md-7 col-xs-12" value="<?php echo $df['Agency']?>">
                        </div>
					   </div>
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Photo
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input name="image1"  accept="image/jpeg" type="file" class="btn btn-danger">
                        </div>
					    </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
					  <a href="view_contact.php" ><input type="button" class="btn btn-primary"value="Cancel"></a>
					  <button type="submit" name="na" class="btn btn-success" value="<?php echo $df['No'];?>">Update</button>
                         <!-- <input type="submit" class="btn btn-success"value="Submit" onClick="return confirm('Do you want to save this Item?')">	-->		  
                      </div>
                      </div>				   
				   <?Php }  ?>				   
                    </form>
                  </div>
                </div>				
				</div>
				</div>
				</div>
				<div>
				</div>                       
                </div>
              </div>       
              
              </div>
            </div>
          </div>     <div class="clearfix"></div>
        </div>
		
		</div>
</div>
</div>
</div>

        <!-- /page content -->

        <!-- footer content -->
         <?php require("Template/footer.php"); ?>
  
	
		
