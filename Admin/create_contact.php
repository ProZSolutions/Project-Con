<?php
$title  ="Create Contact";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
session_start();
error_reporting(0);
require 'MainConfig.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['ok'])) {
$data1 = $_POST['aaa'];
	  $tmpName  = $_FILES['img']['tmp_name']; 
      $fp = fopen($tmpName, 'r');
      $adata = fread($fp, filesize($tmpName));
      fclose($fp);
      $adata = addslashes($adata);
    
  $name1=$_POST['name'];
  $type=$_POST['ss'];
  $mob=$_POST['mob'];
 $mob1 = preg_replace("/[^0-9]/", "", $mob);
   $amob=$_POST['amob'];
    $amob1 = preg_replace("/[^0-9]/", "", $amob);
  $addr1=$_POST['addr'];   
  $nam1="firstone";	
if($nam1==$data1)
	{
     $sql = "INSERT INTO `contact`(`Name`,`Designation`,`Design_type`,`Mobile_no`,`Alternative_no`,`Address`,`photo`)
    VALUES('$name1','Employee','$type','$mob1','$amob1','$addr1','$adata')";
    mysqli_query($link,$sql); 	
	}
}
}
?>
<?php 
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST')
{ $lab="thirdone";

	if (isset($_POST['labour']))
	{   
		 $lab1 = $_POST['third'];	
		 $tmpName1  = $_FILES['labimg']['tmp_name']; 
      $fp1 = fopen($tmpName1, 'r');
      $adata2 = fread($fp1, filesize($tmpName1));
      fclose($fp1);
      $adata2 = addslashes($adata2); 
	$one=$_POST['labname'];
	$two=$_POST['labdesign'];
	$mo=$_POST['labmob'];
	 $three = preg_replace("/[^0-9]/", "", $mo);
	$amo=$_POST['labamob'];
	 $four = preg_replace("/[^0-9]/", "", $amo);
	$five=$_POST['labaddr'];
	$six=$_POST['mas'];

	$seven=$_POST['asmas'];

	$eight=$_POST['otmas'];

	$nine=$_POST['otasmas'];	
	 if($lab1==$lab)
		{

		  $sql1 = "INSERT INTO `contact`(`Name`,`Designation`,`Design_type`,`Mobile_no`,`Alternative_no`,`Address`,`masion`,`assit_masion`,`ot_masion`,`ot_assit_masion`,`photo`)
    VALUES('$one','Labour','$two','$three','$four','$five','$six','$seven','$eight','$nine','$adata2')";
    mysqli_query($link,$sql1); 	
	
		}
	
	}
}
?>
<?php 
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST')
{ $del="fourth";
	if (isset($_POST['deal']))
	{
	 $del2 = $_POST['four'];		
	   $tmpName2  = $_FILES['dealimg']['tmp_name']; 
      $fp2 = fopen($tmpName2, 'r');
      $adata3 = fread($fp2, filesize($tmpName2));
      fclose($fp2);
      $adata3 = addslashes($adata3);  	
	$one=$_POST['dealname'];
	$twomob =$_POST['dealmob'];
    $two = preg_replace("/[^0-9]/", "", $twomob);
	$twoamob=$_POST['dealamob'];
	$three = preg_replace("/[^0-9]/", "", $twoamob);
	$four=$_POST['dealaddr'];
	
	$five=$_POST['dealagn'];
	 if($del==$del2)
		{
		  $sql2 = "INSERT INTO `contact`(`Name`,`Designation`,`Mobile_no`,`Alternative_no`,`Address`,`Agency`,`photo`)
    VALUES('$one','Dealer','$two','$three','$four','$five','$adata3')";
    mysqli_query($link,$sql2); 	
	 
		}
	
	}
}
?>

