
<!-- modal - 01- for creating/updating payment types    -->  
		<div style="z-index:-999px" class="modal fade" id="new_hosital_modal" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Create / Update Hospital   </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12 col-md-offset-1">
							<div class="card"> <div class="card-body"> 								 
									 <div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Hospital Name  </label>
										<div class="col-sm-8">
											<input style="font-size:16px;" type="text" class="form-control border-primary hospital_form" id="hosp_name"  name="hosp_name" placeholder="Hospital Name  "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									
									<div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Address </label>
										<div class="col-sm-8">
											<input style="font-size:16px;" type="text" class="form-control border-primary hospital_form" id="address"  name="address" placeholder="Address "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									
									<div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Contact No. </label>
										<div class="col-sm-8">
											<input style="font-size:16px;" type="text" class="form-control border-primary hospital_form" id="contact_no"  name="contact_no" placeholder="Contact No.  "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									
									  
									 <div class="form-group row"> 
									 <button id="save_hospital" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Save Hospital &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_hospital" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update Hospital &nbsp; <i class="fa fa-save"> </i> </button>  
									 
								</div> <!-- ./ form-group --> 
								
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" onclick="window.location.reload()" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		
 
 
 
<!-- modal - 02- for creating/updating payment types    -->  
		<div style="z-index:-999px" class="modal fade" id="bank_account_modal" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div style="" class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Create / Update Bank Accounts    </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12">
							<div class="card"> <div class="card-body"> 								 
							 <div class="form-group row">
								<label for="title" class="col-sm-3 col-form-label"> Bank Name  </label>
								<div class="col-sm-8">
									<select onchange="console.log($(this).val())" class="form-control border-primary font-16 salaryforms debit" id="bank_list" name="bank_list"> 
										<optgroup label="Banks">
											<option value=""> </option>
										</optgroup>
									</select> 
								</div> <!-- ./ col-sm-9 -->
							</div> <!-- ./ form-group -->
								
								 <div class="form-group row">
								<label for="title" class="col-sm-3 col-form-label"> Staff Name  </label>
								<div class="col-sm-8">
									<select onchange="console.log($(this).val())" class="form-control border-primary font-16 salaryforms debit" id="staff_list" name="staff_list"> 
										<optgroup label="Staff Name">
											<option value=""> </option>
										</optgroup>
									</select> 
								</div> <!-- ./ col-sm-9 -->
							</div> <!-- ./ form-group -->
							
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
									
									  
									 <div class="form-group row"> 
									 <button id="create_bank_account" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Create Bank Account  &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_bank_account" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update Bank Account &nbsp; <i class="fa fa-save"> </i> </button>  
									 
								</div> <!-- ./ form-group --> 
								
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" onclick="window.location.reload()" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		 
<!-- modal - 03- for creating invoice -->  
		<div style="z-index:-999px" class="modal fade" id="account_selection_modal" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div style="width:75%" class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp;&nbsp; Select Accounts  To Remit Invoice </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12">
							<div class="card"> <div class="card-body"> 								 
							  	
							<table class="table table-striped"> 
								<thead>
									<tr class="bold table-info text-capitalize">
										<td> Sn </td> 
										<td> Bank Name  </td>
										<td> Account Name </td>
										<td> Account Number </td>
										<td> Account to Remit </td>
									</tr>
								</thead> 
								<tbody>
					<?php $accounts = $dbm->getFields($dbm->select('accounts',array('status'=>'active')),array('sn','staff_id','bank_id','account_name','account_no'));
						if(!is_null($accounts)) { $m=0; 
							foreach($accounts['account_name'] as $bodies){ 
							$bank_info = $dbm->getFields($dbm->select('banks',array('sn'=>$accounts['bank_id'][$m])),array('sn','name','icon','alias')); // bank_name_id
							// $staff_info = $dbm->getFields($dbm->select('banks',array('sn'=>$accounts['bank_id'][$m])),array('sn','name','icon','alias')); // bank_name_id
							?>
								<tr>
									<td> <?php echo ($m+1); ?>  </td>	
									 <td> <img class="img" src="<?php echo "../assets/images/banks/".$bank_info['icon'][0].""; ?>"/>  &nbsp; <?php echo $bank_info['name'][0]; ?> </td>									
									<td> <?php echo $accounts['account_name'][$m]; ?> </td>
									<td> <?php echo $accounts['account_no'][$m]; ?> </td>
									<td> <div class="icheck-square">
										  <label for="minimal-radio"> &nbsp;<input type="radio" class="default_acct" id="default_acct" name="default_acct" value="<?php echo $accounts['sn'][$m]; ?>" <?php echo ($_SESSION['default_acct']==$accounts['sn'][$m])?"checked":""; ?> >
										  This Account </label>
										</div> 
									</td> 
								</tr>
											<?php $m++; }
										} # end not null 
										else { ?>
											<tr><td colspan="7" align="center"> <span class="h4 text-warning"> No Account Exists </span>  </td></tr>
										<?php } 
								?>
								</tbody> 
								</table><p>&nbsp;  </p>
							  <div class="form-group row pull-right"> 
									<button id="create_invoice_memo" type="button" mode="new" class="creators btn btn-success mr-2 btn-lg btn-rounded ladda-button " data-style="expand-right"> Create Invoice of ( <span class="total_invoice"></span> )&nbsp; <i class="fa fa-send"> </i> </button>  
									 <button id=" " rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-rounded ladda-button" data-style="expand-right"> Update Invoice &nbsp; <i class="fa fa-save"> </i> </button>  
								</div> <!-- ./ form-group --> 
								
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" onclick="window.location.reload()" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		
 	 
