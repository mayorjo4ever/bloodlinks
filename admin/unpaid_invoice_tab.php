<?php 

		?>
		<div class="row"> 
			<div class="col-md-12">
				<div class="card"><div class="card-body">
				
					<table class="table table-striped table-responsive"> 
				<thead>
					<tr class="bold table-primary text-capitalize"> 
						<td> Invoice ##  </td>
						<td> Pay Balance  </td> 
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
					<?php $invoices = $dbm->getFields($dbm->select('hospital_invoice_report',array('status'=>'active','paym_completed'=>'no')),$mydal->TableFields('hospital_invoice_report'));
							$hosp_fields = $mydal->TableFields('hospitals'); 
							$accounts_fields = $mydal->TableFields('accounts'); 
							$banks_fields = $mydal->TableFields('banks'); 
							$tickets_fields = $mydal->TableFields('hospital_invoice'); 
							# echo "<pre>";
							# print_r($invoices);
							# print_r($mydal->TableFields('hospitals'));
							# echo "</pre>";
						
						if(!is_null($invoices)) { $m = 0; 
							foreach($invoices['hosp_id'] as $hosp_id){ 
							$hosp_info = $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id,'status'=>'active')),$hosp_fields); // 
							$acct_info =  $dbm->getFields($dbm->select('accounts',array('sn'=>$invoices['acct_id'][$m],'status'=>'active')),$accounts_fields);
							$bank_info = $dbm->getFields(@$dbm->select('banks',array('sn'=>$acct_info['bank_id'][0])),$banks_fields);
							$tickets = $dbm->getFields(@$dbm->select('hospital_invoice',array('status'=>'active','invoice_no'=>$invoices['invoice_no'][$m])),$tickets_fields);
							$url = "a=".base64_encode($invoices['invoice_no'][$m]);
							$url.="&b=".base64_encode("no"); 
							$url2 = $url;
							?>
								<tr>  <?php $data_text = $invoices['invoice_no'][$m]."|".$hosp_info['name'][0]."|&#8358; ".number_format($invoices['total_cost'][$m])."|&#8358; ".number_format($invoices['discount'][$m])."|&#8358; ".number_format($invoices['total_cost'][$m]-$invoices['discount'][$m])."|&#8358; ".number_format($invoices['amount_paid'][$m])."|&#8358; ".number_format($invoices['balance'][$m]);?>
									<td> 
                                                                            <a href="<?php echo "inv_print.php?".$url; ?>" target="_blank" class="unstyle btn btn-info btn-rounded"> <span class="fa fa-print font-24 pointer "> </span>    <?php echo "<b class='font-16'>".$invoices['invoice_no'][$m]."</b>"; ?> </a>  
                                                                            <a href="<?php echo "ticket_invoice_upd.php?".$url2; ?>" target="_blank" class="unstyle btn btn-warning btn-rounded"> <span class="fa fa-pencil font-24 pointer "> </span> <b> Modify </b> </a>  
                                                                            </td>
									<td> <a href="#" data-text="<?php echo $data_text;  ?>" data-toggle="modal" data-target="#invoice_payment_modal" onclick="set_invoice_payment($(this).attr('data-text'))" class="btn btn-success btn-rounded btn-lg "> <?php echo " <b>  Pay &#8358; ".number_format($invoices['total_cost'][$m]-$invoices['discount'][$m] - $invoices['amount_paid'][$m])."</b> "; ?> </a> </td>
                                                                        <td> <?php print $hosp_info['name'][0]."</b> <br/>(".count($tickets['ticket_no'])." Patients)"; ?> </td>																		
									<td> <?php echo "&#8358; ".number_format($invoices['total_cost'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".number_format($invoices['discount'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".number_format($invoices['total_cost'][$m]-$invoices['discount'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".number_format($invoices['amount_paid'][$m]); ?> </td>
									<td> <?php echo "&#8358; ".number_format($invoices['total_cost'][$m]-$invoices['discount'][$m]-$invoices['amount_paid'][$m]); ?> </td>
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