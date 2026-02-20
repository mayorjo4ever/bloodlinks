
	<?php 
	   require "usercheck.php"; 
	   include_once "invoice_script.php";  
	    
		
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- 
	<link rel="stylesheet" href="../assets/vendors/dropzone/dropzone.css">   -->
	<link rel="stylesheet" href="../assets/vendors/dropzone/basic.css"> 
	<!-- <link href="../assets/vendors/zoom-magnify/dist/css/magnify.css" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">
	<link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	
	 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel container">
        <div class="content-wrapper">
          <div class="row ">
				  <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card ">
                <div class="card ">
                  <div class="card-body " style="height:auto">
                    <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?> &nbsp; &nbsp; <span class="<?php echo $this_page['icon']; ?>"> </span> </h4>
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
					<ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold " role="tablist"> 
						<li class="nav-item " >
							<a  class="nav-link " id="tab4" data-toggle="tab" href="#stock-tab4" role="tab" aria-controls="stock-tab4" aria-selected="false"> Prepare New  Invoice   </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						<li class="nav-item " >
							<a  class="nav-link active" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Unpaid Invoices   </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item"> <!-- disabled -->
							<a class="nav-link " id="tab2"   data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Paid Invoices   </a>
						  </li> 
						  
						  <li class="nav-item "> <!-- disabled -->
							<a class="nav-link " id="tab3"   data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> List of Hospitals Servicing  </a>
						  </li>  
						  
						   <li class="nav-item "> <!-- disabled -->
							<a class="nav-link " id="tab6"   data-toggle="tab" href="#stock-tab6" role="tab" aria-controls="stock-tab6" aria-selected="false"> Our Bank Accounts  </a>
						  </li>  
					  </ul> 
					 
                    <div class="tab-content tab-content-solid ">
                      <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                         	<?php  require "unpaid_invoice_tab.php"; ?> 
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
							<?php require "paid_invoice_tab.php"; ?> 
					  </div> 
					   
                      <div class="tab-pane fade " id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3"> 								
							<?php require "hospitals_tab.php"; ?> 
					  </div>  

					  <div class="tab-pane fade " id="stock-tab4" role="tabpanel" aria-labelledby="stock-tab4"> 								
							<?php  require "new_invoice_tab.php"; ?> 
					  </div>  
					  
					  <div class="tab-pane fade " id="stock-tab6" role="tabpanel" aria-labelledby="stock-tab6"> 								
							<?php  require "our_bank_account_tab.php"; ?> 
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
	  
	  <script src="../assets/js/shared/iCheck.js"></script>
	  <script src="../assets/js/invoice_scripts.js"></script>
	  
	  
	 <?php require "invoice_modals.php";?>
	
</body> <!---->
		<script> 
				$(function(){
					hide_update_buttons(); 
					load_hospitals($('select.hospitals')); 
					
					bank_elem = $('select#bank_list');
					staff_elem = $('select#staff_list');
					load_banks(bank_elem); 					
					load_staff(staff_elem); 					
					 
				});

		</script> 
</html>