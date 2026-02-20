<!-- Modal -->
<!-- Modal -->
		<div style="z-index:-999px" class="modal fade" id="progChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> Add new category of patients  &nbsp; <i class="fa fa-user-plus"> </i> </h4>         
			  </div>
				
					  <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<form method = "post">
						<span class="bold font-16 text-danger">  </span> <br/> 
							 
							<div class="col-md-12" style="height:100px; float:left; " >
									 <div class="form-group" id="fm20">
									  <label class="bold text-info">  Patient category </label> 
									  <div class="input-group " title="Patient category">
										<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="category" name="category"  class="form-control border border-primary input-l" placeholder="eg: Military, or Civilian   ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-pencil text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="categoryMsg"> </span>
									</div> <!-- ./  form-group -->
									</div> <!-- ./  col-md-4-->				  
								
								</form>
							  </div> <!-- ./ modal body -->
							   
							  <div class="modal-footer">
								<center>
								<button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
								<button type="button" class="btn btn-primary btn-rounded ladda-button" data-style="expand-right" name="newPCategory" id="newPCategory"> Save Category &nbsp; <i class="fa fa-save"> </i>  </button>
								</center>
								<p>&nbsp;</p><center>  
							  </div>  <!-- ./ modal-footer -->
							  
							  <!-- ***************************************	-->
							  
							   <div class="modal-header">
								<h4 class="modal-title bold text-info text-center text-capitalize"> 
								 <i class="fa fa-list"> </i> &nbsp; &nbsp; All available categories   </h4>         
							  </div>
							  
							   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
									<div class="table" id="cat_view">  
										 
								   </div>  <!-- ./ div-table -->
							   </div> <!-- ./ modal-body -->
							</div><!-- ./ modal-content -->
						  </div>
		</div> 
	<!-- *********************************************************************************** -->	 
	
	<!-- Modal -->
		<div style="z-index:-999px" class="modal fade" id="newSibModal" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> Add new type of siblings  &nbsp; <i class="fa fa-user-plus"> </i> </h4>         
			  </div>
				
					  <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<form method = "post">
						<span class="bold font-16 text-danger">  </span> <br/> 
							
							<div class="col-md-1" style="float:left; " > </div>
							 
							<div class="col-md-9" style="height:100px; float:left; " >
									 <div class="form-group" id="fm20">
									  <label class="bold text-info">  Sibling Type </label>  
									  <div class="input-group " title="Sibling Type">
										<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="sib_type_form" name="sib_type_form"  class="form-control border border-primary input-l" placeholder="eg: Spouse, First Child, etc   ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-pencil text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="sib_type_formMsg"> </span>
									</div> <!-- ./  form-group -->
									</div> <!-- ./  col-md-4-->				  
								
								</form>
							  </div> <!-- ./ modal body -->
							   
							  <div class="modal-footer">
								<center>
								<button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
								<button type="button" class="btn btn-primary btn-rounded ladda-button" data-style="expand-right" name="newSibType" id="newSibType"> Save Category &nbsp; <i class="fa fa-save"> </i>  </button>
								</center>
								<p>&nbsp;</p><center>  
							  </div>  <!-- ./ modal-footer -->
							  
							  <!-- ***************************************	-->
							  
							   <div class="modal-header">
								<h4 class="modal-title bold text-info text-center text-capitalize"> 
								 <i class="fa fa-list"> </i> &nbsp; &nbsp; All sibling types   </h4>         
							  </div>
							  
							   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
									<div class="table" id="sib_view">  
										 
								   </div>  <!-- ./ div-table -->
							   </div> <!-- ./ modal-body -->
							</div><!-- ./ modal-content -->
						  </div>
		</div>
 
	<!-- modal - 3 - for siblings  -->  
	<!--  modal 3 addSiblings -->
	<!-- Modal -->
	<div style="z-index: -3080px;" class="modal fade" id="addSiblings" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered-" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<center> <h4 class="modal-title bold text-info text-capitalize">   Add Siblings  &nbsp; <i class="fa fa-user-plus"> </i> </h4>  </center> 
		  </div>
			
				  <div class="modal-body text-capitalize" style="margin-top:0px; padding-top:0px; min-height:auto;">
					<div class="card">
					<div class="card-body">
					<form method = "post">				
						<div class="col-md-1" style="float:left; "> 	</div>
							
							<div class="col-md-9" style="  float:left; " >
								 
								 <div class="form-group" id="fm20">
								  
								  <span class="form-control border border-primary input-l font-16 bold "> <i class="red"> for: &nbsp; </i> <span class="client_name"> Ojo isaac Mayowa &nbsp; </span>  <i class="red">  <span class="client_id"> ( 1169 ) </span> &nbsp; </i>   </span>
								   
								</div> <!-- ./  form-group -->
								
								<div class="form-group" id="fm20">
								 <label class="bold text-info">  sibling type </label> 
								  <div class="input-group " title="State of Origin">  
									<select class="form-control border border-primary input-l" style="font-size:16px; height:45px;"  id="sib_type">
									   <option value="">...</option>
									</select>
									
									<div class="input-group-append">
									  <span class="input-group-text border border-primary input-l" style="height:45px;">
										<i class="fa fa-user text-black"></i>
									  </span>
									</div>
								  </div>
								  <span class="sib_typeMsg"> </span>
								</div> <!-- ./  form-group -->
								
								<div class="form-group" id="fm20">
								  <label class="bold text-info">  sibling surname </label> 
								  <div class="input-group " title="Sibling Surname">
									<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="sib_surname" name="sib_surname"  class="form-control border border-primary input-l" placeholder="Surname">
									<div class="input-group-append">
									  <span class="input-group-text border border-primary input-l" style="height:45px;">
										<i class="fa fa-pencil text-black"></i>
									  </span>
									</div>
								  </div>
								  <span class="sib_surnameMsg"> </span>
								</div> <!-- ./  form-group -->
								
								<div class="form-group" id="fm20">
								  <label class="bold text-info">  sibling firstname </label> 
								  <div class="input-group " title="Patient category">
									<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="sib_firstname" name="sib_firstname"  class="form-control border border-primary input-l" placeholder="First Name">
									<div class="input-group-append">
									  <span class="input-group-text border border-primary input-l" style="height:45px;">
										<i class="fa fa-pencil text-black"></i>
									  </span>
									</div>
								  </div>
								  <span class="sib_firstnameMsg"> </span>
								</div> <!-- ./  form-group -->
								
								<div class="form-group" id="fm20">
								  <label class="bold text-info">  sibling othername  </label> 
								  <div class="input-group " title="Patient category">
									<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="sib_othername" name="sib_othername"  class="form-control border border-primary input-l" placeholder="Othername ">
									<div class="input-group-append">
									  <span class="input-group-text border border-primary input-l" style="height:45px;">
										<i class="fa fa-pencil text-black"></i>
									  </span>
									</div>
								  </div>
								  <span class="sib_othernameMsg"> </span>
								</div> <!-- ./  form-group -->
								
								<div class="form-group" id="fm20">
								  <label class="bold text-info">  date of birth </label> 
								  <div class="input-group " title="sibling date of birth">
									<input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="sib_dob" name="sib_dob"  class="form-control border border-primary input-l newdatepicker" placeholder=" Date of Birth  ">
									<div class="input-group-append">
									  <span class="input-group-text border border-primary input-l" style="height:45px;">
										<i class="fa fa-pencil text-black"></i>
									  </span>
									</div>
								  </div>
								  <span class="sib_dobMsg"> </span>
								</div> <!-- ./  form-group -->
								
							</div> <!-- ./  col-md-9-->				  
							
							</form>
						  </div> <!-- ./ card body -->
						  </div> <!-- ./ card   -->
						  </div> <!-- ./ modal body -->
						   
						  <div class="modal-footer">
							<center>
							<button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
							<button type="button" class="btn btn-primary btn-rounded ladda-button" data-style="expand-right" name="newSibling" id="newSibling"> Add Sibling &nbsp; <i class="fa fa-save"> </i>  </button>
							</center>
							<p>&nbsp;</p><center>  
						  </div>  <!-- ./ modal-footer -->
						  
						  <!-- ********* ******************************	-->
						  
						   <div class="modal-header">
							<h4 class="modal-title bold text-info text-center text-capitalize"> 
							 <i class="fa fa-users"> </i> &nbsp; &nbsp; all siblings   </h4>         
						  </div>
						  
						   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
								<div class="table" id="sib_view2">  
									 
							   </div>  <!-- ./ div-table -->
						   </div> <!-- ./ modal-body -->
						</div><!-- ./ modal-content -->
					  </div>
	</div> 
					
