<?php 
	error_reporting(E_ALL^E_NOTICE);
	require_once "../config/config.php";
	require_once "../assets/php/dbTool.php";
	require_once "../assets/php/DBController.php";

	$dbm = new DbTool(); 
	$mydbm = new DBController(); 

	 function  get_custom_id(){		
            $mydbm = new DBController();
            $all =  $mydbm->runBaseQuery("SELECT count(id) AS tot from customer_info where id<>''");
            $newno =  ($all[0]['tot']+1);   
            $newpad = str_pad($newno,4,'0',STR_PAD_LEFT);
            return trim("BLCN/$newpad");  		  
		}

		$customers = $dbm->select("customer_info",['']); 
		foreach ($customers as $key => $value) {
			
			$id = get_custom_id(); 
			echo $dbm->updateTb("customer_info",['id'=>$id],['sn'=>$value['sn']]);

			echo "<br/>";
		}
	
	 
	
	?>