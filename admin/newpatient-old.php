<?php 

	 require "usercheck.php";  	 
	 require "biodada_capturer.php";  	 
	 if(!isset($_SESSION)) session_start();  
	?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
	  <script src="../assets/vendors/jhuckaby-webcamjs/webcam.js"></script>  
</head>

 <body class="sidebar-fixed">
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
                <div class="card-body bg-info" > <!-- style="background:url('../assets/images/dashboard/bg2.png') ;" -->
					<div class="col-md-6 h3 text-capitalize  text-white bold" style="float:left;">
						 <br/>	 
								<i class="fa fa-user "></i>  &nbsp;  &nbsp; create / edit patient profile <?php echo  $_SESSION['upd_sn']; ?>
						  
					</div> 
					
					
					<div class="col-md-2 " style="float:left;"> 
						 <div class="profile-header text-black" > 
							 
							  <div class="d-flex justify-content-around"  id="pic_result" style="">
								<div class="profile-info d-flex align-items-center" >
									<div id="image_preview"> 
										<a href="#" class="alt_itemImage"> 
											<img id="previewing" src="<?php echo "images/users/".$_SESSION['temp_img']; ?>"  alt="profile image" class="alt_itemImage rounded-circle" style="height:auto; width:120px; max-height:120px;" /> 
										</a>
									</div> 
									<input name="itemImage" id="itemImage" type="file" accept="image/*" class="form-control itemImage" /> 		    
								</div>   <!-- ./ profile-info -->  
							  </div> 
							  
							  <input type="hidden" name="temp_img_dir" id="temp_img_dir" value="<?php echo $_SESSION['temp_img']; ?>" />
							 
					 
						</div> <!-- ./ card --> 
						
					</div> 	<!-- ./ col-lg-3 -->
					
					 
					<div class="col-md-3 h4 "  style="float:left;"> 
					  <div class="details text-capitalize text-white">
							  <div class="detail-col"> <p> &nbsp;  </p> 
							  </div> 
							  <div class="detail-col text-capitalize text-white"> <p> </p>
								<p> <a href="#" class="alt_itemImage text-capitalize text-white bold"> browse passport  </a> </p> 
							  </div>
							  <div class="detail-col text-capitalize text-white">
								<p> <a href="#" class="text-capitalize text-white bold" onclick="$('#pic_result').show(), $('#pic_scan').hide(),initCam()" data-toggle="modal" data-target="#snapshotForm" data-backdrop="static" data-keyboard="false"> use webcam  </a> </p>
							  </div>
						</div> 
					</div> 
					<!--
				
                   <h4 class="card-title bold text-capitalize font-22"> 
					<i class="fa fa-user  text-success"></i>  &nbsp;  &nbsp; create / edit patient profile <?php # echo  $_SESSION['upd_sn']; ?>
				  </h4> 
				  <?php if ($msg_type!=""){ ?>
					<div class="col-md-10"> <div class="alert <?php echo $msg_type; ?>  bold"> <?php echo $msg; ## echo $_SESSION['pcategory'];   ?> </div> </div>
				  <?php } ?>
				  -->
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  			
          </div> <!-- ./ row --> 
			
		  <form method="post" id="newpatient" enctype="multipart/form-data">
			<div class="row">
			<?php if ($msg_type!=""){ ?>
					<div class="col-md-12"> <div class="alert <?php echo $msg_type; ?>  bold"> <?php echo $msg; ## echo $_SESSION['pcategory'];   ?> </div> </div>
				  <?php } ?>
			
			<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="height:auto">
                   <h4 class="card-title bold text-capitalize font-16"> 
					<i class="fa fa-user  text-success"></i>  &nbsp;  &nbsp; Patient information  </h4> 
				  <?php   require "patient_bio_form.php"; ?> 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-4 --> 
			
			<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="height:auto">
                   <h4 class="card-title bold text-capitalize font-16"> 
					<i class="fa fa-user  text-success"></i>   Patient information </h4> 
				  <?php   require "patient_bio_form2.php"; ?> 
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-4 --> 

			<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                   <h5 class="card-title bold text-capitalize font-16"> 
					<i class="fa fa-medkit text-success"></i>  &nbsp;  &nbsp; Patient information
				  </h5> 
				   <?php   require "patient_hsp_form.php"; ?>
				  
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-6 -->
          </div> <!-- ./ row --> 
		 		 		 
		   <div class="row">
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                    <center>
					<div class="col-md-6" >
						<div class="form-group">
						  <input type="hidden" name="upd_sn" id="upd_sn" value="<?php echo  $_SESSION['upd_sn']; ?>" />						  
						  <button style="display:none" id="save_data" name="save_data" class="btn btn-primary btn-rounded submit-btn btn-  ladda-button" data-style="expand-right"> Create New Patient Bio-Data &nbsp; <i class="fa fa-user text-white"></i></button>
						  <button style="font-size:18px; height:40px;" id="create_patient" name="create_patient" class="creators btn btn-primary btn-rounded submit-btn btn-  ladda-button" data-style="expand-right"> Create New Patient Bio-Data &nbsp; <i class="fa fa-user text-white"></i></button>
						  <button style="font-size:18px; height:40px;" id="update_patient" name="update_patient" class="updators btn btn-warning btn-rounded submit-btn btn-  ladda-button" data-style="expand-right"> Update Patient Bio-Data &nbsp; <i class="fa fa-user text-white"></i></button>
						  <button onclick="return confirm('Are you sure you want to Clear all your inputs, it cannot be recovered again!')" style="font-size:18px; height:40px;" id="reset_data" name="reset_data" class="  btn btn-danger btn-rounded submit-btn ladda-button" data-style="expand-right"> Reset &nbsp; <i class="fa fa-close text-white"></i></button>
						</div>
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

		<!-- Custom js for this page  
     <script src="../assets/js/shared/formpickers.js"></script>
  <!--  <script src="../assets/js/shared/wizard2.js"></script>
    <!-- End custom js for this page-->

	<script>
			$(function(){
					 
				/** check for update conditions  **/
				upd_sn = $('input:hidden#upd_sn').val(); 
				if(upd_sn!="") show_update_buttons() ; 
				else hide_update_buttons(); 
				
				
				/** populate states  ***/				
				load_states($('#mystate'));
				var state = $('#mystate').val();
					 
				load_lga($('#mylga'),state); 	
					 
				 $('#mylga').trigger('change');
					
				load_patient_categories($('#pcategory')); 
				display_patient_categories($('#cat_view'));  
				
				/**** when state changes ***/
				/************* working fine  ******************/
				 $('#mystate').on('change',function(){
					 var state = $('#mystate').val();
					 console.log('state changes to '+state);
					window.setTimeout(function(){
						load_lga($('#mylga'),state); 	
					},1000);
					$('#mylga').trigger('change');
				});
				/*******************************************/
				
				setTimeout(function(){
					var state = $('#mystate').val();
					 console.log('state changes to '+state);					 
						load_lga($('#mylga'),state); 						 
						$('#mylga').trigger('change');					
				},2000); 
				
				$('#dob').datepicker({
				  enableOnReadonly: true,
				  todayHighlight: true,
				});
				
				// set how to display military no. #
				window.setTimeout(function(){
					ptype = $('#pcategory').val();
					if(ptype=="" || ptype=="Civilian") $('div#mil_tag').hide('fast');
					else  $('div#mil_tag').show('fast');
					 
					},1000);
				
			}); 
		 
			
	</script>
	<script src="../assets/js/img_upload.js"></script>
	
	<!-- -->
	<script src="../assets/js/webcam-script.js"></script>
	<script src="../assets/js/shared/form-addons.js"></script> 
	
	
	
</html>