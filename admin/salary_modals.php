
<!-- modal - 01- for creating/updating payment types    -->  
		<div style="z-index:-999px" class="modal fade" id="paym_type_modal" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; New Payment Structue / Types    </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12 col-md-offset-1">
							<div class="card"> <div class="card-body"> 								 
									 <div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Item Name  </label>
										<div class="col-sm-8">
											<input style="font-size:16px;" type="text" class="form-control border-primary" id="item_name"  name="item_name" placeholder="Item Name  "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									
									 <div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Item Type  </label>
										<div class="col-sm-8">
											<select class="form-control border-primary font-16" id="paym_item_type" name="paym_item_type"> 
												<optgroup label="Room Type ">
													<option value=""> </option>
												</optgroup>
											</select> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
								  
									 <div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Add To All Members </label>
										<div class="col-md-8" style="float:left;">
											<select class="form-control border-primary font-16" id="auto_add_all" name="auto_add_all"> 
												<optgroup label="Add To All Members ">
													<option value=""> ... </option>
													<option value="yes"> Yes </option>
													<option value="no"> No </option>
												</optgroup>
											</select> 
												<!-- <div class="icheck-square" style="float:left;">
												  <label for="minimal-radio"> &nbsp;<input tabindex="7" type="radio" name="auto_add_all" id="auto_add_all" class="auto_add_all" value="yes"  >
												  Yes</label> &nbsp; &nbsp; |  &nbsp; &nbsp;
												</div> 
												<div class="icheck-square" style="float:left;">
												  <label for="minimal-radio"> &nbsp;<input tabindex="8" type="radio"  name="auto_add_all" id="auto_add_all"  class="auto_add_all" value="no" >
												  No </label>
												</div>
											</div> -->
									  </div> <!-- ./ form-group --> 
								     
									 <button id="save_paym_items" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Save &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_paym_items" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update &nbsp; <i class="fa fa-save"> </i> </button>  
									 
								</div> <!-- ./ form-group --> 
								
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		

<!-- modal - 02- for creating/updating salary scales   -->  
		<div style="z-index:-999px" class="modal fade" id="salary_scale_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
		  <div style="width:80%" class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Update / Create New Payment / Organization Body  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-6">
							<div class="card"> <div class="card-body"> 								 
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Body Name </label>
									<div class="col-sm-8">
										<input style="font-size:16px;" type="text" class="form-control border-primary salaryforms" id="body_name"  name="body_name" placeholder="Body Name  "> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->	
					 

								<div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Bank Remita  </label>
									<div class="col-sm-8">
										<select onchange="console.log($(this).val())" class="form-control border-primary font-16 salaryforms debit" id="bank_list" name="bank_list"> 
											<optgroup label="Banks">
												<option value=""> </option>
											</optgroup>
										</select> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->
								 
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-6 -->
							
							<div class="col-md-6">
							<div class="card"> <div class="card-body"> 								 
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Account Name </label>
									<div class="col-sm-8">
										<input style="font-size:16px;" type="text" class="form-control border-primary salaryforms debit" id="acct_name"  name="acct_name" placeholder="Account Name  "> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->
								
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Account Number </label>
									<div class="col-sm-8">
										<input style="font-size:16px;" type="text" class="form-control border-primary only-numeric salaryforms debit" id="acct_no"  name="acct_no" placeholder=" Account Number  "> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group --> 
							</div> </div> </div> <!-- ./ col-md-6  -->
							 
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button onclick="window.location.reload() " type="button" class="btn btn-secondary btn-rounded  btn-lg" data-dismiss="modal" >  <i class="fa fa-times"> </i> &nbsp;Cancel   </button> 
						<button id="create_paym_body" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg  btn-rounded ladda-button" data-style="expand-right">  <i class="fa fa-save"> </i> &nbsp; Save  </button>  
						<button id="update_paym_body" rel="" type="button" mode="update" class="updators btn btn-warning btn-lg mr-2 btn-rounded ladda-button" data-style="expand-right">  <i class="fa fa-save"> </i> &nbsp;  Update </button>  						
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
	
		
<!-- modal - 03- for creating/updating allowance modal   -->  
		<div style="z-index:-999px" class="modal fade" id="salary_allowance_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Update / Create New Allowance  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12">
							<div class="card"> <div class="card-body"> 								 
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label">  Name </label>
									<div class="col-sm-8">
										<input style="font-size:16px;" type="text" class="form-control border-primary salaryforms" id="allowance_name"  name="allowance_name" placeholder="Allowance Name  "> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group --> 
 
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							 
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button onclick="window.location.reload() " type="button" class="btn btn-secondary btn-rounded  btn-lg" data-dismiss="modal" >  <i class="fa fa-times"> </i> &nbsp;Cancel   </button> 
						<button id="create_allowance_btn" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg  btn-rounded " data-style="expand-right">  <i class="fa fa-save"> </i> &nbsp; Create Allowance  </button>  
						<button id="update_allowance_btn" rel="" type="button" mode="update" class="updators btn btn-warning btn-lg mr-2 btn-rounded ladda-button" data-style="expand-right">  <i class="fa fa-save"> </i> &nbsp;  Update Allowance </button>  						
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
	
			
<!-- modal - 03- for creating/updating allowance modal   -->  
		<div style="z-index:-999px" class="modal fade" id="add_to_staff_allowance_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Add To Staff Allowance  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12">
							<div class="card"> <div class="card-body"> 								 
								 
								  <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label bold">Staff Info :  </label>
									<div class="col-sm-8">
										<span class="staff_name"></span>
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->  
								
								<div class="form-group row bold"> <label  class="col-sm-12 control-label"> List of Allowances Allocated </label> </div>
								 <?php $allow_bodies = $dbm->getFields($dbm->select('salary_allowance_bodies',array('status'=>'active')),array('sn','name'));
									if(!is_null($allow_bodies)) { $m=0; 
										foreach($allow_bodies['name'] as $bodies){ 							
										?>
										<div class="form-group row"> <label class="col-sm-12 control-label"> <input type="checkbox" class="checkbox alloc_allowance" name="alloc_allowance[]" value="<?php echo $allow_bodies['sn'][$m]; ?>">  &nbsp; &nbsp; <?php echo $bodies; ?> </label> </div>
										<?php $m++; } # end foreach 
										} # end not null 
										?>
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							 
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button onclick="window.location.reload() " type="button" class="btn btn-secondary btn-rounded  btn-lg" data-dismiss="modal" >  <i class="fa fa-times"> </i> &nbsp;Cancel   </button> 
						<button id="add_this_staff_allowance" for="" type="button" mode="new" class="add_this_staff_allowance creators btn btn-info mr-2 btn-lg  btn-rounded " data-style="expand-right">  <i class="fa fa-save"> </i> &nbsp; Save Allowance  </button>  
						
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		
		
