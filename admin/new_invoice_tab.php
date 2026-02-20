		
	 <form method="post">
		<div class="row"><div class="col-md-12">
		<div class="card">
		<div class="card-body">
			<div class="row"> 
				<div class="col-md-12 float-left"> 
					<div class="form-group row selection">
						<label for="title" class="col-sm-3 col-form-label bold text-capitalize "> search customer by : </label>
						<div class="col-sm-8">
							<div class="input-group">									
								<div class="icheck"> <label class="control-label"> <input type="radio" checked name="search_type" value="param_form" onmouseover="alert($(this).val())"  class="radio search_type param_form" /> Date Intervals </label> &nbsp; &nbsp; &nbsp; </div>
								<div class="icheck"><label class="control-label"> <input type="radio"  name="search_type" value="text_form"  onmouseover="alert($(this).val())"   class="radio search_type text_form"/> Customer Name /  Ticket No. </label></div>
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
			   </div> <!-- ./ col-md-12 -->
					   
				<div class="col-md-4 float-left">
					<div class="form-group"> 
							<label class="col-form-label"> Select Hospital </label>
							<select name="hosp_id" id="hosp_id" class="hospitals font-16 form-control form-control-lg border border-primary" onchange="console.log($(this).val())"> 
								<optgroup label="Hospital">
								</optgroup> 
							</select>
						 
					</div> <!-- -->
				</div> <!-- col-md-6-->
				
				<div class="col-md-3 float-left param_form all"> 
						<div class="form-group">
							<label for="title" class="col-form-label "> Date From   </label>		 
									<input type="text" id="datefrom" name="datefrom" value="<?php $today = date('Y-m-d'); echo $_SESSION['datefrom'] ?? $today; ?>"  class="datepicker form-control border-primary font-14 imput-sm" placeholder="Date From"> 
							</div> <!-- ./ form-group -->
				   </div> <!-- ./ col-md-5 -->
				   
				   <div class="col-md-3 float-left param_form all"> 
					  <div class="form-group">
							<label for="title" class="col-form-label "> Date To   </label>							
								<input type="text" id="dateto" name="dateto" value="<?php echo $_SESSION['dateto']  ?? $today; ?>" class="datepicker form-control border-primary font-14 imput-sm" placeholder="Date To"> 								 					
					  </div> <!-- ./ form-group -->
				   </div> <!-- ./ col-md-5 -->
				
				<div class="col-md-4 float-left text_form all"> 
					  <div class="form-group">
							<label for="title" class="col-form-label "> Name / Ticket No   </label>
							  <input type="text" id="invoice_ticket_no" name="invoice_ticket_no" value="" class=" form-control border-primary font-14 imput-sm" placeholder="GML/22/0001"> 
					  </div> <!-- ./ form-group -->
					
					<div class="form-group row searching">
					 <div class="form-group col-md-8 offset-2">
						<ul class="num_list list-inline"></ul>
					 </div>	
				   </div> <!-- ./ form-group -->  
				 <div class="search_result"></div>
					  
				  </div> <!-- ./ col-md-5 -->
				
				<div class="col-md-2 float-left param_form all">
					<div class="form-group">
						<label class="col-form-label "> &nbsp; </label>  <br/>
						  <button type="button" id="" class="btn btn-info btn-rounded btn-lg start-invoice-by-param" name="start-invoice-by-param"> Search  &nbsp;   <i class="fa fa-search font-20"></i> </button>
					 </div> <!-- -->
				</div> <!-- col-md-2-->  
				
				<div class="col-md-2 float-left text_form all">
					<div class="form-group">
						<label class="col-form-label "> &nbsp; </label>  <br/>
						  <button type="button" class="btn btn-info btn-rounded btn-lg start-invoice-by-text" name="start-invoice-by-text"> Search  &nbsp;   <i class="fa fa-search font-20"></i> </button>
					 </div> <!-- -->
				</div> <!-- col-md-2-->  
				
			</div><!-- ./ row -->
			
			<div class="invoice_date_result" style="border-top:1px solid #ededed"></div>
			
			
		</div><!-- ./ card-body -->
		</div><!-- ./ col-md-12 -->
		</div><!-- ./ card -->
		</div><!-- ./ row -->
		
		
		
		</form>