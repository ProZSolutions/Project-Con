<html>
<head>
</head>
<body> 
<div id="myModal" class="modal"> 
<div class="modal-content">
<span class="close">X</span>
<div id="log"></div>    
</div>
</div>
<?php 
session_start();
require'Config.php'; 
require'usrrole.php';
$id = $_POST['id'];
if($id=='')
{
	$sql2 = "SELECT * FROM `vehicle`";
}
else
{
	$sql2 = "SELECT * FROM `vehicle` where `vown`='$id' OR `vno`='$id' "; 

}
$query2 = mysqli_query($link,$sql2);  
if (mysqli_num_rows($query2) > 0) { 
$i=0;
while($rs = mysqli_fetch_assoc($query2)) { ?>             
                      <div class="col-md-4 col-sm-4 col-xs-10 profile_details">
                        <div class="well profile_view">						   
                          <div class="col-sm-12">
                           <h4 class="brief"><i><?php echo $rs['vno']; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $rs['vown']; ?></h2>
                              <p><strong>About: </strong> <?php echo "vehicle"; ?> </p>
                              <ul class="list-unstyled">
                              <li><i class="fa fa-building"></i> Address: <?php echo $rs['address']; ?></li>
                              <li><i class="fa fa-phone"></i> Phone #:<?php echo $rs['mobile']; ?>,<?php echo $rs['amobile']; ?> </li>
                              </ul>
                            </div>
                           <div class="right col-xs-5 text-center">							 
                          <img src="images/user.png" alt="..." class="img-circle img-responsive">	                         
                         </div>
                        </div> 
<div class="col-xs-12 bottom text-center">                 							                           
<a class="do btn btn-primary btn-xs do"href="redirect1.php?value1=<?php echo $rs['nos']; ?>">  <i class="fa fa-user"> </i> View Profile </a>
<?php if($role == 'admin' || $role == 'manager') { ?>
<button id="Btn" class="p btn btn-primary btn-xs" name="ids" value="<?php echo $rs['nos'];?>">Edit Contact<i class="fa fa-edit"> </i></button></td>
<?php } ?>	
                         
               </div>
                          </div>
                        </div>
                      </div>				
		<?php } }else {echo'<center> No Contact Preview </center>';}?>	
                		
               
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
url: "ajaxman_vehicle.php",
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
				  
                 </body>				
			   </html>