		
	 	<div class="col-md-12"  > 
		 
			
		
		<div class="form-group" id="fm2" style="border:5px thin #000;">
			  <label class="bold text-info"> Date of Birth </label> 
			  <div class="input-group border-1" title="Date of Birth">
				<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="dob" name="dob"   value="<?php echo $_SESSION['dob']; ?>"  class="form-control newdatepicker" placeholder="e.g 1986/10/26 ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:45px;">
					<i class="fa fa-calendar text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="dobMsg"> </span>
			</div> <!-- ./  form-group -->
			
		
		<div class="form-group" id="fm6" style="border:5px thin #000;">
			  <label class="bold text-info">  Phone Number </label> 
			  <div class="input-group border-1" title="Phone Number"> 
				<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="phone" name="phone"   value="<?php echo $_SESSION['phone']; ?>"  class="form-control" placeholder="e.g 07030000000 ">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:45px;">
					<i class="fa fa-phone text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="phoneMsg"> </span>
			</div> <!-- ./  form-group -->	
		
		<div class="form-group" id="fm7" style="border:5px thin #000;">
		  <label class="bold text-info">  State of Origin </label> 
		  <div class="input-group border-1" title="State of Origin">  
			<select class="form-control" style="font-size:16px; height:45px;"  id="mystate" name="mystate">
			   <option value="">...</option>
			</select> 
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-map-marker text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="mystateMsg"> </span>
		</div> <!-- ./  form-group -->
		
		<div class="form-group" id="fm8" style="border:5px thin #000;">
		  <label class="bold text-info">  L.G.A </label> 
		  <div class="input-group border-1" title="Local Govt. Area"> 
			<select class="form-control" style="font-size:16px; height:45px;" id="mylga" name="mylga">
			   <option value="">...</option>
			</select>
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-map-marker text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="mylgaMsg"> </span>
		</div> <!-- ./  form-group -->
			
		  <div class="form-group" id="fm3" style="border:5px thin #000;">
		  <label class="bold text-info">  Contact Address </label> 
		  <div class="input-group border-1" title=" Contact Address"> 
			<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="address" name="address"  value="<?php echo $_SESSION['address']; ?>" class="form-control" placeholder=" Contact Address / Unit">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-pencil text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="addressMsg"> </span>
		</div> <!-- ./  form-group -->
		 
		 <!-- 
		<div class="form-group" id="pic_scan"> <input type="hidden" name="temp_img_dir" id="temp_img_dir" value="<?php echo $_SESSION['temp_img']; ?>" />
			 <label class="bold text-info"> Passport </label> <center>
				<div class="" id="my_camera" style="margin:0px 1px; width:120px; height:120px;"></div>				 
				<button class="btn btn-sm" onclick="javascript:void(take_snapshot())">  <i class="fa fa-camera icon-lg"></i> take picture </button>				  
			</center>	 
		</div>
		 
		<div class="form-group" id="pic_result">
			 <label class="bold text-info"> Passport </label>  				 				  
				<div class="" title="<?php echo $_SESSION['temp_img']; ?>" id="my_result" style="margin:0px 1px; width:120px; height:120px;  ">
				<img src="<?php echo "images/users/".$_SESSION['temp_img']; ?>"> 
				</div>
				<span class="scan_report"> </span>
				<button class="btn btn-sm rescan"> <i class="fa fa-reply"> </i>  rescan  </button>
		</div>
		-->
		 </div>  <!--./ col-md-12  -->
		  
		  
		  