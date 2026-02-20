
	<div class="row"> 
		<div class="col-md-12"> 
			<table class="table table-nogap" style="width:80%"> 
				<thead>
					<tr class="bold table-info text-capitalize">
						<td> SN </td>
						<td> Name </td>						 
						<td> Manage</td>
					</tr>
				</thead>
				<tbody>
					<?php $allow_bodies = $dbm->getFields($dbm->select('salary_allowance_bodies',array('status'=>'active')),array('sn','name'));
						if(!is_null($allow_bodies)) { $m=0; 
							foreach($allow_bodies['name'] as $bodies){ 							
							?>
								<tr>
									<td class="serial"> <?php echo ($m+1); ?> </td>
									<td> <?php echo $bodies; ?> </td>	
									 <td><div class="btn-group" role="group">
										<?php 
										$data_text =  $bodies."|".$allow_bodies['sn'][$m]; ?>
										<button onclick="show_update_buttons(), manage_credit_allow_bodies_update($(this).attr('data-text'))" data-text="<?php echo $data_text;?>"  class=" btn btn-outline-warning border border-warning btn-rounded btn-md" data-toggle="modal" data-target="#salary_allowance_modal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-pencil"> </i> </button>
										<button onclick="del_allowance($(this).attr('data-text'),$(this).attr('for'))" for="<?php echo base64_encode($allow_bodies['sn'][$m]); ?>" data-text="[ <?php echo $bodies." ] for ".$bank_info['alias'][0]; ?>" class="del-body-paym btn btn-outline-danger border border-danger btn-rounded btn-md"> <i class="fa fa-times"> </i> </button> 
										</div> 
									</td>
								</tr>
							<?php $m++; }
						} # end not null 
						else { ?>
							<tr> <td colspan="3" class=" text-warning font-16 bold">  No allowance has been created yet.  </td></tr>
						<?php } 
				?>
				</tbody> 
			</table>
			 
			
			<p>&nbsp;</p>
			<button type="button" onclick="hide_update_buttons()" class="btn simple-btn btn-rounded btn-sm" data-toggle="modal" data-target="#salary_allowance_modal"> <span class="btn btn-success btn-rounded btn-icons btn-lg"> <i class="fa fa-plus fa-2x"></i> </span> 
				&nbsp; Create New  Allowance
			</button>	
		</div>
	</div>