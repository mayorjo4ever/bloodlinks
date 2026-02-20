				<div class="profile-body">
                      <ul class="nav tab-switch" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="myprofile-tab" data-toggle="pill" href="#myprofile" role="tab" aria-controls="myprofile" aria-selected="true"> Bio-data</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="hospital-info-tab" data-toggle="pill" href="#hospital-info" role="tab" aria-controls="hospital-info" aria-selected="false">Hospital Info </a>
                        </li>

						<li class="nav-item">
                          <a class="nav-link" id="nok-tab" data-toggle="pill" href="#nok" role="tab" aria-controls="nok" aria-selected="false">Next of Kin</a>
                        </li>
						
						<li class="nav-item">
                          <a class="nav-link" id="pass-port-tab" data-toggle="pill" href="#pass-port" role="tab" aria-controls="nok" aria-selected="false">Passport </a>
                        </li>
                      </ul>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="tab-content tab-body" id="profile-log-switch">
                            <div class="tab-pane fade show active pr-3" id="myprofile" role="tabpanel" aria-labelledby="pass-port-tab">
                              
							  <div class="col-md-6" style="float-left">
							<div class="form-group" id="fm1" style="border:5px thin #000;">
							  <label class="bold text-info">  Surname </label> 
							  <div class="input-group border-1" title="Surname">
								<input style="font-size:16px; height:40px; " autocomplete="false" type="text" id="surname" name="surname"  value="<?php echo $_SESSION['surname']; ?>" class="form-control" placeholder="Surname">
								<div class="input-group-append">
								  <span class="input-group-text" style="height:40px;">
									<i class="fa fa-pencil  text-black"></i>
								  </span>
								</div>
							  </div>
							   <span class="surnameMsg"> </span>
							  </div> <!--./ form-group  -->
							  
				 <div class="form-group" id="fm2" style="border:5px thin #000;">
			  <label class="bold text-info">  First Name </label> 
			  <div class="input-group border-1" title="First Name">
				<input style="font-size:16px; height:40px;" autocomplete="false" type="text" id="firstname" name="firstname"  value="<?php echo $_SESSION['firstname']; ?>"  class="form-control" placeholder="First Name ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="firstnameMsg"> </span>
			</div> <!-- ./  form-group -->
		  
		  <div class="form-group" id="fm3" style="border:5px thin #000;">
			  <label class="bold text-info">  Other Name </label> 
			  <div class="input-group border-1" title="Other Name"> 
				<input style="font-size:16px; height:40px;"  autocomplete="false" type="text" id="othername" name="othername"  value="<?php echo $_SESSION['othername']; ?>" class="form-control" placeholder="Other Name ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="othernameMsg"> </span>
			</div> <!-- ./  form-group -->
		
				
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
				</div> <!-- ./  col-md5
				-->
				</div> <!-- ./  form-group -->
				 
				<div class="form-group" id="fm2" style="border:5px thin #000;">
			  <label class="bold text-info"> Date of Birth </label> 
			  <div class="input-group border-1" title="Date of Birth">
				<input style="font-size:16px; height:40px;" autocomplete="false" type="text" id="dob" name="dob"   value="<?php echo $_SESSION['dob']; ?>"  class="form-control datepicker" placeholder="e.g 1986/10/26 ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-calendar text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="dobMsg"> </span>
			</div> <!-- ./  form-group -->
			</div> <!-- col-md-6  --> 
			
			<div class="col-md-6" style="float-left">
			<div class="form-group" id="fm6" style="border:5px thin #000;">
			  <label class="bold text-info">  Phone Number </label> 
			  <div class="input-group border-1" title="Phone Number"> 
				<input style="font-size:16px; height:40px;"  autocomplete="false" type="text" id="phone" name="phone"   value="<?php echo $_SESSION['phone']; ?>"  class="form-control" placeholder="e.g 07030000000 ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-phone text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="phoneMsg"> </span>
			</div> <!-- ./  form-group -->
		
		<div class="form-group" id="fm7" style="border:5px thin #000;">
		  <label class="bold text-info">  State of Origin </label> 
		  <div class="input-group border-1" title="State of Origin">  
			<select class="form-control" style="font-size:16px; height:40px;"  id="mystate" name="mystate">
			   <option value="">...</option>
			</select> 
			<div class="input-group-append">
			  <span class="input-group-text" style="height:40px;">
				<i class="fa fa-map-marker text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="mystateMsg"> </span>
		</div> <!-- ./  form-group -->
		
		<div class="form-group" id="fm8" style="border:5px thin #000;">
		  <label class="bold text-info">  L.G.A </label> 
		  <div class="input-group border-1" title="Local Govt. Area"> 
			<select class="form-control" style="font-size:16px; height:40px;" id="mylga" name="mylga">
			   <option value="">...</option>
			</select>
			<div class="input-group-append">
			  <span class="input-group-text" style="height:40px;">
				<i class="fa fa-map-marker text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="mylgaMsg"> </span>
		</div> <!-- ./  form-group -->
	</div> <!-- col-md-6  --> 	
		 

		 <div class="tab-pane fade" id="hospital-info" role="tabpanel" aria-labelledby="hospital-info-tab">
				  
				 <div class="col-md-6">
					
				 </div>
					  
				</div> 
				
				<div class="tab-pane fade" id="nok" role="tabpanel" aria-labelledby="nok-tab">
					
						upload nok  
				</div>
				
				<div class="tab-pane fade" id="pass-port" role="tabpanel" aria-labelledby="pass-port-tab">
					
						pssport pane
				</div>
			  </div>
			</div>
			 
		  </div>
		</div>