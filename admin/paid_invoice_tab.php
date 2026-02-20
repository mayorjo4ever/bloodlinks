<?php 
 
	?>		<div class="row"> 
			<div class="col-md-12">
				<div class="card"><div class="card-body">
				
					<table class="table table-striped table-responsive"> 
				<thead>
					<tr class="bold table-primary text-capitalize"> 
						<td> Invoice ##  </td>
						<td> Date Paid  </td> 
						<td> Hospital   </td> 
						<td> Total Cost  </td>
						<td> Discounts  </td>
						<td> Final Cost  </td>
						<td> Amount Paid  </td>
						<td> Balance </td>
						<td> Account Disbursed  </td>
						<td> Date Prepared </td>						 
					</tr>
				</thead> 
				<tbody>
					<?php $invoices = $dbm->getFields($dbm->select('hospital_invoice_report',array('status'=>'active','paym_completed'=>'yes')),$mydal->TableFields('hospital_invoice_report'));
						if(!is_null($invoices)) { $m=0;  
                                                       // print "<pre>";   print_r($invoices);  print "</pre>";  
							foreach($invoices['hosp_id'] as $hosp_id){ 
                                                         $hosp_fields = $mydal->TableFields('hospitals'); 
							$hosp_info = $dbm->select('hospitals',array('sn'=>$hosp_id)); // ,'status'=>'active'
							$acct_info =  $dbm->getFields($dbm->select('accounts',array('sn'=>$invoices['acct_id'][$m],'status'=>'active')),array('bank_id','account_no','account_name','staff_id'));
							$bank_info = $dbm->getFields($dbm->select('banks',array('sn'=>$acct_info['bank_id'][0])),array('name','sn','alias','icon','address'));
							$tickets = $dbm->getFields($dbm->select('hospital_invoice',array('status'=>'active','invoice_no'=>$invoices['invoice_no'][$m])),array('sn','hosp_id','invoice_no','ticket_no','c_by','date_c','time_c'));
							$url = "a=".base64_encode($invoices['invoice_no'][$m]);
							$url.="&b=".base64_encode("no"); 
							?>
								<tr>  <?php ## $data_text = $invoices['invoice_no'][$m]."|".$hosp_info['name'][0]."|&#8358; ".number_format($invoices['total_cost'][$m])."|&#8358; ".number_format($invoices['discount'][$m])."|&#8358; ".number_format($invoices['total_cost'][$m]-$invoices['discount'][$m])."|&#8358; ".number_format($invoices['amount_paid'][$m]);
                                                                             $data_text = @$invoices['invoice_no'][$m]."|".@$hosp_info['name'][0]."|&#8358; ".(@$invoices['total_cost'][$m])."|&#8358; ".(@$invoices['discount'][$m])."|&#8358; ".(@$invoices['total_cost'][$m]-@$invoices['discount'][$m])."|&#8358; ".(@$invoices['amount_paid'][$m]);?>
									<td> <a href="<?php echo "inv_print.php?".$url; ?>" target="_blank" class="unstyle btn btn-info btn-rounded"> <span class="fa fa-print font-24 pointer "> </span>  <?php echo "<b class='font-16'>".$invoices['invoice_no'][$m]."</b>"; ?> </a>  </td>
									<td> <a href="#" class="btn btn-success btn-rounded"><span class="fa fa-check font-24 pointer "> </span>  <?php echo $invoices['date_paid'][$m]; ?> </a></td>
                                                                        <td> <?php print_r(@$hosp_info[0]['name'])."</b> <br/>(".!empty($tickets)?count($tickets['ticket_no']):"0"." Patients)"; ?> </td>																		
									<td> <?php echo "&#8358; ".@number_format($invoices['total_cost'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".@number_format($invoices['discount'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".@number_format($invoices['total_cost'][$m]-$invoices['discount'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".@number_format($invoices['amount_paid'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".@number_format($invoices['total_cost'][$m]-$invoices['discount'][$m]-$invoices['amount_paid'][$m]); ?> </td>
									<td> <?php echo $acct_info['account_name'][0]."<br/>".$acct_info['account_no'][0]."<br/>".$bank_info['name'][0]; ?> </td>
									<td> <?php echo $func->format_date($invoices['date_c'][$m])."<br/>".$func->format_date($invoices['time_c'][$m],'time'); ?> </td> 									  
								</tr>
							<?php $m++; }
						} # end not null 
						else { ?>
							<tr><td colspan="7" align="center"> <span class="h4 text-warning"> No Unpaid Invoice </span>  </td></tr>
						<?php } 
				?>
				</tbody> 
			</table>
					
				</div> <!-- card--></div> <!-- card-body-->
			</div> <!-- col-md-12-->
		</div><!-- ./ row -->