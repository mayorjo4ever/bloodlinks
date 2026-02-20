<?php 
	   require "usercheck.php";  	 
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
	<link rel="stylesheet" href="../assets/css/calendar_widget.css" >
	 
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
            <div class="col-12 grid-margin d-none d-lg-block">
              <div class="intro-banner bg-white border border-default">
                <div class="banner-image col-sm-6">
                  <img src="../assets/images/microscope.jpg" alt="banner image"> </div>
                  <!-- <img src="../assets/images/dashboard/banner_img.png" alt="banner image"> </div>-->
                <div class="content-area  col-sm-6 bold">
                  <h3 class="mb-0">Welcome, <?php echo $_SESSION['adminFullname'];  ?>!</h3>
                  <p class="mb-0">  <?php echo "Today is : ".date('l jS F, Y'); ?></p>
                </div>
                <!--  <a href="#" class="btn btn-info">  <?php  # echo $_SESSION['my_role_name'];?></a> --> 
              </div>
            </div>
          </div>
		  
		   <div class="row"> 
			 <div class="col-lg-12 col-md-12">
				 <?php 
					# if($_SESSION['my_default_role']=="superb")
					require "my_menus.php"; 
				?>  
			 </div> <!-- ./ col-lg-8 --> 
			
			<div class="col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
				 <?php  require "calendar_widget.php"; # starts wt class='card' ?>	
			</div>  <!-- ./ col-lg-4 --> 
		  </div> <!-- ./ row --> 
	
 
		
		  
		  <div class="row"> 			
			<?php ## require "workflow_stats.php"?> 
		  </div>
		  
		  <?php # require "index-statistics.php"; ?>
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
         
		 <?php require "footer.php"; ?>
		 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
	<?php require "admin_js_links.php"; ?> 
	<script src="../assets/js/calendar_widget.js"> 	</script>
	
	<script>
		  $(function() {
			  $('#togs').change(function() {
				console.log('Toggle: ' + $(this).prop('checked'))
			});
		});
	</script>
	
</body>

</html>