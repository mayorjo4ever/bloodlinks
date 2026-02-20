<?php 

	 require "usercheck.php";  	 
	
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";
			## link = $new_med_record = "medical_task_reports.php?n=".base64_encode($data['fullname'])."&mctg=".base64_encode($data['category'])."&tp=".base64_encode('host')."&hn=".base64_encode($data['hosp_no'])."&db=".base64_encode($data['dob'])."&dtc=".base64_encode($data['date_c'])."&mode=".base64_encode('new');
			$myname = base64_decode($_REQUEST['n']);
			$category = base64_decode($_REQUEST['mctg']);
			$myhsp = base64_decode($_REQUEST['hn']);
			$mytype = base64_decode($_REQUEST['tp']); 
			$mydob = base64_decode($_REQUEST['db']); 
			$mydate = base64_decode($_REQUEST['dtc']); 
			$_SESSION['report_mode'] = $mode = base64_decode($_REQUEST['mode']); 
			
			
			$url2 = "?n=".$_REQUEST['n']."&mctg=".$_REQUEST['mctg']."&tp=".$_REQUEST['tp']."&hn=".$_REQUEST['hn']."&db=".$_REQUEST['db']."&dtc=".$_REQUEST['dtc']."&mode=".base64_encode('update');
			
			$table = ($mytype=="host")?"patients":"patients_siblings";
			$field = ($mytype=="host")?"hosp_no":"ref_no";
			
			$myinfo = $dbm->getFields($dbm->select($table,array($field=>$myhsp,'type'=>$mytype)),array('fullname','sn','psp_dir','psp'));
			$pic_source = (file_exists($myinfo['psp_dir'][0].''.$myinfo['psp'][0]))?$myinfo['psp_dir'][0]."".$myinfo['psp'][0]:"images/users/default-user.png";
	?>
	
</head>

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
		
			 <?php require "patient_former_medical_reports.php"; ?>
		 
		
        	<form method="post"> 
		 <div class="row">  
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12"> 
					<span class="h3 text-capitalize"> 
						
						<i class="fa fa-comment text-danger "> </i> &nbsp; add new medical reports  </span> &nbsp; 
							<br/><br/>						
						  <?php require "reportform.php"; ?>
				  </div> <!-- ./ col-md-12 --> 
			         
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			
			<!-- ./
			<div class="col-lg-4 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 
					  
					<div class="col-md-12" id="receipt_infos"> 
						 <p> receipt info </p>	
					</div> <!--  ./ col-md-10 query_results           
                </div>  <!--  ./ card-body  
              </div>   <!--  ./ card    
            </div>  col-lg-4 --> 
			
			</form>
			
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
  
    <!-- Plugin js for this page-->
    <script src="../assets/vendors/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendors/tinymce/themes/modern/theme.js"></script>
   <!-- Custom js for this page-->
    <script src="../assets/js/shared/editorDemo.js"></script>
    <!-- End custom js for this page-->
</body>
<?php require "modals.php"; ?>
</html>