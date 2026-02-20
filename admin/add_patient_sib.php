<?php 

	 require "usercheck.php";  	 
		if(!isset($_SESSION['add_sibling'])) header("Location:patients.php");
		require "biodada_capturer.php";  
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
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                   <h4 class="card-title bold text-capitalize font-22"> 
					<i class="fa fa-user  text-success"></i>  &nbsp;  &nbsp; add patient siblings
					&nbsp; &nbsp; &nbsp; 
					 <button type="btn" class="btn btn-info btn-rounded" onclick="display_sibling_types($('#sib_view'))  " data-toggle="modal" data-target="#newSibModal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-plus"></i> &nbsp; <span class=""> Add Sibling Types </span> </button>					
				  </h4> 
				  <span class="text-primary text-capitalize h3" > <span class="text-warning"> host  </span>: <?php echo  $_SESSION['hst_name']; ?> 
						&nbsp; &nbsp; &nbsp;  <span class="text-warning"> hospital no    </span>: <?php echo $_SESSION['ref_id']; ?> 
				  </span> <br/><br/>
				   <?php if ($msg_type!=""){ ?>
					<center> <div class="col-md-10"> <div class="alert <?php echo $msg_type; ?>  bold"> <?php echo $msg; ## echo $_SESSION['pcategory'];   ?> </div> </div> </center>
				  <?php } ?>
                 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  			
          </div> <!-- ./ row --> 
		 
		 <form method="post" enctype="multipart/form-data">
		 
		   <div class="row">
			<div class="col-lg-1 col-lg-offset grid-margin stretch-card"> </div>
			
			<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="height:auto">
                   <h4 class="card-title bold text-capitalize font-16"> 
					<i class="fa fa-user  text-success"></i>   sibling bio-data   </h4> 
				  <?php   require "sibling_bio_form.php"; ?> 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-5 --> 
			
			<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="height:auto">
                   <h4 class="card-title bold text-capitalize font-16"> 
					<i class="fa fa-user  text-success"></i>   other info   </h4> 
				  <?php   require "sibling_bio_form2.php"; ?> 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-5 --> 

		 
          </div> <!-- ./ row --> 
		  
		   <div class="row">
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="margin-top:0.2em; margin-bottom:0.2em; padding-top:0.2em; padding-bottom:0.2em;">
                    <center>
					<div class="col-md-8" style="margin-top:0em; margin-bottom:0em; padding-top:0em; padding-bottom:0em;">
							<?php switch($_SESSION['sib_mode']) { case "new" :{?>	<button id="newSibling" name="newSibling" class="btn btn-success btn-lg btn-block bold ladda-button btn-rounded" data-style="expand-right" mode="new"  rel=""> 
						<span class="btn-name"> Add New Sibling </span> <i class="fa fa-user"> </i>
				</button> <?php } break; case "update": {?> &nbsp;  
					<button id="update_sibling" name="update_sibling" class="btn btn-warning btn-lg btn-block bold ladda-button btn-rounded" data-style="expand-right" for="<?php echo $myhsp; ?>" data-text="<?php echo $mytype; ?>" mode="update"> 
						Update Sibling <i class="fa fa-user"> </i>
					 </button>
				<?php } break; } #end switch  ?>
					
						 
					</div>
					</center>
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  			
          </div> <!-- ./ row --> 
		 </form>
          
        </div>  <!-- content-wrapper ends -->
       
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
				/** populate states  ***/
				
				// load_states($('#mystate'));
				// load_patient_categories($('#pcategory')); 
				// display_patient_categories($('#cat_view'));  
				
				 load_sibling_types($('#sib_type'));
				
				/**** when state changes ***/
				/************* working fine  ******************/
				 $('#mystate').on('change',function(){
					 var state = $('#mystate').val();
					 console.log('state changes to '+state);
					load_lga($('#mylga'),state); 	
					$('#mylga').trigger('change');
				});
				/*******************************************/
				
				$('.datepicker').datepicker({}); 
				
			}); 
		 
			
	</script>
	
</html>