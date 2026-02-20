 			<h4 class="card-title bold text-capitalize font-18"> 
					<i class="fa fa-male  text-primary"></i>  &nbsp;  &nbsp; assign role to organization agents
				  </h4> 
				  <span class="text-warning bold text-capitalize"> no admin staff yet. </span>
                 <a href="create_admin.php" class="btn btn-danger btn-rounded text-white bold text-capitalize"> <i class="fa fa-user-plus"></i> &nbsp; <span class=""> create admin staff </span> </a>
				 &nbsp; &nbsp; &nbsp; 
				 <span class="text-warning bold text-capitalize"> no roles yet. </span>
                 <a href="role.php" class="btn btn-danger btn-rounded text-white bold text-capitalize"> <i class="fa fa-user-plus"></i> &nbsp; <span class=""> create role </span> </a>
				 <p>&nbsp; </p>
				  
				  
				  <div class="col-md-12" style="min-height:200px;">
                    <fieldset style="border:1px solid #000;  margin:5px 20px; padding:5px 20px; ">
						<legend class="font-18 bg-primary bold white text-capitalize" style=" margin:10px 15px; padding:10px 15px; "> Assign roles here </legend>
					
				   <form method="post">
					  <?php ## $dbm = new DbTool(); 
						$workers = $dbm->getFields($dbm->select("users",array('acct_status'=>'active'),array('surname','firstname')),array('sn','user_id','surname','firstname','midname')); 
						### var_dump($workers); 
						?>
					
					<div class="col-md-6" style="min-height:100px;  padding:30px 20px; float:left; " >
					 <div class="form-group" id="fm5" style="border:5px thin #000;">
					  <label class="bold text-info">   Select Admin   </label>  
					  <div class="input-group" title="Admins ">
						 
						<select class="form-control" name="anyuser" id="anyuser" style="font-size:16px; height:40px;" > 
							<optgroup label="List of Admin ">
							<option value=""> ... </option>

								<?php if(!is_null($workers)) { $n = 0; foreach($workers['user_id'] as $id) { ?>

								<option value="<?php echo $id; ?>" for="<?php echo strtoupper($workers['surname'][$n]).' '. $workers['firstname'][$n].' '.$workers['midname'][$n]." -- ".  $id; ?>"> <?php echo strtoupper($workers['surname'][$n])." ". $workers['firstname'][$n]." ".$workers['midname'][$n]." -- ".  $id; ?> </option>

								<?php  $n++; } # end foreach 
								 } # end is not null ?>
							</optgroup>
						</select>
						
						<div class="input-group-append">
						  <span class="input-group-text" style="height:40px;">
							<i class="fa fa-male text-black"></i>
						  </span>
						</div>
					  </div>
					  <span class="genderMsg"> </span>
					</div> <!-- ./  form-group -->
					</div> <!-- ./  col-md-6-->
					 
					<div class="col-md-6" style="height:100px;  padding:30px 20px;  float:left; " >
					 <div class="form-group" id="fm7" style="border:5px thin #000;">
					  <label class="bold text-info"> Select Role  </label> 
					  <div class="input-group" title="State of Origin">  
					  
						<select class="form-control" style="font-size:16px; height:40px;"  id="roles">
						   <option value="">...</option>
						   <?php				
							$roles = $dbm->getFields($dbm->select('roles',array('status'=>'active'),array('name'),'and','asc'),array('name','id','sn'));
							
							if(!is_null($roles))
								{   $n=0; foreach($roles['name'] as $role){?>								
						   <option value="<?php echo $roles['id'][$n]; ?>"> <?php echo $role; ?> </option>
						   <?php $n++; } ## end foreach  ?>															
								<?php } ## end not null 				
							?>
						</select>
						
						<div class="input-group-append">
						  <span class="input-group-text" style="height:40px;">
							<i class="fa fa-male text-black"></i>
						  </span>
						</div>
					  </div>
					  <span class="mystateMsg"> </span>
					</div> <!-- ./  form-group -->
					</div> <!-- ./  col-md-6-->
					  
					<center>
					<div class="col-md-4" >
						<div class="form-group">
						  <button style="font-size:18px; height:40px;" id="assign_role" name="assign_role" class="btn btn-info btn-rounded submit-btn btn-block ladda-button" data-style="expand-right">Assign Role  &nbsp; <i class="fa fa-male text-white"></i></button>
						</div>
					</div>
					</center>
					
					</form>
					
					<div class="col-md-12" style="min-height:100px;  padding:30px 20px; float:left; " >
						<div class="myroles">
						
						</div>
					</div>
					</fieldset>  
				  </div> <!-- ./ col-md-5 --> 