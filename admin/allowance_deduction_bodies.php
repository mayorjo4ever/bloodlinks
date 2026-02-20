	
			<div class="row">
				  <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					  <div class="card-body">   
						 <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist"> 
							<li class="nav-item "> <!-- disabled -->
								<a class="nav-link active"  id="tab11a"  data-toggle="tab" href="#stock-tab11a" role="tab" aria-controls="stock-tab11a" aria-selected="false"> List of Allowance  </a>
							</li>  
						
							<li class="nav-item "> <!-- disabled -->
								<a class="nav-link  "  id="tab22a"  data-toggle="tab" href="#stock-tab22a" role="tab" aria-controls="stock-tab22a" aria-selected="false"> List of Deduction   </a>
							</li>  
						</ul>
						
						<div class="tab-content tab-content-solid">
							  <div class="tab-pane fade show active  " id="stock-tab11a" role="tabpanel" aria-labelledby="stock-tab11a">
									<?php  require "salary_credit_page_module.php"; ?>
							  </div> <!-- ./ tab-pane -->
							  
							  <div class="tab-pane fade " id="stock-tab22a" role="tabpanel" aria-labelledby="stock-tab22a"> 								
									<?php  require "salary_deduction_page_module.php"; ?> 
							  </div> 
						</div>
					</div>
					</div>
					</div>
					</div>