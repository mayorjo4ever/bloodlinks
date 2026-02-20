
	<?php 
	   require "usercheck.php"; 
	   
		 if(isset($_POST['getrolepages'])){
				$_SESSION['cur_role'] = $_POST['usersrole']; 							 
		 }  
		 
		#  require "staff_payment_script.php"; 
		
		if(isset($_POST['hide_staff_list'])){ 
			$_SESSION['show_staff_list'] = false;
		}
		/*******************/
		
		if(isset($_POST['search_payment'])){ 
		 $staff_range = filter_var($_POST['staff_range'],FILTER_SANITIZE_STRING); 
		 $_SESSION['year'] = $year = filter_var($_POST['year'],FILTER_SANITIZE_STRING); 
		 $_SESSION['month'] = $month = filter_var($_POST['month'],FILTER_SANITIZE_STRING); 
		 /*************************************************/
		 if($staff_range=="all") {
			 $_SESSION['staff_query'] = $dbm->getFields($dbm->select('users',array('acct_status'=>'active'),array('surname'),'and','asc'),array('surname','firstname','midname','fullname','dob','user_id','sn','password'));								
		 }
		 else {
			$_SESSION['staff_query'] = $dbm->getFields($dbm->select('users',array('user_id'=>$staff_range,'acct_status'=>'active'),array('surname'),'and','asc'),array('surname','firstname','midname','fullname','dob','user_id','sn','password'));
		 } 
		 $_SESSION['show_staff_list'] = true;
		 
		} # end post 
	
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>
	<link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">	
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
					  <div class="card-body"> <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?> &nbsp;&nbsp;<i class="<?php echo $this_page['icon'];?>"> </i>  </h4>
						 <?php # require "salary_role_list.php";  ?>  
						 <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist"> 
							<li class="nav-item "> <!-- disabled -->
								<a class="nav-link active"  id="tab1"  data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Pay Monthly Salary  </a>
							</li>  
						
							<li class="nav-item "> <!-- disabled -->
								<a class="nav-link  "  id="tab2"  data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Staff Payment Modules   </a>
							</li>   
							
							<li class="nav-item " >
								<a  class="nav-link " id="tab3" data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> Allowance & Deductions  </a>
							</li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
					  </ul> 
					
						<div class="tab-content tab-content-solid">
							  <div class="tab-pane fade  show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
									<?php require "annual_paym_form.php"; ?>
							  </div> <!-- ./ tab-pane -->
							  
							  <div class="tab-pane fade" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
									<?php  require "salary_payment_module.php"; ?> 
							  </div>  
							  
							  <div class="tab-pane fade " id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3"> 																	
									<?php  require "allowance_deduction_bodies.php"; ?> 
							  </div>  
					  
						</div> <!-- ./ tab-content -->
						 
					  </div> <!-- ./ card-body -->
					 </div> <!-- ./ card -->
					</div> <!-- ./ col-md-12 -->
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
	<script src="../assets/js/salary_scripts.js"></script>
	<script src="../assets/js/shared/iCheck.js"></script>
	<?php require "salary_modals.php";?>
	
</body>
<script>
		$(function(){
			     
			$('select.salary_step').trigger('change');
			$('input.salary-val').trigger('change');
			 
		});
		
		</script> 
</html>