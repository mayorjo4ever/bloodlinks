		
		<div class="row bg-inverse-info" style="margin:12px 12px; padding:12px 12px;">  
			<div class="col-md-12  float:left; "  >  
				<div class="card"> 
					<div class="card-body "><!-- ./ 
						<div class="col-md-3 float-left">
							<div class="form-group bold"> 
								<div class="icheck"> <label class="control-label"> <input type="radio" checked name="search_type" value="ticket" class="radio search_type ticket" <?php echo (isset($_SESSION['view_mode']) && $_SESSION['view_mode']=='ticket')?'checked':''; ?> /> &nbsp; &nbsp; View By Ticket Date  </label> </div>
								<div class="icheck"><label class="control-label"> <input type="radio"  name="search_type" value="payment" class="radio search_type payment" <?php echo (isset($_SESSION['view_mode']) && $_SESSION['view_mode']=='payment')?'checked':''; ?>/>&nbsp; &nbsp; View By Payment Date  </label></div>								
							</div>
						</div>  col-md-5 -->
						<div class="col-md-4 float-left"> 
							<div class="form-group row selection">
								<label for="title" class="col-sm-4 col-form-label "> From </label>
								<div class="col-sm-8">
									<div class="input-group">									
										<input type="text" id="datefrom3" name="datefrom3" value="<?php echo date('Y-m-d'); ?>"  class="datepicker form-control border-primary font-14 imput-sm" placeholder="Date"> 
									</div>
								</div> <!-- ./ col-sm-9 -->
							</div> <!-- ./ form-group -->
					   </div> <!-- ./ col-md-3 -->
					  <div class="col-md-3 float-left"> 
						  <div class="form-group row selection">
								<label for="title" class="col-sm-3 col-form-label "> To   </label>
								<div class="col-sm-9">
									<div class="input-group">									
										<input type="text" id="dateto3" name="dateto3" value="<?php echo date('Y-m-d'); ?>" class="datepicker form-control border-primary font-14 imput-sm" placeholder="Date"> 
									</div>
								</div> <!-- ./ col-sm-9 -->
						  </div> <!-- ./ form-group -->
					   </div> <!-- ./ col-md-5 -->
					  
					   <div class="col-md-2 float-left"> 
							<button class="view_ticket_summary_without_pay btn btn-lg btn-icons btn-primary btn-block "> <i class="fa fa-search"></i> </button>
					   </div> 
					  
					  <div class="col-md-12 float-left">  <hr class="pt-0 mt-0"/>   </div>  <!-- ./ col-md-12 -->
							
					  <div class="col-md-12 float-left"> 
							
							<div class="dateresults3"> </div>  
					 
					 </div>  <!-- ./ col-md-12 -->
					  
					</div> <!-- ./ card-body -->
				</div>  <!-- ./ card --> <br/>
				
				 
			</div>  <!-- ./ col-md-8 -->
		
			<!--
			<div class="col-md-4 float:left;"  > 
				 <div class="card"> 
					 <div class="card-header">
						<span class="h5 text-info bold current_date" data-text="<?php echo date('Y-m-d'); ?>"> <i class="fa fa-bar-chart-o"> </i> &nbsp; Search Analysis  :  <?php #  echo date('Y-m-d'); ?> </span>
						 &nbsp; &nbsp; 
						<span onclick=" view_tickets('yes',$('.cmp'),$('.current_date').attr('data-text'))" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Refresh" class="mdi mdi-refresh text-danger fa-2x pointer"></span>
					 </div>
					 <div class="card-body"> 
						<h4 class="card-title"> Overall Summary </h4>
						<canvas id="barChart" style="height:230px"></canvas>                   
					 </div>
				 </div>
			</div> 	  -->
			
		</div> <!-- ./ row -->
	 