<!-- modal - 4 - for siblings  -->  
		<div style="z-index:-999px" class="modal fade" id="displaySiblings" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> All my siblings  &nbsp; <i class="fa fa-user-plus"> </i> </h4>         
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="card">
							<div class="card-body">
								<div class="table" id="sib_view3">  
							 
								</div>  <!-- ./ div-table -->
							</div> <!-- ./ card body -->
						</div> <!-- ./ card -->
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer">
					<center> 
					<button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" > OK   </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer -->
				  
							  
				</div><!-- ./ modal-content -->
			  </div>
		</div>

	
						
<!-- modal - 5 - for scheduling doctor for patient  -->  
		<div style="z-index:-999px" class="modal fade" id="schedulePatientDoctor" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-stethoscope"> </i> &nbsp;&nbsp; schedule a medical doctor for our patient </h4>         
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-male "></i>  &nbsp;  &nbsp; patient infomation  </p>
								   <table class="table table-striped text-capitalize">
										<tr>
											<th> status </th> 
											<th> <span class="patient_status text-uppercase"> </span> </th> 
										</tr>
										
										<tr>
											<th> name </th> 
											<th> <span class="patient_name"> </span> </th> 
										</tr>
										
										<tr>
											<th> hospital number. </th> 
											<th> <span class="patient_no"> </span>  </th> 
										</tr>
										
										<tr>
											<th> age. </th> 
											<th> <span class="patient_age"> </span>  </th> 
										</tr>
										
										<tr>
											<th> last visitation day. </th> 
											<th>  <span class="patient_last_visit"> </span> </th> 
										</tr>
										
										<tr>
											<th> already on schedule </th> 
											<th>  <span class=" badge badge-primary font-22 patient_on_schedule"> </span> </th> 
										</tr>
										
										<tr class="text-success text-uppercase">
											<th colspan="2"> my tickets  </th>  
										</tr>
										 <!-- display all scheduled ticket for doctor -->
										<tr class="">
											<td colspan="2">
												<div class="mytickets"> </div>
											</td>
										</tr>
								   </table>
									  
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-7 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-stethoscope "></i>  &nbsp;  &nbsp; available doctors   </p>
									 <div class="avail_docs">

									 </div>
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer">
					<center> 
					<button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" > OK   </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer -->
				  
							  
				</div><!-- ./ modal-content -->
			  </div>
		</div>
	
	<!-- Modal 6 for creating new doctor conversation form  -->
		<div style="z-index:-999px" class="modal fade" id="newConverseType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> Add New Conversation Type  &nbsp; &nbsp; <i class="fa fa-comment"> </i> </h4>         
			  </div> 
					  <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body">
						
								<form method = "post">
								<span class="bold font-16 text-danger">  </span> <br/> 
									 
									<div class="col-md-12" style="height:100px; float:left; " >
											 <div class="form-group" id="fm20">
											  <label class="bold text-info"> &nbsp; <i class="fa fa-comment"> </i> &nbsp;&nbsp; Conversation Type </label> 
									  <div class="input-group " title="Conversation Type ">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="converseType" name="converseType"  class="form-control border border-primary input-l" placeholder="eg:  Patient Complaints, Medical Treatment ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-pencil text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="converseTypeMsg"> </span>
									</div> <!-- ./  form-group -->
									</div> <!-- ./  col-md-4-->				  
								
								</form>
							  </div>  <!-- ./  card-body --> 
							  
							  </div> 
							  </div> 
							  </div> 
							  </div> 
							  
							  <!-- ./ modal body -->
							   
							  <div class="modal-footer">
								<center>
								<button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
								<button type="button" class="btn btn-primary btn-rounded ladda-button" data-style="expand-right" name="saveConverseType" id="saveConverseType"> Save Conversation Type &nbsp; <i class="fa fa-save"> </i>  </button>
								</center>
								<p>&nbsp;</p><center>  
							  </div>  <!-- ./ modal-footer -->
							  
							  <!-- ***************************************	-->
							  
							   <div class="modal-header">
								<h4 class="modal-title bold text-info text-center text-capitalize"> 
								 <i class="fa fa-comment"> </i> &nbsp; &nbsp; all available types   </h4>         
							  </div>
							  
							   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
									<div class="row">
										<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
										  <div class="card">               
											<div class="card-body">
									<div class="table" id="converse_view">  
										 
								   </div>  <!-- ./ div-table -->
								   </div>  <!-- ./ div-table -->
								   </div>  <!-- ./ div-table -->
								   </div>  <!-- ./ div-table -->
								   </div>  <!-- ./ div-table -->
							   </div> <!-- ./ modal-body -->
							</div><!-- ./ modal-content -->
						  </div>
		</div> 
	<!-- *********************************************************************************** -->	 
							
