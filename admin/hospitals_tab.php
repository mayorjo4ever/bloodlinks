		
		
		<?php 

		?>
		<div class="row"> 
			<div class="col-md-12">
				<div class="card"><div class="card-body">
				 <table class="table table-striped  " style=" "> 
					<thead>
						<tr class="bold table-info text-capitalize">
							<td> SN </td>
							<td> Name </td>						 
							<td> Address </td>						 
							<td> Contact No </td>						 
							<td> Manage</td>
						</tr>
					</thead>
					<tbody><?php $hospitals = $dbm->getFields($dbm->select('hospitals',array('status'=>'active')),array('sn','name','address','contact_no'));
						if(!is_null($hospitals)) { $m=0; 
							foreach($hospitals['name'] as $bodies){ 							
							?>
							<tr>
									<td class="serial"> <?php echo ($m+1); ?> </td>
									<td> <?php echo $bodies; ?> </td>	
									<td> <?php echo $hospitals['address'][$m]; ?> </td>	
									<td> <?php echo $hospitals['contact_no'][$m]; ?> </td>	 
									<td><div class="btn-group" role="group">
										<?php 
										$data_text =  $bodies."|".$hospitals['address'][$m]."|".$hospitals['contact_no'][$m]."|".$hospitals['sn'][$m]; ?>
										<button onclick="show_update_buttons(), manage_hospital_update($(this).attr('data-text'))" data-text="<?php echo $data_text;?>"  class=" btn btn-outline-warning border border-warning btn-rounded btn-md" data-toggle="modal" data-target="#new_hosital_modal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-pencil"> </i> </button>
										<button onclick="del_hospital($(this).attr('data-text'),$(this).attr('for'))" for="<?php echo base64_encode($hospitals['sn'][$m]); ?>" data-text=" <?php echo $data_text; ?>" class="del_hosp btn btn-outline-danger border border-danger btn-rounded btn-md"> <i class="fa fa-times"> </i> </button> 
										</div> 
									</td>
								</tr>
							<?php $m++; }
						} # end not null 
						else { ?>
							<tr> <td colspan="5" class=" text-warning h3 bold">  No Hospital Found !  </td></tr>
						<?php }  ?>
					 </tbody> 
				</table>
			 <p>&nbsp;</p>
			<button type="button" onclick=" " class="btn simple-btn btn-rounded btn-sm" data-toggle="modal" data-target="#new_hosital_modal"> <span class="btn btn-success btn-rounded btn-icons btn-lg"> <i class="fa fa-ambulance fa-2x"></i> </span> 
				&nbsp; <b> Create New  Hospital </b>
			</button>	
			</div> <!-- card--></div> <!-- card-body-->
			</div> <!-- col-md-12-->
		</div><!-- ./ row --> 