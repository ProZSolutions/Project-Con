  <html>
  <head>
  </head>
  <body>   					
<?php
session_start();
require'Config.php'; 
require'usrrole.php';
$id=$_POST['id'];
$id1=$_POST['id1'];

if($id1=="Dealer")
{
$sql2 = "SELECT * FROM `contact` where name LIKE  '$id%' AND `Designation`='$id1' AND `trunc`='0'"; 
}
elseif($id1=="Employee")
{
$sql2 = "SELECT * FROM `contact` where name LIKE  '$id%' AND `Designation`='$id1' AND `trunc`='0'"; 
}
elseif($id1=="Labour")
{
$sql2 = "SELECT * FROM `contact` where name LIKE  '$id%' AND `Designation`='$id1' AND `trunc`='0'"; 
}
else
{
$sql2 = "SELECT * FROM `contact` where name LIKE  '$id%' AND `Designation`='$id1' AND `trunc`='0'";
}

$query2 = mysqli_query($link,$sql2);
if (mysqli_num_rows($query2) > 0) { 
$i=0;
while( $rs = mysqli_fetch_assoc($query2)) {      
$img1 = $rs["photo"];
$abc= base64_encode($img1);
?>             
                      <div class="col-md-4 col-sm-4 col-xs-10 profile_details">
                        <div class="well profile_view">						   
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo $rs['Designation']; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $rs['Name']; ?></h2>
                              <p><strong>About: </strong> <?php echo $rs['Designation']; ?>/<?php $rs['Agency']; ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $rs['Address']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone #:<?php echo $rs['Mobile_no']; ?> </li>
                              </ul>
                            </div>
                           <div class="right col-xs-5 text-center">							 
                          <?php if($abc==""){?><img src="images/user.png" alt="..." class="img-circle img-responsive"><?php }else{ ?>				  
                          <img class="img-circle img-responsive" src="data:image/jpeg;base64,<?php echo $abc; ?>" alt="Avatar" title="Change the avatar"><?php } ?>
                            </div>
                          </div> 
                          <div class="col-xs-12 bottom text-center">                  							                           
         
		   <a class="do btn btn-primary btn-xs do" href="redirect.php?value1=<?php echo $rs['No']; ?>">  <i class="fa fa-user"> </i> View Profile</a> 
	  <?php if($role == 'admin' || $role == 'manager') { ?>
		 <a class="do btn btn-primary btn-xs do" href="edit_profile.php?value=<?php echo $rs['No']; ?>"><i class="fa fa-edit"> </i>  Edit Contact</a>
		<?php } ?>
                         
                            </div>
                          </div>
                        </div>
                      </div>				
		<?php } }else {echo'<center> No Contact Preview </center>';}?>	
              			
               
				</body>
			   </html>