<?php 	
	# fetch_pending_stock_data
		
		if(!isset($_SESSION['user_save_mode']))  $_SESSION['user_save_mode'] = "new";
		
		 $dbm = new DbTool(); 
		 switch($_SESSION['user_save_mode']){
			case "new": { 
				$prev_rec = $dbm->getFields($dbm->select('patients',
					array('finalized'=>'no','c_by'=>$_SESSION['admUser'])),
					array('surname','firstname','othername','gender','dob','address'));
				##
				if(!is_null($prev_rec)){
					$prev_rec = $dbm->resort($prev_rec); 
					/**$_SESSION['surname'] = $prev_rec['surname'];
					$_SESSION['firstname'] = $prev_rec['firstname'];
					$_SESSION['othername'] = $prev_rec['othername']; # ."|".$prev_rec['categ_id']."|".$prev_rec['categ_type_id'];			 
					$_SESSION['gender'] = $prev_rec['gender'];						
					$_SESSION['dob'] =  $prev_rec['dob']; 
					$_SESSION['address'] = $prev_rec['address']; 	***/
				}

			} break; ## end new 
			case "update": {
				

			} break; ## end update 
			 
		 }
		 
			# print_r($prev_rec); 
		
	?>