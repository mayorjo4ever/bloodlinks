
<?php  ###  
	###  
		if(!isset($_SESSION)) session_start(); 
		error_reporting(E_ALL^E_NOTICE);
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
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100 mx-auto">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form  method="post">
					<?php if($_SESSION['alert-type']!="") {?>
				  <div class="text-center <?php # echo $_SESSION['alert-type'];?> text-center purchase-popup"> 
					<span> <?php echo $_SESSION['logMsg'] ; ?></span> 					
				  </div> 
			 <?php } ?>
				
                  <div class="form-group">
                    <label class="label bold">Username</label>
                    <div class="input-group ">
                      <input type="text" name="username" id="username" class="form-control  border-primary" placeholder="Username" style="font-size:16px; ">
                      <div class="input-group-append border-primary">
                        <span class="input-group-text border-primary">
                          <i class="fa fa-user"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label bold">Password</label>
                    <div class="input-group border-primary">
                      <input type="password" name="password" id="password"  class="form-control border-primary"  style="font-size:16px; " placeholder="*********" >
                      <div class="input-group-append border-primary">
                        <span class="input-group-text border-primary">
                          <i class="mdi mdi-lock" ></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <center> <button type="button" name="logUser" id="logUser" class="btn btn-primary submit-btn btn-rounded ladda-button" data-style="zoom-in"> &nbsp; Login &nbsp; &nbsp; <i class=" fa fa-sign-in fa-2x"> </i> &nbsp; </button> </center>
                  </div>
                     
                </form>
              </div> <!--
              <ul class="auth-footer">
                <li>
                  <a href="#">Conditions</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
              </ul> -->
              <p class="footer-text text-center"> <br/><br/>copyright &copy; <?php echo date('Y')."&nbsp; &nbsp;  ". $system_info['name'][0]." All rights reserved.";  ?>    </p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php require "foot_links.php"; ?>
  </body>
</html>