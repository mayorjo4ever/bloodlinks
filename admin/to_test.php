
	<select class="form-control" onchange="printme($(this).val())" >  
		<option value=""> print option ... </option>
		<?php 
			$cond = array('ticket_no'=>$rows[$k]['ticket_no'],'finalized'=>'yes','process_completed'=>'yes','status'=>'active'); 
			$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample')); 
			 if(count($specimens['bill_type_id'])>1) {  ?>
			<option value="<?php echo "tick_print_preview.php?r_val=".base64_encode($rows[$k]['ticket_no'])."&pc=".base64_encode('yes')."&ss=".base64_encode(time());?>"> Print Combined Result </option>
			<?php  } # end combined  
			## print sigles 
			$n = 0;  foreach($specimens['bill_type_id'] as $serial){ 
			$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
			 ?> 
			<option value="<?php echo "tick_print_preview.php?r_val=".base64_encode($rows[$k]['ticket_no'])."&pc=".base64_encode('yes')."&ss=".base64_encode(time())."&pop=".base64_encode('single')."&bsr=".base64_encode($serial); ?>"> <?php echo "Print ". $bill_type['name'][0]; ?></option>
			<?php } # end foreach ?>
	</select> 