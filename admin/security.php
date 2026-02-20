<?php 

	 require "usercheck.php";  	 
	
	?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
</head>
<!-- <body class="sidebar-fixed"> -->
<body>   
    
  <div class="container-scroller">
    
	<?php require "head_nav2.php"; ?>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper"> 
           <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                  <h4 class="card-title bold text-capitalize font-18"> 
					<i class="fa fa-key text-danger"></i>   user password management  
				  </h4> 
				  <span class="text-primary"> you are expected to change your password for security purposes.  </span>
                  <p>&nbsp; </p>
				  <div class="col-md-5" style="min-height:200px;">
                    <form method="post">
					<div class="form-group" id="fm1" title="Current Password">
					  <div class="input-group">   
						<input style="font-size:16px; height:45px;" type="password" id="cur_psw" name="cur_psw"  class="form-control" placeholder="Current Password">
						<div class="input-group-append">
						  <span class="input-group-text" style="height:45px;">
							<i class="fa fa-lock text-black"></i>
						  </span>
						</div>
					  </div>
					  <span class="cur_pswMsg"> </span>
					</div> <!-- ./  form-group -->
					<br/>
					
					<div class="form-group" id="fm2" title="New Password">
					  <div class="input-group">
						<input style="font-size:16px; height:45px;" type="password" id="new_psw" name="new_psw"  class="form-control" placeholder="New Password">
						<div class="input-group-append">
						  <span class="input-group-text" style="height:45px;">
							<i class="fa fa-lock text-black"></i>
						  </span>
						</div>
					  </div>
					  <span class="new_pswMsg"> </span>
					</div> <!-- ./  form-group -->
					<br/>
					
					<div class="form-group" id="fm3">
					  <div class="input-group" rel="tooltip" data-toggle="tooltip" title="Confirm Password">
						<input style="font-size:16px; height:45px;" type="password" id="confirm_psw" name="confirm_psw"  class="form-control" placeholder="Confirm Password">
						<div class="input-group-append">
						  <span class="input-group-text" style="height:45px;">
							<i class="fa fa-lock text-black"></i>
						  </span>
						</div>
					  </div>
					  <span class="confirm_pswMsg"> </span>
					</div> <!-- ./  form-group -->
					<br/>
					
					<div class="form-group">
					  <button style="font-size:18px; height:50px;" id="change_psw" name="change_psw" class="btn btn-primary submit-btn btn-block ladda-button" data-style="expand-right"> Change Password &nbsp; <i class="fa fa-refresh text-white"></i></button>
					</div>
					
					</form>
                  </div> <!-- ./ col-md-5 --> 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 --> 
          </div> <!-- ./ row --> 
		 
          
        </div>  <!-- content-wrapper ends -->
       
        <!-- partial:partials/_footer.html -->
         
       <?php require "footer.php"; ?>
	   
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
   <!-- container-scroller -->
  <?php require "admin_js_links.php"; ?>
  
</body>


<script>
			 	 
		 
			
	</script>
	
</html>