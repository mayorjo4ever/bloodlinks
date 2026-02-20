<?php 

	 require "usercheck.php";  	 
	
	?> 

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require "admin_style_link.php";?>
	<link rel="stylesheet" href="../assets/css/calendar_widget.css" >
	 
 
    <!-- <link rel="shortcut icon" href="../assets/images/favicon.png" />  -->
	
	</head>

	<body  class="sidebar-fixed">
    <div class="container-scroller">
      
	<?php require "head_nav2.php"; ?>
	
	  
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
	
		<!-- partial:partials/_settings-panel.html - for html themes / style -->
		<?php ##### before -  require "_settings-panel.php"; ?>
		
		
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
			 <?php ##### before -  require "html_sidebar.php"; ?>
			 <?php  require "sidebar_nav.php"; ?>
			  
		
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
				<?php 
					### before  require "html_main_body.php"; 
					### now -- called by row tags
					require "welcome_msg.php"; 
				?>
				
				<div class="row">
				   <?php  require "calendar_widget.php"; ?>			
				   <?php  require "chart_widget.php"; ?>			
				   <?php  require "line_chart_widget.php"; ?>			
				  </div> <!-- ./ row --> 
				
				
          </div>
          <!-- content-wrapper ends -->
		  
          <!-- partial:partials/_footer.html -->
          
		  <?php require "footer.php"; ?>
		   
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
		
	<?php require "admin_js_links.php"; ?>
	 
	
  </body>
  
  
	 <script>
		$(function(){
			manageEvents(); 
			window.setInterval(manageEvents,1000);
			
		});
		
		function manageEvents(){
			
			display($('.cur_time'),'gettime');
			// display($('.tot_cert'),'get_tot_cert');
			// display($('.comp_cert'),'get_comp_cert');
			//display($('.uncomp_cert'),'get_uncomp_cert');
			//display($('.relogcount'),'relogcount'); 
		 
		} 
	 </script>
	 

	<script src="../assets/js/calendar_widget.js"> 	</script>
	<script src="../assets/js/chart.js"> 	</script>

  
  
</html>