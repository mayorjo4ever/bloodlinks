		
	
					
		<div class="col-md-12 text-capitalize">		
		<div class="form-group" id="fm20" style="border:5px thin #000;">
		 <label class="bold text-info">  sibling type </label> 
		  <div class="input-group border-1" title="Select Sibling Type">  
			<select class="form-control" style="font-size:16px; height:40px;" name="sib_type"  id="sib_type">
			  <option value=""> ... </option>
			</select>
			
			<div class="input-group-append">
			  <span class="input-group-text" style="height:40px;">
				<i class="fa fa-user text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="sib_typeMsg"> </span>
		</div> <!-- ./  form-group -->
								
		<div class="form-group" id="fm20" style="border:5px thin #000;">
			  <label class="bold text-info">  sibling surname </label> 
			  <div class="input-group border-1" title="Patient category">
				<input style="font-size:16px; height:40px;" autocomplete="false"   value="<?php echo $_SESSION['surname']; ?>"  type="text" id="sib_surname" name="sib_surname"  class="form-control" placeholder="Surname">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="sib_surnameMsg"> </span>
			</div> <!-- ./  form-group -->
			
			<div class="form-group" id="fm20" style="border:5px thin #000;">
			  <label class="bold text-info">  sibling firstname </label> 
			  <div class="input-group border-1" title="Patient category">
				<input style="font-size:16px; height:40px;" autocomplete="false"  value="<?php echo $_SESSION['firstname']; ?>" type="text" id="sib_firstname" name="sib_firstname"  class="form-control" placeholder="First Name">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="sib_firstnameMsg"> </span>
			</div> <!-- ./  form-group -->
			
			<div class="form-group" id="fm20" style="border:5px thin #000;">
			  <label class="bold text-info">  sibling othername  </label> 
			  <div class="input-group border-1" title="Othername ">
				<input style="font-size:16px; height:40px;" autocomplete="false"  value="<?php echo $_SESSION['othername']; ?>" type="text" id="sib_othername" name="sib_othername"  class="form-control" placeholder="Othername ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-pencil text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="sib_othernameMsg"> </span>
			</div> <!-- ./  form-group -->
		
			
			
			
		  </div>  <!--./ col-md-12  -->
		  
		  