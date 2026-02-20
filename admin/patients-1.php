<?php 

	 require "usercheck.php";  	 
	 require "biodada_capturer.php";  	 
	if(!isset($_SESSION)) session_start(); 
	//if(isset($_POST['p_update'])){
		 $_SESSION['upd_sn'] = $_POST['p_update'];
		 //  echo "<script> alert(".$_SESSION['upd_sn'].")</script>";
		 //  header("Location:newpatient.php"); 
	// }
	
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
			
			<div class="col-md-10" style="min-height:200px;">
				 <div class="card">               
                <div class="card-body">
					<div class="col-md-6"> 
						 <h4 class="card-title bold text-capitalize font-18"> 
							 <span class=""> All registered patients  </span> &nbsp; &nbsp; &nbsp; 
							<span class="text-warning bold text-capitalize"> </span>
							<a href="newpatient.php" class="btn btn-danger btn-rounded text-white text-capitalize"> <i class="fa fa-user-plus"></i> &nbsp; <span class=""> add new patient </span> </a>
					 
						</h4> 
					</div> 
					
					<div class="col-md-6">
						<div class="form-group">
							<input type="" name="" id=""  class="form-control" /> 
						</div>
					</div> 
					
                 	
				
				<?php require "patient_list.php";?>
				 
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
		   <!-- Custom js for this page-->
			<script src="../assets/js/shared/hoverable-collapse.js"></script>
			 <!-- <script src="../assets/js/shared/data-table.js"></script>--->
			<script src="../assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
		</body>

		<?php require "modals.php"; ?>
		
		<script>
			$(function(){
				 
				/****
				$('#patient_table').DataTable({
					//  "scrollY": 200,
					"scrollX": true
				}); 
				
				 $('#patient_table tbody').on('click', 'tr', function () {
					var data = table.row( this ).data();
					alert( 'You clicked on '+data[0]+'\'s row' );
				} );
				
				****/
				load_sibling_types($('#sib_type')); 
				display_sibling_types($('#sib_view'));  
				/*******************************************/ 
				/**
					$('.datepicker').datepicker({
					 weekStart:1,
					 color: 'red'
				 });
				
				$("body").delegate(".datepicker", "focusin", function(){
					$(this).datepicker();
				}); **/
				
			}); 
		 
			
	</script>
	 

		</html>
		