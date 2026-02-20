		
		<div class="row ">  
			<div class="col-md-12 "  >  
				<div class="card"> 
					<div class="card-body ">  
						 <div class="row">
							<div class="col-md-7 float-left">
								<div class="card"> 
									<div class="card-body">
										<div class="salary_module_page">
											<strong> Select Sample of Staff from your R.H.S.  </strong> <span class="fa fa-hand-o-right fa-2x pull-right"></span>
										</div> 
									</div>  <!-- ./ card-body -->
								</div>  <!-- ./ card -->
						 
							</div> <!-- ./ col-md-7 -->
							
							<div class="col-md-5 float-left">
								<div class="card"> 
									<div class="card-body">
										<h5> <strong> All Staff </strong>  </h5>
										 <table class="table table-striped table-nogap"><tbody>
										 <?php  
											$staff = $dbm->getFields($dbm->select('users',array('acct_status'=>'active'),array('surname'),'and','asc'),array('surname','firstname','midname','fullname','dob','user_id','sn','password'));
											## if not null  	
											if(!is_null($staff)) {  $n=0; foreach($staff['user_id'] as $user_id){   ?>
												<tr class="insertion"><td class="bold"><?php echo $user_id; ?></td> <td><?php echo $staff['fullname'][$n]; ?></td><td> <button data-text="<?php echo base64_encode($user_id); ?>" class="btn table-success btn-md search-staff-paym-schedule"> <span class="fa fa-check"> </span></button></td></tr> 
												<?php $n++; } # end foreach 
												}  # end null 
											?>
											</tbody></table>
									</div>  <!-- ./ card-body -->
								</div>   <!-- ./ card -->
							</div>  <!-- ./ col-md-5-->
						</div>
					</div> <!-- ./ card-body -->
				</div>  <!-- ./ card -->  
				 
			</div>  <!-- ./ col-md-8 -->
		 
			
		</div> <!-- ./ row -->
	 