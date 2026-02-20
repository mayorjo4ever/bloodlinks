<?php 

	 require "usercheck.php";  	 
	 require "biodada_capturer.php";  	 
	if(!isset($_SESSION)) session_start(); 
	 unset($_SESSION['start']);
	
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
         <div class="row"> 
			 <div class="col-md-12" style="min-height:auto;">
				 <div class="card">               
                <div class="card-body"> 
					<div class="col-md-6" style="float:left;"> 
						<span class="h2 text-capitalize"><span class=" bold fa fa-male text-success"> </span> &nbsp;   all registered patients &nbsp;  <span class=" bold fa fa-female text-success"> </span> &nbsp; </span>   
						<br/> <span class="small bold text-capitalize text-black"> total records :  </span> <span class="small bold found count text-black"> 0  </span> 
					</div> <!-- ./  col-md-6 -->
					
					<form method="post" id="fetch_patients"> 
					<div class="col-md-6" style="float:left;"> 
						<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  					    
					  <div class="input-group border-1" title="Search Patient Informations by Name, or Hospital Number. ">
						<input type="hidden" name="reqType" id="reqType" value="default" />
						<input style="font-size:16px; height:38px;" autocomplete="false" type="text" id="patient_filterate" name="patient_filterate"  class="form-control" placeholder="filter your patients with host name or their hospital number">
						<div class="input-group-append">
						  <button style="height:44px;" class="btn btn-icons btn-primary patient_filterate_btn"  id="patient_filterate_btn" name="patient_filterate_btn"> <i class="fa fa-search text-white"></i></button>
						</div>
					  </div> 
					</div> <!-- ./  form-group -->
					</div> <!-- ./  col-md-6 -->  
			 
					</form> 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
					
			 </div> <!-- ./ col-md-6 -->   
          </div> <!-- ./ row --> 
		  
		 
				<!-- display your patients here:  --> 
				<div class="patientResult">  	</div>
		  
          
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
		   <!-- Custom js for this page--> 
    <!-- End custom js for this page-->
		</body>

		<?php require "modals.php"; ?>
		
		<script>
			 
			 $(window).scroll(function () {
			   var reqType = $('#reqType').val();
			   var criteria = $('#patient_filterate').val();
			//	 console.log(' document height:'+$(document).height()+' window height: '+$(window).height()+' scrollTop: '+$(window).scrollTop());
                if ($(window).scrollTop() == ($(document).height() - $(window).height())) 
					getPatient(criteria,reqType); 
				 	 
            });

			
			$(function(){ 
				 
				load_sibling_types($('#sib_type')); 
				display_sibling_types($('#sib_view'));  
				
				/*******************************************/ 	
				var reqType = $('#reqType').val();
				var criteria = $('#patient_filterate').val();
				
				 getPatient(criteria,reqType); 
				
			}); 
		 
		

			
	</script>
	 

		</html>
		