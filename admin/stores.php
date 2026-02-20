<?php    require "usercheck.php";  ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- -->

</head>

<!-- <body class="sidebar-fixed"> -->
<body>  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php // require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel container">
        <div class="content-wrapper">  
		 
		 <form method="post" enctype="multipart/form-data">
		 
		   <div class="row">
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="height:auto"> 
					 <h4 class="card-title bold text-capitalize font-22"> 
						<i class="fa fa-medkit  text-success"></i>  &nbsp;  &nbsp;  <?php echo $this_page['title'];?>
						&nbsp; &nbsp; &nbsp; 
						<!--  <button type="btn" class="btn btn-primary btn-rounded" onclick="display_sibling_types($('#sib_view'))  " data-toggle="modal" data-target="#newProdutType" data-backdrop="static" data-keyboard="false"> <i class="fa fa-plus"></i> &nbsp; <span class=""> Add Product Types </span> </button> -->
						  &nbsp; &nbsp; 
							<button type="button" class="btn btn-dark bold btn-rounded" onclick="hide_update_buttons()" data-toggle="modal" data-target="#productManager" data-backdrop="static" data-keyboard="false"> <i class="fa fa-plus-circle"></i> &nbsp; <span class=""> Add New Product </span> </button>					
							&nbsp; &nbsp; 
						<!--  <button type="btn" class="btn btn-secondary btn-rounded" onclick="display_sibling_types($('#sib_view'))  " data-toggle="modal" data-target="#newVendor" data-backdrop="static" data-keyboard="false"> <i class="fa fa-ambulance"></i> &nbsp; <span class=""> Add Vendors </span> </button>	 -->				
				  </h4> 
					
								
				  <?php   require "stock_items_new.php"; ?> 
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
	
	<script src="../assets/js/stock_product_scripts_2.js"></script>
  
	
	<!-- Custom js for this page-->
    <script src="../assets/js/shared/progress-bar.js"></script>
	<script src="../assets/js/shared/widgets.js"></script>
    <script src="../assets/js/shared/todo.js"></script>
    <!-- End custom js for this page-->
     <script src="../assets/js/shared/iCheck.js"></script>
    
</body>

<?php require "modals.php"; ?>

	<script>
			$(function(){
				
				/** populate states  ***/
				
			   $('input:radio.has-expiry').on('change',check_expiry); 
						
				// $('.datepicker,.').datepicker({}); 
				 
			$('.newdatepicker').bootstrapMaterialDatePicker
					({
						time: false,
						clearButton: true
					});
			
			$('.datetimepicker').bootstrapMaterialDatePicker
					({
						time: true,
						format: 'YYYY-MM-DD H:m:s',
						clearButton: true
					});
				
		 /*************************************/
		 
				
				// $('.dataTable').dataTables({}); 
				
			}); 
			
			// 
			function check_expiry(){
				/************* working fine  ******************/
				 var has_expiry = $('input:radio.has-expiry:checked').val(); 
					 // alert(has_expiry);
					 if(has_expiry=="yes") $('div.has-expiry').show();
					  else $('div.has-expiry').hide(); 
				/*******************************************/ 
			}
		 
		 
			
	</script>
	
</html>