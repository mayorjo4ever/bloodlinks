<?php   require "usercheck.php";
 	$_SESSION['view_mode'] = $_SESSION['view_mode'] ?? 'daily';
  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- -->

</head>
<!-- <body class="sidebar-fixed"> -->
<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php // require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel container">
        <div class="content-wrapper">  
		 
        	<form method="post"> 
		 <div class="row"> 
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card"> 
				
                <div class="card-header" style="padding-bottom:5px;">  
						<div class="col-md-3 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo $this_page['title']; ?>  </span> &nbsp;  </div>
						<ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold pull-right" role="tablist"> 
						View Analysis By : &nbsp;&nbsp;<li class="nav-item " >
							<a  class="nav-link active" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> All Carried Out Test (Specimen) </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item disabled"> <!--  -->
							<a class="nav-link " id="tab2" onclick="display_my_specimen($('.specimen_added'))" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Specific Test (Specimen) </a>
						  </li> 
						  
						  <li class="nav-item disabled"> <!--  -->
							<a class="nav-link " id="tab3" onclick="display_my_final_specimen($('.final_specimen_form'))" data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> Individual Customer </a>
						  </li>  
					  </ul> 
					</div>  <!--  ./ card-header -->  
				
				<div class="card-body">                    
				  <div class="row">
					<div class="col-md-12"> 
					
						
					 <div class="tab-content tab-content-solid ">
                      <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                         	<?php require "all_specimen_test_report_form.php"; ?> 
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
							<?php require "specific_test_report_form.php"; ?> 
					  </div> 
					   
                      <div class="tab-pane fade" id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3"> 								
							<?php require "individual_test_report_form.php"; ?> 
					  </div>  
					  
                    </div> <!-- ./ tab-content -->
					
					</div>
				  </div>
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			  
          </div> <!-- ./ row --> 
		 </form>
            
		   
		   
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
	
  </script>
  <script src="../assets/js/lab_rep_script.js"></script>
  
</body>

</html>