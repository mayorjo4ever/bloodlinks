<?php 
	 
?>
	
	<div class="row"> 
		<div class="col-md-12"> 
			<div class="card"><div class="card-body">
			<table class="table table-striped"> 
				<thead>
					<tr class="bold table-info text-capitalize">
						<td> Sn </td> 
						<td> Staff ID  </td>
						<td> Bank Name  </td>
						<td> Account Name </td>
						<td> Account Number </td>
						<td> Default  </td>
						<td> Manage</td>
					</tr>
				</thead> 
				<tbody>
					<?php $accounts = $dbm->getFields($dbm->select('accounts',array('status'=>'active')),array('sn','staff_id','bank_id','account_name','account_no'));
						if(!is_null($accounts)) { $m=0; 
							foreach($accounts['account_name'] as $bodies){ 
							$bank_info = $dbm->getFields($dbm->select('banks',array('sn'=>$accounts['bank_id'][$m])),array('sn','name','icon','alias')); // bank_name_id
							// $staff_info = $dbm->getFields($dbm->select('banks',array('sn'=>$accounts['bank_id'][$m])),array('sn','name','icon','alias')); // bank_name_id
							?>
								<tr>
									<td> <?php echo ($m+1); ?> </td>
									<td> <?php echo $accounts['staff_id'][$m]; ?> </td>
									 <td> <img class="img" src="<?php echo "../assets/images/banks/".$bank_info['icon'][0].""; ?>"/>  &nbsp; <?php echo $bank_info['name'][0]; ?> </td>									
									<td> <?php echo $accounts['account_name'][$m]; ?> </td>
									<td> <?php echo $accounts['account_no'][$m]; ?> </td>
									<td> Yes </td>
									<td> <div class="btn-group" role="group" style="border:none"> 
										<?php 
											$bank_val = base64_encode($bank_info['sn'][0]."|".$bank_info['alias'][0]); 
											$data_text =  $accounts['staff_id'][$m]."|".$bank_val.'|'.$accounts['account_name'][$m].'|'.$accounts['account_no'][$m]."|".$accounts['sn'][$m]; ?>
										<button onclick="show_update_buttons(), manage_accounts_update($(this).attr('data-text'))" data-text="<?php echo $data_text;?>"  class=" btn btn-outline-warning border border-warning btn-rounded btn-md" data-toggle="modal" data-target="#bank_account_modal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-pencil"> </i> </button>
										<button onclick="del_bank_account($(this).attr('data-text'),$(this).attr('for'))" for="<?php echo base64_encode($accounts['sn'][$m]); ?>" data-text="[ <?php echo $bodies." ] ".$bank_info['alias'][0]." Account "; ?>" class="del-bank-account btn btn-outline-danger border border-danger btn-rounded btn-md"> <i class="fa fa-times"> </i> </button> </div> 
									</td>
								</tr>
							<?php $m++; }
						} # end not null 
						else { ?>
							<tr><td colspan="7" align="center"> <span class="h4 text-warning"> No Account Exists </span>  </td></tr>
						<?php } 
				?>
				</tbody> 
			</table>
			 
			
			<p>&nbsp;</p>
			<button type="button" onclick="hide_update_buttons()" class="btn simple-btn btn-rounded btn-sm" data-toggle="modal" data-target="#bank_account_modal"> <span class="btn btn-success btn-rounded btn-icons btn-lg"> <i class="fa fa-plus fa-2x"></i> </span> 
				&nbsp;  <b> Create New  Account  &nbsp;  </b>
			</button>	
		</div> </div>
		</div>
	</div>