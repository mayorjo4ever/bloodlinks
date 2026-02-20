	
	
			<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
			  <div class="col-md-1">
				<img class="img-sm rounded-circle mb-4 mb-md-0" style="width:100%; height:auto;  max-height:85%; border:5px solid #ddd" src="<?php echo $pic_source; ?>" alt="profile image">
			  </div>
			  <div class="col-md-4">
				<div class="d-flex">
				  <p class="text-primary mr-1 mb-0">[# <?php echo ($tot_com - $n); ?> ]</p>				  
				  <p class="mb-0 ellipsis bold"> Complaints</p>
				  
				</div>
				<p class="text-gray ellipsis mb-2 font-16">  <?php echo stripslashes($comments['complaints'][$n]); ?>
				</p> 
				<p class="text-gray"> <small class="text-mutted"> <i class="fa fa-clock-o">  </i> </small>
				<small class=" text-mutted">  <?php echo $comments['date_vs'][$n]." &nbsp;,  ".date('H:i A',$comments['time_vs'][$n]). "<br/> [ ".
				  $func->years_old(date('Y-m-d') , $comments['date_vs'][$n] , ' %y Year, %m Months, %d Days' ).
				  ' ago ] '; /**readTime(time()-$comments['time_vs'][$n]).**/?></small>
					</p>
			  </div>
			  
			   <div class="col-md-3 border-bottom ">
				<div class="d-flex">				  
				  <p class="mb-0 ellipsis bold"> Diagnosis</p>
				</div>
				<p class="text-gray ellipsis mb-2 font-16">  <?php echo stripslashes($comments['diagnosis'][$n]); ?>
				</p> 
			  </div>
			   
			   <div class="col-md-4 border-bottom ">
				<div class="d-flex"> 
				 <p class="mb-0 ellipsis bold">Treatment.</p>
				</div>
				<p class="text-gray ellipsis mb-2 font-16">  <?php echo stripslashes($comments['treatment'][$n]); ?>
				</p> 
			  </div>
			    
			</div> <!-- ./ row -->
			 
			