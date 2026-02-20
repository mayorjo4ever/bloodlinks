<?php 

	 require "usercheck.php";  
	 # require "../assets/php/timecoder.php"; 
	
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
					 &nbsp; <button type="btn" class="btn btn-info  btn-rounded" data-toggle="modal" data-target="#billDepartment" data-backdrop="static" data-keyboard="false"> <i class="fa fa-building-o"></i>  <span class=""> Create Department </span> </button>
						 &nbsp; &nbsp; <button type="btn" class="btn btn-inverse-dark btn-rounded"  onclick="load_bill_departments($('#bill_dept_id')),hide_update_buttons()" data-toggle="modal" data-target="#billCategForm" data-backdrop="static" data-keyboard="false"> <i class="fa fa-money"></i>  <span class=""> Create Bill Category </span> </button>
						&nbsp; <button type="btn" class="btn btn-inverse-info  btn-rounded" onclick="load_bill_departments($('#bill_dept_id2')),load_bill_category($('#bill_dept_id2').val(),$('#billCateg2')),hide_update_buttons()" data-toggle="modal" data-target="#billTypeForm" data-backdrop="static" data-keyboard="false"> <i class="fa fa-money"></i>  <span class=""> Create Bill Type </span> </button>
				 </h4>    
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  
          </div> <!-- ./ row --> 
		         
				  <?php require "acct_setup_form.php"; ?>
				 
			
         
          
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

<?php require "bill_modal.php"; ?>

	<script>
			$(function(){
				 
				 
				$('.datepicker').datepicker({});
				
				
			}); 
		 
			
	</script>
	
</html>