<!-- modal - 6 - for sending message to other agent pple  -->  
		<div style="z-index:-999px" class="modal fade" id="messageTransferMedium" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-stethoscope"> </i> &nbsp;&nbsp; schedule task for another specialist </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-male "></i>  &nbsp;  &nbsp; select specialist role  </p>
								   <table class="table table-striped text-capitalize">
									   <input type="hidden" name="from_user_id" id="from_user_id" for="<?php echo $_SESSION['admUser']; ?>" />
									   <input type="hidden" name="from_role_id" id="from_role_id" for="<?php echo $_SESSION['my_cur_role_id']; ?>" />
									   <input type="hidden" name="cur_ticket_no" id="cur_ticket_no" for="" />
									   <input type="hidden" name="cur_com_msg" id="cur_com_msg" data-text="" />
									   <input type="hidden" name="fw_com_type" id="fw_com_type" for="" />
									   <?php				
										$roles = $dbm->getFields($dbm->select('roles',array('status'=>'active'),array('name'),'and','asc'),array('name','id','sn'));
										
										if(!is_null($roles))
												{   $n=0; foreach($roles['name'] as $role){?>
										<tr>
											<th> <div class="form-group">
												<label class="label-control"> <input type="radio" class="role_type" value="<?php echo $roles['id'][$n]; ?>" name="role_type" id="role_type" /> &nbsp; <?php echo $role; ?> </label>
												</div> 
											</th>  
										</tr>
										  <?php $n++; } ## end foreach  ?>															
												<?php } ## end not null 				
											?>
								   </table>
									  
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-7 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-stethoscope "></i>  &nbsp;  &nbsp; available specialist   </p>
									 <div class="avail_specs">

									 </div>
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer">
					<center> 
					<button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" > OK   </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div>
	
 
		
	
