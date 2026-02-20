
	<?php 
	   require "usercheck.php"; 
		if(!isset($_SESSION['stock-tab'])) $_SESSION['stock-tab']='tab1';
		 /***************************/
		 if(isset($_POST['stock_filterate_btn'])){
			 $dbm = new DbTool();
			 $_SESSION['order_by'] = $dbm->clean($_POST['stock_order']); 
			 $_SESSION['limit'] = $dbm->clean($_POST['stock_limit']); 
			 $_SESSION['criteria'] = $dbm->clean($_POST['stock_filterate']);
			 $_SESSION['view_mode'] =  $dbm->clean($_POST['view_mode']);
			 if($_SESSION['criteria']=="") $_SESSION['reqType'] = "default";  else $_SESSION['reqType'] = "search" ;
		 } 
		 ###
		 if(!isset($_SESSION['order_by']))  $_SESSION['order_by'] = "date_purchased|desc"; 
		 if(!isset($_SESSION['limit']))  $_SESSION['limit'] = "50"; 
		 if(!isset($_SESSION['criteria']))  $_SESSION['criteria'] = ""; 
		 if(!isset($_SESSION['view_mode']))  $_SESSION['view_mode'] = "list_view"; 
		 if(!isset($_SESSION['reqType']))  $_SESSION['reqType'] = "default"; 
		 		 
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
	<link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
	 <!-- plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
    <!-- End plugin css for this page -->
	
	<style>
		ul.pl-3 li{ line-height:35px; }
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
				  <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					  <div class="card-body">
						<div class="col-md-12" style="float:left;"> 
							<h3 class="font-20 text-dark bold text-capitalize h3"><?php echo $this_page['title'];?>  &nbsp; &nbsp;  <i class="<?php echo $this_page['icon'];?> "> </i> 
								&nbsp;&nbsp;&nbsp;
								 <!-- new set of brand for accordion -->
								<button onclick="hide_update_buttons()" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#new_brand_product_modal"> <i class="fa fa-briefcase"> </i> &nbsp; New Product Brand </button>
					  
							</h3>
						
						</div>
							<?php # require "sales_filter_form.php"; ?>
					  </div>
					</div>
              </div>
          </div><!-- ./ row -->
		  
		  <div class="row">
				
					<?php require "prod_groups.php"; ?> 
				 
				 
          </div><!-- ./ row -->
		   
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
	<script src="../assets/vendors/zoomsl/assets/zoomsl.js"> </script>
	 <script src="../assets/js/shared/owl-carousel.js"></script>  
    <!-- End custom js for this page-->
	 <script src="../assets/js/shared/iCheck.js"></script>
	 <script src="../assets/js/stock_product_scripts.js"></script>
	 
	<?php require "product_modals.php"; ?>
	 
</body>
<script>
				$(function(){ 
				   load_product_brands($('#item_brand,#item_brand2')); 
				   
					  
			}); 
		 

</script>
</html>