<?php 
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
$a=$_POST['design1'];
$b=$_POST['ty'];
$nam2="secondone";
 if (isset($_POST['ok1']))
		 $data1 = $_POST['second'];	
	{
      if($nam2==$data1)
		{
$query = mysqli_query($link, "SELECT * FROM designation WHERE Design_name='".$a."'");

if(mysqli_num_rows($query) > 0){

    $msg=" already exists";
}else{
    $sql3 = "INSERT INTO `designation` (`Design_name`,`type`)
    VALUES('$a','$b')";
    mysqli_query($link,$sql3); 
}
} 
}
}

?>
<?php
$msg5="";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$mname=strtoupper($_POST['material']);
		$qnty=$_POST['qty'];
		$vamt=$_POST['amt'];
		$hour=$_POST['hour'];
		$org1=$_POST['orgno'];
	 $org = preg_replace("/[^0-9]/", "", $org1);
		$alt=$_POST['altno'];
		 $alt = preg_replace("/[^0-9]/", "", $alt1);
		$add=$_POST['ownaddr'];
		
          if (mysqli_connect_errno($link))
           {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
           } 

		   $nam1="fifth";
           
if(isset($_POST['vehicle'])) {
    $data1 = $_POST['fifth'];
	
if($nam1==$data1)
	{
	         $s="select * from vehicle where `vno` = '$mname'";
			 $query = mysqli_query($link,$s);		    
			 while ($row = $query->fetch_assoc())
				 {
				    $mname1=$row['vno'];
					$qnty1=$row['vown'];
			      }
					  if($mname == $mname1)
		                  {
						  $msg5="Already Added ";
						  }
					  else
		                  {
                          $sql = "INSERT INTO `vehicle` (`vno`,`vown`,`vwege`,`hour_cost`,`mobile`,`amobile`,`address`)
                           VALUES('$mname','$qnty','$vamt','$hour','$org','$alt','$add')";
                                 if (!mysqli_query($link,$sql))
                                      {
                                         die('Error: ' . mysqli_error($link));
                                      }
		                  }
	}
}
		}
		?>   
       <!-- header -->
<?php 
require("JSON/empdata.php");
 
