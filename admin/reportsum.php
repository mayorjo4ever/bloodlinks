<?php 

	 require "usercheck.php";  	 
	 
	 if(isset($_POST['search_report'])){
		 $_SESSION['date_from'] = $_POST['date_from'];
		 $_SESSION['date_to'] = $_POST['date_to'];
	 }
	 
	
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";   ?>
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
        	<form method="post"> 
		 <div class="row"> 
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12"> 
					<span class="h3 text-capitalize"> 
						<i class="fa fa-comment text-warning "> </i> &nbsp; medical report summary  </span> &nbsp; 					
				   </div> <!-- ./ col-md-10 div -->  
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			  
          </div> <!-- ./ row --> 

		  <div class="row"> 
			<div class="col-lg-3 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12">  
						<div class="form-group" id="fm1" style="border:5px thin #000;">
						  <label class="bold text-info"> From Date </label> 
						  <div class="input-group border-1" title="Date">
							<input style="font-size:16px; height:40px; " autocomplete="false" type="text" id="date_from" name="date_from" value="<?php echo $_SESSION['date_from'];?>"  class="form-control  newdatepicker" placeholder="Date From">
							<div class="input-group-append">
							  <span class="input-group-text" style="height:40px;">
								<i class="fa fa-calendar  text-black"></i>
							  </span>
							</div>
						  </div>
						   <span class="date_recMsg"> </span>
						  </div> <!--./ form-group  -->					
				   </div> <!-- ./ col-md-10 div -->  
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			
			<div class="col-lg-3 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12"> 
					<span class=" text-capitalize">  
							<div class="form-group" id="fm1" style="border:5px thin #000;">
							  <label class="bold text-info"> To Date </label> 
							  <div class="input-group border-1" title="Date">
								<input style="font-size:16px; height:40px; " autocomplete="false" type="text" id="date_to" name="date_to" value="<?php echo $_SESSION['date_to'];?>" class="form-control  newdatepicker" placeholder="Date To">
								<div class="input-group-append">
								  <span class="input-group-text" style="height:40px;">
									<i class="fa fa-calendar  text-black"></i>
								  </span>
								</div>
							  </div>
							   <span class="date_recMsg"> </span>
							  </div> <!--./ form-group  -->
						
				   </div> <!-- ./ col-md-10 div -->  
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			
			<div class="col-lg-4 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				  		<div class="form-group" id="fm5" style="border:5px thin #000;">
		  <label class="bold text-info">  Patient Category </label>  
		  <div class="input-group border-1" title="Patient Category">
			<select class="form-control" style="font-size:16px; height:40px;"  id="pcategory" name="pcategory">
			   <option value=""> ...  </option>			    
			</select>						
			<div class="input-group-append">
			  <span class="input-group-text" style="height:40px;">
				<i class="fa fa-male text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="pcategoryMsg"> </span>
		</div> <!-- ./  form-group -->		
				   </div> <!-- ./ col-md-10 div -->  
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
             
			<div class="col-lg-2 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12"> 
					 <div class="form-group" id="fm1" style="border:5px thin #000;">
						<label class="bold text-info">   </label> 
				  
					<div class="input-group-append">
					  <button class="btn btn-primary btn-lg" name="search_report" id="search_report">
						<i class="fa fa-search  text-white"></i>
					  </button>
				 
					</div>
				   
				  </div> <!--./ form-group  -->					
				   </div> <!-- ./ col-md-10 div -->  
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div> 
          </div> <!-- ./ row --> 
		 </form>
           
		   <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				  <div class="col-md-12"> 
					<span class="h4 text-capitalize"> 
						<i class="fa fa-comment text-warning "> </i> &nbsp;     &nbsp; 					
						<?php
							// echo $_POST['date_from'].' to '; 
							// echo $_POST['date_to'].' + ';
							// echo $_POST['pcategory'].' + ';
							
							$time_from = mysql_real_escape_string( strtotime($_POST['date_from'])); 
							$time_to = mysql_real_escape_string(strtotime($_POST['date_to'])); 
							$categ = mysql_real_escape_string($_POST['pcategory']); 
							
							if($_POST['pcategory']=="") $pquery = ""; 
							else $pquery = "and category = '$categ'";
							
							
							if($time_from == $time_to ) $query = mysql_query("SELECT * FROM tickets_converse WHERE time_vs ='$time_from'  $pquery ") or mysql_error();
							else $query = mysql_query("SELECT * FROM tickets_converse WHERE time_vs >='$time_from' and time_vs <='$time_to' $pquery ") or mysql_error();
							
							## $query = mysql_query("SELECT * FROM tickets_converse WHERE time_vs >='$time_from' and time_vs <='$time_to' $pquery ") or mysql_error();
							echo $rows = mysql_num_rows($query).' reports  found'; 
							
						?>
						</span> &nbsp;  &nbsp;  <button for="<?php echo $time_from."_".$time_to."_".$categ; ?>"  class="download_report btn btn-success text-capitalize btn-lg"> download excel file </button>
						<p> &nbsp;  </p> 
						<table class="table table-striped table-bordered">
						<tr class="bold text-uppercase bg-dark white" > 
									<td> SN</td>
									<td> TYPE </td>
									<td> CATEGORY </td>
									<td> NAME </td>
									<td> Hosp. No </td>
									<!-- <td> Mil. No </td> -->
									<td>Diagnosis </td>
									<td> Treatment </td>
									<td> Cost </td>
									<td> balance </td>
								</tr> 
								
						<?php $n = 0;  $tcost = $tbal = 0; 
							while($results = mysql_fetch_assoc($query)){
								$ref_no = $results['ref_no'];
								$type = $results['type'];
								switch($type){
									case "host":{ $table = "patients"; $field = "hosp_no";  } break;
									default : { $table = "patients_siblings"; $field = "ref_no"; } break;
								}
						 
						 $myinfo = $dbm->getFields($dbm->select($table,array($field=>$ref_no,'type'=>$type)),array('dob','fullname','gender'));
						 $age = $func->years_old($myinfo['dob'][0],date('Y-m-d'));
						 $receipt_no = $results['receipt_no'];
						 $receipt_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$receipt_no)),array('total_fee','amount_paid','balance'));
						 
								?>
								<tr> 
									<td> <?php echo $n+1; ?></td>
									<td> <?php echo $results['type']; ?></td>
									<td> <?php echo $results['category']; ?></td>
									<td> <?php echo $myinfo['fullname'][0]; ?></td>
									<td> <?php echo $ref_no; ?></td>
									<!-- <td> <?php echo $results['military_no']; ?></td> -->
									<td> <?php echo $results['diagnosis']; ?></td>
									<td> <?php echo $results['treatment']; ?></td>
									<td> <?php echo "N ".number_format($receipt_info['total_fee'][0]); ?></td>
									<td> <?php echo "N".number_format($receipt_info['balance'][0]); ?></td>
								</tr> 
								
								
							<?php $tcost+=$receipt_info['total_fee'][0];
									$tbal +=$receipt_info['balance'][0];
							$n++;  }
							
						?>
						<tr class="bold text-uppercase"> 
							<td colspan="2"> total cost </td>
							<td colspan="2"> <?php echo "N ".number_format($tcost); ?></td>
							<td colspan="2"> pending payment </td>
							<td colspan="2"> <?php echo "N ".number_format($tbal); ?></td>
						</tr> 
						
						</table>
				   </div> <!-- ./ col-md-10 div -->    
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
		   
		   
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