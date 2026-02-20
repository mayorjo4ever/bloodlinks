<div class="row">  
			 <div class="col-md-3 grid-margin stretch-card">
               
					<div class="form-group" id="fm1" style="border:5px thin #000;">
						  <label class="bold text-info"> Select Date </label> 
						  <div class="input-group border-1" title="Date">
							<input style="font-size:16px; height:40px; " autocomplete="false" type="text" id="date_rec" name="date_rec"  class="form-control  datepicker" placeholder="Date">
							<div class="input-group-append">
							  <span class="input-group-text" style="height:44px;">
								<i class="fa fa-calendar text-success"></i>
							  </span>
							</div>
						  </div>
						   <span class="date_recMsg"> </span>
						  </div> <!--./ form-group  -->
				</div> <!--./ col-lg-3  -->
				 
				
				<div class="col-md-3">	  
				<div class="form-group" id="fm5" style="border:5px thin #000;">
				  <label class="bold text-info">  Report Type </label>  
				  <div class="input-group border-1" title=" Report Type ">
					<select class="form-control" style="font-size:16px; height:40px;" name="report_type" id="report_type">
					   <option value=""> ...  </option>
					   <option value="complaints" <?php echo ($_SESSION['report_type']=="complaints")?"selected":""; ?>> Complaints </option>
					   <option value="diagnosis" <?php echo ($_SESSION['report_type']=="diagnosis")?"selected":""; ?>> Diagnosis </option>
					   <option value="treatment" <?php echo ($_SESSION['report_type']=="treatment")?"selected":""; ?>> Treatment </option> 
					</select>						
					<div class="input-group-append">
					  <span class="input-group-text" style="height:40px;">
						<i class="fa fa-comment text-success"></i>
					  </span>
					</div>
				  </div>
				  <span class="report_typeMsg"> </span>
				</div> <!-- ./  col-md5
				-->
			</div>
			
			 <div class="col-md-3">  <input type="hidden" name="report_ref" id="report_ref" for="<?php echo $myhsp; ?>" data-text="<?php echo $mytype2; ?>" />				
				  &nbsp;   &nbsp;  
				<?php switch($_SESSION['report_mode']) { case "new" :{?>	<button id="save_patient_report" name="save_patient_report" class="btn btn-success btn-lg btn-block bold ladda-button" data-style="expand-right" for="<?php echo $myhsp; ?>" data-text="<?php echo $mytype; ?>" mode="new"  rel=""> 
						<span class="btn-name">Save Report</span> <i class="fa fa-check"> </i>
				</button> <?php } break; case "update": {?> &nbsp;  
					<button id="update_patient_report" name="update_patient_report" class="btn btn-warning btn-lg btn-block bold ladda-button" data-style="expand-right" for="<?php echo $myhsp; ?>" data-text="<?php echo $mytype; ?>" mode="update"> 
						Update Report <i class="fa fa-check"> </i>
					 </button>
				<?php } break; } #end switch  ?>
				 </div>
					
			 <div class="col-md-12 medReportTinyMice">  
				 <textarea id="medReportTinyMice"> Report... </textarea> 
			  </div>
				  
            </div> 
		 	