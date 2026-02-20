	
	<?php  #############
			  
	 if(!isset($_SESSION['temp_img'])) $_SESSION['temp_img'] = "default-user.png";
	 if(isset($_POST['reset_data'])){
		 clear_inputs(); 		 
	 }
	 ##############
	 if(isset($_POST['create_patient']) || isset($_POST['update_patient'])){
		
			$dbm = new DbTool(); 
			$_SESSION['title'] =  $title  = mysql_real_escape_string(strip_tags($_POST['title']));
			$_SESSION['surname'] =  $surname  = mysql_real_escape_string(strip_tags($_POST['surname']));
			$_SESSION['firstname'] =  $firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
			$_SESSION['othername'] =  $othername =  mysql_real_escape_string(strip_tags($_POST['othername']));
			$_SESSION['dob'] =  $dob =  mysql_real_escape_string(strip_tags($_POST['dob']));
			$_SESSION['phone'] =  $phone = mysql_real_escape_string(strip_tags($_POST['phone']));
			$_SESSION['mystate'] =  $mystate = mysql_real_escape_string(strip_tags($_POST['mystate']));
			$_SESSION['mylga'] =  $mylga = mysql_real_escape_string(strip_tags($_POST['mylga']));
			$_SESSION['gender'] =  $gender =  mysql_real_escape_string(strip_tags($_POST['gender']));
			$_SESSION['hosp_no'] =  $hosp_no = mysql_real_escape_string(strip_tags($_POST['hosp_no']));
			## $_SESSION['military_no'] =  $military_no = mysql_real_escape_string(strip_tags($_POST['military_no']));
			$_SESSION['pcategory'] =  $pcategory = mysql_real_escape_string(strip_tags($_POST['pcategory']));
  
			##################################################
			## 
			$_SESSION['address'] =  $address = mysql_real_escape_string(strip_tags($_POST['address']));		  
			$_SESSION['nokName'] =  $nokName = mysql_real_escape_string(strip_tags($_POST['nokName']));
			$_SESSION['nokRelation'] =  $nokRelation = mysql_real_escape_string(strip_tags($_POST['nokRelation']));
			$_SESSION['nokPhone'] =  $nokPhone = mysql_real_escape_string(strip_tags($_POST['nokPhone']));
			$_SESSION['pcategory'] =  $pcategory = mysql_real_escape_string(strip_tags($_POST['pcategory']));
  			// header("Location:newpatient.php"); 
			
			##################################################	 			
			$_SESSION['fullname'] =   $fullname = $surname." ".$firstname." ".$othername;
			###############################################
			 $exist = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$hosp_no,'status'=>'active')),array('sn','surname','firstname','othername'));
			## $exist2 = $dbm->getFields($dbm->select('patients',array('military_no'=>$military_no,'status'=>'active')),array('sn','surname','firstname','othername'));
			 $tot = count($exist['sn']); 
			 ## $tot2 = count($exist2['sn']); 

			###############################################
		
			if($title ==""){
				$msg = "Enter Patient Title ";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($surname ==""){
				$msg = "Enter Surname ";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($firstname ==""){
				$msg = "Enter First Name ";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($gender ==""){
				$msg = "Select Gender";
				$msg_type = "alert-danger";
				$msg_icon = "fa fa-warning";					
			}
			else if($dob ==""){
				$msg = "Select Date of Birth";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($phone ==""){
				$msg = "Enter Patient Phone Number";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if(!is_numeric($phone) || strlen($phone)!=11){					
				$msg = "This phone number (".$phone.") is not correct ". strlen($phone)." of 11 digits";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($mystate ==""){
				$msg = "Select Patient State of Origin";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($mylga ==""){
				$msg = "Select Patient Local Govermet";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($address ==""){
				$msg = "Enter Patient Address";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($pcategory ==""){
				$msg = "Select Patient Category";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($hosp_no ==""){
				$msg = "Enter Hospital No. ";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			/**** else if($pcategory =="Military" && $military_no ==""){
				$msg = "Enter Military Number";
				$msg_type = "alert-danger";	
			} *****/
			else if($nokName ==""){
				$msg = "Enter Name of Next of Kin ";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			else if($nokRelation ==""){
				$msg = "Enter Your Relationship with Next of Kin ";
				$msg_type = "alert-danger";	
				$msg_icon = "fa fa-warning";	
			}
			 
			else if(!is_numeric($nokPhone) || strlen($nokPhone)!=11){					
				$msg = "Next of Kin phone number (".$nokPhone.") is not correct ". strlen($nokPhone).":   of 11 digits";
				$msg_type = "alert-danger";		
				$msg_icon = "fa fa-warning";	
			} 
			else if($tot>0 && !isset($_SESSION['upd_sn'])){
				$msg = " This Patient Number `$hosp_no` Already Exists for (".$exist['surname'][0]." ".$exist['firstname'][0]." ".$exist['othername'][0].")" ;
				$msg_type = "alert-danger";
				$msg_icon = "fa fa-warning";	
			}
			 else if($tot==0  && !isset($_SESSION['upd_sn'])){			
				 $psp = $nfn = strtolower($_SESSION['hosp_no']."_host").'.jpg';
				 $newPath =  "images/users/".$nfn;
				 $psp_dir = "images/users/"; 
				 @rename("images/users/".$_SESSION['temp_img'],$newPath);
				 #########################################################		
					$data = array('title'=>$title,'surname'=>$surname,'firstname'=>$firstname,'othername'=>$othername,
					'phone'=>$phone, 'dob'=>$dob,'state'=>$mystate,'lga'=>$mylga,'gender'=>$gender,
					'hosp_no'=>$hosp_no,'category'=>$pcategory,'fullname'=>$_SESSION['fullname'],
					'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time(),
					'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'),'psp'=>$psp,'psp_dir'=>$psp_dir,
					'address'=>$address,'nokname'=>$nokName,'nokrelationship'=>$nokRelation,'nokphone'=>$nokPhone);
					
				#########################################################
				  $dbm->insert('patients',$data);	 
					$msg = " New Patient Profile Was Created Successfully";
					$msg_type = "alert-success";
					$msg_icon = "fa fa-check";	
				  clear_inputs(); 
				## echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'ACCOUNT CREATED'));
			}
			
		/********************************************************/
		else if($tot>=0 && isset($_SESSION['upd_sn'])){			
				 $psp = $nfn = strtolower($_SESSION['hosp_no']."_host").'.jpg';
				 $newPath =  "images/users/".$nfn;
				 $psp_dir = "images/users/"; 
				 @rename("images/users/".$_SESSION['temp_img'],$newPath);
				 #########################################################		
					$data = array('title'=>$title,'surname'=>$surname,'firstname'=>$firstname,'othername'=>$othername,
					'phone'=>$phone, 'dob'=>$dob,'state'=>$mystate,'lga'=>$mylga,'gender'=>$gender,
					'hosp_no'=>$hosp_no,'category'=>$pcategory,'fullname'=>$_SESSION['fullname'],
					  'psp'=>$psp,'psp_dir'=>$psp_dir,
					'address'=>$address,'nokname'=>$nokName,'nokrelationship'=>$nokRelation,'nokphone'=>$nokPhone);
					
				#########################################################
				  $dbm->updateTb('patients',$data,array('sn'=>$_SESSION['upd_sn']));	 
					$msg = " Patient Profile Was Updated Successfully";
					$msg_type = "alert-success";
					$msg_icon = "fa fa-check";	
				  clear_inputs(); 
				## echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'ACCOUNT CREATED'));
			} ######################################################### 
		####
	 } #########################################################

		# echo "<script> alert('$upd_sn')</scrpt>" ;
		
		function clear_inputs(){
			unset($_SESSION['title']); 
			unset($_SESSION['surname']); 
			unset($_SESSION['firstname']);
			unset($_SESSION['othername']);
			unset($_SESSION['dob']);
			unset($_SESSION['phone']);
			unset($_SESSION['mystate']);
			unset($_SESSION['mylga']);
			unset($_SESSION['gender']);
			unset($_SESSION['hosp_no']);
			unset($_SESSION['military_no']);
			unset($_SESSION['pcategory']);
			unset($_SESSION['temp_img']);
			unset($_SESSION['upd_sn']);
			unset($_SESSION['nokName']);
			unset($_SESSION['nokPhone']);
			unset($_SESSION['nokRelation']);
			unset($_SESSION['address']);
			##################################################
			unset($_SESSION['fullname']);
			unset($_SESSION['sib_type']);  
			unset($_SESSION['sib_dob']);
			$_SESSION['sib_mode']="new";
			unset($_SESSION['sib_upd_sn']);
			$_SESSION['temp_img'] = "default-user.png";
		}
		
	######################################################	
			####
		/********************************************************/
		// newSibling
			if(isset($_POST['newSibling']) || isset($_POST['update_sibling'])){
				// sleep(1); 
				$dbm = new DbTool(); 			 
				 ##################################################			
				$_SESSION['surname'] =  $surname  = mysql_real_escape_string(strip_tags($_POST['sib_surname']));
				$_SESSION['firstname'] =  $firstname = mysql_real_escape_string(strip_tags($_POST['sib_firstname']));
				$_SESSION['othername'] =  $othername =  mysql_real_escape_string(strip_tags($_POST['sib_othername']));
				$_SESSION['sib_dob'] =  $dob =  mysql_real_escape_string(strip_tags($_POST['sib_dob']));
				$_SESSION['phone'] =  $phone = mysql_real_escape_string(strip_tags($_POST['phone']));
				$_SESSION['gender'] =  $gender =  mysql_real_escape_string(strip_tags($_POST['gender']));
				$_SESSION['sib_type'] =  $sib_type =  mysql_real_escape_string(strip_tags($_POST['sib_type']));
				## 
			 				  
			##################################################	 
			$fullname = $surname." ".$firstname." ".$othername;
			##################################################	
			if($sib_type ==""){
				$msg = "Please Select Sibling Type ";
				$msg_type = "alert-danger";	
			}
			else if($surname ==""){
				$msg = "Enter Surname ";
				$msg_type = "alert-danger";	
			}
			else if($firstname ==""){
				$msg = "Enter First Name ";
				$msg_type = "alert-danger";	
			}
			else if($gender ==""){
				$msg = "Select Gender";
				$msg_type = "alert-danger";	
			}
			else if($dob ==""){
				$msg = "Select Date of Birth";
				$msg_type = "alert-danger";	
			}
			else if($phone ==""){
				$msg = "Enter Sibling Phone Number";
				$msg_type = "alert-danger";	
			}
			else if(!is_numeric($phone) || strlen($phone)!=11){					
				$msg = "This phone number (".$phone.") is not correct ". strlen($phone)." of 11 digits";
				$msg_type = "alert-danger";				
			}
			
			else {
				## new sibling mode 
				if($_SESSION['sib_mode']=="new") {
				$data = array('surname'=>$surname,'firstname'=>$firstname,'othername'=>$othername,'phone'=>$phone,
				'dob'=>$dob,'ref_no'=>$_SESSION['ref_id'],'type'=>$sib_type,'fullname'=>$fullname,'gender'=>$gender,
				'createdby'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>time(),
				'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'));
				
				// $updates = array('name'=>$fullname,'user_id'=>$fileno,'email'=>$email,'phone'=>$phone, 'fact_id'=>$fact_id,'dept_id'=>$dept_id);
				
				$exist = $dbm->getFields($dbm->select('patients_siblings',array('ref_no'=>$_SESSION['ref_id'],'type'=>$sib_type, 'status'=>'active')),array('sn','surname','firstname','othername','type'));
				$tot = count($exist['sn']);  
				
				if($tot>0){
					$msg = " Account has already been created for `$sib_type` as (".$exist['surname'][0]." ".$exist['firstname'][0]." ".$exist['othername'][0].")" ;
					$msg_type = "alert-danger";	
				}
				
				### else if($tot==0 && $save_mode=="newstaff"){			
				else if($tot==0){			
					$dbm->insert('patients_siblings',$data);					
					$msg = " Account Created Successfully for ".$_SESSION['sib_type'];
					$msg_type = "alert-success";	
					clear_inputs(); 
				}
				} 
				## end new node 
				
				
				else if($_SESSION['sib_mode']=="update"){
					$updates = array('surname'=>$surname,'firstname'=>$firstname,'othername'=>$othername,'phone'=>$phone,
								'dob'=>$dob,'type'=>$sib_type,'fullname'=>$fullname,'gender'=>$gender);
					$dbm->updateTb('patients_siblings',$updates,array('sn'=>$_SESSION['sib_upd_sn']));	
					$msg = " Account Updated Successfully ";
					$msg_type = "alert-success";	
					clear_inputs(); 
				}
				## update mode 
				
			} ## end data-capture 
		}
		/********************************************************/
		####

	
	 
		?>