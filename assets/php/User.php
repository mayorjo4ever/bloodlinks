<?php 	
	
	require_once "dbTool.php";
	
		class User{
				
				protected $userType;
				
				public function __construct($userType){
					$this->userType = $userType;					
				}
				///////////////////////////////////////////////////
				
				public function confirmLogin($username){
					
					if(isset($_SESSION[$username])) {
						
						$dbm = new DbTool();
						
						// check account again if available
							$rows = $dbm->getFields($dbm->select($this->userType,array("user_id"=>$_SESSION[$username])),
								array('user_id')); //  

							$tot = count($rows);
							
							if($tot==0) { # login failed									
								return false;
							}
							
							else if($tot == 1){ 									
								return true;
							}
							else return false;
						} 
		}
		
		/*************************************************************************/
		public function dbCheckUser($username,$userKey){ // double check user
					
					if(isset($_SESSION[$username])) {
						
						/// check if password is set as well 
							
							if(isset($_SESSION[$userKey])) {								
								// now check for inactive period 
								## $_SESSION['loginTime'] = time();
								## $_SESSION['logTimeOut'] = (time()+ (5*60));
								$now = time(); 
								
								if($now > $_SESSION['logTimeOut'])
								{
									## lockout user for inactive period
									## track his/her present page 
									$urls = explode("/",$_SERVER['PHP_SELF']);  
									$last = (count($urls)-1); 
									$_SESSION['cur_url'] = $cur_url = $urls[$last]; # explode("/",$_SERVER['PHP_SELF'])[2];									 
									$_SESSION['queryString'] = $_SERVER['QUERY_STRING']; 
									unset($_SESSION[$userKey]); 
									$_SESSION['logMsg'] = "<span class='bold text-danger'> your active session has expired </span>";
									$_SESSION['alert-type'] = "alert-warning";
									header("Location:lockuser.php");
									
								}
								else{
									// check username and password for correctness
									$dbm = new DbTool(); 
									$rows = $dbm->getFields($dbm->select($this->userType,array("user_id"=>$_SESSION[$username],"enc_psw"=>$_SESSION[$userKey],'acct_status'=>'active')),
											array('user_id')); //  
											
										$tot = count($rows);
										 if($tot != 1){ 									
											## clear cache and logout
											session_destroy();
											session_start(); 
											$_SESSION['logMsg'] = "<span class='bold text-danger'> Invalid login parameters </span>";
											$_SESSION['alert-type'] = "alert-danger";
											header("Location:../index.php");
										}
										else{  // refetch users roles
											$admin = new User("users");
											$myroles = $admin->get_my_roles($_SESSION[$username]); ## by id 
											$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
											$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id															
											$_SESSION['my_role_name'] =  $admin->get_role_name($myroles['role_id'][0])['name']; 
											$urls = explode("/",$_SERVER['PHP_SELF']); $last = (count($urls)-1); 
											$_SESSION['cur_url'] = $cur_url = $urls[$last]; 
											#####################################
										}
								}							
							} ## admin user still active on page 
							
							else {
								 ## lock user for re-entering password when not active 
								   unset($_SESSION[$userKey]); 
								 
								$_SESSION['logMsg'] = "<span class='bold text-danger'> Password is required </span>";
								$_SESSION['alert-type'] = "alert-danger";
								header("Location:lockuser.php");
							} 
						// check account again if available 
			} ## user never logged in at all 
			else {
				## clear cache and logout
				session_destroy();
				session_start(); 
				$_SESSION['logMsg'] = "<span class='bold text-danger'> Login Required </span>";
				$_SESSION['alert-type'] = "alert-danger";
				header("Location:../index.php");
			}
						
		}
		/******************************************************************************/
				
		public function sgCheckUser($username){ // single check user
					
					if(isset($_SESSION[$username])) {
						
							// check username if logged on before 
									$dbm = new DbTool(); 
									$rows = $dbm->getFields($dbm->select($this->userType,array("user_id"=>$_SESSION[$username],'acct_status'=>'active')),
											array('user_id')); //  

										$tot = count($rows);
										 if($tot != 1){ 									
											## clear cache and logout
											session_destroy();
											session_start(); 
											$_SESSION['logMsg'] = "<span class='text-danger bold'> Invalid login parameters, try login again </span>";
											header("Location:index.php");
										}
								 
							
							} ## admin user has once logged in 
							
							else {
								// lock user for re-entering password when not active 
								## clear cache and logout
								session_destroy();
								session_start(); 
								$_SESSION['logMsg'] = "<span class=' text-danger bold'> Login Required </span>";
								header("Location:index.php");
							} 
						// check account again if available 
			} ## user never logged in at all 
			 
						
		/******************************************************************************/		
			///////////////////////////////////////////////////////////////
				
				function deleteUser($userID){
					
					}
			///////////////////////////////////////////////////////////////////////
			
				public function logout($userID,$directory){
						
						$dbm = new DbTool();   
							$dbm->updateTb($this->userType,array("online"=>"off","online_icon"=>"fa fa-circle text-warning"),array("user_id"=>$userID));
							@session_destroy(); 
							header("Refresh:1"); 
							@session_start();
							$_SESSION['logMsg'] = "<span class=' bold text-success'> Logout Successful </span>";
							$_SESSION['alert-type'] = "alert-success";
							header("Location:$directory"); 
						 	
				}
			////// find users ////////////////////////////////////////////////////////
			
			
				public function resume_back($userID,$directory){
						
						$dbm = new DbTool();   
							$dbm->updateTb($this->userType,array("online"=>"off","online_icon"=>"fa fa-circle text-warning"),array("user_id"=>$userID));
							 unset($_SESSION['admKey']); 
							header("Refresh:1"); 
							@session_start();
							$_SESSION['logMsg'] = "<span class=' bold'> Account Locked Successful </span>";
							$_SESSION['alert-type'] = "alert-success";
							header("Location:$directory"); 
						 	
				}
			////// find users ////////////////////////////////////////////////////////
			
				
				
				public function getAll(array $criteral){ 
					 
					$dbm = new DbTool(); 
						
					 $allUsers = $dbm->getFields($dbm->select($this->userType,$criteral,array('surname','firstname')),
					array('sn','user_id','surname','firstname','midname','sex','acct_status','fullname','date_employ',
					'faculty','department','passport','phone','level','dob','day','month','year','email','password',
					'homeaddress','date_c','time_c','logtime','logdate','logstatus','pc_name','pc_ip')); 						
						return $allUsers;
						
					} 
				/*********************************************************************/
				
				public function getLogs(array $criterials){
					$dbm = new DbTool();
					return $logs = $dbm->getFields($dbm->select("userslogs",$criterials),array('user_id','logtime','logdate','type')); 
				}
				/**************************************************************/
			
			/**********************************/
			####### GET MY ROLES ##############

			public function get_my_roles($user_id){
					$dbm = new DbTool();
					$roles = $dbm->getFields($dbm->select("myroles",array('user_id'=>$user_id,'status'=>'active')),array('role_id')); 
					
					return $roles;
			}
			##############################
			public function get_role_name($role_id){
					$dbm = new DbTool();
					$roles = $dbm->resort($dbm->getFields($dbm->select("roles",array('id'=>$role_id,'status'=>'active')),array('name'))); 
					
					return $roles;
			}
	
			
			/**********************************/
			####### GET MY sub-PAGES ##############

			public function get_my_sub_pages($my_role)
				{
					$dbm = new DbTool();
					$group_pages = $dbm->getFields($dbm->select_distinct("groupid","priviledges",array('role_id'=>$my_role,'status'=>'active'),array('groupid'),'and','asc'),array('groupid')); 	
					return $group_pages;
				}
			/**********************************/
			
			/**********************************/
			####### GET MY PAGES ##############

			public function get_all_my_pages($my_role)
				{
					$dbm = new DbTool();
					$urls = $dbm->getFields($dbm->select("priviledges",array('role_id'=>$my_role,'status'=>'active')),array('url')); 	
					return $urls;
				}
			/**********************************/
			
			public function get_sub_pages($my_role,$groupid)
				{
					$dbm = new DbTool();
					$urls = $dbm->getFields($dbm->select("priviledges",array('role_id'=>$my_role,'groupid'=>$groupid,'status'=>'active')),array('url')); 	
					return $urls;
				}
			/**********************************/ 
			
			####### GET PAGE INFO  ##############

			public function page_group_info($groupid)
				{
					$dbm = new DbTool();
					$info = $dbm->getFields($dbm->select("pagegroups",array('groupid'=>$groupid,'status'=>'active')),array('sn','groupid','groupname','icon')); 	
					return $dbm->resort($info);
				}
			 
			
			####### GET MY ROLES ##############

			public function searchUser(array $criterials,$order=""){
				 try{
				  	  $table = $this->userType;
					  $dbm = new DbTool();
					  $conn = $dbm->getConn();
				  $wheres = empty($criterials)?"":array_map(function($elem){ return "$elem REGEXP ?";},array_keys($criterials));
					
				if(!empty($order)) $ord = " ORDER BY ".$order[0];
				else $ord = "";		
				
			  $str = sprintf("SELECT * FROM %s %s %s %s",$table,empty($criterials)?"":"WHERE",join(' OR ',$wheres),$ord);
			  $stm = $conn->prepare($str);
			
			  $stm->execute(array_values($criterials));
				
			  $res = $stm->fetchAll();
			  
			return 	$output = $dbm->getFields($res,array('sn','user_id','surname','firstname','midname','fullname','sex',
			'faculty','department','passport','img_dir','online','online_icon','phone','level','dob','day','month','year','email','password',
			'homeaddress','datereg','timereg','logtime','logdate','logstatus','pc_name','pc_ip','acct_status'));
				 }
				 catch(PDOException $er){
						echo $er->getMessage(); 
				 }
		  }
		  
		}			
		// end of class user 				
	


?>