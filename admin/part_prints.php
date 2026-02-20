<?php  
  include "formsubmit.php"; 

					$ticket_no = $dbm->clean(base64_decode($_REQUEST['r_val'])); $spec_code = explode(',',$_REQUEST['spc']); // yes
											## validate 
						$criterial = array('ticket_no'=>$ticket_no,'status'=>'active'); 						
						$custom_info = $dbm->getFields($dbm->select('customer_tickets',$criterial),$mydal->TableFields('customer_tickets'));
						 if(is_null($custom_info)) { echo "<script> alert('Invalid Parameters'); window.location.href='tickets.php';  </script> "; }
						 else $custom_ticket_id = $dbm->resort($custom_info);
						 /*****************************************/
					
	echo $ticket_no;  $bill_id = [];  echo "<br/>";
	if(!empty($spec_code))foreach($spec_code as $bill_code){ 
		$strings[]= "bill_type_id='".base64_decode($bill_code)."'";
	} 
	echo $whereSql = "SELECT * FROM customer_specimen WHERE ticket_no ='".$ticket_no."' AND ( ".implode(" OR ", $strings)." )";
	$result = $mydbm->runBaseQuery($whereSql); echo "<br/>";
	$result = $dbm->getFields($result,$mydal->TableFields('customer_specimen'));
	
	
	echo "<pre>";
	print_r($result);
	echo "</pre>"; 
	?>
 