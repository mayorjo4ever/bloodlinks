<?php
		### $dbm = new DbTool(); 
			$allroles = $dbm->getFields($dbm->select("roles",array('status'=>'active'),array('name','id')),array('sn','name','id')); 
			## var_dump($allroles);  
?> 	<form method="post">
			<div class="col-md-5 col-md-offset-1 float-left"  > <h4 class="card-title bold text-primary font-16"> select roles </h4></div>
			<div class="col-md-5 col-md-offset-1 float-left" > 
				<div class="form-group" id="fm5" style="border:5px thin #000;">					  
					  <div class="input-group" title="Select Role">
						 
						<select class="form-control"  name="usersrole" id="usersrole" style="font-size:16px; height:40px;" > 
							<optgroup label="List of Roles ">
							<option value=""> select a role  ... </option>

								<?php if(!is_null($allroles)) { $n = 0; foreach($allroles['id'] as $id) { ?>

								<option value="<?php echo $id; ?>" <?php echo ($_SESSION['cur_role']==$id)?"selected":""; ?> > <?php echo $allroles['name'][$n]; ?> </option>

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
					  <span class=" "> </span>
					</div> <!-- ./  form-group -->   
					<button class="btn btn-info btn-sm" type="submit" name="getrolepages" id="getrolepages" style="visibility:visible; display:none; "> go </button>				
			</div>
		</form>