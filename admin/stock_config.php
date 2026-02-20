
	<?php 
	   require "usercheck.php"; 
		if(!isset($_SESSION['stock-tab'])) $_SESSION['stock-tab']='tab1';
	   
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
</head>

<body>
   <div class="se-pre-con"> </div> <!--  page loader icon -->
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
                    <h4 class="card-title bold"> Stock Settings  </h4>
                    
					<ul class="nav nav-tabs tab-solid tab-solid-info" role="tablist">
						  <li class="nav-item">
							<a onclick="save_active_tab('tab1','stock')" class="nav-link <?php echo ($_SESSION['stock-tab']=="tab1")?"active":"";?>" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Categories of Items  </a>
						  </li> <!--
						  <li class="nav-item">
							<a onclick="save_active_tab('tab2','stock')" class="nav-link <?php echo ($_SESSION['stock-tab']=="tab2")?"active":"";?>" id="tab2" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false">Attach Images</a>
						  </li>
						  <li class="nav-item">
							<a onclick="save_active_tab('tab3','stock')" class="nav-link <?php echo ($_SESSION['stock-tab']=="tab3")?"active":"";?>" id="tab3" data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> Price Details  </a>
						  </li> 
						  -->
                     </ul>
					 
					 
                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade show <?php echo ($_SESSION['stock-tab']=="tab1")?"active":"";?>" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                        <div class="row">
                          <div class="col-md-6"> 
							 <?php require "stock_item_categ_list.php"; ?> 
						  </div> <!-- ./ col-md-6--> 
                        </div> <!-- ./ row -->
                        
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade <?php echo ($_SESSION['stock-tab']=="tab2")?"active":"";?>" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 
					  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eveniet, sapiente corrupti, vitae excepturi nulla soluta esse in ex, dignissimos velit rerum maiores asperiores! </div>
                    
					<div class="tab-pane fade <?php echo ($_SESSION['stock-tab']=="tab3")?"active":"";?>" id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3">
						 <form class="forms-sample">
						 <div class="col-md-6" style="float:left; "> 
							 
								  <div class="form-group">
									<label for="">Purchase Price</label>
									<input type="text" class="form-control border-primary" id="" placeholder="Purchase Price"> 
								  </div>
								  
								  <div class="form-group">
									<label for="">Selling Price </label>
									<input type="text" class="form-control border-primary" id="" placeholder="Selling Price"> 
								  </div>
								   
								  <button type="submit" class="btn btn-info mr-2"> Next &nbsp;   <i class="icon-arrow-right"></i></button>
								 
						  </div> <!-- ./ col-md-6-->
						  
						  <div class="col-md-6" style="float:left; "> 
							 
								  <div class="form-group">
									<label for=""> Quantity </label>
									<input type="text" class="form-control border-primary" id="" placeholder="Purchase Price"> 
								  </div>
								  
								  <div class="form-group">
									<label for=""> Date Purchased </label>
									<input type="text" class="form-control border-primary datepicker" id="" placeholder="Selling Price"> 
								  </div>
								     
							</div> <!-- ./ col-md-6-->
						   </form>
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
</body>

</html>