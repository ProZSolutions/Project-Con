<?php
$title  ="Profile";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
require 'MainConfig.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{        $tmpName  = $_FILES['image1']['tmp_name']; 
         $fp = fopen($tmpName, 'r');
         $adata = fread($fp, filesize($tmpName));
         fclose($fp);
         $adata = addslashes($adata);
  $ds=$_POST['na'];
  $name1=$_POST['name'];
  $design1=$_POST['design'];
  $mob1=$_POST['mob'];
  $amob1=$_POST['amob'];
  $addr1=$_POST['addr'];
  $age=$_POST['agn'];
  $ty=$_POST['type'];	
if(!$adata=="")
	{
     //UPDATE `contact` SET `SI_NO`=[value-1],`Name`=[value-2],`Designation`=[value-3],`Design_type`=[value-4],`Mobile_no`=[value-5],`Alternative_no`=[value-6],`Address`=[value-7],`Agency`=[value-8],`photo`=[value-9] WHERE 1
    $sql = "UPDATE `contact` SET `Name`='$name1',`Designation`='$design1',`Design_type`='$ty',`Mobile_no`='$mob1',`Alternative_no`='$amob1',`Address`='$addr1',`Agency`='$age',`photo`='$adata'  WHERE `No` ='$ds'";
	mysqli_query($link,$sql);
	}
	else
	{
		$sql = "UPDATE `contact` SET `Name`='$name1',`Designation`='$design1',`Design_type`='$ty',`Mobile_no`='$mob1',`Alternative_no`='$amob1',`Address`='$addr1',`Agency`='$age'  WHERE `No` ='$ds'";
		mysqli_query($link,$sql);
	}
		/*$sql = "UPDATE `contact` SET `Name`='$name1',`Designation`='$design1',`Mobile_no`='$mob1',`Alternative_no`='$amob1',`Address`='$addr1',`Agency`='$age',`photo`='$adata' WHERE `SI_NO` ='$ds'";*/
	
   if(!mysqli_query($link,$sql)){
	die('Error:');	                  
	}
 if (count($_POST["ids"]) > 0 ) {
  $all = implode(",", $_POST["ids"]);
  echo $all;
}
$sql1 = "UPDATE `contact` SET `trunc`= '1' WHERE 1 AND `No` IN($all)";	 
$query = mysqli_query($link,$sql1);
$nam2="second";
if(isset($_POST['hide']))
	{
    $data2 = $_POST['hide'];	
	$id1=$_POST['id11'];	
	$id2=$_POST['id12'];
	$id3=$_POST['id13'];
	$id4=$_POST['id14'];
	$id5=$_POST['id15'];
	$id6=$_POST['id16'];
	$id7=$_POST['id17'];
	$id9=$_POST['id18'];
	echo $id9;
	$id8=$_POST['send'];
	if($nam2==$data2)
	{  
	if($id8=='update')
	{
$sql = "UPDATE `vehicle` SET `vno`='$id1',`vown`='$id2',`vwege`='$id3',`hour_cost`='$id4',`mobile`='$id5',`amobile`='$id6',`address`='$id7' WHERE `nos` ='$id9'";
mysqli_query($link,$sql); 
	}
	else
		{
		$my1="UPDATE `vehicle` SET `del`='1' WHERE `nos`='$id9'";
        mysqli_query($link,$my1); 
		if (!mysqli_query($link,$my1))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }
		}
		}
		} 

}
?>
   <!--  header.php -->
<?php require("Template/header.php"); ?>
<!-- body.php -->
<style>
.do{
    display: inline-block;
}
.click{
	margin-left: 360px;
}

</style>
</head>
  <?php require("Template/body.php"); ?>            
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contacts</h3>
              </div>              
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                   <h2>View Contact <small>Users</small></h2>                   
                    <div class="clearfix"></div>
                   </div>
                  <div class="x_content">

                 <br/>
                  <!--  <form class="form-horizontal form-label-left" data-parsley-validate>-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Dealer Contact</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="employee-tab" data-toggle="tab" aria-expanded="false">Employee Contact</a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content3" role="tab" id="labour-tab" data-toggle="tab" aria-expanded="false">Labour Contact</a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content5" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Other Contact</a>
						<?php if($role=='admin'){?>
						<li role="presentation" class=""><a href="#tab_content4" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Manage Contact</a><?php } ?>
                        </li>
						</ul>
                      <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab">	

            <div class="">
            <div class="page-title">              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="A"></li>
                          <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="B"></li>
                          <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="C"></li>
                          <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="D"></li>
                          <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="E"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="F"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="G"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="H"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="I"></li>
			     	      <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="J"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="K"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="L"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="M"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="N"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="O"></li>
     					  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="P"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="Q"></li>
		         		  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="R"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="S"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="T"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="U"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="V"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="W"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="X"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="Y"></li>
						  <li><INPUT TYPE="BUTTON" class='butn btn-xs' value="Z"></li>		
                        </ul>
                     </div>					   
                     <div class="clearfix"></div> 
					 <div class="no"> </br></br>
					 <table>							 
