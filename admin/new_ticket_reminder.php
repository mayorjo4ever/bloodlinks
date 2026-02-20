<?php 	
	# fetch_pending_ticket_data
		
		if(isset($_REQUEST['md'])) { # modify 
		$_SESSION['ticket_mode'] = base64_decode($_REQUEST['md']); 
		$_SESSION['ticket_no'] = base64_decode($_REQUEST['r_val']); 
		$_SESSION['process_completed'] = base64_decode($_REQUEST['pc']); 
		 
		}		
		else if(!isset($_SESSION['ticket_mode']))  $_SESSION['ticket_mode'] = "new";
		 
		 $dbm = new DbTool(); 
		 switch($_SESSION['ticket_mode']){
			case "new": { 
				$prev_rec = $dbm->getFields($dbm->select('customer_tickets', array('finalized'=>'no','c_by'=>$_SESSION['admUser'])),
				$mydal->TableFields('customer_tickets'));
				if(!is_null($prev_rec)){ $prev_rec = $dbm->resort($prev_rec);   }
			} break; ## end new 
			case "update": { 
				$prev_rec = $dbm->getFields($dbm->select('customer_tickets', array('finalized'=>'yes','ticket_no'=>$_SESSION['ticket_no'],'process_completed'=>'no')),
					$mydal->TableFields('customer_tickets'));
				if(!is_null($prev_rec)){ $prev_rec = $dbm->resort($prev_rec);  }
			 break; ## end update 
		 } # end switch 
		 } 		 
		# print_r($prev_rec); 
		
	?>