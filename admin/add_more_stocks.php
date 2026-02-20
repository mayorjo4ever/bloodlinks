<?php 

	 require "usercheck.php";  	 
		 
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
					<div class="col-md-6" style="float:left;">
				  <h4 class="card-title bold text-capitalize font-22"> 
					<i class="fa fa-medkit  text-success"></i>  &nbsp;  &nbsp;  Import More Items To Stock
					&nbsp; &nbsp; &nbsp; 
					 </h4>
					</div>
					<div class="col-md-6" style="float:left;">
					<form method=""> 
					<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  
					  <!-- <label class="text-primary"> search  for a specific type of drug and add  <i class="fa fa-shopping-cart"></i> </label> -->
					  <div class="input-group border-1" title="Search Patient Informations by Name, or Hospital Number. ">
						<input style="font-size:16px; height:45px;" title="search for a specific type of drug and add " autocomplete="false" type="text" id="query" name="query"  class="form-control" placeholder="Search For A Specific Type Of Drug And Add To Cart">
						<div class="input-group-append">
						  <button style="font-size:16px; height:45px;" class="btn btn-icons btn-primary add_more_drug_forms"  id="add_more_drug_forms" name="add_more_drug_forms"> <i class="fa fa-search text-white"></i></button>
						</div>
					  </div>
					  
					</div> <!-- ./  form-group --> 
			 
					</form>  
                  </div> <!-- ./ col-md-6 -->  	
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  			
          </div> <!-- ./ row --> 
		 
		 <form method="post">
		 
		   <div class="row">
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body" style="height:auto">
                   <h4 class="card-title bold text-capitalize font-16"> search result &nbsp; &nbsp; 
					<i class="fa fa-search fa-2x fa-spin text-black"></i>    </h4> 
				    <div class="stock-search-result">
						<!-- results displayed here -->					
					</div>
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
  
     <script src="../assets/js/shared/iCheck.js"></script>
  
</body>

<?php require "modals.php"; ?>

	<script>
			$(function(){
				 display_item_cart($('.all_item_cart'));
				
			}); 
			
			 
		 
			
	</script>
	
</html>