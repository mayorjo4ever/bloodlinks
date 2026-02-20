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
    
	<?php require "head_nav2.php"; ?>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row" id="">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-8">
				 <span class="h3 text-capitalize"><span class=" bold fa fa-stethoscope text-info"> </span> patients medical report system </span> 
				 <form method=""> 
					<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  
					  <br/>  
					  <div class="input-group border-1" title="Search Patient Informations by Name, or Hospital Number. ">
						<input style="font-size:16px; height:38px;" autocomplete="false" type="text" id="patient_info" name="patient_info"  class="form-control" placeholder="search patients with host name or their hospital number">
						<div class="input-group-append">
						  <button style="height:44px;" class="btn btn-icons btn-primary search_patient_reports"  id="search_patient_reports" name="search_patient_reports"> <i class="fa fa-search text-white"></i></button>
						</div>
					  </div> 
					</div> <!-- ./  form-group --> 
			 
					</form> 					 
				  </div> <!-- ./ col-md-8 div -->
					 
					 <div class="col-md-12" id="query_results"> 
													
					</div> <!--  ./ col-md-10 query_results -->         
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
		   
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
			window.setInterval(manageEvents,10000);
			 
		});
		
		function manageEvents(){
			
		//	display($('#all_awaiting_task'),'spec_scheduled_task'); 
			 
		} 
		
  
  </script>
  
</body>

</html>