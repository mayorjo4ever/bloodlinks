
		<div class="col-md-12"  >		
		<div class="form-group" id="fm5" style="border:5px thin #000;">
		  <label class="bold text-info">  Patient Category </label>  
		  <div class="input-group border-1" title="Patient Category">
			<select class="form-control" style="font-size:16px; height:45px;"  id="pcategory" name="pcategory">
			   <option value=""> ...  </option>			    
			</select>						
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-male text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="pcategoryMsg"> </span>
		</div> <!-- ./  form-group -->
		
		<div class="form-group" id="fm9" style="border:5px thin #000;">
		  <label class="bold text-info">  Hospital Number </label> 
		  <div class="input-group border-1" title="Hospital ID">
			<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="hosp_no" name="hosp_no" value="<?php echo $_SESSION['hosp_no']; ?>"  class="form-control" placeholder=".... .... ">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-map-marker text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="hosp_noMsg"> </span>
		</div> <!-- ./  form-group -->
		<!-- ./ 
		<div class="form-group" id="mil_tag" style="border:5px thin #000;">
		  <label class="bold text-info">  Military Number </label> 
		  <div class="input-group border-1" title="Military ID">
			<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="military_no" name="military_no" value="<?php echo $_SESSION['military_no']; ?>"  class="form-control" placeholder=".... .... ">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-map-marker text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="military_noMsg"> </span>
		</div>   form-group -->
		 
		<div class="form-group" id="fm3" style="border:5px thin #000;">
		  <label class="bold text-info"> Name of Next of Kin </label> 
		  <div class="input-group border-1" title="  Name of Next of Kin"> 
			<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="nokName" name="nokName"  value="<?php echo $_SESSION['nokName']; ?>" class="form-control" placeholder="NOK Name.">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-pencil text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="nokNameMsg"> </span>
		</div> <!-- ./  form-group -->
		
		 <div class="form-group" id="fm3" style="border:5px thin #000;">
		  <label class="bold text-info"> Next of Kin Relationship </label> 
		  <div class="input-group border-1" title="Next of Kin Relationship "> 
			<input style="font-size:16px; height:45px;" title="<?php echo $_SESSION['nokRelation'] ; ?>" autocomplete="false" type="text" id="nokRelation" name="nokRelation"  value="<?php echo $_SESSION['nokRelation']; ?>" class="form-control" placeholder="NOK Relationship.">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-pencil text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="nokRelationMsg"> </span>
		</div> <!-- ./  form-group -->
		
		 <div class="form-group" id="fm3" style="border:5px thin #000;">
		  <label class="bold text-info"> Next of Kin Phone No. </label> 
		  <div class="input-group border-1" title="Next of Kin Relationship "> 
			<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="nokPhone" name="nokPhone"  value="<?php echo $_SESSION['nokPhone']; ?>" class="form-control" placeholder="NOK Relationship.">
			<div class="input-group-append">
			  <span class="input-group-text" style="height:45px;">
				<i class="fa fa-pencil text-black"></i>
			  </span>
			</div>
		  </div>
		  <span class="nokPhoneMsg"> </span>
		</div> <!-- ./  form-group -->
		
		<!-- 
		<div class="form-group text-center" >
			<div id="image_preview"> 
					<a href="#" class="alt_itemImage"> 
						<img id="previewing" src="<?php echo file_exists($_SESSION['tmp_image_path'])?$_SESSION['tmp_image_path']: "../images/default-user.png"; ?>" class="alt_itemImage img-circled img-responsive img-raised" style="height:120px;" /> 
						browse
					</a>
				</div>
				
				<input name= "itemImage" id="itemImage" type="file" accept="image/*" 
					class="form-control itemImage" /> 
				 
		</div> <!-- ./  form-group -->
		
		<!--  <div class="form-group">
		  <div class="form-check">
			<label class="form-check-label bold">
			  <input id="pix_option" value="yes" name="pix_option" type="checkbox" class="form-check-input border-1" checked> Attach Passports
			</label>
		  </div>
		</div> <!-- ./  form-group -->
		
		</div>