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
           
		 <form method="post">
		 
			 <div class="row">
			 <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="height:auto">
                    <h4 class="card-title bold font-18"> <i class="fa fa-medkit  text-success"></i>  &nbsp;  &nbsp;  Stock Sales </h4> 
					<ul class="nav nav-tabs tab-solid tab-solid-info" role="tablist">
						  <li class="nav-item">
							<a  class="nav-link " id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Search  Drugs </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item">
							<a class="nav-link active " id="tab2" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Check Out | Item Carts</a>
						  </li> 
					</ul>
					 
					 
                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade  " id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                        <div class="row">					
							 <div class="col-md-6" style="float:left;">
								 <form method=""> 
								<div class="form-group text-capitalize" id="fm20" >	
								  <div class="input-group border-1 " title="Search Patient Informations by Name, or Hospital Number. ">
									<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="query" name="query"  class="form-control border-primary" placeholder="Search For A Specific Type Of Drug And Add To Cart">
									<div class="input-group-append">
									  <button style="font-size:16px; height:45px;" class="btn btn-icons btn-primary search_drug_forms"  id="search_drug_forms" name="search_drug_forms"> <i class="fa fa-search text-white"></i></button>
									</div>
								  </div>					  
								</div> <!-- ./  form-group --> 						 
								</form> 
							</div> <!-- ./ col-md-6  -->
							
							<div class="col-md-12"> <hr/> </div> <!-- ./ col-md-12  -->
							
							<div class="col-md-10"> 
								<h4 class="card-title bold text-capitalize font-16"> search result &nbsp;   </h4> 
								<div class="stock-search-result">
									<!-- results displayed here -->					
								</div>											
							</div> <!-- ./ col-md-12  --> 
							
                          </div> <!-- ./ row -->
                        
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade show active " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 
						 <div class="row">	
							<div class="col-md-12"> 							 
							   
							   <div class="all_item_cart"> 	</div>
								
							</div>  <!-- ./ col-md-12  -->
                          </div> <!-- ./ row -->
					 </div>
                     
					 
                    </div> <!-- ./ tab-content -->
                  </div> <!-- ./ card-body -->
                </div> <!-- ./ card -->
              </div> <!-- ./ col-md-12 -->
          </div><!-- ./ row -->
		  
			 
		    
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