<?php	
$sql = "SELECT * FROM `contact` where `Designation`='Dealer' AND `trunc`='0'";
$query = mysqli_query($link,$sql);
$x=0;
while( $rs = mysqli_fetch_assoc($query)) {
$one=$rs['Designation'];
$img4 = $rs["photo"];
$abc1= base64_encode($img4); ?>     
                       <div class="col-md-4 col-sm-4 col-xs-10 profile_details">
                        <div class="well profile_view">						   
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo $one; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $rs['Name']; ?></h2>
                              <p><strong>About: </strong> <?php echo $one; ?>/<?php echo $rs['Agency']; ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $rs['Address']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone #:<?php echo $rs['Mobile_no']; ?> </li>
								<li><i class="fa fa-phone"></i> Phone #:<?php echo $rs['Alternative_no']; ?> </li>
                              </ul>
                            </div>
                           <div class="right col-xs-5 text-center">							 
                          <?php if($abc1 ==""){ ?><img src="images/user.png" alt="..." class="img-circle img-responsive"><?php }else{ ?>  
                          <img class="img-circle img-responsive" src="data:image/jpeg;base64,<?php echo $abc1; ?>" alt="Avatar" title="Change the avatar"><?php } ?>
                          </div>
                          </div> 
                          <div class="col-xs-12 bottom text-center">                                  							                           
         <a class="do btn btn-primary btn-xs do" href="redirect? value1=<?php echo $rs['No']; ?>">  <i class="fa fa-user"> </i> View Profile</a>
		 <?php if($role == 'admin' || $role == 'manager') { ?>
		 <a class="do btn btn-primary btn-xs do" href="edit_profile? value=<?php echo $rs['No']; ?>"><i class="fa fa-edit"> </i>  Edit Contact</a>
		 <?php } ?>
                              
                            </div>
                          </div>
                        </div>
                      
<?php  $x++; } ?>    
                          
                        </table>					 
                   </div>
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
					



		<div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="employee-tab">
                   <div class="">
            <div class="page-title">              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
					
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="A"></li>
                          <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="B"></li>
                          <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="C"></li>
                          <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="D"></li>
                          <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="E"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="F"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="G"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="H"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="I"></li>
			     	      <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="J"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="K"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="L"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="M"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="N"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="O"></li>
     					  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="P"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="Q"></li>
		         		  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="R"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="S"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="T"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="U"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="V"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="W"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="X"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="Y"></li>
						  <li><INPUT TYPE="BUTTON" class='butn1 btn-xs' value="Z"></li>		
                        </ul>
                      </div>
                      <div class="clearfix"></div><div class="no1"></br></br>
					
					  <table>
					 <thead>									  
					 </thead>
					 <tbody>					
<?php $sql4 = "SELECT * FROM `contact` where `Designation`='Employee' AND `trunc`='0'"; $query4 = mysqli_query($link,$sql4);
$i=0;
while( $rs4 = mysqli_fetch_assoc($query4)) {  
$two = $rs4["Designation"];
$img1 = $rs4["photo"];
$abc= base64_encode($img1);
?>             
                      <div class="col-md-4 col-sm-4 col-xs-10 profile_details">
                        <div class="well profile_view">						   
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo $two; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $rs4['Name']; ?></h2>
                              <p><strong>About: </strong> <?php echo $rs4['Design_type']; ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $rs4['Address']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone #:<?php echo $rs4['Mobile_no']; ?> </li>
								<li><i class="fa fa-phone"></i> Phone #:<?php echo $rs4['Alternative_no']; ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">						 
                           <?php if($abc==""){?><img src="images/user.png" alt="..." class="img-circle img-responsive"><?php }else{ ?>			  
                          <img class="img-circle img-responsive" src="data:image/jpeg;base64,<?php echo $abc; ?>" alt="Avatar" title="Change the avatar"><?php } ?>
                            </div>
                          </div> 
                          <div class="col-xs-12 bottom text-center">                 							                           
          <a class="do btn btn-primary btn-xs do" href="redirect?value1=<?php echo $rs4['No']; ?>">  <i class="fa fa-user"> </i> View Profile</a>
		   <?php if($role == 'admin' || $role == 'manager') { ?>
		 <a class="do btn btn-primary btn-xs do"href="edit_profile?value=<?php echo $rs4['No']; ?>"><i class="fa fa-edit"> </i>  Edit Contact</a>
		 <?php } ?>	
					     </div>
                        </div>
                      </div>
<?php  $x++;

} ?> 	            </tbody>
                          </table>	                     
						</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
		  </div>
	


					 <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="labour-tab">
                            <div class="">
            <div class="page-title">              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">				 
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="A"></li>
                          <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="B"></li>
                          <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="C"></li>
                          <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="D"></li>
                          <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="E"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="F"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="G"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="H"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="I"></li>
			     	      <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="J"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="K"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="L"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="M"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="N"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="O"></li>
     					  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="P"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="Q"></li>
		         		  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="R"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="S"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="T"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="U"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="V"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="W"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="X"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="Y"></li>
						  <li><INPUT TYPE="BUTTON" class='butn2 btn-xs' value="Z"></li>	
                        </ul>
                      </div>
                      <div class="clearfix"></div><div class="no2"></br></br>
					 
					  <table>
					
					 <tbody>					
