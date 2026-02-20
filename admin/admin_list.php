		
		<div class="row">
			<div class="col-md-12 ">
				 <?php  
					$staff = $dbm->getFields($dbm->select('users',array('acct_status'=>'active'),array('surname'),'and','desc'),array('surname','firstname','midname','fullname','dob','user_id','sn','password','img_dir','passport'));
					## if not null  	
					if(!is_null($staff))
						{  $n=0; foreach($staff['user_id'] as $user_id){ 
							$img_src = $staff['img_dir'][$n]."".$staff['passport'][$n];
							$alt_src = "../assets/images/default-user.png"; 
							$my_roles = $dbm->getFields($dbm->select('myroles',array('user_id'=>$user_id,'status'=>'active')),array('role_id','step_val'));
						?>
						 <div class="col-md-4 grid-margin stretch-card float-left">
						  <div class="card">
							<div class="card-body" >
							  <div class="d-flex flex-row">
								<img src="<?php echo file_exists($img_src)?$img_src:$alt_src; ?>" class="img-lg rounded" alt="profile image" />
								<div class="ml-3">
								  <h6> <?php echo $staff['surname'][$n]." ".$staff['firstname'][$n]/**." ".$staff['midname'][$n]**/; ?> </h6>
								  <p class="text-muted" title=" <?php echo "Login Password : ".$staff['password'][$n]; ?>"><?php echo  "(".$user_id .")"; ?> 
								  </p> 
								  <p class="mt-2 text-primary bold"> <?php echo $rolename = (is_null($my_roles))?"":$admin->get_role_name($my_roles['role_id'][0])['name']; ?>
								  <br/> 
								  <a href="adm_profile.php?token=<?php echo base64_encode(base64_encode($user_id)); ?>"  target="_blank" class="unstyle"> <span class=" pointer admin-editor text-success" title="View full info "> <i class="fa fa-eye font-24">  </i>  </span> </a> &nbsp; &nbsp; 
								  <span class="del-admin unvisible pointer admin-editor text-danger" for="<?php echo  $staff['sn'][$n]; ?>" rel="<?php echo  $rolename; ?>" data-text="<?php echo $staff['fullname'][$n]; ?>" title="Delete User <?php echo  $staff['fullname'][$n]; ?> "> <i class="fa fa-close font-24 ">  </i>  </span> &nbsp; &nbsp; 
								  </p>
								</div> <!-- ml-3--> 
							  </div> <!-- d-flex-row -->
							 							
							</div><!-- card-body -->
						  </div> <!-- card-->
						</div> <!-- col-md-4 -->  
						
						
						<?php $n++; } ## end foreach  ?>
					
					 
					<?php } ## end not null  ?>  
					
					 <div class="col-md-4 grid-margin stretch-card float-left">
						  <div class="card">
							<div class="card-body" >
							<span class="h4 text-info">  <?php echo count($staff['user_id'])." (admins) in total "; ?> <br/> <br/>  
								<button type="button" onclick="hide_update_buttons()" class="btn simple-btn btn-rounded btn-sm" data-toggle="modal" data-target="#new_admin_form"> <span class="btn btn-success btn-rounded btn-icons btn-lg"> <i class="fa fa-plus fa-2x"></i> </span> 
									&nbsp; Create New Admin 
								</button>
								</span>
							</div>
						</div>
					</div>
			</div> <!-- ./ col-md-12 -->	
		</div> <!-- ./ row -->	