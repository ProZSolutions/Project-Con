<?php 
include "Config.php";
session_start();
error_reporting(0);
$na1 = session_id();
$msg = "";
$id3 = '1';
$na=$_SESSION['mysesi'];
$sql12 = "SELECT role FROM session WHERE name = '$na' ";
$q = mysqli_query($link,$sql12);
while ($row = mysqli_fetch_assoc($q)) 
		{
	 $role = $row['role'];	
		}
if($role=='admin' || $role=='manager') {

$sql123 = "SELECT * FROM session WHERE name = '$na' ";
$query1 = mysqli_query($link,$sql123);
while ($row = mysqli_fetch_assoc($query1)) 
		{
		$id2 = $row['Active'];
		}	   
		if($id2==$id3)
		{ header("location:Admin/Main_dashboard");
		}		
		}
		else
		{
$sql123 = "SELECT * FROM session WHERE name = '$na' ";
$query1 = mysqli_query($link,$sql123);
while ($row = mysqli_fetch_assoc($query1)) 
		{
		$id2 = $row['Active'];
		}	   
		if($id2==$id3)
		{ header("location:Admin/dashboard");
		}
		}
$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'Unknown IP Address'; 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nam = $_POST["username"];
      $name = mysqli_real_escape_string($link,$nam);
    $password = md5($_POST["password"]);
	    $_SESSION['mysesi'] = $name;
		$na = $_SESSION['mysesi'];       
 	 if ($name == '' || $password == '') {
        $msg = "You must enter all fields";
    } 
 /* $sql1 = "SELECT * FROM logstamp WHERE username = '$name' AND Active = '1'";
  $query1 = mysqli_query($link,$sql1);
  while ($row = mysqli_fetch_assoc($query1)) 
		{
                  unset($Active);
                  $id1 = $row['Active'];
		}
	   
		if($id1 != 0)
	{$msg="already log on";
		
		}*/
	else {
        $sql = "SELECT * FROM user WHERE username = '$name' AND password = '$password'";
        $query = mysqli_query($link,$sql);       
        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
            exit;
        }
        if (mysqli_num_rows($query) > 0) {
          $sq="UPDATE `logstamp` SET `Active`='1',`lastlogin` = NOW(),`ipaddress`='$ipaddress' WHERE username='$name'"; 
          mysqli_query($link,$sq);
		  $sess ="UPDATE `session` SET `session_id`= '$na1',`lastlogin` = NOW(),`Active`='1',`IP`='$ipaddress' WHERE name='$na'";
            mysqli_query($link,$sess); 			
         header("location:Admin/index.php");         
        }
        $msg = "Username and password do not match";
    }
 } 
?>
<html class="no-js" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <!-- Page Title Here -->
        <title>ProZ Solutions |</title>		
        <!-- Page Description Here -->
		<meta name="description" content="A responsive coming soon template, un template HTML pour une page en cours de construction">
        <!-- Disable screen scaling-->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->       
        <!-- Web fonts and Web Icons -->
        <link rel="stylesheet" href="./css/pageloader.css">       
        <!-- Vendor CSS style -->       
		<!-- Main CSS files -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/main_responsive.css">
        <link rel="stylesheet" href="css/style-font1.css">        
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style style="background:#F7F7F7;"  -->
    <link href="css/custom.css" rel="stylesheet">
		<style>
.center {
    margin: auto;
    width: 60%;
    padding: 20px;
	margin-left:250px;
	}
#form
{
width:300px;
height:35px;
font-size: 15px;
left: 13px;
line-height: 24px;
padding-left:15px;
}
.cls
{
font-size:22px;
color:#000000;
}
#footer
{
font-size:13px;
color:#000000;
}
</style>
    </head>
    <body id="menu" class="alt-bg">
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Site config : put launching date here
             data-date="01/31/2015 23:00:00"        Launching date
             data-date-timezone="+0"                Lanching date time zone