<?php $sql3 = "SELECT * FROM `contact` where `Designation`='Labour' AND `trunc`='0'"; $query3 = mysqli_query($link,$sql3);
$i=0;
while( $rs2 = mysqli_fetch_assoc($query3)) {   
$three=$rs2["Designation"];
$img1 = $rs2["photo"];
$abc= base64_encode($img1);
 ?>             
                      <div class="col-md-4 col-sm-4 col-xs-10 profile_details">
                        <div class="well profile_view">
						   
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo $three; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $rs2['Name']; ?></h2>
                              <p><strong>About: </strong> <?php echo $rs2['Design_type']; ?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $rs2['Address']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone #:<?php echo $rs2['Mobile_no']; ?> </li>
								<li><i class="fa fa-phone"></i> Phone2 #:<?php echo $rs2['Alternative_no']; ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">							 
                           <?php if($abc==""){?><img src="images/user.png" alt="..." class="img-circle img-responsive"><?php }else{ ?>							  
                          <img class="img-circle img-responsive" src="data:image/jpeg;base64,<?php echo $abc; ?>" alt="Avatar" title="Change the avatar"><?php } ?>
                            </div>
                          </div> 
                    <div class="col-xs-12 bottom text-center">                 							                           
         <a class="do btn btn-primary btn-xs do"href="redirect.php?value1=<?php echo $rs2['No']; ?>">  <i class="fa fa-user"> </i> View Profile</a>
		  <?php if($role == 'admin' || $role == 'manager') { ?>
		 <a class="do btn btn-primary btn-xs do"href="edit_profile.php?value=<?php echo $rs2['No']; ?>"><i class="fa fa-edit"> </i>  Edit Contact</a>
            <?php } ?>             
                            </div>
                          </div>
                        </div>
                      </div>
				
		     <?php $x++;
       if ($x % 3 == 0) 
		   { echo "</tr><tr>"; } ?>
			</td> <?php } ?>	
			                </tbody>
                          </table>	
						</div>                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
		 </div>

<div role="tabpanel" class="tab-pane fade active" id="tab_content5" aria-labelledby="search-tab">
   <div class="">
            <div class="page-title">              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">				 
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                       <div class="title_right">
                <div class="col-md-2 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="butn3 form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                          </span>
                  </div>
                </div>
              </div>
                      </div>
                      <div class="clearfix"></div><div class="no3"></br></br>
					  <table>
					
					 <tbody>					
