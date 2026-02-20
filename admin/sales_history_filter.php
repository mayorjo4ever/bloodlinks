
					<form method="post" id="" > 
					 
					
					<div class="col-md-2 " style="float:left;"> 					
						 <div class="form-group">	<label class="text-muted"> Date From  </label>							 
						  <input type="text" placeholder="Date From" class="form-control border-primary datepicker font-16" value="<?php echo $_SESSION['datefrom']; ?>"  id="datefrom" name="datefrom">
						</div> <!-- ./ form-group -->							
					</div> <!-- ./ col-md-2 -->
					
					<div class="col-md-2 " style="float:left;"> 
						 <div class="form-group">
						 <label class="text-muted">Date To  </label>
						  
						  <input type="text" placeholder="Date To" class="form-control border-primary datepicker font-16" value="<?php echo $_SESSION['dateto']; ?>" id="dateto" name="dateto">
						</div> <!-- ./ form-group -->								
					</div> <!-- ./ col-md-2 -->
					
					<div class="col-md-3 " style="float:left;" > 
						<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">
							<label> &nbsp;   </label> <br/>
							<button type="submit" style="height:44px;" class="btn btn-rounded btn-primary sales_history_filterate_btn"  id="sales_history_filterate_btn" name="sales_history_filterate_btn"> Search <i class="fa fa-search text-white"></i></button>
						</div> <!-- ./  form-group -->
					</div> <!-- ./  col-md-6 -->  
					
					<div class="col-md-2" style="float:left;" > 
						<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">
							<label> &nbsp;   </label> <br/>
							<button onclick = "load_sales_history_dates($('#sales_dates'))" type="button" data-toggle="dropdown"  id="UserDropdown" aria-expanded="true" class="dropdown-toggle btn social-btn btn-lg btn-outline-primary"><i class="fa fa-calendar "></i></button>
							 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
								<a class="dropdown-item bold"> Recent Dates </a>
								 <div id="sales_dates"> </div>
							  </div>
						</div> <!-- ./  form-group -->
					</div> <!-- ./  col-md-6 -->  
					
					
					</form> 
					  