		
	
					
		<div class="col-md-12">		
		<div class="form-group" id="fm6" style="border:5px thin #000;">
			  <label class="bold text-info">  Title  </label> 
			  <div class="input-group border-1" title="Rank "> 
				<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="title" name="title"   value="<?php echo $_SESSION['title']; ?>"  class="form-control" placeholder="e.g.  Mr../ Mrs../ Dr..  ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:45px;">
					<i class="fa fa-phone text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="titleMsg"> </span>
			</div> <!-- ./  form-group -->
		
		<div class="form-group" id="fm1" style="border:5px thin #000;">
		  <label class="bold text-info">  Surname </label> 
		  <div class="input-group border-1" title="Surname">
			<input style="font-size:16px; height:45px; " autocomplete="false" type="text" id="surname" name="surname"  value="<?php echo $_SESSION['surname']; ?>" class="form-control" placeholder="Surname">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-pencil  text-black"></i>
			  </span>
			</div>
		  </div>
		   <span class="surnameMsg"> </span>
		  </div> <!--./ form-group  -->
		  
		   <div class="form-group" id="fm2" style="border:5px thin #000;">
			  <label class="bold text-info">  First Name </label> 
			  <div class="input-group border-1" title="First Name">
				<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="firstname" name="firstname"  value="<?php echo $_SESSION['firstname']; ?>"  class="form-control" placeholder="First Name ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:45px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="firstnameMsg"> </span>
			</div> <!-- ./  form-group -->
		  
		  <div class="form-group" id="fm3" style="border:5px thin #000;">
			  <label class="bold text-info">  Other Name </label> 
			  <div class="input-group border-1" title="Other Name"> 
				<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="othername" name="othername"  value="<?php echo $_SESSION['othername']; ?>" class="form-control" placeholder="Other Name ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:45px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="othernameMsg"> </span>
			</div> <!-- ./  form-group -->
		
			
			<div class="form-group" id="fm5" style="border:5px thin #000;">
			  <label class="bold text-info">  Gender </label>  
			  <div class="input-group border-1" title="Gender">
				<select class="form-control" style="font-size:16px; height:45px;" name="gender" id="gender">
				   <option value=""> ...  </option>
				   <option value="Male" <?php echo ($_SESSION['gender']=="Male")?"selected":""; ?>> Male </option>
				   <option value="Female" <?php echo ($_SESSION['gender']=="Female")?"selected":""; ?>> Female </option>
				</select>						
				<div class="input-group-append">
				  <span class="input-group-text" style="height:45px;">
					<i class="fa fa-male text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="genderMsg"> </span>
			</div> <!-- ./  form-group -->
			 
			
		  </div>  <!--./ col-md-12  -->
		  
		  