require("Template/header.php"); ?>
<!--------- body ---------------->
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
            <div class="clearfix"></div>
            <div class="row">
            <div class="">
              <div class="col-md-12 col-sm-10  col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                       <h2>Create Contact <small>Users</small></h2>                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                 
                    	
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">Employee</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Labour</a>
                        </li>
						 <li role="presentation" class=""><a href="#tab_content3" id="view-tab" role="tab" data-toggle="tab" aria-expanded="false">Dealer</a>
                        </li>
						 <li role="presentation" class=""><a href="#tab_content5" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Vehicle</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="search-tab" data-toggle="tab" aria-expanded="false">Designation</a>
                        </li>						
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="new-tab">         
             <div class="clearfix"></div>
			<div class="row">
			 <div class="page-title">
              <div class="title_left">
                <h3>Employee Contact</h3>
              </div>             
              </div>
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">                 
                  <div class="x_content"><?php echo $msg;?>
                    <br />
                    <form action="create_contact" class="form-horizontal form-label-left" data-parsley-validate method="post" enctype="multipart/form-data" >
                   
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="name" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>
                    
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation <span class="required" style="color: red;">*</span>
						</label>
                        <div class="col-md-4 col-sm-9 col-xs-6">
						  <select class="form-control" name="ss">
                          <option>Select Designation</option>
						<?php $s= "select `Design_name` from designation where `type`='Employee'";
						$r=mysqli_query($link,$s);
						while($ro=mysqli_fetch_assoc($r)) { 		?>                       
                        <option><?php echo $ro['Design_name']; ?></option>  <?php } ?>
						   </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
						<input type="text" name="mob" id="mob" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999)999-9999'">
                        </div>
					   </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alternate No <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="amob" id="mob" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999) 999-9999'">
                        </div>
					   </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea id="textarea" name="addr" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
						</div>
					 
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Photo
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
						<input name="img" accept="image/jpeg" type="file" class="btn btn-warning">                        
                        </div>
					   </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						 <input type="hidden" name="aaa" value="firstone">                         
                          <input type="submit" name="ok" class="btn btn-success" value="Submit">	
						   <button type="clear" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
					  </form>
                  </div>
               
				</div>
				</div>
				</div>
				</div>
				<div>
				</div>
   		                 <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="designation-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Labour Contact</h3>
              </div>             
              </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                
                   
                    
					
                  <div class="x_content"><?php echo $msg;?>
                  <br />
                    <form action="create_contact" class="form-horizontal form-label-left" data-parsley-validate method="post" enctype="multipart/form-data" >
                   
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="labname" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>
               
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation <span class="required" style="color: red;">*</span>
						</label>
                        <div class="col-md-4 col-sm-9 col-xs-6">
						  <select class="form-control" name="labdesign">
                            <option>Select Designation</option>
						<?php
						$s1 = "select `Design_name` from designation where `type`='Labour'";
						$r1 = mysqli_query($link,$s1);
						while($ro1 = mysqli_fetch_assoc($r1))
						{		?>                        
                            <option><?php echo $ro1['Design_name']; ?></option>                                              
                         
						  <?php } ?>
						   </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="labmob" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999) 999-9999'">
                        </div>
					   </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alternate No <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="labamob" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999) 999-9999'">
                        </div>
					   </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea id="textarea" name="labaddr" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
						</div>

					  <div class="form-group">
					   <label  class="control-label col-md-3 col-sm-3 col-xs-6"> Masion <i class="fa fa-inr"></i>  </label> 
						 <div class="col-md-2">						 
                          <input type="text" name="mas" id="cre2" required="required"  placeholder="000" class="common form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="4">       
						  </div>
						  <label  class="control-label col-md-2 col-sm-3 col-xs-6"> Assit Masion <i class="fa fa-inr"></i> </label>
						   <div class="col-md-2">					
                          <input type="text" name="asmas" id="dep2" required="required" placeholder="000" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="4">
                        </div>                             
                       </div>
					   
					     <div class="form-group">
					   <label  class="control-label col-md-3 col-sm-3 col-xs-6"> OT Masion  <i class="fa fa-inr"></i>  </label> 
						 <div class="col-md-2">						 
                          <input type="text" name="otmas" id="cre1" required="required"  placeholder="000" class="common form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="4"/>       
						  </div>
						  <label  class="control-label col-md-2 col-sm-3 col-xs-6"> OT Assit Masion<i class="fa fa-inr"></i> </label>
						   <div class="col-md-2">					
                          <input type="text" name="otasmas" id="dep1" required="required" placeholder="000" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="4">
                        </div>                             
                       </div>	
					  
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Photo
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
						<input name="labimg" accept="image/jpeg" type="file" class="btn btn-warning">                        
                        </div>
					   </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						 <input type="hidden" name="third" value="thirdone">                         
                          <input type="submit" name="labour" class="btn btn-success" value="Submit">	
						   <button type="clear" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
				</div>
				</div>
				</div>
				</div>   
				 </div>
 <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="designation-tab">
 <div class="col-md-12 col-sm-12 col-xs-12">
 <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Vehicle Contact</h3>
              </div>             
              </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">                 
                    
					
                  <div class="x_content">
                  <br />
            <form action="create_contact" class="form-horizontal form-label-left" data-parsley-validate  method="post">
                      
                      <div class="form-group"><span class="required" style="color: red;"><?php echo $msg5;?></span>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle No<span class="required" style="color: red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
                          <input type="text" name="material" id="first-name" style="text-transform:uppercase" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner Name<span class="required" style="color: red;">*</span></label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
                       <input type="text" name="qty" id="first-name" required="required" class="form-control col-md-7 col-xs-12">                           
                        </div>
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hour Cost<span class="required" style="color: red;">*</span></label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
                       <input type="text" name="hour" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="10">                           
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Driver Wege<span class="required" style="color: red;">*</span></label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
                       <input type="text" name="amt" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="10">                           
                        </div>
                      </div>

					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No<span class="required" style="color: red;">*</span></label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
                       <input type="text" name="orgno" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999) 999-9999'">                           
                        </div>
                      </div>

					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alternative No<span class="required" style="color: red;">*</span></label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
                       <input type="text" name="altno" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999) 999-9999'">                           
                        </div>
                      </div>

					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea id="textarea" name="ownaddr" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
						</div>



                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                          
                           <input type="hidden" name="fifth" class="btn btn-success" value="fifth">
						   <input type="submit" name="vehicle" class="btn btn-success" value="Submit">	
                          <button type="clear" class="btn btn-primary">Cancel</button>       
                        </div>
                      </div>
                    </form>
					</div>
				</div>
				</div>
				</div>
				</div> 
				</div>
				</div>

					 <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="designation-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
						   <div class="">
           
            <div class="page-title">
              <div class="title_left">
                <h3>Dealer Contact</h3>
              </div>             
              </div>
			<div class="row">
             <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                           
                   
                   
                  <div class="x_content"><?php echo $msg;?>
                      <br />
                    <form action="create_contact" class="form-horizontal form-label-left" data-parsley-validate method="post" enctype="multipart/form-data" >
                   
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="dealname" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>                     		   
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="dealmob" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999)999-9999'">
                        </div>
					   </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alternate No <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="dealamob" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" maxlength="15" data-inputmask="'mask' : '(999) 999-9999'">
                        </div>
					   </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea id="textarea" name="dealaddr" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
						</div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agency Name <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="dealagn" id="firstA" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
					   </div>
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Photo
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
						<input name="dealimg" accept="image/jpeg" type="file" class="btn btn-warning">                        
                        </div>
					   </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						 <input type="hidden" name="four" value="fourth">                         
                          <input type="submit" name="deal" class="btn btn-success" value="Submit">	
						   <button type="clear" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
				</div>
				</div>
				</div>
				</div>  				
				</div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="designation-tab">
        <div class="col-md-12 col-sm-12 col-xs-12">            
          <div class="">
            <div class="page-title">                
			  </div>
            <div class="clearfix"></div>
			<div class="row">
             <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Designation</h2>
                    <div class="clearfix"></div>
					</div>                      
                  <div class="x_content">
                    <br /><!-- <form class="form-horizontal form-label-left" data-parsley-validate>action="<?= $_SERVER['PHP_SELF'] ?>" method="post"-->
                   
                   <form action="create_contact" method="post" class="form-horizontal form-label-left" data-parsley-validate>
					  
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Designation <span class="required" style="color:red;">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-10">
                          <input type="text" name="design1" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div><span style="color:red;"><?php echo "$msg";?></span>
					   </div>
					    <div class="form-group">
                               <label  class="control-label col-md-3 col-sm-3"> <span class="required"></span></label>                                     
                               <input type="radio"  class="flat" name="ty" id="emp" value="Employee"/>Employee
                              <input type="radio"  class="flat" name="ty" id="lab" value="Labour" />Labour									                  
                           </div>                    		
                                     
					 <div class="ln_solid"></div>                       
					  <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						 <input type="hidden" name="second" value="secondone">                         
                          <input type="submit" name="ok1" class="btn btn-success" value="Submit">
						   <button type="clear" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
				  </form>					 
                </div>				
              </div>
            </div>

		
       
		   <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Designation List </h2>
                   <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Designation </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php	$sql1=$link->query("select * from designation");
          $i=1;
          while ($row = $sql1->fetch_assoc()){
          echo "<tr><td>$i</td><td>{$row['Design_name']}</tr>\n";
          $i++;
		  }       ?>
                        
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
     </div>
	 </div>
	 </div>
	 </div>            
              
              </div>
            </div>
          </div>     <div class="clearfix"></div>
        
 <!-- /page content -->

        <!-- footer content -->
            <?php require("Template/footer.php"); ?>
			<!-- Datatables -->
	<script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
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
    <!-- /Datatables -->	
	<!--- Date -->	
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
    <!-- /Date -->
 <script type="application/javascript">
 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>	
</body>
</html>