<!-- modal - 9 - for updating bill cost   -->  
		<div style="z-index:-999px" class="modal fade" id="billCostModalForm" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-stethoscope"> </i> &nbsp;&nbsp; Account Management Form </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-8 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; schedule prices for : &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-play text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p>
								     <div class="display_bill_form">

									 </div>  
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								  <div class="form-group" style="padding-top:30px; margin-top:30px; ">
									<button class="btn btn-rounded btn-lg btn-success"> UPDATE  BILL &nbsp; <i class="fa fa-save"> </i> </button> 
								  </div>
									
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer">
					<center> 
					<button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" > Close   </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div>
		
	<!-- pharm_payment -->
	
<!-- modal - 10- for creating patient payment receipts   -->  
		<div style="z-index:-999px" class="modal fade" id="createPatientBill" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-stethoscope"> </i> &nbsp;&nbsp; Create New Receipt For Patient </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body text-capitalize"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-user "></i>  &nbsp;  &nbsp; Patient Information: &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-angle-double-down text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p>
								    <table class="table">
										<tr><th> name </th> <td> <span class="pt_name"> </span> </td>  </tr>
										<tr><th> Category </th> <td> <span class="pt_categ"> </span> </td>  </tr> 
										<tr><th> Hospital Id </th> <td>  <span class="pt_hsp_id"> </span> </td>  </tr>
										<!-- <tr><th> Military Id </th> <td>   <span class="pt_mil_id"> </span></td>  </tr>  --> 
										<tr><th> Type </th> <td>  <span class="pt_type"> </span></td>  </tr> 
									</table>
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-5 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; Prices: &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-angle-double-down text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p>
									
									<div class="form-group" id="fm20">
									  <label class="bold text-info text-capitalize"> &nbsp;  total fee </label> 
									  <div class="input-group " title="Total fee">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="total_fee" name="total_fee"  class="form-control border border-primary input-l" placeholder="Total Fee ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-money text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="total_feeMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm20">
									  <label class="bold text-info text-capitalize"> &nbsp;  amount paid </label> 
									  <div class="input-group " title="Amount Paid ">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="amount_paid" name="amount_paid"  class="form-control border border-primary input-l" placeholder="Amount Paid ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-money text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="amount_paidMsg"> </span>
									</div> <!-- ./  form-group -->
									 
									<div class="all_my_bills"> 
									
									</div>
									
								
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-5 --> 
							
							<div class="col-lg-3 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
									<p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-user "></i>  &nbsp;  &nbsp; Billing Types &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-angle-double-down text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p>
								  <div class="form-group" id="fm20">
									<label class="bold text-info text-capitalize"> Billing Types  </label> 
									<div class="input-group " title="State of Origin">  
									<select class="form-control border border-primary input-l" style="font-size:16px; height:45px;" onchange="console.log($(this).val())"  id="allBillType">
									   <option value="">...</option>
									</select>
									
									<div class="input-group-append">
									  <span class="input-group-text border border-primary input-l" style="height:45px;">
										<i class="fa fa-money text-black"></i>
									  </span>
									</div>
								  </div>
								  <span class="allBillTypeMsg"> </span>
								</div> <!-- ./  form-group --> 
								
								<div class="form-group">
									<button type="button" class="btn btn-primary btn-rounded ladda-button creators" data-style="expand-right" name="addPatientBillType" id="addPatientBillType"> Add Bill &nbsp; <i class="fa fa-plus"> </i>  </button>								
								</div>
								
								<p> &nbsp;  </p>
								  	
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-3 --> 
							
							
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer"> 
					 <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button>
					 <button type="button" class="btn btn-success btn-rounded ladda-button creators" data-style="expand-right" name="generate_patient_receipt" id="generate_patient_receipt"> Generate Receipt &nbsp; <i class="fa fa-money"> </i>  </button>								
					<p>&nbsp;</p>  
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div>
		
							
<!-- modal - 11 - for creating drug / products lists  -->  
		<div style="z-index:-999px" class="modal fade" id="productManager" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<div class="col-md-11">
				<h4 class="modal-title bold text-info text-capitalize"> &nbsp; <i class="fa fa-stethoscope"> </i> &nbsp;&nbsp; Manage Products Available in Stock  &nbsp;&nbsp;&nbsp;  <span class="loader"> </span>
				</h4>  </div>
				<div class="col-md-1">
					<div class="pull-right"> <button type="button" class="btn btn-danger btn-rounded btn-sm data-dismiss" data-dismiss="modal" > <i class="fa fa-times"> </i>  </button> </div>
				  </div>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body  font-16 text-capitalize"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-medkit "></i>  &nbsp;  &nbsp; product infomation  </p>
								    
									<div class="form-group" id="fm6">
									  <label class="bold text-info">  product name  &nbsp; <span class="text-danger bold font-18">*</span> </label> 
									  <div class="input-group " title="product name  "> 
										<input style="font-size:16px; "  autocomplete="false" type="text" id="product_name" name="product_name"   value="<?php echo $_SESSION['product_name']; ?>"  class="form-control border border-primary input-l border border-primary input-lg" placeholder="Product Name ">
										<div class="input-group-append">
										  
										</div>
									  </div>
									  <span class="product_nameMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> product code   </label> 
									  <div class="input-group " title="product code  "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_code" name="product_code"   value="<?php echo $_SESSION['product_code']; ?>"  class="form-control border border-primary input-l border border-primary input-l" placeholder="Product Code">
										<div class="input-group-append">
										   
										</div>
									  </div>
									  <span class="product_codeMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<!-- 
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> description   </label> 
									  <div class="input-group " title="product description  "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_desc" name="product_desc"   value="<?php echo $_SESSION['product_desc']; ?>"  class="form-control border border-primary input-l border border-primary input-l" placeholder="Product Description">
										<div class="input-group-append">
										   
										</div>
									  </div>
									  <span class="product_descMsg"> </span>
									</div> ./  form-group -->
									
									
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> barcode number  &nbsp; <span class="text-danger bold font-18">*</span>   </label> 
									  <div class="input-group " title="product description  "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_barcode" name="product_barcode"   value="<?php echo $_SESSION['product_barcode']; ?>"  class="form-control border border-primary input-l border border-primary input-l" placeholder="Enter Barcode / Scan ">
										<div class="input-group-append">
										  
										</div>
									  </div>
									  <span class="product_barcodeMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> Cost Price  </label> 
									  <div class="input-group " title="Cost Price "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_cp" name="product_cp"   value="<?php echo $_SESSION['product_cp']; ?>"  class="form-control border border-primary input-l border border-primary input-l only-numeric" placeholder="Cost Price">
										  </div>
									  <span class="product_cpMsg"> </span>
									</div> <!-- ./  form-group -->
									  
									  <div class="form-group" id="fm6">
									  <label class="bold text-info"> Selling Price  </label> 
									  <div class="input-group " title="Selling Price "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_sp" name="product_sp"   value="<?php echo $_SESSION['product_cp']; ?>"  class="form-control border border-primary input-l border border-primary input-l only-numeric" placeholder="Selling Price">
										  </div>
									  <span class="product_spMsg"> </span>
									</div> <!-- ./  form-group -->
									  
									
									  
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body font-16 text-capitalize"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-medkit "></i>  &nbsp;  &nbsp; product validity   </p>
									 <div class="input-group">
										<label class="label-control bold"> has expiry  </label>		 &nbsp;  &nbsp;  &nbsp; 											
											<div class="checkbox" style="200%">
											   <label for="has_expiry"> <input tabindex="7" type="radio" id="has_expiry" name="has_expiry" value="yes" class="checkbox has-expiry" checked>
											  Yes </label>
											</div> &nbsp;  &nbsp;  &nbsp; 
											<div class="checkbox" style="200%">
											   <label for="has_expiry"> <input tabindex="8" type="radio" id="has_expiry" name="has_expiry" value="no" class="checkbox has-expiry">
											  No </label>
											</div>
										</div> <br/>
										
										
									<div class="form-group has-expiry" id="fm6">
									  <label class="bold text-info"> manufacture date &nbsp; <span class="text-danger bold font-18">*</span>   </label> 
									  <div class="input-group " title="manufacture date  "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_mfd" name="product_mfd"   value="<?php echo $_SESSION['product_mfd']; ?>"  class="form-control border border-primary input-l border border-primary input-l newdatepicker" placeholder="Product Manufacture Date ">
										<div class="input-group-append">
										   
										</div>
									  </div>
									  <span class="product_mfdMsg"> </span>
									</div> <!-- ./  form-group -->
									 
									 	
									<div class="form-group has-expiry" id="fm6">
									  <label class="bold text-info"> expiry date &nbsp; <span class="text-danger bold font-18">*</span>   </label> 
									  <div class="input-group " title="expiry date  "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_expd" name="product_expd"   value="<?php echo $_SESSION['product_expd']; ?>"  class="form-control border border-primary input-l border border-primary input-l newdatepicker" placeholder="Product Expiry Date">
										<div class="input-group-append">
										  
										</div>
									  </div>
									  <span class="product_expdMsg"> </span>
									</div> <!-- ./  form-group -->
									 	
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> no. of packs  &nbsp; <span class="text-danger bold font-18">*</span> </label> 
									  <div class="input-group " title="No.of Packs  "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="no_of_pack" name="no_of_pack"   value="<?php echo $_SESSION['product_qty']; ?>"  class="form-control border border-primary input-l border border-primary input-l only-numeric" placeholder="No.of Packs  ">
										<div class="input-group-append">
										  
										</div>
									  </div>
									  <span class="no_of_packMsg"> </span>
									</div> <!-- ./  form-group -->
									   	
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> quantity per pack &nbsp; <span class="text-danger bold font-18">*</span> </label> 
									  <div class="input-group " title="cost price "> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="qty_per_pack" name="qty_per_pack"   value="<?php echo $_SESSION['product_cp']; ?>"   class="form-control border border-primary input-l border border-primary input-l only-numeric" placeholder="Quantity per pack">										
									  </div>
									  <span class="qty_per_packMsg"> </span>
									</div> <!-- ./  form-group -->
									    	
									
									  
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body  font-16 text-capitalize"> 
								   <p class="h4 text-capitalize font-18 bold  text-primary"> <i class="fa fa-medkit "></i>  &nbsp;  &nbsp; product vendor  </p>
									
										   	
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> vendor </label> 
									  <div class="input-group " title="vendor"> 
										<input style="font-size:16px; height:45px;"  autocomplete="false" type="text" id="product_vendor" name="product_vendor"   value=""   class="form-control border border-primary input-l border border-primary input-lg" placeholder="Vendor">										
									  </div>
									  <span class="product_vendorMsg"> </span>
									</div> <!-- ./  form-group -->
									    	
									 
									 <div class="form-group">
										<label class="label-control bold"> date supplied  </label>													
											<input type="text" class="form-control border border-primary input-l font-16 newdatepicker" name="date_supply" id="date_supply" placeholder="date supplied" /> 
										</div>
									 <div class="form-group">
										<label class="label-control bold"> recorded by  </label>													
										<input type="text" class="form-control border border-primary input-l font-16"disabled name="" id=""  value = "<?php echo $_SESSION['adminFullname']. " &nbsp; ( ".$_SESSION['admUser']." ) "; ?>" placeholder="recorded by" /> 
									 </div>
									 
									  <p>&nbsp;</p>
										<button type="button" class="btn btn-warning btn-block btn-rounded btn-lg ladda-button updators" data-style="expand-right" name="update_new_stock" id="update_new_stock" for="update" data-text=""> Update Stock   <i class="fa fa-save"> </i> </button>
										<button type="button" class="btn btn-primary btn-block btn-rounded btn-lg ladda-button creators" data-style="expand-right" name="save_new_stock" id="save_new_stock" for="new"> Save New Stock   <i class="fa fa-save"> </i> </button>
									  
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				    
							  
				</div><!-- ./ modal-content -->
			  </div>
		</div>
		
			
