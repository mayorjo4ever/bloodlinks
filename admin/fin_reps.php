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
                  <div class="card-body" style="height:auto">
                    <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?>  </h4>
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
					<ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist"> 
						<li class="nav-item " >
							<a  class="nav-link active" onclick=" view_tickets('no',$('.pd'))" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Process Pending Tickets   </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item "> <!-- disabled -->
							<a class="nav-link  "  id="tab2"  data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> View Completed Tickets   </a>
						  </li> 
						
						<li class="nav-item " >
							<a  class="nav-link" onclick="view_tickets_to_modify('no',$('.pd'))" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Tickets To Modify </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  --> 
					  </ul> 
					 
                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                         	<?php require "pending_tickets.php"; ?> 
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
							<?php require "completed_tickets.php"; ?> 
					  </div>  
					  
					  <div class="tab-pane fade" id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3">
                         	<?php  require "pending_tickets.php"; ?> 
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
	 
	 <script src="../assets/js/lab_schedule_scripts.js"> </script>
	 <script src="../assets/js/billing_scripts.js"> </script>
	 <script src="../assets/js/shared/iCheck.js"></script>
	   
	 
</body> <!---->
		<script> 
				$(function(){
					
					hide_update_buttons(); 
					  
					 loader('hide'); 
					 
					 // to display saved specimen 
					 elem = $('.pd');    
					 view_tickets('no',$('.pd'));
					 view_tickets('yes',$('.cmp'),$('.current_date').attr('data-text'));
					 
					 // under view completed tickets : view by date or searching 
					 display_search_type("param_form"); 
					
				});
				
				function printme(parameters){
					url = parameters; 
					if (url!="") window.open(url,"_blank") 
					}
		
			  function set_ticket_found(name,id) {
					// change input value
					$('#comp_ticket_searcher').val(name);
					$('#comp_ticket_searcher').attr('ref',id);	 				
					$('.num_list').hide(); 
					/*********************/
					$('.viewtickets').click(); 		
				}
				///////////////////////
		</script> 
</html>