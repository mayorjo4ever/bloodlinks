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
				 <div class="col-md-5" style="float:left;">				   
				 <span class="h3 text-capitalize">print form for patients </span> <br/><br/>
					 <a class="btn btn-primary btn-sm" href="reg_slip.php" target="_blank" title="Print Registration Slip"> Reg. Slip &nbsp; <span class="fa fa-vcard-o "></span> </a> &nbsp; 
					 <a class="btn btn-success btn-sm" href="treatment_slip.php" target="_blank" title="Print Treatment Slip"> Tmt. Slip &nbsp; <span class="fa fa-stethoscope"></span>  </a>
				</div> <!-- ./ col-md-6 div -->
				
				<div class="col-md-7" style="float:left;">
				 <form method=""> 
					<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  
					  <label class="text-primary"> search  for a specific patient </label>
					  <div class="input-group border-1" title="Search Patient Informations by Name, or Hospital Number. ">
						<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="patient_info" name="patient_info"  class="form-control" placeholder="Search With Patient's Name or Hospital Number">
						<div class="input-group-append">
						  <button style="font-size:16px; height:45px;" class="btn btn-icons btn-primary search_patient_forms"  id="search_patient_forms" name="search_patient_forms"> <i class="fa fa-search text-white"></i></button>
						</div>
					  </div>
					  
					</div> <!-- ./  form-group --> 
			 
					</form> 
				</div> <!-- ./ col-md-6 div -->
					  								
					      
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div> <!-- ./ col-lg-12 -->  
			</div> <!-- ./ row --> 
			
			<div class="row">
				<div class="col-md-12"> 
					<div class="card">
						<div class="card-body">
						<div id="query_results"> <center> <span class="fa fa-search fa-2x fa-spin"> </span> </center> </div>
						</div>
					</div>
				</div> <!--  ./ col-md-10 query_results -->   
			</div> <!-- ./ row-->
			
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

<?php require "modals.php"; ?>

	<script>
		$(function(){
			
	 	});
		
		
	
	
	</script>
</html>