<!-- modal - 12 - for payment in pharmacy  -->  
		<div style="z-index:-999px" class="modal fade" id="pharm_payment" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Payment Form </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-4 col-l-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; amount due  : &nbsp; <span class="text-primary">  </span> &nbsp; <i class="fa fa-play text-danger"></i>  &nbsp;   </p>
								     <div class="amount_due h2 bold text-center ">
											&#8358;  <span class="amount_due"> 0 </span>
									 </div>
									<hr/>
									 <p class="h4 text-capitalize font-18 text-black"> <i class="fa fa-user "></i>  &nbsp;  &nbsp; search patient &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-search text-black"></i>  &nbsp;    </p>
								     <div class="form-group">
										<input type="text" name="patient_filter" id="patient_filter" class="form-control border border-primary input-l font-18 bold" style="border:1px solid #ababab;"  />
									 </div> 
									 <div class="form-group">
										<ul class="num_list">  </ul>
									</div>	
							 
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; cash at hand : &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-hand text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p>
								     <div class="form-group">
										<input type="text" name="pharm_amount_paid" id="pharm_amount_paid" value="" class="only-numeric form-control border border-primary input-l font-18 bold" style="border:1px solid #ababab;"  />
									 </div> 
										 
									<div class="form-group" style="padding-top:25px; margin-top:25px; ">
									<button id="pay_pharm_now" name="pay_pharm_now" class="btn btn-rounded btn-lg btn-success ladda-button" data-style="expand-right"> PAY &nbsp; <i class="fa fa-money"> </i> </button> 
								  </div>
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
									<div class="text-success h3 bold output_receipt"> <a href="#" class="output_receipt" target="_blank"> <i class="fa fa-print"> </i> Print Receipt </a>
									</div>
									
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer">
					<center> 
					<button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" > Close   </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div>
			
