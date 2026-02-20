<?php 
	
	error_reporting(E_ALL^E_NOTICE);
	if(!isset($_SESSION)) session_start(); 
	require_once "../assets/php/dbTool.php";
	require_once "../assets/php/User.php";
	require_once "../assets/php/model.php";
	require_once "../assets/php/timecoder.php";
	
	set_time_limit(0); 
		  #
	
	// relogUser
	if(isset($_POST['relogUser'])){
			$dbm =  new DbTool();  # database mgr.
			##############################################
			$ip = $_SERVER['REMOTE_ADDR'];
			$user_Pc = gethostbyaddr($ip);
			##############################################
			$username = mysql_real_escape_string(strip_tags($_POST['username']));
			$username = base64_decode($username);				
			$password = mysql_real_escape_string(strip_tags($_POST['password']));
			$status = array('user'=>false,'psw'=>false,'address'=>'');
			/************ perform check action ******************/	
				$name_chk = $dbm->getFields($dbm->select("users",array("user_id"=>$username,'acct_status'=>'active')),array('user_id','name')); //  
				if(count($name_chk['user_id'])==0){
					$status['user'] = false;
				}
					else if(count($name_chk['user_id'])==1){
						$status['user'] = true;
						############ check password 
						
						$pass_chk = $dbm->getFields($dbm->select("users",array("user_id"=>$username,'acct_status'=>'active',"enc_psw"=>md5($password))),array('user_id','surname','firstname','midname')); //  
							if(count($pass_chk['user_id'])==0){
								$status['psw'] = false;
							}
						
							else if(count($pass_chk['user_id'])==1){
								$status['psw'] = true;
								$_SESSION['admUser'] = $username;
								$_SESSION['admKey'] = md5($password);
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
								$dbm->insert("userslogs",array("user_id"=>$_SESSION['admUser'],"type"=>"relog","logtime"=>$logtime,"logdate"=>$logdate,"pc_name"=>$user_Pc,"pc_ip"=>$ip));
								## $dbm->updateTb("users",array("logtime"=>$logtime,"logdate"=>$logdate,"logstatus"=>"lin","pc_name"=>$user_Pc,"pc_ip"=>$ip),array("user_id"=>$_SESSION['exmUser']));												
								######################################
								
								if(isset($_SESSION['cur_url']) && $_SESSION['cur_url']!="404.php") $status['address'] = $_SESSION['cur_url'];
								else $status['address'] = 'index.php';
								
							}
				} // end when user is true
			 
			
			echo json_encode($status); 
	}
	
	if(isset($_POST['loginUser'])){
			  // #sleep(1); /** comment it later  **/
			$dbm =  new DbTool();  # database mgr.
				##############################################
				$ip = $_SERVER['REMOTE_ADDR'];
				$user_Pc = gethostbyaddr($ip);
				##############################################
				$username = mysql_real_escape_string(strip_tags($_POST['username']));
				$password = mysql_real_escape_string(strip_tags($_POST['password']));
				
				################## CHECK NAME FIRST 
				$status = array('user'=>false,'psw'=>false,'address'=>'');
				############################
				$name_chk = $dbm->getFields($dbm->select("users",array("user_id"=>$username,'acct_status'=>'active')),array('user_id','name')); //  
				if(count($name_chk['user_id'])==0){
					$status['user'] = false;
				}
					else if(count($name_chk['user_id'])==1){
						$status['user'] = true;
						############ check password 
						 
						$pass_chk = $dbm->getFields($dbm->select("users",array("user_id"=>$username,'acct_status'=>'active',"enc_psw"=>md5($password))),array('user_id','surname','firstname','midname')); //  
							if(count($pass_chk['user_id'])==0){
								$status['psw'] = false;
							}
						
							else if(count($pass_chk['user_id'])==1){
								$status['psw'] = true;
								$_SESSION['admUser'] = $username;
								$_SESSION['admKey'] = md5($password);
								$_SESSION['loginTime'] = time();
								$_SESSION['logTimeOut'] = (time()+ (15*60));
								
								$admin = new User("users");	
								$myroles = $admin->get_my_roles($_SESSION['admUser']); ## by id 
								$_SESSION['mysubpages'] = $admin->get_my_sub_pages($myroles['role_id'][0]); 
								$_SESSION['mypages'] =  $mypages = $admin->get_all_my_pages($myroles['role_id'][0]); ## by role-id
				
								$status['address'] = 'index.php';
								
								#####################################
								##$logdate = date('D jS M, Y - g:i:s A',(time()+3600));
								$logdate = date('D jS M, Y - g:i:s A',time());
								$logtime = time();								
								#####################################				 
								 $dbm->insert("userslogs",array("user_id"=>$_SESSION['admUser'],"type"=>"in","logtime"=>$logtime,"logdate"=>$logdate,"pc_name"=>$user_Pc,"pc_ip"=>$ip));
								 $dbm->updateTb("users",array("online"=>"on","online_icon"=>"fa fa-circle text-success"),array("user_id"=>$_SESSION['exmUser']));												
								 ## $dbm->updateTb("users",array("logtime"=>$logtime,"logdate"=>$logdate,"logstatus"=>"lin","pc_name"=>$user_Pc,"pc_ip"=>$ip),array("user_id"=>$_SESSION['exmUser']));												
								######################################
							}
				} // end when user is true
		echo json_encode($status); 
		}
		
		#######################################
		
		// createPatient
			if(isset($_POST['createPatient'])){
				$dbm = new DbTool(); 
				 #############
				$surname = mysql_real_escape_string(strip_tags($_POST['surname']));
				$firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
				$othername = mysql_real_escape_string(strip_tags($_POST['othername']));
				$dob = mysql_real_escape_string(strip_tags($_POST['dob']));
				$address = mysql_real_escape_string(strip_tags($_POST['address']));
				$phone = mysql_real_escape_string(strip_tags($_POST['phone']));
				$user_id = getAppId();
				$data = array('user_id'=>$user_id,'surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'address'=>$address,'dob'=>$dob,'createdby'=>$_SESSION['adminUser'],'date_c'=>date('Y-m-d'));
				
				$test = array('surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'dob'=>$dob); 
				$exist = $dbm->getFields($dbm->select('students',$test),array('sn','surname'));
				$tot = count($exist['sn']); 
				
				
			if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				else if($tot>0){
					$msg = "<span class='font-18'> This Account Has Already been Created Before .</span>";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else {					// ,phone,address,dob) ,'".$phone."','".$address."','".$dob."'
					$dbm->insert('students',$data);						
					$msg = "<span class='font-18'> The Data is Successfully Saved </span>";
					echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'RECORD SAVED'));

				}
			
			}
		/********************************************************/
		// createStaff
			if(isset($_POST['create_admin'])){
				$dbm = new DbTool();   
				 #############
				$surname = mysql_real_escape_string(strip_tags($_POST['surname']));
				$firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
				$othername = mysql_real_escape_string(strip_tags($_POST['othername'])); 				
				$user_id = mysql_real_escape_string(strip_tags($_POST['user_id']));
				$phone = mysql_real_escape_string(strip_tags($_POST['phone']));
				$psw = mysql_real_escape_string(strip_tags($_POST['psw']));
				$fullname = $surname.' '.$firstname.' '.$othername; 
				// $user_id = getAppId(); 
				 
				$data = array('fullname'=>$fullname,'surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'user_id'=>$user_id, 'password'=>$psw,'enc_psw'=>md5($psw), 'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time());
				
				$exist = $dbm->getFields($dbm->select('users',array('user_id'=>$user_id)),array('sn','surname'));
				$exist_2 = $dbm->getFields($dbm->select('users',array('phone'=>$phone)),array('sn','surname'));
				$tot = count($exist['sn']); 
				$tot_2 = count($exist_2['sn']); 
				 
				## echo json_encode(array('icon'=>'info','text'=>"Information Received",'title'=>'ACCOUNT CREATED'));

				 
			if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Phone Number'));
					// 	
				}
				
				else if($tot>0){
					$msg = "This Admin ID [ $user_id ] Already Exists ..";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else if($tot_2>0){
					$msg = "This Phone Number [ $phone ] Already Exists ..";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Phone Number'));
				}
				
				else {			
					$dbm->insert('users',$data);	
					##@$sql = mysql_query("insert into users(surname,firstname,midname,phone,email,user_id,password)values('".$surname."','".$firstname."','".$othername."','".$phone."','".$email."','".$fileno."','".$psw."')") or die(mysql_error()); 
					$msg = " New Admin Profile Successfully Created ";
					echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'ACCOUNT CREATED'));

				}
				
			
			}
		/********************************************************/
		####
		/********************************************************/
		##############################################		 
		if(isset($_POST['load_states'])){  		
				$dbm = new DbTool(); 						
				$states = $dbm->getFields($dbm->select_distinct('state','states',array(''),array('state'),'AND','ASC'),array('sn','state')); ?>
				 	<option value="">...</option>		
					<?php	$n = 0; if(!is_null($states)) foreach ($states['state']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['mystate']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 
				  
				<?php  
	}
	/**********************************************************************/
	####
	/********************************************************/
		##############################################		 
		if(isset($_POST['load_lga'])){ 
				$state = mysql_real_escape_string(strip_tags($_POST['state']));
				$dbm = new DbTool(); 						
				$lga = $dbm->getFields($dbm->select('states',array('state'=>$state), array('lga'),'AND','ASC'),array('sn','lga'));
				?>
				 	<option value="">...</option>		
					<?php	$n = 0; if(!is_null($lga)) foreach ($lga['lga']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['mylga']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 
				  
				<?php  
	}
	/**********************************************************************/
	####
	####
		if(isset($_POST['new_patient_category'])){
			$name = mysql_real_escape_string($_POST['category']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('patient_category',$data),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot > 0){
				$msg = "$name already exists, record another category ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'This Category Exists'));
			}
			else {
				$dbm->insert('patient_category',$data);
			$msg = "New Item Category '$name' Saved Successfully. ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
			}
		}
		/********************************************************/
		####################################################################
		
		####
		if(isset($_POST['save_new_conversation_type'])){
			$name = mysql_real_escape_string($_POST['converseType']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('conversation_type',$data),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot > 0){
				$msg = "$name already exists, record another conversation type ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'This Type Already Exists'));
			}
			else {
				$dbm->insert('conversation_type',$data);
			$msg = "New Patient Conversation Type ' $name ' Successfully Saved. ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
			}
		}
		/********************************************************/
		####################################################################
		####
		if(isset($_POST['saveBillCateg'])){
			$name = mysql_real_escape_string($_POST['billCateg']);
			$id = mysql_real_escape_string($_POST['bill_dept_id']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'dept_id'=>$id,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('bill_category',$data),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot > 0){
				$msg = "$name already exists, record another bill category ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'This Category Already Exists'));
			}
			else {
				$dbm->insert('bill_category',$data);
			$msg = "New Bill Category [ ' $name ' ] Successfully Saved. ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
			}
		}
		/********************************************************/
		####################################################################
		 
		####
		if(isset($_POST['save_new_department'])){
			$name = mysql_real_escape_string($_POST['name']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('departments',$data),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot > 0){
				$msg = "$name Department already exists, record another one ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Department'));
			}
			else {
				$dbm->insert('departments',$data);
			$msg = "New Department [ ' $name ' ] Successfully Created. ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
			}
		}
		/********************************************************/
		####################################################################
		
		
		
		
		
		/********************************************************/
		####################################################################
		####
		if(isset($_POST['save_new_bill_type'])){			 
			$dept_id = mysql_real_escape_string($_POST['dept_id']);
			$categ_id = mysql_real_escape_string($_POST['categ_id']);
			$name = mysql_real_escape_string($_POST['billType']);			
			$price = mysql_real_escape_string($_POST['billCost']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'dept_id'=>$dept_id,'categ_id'=>$categ_id,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('bill_types',$data),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if(!is_numeric($price)){
				$msg = " Price must be integer value ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Price Given!'));
			}
			
			else if($tot > 0){
				$msg = "$name already exists, record another bill type ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'This Type Already Exists'));
			}
			else {
				$dbm->insert('bill_types',array_merge($data,array('price'=>$price)));
			$msg = "New Bill Type [ ' $name ' ] Successfully Saved. ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
			}
		}
		/********************************************************/
		####################################################################
		####################################################################
		####
		
		####################################################################
		####
		if(isset($_POST['update_new_bill_type'])){			 
			$dept_id = mysql_real_escape_string($_POST['dept_id']);
			$categ_id = mysql_real_escape_string($_POST['categ_id']);
			$name = mysql_real_escape_string($_POST['billType']);			
			$price = mysql_real_escape_string($_POST['billCost']);
			$serial = mysql_real_escape_string($_POST['serial']);
			/*****************************************************/
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'dept_id'=>$dept_id,'categ_id'=>$categ_id,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial)),array('sn','name'));
				$tot = count($exist['sn']); 
			// 
			if(!is_numeric($price)){
				$msg = " Price must be integer value ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Price Given!'));
			}
			
			else if($tot == 1){
				$dbm->updateTb('bill_types',array_merge($data,array('price'=>$price)),array('sn'=>$serial));
				$msg = "Bill Successfully Updated ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Update Successful'));
			}
			else { 
			    $msg = " Error / Invalid Parameters ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'No Update Found!'));
			}
		}
		/********************************************************/
		####################################################################
		
		
		if(isset($_POST['update_labtest_type'])){
			$categ = mysql_real_escape_string($_POST['labtestCategFm']);
			$name = mysql_real_escape_string($_POST['labTestType']);
			$serial = mysql_real_escape_string($_POST['serial']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'categ'=>$categ,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('labtest_types',array('sn'=>$serial)),array('sn','name','categ'));
				$tot = count($exist['sn']); 
			
			if($tot == 1){
				$dbm->updateTb('labtest_types',$data,array('sn'=>$serial));
				$msg = $exist['name'][0]." under  ".$exist['categ'][0]. " Successful Updated to $name under $categ ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Update Successful'));
			}
			else {
				 
			$msg = "  No update found for this criteria, please try again later ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Error !'));
			}
		}
		/********************************************************/
		####
		if(isset($_POST['update_bill_type'])){
			$categ = mysql_real_escape_string($_POST['billCategFm']);
			$name = mysql_real_escape_string($_POST['billType']);
			$serial = mysql_real_escape_string($_POST['serial']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'categ'=>$categ,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial)),array('sn','name','categ'));
				$tot = count($exist['sn']); 
			
			if($tot == 1){
				$dbm->updateTb('bill_types',$data,array('sn'=>$serial));
				$msg = $exist['name'][0]." under  ".$exist['categ'][0]. " Successful Updated to $name under $categ ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Update Successful'));
			}
			else {
				 
			$msg = "  No update found for this criteria, please try again later ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Error !'));
			}
		}
		/********************************************************/
		####################################################################
		####################################################################
		####
		if(isset($_POST['update_labtest_category'])){
			$name = mysql_real_escape_string($_POST['labtestCateg']);			
			$serial = mysql_real_escape_string($_POST['serial']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('labtest_category',array('sn'=>$serial)),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot == 1){
				$dbm->updateTb('labtest_category',$data,array('sn'=>$serial));
				$dbm->updateTb('labtest_types',array('categ'=>$name),array('categ'=>$exist['name'][0]));
				$msg = $exist['name'][0]."  Successful Updated to $name  ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Update Successful'));
			}
			else {
				 
			$msg = "  No update found for this criteria, please try again later ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Error !'));
			}
		}
		/********************************************************/
		####################################################################
		####################################################################
		
		####
		if(isset($_POST['update_bill_category'])){
			$name = mysql_real_escape_string($_POST['billCateg']);			
			$serial = mysql_real_escape_string($_POST['serial']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('bill_category',array('sn'=>$serial)),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot == 1){
				$dbm->updateTb('bill_category',$data,array('sn'=>$serial));
				$dbm->updateTb('bill_types',array('categ'=>$name),array('categ'=>$exist['name'][0]));
				$msg = $exist['name'][0]."  Successful Updated to $name  ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Update Successful'));
			}
			else {
				 
			$msg = "  No update found for this criteria, please try again later ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Error !'));
			}
		}
		/********************************************************/
		####################################################################
		
		####
		if(isset($_POST['new_sibling_type'])){
			$sib_type = mysql_real_escape_string($_POST['sib_type']);
			
			$dbm = new DbTool(); 
			$data = array('name'=>$sib_type,'status'=>'active');
			$exist = $dbm->getFields($dbm->select('sibling_type',$data),array('sn','name'));
				$tot = count($exist['sn']); 
			
			if($tot > 0){
				$msg = "$sib_type already exists, record another type ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'This Sibling Type Already Exists'));
			}
			else {
				$dbm->insert('sibling_type',$data);
			$msg = "New Sibling Type [ '$sib_type' ] Saved Successfully. ";
				echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
			}
		}
		/********************************************************/
		################################################################	 
		if(isset($_POST['load_patient_categories'])){  		
					$dbm = new DbTool(); 					 
					$category = $dbm->getFields($dbm->select_distinct('name','patient_category',array(''),array('name'),'and','asc'),array('name')); 
				  ?> 
						<optgroup label="Patient Category">
						<option value="">Select Patient Category </option>
						<?php	$n = 0; if(!is_null($category)) foreach ($category['name']  as $val){ ?>
									<option value="<?php echo $val; ?>" <?php echo ($_SESSION['pcategory']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/

		##############################################		 
		if(isset($_POST['display_patient_categories'])){  		
					$dbm = new DbTool(); 	#sleep(1);				 
					$category = $dbm->getFields($dbm->select_distinct('name','patient_category',array(''),array('name'),'and','asc'),array('name')); 
				  ?> 
						<table class="table table-striped" style="min-width:100%"> 
							 <tbody>
							<?php	$n = 0; if(!is_null($category)) foreach ($category['name']  as $val){
								
							?>
									<tr> 
										<th style="width:5%"> <?php echo $n+1;  ?> </th> <th> <?php echo $val; ?> </th> 
									</tr>
									
							<?php $n ++; } ?>	
							</tbody>	
						</table> <!-- ./ table -->
						 
						
					<?php  
		}
		/**********************************************************************/
		
		##############################################		 
		if(isset($_POST['display_conversation_type'])){  		
					$dbm = new DbTool(); 	#sleep(1);				 
					$types = $dbm->getFields($dbm->select_distinct('name','conversation_type',array(''),array('name'),'and','asc'),array('name')); 
				  ?> 
						<table class="table table-striped" style="min-width:100%"> 
							 <tbody>
							<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){
							 ?>
									<tr> 
										<th style="width:5%"> <?php echo $n+1;  ?> </th> <th> <?php echo $val; ?> </th> 
									</tr>
									
							<?php $n ++; } ?>	
							</tbody>	
						</table> <!-- ./ table -->
						 
						
					<?php  
		}
		/**********************************************************************/
		 ##############################################		 
		if(isset($_POST['load_conversation_type'])){  		
					$dbm = new DbTool(); 					 
					$types = $dbm->getFields($dbm->select_distinct('name','conversation_type',array(''),array('name'),'and','asc'),array('name')); 
				  ?> 
						<optgroup label="Conversation Type">
						<option value="">Select Conversation Type </option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){ ?>
									<option value="<?php echo $val; ?>" <?php echo ($_SESSION['converse_type']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/
 		 ##############################################		 
		if(isset($_POST['load_bill_departments'])){  		
					$dbm = new DbTool(); 					 
					$types = $dbm->getFields($dbm->select('departments',array(''),array('name'),'and','asc'),array('name','sn')); 
				  ?> 
						<optgroup label="Department">
						<option value=""> ..... </option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $name){ ?>
									<option value="<?php echo $types['sn'][$n]; ?>" <?php echo ($_SESSION['bill_department']==$types['sn'][$n])?"selected":"" ?>> <?php echo $name; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/
		if(isset($_POST['store_info'])){
			$_SESSION['bill_department'] = $_POST['bill_dept_id'];
			$_SESSION['bill_category'] = $_POST['bill_categ_id'];
		}
		 ##############################################		 
		if(isset($_POST['load_bill_category'])){  	
					$dept_id = mysql_real_escape_string($_POST['dept_id']); 
					$dbm = new DbTool(); 					 
					$types = $dbm->getFields($dbm->select('bill_category',array('dept_id'=>$dept_id),array('name'),'and','asc'),array('name','sn')); 
				  ?> 
						<optgroup label="Bill Categories">
						<option value=""> ..... </option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){ ?>
									<option value="<?php echo $types['sn'][$n]; ?>" <?php echo ($_SESSION['bill_category']==$types['sn'][$n])?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/

		 ##############################################		 
		if(isset($_POST['load_bill_type'])){  	
					$dept_id = mysql_real_escape_string($_POST['dept_id']); 
					$categ_id = mysql_real_escape_string($_POST['categ_id']); 
					$dbm = new DbTool(); 					 
					$types = $dbm->getFields($dbm->select('bill_types',array('dept_id'=>$dept_id,'categ_id'=>$categ_id,'status'=>'active'),array('name'),'and','asc'),array('name','sn','price')); 
				  ?> 
						<optgroup label="Bill Types">
						<option value=""> ..... </option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){ ?>
									<option value="<?php echo $types['sn'][$n]; ?>" <?php echo ($_SESSION['bill_type']==$types['sn'][$n])?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/

		 ##############################################		 
		if(isset($_POST['load_all_bill_type'])){  		
					$dbm = new DbTool(); 	
					$types = $dbm->getFields($dbm->select('bill_types',array('status'=>'active'),array('name','categ_id'),'and','asc'),array('name','sn','categ_id','dept_id','price'));
					## $types = $dbm->getFields($dbm->select('bill_category',array(''),array('name'),'and','asc'),array('name','sn')); 
				  ?> 
						<optgroup label="General Billing ">
						<option value="">Select Bill Type </option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){ 
								$dtext = $val."|".$types['dept_id'][$n]."|".$types['categ_id'][$n]."|".$types['price'][$n];
								?>
									<option value="<?php echo $dtext; ?>"  <?php echo ($_SESSION['bill_type']==$dtext)?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/

		
		/********************************************************/
		##############################################		 
		if(isset($_POST['load_sibling_types'])){  		
					$dbm = new DbTool(); @session_start(); 					 
					$category = $dbm->getFields($dbm->select_distinct('name','sibling_type',array(''),array('sn'),'and','asc'),array('name')); 
				  ?> 
						<optgroup label="Sibling Type">
						<option value="">Select Sibling Type </option>
						<?php	$n = 0; if(!is_null($category)) foreach ($category['name']  as $val){ ?>
									<option value="<?php echo $val; ?>" <?php echo ($_SESSION['sib_type']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/

		##############################################		 
		if(isset($_POST['display_sibling_types'])){  		
					$dbm = new DbTool(); 	#sleep(2);				 
					$category = $dbm->getFields($dbm->select_distinct('name','sibling_type',array(''),array('sn'),'and','asc'),array('name')); 
				  ?> 
						<table class="table table-striped" style="min-width:100%"> 
							 <tbody>
							<?php	$n = 0; if(!is_null($category)) foreach ($category['name']  as $val){								
							?>
									<tr> 
										<th style="width:5%"> <?php echo $n+1;  ?> </th> <th> <?php echo $val; ?> </th> 
									</tr>									
							<?php $n ++; } ?>	
							</tbody>	
						</table> <!-- ./ table -->
						 
						
					<?php  
		}
		/**********************************************************************/
		
		/**********************************************************************/
		####  get_patient_info
		if(isset($_POST['get_patient_info'])){  
			$ref_no = mysql_real_escape_string($_POST['ref']);  
			$info = explode('_',$ref_no); ### hosp_no , type = host | spouse ...
			switch($info[1]){
				case "host":{ $table = "patients"; $field = "hosp_no";  } break;
				default : { $table = "patients_siblings"; $field = "ref_no"; } break;
			}
			
			$dbm = new DbTool();  $func = new functions();
			 
			 $patient_info = $dbm->resort($dbm->getFields($dbm->select($table,array($field=>$info[0],'type'=>$info[1])),
			 		array('surname','firstname','othername','fullname','dob','phone','email','gender','type','createdby',
			 			'date_c','time_c','month_c','day_c','year_c','week_c')));
			$dob = $func->format_date($patient_info['dob']);
			$old = $func->years_old($patient_info['dob'],date('Y-m-d'));
			$pending_tickets = $dbm->getFields($dbm->select('tickets',array('ref_no'=>$info[0],'type'=>$info[1],'ticket_status'=>'untreated')),array('sn','fullname','ticket_no','ref_no'));
			$onschedule =  (count($pending_tickets['ticket_no'])>0)?'Yes':'No'; 
			 
			echo json_encode(array_merge($patient_info,array('fdob'=>$dob,'old'=>$old,'onschedule'=>$onschedule)));
			 
			# echo json_encode(array($info,$table));
		}
		##############################################		 
		if(isset($_POST['display_my_sibling'])){  
					$hosp_no = mysql_real_escape_string($_POST['ref']); 
					$mode = mysql_real_escape_string($_POST['mode']); 
					
					$dbm = new DbTool(); 	#sleep(1);				 
					$sibs = $dbm->getFields($dbm->select('patients_siblings',array('ref_no'=>$hosp_no,'status'=>'active'),array('sn'),'and','asc'),
						array('surname','firstname','othername','dob','phone','email','gender','type','createdby',
						'date_c','time_c','month_c','day_c','year_c','week_c')); 
				  ?> 
						<table class="table table-striped" style="min-width:100%"> 
							 <tbody>
							<?php if(!is_null($sibs)){
								if($mode=="few"){ ## create heading 
								$n = 0; ?>
									<tr  class="bg-success white"> 
										<th style="width:5%"> S/N </th> 
										<th> Type </th> 
										<th> Name </th> 
									</tr>
								
									<?php foreach ($sibs['type']  as $val){	?>
								
									<tr> 
										<th style="width:5%"> <?php echo $n+1;  ?> </th> 
										<th> <?php echo $val; ?> </th> 
										<th> <?php echo $sibs['surname'][$n]." ".$sibs['firstname'][$n]." ".$sibs['othername'][$n]; ?> </th> 
									</tr>
																	
								<?php  $n++; } ## end foreach 
									} ## end few 
									else if($mode=="lg") { $n = 0; ?>
									<tr class="bg-success white"> 
										<th style="width:5%"> S/N </th> 
										<th> Type </th> 
										<th> Name </th> 
										<th> Date of Birth </th> 
										<th> Gender </th> 
										<th> Created by :  </th> 
									</tr>
								
									<?php foreach ($sibs['type']  as $val){	?>
									<tr> 
										<th style="width:5%"> <?php echo $n+1;  ?> </th> 
										<th> <?php echo $val; ?> </th> 
										<th> <?php echo $sibs['surname'][$n]." ".$sibs['firstname'][$n]." ".$sibs['othername'][$n]; ?> </th> 
										<th> <?php echo $sibs['dob'][$n]; ?> </th> 
										<th> <?php echo $sibs['gender'][$n]; ?> </th> 
										<th> <?php echo "created by ".$sibs['createdby'][$n]." on ".$sibs['date_c'][$n]; ?> </th> 
									</tr>
								<?php $n++; } ### end foreach 
								} # end large 
								 
							} ### end not null
							else { ?>
								<tr>  
									<th colspan="2" class="text-danger font-20">  no sibling yet </th> 										
								</tr>	
								
							<?php }
							?>	
							</tbody>	
						</table> <!-- ./ table --> 
					<?php  
		}
		/**********************************************************************/
		// adding images 
	if(isset($_POST['add_img'])){		
		$nfn = str_replace("/","_",$_SESSION['session'])."_img_for_".$_SESSION['papercode']."_".$_SESSION['papertype']."_".$_SESSION['qtnNo'];
						$nfn =  strtoupper(str_replace("/","",$nfn)."_".time());
									 
						$allowedMIMEs = array('image/jpeg', 'image/gif', 'image/png');
							foreach($allowedMIMEs as $mime) {
								if ($mime == $_FILES['itemImage']['type']) {
									$mimeSplitter = explode('/', $mime);
									$fileExt = $mimeSplitter[1];
									$newPath =  "../images/users/".$nfn.'.'.$fileExt;
									$nfile = $nfn.'.'.$fileExt;
									break;
								}								
						} // end foreach
		
				// create dir first 
						if(!is_dir("../images/users/")) mkdir("../images/users/");
							///////
						if(!isset($newPath)){
							$_SESSION['alert_msg'] = " Error! please upload a picture file ";
							$_SESSION['alert_type'] = "bg-danger text-center";
						}
						else if (!copy($_FILES['itemImage']['tmp_name'], $newPath)) {
							$_SESSION['alert_msg'] = " Error: Could not save your image to the server ";
							$_SESSION['alert_type'] = "bg-danger text-center";							 
						}
						else{
							$_SESSION['alert_msg'] = " your image was successfully uploaded to the server ";
							$_SESSION['alert_type'] = "bg-success text-center";							 
							
							unset($_SESSION['delay']);
							$_SESSION['img_src'] = "../exroom/imgs/".$nfile ;
							$_SESSION['img_name'] = $nfile;
							$_SESSION['perm_img_del'] = true; 
						}
						// image upload finished 
		
	} 	/*****************************************************************/
	
		####
		/********************************************************/
		// create_patient
			if(isset($_POST['create_patient'])){
				// #sleep(1); 
				$dbm = new DbTool(); 			 
				 ##################################################			
				 $surname = mysql_real_escape_string(strip_tags($_POST['surname']));
				 $firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
				 $othername = mysql_real_escape_string(strip_tags($_POST['othername']));				
				 $dob = mysql_real_escape_string(strip_tags($_POST['dob']));
				 $phone = mysql_real_escape_string(strip_tags($_POST['phone']));
				 $mystate = mysql_real_escape_string(strip_tags($_POST['mystate']));
				 $mylga = mysql_real_escape_string(strip_tags($_POST['mylga']));  
				 $gender = mysql_real_escape_string(strip_tags($_POST['gender']));  
				 $hosp_no = mysql_real_escape_string(strip_tags($_POST['hosp_no']));  
				 $military_no = mysql_real_escape_string(strip_tags($_POST['military_no']));  
				 $pcategory = mysql_real_escape_string(strip_tags($_POST['pcategory'])); 				  
				 ##################################################	 
				 $fullname = $surname." ".$firstname." ".$othername;
				 ##################################################	 
		 
				$data = array('surname'=>$surname,'firstname'=>$firstname,'othername'=>$othername,
				'phone'=>$phone, 'dob'=>$dob,'state'=>$mystate,'lga'=>$mylga,'gender'=>$gender,
				'hosp_no'=>$hosp_no,'category'=>$pcategory,'fullname'=>$fullname,'military_no'=>$military_no,
				'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time(),
				'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'));
				
				// $updates = array('name'=>$fullname,'user_id'=>$fileno,'email'=>$email,'phone'=>$phone, 'fact_id'=>$fact_id,'dept_id'=>$dept_id);
				
				$exist = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$hosp_no,'status'=>'active')),array('sn','surname','firstname','othername'));
				$exist2 = $dbm->getFields($dbm->select('patients',array('military_no'=>$military_no,'status'=>'active')),array('sn','surname','firstname','othername'));
				$tot = count($exist['sn']); 
				$tot2 = count($exist2['sn']); 
 
				if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "This phone number (".$phone.") is not correct ";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				/****
				else if($tot>0 && $save_mode=="newstaff" ){
					$msg = "<span class='font-18'> This Staff File Number `$fileno` Already Exists .</span>";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else if($tot>0 && $save_mode=="updstaff" ){
					$dbm->updateTb('staff',$updates,array('user_id'=>$fileno));	
					$msg = "<span class='font-18'>Account Info Successfully Updated .</span>";
					echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Staff Profile Updated'));
				} ***/
				
				else if($tot>0){
					$msg = " This Patient Number `$hosp_no` Already Exists for (".$exist['surname'][0]." ".$exist['firstname'][0]." ".$exist['othername'][0].")" ;
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Account'));
				}
				
				### else if($tot==0 && $save_mode=="newstaff"){			
				else if($tot==0){			
					$dbm->insert('patients',$data);	
					
					$msg = " New Patient Profile Was Created Successfully";
					echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'ACCOUNT CREATED'));
				}							
			}
		/********************************************************/
		####
		
		// createLecturer
			if(isset($_POST['createLecturer'])){
				$dbm = new DbTool(); 
				 #############
				$param = mysql_real_escape_string(strip_tags($_POST['param']));
				$name = mysql_real_escape_string(strip_tags($_POST['name'])); 
				$realname = ""; 
				$names = explode("-",$name);
				$cn = count($names);  
				if($cn == 2) $realname.=$names[0];
				else {
					$n = 0;
					foreach($names as $id){
						if($n<($cn-1)) $realname.=$id."-";
						++$n;
					}
				}
				
				$fact_id = explode("***",$param)[0];
				$dept_id = explode("***",$param)[1];
				$user_id = explode("***",$param)[2];
				 
				$info = $dbm->getFields($dbm->select('staff',array('user_id'=>$user_id,'fact_id'=>$fact_id,'dept_id'=>$dept_id)),array('sn','user_id'));
				$fact = @$dbm->resort($dbm->getFields($dbm->select('faculty',array('fact_id'=>$fact_id)),array('sn','name','fact_status')));
				$dept = @$dbm->resort($dbm->getFields($dbm->select('departments',array('dept_id'=>$dept_id)),array('sn','name','dept_status')));
				
				$tot = count($info['sn']);  
				
				if($tot>0){
					$dbm->updateTb("staff",array('name'=>$realname),array('user_id'=>$user_id,'fact_id'=>$fact_id,'dept_id'=>$dept_id));
					echo $msg = "<p>&nbsp;</p> <span class='font-15 text-warning'> $realname  Record Updated </span> <p>&nbsp;</p><span class='blue'>".$fact['name']." <p>&nbsp;</p> ".$dept['name']."<p>&nbsp;</p><span>";					
				} 
				else {		
					$data = array('user_id'=>$user_id,'fact_id'=>$fact_id,'dept_id'=>$dept_id,'name'=>$realname, 'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>(time()+3600));
					$dbm->insert('staff',$data);					
					echo $msg = "<p>&nbsp;</p> <p>&nbsp;</p><span class='font-15 green'> $realname -  Record  Successfully Saved <p>&nbsp;</p> <p>&nbsp;</p> </span>";
				}
			
				
			} /****
				 
				$data = array('surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'user_id'=>$fileno, 'password'=>$psw,'enc_psw'=>md5($psw),'email'=>$email, 'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time());
				
				 
				$exist = $dbm->getFields($dbm->select('users',array('user_id'=>$fileno)),array('sn','surname'));
				$tot = count($exist['sn']); 
				 
				## echo json_encode(array('icon'=>'info','text'=>"Information Received",'title'=>'ACCOUNT CREATED'));

				 
			if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				else if($tot>0){
					$msg = "<span class='font-18'> This Staff File Number Already Exists .</span>";
					echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else {			
					$dbm->insert('users',$data);	
					##@$sql = mysql_query("insert into users(surname,firstname,midname,phone,email,user_id,password)values('".$surname."','".$firstname."','".$othername."','".$phone."','".$email."','".$fileno."','".$psw."')") or die(mysql_error()); 
					$msg = "<span class='font-18'> Admin Profile is Successfully Saved </span>";
					echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'ACCOUNT CREATED'));

				}
				
			
			}
		/********************************************************/
			
		
	#### check_new_role
	##############################################		 
	if(isset($_POST['check_new_role'])){  		
				$role = $_POST['role'];
				$roleid = $_POST['roleid'];
				$dbm = new DbTool(); 
				$exists = $dbm->getFields($dbm->select("roles",array('name'=>$role,'id'=>$roleid,'status'=>'active')),array('sn','name'));	
				if(is_null($exists)) {
					$dbm->insert("roles",array('name'=>$role,'id'=>$roleid, 'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time()));				
					echo false; 
				}
				else{
						echo true; 
				}
			 
	}
	/**********************************************************************/
	####
	if(isset($_POST['del_admin'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select("users",array('sn'=>$serial)),array('sn','surname','firstname','midname'));	
				if(!is_null($exists)) {
					$dbm->updateTb("users",array('acct_status'=>'inactive', 'deletedby'=>$_SESSION['admUser'],'date_deleted'=>date('Y-m-d'),'time_deleted'=>time()),array('sn'=>$serial));				
					
					echo json_encode(array('icon'=>'success','text'=>$exists['surname'][0].' '.$exists['firstname'][0]."'s Account has been deleted successfully",'title'=>' Administrator Account Deleted ')); 
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Administrator matching your criterial was found",'title'=>'Deleting Administrator Account'));
 	 
				}			 
	}
	/*******************************************************/
	// delete role 
	// 
	if(isset($_POST['del_role'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select("roles",array('sn'=>$serial)),array('sn','name'));	
				if(!is_null($exists)) {
					$dbm->updateTb("roles",array('status'=>'inactive', 'deletedby'=>$_SESSION['admUser'],'date_deleted'=>date('Y-m-d'),'time_deleted'=>time()),array('sn'=>$serial));				
					
					echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."'s Role has been deleted successfully",'title'=>' Role Deleted '));
 
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Role matching your criterial was found",'title'=>'Deleting Role'));
 	 
				}			 
	}
	/*******************************************************/
	 
	if(isset($_POST['del_bill_type'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ'));	
				if(!is_null($exists)) {
					$dbm->updateTb("bill_types",array('status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>time()),array('sn'=>$serial));				
					
					echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."'s Bill Type has been deleted successfully",'title'=>' Bill Type Deleted '));
 
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Bill Type matches your criterial ",'title'=>'Deleting Bill Type'));
 	 
				}			 
	}
	/*******************************************************/
	
	if(isset($_POST['del_pharm_product'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial,'status'=>'active')),array('sn','name','barcode'));	
				if(!is_null($exists)) {
					// check if the product has not been sold, if yes, cannot delete 
					$exists2 = $dbm->getFields($dbm->select('pharm_products_sales',array('ref_id'=>$serial,'status'=>'active')),array('sn','barcode'));	
					if(!is_null($exists)) {
						echo json_encode(array('icon'=>'error','text'=>"Because Part of it has already been sold, you can either update it.",'title'=>$exists['name'][0]." Cannot Be Deleted"));
					}
					else {
						$dbm->updateTb("pharm_products",array('status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>time()),array('sn'=>$serial));									
						echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."' has been deleted successfully",'title'=>$exists['name'][0]." Deleted Successfully "));
					}
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Bill Type matches your criterial ",'title'=>'Deleting Bill Type'));
 	 
				}			 
	}
	/*******************************************************/
	/************************** #### display_my_roles**************/
	##############################################	##########	##########		 
	if(isset($_POST['display_my_roles'])){  
			#sleep(1);
				$myid = mysql_real_escape_string($_POST['myid']);
				$dbm = new DbTool();
				  $myinfo = $dbm->getFields($dbm->select("users",array('user_id'=>$myid,'acct_status'=>'active')),array('user_id','surname','firstname','midname'));
				$myroles = $dbm->getFields($dbm->select("myroles",array('user_id'=>$myid,'status'=>'active')),array('user_id','role_id','sn')); /* this gives sn, name */?> 
				 	<table class="table table-striped font-18" style="width:100%;">
						<tr> <td colspan="3"> <?php echo "Roles for : <b>". $myinfo['surname'][0]." ".$myinfo['firstname'][0]." ".$myinfo['midname'][0]." </b> are :";  ?>  </td> </tr>  
					<?php	$n = 0; if(!is_null($myroles)) foreach ($myroles['role_id']  as $val){ 
						$info = $dbm->resort($dbm->getFields($dbm->select("roles",array('id'=>$val)),array('name','id','sn')));
					?>
						<tr> 
						<td style="width:5%"> <?php	echo $n+1;  ?> </td> 
						<td  style="width:40%"> <?php echo $info['name']." <small> (". $val.")</small>"; ?> </td> 
						<td  style=""> <button type="" class="btn btn-danger btn-rounded btn-sm" onclick="remove_user_role('<?php echo $myid; ?>','<?php  echo $val; ?>')" > <i class="fa fa-close"> </i> </td>
						</tr>  
					<?php $n ++; } 
						else{ ?>
							<tr>  <td class="font-18 text-danger bold"> (No Role assigned Yet) </td> </tr>  
						<?php }
					?>					 
				    </table>
				<?php  
	}
	/***************************************************************
	
	/************************** #### assign_roles **************/
	##############################################	##########	##########		 
	if(isset($_POST['assign_roles'])){  		
				$user_id = mysql_real_escape_string($_POST['user_id']);	
					$dbm = new DbTool(); 
				 $myinfo = $dbm->getFields($dbm->select("users",array('user_id'=>$user_id,'acct_status'=>'active')),array('user_id','surname','firstname','midname'));
				$roles = explode('*',$_POST['roles']); 
				 
				$news = array(); 
				 foreach($roles as $role_id){
					$rows =  $dbm->getFields($dbm->select("myroles",array('user_id'=>$user_id,'role_id'=>$role_id,'status'=>'active')),array('user_id','role_id','sn'));
						if(is_null($rows)){
							$news[] = $role_id;
							$dbm->insert("myroles",array('user_id'=>$user_id,'role_id'=>$role_id));
						}
				 }
				
				if(count($news)>0) echo join(' and ',$news)." has been assigned for ".$myinfo['surname'][0]." ".$myinfo['firstname'][0]." ".$myinfo['midname'][0].' successfully'; 
				else echo "no changes for ".$myinfo['surname'][0]." ".$myinfo['firstname'][0]." ".$myinfo['midname'][0];
				 				
				//$myroles = /*  this gives sn, name */?> 
				 	 
				<?php  
	}
	/**********************************************************************/
	####
		/************************** #### assign_roles **************/
	##############################################	##########	##########		 
	if(isset($_POST['remove_user_role'])){  		
				$user_id = mysql_real_escape_string($_POST['user_id']);	
				$role_id = mysql_real_escape_string($_POST['roles']);	
				$dbm = new DbTool(); 
				
				$myinfo = $dbm->getFields($dbm->select("users",array('user_id'=>$user_id,'acct_status'=>'active')),array('user_id','surname','firstname','midname'));
				$myroles =  $dbm->getFields($dbm->select("myroles",array('user_id'=>$user_id,'role_id'=>$role_id,'status'=>'active')),array('user_id','role_id','sn')); 
				
				if(!is_null($myroles)){	
						  $dbm->updateTb("myroles",array('status'=>'inactive'),array('role_id'=>$role_id,'user_id'=>$user_id,'status'=>'active'));
						  $text =  $myinfo['surname'][0]." ".$myinfo['firstname'][0]." ".$myinfo['midname'][0]." has been removed as ".$role_id.' successfully'; 
  						 echo json_encode(array('icon'=>'success','text'=>$text,'title'=>' Role Unscheduled '));
						}
					 else {
						$text =   "invalid form execution for  ".$myinfo['surname'][0]." ".$myinfo['firstname'][0]." ".$myinfo['midname'][0];	
					 echo json_encode(array('icon'=>'error','text'=>$text,'title'=>' Cannot Unscheduled Role')); 
					
					 }
				 ?> 
				 	 
				<?php  
	}
	/**********************************************************************/
	####

	
	## assign_pages
	 /************************** #### assign_pages **************/
	##############################################	##########	##########		 
	if(isset($_POST['assign_pages'])){  		
				$contents = $_POST['contents']; // array of indexed pages 
				$dbm = new DbTool();
				
				$ins = 0; $upd = 0; 
				foreach($contents as $role_info){ 
					$infos = explode("|",$role_info);  // role_id | url 	
					$exists = $dbm->getFields($dbm->select("priviledges",array('role_id'=>$infos[0],'url'=>$infos[1])),array('role_id','url','sn','status'));	
					if(!is_null($exists) && $exists['status'][0]=="inactive"){
						$dbm->updateTb("priviledges",array('status'=>'active'),array('role_id'=>$infos[0],'url'=>$infos[1],'status'=>'inactive'));
						$upd++;
					}
					else {
						## means not yet defined 	
						## now define role 
						$pg_info = $dbm->resort($dbm->getFields($dbm->select("pages",array('url'=>$infos[1])),array('groupid','url','sn','status')));	
						$dbm->insert("priviledges",array('role_id'=>$infos[0],'url'=>$infos[1],'groupid'=>$pg_info['groupid'])); 					
						$ins++; 
					}					
				} ## end foreach 				
				echo $ins." pages were added,while ".$upd." pages were renewed ";  
	}
	/**********************************************************************/
	####
	
	## reverse_pages
	 /************************** #### reverse_pages **************/
	##############################################	##########	##########		 
	if(isset($_POST['reverse_pages'])){  		
				$contents = $_POST['contents']; // array of indexed pages 
				$dbm = new DbTool();
				
				$ins = 0; $upd = 0; 
				foreach($contents as $role_info){ 
					$infos = explode("|",$role_info);  // role_id | url 	
					$exists = $dbm->getFields($dbm->select("priviledges",array('role_id'=>$infos[0],'url'=>$infos[1])),array('role_id','url','sn','status'));	
					if(!is_null($exists) && $exists['status'][0]=="active"){
						 # $dbm->updateTb("priviledges",array('status'=>'inactive'),array('role_id'=>$infos[0],'url'=>$infos[1],'status'=>'active'));
						 $dbm->deleteRow("priviledges", array('role_id'=>$infos[0],'url'=>$infos[1],'status'=>'active'),"AND");
						
						$upd++;
					}										
				} ## end foreach 				
				echo $upd." pages were disabled ";  
	}
	/**********************************************************************/
		
	
	
	#### 
	#### searching all student/password table record for end of  programme update 
	###################################################################################	
	if(isset($_POST['adv_stud_search'])){  		
		$text =  mysql_real_escape_string($_POST['value']); ## $mysql_real_escape_string($_POST['value']);
		$fields = array('session_of_entry'=>$text,'regno'=>$text,'appno'=>$text,'name'=>$text, 		 
		'session_ended'=>$text,'date_approved'=>$text,'programme'=>$text,'phone'=>$text,'email'=>$text,
		'prog_completed'=>$text); 
			
		$cards = new card(); $n = 0; $func = new functions();
		$allcards = $cards->adv_stud_search($fields,array('programme','name'));
		
		?>
		
		<div class="box-header with-border">						 
					  <h3 class="box-title text-info bold">  <?php echo count($allcards['sn'])." records found ";?>  
					  
					  </h3>					    					    
					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
						</button>						 
					  </div>
		</div>
		<!-- /.box-header -->
		
		<?php 
		if(!is_null($allcards)){	
		 ?> 
		<div class="box-body">
				
		<!-- <h3 class="text-success bold col-md-offset-1" style="margin-top:0em; padding-top:0em;"> <?php echo count($allcards['sn'])." records found ";?></h3> -->
			<table class="table table-responsive font-13">
				<thead style="background-color:black; color:white;">
					<tr class="text-uppercase  bold">					
						<td> sn </td>
						<td> cD </td>
						<td> fullname </td>
						<td> regno </td>
						<td> applc no. </td>
						<td> programme </td>
						<td> phone  </td>
						<!-- <td> email </td> -->
						<td> session admitted </td>
						<td> session ended </td>
						<td> approved date </td>
					</tr>
				</thead>
				
				<tbody>
				 <?php  $n = 0;
				 foreach($allcards['sn'] as $sn){ 	?>
					<tr class="<?php if($allcards['prog_completed'][$n]=="yes") echo 'bg-info';?>" > 				 
					<td class="bold ">  <?php  echo $n+1; ?>   </td>
					<td class="">
						<a <a href="#" class="btn btn-xs btn-info" onclick="show_my_student_profile($(this).attr('for'));"  title="Create Card Import Info" data-toggle="modal" data-target="#myStudentDetails2" for="<?php  echo $allcards['sn'][$n]; ?>"> <i class="fa fa-image" > </i> </a>  </td>
						<td class=" bold"> <a href="#" onclick="show_my_student_profile($(this).attr('for'));" data-toggle="modal" data-target="#myStudentDetails" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <i class="fa fa-meh-o" style="font-size:16px;"> </i> &nbsp;  <?php  echo strtoupper($allcards['name'][$n]); ?> </a> </td>
						<td class=" bold" data-toggle="tooltip" data-displacement="top" title="<?php echo "Password : ".$allcards['password'][$n]?>">  <?php  echo $allcards['regno'][$n]; ?>  
						</td>
						<td>  <?php  echo $allcards['appno'][$n]; ?> </td>
						<td>  <?php  echo $allcards['programme'][$n]; ?> </td>                                                                     
						<td class="text-uppercase bold">  <?php print $allcards['phone'][$n];  ?>  </td>
						<!-- <td>  <span class=" font-16"><?php  echo $allcards['email'][$n];?> </span>  </td> -->
						<td align="center" class=" bold"> <?php  echo $allcards['session_of_entry'][$n]; ?> </td>
						<td align="center" class=" bold"> <?php  echo $allcards['session_ended'][$n]; ?> </td>
						<td align="center" class=" bold"> <?php  echo $func->format_date($allcards['date_approved'][$n]); ?> </td>
					</tr>
					<?php $n++; 
					
					} // end foreach  ?>

				</tbody>
			</table>
			</div> <!-- /.box-body -->	
		
	 
	<?php } ## end not null;   

			}##### end of search  
	
	#### 
	#### searching all student/password table record for end of  programme update 
	###################################################################################	
	if(isset($_POST['adv_logbook_stud_search'])){  		
		$text =  mysql_real_escape_string($_POST['value']); ## $mysql_real_escape_string($_POST['value']);
		$fields = array('session_of_entry'=>$text,'regno'=>$text,'appno'=>$text,'name'=>$text, 		 
		'session_ended'=>$text,'date_approved'=>$text,'programme'=>$text,'phone'=>$text,'email'=>$text,
		'prog_completed'=>$text,'fact_id'=>$text,'dept_id'=>$text,'supervisor_id'=>$text,'logbook_id'=>$text); 
			
		$cards = new card(); $n = 0; $func = new functions();
		$allcards = $cards->adv_stud_search($fields,array('programme','name'));
		
		?>
		<div class="box-header with-border">						 
					  <h3 class="box-title text-primary bold">  <?php echo  count($allcards['sn'])." student(s) found ";?>  
					  
					  </h3>					    					    
					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
						</button>						 
					  </div>
		</div>
		<!-- /.box-header -->
		
		<?php 
		if(!is_null($allcards)){	
		 ?> 
		<div class="box-body">
				
		<!-- <h3 class="text-success bold col-md-offset-1" style="margin-top:0em; padding-top:0em;"> <?php echo count($allcards['sn'])." records found ";?></h3> -->
			<table class="table table-responsive table-striped table-striped-success  font-13">
				<thead class="bg-purple white;">
					<tr class="text-uppercase bold">					
						<td> sn </td>
						<td> fullname </td>
						<td> regno </td>
						<td> applc no. </td>
						<td> programme </td>						
						<!-- <td> email </td> <td> phone  </td> -->
						<td> entry session </td>
						<td> session ended </td>
						<td> supervisor </td>
					</tr>
				</thead> <!-- sunjohna@gmail.com -->
				
				<tbody>
				 <?php  $n = 0;
				 foreach($allcards['sn'] as $sn){  
					$supervisor_info = $func->get_staff_info($allcards['supervisor_id'][$n]);		
				 ?>
					<tr class="<?php echo ($allcards['prog_completed'][$n]=="no")?'text-default':'text-success';?>"> 
				 
					<td class="bold ">  <?php  echo $n+1; ?> </td>
						<td class=" bold"> <a href="#" onclick="show_my_logbook_details($(this).attr('for'));" data-toggle="modal" data-target="#myLogBookDetails" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <!--  <i class="fa fa-meh-o" style="font-size:14px;"> </i>  -->&nbsp;  <?php  echo $allcards['name'][$n]; ?> </a> </td>
						<td class=" bold">  <?php  echo $allcards['regno'][$n]; ?>  </td>
						<td>  <?php  echo $allcards['appno'][$n]; ?> </td>
						<td>  <?php  echo $allcards['programme'][$n]; ?> </td>                                                                     
						<!-- <td class="text-uppercase bold">  <?php print $allcards['phone'][$n];  ?>  </td>-->
						<!-- <td>  <span class=" font-16"><?php  echo $allcards['email'][$n];?> </span>  </td> -->
						<td align="center" class=" bold"> <?php  echo $allcards['session_of_entry'][$n]; ?> </td>
						<td align="center" class=" bold"> <?php  echo $allcards['session_ended'][$n]; ?> </td>
						<td align="center" class=" bold"> <?php  echo $supervisor_info['name']." &nbsp; <small>(".$supervisor_info['user_id'].")</small>"; ?> </td>
					</tr> 
					<?php $n++; 
					
					} // end foreach  ?>

				</tbody>
			</table>
			</div> <!-- /.box-body -->	
		
	 
	<?php } ## end not null;   

			}##### end of search  
	
		
		#### 
	#### searching all student/password table record for end of  programme update 
	###################################################################################	
	if(isset($_POST['adv_param_stud_search'])){  		
		$_SESSION['stud_programmes'] = $prog =  mysql_real_escape_string($_POST['prog']); ## $mysql_real_escape_string($_POST['value']);
		$_SESSION['stud_session'] = $session =  mysql_real_escape_string($_POST['session']); ## $mysql_real_escape_string($_POST['value']);
		$progstatus =  mysql_real_escape_string($_POST['progstatus']); ## $mysql_real_escape_string($_POST['value']);
		
		$fields = array('session_of_entry'=>$session,'programme'=>$prog); 
		if($progstatus!="") $fields = array_merge($fields,array('prog_completed'=>$progstatus));
			
		$cards = new card(); $n = 0; $func = new functions();
		$allcards = $cards->adv_param_stud_search($fields,array('programme','name'));
		
		?>
		<div class="box-header with-border">						 
					  <h3 class="box-title text-info bold">  <?php echo count($allcards['sn'])." records found ";?>  
					  
					  </h3>
					 <!--    -->  
					 &nbsp; &nbsp; &nbsp; &nbsp; <button type="button" class="card_stud_buttons btn btn-info bold" id="update_program" name="update_program" data-text="" data-toggle="modal" data-target="#myProgState" onclick="submitStuds()" disabled > Update <span class="new_selected_cards"> 0 </span> Student Programme status &nbsp;&nbsp;<i class="fa fa-save">  </i> </button> 
					 &nbsp; &nbsp; &nbsp; &nbsp; <button type="button" class="card_stud_buttons btn btn-success bold" id="update_stud_dept" name="update_stud_dept" data-text="" data-toggle="modal" data-target="#myFactDept" onclick="submitStudFact()" disabled > Update <span class="new_selected_cards"> 0 </span> Student Departments &nbsp;&nbsp;<i class="fa fa-save">  </i> </button> 
					  
					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
						</button>						 
					  </div>
		</div>
		
		<!-- /.box-header -->
		
		<?php 
		if(!is_null($allcards)){	
		 ?> 
		 
		<div class="box-body">
				
		<!-- <h3 class="text-success bold col-md-offset-1" style="margin-top:0em; padding-top:0em;"> <?php echo count($allcards['sn'])." records found ";?></h3> -->
			<table class="table table-responsive font-13">
				<thead style="background-color:black; color:white;">
					<tr class="text-uppercase  bold">					
						<td> <button class="btn btn-info btn-sm" type="button" data-toggle="tooltip" title="Select All Students" onclick="selectAllUsers()" > <i class="fa fa-arrows">  </i> </button> </td>
						<td> sn </td>						
						<td> fullname </td>
						<td> regno </td>
						<td> applc no. </td>
						<td> programme </td>
						<td> phone  </td>
						<!-- <td> email </td> -->
						<td> session admitted </td>
						<td> session ended </td>
						<td> approved date </td>
					</tr>
				</thead>
				
				<tbody>
				 <?php  $n = 0;
				 foreach($allcards['sn'] as $sn){ 	?>
					<tr class="<?php if($allcards['prog_completed'][$n]=="yes") echo 'bg-info';?>"> 				 
						
						<td>   
								<label class="label-control"> 
								<input type="checkbox" onclick="getSelectedStuds()" class="stud_box checkbox" name="checkboxes[]" value="<?php echo $allcards['sn'][$n]; ?>" title="<?php echo $allcards['sn'][$n]; ?>" />  </label>
							  </div>  
						</td>
						<td class="bold ">  <?php  echo $n+1; ?> </td> 
						<td class=" bold"> <a href="#" onclick="show_my_student_profile($(this).attr('for'));" data-toggle="modal" data-target="#myStudentDetails" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <i class="fa fa-meh-o" style="font-size:16px;"> </i> &nbsp;  <?php  echo strtoupper($allcards['name'][$n]); ?> </a> </td>
						<td class=" bold">  <?php  echo $allcards['regno'][$n]; ?>  </td>
						<td>  <?php  echo $allcards['appno'][$n]; ?> </td>
						<td>  <?php  echo $allcards['programme'][$n]; ?> </td>                                                                     
						<td class="text-uppercase bold">  <?php print $allcards['phone'][$n];  ?>  </td>
						<!-- <td>  <span class=" font-16"><?php  echo $allcards['email'][$n];?> </span>  </td> -->
						<td align="center" class=" bold"> <?php  echo $allcards['session_of_entry'][$n]; ?> </td>
						<td align="center" class=" bold"> <?php  echo $allcards['session_ended'][$n]; ?> </td>
						<td align="center" class=" bold"> <?php  echo $func->format_date($allcards['date_approved'][$n]); ?> </td>
					</tr>
					<?php $n++; 
					
					} // end foreach  ?>

				</tbody>
			</table>
			</div> <!-- /.box-body -->	
		
	 
	<?php } ## end not null;   

			}##### end of search  
	 
	/****************************************************************************************/
	### 
	/*******************************************/
	// update_stud_prog_comp	
	/********************************************/
	if(isset($_POST['update_stud_prog_comp'])){
			$dbm = new DbTool();  $card = new card();  $func = new functions();  		
			$users_id = mysql_real_escape_string($_POST['users_id']);	
			$myregno = strtoupper(mysql_real_escape_string($_POST['myregno']));	
			$myappno = mysql_real_escape_string($_POST['myappno']);	
			$datecomp = mysql_real_escape_string($_POST['datecomp']);
			$session = $func->set_session($datecomp);
			// search database 
			$card_info = $dbm->resort($card->search_student_record(array('sn'=>$users_id)));
			// $programme = $card_info['programme'];
			//  $degree = $func->get_degree_prog($programme);
				/*********************************************/  
					$data = array('prog_completed'=>'yes','date_approved'=>$datecomp,'session_ended'=>$session,
					'regno'=>$myregno); 
				
					/**	if(!is_null($degree)) {
								$data = array_merge($data,$degree);
							} *
					**/
					 $dbm->updateTb("students",$data,array('sn'=>$users_id));
					//echo join(' + ',$card_info);
  			 echo "<b class='font-20'>".$card_info['name']." programme </b> has been updated successfully";
		 		
			}
	
	### 
	/*******************************************/
	// update_mult_stud_prog_comp	
	/********************************************/
	if(isset($_POST['update_mult_stud_prog_comp'])){
			// #sleep(6);
			$dbm = new DbTool();  $card = new card();  $func = new functions();  		
			$users_id = explode(',',mysql_real_escape_string($_POST['users_id']));	
			$datecomp = mysql_real_escape_string($_POST['datecomp']);
			$session = $func->set_session($datecomp);
			// search database 
			## $card_info = $dbm->resort($card->search_student_record(array('sn'=>$users_id)));
			
			 foreach($users_id as $sn){
				$data = array('prog_completed'=>'yes','date_approved'=>$datecomp,'session_ended'=>$session); 
				 $dbm->updateTb("students",$data,array('sn'=>$sn));
			} 	
				 
  			   echo "<b>".count($users_id)." students programme </b> has been successfully updated";
  			## echo "<b>". $users_id ." </b>  student programmes has been successfully updated";
 			
			}
	
	###
	/*******************************************/
	// cancel_stud_prog_comp	
	/********************************************/
	if(isset($_POST['cancel_stud_prog_comp'])){
			$dbm = new DbTool();  
			$func = new functions();  		
			$users_id = mysql_real_escape_string($_POST['users_id']);	
			$card = new card(); 
			$card_info = $dbm->resort($card->search_student_record(array('sn'=>$users_id)));
				/*********************************************/  
					$data = array('prog_completed'=>'no','date_approved'=>'','session_ended'=>''); 
					$dbm->updateTb("students",$data,array('sn'=>$users_id));
  				 
				echo  "<b class='bold font-20'>".$card_info['name']."</b> Programme Completion Status has been successfully Reversed ";
	}
	###
	/*******************************************/
		
	// cancel_mult_stud_prog_comp	
	/********************************************/
	if(isset($_POST['cancel_mult_stud_prog_comp'])){
			#sleep(6);
			$dbm = new DbTool();  
			$func = new functions();  		
			$users_id = explode(',',mysql_real_escape_string($_POST['users_id'])); 
					
				foreach($users_id as $sn){
					$data = array('prog_completed'=>'no','date_approved'=>'','session_ended'=>''); 
					$dbm->updateTb("students",$data,array('sn'=>$sn));
				} 
			echo "<b>".count($users_id)." students programme </b> has been successfully reversed";
	} 
	/****************************************************************************************/
	
	## doc_awaiting_patient 
	if(isset($_POST['doc_awaiting_patient'])){
			$dbm = new DbTool();
			$pending_tickets = $dbm->getFields($dbm->select('tickets',array('ticket_status'=>'untreated','dest_user_id'=>$_SESSION['admUser'])),array('sn','fullname','ticket_no','ref_no','time_c','date_c'));
			if(!is_null($pending_tickets)){ $n=0;
				foreach($pending_tickets['fullname'] as $client){ ?>
				<div class="col-xl-4 col-lg-4col-md-4 col-sm-6 grid-margin stretch-card">
					  <div class="card card-statistics">
						<div class="card-body">
						  <div class="clearfix">
							<div class="float-left">
							  <i class="fa fa-user text-success icon-lg"></i>
							</div>
							<div class="float-right">
							  <p class="mb-0 text-right bold text-warning"> Awaiting Patient #  <span class="text-primary"> [ <?php echo $pending_tickets['ref_no'][$n]?> ] </span></p>
							  <div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0"> 
									<?php $since = (time()-$pending_tickets['time_c'][$n]);?>
									<span class="">  <?php echo $client; ?> </span>  </h3>
							  </div>
							</div>
						  </div>
						  <p class="text-muted mt-3 mb-0 bold font-16 text-center">                   
							<i class="fa fa-clock-o mr-1" aria-hidden="true"> </i>
								<?php echo readTime($since);?> ago  
							&nbsp; &nbsp; 
							<a href="consults.php?s='<?php echo base64_encode($pending_tickets['ticket_no'][$n]);?>'" class="btn btn-icons btn-success" onclick="start_converse('<?php echo $pending_tickets['ticket_no'][$n];?>')"> <i class="fa fa-play"> </i> </a>
						  </p>
						</div>
					  </div> <!-- ./ card -->
					</div> <!-- ./ col-xl-4 col-lg-4  --> 
								 
				<?php $n++; }   ## end foreach
					} ### end not null 
					
					else { ?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
						  <div class="card card-statistics">
							<div class="card-body">
							  <div class="clearfix">
								<div class="float-left">
								  <i class="fa fa-user text-success icon-lg"></i>
								</div>
								<div class="float-right">
								  <p class="mb-0 text-right bold text-warning"> Awaiting Patients  </p>
								  <div class="fluid-container">
									<h3 class="font-weight-medium text-right mb-0 text-warning">   <span class="doc_awaiting_patient"> no awaiting patient  </span> </h3>
								  </div>
								</div>
							  </div>
							  <p class="text-muted bold mt-3 mb-0 text-center">
							    <i class="fa fa-clock-o mr-1" aria-hidden="true"> </i>  --:--
							  </p>
							</div>
						  </div> <!-- ./ card -->
						</div> <!-- ./ col-xl-3 col-lg-3  --> 
					<?php }
				} ## end request 
				/****************************************************************************************/
	
	## spec_scheduled_task 
	if(isset($_POST['spec_scheduled_task'])){
			$dbm = new DbTool();
			 $comments = $dbm->getFields($dbm->select('tickets_converse',array('dest_user_id'=>$_SESSION['admUser'],'dest_role_id'=>$_SESSION['my_cur_role_id']),array('time_c'),'and','desc'),
				array('sn','converse_type','msg','from_user_id','from_role_id','date_c','month_c','year_c','week_c','time_c',''));
				## echo $tot_com = count($comments['sn']).' comments found ';
				$n=0;
				if(!is_null($comments))foreach($comments['converse_type'] as $com_type) {
				?>
				<div class="col-lg-8 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body"> 
				   <p class="h4 text-capitalize font-18 bold">
					<i class="fa fa-comment  text-warning"></i>  &nbsp; <?php echo $comments['converse_type'][$n]; ?> </p>
					
		 <div class="fluid-container">	 
           <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
			  <div class="col-md-1">
				<img class="img-sm rounded-circle mb-4 mb-md-0" src="../images/faces/face1.jpg" alt="profile image">
			  </div>
			  <div class="ticket-details col-md-8">
				<div class="d-flex">
				  <p class="text-dark font-weig ht-semibold mr-2 mb-0 no-wrap bold"> from  <?php echo "".$comments['from_role_id'][$n]." ". $comments['from_user_id'][$n];?> :</p>
				  <p class="text-primary mr-1 mb-0">[# <?php echo ($tot_com - $n); ?> ]</p>
				  <p class="mb-0 ellipsis bold"> .</p>
				</div>
				<p class="text-gray ellipsis mb-2">  <?php echo stripslashes($comments['msg'][$n]); ?>
				</p>
				<div class="row text-gray d-md-flex d-none">
				  <div class="col-6 d-flex">
					<small class="mb-0 mr-2 text-info"> Since :</small>
					<small class="Last-responded mr-2 mb-0 text-info">  <?php echo readTime(time()-$comments['time_c'][$n]).' ago';?></small>
				  </div>
				 <!--  <div class="col-6 d-flex">
					<small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
					<small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
				  </div>  -->
				</div>
			  </div>
			  <div class="ticket-actions col-md-2">
				<div class="btn-group dropdown">
				  <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Manage
				  </button>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="#">
					  <i class="fa fa-reply fa-fw"></i> Reply</a>
					<!-- <a class="dropdown-item" href="#">
					  <i class="fa fa-history fa-fw"></i>Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">
					  <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
					<a class="dropdown-item" href="#">
					  <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a> -->
				  </div>
				</div>
			  </div>
			</div> <!-- ./ row -->
			<?php $n++;  } // end foreach  ?>
		</div> <!-- ./ fluid-container -->
			</div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-7 --> 
		
           	<?php 
	}	
	## gettime 
	if(isset($_POST['gettime'])){
			$d = date('l, jS F, Y ',(time()-3600)); 
				# $t = date('g:i:s A',(time()-3600));			
				$t = date('g:i:s A',time());			
			# echo "<span class='font-12 bold'>".$d."&nbsp;&nbsp; <span class='red'>".$t."</span></span>";
			echo  "<span class='text-info font-15'>".$d."</span>".", &nbsp;<span class='text-warning font-15'>".$t."</span>";
	}
	/****************************************************************************************/
	
	## lastlog 
	if(isset($_POST['lastlog'])){
			 $dbm = new DbTool();  $fileno = $_SESSION['admUser'];
			 $info = $dbm->getFields($dbm->select('userslogs',array('user_id'=>$fileno,'type'=>'in')),array('sn','logdate'));
			 $last = count($info['sn'])-2; 
			 if($last<0) echo "<span class=' red bold'> not yet.. </span>"; 			
			 else echo "<span class='font-12 text-info bold'>". $info['logdate'][$last] ."&nbsp; </span>";
			
	}
	/****************************************************************************************/
	
	## count_patient_on_queue 
	if(isset($_POST['count_patient_on_queue'])){
			 $dbm = new DbTool(); 
			 $pending_tickets = $dbm->getFields($dbm->select('tickets',array('ticket_status'=>'untreated')),array('sn','fullname','ticket_no','ref_no','time_c','date_c'));
			 $pendings = count($pending_tickets['sn']); 
			 echo "<span class='font-22 text-info bold'>". number_format($pendings) ." </span>";
			
	}
	/****************************************************************************************/
	
	
	## save_comment_conversation 
	if(isset($_POST['save_comment_conversation'])){
			 $dbm = new DbTool();  
			 $com_type = mysql_real_escape_string($_POST['com_type']);	
			 $com_msg = $_POST['com_msg'];	
			 $ref = mysql_real_escape_string($_POST['ref']);	
			 $ticket_info = $dbm->resort($dbm->getFields($dbm->select('tickets',array('ticket_no'=>$ref)),array('ref_no','type')));
			 $from_user_id = $_SESSION['admUser'];    
			 $data = array('converse_type'=>$com_type,'ref_no'=>$ticket_info['ref_no'],'type'=>$ticket_info['type'], 'msg'=>$com_msg,'from_user_id'=>$from_user_id,
			 'ticket_no'=>$ref,'date_c'=>date('Y-m-d'),'month_c'=>date('m'),
			 'year_c'=>date('Y'), 'week_c'=>idate('W'),'time_c'=>time(),'date_vs'=>date('Y-m-d'),'month_vs'=>date('m'),'year_vs'=>date('Y'),
			'week_vs'=>idate('W'),'time_vs'=>time());
			 
			 /* **/
			 $dbm->insert('tickets_converse',$data);
			 echo json_encode(array('icon'=>'success','text'=>' Your Comment has been saved ',
							'title'=>'Comment Saved')); 
		/* 
		 ref_no ref_no
		*/
	}
	/****************************************************************************************/
	###
		## final_forward_to_specs 
	if(isset($_POST['final_forward_to_specs'])){
			 $dbm = new DbTool(); 
			/** **/	
			 $com_type = mysql_real_escape_string($_POST['com_type']);	
			 $com_msg = $_POST['com_msg'];	
			 $ref = mysql_real_escape_string($_POST['ref']);
			 $from_role_id = mysql_real_escape_string($_POST['from_role_id']);
			 $from_user_id = mysql_real_escape_string($_POST['from_user_id']);
			 $dest_user_id = mysql_real_escape_string($_POST['dest_user_id']);
			 $dest_role_id = mysql_real_escape_string($_POST['dest_role_id']);
			 /****************************************************************/
			 $data = array('converse_type'=>$com_type,'msg'=>$com_msg,'from_user_id'=>$from_user_id,
			 'ticket_no'=>$ref,'from_role_id'=>$from_role_id,'dest_user_id'=>$dest_user_id,
			 'date_c'=>date('Y-m-d'),'month_c'=>date('m'),'dest_role_id'=>$dest_role_id,
			 'year_c'=>date('Y'), 'week_c'=>idate('W'),'time_c'=>time());
			 $dbm->insert('tickets_converse',$data);
			 $dbm->updateTb('tickets',array('ticket_status'=>'processing'),array('ticket_no'=>$ref));
			 echo json_encode(array('icon'=>'success','text'=>' Message Forwarded ',
							'title'=>'Message Forwarded')); 
		/** labtest_reports ***/ 
	}
	/****************************************************************************************/
	## logcount 
	if(isset($_POST['logcount'])){
			 $dbm = new DbTool();  $fileno = $_SESSION['admUser'];
			 $info = $dbm->getFields($dbm->select('userslogs',array('user_id'=>$fileno,'type'=>'in')),array('sn','logdate'));
			 $last = count($info['sn']); 
			 echo "<span class='font-16 text-info bold'>". number_format($last) ." </span>";
			
	}
	/****************************************************************************************/
	
	
	## relogcount 
	if(isset($_POST['getlogs'])){
			 $dbm = new DbTool();  $fileno = $_SESSION['admUser'];
			 $relogs = $dbm->getFields($dbm->select('userslogs',array('user_id'=>$fileno,'type'=>'relog')),array('sn','logdate'));
			 $relogs_count = count($relogs['sn']); 
			
			 $logins = $dbm->getFields($dbm->select('userslogs',array('user_id'=>$fileno,'type'=>'in')),array('sn','logdate'));
			 $logins_count = count($logins['sn']); 
			
			 echo json_encode(array('login'=>$logins_count,'relog'=>$relogs_count)); 
	}
	/****************************************************************************************/
	 
	## relogcount 
	if(isset($_POST['get_card_charts'])){ 
			 $dbm = new DbTool();  $fileno = $_SESSION['admUser'];
			 
			 $cur_sess = $dbm->resort($dbm->getFields($dbm->select('cur_sessiontb',array('')),array('session','semester')));
			 $faculties = $dbm->getFields($dbm->select('faculty_alias',array(''),array('faculty'),'and','asc'),array('faculty','alias'));
			 
			 # load each card data 
			 $n = 0; $processed_cards = $unprocessed_cards = array(); 
			 if(!is_null($faculties)) foreach($faculties['faculty'] as $faculty){
				$yes_data = $dbm->getFields($dbm->select('card_uploaded_data',array('session'=>$cur_sess['session'],'faculty'=>$faculty,'card_processed'=>'yes')),array('regno','sn'));
				$no_data = $dbm->getFields($dbm->select('card_uploaded_data',array('session'=> $cur_sess['session'],'faculty'=>$faculty,'card_processed'=>'no')),array('regno','sn'));
				$processed_cards[] = count($yes_data['regno']);
				$unprocessed_cards[] = count($no_data['regno']);
			 } 
			 /// calculate all processed & unprocessed cards
			 ## processes
			  $reissue_sql = $dbm->getFields($dbm->select('card_processing',array('card_type'=>'reissue','session_processed'=>$cur_sess['session'],'status'=>'active'),array('faculty','regno'),'and','asc'),array('sn','regno','name','programme'));
			    $processed_id = array_sum($processed_cards);
			    $unprocessed_id = array_sum($unprocessed_cards);
			  $reissue_id = count($reissue_sql['regno']);
			 echo json_encode(array('cur_sess'=>$cur_sess,'reissue_id'=>$reissue_id,'processed_id'=>$processed_id, 'unprocessed_id'=>$unprocessed_id, 'faculties'=>$faculties,'yes_data'=>$processed_cards,'no_data'=>$unprocessed_cards)); 
	}
	/****************************************************************************************/
	 
	
	## relogcount 
	if(isset($_POST['relogcount'])){
			 $dbm = new DbTool();  $fileno = $_SESSION['admUser'];
			 $info = $dbm->getFields($dbm->select('userslogs',array('user_id'=>$fileno,'type'=>'relog')),array('sn','logdate'));
			 $last = count($info['sn']); 
			# echo "<span class='font-15 red bold'>". $last ."&nbsp;time(s) </span>";
			 echo "<span class='font-16 black bold'>". number_format($last) ." </span>";
			
	}
	/****************************************************************************************/
				
	/***************/
	// get_my_student_details
		#### 
	#### searching all student information 
	##############################################	
	if(isset($_POST['get_my_student_details'])){  		
		$serial = mysql_real_escape_string($_POST['serial']); ## ($_POST['value']);
		$card = new card(); 
		$dbm = new DbTool(); $func = new functions();
		
		$card_info = $dbm->resort($card->search_student_record(array('sn'=>$serial)));
		$_SESSION['session_of_entry'] = $card_info['session_of_entry']; 
		echo json_encode(array(
							'sn'=>$card_info['sn'],
							'name'=>$card_info['name'],
							'regno'=>$card_info['regno'],
							'appno'=>$card_info['appno'],							
							'exact_date'=>$card_info['date_approved'],
							'date_approved'=>$func->format_date($card_info['date_approved'],'date'),
							'programme'=>$card_info['programme'],
							'session_of_entry'=>$card_info['session_of_entry'],							
							'session_ended'=>$card_info['session_ended'],
							'phone'=>$card_info['phone'],
							'email'=>$card_info['email'],						
							'prog_completed'=>$card_info['prog_completed']						
							
							));
	 
	}  /*******/
	
	
	########################################################################
	/***************/
	// load_staff_profile
		#### 
	#### searching all staff information 
	##############################################	
	if(isset($_POST['load_staff_profile'])){  		
		$user_id = mysql_real_escape_string($_POST['user_id']); ## ($_POST['value']);
		 
		$dbm = new DbTool(); $func = new functions();
			
		$card_info = $dbm->resort($dbm->getFields($dbm->select('staff',array('user_id'=>$user_id)),array('sn','user_id','name','fact_id','dept_id','phone','email')));
		
		$_SESSION['faculty'] =  $card_info['fact_id'];
		$_SESSION['department'] = $card_info['dept_id'];
		
		echo json_encode(array(
							'sn'=>$card_info['sn'],
							'name'=>$card_info['name'],
							'user_id'=>$card_info['user_id'],
							'fact_id'=>$card_info['fact_id'],							
							'dept_id'=>$card_info['dept_id'],
							'phone'=>$card_info['phone'],
							'email'=>$card_info['email']
							));
	 
	}  /*******/
	
	
	########################################################################
	
	 
	 
	#### change_psw 
	// change admin user password 
	 if(isset($_POST['change_psw'])){		 
		$cur_psw = mysql_real_escape_string($_POST['cur_psw']);
		$new_psw = mysql_real_escape_string($_POST['new_psw']);
		$confirm_psw = mysql_real_escape_string($_POST['confirm_psw']); 
		
		####
		$dbm = new DbTool();    
		$cur_user = $dbm->resort($dbm->getFields($dbm->select('users',array('user_id'=>$_SESSION['admUser'])),array('enc_psw')));	 
		
		if($cur_user['enc_psw'] != md5($cur_psw)){
			echo json_encode(array('icon'=>'error','text'=>'your current password is invalid ','title'=>'Invalid Password'));
		}
		else {			
		 if(md5($new_psw) != md5($confirm_psw)){
			echo json_encode(array('icon'=>'error','text'=>"Your New Password did not match",'title'=>'Password Not Matched'));
		
		}
		else if($cur_user['enc_psw'] == md5($new_psw)){
			echo json_encode(array('icon'=>'error','text'=>'you cannot use the same old password','title'=>'No Password Changed'));
		}
		 else {
			 $dbm->updateTb('users',array('password'=>$new_psw,'enc_psw'=>md5($new_psw)),array('user_id'=>$_SESSION['admUser']));
				session_destroy(); session_start(); 
				echo json_encode(array('icon'=>'success','text'=>'your password was successfully changed, you must re-login in to effect your password ','title'=>' Password Changed Successfully'));			
			}
		}	
		  
	 }
	 
	##########################################################################
	##########################################################################
	
	if(isset($_POST['adv_fetch_all_patients'])){
		$text = mysql_real_escape_string($_POST['criterial']);
		$dbm = new DbTool(); 
		$table = "patients"; 
		$criterials = array('fullname'=>$text,'surname'=>$text,'firstname'=>$text,
		'othername'=>$text,'hosp_no'=>$text,'dob'=>$text,'state'=>$text,'military_no'=>$text, 		 
		'lga'=>$text,'phone'=>$text,'email'=>$text,'category'=>$text,'date_c'=>$text,
		'createdby'=>$text); 
		
		## , array("sn","time_c")," DESC "
		$result_01 = $dbm->getFields($dbm->regExpSearch($table, $criterials),
				array('sn','fullname','hosp_no','military_no','dob','state','lga','category')); 
			
		############################################################
		#### after result searched 
		############################################################
		if(!is_null($result_01)){ $n = 0; ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body">						 
							<b> <span class="red"><?php echo count($result_01['hosp_no'])." results </span>  found for your criteria <span class='text-success'>' $text '</span>";  ?> 
							</b> 
						</div>  
					</div>
				</div>
		
		<?php	foreach ($result_01['hosp_no'] as $id) {
			$mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$id),array('time_c'),'and','desc'),array('fullname','surname','firstname','sn','ref_no','othername','dob','type'));
		?>
		<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
					  <div class="card">               
						<div class="card-body">
						  <table class="table table-bordered table-stretched table-hover"> 
							<thead> 
								<tr class="bold text-uppercase text-primary">
									<td style="width:5%"> <span class="badge badge-primary font-18"> <?php echo $n+1; ?> </td>
									<td> user  </td>
									<td> name </td>
									<td> hosp_no </td>
									<td> category </td>
									<td> last visit </td>									
									<td> actions &nbsp; <span class="fa fa-cog"> </span> </td>
								</tr>
							</thead> 
							<tbody>
								<tr>
									<td class="text-uppercase text-info bold">  host </td>
									<td>  <img class="img img-rounded img-responsive" src="" alt="img" /> </td>
									<td > <?php echo $result_01['fullname'][$n];  ?></td>
									<td class="bold text-danger font-33" rowspan="<?php echo (count($mysib['ref_no'])+1);?>"> <?php echo $result_01['hosp_no'][$n];  ?></td>
									<td class="bold text-primary" rowspan="<?php echo (count($mysib['ref_no'])+1);?>"> <?php echo $result_01['category'][$n];  ?></td>
									<td>  last visit  </td>
									
									<td>  
										<button for="<?php echo $id."_host"; ?>"  data-text="<?php echo $result_01['fullname'][$n];  ?>" class="btn btn-inverse-success consult-doc" onclick="manage_patient_docs($(this).attr('data-text'),$(this).attr('for'))"  data-toggle="modal" data-target="#schedulePatientDoctor" data-backdrop="static" data-keyboard="false">   Consult Doctor &nbsp;<i class="fa fa-stethoscope bold fon-30"> </i> </button> 
									</td>
			 					</tr>
								<!-- display all siblings as well -->
								<?php 
									$m = 0; 
									if(!is_null($mysib)) {
									foreach($mysib['ref_no'] as $sid){
									?>
								<tr>
									<td class="text-info bold text-uppercase"> <?php echo $mysib['type'][$m]; ?>   </td>
									 <td> img </td> 
									 <td> <?php echo $mysib['fullname'][$m]; ?> </td> 
									 <!-- <td>  <?php echo $sid; ?>  </td> 
									  <td>  </td>  -->
									 <td> last visit </td> 
									  
									 <td>										
										<button for="<?php echo $sid."_".$mysib['type'][$m];  ?>" data-text="<?php echo $mysib['fullname'][$m]; ?> " class="btn btn-inverse-success consult-doc"  onclick="manage_patient_docs($(this).attr('data-text'),$(this).attr('for'))"  data-toggle="modal" data-target="#schedulePatientDoctor" data-backdrop="static" data-keyboard="false">   Consult Doctor &nbsp;<i class="fa fa-stethoscope bold fon-30"> </i> </button> 
									 </td> 
								</tr>
									<?php 
										$m++; }## end foreach : 
									} ## end not null - sibs  ?>
							<tbody>
						  </table>
						</div> <!-- ./ card-body --> 
					  </div> <!-- ./ card --> 
					</div> <!-- ./ col-lg-5 --> 
					 
			<?php $n++; } ## end foreach.. 

			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  no results found for your criteria <?php echo "' $text '" ;   ?>
							</b> 
						</div>  
					</div>
				</div>
				
			<?php }
	} ## end search 
	
	
	##########################################################################
	####
	if(isset($_POST['save_labtest_result'])){ 
			$categ_id = mysql_real_escape_string($_POST['categ_id']);	
			$dept_id = mysql_real_escape_string($_POST['dept_id']);	
			$billTypeId = mysql_real_escape_string($_POST['billType']);	
			$result = mysql_real_escape_string($_POST['result']);	
			// get price 
			$dbm = new DbTool(); 
			$data = array('name'=>$name,'status'=>'active');
			$prices = $dbm->resort($dbm->getFields($dbm->select('bill_types',array('sn'=>$billTypeId,'dept_id'=>$dept_id,'categ_id'=>$categ_id)),array('sn','name','price')));
				$tot = count($exist['sn']); 
			// save 
			
			$dbm->insert('labtest_reports',array('categ_id'=>$categ_id,'dept_id'=>$dept_id,
				'bill_type_id'=>$billTypeId,'result'=>$result,'price'=>$prices['price'],'bill_name'=>$prices['name'],				
				'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'month_c'=>date('m'),
			 'year_c'=>date('Y'), 'week_c'=>idate('W'),'time_c'=>time()));
			echo json_encode(array('icon'=>'success','text'=>'Report Successfully Created ','title'=>' Result Saved Successfully'));			
	}
	##   
	 /**********************************************************************/
	####
	##########################################################################
	
	if(isset($_POST['save_item_cart'])){		
		$serial =   mysql_real_escape_string($_POST['serial']);
		$qty =   mysql_real_escape_string($_POST['qty']);
		$dbm = new DbTool(); # pharm_products
		$drug_item = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial)),array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains'))); 
			if($qty <= $drug_item['remains'] && $drug_item['remains']>0){
				## add to sales 
				$tcost = $drug_item['cost_price'] * $qty;
				$tsale = $drug_item['selling_price'] * $qty;
				$remains = $drug_item['remains'] - $qty;
				$dbm->insert('pharm_products_sales',array('ref_id'=>$serial,'code'=>$drug_item['code'],
				'barcode'=>$drug_item['barcode'],'qty'=>$qty,'cost_price'=>$drug_item['cost_price'],
				'selling_price'=>$drug_item['selling_price'],'tot_cost'=>$tcost,'tot_sales'=>$tsale,
				'sold_by'=>$_SESSION['admUser']));
				### update stock 
				## $drug_item = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial)),array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				// $dbm->updateTb('pharm_products',array('remains'=>$remains),array('sn'=>$serial));
			}
		echo " item id $serial, total qty : $qty sold by : ".$_SESSION['admUser'];
		
	}
	
	#####################################################
	if(isset($_POST['adv_fetch_all_drug_forms'])){
		$text = mysql_real_escape_string($_POST['criterial']);
		$dbm = new DbTool();  $func = new functions();
		$table = "pharm_products"; 
		$criterials = array('name'=>$text,'code'=>$text,'description'=>$text,
		'barcode'=>$text,'mfc_date'=>$text,'exp_date'=>$text,'cost_price'=>$text,'selling_price'=>$text,
		'date_c'=>$text); 
		
		## , array("sn","time_c")," DESC "
		$result_01 = $dbm->getFields($dbm->regExpSearch($table, $criterials),
				array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains')); 
			
		############################################################
		#### after result searched 
		############################################################
		if(!is_null($result_01)){ $n = 0; ?>				 	
			<b class="h5"> <span class="red"><?php echo count($result_01['name'])." results </span>  found for your criteria <span class='text-success'>' $text '</span>";  ?> 
			</b> 
			 
		<?php	foreach ($result_01['name'] as $name) {
			 ?>
		   <table class="table table-striped"> 
				<tbody>
					<tr>  					
						<td > <b> <?php echo $name;  ?> </b> <br/>  <small><?php echo $result_01['description'][$n];?> </small> <br/>  <br/> 
								 <?php echo "Expires &nbsp; ".$func->stock_expiry($result_01['mfc_date'][$n],$result_01['exp_date'][$n]); ?>
						</td>
						 <td class="bold font-16"> <?php echo "&#8358;&nbsp;".number_format($result_01['selling_price'][$n]);  ?> </td>
						 <!--  <td> <input type="number" class="form-control border-1 font-16 bold item-cart-qty" onchange="manage_item_cart_qty($(this).attr('for'),$(this).val())" style="width:90px;" value="1" for="<?php echo $result_01['sn'][$n];?>"  min="1" max="<?php echo $result_01['remains'][$n]; ?>"  /> </td> -->
						 <td> <input type="number" class="form-control border-1 font-16 bold item-cart-qty" onchange="manage_item_cart_qty2($(this).attr('for'),$(this).val(),$(this).attr('data-text'),$(this).closest('tr').find('span.sales_label'))" style="width:100px;" value="1" for="<?php echo $result_01['sn'][$n];?>"  min="1" max="<?php echo $result_01['remains'][$n]; ?>" data-text="<?php echo $result_01['selling_price'][$n]; ?>"  />   </td> 
						 <td class="bold font-16"> <span class="sales_label"> <?php echo "&#8358;&nbsp;".number_format($result_01['selling_price'][$n]); ?> </span> </td>
						 <td> <button type="button" class="btn btn-icons btn-inverse-dark item-cart-purchase" onclick="add_to_my_cart($(this).attr('for'),$(this).closest('tr').find('input.item-cart-qty').val())" for="<?php echo $result_01['sn'][$n];?>" data-text="1"> <i class="fa fa-forward"> </i>  </button> </td>
					</tr>
					 
				<tbody>
			  </table>
			<br/>
			<?php $n++; } ## end foreach.. 

			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  no results found for your criteria <?php echo "' $text '" ;   ?>
							</b> 
						</div>  
					</div>
				</div>
				
			<?php }
	} ## end search 
	
	##########################################################################
	
	#####################################################
	if(isset($_POST['adv_fetch_add_more_drug_forms'])){
		$text = mysql_real_escape_string($_POST['criterial']);
		$dbm = new DbTool();  $func = new functions();
		$table = "pharm_products"; 
		$criterials = array('name'=>$text,'code'=>$text,'description'=>$text,
		'barcode'=>$text,'mfc_date'=>$text,'exp_date'=>$text,'cost_price'=>$text,'selling_price'=>$text,
		'date_c'=>$text); 
		
		## , array("sn","time_c")," DESC "
		$result_01 = $dbm->getFields($dbm->regExpSearch($table, $criterials),
				array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains')); 
			
		############################################################
		#### after result searched 
		############################################################
		if(!is_null($result_01)){ $n = 0; ?>				 	
			<b class="h5"> <span class="red"><?php echo count($result_01['name'])." results </span>  found for your criteria <span class='text-success'>' $text '</span>";  ?> 
			</b> 
			 
		<?php	foreach ($result_01['name'] as $name) {
			 ?>
		   <table class="table table-striped text-capitalize"> 
				<tbody>
					<tr>  					
						<td > <b> <?php echo $name;  ?> </b> <br/>  <small><?php echo $result_01['description'][$n];?> </small> <br/>  <br/> 
								 <?php echo "Expires &nbsp; ".$func->stock_expiry($result_01['mfc_date'][$n],$result_01['exp_date'][$n]); ?>
						</td>
						 <td class="font-16"> 
							C.P : <?php echo "&#8358;&nbsp;".number_format($result_01['cost_price'][$n]);  ?>  <br/> <br/> 
							S.P <?php echo "&#8358;&nbsp;".number_format($result_01['selling_price'][$n]);  ?> 
						 </td>
						 
						 <td class="font-16"> 
							mfd : <?php echo "&nbsp;".$func->format_date($result_01['mfc_date'][$n]);  ?>  <br/> <br/> 
							expd :<?php echo "&nbsp;".$func->format_date($result_01['exp_date'][$n]);  ?> 
						 </td>

						 <td class="font-16 bold"> 
							rem. : <?php echo "&nbsp;".number_format($result_01['remains'][$n]);  ?>  <br/> <br/> 							
						 </td> 
						
						 <td> <button onclick="manage_product_import_update($(this).attr('for'),$(this).attr('data-text'))" for="<?php echo $result_01['sn'][$n]; ?>" data-text="<?php echo $name."|".$result_01['cost_price'][$n]."|".$result_01['selling_price'][$n]; ?>" type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#updateProductManager"  data-backdrop="static" data-keyboard="false" > <i class="fa fa-plus"> </i>  update </button> </td>
					</tr>
					 
				<tbody>
			  </table>
			<br/>
			<?php $n++; } ## end foreach.. 

			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  no results found for your criteria <?php echo "' $text '" ;   ?>
							</b> 
						</div>  
					</div>
				</div>
				
			<?php }
	} ## end search 
	
	##########################################################################
	// display_item_cart
	if(isset($_POST['display_item_cart'])){
		## 
		#sleep(1);
		$dbm = new DbTool(); # pharm_products
		$drug_item = $dbm->getFields($dbm->select('pharm_products_sales',array('sold_by'=>$_SESSION['admUser'],'sold'=>'no')),array('sn','ref_id','code','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains','qty','tot_cost','tot_sales'));
				
		############################################################
		if(!is_null($drug_item)){ $n = 0; 
			$tot_price = array_sum($drug_item['tot_sales']);
		?>				 	
			 
		<?php	foreach ($drug_item['ref_id'] as $id) {
				  $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$id)),array('sn','name','description','remains'))); 
			 ?>
		   <table class="table table-striped"> 
				<tbody>
					<tr>  					
						<td style="width:45%"> <b> <?php echo $drug_info['name'];  ?> </b> <br/>  <small><?php echo $drug_info['description'];?> </small> </td>
						 <!-- <td> <input type="number" class="form-control border-1 font-16 bold item-cart-qty" onchange="manage_item_cart_qty2($(this).attr('for'),$(this).val(),$(this).attr('data-text'),$(this).closest('tr').find('span.sales_label'))" style="width:100px;" value="<?php echo $drug_item['qty'][$n]?>" for="<?php echo $drug_item['sn'][$n];?>"  min="1" max="<?php echo $drug_info ['remains']; ?>" data-text="<?php echo $drug_item['selling_price'][$n]; ?>"  />   </td> -->
						 <td> <b> [&nbsp;  <?php echo $drug_item['qty'][$n]?> &nbsp; ] </b>  </td>
						 <td class="bold font-16"> <span class="sales_label"> <?php echo "&#8358;&nbsp;".number_format($drug_item['tot_sales'][$n]); ?> </span> </td>
						 <td> <button type="button" class="btn btn-icons btn-inverse-danger item-cart-purchase-reverse" onclick="rem_from_my_cart($(this).attr('for'))" for="<?php echo $drug_item['sn'][$n];?>"> <i class="fa fa-close"> </i>  </button> </td>
					</tr> 
				<tbody>
			  </table>
			<br/>
			<?php $n++; } ## end foreach.. 	 ?>
			
			<p class="h5 bold text-primary"> <?php echo "TOTAL COST : &nbsp; &#8358; ".number_format($tot_price); ?>  &nbsp; &nbsp;  
				<button type="button"  class="btn btn-primary btn-md " data-toggle="modal" data-target="#pharm_payment" for="<?php echo $tot_price; ?>" data-text="<?php echo number_format($tot_price); ?>" onClick="$('.amount_due').html('&#8358; '+$(this).attr('data-text')),$('#pay_pharm_now').attr('for',$(this).attr('for')),$('div.output_receipt').hide('fast');"> Check Out &nbsp; <i class="fa fa-money"> </i> </button>
			</p>
			<?php 
			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  empty cart 
							</b> 
						</div>  
					</div>
				</div>
				
			<?php } 	
		
	}
	##########################################################################
	
	##########################################################################
	// display_lab_test_results
	if(isset($_POST['display_lab_test_results'])){
		## 
		#sleep(1);
		$dbm = new DbTool(); # pharm_products
		$items = $dbm->getFields($dbm->select('labtest_reports',array('c_by'=>$_SESSION['admUser'],'payment_status'=>'unpaid')),
		array('sn','categ_id','dept_id','bill_type_id','result','price','bill_name')); 
				 
		############################################################
		if(!is_null($items)){ $n = 0; 
			$tot_price = array_sum($items['price']);
		?>				 	
			 
		<?php	foreach ($items['bill_name'] as $bill_name) {
				  // $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$id)),array('sn','name','description','remains'))); 
			 ?>
		   <table class="table table-striped"> 
				<tbody>
					<tr>  					
						<td>  <i class=" fa fa-comment text-warning fa-2x" title="<?php echo $items['result'][$n];?>"> </i> </td>
						<td style="width:45%"> <b> <?php echo $bill_name;  ?> </b> <br/>  <small><?php echo $drug_info['description'];?> </small> </td>
						<td class="bold font-16"> <span class="sales_label"> <?php echo "&#8358;&nbsp;".number_format($items['price'][$n]); ?> </span> </td>
						<td> <button type="button" class="btn btn-sm btn-icons btn-inverse-danger reverse-labtest-item" onclick="rem_from_my_labtest($(this).attr('for'))" for="<?php echo $items['sn'][$n];?>"> <i class="fa fa-close"> </i>  </button> </td>
					</tr> 
				<tbody>
			  </table>
			<br/>
			<?php $n++; } ## end foreach.. 	 ?>
			
			<p class="h5 bold text-primary"> <?php echo "TOTAL COST : &nbsp; &#8358; ".number_format($tot_price); ?>  &nbsp; &nbsp;  
				<button type="button"  class="btn btn-primary btn-md " data-toggle="modal" data-target="#lab_payment" for="<?php echo $tot_price; ?>" data-text="<?php echo number_format($tot_price); ?>" onClick="$('.amount_due').html('&#8358; '+$(this).attr('data-text')),$('#pay_pharm_now').attr('for',$(this).attr('for')),$('div.output_receipt').hide('fast');"> Check Out &nbsp; <i class="fa fa-money"> </i> </button>
			</p>
			<?php 
			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  empty cart 
							</b> 
						</div>  
					</div>
				</div>
				
			<?php } 	
		
	}
	##########################################################################
	
	/***********************************************/
		# - rem_from_my_cart
			if(isset($_POST['rem_from_my_cart'])){
				$serial = mysql_real_escape_string($_POST['serial']);
				$dbm = new DbTool();  
				$exists = $dbm->getFields($dbm->select('pharm_products_sales',array('sn'=>$serial)),array('barcode','ref_id','selling_price','tot_sales'));	 
				### 
				if(!is_null($exists)) {
					 $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$exists['ref_id'][0])),array('sn','name','description','remains'))); 
					 $dbm->deleteRow('pharm_products_sales',array('sn'=>$serial)); 
					 echo json_encode(array('icon'=>'success','text'=>$drug_info['name'].'  [  '.$drug_info['description'].' ] successfully removed','title'=>'Cart Item Removed'));
				} else {
					echo json_encode(array('icon'=>'error','text'=>'No cart item found ','title'=>'Cart Item Not Found'));
				}
				
			}
	/***********************************************/
	/***********************************************/
	
		# - rem_from_my_labtest
			if(isset($_POST['rem_from_my_labtest'])){
				$serial = mysql_real_escape_string($_POST['serial']);
				$dbm = new DbTool();  
				$exists = $dbm->getFields($dbm->select('labtest_reports',array('sn'=>$serial)),array('bill_name','ref_no','price'));	 
				### 
				if(!is_null($exists)) {
				//	 $drug_info = $dbm->resort($dbm->getFields($dbm->select('labtest_reports',array('sn'=>$exists['ref_id'][0])),array('sn','name','description','remains'))); 
					 $exists = $dbm->resort($exists); 
					 $dbm->deleteRow('labtest_reports',array('sn'=>$serial)); 
					 echo json_encode(array('icon'=>'success','text'=>$exists['bill_name'].' successfully removed','title'=>'Lab Result Removed'));
				} else {
					echo json_encode(array('icon'=>'error','text'=>'No Lab item found ','title'=>'Lab. Item Not Found'));
				}
				
			}
	/***********************************************/
	
		
	###################################
	if(isset($_POST['patient_name_search'])){		// patient searching 
		$word = mysql_real_escape_string(strip_tags($_POST["keyword"])); 
		if(!empty($word)) {
			$dbm = new DbTool(); 
			$info = $dbm->getFields($dbm->regExpSearch('patients', array('fullname'=>$word,'hosp_no'=>$word,
					'phone'=>$word,'address'=>$word),array('fullname'), " DESC ",'10'),array('fullname','hosp_no','sn'));
			$tot = count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['fullname'] as $patient) {
					   $mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$info['hosp_no'][$m]),array('time_c'),'and','desc'),array('fullname','surname','firstname','sn','ref_no','othername','dob','type','date_c'));
				## for($p = 1;$p<=10; $p++) {
					  $patient = str_replace($word, "<b class='text-purple'>".$word."</b>", $patient).' &nbsp; - ('.$info['hosp_no'][$m].')';
					// $fname = $customs['customer_no'][$m]." -- ".$customs['customer_name'][$m]." -- ".$customs['slipno'][$m];
					// $text = $word.' found. --'.$tot;
				?>
				<li onclick="set_name('<?php echo $patient; ?>','<?php echo $info['hosp_no'][$m].'|host'; ?>');">  <?php echo $patient; ?></li>
				<?php
					 if(!is_null($mysib)){
						 $k = 0; 
						  foreach($mysib['fullname'] as $patient) {
							   $patient = str_replace($word, "<b class='text-purple'>".$word."</b>", $patient).' - ('.$mysib['ref_no'][$k].' - '.$mysib['type'][$k].')';
							 ?>
							<li onclick="set_name('<?php echo $patient; ?>','<?php echo $mysib['ref_no'][$k].'|'.$mysib['type'][$k]; ?>');">  <?php echo $patient; ?></li>
							<?php  $k++; 
						  } // end 2nd foreach 
					 } // end sibling 
				
					if($l>20) break; 
					/// echo '<li onclick="set_no(\''.str_replace("'", "\'", $customer).'\')">'.$fname.'</li>';
				  $l++; $m++;
			    	}
				} ## end not null 		
				else { ?>
					<li class="red"> no patient found for your criterial </li>
				<?php }
			 }  // end not empty keyword 
			
	}/// end custom_search
	###################################
	
	if(isset($_POST['make_pharm_payment'])){
		$due = mysql_real_escape_string($_POST['due']);
		$amount_paid = mysql_real_escape_string($_POST['amount_paid']);
		$patient_ref = mysql_real_escape_string($_POST['patient_ref']); ## hosp_no | host 
		$dbm = new DbTool(); # pharm_products
		$drug_item = $dbm->getFields($dbm->select('pharm_products_sales',array('sold_by'=>$_SESSION['admUser'],'sold'=>'no')),array('sn','ref_id','code','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains','qty','tot_cost','tot_sales'));
		#  $dbm = new DbTool(); #  
		$type = explode('|',$patient_ref)[1];
		$ref_no = explode('|',$patient_ref)[0];
		switch($type){
			case "host":{ $table = "patients"; $field = "hosp_no";  } break;
			default : { $table = "patients_siblings"; $field = "ref_no"; } break;
		}
		
		// make_pharm_payment
		// $items = $dbm->getFields($dbm->select('labtest_reports',array('c_by'=>$_SESSION['admUser'],'payment_status'=>'unpaid')),array('bill_name','ref_no','price','bill_type_id'));
		$patient_info = $dbm->resort($dbm->getFields($dbm->select($table,array('status'=>'active',$field=>$ref_no ,'type'=>$type),array('time_c'),'and','desc'),array('fullname','title','sn','category')));     
		//$patient_info =  $dbm->getFields($dbm->select($table,array('status'=>'active',$field=>$ref_no ,'type'=>$type),array('time_c'),'and','desc'),array('fullname','title','sn','category'));     
					
		############################################################
		if(!is_null($drug_item)){ $n = 0; 			
			$tot_price = array_sum($drug_item['tot_sales']);
			$recpno = getPharmRecpId(); 
			// check if payment is completed or not 
			$paid_status = ($amount_paid >= $tot_price ) ?"paid":"unpaid";
			$balance = ($amount_paid >= $tot_price)?'0': ($tot_price - $amount_paid); 
			$refund = ($amount_paid > $tot_price)?($amount_paid - $tot_price): '0' ; 
			// create receipt ref no 		
			$data = array('name'=>$patient_info['fullname'],'pay_type'=>'pharmacy','receipt_no'=>$recpno,'total_fee'=>$tot_price,
			'amount_paid'=>$amount_paid,'balance'=>$balance,'refund'=>$refund,'category'=>$patient_info['category'],
			'consume'=>'no','payment_status'=>$paid_status,'ref_no'=>explode('|',$patient_ref)[0],
			'type'=>explode('|',$patient_ref)[1],'date_c'=>date('Y-m-d'),'month_c'=>date('m'),
			'year_c'=>date('Y'), 'week_c'=>idate('W'),'time_c'=>time());
			$dbm->insert('patient_receipts',$data);
			
			// update pharm store for remains 
			foreach($drug_item['ref_id'] as $serial){
				### update stock 
				$drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial)),array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
					'selling_price','date_c','remains'))); 
				$remains = 	$drug_info['remains'] - $drug_item['qty'][$n]; 
				$dbm->updateTb('pharm_products',array('remains'=>$remains),array('sn'=>$serial));
				### update pharm_products_sales
				$dbm->updateTb('pharm_products_sales',array('sold_to'=>$patient_ref,'sold'=>'yes',
					'payment_status'=>$paid_status,'receipt_no'=>$recpno,
					'date_sold'=>date('Y-m-d'),'month_sold'=>date('m'),
					'year_sold'=>date('Y'), 'week_sold'=>idate('W'),'time_sold'=>time()),
					array('ref_id'=>$serial,'sold'=>'no','sold_by'=>$_SESSION['admUser']));
			} #  end foreach   
			
			$address = "receipt_slip.php?rcn=".base64_encode($recpno);
			echo json_encode(array('icon'=>'success','address'=>$address,'text'=>" Paid Amount $amount_paid , New balance is : $balance  ",'title'=>'Payment Successful')); 
			
		}  ## end if not null 
		############################################################################	
			 
	}
	
	/*******************make_lab_payment ***********/
	
	if(isset($_POST['make_lab_payment'])){
		$due = mysql_real_escape_string($_POST['due']);
		$amount_paid = mysql_real_escape_string($_POST['amount_paid']);
		$patient_ref = mysql_real_escape_string($_POST['patient_ref']); ## hosp_no | host 
		$dbm = new DbTool(); #  
		$type = explode('|',$patient_ref)[1];
		$ref_no = explode('|',$patient_ref)[0];
		switch($type){
			case "host":{ $table = "patients"; $field = "hosp_no";  } break;
			default : { $table = "patients_siblings"; $field = "ref_no"; } break;
		}
		
		// make_lab_payment
		$items = $dbm->getFields($dbm->select('labtest_reports',array('c_by'=>$_SESSION['admUser'],'payment_status'=>'unpaid')),array('bill_name','ref_no','price','bill_type_id'));
		$patient_info = $dbm->resort($dbm->getFields($dbm->select($table,array('status'=>'active',$field=>$ref_no ,'type'=>$type),array('time_c'),'and','desc'),array('fullname','title','sn','category')));     
		//$patient_info =  $dbm->getFields($dbm->select($table,array('status'=>'active',$field=>$ref_no ,'type'=>$type),array('time_c'),'and','desc'),array('fullname','title','sn','category'));     
					
		############################################################
		if(!is_null($items)){ $n = 0; 			
			$tot_price = array_sum($items['price']);
			$recpno = getLabRecpId(); 
			// check if payment is completed or not 
			$paid_status = ($amount_paid >= $tot_price ) ?"paid":"unpaid";
			$balance = ($amount_paid >= $tot_price)?'0': ($tot_price - $amount_paid); 
			$refund = ($amount_paid > $tot_price)?($amount_paid - $tot_price): '0' ; 
			// create receipt ref no 		
			$data = array('name'=>$patient_info['fullname'],'pay_type'=>'laboratory','receipt_no'=>$recpno,'total_fee'=>$tot_price,
			'amount_paid'=>$amount_paid,'balance'=>$balance,'refund'=>$refund,'category'=>$patient_info['category'],
			'consume'=>'no','payment_status'=>$paid_status,'ref_no'=>$ref_no,
			'type'=>$type,'date_c'=>date('Y-m-d'),'month_c'=>date('m'),
			'year_c'=>date('Y'), 'week_c'=>idate('W'),'time_c'=>time());
			$dbm->insert('patient_receipts',$data);
			
			// update pharm store for remains 
			foreach($items['bill_type_id'] as $serial){
				### update stock 
				/*** $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial)),array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
					'selling_price','date_c','remains'))); ****/
				### $remains = 	$drug_info['remains'] - $drug_item['qty'][$n]; 
				## $dbm->updateTb('labtest_reports',array('remains'=>$remains),array('sn'=>$serial));
				### update pharm_products_sales
				$dbm->updateTb('labtest_reports',array('sold_to'=>$patient_ref,
					'payment_status'=>$paid_status,'receipt_no'=>$recpno),					
					array('bill_type_id'=>$serial,'payment_status'=>'unpaid','c_by'=>$_SESSION['admUser']));
			} #  end foreach   
			
			$address = "receipt_slip.php?rcn=".base64_encode($recpno);
			echo json_encode(array('icon'=>'success','address'=>$address,'text'=>" Paid Amount $amount_paid , New balance is : $balance  ",'title'=>'Payment Successful')); 
			
		}  ## end if not null 
		############################################################################	
			 
	}
	/******************************/
	
	
	if(isset($_POST['adv_fetch_all_patients_forms'])){
		$text = mysql_real_escape_string($_POST['criterial']);
		$dbm = new DbTool();  $func = new functions();
		$table = "patients"; 
		$criterials = array('fullname'=>$text,'surname'=>$text,'firstname'=>$text,
		'othername'=>$text,'hosp_no'=>$text,'dob'=>$text,'state'=>$text,'military_no'=>$text,
		'lga'=>$text,'phone'=>$text,'email'=>$text,'category'=>$text,'date_c'=>$text,
		'createdby'=>$text); 
		
		## , array("sn","time_c")," DESC "
		$result_01 = $dbm->getFields($dbm->regExpSearch($table, $criterials),
				array('sn','createdby','phone','email','state','fullname','hosp_no','military_no','dob','state','lga','category','date_c')); 
			
		############################################################
		#### after result searched 
		############################################################
		if(!is_null($result_01)){ $n = 0; ?>				 	
			<b class="h4"> <span class="red"><?php echo count($result_01['hosp_no'])." results </span>  found for your criteria <span class='text-success'>' $text '</span>";  ?> 
			</b> 
			<p>&nbsp; <p/>		 
		
		<?php	foreach ($result_01['hosp_no'] as $id) {
			$mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$id),array('time_c'),'and','desc'),array('fullname','surname','firstname','sn','ref_no','othername','dob','type','date_c'));
			$title = base64_encode($result_01['title'][$n]);
			$myname = base64_encode($result_01['fullname'][$n]);
			## $mymilno = base64_encode($result_01['military_no'][$n]);
			$mydate_c =  base64_encode($func->format_date($result_01['date_c'][$n],'date'));
			$myhsp = base64_encode($id);
			$mytype = base64_encode($result_01['category'][$n].' [ host ]');
			$mytype2 = base64_encode('host');
			$old = $func->years_old($result_01['dob'][$n],date('Y-m-d'));
			$dob = base64_encode($old);
			$data_text = $result_01['fullname'][$n]."|".$id."|".$result_01['military_no'][$n]."|".$result_01['category'][$n]."|host";
			$url3 = "receipt_slip.php?tit=$title&n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c"; 
		?>
		   <table class="table table-bordered table-responsive table-hover"> 
				<tbody>
					<tr>
						<td class="text-uppercase text-info bold">  host </td>						
						<td > <b> <?php echo $result_01['fullname'][$n];  ?> </b> </td>
						<td class="bold text-danger font-33" rowspan="<?php echo (count($mysib['ref_no'])+1);?>"> <label class="badge badge-info font-18"> <?php echo $result_01['hosp_no'][$n];  ?> </label> </td>												
						<td class="text-capitalize">  
							<a class="btn btn-sm btn-success text-white bold" data-text="<?php echo $id."|host|".$result_01['fullname'][$n]; ?>" onclick="set_vs_info($(this).attr('data-text'))" data-toggle="modal" data-target="#vitalScienceModal">  Take Vital Science </a> 
							<a class="btn btn-primary btn-sm" href="<?php echo "reg_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> registration slip </a> 
							<a class="btn btn-success btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> treatment slip </a> 
							<a onclick="load_all_bill_type($('#allBillType')),manage_receipt_view($(this).attr('data-text'))" data-toggle="modal" data-target="#createPatientBill" data-backdrop="static" data-keyboard="false" class="btn btn-warning btn-sm" href="#" data-text="<?php echo $data_text; ?>"> Create Payment Receipt </a> 
							<!-- <a class="btn btn-warning btn-sm" href="<?php echo "receipt_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> Payment Receipt </a>  -->
							<!-- <br/>
							<a class="btn btn-info btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> receipts </a> 
							 -->
						</td>
					</tr>
					<!-- display all siblings as well -->
					<?php 
						$m = 0; 
						if(!is_null($mysib)) {
						foreach($mysib['ref_no'] as $sid){
							$myname = base64_encode($mysib['fullname'][$m]);
							$mymilno = base64_encode($result_01['military_no'][$n]);
							$mydate_c =  base64_encode($func->format_date($mysib['date_c'][$m],'date'));
							$myhsp = base64_encode($sid);
							$mytype = base64_encode($result_01['category'][$n].' [ <b>'.$mysib['type'][$m].'</b> ]');
							$mytype2 = base64_encode($mysib['type'][$m]);
							$old = $func->years_old($mysib['dob'][$m],date('Y-m-d'));
							$dob = base64_encode($old);
							$data_text = $mysib['fullname'][$m]."|".$sid."|".$result_01['military_no'][$n]."|".$result_01['category'][$n]."|".$mysib['type'][$m];
							$url3 = "receipt_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c"; 
						?> 
					<tr>
						<td class="text-info bold text-uppercase"> <?php echo $mysib['type'][$m]; ?>   </td>
						 
						 <td> <b><?php echo $mysib['fullname'][$m]; ?> </b> </td> 
						
						 <td>		
							<a class="btn btn-sm btn-success text-white bold" data-text="<?php echo $sid."|".$mysib['type'][$m]."|".$mysib['fullname'][$m]; ?>" onclick="set_vs_info($(this).attr('data-text'))"  data-toggle="modal" data-target="#vitalScienceModal">  Take Vital Science </a> 
							<a class="btn btn-primary btn-sm" href="<?php echo "reg_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> Registration Slip </a> 
							<a class="btn btn-success btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> Treatment Slip </a> 
							<a onclick="load_all_bill_type($('#allBillType')),manage_receipt_view($(this).attr('data-text'))" data-toggle="modal" data-target="#createPatientBill" data-backdrop="static" data-keyboard="false" class="btn btn-warning btn-sm" href="#" data-text="<?php echo $data_text; ?>"> Create Payment Receipt </a> 
							<!-- <br/>
							<a class="btn btn-info btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> receipts </a> 
							 -->
						 </td> 
					</tr>
						<?php 
							$m++; }## end foreach : 
						} ## end not null - sibs  ?>
				<tbody>
			  </table>
						 <br/>
			<?php $n++; } ## end foreach.. 

			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  no results found for your criteria <?php echo "' $text '" ;   ?>
							</b> 
						</div>  
					</div>
				</div>
				
			<?php }
	} ## end search 
	
	##########################################################################
	/******************************/
	
	if(isset($_POST['get_recp_barcode_pay_form'])){
		##  
		$recp_no = mysql_real_escape_string($_POST['recp_barcode']);
		$dbm = new DbTool();  $func = new functions();
		$recp_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$recp_no,'status'=>'active')),array('name','total_fee','amount_paid','balance','payment_status','ref_no','category','type','military_no','date_c','year_c','c_by','month_c','week_c','day_c'));			
		$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));	 
		### 
		if(!is_null($recp_info)){  ?>
		<span class="bold h4"> PAYMENT UPDATES </span>  <p> &nbsp; </p>		
		<?php
			if($recp_info['balance'][0]<= 0) {
			 echo "<span class='h4 bold text-success'>  PAYMENT COMPLETED    <i class='fa fa-check'> </i></span>";	
				
			}
		else {
		?>
		 <div class="text-capitalize">  			
			<div class="form-group" id="fm20" style="border:5px thin #000;">
			  <label class="bold text-info"> payment balance </label> 
			  <div class="input-group border-1" title="Patient category">
				<input style="font-size:16px; height:40px;" autocomplete="false" type="text" id="bal_amount" name="bal_amount" value="<?php echo $recp_info['balance'][0]; ?>"  class="form-control" placeholder="Amount Balance">
				<div class="input-group-append">
				  <span class="input-group-text" style="height:40px;">
					<i class="fa fa-money text-black"></i>
				  </span>
				</div>
			  </div>
			  <span class="bal_amountMsg"> </span>
			</div> <!-- ./  form-group -->
			
			<div class="form-group">
			  <button onclick="manage_payment_balance($(this).attr('for'),$('#bal_amount').val())" for="<?php echo $recp_no; ?>" style="font-size:18px; height:50px;" id="pay_balance" name="pay_balance" class="btn btn-primary submit-btn btn-block ladda-button" data-style="expand-right"> Pay Balance&nbsp; <i class="fa fa-money text-white"></i></button>
			</div>
			
		</div> 
		
		<?php } ?> 
		
	 
		<?php 
		} // end not null 
	} ##  end request 
				
	if(isset($_POST['get_recp_barcode'])){
		##  
		$recp_no = mysql_real_escape_string($_POST['recp_barcode']);
		$dbm = new DbTool();  $func = new functions();
		$recp_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$recp_no,'status'=>'active')),array('refund','name','total_fee','amount_paid','balance','payment_status','ref_no','category','type','military_no','date_c','year_c','c_by','month_c','week_c','day_c'));			
		$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));	 
		### 
		if(!is_null($recp_info)){ ?>
				 <h4 class="card-title bold text-uppercase text-center text-black font-18">
				  <img class="img img-sm" src="<?php  echo $system_info['url2'][0].''.$system_info['logo'][0];?>" style="height:30px; width:30px;" />&nbsp; &nbsp;
					<?php  echo $system_info['name'][0]; ?> <br/> 
					<span class="small font-16"> <?php  echo $system_info['address'][0]; ?>    &nbsp; &nbsp;  <i class="fa fa-phone"> </i> <?php echo $system_info['phone'][0];?>	</span> <br/> 
					<span class="bold font-16"> payment receipts </span> 
				  </h4> 
				
				<fieldset class="fieldset-dotted">
						<div class="all-bordered text-center text-uppercase bold"> receipt no :  <?php echo $recp_no; ?></div>
						<table class="table text-capitalize "> 
							 <tr class=""> 
								<td  class="bold"> PAID BY :</td>
								<td class="border-left-dot"> <b><?php echo $recp_info['name'][0]; ?>  &nbsp; - &nbsp;  <?php echo $recp_info['category'][0]." [ ".$recp_info['type'][0]." ] "; ?> </b> </td>	
							</tr>	 
						 
							<tr>	
								<td  class="bold"> ID: </td>
								<td class="border-left-dot"> <b>HSP:</b> &nbsp; &nbsp; <?php echo $recp_info['ref_no'][0]; ?>  &nbsp; &nbsp; &nbsp; &nbsp; <b> MILT: </b>  &nbsp; &nbsp; <?php echo $recp_info['military_no'][0]; ?>     </td>	
							</tr>   
							
							<tr>	
								<td  class="bold"> PAYMENT INFO: </td>
								<td class="border-left-dot"> <b>total Fee:</b> &nbsp;  <span class="h4 text-black">&nbsp; <?php echo "N ".number_format($recp_info['total_fee'][0]); ?>  </span>
								&nbsp; &nbsp; &nbsp; &nbsp; <b> Amount Paid: </b>  &nbsp;  <span class="h4 text-success">&nbsp; <?php echo "N ".number_format($recp_info['amount_paid'][0]); ?>   </span> 
									&nbsp; &nbsp; <br/><br/> <b> Balance: </b>  <span class="h4 text-danger">&nbsp; &nbsp; <?php echo "N ".number_format($recp_info['balance'][0]); ?> </span>
									&nbsp; &nbsp;   <b> refunds: </b>  <span class="h4 text-success">&nbsp; &nbsp; <?php echo "N ".number_format($recp_info['refund'][0]); ?> 

									</span>
								</td>	
							</tr>   
						   
						</table>
						 
					</fieldset>  
					 
					<fieldset class="fieldset-dotted">
					 
					 <div class="all-bordered text-center text-uppercase bold"> beign payment for  </div>
					  <table class="table"> <tbody>
					 <?php 
						if(!is_null($recp_info)){
							$all_bills = $dbm->getFields($dbm->select('pending_bills',array('receipt_no'=>$recp_no,'status'=>'active')),array('sn','bill_type'));
							  $n = 0; if(!is_null($all_bills)){ foreach ($all_bills['bill_type']  as $val){								
							?>
									<tr> 										
										<th style="width:25%;"> <?php echo $n+1; ?> </th> 
										<th colspan="2"> <?php echo $val; ?> </th> 										 
									
									</tr>									
							<?php $n ++; }
							?>
							 
							
							<?php 
							} # end not null 
							 
							else { ?>
								<tr> 										
									<th colspan="4"> <span class="text-danger"> no bill is available </span> </th>
								</tr>
								
							<?php } 
							 
						}
					 ?>
					 </tbody>
					 </table>
					</fieldset>   
					<div class="text-center">
						<img id="" class="" src="<?php echo "../images/barcodes/$recp_no.png"; ?>"  />
						<a class="btn btn-info" href="<?php echo "receipt_slip.php?rcn=".base64_encode($recp_no);?>" target="_blank"> Print  </a>
					</div> 
		
		<?php }
		else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  no results found for your criteria <?php echo "' $recp_no '" ;   ?>
							</b> 
						</div>  
					</div>
				</div>
				
			<?php }
		
	}
		
					
	if(isset($_POST['add_to_my_payment'])){
		##  recp_no:recp_no,amount:amount
		$recp_no = mysql_real_escape_string($_POST['recp_no']);
		$amount = mysql_real_escape_string($_POST['amount']);
		
		$dbm = new DbTool();  $func = new functions();
		$recp_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$recp_no,'status'=>'active')),array('name','total_fee','amount_paid','balance','payment_status','ref_no','category','type','military_no','date_c','year_c','c_by','month_c','week_c','day_c'));
		
		if(!is_numeric($amount)){
			echo json_encode(array('icon'=>'error','text'=>'The Amount must be Integer Type ','title'=>' Invalid Amount '));			
		}
		else if(is_null($recp_info)){
			echo json_encode(array('icon'=>'error','text'=>'There is an error with the receipt : NOT FOUND ','title'=>' Invalid Payment Parameters '));						
		} # end null 
		else{
			## now save the update 
			$upd_payment = $amount + $recp_info['amount_paid'][0];
			$balance = $recp_info['total_fee'][0] - $upd_payment; 
			if($balance <= 0)
			{ $change = abs($recp_info['total_fee'][0] - $upd_payment); 
				$dbm->updateTb('patient_receipts',array('refund'=>$change,'payment_status'=>'paid','amount_paid'=>$upd_payment,'balance'=>'0'),array('receipt_no'=>$recp_no));
				echo json_encode(array('icon'=>'success','text'=>"$amount Deposited, Refunds is $change ",'title'=>'Payment Successful'));						
			}
			else{
				$dbm->updateTb('patient_receipts',array('refund'=>'0','payment_status'=>'unpaid','amount_paid'=>$upd_payment,'balance'=>$balance),array('receipt_no'=>$recp_no));
				echo json_encode(array('icon'=>'success','text'=>" $amount Deposited, New balance is : $balance  ",'title'=>'More Amount Deposited'));						
			} 
		}
		
		} #  end of request 
	/************************************************************/	
	// verify_receipt
	if(isset($_POST['verify_receipt'])){
		##  
		$recp_no = mysql_real_escape_string($_POST['recp_no']);
		$dbm = new DbTool();  $func = new functions();
		$recp_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$recp_no,'status'=>'active')),array('refund','name','total_fee','amount_paid','balance','payment_status','ref_no','category','type','military_no','date_c','year_c','c_by','month_c','week_c','day_c','consume'));			
		########
		if(is_null($recp_info)){
				echo " <span class='red font-20'>Invalid Receipt </span>";
		}
		else {
			if($recp_info['consume'][0]=="yes"){
				echo " <span class='red font-20'> This Receipt Has already been used  </span>";
			}
			else{ ?>
				<table class="table text-uppercase">
				<tr>  
					<th colspan="2" class="font-16">  payment info </th>
				</tr>
			 
				<tr>  
					<th>  name:</th> &nbsp;  <td> <?php echo $recp_info['name'][0]; ?>  </span> </td>
				</tr>
				<tr>  
					<th>  total Fee:</th> &nbsp;  <td> <?php echo "N ".number_format($recp_info['total_fee'][0]); ?>  </span> </td>
				</tr>
				<tr>
					<th>  Amount Paid: </th> <td>    <?php echo "N ".number_format($recp_info['amount_paid'][0]); ?>    </td>
					</tr>
				<tr> <th> Balance: </th> <td>   <?php echo "N ".number_format($recp_info['balance'][0]); ?> </td>
				</tr>
				<tr> <th> refunds: </th> <td> <?php echo "N ".number_format($recp_info['refund'][0]); ?>  </td>
				</tr>
				<tr> <th> consumed: </th> <td> <?php echo $recp_info['consume'][0]; ?>  </td>
				</tr>
				  </table>	    
			<?php }		
		}
		
	}
	
	
		
	if(isset($_POST['adv_fetch_all_patients_reports'])){
		$text = mysql_real_escape_string($_POST['criterial']);
		$dbm = new DbTool();  $func = new functions();
		$table = "patients"; 
		$criterials = array('fullname'=>$text,'surname'=>$text,'firstname'=>$text,
		'othername'=>$text,'hosp_no'=>$text,'dob'=>$text,'state'=>$text,'military_no'=>$text,
		'lga'=>$text,'phone'=>$text,'email'=>$text,'category'=>$text,'date_c'=>$text,
		'createdby'=>$text); 
		
		## , array("sn","time_c")," DESC "
		$result_01 = $dbm->getFields($dbm->regExpSearch($table, $criterials),
				array('sn','createdby','phone','email','title','state','fullname','hosp_no','military_no','dob','state','lga','category','date_c')); 
			
		############################################################
		#### after result searched 
		############################################################
		if(!is_null($result_01)){ $n = 0; ?>				 	
			<b class="h4"> <span class="red"><?php echo count($result_01['hosp_no'])." results </span>  found for your criteria <span class='text-success'>' $text '</span>";  ?> 
			</b> 
			<p>&nbsp; <p/>		 
		
		<?php	foreach ($result_01['hosp_no'] as $id) {
			$mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$id),array('time_c'),'and','desc'),array('fullname','surname','firstname','sn','ref_no','othername','dob','type','date_c'));
			$title = base64_encode($result_01['title'][$n]);
			$myname = base64_encode($result_01['fullname'][$n]);
			$mymilno = base64_encode($result_01['military_no'][$n]);
			$mydate_c =  base64_encode($func->format_date($result_01['date_c'][$n],'date'));
			$myhsp = base64_encode($id);
			$mytype = base64_encode($result_01['category'][$n].' [ host ]');
			$mytype2 = base64_encode('host');
			$mycateg = base64_encode($result_01['category'][$n]);
			$old = $func->years_old($result_01['dob'][$n],date('Y-m-d'));
			$dob = base64_encode($old);
			 
		?>
		   <table class="table table-bordered table-responsive table-hover"> 
				<tbody>
					<tr>
						<td class="text-uppercase text-info bold">  host </td>						
						<td > <?php echo $result_01['fullname'][$n];  ?></td>
						<td class="bold text-danger font-33" rowspan="<?php echo (count($mysib['ref_no'])+1);?>"> <label class="badge badge-info font-18"> <?php echo $result_01['hosp_no'][$n];  ?> </label> </td>						
						<td class="text-capitalize">  
							<a class="btn btn-primary btn-sm" href="<?php echo "medical_task_reports.php?n=$myname&mctg=$mycateg&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> create new report <i class="fa fa-comment "> </i> </a> 
							<!--
						<a class="btn btn-success btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> view reports  <i class="fa fa-eye"> </i> </a> 
							 
							<a class="btn btn-info btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> receipts </a> 
							 -->
						</td>
					</tr>
					<!-- display all siblings as well -->
					<?php 
						$m = 0; 
						if(!is_null($mysib)) {
						foreach($mysib['ref_no'] as $sid){
							$myname = base64_encode($mysib['fullname'][$m]);
							$mymilno = base64_encode($mysib['military_no'][$m]);
							$mydate_c =  base64_encode($func->format_date($mysib['date_c'][$m],'date'));
							$myhsp = base64_encode($sid);
							$mytype = base64_encode($result_01['category'][$n].' [ <b>'.$mysib['type'][$m].'</b> ]');
							$mycateg = base64_encode($result_01['category'][$n]);
							$mytype2 = base64_encode($mysib['type'][$m]);
							$old = $func->years_old($mysib['dob'][$m],date('Y-m-d'));
							$dob = base64_encode($old);
						?>
					<tr>
						<td class="text-info bold text-uppercase"> <?php echo $mysib['type'][$m]; ?>   </td>
						 
						 <td> <?php echo $mysib['fullname'][$m]; ?> </td> 
						
						 <td>										
							<a class="btn btn-primary btn-sm text-capitalize" href="<?php echo "medical_task_reports.php?n=$myname&mctg=$mycateg&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> create new report <i class="fa fa-comment "> </i> </a> 							
							<!--
							<a class="btn btn-success btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> view reports  <i class="fa fa-eye"> </i> </a> 
							 
							<a class="btn btn-info btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&tp2=$mytype2&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> receipts </a> 
							 --> 
						 </td> 
					</tr>
						<?php 
							$m++; }## end foreach : 
						} ## end not null - sibs  ?>
				<tbody>
			  </table>
						 <br/>
			<?php $n++; } ## end foreach.. 

			} ## end not null 
			else { ?>
				<div class="col-lg-12 col-lg-offset grid-margin stretch-card"> 
					<div class="card">
						<div class="card-body text-danger">						 
							<b>  no results found for your criteria <?php echo "' $text '" ;   ?>
							</b> 
						</div>  
					</div>
				</div>
				
			<?php }
	} ## end search 
	
	
	##########################################################################
	
		##############################################		 
		if(isset($_POST['display_avail_docs'])){  		
					$dbm = new DbTool(); $admin = new User('users'); 	#sleep(1);
					$docs = $dbm->getFields($dbm->select('myroles',array('role_id'=>'doctor','status'=>"active")),array('user_id')); 
					### if(!is_null($docs)){
				  ?> 
						<table class="table table-striped" style="min-width:100%"> 
							 <tbody>
								<tr class="text-uppercase"> 									
									<th>status </th>
									<th>doctor </th>
									<th>queues </th>
									<th>action </th>
								</tr>
							<?php	$n = 0; if(!is_null($docs)){ foreach ($docs['user_id']  as $val){
									$myinfo = $dbm->resort($admin->searchUser(array('user_id'=>$val)));
									$my_queues = $dbm->getFields($dbm->select('tickets',array('dest_role_id'=>'doctor','dest_user_id'=>$val,'ticket_status'=>'untreated')),array('ref_no','fullname','type','sn'));
							?>
									<tr> 										
										<th> <span title="<?php echo $myinfo['online'].'line'; ?>" class="<?php echo $myinfo['online_icon']; ?> fa-2x"> </span> &nbsp;  </th> 
										<th> <?php echo $myinfo['fullname']; ?> </th> 
										<th> <?php echo count($my_queues['ref_no']).' patients';?> </th>
										<th> 
											<div class="form-group">
												<button type="button" rel="tooltip" title=" Schedule Patient " onclick="schedule_patient_docs('<?php echo $val;?>') " class=" btn btn-success btn-rounded schedule_patient ladda-button" data-style="expand-right">
													schedule &nbsp; <i class="fa fa-sign-in"></i>
												</button>
											</div>
										</th>
									</tr>									
							<?php $n ++; }
							} # end not null 
							else { ?>
								<tr> 										
									<th colspan="4"> <span class="text-danger"> no doctor is available to assign for this patient </span> </th>
								</tr>
								
							<?php }
							?>	
							</tbody>	
						</table> <!-- ./ table -->
						 
						
					<?php  
		}
		/**********************************************************************/
	
	##########################################################################
	##############################################		 
		if(isset($_POST['display_avail_specs'])){  		
					$dbm = new DbTool(); $admin = new User('users'); 	#sleep(1);
					$role_id = mysql_real_escape_string($_POST['role_id']);
					$role_info = $dbm->getFields($dbm->select('roles',array('id'=>$role_id)),array('name','sn'));
					$specs = $dbm->getFields($dbm->select('myroles',array('role_id'=>$role_id,'status'=>"active")),array('user_id')); 
					### if(!is_null($docs)){
				  ?> 
						<table class="table table-striped" style="min-width:100%"> 
							 <tbody>
								<tr class="text-uppercase"> 									
									<th>status </th>
									<th> <?php echo $role_info['name'][0]; ?> </th>
									<th>queues </th>
									<th>action </th>
								</tr>
							<?php	$n = 0; if(!is_null($specs)){ foreach ($specs['user_id']  as $val){
									$myinfo = $dbm->resort($admin->searchUser(array('user_id'=>$val)));
									$my_queues = $dbm->getFields($dbm->select('tickets',array('dest_role_id'=>$role_id,'dest_user_id'=>$val,'ticket_status'=>'untreated')),array('ref_no','fullname','type','sn'));
							?>
									<tr> 										
										<th> <span title="<?php echo $myinfo['online'].'line'; ?>" class="<?php echo $myinfo['online_icon']; ?> fa-2x"> </span> &nbsp;  </th> 
										<th> <?php echo $myinfo['fullname']; ?> </th> 
										<th> <?php echo count($my_queues['ref_no']).' tasks';?> </th>
										<th> 
											<div class="form-group">
												<button type="button" rel="tooltip" title="Forward " onclick="forward_to_specs('<?php echo $val;?>','<?php echo $role_id;?>') " class=" btn btn-success btn-rounded schedule_patient ladda-button" data-style="expand-right">
													forward &nbsp; <i class="fa fa-mail-forward"></i>
												</button>
											</div>
										</th>
									</tr>									
							<?php $n ++; }
							} # end not null 
							else { ?>
								<tr> 										
									<th colspan="4"> <span class="text-danger"> no <?php echo $role_info['name'][0]; ?> is available to assign for this patient </span> </th>
								</tr>
								
							<?php }
							?>	
							</tbody>	
						</table> <!-- ./ table -->
						 
						
					<?php  
		}
		/**********************************************************************/
	
	##########################################################################
	/**** schedule_patient_docs *********/
	if(isset($_POST['schedule_patient_docs'])){  		
		$dest_user_id  = mysql_real_escape_string($_POST['doctor']);
		$patient_id  = mysql_real_escape_string($_POST['patient_id']);
		$patient_type  = mysql_real_escape_string($_POST['patient_type']);
		$patient_info = get_patient_info($patient_id.'_'.$patient_type); ## id_type
		
		$dbm = new DbTool(); $admin = new User('users'); 	#sleep(1);
		$issuer = $_SESSION['admUser']; 
		$issuer_role = $admin->get_my_roles($issuer);  
		
		$ticket_no = $patient_id.'_'.str_replace(' ','_',$patient_type).'_'.date('Y_m_d_').rand(100,999);
		$data = array('ref_no'=>$patient_id ,'type'=>$patient_type ,'fullname'=>$patient_info['fullname'],
		'ticket_no'=>$ticket_no,'date_c'=>date('Y-m-d'),'month_c'=>date('m'),'year_c'=>date('Y'),
		'week_c'=>idate('W'),'time_c'=>time(),'dest_user_id'=>$dest_user_id,'dest_role_id'=>'doctor',
		'c_by'=>$issuer,'c_role'=>$issuer_role['role_id'][0]); 
		
		$dbm->insert('tickets',$data); 
		
		echo json_encode(array('icon'=>'success','text'=>'A schedule has been created for '.$patient_info['fullname'].
		' to consult a doctor','title'=>'Schedule Successful'));
		
		
	}
	##########################################################################
	
	##############################################		 
		if(isset($_POST['display_patient_tickets'])){ 
				$ref_no = mysql_real_escape_string($_POST['ref']);  
				$info = explode('_',$ref_no); ### hosp_no , type = host | spouse ...
				$dbm = new DbTool();   $admin = new User("users");
			    $pending_tickets = $dbm->getFields($dbm->select('tickets',array('ref_no'=>$info[0],'type'=>$info[1],'ticket_status'=>'untreated')),array('sn','fullname','ticket_no','ref_no','ticket_status','dest_user_id','dest_role_id','date_c'));
				  
					$n = 0; if(!is_null($pending_tickets)) foreach($pending_tickets['ticket_no']  as $val){
					 $doc = $dbm->resort($admin->searchUser(array('user_id'=>$pending_tickets['dest_user_id'][$n])));
					?>
						<tr> 
							<th><?php echo $n+1;  ?> &nbsp; &nbsp; &nbsp;  doctor </th> 
							<th> <?php echo $doc['fullname']; ?> </th> 							
							<th> <button class="btn btn-danger btn-icons btn-rounded btn-sm" onclick="delete_ticket($(this).attr('data-text'),$(this).attr('for'))" for="<?php echo $val; ?>" data-text="<?php echo $pending_tickets['fullname'][$n]."_".$doc['fullname']; ?>">  <i class="fa fa-close"> </i> </button> </th> 							
						</tr>						
						<?php $n ++; } 
						}
		/**********************************************************************/
		####
		if(isset($_POST['del_ticket'])){  		
				$ticket_no = mysql_real_escape_string($_POST['ticket_no']); 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select("tickets",array('ticket_no'=>$ticket_no)),array('sn','fullname'));	
				if(!is_null($exists)) {
					$dbm->deleteRow("tickets",array('ticket_no'=>$ticket_no ));				
					
					echo json_encode(array('icon'=>'success','text'=>'Schedule for ['.$exists['fullname'][0].']  has been deleted successfully','title'=>' Schedule Deleted ')); 
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Schedule was found for  your criteria",'title'=>'Deleting Doctor Schedule'));
 	 
				}			 
		}
	/*******************************************************/

	##v  start_converse
	if(isset($_POST['start_converse'])){  		
				$ticket_no = mysql_real_escape_string($_POST['ticket_no']); 
				$current_ticket_id = mysql_real_escape_string($_POST['current_ticket_id']); 
				header("location:consults.php"); 
				
	}
	
	// saving patient medical report and billing 
	/*
	 
	*/
	
	#################
	if(isset($_POST['savePatientVitalScience'])){  
		$dbm = new DbTool(); # #sleep(3);
		$ref_no = mysql_real_escape_string($_POST['ref_no']); 
		$type = mysql_real_escape_string($_POST['types']); 
		$height = mysql_real_escape_string($_POST['height']); 
		$weight = mysql_real_escape_string($_POST['weight']); 
		$bp = mysql_real_escape_string($_POST['pbp']); 
		$fullname = mysql_real_escape_string($_POST['fullname']); 
		#####################
		$data = array('ref_no'=>$ref_no,'type'=>$type ,'fullname'=>$fullname,
		'weight'=>$weight ,'bp'=>$bp ,'height'=>$height ,'date_c'=>date('Y-m-d'),'time_c'=>time()); 
		## ###
		$dbm->insert('vital_science',$data); 			
			echo json_encode(array('icon'=>'success','text'=>' Vital Science  for ['.$fullname.']   saved successfully','title'=>' Successful ')); 
	
	}	
	#################
	
	if(isset($_POST['savePatientMedicalReport-old'])){  
				$dbm = new DbTool(); # #sleep(3);
				$ref = mysql_real_escape_string($_POST['ref']); 
				$type = mysql_real_escape_string($_POST['types']); 
				$date_rec = mysql_real_escape_string($_POST['date_rec']); 
				$date_info = explode('-',$date_rec); ## Y-m-d   0-1-2
				$patient_info = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$ref)),array('category','sn','military_no'));
				
				$recp_no = mysql_real_escape_string($_POST['recp_no']); 
				$amount_paid = mysql_real_escape_string($_POST['amount_paid']); 
				$diagnosis_report = mysql_real_escape_string($_POST['diagnosis_report']); 
				$complaints_report = mysql_real_escape_string($_POST['complaints_report']); 
				$treatment_report = mysql_real_escape_string($_POST['treatment_report']); 
			 	 
				$recp_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$recp_no,'status'=>'active')),array('refund','name','total_fee','amount_paid','balance','payment_status','ref_no','category','type','military_no','date_c','year_c','c_by','month_c','week_c','day_c','consume'));			
				########
				if(is_null($recp_info)){
						echo json_encode(array('icon'=>'error','text'=>" Receipt ID Not Found  ",'title'=>' Invalid Receipt Reference'));						
				}
				else {
					if($recp_info['consume'][0]=="yes"){
						echo json_encode(array('icon'=>'error','text'=>" This Receipt Has already been used  ",'title'=>' Receipt Has Been Used'));						
					}
					else{ 
				  
				$data = array('amount_paid'=>$amount_paid,'ref_no'=>$ref,'type'=>$type,'complaints'=>$complaints_report,'category'=>$patient_info['category'][0],'time_vs'=>strtotime($date_rec),
				'diagnosis'=>$diagnosis_report,'treatment'=>$treatment_report,'receipt_no'=>$recp_no,'military_no'=>$patient_info['military_no'][0],
				'date_vs'=>$date_rec,'month_vs'=>$date_info[1],'year_vs'=>$date_info[0],'day_vs'=>$date_info[2],'week_vs'=>idate('W',strtotime($date_rec))); 
				
				$dbm->updateTb('patient_receipts',array('consume'=>'yes'),array('receipt_no'=>$recp_no));
				### mysql_query("update patient_receipts set consume = 'yes' where receipt_no = '".$recp_no."'") or die(mysql_error()); 
				$dbm->insert('tickets_converse',$data); 
 
				echo json_encode(array('icon'=>'success','text'=>"Report successfully saved ",'title'=>' Patient Report Saved'));
				
				}
		}
	}
	/*******************************************/

	#################
	
	if(isset($_POST['savePatientMedicalReport_new'])){  
				/***$dbm = new DbTool(); # #sleep(3);
				$ref = mysql_real_escape_string($_POST['ref']); 
				$type = mysql_real_escape_string($_POST['types']); 
				$date_rec = mysql_real_escape_string($_POST['date_rec']); 
				$date_info = explode('-',$date_rec); ## Y-m-d   0-1-2
				$patient_info = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$ref)),array('category','sn','military_no'));
				
				$main_report = addslashes($_POST['main_report']); #  
				$report_no = mysql_real_escape_string($_POST['report_no']);  
				$report_type = mysql_real_escape_string($_POST['report_type']);
				  
				########
				/**				  
				$data = array('ref_no'=>$ref,'type'=>$type,'complaints'=>$complaints_report,'category'=>$patient_info['category'][0],'time_vs'=>strtotime($date_rec),
				'main_report'=>$main_report,'report_no'=>$report_no,'report_type'=>$report_type,'date_vs'=>$date_rec,
				'month_vs'=>$date_info[1],'year_vs'=>$date_info[0],'day_vs'=>$date_info[2],'week_vs'=>idate('W',strtotime($date_rec)),
				'date_c'=>date('Y-m-d'),'month_c'=>date('m'),'year_c'=>date('Y'),'day_c'=>date('d'),'week_c'=>idate('W',time())); 
				 ***/
				##### 
				# $dbm->insert('tickets_converse',$data); 
 
				echo json_encode(array('icon'=>'success','text'=>"Report successfully saved ",'title'=>' Patient Report Saved'));
				 
		}
	
	/*******************************************/
	## savePatientReceiptBillType
	##############################################		 
		if(isset($_POST['savePatientReceiptBillType'])){  		
			$dbm = new DbTool(); 
			$billType = mysql_real_escape_string($_POST['billType']); # $dtext = $val."|".$types['dept_id'][$n]."|".$types['categ_id'][$n]."|".$types['price'][$n];
			$bill_elem = explode('|',$billType);  # name | dept_id | categ_id | price 
													# 0			1		2			3
			$datas = mysql_real_escape_string($_POST['datas']);
			$infos = explode('|',$datas);   
			##  name|hsp_id|mil_id|categ|type 
			##  0       1      2     3     4					
			$data = array('dept_id'=>$bill_elem[1],'categ_id'=>$bill_elem[2],'price'=>$bill_elem[3],
					'ref_no'=>$infos[1],'military_no'=>$infos[2],'name'=>$infos[0],
						'category'=>$infos[3],'type'=>$infos[4],'bill_type'=>$bill_elem[0],
					'date_c'=>date('Y-m-d'),'time_c'=>time(),'month_c'=>date('m'),
					'week_c'=>idate('W'),'year_c'=>date('Y'),'day_c'=>date('d'));
			
			 $dbm->insert('pending_bills',$data);
			 $all_bills = $dbm->getFields($dbm->select('pending_bills',array('ref_no'=>$infos[1],'military_no'=>$infos[2],
						'category'=>$infos[3],'type'=>$infos[4],'completed'=>'no')),array('sn','bill_type','dept_id','categ_id','price'));
			### if(!is_null($docs)){
		  ?> 
				<table class="table table-striped" style="min-width:100%"> 
					 <tbody>
						<tr class="text-uppercase"> 									
							<th>sn </th> 
							<th colspan="3"> all bills </th>
							 
						</tr>
					<?php	$n = 0; if(!is_null($all_bills)){ foreach ($all_bills['bill_type']  as $val){
							
					?>
							<tr> 										
								<th> <?php echo $n+1; ?> </th> 
								<th colspan="2"> <?php echo $val; ?> </th> 										 
								<th> <button class="btn btn-sm btn-danger del-patient-bill-record"> <i class="fa fa-close"> </i> </button> </th> 										 
							</tr>									
					<?php $n ++; }
					} # end not null 
					else { ?>
						<tr> 										
							<th colspan="4"> <span class="text-danger"> no bill is available </span> </th>
						</tr>
						
					<?php }
					?>	
					</tbody>	
				</table> <!-- ./ table -->
										
			<?php  
		}
		/**********************************************************************/
	
		##############################################		 
		if(isset($_POST['displayPatientReceiptBillType'])){  		
					$dbm = new DbTool(); #sleep(1);
					$billType = mysql_real_escape_string($_POST['billType']);
					$datas = mysql_real_escape_string($_POST['datas']);
					$infos = explode('|',$datas);   
					##  name|hsp_id|mil_id|categ|type 
					##  0       1      2     3     4					
					$all_bills = $dbm->getFields($dbm->select('pending_bills',array('ref_no'=>$infos[1],'military_no'=>$infos[2],
								'category'=>$infos[3],'type'=>$infos[4],'completed'=>'no')),array('sn','bill_type','price'));
					### if(!is_null($docs)){
				  ?> 
						<table class="table table-striped nogap" style="min-width:100%"> 
							 <tbody>
								<tr class="text-uppercase"> 									
									<th>sn </th> 
									<th colspan="3">all bills </th>									 
								</tr>
							<?php  $total_price = 	$n = 0; if(!is_null($all_bills)){
									$total_price = array_sum($all_bills['price']);
									foreach ($all_bills['bill_type'] as $val){ 									
							?>
									<tr> 										
										<th> <?php echo $n+1; ?> </th> 
										<th colspan="2"> <?php echo $val." <small> &nbsp;&nbsp;&#8358; ".$all_bills['price'][$n]."</small>"; ?>  </th> 										 
										<th> <button  for="<?php echo $all_bills['sn'][$n]."|".$val; ?>" data-text="<?php echo $datas; ?>" class="btn btn-sm btn-danger" onclick="del_patient_bill_record($(this).attr('for'),$(this).attr('data-text'))" > <i class="fa fa-close"> </i> </button> </th> 										 
									</tr>									
							<?php $n ++; }
							?>
							<tr class="text-capitalize">  
									<th colspan="4" align="right"> total : <?php echo "&#8358; ".number_format($total_price); ?></th>
								</tr>
							<?php 
							} # end not null 
							
							
							else { ?>
								<tr> 										
									<th colspan="4"> <span class="text-danger"> no bill is available </span> </th>
								</tr>
								
							<?php }
							?>	
							</tbody>	
						</table> <!-- ./ table -->
						 						
					<?php  
					 
		}
		/****************************/
		if(isset($_POST['del_patient_bill'])){  			
			 $sn = mysql_real_escape_string($_POST['serial']);
			 $dbm = new DbTool();  
			  $bill = $dbm->getFields($dbm->select('pending_bills',array('sn'=>$sn)),array('bill_type'));
			  
				if(!is_null($bill)){
					$dbm->deleteRow('pending_bills',array('sn'=>$sn));
						echo json_encode(array('icon'=>'success','text'=>"Bill Remove",'title'=>'Delete Bill ? '));
				}	 		
				else {
					echo json_encode(array('icon'=>'error','text'=>"Cannot Delete Bill",'title'=>'Delete Bill ? '));
				}
							
		}
			/****************************/
		/****************************/
		## generatePatientReceipt
		##############################################		 
		if(isset($_POST['generatePatientReceipt'])){  		
					$dbm = new DbTool();  					 
					$amount_paid = mysql_real_escape_string($_POST['amount_paid']);					
					$datas = mysql_real_escape_string($_POST['datas']);
					$infos = explode('|',$datas);   
					$total_fee = mysql_real_escape_string($_POST['total_fee']);
					$amount_paid = mysql_real_escape_string($_POST['amount_paid']);
					
					##  // recpno | fees | name 
					##  	0        1       2 
     				
					 $all_bills = $dbm->getFields($dbm->select('pending_bills',array('ref_no'=>$infos[1],'military_no'=>$infos[2],
					 		'category'=>$infos[3],'type'=>$infos[4],'completed'=>'no')),array('sn','bill_type','dept_id','categ_id','price'));
							
					if(!is_numeric($total_fee)){
						echo json_encode(array('icon'=>'warning','text'=>" Total Fee Must Be Integer Value ",'title'=>' Wrong Total Fee'));
					}
					
					else if(!is_numeric($amount_paid)){
						echo json_encode(array('icon'=>'warning','text'=>" Amount Paid Must Be Integer Value ",'title'=>' Wrong Amount Paid'));
					} 
					else if(is_null($all_bills)){
						echo json_encode(array('icon'=>'warning','text'=>" No Bill has been added ",'title'=>'Empty Bill  '));
					}
					else {
						### generate receipt no.  generatePatientReceipt getGenRecpId
						# $recp_no = rand(100,200).date('Ymd').date('his',time()-3600);
						$recp_no = getGenRecpId(); 
						### update pending bill 
						$dbm->updateTb('pending_bills',array('receipt_no'=>$recp_no,'completed'=>'yes'),array('ref_no'=>$infos[1],'military_no'=>$infos[2],
					 		'category'=>$infos[3],'type'=>$infos[4],'completed'=>'no','status'=>'active'));
						
						## save the receipt in table. 
						$balance = $total_fee - $amount_paid;
						$payment_status = ($balance<=0)?"paid":"unpaid";
						$change = ($balance<=0)? abs($balance):0;
						$dbm->insert('patient_receipts',array('refund'=>$change,'name'=>$infos[0],'receipt_no'=>$recp_no,'total_fee'=>$total_fee,
							'amount_paid'=>$amount_paid,'balance'=>($balance<=0)?'0':$balance,'ref_no'=>$infos[1],
					 		'category'=>$infos[3],'type'=>$infos[4],'payment_status'=>$payment_status,'pay_type'=>'general','date_c'=>date('Y-m-d'),'month_c'=>date('m'),
			'year_c'=>date('Y'), 'week_c'=>idate('W'),'time_c'=>time()));	
							 	
						echo json_encode(array('icon'=>'success','text'=>" Bill generated Successfully",
							'title'=>' Receipt Generated ','recpno'=>base64_encode($recp_no)));
					}
				}
				  
		 /**********************************************************************/
	
	 	if(isset($_POST['saveNewProduct'])){  		
				$product_desc = mysql_real_escape_string($_POST['product_desc']);	
				$product_code = mysql_real_escape_string($_POST['product_code']);	
				$product_name = mysql_real_escape_string($_POST['product_name']);	
				$product_qty = mysql_real_escape_string($_POST['product_qty']);	
				$product_mfd = mysql_real_escape_string($_POST['product_mfd']);	
				$product_expd = mysql_real_escape_string($_POST['product_expd']);	
				$product_barcode = mysql_real_escape_string($_POST['product_barcode']);	
				$product_vendor = mysql_real_escape_string($_POST['product_vendor']);	
				$product_sp = mysql_real_escape_string($_POST['product_sp']);	
				$product_cp = mysql_real_escape_string($_POST['product_cp']);	
				$date_supply = mysql_real_escape_string($_POST['date_supply']);	
				$stock_type = mysql_real_escape_string($_POST['stock_type']);	// new or update
				$update_serial = mysql_real_escape_string($_POST['update_serial']);	// new or update
				 
				$dbm = new DbTool(); 
				
				$exists = $dbm->getFields($dbm->select("pharm_products",array('barcode'=>$product_barcode,'status'=>'active')),array('sn','name','barcode'));	
				if($product_barcode=="") {
					 echo json_encode(array('icon'=>'warning','text'=>'Please supply Barcode No.',
							'title'=>'Empty Barcode No.'));
				}
				else if(count($exists['sn'])>0 && $stock_type=="new") {
					 echo json_encode(array('icon'=>'warning','text'=>'This barcode item already exists  ',
							'title'=>'Duplicate Barcode Item')); 
				 }
				 else if(is_null($exists) && $stock_type=="new") {
					 	$data = array('name'=>$product_name,'description'=>$product_desc,'code'=>$product_code,
				'barcode'=>$product_barcode,'exp_date'=>$product_expd,'mfc_date'=>$product_mfd,'cost_price'=>$product_cp, 
				'remains'=>$product_qty,'qty'=>$product_qty,'vendor_id'=>$product_vendor,'date_suplied'=>$date_supply,
				'recorded_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time(),'selling_price'=>$product_sp,
				'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'));
				 
				$dbm->insert('pharm_products',$data);
				
					echo json_encode(array('icon'=>'success','text'=>"  New Product Saved Successfully",
							'title'=>' Stock Data Saved Successfully '));					
				 }
				 else if(count($exists['sn'])>=0 && $stock_type=="update") {
						$data = array('name'=>$product_name,'description'=>$product_desc,'code'=>$product_code,
						'barcode'=>$product_barcode,'exp_date'=>$product_expd,'mfc_date'=>$product_mfd,'cost_price'=>$product_cp,
						'vendor_id'=>$product_vendor,'date_suplied'=>$date_supply,
						'recorded_by'=>$_SESSION['admUser'],'selling_price'=>$product_sp);
						 
						$dbm->updateTb('pharm_products',$data,array('sn'=>$update_serial));
						
							echo json_encode(array('icon'=>'success','text'=>" Product Successfully Updated , please note that stock quantity and remaining quantity will not update, you have to add more items when you want to add more quantity",
								'title'=>' Stock Updated ')); 
						 } 
		}  
		/***************************************************/
		/************************
			update_new_import_stock :'',
			product_qty:product_qty.val(), product_expd:product_expd.val(), 
			product_mfd:product_mfd.val(), product_sp:product_sp.val(),
			product_cp:product_cp.val(),update_serial:update_id	 
			
		**********************************************/
	####
	 	if(isset($_POST['update_new_import_stock'])){  		
				$product_qty = mysql_real_escape_string($_POST['product_qty']);	
				$product_mfd = mysql_real_escape_string($_POST['product_mfd']);	
				$product_expd = mysql_real_escape_string($_POST['product_expd']);	
				$product_sp = mysql_real_escape_string($_POST['product_sp']);	
				$product_cp = mysql_real_escape_string($_POST['product_cp']);	
				$update_serial = mysql_real_escape_string($_POST['update_serial']);	// new or update
				 
				$dbm = new DbTool(); 
				
				$exists = $dbm->getFields($dbm->select("pharm_products",array('sn'=>$update_serial,'status'=>'active')),array('sn','name','remains','qty'));	
				
				
				if(!is_null($exists)) {
					$exists = $dbm->resort($exists);
					$old_qty = $exists['qty'];
					$old_rem = $exists['remains'];
					$new_qty = $old_qty + $product_qty ;
					$new_rem = $old_rem + $product_qty; 
					
					 	$data = array('exp_date'=>$product_expd,'mfc_date'=>$product_mfd,'cost_price'=>$product_cp, 
				'remains'=>$new_rem,'qty'=>$new_qty,'vendor_id'=>$product_vendor,'date_suplied'=>$date_supply,
				'recorded_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time(),'selling_price'=>$product_sp,
				'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'));
				 
				$dbm->updateTb('pharm_products',$data,array('sn'=>$update_serial));
				
					echo json_encode(array('icon'=>'success','text'=>$exists['name']. "&nbsp; Updated Successfully",
							'title'=>' Stock Data Saved Successfully '));					
				 }
				 else  { echo json_encode(array('icon'=>'error','text'=>" Invalid Update Parameters ",
									'title'=>' Update Error ')); 
					} 
		}  
		
		/***************************************************/	
		
		if(isset($_POST['get_stock_item_details'])){
			#sleep(1); 
				
			$serial = mysql_real_escape_string($_POST['serial']); ## ($_POST['value']);		
			$dbm = new DbTool(); $func = new functions();
			$products = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial),array('time_c'),'and','desc'),
			 		array('sn','name','description','code','barcode','exp_date','mfc_date','remains',
					'cost_price','selling_price',
					'qty','vendor_id','date_suplied','date_c','time_c','month_c','day_c','year_c','week_c')));
					
					$all_elem = array(
							'sn'=>$products['sn'],
							'name'=>$products['name'],
							'description'=>$products['description'],
							'code'=>$products['code'],											
							'barcode'=>$products['barcode'],
							'exp_date'=>$products['exp_date'],							
							'mfc_date'=>$products['mfc_date'],
							'cost_price'=>$products['cost_price'],
							'selling_price'=>$products['selling_price'],						
							'qty'=>$products['qty'],
							'vendor_id'=>$products['vendor_id'],
							'date_suplied'=>$products['date_suplied'] 
							 			
							);
						echo json_encode( $all_elem );
		}
		 
	?> 
	
	<?php 
		function get_patient_info($ref_no) {  
			# $ref_no = mysql_real_escape_string($_POST['ref']);  
			$info = explode('_',$ref_no); ### hosp_no , type = host | spouse ...
			switch($info[1]){
				case "host":{ $table = "patients"; $field = "hosp_no";  } break;
				default : { $table = "patients_siblings"; $field = "ref_no"; } break;
			} 
			
			$dbm = new DbTool();  $func = new functions();
			 
			 $patient_info = $dbm->resort($dbm->getFields($dbm->select($table,array($field=>$info[0],'type'=>$info[1])),
			 		array('surname','firstname','othername','fullname','dob','phone','email','gender','type','createdby',
			 			'date_c','time_c','month_c','day_c','year_c','week_c')));
			$dob = $func->format_date($patient_info['dob']);
			$old = $func->years_old($patient_info['dob'],date('Y-m-d'));
			 
			 return array_merge($patient_info,array('fdob'=>$dob,'old'=>$old));
			 
			# echo json_encode(array($info,$table));
		}
	/*****************************************************************/
	// functions
		function  getPharmRecpId(){
			
				$dbm =  new DbTool();  # database mgr.
				
				$allTransc = $dbm->getFields($dbm->select('patient_receipts',array('pay_type'=>'pharmacy')),array('sn','receipt_no'));
				
				$tot = count($allTransc['receipt_no']);
				
				$lastNo = $tot-1;
				
				$lastId = $allTransc['receipt_no'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,4,strlen($lastId)) + 1;
				
				$newpad = str_pad($newNo,4,'0',STR_PAD_LEFT);
				
				## $newTranscId = "PHMR".str_pad($newNo,4,'0',STR_PAD_LEFT);
				 
				return trim("PHMR$newpad");  
			}
	
	
	/*****************************************************************/// functions
		function  getLabRecpId(){
			
				$dbm =  new DbTool();  # database mgr.
				
				$allTransc = $dbm->getFields($dbm->select('patient_receipts',array('pay_type'=>'laboratory')),array('sn','receipt_no'));
				
				$tot = count($allTransc['receipt_no']);
				
				$lastNo = $tot-1;
				
				$lastId = $allTransc['receipt_no'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo =  substr($lastId,4,strlen($lastId)) + 1;
				 
				$newpad = str_pad($newNo,4,'0',STR_PAD_LEFT);
				
				return trim("LBRC$newpad"); 
			}
	
	
	/*****************************************************************/
	// generatePatientReceipt getGenRecpId
	function  getGenRecpId(){
			
				$dbm =  new DbTool();  # database mgr.
				
				$allTransc = $dbm->getFields($dbm->select('patient_receipts',array('pay_type'=>'general')),array('sn','receipt_no'));
				
				$tot = count($allTransc['receipt_no']);
				
				$lastNo = $tot-1;
				
				$lastId = $allTransc['receipt_no'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,4,strlen($lastId)) + 1;
				
				$newpad = str_pad($newNo,4,'0',STR_PAD_LEFT);
				
				return trim("GNRC$newpad");  
				  
			}
	
	
	/*****************************************************************/
	?>
	
	
	<?php 
		
		########### to display all registerred patients  
		if(isset($_POST['getPatient'])){	 $func = new functions();	
			$conn = new mysqli('localhost', 'root', 'mayoskele', 'hpms'); 
			$start = $conn->real_escape_string($_POST['start']); 
			$limit = $conn->real_escape_string($_POST['limit']);  
			$_SESSION['reqType'] = $reqType = $conn->real_escape_string($_POST['reqType']);  // default | search
			
			if($reqType =="search") {   $start = 0; $limit = 5000; unset($_SESSION['start']); }
			
		 	if(!isset($_SESSION['start'])) {
				$_SESSION['start'] = $start;
				showPatients($start,$limit);
			} 
			else if($_SESSION['start']==$start) exit(json_encode(array('next'=>($start + $limit),'response'=>'')));
			
			else {
				$_SESSION['start'] = $start; 
				  showPatients($start,$limit);
			
			}
			
		}
 

		function showPatients($start,$limit,$criteria = ""){ 
			$func = new functions();
			$conn = new mysqli('localhost', 'root', 'mayoskele', 'hpms'); 
			$criteria = $conn->real_escape_string($_POST['criteria']); 			
			$next = $start + $limit; 
			$n = $start; 
			######################
		
		if($criteria == "") $sql = $conn->query("SELECT * FROM patients order by date_c ASC LIMIT $start, $limit ");
		else $sql = $conn->query("SELECT * FROM patients WHERE fullname REGEXP '".$criteria."' or dob REGEXP '".$criteria."' or state REGEXP '".$criteria."'  or lga REGEXP '".$criteria."' or phone REGEXP '".$criteria."' or gender REGEXP '".$criteria."'  or hosp_no REGEXP '".$criteria."' or address REGEXP '".$criteria."' or nokname REGEXP '".$criteria."'  or nokphone REGEXP '".$criteria."'  order by date_c desc LIMIT $start, $limit ");
		
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_array()) { $n++;
				$pic_source = (file_exists($data['psp_dir'].''.$data['psp']))?$data['psp_dir']."".$data['psp']:"images/users/default-user.png";
				
				$mysibs = $conn->query("SELECT * FROM patients_siblings WHERE  ref_no='".$data['hosp_no']."'");
				$totsib = $mysibs->num_rows;
				$all_siblings = ""; 
				if($totsib > 0){
					 
					while($data2 = $mysibs->fetch_array()){
						$all_siblings.='
						 <span class="badge badge-outline-primary font-16">'.$data2['type'].': '.$data2['fullname'].' </span>  &nbsp; &nbsp;
						';
					}
				}
				 
				$response .= '
				<span class="badge badge-info badge-block font-16"> '. $n.' </span>
				 <div class="row"> 
					<div class="col-md-12">						
						<div class="card">							
							<div class="card-body">
								<div class="col-md-1 col-sm-4" style="float:left;">
									<img class="img rounded-circle " src='.$pic_source.' style="max-height:70px" />
								 </div><!-- col-md-1 -->
							
								<div class="col-md-11 col-sm-8" style="float:left;">
									<h4><i class="fa fa-edit text-warning pointer"></i> &nbsp; <i class="fa fa-trash text-danger pointer"></i> &nbsp; '.$data['title'].'&nbsp;'.$data['fullname'].' :&nbsp; <span class="h6 bold text-info"> '.$data['hosp_no']. ' :: '.$data['category'].' ( '.$data['type'].' )  </span> '.
									'&nbsp;&nbsp;&nbsp;<span class="font-16"><i class="fa fa-phone"></i>&nbsp;'.$data['phone'].
									'&nbsp;&nbsp;&nbsp;<span class="font-16"><i class="fa fa-home"></i>&nbsp;'.$data['address'].
									',&nbsp;&nbsp;'.$data['lga'].',&nbsp;&nbsp;'.$data['state'].'&nbsp;state, &nbsp;  <i class="fa fa-calendar"></i> '.$data['dob'].
									' </h4><hr/> <span class="h5"> Siblings: <label class="badge badge-success">'.$totsib.'</label> &nbsp;&nbsp; Details : '.$all_siblings.' </span>'.
									'<p> <i> created by : '.$data['createdby'].', &nbsp; on '. $data['date_c'].'   &nbsp;  : '.date('h:s A',$data['time_c']).' </i></p>
								</div> <!-- col-md-10 -->
							
							</div> <!-- card-body -->							
						</div> <!-- card -->
					</div> <!-- col-md-12 -->
				</div> <!-- row -->				  
				';
			} // end while 	
			######################
			
			$result  = array('next'=>$next,'response'=>$response);
			exit(json_encode($result)); 		 
		} else
				exit(json_encode(array('next'=>$next,'response'=>'')));
		}	   




	?>