<!-- modal - 03- for paying invoice -->  
		<div style="z-index:-999px" class="modal fade" id="invoice_payment_modal" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
		  <div style="width:75%" class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-money"> </i> &nbsp; <span class="invoice_no"></span>&nbsp;  Invoice Payment </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12">
							<div class="card"> <div class="card-body"> 								 
							  	
							<table class="table table-striped"> 
								<thead>
									<tr class="bold table-info text-capitalize text-black">
										 
										<td colspan="4"> <span class="hospital_name"></span> </td>
									</tr>
								</thead> 
								<tbody> 
								 <tr class="bold">
									<td> Total Cost   </td>	
									<td> <span class="total_cost"></span>   </td>	 
									<td> Amonunt Paying &nbsp; (&#8358;)    </td>	 
									<td>  <input type="text" id="invoice_paying" class="form-control font-16 border-primary" style="max-width:200px;" /> </td> 
								 </tr>

								 <tr class="bold">
									<td> Discount   </td>	
									<td> <span class="discount"></span>     </td>	 
									<td>     </td>	 
									<td>  <button for="" id="pay_invoice" type="button" mode="new" class="creators btn btn-success mr-2 btn-rounded ladda-button btn-lg " data-style="expand-right"> Pay Invoice &nbsp; <i class="fa fa-money fa-2x"> </i> </button>  &nbsp; <button type="button" onclick="window.location.reload()" class="btn btn-secondary btn-rounded btn-lg " data-dismiss="modal" > Cancel   &nbsp; <i class="fa fa-times fa-2x"> </i> </button> </td> 
								 </tr>

								 <tr class="bold">
									<td> Final Cost   </td>	
									<td> <span class="fin_cost"></span>    </td>	 
									<td>     </td>	 
									<td>   </td> 
								 </tr>
								 
								 <tr class="bold">
									<td> Amount Paid   </td>	
									<td> <span class="amount_paid"></span>    </td>	 
									<td>     </td>	 
									<td>   </td> 
								 </tr>
										 
								</tbody> 
								</table><p>&nbsp;  </p>
							 
								
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				    
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
		
 
 
 
		 
	 