<!-- modal - 12 - for payment in pharmacy  -->  
		<div style="z-index:-999px" class="modal fade" id="lab_payment" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Payment Form </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; amount due  : &nbsp; <span class="text-primary">  </span> &nbsp; <i class="fa fa-play text-danger"></i>  &nbsp;   </p>
								     <div class="amount_due h2 bold text-center ">
											&#8358;  <span class="amount_due"> 0 </span>
									 </div>
									<hr/>
									 <p class="h4 text-capitalize font-18 text-black"> <i class="fa fa-user "></i>  &nbsp;  &nbsp; search patient &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-search text-black"></i>  &nbsp;    </p>
								     <div class="form-group">
										<input type="text" name="patient_filter2" id="patient_filter2" class="form-control border border-primary input-l font-18 bold" style="border:1px solid #ababab;"  />
									 </div> 
									 <div class="form-group">
										<ul class="num_list"> 
										 
										</ul>
									</div>	
							 
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
								   <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; cash at hand : &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-hand text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p>
								     <div class="form-group">
										<input type="text" name="lab_amount_paid" id="lab_amount_paid" value="" class="only-numeric form-control border border-primary input-l font-18 bold" style="border:1px solid #ababab;"  />
									 </div> 
										 
									<div class="form-group" style="padding-top:25px; margin-top:25px; ">
									<button id="pay_lab_now" name="pay_lab_now" class="btn btn-rounded btn-lg btn-success ladda-button" data-style="expand-right"> PAY &nbsp; <i class="fa fa-money"> </i> </button> 
								  </div>
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> 
									<div class="text-success h3 bold output_receipt"> <a href="#" class="output_receipt" target="_blank"> <i class="fa fa-print"> </i> Print Receipt </a>
									</div>
									
								</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   
				   <div class="modal-footer">
					<center> 
					<button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" > Close   </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div>
		
								
