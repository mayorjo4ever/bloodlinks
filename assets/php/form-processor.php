<?php
	// 
	// 	form-processor
		error_reporting(E_ALL^E_NOTICE);
	
		require_once "dbTool.php";
		require_once "model.php"; 			
		/// 
		
		
	################# data_upload tab menu  	####################
	## save_active_tab
	if(isset($_POST['save_active_tab'])){		
		$tab_type = $_POST['tab_type']; 	
		$_SESSION[$tab_type.'-tab'] = $_POST['save_active_tab']; 	
		echo $tab_type.'-tab = '.$_POST['save_active_tab'] ;
	}
	################# /. data_upload tab menu  	####################
	
	
		
	 /************************** #### display_my_roles**************/
	##############################################	##########	##########		 
	if(isset($_POST['display_priviledges'])){  		
				$role = mysql_real_escape_string($_POST['role']);
				$dbm = new DbTool(); 						
				$priviledges = $dbm->getFields($dbm->select("priviledges",array('role_id'=>$role,'status'=>'active')),array('role_id','url','sn')); ?> 
				 	 	
					<?php	$n = 0; if(!is_null($priviledges))

						foreach ($priviledges['url']  as $val){ ?>
							<div class="form-group form-group-inline" style="margin-top:1px; padding-top:1px; margin-bottom:1px; padding-bottom:1px;"> 
								 <div class="checkbox"> 
									<label class="label-control"> 
									<input type="checkbox" class="checkbox stud_box" name="roles" id="roles" value="<?php echo $val; ?>" /> &nbsp; &nbsp; 
										 <?php echo $val; ?>
									</label>
								 </div>
								  
							 
							</div> 
							
					<?php $n ++; }
						else {
							?>	
                            <span class="text-warning"> no page is  defined yet  </span> 
						<?php }
					 ?>					 
				  
				<?php  
	}
	/**********************************************************************/
	####
	####
	#### now_pay for id card 
	##############################################	
	if(isset($_POST['now_pay'])){  		
				$receipt = $_POST['receipt'];
				$datepaid = $_POST['datepaid'];
				$sn = $_POST['ref'];
				$dbm = new DbTool(); 
				$card = new card(); 
				$card_info = $dbm->resort($card->search_card_processing(array('sn'=>$sn)));
				
				// validate
				if(!is_numeric($receipt)){
					echo json_encode(array(false,"<span class='text-danger font-20'> The Teller Number  must be an Integer value </span>"));	
				}
				else {
					// check if exists 
					$exists = $card->search_card_processing(array('receiptno'=>$receipt));	
			
					if(!is_null($exists['sn'])){
					$msg = "<span class='text-danger font-20'> this receipt no ' $receipt' has earlier been registered  : "."</span>";
					echo json_encode(
						array(false, $msg ));
					}
					else {
						$data = array('receiptno'=>$receipt,'paid'=>'yes','amount_paid'=>$card_info['payment'],'date_paid'=>$datepaid,'time_paid'=>time(),'cash_received_by'=>$_SESSION['admUser']);
						$dbm->updateTb("card_processing",$data,array('sn'=>$sn)); 
							$msg = "<span class='text-success font-20'> ".$card_info['name']."'s Payment has been recorded with receipt number : ".$receipt."</span>";
					echo json_encode(
						array(true, $msg ));	 		
					} // 2nd else 
				
					 
			
				} // 1st else 
	} // end post 
	/**********************************************************************/
	
	 
	#### 
	#### searching id card processed for payment 
	##############################################	
	if(isset($_POST['adv_payment_search'])){  		
		$text =  mysql_real_escape_string($_POST['value']); ## $mysql_real_escape_string($_POST['value']);
		$fields = array('session'=>$text,'regno'=>$text,'appno'=>$text,'processed_by'=>$text,'date_processed'=>$text,
		'time_processed'=>$text,'date_printed'=>$text,'time_printed'=>$text,'deleted_by'=>$text,'date_deleted'=>$text,
		'time_deleted'=>$text,'collected'=>$text,'name'=>$text,'faculty'=>$text,'department'=>$text,'programme'=>$text,
		'status'=>$text,'stage'=>$text,'collected_by'=>$text,'date_collected'=>$text,'time_collected'=>$text,
		'payment'=>$text,'paid'=>$text,'amount_paid'=>$text,'date_paid'=>$text,'time_paid'=>$text,'receiptno'=>$text,
		'cash_received_by'=>$text,'phone'=>$text); 
			
		$cards = new card(); $n = 0; $func = new functions();
		$allcards = $cards->adv_card_proc_search($fields);
		
		if(!is_null($allcards)){	
		 ?> 
		<div class="box-header with-border">						 
					  <h3 class="box-title text-info bold">  <?php echo count($allcards['sn'])." records found ";?> </h3>					    					    
					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
						</button>						 
					  </div>
		</div>
		<!-- /.box-header -->
		
		<div class="box-body">
				
		<!-- <h3 class="text-success bold col-md-offset-1" style="margin-top:0em; padding-top:0em;"> <?php echo count($allcards['sn'])." records found ";?></h3> -->
			<table class="table table-responsive font-13">
				<thead style="background-color:black; color:white;">
					<tr class="text-uppercase  bold">					
						<td> sn </td>
						<td> fullname </td>
						<td> regno </td>
						<td> applc no. </td>
						<td> programme </td>
						<td> current stage  </td>
						<td> amount paid </td>                                                                     
						<td> date paid </td>
						<td> actions </td>
					</tr>
				</thead>
				
				<tbody>
				 <?php foreach($allcards['sn'] as $sn){ 	?>
					<tr class="<?php if($allcards['paid'][$n]!='yes') echo 'bg-warning';  else echo 'bg-success';  ?>"> 
				 
					<td class="bold ">  <?php  echo $n+1; ?> </td>
						<td> <a href="#" onclick="show_my_card_profile($(this).attr('for'));" data-toggle="modal" data-target="#myCardDetails" class="info_for_card" for="<?php  echo $allcards['sn'][$n]; ?>">  <i class="fa fa-meh-o" style="font-size:16px;"> </i> &nbsp;  <?php  echo strtoupper($allcards['name'][$n]); ?> </a> </td>
						<td>  <?php  echo $allcards['regno'][$n]; ?>  </td>
						<td>  <?php  echo $allcards['appno'][$n]; ?> </td>
						<td>  <?php  echo $allcards['programme'][$n]; ?> </td>                                                                     
						<td class="text-uppercase bold">  <?php print $allcards['stage'][$n];  ?>  </td>
						<td>  <span class=" font-16"><?php  echo "=N ".$allcards['amount_paid'][$n];?> </span>  </td> 
						<td align="center"> <?php  echo $func->format_date($allcards['date_paid'][$n]); ?> </td>
						<td align="center">  <?php if($allcards['paid'][$n]!="yes") { ?> <a href="#" onclick="make_payment($(this).attr('for'));" data-toggle="modal" data-target="#myModalState" class="payment_for_card btn btn-warning  btn-sm bold" for="<?php  echo $allcards['sn'][$n]; ?>"> pay </a>  <?php } else {  ?> <span class="text-success bold"> Paid &nbsp; <i class="fa fa-check-circle fa-2x"> </i> </span>  <?php }?></td>
						
					</tr>
					<?php $n++; 
					
					} // end foreach  ?>

				</tbody>
			</table>
			</div> <!-- /.box-body -->	
		
	 
	<?php } ## end not null;   

			}##### end of search  
	
	
		// get details for payment
		// get_my_card_details
		#### 
	#### searching id card processed for payment 
	##############################################	
	if(isset($_POST['get_my_card_details'])){  		
		$serial = mysql_real_escape_string($_POST['serial']); ## ($_POST['value']);
		$card = new card(); 
		$dbm = new DbTool(); $func = new functions();
		
		$card_info = $dbm->resort($card->search_card_processing(array('sn'=>$serial)));
		  
		echo json_encode(array(
							'sn'=>$card_info['sn'],
							'name'=>$card_info['name'],
							'regno'=>$card_info['regno'],
							'appno'=>$card_info['appno'],
							'stage'=>$card_info['stage'],
							'payment'=>$card_info['payment'],
							'receiptno'=>$card_info['receiptno'],
							'date_paid'=>$func->format_date($card_info['date_paid'],'datetime'),
							'programme'=>$card_info['programme'],
							'session'=>$card_info['session'],
							'faculty'=>$card_info['faculty'],
							'department'=>$card_info['department'],
							'collected'=>$card_info['collected'],
							'paid'=>$card_info['paid'],
							'name'=>$card_info['name'],
							'processed_by'=>$card_info['processed_by'],
							'date_processed'=>$func->format_date($card_info['date_processed'],'datetime'),
							'date_printed'=> $func->format_date($card_info['date_printed'],'datetime'),
							'date_collected'=>$func->format_date($card_info['date_collected'],'datetime')
							
							));
	 
	}  /*******/
	
	
	
	/************************** #### loadDepartments**************/
	##############################################	##########	##########		 
	if(isset($_POST['loadDepartments'])){  		
				$fac = $_POST['data'];
				$faculty = new faculty(); 						
				$departments = $faculty->search_departments(array('faculty'=>$fac)); /* this gives sn, name */?> 
				 	<option value="">...</option>		
					<?php	$n = 0; if(!is_null($departments)) foreach ($departments['name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['department']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 
				    
				<?php  
	}
	/**********************************************************************/
	#### setDepartments
	##############################################		 
	if(isset($_POST['setDepartments'])){  		
				$fac = $_POST['data'];
				$_SESSION['department'] = $_POST['value'];
				$faculty = new faculty(); 						
				$departments = $faculty->search_departments(array('faculty'=>$fac)); /* this gives sn, name */?> 
				 	<option value="">...</option>		
					<?php	$n = 0; if(!is_null($departments)) foreach ($departments['name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['department']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 
				    
				<?php  
	}
	/**********************************************************************/
	####
	
	#### loadDegrees
	##############################################		 
	if(isset($_POST['loadDegrees'])){  		
				$faculty = new faculty(); 						
				$degrees = $faculty->degrees; /* this sn, short_name, full_name, status */?> 
				 	<option value="">...</option>		
					<?php	$n = 0; if(!is_null($degrees)) foreach ($degrees['short_name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['degrees']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 				  
				<?php  
	}
	/**********************************************************************/
	####
	
	#### setDegrees
	##############################################		 
	if(isset($_POST['setDegrees'])){  		
				$faculty = new faculty(); 
				$_SESSION['degrees'] = $_POST['value'];
				$degrees = $faculty->degrees; /* this sn, short_name, full_name, status */?> 
				 	<option value="">...</option>		
					<?php	$n = 0; if(!is_null($degrees)) foreach ($degrees['short_name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['degrees']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 				  
				<?php  
	}
	/**********************************************************************/
	####
	
	#### loadTemplates
	##############################################		 
	if(isset($_POST['loadTemplates'])){  		
				$certs = new certificate(); 						
				$templates = $certs->template_types; 				
				/* this sn, name, status */?> 
				 	<option value="">...</option>
					<?php	$n = 0; if(!is_null($templates)) foreach ($templates['name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['template_type']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 				  
				<?php  
	}
	/**********************************************************************/
	####
	
	#### setTemplates
	##############################################		 
	if(isset($_POST['setTemplates'])){  		
				$certs = new certificate(); 
				$_SESSION['template_type'] = $_POST['value'];
				$templates = $certs->template_types; 				
				/* this sn, name, status */?> 
				 	<option value="">...</option>
					<?php	$n = 0; if(!is_null($templates)) foreach ($templates['name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['template_type']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 				  
				<?php  
	}
	/**********************************************************************/
	####
	 
	
	#### loadCategories
	##############################################		 
	if(isset($_POST['loadCategories'])){  		
				$certs = new certificate(); 						
				$categories = $certs->template_categories; 				
				/* this sn, name, status */?> 
				 	
					<?php	$n = 0; if(!is_null($categories)) foreach ($categories['name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['category']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n++; } ?>					 				  
				<?php  
	}
	/**********************************************************************/
	####
	
	#### loadProgrammes
	##############################################		 
	if(isset($_POST['loadProgrammes'])){  		
				$ptype = $_POST['ptype'];	// programme types
				$fac = $_POST['faculty'];
				$department = $_POST['department'];
				$template = $_POST['template'];
				$faculty = new faculty(); 						
				if($ptype=='fac') $cond = array('faculty'=>$fac,'template'=>$template);
				else if($ptype=='dept') $cond = array('faculty'=>$fac,'department'=>$department,'template'=>$template);
				$programmes = $faculty->search_programme($cond);  // faculty,department,degree,name,status
				?> 							
					<?php	$n = 0; if(!is_null($programmes)) foreach ($programmes['name']  as $val){ ?>
								<option value="<?php echo $programmes['degree'][$n].'_'.$val; ?>" <?php echo ($_SESSION['programme']==$programmes['degree'][$n].'_'.$val)?"selected":"" ?>> <?php echo $programmes['degree'][$n].' '.$val;  ?></option>							
					<?php $n++; } ?>		  
				<?php  
	}
	/**********************************************************************/
	####
	
	#### loadHonours
	##############################################		 
	if(isset($_POST['loadHonours'])){  		
				$certs = new certificate(); 						
				$honours = $certs->honours; 				
				/* this sn, name, status */?> 
				 	<option value="">... </option>
					<?php	$n = 0; if(!is_null($honours)) foreach ($honours['name']  as $val){ ?>
								<option value="<?php echo $val; ?>" <?php echo ($_SESSION['honours']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
					<?php $n ++; } ?>					 				  
				<?php  
	}
	/**********************************************************************/
	####
	
	#### check_if_is_new_faculty
	##############################################		 
	if(isset($_POST['check_if_is_new_faculty'])){  		
				$fac = $_POST['faculty'];
				$faculty = new faculty(); 	
				echo $faculty->faculty_exists(array('name'=>$fac)); /* this gives true / false  */  
				if(!$faculty->faculty_exists(array('name'=>$fac))) $faculty->create_faculty($fac);					
				
	}
	/**********************************************************************/
	####
	
	#### delete_this_existing_faculty
	##############################################		 
	if(isset($_POST['delete_this_existing_faculty'])){  		
				$serial = $_POST['serial'];
				$faculty = new faculty(); 					
				echo $faculty->faculty_exists(array('sn'=>$serial)); /* this gives true / false  */  
				if($faculty->faculty_exists(array('sn'=>$serial))) $faculty->delete_faculty(array('sn'=>$serial)); 
								
	}
	/**********************************************************************/
	####
	
	#### delete_this_existing_faculty
	##############################################		 
	if(isset($_POST['delete_this_existing_department'])){  		
				$serial = $_POST['serial'];
				$faculty = new faculty(); 					
			echo $faculty->department_exists(array('sn'=>$serial)); /* this gives true / false  */  
				if($faculty->department_exists(array('sn'=>$serial))) $faculty->delete_department(array('sn'=>$serial)); 
				 				
	}
	/**********************************************************************/
	####
	
	#### delete_this_existing_programme
	##############################################		 
	if(isset($_POST['delete_this_existing_programme'])){  		
				$serial = $_POST['serial'];
				$faculty = new faculty(); 					
			echo $faculty->programme_exists(array('sn'=>$serial)); /* this gives true / false  */  
			 if($faculty->programme_exists(array('sn'=>$serial))) $faculty->delete_programme(array('sn'=>$serial)); 
				 				
	}
	/**********************************************************************/
	####
	// 
	#### update_this_existing_faculty
	##############################################		 
	if(isset($_POST['update_this_existing_faculty'])){  		
				$fac = $_POST['faculty'];
				$serial = $_POST['ref'];
				$faculty = new faculty(); 	
				$fac_info = $faculty->search_faculties(array('sn'=>$serial));
				echo ($fac_info['name'][0]==$fac)?false:true; 
				
				if($fac_info['name'][0]!=$fac){
					/// cmd = update_faculty($data,$condition)
					$faculty->update_faculty(array('name'=>$fac),array('sn'=>$serial)); 
					// update department as well 
					$faculty->update_department(array('faculty'=>$fac),array('faculty'=>$fac_info['name'][0])); 
					// the programme will need update as well 
					
				} 
	}
	/**********************************************************************/
	####
	
	
	
	#### update_this_existing_department
	##############################################		 
	if(isset($_POST['update_this_existing_department'])){  		
				$fac = $_POST['faculty'];
				$data = $_POST['data'];
				$serial = $_POST['ref'];
				 
				$faculty = new faculty(); 	
				$dept_info = $faculty->search_departments(array('sn'=>$serial));
				if($dept_info['faculty'][0]==$fac && $dept_info['name'][0]==$data) echo false; 
				else if($dept_info['faculty'][0]==$fac && $dept_info['name'][0]!=$data) echo true; 	
				
				if($dept_info['faculty'][0]==$fac && $dept_info['name'][0]!=$data){					
					// update department now
					$faculty->update_department(array('name'=>$data),array('faculty'=>$fac,'sn'=>$serial)); 
					// the programme will need update as well 
				}
	}
	/**********************************************************************/
	#### 
	
	
	#### check_if_is_new_degree
	##############################################		 
	if(isset($_POST['check_if_is_new_degree'])){  		
				$short_name = $_POST['short_name'];
				$full_name = $_POST['full_name'];
				$faculty = new faculty(); 	
				// echo false;
			 echo $faculty->degree_exists(array('short_name'=>$short_name,'full_name'=>$full_name))?true:false; /* this gives true / false  */  
			 if(!$faculty->degree_exists(array('short_name'=>$short_name,'full_name'=>$full_name))) $faculty->create_degree(array('short_name'=>$short_name,'full_name'=>$full_name));					
				
	}
	/**********************************************************************/
	####
	
	#### check_if_is_new_programme
	##############################################		 
	if(isset($_POST['check_if_is_new_programme'])){  		
				$fac = $_POST['faculty'];
				$dept= $_POST['department'];   
				$degree = $_POST['degree'];
				$data = $_POST['data'];				
				$template = $_POST['template'];				
				$faculty = new faculty(); 	
				 echo $faculty->programme_exists(array('faculty'=>$fac,'department'=>$dept,'degree'=>$degree,'name'=>$data,'template'=>$template))?true:false; /* this gives true / false  */  				
				if(!$faculty->programme_exists(array('faculty'=>$fac,'department'=>$dept,'degree'=>$degree,'name'=>$data,'template'=>$template))) $faculty->create_programme(array('faculty'=>$fac,'department'=>$dept,'degree'=>$degree,'name'=>$data,'template'=>$template));					
				
	}
	/**********************************************************************/
	####
	
	
	#### update_this_existing_programme
	##############################################		 
	if(isset($_POST['update_this_existing_programme'])){  		
				$fac = $_POST['faculty'];
				$dept= $_POST['department'];   
				$degree = $_POST['degree'];
				$data = $_POST['data'];				
				$template = $_POST['template'];	
				$serial = $_POST['serial'];	
				$faculty = new faculty(); 	
				echo $faculty->programme_exists(array('sn'=>$serial))?true:false; /* this gives true / false  */  				
				if($faculty->programme_exists(array('sn'=>$serial))) $faculty->update_programme(array('faculty'=>$fac,'department'=>$dept,'degree'=>$degree,'name'=>$data,'template'=>$template),array('sn'=>$serial));					
				
	}
	/**********************************************************************/
	####
	
	
	
	#### check_if_is_new_template
	##############################################		 
	if(isset($_POST['check_if_is_new_template'])){  		
				$temp_name = $_POST['temp_name'];
				$certs = new certificate(); 	
				echo $certs->template_exists(array('name'=>$temp_name)); /* this gives true / false  */  
				 if(!$certs->template_exists(array('name'=>$temp_name))) $certs->create_template($temp_name);					
				
	}
	/**********************************************************************/
	####

	
	#### delete_this_existing_template
	##############################################		 
	if(isset($_POST['delete_this_existing_template'])){  		
				$serial = $_POST['serial'];
				$certs = new certificate(); 					
				echo $certs->template_exists(array('sn'=>$serial)); /* this gives true / false  */  
				if($certs->template_exists(array('sn'=>$serial))) $certs->delete_template(array('sn'=>$serial)); 
								
	}
	/**********************************************************************/
	####
	
	// 
	#### update_this_existing_template
	##############################################		 
	if(isset($_POST['update_this_existing_template'])){  		
				$temp_name = $_POST['temp_name'];
				$serial = $_POST['ref'];
				$certs = new certificate(); 
				$temp_info = $certs->search_template(array('sn'=>$serial));
				echo ($temp_info['name'][0]==$temp_name)?false:true; 
				
				if($temp_info['name'][0]!=$temp_name){
					/// cmd = update_template($data,$condition)
					$certs->update_template(array('name'=>$temp_name),array('sn'=>$serial)); 
					// update department as well 
					// $faculty->update_department(array('faculty'=>$fac),array('faculty'=>$fac_info['name'][0])); 
					// the programme will need update as well 
					
				} 
	}
	/**********************************************************************/
	####

		/**************************************/
	if(isset($_POST['create_new_img_folder'])){
		// echo
		
		/****  DIRECTORY FOR HONOUR HAS BEEN DISABLED 
		$_SESSION['honours'] = $_POST['honour']; 
		 $_SESSION['img_dir'] = "../imgs/".$_SESSION['cert_year']."/".$_SESSION['template_type']."/".$_SESSION['category']."/".$_SESSION['cert_faculty']."/".$_SESSION['programme']."/".$_SESSION['honours']."/";
			 
		  if(!is_dir($_SESSION['img_dir']))  mkdir($_SESSION['img_dir']);
			
			echo "new img  dir is  ".$_SESSION['img_dir'];
			
			*****/
		 
	} 
	
	/*********************************************/
	if(!empty($_FILES)){ 
				
				$targetDir = $_SESSION['img_dir']; 
				$_SESSION['input_method'] = "import_picture";
				
				$fileName = $_FILES['file']['name'];
				$targetFile = $targetDir.$fileName;
				
				set_time_limit(0);
				/**********************************************/
				if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
					$_SESSION['alert_message'] = " images has been loaded to dir ".$_SESSION['img_dir']; 
					$_SESSION['alert_type'] = "alert-success"; 
				}
				////////////////////////
				  
			}
			 
	/****************************/		
		
	/********************************************
	*** under certificate processing 
	********************************************/

	
	// schedule_these_students_cards	
	/********************************************/
	if(isset($_POST['schedule_these_students_cards'])){
			$users_id = $_POST['users_id'];
			$session =  mysql_real_escape_string($_POST['session']);
			$card_type = mysql_real_escape_string($_POST['card_type']);
			$card_batch = mysql_real_escape_string($_POST['card_batch']);
			
			$card = new card();
			$dbm = new DbTool(); 
			## get current session
			$cur_session = $dbm->resort($dbm->getFields($dbm->select("cur_sessiontb",array('')),array('session','semester')));
			## get current session id card payment setting
			$paysettings = $dbm->resort($dbm->getFields($dbm->select("card_payment_settings",array('session'=>$cur_session['session'])),array('amount')));
			  
				set_time_limit(0);
				/*********************************************/ 
				foreach($users_id as $sn){ 
					$my_info = $dbm->resort($card->search_card(array('sn'=>$sn)));	
					
					$now = date('Y-m-d H:i:s',time()+3600);

					$data = array('session_processed'=>$cur_session,'phone'=>$my_info['phone'],'batch'=>$card_batch,'card_type'=>$card_type,'regno'=>strtoupper($my_info['regno']),'appno'=>strtoupper($my_info['appno']),'faculty'=>$my_info['faculty'],'department'=>$my_info['department'],'programme'=>$my_info['programme'],'session'=>$session,'processed_by'=>$_SESSION['admUser'],'date_processed'=>$now, 'time_processed'=>time(),'payment'=>$paysettings['amount'],'name'=>strtoupper($my_info['surname']." ".$my_info['firstname']." ".$my_info['othername'])); 
  
  					/** now save the process **/				
					$dbm->insert("card_processing",$data); 
					/** also update the card_uploaed_data_tb **/
					$dbm->updateTb('card_uploaded_data',array('card_processed'=>'yes'),array('sn'=>$sn));
				 } 
			 echo count($users_id)." student's ID Cards has been scheduled for processing successfully";
	}
	###
	/*******************************************/
	
	// delete_these_students_cards	
	/********************************************/
	if(isset($_POST['delete_these_students_cards'])){
			$users_id = $_POST['users_id'];			  
			$dbm = new DbTool(); 
 			 ## get current session id card payment setting
			 
				set_time_limit(0);
				/*********************************************/ 
				foreach($users_id as $sn){					 
					$now = date('Y-m-d H:i:s',time()+3600);
					$delete_info = $dbm->resort($dbm->getFields($dbm->select('card_processing',array('sn'=>$sn)),array('session','regno','appno')));
					$dbm->updateTb("card_uploaded_data",array('card_processed'=>'no'),$delete_info);
					$dbm->updateTb("card_processing",array('status'=>'inactive','deleted_by'=>$_SESSION['admUser'],'date_deleted'=>$now,'time_deleted'=>time()),array('sn'=>$sn)); 					 
				 } 
			 echo count($users_id)." student's ID Cards has been Deleted Successfully";
	}
	###
	/*******************************************/
	// update_card_state	
	/********************************************/
	if(isset($_POST['update_card_state'])){
			
			$users_id = $_POST['users_id'];			
			$state = $_POST['state'];
			$date = $_POST['date'];
			$datefd = "date_".$state; 
			$timefd = "time_".$state; 
			
			$dbm = new DbTool(); 
			## get current session 
			 
				set_time_limit(0);
				/*********************************************/ 
				foreach($users_id as $sn){ 
					 
					$data = array('stage'=>$state, $datefd=>$date,$timefd=>strtotime($date)); 
					$dbm->updateTb("card_processing",$data,array('sn'=>$sn));
  					
					if($state=='collected') $dbm->updateTb("card_processing",array('collected'=>'yes'),array('sn'=>$sn));
					 
				 } 
				
			 echo count($users_id)." student's ID Cards has been successfully updated ".join(' and ',$data);
	}
	
	###
	/*******************************************/
	// update_card_collection	
	/********************************************/
	if(isset($_POST['update_card_collection'])){
			
			$collected_by = $_POST['collected_by'];			
			$users_id = $_POST['users_id'];			
			$state = $_POST['state'];
			$date = $_POST['date'];
			$datefd = "date_".$state; 
			$timefd = "time_".$state; 
			
			$dbm = new DbTool();  
				/*********************************************/  
					$data = array('stage'=>$state, 'collected'=>'yes','collected_by'=>$collected_by, $datefd=>$date,$timefd=>strtotime($date)); 
					$dbm->updateTb("card_processing",$data,array('sn'=>$users_id));
  				 
				echo $users_id." student's ID Cards has been successfully updated ".join(' and ',$data);
	}

	
	// generate_these_students_passport_name
	/*************************************************************/
		if(isset($_POST['generate_these_students_passport_name'])){
				
				$users_id = $_POST['users_id']; // arrays
				$students = new students();		
				
				echo $students->generate_passport($users_id);
		}
	
	/***************************************************/		
		
	// rename_this_pix
	/*************************************************************/
		if(isset($_POST['rename_this_pix'])){ 
			$dir = "../".$_SESSION['img_dir']; 
			// $dir = $_POST['direction'];
			$real = $_POST['real']; $old = $_POST['old'];			
			$old_pix = $dir.$old; 		$new_pix = $dir.$real; 	
						
			/**********************************************/
			if(is_dir($dir)){ 
				@rename($old_pix,$new_pix);
				echo "the picture has been renamed  ";  
			}
			else {
				echo " no directory found "; 
			}
			 /**********************/ 
		}
		
		// update_student($data,$condition)
		// update_student_name	
	/********************************************/
	if(isset($_POST['update_student_name'])){
			$new_name = $_POST['new_name'];
			$matric = $_POST['matric'];
			$serial = $_POST['ref'];
			
			$students = new students();
			
			echo $students->matric_exists(array('sn'=>$serial,'matric_no'=>$matric)); 
			
			$students->update_student(array('name'=>$new_name),array('sn'=>$serial,'matric_no'=>$matric));
			// after name update , update passport as well
			$students->generate_passport(array($serial)); 
	}
	/*************************************************/
	//
	#### delete_this_student
	##############################################		 
	if(isset($_POST['delete_this_student'])){  		
				$serial = $_POST['serial'];
				$matric_no = $_POST['matric_no'];
				$students = new  students(); 
				$stud_info = $students->search_student(array('sn'=>$serial,'matric_no'=>$matric_no));
					 
				// echo $students->matric_exists(array('sn'=>$serial,'matric_no'=>$matric_no));	
						
				if($students->matric_exists(array('sn'=>$serial,'matric_no'=>$matric_no))) 
					{
						/// delete picture 
					$pix_file = $stud_info['img_dir'][0].$stud_info['picture'][0].".jpg";
					$dir = str_replace(" ","%20",$stud_info['img_dir'][0].$stud_info['picture'][0].".jpg");	
					@unlink("../".$pix_file);    // ignore warning if it does not exists 
					// delete profile as well 
					$students->update_student(array('status'=>'in-active'),array('sn'=>$serial,
						'matric_no'=>$matric_no)); 
						echo $dir;
					}								
	}
	/**********************************************************************/
	####
	
	// delete_all_these_students : multiple data deletion 
	/*************************************************************/
	if(isset($_POST['delete_all_these_students'])){
			$users_id = $_POST['users_id'];
			
			$students = new students();
			$func = new functions();
			 
				$sum = 0;  set_time_limit(0);
				/**********************************************/
				foreach($users_id as $serial){ 
					$my_info = $func->resort($students->search_student(array('sn'=>$serial)));	 // correct  
					##
					if($students->matric_exists(array('sn'=>$serial,'matric_no'=>$my_info['matric_no']))) 
					{
						/// delete picture 
						$pix_file = $my_info['img_dir'].$my_info['picture'].".jpg";						
						@unlink("../".$pix_file);    // ignore warning if it does not exists 
						// delete profile as well 
						$students->update_student(array('status'=>'in-active'),array('sn'=>$serial)); 
						$sum++;
					}
					##
				} 
			 echo $sum." student's certificate data has been deleted successfully";
	}
	/********* END MULTI DELETE OF STUDENTS **************************************************************/
	################
	
	#### split student name with gender abbreviation (F) 
	/*****************************************************************************************/
	if(isset($_POST['split_these_students_name_and_gender'])){
		
		$users_id = $_POST['users_id'];			
			$students = new students();
			$func = new functions();
			 
				$sum = 0; set_time_limit(0);
				/****************************************/
				foreach($users_id as $serial){ 
					$my_info = $func->resort($students->search_student(array('sn'=>$serial)));	 // correct  					
					$new_name = $my_info['name']; $gender ="";					
					// now check for abbreviation of gender (F)
					
					if(strpos($my_info['name'],"(F)")) {	// test if the name consists of the abbreviation (F)
						// shows that i am a female
						$new_name = str_replace("(F)","",$my_info['name']);
						$gender = "(F)"; 
						$sum++;
					} 	## end if 
					else if(strpos($my_info['name'],"(M)")) {	// test if the name consists of the abbreviation (M)
						// shows that i am a female
						$new_name = str_replace("(M)","",$my_info['name']);
						$gender = ""; 
						$sum++;
					} 	## end if 
					### now update name 
					$students->update_student(array('name'=>$new_name,'gender'=>$gender),array('sn'=>$serial));
					// after name update , update passport as well
					$students->generate_passport(array($serial)); 					
					##
				}	// end foreach 
				
				echo $sum." student's name contains the abbreviation (F) / (M) and has been updated successfully ";
	}
	
	/*****************************************************************/
	
	#### complete_these_students_editing
	/*********************************************************/
	if(isset($_POST['complete_these_students_editing'])){
			$users_id = $_POST['users_id'];
			
			$students = new students();
			$func = new functions();
			 
				$sum = 0;  set_time_limit(0);
				/**********************************************/
				foreach($users_id as $serial){ 
					$my_info = $func->resort($students->search_student(array('sn'=>$serial)));	 // correct  
					##
					if($students->matric_exists(array('sn'=>$serial,'completed'=>'no'))) 
					{
						// update completed state
						$students->update_student(array('completed'=>'yes'),array('sn'=>$serial)); 
						$sum++;
					}
					##
				} 
			 echo $sum." student's certificate completion state has been updated successfully";
	}
	/********* END CERTIFICATE COMPLETION STUDENTS **************************************************************/
	################
	
	#### download_excel_card_data
	/*********************************************************/
	if(isset($_POST['download_excel_card_data'])){
			
			$_SESSION['download_cond'] = $users_id = $_POST['users_id']; 
			
			 echo json_encode($users_id); 
			  header("Location:../../download_data.php");
	}
	/********* END MULTI DELETE OF STUDENTS **************************************************************/
	################
	
	
	#### getcharts 
	if(isset($_POST['getCharts'])){
		$cert = new certificate();
		echo $cert->get_cert_data_analysis(); 
	}
	
	#### getcharts 
	if(isset($_POST['getCompletedCharts'])){
		$cert = new certificate();
		echo $cert->get_completed_cert_data_analysis(); 
	}
		
	?>