<?php 

	 require "usercheck.php";  	  
	 
	if(!isset($_REQUEST['q']) && !isset($_REQUEST['t'])){
		header("Location:patients.php"); 
	  }
	 $dbm = new DbTool(); $func = new functions(); 
	  $hosp_no =  base64_decode($_REQUEST['q']); $type = base64_decode($_REQUEST['t']); 
	  switch($type){
		  
		  case "host":{ $table = "patients"; $fd = "hosp_no";  } break; 
		  
		  default :{$table = "patients_siblings"; $fd = "ref_no";} break; 
		  
	  }
	  
	  $my_info = $dbm->getFields($dbm->select($table, array('status'=>'active',$fd=>$hosp_no ,'type'=>$type)),array('fullname','rank','phone','state','lga','gender','surname','firstname','sn','hosp_no','othername','military_no','dob','category','psp','psp_dir',
					'nokphone','address','nokname','nokrelationship','c_by','date_c'));     
	 if(!is_null($my_info)) $my_info = $dbm->resort($my_info); # not null  	
		else  { echo "<script> alert('invalid parameters '); window.location.href='patients.php' </script>"; }
	 
	?> 
	<?php 
	
				$ref_no = base64_encode($hosp_no);
				$nm = base64_encode($my_info['surname']." ".$my_info['firstname']." ".$my_info['othername']);
				$mil_no = base64_encode($my_info['military_no']);
				####### bio info updates
				$snn = base64_encode($my_info['surname']);
				$rnk = base64_encode($my_info['rank']);
				$snm = base64_encode($my_info['surname']);
				$fnm = base64_encode($my_info['firstname']);
				$otn = base64_encode($my_info['othername']);
				$dob = base64_encode($my_info['dob']);
				$phn = base64_encode($my_info['phone']);
				$mst = base64_encode($my_info['state']);
				$mlg = base64_encode($my_info['lga']);
				$gd = base64_encode($my_info['gender']);
				$pctg = base64_encode($my_info['category']);
				$psp = base64_encode($my_info['psp']);
				$pspd = base64_encode($my_info['psp_dir']);
				$upd_sn = base64_encode($my_info['sn']);
				$nknm = base64_encode($my_info['nokname']);
				$adr = base64_encode($my_info['address']);
				$nkr = base64_encode($my_info['nokrelationship']);
				$nkp = base64_encode($my_info['nokphone']);
				
				###################
				$mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$hosp_no),array('time_c'),'and','desc'),array('fullname','surname','firstname','sn','ref_no','othername','dob','type'));
				$mypsp = $my_info['psp_dir'].$my_info['psp'];
				$myname = "".$my_info['surname']." ".$my_info['firstname']." ".$my_info['othername'];
				$url2 = "biodata_edit_interface.php?act=edit&rnk=$rnk&refn=$ref_no&mln=$mil_no&snm=$snm&fnm=$fnm&otn=$otn
					&dob=$dob&upd_sn=$upd_sn&phn=$phn&mst=$mst&mlg=$mlg&gd=$gd&pctg=$pctg&psp=$psp&pspd=$pspd&nknm=$nknm&adr=$adr&nkr=$nkr&nkp=$nkp"; 
				$url3 = "add_sibling_interface.php?refn=$ref_no&mln=$mil_no&nm=$nm&snn=$snn";	
				
	
		
	 ?>
	

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
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
           <div class="row profile-page">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="profile-header text-white" style="height:200px; background:url('../assets/images/dashboard/hospital-2.jpg'); margin-top:2px; pading-top:2px;">
                      <div class="d-flex justify-content-around"

					  style="margin-top:2px; pading-top:2px;">
                        <div class="profile-info d-flex align-items-right" >
                          <img class="rounded-circle img-lg" src="<?php echo file_exists($my_info['psp_dir']."".$my_info['psp'])?$my_info['psp_dir']."".$my_info['psp']: "images/users/default-user.png"; ?>" alt="<?php echo $my_info['psp']; ?>" style="min-height:120px; min-width:120px; "/>
                          <div class="wrapper pl-4">
                            <p class="profile-user-name font-18">  <br/> <?php echo $my_info['rank']." ".$my_info['fullname']." [ ".$type." ]";?>  <a href="<?php echo $url2;  ?>" class="btn btn-lg btn-icons btn-rounded btn-danger"> <i class="fa fa-pencil"> </i> </a></p> 
                            <div class="wrapper d-flex align-items-center">
                              <p class="profile-user-designation">  <?php   ?>  <i class="fa fa-calendar"> </i> &nbsp; Last Visit : &nbsp;  <?php # echo $func->years_old($my_info['dob'],date('Y-m-d')); # ?> </p>
						        
                            </div>
                          </div>
                        </div>
                        <div class="details">
                          <div class="detail-col">
                            <p>Dependants </p>
                            <p> <?php echo count($mysib['sn']); ?> </p>
                          </div>
                          <div class="detail-col">
                            <p>Number of Visits</p>
                            <p>0</p>
                          </div>
                        </div>
                      </div>
                    </div>
					
					 <div class="profile-body">
                      <ul class="nav tab-switch" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="user-profile-info-tab" data-toggle="pill" href="#user-profile-info" role="tab" aria-controls="user-profile-info" aria-selected="true"> Bio-data Info</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="user-profile-activity-tab" data-toggle="pill" href="#user-profile-activity" role="tab" aria-controls="user-profile-activity" aria-selected="false">Hospital Activities / Reports </a>
                        </li>
                      </ul>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="tab-content tab-body" id="profile-log-switch">
								<?php require "bio_data_pane.php"; ?>
								<?php require "user_activity_pane.php"; ?>
								
                            
                          </div>
                        </div>
          
					<div class="col-md-4">
                          <h5 class="my-4 bold"> Siblings </h5>
						
						 
						 <div class="new-accounts">
                            <ul class="chats">
                              <?php if(is_null($mysib)){ ?>
								  <li class="text-danger bold"> no siblings yet </li>
							  <?php }
								else { $n=0; 
									foreach($mysib['fullname'] as $client){?>
									<li class="chat-persons">
										<a href="<?php echo "profile.php?q=$ref_no&t=".base64_encode( $mysib['type'][$n]); ?>">
										  <span class="pro-pic">
											<img src="<?php echo file_exists($mysib['psp_dir']."".$mysib['psp'])?$mysib['psp_dir']."".$mysib['psp']: "images/users/default-user.png"; ?>" alt="<?php echo $mysib['psp']; ?>"> </span>
											
										  <div class="user">
											<p class="u-name"><?php echo $client; ?></p>
											<p class="u-designation bold"> <?php echo $mysib['type'][$n]; ?>  &nbsp;  &nbsp; <i class="fa fa-pencil"> </i> </p> 
										  </div>
										</a>
									</li>	
										
									<?php $n++; } # end foreach
									
								}?>
                              <p> &nbsp; </p>
                              <a href="<?php echo $url3;  ?>" class="text-black " > <span class="btn btn-danger btn-lg btn-icons btn-rounded text-black">  <i class="fa fa-plus"> </i>  </span> &nbsp; Add Siblings </a>
                            </ul>
                          </div>
                           
                        </div> <!-- ./ col-md-3 -->
                      </div> <!-- ./ row -->
                    </div>
                  </div>
                </div>
              </div>
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
		   <!-- Custom js for this page-->
			<script src="../assets/js/shared/data-table.js"></script>
			<script src="../assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
		</body>

		<?php require "modals.php"; ?>
		
		<script>
			$(function(){
				 
				/****
				$('#patient_table').DataTable({
					//  "scrollY": 200,
					"scrollX": true
				}); 
				
				 $('#patient_table tbody').on('click', 'tr', function () {
					var data = table.row( this ).data();
					alert( 'You clicked on '+data[0]+'\'s row' );
				} );
				
				****/
				load_sibling_types($('#sib_type')); 
				display_sibling_types($('#sib_view'));  
				/*******************************************/ 
				/**
					$('.datepicker').datepicker({
					 weekStart:1,
					 color: 'red'
				 });
				
				$("body").delegate(".datepicker", "focusin", function(){
					$(this).datepicker();
				}); **/
				
			}); 
		 
			
	</script>
	 

		</html>
		