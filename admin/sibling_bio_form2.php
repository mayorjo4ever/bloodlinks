		
	 	<div class="col-md-12"  >		
			
			

			<div class="form-group" id="fm5" style="border:5px thin #000;">
			  <label class="bold text-info">  Gender </label>  
			  <div class="input-group border-1" title="Gender">
				<select class="form-control" style="font-size:16px; height:40px;" name="gender" id="gender">
				   <option value=""> ...  </option>
				   <option value="Male" <?php echo ($_SESSION['gender']=="Male")?"selected":""; ?>> Male </option>
				   <option value="Female" <?php echo ($_SESSION['gender']=="Female")?"selected":""; ?>> Female </option>
				</select>						
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-male text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="genderMsg"> </span>
			</div> <!-- ./  form-group -->
			
			<div class="form-group" id="fm20" style="border:5px thin #000;">
			  <label class="bold text-info">  date of birth </label> 
			  <div class="input-group border-1" title="sibling date of birth">
				<input style="font-size:16px; height:40px;" autocomplete="false" type="text" id="sib_dob" name="sib_dob"  value="<?php echo $_SESSION['sib_dob']; ?>"  class="form-control datepicker" placeholder=" Date of Birth  ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="sib_dobMsg"> </span>
			</div> <!-- ./  form-group -->

			
			<div class="form-group" id="fm6" style="border:5px thin #000;">
			  <label class="bold text-info">  Phone Number </label> 
			  <div class="input-group border-1" title="Phone Number"> 
				<input style="font-size:16px; height:40px;"  autocomplete="false" type="text" id="phone" name="phone"  value="<?php echo $_SESSION['phone']; ?>"  class="form-control" placeholder="e.g 07030000000 ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-phone text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="phoneMsg"> </span>
			</div> <!-- ./  form-group -->
		
		 
		 
		  </div>  <!--./ col-md-12  -->
		  
		  
		  