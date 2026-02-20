<?php    require "usercheck.php";
 	
  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- -->

</head>
<!-- <body class="sidebar-fixed"> -->
<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php // require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel container">
        <div class="content-wrapper">  
		 
        	<form method="post"> 
		 <div class="row"> 
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card"> 
				
                <div class="card-header" style="padding-bottom:5px;">  
						<div class="col-md-3 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo $this_page['title']; ?>  </span> &nbsp;  </div>
				</div>  <!--  ./ card-header -->  
				
				<div class="card-body">                    
				  <div class="row">
					<div class="col-md-12">  
					 ...
					</div>
				  </div>
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			  
          </div> <!-- ./ row --> 
		 </form>
            
		   
		   
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
  
  <script>
	
  </script>
  <script src="../assets/js/lab_rep_script.js"></script>
  
</body>

</html>