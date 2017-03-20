             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
			     <ul class="nav side-menu">
				<?php if($role == 'admin' || $role == 'manager') {	?>
                  <li><a href="Main_dashboard"><i class="fa fa-home"></i> Home </a>
                  </li><?php }  else {?>
				   <li><a href="dashboard"><i class="fa fa-home"></i> Home </a>
                  </li><?php } ?>
                  <li><a><i class="fa fa-calculator"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					<?php if($role == 'admin' || $role == 'manager') {	?>
					 <li><a href="Manage_account">Manage Account</a>
                      </li>			<?php } ?>
                      <li><a href="view_payment">View Account</a>
                      </li>
                      <li><a>payment<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="payment">Deal/Emp/Lab Payment</a>
                            </li>
                            <li><a href="vehicle_payment">Vehicle payment</a>
                            </li>                           
                          </ul>
                    </ul>
                  </li>    

                  <li><a><i class="fa fa-truck"></i> Material <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					<?php if($role=='admin' || $role == 'manager') {	?>
                      <li><a href="Manage_Loads">Manage Loads</a>
                      </li><?php } ?>
					  <li><a href="Custom_view">Load Details</a>
                      </li>
                      <li><a href="Load_entry">Load Entry</a>
					 </li>
					  <li><a href="Material_entry">Material List</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-slideshare"></i> Contacts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_contact">View Contacts</a>
                      </li>
                      <li><a href="create_contact">Create Contact</a>
                      </li>
                    </ul>
                  </li>
				    <li><a><i class="fa fa-bar-chart-o"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="labour_attend">Labour Attendance</a>
                      </li>
					  <li><a href="vehicle_attend">Vehicle Attendance</a>
                      </li>
					   <li><a href="view_vehicle">View Vehicle Attendance</a>
                      </li>	
                    </ul>
					 <li><a><i class="fa fa-database"></i>Stock<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="stocklist">Stock List</a>
                      </li>
					  <li><a href="Stock_Entry">Stock Entry</a>
                      </li>
					   <li><a href="view_stock">View Stock</a>
                      </li>	
					  <?php if($role=='admin' || $role == 'manager') {	?>
					  <li><a href="Manage_stock">Manage Stock</a>
                      </li><?php } ?>
                    </ul>
                  </li>
                </ul>
              </div>
	<!--- some more menus------>
              <div class="menu_section">
                <h3>Coming Soon</h3>  
				 <ul class="nav side-menu">
			  <li><a href="#"><i class="fa fa-list-alt"></i> Employee Attendance </a>
               </li>
               </ul>
              </div>			 
			   </div>