
	<?php 
	   require "usercheck.php"; 
	   
		// if(isset($_POST['getrolepages'])){
				$_SESSION['cur_role'] = $_POST['usersrole']??"superb"; 							 
		// } 
	
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
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
				  <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					  <div class="card-body">
						 <?php  require "role_list.php";  ?>  
					  </div>
					</div>
              </div>
			</div>
		  
		  <div class="row">
		   <div class="col-lg-4 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                  <?php require "all_page_list.php"; ?>
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-4 --> 

			<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                  <?php require "assigned_page_list.php"; ?>
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-4 -->  
			
			<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                  <?php require "unassigned_page_list.php"; ?>
                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-4 -->  
          
        </div> <!-- ./ row -->
		    
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
</body>
<script>
		$(function(){
			     $("#usersrole").on('change',function(){
					 $("#getrolepages").click();  					 
				 });			
			/*************************************************/	 
			// manage defined  pages  
			$("button#reverse_page").on('click',function(){				
				// swal('request gotten');
				selected = [];
				$role = $("select#anyrole").val();
				$("input:checkbox.defined:checked").each(function() {
							selected.push($(this).val());
						});
				// validate 
				if(selected.length ==0){
						swal('Empty Selections',' You have not selected any page to reverse for "'+$role+'"','error'); 
				}				
				else {
					 reverse_pages(selected); 						
					//  swal('note',selected +' pages will be assigned now ','warning'); 
				}
				
				return false; 
				});
				 
			
			
			
			// manage undefined pages 
			// defined
			$("button#assign_page").on('click',function(){				
				// swal('request gotten');
				$role = $("select#anyrole").val();
				selected = [];
				$("input:checkbox.undefined:checked").each(function() {
							selected.push($(this).val());
						});
				// validate 
				if(selected.length ==0){
						swal('Empty Selections',' You have not selected any page to assign for "'+$role+'"','error'); 
				}				
				else {
					assign_pages(selected); 	
					// swal('note',selected +' pages will be assigned now ','info'); 
				}
				return false; 
				}); 
		
		});
		
		</script> 
</html>