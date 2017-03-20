 <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">	<a href="#" class="site_title">  <span class="pz-logo">
                 <span><?php echo $ctitle; ?></span></a>
				</div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
 <!-- project con to name of the user to be displayed -->
            <div class="profile">
              <div class="profile_pic">  <?php if($ss == ""){?><img src="images/user.png" alt="..." class="img-circle profile_img"><?php }else{ ?>
			  <img src="data:image/jpeg;base64,<?php echo $ss; ?>" alt="..." class="img-circle profile_img"><?php } ?>                
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2><?php echo $user; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <div class="clearfix"></div>
			
