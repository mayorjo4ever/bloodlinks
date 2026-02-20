<?php 
 
	if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE);
		require "../assets/php/dbTool.php";
		 if(!isset($_REQUEST['refn']) || !isset($_REQUEST['nm'])|| !isset($_REQUEST['mode'])) {
			echo "<script> alert('Parameters not correct'); window.location.href='patients.php'; </script>";
		}
		else{
			$_SESSION['ref_id'] = $refno = base64_decode($_REQUEST['refn']);		
			$_SESSION['hst_name'] = $hst_name = base64_decode($_REQUEST['nm']);
			$_SESSION['sib_mode'] = $sib_mode = base64_decode($_REQUEST['mode']); # for new or update 
			$_SESSION['sib_upd_sn'] = $sib_upd_sn = base64_decode($_REQUEST['sun']); #  
			$_SESSION['add_sibling'] = true; 
		 ##################################################	 
		 if($_SESSION['sib_mode']=="update"){
			 	 $dbm = new DbTool();		 
				 ##################################################		
				$mysib = $dbm->resort($dbm->getFields($dbm->select('patients_siblings',array('sn'=>$_SESSION['sib_upd_sn'])),
					array('surname','firstname','othername','dob','phone','gender','type')));
					$_SESSION['surname'] =  $mysib['surname']; 
					$_SESSION['firstname'] =  $mysib['firstname'];
					$_SESSION['othername'] =  $mysib['othername'];
					$_SESSION['sib_dob'] =  $mysib['dob'];
					$_SESSION['phone'] =  $mysib['phone'];
					$_SESSION['gender'] =  $mysib['gender'];
					$_SESSION['sib_type'] = $mysib['type'];
				## 
		 }
		  ##################################################	 
		 if($_SESSION['sib_mode']=="new"){
			 	 $dbm = new DbTool();		 
				 ##################################################		
				$parent = $dbm->resort($dbm->getFields($dbm->select('patients',array('hosp_no'=>$_SESSION['ref_id'])),
					array('surname','firstname','othername','dob','phone','gender','type')));
					$_SESSION['surname'] =  $parent['surname']; 
					$_SESSION['firstname'] =  "";
					$_SESSION['othername'] =  "";
					$_SESSION['sib_dob'] =  "";
					$_SESSION['phone'] =  "";
					$_SESSION['gender'] =  "";
					$_SESSION['sib_type'] = "";
				## 
		 }
		 
		 header("Location:add_patient_sib.php");

		}
		
		 
		 
	?>	 