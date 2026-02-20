		
		
		<?php 

		?>
		<div class="row"> 
			<div class="col-md-12">
				<div class="card"><div class="card-body">
				
					<table class="table table-striped"> 
				<thead>
					<tr class="bold table-primary text-capitalize">
						<td> Sn </td> 
						<td> Invoice ##  </td>
						<td> Hospital   </td> 
						<td> Total Cost  </td>
						<td> Account Disbursed  </td>
						<td> Date Prepared </td>
						<td> Print  </td>
						<td> Pay </td>
					</tr>
				</thead> 
				<tbody>
					<?php $invoices = $dbm->getFields($dbm->select('hospital_invoice_report',array('status'=>'active')),array('sn','hosp_id','invoice_no','acct_id','total_cost','c_by','date_c','time_c'));
						if(!is_null($invoices)) { $m=0; 
							foreach($invoices['hosp_id'] as $hosp_id){ 
							$hosp_info = $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id,'status'=>'active')),array('sn','name','address','contact_no')); // 
							$acct_info =  $dbm->getFields($dbm->select('accounts',array('sn'=>$invoices['acct_id'][$m],'status'=>'active')),array('bank_id','account_no','account_name','staff_id'));
							$bank_info = $dbm->getFields($dbm->select('banks',array('sn'=>$acct_info['bank_id'][0])),array('name','sn','alias','icon','address'));
							$tickets = $dbm->getFields($dbm->select('hospital_invoice',array('status'=>'active','invoice_no'=>$invoices['invoice_no'][$m])),array('sn','hosp_id','invoice_no','ticket_no','total_cost','c_by','date_c','time_c'));
							$url = "a=".base64_encode($invoices['invoice_no'][$m]);
							$url.="&b=".base64_encode("no"); 
							?>
								<tr>
									<td> <?php echo ($m+1); ?> </td>
									<td> <?php echo "<b class='font-16'>".$invoices['invoice_no'][$m]; ?> </td>
									<td>  <?php echo $hosp_info['name'][0]."</b> <br/>(".count($tickets['ticket_no'])." Patients)"; ?> </td>																		
									<td> <?php echo "&#8358; ".number_format($invoices['total_cost'][$m]); ?> </td>
									<td> <?php echo $acct_info['account_name'][0]."<br/>".$acct_info['account_no'][0]."<br/>".$bank_info['name'][0]; ?> </td>
									<td> <?php echo $func->format_date($invoices['date_c'][$m])."<br/>".$func->format_date($invoices['time_c'][$m],'time'); ?> </td> 
									<td> <a href="<?php echo "inv_print.php?".$url; ?>" target="_blank" class="unstyle"><span class="fa fa-print font-24 pointer "> </span> </a> </td>
									<td> <span class="fa fa-money font-24 pointer text-info"> </span> </td>
								</tr>
							<?php $m++; }
						} # end not null 
						else { ?>
							<tr><td colspan="7" align="center"> <span class="h4 text-warning"> No Account Exists </span>  </td></tr>
						<?php } 
				?>
				</tbody> 
			</table>
					
				</div> <!-- card--></div> <!-- card-body-->
			</div> <!-- col-md-12-->
		</div><!-- ./ row -->