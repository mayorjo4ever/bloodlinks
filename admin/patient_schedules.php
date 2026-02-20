<?php 

	 require "usercheck.php";  

	if(isset($_POST['getrole'])){
				$_SESSION['cur_role'] = $_POST['anyrole']; 							 
		 } 
	
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
        <div class="content-wrapper"> <form method="post">  
         <div class="row"> 
			
			<div class="col-lg-9 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body"> 
				   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-male "></i>  &nbsp;  &nbsp; schedule patients for medical care  </p>
					<?php 
						require "query_form.php"; 
					?>  
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-8 -->  
			
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
					  <div class="card card-statistics">
						<div class="card-body">
						  <div class="clearfix">
							<div class="float-right">
							  <i class="fa fa-group text-info icon-lg"></i>
							</div>
							<div class="float-left">
							  <p class="mb-0 text-right bold text-success text-capitalize"> &nbsp;&nbsp;&nbsp;&nbsp; # patients on queue  </p>
							  <div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0"> 
									<i class="patient_on_queue text-center"> 0  </i> 
								</h3>
							  </div>
							</div>
						  </div>
						  <p class="text-muted mt-3 mb-0 bold font-14 text-center">                   
							<i class="fa fa-calendar mr-1" aria-hidden="true"> </i>
								 &nbsp; <?php echo $func->format_date(date('Y-m-d'));?>
							&nbsp; &nbsp; 
							
						  </p>
						</div>
					  </div> <!-- ./ card -->
					</div> <!-- ./ col-xl-4 col-lg-4  --> 
			
			</div> <!-- ./ row --> 
			
			  <div class="row" id="query_results"> 
			
					<?php ## require "patient_query_result.php"; ?>
					
			</div> <!-- ./ ./ row query_results -->  
       
		</form> 
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
			
			display($('.patient_on_queue'),'count_patient_on_queue'); 
			 
		} 
		
		
		</script> 
	
</body> 

	<?php require "modals.php"; ?>

</html>