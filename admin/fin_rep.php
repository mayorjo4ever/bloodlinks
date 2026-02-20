<?php 
	   require "usercheck.php";  	 
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>  
</head>

 <body class="<?php echo $system_info['sidebar_theme']; ?>">
  <div class="container-scroller">
   <!-- partial: partials/_navbar.php -->
		<?php  require "partials/_navbar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
	
	 <!-- partial: partials/_settings-panel.php -->
    
	<?php require "_settings-panel.php"; ?>
	
	<?php require "sidebar_nav_2.php"; ?>
	
	<div class="main-panel ">
        <div class="content-wrapper">
          
		 <div class="row">
            <div class="col-12 grid-margin stretch-card ">
               <div class="card">
				<div class="card-header">
					<span class="h4 "> <?php echo $this_page['title'];?> &nbsp;  <i class="<?php echo $this_page['icon'];?>"></i> </span>
				</div>
				
				<div class="card-body">
					  ... 
					  
				</div> <!-- card-body --> 
			   </div>  <!-- card --> 
			   
            </div> <!-- col-12 -->
          </div>  <!-- ./ row -->
         
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
	 
	<script>
		  $(function() {
			  
		});
	</script>
	
</body>

</html>