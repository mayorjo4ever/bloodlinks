<?php 

	 require "usercheck.php";  	 
	
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";
			$myname = base64_decode($_REQUEST['n']);
			$mymilno = base64_decode($_REQUEST['mln']);
			$myhsp = base64_decode($_REQUEST['hn']);
			$mytype = base64_decode($_REQUEST['tp']);
			$mytype2 = base64_decode($_REQUEST['tp2']);
			$mydob = base64_decode($_REQUEST['db']); 
			$mydate = base64_decode($_REQUEST['dtc']); 
			$mydvs = base64_decode($_REQUEST['dvs']); 
		 
			$url2 = "?n=".$_REQUEST['n']."&mln=".$_REQUEST['mln']."&hn=".$_REQUEST['hn']."&tp=".$_REQUEST['tp']."&tp2=".$_REQUEST['tp2']."&db=".$_REQUEST['db']."&dtc=".$_REQUEST['dtc'];
	?>
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
			<div class="col-lg-12 grid-margin stretch-card">
               <div class="card">               
                <div class="card-body">
                  <h4 class="card-title bold text-capitalize text-success font-18"> <span class=" bold fa fa-stethoscope text-info"> </span> &nbsp; &nbsp;  <?php  echo $this_page['title']; ?>  
					 &nbsp; &nbsp;  &nbsp; &nbsp;  <small class="text-primary bold"> carry out the operations schedule for you..   </small>
				  </h4> 
				<table class="table text-capitalize"> 
					<tr>
						<th> name </th>
						<td> <?php echo $myname; ?> </td>
						<th> category</th>
						<td> <?php echo $mytype; ?> </td>  
						<th> age </th>
						<td> <?php echo $mydob; ?> </td>
						<th> hosp. no </th>
						<td> <?php echo $myhsp; ?>   </td>
					</tr>
					
					<tr>
						<th> mil. no </th>
						<td> <?php echo $mymilno; ?> </td>
						<th>  </th>
						<td> <?php #echo $mytype; ?> </td>  
						<th>   </th>
						<td> <?php # echo $mydob; ?> </td>
						<th>   </th>
						<td> <?php ## echo $myhsp; ?>   </td>
					</tr>
				
				</table>
				
                </div>
              </div>
            </div>
          </div> <!-- ./ row --> 
		 
          <div class="row" id="">
			<div class="col-lg-4 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12">
					<span class="h3 text-capitalize "> <i class="fa fa-calendar text-success"> </i> &nbsp; days visited </span> <p>&nbsp; </p>				 					
					</div> <!-- ./ col-md-10 div -->
					 
					<div class="col-md-12" id=""> 
						<?php 
							$query = $dbm->getFields($dbm->select_distinct('date_vs','tickets_converse',array('ref_no'=>$myhsp,'type'=>$mytype2)),array('date_vs'));
							
							if(!is_null($query)) { ?>
								<p> <?php echo count($query['date_vs']).' dates found '; ?> </p>
								<?php foreach ($query['date_vs'] as $dvs){
									
									$newdvs = base64_encode($dvs); 
									?>
									<p> <a title="<?php echo 'date - '.$dvs?>" href="<?php echo $url2."&dvs=$newdvs";?>" class="btn btn-block btn-sm <?php echo ($_REQUEST['dvs']==$newdvs)?" btn-info":" btn-warning";?>" value="<?php echo $dvs; ?>"> <i class="fa fa-calendar"> </i> &nbsp; <?php echo $func->format_date($dvs); ?> </a> </p>
								<?php } ## end foreach 
							 } ## end not null 
							else { ?>
								<span class="text-danger"> no date found  </span>
							<?php }
						?>		
					</div> <!--  ./ col-md-10 query_results -->         
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div> <!-- ./ col-lg-4 -->
		   
			<div class="col-lg-8 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                    
				 <div class="col-md-12"> 
					<span class="h3 text-capitalize"> 
						<i class="fa fa-comment text-warning "> </i> &nbsp; reports taken </span> &nbsp; 
						<!--	<a href="<?php ?>" class="btn btn-success text-capitalize"> create new report &nbsp;  <span class="fa fa-comment"></span> </a> -->
						<p>   </p> 
						<?php $comments = $dbm->getFields($dbm->select('tickets_converse',array('ref_no'=>$myhsp,'type'=>$mytype2,'date_vs'=>$mydvs ),array('time_c'),'and','desc'),
							array('sn','converse_type','msg','from_user_id','date_c','month_c','year_c','week_c','time_c',''));
							echo $tot_com = count($comments['sn']).' Reports Found on - &nbsp; '.  $func->format_date($dvs); 
							$n=0;
							if(!is_null($comments))foreach($comments['converse_type'] as $com_type) {
							?>
						
						<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
						  <div class="col-md-1">
							<img class="img-sm rounded-circle mb-4 mb-md-0" src="../images/faces/face1.jpg" alt="profile image">
						  </div>
						  <div class="ticket-details col-md-8">
							<div class="d-flex">
							  <p class="text-dark font-weig ht-semibold mr-2 mb-0 no-wrap"> <?php echo  $comments['from_user_id'][$n];?> :</p>
							  <p class="text-primary mr-1 mb-0">[# <?php echo ($tot_com - $n); ?> ]</p>
							  <p class="mb-0 ellipsis bold"> <?php echo $comments['converse_type'][$n]; ?> .</p>
							</div>
							<p class="text-gray ellipsis mb-2">  <?php echo stripslashes($comments['msg'][$n]); ?>
							</p>
							<div class="row text-gray d-md-flex d-none">
							  <div class="col-6 d-flex">
								<small class="mb-0 mr-2 text-info"> Since :</small>
								<small class="Last-responded mr-2 mb-0 text-info">  <?php echo readTime(time()-$comments['time_c'][$n]).' ago';?></small>
							  </div>
							 <!--  <div class="col-6 d-flex">
								<small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
								<small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
							  </div>  -->
							</div>
						  </div>
						  <div class="ticket-actions col-md-2">
							<div class="btn-group dropdown">
							  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Manage
							  </button>
							  <div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo "medical_task_add_report.php".$url2."&dvs=$newdvs" ?>">
								  <i class="fa fa-reply fa-fw text-warning"></i> Add More Report </a> 
								<div class="dropdown-divider"></div>
								  <a class="dropdown-item" href="#">
								 <i class="fa fa-check text-success fa-fw"></i> Record Bills </a> 
								  <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">
								  <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
							  </div>
							</div>
						  </div>
						</div> <!-- ./ row -->
						<?php $n++;  } // end foreach  ?>
						
						</div> <!-- ./ col-md-10 div -->
					 
					 <div class="col-md-12" id="report_search"> 
						
						<p> <?php // echo $_SERVER['PHP_SELF']; ?></p>
					</div> <!--  ./ col-md-10 query_results -->         
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
		   
		   
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
  
  <script>
	$(function(){
			manageEvents(); 
			window.setInterval(manageEvents,10000);
			 
		});
		
		function manageEvents(){
			
			display($('#all_awaiting_task'),'spec_scheduled_task'); 
			 
		} 
		
  
  </script>
  
</body>

</html>