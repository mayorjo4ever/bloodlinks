
<?php ?>
 
	<nav class="sidebar sidebar-offcanvas no-print" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="../assets/images/default-user.png" alt="profile image">
                </div>
                <div class="text-wrapper ">
                  <p class="profile-name"> <b> <?php echo $_SESSION['adminFullname'];  ?> </b> </p>
                  <div>
                    <small class="designation text-primary bold"> <?php echo $_SESSION['my_role_name']; ?></small>
                    <!-- <span class="status-indicator success"></span>-->
                    <span class="fa fa-circle-o text-success"></span>
                  </div>
                </div>
              </div>
               
			  <button class="btn btn-success btn-block"> Quick Menus &nbsp; &nbsp; 
                <i class=" fa fa-chevron-down"></i>
              </button> 
			  
            </div>
          </li>
		  
		  <?php 
				$admin = new User("users");	
				$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
				$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
				$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id				
				####################################################
				## list all sub-group headers 
		   		if(!is_null($_SESSION['mysubpages']))foreach ($_SESSION['mysubpages']['groupid'] as $ph){ // page header
  				  $subpages = $admin->get_sub_pages($myroles['role_id'][0],$ph); ## by role-id
					$groupinfo = $admin->page_group_info($ph); ?>
					 
					 <li class="nav-item <?php  if($ph == $cur_groupid) echo 'bold '; ?>">
						<a class="nav-link" data-toggle="collapse" href="<?php echo "#".$ph; ?>" aria-expanded="false" aria-controls="ui-basic">
						  <i class="menu-icon <?php echo $groupinfo['icon'] ; ?>"></i>
						  <span class="menu-title">  <?php echo $groupinfo['groupname'];?>  </span>
						  <i class="menu-arrow"></i>
						</a> 
						  <div class="collapse" id="<?php echo $ph; ?>">
							  <ul class="nav flex-column sub-menu" style="font-weight:600;" >								 
								<?php foreach($subpages['url'] as $url) {
								   $page_info = $pmg->page_info($url);
									if( $page_info['autoload']=='yes') { ?>
									   <li class=" nav-item <?php echo  $pmg->getActivist($url);  ?>" style="margin-left:0px; padding-left:0px;"> 
											<a href="<?php echo $url; ?>" class=" nav-link" > <i class=" <?php echo $page_info['icon']; ?>"> </i> &nbsp; &nbsp; <?php echo $page_info['title']; ?> </a> 
									   </li>
										<?php	} ## end if page is to be autoload 
									} # end foreach sub ?> 
							  </ul>
							</div>
						  </li>
		  
			<?php	}
		   ?>
		   
        </ul>
      </nav>
	  