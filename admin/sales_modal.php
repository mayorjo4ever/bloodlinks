
				
<!-- modal - 01 - for payment in pharmacy  -->  
		<div style="z-index:-999px" class="modal fade" id="checkout_payment" tabindex="-1" role="dialog" aria-labelledby="newSibModal" aria-hidden="true">
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
									 <p class="h4 text-capitalize font-18 text-black"> <i class="fa fa-user "></i>  &nbsp;  &nbsp; Customer Name &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-search text-black"></i>  &nbsp;    </p>
								     <div class="form-group">
										<input placeholder = "Customer Name" type="text" name="customer_filter" id="customer_filter" class="form-control font-18 bold" style="border:1px solid #ababab;"  />
									 </div> 
									 <div class="form-group">
										<ul class="num_list">  </ul>
									</div>	
									<p>&nbsp; </p>
									<hr/>
									<p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; amount due  : &nbsp; <span class="text-primary">  </span> &nbsp; <i class="fa fa-play text-danger"></i>  &nbsp;   </p>
								     <div class="amount_due h2 bold text-center ">
											&#8358;  <span class="amount_due"> 0 </span>
									 </div>
									
							 
									</div> <!-- ./ card-body --> 
							  </div> <!-- ./ card --> 
							</div> <!-- ./ col-lg-4 --> 
							
							<div class="col-lg-4 col-lg-offset grid-margin stretch-card">
							  <div class="card">               
								<div class="card-body"> <div class="row"> 
								   <!--  -->
								    <div class="col-md-12" style="float:left">  <p class="h4 text-capitalize font-18 bold  text-black"> <i class="fa fa-money "></i>  &nbsp;  &nbsp; payment method &nbsp; <span class="categ_name text-primary">  </span> &nbsp; <i class="fa fa-hand text-danger"></i>  &nbsp;  <span class="item_name text-success">  </span>   </p></div>
								    <div class="col-md-4" style="float:left">
										<div class="form-group">
											<label class="bold"> Cash 
											<input type="radio" name="paym_method" id="paym_method" value="cash" class="form-control font-18 bold" checked style="border:1px solid #ababab;"  /> </label>
										</div>
									</div>
									
									<div class="col-md-4" style="float:left">
										<div class="form-group">
											<label class="bold" > POS 
											<input type="radio" name="paym_method" id="paym_method" value="pos" class="form-control font-18 bold" style="border:1px solid #ababab;"  /> </label>
										</div>
									</div>
									
									<div class="col-md-4" style="float:left">
										<div class="form-group">
											<label class="bold"> Transfer 
											<input type="radio" name="paym_method" id="paym_method" value="transfer" class="form-control font-18 bold" style="border:1px solid #ababab;"  /> </label>
										</div>
									</div>
									
									<div class="col-md-12"> 
									  <div class="form-group"> <label class="input-label bold text-black"> <i class="fa fa-money "></i> &nbsp;  &nbsp;  Amount Paid </label> 
										<input placeholder = "Amount Paid" type="text" name="checkout_amount_paid" id="checkout_amount_paid" value="" class="only-numeric form-control font-18 bold" style="border:1px solid #ababab;"  />
										 </div> 	 
										<div class="form-group" style="padding-top:25px; margin-top:25px; ">
										<button id="pay_checkout_now" name="pay_checkout_now" class="btn btn-rounded btn-lg btn-success ladda-button" data-style="expand-right"> PAY &nbsp; <i class="fa fa-money"> </i> </button> 
									   </div>
									
									</div>  
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
					<button type="button" onclick="window.location.refresh()" class="btn btn-danger btn-rounded" data-dismiss="modal" > Close &nbsp; <i class="fa fa-times"></i>  </button>
					</center>
					<p>&nbsp;</p><center>  
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div>
			
