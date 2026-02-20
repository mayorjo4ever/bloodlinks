
 <div class="row">				
			<div class="col-md-2 no-print" style="float:left;"> 
			<div class="form-group">
				 <center class="bold">
					 <i class="icon-calendar text-info fa-4x"></i>  
					<br/> Select View Mode
				 </center>
			</div>
			
			<div class="form-group bold">  <center> 
					<div class="icheck"> <label class="control-label"> <input type="radio" checked name="search_type" value="daily" class="radio search_type daily" <?php echo ($_SESSION['view_mode']=='daily')?'checked':''; ?> /> <br/> Daily View  </label> </div>
					 <br/>
					<div class="icheck"><label class="control-label"> <input type="radio"  name="search_type" value="weekly" class="radio search_type weekly" <?php echo ($_SESSION['view_mode']=='weekly')?'checked':''; ?>/>  <br/> Weekly View </label></div>
					 <br/>
					<div class="icheck"><label class="control-label"> <input type="radio"  name="search_type" value="monthly" class="radio search_type monthly" <?php echo ($_SESSION['view_mode']=='monthly')?'checked':''; ?>/> <br/> Monthly View </label></div>
				 </center>  
			</div> 
		</div> 
	
	 <div class="col-md-10 " style="float:left;"> 
		<div class="card border border-primary"> 
		<div class="card-body"> 
			<form method="post">
				<div class="row"> 
					
					<div class="col-md-4 no-print" style="float:left;">						
						  <div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> From  </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="datefrom" name="datefrom" value="" class="form-control border-primary datepicker" placeholder="From"> 
									 </div> 
								</div>
							</div> <!-- ./ form-group -->
						  </div> <!-- ./ col-md-4 --> 

						      
					
					<div class="col-md-4 no-print" style="float:left;">
						<div class="form-group row selection">
							<label for="title" class="col-sm-3 col-form-label"> To  </label>
							<div class="col-sm-9">
								<div class="input-group">									
									<input style="font-size:14px; height:45px;" type="text" id="dateto" name="dateto" value="" class="form-control border-primary datepicker" placeholder="To"> 
									 </div> 
								</div>
						</div> <!-- ./ form-group -->  
					</div>  <!-- ./ col-md-4 -->
					
					<div class="col-md-4 no-print" style="float:left;">
					 <div class="form-group row selection">
						<button for="" type="button" class="btn btn-info btn-lg btn-rounded ladda-button" data-style="expand-right" name="search_all_test_with_dates" id="search_all_test_with_dates"> Search&nbsp; <i class="icon-search"> </i>  </button>
					 </div>
					</div> <!-- ./ col-md-4 -->
				
					<div class="col-md-12" style="float:left;">	
						<div class="output_result"> Result : </div>
					</div> <!-- ./ col-md-12 -->
			 
			</form>
			</div>		
		</div>		
	</div>  <!-- ./ col-md-6 -->	
</div> <!-- ./ row -->
</div> <!-- ./ row -->