		
		<div class="row bg-inverse-info" style="margin:12px 12px; padding:12px 12px;">  
			<div class="col-md-12  float:left; "  >  
				<div class="card"> 
					<div class="card-body ">  
						<ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist"> 
							<li class="nav-item " >
							 <a  class="nav-link active"  id="tab1a" data-toggle="tab" href="#stock-tab1a" role="tab" aria-controls="stock-tab1" aria-selected="false"> List of Credit  &amp; Deduction  Bodies  </a>
						    </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item "> <!-- disabled -->
							<a class="nav-link  "  id="tab2a"  data-toggle="tab" href="#stock-tab2a" role="tab" aria-controls="stock-tab2a" aria-selected="false"> Schedule Credit  &amp; Deduction    </a>
						  </li>  
						</ul> 
						
						<div class="tab-content tab-content-solid">
							  <div class="tab-pane fade show active" id="stock-tab1a" role="tabpanel" aria-labelledby="stock-tab1a">
									<?php  require "salary_deduction_page_module.php"; ?>
							  </div> <!-- ./ tab-pane -->
							  
							  <div class="tab-pane fade" id="stock-tab2a" role="tabpanel" aria-labelledby="stock-tab2a"> 								
									<?php require "credit_debit_schedule.php"; ?> 
							  </div>  
							    
					  
						</div> <!-- ./ tab-content -->
					 
					</div> <!-- ./ card-body -->
				</div>  <!-- ./ card --> <br/>
				
				 
			</div>  <!-- ./ col-md-8 -->
		 
			
		</div> <!-- ./ row -->
	 