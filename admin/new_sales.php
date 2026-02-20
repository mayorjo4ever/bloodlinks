
	<?php 
	   require "usercheck.php"; 
		if(!isset($_SESSION['stock-tab'])) $_SESSION['stock-tab']='tab1';
		 /***************************/
		 if(isset($_POST['sales_filterate_btn'])){
			 $dbm = new DbTool();
			 $_SESSION['order_by'] = $dbm->clean($_POST['stock_order']); 
			 $_SESSION['limit'] = $dbm->clean($_POST['stock_limit']); 
			 $_SESSION['criteria'] = $dbm->clean($_POST['stock_filterate']);
			 $_SESSION['sale_search_mode'] =  $dbm->clean($_POST['sale_search_mode']);
			 if($_SESSION['criteria']=="") $_SESSION['reqType'] = "default";  else $_SESSION['reqType'] = "search" ;
		 } 
		 ###
		 if(!isset($_SESSION['order_by']))  $_SESSION['order_by'] = "date_purchased|desc"; 
		 if(!isset($_SESSION['limit']))  $_SESSION['limit'] = "50"; 
		 if(!isset($_SESSION['criteria']))  $_SESSION['criteria'] = ""; 
		# if(!isset($_SESSION['sale_search_mode']))  $_SESSION['sale_search_mode'] = "words"; 
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
						<div class="col-md-3" style="float:left;"> <h3 class="font-20 text-dark bold text-capitalize h3"> stock sales </h3>
						( <span class="small bold text-capitalize text-black"> checkout :  </span> &nbsp; <i class="fa fa-shopping-cart red"></i> <span class="small bold found count text-black"> <?php echo $founds; ?>  </span>  )
						</div>
							<?php  require "sales_filter_form.php"; ?>
					  </div>
					</div>
              </div>
          </div><!-- ./ row -->
		  
		  <div class="row">
				  <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					  <div class="card-body">
						<div class="accordion basic-accordion" id="accordion" role="tablist">
                      <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <i class="card-icon fa fa-search"></i> Search Results </a>
                          </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            <div class="row">                              
                              <div class="col-md-12">
                              <div class="search_result_2">  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  
					     <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="card-icon fa fa-shopping-cart text-danger"></i> Items on cart </a>
                          </h6>
                        </div>
                        <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body">
                            <div class="row">                              
                              <div class="col-md-12">
                              <div class="search_result_3">  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div> <!--- ./ accordion -->
						  
					  </div> <!-- ./ card-body -->
					</div> <!-- ./ card -->
              </div> <!-- ./ col-md-12 -->
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
</body>
<?php require "sales_modal.php"; ?>

<script>
				$(function(){ 
				  /*******************************************/ 	
					 var rec_count = $('input.rec_count').val();
					 $('.count').html(rec_count);
					 /*****************************/
					 display_temp_carts($('.search_result_3'));
					 
			}); 
		 

</script>

</html>