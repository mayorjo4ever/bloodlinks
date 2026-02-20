<?php 

	 require "usercheck.php";  	 
	
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
</head>

<body>
  <div class="container-scroller">
    
	<?php require "head_nav.php"; ?>
	
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
                  <h4 class="card-title bold text-capitalize text-success font-18"> <span class=" bold <?php echo $page_info['icon']; ?>"> </span> &nbsp; &nbsp;  <?php  echo $this_page['title']; ?>  
					 &nbsp; &nbsp;  &nbsp; &nbsp;  <small class="text-primary bold"> attend to your patients awaiting on the queue..   </small>
				  </h4> 				 
                </div>
              </div>
            </div>
          </div> <!-- ./ row --> 
		 
          <div class="row" id="all_awaiting_patients">
           <?php #  require "stats_summary_2.php"; ?>			
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
  
  <script>
	$(function(){
			manageEvents(); 
			window.setInterval(manageEvents,3000);
			 
		});
		
		function manageEvents(){
			
			display($('#all_awaiting_patients'),'doc_awaiting_patient'); 
			 
		} 
		
  
  </script>
  
</body>

</html>