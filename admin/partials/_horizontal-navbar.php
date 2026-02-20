
<!-- <div class="se-pre-con"> </div>   page loader icon -->

<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
  <div class="container d-flex flex-row nav-top">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top">
      <a class="navbar-brand brand-logo" href="index.php">
          <img src="../assets/images/admin_logo.jpg" alt="logo" style="height:60px" /> </a> <!-- ./ images/logo_2.svg -->
      <a class="navbar-brand brand-logo-mini" href="index.php">
        <img src="../assets/images/admin_logo_mini.jpg" alt="logo" /> </a> <!-- ./  logo-mini.svg  -->
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
     <!--  <form action="" class="d-none d-sm-block">
        <div class="input-group search-box">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="mdi mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Type to search…">
          <i class="mdi mdi mdi-close search-close"></i>
        </div>
      </form> --> 
      <ul class="navbar-nav ml-auto">
	  
        <li class="nav-item dropdown d-none d-xl-inline-block">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">Hello, <?php echo $_SESSION['adminFullname'];  ?>
            <img class="img-xs rounded-circle ml-3" src="../assets/images/faces/face24.jpg" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a class="dropdown-item p-0">
              <div class="d-flex border-bottom">
                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                </div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                  <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                </div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                </div>
              </div>
            </a>
            <a class="dropdown-item mt-2"> Manage Accounts </a>
            <a class="dropdown-item"> Change Password </a>
            <a class="dropdown-item" href="logout.php"> Sign Out </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </div>
  
  <?php $admin = new User("users");	
				$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
				$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
				$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id				
				# print_r($_SESSION['mypages']);
			?>
  <div class="nav-bottom">
    <div class="container"> 
		<ul class="nav page-navigation">
	<?php 
		####################################################
				## list all sub-group headers 
		   		if(!is_null($_SESSION['mysubpages']))foreach ($_SESSION['mysubpages']['groupid'] as $ph){ // page header
  				  $subpages = $admin->get_sub_pages($myroles['role_id'][0],$ph); ## by role-id
					$groupinfo = $admin->page_group_info($ph); 
					 
	?>
	
	<li class="nav-item">
          <a href="<?php echo "#".$ph; ?>" class="nav-link">
            <i class="link-icon  <?php echo $groupinfo['icon'] ; ?>"></i>
            <span class="menu-title "> <?php echo $groupinfo['groupname'];?>  </span>
            <i class="menu-arrow "></i>
          </a>
          <div class="submenu ">
            <ul class="submenu-item ">  
			 <?php foreach($subpages['url'] as $url) {
				   $page_info = $pmg->page_info($url);
					if( $page_info['autoload']=='yes') { ?>
					 <li class="nav-item ">
						<a class="nav-link " href="<?php echo $url; ?>"> <?php echo $page_info['title']; ?> </a>
					  </li>	
					<?php	} ## end if page is to be autoload 
						} # end foreach sub ?> 
            </ul>
          </div>
        </li> 
		
		<?php } ?> 
		
      </ul>
    </div>
  </div>
</nav>