<?php $s = "SELECT * FROM `vehicle` where `del`='0'"; $q = mysqli_query($link,$s);
$i=0;
while( $r= mysqli_fetch_assoc($q)) {   

 ?>             
                      <div class="col-md-4 col-sm-4 col-xs-10 profile_details">
                        <div class="well profile_view">
						   
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo $r['vno']; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2></h2>
                              <p><strong>About: </strong><?php echo $r['vown']; ?>/<?php echo "Vehicle"; ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $r['address']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone1 #:<?php echo $r['mobile']; ?> </li>
								<li><i class="fa fa-phone"></i> Phone2 #:<?php echo $r['amobile']; ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">							 
                           <?php if($abc==""){?><img src="images/user.png" alt="..." class="img-circle img-responsive"><?php }else{ ?>							  
                          <img class="img-circle img-responsive" src="data:image/jpeg;base64,<?php echo $abc; ?>" alt="Avatar" title="Change the avatar"><?php } ?>
                            </div>
                          </div> 
                    <div class="col-xs-12 bottom text-center">                 							                           
         <a class="do btn btn-primary btn-xs do"href="Vehicle_redirect?value1=<?php echo $r['nos']; ?>">  <i class="fa fa-user"> </i> View Profile</a>
		  <?php if($role == 'admin' || $role == 'manager') { ?>
		<button type="submit" class="p do btn btn-primary btn-xs do" value="<?php echo $r['nos']; ?>"><i class="fa fa-edit"> </i>  Edit Contact</button>
		
            <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
				
		     <?php $x++;
       if ($x % 3 == 0) 
		   { echo "</tr><tr>"; } ?>
			</td> <?php } ?>	
			                </tbody>
                          </table>	
						</div>                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
		 </div>  

 <div class="x_content">
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header panel-anger" style="background:#01CBA3"><h style="color:#FFFFFF">Edit Contact<h>
     <button type="button" class="close" style="color:#000000" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body">
      </div>  	  
	<div id="log"></div>  
	<div class="modal-footer"></div>
  </div>
</div>
</div>

                    <?php if($role=='admin') { ?>
                      <div role="tabpanel" class="tab-pane fade active" id="tab_content4" aria-labelledby="search-tab">
                   <div class="">        
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">		
                    <form name="input"action="<?= $_SERVER['PHP_SELF'] ?>"class="form-horizontal form-label-left" data-parsley-validate  method="post">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						<th>NO</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Mobile_no</th>
                          <th>Alternative_no</th>
                          <th>Address</th>
                          <th>Agency</th>	
                          <th><input type="checkbox" id="show"class="all"/></th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php	$sql = "SELECT * FROM `contact` where `trunc`='0'"; $query = mysqli_query($link,$sql); $i=1;
                       while( $row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
						  <td><?php echo $i; ?></td>
                          <td><?php echo $row['Name']; ?></td>
                          <td><?php echo $row['Designation']; ?></td>
                          <td><?php echo $row['Mobile_no']; ?></td>
                          <td><?php echo $row['Alternative_no']; ?></td>
                          <td><?php echo $row['Address']; ?></td>
                          <td><?php echo $row['Agency']; ?></td>
						  <td><input type="checkbox" name="ids[]" class="clg" value="<?php echo stripslashes($row['No']); ?>"></td>
						  
                        </tr>
						<?php $i++;} ?>                        
                           </tbody>
                           </table>
						    <input type="submit" value="Delete"id="btn" class="btn btn-round btn-danger click"onClick="return confirm('Do you want to delete this Item?')"disabled>
						<input type="reset" value="Cancel"class="btn btn-round btn-info"id="can">
						</form>
                          </div>
                         </div>
                        </div><?php } ?>
                       </div>
                      </div>
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

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtip",
              buttons: [               
                {
                  extend: "excelFlash",
                  className: "btn btn-info"
                },
                
                {
                  extend: "print",
                  className: "btn btn-warning"
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
	 <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
				"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
              dom: "Bfrtip",
              buttons: [               
                {
                  extend: "excelFlash",
                  className: "btn btn-info"
                },
                
                {
                  extend: "print",
                  className: "btn btn-warning"
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
    <!-- /Datatables -->	
	<script>
$('.clg').change(function () {
    if ($(".clg:checked").length >= 1) {
        $('#btn').removeAttr('disabled');
    } else {
        $('#btn').attr('disabled', 'disabled');
    }
});
$('#can').click(function () {
    $('.clg').prop('checked', false);
    $('.clg').trigger('change')
});

$('#show').change(function () {
    if ($("#show:checked").length >= 1) {
       $('.clg').prop('checked', true);
	   $('.clg').trigger('change')
    } else {
		 $('.clg').prop('checked', false);
        $('.clg').trigger('change')
    }
});
</script>
	<script>
      $(document).ready(function() {
        $('#date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  </script>

<script type="text/javascript">
$(document).ready(function()
{
$(".butn").click(function()
{
var id1 =  "<?php echo $one; ?>";
var id=$(this).val();
//var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "Search.php",
data: { id1: id1, id: id },
cache: false,
success: function(html)
{
$(".no").html(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$(".butn1").click(function()
{
var id1 =  "<?php echo $two; ?>";
var id=$(this).val();
//var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "Search.php",
data: { id1: id1, id: id },
cache: false,
success: function(html)
{
$(".no1").html(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$(".butn2").click(function()
{
var id1 =  "<?php echo $three; ?>";
var id=$(this).val();
//var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "Search.php",
data: { id1: id1, id: id },
cache: false,
success: function(html)
{
$(".no2").html(html);
} 
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$(".butn3").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "Search1.php",
data: dataString,
cache: false,
success: function(html)
{
$(".no3").html(html);
} 
});
});
});
</script>

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
    <!---/Date--->
  </body>
</html>