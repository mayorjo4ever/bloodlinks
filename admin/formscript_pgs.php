<?php 
	
	error_reporting(E_ALL^E_NOTICE);
	if(!isset($_SESSION)) session_start(); 
	require_once "dist/php/dbTool.php";
	require_once "dist/php/User.php";
	require_once "dist/php/model.php";
	 
	/**  ***/
	
	#### update_this_existing_department
	##############################################		 
	if(isset($_POST['create_department'])){  		
				$fact_id = mysql_real_escape_string($_POST['fact_id']); 	$dept = mysql_real_escape_string($_POST['dept']);  $dbm = new DbTool(); 
				$fac_info =  $dbm->getFields($dbm->select('faculty',array('fact_id'=>$fact_id,'status'=>'active'),array('name'),'and','asc'),array('sn','name','fact_id'));					 
	}
	/**********************************************************************/
	#### 
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
								$dbm->updateTb("users",array("online_status"=>'on'),array("user_id"=>$_SESSION['admUser']));
								######################################
								
								if(isset($_SESSION['cur_url']) && $_SESSION['cur_url']!="404.php") $status['address'] = $_SESSION['cur_url'];
								else $status['address'] = 'main.php';
								
							}
				} // end when user is true
			 
			
			echo json_encode($status); 
	}
	
	if(isset($_POST['loginUser'])){
			  // sleep(1); /** comment it later  **/
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
				
								$status['address'] = 'main.php';
								
								#####################################
								##$logdate = date('D jS M, Y - g:i:s A',(time()+3600));
								$logdate = date('D jS M, Y - g:i:s A',time());
								$logtime = time();								
								#####################################				 
								 $dbm->insert("userslogs",array("user_id"=>$_SESSION['admUser'],"type"=>"in","logtime"=>$logtime,"logdate"=>$logdate,"pc_name"=>$user_Pc,"pc_ip"=>$ip));
								 $dbm->updateTb("users",array("online_status"=>'on'),array("user_id"=>$_SESSION['admUser']));												
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
				$data = array('user_id'=>$user_id,'surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'address'=>$address,'dob'=>$dob,'createdby'=>$_SESSION['adminUser'],'datecreated'=>date('Y-m-d'));
				
				$test = array('surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'dob'=>$dob); 
				$exist = $dbm->getFields($dbm->select('students',$test),array('sn','surname'));
				$tot = count($exist['sn']); 
				
				
			if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				else if($tot>0){
					$msg = "<span class='font-18'> This Account Has Already been Created Before .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else {					// ,phone,address,dob) ,'".$phone."','".$address."','".$dob."'
					$dbm->insert('students',$data);						
					$msg = "<span class='font-18'> The Data is Successfully Saved </span>";
					echo json_encode(array('methods'=>'success','msg'=>$msg,'title'=>'RECORD SAVED'));

				}
			
			}
		/********************************************************/
		// createStaff
			if(isset($_POST['createStaff'])){
				$dbm = new DbTool(); 
				 #############
				$surname = mysql_real_escape_string(strip_tags($_POST['surname']));
				$firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
				$othername = mysql_real_escape_string(strip_tags($_POST['othername']));
				$email = mysql_real_escape_string(strip_tags($_POST['email']));
				$fileno = mysql_real_escape_string(strip_tags($_POST['fileno']));
				$phone = mysql_real_escape_string(strip_tags($_POST['phone']));
				$psw = mysql_real_escape_string(strip_tags($_POST['psw']));
				
				// $user_id = getAppId(); 
				 
				$data = array('surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'user_id'=>$fileno, 'password'=>$psw,'enc_psw'=>md5($psw),'email'=>$email, 'createdby'=>$_SESSION['admUser'],'datecreated'=>date('Y-m-d'),'timecreated'=>time());
				
				 
				$exist = $dbm->getFields($dbm->select('users',array('user_id'=>$fileno)),array('sn','surname'));
				$tot = count($exist['sn']); 
				 
				## echo json_encode(array('methods'=>'info','msg'=>"Information Received",'title'=>'ACCOUNT CREATED'));

				 
			if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				else if($tot>0){
					$msg = "<span class='font-18'> This Staff File Number Already Exists .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else {			
					$dbm->insert('users',$data);	
					##@$sql = mysql_query("insert into users(surname,firstname,midname,phone,email,user_id,password)values('".$surname."','".$firstname."','".$othername."','".$phone."','".$email."','".$fileno."','".$psw."')") or die(mysql_error()); 
					$msg = "<span class='font-18'> Admin Profile is Successfully Saved </span>";
					echo json_encode(array('methods'=>'success','msg'=>$msg,'title'=>'ACCOUNT CREATED'));

				}
				
			
			}
		/********************************************************/
		####
		/********************************************************/
		// createAcadStaff
			if(isset($_POST['createAcadStaff'])){
				// sleep(1); 
				$dbm = new DbTool(); 
				 #############			
				 $fileno = mysql_real_escape_string(strip_tags($_POST['fileno']));
				 $fullname = mysql_real_escape_string(strip_tags($_POST['fullname']));
				 $email = mysql_real_escape_string(strip_tags($_POST['email']));				
				 $phone = mysql_real_escape_string(strip_tags($_POST['phone']));
				 $fact_id = mysql_real_escape_string(strip_tags($_POST['fac']));
				 $dept_id = mysql_real_escape_string(strip_tags($_POST['dep']));
				 $save_mode = mysql_real_escape_string(strip_tags($_POST['save_mode'])); ## updstaff & newstaff
				   
				  
				// $user_id = getAppId(); 
				 
				$data = array('name'=>$fullname,'user_id'=>$fileno,'email'=>$email,'phone'=>$phone, 'fact_id'=>$fact_id,'dept_id'=>$dept_id,'createdby'=>$_SESSION['admUser'],'datecreated'=>date('Y-m-d'),'timecreated'=>time());
				$updates = array('name'=>$fullname,'user_id'=>$fileno,'email'=>$email,'phone'=>$phone, 'fact_id'=>$fact_id,'dept_id'=>$dept_id);
				
				$exist = $dbm->getFields($dbm->select('staff',array('user_id'=>$fileno)),array('sn','surname'));
				$tot = count($exist['sn']); 
 
				if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				else if($tot>0 && $save_mode=="newstaff" ){
					$msg = "<span class='font-18'> This Staff File Number `$fileno` Already Exists .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else if($tot>0 && $save_mode=="updstaff" ){
					$dbm->updateTb('staff',$updates,array('user_id'=>$fileno));	
					$msg = "<span class='font-18'>Account Info Successfully Updated .</span>";
					echo json_encode(array('methods'=>'success','msg'=>$msg,'title'=>'Staff Profile Updated'));
				}
				
				else if($tot==0 && $save_mode=="newstaff"){			
					$dbm->insert('staff',$data);	
					
					$msg = "<span class='font-18'> New Academic Staff Profile Created Successfully </span>";
					echo json_encode(array('methods'=>'success','msg'=>$msg,'title'=>'ACCOUNT CREATED'));

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
					$data = array('user_id'=>$user_id,'fact_id'=>$fact_id,'dept_id'=>$dept_id,'name'=>$realname, 'createdby'=>$_SESSION['admUser'],'datecreated'=>date('Y-m-d'),'timecreated'=>(time()+3600));
					$dbm->insert('staff',$data);					
					echo $msg = "<p>&nbsp;</p> <p>&nbsp;</p><span class='font-15 green'> $realname -  Record  Successfully Saved <p>&nbsp;</p> <p>&nbsp;</p> </span>";
				}
			
				
			} /****
				 
				$data = array('surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'phone'=>$phone,'user_id'=>$fileno, 'password'=>$psw,'enc_psw'=>md5($psw),'email'=>$email, 'createdby'=>$_SESSION['admUser'],'datecreated'=>date('Y-m-d'),'timecreated'=>time());
				
				 
				$exist = $dbm->getFields($dbm->select('users',array('user_id'=>$fileno)),array('sn','surname'));
				$tot = count($exist['sn']); 
				 
				## echo json_encode(array('methods'=>'info','msg'=>"Information Received",'title'=>'ACCOUNT CREATED'));

				 
			if(!is_numeric($phone) || strlen($phone)!=11){					
					$msg = "<span class='font-18'> This phone number (".$phone.") is not correct .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Invalid Phone'));
					// 	
				}
				
				else if($tot>0){
					$msg = "<span class='font-18'> This Staff File Number Already Exists .</span>";
					echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Duplicate Account'));
				}
				
				else {			
					$dbm->insert('users',$data);	
					##@$sql = mysql_query("insert into users(surname,firstname,midname,phone,email,user_id,password)values('".$surname."','".$firstname."','".$othername."','".$phone."','".$email."','".$fileno."','".$psw."')") or die(mysql_error()); 
					$msg = "<span class='font-18'> Admin Profile is Successfully Saved </span>";
					echo json_encode(array('methods'=>'success','msg'=>$msg,'title'=>'ACCOUNT CREATED'));

				}
				
			
			}
		/********************************************************/
			
		
	#### check_new_role
	##############################################		 
	if(isset($_POST['check_new_role'])){  		
				$role = $_POST['role'];
				$roleid = $_POST['roleid'];
				$dbm = new DbTool(); 
				$exists = $dbm->getFields($dbm->select("roles",array('name'=>$role,'id'=>$roleid)),array('sn','name'));	
				if(is_null($exists)) {
					$dbm->insert("roles",array('name'=>$role,'id'=>$roleid, 'createdby'=>$_SESSION['admUser'],'datecreated'=>date('Y-m-d'),'timecreated'=>time()));				
					echo false; 
				}
				else{
						echo true; 
				}
			 
	}
	/**********************************************************************/
	####
	
	// delete role 
	// 
	if(isset($_POST['del_role'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); 
				$exists = $dbm->getFields($dbm->select("roles",array('sn'=>$serial)),array('sn','name'));	
				if(!is_null($exists)) {
					$dbm->updateTb("roles",array('status'=>'inactive', 'deletedby'=>$_SESSION['admUser'],'date_deleted'=>date('Y-m-d'),'time_deleted'=>time()),array('sn'=>$serial));				
					
					echo json_encode(array('methods'=>'success','msg'=>$exists['name'][0]."'s Role has been deleted successfully",'title'=>'Deleting Role'));
 
				}
				else{
					echo json_encode(array('methods'=>'error','msg'=>"No Role matching your criterial was found",'title'=>'Deleting Role'));
 	 
				}			 
	}
	/*******************************************************/
	/************************** #### display_my_roles**************/
	##############################################	##########	##########		 
	if(isset($_POST['display_my_roles'])){  		
				$myid = mysql_real_escape_string($_POST['myid']);
				$dbm = new DbTool(); 						
				$myroles = $dbm->getFields($dbm->select("myroles",array('user_id'=>$myid,'status'=>'active')),array('user_id','role_id','sn')); /* this gives sn, name */?> 
				 	<ul style=" list-style:square; font-size:16px; line-height:30px;"><?php	$n = 0; if(!is_null($myroles)) foreach ($myroles['role_id']  as $val){ 
						$info = $dbm->resort($dbm->getFields($dbm->select("roles",array('id'=>$val)),array('name','id','sn')));
					?>
								<li> <?php echo $info['name']." <small> (". $val.")</small>"; ?> </li>							
					<?php $n ++; } 
						else{ ?>
							<li class="font-12 text-danger"> (Not assigned yet) </li>		
						<?php }
					?>					 
				    </ul>
				<?php  
	}
	/**********************************************************************/
	####
	 
	/************************** #### assign_roles **************/
	##############################################	##########	##########		 
	if(isset($_POST['assign_roles'])){  		
				$user_id = mysql_real_escape_string($_POST['user_id']);
				//$roles = mysql_real_escape_string($_POST['roles']); 
				$roles = $_POST['roles']; 
				
				$dbm = new DbTool(); 
				
				$news = array(); 
				 foreach($roles as $role_id){
					$rows =  $dbm->getFields($dbm->select("myroles",array('user_id'=>$user_id,'role_id'=>$role_id,'status'=>'active')),array('user_id','role_id','sn'));
						if(is_null($rows)){
							$news[] = $role_id;
							$dbm->insert("myroles",array('user_id'=>$user_id,'role_id'=>$role_id));
						}
				 }
				
				if(count($news)>0) echo join(' and ',$news)." has been assigned for ".$user_id.' successfully'; 
				else echo "<span class='text-danger font-20'> no changes for ".$user_id."</span>";
				 				
				//$myroles = /* this gives sn, name */?> 
				 	 
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
						$dbm->updateTb("priviledges",array('status'=>'inactive'),array('role_id'=>$infos[0],'url'=>$infos[1],'status'=>'active'));
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
	if(isset($_POST['adv_duplicate_stud_search'])){  		
		$text =  mysql_real_escape_string($_POST['value']); ## $mysql_real_escape_string($_POST['value']);
		$fields = array('session_of_entry'=>$text,'regno'=>$text,'appno'=>$text,'name'=>$text, 		 
		'session_ended'=>$text,'date_approved'=>$text,'programme'=>$text,'phone'=>$text,'email'=>$text,
		'prog_completed'=>$text,'fact_id'=>$text,'dept_id'=>$text,'supervisor_id'=>$text); 
			
		$cards = new card(); $n = 0; $func = new functions();
		$allcards = $cards->adv_stud_search($fields,array('programme','name'));
		$dbm = new DbTool(); 
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
					<tr class="text-uppercase  bold">					
						<td> sn </td>
						<td> fullname </td> 
						<td> Add New   </td>
						<td> regno </td>
						<td> faculty</td>
						<td> programme </td>												
						<td> phone </td> 
						<td> email </td> 
					</tr>
				</thead>
				
				<tbody>
				 <?php  $n = 0;
				 foreach($allcards['sn'] as $sn){  
					if($allcards['fact_id'][$n]!="") $myfac = $dbm->getFields($dbm->select('faculty',array('fact_id'=>$allcards['fact_id'][$n]),array('fact_name'),'and','asc'),array('sn','fact_name','fact_id')); 
					$trans_count = $dbm->getFields($dbm->select("transcripts_report",array('stud_id'=>$sn,'regno'=>$allcards['regno'][$n],'status'=>'active')),array('ref_id','sn'));		
				 ?>
					<tr class="<?php echo ($allcards['prog_completed'][$n]=="no")?'text-default':'text-success';?>"> 
				 
					<td class="bold ">  <?php  echo $n+1; ?> </td>						
						<td class=" bold"> &nbsp;  <?php  echo $allcards['name'][$n]; ?> </a> </td>
						<td class=" bold"> <a href="#" onclick="duplicate_my_student_profile($(this).attr('for'));" data-toggle="modal" data-target="#dupStudentDetails" class="btn btn-success" for="<?php  echo $allcards['sn'][$n]; ?>"> Add  &nbsp; <i class="fa fa-plus"> </i></a> </td>
						<td class=" bold"> <a href="#" onclick="show_my_student_profile($(this).attr('for'));" data-toggle="modal" data-target="#myStudentDetails" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <i class="fa fa-save" style="font-size:16px;"> </i> &nbsp;  <?php  echo $allcards['regno'][$n]; ?> </a> </td>
						<!-- <td class=" bold">  <?php  echo $allcards['regno'][$n]; ?>  </td>-->
						<td>  <?php  echo $myfac['fact_name'][0]; ?> </td>
						<td>  <?php  echo $allcards['programme'][$n]; ?> </td>                                                                     
						<td class="text-uppercase bold">  <?php print $allcards['phone'][$n];  ?>  </td> 
						<td>  <span class=" font-16"><?php  echo $allcards['email'][$n];?> </span>  </td>
						
					</tr> 
					<?php $n++; 
					
					} // end foreach  ?>

				</tbody>
			</table>
			</div> <!-- /.box-body -->	
		
	 
	<?php } ## end not null;   

			}##### end of search  
	#### 	#### 
	#### searching all student/password table record for end of  programme update 
	###################################################################################	
	if(isset($_POST['adv_transcript_stud_search'])){  		
		$text =  mysql_real_escape_string($_POST['value']); ## $mysql_real_escape_string($_POST['value']);
		$fields = array('session_of_entry'=>$text,'regno'=>$text,'appno'=>$text,'name'=>$text, 		 
		'session_ended'=>$text,'date_approved'=>$text,'programme'=>$text,'phone'=>$text,'email'=>$text,
		'prog_completed'=>$text,'fact_id'=>$text,'dept_id'=>$text,'supervisor_id'=>$text); 
			
		$cards = new card(); $n = 0; $func = new functions();
		$allcards = $cards->adv_stud_search($fields,array('programme','name'));
		$dbm = new DbTool(); 
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
					<tr class="text-uppercase  bold">					
						<td> sn </td>
						<td> fullname </td>
						<td> schedule </td>
						<td> regno </td>
						<td> faculty</td>
						<td> programme </td>												
						<td> my transcripts </td> 
					</tr>
				</thead>
				
				<tbody>
				 <?php  $n = 0;
				 foreach($allcards['sn'] as $sn){  
					if($allcards['fact_id'][$n]!="") $myfac = $dbm->getFields($dbm->select('faculty',array('fact_id'=>$allcards['fact_id'][$n]),array('fact_name'),'and','asc'),array('sn','fact_name','fact_id')); 
					$trans_count = $dbm->getFields($dbm->select("transcripts_report",array('stud_id'=>$sn,'regno'=>$allcards['regno'][$n],'status'=>'active')),array('ref_id','sn'));		
				 ?>
					<tr class="<?php echo ($allcards['prog_completed'][$n]=="no")?'text-default':'text-success';?>"> 
				 
					<td class="bold ">  <?php  echo $n+1; ?> </td>						
						<td class=" bold"> &nbsp;  <?php  echo $allcards['name'][$n]; ?> </a> </td>
						<td align="center" class=" bold"> 
							<?php 
								if(is_null($trans_count)) { ?>
									<a href="<?php  echo "newsched.php?usid=".base64_encode($allcards['sn'][$n])."&key=".base64_encode($allcards['regno'][$n]); ?>" class="btn btn-success"> start  &nbsp; <i class="fa fa-play"> </i></a>
								<?php }
								else {
									echo "  <span title='Transcript already processed ' class='fa fa-hand-o-right fa-2x pointer'></span>";
								}
							?>
						 </td>
						<td class=" bold"> <a href="#" onclick="show_my_student_profile($(this).attr('for'));" data-toggle="modal" data-target="#myStudentDetails" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <i class="fa fa-user" style="font-size:16px;"> </i> &nbsp;  <?php  echo $allcards['regno'][$n]; ?> </a> </td>
						<!-- <td class=" bold">  <?php  echo $allcards['regno'][$n]; ?>  </td>-->
						<td>  <?php  echo $myfac['fact_name'][0]; ?> </td>
						<td>  <?php  echo $allcards['programme'][$n]; ?> </td>                                                                     
						<!-- <td class="text-uppercase bold">  <?php print $allcards['phone'][$n];  ?>  </td>-->
						<!-- <td>  <span class=" font-16"><?php  echo $allcards['email'][$n];?> </span>  </td> -->
						<td align="center" class="bold">
							<?php if(!is_null($trans_count)) foreach($trans_count['ref_id'] as $rid){ ?>
							<!-- <a class="btn btn-icons btn-primary" target="_blank" href="<?php echo "transcript_preview.php?a=".base64_encode($sn)."&b=".base64_encode($allcards['regno'][$n])."&c=".base64_encode($rid);?>"> <i class="fa fa-eye"> </i>  View Transcripts </a> &nbsp; &nbsp; -->
							<a class="btn btn-icons btn-primary" target="_blank" href="<?php echo "my_transcripts.php?a=".base64_encode($sn)."&b=".base64_encode($allcards['regno'][$n]);?>"> <i class="fa fa-eye"> </i>  View </a> &nbsp; &nbsp; 
							<?php  } ## end foreach // echo count($trans_count['ref_id']);
							else echo "<span class='text-danger font-16'> None</span>";
							?>
						</td>
						<!-- <td align="center" class=" bold"> <?php  echo $allcards['session_ended'][$n]; ?> </td> --> 
						
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
					<tr class="text-uppercase  bold">					
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
				</thead>
				
				<tbody>
				 <?php  $n = 0;
				 foreach($allcards['sn'] as $sn){  
					$supervisor_info = $func->get_staff_info($allcards['supervisor_id'][$n]);		
				 ?>
					<tr class="<?php echo ($allcards['prog_completed'][$n]=="no")?'text-default':'text-success';?>"> 
				 
					<td class="bold ">  <?php  echo $n+1; ?> </td>
						<td class=" bold"> <a href="#" onclick="show_my_logbook_details($(this).attr('for'));" data-toggle="modal" data-target="#myLogBookDetails" data-backdrop="static" data-keyboard="false" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <!--  <i class="fa fa-meh-o" style="font-size:14px;"> </i>  -->&nbsp;  <?php  echo $allcards['name'][$n]; ?> </a> </td>
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
			$reg_date = mysql_real_escape_string($_POST['reg_date']);
			$session = $func->set_session($datecomp);
			// search database 
			$card_info = $dbm->resort($card->search_student_record(array('sn'=>$users_id)));
			// $programme = $card_info['programme'];
			//  $degree = $func->get_degree_prog($programme);
				/*********************************************/  
					$data = array('prog_completed'=>'yes','first_reg_date'=>$reg_date,'date_approved'=>$datecomp,'session_ended'=>$session,
					'regno'=>$myregno); 
				
					/**	if(!is_null($degree)) {
								$data = array_merge($data,$degree);
							} *
					**/
					 $dbm->updateTb("students",$data,array('sn'=>$users_id));
					 $dbm->updateTb("transcripts",array('regno'=>$myregno),array('stud_id'=>$users_id));
					 $dbm->updateTb("transcripts_report",array('regno'=>$myregno),array('stud_id'=>$users_id));
					//echo join(' + ',$card_info);
  			 echo "<b class='font-20'>".$card_info['name']." programme </b> has been updated successfully";
		 		
			}
	
	### 
	/*******************************************/
	// update_mult_stud_prog_comp	
	/********************************************/
	if(isset($_POST['update_mult_stud_prog_comp'])){
			// sleep(6);
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
			## sleep(6);
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
	
	## gettime 
	if(isset($_POST['gettime'])){
			$d = date('l, jS F, Y '); 
			 $t = date('g:i:s A',(time()-3600));			
			## $t = date('g:i:s A',time());			
			# echo "<span class='font-12 bold'>".$d."&nbsp;&nbsp; <span class='red'>".$t."</span></span>";
			echo  "<span class='black font-15'>".$t."</span>";
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
				$yes_data = $dbm->getFields($dbm->select('card_uploaded_data',array('session'=>$cur_sess['session'],'faculty'=>$faculty,'card_processed'=>'yes','status'=>'active')),array('regno','sn'));
				$no_data = $dbm->getFields($dbm->select('card_uploaded_data',array('session'=> $cur_sess['session'],'faculty'=>$faculty,'card_processed'=>'no','status'=>'active')),array('regno','sn'));
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
							'first_reg_date'=>$card_info['first_reg_date'],							
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
	
	// get_my_logbook_details
		#### 

	#### searching all student information 
	##############################################	
	if(isset($_POST['get_my_logbook_details'])){  		
		
		$serial = mysql_real_escape_string($_POST['serial']); ## ($_POST['value']);
		$card = new card(); 
		$dbm = new DbTool(); $func = new functions();
		
		$card_info = $dbm->resort($card->search_student_record(array('sn'=>$serial)));   /** student info **/
		$supervisor_info = $func->get_staff_info($card_info['supervisor_id']);		
		
		# $log_pre_details = array('deg_type_val'=>'','payment_session'=>'');
		$log_pre_details = array('deg_type_val'=>'');
		 
		/*** search logbook
		  $log_infos = $dbm->getFields($dbm->select('logbooks',array('stud_id'=>$card_info['regno'],
		 			'session_of_entry'=>$card_info['session_of_entry'])),array('deg_type_val','payment_session'));
		
		$log_infos = $dbm->getFields($dbm->select_distinct('payment_duration','logbooks',array('stud_id'=>$card_info['regno'])),array('payment_duration'));	
		
		***/		 
		
		 $log_infos = $dbm->getFields($dbm->select_distinct('deg_type_val','logbooks',array('stud_id'=>$card_info['regno'],
		 			'session_of_entry'=>$card_info['session_of_entry'],'status'=>'active')),array('deg_type_val'));
		
		 $log_count_sql = $dbm->getFields($dbm->select_distinct('payment_duration','logbooks',array('stud_id'=>$card_info['regno'],
		 			'session_of_entry'=>$card_info['session_of_entry'],'status'=>'active')),array('payment_duration'));
		 
		 /** get all logbooks recorded for user **/
		 $log_count = count($log_count_sql['payment_duration']);
		 
		
		 /** get all annual payment details for users logbooks **/
		 ##########################################################
		 if(!is_null($log_count_sql)) {			 
			 foreach($log_count_sql['payment_duration'] as $years){
				 $all_logs_pay_status = $dbm->resort($dbm->getFields($dbm->select('logbooks',array('stud_id'=>$card_info['regno'],
		 			'session_of_entry'=>$card_info['session_of_entry'],'payment_duration'=>$years)),
					array('payment_session','payment_status','amount','payment_duration')));
					
					## create new array for each 
					$all_pay_sessions[] = array('payment_session'.$years=>$all_logs_pay_status['payment_session']);
					$all_pay_status[] = array('payment_status'.$years=>$all_logs_pay_status['payment_status']);					
			 }
			 
		 } ##########################################################
		
		 $total_rec_ses = $dbm->getFields($dbm->select('logbooks',array('stud_id'=>$card_info['regno'],
		 			'session_of_entry'=>$card_info['session_of_entry'],'deg_type_val'=>$log_infos['deg_type_val'][0])),array('payment_session'));	 
		
		 $recsum = count($total_rec_ses['payment_session']);  # record total sum 
		 
		 $last_pay_sess = $total_rec_ses['payment_session'][($recsum-1)];
		 
		 $other_elem = array( );
		 
		if(!is_null($log_infos)) $log_pre_details = $dbm->resort($log_infos);
		if(!is_null($log_count_sql)){
			$other_elem = array_merge($all_pay_sessions[0],$all_pay_status[0]);
			if($log_count==2) $other_elem = array_merge($other_elem,$all_pay_sessions[1],$all_pay_status[1]);
			if($log_count==3) $other_elem = array_merge($other_elem,$all_pay_sessions[1],$all_pay_status[1],
								$all_pay_sessions[2],$all_pay_status[2]);			
		}
			 
		$all_elem = array_merge( 
							$other_elem,
							$log_pre_details,array(
							'sn'=>$card_info['sn'],
							'name'=>$card_info['name'],
							'regno'=>$card_info['regno'],
							'appno'=>$card_info['appno'],							
							'date_approved'=>$func->format_date($card_info['date_approved'],'date'),
							'programme'=>$card_info['programme'],
							'session_of_entry'=>$card_info['session_of_entry'],							
							'session_ended'=>$card_info['session_ended'],
							'phone'=>$card_info['phone'],
							'email'=>$card_info['email'],						
							'prog_completed'=>$card_info['prog_completed'],
							'fact_id'=>$card_info['fact_id'],
							'dept_id'=>$card_info['dept_id'],
							'prog_id'=>$card_info['prog_id'],
							'supervisor_id'=>$card_info['supervisor_id'],
							'supervisor_name'=>$supervisor_info['name'],
							'recsum'=>$recsum,
							'total_rec_ses'=>$total_rec_ses,
							'payment_session'=> $last_pay_sess,
							'log_count'=>$log_count							
							));
							
		 echo json_encode( $all_elem );
	 
	}  /*******/
	
		
	###################################
	if(isset($_POST['staff_name_search'])){		// customer searching 
		$word = mysql_real_escape_string(strip_tags($_POST["keyword"])); 
		if(!empty($word)) {
			$dbm = new DbTool(); 
			$info = $dbm->getFields($dbm->regExpSearch('staff', array('user_id'=>$word,'name'=>$word,
					'email'=>$word,'phone'=>$word),array('name'), " DESC ",'10'),array('name','user_id','fact_id','dept_id'));
			$tot = count($info['name']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['name'] as $staff) {
				## for($p = 1;$p<=10; $p++) {
					  $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $staff).' &nbsp; - ('.$info['user_id'][$m].')';
					// $fname = $customs['customer_no'][$m]." -- ".$customs['customer_name'][$m]." -- ".$customs['slipno'][$m];
					// $text = $word.' found. --'.$tot;
				?>
				<li onClick="set_name('<?php echo $staff; ?>','<?php echo $info['user_id'][$m]; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 
					/// echo '<li onclick="set_no(\''.str_replace("'", "\'", $customer).'\')">'.$fname.'</li>';
				  $l++; $m++;
			    	}
				} ## end not null 			
			 }  // end not empty keyword 
			
	}/// end custom_search
	###################################
	
	################# staff info for logbook creation 
	if(isset($_POST['search_staff_logbook_info'])){		// customer searching 
		
		$staff_id = mysql_real_escape_string(strip_tags($_POST['staff_id'])); 
		 ##---tables needed -------------##
		 ##--- staff, accounts, bank ----##
		 ##------------------------------##
		 $dbm = new DbTool(); 
			/********* BIO-INFO ***********************/
			if($staff_id!="") $info = @$dbm->resort($dbm->getFields($dbm->select('staff',array('user_id'=>$staff_id)),array('sn','user_id','name','title','email','phone','fact_id','dept_id')));
			$fact = @$dbm->resort($dbm->getFields($dbm->select('faculty',array('fact_id'=>$info['fact_id'])),array('sn','fact_name','fact_status')));
			$dept = @$dbm->resort($dbm->getFields($dbm->select('departments',array('dept_id'=>$info['dept_id'])),array('sn','dept_name','dept_status')));
			
			$acct_info = array(); $other_info = array('bank'=>'',
							'acct_name'=>'',
							'acct_no'=>'',
							'acct_type'=>'',
							'full_bank_info'=>'');
							
			/***** ACCOUNT & BANK INFO **********/
			  $acct = $dbm->getFields($dbm->select('accounts',array('staff_id'=>$staff_id)),array('sn','account_type','account_no','account_name','bank_id'));
			  if(!is_null($acct)) $acct_info = $dbm->resort($acct);
			  if(!is_null($acct)) $bank = $dbm->resort($dbm->getFields($dbm->select('banks',array('sn'=>$acct_info['bank_id'])),array('sn','name','alias','icon','address')));
			
			/***** FAC INFO **********/
			$fac_info = array('user_id'=>$info['user_id'],
							'name'=>$info['name'],
							'title'=>$info['title'],
							'email'=>$info['email'],
							'phone'=>$info['phone'],
							'fact_id'=>$info['fact_id'],
							'dept_id'=>$info['dept_id'],
							'faculty'=>$fact['fact_name'],
							'fact_status'=>$fact['fact_status'],
							'department'=>$dept['dept_name']); 
			
			if(!is_null($acct)) $other_info = array(
							'bank'=>$bank['name'],
							'acct_name'=>$acct_info['account_name'],
							'acct_no'=>$acct_info['account_no'],
							'acct_type'=>$acct_info['account_type'],
							'full_bank_info'=>$bank['alias'].'|'.$bank['name'].'|'.$bank['sn']
							); 
							
		   echo json_encode(array_merge($fac_info,$other_info)); 	
	}
	########################################################################
	// get_allowance_detail
	
	################# staff info for logbook creation 
	if(isset($_POST['get_allowance_detail'])){		// allowance rate from payment_type
		$serial = mysql_real_escape_string(strip_tags($_POST['serial'])); 		 
		 ##------------------------------##
		 $dbm = new DbTool(); 
			if($serial!=""){
		/********* search payment_type ***********************/			
			$info = $dbm->resort($dbm->getFields($dbm->select('payment_type',array('sn'=>$serial)),array('sn','prog_type','level')));/********* search ***********************/			
	
			/********* search amount_scale ***********************/				
			$amount = $dbm->resort($dbm->getFields($dbm->select('amount_scale',array('level'=>$info['level'])),array('sn','amount','level')));
			
			echo "<b>".$info['prog_type'].": &nbsp; &nbsp; N".number_format($amount['amount'],2)." </b>";
			# echo json_encode($info);
			}	## end if 
	}	
	########################################################################
	
	// save_staff_account
	if(isset($_POST['save_staff_account'])){		// update staff account details
		$bank_info = mysql_real_escape_string(strip_tags($_POST['bank_info'])); 
		$infos = explode('|',$bank_info); ###  alias/name/sn
		$staff_id = mysql_real_escape_string(strip_tags($_POST['staff_id'])); 		 
		$acct_name = mysql_real_escape_string(strip_tags($_POST['acct_name'])); 		 
		$acct_no = mysql_real_escape_string(strip_tags($_POST['acct_no']));  
		$dbm = new DbTool(); 
		//sleep(1);
		
		if(!is_numeric($acct_no) || strlen($acct_no)!="10"  ){				
		$msg = "<span class='font-18'> This Account Number ( $acct_no ) <br/> Must Be of 10 Digits .</span> ";
		echo json_encode(array('methods'=>'error','msg'=>$msg,'title'=>'Wrong Account No.'));
		}
		else {
			$exists = $dbm->getFields($dbm->select('accounts',array('account_no'=>$acct_no,'bank_id'=>$infos[2])),array('sn','bank_id','staff_id','account_name','account_no')); /********* search ***********************/			
			// if it exists, check the owner, else save for him/her
			if(is_null($exists)){
				// search staff record for existing account and update 
				$staff_account = $dbm->getFields($dbm->select('accounts',array('staff_id'=>$staff_id)),array('sn','bank_id','staff_id','account_name','account_no')); /********* search ***********************/
				// if exist : update, else : insert 
					if(is_null($staff_account)){
						$dbm->insert('accounts',array('bank_id'=>$infos[2],
						'staff_id'=>$staff_id,'account_name'=>$acct_name,'account_no'=>$acct_no));
						echo json_encode(array('methods'=>'info','msg'=>'New Account Created Successfully for '. $acct_name,'title'=>'Successful: Account Created.'));		 
					}
					else {
						$dbm->updateTb('accounts',array('bank_id'=>$infos[2],'account_name'=>$acct_name,'account_no'=>$acct_no),
						array('staff_id'=>$staff_id));
						echo json_encode(array('methods'=>'info','msg'=>'Account Successfully Updated for '. $acct_name,'title'=>'Successful: Account Updated.'));		 
					} 
			} // end of new account
			else{
				if(!is_null($exists)){ // 'staff_id','account_name','account_no'
					$owner_id = $exists['staff_id'][0];
					$owner_name = $exists['account_name'][0];
					// so if the owner is the new staff_id , reply : account ok 
					// else reply existing account, choose another account number
					if($staff_id == $owner_id){
						echo json_encode(array('methods'=>'info','msg'=>' No Changes ','title'=>'Account OK.'));		 	
					}
					else {
						echo json_encode(array('methods'=>'error','msg'=>' This account  [ '. $acct_no.' ] already exists for '.$owner_name,'title'=>'Account Exists.'));		 	
					}
				}  // end of existing account
				
			}
		}
	} ####################################################################
		
	// data:{ del_logbook:"this",stud_serial:stud_serial }  	
	if(isset($_POST['del_logbook'])){		// update logbook for student			
		
		$stud_serial = mysql_real_escape_string(strip_tags($_POST['stud_serial'])); 		 
		$payment_duration = mysql_real_escape_string(strip_tags($_POST['payment_count'])); 		 
		
		$dbm = new DbTool(); $card = new card();
		 
		$card_info = $dbm->resort($card->search_student_record(array('sn'=>$stud_serial)));
		
		$criterial = array('stud_id'=>$card_info['regno'],'session_of_entry'=>$card_info['session_of_entry'],'status'=>'active','payment_duration'=>$payment_duration);
		
		/********* search ***********************/			
		$exists = $dbm->getFields($dbm->select('logbooks',$criterial),array('sn','stud_id','staff_id','deg_type_val','session_of_entry','payment_session','payment_duration','payment_status')); 
		
		if(is_null($exists)){
			echo json_encode(array('methods'=>'error','msg'=>'<b> No Logbook has been Recorded for '.$card_info['name'].' </b>','title'=>' No Logbook Record Found.'));		 
		}
		else {
			if($exists['payment_status'][0] !="paid") {							
			 $dbm->updateTb('logbooks',array('status'=>'inactive','deletedby'=>$_SESSION['admUser'],'date_deleted'=>date('Y-m-d'),'time_deleted'=>time()),$criterial);
			// $dbm->deleteRow('logbooks',$criterial); 
			$rem_log = $dbm->getFields($dbm->select('logbooks',array('stud_id'=>$card_info['regno'],'session_of_entry'=>$card_info['session_of_entry'],'status'=>'active')),array('sn','stud_id','staff_id','deg_type_val','session_of_entry','payment_session','payment_duration')); 
			if(is_null($rem_log)) $dbm->updateTb('students',array('supervisor_id'=>''),array('sn'=>$stud_serial));
			
			echo json_encode(array('methods'=>'info','msg'=>'<b> Logbook Record Deleted '.$card_info['name'].' </b>','title'=>' Logbook Deleted.'));		 
			} ##  end not yet paid
			else {
				 echo json_encode(array('methods'=>'error','msg'=>'<b> Because The Payment has been made </b>','title'=>'This Logbook cannot be reversed.'));	
			}
		} 
		
	} /*************************************************/	
		
	// update_student_logbook
	if(isset($_POST['update_student_logbook'])){		// update logbook for student			
		
		$regno = mysql_real_escape_string(strip_tags($_POST['regno'])); 
		$stud_serial = mysql_real_escape_string(strip_tags($_POST['stud_serial'])); 
		$staff_id = mysql_real_escape_string(strip_tags($_POST['staff_id'])); 
		$deg_type_val = mysql_real_escape_string(strip_tags($_POST['deg_type_val'])); 
		$payment_session = mysql_real_escape_string(strip_tags($_POST['payment_session'])); 
		$payment_count = mysql_real_escape_string(strip_tags($_POST['payment_count'])); 
		
		$dbm = new DbTool(); $card = new card();
		$dbm->updateTb('students',array('regno'=>$regno),array('sn'=>$stud_serial));
		$card_info = $dbm->resort($card->search_student_record(array('sn'=>$stud_serial)));
		// update student regno first... 
		
		///
		$money_info = $dbm->resort($dbm->getFields($dbm->select('payment_type',array('sn'=>$deg_type_val)),array('sn','prog_type','level')));/********* search ***********************/			
		/********* search amount_scale ***********************/				
		$amount = $dbm->resort($dbm->getFields($dbm->select('amount_scale',array('level'=>$money_info['level'])),array('sn','amount','level')));			
		
		## sleep(1); 
		/*************************************************************/
		$data = array('stud_id'=>$card_info['regno'],'staff_id'=>$staff_id,
					'session_of_entry'=>$card_info['session_of_entry'],'payment_session'=>$payment_session,
					'programme'=>$card_info['programme'],'deg_type_val'=>$deg_type_val,
					'amount_level'=>$money_info['level'],'amount'=>$amount['amount'],'createdby'=>$_SESSION['admUser'],
					'datecreated'=>date('Y-m-d'),'timecreated'=>time(),'payment_duration'=>$payment_count);
		
		$updates = array('staff_id'=>$staff_id,'programme'=>$card_info['programme'],'status'=>'active',
						'deg_type_val'=>$deg_type_val,'amount_level'=>$money_info['level'],
						'amount'=>$amount['amount'],'payment_session'=>$payment_session);
		
		#$criterial = array('stud_id'=>$card_info['regno'],'session_of_entry'=>$card_info['session_of_entry'],'payment_duration'=>$payment_count );
		$criterial = array('stud_id'=>$card_info['regno'],'session_of_entry'=>$card_info['session_of_entry'],'payment_duration'=>$payment_count );
		
		// search logbook 
		
		$exists = $dbm->getFields($dbm->select('logbooks',$criterial),array('sn','stud_id','staff_id','deg_type_val','session_of_entry','payment_session','status','payment_duration','payment_status')); 
		/********* search ***********************/			
			// if it exists, check the owner, else save for him/her
			if(is_null($exists)){
				// insert into logbooks and update students record for the staff
			$dbm->insert('logbooks',$data);
			$dbm->updateTb('students',array('supervisor_id'=>$staff_id),array('regno'=>$card_info['regno'],'session_of_entry'=>$card_info['session_of_entry']));
			echo json_encode(array('methods'=>'info','msg'=>'<b>New Logbook Recorded Successfully </b>','title'=>'New Logbook Recorded Successfully.'));		 
			  
			} // end of new account
			else{
				if(!is_null($exists)){ // 'staff_id','account_name','account_no'
					## before making changes : check if the allowance has not been paid 
					if($exists['payment_status'][0] !="paid") {							
						$old_staff = $exists['staff_id'][0];
						$old_level = $exists['deg_type_val'][0];
						$old_pay_session = $exists['payment_session'][0];
						// $old_pay_count = $exists['payment_duration'][0];
						
						// so if the owner is the new staff_id , reply : account ok 
						// else reply existing account, choose another account number
						if(($staff_id == $old_staff && $old_level==$deg_type_val && $old_pay_session == $payment_session && $exists['status'][0]=='active') ){
							echo json_encode(array('methods'=>'info','msg'=>'<b> There is No Changes </b>','title'=>'Logbook  Up To Date.'));		 	
						}
						else {
							$dbm->updateTb('logbooks',$updates,$criterial);
							$dbm->updateTb('students',array('supervisor_id'=>$staff_id),array('sn'=>$stud_serial));
							echo json_encode(array('methods'=>'info','msg'=>'<b> Logbook Successfully Updated </b>','title'=>'Successful: Logbook Updated.'));		 					
						}
					
				  } ### end if allowance has not been paid 
				  else {
					  echo json_encode(array('methods'=>'error','msg'=>'<b> Updates is no more accepted  </b>','title'=>'The Allowance has been Paid for.'));		 					
				  }
				}  // end of existing logbook
				
			}
		 
	} ####################################################################
	
	
	// rename_sgn_pix_folder	
	/********************************************/
	# to rename selected students signature n passport from applc_id to matric id 
	if(isset($_POST['rename_sgn_pix_folder'])){
		
			$users_id = $_POST['users_id'];			 
			$card = new card(); 
			$dbm = new DbTool();    
				set_time_limit(0);
				/*********************************************/ 
				
				$old_psp_count = $old_sign_count = 0; 
				
				foreach($users_id as $sn){ 
					$my_info = $dbm->resort($card->search_card(array('sn'=>$sn)));	
					## result is : $card_fields = array('sn','session','regno','appno','surname','firstname','othername','faculty','department','programme',
					##	'phone','email','passport','signature','psp_dir','sign_dir','uploaded_by','date_uploaded',
					##	'time_uploaded','updated_by','date_updated','time_updated','deleted_by','date_deleted','time_deleted',
					##	'status'); 
					## 	we need 'passport','signature','psp_dir','sign_dir'
				
					## now process passport n signature
					$old_psp_name = $old_sign_name = str_replace('/','',$my_info['appno']).'.jpg';					 
					$new_psp_name = $new_sign_name = str_replace('/','',$my_info['regno']).'.jpg';
					 
				 	$psp_sub_dir =  $my_info['psp_dir'];
					$sign_sub_dir =  $my_info['sign_dir'];
					
					## old sign						
					$old_sign_bool = file_exists($sign_sub_dir.$old_sign_name);
					$new_sign_bool = file_exists($sign_sub_dir.$new_sign_name);
					$old_psp_bool = file_exists($psp_sub_dir.$old_psp_name);
					$new_psp_bool = file_exists($psp_sub_dir.$new_psp_name); 
					
					if($old_psp_bool){
						$old_psp_count++; 
						@rename($psp_sub_dir.$old_psp_name , $psp_sub_dir.$new_psp_name);
					}
					
					if($old_sign_bool){
						$old_sign_count++;
						@rename($sign_sub_dir.$old_sign_name , $sign_sub_dir.$new_sign_name);
					} 
					########################################################## 
					
				 }  ## end foreach  
			
			  echo "<span class='font-20 text-success'>".$old_psp_count." Old Passports </span> <span class='font-20'> were found and updated, </span>   ". 
				"<span class='font-20 text-success'> <br/> and " .$old_sign_count." Old Signatures </span> <span class='font-20'> were found and updated respectively </span>";
	}
	###
	/*******************************************/
	// export_to_uploaded_data
	 if(isset($_POST['export_to_uploaded_data'])){
		$sn = mysql_real_escape_string($_POST['serial']);
		$regno = strtoupper(mysql_real_escape_string($_POST['regno']));
		$fact_id = mysql_real_escape_string($_POST['fact_id']);
		$dept_id = mysql_real_escape_string($_POST['dept_id']);
		$session = mysql_real_escape_string($_POST['session']);		 
		$psp = $sign = str_replace('/','',$regno);
		$psp_dir = 'imgs/passports/'; $sign_dir = 'imgs/signatures/';
		
		 $card = new card(); 
		 $dbm = new DbTool();    
		 $my_info = $dbm->resort($card->search_student_record(array('sn'=>$sn)));	 
		 $names = explode(' ',$my_info['name']);  # surname, firstname, othername
		    
		 $fact = $dbm->resort($dbm->getFields($dbm->select('faculty',array('fact_id'=>$fact_id)),array('sn','fact_name','fact_status')));
		 $dept = $dbm->resort($dbm->getFields($dbm->select('departments',array('dept_id'=>$dept_id)),array('sn','dept_name','dept_status')));
		 
		 $data = array('passport'=>$psp,'signature'=>$sign,'sign_dir'=>$sign_dir,'psp_dir'=>$psp_dir,'surname'=>$names[0],'firstname'=>$names[1],'othername'=>$names[2],'regno'=>$regno,
			 	'appno'=>$my_info['appno'],'faculty'=>$fact['fact_name'],'department'=>$dept['dept_name'],'session'=>$session,
			 	'programme'=>$my_info['programme'],'phone'=>$my_info['phone'],'email'=>$my_info['email']); 
 
		 $exists = $dbm->getFields($dbm->select('card_uploaded_data',$data),array('regno','appno')); 
		 
		 if(count($exists)==0) {
			 $dbm->insert('card_uploaded_data',$data);
			 $dbm->updateTb('students',array('fact_id'=>$fact_id,'dept_id'=>$dept_id),array('sn'=>$sn));
			 echo json_encode(array('methods'=>'success','msg'=>'Data has been successfully exported to card record ','title'=>'Data Exported Successfully'));
		 }
		 else{
			 echo json_encode(array('methods'=>'error','msg'=>'Cannot duplicate exported data ','title'=>'Data Already Exists'));
		 }
		 
	 }
	/*****************************************************/
	
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
			echo json_encode(array('methods'=>'error','msg'=>'your current password is invalid ','title'=>'Invalid Password'));
		}
		else {			
		 if(md5($new_psw) != md5($confirm_psw)){
			echo json_encode(array('methods'=>'error','msg'=>"<span class='bold font-16'>Your New Password did not match </span>",'title'=>'Password Not Matched'));
		}
		else if($cur_user['enc_psw'] == md5($new_psw)){
			echo json_encode(array('methods'=>'error','msg'=>'you cannot use the same old password','title'=>'No Password Changed'));
		}
		 else {
			 $dbm->updateTb('users',array('password'=>$new_psw,'enc_psw'=>md5($new_psw)),array('user_id'=>$_SESSION['admUser']));
				session_destroy(); session_start(); 
				echo json_encode(array('methods'=>'success','msg'=>'your password was successfully changed, you must re-login in to effect your password ','title'=>' Password Changed Successfully'));			
			}
		}	
		  
	 }
/*****************************************************/
	 ## approve_these_staff_allowance   
	  if(isset($_POST['approve_these_staff_allowance'])){		 
		$users_id = $_POST['users_id'];	
		$payment_batch = mysql_real_escape_string($_POST['payment_batch']);	
		$cond = $_SESSION['log_summary_query']; 
		################
		####
		set_time_limit(0); 
		$dbm = new DbTool();  $func = new functions();    
		foreach($users_id as $staff_id){
			$staff_info = $func->get_staff_info($staff_id); 
			$staff_account = $dbm->getFields($dbm->select('accounts',array('staff_id'=>$staff_id)),array('sn','bank_id','staff_id','account_name','account_no'));
			$staff_bank = $dbm->getFields($dbm->select('banks',array('sn'=>$staff_account['bank_id'][0])),array('sn','name','alias','icon','address'));
			##########################################################################
			$my_pgd_sum = $my_msc_sum = $my_mphil_sum = $my_phd_sum = $my_total_sum  = $total_cut = 0; 
			##########################################################################
			### now fetch each staff [ degree accounts sum ]
			 
			$my_pgd =  $dbm->getFields($dbm->select('logbooks',array_merge($cond,array('deg_type_val'=>1,'staff_id'=>$staff_id))),array('sn','amount')); 
			$my_msc =  $dbm->getFields($dbm->select('logbooks',array_merge($cond,array('deg_type_val'=>2,'staff_id'=>$staff_id))),array('sn','amount')); 
			$my_mphil = $dbm->getFields($dbm->select('logbooks',array_merge($cond,array('deg_type_val'=>3,'staff_id'=>$staff_id))),array('sn','amount')); 
			$my_phd =  $dbm->getFields($dbm->select('logbooks',array_merge($cond,array('deg_type_val'=>4,'staff_id'=>$staff_id))),array('sn','amount')); 
			
			###################
			if(!is_null($my_pgd)) $my_pgd_sum = array_sum($my_pgd['amount']);
			if(!is_null($my_msc)) $my_msc_sum = array_sum($my_msc['amount']);
			if(!is_null($my_mphil)) $my_mphil_sum = array_sum($my_mphil['amount']);
			if(!is_null($my_phd)) $my_phd_sum = array_sum($my_phd['amount']);
			
			###################
			$my_total_sum = $my_pgd_sum+$my_msc_sum+$my_mphil_sum+$my_phd_sum ;											
			if($my_total_sum > 100000) {
				$total_cut = ($my_total_sum - 100000);
				$my_total_sum = 100000;
			} 
			
			################### save the records in database ###################
			$data = array(
						'payment_session'=>$cond['payment_session'],'total'=>$my_total_sum,
						'cut_out'=>$total_cut,'date_paid'=>date('Y-m-d'),
						'time_paid'=>time(),'staff_id'=>$staff_id,'batch'=>$payment_batch,
						'pgd'=>$my_pgd_sum,'masters'=>$my_msc_sum,
						'mphil'=>$my_mphil_sum,'phd'=>$my_phd_sum,
						'account_name'=>$staff_account['account_name'][0],
						'account_no'=>$staff_account['account_no'][0],
						'bank_id'=>$staff_account['bank_id'][0]
						);
			$dbm->insert('logbooks_payment',$data); 
			
			################### update logbook ###################
			$dbm->updateTb('logbooks',array('payment_status'=>'paid','batch'=>$payment_batch,'date_paid'=>date('Y-m-d')),array_merge($cond,array('staff_id'=>$staff_id))); 
 			
		}
		
		echo count($users_id)." staff allowance has been approved. with - batch : ".$payment_batch; 
	
	  }
	  /*****************************************************/
	  
	  // save_stud_spreadsheet:'this',course_id:course_id, scores:
	  if(isset($_POST['save_stud_spreadsheet'])){		 
		$course_id = $_POST['course_id'];	
		$scores = $_POST['scores'];	
	    $stud_info = explode('|',$_POST['stud_info']);	## sn | regno 
		$dbm = new DbTool(); 
		
		## first check if any transcript has been recorded 
		 $prev_work = $dbm->getFields($dbm->select('transcripts',array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],'cur_state'=>'finished','status'=>'active')),array('stud_id','regno','code'));
		if(!is_null($prev_work)){
			echo json_encode(array('methods'=>'error','msg'=>" Some Work have already been completed for ".$stud_info[1]."<br/> try to search for the matric number again",'title'=>'Finished Work Exists'));
		}
		else {  
			#############################################
		   if(!is_null($course_id)){   ## fetched from uploaded_courses 
			## delete existing courses and resave the new selected 
			$n = 0;  
			 $dbm->deleteRow("transcripts",array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],'cur_state'=>'created','status'=>'active')); 
			   foreach($course_id as $cid){
				   $cos_info = $dbm->getFields($dbm->select('uploaded_courses',array('sn'=>$cid)),
				   array('fact_id','dept_id','code','title','unit','cos_status'));
				   if(!is_null($cos_info)) $cos_info = $dbm->resort($cos_info);
				  
				   $data = array_merge(array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],
				   'course_id'=>$cid,'score'=>$scores[$n],'c_by'=>$_SESSION['admUser'],
				   'date_c'=>date('Y-m-d'),'time_c'=>time()),$cos_info);
				   $dbm->insert('transcripts',$data);
				 $n++;  
			   } # end foreach

			  ## update students faculty and department --
			   $fac_info = $dbm->getFields($dbm->select('uploaded_courses',array('sn'=>$course_id[0])),array('fact_id','dept_id'));
			   if(!is_null($fac_info)) $fac_info = $dbm->resort($fac_info);
			   $dbm->updateTb("students",array('fact_id'=>$fac_info['fact_id'],'dept_id'=>$fac_info['dept_id']),array('sn'=>$stud_info[0],'regno'=>$stud_info[1]));
			   
		   } # end not null 
		    
    	echo json_encode(array('methods'=>'info','msg'=>"$n courses successfully saved",'title'=>'Successful'));
		#
		 } ## end no previous work saved 
			
	  }
	/*****************************************************/
		 // functions
	  
	  // finalize_stud_spreadsheet:'this',course_id:course_id, scores:
	  if(isset($_POST['finalize_stud_spreadsheet'])){		 
		$course_id = $_POST['course_id'];	
		## $scores = $_POST['scores'];	
	    $stud_info = explode('|',$_POST['stud_info']);	## sn | regno 
		$dbm = new DbTool(); 
		#############################################
		   if(!is_null($course_id)){   ## fetched from uploaded_courses 
			## unstar existing courses and resave the new selected 		 
			 $dbm->updateTb("transcripts",array('starred'=>'no'),array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],'status'=>'active')); 
			   foreach($course_id as $sn){
				    $cond = array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],'sn'=>$sn);
				   $data = array('starred'=>'yes');
				   $dbm->updateTb('transcripts',$data,$cond);
				
			   } # end foreach 
			   
		   } # end not null 
		   else{  ## remove all starred courses..
			   $dbm->updateTb("transcripts",array('starred'=>'no'),array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],'status'=>'active')); 
		   }
		   		
    	echo json_encode(array('methods'=>'success','msg'=>"Transcript successfully Updated",'title'=>'Successful'));
		#
	  }
	/*****************************************************/
	
	
	 // end_stud_spreadsheet_process:'this',course_id:course_id
	  if(isset($_POST['end_stud_spreadsheet_process'])){		 
			$transc_type = mysql_real_escape_string($_POST['transc_type']);			 
			$stud_info = explode('|',$_POST['stud_info']);	## sn | regno 
			$ref_id = getTranscId(); 
			$dbm = new DbTool(); 
		#############################################
	    ## remove all starred courses..
		   $dbm->updateTb("transcripts",array('cur_state'=>'finished','ref_id'=>$ref_id),array('stud_id'=>$stud_info[0],'regno'=>$stud_info[1],'cur_state'=>'created','status'=>'active')); 		   
		   unset($_SESSION['transc_proc_final']); 
			
		 $dbm->insert('transcripts_report',array('ref_id'=>$ref_id,'date_c'=>date('Y-m-d'),'time_c'=>time(),
			'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'),
			'c_by'=>$_SESSION['admUser'],'stud_id'=> $stud_info[0],'regno'=> $stud_info[1],'transc_type'=>$transc_type));
		  ####### PRINTOUT REPORTS TOO ##############################
		  
		  #############################################
			$secretary = $dbm->getFields($dbm->select('transcripts_officials',array('post'=>'secretary','cur_admin'=>'yes')),array('user_id'));
			$dean = $dbm->getFields($dbm->select('transcripts_officials',array('post'=>'dean','cur_admin'=>'yes')),array('user_id'));
		   #############################################
		
			$data = array('date_c'=>date('Y-m-d'),'time_c'=>time(),'c_by'=>$_SESSION['admUser'],'stud_id'=>$stud_info[0],
			'regno'=>$stud_info[1],'transc_type'=>$transc_type,'sec_id'=>$secretary['user_id'][0],'dean_id'=>$dean['user_id'][0]);						
		 $dbm->insert('transcripts_printouts',$data);	
		 	
			
    	echo json_encode(array('methods'=>'success','msg'=>"Transcript Finally Completed Successfully",'title'=>'Finished Processing'));
		#
	  }
	/*****************************************************/
	
	// schedule_new_trans_request 
	  if(isset($_POST['schedule_new_trans_request'])){		 
			$transc_type = mysql_real_escape_string($_POST['transc_type']);			 
			$stud_info = explode('|',$_POST['stud_info']);	## sn | regno 		 
			$dbm = new DbTool(); 
		#############################################
			$secretary = $dbm->getFields($dbm->select('transcripts_officials',array('post'=>'secretary','cur_admin'=>'yes')),array('user_id'));
			$dean = $dbm->getFields($dbm->select('transcripts_officials',array('post'=>'dean','cur_admin'=>'yes')),array('user_id'));
		#############################################
			$data = array('date_c'=>date('Y-m-d'),
					'time_c'=>time(),'sec_id'=>$secretary['user_id'][0],'dean_id'=>$dean['user_id'][0],
					'c_by'=>$_SESSION['admUser'],'stud_id'=>$stud_info[0],
					'regno'=>$stud_info[1],'transc_type'=>$transc_type);						
				 $dbm->insert('transcripts_printouts',$data);	
			echo json_encode(array('methods'=>'success','msg'=>" New Request Created Successfully",'title'=>'Request Completed '));
		#
	  }
	/*****************************************************/
		 // functions
		function  getAppId(){
			
				$dbm =  new DbTool();  # database mgr.
				
				$allStud = $dbm->getFields($dbm->select('students',array('')),array('user_id'));
				
				$tot = count($allStud['user_id']);
				
				$lastNo = $tot-1;
				
				$lastId = $allStud['user_id'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,12,strlen($lastId)) + 1;
				
				$newAppid = "SHN/AP".date('Y')."/".str_pad($newNo,5,'0',STR_PAD_LEFT);
				
				 return $newAppid;   
			}
	 // functions
	 
	 ####
	#### check_if_is_new_department
	##############################################		 
	if(isset($_POST['check_if_is_new_department'])){  		
				$fact_id = $_POST['fact_id']; 
				$dept_name = $_POST['dept_name'];				
				$dept_id = $_POST['dept_id'];				
				##  ##  ##  ##  			
				$dbm = new DbTool(); // create connection 	
			$fact  = $dbm->getFields($dbm->select("faculty",array('fact_id'=>$fact_id)),array('sn','fact_id','fact_name','status'));
			$cond = array('dept_id'=>$dept_id,'status'=>'active','fact_id'=>$fact_id,'dept_name'=>$dept_name,'dept_status'=>'Academic');	
			$info = $dbm->getFields($dbm->select("departments",$cond,array('dept_name'),'AND','ASC'),array('sn','fact_id','dept_name','status'));
			if(is_null($info)){
				$field_id = rand(1500,9990); 
				$dbm->insert('departments',array('id'=>$field_id,'dept_id'=>$dept_id,'fact_id'=>$fact_id,'dept_name'=>$dept_name,'dept_status'=>'Academic'));
				 echo false; 
			}
			else{
				echo true;
			} 
		}
	/**********************************************************************/
	####
	
	
	#### check_if_is_new_degree
	##############################################		 
	if(isset($_POST['check_if_is_new_degree'])){  		
				$short_name = $_POST['short_name'];
				$full_name = $_POST['full_name'];
				$dbm = new DbTool(); // create connection
				// echo false;
				$cond = array('status'=>'active','short_name'=>$short_name,'full_name'=>$full_name);	
				$exists = $dbm->getFields($dbm->select("degrees",$cond),array('sn','short_name','full_name'));
				echo is_null($exists); ## (array('short_name'=>$short_name,'full_name'=>$full_name))?true:false; /* this gives true / false  */  
				if(!is_null($exists)) $dbm->insert('degrees',$cond);
				
	}
	/**********************************************************************/
	####
	
	#### check_if_is_new_programme
	##############################################		 
	if(isset($_POST['check_if_is_new_programme'])){  		
				$fact_id = $_POST['fact_id'];
				$dept_id = $_POST['dept_id'];   
				$degree = $_POST['degree'];
				$name = $_POST['data'];				
				$prog_id = $_POST['prog_id'];				
				## $template = $_POST['template'];				
				$dbm = new DbTool(); // create connection 	
				$cond = array('status'=>'active','fact_id'=>$fact_id,'dept_id'=>$dept_id,'degree'=>$degree,'name'=>$name);	
				$info = $dbm->getFields($dbm->select("course_programmes",$cond,array('name'),'AND','ASC'),array('sn','faculty','department','name','degree','status'));
				if(is_null($info)) {  $field_id = rand(1245,7745); 
					$dbm->insert('course_programmes',$cond);
					# also save programmefor student too 
					$dbm->insert('programmes',array('id'=>$field_id,'fact_id'=>$fact_id,'dept_id'=>$dept_id,'prog_id'=>$prog_id,'prog_name'=>" $degree $name "));
					echo array('id'=>$field_id,'fact_id'=>$fact_id,'dept_id'=>$dept_id,'prog_id'=>$prog_id,'prog_name'=>" $degree $name ");
				}
				else{
					echo true;
				} 
		}
	/**********************************************************************/
	
	if(isset($_POST['search_uploaded_course'])){
		$code = mysql_real_escape_string($_POST['code']); 
		$dbm = new DbTool(); // create connection 	
			$cond = array('status'=>'active','code'=>$code); 	
			$fields = array('sn','fact_id','dept_id','programme','code','title','unit','cos_status'); 	
			$info = $dbm->getFields($dbm->select("uploaded_courses",$cond,array('code'),'AND','ASC'),$fields);
			if(!is_null($info)) { $m=0;  echo " <p> &nbsp; </p>"; 
				 foreach($info['code'] as $codes){ ?>
					<button type="button" class="btn btn-md bg-navy " data-text="<?php echo $info['fact_id'][$m].'|'.$info['dept_id'][$m].'|'.$info['programme'][$m].'|'.$info['code'][$m].'|'.$info['title'][$m].'|'.$info['unit'][$m].'|'.$info['cos_status'][$m].'|'; ?>" for="<?php echo $info['sn'][$m]; ?>" onclick="manage_course_editor($(this).attr('data-text'),$(this).attr('for'))"> <?php echo $codes; ?>  </button> &nbsp;&nbsp;
				 <?php	$m++;					
				 }
				echo "&nbsp;&nbsp;&nbsp;";
				?>
				<button type="button" class="btn btn-md btn-info btn_course_add" onclick="hide_update_buttons(),$('.course_edit_label').show()" > Add <i class="fa fa-plus"> </i> </button> &nbsp; 
				<?php 
			}
			else {
				echo "<span class='text-danger bold'> $code </span> is not available.";
				?>
				<button type="button" class="btn btn-md btn-info btn_course_add" onclick="hide_update_buttons(),$('.course_edit_label').show()" > Add <i class="fa fa-plus"> </i> </button> &nbsp; 
				<?php 
			} 
	}
	
	######
	if(isset($_POST['save_course_parameters'])){
		$_SESSION['faculty'] = mysql_real_escape_string($_POST['fact_id']);
		$_SESSION['department'] = mysql_real_escape_string($_POST['dept_id']);
		$_SESSION['prog_name'] = mysql_real_escape_string($_POST['prog_name']);
	} 
	########################
	if(isset($_POST['save_course_data'])){
		$fact_id = mysql_real_escape_string($_POST['fact_id']);
		$dept_id = mysql_real_escape_string($_POST['dept_id']);
		$prog_name = mysql_real_escape_string($_POST['prog_name']);
		$mode = mysql_real_escape_string($_POST['mode']);  // update / new 
		$serial = mysql_real_escape_string($_POST['serial']);   
		$code = mysql_real_escape_string($_POST['code']);   
		$title = mysql_real_escape_string($_POST['title']);   
		$unit = mysql_real_escape_string($_POST['unit']);   
		$cos_status = mysql_real_escape_string($_POST['cos_status']);   
		// start executions 
		$dbm = new DbTool(); 
			switch($mode){
				case "update":{
					$cond = array('status'=>'active','sn'=>$serial); 	
					$fields = array('sn','fact_id','dept_id','programme','code','title','unit','cos_status'); 	
					$info = $dbm->getFields($dbm->select("uploaded_courses",$cond,array('code'),'AND','ASC'),$fields); 
					### check if rhyme
					if(!is_null($info)){
						$info = $dbm->resort($info); 
						## check if match 
						if($info['fact_id']==$fact_id && $info['dept_id']==$dept_id && $info['programme']==$prog_name &&
						$info['code']==$code && $info['title']==$title && $info['unit']==$unit && $info['cos_status']==$cos_status) {
							echo  " No update found ! ";
						}
						else {
							## update record 
							$dbm->updateTb('uploaded_courses',array('fact_id'=>$fact_id ,'dept_id'=>$dept_id ,'programme'=>$prog_name,
							 'code'=>$code,'title'=>$title ,'unit'=>$unit,'cos_status'=>$cos_status,'upd_by'=>$_SESSION['admUser']),$cond);
							 ## go through transcripts and update record as well 
							  $dbm->updateTb('transcripts',array('code'=>$code,'title'=>$title ,'unit'=>$unit,'cos_status'=>$cos_status),
							  array('course_id'=>$serial,'code'=>$info['code'],'status'=>'active'));
							#echo "course updated successfully : ".$dm->message;
							echo json_encode(array('methods'=>'success','msg'=>"Course updated successfully ",'title'=>'Update Successful')); 
						}
					}
			
				} break;
				
				case "new":{
					$cond = array('status'=>'active','fact_id'=>$fact_id ,'dept_id'=>$dept_id ,'programme'=>$prog_name,
							 'code'=>$code); 	
					$fields = array('sn','fact_id','dept_id','programme','code','title','unit','cos_status'); 	
					$info = $dbm->getFields($dbm->select("uploaded_courses",$cond,array('code'),'AND','ASC'),$fields); 
					### check if rhyme
					if(!is_null($info)) { 
						 #  echo "this course code already exists, try saving with another code "; 
						echo json_encode(array('methods'=>'error','msg'=>"This course code already exists, try saving with another code",'title'=>'Duplicate Course Code')); 
					}
					else {
						$dbm->insert('uploaded_courses',array('fact_id'=>$fact_id ,'dept_id'=>$dept_id ,'programme'=>$prog_name,
							 'code'=>$code,'title'=>$title ,'unit'=>$unit,'cos_status'=>$cos_status,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d H:i:s',time()-3600)));
							# echo "new course code successfully saved. ";
							  echo json_encode(array('methods'=>'success','msg'=>"New course code successfully saved.",'title'=>'Successful')); 
					}
				} break;
			}
		}
	########################
	
	########################
	if(isset($_POST['delete_course_data'])){ 
		$serial = mysql_real_escape_string($_POST['serial']);   
		// start executions 
		$dbm = new DbTool(); 
		 $cond = array('status'=>'active','sn'=>$serial); 	
		 $fields = array('sn','fact_id','dept_id','programme','code','title','unit','cos_status'); 	
		 $info = $dbm->getFields($dbm->select("uploaded_courses",$cond,array('code'),'AND','ASC'),$fields); 
			### check if rhyme
			if(!is_null($info)){
				$info2 =  $dbm->getFields($dbm->select("transcripts",array('course_id'=>$serial),array('code'),'AND','ASC'),$fields); 
				## check if match 
				if(!is_null($info2)) {
					echo  " Cannot be deleted, bcos it has been recorded for transcripts ! ";
				}
				else {
					## delete record 
					$dbm->updateTb('uploaded_courses',array('status'=>'inactive'),$cond);					
					echo "course successfully deleted "; 
				}
			}
			else{
				echo " No record matches your criterial: for delete...";				
			}
	    
			}
		 
	########################
		function  getTranscId(){
			
				$dbm =  new DbTool();  # database mgr.
				
				$allTransc = $dbm->getFields($dbm->select('transcripts_report',array('')),array('ref_id'));
				
				$tot = count($allTransc['ref_id']);
				
				$lastNo = $tot-1;
				
				$lastId = $allTransc['ref_id'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,4,strlen($lastId)) + 1;
				
				$newTranscId = "TRNS".str_pad($newNo,4,'0',STR_PAD_LEFT);
				
				 return $newTranscId;   
			}
	
	?>
	
	
	<?php 
		if(isset($_POST['save_new_student'])){
			$dbm = new DbTool(); $func = new functions(); 
			$fact_id = $dbm->clean($_POST['fact_id']);
			$dept_id = $dbm->clean($_POST['dept_id']);
			$prog = $dbm->clean($_POST['prog_name']); ## prog_id | prog_name - need to split 
			$mode = $dbm->clean($_POST['mode']);  // update / new 
			$serial = $dbm->clean($_POST['serial']);   
			$name = $dbm->clean($_POST['name']);   
			$regno = $dbm->clean($_POST['regno']);   
			$appno = $dbm->clean($_POST['appno']);   
			$reg_date = $dbm->clean($_POST['reg_date']);   
			$senate_date = $dbm->clean($_POST['senate_date']);   
			// start executions  
			$prog_info = explode("|",$prog);
			$ses_adm = $func->set_session($reg_date);
			$ses_comp =  $func->set_session($senate_date);
			switch($mode){
				case "update":{
					 
				} break;
				
				case "new":{					
					$fields = array('sn','fact_id','dept_id','programme','regno','name'); 	
					$info = $dbm->getFields($dbm->select("students",array('regno'=>$regno)),$fields); 
					### check if rhyme
					if(!is_null($info)) { 
						 echo json_encode(array('methods'=>'error','msg'=>"This Matric No. already exists",'title'=>'Duplicate Reg.No ')); 						 
					}
					else {
						$dbm->insert('students',array('fact_id'=>$fact_id,'dept_id'=>$dept_id ,'programme'=>$prog_info[1],
							 'prog_id'=>$prog_info[0],'name'=>$name ,'regno'=>$regno,'appno'=>$appno,'first_reg_date'=>$reg_date,
							 'session_of_entry'=>$ses_adm,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d H:i:s',time()-3600)));
							 echo json_encode(array('methods'=>'success','msg'=>"Student Bio-data Saved Successfully",'title'=>'Successful')); 
					}
				} break;
			}
		}
	########################
	if(isset($_POST['save_duplicate_student'])){
			$dbm = new DbTool(); $func = new functions(); 
			$fact_id = $dbm->clean($_POST['fact_id']);
			$dept_id = $dbm->clean($_POST['dept_id']);
			$prog = $dbm->clean($_POST['prog_name']); ## prog_id | prog_name - need to split 
			$name = $dbm->clean($_POST['name']);   
			$regno = $dbm->clean($_POST['regno']);   
			$phone = $dbm->clean($_POST['phone']);   
			$email = $dbm->clean($_POST['email']);   
			$appno = $dbm->clean($_POST['appno']);   
			$reg_date = $dbm->clean($_POST['reg_date']);   
			$senate_date = $dbm->clean($_POST['senate_date']);   
			// start executions  
			$prog_info = explode("|",$prog);
			$ses_adm = $func->set_session($reg_date);
			$ses_comp =  $func->set_session($senate_date);
			 					
					$fields = array('sn','fact_id','dept_id','programme','regno','name'); 	
					$info = $dbm->getFields($dbm->select("students",array('regno'=>$regno,'prog_id'=>$prog_info[0],'programme'=>$prog_info[1])),$fields); 
					### check if rhyme
					if(!is_null($info)) { 
						 echo json_encode(array('icon'=>'error','msg'=>"This Programme already exists",'title'=>'Duplicate Programme')); 						 
					}
					else {
						$dbm->insert('students',array('fact_id'=>$fact_id,'dept_id'=>$dept_id ,'programme'=>$prog_info[1],'email'=>$email,'phone'=>$phone,
							 'prog_id'=>$prog_info[0],'name'=>$name ,'regno'=>$regno,'appno'=>$appno,'first_reg_date'=>$reg_date,
							 'session_of_entry'=>$ses_adm,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d H:i:s',time()-3600)));
							 echo json_encode(array('icon'=>'success','msg'=>"Student Bio-data Saved Successfully",'title'=>'Successful')); 
				  }
			}
	########################
	?>