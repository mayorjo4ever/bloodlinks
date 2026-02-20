<?php 

	 # if(!isset($_SESSION['datefrom']) or !isset($_SESSION['dateto'])) $_SESSION['datefrom'] = $_SESSION['dateto'] = date('Y-m-d');
	 
	   if(isset($_POST['start-invoice'])){  		
		$_SESSION['hosp_id'] = $_POST['hosp_id'];
		$_SESSION['datefrom'] = $_POST['datefrom'];
		$_SESSION['dateto'] = $_POST['dateto'];
		 
		$hosp = $dbm->getFields($dbm->select('hospitals',array('sn'=>$_SESSION['hosp_id']),array('name'),'and','asc'),array('name','sn','address','contact_no')); 
		
		$_SESSION['hosp_name'] = $hosp['name'][0];
		$criterial = array('status'=>'active','payment_completed'=>'no'); 
		$fields = array('c_by','sn','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','paym_fin_by','paym_date_fin','paym_time_fin','date_fin','time_fin','comment','alt_test_name','payment_completed');
		$table1 = "customer_tickets";
		$table2 = "hospital_invoice";
		$where1 = array('status'=>'active','payment_completed'=>'no');	# customer table - where payment not completed 
		$where2 = array('status'=>'active'); 							# hospital_invoice table 
		$where2A = array('status'=>'active','hosp_id'=>$_SESSION['hosp_id'],'inv_prepared'=>'no'); # 'inv_prepared'=>'no' : to exempt : existing hospital id and invoice already prepared before 
		$whereEq = array('ticket_no');									# comparison of primary key : ticket no 
		
		$_SESSION['selected_tickets'] = $dbm->getFields($dbm->exists($table1,$table2,$where1,$where2A,$whereEq),$fields);
		$_SESSION['unselected_tickets'] = $dbm->getFields($dbm->not_exists($table1,$table2,$where1,$where2,$whereEq),$fields);
		 
		 
		 
	 }
 
 
?>