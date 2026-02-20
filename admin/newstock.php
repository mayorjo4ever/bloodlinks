
	<?php 
	   require "usercheck.php"; 
	   include_once "newstock_reminder.php"; 
		 
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- 
	<link rel="stylesheet" href="../assets/vendors/dropzone/dropzone.css">   -->
	<link rel="stylesheet" href="../assets/vendors/dropzone/basic.css"> 
	<!-- <link href="../assets/vendors/zoom-magnify/dist/css/magnify.css" rel="stylesheet" type="text/css"> -->
	<link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
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
                    <h4 class="card-title bold"> <?php echo $this_page['title'];?>  </h4>
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
					
					
					<ul class="nav nav-tabs tab-solid tab-solid-info" role="tablist">
						  <li class="nav-item">
							<a  class="nav-link active" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> 1 - Basic Information </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item">
							<a class="nav-link " id="tab3" data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false">2 -  Price Details  </a>
						  </li>
						  
						  <li class="nav-item">
							<a class="nav-link " id="tab2" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> 3 -  Attach Images</a>
						  </li>
						
						 <li class="nav-item">
							<a onclick="" class="nav-link " id="tab4" data-toggle="tab" href="#stock-tab4" role="tab" aria-controls="stock-tab4" aria-selected="false"> 4 -  Summary [Finalize] </a>
						  </li>
						  </ul>
					 
					 
                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                        <div class="row">					
							<?php  require "newstock_tab1_form.php"; ?>
                          </div> <!-- ./ row -->
                        
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 
						 <div class="row">					
							<?php  require "newstock_tab2_form.php"; ?>
                          </div> <!-- ./ row -->
					 </div>
                    
					<div class="tab-pane fade" id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3">
						 <div class="row">
							<?php  require "newstock_tab3_form.php"; ?>
						 </div>
                    </div> <!-- ./ tab-pane -->
					
					<div class="tab-pane fade" id="stock-tab4" role="tabpanel" aria-labelledby="stock-tab4">
						 <div class="row">
							<?php require "newstock_summary_form.php"; ?>							 
						 </div>
                    </div> <!-- ./ tab-pane -->
					
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
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
	<?php require "admin_js_links.php"; ?>
	 
	<!-- <script src="../assets/vendors/zoom-magnify/dist/js/jquery.magnify.js"> </script> -->
	<script src="../assets/vendors/zoomsl/assets/zoomsl.js"> </script>
	<script src="../assets/js/stock_form_script.js"></script>
	<script src="../assets/js/stock_product_scripts.js"></script>
	<script src="../assets/js/shared/popover.js"></script>
	
	
</body> <!---->
<script>

 $(function(){
	  load_product_brands($('#item_brand3'));
	
		$('#item_brand3').on('change',function(){
			brand_id = $(this).val(); 
			load_product_brands_categ_subs($('#prod_type'),brand_id);
		});
		/*******************/
	  $('#prod_type').on('change',function(){
			prod_info = $(this).val(); 
			console.log(prod_info);
		});
	  
				   
});
</script> 


</html>