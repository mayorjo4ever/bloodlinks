<?php 
	 
?>
	
	<div class="row"> 
		<div class="col-md-12"> 
			<table class="table table-nogap"> 
				<thead>
					<tr class="bold table-info text-capitalize">
						<td> Sn </td>
						<td> Body Name </td>						 
						<td> Type </td>
						<td> Bank Name (To Remit) </td>
						<td> Account Name </td>
						<td> Account Number </td>
						<td> Manage</td>
					</tr>
				</thead>
				<tbody>
					<?php $paym_bodies = $dbm->getFields($dbm->select('salary_debit_bodies',array('status'=>'active')),array('sn','body_name','paym_type','bank_name_id','account_name','account_no'));
						if(!is_null($paym_bodies)) { $m=0; 
							foreach($paym_bodies['body_name'] as $bodies){ 
							$bank_info = $dbm->getFields($dbm->select('banks',array('sn'=>$paym_bodies['bank_name_id'][$m])),array('sn','name','icon','alias')); // bank_name_id
							?>
								<tr>
									<td> <?php echo ($m+1); ?> </td>
									<td> <?php echo $bodies; ?> </td>	
									<td class="text-capitalize"> <?php echo $paym_bodies['paym_type'][$m]; ?> </td>	
									<td> <img class="img" src="<?php echo "../assets/images/banks/".$bank_info['icon'][0].""; ?>"/>  &nbsp; <?php echo $bank_info['name'][0]; ?> </td>									
									<td> <?php echo $paym_bodies['account_name'][$m]; ?> </td>
									<td> <?php echo $paym_bodies['account_no'][$m]; ?> </td>
									<td> <div class="btn-group" role="group" style="border:none"> 
										<?php 
											$bank_val = base64_encode($bank_info['sn'][0]."|".$bank_info['alias'][0]); 
											$data_text =  $bodies."|".$bank_val.'|'.$paym_bodies['account_name'][$m].'|'.$paym_bodies['account_no'][$m]."|".$paym_bodies['sn'][$m]; ?>
										<button onclick="show_update_buttons(), manage_paym_bodies_update($(this).attr('data-text'))" data-text="<?php echo $data_text;?>"  class=" btn btn-outline-warning border border-warning btn-rounded btn-md" data-toggle="modal" data-target="#salary_scale_modal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-pencil"> </i> </button>
										<button onclick="del_paym_body($(this).attr('data-text'),$(this).attr('for'))" for="<?php echo base64_encode($paym_bodies['sn'][$m]); ?>" data-text="[ <?php echo $bodies." ] for ".$bank_info['alias'][0]; ?>" class="del-body-paym btn btn-outline-danger border border-danger btn-rounded btn-md"> <i class="fa fa-times"> </i> </button> </div> 
									</td>
								</tr>
							<?php $m++; }
						} # end not null 
						else { ?>
							<div class=" text-warning h4">  No bodies has been created yet.  </div>
						<?php } 
				?>
				</tbody>
				
			
			</table>
			 
			
			<p>&nbsp;</p>
			<button type="button" onclick="hide_update_buttons()" class="btn simple-btn btn-rounded btn-sm" data-toggle="modal" data-target="#salary_scale_modal"> <span class="btn btn-success btn-rounded btn-icons btn-lg"> <i class="fa fa-plus fa-2x"></i> </span> 
				&nbsp; Create New  
			</button>	
		</div>
	</div>