<!-- modal - 13 - for updating drug / products lists  -->  
		<div style="z-index:-999px" class="modal fade" id="updateProductManager" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<div class="col-md-11"><h5 class="modal-title bold text-info text-capitalize"> &nbsp; <i class="fa fa-medkit"> </i> &nbsp; Add More&nbsp;: <span class="product_name"> </span>  </h5> </div>
				<div class="col-md-1"> <button type="button" class="btn btn-danger btn-rounded btn-xs data-dismiss" data-dismiss="modal"><i class="fa fa-times"></i></button></div>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body text-capitalize"> 
									<div class="form-group has-expiry" id="">
									  <label class="bold text-info"> manufacture date   </label> 
									  <div class="input-group " title="manufacture date  "> 
										<input style="font-size:16px;"  autocomplete="false" type="text" id="product_mfd2" name="product_mfd2"   value="<?php echo $_SESSION['product_mfd2']; ?>"  class="form-control border border-primary input-l newdatepicker" placeholder="Product Manufacture Date ">										
									  </div>
									  <span class="product_mfdMsg2"> </span>
									</div> <!-- ./  form-group -->
									 
									 	
									<div class="form-group has-expiry" id="">
									  <label class="bold text-info"> expiry date   </label> 
									  <div class="input-group " title="expiry date  "> 
										<input style="font-size:16px;"  autocomplete="false" type="text" id="product_expd2" name="product_expd2"   value="<?php echo $_SESSION['product_expd2']; ?>"  class="form-control border border-primary input-l newdatepicker" placeholder="Product Expiry Date">										
									  </div>
									  <span class="product_expdMsg2"> </span>
									</div> <!-- ./  form-group -->
									 	
									<div class="form-group" id="fm6">
									  <label class="bold text-info"> no. of packs  &nbsp; <span class="text-danger bold font-18">*</span> </label> 
									  <div class="input-group " title="No.of Packs  "> 
										<input style="font-size:16px;"  autocomplete="false" type="text" id="no_of_pack2" name="no_of_pack2"   value="<?php echo $_SESSION['product_qty']; ?>"  class="form-control border border-primary input-l border border-primary input-l only-numeric" placeholder="No.of Packs  ">
										<div class="input-group-append">
										  
										</div>
									  </div>
									  <span class="no_of_packMsg2"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm6">
									  <label class="bold text-info "> qty per pack &nbsp; <span class="text-danger bold font-18">*</span> </label> 
									 
									  <div class="input-group " title=" quantity per pack "> 
										<input style="font-size:16px;"  autocomplete="false" type="text" id="qty_per_pack2" name="qty_per_pack2"   value="<?php echo $_SESSION['product_cp']; ?>"   class="form-control border border-primary input-l border border-primary input-l only-numeric" placeholder="Quantity per pack">										
									  </div>
									  <span class="qty_per_packMsg2"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group">
										<button type="button" class="btn btn-primary btn-block btn-rounded btn-lg ladda-button creators" data-style="expand-right" name="update_new_import_stock" id="update_new_import_stock" for="update" data-text=""> Add More Stock   <i class="fa fa-save"> </i> </button>					
									</div>
									
																		
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-6 --> 
						</div> <!-- ./ row --> 
						 
				   </div> <!-- ./ modal-body -->
				   		  
				</div><!-- ./ modal-content -->
			  </div>
		</div> 
		
