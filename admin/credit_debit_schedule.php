	
		<div class="row">  
			<div class="col-md-3 float-left"> 
				<div class="icheck-square"> 
				  <label for="group" class="font-16"> Per Designation &nbsp; <input type="radio" value="group" id="display_type" name="display_type" checked /> </label>
				</div> 
			</div>
			<div class="col-md-3 float-left">  
				<div class="icheck-square font-16">				  
				  <label for="single" class="font-16"> Per Individual &nbsp;<input type="radio" value="single" id="display_type" name="display_type" /> </label>
				</div>
			</div> 
		</div> <!-- ./ row -->
		
		<div class="row">  		
			<div class="col-md-5 float-left">  
				<div class="form-group"> 
					<select id="role_id" class="form-control font-16 border border-primary" onchange="console.log($(this).val())"> 
						<optgroup label="Select Designation"> 
							<option value=""> ... Select Designation ... </option>
							<?php #  
							$allroles = $dbm->getFields($dbm->select("roles",array('status'=>'active'),array('name','id')),array('sn','name','id')); 
							if(!is_null($allroles)) { $n = 0; foreach($allroles['id'] as $id) { ?>
								<option value="<?php echo $allroles['id'][$n]; ?>"> <?php echo $allroles['name'][$n]; ?> </option>
							<?php $n++; }  
							 } ## end not null
							?>	
					</optgroup>
				</select>
				</div>  
			</div> <!-- ./ col-md-6 -->
			
			<div class="col-md-5 float-left">  
				<div class="form-group"> 
					<select id="step_val" class="form-control font-16 border border-primary" onchange="console.log($(this).val())"> 
						<optgroup label="Select Step"> 
							<option value=""> ... Select Step ... </option>
							<?php #   
							for($step = 1; $step<=15; $step++) { ?>
								<option value="<?php echo $step; ?>"> <?php echo "Step ".$step; ?> </option>
							<?php }  
							 
							?>	
					</optgroup>
				</select>
				</div>  
			</div> <!-- ./ col-md-6 -->
		 </div> <!-- ./ row -->
		
		
		<div class="row"> 
			<div class="col-md-10 offset-0"> 
			<div class="card" ><div class="card-body">
				<div class="designation_result"></div>
			</div> </div>
			</div>
		</div>
			
			
		  		  
								  