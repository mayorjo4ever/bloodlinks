<?php 

	 require "usercheck.php";  	 
	
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
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-10">
				 <span class="h3 text-capitalize"> manage patients receipts </span> <p>&nbsp; </p>
				 <form method=""> 
					<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  
					  <span class="text-primary h4"> scan barcode number </span> &nbsp; &nbsp;  <span class="fa fa-barcode fa-2x"> </span>
					  <div class="input-group border-1" title="Enter Barcode Number. ">
						<input style="font-size:16px; height:40px;" value="" autocomplete="false" type="text" id="recp_barcode" name="recp_barcode"  class="form-control" placeholder="Barcode Number">
						<div class="input-group-append">
						  <button class="btn btn-icons btn-primary get_barcode_info"  id="get_barcode_info" name="get_barcode_info"> <i class="fa fa-search text-white"></i></button>
						</div>
					  </div> 
					</div> <!-- ./  form-group --> 
			 
					</form> 					 
					 </div> <!-- ./ col-md-10 div --> 
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div> 
			
          </div> <!-- ./ row --> 
		  
		  <div class="row">
			<div class="col-lg-8 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 	 <div class="col-md-12" id="query_results"> 
													
					</div> <!--  ./ col-md-10 query_results -->   
				</div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>  <!-- ./ col-lg-8 -->
			
			<div class="col-lg-4 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 	 <div class="col-md-12" id="query_results2"> 
													
					</div> <!--  ./ col-md-12 query_results --> 
					<hr/>
					 <div class="col-md-12" id="query_results3"> 
													
					</div> <!--  ./ col-md-12 query_results --> 
				</div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div> 
			
		  </div>
		  
        </div>
        <!-- content-wrapper ends -->
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


</html>