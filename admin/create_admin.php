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
			
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body"> 
				   <p class="h4 text-capitalize font-18 bold">
					<i class="fa fa-user  text-primary"></i>  &nbsp;  &nbsp; organizational administrators  </p>					 
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-6 -->  
			
			<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body"> 
				   <p class="h4 text-capitalize font-18 bold">
					<i class="fa fa-user-plus  text-danger"></i>  &nbsp;  &nbsp; create new administrator  </p>	
						<form method="post">
						<?php require "new_admin_form.php";?>
						</form>
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-6 --> 
			
			<div class="col-lg-7 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body"> 
				   <p class="h4 text-capitalize font-18 bold">
					<i class="fa fa-users  text-warning"></i>  &nbsp;  &nbsp; list of administrators </p>	
					<?php require "admin_list.php";?>
					
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  
			
          
          
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