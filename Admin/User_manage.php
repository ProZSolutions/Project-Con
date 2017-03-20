<?php
$title  ="Usermanage";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
$na2 = session_id();
require 'MainConfig.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['action'])) {
	$id=$_POST['user'];	
	$role=$_POST['role'];	
	$user=$_POST['username'];	
	$pass=MD5($_POST['pass']);	
	$nam=$_POST['send'];	
if($nam=='update')
{ 
$my="UPDATE `user` SET `username`='$user',`password`='$pass',`role`='$role' where `usrno`='$id'";
mysqli_query($link,$my);
$my="UPDATE `session` SET `name`='$user'";
mysqli_query($link,$my);

} 
}
     $tmpName  = $_FILES['image1']['tmp_name']; 
      $fp = fopen($tmpName, 'r');
      $adata = fread($fp, filesize($tmpName));
      fclose($fp);
      $adata = addslashes($adata);
	$name = $_POST["name"];
	$pos= $_POST["name1"];
	$new = md5($_POST["password"]);
 if ($name == '' || $new == '') 
	    {
       
		} 
		else 
			{
        $sql = "SELECT * FROM `user` WHERE `username` = '$name' ";
        $query = mysqli_query($link,$sql);
		if (mysqli_num_rows($query) > 0) {
       	$msg = "<span style='color:#FF0000;text-align:center;'>Already User Existing ..!</span>";          
        }
		else
			{ 
	 $sql = "INSERT INTO `user`(`username`,`password`,`role`)
    VALUES('$name','$new','$pos')";
    mysqli_query($link,$sql); 
    $sql1 = "INSERT INTO `session`(`name`,`role`)
    VALUES('$name','$pos')";
	mysqli_query($link,$sql1); 
			$msg ="<span style='color:#008000;text-align:center;'>Username created successfully!</span>";
			}  
}	
}
if(isset($_POST['hide'])) {
    $d = $_POST['noo'];
	$d1 = $_POST['hide'];	
if($d1=="secvalue")
	{
$my1="DELETE FROM `user` WHERE `usrno`='$d'";
mysqli_query($link,$my1); 

$my2="DELETE FROM `session` WHERE `usrno`='$d'";
mysqli_query($link,$my2); 

 $sql = "INSERT INTO `usertemo` (`usrno1`,`username`,`password`,`role`)
                           VALUES('$id','$user','$pass','$role')";
 mysqli_query($link,$sql);
	}
}
?>
<!--header.php-->
<?php require("Template/header.php"); ?>
<!--body.php-->
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
           
            <div class="clearfix"></div>           
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Management <small></small></h2>                   
                    <div class="clearfix"></div>
                    </div>
				    <div class="x_content">				
                   
				    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name"> 
                        </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $msg;?>
                        </div>
						</div>
                        <table class="table table-striped table-bordered ">
						 <thead>
						 <tr>
						 <th style="text-align:center;">USER ID</th>
						 <th style="text-align:center;">USERNAME</th>
						 <th style="text-align:center;">ROLE</th>
						 <th style="text-align:center;">ACTION</th>
				
						 </tr>
						 </thead>

                         <?php 
						 $s ="Select * from user"; 
						 $res=Mysqli_query($link,$s);
						 while($ro=mysqli_fetch_assoc($res))
						 {
						 ?>	
						 <tbody>
						 <tr>
						 <td style="text-align:center;"><?php echo $ro['usrno'];?></td>
						 <td style="text-align:center;"><?php echo $ro['username'];?></td>
						 <td style="text-align:center;"><?php echo $ro['role'];  ?></td>
						 <?php if($role=='admin' || $role=='manager') { ?>
						 <td style="text-align:center;"><button type="button" id="Btn" class="p btn btn-info btn-xs"name="ids"value="<?php echo $ro['usrno']; ?>">View</button>
						 	<?php if($role == 'admin') { ?>
						<form action="User_manage" class="form-horizontal form-label-left" data-parsley-validate  method="post" style="display:inline;">
					   <input type="hidden" name="noo" value="<?php echo $ro['usrno']; ?> ">
					   <input type="hidden" name="hide"class="btn btn-success" value="secvalue">
	                  <input type="submit" name="send" value="Delete" class="btn btn-danger btn-xs">	
	                  </form></td><?php } } ?>
						 </tr>
						 </tbody><?php } ?>
						 </table>

 <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF">Edit Account<h>
     <button type="button" class="close" style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>  
	<div class="modal-footer"></div>
  </div>
</div>
</div>                				

					<div id="usr"></div>
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						 <button id="send" type="" class="btn btn-success">OK</button>
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
                    <h2>New User   <small>Creating</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
				   <div class="x_content">
					           
                   	 <form action="User_manage.php" class="form-horizontal form-label-left" novalidate method="POST" enctype="multipart/form-data"> 				
					
					<input type="button" value="Create User" id="create"Class="btn-primary">

					<div id="username"></div>                       
                   
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
url: "ajaxuser.php",
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
<script type="text/javascript">
$(document).ready(function()
{
$("#create").click(function()
{
$.ajax
({
type: "POST",
url: "passchan.php",
cache: false,
success: function(html)
{
$("#username").html(html);
} 
});
});
});
</script>

  </body>
</html>