--> 

        <!-- Page Loader -->
        <div class="page-loader" id="page-loader">
            <div><i class="ion ion-loading-d"></i><p>loading</p></div>
        </div>        
        <!-- BEGIN OF site header Menu -->
		<!-- Add "material" class for a material design style -->		
        <!-- END OF site header Menu-->        
       <!-- BEGIN OF site cover -->
        <div class="page-cover" id="home">
            <!-- Cover Background -->
            <div class="cover-bg pos-abs full-size bg-img" data-image-src="css/3.jpg"></div>
			
            <!-- BEGIN OF Slideshow Background -->
            <!--<div class="cover-bg pos-abs full-size slide-show">
				<i class='img' data-src='./img/bg-slide1.jpg'></i>
				<i class='img' data-src='./img/bg-slide2.jpg'></i>
				<i class='img' data-src='./img/bg-slide3.jpg'></i>
				<i class='img' data-src='./img/bg-slide4.jpg'></i>
			</div>-->
            <!-- END OF Slideshow Background -->            
            <!--BEGIN OF Static video bg  - uncomment below to use Video as Background
            <div id="container" class="video-container show-for-medium-up">
                <video autoplay="autoplay" loop="loop"  muted="muted"
                       width="640" height="360">
                    <source src="vid/flower_loop.mp4" type="video/mp4">
                </video>
            </div>
            <!--END OF Static video bg-->			
			<!-- Solid color as background -->
<!--            <div class="cover-bg-mask pos-abs full-size bg-color" data-bgcolor="rgba(62, 24, 219, 0.41)"></div>-->
			<!-- Solid color as filter -->
            <div class="cover-bg-mask pos-abs full-size bg-color" data-bgcolor="rgba(225,225,102, 0.7)"></div>
<!--            <div class="cover-bg-mask pos-abs full-size bg-color" data-bgcolor="rgba(235, 25, 219, 0.41)"></div>-->            
        </div>
        <!--END OF site Cover -->        
        <!-- BEGIN OF site main content content here -->
        <main class="page-main" id="mainpage">             
			<!-- Begin of timer page -->
            <div class="section page-when page page-cent" id="s-when">
                <section class="content">
                    		<div class="site-config"
							 data-date="10/31/2015 23:00:00" 
							 data-date-timezone="+0"
							 ></div>
			<div class="login" class="form" style="color:#000000">
          <section class="login_content">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <h1>Login</h1>
              <?php echo $msg; ?>
              <div>
                <input type="text" id="form"  placeholder="Username" required="" name="username"/>
              </div>
              <div>
                <input type="password"  id="form"  placeholder="Password" required=""name="password" />
              </div>
             <div class="center">
			 <input class="btn btn-warning submit" type="submit" value="Login" >
             <!--   <a class="btn btn-default submit">Log in</a>
				
                <a class="reset_pass" href="#">Lost your password?</a>  --->
              </div>
              <div class="clearfix"></div>
              <div class="separator" >
              <div>
                  <p style="color:#000000;font-size:22px; margin-top:16px; font-style:none;"  ><i class="fa fa-building"></i> Construction Demo</p>
                </div>
              </div>
            </form>
          </section>                            
                    
                </section>       
                
            </div>
            <!-- End of timer page -->
       </main>
        <!-- END OF site main content content here -->  		
		<!-- Begin of site footer -->
		<footer class="page-footer">
			<span>
				<a href="https://pro-z.in">ProZ Solutions</a>
         <i class="fa fa-copyright" id="footer">2016 All Rights Reserved.</i>	
				
			</span>
		</footer>
		<!-- End of site footer -->        
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->        
        <!-- All Javascript plugins goes here -->
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
		<!-- All vendor scripts 
        <script src="./js/vendor/all.js"></script>		
		<!-- Detailed vendor scripts -->
        <!--<script src="./js/vendor/jquery.fullPage.min.js"></script>
        <script src="./js/vendor/jquery.slimscroll.min.js"></script>
        <script src="./js/vendor/jquery.knob.min.js"></script>
        <script src="./js/vegas/vegas.min.js"></script>
        <script src="./js/jquery.maximage.js"></script>
        <script src="./js/okvideo.min.js"></script>-->		
		<!-- Downcount JS -->
        <script src="js/jquery.downCount.js"></script>		
		<!-- Form script
        <script src="./js/form_script.js"></script>        
		<!-- Javascript main files -->
        <script src="js/main.js"></script> 
        <!-- Google Analytics: Uncomment and change UA-XXXXX-X to be your site"s ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src="//www.google-analytics.com/analytics.js";
            r.parentNode.insertBefore(e,r)}(window,document,"script","ga"));
            ga("create","UA-XXXXX-X");ga("send","pageview");
        </script>-->
    </body>
</html>