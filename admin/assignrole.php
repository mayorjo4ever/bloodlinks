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
                  <?php require "assignrole_form.php"; ?>
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 --> 
			
			 
          
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
  
  
		<script>
	
		$(function(){
			
			 // $("#hide").hide('fast');
			 $("#anyuser").on('change',function(){					
					var user =  $(this).val();					
					display_my_roles($(".myroles"),user); 
				 });	
		});
	
	</script>
	
</body> 

</html>