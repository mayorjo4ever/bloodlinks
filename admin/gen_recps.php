<?php 

	 require "usercheck.php";  	
		/* if(!isset($_SESSION['date_from']) || !isset($_SESSION['date_to'])) 
			$_SESSION['date_from'] = $_SESSION['date_to'] = date('Y-m-d');
		**/		
	 
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
				<div class="col-md-4" style="float:left;"> <br/>
				  <h4 class="card-title bold text-capitalize font-22"> 
					<i class="fa fa-money  text-primary"></i>  &nbsp;  &nbsp; <?php  echo $this_page['title']; ?>
				  </h4>  
				  </div> <!-- ./ col-md-4 -->
				  
				   <form method="post">
				  <div class="col-md-3" style="float:left;">
						<div class="form-group" id="fm1" style="border:5px thin #000;">
						  <label class="bold text-info"> From Date </label> 
						  <div class="input-group border-1" title="Date">
							<input style="font-size:16px; height:40px; " autocomplete="false" type="text" id="date_from" name="date_from" value="<?php echo $_SESSION['date_from'];?>"  class="form-control  newdatepicker" placeholder="Date">
							<div class="input-group-append">
							  <span class="input-group-text" style="height:44px;">
								<i class="fa fa-calendar text-success"></i>
							  </span>
							</div>
						  </div>
						   <span class="date_recMsg"> </span>
						  </div> <!--./ form-group  -->
				  </div> <!--./ col-md-3  -->
				  
				  <div class="col-md-3" style="float:left;">
						<div class="form-group" id="fm1" style="border:5px thin #000;">
						  <label class="bold text-info"> To Date </label> 
						  <div class="input-group border-1" title="Date">
							<input style="font-size:16px; height:40px; " autocomplete="false" type="text" id="date_to" name="date_to" value="<?php echo $_SESSION['date_to'];?>"  class="form-control  newdatepicker" placeholder="Date">
							<div class="input-group-append">
							  <span class="input-group-text" style="height:44px;">
								<i class="fa fa-calendar text-success"></i>
							  </span>
							</div>
						  </div>
						   <span class="date_recMsg"> </span>
						  </div> <!--./ form-group  -->
				  </div>  <!--./ col-md-3  -->
				  
				    <div class="col-md-2" style="float:left;">
						<div class="form-group"> <label  class="bold text-info"> search&nbsp; &nbsp;  </label> <br/>
							<button id="search_pharm_dates" name="search_pharm_dates" class="btn btn-primary btn-rounded btn-lg bold ladda-button" data-style="expand-right" > 
							<i class="fa fa-search"> </i>
							</button>
						</div>
					 </div> 
					<!--./ col-md-2  -->
				  </form>
				  
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->   
          </div> <!-- ./ row --> 

		  <div class="row">
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
					<center> <span class="fa fa-search fa-2x fa-spin"> </span> </center>
                   <?php   require "gen_recp_timeline.php"; ?>
				  
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->   
          </div> <!-- ./ row --> 
		 
          
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
  
</body>

<?php require "modals.php"; ?>

	<script>
			$(function(){
				 
				 
				$('.datepicker').datepicker({});
				
				
			}); 
		 
			
	</script>
	
</html>