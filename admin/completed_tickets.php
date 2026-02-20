		
		<div class="row bg-inverse-info" style="margin:12px 12px; padding:12px 12px;">  
			
			<div class="col-md-12  float:left; "  >  
				<div class="card"> 
					<div class="card-body ">  
						<div class="col-md-12 float-left"> 
							<div class="form-group row selection">
								<label for="title" class="col-sm-4 col-form-label bold text-capitalize "> search by : </label>
								<div class="col-sm-8">
									<div class="input-group">									
										<label class="control-label"> <input type="radio" checked name="search_type" value="param_form" onchange="display_search_type($(this).val())" class="radio search_type param_form" /> Date Intervals </label> &nbsp; &nbsp; &nbsp; 
										<label class="control-label"> <input type="radio"  name="search_type" value="text_form" onchange="display_search_type($(this).val())" class="radio search_type text_form"/> Ticket No. </label>
									</div>
								</div> <!-- ./ col-sm-9 -->
							  </div> <!-- ./ form-group -->
					   </div> <!-- ./ col-md-5 -->
					
						<div class="col-md-5 float-left param_form all"> 
							<div class="form-group row ">
								<label for="title" class="col-sm-3 col-form-label "> From   </label>
								<div class="col-sm-9">
									<div class="input-group">									
										<input type="text" id="datefrom" name="datefrom" value="<?php echo date('Y-m-d'); ?>"  class="datepicker form-control border-primary font-14 imput-sm" placeholder="Date"> 
									</div>
								</div> <!-- ./ col-sm-9 -->
							</div> <!-- ./ form-group -->
					   </div> <!-- ./ col-md-5 -->
					  <div class="col-md-5 float-left param_form all"> 
						  <div class="form-group row ">
								<label for="title" class="col-sm-3 col-form-label "> To   </label>
								<div class="col-sm-9">
									<div class="input-group">									
										<input type="text" id="dateto" name="dateto" value="<?php echo date('Y-m-d'); ?>" class="datepicker form-control border-primary font-14 imput-sm" placeholder="Date"> 
									</div>
								</div> <!-- ./ col-sm-9 -->
						  </div> <!-- ./ form-group -->
					   </div> <!-- ./ col-md-5 -->
					  
					   <div class="col-md-10 float-left text_form all"> 
						  <div class="form-group row ">
								<label for="title" class="col-sm-4 col-form-label "> Name / Ticket No   </label>
								<div class="col-sm-8">
									<div class="input-group">									
										<input type="text" id="comp_ticket_searcher" name="comp_ticket_searcher" value="" class=" form-control border-primary font-14 imput-sm" placeholder="GML/22/0001"> 
									</div>
								</div> <!-- ./ col-sm-9 -->
						  </div> <!-- ./ form-group -->
					   </div> <!-- ./ col-md-5 -->
					   
					   <div class="col-md-2 float-left"> 
							<button class="viewtickets btn btn-lg btn-icons btn-primary btn-block "> <i class="fa fa-search"></i> </button>
					   </div>  
					   
					  <div class="col-md-12 float-left">  <hr/>   </div>  <!-- ./ col-md-12 -->
						
					  <div class="form-group row searching search_result">
						 <div class="form-group col-md-6 offset-3">
							<ul class="num_list list-inline"></ul>
						 </div>	
					  </div> <!-- ./ form-group -->  
					
					  <div class="col-md-12 float-left">   <div class="ticket_results"> </div>  </div>  <!-- ./ col-md-12 -->
					  
					</div> <!-- ./ card-body -->
				</div>  <!-- ./ card --> <br/>
				
				 
			</div>  <!-- ./ col-md-8 -->
		
		 
			
		</div> <!-- ./ row -->
	 