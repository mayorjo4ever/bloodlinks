
	<?php    require "usercheck.php";  ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- -->
	<link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	<link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">
	
	<style>
		table tr, table thead td, table td, table thead th, table th {
					  border:1px solid #fff; margin:5px; padding:5px; 
					   line-height:5px; background:transparent; 
				}
				.border-lines tr th,.border-lines tr td, .border-lines tr { border:1px solid #000; }
				
	</style>
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
				  <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
				 <div class="card-header ">
						<h4 class="card-title bold h3 ">   <?php  echo $this_page['title'] ; ?> &nbsp; &nbsp;   <i class="fa-2x <?php echo $this_page['icon'];?> "></i>  &nbsp; &nbsp; &nbsp; <small class="cosmo text-info"> this is where you can modify ticket status either completed from various stages </small> </h4>
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
				 </div>
                  <div class="card-body" style="height:auto">
                    <form method="post">
						 <div class="form-group col-md-10 row selection">
							<label for="title" class="col-sm-4 col-form-label"> Customer Name / Ticket No.  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-8"> 
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" name="ticket_searcher" id="ticket_searcher" value="" autocomplete="false" class="form-control border-primary newuserform bold " placeholder="GML/22/0000"> 
									<div class="input-group-append"> <button type="button" id="search_ticket" name="search_ticket" class="btn btn-info ladda-button " data-style="zoom-in"> <i class="fa fa-search"> </i> </button>  </div> 
								</div>
								</div> <!-- ./ col-sm-9 -->
						 </div> <!-- ./ form-group -->
						 
						  <div class="form-group row searching search_result">
							 <div class="form-group col-md-6 offset-3">
								<ul class="num_list list-inline"></ul>
							 </div>	
						   </div> <!-- ./ form-group -->  
						 <div class="search_output"></div>
						</form> 
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
	<?php require "bill_modal.php"; ?>
	<?php require "admin_js_links.php"; ?>
	 
	 <script src="../assets/js/ticket_status_updates.js"> </script>
	 <script src="../assets/js/shared/iCheck.js"></script>
	   
	 
</body> <!---->
		 
</html>