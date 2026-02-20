
	<?php 
	   require "usercheck.php"; 
	     // include_once  "newuser_reminder.php"; 
		 
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
	<link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	<style>
		.admin-editor{			
			opacity:0;
		}
		 .d-flex:hover .admin-editor{			
			opacity:1;
		}
	</style>
	
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel container">
        <div class="content-wrapper">
          <div class="row">
				  <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="height:auto">
                    <p class="card-title bold h4">   <?php  echo $this_page['title']; ?> &nbsp; &nbsp; &nbsp; &nbsp;
						<!-- <button data-toggle="modal" data-target="#new_admin_form" class="btn btn-danger btn-icons btn-rounded">  <span class="mdi mdi-account-plus mdi-lg "> </span> </button> -->  </p>
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
					<ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist">
						
						<li class="nav-item" >
							<a  class="nav-link active " id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Administrators </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item " disabled>
							<a class="nav-link " disabled id="tab2" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false">  List of Roles </a>
						  </li>  
					  </ul>
					  
                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade show active " id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                         <?php require "admin_list.php"; ?>  
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 
				 <?php require "display_roles.php"; ?>
			 </div> 
					  
					 
                    </div> <!-- ./ tab-content -->
                  </div>
                </div>
              </div>
          </div>
		  
		  <div class="row">
			<?php # require "workflow_stats.php"?>
		  </div> <!-- row ends -->
		    
        </div>
        <!-- content-wrapper ends -->
          
		  <?php require "footer.php"; ?>
		   
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
	<?php require "admin_js_links.php"; ?>
  
	  <script src="../assets/js/newuser_scripts.js"> </script>
	
	 <script src="../assets/js/shared/iCheck.js"></script>
	 
	 <?php require "administration_modal.php"; ?>
	 
</body> <!---->
		<script> 
				$(function(){
				 hide_update_buttons(); 
					// load_page_groups($('#pggroup'));
				});

		</script> 


</html>