<!-- Modal 8 for new bill type form  -->
		<div style="z-index:-999px" class="modal fade" id="vitalScienceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> Take Patient Vital Science &nbsp; &nbsp; <i class="fa fa-thermometer"> </i> </h4>         
			  </div> 
					  <div class="modal-body" style="margin-top:0px; padding-top:0px; height:430px;">
						<div class="row">
							<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body" style="padding-top:2px; margin-top:2px; min-height:390px; height:430px"> 						
								<form method = "post">
								<span class="bold font-16 text-danger">  </span> <br/> 
									 
									<div class="col-md-12" style="height:100px; float:left; " >
									
									<p> <span class="patient_info bold h4"> shola ekundayo  </span>  </p> 
										
									
									<div class="form-group" id="fm20">
									  <label class="bold text-info text-capitalize"> &nbsp; Weight </label> 
									  <div class="input-group " title="Weight: ">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="pweight" name="pweight"  class="form-control border border-primary input-l" placeholder="eg: 4.5 KG, 58 KG ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-user text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="pweightMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm20">
									  <label class="bold text-info text-capitalize"> &nbsp; B.P </label> 
									  <div class="input-group " title=" Patient B.P  ">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="pbp" name="pbp"  class="form-control border border-primary input-l " placeholder="eg: 90 : 120, 120 : 160 ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-thermometer text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="pbpMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm20">
									  <label class="bold text-info text-capitalize"> &nbsp; Height :  </label> 
									  <div class="input-group " title="Height ">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="pheight" name="pheight"  class="form-control border border-primary input-l" placeholder="eg: 50 M, 20.4 M ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-user text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="pheightMsg"> </span>
									</div> <!-- ./  form-group -->
									
									<div class="form-group" id="fm20">
									  <label class="bold text-info text-capitalize"> &nbsp; Temperature :  </label> 
									  <div class="input-group " title="Temperature ">
										<input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="ptemp" name="ptemp"  class="form-control border border-primary input-l" placeholder="eg: 37.5 C ">
										<div class="input-group-append">
										  <span class="input-group-text border border-primary input-l" style="height:45px;">
											<i class="fa fa-user text-black"></i>
										  </span>
										</div>
									  </div>
									  <span class="ptempMsg"> </span>
									</div> <!-- ./  form-group -->
									
									
									</div> <!-- ./  col-md-4-->				  
								
								</form>
							  </div>  <!-- ./  card-body --> 
							  
							  </div> 
							  </div> 
							  </div> 
							  </div> 
							  
							  <!-- ./ modal body |   updators creators-->
							   
							  <div class="modal-footer">
								<center>
								<button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
								<button type="button" class="btn btn-primary btn-rounded ladda-button creators" data-style="expand-right" name="saveVitalScience" id="saveVitalScience"> Save Vital Science &nbsp; <i class="fa fa-plus"> </i>  </button>
								<button type="button" class="btn btn-warning btn-rounded ladda-button updators" data-style="expand-right" name="updateBillType" id="updateBillType"> Update Bill Type &nbsp; <i class="fa fa-save"> </i>  </button>
								</center>
								<p>&nbsp;</p> 
							  </div>  <!-- ./ modal-footer -->
							  
							   
							</div><!-- ./ modal-content -->
						  </div>
		</div> 
	<!-- *********************************************************************************** -->	 
	 
								 
<!-- Modal 11 for taking snapshot   -->
		<div style="z-index:-999px" class="modal fade" id="snapshotForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> Take Patient Passport  &nbsp; &nbsp; <i class="fa fa-camera"> </i> </h4>         
			  </div> 
					  <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
							<div class="col-lg-12  grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body">
						
								<form method = "post">
								<span class="bold font-16 text-danger">  </span>   
									<div class="col-md-12"  >																	
										<div id="pic_scan">  
												<div class="" id="my_camera" style="margin:0px 1px; width:145px; height:145px;"></div>													 									 
										 </div> 
										 
										 <div  id="pic_result">
											  				 				  
												<div class="" title="<?php echo $_SESSION['temp_img']; ?>" id="my_result" style="margin:0px 1px; width:120px; height:120px;  ">
												<img src="<?php echo "images/users/".$_SESSION['temp_img']; ?>"> 
												</div>
												<span class="scan_report"> </span>
												<button class="btn btn-sm rescan"> <i class="fa fa-reply"> </i>  rescan  </button>
										</div>
									</div> <!-- ./  col-md-4-->				  
								
								</form>
							  </div>  <!-- ./  card-body --> 
							  
							  </div> 
							  </div> 
							  </div> 
							  </div> 
							  
							  <!-- ./ modal body -->
							   
							  <div class="modal-footer">
								<center>
								
								<button type="button" class="btn btn-primary btn-rounded ladda-button"  onclick="javascript:void(take_snapshot())" >take picture &nbsp; <i class="fa fa-camera icon-lg"></i>  </button>
								<button type="button" class="btn btn-success  btn-rounded" data-dismiss="modal" onclick="$('#save_data').click()"> Finished &nbsp; <i class="fa fa-ok"> </i>  </button>
								</center>
								<p>&nbsp;</p> 
							  </div>  <!-- ./ modal-footer -->
							  
							   
							</div><!-- ./ modal-content -->
						  </div>
		</div> 
	<!-- *********************************************************************************** -->	 
	


	<script>
		$(function(){			
			  hide_update_buttons(); 
			// show_update_buttons();
		});
		
	</script>