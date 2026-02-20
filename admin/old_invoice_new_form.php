 
			<div class="row">
				
				<div class="col-md-12 ">  
				
				 <span class=" h5 text-success bold"> Existing Customers in the invoice for <?php echo $_SESSION['hosp_name']; ?> </span>
					<table class="table table-striped table-bordered "> 
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllExisting()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Name / Address / Date </td> 
								<td> Test Performed </td> 
								<td> Total Cost </td> 
								<td> Amount Paid </td> 
							</tr> 
						</thead> <tbody> 
					<?php  $t_cost = 0; $pd = 0; 
					if(is_null($selected_tickets)) { $m=0;  
								$t_cost = array_sum($selected_tickets['total_cost']);
								$pd = array_sum($selected_tickets['amount_paid']);
									
							foreach($selected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									}
									$dated = $func->format_date($selected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($selected_tickets['time_c'][$m],'time');
									?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" value="<?php echo $ticket_no; ?>" class="checkbox exist_checkbox" name="exist_checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo "<b>".$selected_tickets['fullname'][$m]."</b><br/>@  ".$selected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($selected_tickets['alt_test_name'][$m]=="")?$bill_name:$selected_tickets['alt_test_name'][$m]; ?></td> 
								<td> <?php echo  "&#8358; ".number_format($selected_tickets['total_cost'][$m]); ?> </td> 
								<td> <?php echo "&#8358; ".number_format($selected_tickets['amount_paid'][$m]); ?> </td> 
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							
								
							<tr>
								<td colspan="4"> 
									 <button disabled type="button" onclick="remove_customer($(this).attr('for'))"   for="<?php echo $_SESSION['hosp_id']; ?>" class="btn btn-danger btn-rounded btn-lg remove-customer" name="remove-customer"> Remove <span class="exist_count"> 0 </span> Customer  &nbsp;   <i class="fa fa-times-circle font-20"></i> </button>
									  &nbsp; &nbsp; 
									 <button type="button" data-toggle="modal" data-target="#account_selection_modal" onclick="create_invoice($(this).attr('for'))" for="<?php echo $_SESSION['hosp_id']."| &#8358; ".number_format($t_cost); ?>" class="btn btn-success btn-rounded btn-lg add-customer" name="add-customer"> Create Invoice for ( <?php echo count($selected_tickets['ticket_no'])?> ) Customers &nbsp;  <i class="fa fa-send font-20"></i> </button>
								 </td>
								 <td class="bold">
										<?php echo "&#8358; ".number_format($t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($pd);?>
								 </td> 
							</tr>
							
							<tr>
								<td colspan="6" class="bold font-20 text-capitalize" align="right"> 
									 <?php echo $func->num_to_word($t_cost)." Naira Only "?>
								 </td>
							</tr>
							
							<?php 
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody>
							
						</table> 
						</div> 
						
						<div class="col-md-12 "> 
						 
						<p>&nbsp; </p>
						<table class="table table-striped table-bordered"> 					
						<span class=" h5 text-danger bold"> Non-Existing Customers in the invoice for <?php echo $_SESSION['hosp_name']; ?>  </span>
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllUsers()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Name / Address / Date  </td> 
								<td> Test Performed </td> 
								<td> Total Cost </td> 
								<td> Amount Paid </td> 
							</tr> 
						</thead> <tbody> 
					<?php   
						if(is_null($unselected_tickets)) { $un_t_cost = 0; $un_pd = 0;  $m=0; 
									$un_t_cost = array_sum($unselected_tickets['total_cost']);
									$un_pd = array_sum($unselected_tickets['amount_paid']);
									
							foreach($unselected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									$dated = $func->format_date($unselected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($unselected_tickets['time_c'][$m],'time');
									} ?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" value="<?php echo $ticket_no; ?>" class="checkbox stud_box" name="checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo "<b>".$unselected_tickets['fullname'][$m]." </b> <br/>@  ".$unselected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($unselected_tickets['alt_test_name'][$m]=="")?$bill_name:$unselected_tickets['alt_test_name'][$m]; ?></td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['total_cost'][$m]); ?> </td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['amount_paid'][$m]); ?> </td> 
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							<tr>
								<td colspan="4"> 
									<button disabled type="button" onclick="add_customer($(this).attr('for'))" for="<?php echo $_SESSION['hosp_id']; ?>" class="btn btn-primary btn-rounded btn-lg add-customer" name="add-customer"> Add <span class="count"> 0 </span> Customers  To Invoice &nbsp;   <i class="fa fa-plus-circle fa-2x"></i></button>
								</td>
								<td class="bold">
										<?php echo "&#8358; ".number_format($un_t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($un_pd);?>
								 </td>
							</tr>
							<tr>
								<td colspan="6" class="bold font-20 text-capitalize" align="right"> 
									 <?php echo $func->num_to_word($un_t_cost)." Naira Only "?>
								 </td>
							</tr>
							<?php  
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody> 
					</table> 	 
				</div> <!-- col-md-12 -->
				
			</div> 