<!-- modal - 04- for adding deductions modal   -->  
		<div style="z-index:-999px" class="modal fade" id="add_to_staff_deduction_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
		  <div style="width:65%" class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Add To Staff Deductions  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12">
							<div class="card"> <div class="card-body"> 								 
								 
								  <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label bold">Staff Info :  </label>
									<div class="col-sm-8">
										<span class="staff_name"></span>
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->  
								
								<div class="form-group row bold"> <label  class="col-sm-12 control-label"> List of Deductions </label> </div>
								<table class="table"><tbody>
								 <?php $deduction_bodies = $dbm->getFields($dbm->select('salary_debit_bodies',array('status'=>'active')),array('sn','body_name'));
									if(!is_null($deduction_bodies)) { $m=0; 
										foreach($deduction_bodies['body_name'] as $bodies){ 							
										?>
										<tr>
											<td>
												<label class="col-sm-6 control-label"> <input type="checkbox" class="checkbox alloc_deduction" name="alloc_deduction[]" value="<?php echo $deduction_bodies['sn'][$m]; ?>">  &nbsp; &nbsp; <?php echo $bodies; ?> </label> 
											</td>
											<td> <label class="label-control"> Deduction Mode </label>
											<select  class="form-control font-16 border border-primary deduct_mode" style="max-width:180px;"><optgroup label="Deduction Mode"> <option value="amount">Fixed Amount </option>  <option value="percent">Percentage </option> <optgroup> </select>
											</td>
											<td> <label class="label-control"> Percent Rate / 100 </label>
											 <input  disabled type="text" class="form-control  font-16 border border-primary percent_rate" style="max-width:150px;" name="percent_rate" value="" placeholder="6">
											</td> 
											</tr>
										</div>
										<?php $m++; } # end foreach 
										} # end not null 
										?>
										</tbody> </table>
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							 
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button onclick="window.location.reload() " type="button" class="btn btn-secondary btn-rounded  btn-lg" data-dismiss="modal" >  <i class="fa fa-times"> </i> &nbsp;Cancel   </button> 
						<button id="add_this_staff_deduction" for="" type="button" mode="new" class="add_this_staff_deduction creators btn btn-info mr-2 btn-lg  btn-rounded " data-style="expand-right">  <i class="fa fa-save"> </i> &nbsp; Save Deductions  </button>  
						
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		
		
<!-- modal - 03- for creating/updating payment types    -->  
		<div style="z-index:-999px" class="modal fade" id="grade_level_modal" tabindex="-1" role="dialog" aria-labelledby="grade_level_modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Update / Create New Grade Level   </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12 col-md-offset-1">
							<div class="card"> <div class="card-body"> 								 
								 
								
									<div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Grade Level  </label>
										<div class="col-sm-8">
											<input style="font-size:16px;" type="text" class="form-control border-primary" id="grade"  name="grade" placeholder="Grade Level  "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Max. Steps  </label>
									<div class="col-sm-8">
									<select class="form-control border-primary font-16" id="max_steps" name="max_steps"> 
											<optgroup label="Max. Steps">
												<option value="">... </option>
												<?php for($m=1; $m<=20; $m++){ ?>
												<option value="<?php echo $m; ?>"> <?php echo $m; ?> </option>
												<?php } # end for ?>
											</optgroup>
										</select> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->
								
								  	  
									 <button id="save_grade_level" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Save &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_grade_level" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update &nbsp; <i class="fa fa-save"> </i> </button>  
									   
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->