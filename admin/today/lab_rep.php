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
					<form method="post">           
						<div class="col-md-3 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo $this_page['title']; ?>  </span> &nbsp;  </div>
						<div class="col-md-4 float-left">  <div class="input-group"> <label class="col-md-3"> From </label> <div class="col-md-9"> <input type="text" class="form-control datepicker border border-primary font-16" /> </div> </div> </div>
						<div class="col-md-4 float-left">  <div class="input-group"> <label class="col-md-3"> To </label> <div class="col-md-9"> <input type="text" class="form-control border datepicker border-primary font-16" /> </div> </div> </div>				
						<div class="col-md-1 float-left">  <div class="form-group"> <button type="button" class="btn btn-primary btn-lg"> <i class="fa fa-search"> </i> </button> </div>  </div>
					</form>
                </div>  <!--  ./ card-header -->  
				
				<div class="card-body">                    
				  
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
	$(function(){
			 
			 load_patient_categories($('#pcategory')); 
			 
			 /****************************************/
				$('.download_report').on('click',function(){								 
					data = $(this).attr('for');	
					// session = 
							$(this).target = "_blank";							
							var url = "download_report.php?q="+(Math.random(100,765)*999876)+"&s="+(Math.random(95,400)*17580)+"&token="+ data;
							// window.open($(this).prop('href'));
							  window.open(url);
							//	alert(data);	
						 
				}); 
				/*****************************************/
			 
			  
		});
		
		 
  
  </script>
  
</body>

</html>