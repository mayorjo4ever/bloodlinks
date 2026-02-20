<?php 

	 require "usercheck.php";  	 
	
	?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
	<script src="../vendors/tinymce/tinymce.js"></script>  
</head>

<body>
  <div class="container-scroller">
    
	<?php require "head_nav.php"; ?>
	
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
					<p> <?php $ticket_no = base64_decode($_REQUEST['s']); 
						$sql = $dbm->getFields($dbm->select('tickets',array('ticket_no'=>$ticket_no)),array('sn','fullname','type','ticket_no','ref_no','time_c','date_c'));
						 if(!is_null($sql)) $infos = $dbm->resort($sql); else { echo "<script> alert(' Invalid Ticket No. '); window.location.href='patient_medicares.php'; </script>";}
						 $since = (time()-$infos['time_c']);
						?>
					 <span class="bold"> Patient : <label class="badge badge-success font-16">  <?php echo $infos['fullname'];?></label> </span>  
					 <span class="bold"> Type : <label class="badge badge-success font-14"> <?php echo $infos['type']; ?> </label> </span>, 
					 <span class="bold"> Ticket No: <label class="badge badge-success font-14"> <?php echo $ticket_no;?> </label> </span>
					 <span class="bold"> Created Since : <label class="badge badge-success font-14"> <?php echo readTime($since) ;?>  ago </label> </span>
					</p>
					<p class="h4 text-capitalize font-18 bold">
					 <i class="fa fa-play btn-icon  text-success"></i>  &nbsp;  &nbsp; start conversation 					  
						&nbsp; &nbsp;  						
						<button class="btn btn-primary btn-rounded " onclick="display_conversation_type($('#converse_view'))" data-toggle="modal" data-target="#newConverseType" data-backdrop="static" data-keyboard="false" > Add New Conversation Type  &nbsp; &nbsp; <i class="fa fa-comment"></i></button>
					</p>
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-6 -->  
			
			<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">  
						<form method="post">
						<?php require "conversation_form.php";?>
						</form>
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-5 --> 
			
			<div class="col-lg-7 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body"> 
				   <p class="h4 text-capitalize font-18 bold">
					<i class="fa fa-comment  text-warning"></i>  &nbsp; latest comments </p>	
					<?php  require "comment_form_list.php";?>
					
					</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-7 -->  
			 
			</div> <!-- ./ row --> 
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
  
</body>
 
<?php require "modals.php"; ?>
	
	<script src="../assets/js/tinymce_script.js "> </script>
	
	<script> 
		$(function(){ 
			load_conversation_type($('#pconverseType')); 
	 
		
		
		}); // end jquery 
		/***********************************/
				
	</script>

</html>