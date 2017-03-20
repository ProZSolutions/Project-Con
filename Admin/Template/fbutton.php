 <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			<?php if($role=='admin' || $role == 'manager') {	?>
              <a href="User_manage" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
			  <?php } else { ?>
			   <a href="Profile" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
			  <?php } ?>
              <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>