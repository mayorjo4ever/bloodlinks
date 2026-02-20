<?php 

	 require "usercheck.php";  	 
		/// patient_name_search 
		// 	$mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$id),array('time_c'),'and','desc'),array('fullname','surname','firstname','sn','ref_no','othername','dob','type','date_c'));
		
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
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                   <h4 class="card-title bold text-capitalize font-22"> 
					<i class="fa fa-money  text-primary"></i>  &nbsp; <?php  echo $this_page['title']; ?>	
				 </h4>    
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  
          </div> <!-- ./ row --> 
		          		
          <div class="row">
			<div class="col-md-6" style="min-height:200px; margin-bottom:10px; padding-bottom:10px; ">
			 <div class="card">               
				<div class="card-header bold text-capitalize" style="margin:10px; padding:10px "> 
					select type of test carried out 
				</div>
				
				<div class="card-body"> 
					<?php require "lab_test_form.php"; ?>						 
				</div> <!-- ./ card-body -->
				
				<div class="card-footer">
					<div class="form-group" id="fm20" style="border:5px thin #000;">
						 <button class="btn btn-info btn-block btn-rounded btn-lg" onclick="save_labtest_result()" name="save_labtest_result" id="save_labtest_result">  Save Result &nbsp; <i class="fa fa-save"> </i> </button> 
						</div> <!-- ./  form-group -->
						
				</div>
			</div> <!-- ./ card -->
			 </div> <!-- ./ col-md-6 -->
			
			<div class="col-md-6" style="min-height:200px; margin-bottom:10px; padding-bottom:10px; ">
			 <div class="card">               
				<div class="card-header bold text-capitalize" style="margin:10px; padding:10px "> 
					list of test carried out 
				</div>
				
				<div class="card-body"> 
					<div class="all_lab_result"> 	</div>				 
				</div> <!-- ./ card-body -->
				
				 
			</div> <!-- ./ card -->
			 </div> <!-- ./ col-md-6 -->
			
			</div> <!-- ./ row  -->
			 
			 
          
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
				 
				  display_lab_test_results($('.all_lab_result')); 
				// $('.datepicker').datepicker({});
				
				load_bill_departments($('#bill_dept_id2'))
				setTimeout(function(){
					load_bill_category($('#bill_dept_id2').val(),$('#billCateg2')) ;
				 },1000);
				 /*****/
				 $('#billCateg2').on('change',function(){
					 load_bill_type($('#bill_dept_id2').val(), $(this).val(),$('#billType2'));
				 }); 
				 /*****/
				 setTimeout(function(){
					load_bill_type($('#bill_dept_id2').val(), $('#billCateg2').val(),$('#billType2'));
				 },2000);
				 
				 
			}); 
		 
			
	</script>
	
</html>