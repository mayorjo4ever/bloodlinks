
 <div class="row">				
			  
	 <div class="col-md-1 float-left ">  &nbsp;</div>
	 <div class="col-md-8 float-left "> 
		<div class="card border border-primary"> 
		<div class="card-body"> 
			<form method="post">
				<div class="row"> 
				<?php 	$sys_info = $dbm->resort($dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'))); ?>
					<div class="col-md-12 text-capitalize" style="float:left;">						
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> Name  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_name" name="sys_name" value="<?php echo $sys_info['name']; ?>" class="form-control border-primary newuserform" placeholder="Name"> 
									<div class="input-group-append"><span class="  input-group-text border border-primary"><i class="  mdi mdi-settings"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 -->
						  </div> <!-- ./ form-group -->

						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> short name  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_shortname" name="sys_shortname" value="<?php echo $sys_info['shortcut']; ?>" class="form-control border-primary newuserform" placeholder="Short Name"> 
									<div class="input-group-append"><span class="  input-group-text border border-primary"><i class="  mdi mdi-settings"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
						  
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> theme  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_theme" name="sys_theme" value="<?php echo $sys_info['theme']; ?>" class="form-control border-primary newuserform" placeholder="Theme"> 
									<div class="input-group-append"><span class="  input-group-text border border-primary"><i class=" fa fa-cog"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
						  
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> icon code  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_icon" name="sys_icon" value="<?php echo $sys_info['fa_icon']; ?>" class="form-control border-primary newuserform" placeholder="Icon Code"> 
									<div class="input-group-append"><span class="  input-group-text border border-primary"><i class=" fa fa-image"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->						  
						   
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> email  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_email" name="sys_email" value="<?php echo $sys_info['email']; ?>" class="form-control border-primary newuserform" placeholder="Email"> 
									<div class="input-group-append"><span class="  input-group-text border border-primary"><i class=" fa fa-envelope"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
						    
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> phone  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_phone" name="sys_phone" value="<?php echo $sys_info['phone']; ?>" class="form-control border-primary newuserform" placeholder="Phone"> 
									<div class="input-group-append"><span class=" input-group-text border border-primary"><i class=" fa fa-phone"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
						     
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> address  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_address" name="sys_address" value="<?php echo $sys_info['address']; ?>" class="form-control border-primary newuserform" placeholder="Address"> 
									<div class="input-group-append"><span class="address input-group-text border border-primary"><i class=" fa fa-map-marker"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
						     
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> Manager's Profile  <span class="text-danger bold">*</span> </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="sys_manager" name="sys_manager" value="<?php echo $sys_info['manager']; ?>" class="form-control border-primary newuserform" placeholder="Manager's Profile"> 
									<div class="input-group-append"><span class="address input-group-text border border-primary"><i class=" fa fa-certificate"></i></span> </div> 
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
						  
						   
					
					<div class="col-md-12" style="float:left;">
					 <div class="form-group row selection">
							 <button mode="new" for="new" type="button" class="btn btn-info btn-lg btn-rounded btn-block ladda-button creators" data-style="zoom-in" name="save_system_info" id="save_system_info"> Save Settings &nbsp; <i class="fa fa-save"> </i>  </button>
					 </div>
					</div>
				
				</div> 
			 
			</form>
			</div>		
		</div>		
	</div>  <!-- ./ col-md-6 -->	
</div> <!-- ./ row -->
</div> <!-- ./ row -->

		
		