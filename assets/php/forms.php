<?php 
	error_reporting(E_ALL^E_NOTICE);
	require_once "../../config/config.php";
	require_once "dbTool.php";
	require_once "User_1.php";
	require_once "pdo_dal.php";
	
	$mydal = new DAL();  $dbm = new DbTool();  
	/*********************************************************/

		// first check up  -- login users 
		
	/*****************************************/		 
		
		if(isset($_POST['CheckUser'])){
			 $user_id = $dbm->clean($_POST['username']);
			  $loop = $dbm->getFields($dbm->select("users",array('user_id'=>$user_id,'acct_status'=>'active')),$mydal->TableFields('users'));
			  if(empty($loop)) echo false; 
			  else if(count($loop['user_id'])==1) echo true; 	 
			 	
				/**
				if(count($loop)==0) 	
					echo false;
						else if(count($loop)==1)	echo true; 		
					**/
			} 

		/*****************************************/		 
		
		if(isset($_POST['CheckPass'])){
			$user_id = $dbm->clean($_POST['username']);	
			$psw = $dbm->clean($_POST['psw']);
			// $user_Pc = gethostname(); 
			$ip = $_SERVER['REMOTE_ADDR'];
			$user_Pc = gethostbyaddr($ip);
			 
				$loop = $dbm->getFields($dbm->select("users",array('user_id'=>$user_id,'acct_status'=>'active')),$mydal->TableFields('users'));
				  ## try new password ##
					if(!empty($loop) && count($loop['user_id'])==1){
						if($loop['hash_psw'][0] !=""){
							if(password_verify($psw,$loop['hash_psw'][0])){ # valid password
								session_regenerate_id(); 
								$_SESSION['admUser'] = $user_id;
								$_SESSION['admKey'] = $psw;
								$_SESSION['loginTime'] = time();
								$_SESSION['logTimeOut'] = (time()+ (15*60));						
								
								$admin = new User("users");	
								$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
								$_SESSION['my_cur_role_id'] = $myroles['role_id'][0];
								$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
								$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id				
								$dbm->updateTb("users",array("pc_name"=>$user_Pc,"pc_ip"=>$ip,"online"=>"on","online_icon"=>"fa fa-circle text-success"),array("user_id"=>$_SESSION['admUser']));	
								#####################################
								echo json_encode(array(true,"admin/"));
							} 
							else { # invalid password
								 echo json_encode(array(false,"no address")); 
							}
						} # end new password 
						else {
							if(md5($psw)==$loop['enc_psw'][0]){ # valid password
								session_regenerate_id(); 
								$_SESSION['admUser'] = $user_id;
								$_SESSION['admKey'] = md5($psw);
								$_SESSION['loginTime'] = time();
								$_SESSION['logTimeOut'] = (time()+ (15*60));						
								
								$admin = new User("users");	
								$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
								$_SESSION['my_cur_role_id'] = $myroles['role_id'][0];
								$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
								$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id				
								$dbm->updateTb("users",array("pc_name"=>$user_Pc,"pc_ip"=>$ip,"online"=>"on","online_icon"=>"fa fa-circle text-success"),array("user_id"=>$_SESSION['admUser']));	
								#####################################
								$hash_psw = password_hash($psw,PASSWORD_DEFAULT);
								#$dbm->updateTb('users',array('password'=>'','enc_psw'=>'','hash_psw'=>$hash_psw),array('user_id'=>$_SESSION['admUser']));
								$dbm->updateTb('users',array('hash_psw'=>$hash_psw),array('user_id'=>$_SESSION['admUser']));
								#####################################
								echo json_encode(array(true,"admin/"));
							} 
							else { # invalid password
								 echo json_encode(array(false,"new address needed")); 
							}
						}
						## now try old password 
						
					}
					
					/***
					
					if(empty($loop)) echo json_encode(array(false,"")); 
					else if(!empty($loop) && count($loop['user_id'])==1) {
						session_regenerate_id(); 
						$_SESSION['admUser'] = $user_id;
						$_SESSION['admKey'] = md5($psw);
						$_SESSION['loginTime'] = time();
						$_SESSION['logTimeOut'] = (time()+ (15*60));						
						
						$admin = new User("users");	
						$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
						$_SESSION['my_cur_role_id'] = $myroles['role_id'][0];
						$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
						$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id				
						$dbm->updateTb("users",array("pc_name"=>$user_Pc,"pc_ip"=>$ip,"online"=>"on","online_icon"=>"fa fa-circle text-success"),array("user_id"=>$_SESSION['admUser']));	
						#####################################
						echo json_encode(array(true,"admin/"));}		
						***/ 
		}

/********************************************************/		
	
			
	// relogUser
	if(isset($_POST['relogUser'])){
			$dbm =  new DbTool();  # database mgr.
			##############################################
			$ip = $_SERVER['REMOTE_ADDR'];
			$user_Pc = gethostbyaddr($ip);
			##############################################
			$username = $dbm->clean( $_POST['username']);
			$username = base64_decode($username);				
			$password = $dbm->clean($_POST['password']);
			$status = array('user'=>false,'psw'=>false,'address'=>'');
			/************ perform check action ******************/	
				$name_chk = $dbm->getFields($dbm->select("users",array("user_id"=>$username,'acct_status'=>'active')),$mydal->TableFields('users')); //  
				if(empty($name_chk)){
					# if(count($name_chk['user_id'])==0){
					$status['user'] = false;
				}
					else if(count($name_chk['user_id'])==1){
						$status['user'] = true;
						############ check password 
						
						# $pass_chk = $dbm->getFields($dbm->select("users",array("user_id"=>$username,'acct_status'=>'active',"enc_psw"=>md5($password))),array('user_id','surname','firstname','midname')); //  
							if(!password_verify($password,$name_chk['hash_psw'][0])){ #  count($pass_chk['user_id'])==0){
								$status['psw'] = false;
							}
						
							else { #  if(count($pass_chk['user_id'])==1)
								session_regenerate_id(); 
								$status['psw'] = true;
								$_SESSION['admUser'] = $username;
								$_SESSION['admKey'] =  $password ;
								$_SESSION['loginTime'] = time();
								$_SESSION['logTimeOut'] = (time()+ (15*60));						
								
								$admin = new User("users");	
								$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
								$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
								$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id				
								#####################################
								## $logdate = date('D jS M, Y - g:i:s A',(time()+3600));
								$logdate = date('D jS M, Y - g:i:s A',time());
								$logtime = time();								
								#####################################				 
								# $dbm->insert("userslogs",array("user_id"=>$_SESSION['admUser'],"type"=>"relog","logtime"=>$logtime,"logdate"=>$logdate,"pc_name"=>$user_Pc,"pc_ip"=>$ip));
								## $dbm->updateTb("users",array("logtime"=>$logtime,"logdate"=>$logdate,"logstatus"=>"lin","pc_name"=>$user_Pc,"pc_ip"=>$ip),array("user_id"=>$_SESSION['exmUser']));												
								######################################
								
								if(isset($_SESSION['cur_url']) && $_SESSION['cur_url']!="404.php") $status['address'] = $_SESSION['cur_url'].'?'.$_SESSION['queryString'];
								else $status['address'] = 'index.php';
							}
				} // end when user is true
			 			
			echo json_encode($status); 
	}
	

?>