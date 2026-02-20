<?php 
 
	error_reporting(E_ALL^E_NOTICE);
	if(!isset($_SESSION)) session_start(); 
	require_once "../assets/php/dbTool.php"; 
	## parameters = $editor = "biodata_edit_interface.php?md=".base64_encode('update')."tp=".base64_encode('host')."sn=".base64_encode($data['sn']);
	$mode = base64_decode($_REQUEST['md']);	## update 
	$type = base64_decode($_REQUEST['tp']);	## type : host 
	$sn = base64_decode($_REQUEST['sn']);	## sn : upd_sn
	
	$dbm = new Dbtool(); 
	$patient = $dbm->getFields($dbm->select("patients",array("type"=>$type,'sn'=>$sn)),array('phone','state','lga','gender','surname','firstname','fullname','sn','hosp_no','othername','dob','category','title','psp','psp_dir',
					'nokphone','address','nokname','nokrelationship')); //  
	if(is_null($patient)){
		echo "<script> alert('invalid parameters'); window.location.href='index.php' </script> "; 
	}
	else {
		$patient = $dbm->resort($patient);
		 $_SESSION['title'] = $patient['title'];
		 $_SESSION['surname'] = $patient['surname']; 
		 $_SESSION['firstname'] = $patient['firstname'];
		 $_SESSION['othername'] = $patient['othername'];
		 $_SESSION['dob'] = $patient['dob'];
		 $_SESSION['phone'] = $patient['phone'];
		 $_SESSION['mystate'] = $patient['state'];
		 $_SESSION['mylga'] = $patient['lga'];
		 $_SESSION['gender'] = $patient['gender'];
		 $_SESSION['hosp_no'] = $patient['hosp_no'];		
		 $_SESSION['pcategory'] = $patient['category'];
		 $_SESSION['temp_img'] = (file_exists($patient['psp_dir']."".$patient['psp']))?$patient['psp']:"images/users/default-user.png";  
		##################################################	 
		 $_SESSION['upd_sn'] = $patient['sn']; 
		 $_SESSION['fullname'] =   $fullname =  $_SESSION['surname']." ".  $_SESSION['firstname']." ".  $_SESSION['othername'];
		##################################################	 
		  $_SESSION['address'] =  $patient['address'];
		  $_SESSION['nokName'] =  $patient['nokname'];
		  $_SESSION['nokRelation'] =  $patient['nokrelationship'];
		  $_SESSION['nokPhone'] = $patient['nokphone'];
		##################################################	 
		 header("Location:newpatient.php");


	}
	
		
		 	
		


	



?>