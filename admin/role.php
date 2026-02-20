<?php 

	 require "usercheck.php";  	 
	
	?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
</head>

<body class="sidebar-fixed">
    
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
			<div class="col-lg-5 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                  <h4 class="card-title bold text-capitalize font-18"> 
					<i class="fa fa-gavel text-success"></i> &nbsp;  manage organization roles  
				  </h4> 
				  <span class="text-primary"> Use this role to classify all your organizational staff and their play/service to the system</span>
                  <p>&nbsp; </p>
				  <div class="col-md-12" style="min-height:200px;">
					<?php require "role_form.php";?>
                  </div> <!-- ./ col-md-12 --> 
				  
				  
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-5 --> 
			
			<div class="col-md-7" style="min-height:200px;">
				 <div class="card">               
                <div class="card-body">
                  <h4 class="card-title bold text-capitalize font-18"> 
					<span class=""> List of available roles </span>
				  </h4> 	
				
				<?php require "display_roles.php";?>
				 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
					
					
			 </div> <!-- ./ col-md-7 --> 
          </div> <!-- ./ row --> 
		 
          
          
        </div>
        <!-- content-wrapper ends -->
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

</html>