<?php  ###  
	###  
	error_reporting(E_ALL^E_NOTICE);
	@session_start();	 
	if(isset($_SESSION['admUser']) && isset($_SESSION['admKey'])) header('Location:admin/');
	 ?>
		
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
		require "home_link.php";
	?>
	
	</head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
         <div class="content-wrapper auth p-0 theme-two">
          <div class="row d-flex align-items-stretch">
            <div class="col-md-6 banner-section d-none d-md-flex align-items-stretch justify-content-center">
              <div class="slide-content bg-1"> </div>
            </div>
              <div class="col-12 col-md-6 h-100 bg-light">
              <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
                <div class="nav-get-started">
                 <!-- <p>Don't have an account?</p>
                  <a class="btn get-started-btn" href="#">GET STARTED</a>-->
                </div>
                <form  method="post" onsubmit="login()">
                  <h3 class="mr-auto text-dark font-30 bold"> <?php echo $system_info['name'][0]; ?></h3>
                  <p class="mb-5 mr-auto"> Enter your details below.</p>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend border border-primary">
                        <span class="input-group-text">
                          <i style="font-size:20px;" class="mdi mdi-account-outline text-primary"></i>
                        </span>
                      </div>
                      <input style="font-size:20px;" type="text" name="username" id="username" class="form-control border border-primary font-20" placeholder="Username"> </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend border border-primary">
                        <span class="input-group-text" onclick="toggle_login_password()">
                          <i class="mdi mdi-lock text-primary" style="font-size:20px;" id="icon_change"></i>
                        </span>
                      </div>
                      <input type="hidden" id="pswType" value="lock" />
                      <input style="font-size:20px;" type="password" name="password" id="password" class="form-control border border-primary" placeholder="Password"> </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="login btn btn-primary  submit-btn btn-rounded ladda-button" data-style="zoom-in"> SIGN IN &nbsp; &nbsp; <i class=" fa fa-sign-in fa-2x"> </i> &nbsp; </button>
                  </div>
                  <div class="wrapper mt-5 text-muted">
                    <p class="footer-text"> Copyright © <?php echo date('Y');  echo "&nbsp;&nbsp;&nbsp;".$system_info['name'][0]; ?>. <br/> All rights reserved.</p>
                    <ul class="auth-footer text-gray">
                     <!--  <li>
                        <a href="#">Terms & Conditions</a>
                      </li>
                      <li>
                        <a href="#">Cookie Policy</a>
                      </li> -->
                    </ul>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
		 
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php require "foot_links.php"; ?>
  </body>
</html>