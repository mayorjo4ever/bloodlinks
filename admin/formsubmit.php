<?php 
		error_reporting(E_ALL^E_NOTICE);
		require_once "../config/config.php";
		require_once "../assets/php/dbTool.php";
		require_once "../assets/php/DBController.php";
		require_once "../assets/php/pdo_dal.php";
		require_once "../assets/php/timecoder.php";
		require_once "../assets/php/model.php";
		require_once "../assets/php/User_1.php";
		require "../vendor/autoload.php"; 
		####
		$dbm = new DbTool(); 
		$mydbm = new DBController(); 
		$mydal = new DAL(); $func = new functions(); 
		date_default_timezone_set('Africa/Lagos');  
		use Carbon\Carbon; 
		 
	#### change_psw 
	// change admin user password 
	 if(isset($_POST['change_psw'])){		 
		$cur_psw = $dbm->clean($_POST['cur_psw']);
		$new_psw = $dbm->clean($_POST['new_psw']);
		$confirm_psw = $dbm->clean($_POST['confirm_psw']); 
		## password_verify()
		$cur_user = $dbm->resort($dbm->getFields($dbm->select('users',array('user_id'=>$_SESSION['admUser'])),$mydal->TableFields('users')));
		
		if($cur_user['hash_psw']==""){ # still using old password
			
				if($cur_user['enc_psw'] != md5($cur_psw)){
					echo json_encode(array('icon'=>'error','html'=>'your current password is invalid ','title'=>'Invalid Password'));
				}
				else {			
				 if(md5($new_psw) != md5($confirm_psw)){
					echo json_encode(array('icon'=>'error','html'=>"Your New Password did not match",'title'=>'Password Not Matched'));		
				}
				else if($cur_user['enc_psw'] == md5($new_psw)){
					echo json_encode(array('icon'=>'error','html'=>'you cannot use the same old password','title'=>'No Password Changed'));
				}
				 else {
					 $hash_psw = password_hash($new_psw,PASSWORD_DEFAULT);
					 $dbm->updateTb('users',array('password'=>'','enc_psw'=>'','hash_psw'=>$hash_psw),array('user_id'=>$_SESSION['admUser']));
						session_regenerate_id(); session_destroy(); session_start(); 
						echo json_encode(array('icon'=>'success','html'=>'your password was successfully changed, you must re-login in to effect your password ','title'=>' Password Changed Successfully'));			
					}
				}
		}
		else { # new password in use 
			 if(!password_verify($cur_psw,$cur_user['hash_psw'])){
				 echo json_encode(array('icon'=>'error','html'=>'your current password is invalid ','title'=>'Invalid Password'));
			 }
			 else {
				 $hash1 = password_hash($new_psw,PASSWORD_DEFAULT); $hash2 = password_hash($confirm_psw,PASSWORD_DEFAULT);
				 if(!password_verify($new_psw,$hash2)){
					 echo json_encode(array('icon'=>'error','html'=>"Your New Password did not match with the confirmed one ",'title'=>'New Password Not Matched'));		
				 }
				 else{
					 $dbm->updateTb('users',array('password'=>'','enc_psw'=>'','hash_psw'=>$hash1),array('user_id'=>$_SESSION['admUser']));
						session_regenerate_id(); session_destroy(); session_start(); 
						echo json_encode(array('icon'=>'success','html'=>'your password was successfully changed, you must re-login in to effect your password ','title'=>' Password Changed Successfully'));			
					}
			 }
		}	
		  
	 }
	 /********************************************************/
		################################################################	 
		if(isset($_POST['load_patient_categories'])){  		
				 $category = $dbm->getFields($dbm->select_distinct('name','patient_category',array('status'=>'active'),array('name'),'and','asc'),array('name')); 
				  ?> 
						<optgroup label="Patient Category">
						<option value="">Select Profile Type </option>
						<?php	$n = 0; if(!is_null($category)) foreach ($category['name']  as $val){ ?>
									<option value="<?php echo $val; ?>" <?php echo ($_SESSION['pcategory']==$val)?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/
	 
	##########################################################################
		
		if(isset($_POST['saveBillType'])){		$dbm = new DbTool(); 	 
			$dept_id = $dbm->clean($_POST['dept_id']);
			$categ_id = $dbm->clean($_POST['categ_id']);
			$name = $dbm->clean($_POST['billType']);			
			$price = $dbm->clean($_POST['billCost']);
			$specimen_sample = $dbm->clean($_POST['specimen_sample']);
			$estm_time = $dbm->clean($_POST['estm_time']);
			$estm_time_type = $dbm->clean($_POST['estm_time_type']);
			$serial = $dbm->clean(@$_POST['serial']); 
			$mode = $dbm->clean($_POST['mode']);
			/***********************************/
			# echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successfully Saved!'));
			if(!is_numeric($price)){
				$msg = " Price must be integer value ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Price Given!'));
			}
			else if(!is_numeric($estm_time)){ $msg = " Estimated Time must be integer value ";
				echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Invalid Time Format!'));
		}
			else{
				$data = array('name'=>$name,'dept_id'=>$dept_id,'categ_id'=>$categ_id,'status'=>'active');
				switch($mode){
				case "new":{					
					$exist = $dbm->getFields($dbm->select('bill_types',$data),array('sn','name','dept_id'));
					 if(!is_null($exist)){
						$msg = "$name already exists, record another bill type ";
						echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'This Type Already Exists'));
					}
					else {
						$newdata = array('price'=>$price,'estm_time'=>$estm_time,'estm_time_type'=>$estm_time_type,'specimen_sample'=>$specimen_sample,'c_by'=>$_SESSION['admUser'],'date_c'=>Carbon::now());
						$dbm->insert('bill_types',array_merge($data,$newdata));
						$msg = "New Bill Type [ ' $name ' ] Successfully Saved. ";
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successfully Saved!'));
					}			
				} break; 
				case "update":{
					$exist = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial)),array('sn','name','dept_id'));				
					if(!is_null($exist)){ $upds = array('price'=>$price,'estm_time'=>$estm_time,'estm_time_type'=>$estm_time_type,
						'specimen_sample'=>$specimen_sample,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
						$dbm->updateTb('bill_types',array_merge($data,$upds),array('sn'=>$serial));
						$msg = "Bill Successfully Updated ";
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Update Successful'));
					}
					else { $msg = "  No update found for this criteria, please try again later ";
						echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Error !')); }
				} break; 
			}
			
			}
			 
		}
		/********************************************************/
		#########################################################
		if(isset($_POST['store_info'])){
			$_SESSION['bill_department'] = $_POST['bill_dept_id'];
			$_SESSION['bill_category'] = $_POST['bill_categ_id'];
		}
		 ##########
		/**********************************************************************/
 		 ##############################################		 
		if(isset($_POST['load_bill_departments'])){  		
					$dbm = new DbTool(); 					 
					$types = $dbm->getFields($dbm->select('departments',array('status'=>'active'),array('name'),'and','asc'),array('name','sn')); 
				  ?> 
						<optgroup label="Department">
						<option value=""> ..... </option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $name){ ?>
									<option value="<?php echo $types['sn'][$n]; ?>" <?php # echo ($_SESSION['bill_department']==$types['sn'][$n])?"selected":"" ?>> <?php echo $name; ?></option>							
						<?php $n++; } ?>					 
						</optgroup>	
					<?php  
		}
		####################################		 
		if(isset($_POST['load_bill_category'])){  	$dbm = new DbTool(); 		
					$dept_id = $dbm->clean($_POST['dept_id']); 								 
					$types = $dbm->getFields($dbm->select('bill_category',array('dept_id'=>$dept_id),array('name'),'and','asc'),array('name','sn')); 
				  ?> 
						<optgroup label="Bill Categories">
						<option value=""> .....</option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){ ?>
								<option value="<?php echo $types['sn'][$n]; ?>" <?php # echo ($_SESSION['bill_category']==$types['sn'][$n])?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/

		 ##############################################		 
		if(isset($_POST['load_bill_type'])){  	$dbm = new DbTool(); 	
					$dept_id = $dbm->clean($_POST['dept_id']); 
					$categ_id = $dbm->clean($_POST['categ_id']); 									 
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
		
		 ##############################################		 
		if(isset($_POST['load_banks'])){  		
					$dbm = new DbTool(); 	
					$types = $dbm->getFields($dbm->select('banks',array(''),array('name'),'and','asc'),array('name','sn','alias','icon','address'));
					## $types = $dbm->getFields($dbm->select('bill_category',array(''),array('name'),'and','asc'),array('name','sn')); 
				  ?> 
						<optgroup label="Select Bank">	
							<option value="">... Bank ...</option>
						<?php	$n = 0; if(!is_null($types)) foreach ($types['name']  as $val){ 
								$dtext = base64_encode($types['sn'][$n]."|".$types['alias'][$n]);
								?>
									<option value="<?php echo $dtext; ?>"  <?php # echo ($_SESSION['bill_type']==$dtext)?"selected":"" ?>> <?php echo $val; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/	 ##############################################		 
		
		
		/**********************************************************************/
		# display_bill_ticket:'all',dept_id:dept_id,categ_id:categ_id
		
		/**********************************************************************/
		if(isset($_POST['display_bill_ticket'])){		$dbm = new DbTool(); 	 
			$dept_id = $dbm->clean($_POST['dept_id']); $categ_id = $dbm->clean($_POST['categ_id']);
			 $exist = $dbm->getFields($dbm->select('bill_types',array('categ_id'=>$categ_id,'dept_id'=>$dept_id,'status'=>'active')),array('sn','name','specimen_sample','price','estm_time','estm_time_type'));
			 $categ_info = $dbm->getFields($dbm->select('bill_category',array('sn'=>$categ_id,'status'=>'active')),array('sn','name','dept_id'));
				 if(!is_null($exist)){ 
					 $n = 0;  $days = array(0,60,3600,86400,604800,2419200); ?>
					<div class="col-md-12">
					<table class="table table-nogap jambo_table"><tbody>					 
					 <p class="text-center text-capitalize bold"> <?php echo "samples of ".$categ_info['name'][0]; ?> &nbsp; &nbsp; <span class="fa fa-window-maximize pointer pull-right" onclick="maximize_win($('#lg_disp'))">&nbsp; maxm. </span> </p>
					 <tr class="bold table-info"> <td> SN</td> <td> Bill </td> <td> Specimen Sample </td> <td> Price </td> <td> Action </td> </tr>
					 <?php foreach( $exist['name'] as $name){ 
						$val = $exist['estm_time'][$n] * $days[$exist['estm_time_type'][$n]];
					 ?>
						<tr> 
							 <td class="serial"> <span class="badge badge-info"> <?php echo ($n+1); ?> </span> </td>
							 <td style="over-flow:text-wrap;"> <?php echo $name ?> </td>
							 <td> <input style="width:150px;" class="form-control border border-info item-specimen" value="<?php echo $exist['specimen_sample'][$n]; ?>" /></td>
							 <td> <?php echo  "&#8358; ".number_format($exist['price'][$n]); ?> </td>
							 <td> <button onclick="add_this_specimen($(this).attr('data-text'),$(this).closest('tr').find('input.item-specimen'))" data-text="<?php echo $exist['sn'][$n];  ?>" type="button" class="btn btn-outline-info btn-sm ladda-button " data-style="zoom-in" > Add &nbsp;<i class="fa fa-plus"></i> </button> </td>
						</tr> 					 
					 <?php $n++; }
				?> </tbody></table> </div>
				<?php } 
				else { ?>
					<div class="col-md-12 alert alert-warning"> No Bill has been Setup for <?php echo $categ_info['name'][0]; ?> : <a href='billingsys.php' target='_blank'> click here to setup </a>  </div>
				<?php }
		}
		/**************************************************************/
		  	
		/**********************************************************************/
		if(isset($_POST['display_bill_ticket_searched'])){		$dbm = new DbTool(); 	 
			$serial = $dbm->clean($_POST['serial']); # $categ_id = $dbm->clean($_POST['categ_id']);
			 $exist = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('categ_id','dept_id','sn','name','specimen_sample','price','estm_time','estm_time_type'));
			# $exist = $dbm->getFields($dbm->select('bill_types',array('categ_id'=>$categ_id,'dept_id'=>$dept_id,'status'=>'active')),array('sn','name','specimen_sample','price','estm_time','estm_time_type'));
			 #$categ_info = $dbm->getFields($dbm->select('bill_category',array('sn'=>$exist['categ_id'][0],'status'=>'active')),array('sn','name','dept_id'));
			 $categ_info = @$dbm->select('bill_category',array('sn'=>$exist['categ_id'][0],'status'=>'active'));
				 if(!is_null($exist)){   $categ_info = $dbm->getFields( $categ_info,array('sn','name','dept_id'));
					 $n = 0;  $days = array(0,60,3600,86400,604800,2419200); ?>
					<div class="col-md-12">
					<table class="table table-nogap jambo_table"><tbody>					 
					 <p class="text-center text-capitalize bold"> <?php echo $categ_info['name'][0]. " <small> ( filtered ) </small> "; ?> </p>
					 <tr class="bold table-info"> <td> SN</td> <td> Bill </td> <td> Specimen Sample </td> <td> Price </td> <td> Action </td> </tr>
					 <?php foreach( $exist['name'] as $name){ 
						$val = $exist['estm_time'][$n] * $days[$exist['estm_time_type'][$n]];
					 ?>
						<tr> 
							 <td class="serial"> <span class="badge badge-info"> <?php echo ($n+1); ?> </span> </td>
							 <td style="over-flow:text-wrap;"> <?php echo $name ?> </td>
							 <td> <input style="width:150px;" class="form-control border border-info item-specimen" value="<?php echo $exist['specimen_sample'][$n]; ?>" /></td>
							 <td> <?php echo  "&#8358; ".number_format($exist['price'][$n]); ?> </td>
							 <td> <button onclick="add_this_specimen($(this).attr('data-text'),$(this).closest('tr').find('input.item-specimen'))" data-text="<?php echo $exist['sn'][$n];  ?>" type="button" class="btn btn-outline-info btn-sm ladda-button " data-style="zoom-in" > Add &nbsp;<i class="fa fa-plus"></i> </button> </td>
						</tr> 					 
					 <?php $n++; }
				?> </tbody></table> </div>
				<?php } 
				else { ?>
					<div class="col-md-12 alert alert-warning"> No Bill has been Setup for <?php echo $serial."  ".@$categ_info['name'][0]; ?> : <a href='billingsys.php' target='_blank'> click here to setup </a>  </div>
				<?php }
		}
		/**************************************************************/
		
		/*********** CUSTOMER BUYING BLOOD  --  SEARCH AVAILABLE ONES  *********************************/
		if(isset($_POST['show_available_blood'])){  $mydbm = new DBController();  
			
			$now = Carbon::now(); 
			# print "<pre>";
			$bloods = $mydbm->runBaseQuery("select blood_type_id, count(blood_type_id) as total from blood_stocks where transaction_status='donated' and sold='no' and expiry_date > '".$now."' group by blood_type_id ");
			
			# print_r($bloods);  exit; 

			 if(!empty($bloods)):  
					 $n = 0;    ?>
					<div class="col-md-12">
					<table class="table table-nogap jambo_table"><tbody>					 
					 <p class="text-center text-capitalize bold"> <?php   echo count($bloods) . " blood types found "; ?> </p>
					 <tr class="bold table-info"> <td> SN</td> <td> Blood Type </td> <td> Total </td> <td> Unit Price </td>  <td> Qty Buying </td>  <td> Action </td> </tr>
					 <?php foreach( $bloods as $k=>$v) :	
					 	# search blood type info 
					 	$blood_info = $mydbm->runbaseQuery("select id,name,price from blood_types where id='".$v['blood_type_id']."'");
					 ?>
						<tr> 
							 <td class="serial"> <span class=""> <?php echo ($n+1); ?> </span> </td>
							 <td> <?php echo $blood_info[0]['name']; ?> </td> 
							  <td> <?php echo $v['total'] ?> </td> 
							  <td> <?php echo  "&#8358; ".number_format($blood_info[0]['price']); ?> </td>
							  <td><input type="number" min="1" max="<?php echo $v['total'] ?>" class="form-control" value="1" /> </td>
							 <td> <button onclick="buy_this_blood($(this).attr('data-text'), $(this).closest('tr').find('input[type=number]').val())" data-text="<?php echo $v['blood_type_id']; ?>" type="button" class="btn btn-outline-info btn-sm ladda-button " data-style="zoom-in" > Add &nbsp;<i class="fa fa-plus"></i> </button> </td>
						</tr> 					 
					 <?php  $n++; endforeach; 
				?> </tbody></table> </div>
				<?php 
				else: ?>
					<div class="col-md-12 alert alert-warning mt-5"> No Blood is Available In Stock  </div>
				<?php endif; 
		}
		/**************************************************************/
		

		/***********  -  SEARCH AVAILABLE ONES  *********************************/
		if(isset($_POST['show_available_blood_for_sale'])){  $mydbm = new DBController();  
			
			$now = Carbon::now(); 
			# print "<pre>";
			$bloods = $mydbm->runBaseQuery("select blood_type_id, count(blood_type_id) as total from blood_stocks where transaction_status='donated' and sold='no' and expiry_date > '".$now."' group by blood_type_id ");
			
			# print_r($bloods);  exit; 

			 if(!empty($bloods)):  
					 $n = 0;    ?>
					<div class="col-md-12">
					<table class="table table-nogap jambo_table"><tbody>					 
					 <p class="text-center text-capitalize bold"> <?php   echo count($bloods) . " blood types found "; ?> </p>
					 <tr class="bold table-info"> <td> SN</td> <td> Blood Type </td> <td> Total </td> <td> Unit Price </td>  <td> Qty Buying </td>  <td> Action </td> </tr>
					 <?php foreach( $bloods as $k=>$v) :	
					 	# search blood type info 
					 	$blood_info = $mydbm->runbaseQuery("select id,name,price from blood_types where id='".$v['blood_type_id']."'");
					 ?>
						<tr> 
							 <td class="serial"> <span class=""> <?php echo ($n+1); ?> </span> </td>
							 <td> <?php echo $blood_info[0]['name']; ?> </td> 
							  <td> <?php echo $v['total'] ?> </td> 
							  <td> <?php echo  "&#8358; ".number_format($blood_info[0]['price']); ?> </td>							  
							 <td> <a href="newschedule.php"  class="btn btn-outline-info btn-sm ladda-button "  > Sell  &nbsp;<i class="fa fa-shopping-cart"></i> </a> </td>
						</tr> 					 
					 <?php  $n++; endforeach; 
				?> </tbody></table> </div>
				<?php 
				else: ?>
					<div class="col-md-12 alert alert-warning mt-5"> No Blood is Available In Stock  </div>
				<?php endif; 
		}
		 
		/*************** CREATING NEW PATIENT PROFILE  **********************************/
		/**  save_new_patient_profile_1:"new", surname:$('#surname').val(),
							othername:$('#othername').val(),age:$('#age').val(),
							sex:$('#sex').val(), mode:mode,ticket_no:ticket_no  **/
		 /********************************************************** *****************/
		 if(isset($_POST['save_new_patient_profile_1'])){ 
			$title = $dbm->clean($_POST['title']); $surname = $dbm->clean($_POST['surname']);
			$othername = $dbm->clean($_POST['othername']); 
			$sex = $dbm->clean($_POST['sex']); $age = $dbm->clean($_POST['age']); 
			$hosp_no = $dbm->clean($_POST['hosp_no']); $mode = $dbm->clean($_POST['mode']); 
			// 	echo json_encode(array('icon'=>'error','text'=>'please wait while we process your record','title'=>'Busy at the moment'));
			/*********************************/
				$fullname = $title." ".$surname." ".$othername; 
				$data = array('title'=>$title,'surname'=>$surname,'othername'=>$othername,'fullname'=>$fullname,'age_text'=>$age, /**'age_type'=>$age_type,**/
					'sex'=>$sex);
			
				$updData = array('title'=>$title,'surname'=>$surname,'othername'=>$othername,'fullname'=>$fullname,'age_text'=>$age,/**'age_type'=>$age_type,**/
					'sex'=>$sex);
			switch($mode){
				case "new":{					
					$exist = $dbm->getFields($dbm->select('patients',array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active')),array('sn','surname','othername'));
					 if(!is_null($exist)){
						 $newdata = array('date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600)); 
						$dbm->updateTb('patients',array_merge($newdata,$data),array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'));
						$msg = 'New Customer Profile Successfully Updated ';
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>' Profile Updated '));
					}
					else {
						$newdata = array('c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600)); 
						$dbm->insert('patients',array_merge($newdata,$data));
						$msg = "New Customer Profile Successfully Created ";
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>' Profile Created!'));
					}			
				} break; 
				case "update": {
					$exist = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$hosp_no,'finalized'=>'yes','status'=>'active')),array('sn','surname','othername','fullname'));
					 if(!is_null($exist)){
						$dbm->updateTb('patients',$updData,array('hosp_no'=>$hosp_no,'finalized'=>'yes','status'=>'active'));
						$msg = $exist['fullname'][0].'  Profile Successfully Updated ';
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>$hosp_no.' Profile Updated '));
					}
					else {
						 echo json_encode(array('icon'=>'error','text'=>'Cannot Update Now, Please Try again' ,'title'=>"Error Updating Profile 1 - $hosp_no"));
					}	
					
				} break; 
			} // end switch 
		}
		/************************ save_new_patient_profile_2:"new", dob:$('#dob').val(),
							contact_address:$('#contact_address').val(),phone:$('#phone').val(),
							email:$('#email').val(), mode:mode,hosp_no:hosp_no 
		/********************************************************** *****************/
		 if(isset($_POST['save_new_patient_profile_2'])){ 
			$dob = $dbm->clean($_POST['dob']); $contact_address = $dbm->clean($_POST['contact_address']);
			$phone = $dbm->clean($_POST['phone']);  $email = $dbm->clean($_POST['email']);  
			$hosp_no = $dbm->clean($_POST['hosp_no']); $mode = $dbm->clean($_POST['mode']); 
			// 	echo json_encode(array('icon'=>'error','text'=>'please wait while we process your record','title'=>'Busy at the moment'));
			/*********************************/
			  $data = array('dob'=>$dob,'contact_address'=>$contact_address,'phone'=>$phone,
			  'email'=>$email); 
			 
			  $updData = array('dob'=>$dob,'contact_address'=>$contact_address,'phone'=>$phone,
			  'email'=>$email);
			 
			 switch($mode){
				case "new":{					
					$exist = $dbm->getFields($dbm->select('patients',array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active')),array('sn','surname','othername'));
					 if(!is_null($exist)){
						 $newdata = array('date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600)); 
						$dbm->updateTb('patients',array_merge($newdata,$data),array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'));
						$msg = 'New Customer Profile 2 Successfully Updated ';
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>' Profile 2 Updated '));
					}
					else {
						$newdata = array('c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600)); 
						$dbm->insert('patients',array_merge($newdata,$data));
						$msg = "New Customer Profile Successfully Created ";
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>' Profile 2 Created!'));
					}			
				} break; 
				case "update": {
					$exist = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$hosp_no,'finalized'=>'yes','status'=>'active')),array('sn','surname','othername','fullname'));
					 if(!is_null($exist)){
						$dbm->updateTb('patients',$updData,array('hosp_no'=>$hosp_no,'finalized'=>'yes','status'=>'active'));
						$msg = $exist['fullname'][0].'  Profile Successfully Updated ';
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>$hosp_no.' Profile Updated '));
					}
					else {
						 echo json_encode(array('icon'=>'error','text'=>'Cannot Update Now, Please Try again' ,'title'=>"Error Updating Profile 2 - $hosp_no"));
					}	 
				} break; 
			} // end switch 
		}
		/************************ 
		save_new_patient_profile_3:"new",  nhis:$('#nhis:radio:checked').val(),
                profile_type:$('#profile_type').val(), mode:mode,hosp_no:hosp_no 
		/********************************************************** *****************/
		 if(isset($_POST['save_new_patient_profile_3'])){ 
			$nhis = $dbm->clean($_POST['nhis']); $profile_type = $dbm->clean($_POST['profile_type']);
			$hosp_no = $dbm->clean($_POST['hosp_no']); $mode = $dbm->clean($_POST['mode']); 
			// 	echo json_encode(array('icon'=>'error','text'=>'please wait while we process your record','title'=>'Busy at the moment'));
			/*********************************/
			## capture passport
			$psp = $nfn = strtolower($hosp_no).'.jpg';
				 $newPath =  "images/users/".$nfn;
				 $psp_dir = "images/users/"; 
				 @rename("images/users/".$_SESSION['temp_img'],$newPath);
			##
			 $data = array('hosp_no'=>$hosp_no,'profile_type'=>$profile_type,'nhis'=>$nhis,'psp'=>$psp,'psp_dir'=>$psp_dir); 
			 
			  $updData = array('hosp_no'=>$hosp_no,'profile_type'=>$profile_type,'nhis'=>$nhis,'psp'=>$psp,'psp_dir'=>$psp_dir);
			 
			 switch($mode){
				case "new":{				
					$hosp_id_exist = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$hosp_no,'status'=>'active','finalized'=>'yes')),$mydal->TableFields('patients'));
					$exist = $dbm->getFields($dbm->select('patients',array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active')),$mydal->TableFields('patients'));
					# check if hosp_no exist before saving 
					if(!empty($hosp_id_exist)){
						 echo json_encode(array('icon'=>'error','text'=>$hosp_no.' already exists','title'=>" Duplicate Hospital Number"));
					} 
					else{
						if(!is_null($exist)){
						
						if($exist['surname'][0]!="" && $exist['othername'][0]!=""  && $exist['sex'][0]!=""  && $exist['hosp_no'][0]!="") { $finalized = "yes"; } else { $finalized = "no";   }
						
						 $newdata = array('date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600),'finalized'=>$finalized); 
						 $dbm->updateTb('patients',array_merge($newdata,$data),array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'));
						 $msg = 'New Customer Profile 3 Successfully Updated ';
						 echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>" Profile 3 Updated ",'finalized'=>$finalized));
					}
					else {
						if($exist['surname'][0]!="" && $exist['othername'][0]!="" && $exist['sex'][0]!=""  && $exist['hosp_no'][0]!="") { $finalized = "yes"; } else { $finalized = "no";   }
						$newdata = array('c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600),'finalized'=>$finalized); 
						$dbm->insert('patients',array_merge($newdata,$data));
						$msg = "New Customer Profile Successfully Created ";
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>' Profile3 Created!','finalized'=>$finalized));
					}
					
					}
								
				} break; 
				case "update": {
					$exist = $dbm->getFields($dbm->select('patients',array('hosp_no'=>$hosp_no,'finalized'=>'yes','status'=>'active')),$mydal->TableFields('patients'));
					 if(!is_null($exist)){
						$dbm->updateTb('patients',$updData,array('hosp_no'=>$hosp_no,'finalized'=>'yes','status'=>'active'));
						$msg = $exist['fullname'][0].'  Profile Successfully Updated ';
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>$hosp_no.' Profile Updated '));
					}
					else {
						 echo json_encode(array('icon'=>'error','text'=>'Cannot Update Now, Please Try again' ,'title'=>"Error Updating Profile - $hosp_no"));
					}	 
				} break; 
			} // end switch 
		}
		/************************/ 
		
		########### to display all registerred patients  
		if(isset($_POST['getPatient'])){ 
			 
			$start = $dbm->clean($_POST['start']); 
			$limit =  $dbm->clean($_POST['limit']);  
			$criteria =  $dbm->clean($_POST['criteria']);  
		    $_SESSION['reqType'] = $reqType =  $dbm->clean($_POST['reqType']);  // default | search
			##############
			if($_SESSION['reqType'] =="search" && $_SESSION['criteria']!=$criteria) {   $start = 0; $limit = 100; unset($_SESSION['start']); }
			 
		 	if(!isset($_SESSION['start'])) {
				$_SESSION['start'] = $start;
				$_SESSION['criteria']=$criteria;
				showPatients($start,$limit,$criteria,$reqType);
			} 
			else if($_SESSION['start']==$start) exit(json_encode(array('next'=>($start + $limit),'response'=>'the same ')));
			
			else {
				$_SESSION['start'] = $start; 
				showPatients($start,$limit,$criteria,$reqType);
			} 
		}
   
		function showPatients($start,$limit,$criteria = "",$reqType="default"){ 	
			$dbm = new DbTool(); 
			$mydbm = new DBController(); 
			$mydal = new DAL(); 
			$next = $start + $limit; 
			$n = $start; 
			######################
		
		if($reqType == "default") { 
			$sql = $mydbm->runBaseQuery("SELECT * FROM patients order by date_c DESC LIMIT $start, $limit");  #0,100
			$found = $mydbm->runBaseQuery("SELECT * FROM patients order by date_c DESC "); 
		}
		else if($reqType == "search"){
			$sql = $mydbm->runBaseQuery("SELECT * FROM patients WHERE fullname REGEXP '".$criteria."' or dob REGEXP '".$criteria."' or state REGEXP '".$criteria."'  or lga REGEXP '".$criteria."' or phone REGEXP '".$criteria."' or sex REGEXP '".$criteria."'  or hosp_no REGEXP '".$criteria."' or contact_address REGEXP '".$criteria."' or nokname REGEXP '".$criteria."'  or nokphone REGEXP '".$criteria."'  order by date_c DESC LIMIT $start, $limit ");
			$found = $mydbm->runBaseQuery("SELECT * FROM patients WHERE fullname REGEXP '".$criteria."' or dob REGEXP '".$criteria."' or state REGEXP '".$criteria."'  or lga REGEXP '".$criteria."' or phone REGEXP '".$criteria."' or sex REGEXP '".$criteria."'  or hosp_no REGEXP '".$criteria."' or contact_address REGEXP '".$criteria."' or nokname REGEXP '".$criteria."'  or nokphone REGEXP '".$criteria."'  order by date_c DESC ");
		}
		
		if (!empty($sql)) { $i = 0; 
			$response = ""; $found = $dbm->getFields($found,$mydal->TableFields('patients'));
			$data = $dbm->getFields($sql,$mydal->TableFields('patients'));
			foreach($data['hosp_no'] as $hosp_no){
			#while($data = $sql->fetch_array()) { $n++;
				$pic_source = (file_exists($data['psp_dir'][$i].''.$data['psp'][$i]))?$data['psp_dir'][$i]."".$data['psp'][$i]:"images/users/default-user.png";
				 $editor = "patient_profile.php?md=".base64_encode('update')."&tp=".base64_encode('host')."&r_val=".base64_encode($data['hosp_no'][$i]);
				 $new_med_record = "medical_task_reports.php?n=".base64_encode($data['fullname'][$i])."&mctg=".base64_encode($data['profile_type'][$i])."&tp=".base64_encode('host')."&hn=".base64_encode($data['hosp_no'][$i])."&db=".base64_encode($data['dob'][$i])."&dtc=".base64_encode($data['date_c'][$i])."&mode=".base64_encode('new');
				 $addNewSib = "add_sibling_interface.php?refn=".base64_encode($data['hosp_no'][$i])."&nm=".base64_encode($data['fullname'][$i])."&mode=".base64_encode('new');
				#$reg_slip = "reg_slip.php?n=".base64_encode($data['fullname'][$i])."&tp=".base64_encode($data['profile_type'][$i]." [ host ]")."&hn=".base64_encode($data['hosp_no'][$i])."&db=".base64_encode($data['dob'][$i])."&dtc=".base64_encode($data['date_c'][$i]);
				# $mysibs = $mydbm->runBaseQuery("SELECT * FROM patients_siblings WHERE  ref_no='".$data['hosp_no']."'");
				# $totsib = $mysibs->num_rows;
						
				/** $all_siblings = ""; 
				if($totsib > 0){  
					while($data2 = $mysibs->fetch_array()){
						$hsp_report2 = $conn->query("SELECT * FROM tickets_converse WHERE ref_no='".$data2['ref_no']."' and type='".$data2['type']."'");
						$hsp_report_count2 = $hsp_report2->num_rows;
						$new_med_record2 = "medical_task_reports.php?n=".base64_encode($data2['fullname'])."&mctg=".base64_encode($data2['category'])."&tp=".base64_encode($data2['type'])."&hn=".base64_encode($data2['ref_no'])."&db=".base64_encode($data2['dob'])."&dtc=".base64_encode($data2['date_c'])."&mode=".base64_encode('new');
						$sib_editor = "add_sibling_interface.php?refn=".base64_encode($data['hosp_no'])."&nm=".base64_encode($data['fullname'])."&mode=".base64_encode('update')."&sun=".base64_encode($data2['sn']);
						$all_siblings.='
						 <p><span class="text-black font-14 bold">'.'<span class="badge badge-success font-13">'.$data2['type'].' : </span> 
						 &nbsp; <a href='.$sib_editor.' title="update sibling "   > <span class="fa fa-edit text-warning"></span> </a> &nbsp;  '.$data2['fullname'].' </span>  &nbsp;  <span class="fa fa-male text-success"></span> &nbsp;'.$data2['gender'].'&nbsp;&nbsp;    <span class="fa fa-calendar text-info"></span> &nbsp;'.$data2['dob'].'
						'.'&nbsp;&nbsp;<span class="fa fa-phone text-info"></span> &nbsp;'.$data2['phone'].'&nbsp;&nbsp; <a href='.$new_med_record2.' target="_blank"><i class="fa fa-medkit font-22 text-success" style=""></i></a></p>';
					}
				}
				**/
				  
				$response .= '
				<span class="badge badge-info badge-block font-16"> '. ($i+1).'&nbsp;<i class="icon-arrow-right"></i> </span>
				 <div class="row"> 
					<div class="col-md-12">						
						<div class="card">							
							<div class="card-body">
								<div class="col-md-2 col-sm-4" style="float:left;">
									<img class="img rounded-square " src='.$pic_source.' style="min-height:90px; height:auto; max-height:140px; width:auto; max-width:98%;  border:6px solid #DDD; -webkit-border:6px solid #DDD;; -moz-border:6px solid #DDD;;" />
								 </div><!-- col-md-1 -->
							
								<div class="col-md-10 col-sm-8" style="float:left;">
									<h4> <a href='.$editor.' target="_blank"> <i class="fa fa-edit text-warning pointer"> </i> </a> &nbsp; <!-- <i class="fa fa-trash text-danger pointer"></i>--> &nbsp;'.$data['fullname'][$i].' :&nbsp; <span class="h6 bold text-info"> '.$data['hosp_no'][$i]. ' :: '.$data['profile_type'][$i].' ( '.$data['type'][$i].' )  </span> '.
									'&nbsp;&nbsp;&nbsp;<span class="font-16"><i class="fa fa-phone"></i>&nbsp;'.$data['phone'][$i].
									'&nbsp;&nbsp;&nbsp;<span class="font-16"><i class="fa fa-map-marker"></i>&nbsp;'.$data['contact_address'][$i].  
									',&nbsp;&nbsp;  <i class="fa fa-calendar"></i> '.$data['age_text'][$i].'&nbsp;&nbsp; <a href='.$new_med_record.' target="_blank" title="View Medical Reports"><i class="fa fa-medkit font-22"></i></a>&nbsp;Visits 
									<br/><b>Next of Kin: </b>'.$data['nokname'][$i].'&nbsp; (<b>'.$data['nokrelationship'][$i].'</b>)&nbsp; <span class="fa fa-phone"></span>&nbsp;'.$data['nokphone'][$i].'
									'.
									' </h4><hr/> <span class="h5 bold"> Siblings: <label class="badge badge-success">'.$totsib.'</label> &nbsp; <a target="_blank" href='.$addNewSib.' title="add more sibling " class="text-black bold"><i class="icon-user-follow"></i></a> '.$all_siblings.' </span>'.
									'<p class="text-muted"> <i> created by : '.$data['c_by'][$i].', &nbsp; on '. $data['date_c'][$i].'   &nbsp;  : '.date('h:s A',$data['time_c'][$i]).' </i></p>
								</div> <!-- col-md-10 --> 
							
							</div> <!-- card-body -->							
						</div> <!-- card -->
					</div> <!-- col-md-12 -->
				</div> <!-- row -->				  
				';
			 /** **/
			$i++; } // end foreach # while 	
			######################
			
			$result  = array('next'=>$next,'response'=>$response,'found'=>empty($found)?20:count($found['hosp_no']));
			exit(json_encode($result)); 		 
		} else
				exit(json_encode(array('next'=>$next,'response'=>'nothing found','found'=>empty($found)?50:count($found['hosp_no']))));
		}	   
	#################
		/********************************************************/
		##############################################		 
		if(isset($_POST['load_sibling_types'])){  		
					$dbm = new DbTool(); 			 
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
			$ref_no = $dbm->clean($_POST['ref']);  
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
					$hosp_no = $dbm->clean($_POST['ref']); 
					$mode = $dbm->clean($_POST['mode']); 
					
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
		
		
		/*************** CREATING TICKET FOR CUSTOMER **********************************/
		/** save_new_customer_request:"new", surname:$('#surname').val(),
                  *  othername:$('#othername').val(),age:$('#age').val(),  age_type:$('#age_type').val(),
                  *  sex:$('#sex').val(),doctor:$('#doctor').val(),hospital:$('#hospital').val(),consultant:$('#consultant').val(),
                 * customer_id:$('#customer_id').val(),customer_type:$('#customer_type').val(),
                  *  mode:mode,ticket_no:ticket_no**/
		/**************************************************************/
		if(isset($_POST['save_new_customer_request'])){		$dbm = new DbTool(); 	 
			$surname = $dbm->clean($_POST['surname']); $othername = $dbm->clean($_POST['othername']); $phone = $dbm->clean($_POST['phone']);
			$sex = $dbm->clean($_POST['sex']); $age = $dbm->clean($_POST['age']); $age_type =  ""; ##$dbm->clean($_POST['age_type']);	
			$doctor = $dbm->clean($_POST['doctor']); $hospital = $dbm->clean($_POST['hospital']); $consultant = $dbm->clean($_POST['consultant']);	
			$ticket_no = $dbm->clean($_POST['ticket_no']); $mode = $dbm->clean($_POST['mode']); 
			$clinical_details = $dbm->clean($_POST['clinical_details']);
			$customer_id = $dbm->clean($_POST['customer_id']);
			$customer_type = $dbm->clean($_POST['customer_type']);
			// 	echo json_encode(array('icon'=>'error','text'=>'please wait while we process your record','title'=>'Busy at the moment'));
			/*********************************/
				$fullname = $surname." ".$othername; 
				$ticket_data = array('surname'=>$surname,'othername'=>$othername,'fullname'=>$fullname,'age_text'=>$age, 'customer_id'=>$customer_id,
					'sex'=>$sex,'phone'=>$phone,'doctor'=>$doctor,'hospital'=>$hospital,'consultant'=>$consultant,'clinical_details'=>$clinical_details);
                                
                $updData = array('surname'=>$surname,'othername'=>$othername,'fullname'=>$fullname,'age_text'=>$age,'customer_id'=>$customer_id,
					'sex'=>$sex,'phone'=>$phone,'doctor'=>$doctor,'hospital'=>$hospital,'consultant'=>$consultant,'clinical_details'=>$clinical_details);
			switch($mode){
				case "new":{	
					if($customer_id==""):
							$new_customer_id = get_custom_id();
							$dbm->insert('customer_info',['id'=>$new_customer_id,'surname'=>$surname,'othername'=>$othername,'fullname'=>$fullname,'sex'=>$sex,'phone'=>$phone,'hospital'=>$hospital,'dob'=>$age]);
							$saving_query = ['customer_id'=>$new_customer_id,'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];					

						else :
							$saving_query = ['customer_id'=>$customer_id,
								'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
						endif; 

					$exist = $dbm->getFields($dbm->select('customer_tickets',$saving_query),array('sn','surname','othername','customer_id'));
					 if(!is_null($exist)){
						$dbm->updateTb('customer_tickets',$ticket_data,$saving_query);
						$msg = 'New Customer Profile Successfully Updated ';
						echo json_encode(array('icon'=>'success','customer_id'=>$exist['customer_id'][0],'text'=>$msg,'title'=>' Profile Updated '));
					}
					else {						
						$newdata = array_merge($ticket_data,['c_by'=>$_SESSION['admUser'],'date_c'=>Carbon::now()], $saving_query); 
						# print "<pre>";
						#	print_r($newdata);
					    $dbm->insert('customer_tickets',$newdata);
						$msg = "New Customer Profile Successfully Created ";
						echo json_encode(array('icon'=>'success','customer_id'=>$newdata['customer_id'],'text'=>$msg,'title'=>' Profile Created!'));
					}			
				} break; 
				case "update": {
					$exist = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active','process_completed'=>'no')),array('sn','surname','othername','fullname'));
					 if(!is_null($exist)){
						$dbm->updateTb('customer_tickets',$updData,array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active','process_completed'=>'no'));
						$msg = $exist['fullname'][0].'  Profile Successfully Updated ';
						echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>$ticket_no.' Profile Updated '));
					}
					else {
						 echo json_encode(array('icon'=>'error','text'=>'Cannot Update Now, Please Try again' ,'title'=>'Error Updating Profile'));
					}	
					
				} break; 
			} // end switch 
		}
		/************************ 
		
/******* ADDING BLOOD FOR PURCHASE **************/
			##  buy_this_blood:'all',serial:serial,
		if(isset($_POST['buy_this_blood'])){ $dbm = new DbTool(); $mydbm = new DBController(); 
			/*******   *******/
			$serial = $dbm->clean($_POST['serial']); # blood_type_id
			$customer_id = $dbm->clean($_POST['customer_id']);
			$qty = $dbm->clean($_POST['qty']); 

			$price = $dbm->select('blood_stocks',array('id'=>$serial)); 
			$now = Carbon::now(); 
			## print "<pre>"; 
			$ticket_query = ['customer_id'=>$customer_id, 'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 
			$custom_ticket_id = $dbm->select('customer_tickets',$ticket_query);

			$specimen_query = ['customer_id'=>$customer_id, 'custom_ticket_id'=>$custom_ticket_id[0]['sn'], 'order_type'=>'buy_blood','c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
			$available_bloods = $mydbm->runBaseQuery("select blood_type_id, count(blood_type_id) as total from blood_stocks where transaction_status='donated' and blood_type_id='".$serial."' and sold='no' and expiry_date > '".$now."' group by blood_type_id ");
			
			# print_r ($available_bloods);  exit; 

			if($qty >  $available_bloods[0]['total'] ) :
				echo json_encode(array('icon'=>'error','text'=>'We dont have up to the amount you are requesting','title'=>'Out of Stock!'));
			else :
				$all_bloods = $mydbm->runBaseQuery("select id, blood_type_id, expiry_date from blood_stocks where transaction_status='donated' and blood_type_id='".$serial."' and status='active' and sold='no' and expiry_date > '".$now."' ");
				$blood_price = $mydbm->runBaseQuery("select price from blood_types where id='".$serial."'");
				for($i=0; $i < $qty; $i++) : ## for quantity of blood purchasing : pick one by one in stock
					$spec_data = array_merge($specimen_query, ['blood_stock_id'=>$all_bloods[$i]['id'],'blood_type_id'=>$serial,'qty'=>1,'bill_price'=>$blood_price[0]['price']]); 
					$stock_upd_data = ['transaction_status'=>'onsale','sold_to'=>$customer_id,'sold_by'=>$_SESSION['admUser'],'date_sold'=>Carbon::now()];
					# save to specimen record - and update stock 
					$dbm->insert('customer_specimen',$spec_data); 
					$dbm->updateTb('blood_stocks',$stock_upd_data,['id'=>$all_bloods[$i]['id']]);

					# print_r ($spec_data); print_r($stock_upd_data);
				endfor;
				# print_r ($all_bloods);  exit; 
				echo json_encode(array('icon'=>'success','text'=>'You have successfully make an order to buy blood','title'=>'Order Submitted!'));		 
			endif;


 			
			/**************** *****************/
		}
		
		## start_blood_donation
			##  buy_this_blood:'all',serial:serial,
		if(isset($_POST['start_blood_donation'])){	 $dbm = new DbTool(); $mydbm = new DBController(); 
			$customer_id = $dbm->clean($_POST['customer_id']);
			$customer_info = $mydbm->runBaseQuery("select id, fullname, blood_type_id,last_donation_date from customer_info where id='".$customer_id."'");
				# print_r($customer_info); exit ; 
      		$donation_counts = $mydbm->runBaseQuery("select count(*) as total from customer_specimen where customer_id='".$customer_id."' and order_type='donate_blood' and status='active'"); 
      		$qualified = true;
			?>
			 <p class="text-center bold "><?php echo "#".$customer_info[0]['id']." - ".$customer_info[0]['fullname']; ?> &nbsp; :  &nbsp;  Blood Donation  </p> 
			 <div class="col-md-12 mt-3 pt-1" style="float:left;">
			 	<table class="table jambo_table">
			 		<tr>
			 			<td class="bold"> Total Donation: &nbsp; <?php echo $donation_counts[0]['total']; ?></td>
			 			<td class="bold">Last Donation : <?php 
			 				if($donation_counts[0]['total'] > 0) : echo 
			 				Carbon::parse($customer_info[0]['last_donation_date'])->diffForHumans();
			 				else: echo "--:--"; endif; 
			 				 ?></td>
			 		</tr>
			 		<tr>
			 			<td class="bold"> Qualified To Donate : </td>			 			
			 			<td> <?php 
			 					if($donation_counts[0]['total'] > 0) : 
			 						if(Carbon::now() <  Carbon::parse($customer_info[0]['last_donation_date'])->addMonths(3)): 
			 							$qualified = false; 
			 							echo "<span class='badge badge-danger font-16'> Not Qualified  <i class='fa fa-times'></i> </span> "; 
			 							echo " <br/> <br/> <p class='badge badge-outline-info font-16'>Next Donation Date : ".Carbon::parse($customer_info[0]['last_donation_date'])->addMonths(3) ."</p>" ;
			 						else:
			 							echo "<span class='badge badge-success font-16'> Qualified  <i class='fa fa-check'></i> </span> "; 
			 						endif; 
			 					else :
			 						echo "<span class='badge badge-success font-16'> Qualified  <i class='fa fa-check'></i> </span> "; 
			 					endif;

			 			  ?> </td>
			 		</tr>
			 	</table> 
			 </div>
			 
			 <?php if($qualified) : ?> 
               <div class="form-group form-row  font-weight-bold">                  	             
               <table class="table table-bordered table-sm table-nogap">
               	<tr>
               		<th class="w-30">Expected Blood Type?</th>
               		<td >
               			<div class="form-group">
               				<select class="form-control font-20" name="blood_type" id="blood_type" style="height:40px;">
               					<optgtoup label="Selet Blood Type">
               						<option value="">...</option>
           						 <?php $blood_types = $dbm->select('blood_types',['']);  
									if(!empty($blood_types)):
										foreach($blood_types as $blood_type) :   ?>
					                      <option value="<?php echo $blood_type['id'];?>" <?php echo ($blood_type['id']==$customer_info[0]['blood_type_id'])?" selected ":"" ?> class="form-control blood_type" > &nbsp; <?php echo $blood_type['name'];?> </label> </div>
					                   <?php endforeach; 
									endif; 
										?>	
               					</optgtoup>
               				</select>
               			</div>
               		</td>               		
               	</tr>
               	<tr>
               		<th> Date / Time Donated? </th>
               		<td>               			
                        <div class="input-group">
                           <input placeholder="Date Donated" required="" tabindex="" autofocus style="font-size:18px; height:45px; z-index:2999;" type="text" id="date_collected" name="date_collected" value="" class="form-control border-primary datetimepicker">                           
                        </div>                              
               		</td>
               	</tr>
               </table>
	          </div>

	           <div class="form-group row">          	 
                    <div class="col-sm-12 mt-2 pull-right">
                       <button onclick="save_blood_donation()" type="button" class="btn btn-lg btn-primary btn-block btn-rounded font-20" name="blood_donation" id="blood_donation">
                          Save Donation &nbsp; <span class="fa fa-login fa-2x"></span>
                       </button> 
                    </div>
                    <!-- ./ col-sm-12 -->
                 </div> 
	          </div>
			 <?php endif;?>               
			
		<?php }

		/** Finally saving the customer blood donation 
		 * **/
		if(isset($_POST['save_blood_donation'])){ $mydbm = new DBController(); $dbm =new DbTool();
			/* [save_blood_donation] => this [customer_id] => PPLI/0003 [date_collected] => 2024-11-04 [time_collected] => 06:33 [blood_type] => 2 */
			$customer_id = $dbm->clean($_POST['customer_id']);			 		
			$blood_type = $dbm->clean($_POST['blood_type']);
			$donation_date = Carbon::parse($_POST['date_collected']); 

			// print "<pre>"; 
		   // print_r($_POST); die; 
			# build query 
				if($customer_id==""):   
						$ticket_query = ['c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 
						$donation_query = ['order_type'=>'donate_blood','c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
					else :	
						$ticket_query = ['customer_id'=>$customer_id, 'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 
						$donation_query = ['customer_id'=>$customer_id, 'order_type'=>'donate_blood','c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
				endif;  
  			$custom_ticket_id = $dbm->select('customer_tickets',$ticket_query);
			$have_donated = $dbm->select('customer_specimen',$donation_query);
			
			# 
			# update -  $custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active')),$mydal->TableFields('customer_tickets'));
			# new - $custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active')),array('sn','surname','othername','customer_id'));
			$custom_ticket_id = $custom_ticket_id[0]['sn'];
			$spec_data = array('blood_type_id'=>$blood_type,'custom_ticket_id'=>$custom_ticket_id,'specimen_sample'=>'blood','bill_price'=>0,'date_c'=>Carbon::now(),'donation_date'=>$donation_date);
			
			if(empty($have_donated)){  # first time saving 
				$dbm->insert('customer_specimen',array_merge($spec_data,$donation_query));  ## ,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()),
				# $dbm->insert('donations',['donor_id'=>$customer_id,'blood_type_id'=>$blood_type,'donation_date'=>$donation_date,'c_by'=>$_SESSION['admUser']]);
				# echo json_encode(array('icon'=>'success','text'=>"Blood donation submited Successfully ",'title'=>'Donation  Submitted')); 
				echo "<div class='alert alert-success m-3 p-3'> Blood donation submited Successfully For Testing </div>";
			}
			else{
				$spec_data = array('blood_type_id'=>$blood_type,'date_upd'=>Carbon::now(),'donation_date'=>$donation_date);
			 	$don_data = ['donor_id'=>$customer_id,'donation_date'=>$donation_date,'c_by'=>$_SESSION['admUser']];
			 	
			 	$dbm->updateTb('customer_specimen',$spec_data,$donation_query);
			 	//$dbm->updateTb('donations',['blood_type_id'=>$blood_type],['donor_id'=>$customer_id,'c_by'=>$_SESSION['admUser']]);
			 	# echo json_encode(array('icon'=>'success','text'=>"Blood donation Updated Successfully ",'title'=>'Donation  Updated')); 
			 	echo "<div class='alert alert-success m-3 p-3'> Blood donation Updated Successfully For Testing </div>";
			}
 			
		}


		/******* ADDING SPECIMEN BROUGHT FORWARD **************/
			##  add_this_specimen:'all',serial:serial,sample
		if(isset($_POST['add_this_specimen'])){	 $dbm = new DbTool();
			/*******   *******/
			$serial = $dbm->clean($_POST['serial']); $specimen = $dbm->clean($_POST['sample']);
			$price = $dbm->select('bill_types',array('sn'=>$serial)); 
			$customer_id = $dbm->clean($_POST['customer_id']); 

			switch($_SESSION['ticket_mode']){
				case "update":{  
				$custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active')),$mydal->TableFields('customer_tickets'));
				if(!is_null($custom_ticket_id)) $custom_ticket_id = $dbm->resort($custom_ticket_id);
				$date_c = $custom_ticket_id['date_c'];
                $criterial = array('custom_ticket_id'=>$custom_ticket_id['sn'],'ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active'); 
				$data = array('order_type'=>'perform_test','bill_type_id'=>$serial,'bill_price'=>$price[0]['price'],'specimen_sample'=>$specimen,'custom_ticket_id'=>$custom_ticket_id['sn'],'ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','upd_by'=>$_SESSION['admUser'],'status'=>'active');
				$exist = $dbm->getFields($dbm->select('customer_specimen',$data),array('sn','bill_type_id','specimen_sample'));					
				### save  ###
					if(is_null($exist)){
						$dbm->insert('customer_specimen',array_merge($data,array('customer_id'=>$custom_ticket_id['customer_id'],'date_c'=>$date_c,'date_upd'=>Carbon::now(),'c_by'=>$_SESSION['admUser'])));  ## ,'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()),
						echo json_encode(array('icon'=>'success','text'=>" Your Specimen : [ $specimen ], successfully added for processing",'title'=>'Specimen Added Successfully'));
					 }else {
						echo json_encode(array('icon'=>'error','text'=>"This Specimen : [ $specimen ], is already on the list, but you can specify another name for it. ",'title'=>'Duplicate'));
						}
				} break; 
				case "new":{
				  	$search_query = ['customer_id'=>$customer_id, 'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 
					 
					 # print "<pre>"; 
					 # print_r($_POST); die; 					

					$custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',$search_query),['sn','surname','othername','customer_id']);
					if(!is_null($custom_ticket_id)) $custom_ticket_id = $dbm->resort($custom_ticket_id);
					$criterial = ['custom_ticket_id'=>$custom_ticket_id['sn'],'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 
					$data = ['order_type'=>'perform_test','bill_type_id'=>$serial,'bill_price'=>$price[0]['price'],'specimen_sample'=>$specimen,'custom_ticket_id'=>$custom_ticket_id['sn'],'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
					$exist = $dbm->getFields($dbm->select('customer_specimen',$data),array('sn','bill_type_id','specimen_sample'));					
					### save  ###
					if(is_null($exist)){
						$dbm->insert('customer_specimen',array_merge($data,array('customer_id'=>$custom_ticket_id['customer_id'],'date_c'=>Carbon::now())));  ## ,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()),
						echo json_encode(array('icon'=>'success','text'=>" Your Specimen : [ $specimen ], successfully added for processing",'title'=>$custom_ticket_id['customer_id'].' Specimen Added Successfully'));
					 }else {
						echo json_encode(array('icon'=>'error','text'=>"This Specimen : [ $specimen ], is already on the list, but you can specify another name for it. ",'title'=>'Duplicate'));
						}
					} break; 
			}# end switch 
			
			/*******   *******/
			## sorted out :  $custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active')),array('sn','surname','othername'));			
			## sorted out : if(!is_null($custom_ticket_id)) $custom_ticket_id = $dbm->resort($custom_ticket_id);
			## sorted out : $exist = $dbm->getFields($dbm->select('customer_specimen',$data),array('sn','bill_type_id','specimen_sample'));			 
			/**************** *****************/
		}
	
		/******* DISPLAY ALL PENDING SPECIMEN BROUGHT FORWARD **************/
			##  display_my_specimen:'all'
		if(isset($_POST['display_my_specimen'])){		$dbm = new DbTool(); 	 			
			$customer_id = $dbm->clean($_POST['customer_id']);
			# print "<pre>"; 
			# print_r($_POST); die; 
					

			switch($_SESSION['ticket_mode']){
				case "update":{  
				$custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active')),array('sn','surname','othername'));
				if(!is_null($custom_ticket_id)) $custom_ticket_id = $dbm->resort($custom_ticket_id);
				$criterial = array('custom_ticket_id'=>$custom_ticket_id['sn'],'ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active'); 
				$exist = $dbm->getFields($dbm->select('customer_specimen',$criterial),array('sn','bill_type_id','specimen_sample'));					
				} break; 

				case "new":{
					# build query 
					if(empty($customer_id)): 
						$donation_query = ['order_type'=>'donate_blood','c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
						$test_query = ['order_type'=>'perform_test','c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
						$buy_blood_query = ['order_type'=>'buy_blood', 'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];															
					 
					else:						 
						$donation_query = ['customer_id'=>$customer_id, 'order_type'=>'donate_blood',
							'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];
						
						$test_query = ['customer_id'=>$customer_id, 'order_type'=>'perform_test',
							'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];

						$buy_blood_query = ['customer_id'=>$customer_id, 'order_type'=>'buy_blood',
							'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active'];															
					endif; 

					## first show donation
					$donation_exist = @$dbm->select('customer_specimen',$donation_query);
					$test_exist = @$dbm->select('customer_specimen',$test_query);
					$buy_blood_exist  = @$dbm->select('customer_specimen',$buy_blood_query);

					// $custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('c_by'=>$_SESSION['admUser'],'customer_id'=>$customer_id,'finalized'=>'no','status'=>'active')),array('sn','surname','othername'));
					# if(!empty($custom_ticket_id)) $custom_ticket_id = @$dbm->resort($custom_ticket_id);
					/***/
					
					} break; 
			}# end switch 
			# print "<pre>";
			# print_r($donation_exist); exit; 
		
			echo "<hr/>";


			if(!empty($test_exist)){ ?>
				<center> <p class="badge badge-danger font-14 ml-3">Blood Tests </p></center>
				<table class="table table-nogap jambo_table ml-3 mr-3"><tbody>
				<tr class="bold text-capitalize font-12"><td> sn </td> <td> test type </td> <td> specimen type </td> <td> cost </td><td> manage </td> </tr>
				<?php $n = 0; $tcost = 0;  foreach($test_exist as $k=>$v){ 
					$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$v['bill_type_id'],'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
					$tcost += $bill_type['price'][0]; 
				?>
					<tr> 
						 <td class="serial"> <span class="badge badge-success"> <?php echo ($n+1); ?> </span> </td>
						 <td> <?php echo $bill_type['name'][0]; ?> </td>
						 <td> <span class=""> <?php echo $v['specimen_sample']; ?> </span> </td>
						 <td> <?php echo "&#8358; ".number_format($bill_type['price'][0]);  ?> </td>						
						 <td>
							<div class="btn-group border border-white">  								
								<button class="btn btn-sm btn-rounded btn-danger" onclick="del_customer_specimen($(this).attr('data-text'))" data-text="<?php echo "Blood Test - ". $v['specimen_sample']."|".$bill_type['name'][0]."|".$v['sn']; ?>"> <i class="fa fa-times"> </i> </button> 
						 </td>						
					</tr> 					 
					 <?php $n++; } # end foreach  ?> 
					 <tr class="bold"> 
						<td colspan="5" > Total Cost : <?php echo "&#8358; ".number_format($tcost); ?> </td>
					</tr>
					<tr>
					
					<td colspan="5" >  <!--   <p>&nbsp; </p><button class=" btn btn-info btn-lg btn-rounded ladda-button" data-style="zoom-in" onclick=" enableTab('stock-tab3'),showTab('stock-tab3'),display_my_final_specimen($('.final_specimen_form'));  "> Finalize Ticket &nbsp; <i class="fa fa-drivers-license-o "></i></button> --> </td>
					</tr>
				</tbody></table> 
			<?php  }  else { ?>
				 
				<div class="col-md-6 offset-3 text-center bold text-warning" > &nbsp; No Blood Test Carts </div>
			<?php }
			/*********************************/
			echo "<hr/>";

			if(!empty($donation_exist)){ ?>
				
				<center class="mt-3"> <span class="badge badge-success font-14 ml-3">Blood Donation </span> </center>
				<table class="table table-nogap jambo_table"><tbody>
				<tr class="  bold text-capitalize font-12"><td> sn </td> <td> Blood Type </td> <td> specimen type </td> <td> cost </td><td> manage </td> </tr>
				<?php $n = 0; $tcost = 0;  foreach($donation_exist as $k=>$v){ 
					$blood_type = $dbm->getFields($dbm->select('blood_types',array('id'=>$v['blood_type_id'])),array('id','name'));
					$tcost = 0; 
				?>
					<tr> 
						 <td class="serial"> <span class="badge badge-success"> <?php echo ($n+1); ?> </span> </td>
						 <td> <?php echo $blood_type['name'][0]; ?> </td>
						 <td> <span class=""> <?php echo $v['specimen_sample']; ?> </span> </td>
						 <td> <?php echo "&#8358; ".number_format(0);  ?> </td>						
						 <td>
							<div class="btn-group border border-white">  								
								<button class="btn btn-sm btn-rounded btn-danger" onclick="del_customer_specimen($(this).attr('data-text'))" data-text="<?php echo "Blood Donation - ". $v['specimen_sample']."|".$blood_type['name'][0]."|".$v['sn']; ?>"> <i class="fa fa-times"> </i> </button>
						 </td>						
					</tr> 					 
					 <?php $n++; } # end foreach  ?> 
					 <tr class="bold   "> 
						<td colspan="5" > Total Cost : <?php echo "&#8358; ".number_format($tcost); ?> </td>
					</tr>
					<tr>
					
					<td colspan="5" > <!-- <p>&nbsp; </p><button class=" btn btn-info btn-lg btn-rounded ladda-button" data-style="zoom-in" onclick=" enableTab('stock-tab3'),showTab('stock-tab3'),display_my_final_specimen($('.final_specimen_form'));  "> Finalize Ticket &nbsp; <i class="fa fa-drivers-license-o "></i></button> --> </td>
					</tr>
				</tbody></table> 
			<?php  }  else { ?>
				 
				<div class="col-md-6 offset-3 text-center bold text-warning" > &nbsp; No Blood Donation Carts </div>
			<?php }
			/*********************************/

			echo "<hr/>";

			if(!empty($buy_blood_exist)){ ?>
				<center> <p class="badge badge-danger font-14 ml-3">Blood Purchase </p></center>
				<table class="table table-nogap jambo_table ml-3 mr-3"><tbody>
				<tr class="bold text-capitalize font-12"><td> sn </td> <td> blood type </td> <td>Quantity </td> <td> Expiry Date </td>  <td> cost </td><td> manage </td> </tr>
				<?php $n = 0; $tcost = 0;   foreach($buy_blood_exist as $k=>$v){ 
					$blood_type = $mydbm->runBaseQuery("select name from blood_types where id='".$v['blood_type_id']."'");
					$blood_expiry = $mydbm->runBaseQuery("select expiry_date from blood_stocks where id='".$v['blood_stock_id']."'");
					$tcost += $v['bill_price']; 
				?>
					<tr> 
						 <td class="serial"> <span class="badge badge-success"> <?php echo ($n+1); ?> </span> </td>
						 <td> <?php echo $blood_type[0]['name']; ?> </td>
						 <td> <span class=""> <?php echo $v['qty']; ?> </span> </td>
						 <td> <?php echo Carbon::parse($blood_expiry[0]['expiry_date'])->diffForHumans();  ?> </td> 
						 <td> <?php echo "&#8358; ".number_format($v['bill_price']);  ?> </td> 
						 <td>
							<div class="btn-group border border-white">  								
								<button class="btn btn-sm btn-rounded btn-danger" onclick="del_customer_specimen($(this).attr('data-text'))" data-text="<?php echo "Blood Test - ". $v['specimen_sample']."|".$bill_type['name'][0]."|".$v['sn']; ?>"> <i class="fa fa-times"> </i> </button> 
						 </td>						
					</tr> 					 
					 <?php $n++; } # end foreach  ?> 
					 <tr class="bold"> 
						<td colspan="5" > Total Cost : <?php echo "&#8358; ".number_format($tcost); ?> </td>
					</tr>
					<tr>
					
					<td colspan="6" >  <!--   <p>&nbsp; </p><button class=" btn btn-info btn-lg btn-rounded ladda-button" data-style="zoom-in" onclick=" enableTab('stock-tab3'),showTab('stock-tab3'),display_my_final_specimen($('.final_specimen_form'));  "> Finalize Ticket &nbsp; <i class="fa fa-drivers-license-o "></i></button> --> </td>
					</tr>
				</tbody></table> 
			<?php  }  else { ?>
					
				<div class="col-md-6 offset-3 text-center bold text-warning" > &nbsp; No Blood Purchase </div>
			<?php }
			/*********************************/

			## show continue Button if there is operation to do 

			if(!empty($test_exist) || !empty($donation_exist) || !empty($buy_blood_exist)) : ?>
				<div  class="m-3"> <center>
					<button class=" btn btn-info btn-lg btn-rounded ladda-button" data-style="zoom-in" onclick=" enableTab('stock-tab3'),showTab('stock-tab3'),display_my_final_specimen($('.final_specimen_form'));  "> Finalize Ticket &nbsp; <i class="fa fa-drivers-license-o "></i></button> 
					</center> </div>
			<?php endif;

		}
		
		/******************************/
		## del_customer_specimen:"this",serial:infos[2], name:infos[0],btype:infos[1]
		if(isset($_POST['del_customer_specimen'])){		$dbm = new DbTool(); 	 
			$serial = $dbm->clean($_POST['serial']); $name = $dbm->clean($_POST['name']); $bill_type = $dbm->clean($_POST['btype']); 
			$exist = $dbm->getFields($dbm->select('customer_specimen',array('sn'=>$serial,'status'=>'active')),array('sn','bill_type_id','specimen_sample'));
			if(!is_null($exist)) {
				$dbm->updateTb("customer_specimen",array('status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time()-3600)),array('sn'=>$serial));
					echo json_encode(array('icon'=>'success','text'=>"$name under $bill_type has been successfully deleted ",'title'=>" $name Deleted "));
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Specimen Type matches your criterial ",'title'=>"Deleting Specimen Sample $serial"));			
			}
		}
		/**************************************/ 
		
		/******* DISPLAY ALL PENDING SPECIMEN BROUGHT FORWARD **************/
			##  display_my_final_specimen:'all'
		if(isset($_POST['display_my_final_specimen'])){		$dbm = new DbTool(); 	
			$customer_id = $dbm->clean($_POST['customer_id']);
			 
			 //print "<pre>";			
			 // print_r($_POST); exit; 

			switch($_SESSION['ticket_mode']){
				case "update":{  
				$custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active')),$mydal->TableFields('customer_tickets'));
				if(!is_null($custom_ticket_id)) $custom_ticket_id = $dbm->resort($custom_ticket_id);
					$criterial = array('custom_ticket_id'=>$custom_ticket_id['sn'],'ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active'); 
					$exist = $dbm->getFields($dbm->select('customer_specimen',$criterial),array('sn','bill_type_id','specimen_sample'));
					
				} break; 


				case "new":{  
 					$ticket_query = ['customer_id'=>$customer_id, 'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 
					$custom_ticket_id =  $dbm->select('customer_tickets',$ticket_query);
				  #   print "<pre>"; 
					# print_r($custom_ticket_id);  die; 

					$specimen_query = @array_merge($ticket_query,['custom_ticket_id'=>$custom_ticket_id[0]['sn']]);
					$exist = $dbm->select('customer_specimen',$specimen_query);
					# print_r($exist);  die; 
					
				} break; 
			} # end switch 
			
			$orders = ['perform_test'=>'Blood Test','donate_blood'=>'Blood Donation', 'buy_blood'=>'Blood Purchase']; 

			if(!is_null($exist)){ ?>
			
			<table class=" table table-nogap" style="font-family:Comic Sans MS; border:none;"><tbody>
				<tr class="text-capitalize "> <td> <span class="bold"> Patient's Name : </span> &nbsp;&nbsp; <?php echo $custom_ticket_id[0]['fullname']; ?>  </td> <td> <span class="bold">  Age : </span> &nbsp;&nbsp;<?php echo getAge($custom_ticket_id[0]['age_text']); ## correct_age($custom_ticket_id['age'],$custom_ticket_id['age_type']); ?>  </td> <td> <span class="bold">  Sex : </span> &nbsp;&nbsp;<?php echo empty(@$custom_ticket_id[0]['sex']) ? "Nill":@$custom_ticket_id[0]['sex']; ?></td>  </tr>
				<tr class="text-capitalize "> <td colspan="3"> <span class="bold">   Clinical details : </span> &nbsp;&nbsp;<?php echo @$custom_ticket_id[0]['clinical_details']; ?>  </td>  </tr>
				<tr class="text-capitalize "> <td colspan="3">  <span class="bold">  Refered by : </span> &nbsp;&nbsp;<?php echo @$custom_ticket_id[0]['doctor']; ?>  </td> </tr>
				<tr class="text-capitalize "> <td colspan="3">  <span class="bold">  Referrer’s Address : </span>&nbsp;&nbsp; <?php echo @$custom_ticket_id[0]['hospital']; ?></td>  </tr>				
			</table>	 
			
				<table class="table table-nogap jambo_table"  style="font-family:Comic Sans MS;"><tbody>
				<tr class="table-primary bold text-capitalize font-12"><td> sn </td> <td> Order Type </td> <td> Order Details </td> <td> Cost </td> </tr>
				<?php $n = 0; $tcost = 0;  foreach($exist as $k=>$v){ 
					if($v['order_type']=="perform_test") :
					$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$v['bill_type_id'],'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
					$tcost += $bill_type['price'][0]; 
					$order_details = $bill_type['name'][0];
				elseif($v['order_type']=="donate_blood" || $v['order_type']=="buy_blood"):
					$blood_type = $dbm->getFields($dbm->select('blood_types',array('id'=>$v['blood_type_id'])),array('id','name'));
					$tcost += $v['bill_price']; 
					$order_details = $blood_type['name'][0];
				endif;
				?>
					<tr> 
						 <td class="serial"> <span class="badge badge-success"> <?php echo ($n+1); ?> </span> </td>
						 <td> <?php echo $orders [ $v['order_type']] ; #$bill_type['name'][0]; ?> </td>
						 <td> <span class=""> <?php echo $order_details; ?> </span> </td>
						 <td> <?php  echo "&#8358; ".number_format($v['bill_price']);  ?> </td>												  					
					</tr> 					 
					 <?php $n++; } # end foreach  ?> 
					 <tr class="bold table-info"> 
						<td colspan="5" > Total Cost : <?php echo "&#8358; ".number_format($tcost); ?> </td>						
						</tr> 
					
				</tbody></table> 
				<p> &nbsp; </p>  
			 	
				<div class="col-md-7 text-capitalize" style="float:left;"> 
					 <div class="form-group row" >
							<label for="title" class="col-sm-3 col-form-label"> comment:    </label>
							<div class="col-sm-9"> 
								 <div class="input-group">									
									<input type="text" id="comment" name="comment" value="" class="form-control border-primary input-sm font-14 " placeholder="Comment "> 
									<!-- <div class="input-group-append"><span class="input-group-text border border-primary"><i class="doctor_icon fa fa-comment"></i></span> </div> -->
								</div>
							</div> <!-- ./ col-sm-9 --> 
						  </div> <!-- ./ form-group -->
				</div>
			  
					<tr class=""> 
						<td colspan="5"><center> <button id="create_ticket" name="create_ticket" onclick="create_ticket()"  class=" btn btn-info btn-lg btn-rounded ladda-button" data-style="zoom-in" > Create Ticket &nbsp; <i class="fa fa-save "></i></button> </center> </td>						
					</tr>  
			<?php  }  else { ?>
				<div class="col-md-12 alert alert-info"> <i class="fa fa-warning"> </i> &nbsp; No Specimen has been saved  </div>
			<?php }
			/*********************************/
		}

		function display_my_orders($ticket_no){ $mydbm = new DBController(); 
			$my_orders = $mydbm->runBaseQuery("select distinct order_type from customer_specimen where ticket_no='".$ticket_no."'"); 
			$orders = ['perform_test'=>'Blood Test','donate_blood'=>'Blood Donation', 'buy_blood'=>'Blood Purchase']; 
			if(!empty($my_orders)):
				foreach($my_orders as $k=>$v):
					echo "<span class='badge badge-outline-primary'>". $orders[$v['order_type']]."</span>";
				endforeach;
			endif;

		}
		
        function  get_custom_id(){		
            $mydbm = new DBController();
            $all =  $mydbm->runBaseQuery("SELECT count(id) AS tot from customer_info where id<>''");
            $newno =  ($all[0]['tot']+1);   
            $newpad = str_pad($newno,4,'0',STR_PAD_LEFT);
            return trim("BLCN/$newpad");  		  
		}
        
                
		if(isset($_POST['create_ticket'])){	$mydal=new DAL();	$dbm = new DbTool(); 	 
			$comment = $dbm->clean($_POST['comment']);
			$customer_id = $dbm->clean($_POST['customer_id']);
			 ## ended validation 
                        /** fetch details from pending ticket  **/
			switch($_SESSION['ticket_mode']){
				case "update":{  
				$custom_ticket_id = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active')),$mydal->TableFields('customer_tickets'));
				if(!empty($custom_ticket_id)) $custom_ticket_id = $dbm->resort($custom_ticket_id);
					$criterial = array('custom_ticket_id'=>$custom_ticket_id['sn'],'ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active'); 
					$exist = $dbm->getFields($dbm->select('customer_specimen',$criterial),array('sn','bill_type_id','specimen_sample','bill_price'));
					if(!is_null($exist)){
					   /******* GET ALL COST PRICEE ******************************/
						$n = 0; $tcost = 0;   $total_cost = array_sum($exist['bill_price']); 
						/*
						foreach($exist['bill_type_id'] as $serial){ 
						$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
						$total_cost += $bill_type['price'][0]; 
						$n++; } ## end foreach */
						######################
						$updData = array('total_cost'=>$total_cost,'comment'=>$comment,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
						##### NOW UPDATE TICKET 
						 $dbm->updateTb('customer_tickets',$updData,array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active'));
						 ## also update the specimen table : to_modify = no 
						 $dbm->updateTb('customer_specimen',array('to_modify'=>'no'),array('ticket_no'=>$_SESSION['ticket_no'],'finalized'=>'yes','process_completed'=>'no','status'=>'active'));						
						echo json_encode(array('icon'=>'success','text'=>"TICKET NO : ".$_SESSION['ticket_no']." Has been successfully updated",'title'=>' Ticket Updates Successful ','pay_id'=> base64_encode($_SESSION['ticket_no'])));
                                                unset($_SESSION['ticket_mode']); unset($_SESSION['ticket_no']); unset($_SESSION['process_completed']);
					} # end not null
				} break; 


				case "new":{
					$ticket_query = ['customer_id'=>$customer_id, 'c_by'=>$_SESSION['admUser'],'finalized'=>'no','status'=>'active']; 					 
					$custom_ticket_id =  $dbm->select('customer_tickets',$ticket_query);
					 
					$specimen_criterial = array_merge(['custom_ticket_id'=>$custom_ticket_id[0]['sn']],$ticket_query); 
					$exist = $dbm->select('customer_specimen',$specimen_criterial);
					if(!is_null($exist)){
						$ticket_no = get_new_ticket_id(); 
                                               
						/**********************************************************************/
						/*******GET ALL COST PRICEE ******************************/
						 $total_cost = 0;   $finalized ='yes';
						
						/******* UPDATE Specimen ******************************/
							$n = 0; foreach($exist as $k=>$v){ 
								$total_cost += $v['bill_price']; 
								$dbm->updateTb('customer_specimen',['ticket_no'=>$ticket_no,'finalized'=>$finalized],$specimen_criterial); 
								$n++; 
							} ## end foreach 
						/**********************************************************************/
						$year = date('y'); $pay_type = 'labtest'; #  $amount_paid;						
						$discount=0;   $amount_paid = 0; 
						if($amount_paid >= ($total_cost - $discount)) $payment_completed = 'yes'; else $payment_completed = 'no';
						
						$updData = array('year'=>$year,'pay_type'=>$pay_type,'amount_paid'=>$amount_paid,
						'total_cost'=>$total_cost,'discount'=>$discount,'ticket_no'=>$ticket_no,
						'payment_completed'=>$payment_completed,'finalized'=>$finalized);						
                        
                         ##### NOW UPDATE TICKET                                        

						 $dbm->updateTb('customer_tickets', $updData, $ticket_query);
 						   echo json_encode(array('icon'=>'success','text'=>"YOUR NEW TICKET ID IS : $ticket_no ",'title'=>' Ticket Created Successfully ','pay_id'=> base64_encode($ticket_no)));
					}
					else{
						echo json_encode(array('icon'=>'error','text'=>"No Specimen Found ",'title'=>'Invalid Request'));
					}
				 
				} break; 
			}  # end switch 
			
				 		
			## } end else validation
		}		
		/******************* ********************************/
		/***  view_tickets:'this',process_status *****/
		if(isset($_POST['view_tickets'])){	$dbm = new DbTool(); $func = new functions(); 
			$process_status = $dbm->clean($_POST['process_status']);  # yes / no
			$process_date = $dbm->clean($_POST['process_date']);  # y-m-d
			if($process_date=="") $criterial = array('finalized'=>'yes','status'=>'active','process_completed'=>$process_status); 
			else $criterial = array('finalized'=>'yes','status'=>'active','process_completed'=>$process_status,'date_fin'=>$process_date); 
			# $fields = array('c_by','sn','ticket_no','fullname','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin');
			$tickets = $dbm->select('customer_tickets',$criterial);
			if(!empty($tickets)){
				switch($process_status){
					case "no": { 
						
				$n = 0; ?> <div class="row">
				<?php foreach($tickets as $k=>$v){ ?>
					<div class="col-sm-4 col-md-4 grid-margin stretch-card">
						  <div class="card">
							<div class="card-body">
							  <div class="d-flex justify-content-center">
								<i class="mdi mdi-account icon-lg text-primary d-flex align-items-center"></i>
								<div class="d-flex flex-column ml-4">
								  <span class="d-flex flex-column">
									<p class="mb-0 bold"> <?php echo $v['fullname']; ?> </p>
									<h4 class="font-weight-bold pointer">  <?php $link = base64_encode($v['ticket_no']); $pc = base64_encode('no');  echo "<a href='process_ticket.php?r_val=$link&pc=$pc' target='_blank' class='unstyle'>". $v['ticket_no']."</a>"; ?> </h4>
								  </span>
								  <small class="text-muted ">  <?php echo "<span class='mdi mdi-clock'></span>&nbsp; ". Carbon::parse($v['date_c'])->diffForHumans() ; ?>  </small>
								</div>
							  </div>
							</div>
						  </div>
						</div>  <!-- ./ col-12 col-sm-6 -->	
						 
				<?php $n++; }
				?>  </div> 
				 <?php } break; 
					
					case "yes": { ?>
						<div class="row"> <div class="col-md-12">
						<?php $n = 0; foreach($exist['ticket_no'] as $ticket_no){ ?>
							 <ul class="text-capitalize  list-arrow   font-14">
								<li>  <span class="bold">  ticket no: </span>	<span class="pull-right bold "> <?php echo $ticket_no;?>  </span>	</li>											
								<li>  <span class="bold">  name: </span>	<span class="pull-right"> <?php echo $exist['fullname'][$n];?>  </span>	</li>											 
								<li>  <span class="bold">  time : </span>	<span class="pull-right"> <?php echo $func->format_date($exist['time_fin'][$n],'time');?>  </span>	</li>											 								 
								<li>  <span class="bold">  payment : </span>	<span class="pull-right"> <?php echo "&#8358;".number_format($exist['amount_paid'][$n])." / "."&#8358;".number_format($exist['total_cost'][$n]);?>  </span>	</li>
								<center> 
								<a href="#" class="unstyle"  title="Make Payment Balance" target="_blank"> <span class="fa fa-money font-18 text-success pointer" >  </span> </a>
									&nbsp;&nbsp;&nbsp;
								<a href="<?php echo "tick_print_preview.php?r_val=".base64_encode($ticket_no)."&pc=".base64_encode('yes')."&ss=".base64_encode(time());?>" class="unstyle"  title="Print" target="_blank"> <span class="fa fa-print font-18 text-info pointer" >  </span> </a>
								</center>
							 </ul>  
							 <hr/>
						<?php  $n++; }  # end foreach;  ?> 	 
					</div> <!-- ./ col-md-12 --> </div> <!-- ./ row -->
					<?php } break; 
						
				} # end switch  
			  } # end not null 
			else {
				# echo "<center> <span class='text-primary'> No Ticket Found  </span> </center>";
				echo "<div class='card'><div class='card-body'> <center> <span class='text-success font-20'> No Pending Ticket &nbsp; <i class='fa fa-check fa-2x'></i> </span> </center></div> </div> ";
			} # end null 
		}
		
		/***  view_tickets_to_modify:'this',process_status *****/
		if(isset($_POST['view_tickets_to_modify'])){	$dbm = new DbTool(); $func = new functions(); 
			$process_status = $dbm->clean($_POST['process_status']);  # yes / no
			 
			$fields = array('c_by','sn','ticket_no','fullname','total_cost','amount_paid','discount','date_c','date_fin');
			$tickets = $dbm->getFields($dbm->select_distinct('ticket_no','customer_specimen',array('to_modify'=>'yes','process_completed'=>$process_status,'status'=>'active')),array('ticket_no'));
			   
			## $exist = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
			if(!is_null($tickets)){  ?> <div class="row">
				<?php foreach($tickets['ticket_no'] as $ticket_no){
					$exist = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active','process_completed'=>$process_status)),$fields); 	
					?>
					<div class="col-sm-4 col-md-4 grid-margin stretch-card">
						  <div class="card">
							<div class="card-body">
							  <div class="d-flex justify-content-center">
								<i class="mdi mdi-account icon-lg text-primary d-flex align-items-center"></i>
								<div class="d-flex flex-column ml-4">
								  <span class="d-flex flex-column">
									<p class="mb-0 bold"> <?php echo $exist['fullname'][0]; ?> </p>
									<h4 class="font-weight-bold pointer">  <?php $link = base64_encode($ticket_no); $pc = base64_encode('no'); $status = base64_encode('update');  echo "<a href='newschedule.php?r_val=$link&pc=$pc&md=$status' target='_blank' class='unstyle'>". $ticket_no."</a>"; ?> </h4>
								  </span>
								  <small class="text-muted ">  <?php echo "<span class='mdi mdi-clock'></span>&nbsp; ".$func->format_date($exist['date_c'][0])." -  ". $func->format_date($exist['date_c'][0],'time') ; ?>  </small>
								</div>
							  </div>
							</div>
						  </div>
						</div>  <!-- ./ col-12 col-sm-6 -->	
						 
				<?php  } #$n++;
				?>  </div> 
				 <?php  
			  } # end not null 
			else {
				echo "<div class='card'><div class='card-body'> <center> <span class='text-warning font-20'> No Ticket To Modify  </span> </center></div> </div> ";
			} # end null 
		}
		
		#########################
			
## delete bill type  now  update_bill_status
			if(isset($_POST['update_bill_status'])){  $dbm = new DbTool(); # #sleep(3);	
                   echo $serial = $dbm->clean($_POST['bill_id']); 						
                   echo $status = $dbm->clean($_POST['status']); 
                    // $exists = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ'));	
                    if($status=='active') { $status = "inactive";  } else { $status = "active"; }
                    // do update
                    //  Section::where('id',$data['section_id'])->update(['status'=>$status]); 
                   //  $dbm->updateTb("bill_types",array('status'=>$status, 'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time())),array('sn'=>$serial));
                    
                    echo json_encode(['status'=>$status,'bill_id'=>$serial]); 
                    /**
                    if(!is_null($exists)) {
                            $dbm->updateTb("bill_types",array('status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time())),array('sn'=>$serial));							
                            echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."'s Bill Type has been deleted successfully",'title'=>' Bill Type Deleted '));
                            }
                    else{
                            echo json_encode(array('icon'=>'error','text'=>"No Bill Type matches your criterial ",'title'=>'Deleting Bill Type'));
                    }                                 
                     */			 
                }
			/*******************************************************/


		
		
		#############################
		##########
					## $fields = array('c_by','sn','ticket_no','fullname','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin');
					## $exist = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
					
		/*************************/
			# view_ticket_dates:'all',datefrom:datefrom.val(), dateto:dateto.val() 
			if(isset($_POST['view_ticket_dates'])){	$dbm = new DbTool(); $func = new functions(); 
				$process_status = $dbm->clean($_POST['process_status']);  # yes / no
				$datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$dateto = $dbm->clean($_POST['dateto']);  # y-m-d
				 #### validate #### 
					if($datefrom > $dateto) {
						echo "<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"; 
					} # end if validating 
					else {
						if($datefrom == $dateto) $dates =  $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_fin like '%".$datefrom."%' order by date_fin desc ");
						else $dates =  $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE  date_fin >='".$datefrom." 00:00:00' and date_fin <='".$dateto." 23:59:59'  order by date_fin desc ");
						
						if(!empty($dates)){  $rows = $dates; ?> 
							<label class="text-info font-16 bold"> <?php echo count($dates)."&nbsp; Tickets Found "; ?> </label>
							 <div class="card review-card">  <div class="card-body no-gutter">
							<?php # foreach($rows = mysql_fetch_assoc($dates)){  ?>
							<?php foreach($rows as $tk=>$tv){ ?>
									<div class="accordion basic-accordion" id="<?php echo 'accordion'.$tk; ?>" role="tablist">
										<div class="card">
											<div class="card-header" role="tab" id="<?php echo 'heading'.$tk; ?>"> 
											  <h6 class="mb-0">
												<a class="collapsed" data-toggle="collapse" href="<?php echo '#collapse'.$tk; ?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$tk; ?>">
												  <i class="card-icon mdi mdi-account-multiple-outline"></i> <?php echo $rows[$tk]['ticket_no']; ?> &nbsp; &nbsp; <?php echo $rows[$tk]['fullname'].'&nbsp;&nbsp; - '.$rows[$tk]['hospital']; ?>  </a>
											  </h6>
											</div>
											<div id="<?php echo 'collapse'.$tk; ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo 'heading'.$tk; ?>" data-parent="<?php echo '#accordion'.$tk; ?>">
											  <div class="card-body">
												<h6> <u> Order Lists </u> </h6>
												<?php     
												$cond = array('ticket_no'=>$rows[$tk]['ticket_no'],'finalized'=>'yes','process_completed'=>'yes','status'=>'active'); 
												$specimens = $dbm->select('customer_specimen',$cond);
												$n = 0;  if(!empty($specimens)){
												$orders = []; 
												 foreach($specimens as $sk=>$sv){ 
												 	$orders[] = $sv['order_type']; 
												 	if($sv['order_type']=="perform_test"):
														$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$sv['bill_type_id'],'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
														 ?> <p>
															<div class="icheck-square"> <label> <input type="checkbox" name="specimen_results_check[]" value="<?php echo base64_encode($sv['bill_type_id']); ?>" class="checkbox specimen_results_check" >  <?php echo $bill_type['name'][0]; ?> </label></div>												
															</p>
													<?php 
													elseif($sv['order_type']=="donate_blood"): 
														$token = base64_encode($sv['ticket_no']);
														?>
														 <p class="m-3 p-3"> <a target="_blank" href="blood_donation_result.php?r_val=<?php echo $token; ?>" class="btn btn-danger btn-sm btn-rounded"> Print Blood Donation Result </a></p>													
													<?php 
													elseif($sv['order_type']=="buy_blood"): 
														$token = base64_encode($sv['ticket_no']);
														?>
														 <p class="m-3 p-3"> <a target="_blank" href="blood_purchase_result.php?r_val=<?php echo $token; ?>" class="btn btn-primary btn-sm btn-rounded"> Print Blood Purchase Result </a></p>	

													<?php endif; 

												} # end foreach 


												} # end if - specimen_results_check
												
												if(in_array('perform_test',$orders)) : 
												?>
													<button onclick="print_results($(this).attr('for'))" class="btn btn-success btn-rounded bold  ladda-button" data-style="zoom-in" for="<?php echo base64_encode($rows[$tk]['ticket_no']);?>" > Print Selected (Combined) </button>    
													&nbsp; &nbsp; 
													<button onclick="download_results($(this).attr('for'))" class="btn btn-primary btn-rounded bold  ladda-button" data-style="zoom-in" for="<?php echo base64_encode($rows[$tk]['ticket_no']);?>" > Download (PDF) </button>    
													&nbsp; &nbsp;
													<?php endif; ?>
                                                                                                        <br/> 
												</div>
											</div>
										  </div>
									</div> <!-- ./ end accordion -->
								<?php }  # end foreach ?>
							</div> <!-- ./ card-body  --></div> <!-- ./ card -->
							<?php } # end if not null 
							 
							else {
								echo "<div class='alert alert-info bold'> no tickets found </div>"; 
							} # end not found
				} # end else validating 
			}  # end submit 			
				
		/*************************/
			#  search_this_comp_ticket:'all',process_status:process_status, ticket_no:search_text.val()
			if(isset($_POST['search_this_comp_ticket'])){	$dbm = new DbTool(); $func = new functions(); 
				$process_status = $dbm->clean($_POST['process_status']);  # yes / no
				$ticket_no = $dbm->clean($_POST['ticket_no']);  # y-m-d
				 #### validate ####  
				 
				$exists = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE ticket_no = '".$ticket_no."' AND status='active' AND finalized='yes' "); #  $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'status'=>'active','finalized'=>'yes')),$mydal->TableFields('customer_tickets'));
				
				if(is_null($exists)){
					echo "<div class='alert alert-warning bold'> This ticket [ $ticket_no ] does not exists </div>"; 					
				}
				else {
					$rows = $exists; ##  $dbm->resort($exists); 
					if($rows[0]['process_completed']=="no"){
						echo "<div class='alert alert-warning bold'> This ticket [ $ticket_no ] processes has not been completed, please try again later   </div>"; 
					}
					else { ?>
				<?php 
					
					$cust_sp_fields = $mydal->TableFields('customer_specimen');
					$bill_type_fields = $mydal->TableFields('bill_types');
					
					foreach($rows as $k=>$v){ ?>
						<div class="accordion basic-accordion" id="<?php echo 'accordion'.$k; ?>" role="tablist">
							<div class="card">
								<div class="card-header" role="tab" id="<?php echo 'heading'.$k; ?>"> 
								  <h6 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="<?php echo '#collapse'.$k; ?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$k; ?>">
									  <i class="card-icon mdi mdi-account-multiple-outline"></i> <?php echo $rows[$k]['ticket_no']; ?> &nbsp; &nbsp; <?php echo $rows[$k]['fullname'].'&nbsp;&nbsp; - '.$rows[$k]['hospital']; ?>  </a>
								  </h6>
								</div>
								<div id="<?php echo 'collapse'.$k; ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo 'heading'.$k; ?>" data-parent="<?php echo '#accordion'.$k; ?>">
								  <div class="card-body">
									<h6> <u> Test Performed  </u> </h6>
									<?php     
									$cond = array('ticket_no'=>$rows[$k]['ticket_no'],'finalized'=>'yes','process_completed'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),$cust_sp_fields); 
									$n = 0;  if(!empty($specimens)){ foreach($specimens['bill_type_id'] as $serial){ 
									$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),$bill_type_fields);
									 ?> <p>
										<div class="icheck-square"> <label> <input type="checkbox" name="specimen_results_check[]" value="<?php echo base64_encode($serial); ?>" class="checkbox specimen_results_check" >  <?php echo @$bill_type['name'][0]; ?> </label></div>												
										</p>
									<?php } # end foreach 
									} # end if - specimen_results_check
									?>
										<button onclick="print_results($(this).attr('for'))" class="btn btn-success btn-rounded bold  ladda-button" data-style="zoom-in" for="<?php echo base64_encode($rows[$k]['ticket_no']);?>" > Print Selected (Combined) </button>    
										&nbsp; &nbsp; 
										<button onclick="download_results($(this).attr('for'))" class="btn btn-primary btn-rounded bold  ladda-button" data-style="zoom-in" for="<?php echo base64_encode($rows[$k]['ticket_no']);?>" > Download (PDF) </button>    
										&nbsp; &nbsp; 
										<button onclick="download_results($(this).attr('for'),'excel')" class="btn btn-primary btn-rounded bold  ladda-button" data-style="zoom-in" for="<?php echo base64_encode($rows[$k]['ticket_no']);?>" > Download (CSV) </button>    
										&nbsp; &nbsp; 
										<button onclick="resolve_specimen_date_computation($(this).attr('for'))" class="btn btn-info btn-rounded bold  ladda-button" data-style="zoom-in" for="<?php echo base64_encode($rows[$k]['ticket_no']);?>" > Resolve Date Computation </button>    
										<br/> 
									</div>
								</div>
							  </div>
						</div> <!-- ./ end accordion -->
					<?php }  # end foreach ?>
				<?php }
				}   ## end else if exists 
			}  # end submit 			
			
			#######  resolve_specimen_date_computation:'all',ticket_no:ticket_no
			if(isset($_POST['resolve_specimen_date_computation'])){
				  $ticket_no = base64_decode($dbm->clean($_POST['ticket_no'])); $mydbm = new DBController();
				  $specs_result = $dbm->select('customer_specimen_result',['ticket_no'=>$ticket_no,'status'=>'active']); 
				  $specs = $dbm->select('customer_specimen',['ticket_no'=>$ticket_no,'status'=>'active']); 
				  $idlogs = [];  $datelogs = [];
				  if(!empty($specs_result)){
					  $ids =  $dbm->getFields($specs_result,['bill_type_id']);
					  $dates =  $dbm->getFields($specs_result,['date_c']);
					  
					  } $n=0;
					foreach($ids['bill_type_id'] as $id){
						if(!in_array($id,$idlogs)){
							array_push($idlogs,$id);
							array_push($datelogs,$dates['date_c'][$n]);							
							$dbm->updateTb('customer_specimen',['date_perform'=>$dates['date_c'][$n]],['ticket_no'=>$ticket_no,'bill_type_id'=>$id,'status'=>'active']);							
						} $n++;
					}
					// now save the date perform 
					 
				 // echo $specs_result[0]['date_c']."-"; echo  $specs[0]['date_c']."-". $specs[0]['date_perform']; 
				  // $specimens = $mydbm->runBaseQuery("SELECT rs.ticket_no, rs.bill_type_id, rs.date_c as date1,sp.date_perform FROM customer_specimen_result rs, customer_specimen sp where rs.status='active' and sp.status='active' and rs.bill_type_id=sp.bill_type_id and rs.ticket_no=$ticket_no and  sp.ticket_no=$ticket_no"); 
				   echo json_encode(['title'=>'Successful','text'=>"Result Computation has been successfully updated for $ticket_no",'icon'=>'success']);
			}
			#######
			#######
			
			
			
		##########
					## $fields = array('c_by','sn','ticket_no','fullname','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin');
					## $exist = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
					
		/********  view_ticket_paym_dates *****************/		
			if(isset($_POST['view_ticket_paym_dates'])){	$dbm = new DbTool(); $func = new functions(); 
				$datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$dateto = $dbm->clean($_POST['dateto']);  # y-m-d
				 #### validate #### 
					if($datefrom > $dateto) {
						echo "<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"; 
					} # end if validating 
					else {
						# if($datefrom == $dateto) $dates  = mysql_query("SELECT * FROM payment_log WHERE date_paid ='$datefrom' AND status='active' order by date_paid desc ") or mysql_error();
						if($datefrom == $dateto) $dates = $mydbm->runBaseQuery("SELECT * FROM payment_log WHERE date_paid ='$datefrom' AND status='active' order by date_paid desc "); 
						else $dates = $mydbm->runBaseQuery("SELECT * FROM payment_log WHERE  date_paid >='$datefrom' and date_paid <='$dateto' AND status='active' order by date_paid desc ");
						
						$n=0; 
						if(!empty($dates)){  $rows = $dates;   ?>   
							<label class="text-info font-16 bold"> <?php echo count($rows)."&nbsp; Payment(s) Found "; ?> </label>
							 <div class="card review-card">  <div class="card-body no-gutter"> <table class="table table-nogap" > <tbody>
							 <tr class="bg-inverse-info bold"> <td class="serial"> S/N </td><td> Ticket No </td><td> Expc. Pay </td><td> Discount </td><td> Amount Paid </td> <td> Balance </td> <td> Date Paid </td> <td> Time Paid </td>  </tr> 
							<?php 
								$fields = $mydal->TableFields('customer_tickets');
								foreach($rows as $k=>$v){  $bal = $rows[$k]['expc_pay'] - $rows[$k]['discount'] - $rows[$k]['amount_paid'];								
								$criterial = array('ticket_no'=>$rows[$k]['ticket_no'],'status'=>'active');
								$ticket_info = $dbm->resort($dbm->getFields($dbm->select('customer_tickets',$criterial),$fields));
								?>
								<tr>  
									<td class="bold text-uppercase"> <span class="badge badge-info"> <?php echo ($n+1); ?> </span> </td> 
									<td class="bold text-uppercase"> <span class="pointer text-primary" data-toggle="modal"  data-target="#info_menu" data-text="<?php echo join('|',$ticket_info); ?>" onclick="show_ticket_info($(this).attr('data-text'))"  title="View Details" > <?php echo $rows[$k]['ticket_no']; ?> </span>  </td> 
									<td class=" text-capitalize"><?php echo "&#8358; ".number_format($rows[$k]['expc_pay']); ?>  </td> 
									<td class=" text-capitalize"><?php echo "&#8358; ".number_format($rows[$k]['discount']) ?>  </td> 
									<td class=" text-capitalize"><?php echo "&#8358; ".number_format($rows[$k]['amount_paid']) ?>  </td> 
									<td class=" text-capitalize"><?php echo "&#8358; ".number_format($bal) ?>  </td> 
									<td class=" text-capitalize"><?php echo $func->format_date($rows[$k]['date_paid']); ?>  </td> 
									<td class=" text-capitalize"><?php # echo $func->format_date($rows[$k]['time_paid'],'time'); ?>  </td> 
								</tr>
								<?php $n++;}  # end foreach ?>
								</tbody> </table>
							</div> <!-- ./ card-body  --></div> <!-- ./ card -->
							<?php } # end if not null 
							 
							else {
								echo "<div class='alert alert-info bold'> no tickets found </div>"; 
							} # end not found
				} # end else validating 
			}  # end submit 			
			
                        /********  view_ticket_summary_without_pay *****************/
			# view_ticket_summary_without_pay:'all',datefrom:datefrom.val(), dateto:dateto.val() 
			if(isset($_POST['view_ticket_summary_without_pay'])){	$dbm = new DbTool(); $func = new functions(); 
				$datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$dateto = $dbm->clean($_POST['dateto']);  # y-m-d
                                        
					if($datefrom > $dateto) {
						exit("<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"); 
					 } # end if validating 
					else {  	
                                            
                            $dates = get_date_range($datefrom,$dateto); 
                            $datefrom = $datefrom." 00:00:00"; 
                            $dateto = $dateto." 23:59:59";
                            $records = $mydbm->runBaseQuery("SELECT  fullname, discount, amount_paid as total_pay, total_cost,refund,ticket_no FROM customer_tickets WHERE date_c BETWEEN '$datefrom' and  '$dateto' and finalized='yes' and status='active' order by date_c desc ");	 
                            // $records = $mydbm->runBaseQuery("SELECT   ,b.amount_paid as total_pay FROM payment_log a, customer_tickets b WHERE  b.date_c BETWEEN '$datefrom' and  '$dateto' and  a.status='active' and b.status='active' and a.ticket_no = b.ticket_no and  b.payment_completed='no'   order by b.date_c desc "); 
                             $tickets = unique_tickets($records); 
                                               
						$n=0; 
						if(!empty($tickets)){ // $rows = $dates;  ?>   
							<label class="text-info font-16 bold"> <?php echo count($tickets)."&nbsp; Ticket(s) Found "; ?> </label>
							 <div class="card review-card">  <div class="card-body no-gutter"> <table class="table table-nogap table-bordered" > <tbody>
                                 <tr class="bg-inverse-info bold text-uppercase"> <td class="serial"> S/N </td> <td> Ticket No </td><td> Name </td>  <td> TOTAL BILL </td> <td> Discount </td> <td> TOTAL PAY</td>  <td> Balance </td> <td> Refund </td>  </tr> 
							<?php  
							//$sum_total = 0;  $sum_discount = 0; $sum_bal = 0; $ops=0;
							$sum_paid = 0; $sum_bill = 0;  $sum_discount = 0; $sum_bal = 0;  $sum_refund = 0;
                                foreach($tickets as $ticket){ // $bal = $rows[$k]['total_cost'] - $rows[$k]['discount'] - $rows[$k]['amount_paid'];
                                        $mypayment = find_my_payments($ticket,$records); 								
                                        $sum_bill +=  $mypayment['bill']; 
                                        $sum_paid += $mypayment['total_pay'];
                                        $sum_discount += $mypayment['discount']; 
                                        $sum_refund += $mypayment['refund'];                                                                                 
                                        $bal = ($mypayment['bill'] - $mypayment['discount'] - $mypayment['total_pay']);
                                        $bal = ($bal < 0) ? 0 : $bal; 
                                        $sum_bal += $bal;

                                        ##$sum_cash += my_payment_mode($mypayment['payments'],'cash')[1];
                                        ##$sum_pos += my_payment_mode($mypayment['payments'],'pos')[1];
                                        #$sum_transfer += my_payment_mode($mypayment['payments'],'transfer')[1];
                                    ?>
                                        <tr class="<?php echo ($bal>0)?" table-warning":""; echo ($bal<0)?" table-primary":"";?>">  
                                           <td class="bold text-uppercase"> <span class="badge badge-info"> <?php echo ($n+1); ?> </span> </td>                                                                           
                                           <td class="text-uppercase"> <span class="" > <?php echo $ticket; // $rows[$k]['ticket_no']; ?> </span>  </td> 
                                           <td class="text-uppercase text-wrap" > <?php print find_my_name($ticket,$records); ?> </td>
                                           <td class=" text-capitalize bold" title="TOTAL BILL"> <?php echo "&#8358; ".@number_format($mypayment['bill']); ?>  </td> 
                                           <td class=" text-capitalize" title="DISCOUNT"><?php echo "&#8358; ".@number_format($mypayment['discount']); ?>   </td> 
                                           <td class=" text-capitalize bold" title="TOTAL PAY"><?php echo "&#8358; ".@number_format($mypayment['total_pay']); ?>   </td> 
                                           <td class=" text-capitalize" title="BALANCE"><?php  echo "&#8358; ".@number_format($bal); ?>   </td> 
                                           <td class=" text-capitalize" title="REFUND"><?php  echo "&#8358; ".@number_format($mypayment['refund']??0); ?>   </td> 
                                </tr>
								<?php $n++;}  # end foreach ?>								
								<tr class="text-uppercase bold table-info h4 "> <td colspan="3" >total </td> <td>&#8358; &nbsp;<?php echo @number_format($sum_bill);# ." / ".$ops; ?> </td> 
									<td><?php echo "&#8358; &nbsp;".@number_format($sum_discount); ?> </td> 
									<td> <?php  echo "&#8358; &nbsp;".@number_format($sum_paid); ?></td> 
									<td> <?php echo "&#8358; &nbsp;".@number_format($sum_bal); ?> </td>
									<td> <?php echo "&#8358; &nbsp;".@number_format($sum_refund); ?> </td>
									</tr>
								<tr class="bg-inverse-info bold"> <td colspan="2"> TICKET NO </td> <td> NAME</td> <td> TOTAL BILL </td> <td> DISCOUNT </td> <td>TOTAL PAY </td> <td> BALANCE </td>  <td> REFUND </td> </tr>
								</tbody> </table>
							</div> <!-- ./ card-body  --></div> <!-- ./ card -->
							<?php } # end if not null 
							 
							else {
								echo "<div class='alert alert-warning bold text-uppercase'> no TICKET found </div>"; 
							} # end not found
				} # end else validating 
			}  # end submit 			
                        
	 			
                    /********  view_ticket_paym_summary *****************/
			# view_ticket_paym_summary:'all',datefrom:datefrom.val(), dateto:dateto.val() 
			if(isset($_POST['view_ticket_paym_summary'])){	$dbm = new DbTool(); $func = new functions(); 
				$datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$dateto = $dbm->clean($_POST['dateto']);  # y-m-d
				$search_type = $dbm->clean($_POST['search_type']);  # ticket or payment
				// print $search_type; 				
				#### validate #### 
				// print "<pre>";
				$dates = get_date_range($datefrom,$dateto); 
				// print_r($dates); 
					if($datefrom > $dateto) {
						exit("<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"); 
					 } # end if validating 
					else {      $records = [];     
						$datefrom = $datefrom." 00:00:00"; 
                        $dateto = $dateto." 23:59:59";                               
						switch($search_type){
							case "ticket": {
							# $records = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_c='$datefrom' and finalized='yes' and status='active' order by date_c desc ");	 
							## a = payment_log, b = customer_tickets
							$records = $mydbm->runBaseQuery("SELECT b.total_cost,b.refund,a.ticket_no,a.amount_paid as log_pay,a.paymode, b.fullname, b.discount,b.amount_paid as total_pay FROM payment_log a, customer_tickets b WHERE  b.date_c BETWEEN '$datefrom' and  '$dateto' and  a.status='active' and b.status='active' and a.ticket_no = b.ticket_no and  b.payment_completed='no'   order by  b.date_c desc "); 

							} break; 
                                                    
							case "payment": {
						   # $records = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_c='$datefrom' and finalized='yes' and status='active' order by date_c desc ");	 
						   $records = $mydbm->runBaseQuery("SELECT b.total_cost,b.refund,a.ticket_no,a.amount_paid as log_pay,a.paymode, b.fullname, b.discount,b.amount_paid as total_pay FROM payment_log a, customer_tickets b WHERE  a.date_paid BETWEEN '$datefrom' and  '$dateto' and  a.status='active' and b.status='active' and a.ticket_no = b.ticket_no order by a.date_paid desc "); 

							} break; 
							 
						 } ### end switch
                                                 
						 $tickets = unique_tickets($records); 
                                               
						$n=0; 
						if(!empty($tickets)){ // $rows = $dates;  ?>   
							<label class="text-info font-16 bold"> <?php echo count($tickets)."&nbsp; Ticket(s) Found "; ?> </label>
							 <div class="card review-card">  <div class="card-body no-gutter"> <table class="table table-nogap table-bordered" > <tbody>
                                                            <tr class="bg-inverse-info bold text-uppercase"> <td class="serial"> S/N </td> <td> Ticket No </td><td> Name </td>  <td> TOTAL BILL </td> <td class="text-center"><small>Payment By </small><br/>CASH </td>  <td  class="text-center"><small>Payment By </small><br/>POS </td>  <td  class="text-center"><small>Payment By </small><br/>TRANSFER </td><td> Discount </td> <td> TOTAL PAY</td>  <td> Balance </td> <td> Refund </td>  </tr> 
							<?php  
							//$sum_total = 0;  $sum_discount = 0; $sum_bal = 0; $ops=0;
							$sum_paid = 0; $sum_bill = 0;  $sum_discount = 0; $sum_bal = 0; $sum_cash = 0; $sum_pos = 0; $sum_transfer = 0; $sum_refund = 0;
									foreach($tickets as $ticket){ // $bal = $rows[$k]['total_cost'] - $rows[$k]['discount'] - $rows[$k]['amount_paid'];
										$mypayment = find_my_payments($ticket,$records); 								
										$sum_bill +=  $mypayment['bill']; 
										$sum_paid += $mypayment['total_pay'];
										$sum_discount += $mypayment['discount']; 
										$sum_refund += $mypayment['refund']; 
										$bal = ($mypayment['bill'] - $mypayment['discount'] - $mypayment['total_pay']);
                                                                                $bal = ($bal < 0) ? 0 : $bal; 
										$sum_bal += $bal;
										
										$sum_cash += my_payment_mode($mypayment['payments'],'cash')[1];
										$sum_pos += my_payment_mode($mypayment['payments'],'pos')[1];
										$sum_transfer += my_payment_mode($mypayment['payments'],'transfer')[1];
									?>
										<tr class="<?php echo ($bal>0)?" table-warning":""; echo ($bal<0)?" table-primary":"";?>">  
										   <td class="bold text-uppercase"> <span class="badge badge-info"> <?php echo ($n+1); ?> </span> </td>                                                                           
										   <td class="text-uppercase"> <span class="" > <?php echo $ticket; // $rows[$k]['ticket_no']; ?> </span>  </td> 
										   <td class="text-uppercase text-wrap" > <?php print find_my_name($ticket,$records); ?> </td>
										   <td class=" text-capitalize bold" title="TOTAL BILL"> <?php echo "&#8358; ".number_format($mypayment['bill']); ?>  </td> 
										   <td class=" text-capitalize" title="CASH"><?php echo join("<br/>",my_payment_mode($mypayment['payments'],'cash')[0]); ?></td> 
										   <td class=" text-capitalize" title="POS"> <?php echo join("<br/>",my_payment_mode($mypayment['payments'],'pos')[0]); ?>  </td>  
										   <td class=" text-capitalize" title="TRANSFER"><?php echo join("<br/>",my_payment_mode($mypayment['payments'],'transfer')[0]); ?>  </td> 
										   <td class=" text-capitalize" title="DISCOUNT"><?php echo "&#8358; ".number_format($mypayment['discount']); ?>   </td> 
										   <td class=" text-capitalize bold" title="TOTAL PAY"><?php echo "&#8358; ".number_format($mypayment['total_pay']); ?>   </td> 
										   <td class=" text-capitalize" title="BALANCE"><?php  echo "&#8358; ".number_format($bal); ?>   </td> 
										   <td class=" text-capitalize" title="REFUND"><?php  echo "&#8358; ".number_format($mypayment['refund']??0); ?>   </td> 
									</tr>
								<?php $n++;}  # end foreach ?>								
								<tr class="text-uppercase bold table-info h4 "> <td colspan="3" >total </td> <td>&#8358; &nbsp;<?php echo number_format($sum_bill);# ." / ".$ops; ?> </td> 
									<td><?php echo "&#8358; &nbsp;".number_format($sum_cash); ?>  </td>  
									<td> <?php echo "&#8358; &nbsp;".number_format($sum_pos); ?>  </td> 
									<td><?php echo "&#8358; &nbsp;".number_format($sum_transfer); ?>  </td> 
									<td><?php echo "&#8358; &nbsp;".number_format($sum_discount); ?> </td> 
									<td> <?php  echo "&#8358; &nbsp;".number_format($sum_paid); ?></td> 
									<td> <?php echo "&#8358; &nbsp;".number_format($sum_bal); ?> </td>
									<td> <?php echo "&#8358; &nbsp;".number_format($sum_refund); ?> </td>
									</tr>
								<tr class="bg-inverse-info bold"> <td colspan="2"> TICKET NO </td> <td> NAME</td> <td> TOTAL BILL </td> <td> CASH </td> <td> POS </td> <td> TRANSFER </td> <td> DISCOUNT </td> <td>TOTAL PAY </td> <td> BALANCE </td>  <td> REFUND </td> </tr>
								</tbody> </table>
							</div> <!-- ./ card-body  --></div> <!-- ./ card -->
							<?php } # end if not null 
							 
							else {
								echo "<div class='alert alert-warning bold text-uppercase'> no $search_type found </div>"; 
							} # end not found
				} # end else validating 
			}  # end submit 			
                        
                        function unique_tickets($records): array {
                            $tickets = [];       
                            if(is_array($records) && !empty($records)){
                                foreach($records as $k=>$v){
                                    if(!in_array($v['ticket_no'], $tickets))
                                      $tickets[] = $v['ticket_no'];
                                }
                            } 
                            return $tickets; 
                        }
                        
                        function find_my_name($ticket,$records): string {
                                $name = "";      
                                if(is_array($records) && !empty($records)){
                                foreach($records as $k=>$v){
                                    if($v['ticket_no'] === $ticket){
                                    $name = $v['fullname']; break; }
                                }
                            } 
                            return $name; 
                        }
                        /***********************/
                         function find_my_payments($ticket,$records): array {
                            $payments = [];  $bill = 0;   $discount = 0; $total_pay = 0; $refund = 0;
                            if(is_array($records) && !empty($records)){
                                foreach($records as $k=>$v){
                                 if($v['ticket_no'] == $ticket){
                                     $payments['mode'][] = @$v['paymode'];
                                     $payments['amount'][] = @$v['log_pay']; 
                                     $bill =  $v['total_cost'];
                                     $discount =  $v['discount'];
                                     $total_pay = $v['total_pay'];
                                     $refund = $v['refund'];
                                   }
                                }
                            } 
                            return array('bill'=>$bill,'payments'=>$payments,'total_pay'=>$total_pay,'discount'=>$discount,'refund'=>$refund); 
                        }
                        
                        function my_payment_mode($payments,$mode="cash"){
                           ## others = pos, transfer
                            $amounts = []; $sum = 0; 
                           if(is_array($payments) && !empty($payments)){                              
                                if(in_array($mode, $payments['mode'])){
                                    foreach($payments['mode'] as $k=>$v){
                                       if($v == $mode) {  
                                           $amounts[] = $payments['amount'][$k]; 
                                           $sum += $payments['amount'][$k]; 
                                       } # end if
                                    } # end foreach
                                } #end in_array
                               }  #end is_array  
                               
                             //return  array('mode'=>array_map(fn($amount)=>"&#8358; ". number_format($amount), $amounts), 'sum'=>$sum);
                            
                               $arr = array_map(function($amount){ return "&#8358; ". number_format($amount);},$amounts);
                               return [$arr,$sum];
                                //return array(array_map(fn($amount)=>"&#8358; ". number_format($amount), $amounts),$sum);
                         }
                        
			/********  view_ticket_paym_summary *****************/
			# view_ticket_paym_summary:'all',datefrom:datefrom.val(), dateto:dateto.val() 
			if(isset($_POST['view_ticket_paym_summary_before'])){	$dbm = new DbTool(); $func = new functions(); 
				$datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$dateto = $dbm->clean($_POST['dateto']);  # y-m-d
				$search_type = $dbm->clean($_POST['search_type']);  # ticket or payment
				// print $search_type; 				
				#### validate #### 
				print "<pre>";
				$dates = get_date_range($datefrom,$dateto); 
				print_r($dates); exit; 
				
					if($datefrom > $dateto) {
						echo "<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"; 
					} # end if validating 
					else {
						
						#print "<pre>"; print_r($dates); print "</pre>";
						if($datefrom == $dateto) $dates = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_c='$datefrom' and finalized='yes' and status='active' order by time_c desc ");
						else $dates = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE  date_c BETWEEN '$datefrom' and  '$dateto'  and finalized='yes' and  status='active' order by time_c , date_c desc ");
						# else $dates = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE  date_c >='$datefrom' and date_c <='$dateto'  and finalized='yes' and  status='active' order by time_c , date_c desc ");
						
						$n=0; 
						if(!empty($dates)){ $rows = $dates;  ?>   
							<label class="text-info font-16 bold"> <?php echo count($dates)."&nbsp; Ticket(s) Found "; ?> </label>
							 <div class="card review-card">  <div class="card-body no-gutter"> <table class="table table-nogap" > <tbody>
							 <tr class="bg-inverse-info bold"> <td class="serial"> S/N </td><td> Name </td> <td> Ticket No </td> <td> Expc. Pay </td> <td> Amount(s) Paid </td> <td> Discount </td> <td> Balance </td>  <td> Date Created </td>  </tr> 
							<?php  
							$sum_total = 0; $sum_paid = 0; $sum_discount = 0; $sum_bal = 0; $ops=0;
							foreach($rows as $k=>$v){  $bal = $rows[$k]['total_cost'] - $rows[$k]['discount'] - $rows[$k]['amount_paid'];
								$sum_bal += $bal; 
								$sum_total+= $rows[$k]['total_cost'];  
								$sum_paid+= $rows[$k]['amount_paid'];  
								$sum_discount += $rows[$k]['discount'];
								// $fields = array('ticket_no','fullname','age','age_type','sex','doctor','hospital','date_c','time_c','c_by');
								// $criterial = array('ticket_no'=>$rows['ticket_no'],'status'=>'active');
								// $ticket_info = $dbm->resort($dbm->getFields($dbm->select('customer_tickets',$criterial),$fields));
								//$orig_price = get_ticket_sum_price($rows[$k]['ticket_no']);
								//$ops += $orig_price;
							?>
									<tr>  
									   <td class="bold text-uppercase"> <span class="badge badge-info"> <?php echo ($n+1); ?> </span> </td> 
										<td class=" text-capitalize"><?php echo $rows[$k]['fullname']; ?>  </td> 
										<td class="text-uppercase"> <span class="" > <?php echo $rows[$k]['ticket_no']; ?> </span>  </td> 
									   <td class=" text-capitalize <?php # echo ($orig_price !=$rows[$k]['total_cost'])?"text-danger h4":"text-primary h4";?>"><?php echo "&#8358; ".number_format($rows[$k]['total_cost']); #." / ".number_format($orig_price); ?>  </td> 
									   <td class=" text-capitalize"><?php echo "&#8358; ".number_format($rows[$k]['amount_paid']) ?>  </td> 
									   <td class=" text-capitalize"><?php echo "&#8358; ".number_format($rows[$k]['discount']) ?>  </td>  
									   <td class=" text-capitalize"><?php echo "&#8358; ".number_format($bal) ?>  </td> 
									   <td class=" text-capitalize"><?php echo $func->format_date($rows[$k]['date_c']); ?>  </td> 
									</tr>
								<?php $n++;}  # end while ?>								
								<tr class="text-uppercase bold table-info h4 "> <td colspan="3" >total </td> <td>&#8358; &nbsp;<?php echo number_format($sum_total);# ." / ".$ops; ?> </td>  <td>&#8358; &nbsp;<?php echo number_format($sum_paid); ?> </td> <td> &#8358; &nbsp;<?php echo number_format($sum_discount); ?></td> <td> &#8358; &nbsp;<?php echo number_format($sum_bal); ?> </td> <td>&nbsp; </td> </tr>
								<tr class="bg-inverse-info bold"> <td colspan="2">  </td> <td> Ticket No </td> <td> Expc. Pay </td> <td> Amount(s) Paid </td> <td> Discount </td> <td colspan="2"> Balance To be paid </td>   </tr>
								</tbody> </table>
							</div> <!-- ./ card-body  --></div> <!-- ./ card -->
							<?php } # end if not null 
							 
							else {
								echo "<div class='alert alert-info bold'> no tickets found </div>"; 
							} # end not found
				} # end else validating 
			}  # end submit 			
					
		################ THE BEGINNING OF THE TEST - NAVIGATOR #################		
		########################################################################
		/******************* display_specimen_result_form ********************************/
		if(isset($_POST['display_specimen_result_form'])){
			$dbm = new DbTool(); $func = new functions(); 
			$todo = $dbm->clean($_POST['serial']); # now combined with characters
			@$ticket_no = base64_decode($dbm->clean($_POST['ticket_no'])); 
			$operation = explode("|",$todo);			

			# operation to do and the serial no  # perform_test | bill id 	# donate_blood | blood type id
			# buy blood | blood type id # so split by "|"
			
			switch ($operation[0]) {
				case 'donate_blood': 
					echo "<center class='mb-3'><span class='badge badge-success font-16 '> Donation Test</span> </center>";
					display_donation_test_form($operation[1],$ticket_no);
					break;

				case 'buy_blood': 
					echo "<center class='mb-3'><span class='badge badge-success font-16 '> Blood Purchase </span> </center>";
					display_final_blood_purchase_form($operation[1],$ticket_no);
					break;  // 08142292982  08056630182  86167215998

				case 'perform_test':
					 echo "<center><span class='badge badge-info font-16'> Blood Test</span> </center>";
					 display_blood_test_form($operation[1],$ticket_no);
					break;

				default:
					echo "<center><span class='badge badge-warning font-16'> Select Action To Perform </span> </center>";

				break;

			} 
		}

		function display_final_blood_purchase_form($serial,$ticket_no){
			$mydbm = new DBController(); # $serial = blood_stock_id
			 $stock_info = $mydbm->runBaseQuery("Select * from blood_stocks where id='".$serial."' and status='active'");
			 $blood_type =  $mydbm->runBaseQuery("Select name from blood_types where id='".$stock_info[0]['blood_type_id']."'");
			 $status = ['sold'=>'Blood Sold','canceled'=>'Sales canceled','onsale'=>'In Process']; 
			 $blood_type_id = $stock_info[0]['blood_type_id'];
			?>

			<form method="post" id="blood_purchase_report_form">
				<table class="table table-sm table-bordered"> 
					<tr > 
						<td class="bold table-primary">Donor Blood Type </td>
						<td class="bold font-20" > <?php echo  $blood_type[0]['name']; ?>  </td>
					</tr>
					<tr> 
						<td class="bold table-primary">Last Donation Day </td>
						<td class="bold font-20" > <?php echo  Carbon::parse($stock_info[0]['date_donated'])->diffForHumans(); ?>    </td>
					</tr>
					<tr> 
						<td class="bold table-primary">Expiry Day </td>
						<td class="bold font-20" > <?php echo  Carbon::parse($stock_info[0]['expiry_date'])->diffForHumans(); ?>    </td>
					</tr>
					<tr> 
						<td class="bold table-primary"> Blood Bag No. </td>
						<td class="bold font-20"> <?php echo  $stock_info[0]['ticket_no']; ?>    </td>
					</tr>
					<tr>  
					<tr>  					
						<td class="bold table-primary">Sales Status </td>
						<td class="font-weight-bold font-20"> <?php echo  $status[$stock_info[0]['transaction_status']]; ?> </td>
					</tr>
					<?php  $order = $mydbm->runBaseQuery("select blood_purchase_report,blood_compatibility,blood_cross_matching from customer_specimen where ticket_no='".$ticket_no."' and blood_type_id='".$blood_type_id."' and order_type='buy_blood' and status='active'");  
							## 'blood_compatibility'=>$compatibility,'blood_cross_matching'=> 
							
							$cme_check = $order[0]['blood_cross_matching'] == "Emergency" ? " checked " : "";
							$cmr_check = $order[0]['blood_cross_matching'] == "Routine" ? " checked " : "";
							$bc_check =  $order[0]['blood_compatibility'] == "Compatible" ? " checked " : "";
							$bnc_check =  $order[0]['blood_compatibility'] == "Not Compatible" ? " checked " : "";

							/** $labelname = "Add Exra Medical Report";
							$btnstyle = "btn-light"; $from = "template"; 
							if(!empty($order[0]['blood_purchase_report'])) : 
								## meaning that the report has earlier been saved 
							 $labelname = " View Computed Medical Report"; 
							 $btnstyle = "btn-primary ";  $from = "result"; 
							endif; 
							# print_r($order); **/
							
						?>
					<tr>
						<td class="bold  table-primary">Patients Blood Type</td>
						<td class="bold font-20"></td>
					</tr>
					<tr>
						<td class="bold table-primary">Cross Match Investigation </td>
						<td>
							<div class="input-group">									
								<label class="control-label font-18"> <input type="radio"  <?php echo $cme_check; ?>   name="crossmatch_investigation" value="Emergency"  class="crossmatch_investigation radio " /> Emergency </label> &nbsp; &nbsp; &nbsp; 
								<label class="control-label  font-18"> <input type="radio"   <?php echo $cmr_check; ?>  name="crossmatch_investigation" value="Routine"  class="crossmatch_investigation radio  "/> Routine </label>
							</div>							
						</td>
					</tr>
					<tr>
						<td  class="bold table-primary">Blood Compatibility </td>
						<td  >
							<div class="input-group">									
								<label class="control-label font-18"> <input type="radio"  <?php echo $bc_check; ?>    name="is_blood_compatible" value="Compatible"  class="is_blood_compatible radio " /> Compatible </label> &nbsp; &nbsp; &nbsp; 
								<label class="control-label  font-18"> <input type="radio"  <?php echo $bnc_check; ?>   name="is_blood_compatible" value="Not Compatible"  class="is_blood_compatible radio  "/> Not Compatible </label>
							</div>
						</td>
					</tr>
					<tr> 
						<td colspan="2"> 
							<!-- <button type="button" onclick="load_final_template_report('purchase','<?php echo $from;?>','<?php echo $ticket_no; ?>','<?php echo $blood_type_id; ?>')" data-toggle="modal" data-target="#final_purchase_extra_report_modal" class="btn <?php echo $btnstyle; ?> rounded bold"> <?php echo $labelname; ?>  </button> -->
							<div class="form-group form-group-inline float-right">
								<button type="button"  onclick="process_blood_purchase($(this).attr('data-text'),'Reject')" data-text="<?php echo $serial.'|'.$ticket_no; ?>" class="btn btn-outline-danger btn-rounded btn-lg">  Cancel Sales </button>  &nbsp;   &nbsp;   
								<button type="button" onclick="process_blood_purchase($(this).attr('data-text'),'Approve')" data-text="<?php echo $serial.'|'.$ticket_no; ?>" class="btn btn-success btn-rounded btn-lg">  Approve Sales </button>
								
							</div>
							  
						</td>
					</tr>


				</table>
			</form>
			 <?php 
		}
		

		function display_donation_test_form($serial,$ticket_no){ 
			$mydbm = new DBController(); $test_catogories = $mydbm->runBaseQuery("select * from blood_test_categories");
			?>
			<form method="post" id="donation_report_form">
				
				<input type="hidden" id="ticket_no" name="ticket_no" value="<?php echo $ticket_no?>" />

			<table class="table table-striped table-sm"> 
				<thead>
					<tr>
						<td class="table-primary bold ">What's the PCV Level ?</td>
						<td> 
							 <div class="input-group">									
								<label class="control-label font-18"> <input type="radio"   name="is_blood_fitted" value="yes" onchange="show_fitted_blood_form()" class="is_blood_fitted radio " /> Fitted </label> &nbsp; &nbsp; &nbsp; 
								<label class="control-label  font-18"> <input type="radio" checked  name="is_blood_fitted" value="no" onchange="show_fitted_blood_form()" class="is_blood_fitted radio  "/> Not Fitted </label>
							</div>
						</td>
					</tr>
					<?php 
						# check if comment has earlier been saved 
						 $oldcomment = ""; $lastTime = ""; 
						 
						 $rep = $mydbm->runBaseQuery("select comment,date_perform from customer_specimen where order_type='donate_blood' and fit_for_donation ='no' and ticket_no='".$ticket_no."'");						 
						 if(!empty($rep)): $oldcomment = $rep[0]['comment']; 
						 	$lastTime = "Updated : ". Carbon::parse($rep[0]['date_perform'])->diffForHumans();
						 endif; 

					?>
					<tr class="not_fitted_blood" style="visibility:invisible">
						<td> <input id="low_donation_comment" type="text" class="form-control font-16" value="<?php echo $oldcomment; ?>" placeholder="Comment on Report" /> 
							 <br>  <br> <small class="text-italic"> <?php echo $lastTime; ?></small>
						</td>
						<td>
							 <button onclick="submitLowDonationTestReport()" class="LowDonationReportBtn btn btn-success btn-rounded btn-lg ladda-button" data-style="expand-right" type="button"> Submit Report </button>
							
						</td>
					</tr>

					<tr class="text-dark font-weight-bold  fitted_blood">
						<td class="table-primary"> Choose Test type</td>
						<td> 
							<?php if(empty($test_catogories)):
									echo "<div class='alert alert-warning'> No Test  is available for Donation</div";
								else : ?>
									<select onchange="load_donation_categ_qtn($(this).val(),$(this).attr('data-text'))" data-text="<?php echo $ticket_no; ?>" class="form-control select font-16 font-weight-bold"> 
										<optgroup label="Select Test Type">
											<option value="">...</option>
											<?php 
											foreach($test_catogories as $k=>$v):?>
												<option value="<?php echo $v['id']."**".$v['test_qtn_ids']; ?>"> <?php echo  $v['name'];?> </option>
											<?php endforeach; 
											?>
										</optgroup>
									</select>
									
								<?php endif;
							 ?>
						</td>
					</tr>
				</thead>
				<tbody class="test_qtn_displayer fitted_blood">
					 
				</tbody>
			  
					  
			</table>
			<form>

		<?php 
		}

		if(isset($_POST['load_donation_categ_qtn'])){ $dbm = new DbTool(); $mydbm = new DBController(); 

			$infos = $dbm->clean($_POST['qtn_ids']); 
			if($infos==""):
				echo " <tr><td colspan='2'><div class='alert alert-warning w-100'> Please Select Test Type </div></td></tr> ";
				exit; 
			endif;


			$categ_info = explode("**",$infos);
			$qtn_ids = str_replace("|",",",$categ_info[1]);
			$ticket_no = $dbm->clean($_POST['ticket_no']);
			$questions = $mydbm->runBaseQuery("select * from blood_test_questions where id in ($qtn_ids) ");
		 	
		 	if(!empty($questions)):?>
 				<tr>
 					<td colspan="2">
 						<table class="table ">
 							<tr class="font-weight-bold">
 								<td>S/N </td>
 								<td>Tests </td>
 								<td>Observations  </td>
 							</tr>
 							<?php 
								foreach ($questions as $k=>$v) :  ?>
									<tr>
										<td><?php echo $k+1; ?></td>
										<td class="font-weight-medium"><?php echo $v['question']; ?></td>
										<td><?php 

											$saved_result = $mydbm->runBaseQuery("select result,updated_at from blood_donation_test_result where ticket_no='".$ticket_no."' and categ_qtn_id='".$categ_info[0]."' and test_qtn_id='".$v['id']."'");
											$expected_blood_type = $mydbm->runBaseQuery("select blood_type_id from customer_specimen where ticket_no='".$ticket_no."' and order_type='donate_blood'");

								 			switch($v['option_type']): ## bitwise / filling
												case "bitwise" :													
												?>
												<div class="col-sm-12"> <?php echo $v['if_false_val']; ?> &nbsp;&nbsp;&nbsp;
													<label class="switch">  
													  <input onchange="confirmSaveToBank()" type="checkbox" <?php echo (!empty($saved_result) && $saved_result[0]['result']==1)?" checked ":"" ?> value="<?php echo $categ_info[0]."**".$v['id']; ?>"  />
													  <span class="slider round"></span>
													</label> &nbsp; <span class="font-weight-medium"> <?php echo $v['if_true_val']; ?> </span>
												</div>
												<?php 												
												break; 

												default : ?>
													 <div class="form-group">
													 	<label class="control-label text-muted text-sm">Enter Result</label>
													 	<input class="donation_result form-control font-16 bordered border-primary" type="text" value="<?php echo (!empty($saved_result))? $saved_result[0]['result']:"" ?>" data-text="<?php echo $categ_info[0]."**".$v['id']; ?>"  placeholder="Sample : <?php echo $v['alt_val']; ?>" />
													 </div>
												<?php break;

											endswitch;
											# show last update
											if(!empty($saved_result)) echo "<small class='text-muted pull-right badge badge-light' style='font-size:9px'> Updated : " . Carbon::parse($saved_result[0]['updated_at'])->diffForHumans()."</small>"; 
										 ?></td>
									</tr>									

							<?php endforeach;
 							?>
 							<tr class="table-primary">
 								<td colspan="2"><div class="form-group">
 									<label class="font-weight-bold">Correct Blood Type : </label>
 									<select id="final_blood_type" name="final_blood_type" class="form-control font-weight-bold font-16">
 										<optgroup label="Approved Blood Type">
 											<?php $bloods = $mydbm->runBaseQuery("select id,name from blood_types");
 											if(!empty($bloods)):
 												foreach($bloods as $k=>$blood) :  ?>
 													<option value="<?php echo $blood['id']; ?>" <?php echo ($blood['id']==$expected_blood_type[0]['blood_type_id'])?" selected ":""?>> <?php echo $blood['name']; ?></option>
 												<?php endforeach; 
 											endif; ?>
 										</optgroup>
 									</select>
 								</div></td>
 								<td class="font-weight-bold"> 
 								   <div class="form-check form-check-flat">
		                              <label class="form-check-label">
		                                <input type="checkbox" onclick="confirmSaveToBank()"  value="yes" id="save_to_bank" name="save_to_bank" class="form-check-input" checked > Add Up To Blood Bank <i class="input-helper"></i></label>
		                            </div>
 								 </td>
 							</tr>
 							<tr class="table-primary">
 								<td class="font-weight-bold">Comment on Result</td>
 								<td colspan="2"><input type="text" name="donation_comment" id="donation_comment" class="form-control border-primary" placeholder="Comment on Result" /></td>
 							</tr>

 							<tr>
 								<td colspan="3" align="center"> <button onclick="submitDonationTestReport()" class="donationReportBtn btn btn-success btn-rounded btn-lg ladda-button" data-style="expand-right" type="button"> Submit Report </button></td>
 							</tr>
 						</table>
 					</td>
 				</tr>
		 	<?php 
		 	else :
		 		echo "<div class='alert alert-warning'> No Options to show for the test </div>";
		 	endif;

			
		}
		############  submit_low_donation_test_report  #####################

		if(isset($_POST['submit_low_donation_test_report'])){ $dbm = new DbTool(); $mydbm = new DBController();
			
			$ticket_no = $dbm->clean($_POST['ticket_no']); 			
			$donation_comment = $dbm->clean($_POST['donation_comment']);
			####################
			
			# start process - true first 
		   # print "<pre>"; print_r($_POST); exit; 

			$custom_info = $mydbm->runBaseQuery("select customer_id,sn from customer_tickets where ticket_no='".$ticket_no."'");
			$custom_param = ['customer_id'=>$custom_info[0]['customer_id'],
								'custom_ticket_id'=>$custom_info[0]['sn'],
								'ticket_no'=>$ticket_no, 'order_type'=>'donate_blood'
							]; 

			 $dbm->updateTb('customer_specimen',['comment'=>$donation_comment,'fit_for_donation'=>'no','date_perform'=>Carbon::now()],$custom_param);

			 echo "Report Save successfully";
		}


		############  submit_donation_test_report  #####################

		if(isset($_POST['submit_donation_test_report'])){ $dbm = new DbTool(); $mydbm = new DBController();
			
			$true_ans = @$_POST['true_ans']; 
			$false_ans = @$_POST['false_ans']; 
			$ticket_no = $dbm->clean($_POST['ticket_no']); 
			$text_refs =  @$_POST['text_refs'];
			$text_ans =  @$_POST['text_ans']; 
			$donation_comment = $dbm->clean($_POST['donation_comment']);
			####################
			$save_to_bank =  @$_POST['save_to_bank']; 
			$final_blood_type =  @$_POST['final_blood_type']; 
			
			# start process - true first 
		    # print "<pre>"; print_r($_POST); exit; 

			$custom_info = $mydbm->runBaseQuery("select customer_id,sn from customer_tickets where ticket_no='".$ticket_no."'");
			$custom_param = ['customer_id'=>$custom_info[0]['customer_id'],
								'custom_ticket_id'=>$custom_info[0]['sn'],
								'ticket_no'=>$ticket_no
							]; 

			update_blood_donation_test_result($custom_param,$true_ans, 1);
			update_blood_donation_test_result($custom_param,$false_ans, 0);	
			update_blood_donation_test_result($custom_param,$text_refs, $text_ans);	
			add_to_blood_stock($ticket_no,$custom_info[0]['customer_id'],$final_blood_type,$save_to_bank);
			update_customer_donor_history($custom_info[0]['customer_id'],$ticket_no,$final_blood_type); 			
 			$dbm->updateTb('customer_specimen',['comment'=>$donation_comment],$custom_param);

		}

		if(isset($_POST['process_blood_purchase'])){ $dbm = new DbTool(); $mydbm = new DBController();
			$stock = explode("|", $dbm->clean($_POST['data_text'])); 
			$compatibility = $dbm->clean($_POST['compatibility']); $investigation = $dbm->clean($_POST['investigation']);
			$action_type = $dbm->clean($_POST['action_type']);

			switch($action_type):
				case "Approve" : 
					$stock_data = ['sold'=>'yes','transaction_status'=>'sold']; 
					$spec_data = ['process_completed'=>'no','date_perform'=>Carbon::now(),
					'blood_compatibility'=>$compatibility,'blood_cross_matching'=>$investigation]; 
					## update 
					$dbm->updateTb('blood_stocks',$stock_data,['id'=>$stock[0]]); 
					$dbm->updateTb('customer_specimen',$spec_data,['blood_stock_id'=>$stock[0],'ticket_no'=>$stock[1]]);
					echo json_encode(['title'=>'Successful','text'=>'Purchase Approved Successfully','icon'=>'success']);					
				break; 

				case "Reject":


				break; 

			endswitch; 
			 
			 exit; 
			/*
				(
				    [process_blood_purchase] => this
				    [data_text] => 1|BHC/24/0003
				    [action_type] => Reject
				)

			*/
			 # $stock_info = $mydbm->runBaseQuery("select "); 

			 

			$custom_info = $mydbm->runBaseQuery("select customer_id,sn from customer_tickets where ticket_no='".$ticket_no."'");
			$custom_param = ['customer_id'=>$custom_info[0]['customer_id'],
								'custom_ticket_id'=>$custom_info[0]['sn'],
								'ticket_no'=>$ticket_no
							]; 
 
		}

		function update_customer_donor_history($customer_id,$ticket_no,$blood_type_id){ $dbm = new DbTool(); $mydbm = new DBController(); 
			$current_donation_date = $mydbm->runBaseQuery("select donation_date from customer_specimen where customer_id='".$customer_id."' and ticket_no='".$ticket_no."' and order_type='donate_blood'");
			# check history too 
			$last_donation = Carbon::parse($current_donation_date[0]['donation_date']);
			$dbm->updateTb('customer_info',['blood_type_id'=>$blood_type_id,'is_donor'=>1,'last_donation_date'=> $last_donation],['id'=>$customer_id]);
			echo "customer profile updated"; 
			# to be saved on donor history too 
		}

		function update_blood_donation_test_result($custom_param,$ans_type, $final_result ){ $dbm = new DbTool();
			if(!empty($ans_type)) : 
			$n = 0; 
			foreach($ans_type as $ans): 
					$categ_info = explode("**",$ans); # implies categ_qtn_id ** test_qtn_id
					# check if can explode ?
					if(count($categ_info)==2) : 
							$result = is_array($final_result) ? $final_result[$n] : $final_result ; 
							$all_param = array_merge($custom_param ,['categ_qtn_id'=>$categ_info[0],'test_qtn_id'=>$categ_info[1]]);
							$result_exists = $dbm->select("blood_donation_test_result",$all_param);
							if(empty($result_exists)):
								$dbm->insert("blood_donation_test_result",array_merge($all_param,['result'=>$result,'c_by'=>$_SESSION['admUser'],'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]));
								echo "Blood Donation Result Saved Successfully <br/>";
							else:
								$dbm->updateTb("blood_donation_test_result",['result'=>$result,'upd_by'=>$_SESSION['admUser'],'updated_at'=>Carbon::now()],$all_param);
								echo "Blood Donation Result Updated Successfully <br/>";
							endif;
					endif;
					$n++; 
				endforeach; 
			endif;  # end if ans_type is not empty

		}

		function add_to_blood_stock($ticket_no, $customer_id,$final_blood_type,$save_to_bank){
			# echo " $ticket_no, $customer_id, $final_blood_type, $save_to_bank "; 
			$dbm = new DbTool(); $mydbm = new DBController(); 
			$table = "blood_stocks";

			$search_cond = ['ticket_no'=>$ticket_no,'customer_id'=>$customer_id];
			$available = $dbm->select('blood_stocks',$search_cond); 

			switch($save_to_bank):

				case "yes": 
					# check if exist in blood bank - add - else update 
					if(!empty($available)):  # update it 

						$upd_param = ['blood_type_id'=>$final_blood_type,
						'updated_at'=>Carbon::now(),'status'=>'active']; 

						## update 
						$dbm->updateTb($table,$upd_param, $search_cond); 

						echo "Blood Stock Updated Successfully";

					else: # not available - add it 
						
						$ticket_date = $mydbm->runBaseQuery("select date_c from customer_tickets where ticket_no='".$ticket_no."' ");
						$date_donated = $ticket_date[0]['date_c'];
						$expiry_date = Carbon::parse($date_donated)->addDays(35);

						$add_param = ['blood_type_id'=>$final_blood_type,'created_at'=>Carbon::now(),
						'updated_at'=>Carbon::now(),'date_donated'=>$date_donated,
						'expiry_date'=>$expiry_date];

						# now save 
						$dbm->insert($table, array_merge($search_cond, $add_param)); 

						echo "New Blood Added To Stock Successfully";

					endif;

				break;

				case "no":

					if(!empty($available)):
						$remove_param = ['status'=>'inactive','updated_at'=>Carbon::now()];
						$dbm->updateTb($table, $remove_param, $search_cond ); 
						echo "Blood Sample has been removed from Stock Successfully"; 
					
					else:

						echo "Blood Sample is Not Available in Stock "; 

					endif;


				break; 

			endswitch;
		}

		
		function display_blood_test_form($serial,$ticket_no){ $dbm = new DbTool(); $func = new functions(); 
			$criterial = array('bill_type_id'=>$serial,'status'=>'active'); 
				$fields = array('c_by','sn','bill_type_id','name','result','unit','has_unit','ref_val','has_ref_val');
				$temp_exist= $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
				
				#$checked = (is_null($temp_exist))?"checked":""; 
				#$visible = (is_null($temp_exist))?"visible":"invisible"; 
				$visible = "invisible"; 
				$checked = ""; 
					# echo toggle_specimen_form($checked); 
					echo use_template_form($visible);  
					echo "<p>&nbsp;</p>";
					echo display_specimen_result_template($serial,$ticket_no);  
		}
		 
		function toggle_specimen_form($checked){ ?>
			<div class="row">
				<div class="col-md-11 ">
					<label class="switch pull-right">  
					  <input type="checkbox" <?php echo $checked ?> onchange="togTemplateForm($(this).prop('checked'),$('#specimen_template_form'))">
					  <span class="slider round"></span>
					</label> &nbsp; <span class=" pull-right bold"> show template form &nbsp; &nbsp;  </span>
				</div>
				<div class="col-md-1">&nbsp;</div>
			</div>
		<?php }
		
		function get_ticket_sum_price($ticket_no){
			$mydbm = new DBController(); $dbm = new DbTool(); 
			# $specs = $dbm->select('customer_specimen',array('ticket_no'=>$ticket_no,'status'=>'active','finalized'=>'yes'));
			$specs = $mydbm->runBaseQuery("SELECT * FROM customer_specimen WHERE status = 'active' AND ticket_no ='".$ticket_no."' AND finalized='yes'");
			if(!empty($specs)){
				$specs = $dbm->getFields($specs,array('bill_price'));
				$total = array_sum($specs['bill_price']);
			}
			return empty($specs)?0:$total;
		}
		 
		function get_age_range($value,$age_type){
			$result = '';
			switch ($age_type){ 
				case "week":{
					if($value <=52) $result = 'infant'; 
					else if($value <=884) $result = 'youth'; 
					else  $result = 'adult'; 
				} break; 
				case "month":{
					if($value <=12) $result = 'infant';
					else if($value <=204) $result = 'youth';
					if($value <=204) $result = 'youth';
					else $result = 'adult';
				} break; 
				
				case "year": {
					if($value <=17) $result = 'youth'; 
					else $result = 'adult';
				} break; 
			} # end switch 
			return $result; 
		}
		
		
		### used under ticket result computation 
		function display_specimen_result_template($bill_type_id,$ticket_no=null){
			$dbm = new DbTool();
			$criterial = array('bill_type_id'=>$bill_type_id,'status'=>'active'); 
			$fields = array('temp_type','raw_text_val','c_by','sn','bill_type_id','name','result','unit','has_unit','ref_val','has_ref_val','age_range');
			$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
			$test_comment = $dbm->resort($dbm->getFields($dbm->select("customer_specimen",array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'status'=>'active')),array('comment'))); 
			if(is_null($exist)) { return "<div class='alert alert-warning'> no template yet </div>"; }
			else { 
				switch($exist['temp_type'][0]){  # param_form | text_form
					case "text_form": { ?>
					<!-- display a dialog box for loading tinymice  -->
					<div class="row"> 
						<div class="col-md-12">  
							<p class=" dark text-capitalize">  <span class="bold text-danger">Note that </span> this template  <span class="bold text-info">requires users input text, </span> click the buttons below to view or modify the contents  </p>
							<table class="table table-nogap"><tbody>
								<tr>  <td> Result Computed ?  </td>  <td>  Computed Result </td> </tr>
								<tr>
									<td> <button onclick="display_my_raw_text_submit($(this).attr('data-text'),$('#raw_inputed_text_view'))" type="button" class="btn btn-info" data-toggle="modal" data-target="#spec_raw_inputed_text" data-text="<?php echo $ticket_no."|".$bill_type_id; ?>"> View  </button> </td>  
									<td> <button onclick="load_user_system_temp_values($(this).attr('data-text'),'raw_inputed_text_form')" type="button" class="btn btn-success " data-toggle="modal" data-target="#spec_text_input_form" data-text="<?php echo $ticket_no."|".$bill_type_id; ?>"> Modify  </button> </td> 
								</tr>								
							</tbody></table>
						</div>
					</div>
					<?php } break; 
					
					case "param_form": { ?> 
			
				<div class="row"> 
					<div class="col-md-12 col-inverse-info">  
						<p class="text-danger bold text-capitalize"> Use the checkbox to select the result type you want  </p>
							<table class="table table-nogap table-hover "> 
								<thead>
									<tr class="text-capitalize bold  table-info "> 
										<td class="serial"> SN </td>
										<td> name </td>
										<td> result </td>
										<td> unit </td>
										<td> ref. value </td>
									</tr>
								</thead><tbody>
									<?php $n = 0;  
									foreach($exist['name'] as $output) {  
										# check if result is saved before  
										$prev_result = $dbm->getFields($dbm->select('customer_specimen_result',array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'template_id'=>$exist['sn'][$n],'status'=>'active')),array('result','name','sn','created_at'));
									?> 
										<tr class="table-info"> 
											<td class="serial">  <div class="icheck-square"> <input onclick="highlight_check_rows()" type="checkbox" class="checkbox stud_box" name="checkboxes[]" value="<?php echo $exist['sn'][$n]; ?>" checked /> </div> </td>
											<td> <?php echo $output; ?> </td>
											<td> <input type="text" name="spec_result[]" class="form-control border border-primary bold font-16 input-sm" style="max-width:150px;" placeholder=" result " value="<?php echo $prev_result['result'][0] ?? ""; ?>" /> </td>
											<td> <?php echo $exist['unit'][$n]; ?> </td>
											<td> <?php echo $exist['ref_val'][$n]."&nbsp; <small> (".$exist['age_range'][$n].")</small>"; ?> </td>
										</tr>
									<?php $n++; } ?>
									<tr> 
										<td colspan="5">&nbsp;  </td> 
									</tr> 
									<tr> 
									<td colspan="2"> <div class="form-group"> <div class="col-sm-12"> <input type="text" name="test_comment" id="test_comment" class="form-control border border-primary bold font-16 input-sm" style="" placeholder="Test Comment ... " value="<?php echo $test_comment['comment']; ?>" /> </div></td> 
									<td colspan="2"> <div class="form-group"> <div class="col-sm-12"> <input type="date" name="date_perform" id="date_perform" class="form-control border border-primary bold font-16 input-sm" title="Date Performed " style="" placeholder="Date Performed " value="<?php echo empty($prev_result['date_c'][0])?date("m/d/Y"):$prev_result['date_c'][0]; ?>" /> </div></td> 
									<td  colspan="2"> <button onclick="save_specimen_result()" id="save_specimen_result_btn" data-text="<?php echo $ticket_no."|".$bill_type_id; ?>" class="btn btn-block btn-info btn-rounded btn-lg ladda-button" data-style="expand-right"> Save&nbsp; <i class="fa fa-save"> </i> </button> </td>
									</tr> 
								</tbody>
								
							</table> 
					</div>  <!--- ./ row -->
				</div>  <!--- ./ row --> 
				<?php   
					} break;  ## end case param_form 
				}  ## end switch case temp_type
			 
				} # end not null 
		}
		
		
		function display_specimen_result_printout($bill_type_id,$ticket_no,$print_option="all"){
			$dbm = new DbTool(); $mydal = new DAL(); 
			$criterial = array('bill_type_id'=>$bill_type_id,'status'=>'active'); 		
			$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$mydal->TableFields('specimen_result_template'));
			$cond = array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'status'=>'active'); 
			$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),$mydal->TableFields('customer_specimen')); 									
			// $bill_info = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_type_id,'status'=>'active')),$mydal->TableFields('bill_types'));						
			if(is_null($exist)) { return "<div class='alert alert-warning'> no template yet </div>"; }
			else { $n = 0;  
				if($print_option!="single"){
					# echo "<tr><td colspan='5' class=''> <small> <b> <u>".@$bill_info['name'][0]."</u> </b></small></td></tr>"; 
					echo "<tr><td colspan='5' class=''> <small> <b> <u>".getBillName($bill_type_id)."</u> </b></small></td></tr>"; 
				}
				foreach($exist['name'] as $output) {  
					# check if result is saved before  
					$prev_result = $dbm->getFields($dbm->select('customer_specimen_result',array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'template_id'=>$exist['sn'][$n],'status'=>'active')),array('result','name','sn'));
                            ## check of result is saved 
                    if(!empty($prev_result)) {
				?> 
					<tr class="no-padding no-margin" style="<?php echo ($n%2==1)?'background-color:#F2f2f2;':'background-color:#FFF;';?>"> 										
						<td> <?php echo $output; ?> </td>
						<td>    <?php echo $prev_result['result'][0]; ?>   </td>
						<?php if($exist['has_unit'][$n]=="true") { ?> <td> <?php echo rem_p_tag($exist['unit'][$n]); ?> </td> <?php } ?>
						<?php if($exist['has_ref_val'][$n]=="true") { ?> <td> <?php echo $exist['ref_val'][$n]; ?> </td> <?php } ?>
						
					</tr>
				<?php 
                        } ## end not empty - for searched result
                    $n++; } 
                                
                                
				if($specimens['comment'][0]!=""){
					echo "<tr> <td colspan='4' style='font-size:18px; white-space:-o-pre-wrap; white-space:break-word; white-space:pre-wrap; white-space:pre-wrap; '> <hr/>   <strong> Comment : </strong>  ".$specimens['comment'][0]." </td> </tr>"; 
					}
				} # end not null 
		}
		
		function rem_p_tag($text){ # remove paaragraph tags 
			$text = str_replace("<p>","",$text);
			$text = str_replace("</p>","",$text);
			return $text;
		}
		/*************/
		function correct_age($age,$text){
			if(is_numeric($age) && $age>1){ return $age." ".$text."s"; }
				else return $age." ".$text;
		}
		/*******************/ 
		function use_template_form_new($visible='invisible'){  
			?>
			<div class="row <?php echo $visible; ?> " id="specimen_template_form">
			
				<div class="col-md-1 float-left "> &nbsp; </div>
				
				<div class="col-md-11 bg-inverse-info float-left ">
					<div class="card"><div class="card-body">
					<p class="h5 text-capitalize bold font-14 text-info"> create result template  </p> 
					<div class="form-group row selection">
						<label for="title" class="col-sm-4 col-form-label"> Result Name  </label>
						<div class="col-sm-8">
							<div class="input-group">									
								<input type="text" id="result_name" name="result_name" value="" class="form-control border-primary font-14 imput-sm" placeholder="Result Name"> 
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
					  
					  <div class="form-group row selection">
						<label for="title" class="col-sm-4 col-form-label"> Age Range  </label>
						<div class="col-sm-8">
							<div class="input-group">									
								<select id="age_range" class="form-control border-primary font-16"> 
									<option value="">... </option>
									<option value="infant"> 0 - 12 Months (Infant) </option>
									<option value="youth"> 1 - 17 Years (Youth) </option>
									<option value="adult"> 18 - Above (Adult) </option>
								</select>
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
					  
					  
					  <div class="form-group row selection">						
						<div class="col-sm-4">
							<label class="switch">  
							  <input type="checkbox" id="has_unit" checked onchange="togInputDisabled($(this).prop('checked'),$('#unit'))">
							  <span class="slider round"></span>
							</label> &nbsp; <span class=" "> Unit </span>
						</div>
						<div class="col-sm-8">
							<div class="input-group">									
								<input type="text" id="unit" name="unit" value="" class="form-control border-primary font-14 imput-sm" placeholder="Unit"> 
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->

					  <div class="form-group row selection">						
						<div class="col-sm-4">
							<label class="switch">  
							  <input type="checkbox" id="has_ref_val" checked onchange="togInputDisabled($(this).prop('checked'),$('#ref_val'))">
							  <span class="slider round"></span>
							</label> &nbsp; <span class=""> Ref. Val. </span>
						</div>
						<div class="col-sm-8">
							<div class="input-group">									
								<input type="text" id="ref_val" name="ref_val" value="" class="form-control border-primary font-14 imput-sm" placeholder="Reference Value"> 
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
					  
					  <div class="form-group row selection">
						<div class="col-sm-6"></div>
						<div class="col-sm-6"> <button onclick="save_template_settings()" id="save_template_settings" class="btn btn-info btn-rounded btn-lg btn-block ladda-button" data-style="expand-right"> Save Settings &nbsp; <i class="fa fa-cog"></i> </button> </div> 
					  </div>
					  
				</div></div></div> <!-- ./ card-body --> <!-- ./ card --> <!-- ./ col-md-8-->
			</div> <!-- ./ row-->
		<?php  
		}
		/*******************/
		
		/*******************/ 
		function use_template_form($visible='invisible'){  
			?>
			<div class="row <?php echo $visible; ?> " id="specimen_template_form">
			
				 
				<div class="col-md-12">
					<div class="card"><div class="card-body">
					<p class="h5 text-capitalize bold font-14 text-info"> cick the button below to create template  </p> 
					   
					  <div class="form-group row selection">
						 
						<div class="col-sm-12"> <a target="_blank" href="billingsys.php"  class="btn btn-info btn-rounded btn-sm btn-block " > Create Template Here &nbsp; <i class="fa fa-cog"></i> </a> </div> 
					  </div>
					  
				</div></div></div> <!-- ./ card-body --> <!-- ./ card --> <!-- ./ col-md-8-->
			</div> <!-- ./ row-->
		<?php  
		}
		/*******************/
		
		// display_my_raw_text_submit  : info:data_text  
		if(isset($_POST['display_my_raw_text_submit'])){
			$dbm = new dbTool(); 
			$info = explode("|",$dbm->clean($_POST['info'])); ## ticket_no | bill_type_id 
			$records  = $dbm->getFields($dbm->select('customer_specimen_result',array('ticket_no'=>$info[0],'bill_type_id'=>$info[1],'status'=>'active')),array('raw_text_result','sn'));
			if(is_null($records)){
				echo " No Result Found ";
			}
			else  { echo $records['raw_text_result'][0]; }
		}
		/*****************************/
		
		// load_user_system_temp_values  : info:data_text  
		if(isset($_POST['load_user_system_temp_values'])){
			$dbm = new dbTool(); 
			$info = explode("|",$dbm->clean($_POST['info'])); ## ticket_no | bill_type_id 
			$specimen  = $dbm->getFields($dbm->select('customer_specimen',array('ticket_no'=>$info[0],'bill_type_id'=>$info[1],'status'=>'active')),$mydal->TableFields('customer_specimen'));
			/* result computed */ $records  = $dbm->getFields($dbm->select('customer_specimen_result',array('ticket_no'=>$info[0],'bill_type_id'=>$info[1],'status'=>'active')),array('raw_text_result','sn'));
			if(is_null($records)){ ## search template and fill there  | for textarea 
				 $criterial = array('bill_type_id'=>$info[1],'temp_type'=>'text_form','status'=>'active'); 
						$fields = array('c_by','sn','bill_type_id','raw_text_val');
						/* default text */ $exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
					if(!is_null($exist)){  	
						echo json_encode(['text'=>$exist['raw_text_val'][0],'date_perform'=>date('Y-m-d')]); }
					}
			else  { echo json_encode(['text'=>$records['raw_text_result'][0],'date_perform'=>$specimen['date_perform'][0]]); }
		}
		/*****************************/
		if(isset($_POST['save_template_settings'])){
			$dbm = new dbTool(); 
			$temp_type = $dbm->clean(@$_POST['temp_type']); //  text_form | param_form
			$raw_text_val = @addslashes(@$_POST['raw_text_val']); //addslashes stripslashes
			$name = $dbm->clean(@$_POST['name']);
			$age_range = $dbm->clean(@$_POST['age_range']);
			$has_unit = $dbm->clean(@$_POST['has_unit']);
			$has_ref_val = $dbm->clean(@$_POST['has_ref_val']);
			##$real_has_unit = ($has_unit==true)?'yes':'no';
			##$real_has_ref_val = ($has_ref_val==true)?'yes':'no';
			$unit =  @$_POST['unit'];
			$ref_val = $dbm->clean(@$_POST['ref_val']);	
			$bill_type_id = $dbm->clean(@$_POST['bill_type_id']);	
			$mode = $dbm->clean(@$_POST['mode']);			
			$upd_serial = $dbm->clean(@$_POST['upd_serial']);			
			/**************************************/
			$msg = $name." &nbsp;";
			$msg .= $age_range." &nbsp;";
			$msg .= $has_unit." &nbsp;";
			$msg .= $has_ref_val." &nbsp;";
			$msg .= $unit." &nbsp;";
			$msg .= $ref_val." &nbsp;";
			/**************************************
				save_template_settings:'this',name:result_name.val(),age_range:age_range.val(), bill_type_id:bill_type_id.val(),mode:mode
				has_unit:has_unit.prop('checked'),has_ref_val:has_ref_val.prop('checked'), unit:unit.val(),ref_val:ref_val.val()
			/***************************************/
			switch($temp_type){
				case "text_form" :{ 
					$data = array('bill_type_id'=>$bill_type_id,'temp_type'=>'text_form','raw_text_val'=>$raw_text_val,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time())); 
					$updData = array('bill_type_id'=>$bill_type_id,'temp_type'=>'text_form','raw_text_val'=>$raw_text_val,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
					 
				 switch($mode){ 
					case "new":{ ## called : load_user_system_temp_values 
						$criterial = array('bill_type_id'=>$bill_type_id,'temp_type'=>'text_form','status'=>'active'); 
						$fields = array('c_by','sn','bill_type_id','raw_text_val');
			 
						$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
						 if(is_null($exist)){ 
							$dbm->insert('specimen_result_template',$data); 
							echo json_encode(array('title'=>'Created Successful','text'=>'Template Saved Successfully - in Word-Text Form  Mode','icon'=>'success'));
						 }
						 else{						
							$dbm->updateTb('specimen_result_template',$updData,$criterial); 
							echo json_encode(array('title'=>'Updated Successfully','text'=>'Template Updated Successfully - in Word-Text Form  Mode','icon'=>'info'));
						 } 
						 ## echo json_encode(array('title'=>'Successful','text'=>"raw text data created  ",'icon'=>'success'));
					} break; 
					case "update":{
						$exist = $dbm->getFields($dbm->select('specimen_result_template',array('bill_type_id'=>$bill_type_id,'sn'=>$upd_serial,'status'=>'active')),$fields);
						if(is_null($exist)){ 
							 echo json_encode(array('title'=>'Update Not Found ','text'=>' No Criterial Found for Update ','icon'=>'error'));
						}
						else{
							$dbm->updateTb('specimen_result_template', $updData,array('bill_type_id'=>$bill_type_id,'sn'=>$upd_serial,'status'=>'active'));
							echo json_encode(array('title'=>'Updated Successfully','text'=>'Template Updated Successfully - in Word-Text Form  Mode','icon'=>'success'));
						}						 
					} break; 
					
				 } # end switch mode for raw text 
				 
				//  echo json_encode(array('title'=>'Successful','text'=>"raw text data form received ",'icon'=>'success'));
					
				} break; 
				
				case "param_form" :{
				
			## check database 
			 $criterial = array('bill_type_id'=>$bill_type_id,'name'=>$name,'age_range'=>$age_range,'status'=>'active'); 
			 $fields = array('c_by','sn','bill_type_id','age_range','name','result','unit','has_unit','ref_val','has_ref_val');
			 # $exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
			 $data = array('bill_type_id'=>$bill_type_id,'temp_type'=>'param_form','age_range'=>$age_range,'name'=>$name,'unit'=>$unit,'has_unit'=>$has_unit,'ref_val'=>$ref_val,'has_ref_val'=>$has_ref_val,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time())); 
			 $updData = array('bill_type_id'=>$bill_type_id,'temp_type'=>'param_form','age_range'=>$age_range,'name'=>$name,'unit'=>$unit,'has_unit'=>$has_unit,'ref_val'=>$ref_val,'has_ref_val'=>$has_ref_val,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time())); 
			
			switch($mode){
				case "new": { 
					 $exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
					 if(is_null($exist)){ 
						$dbm->insert('specimen_result_template',$data); 
						echo json_encode(array('title'=>'Successful','text'=>' Setting Saved Successfully with this info : '.$msg,'icon'=>'success'));
					 }
					 else{						
						 echo json_encode(array('title'=>'Template Exists ','text'=>' This template has already been saved earlier, recheck it to update  : '.$msg,'icon'=>'error'));
					 } 
				} break; 
				
				case "update": {  
					$exist = $dbm->getFields($dbm->select('specimen_result_template',array('bill_type_id'=>$bill_type_id,'sn'=>$upd_serial,'status'=>'active')),$fields);
					if(is_null($exist)){ 
						 echo json_encode(array('title'=>'Update Not Found ','text'=>' No Criterial Found for Update '.$msg,'icon'=>'error'));
					}
					else{
						$dbm->updateTb('specimen_result_template', $updData,array('bill_type_id'=>$bill_type_id,'sn'=>$upd_serial,'status'=>'active'));
						echo json_encode(array('title'=>'Update Successful','text'=>' Setting Updated Successfully with this info : '.$msg,'icon'=>'success'));
					}
				} break;  
			} # end switch 
			 } break;  # end param_form switch case 
				
			} # end switch 	main temp_type switch 
		 } #### 
		
		/*****  save_specimen_spreadsheet:'this', temp_id:temp_id, scores:scores,custom_bill_info:custom_bill_info  *******/ 
		if(isset($_POST['save_specimen_spreadsheet'])){ $dbm = new DbTool();
			$temp_id = $_POST['temp_id'];	// array 
			$scores = $_POST['scores'];		// array 
			$custom_bill_info = explode('|',$_POST['custom_bill_info']);	## ticket_no  |  bill_type_id
			$ticket_no = $custom_bill_info[0];
			$test_comment = $_POST['test_comment']; 
			$bill_type_id = $custom_bill_info[1];
			$date_perform = $_POST['date_perform']; 
			$date_c = empty($date_perform)?date('m/d/Y'):$date_perform;
			
			$msg = "ticket no ".$ticket_no; 
			$msg.= "&nbsp; bill-id :  ".$bill_type_id;
			$msg.= "&nbsp; template id :  ".join(' and ',$temp_id);
			$msg.= "&nbsp; result :  ".join(' or ',$scores);
			
				#############################################
		   if(!is_null($temp_id)){   ## fetched from template data  
			## delete existing results and resave the new selected 
			$n = 0;  
			 $dbm->deleteRow("customer_specimen_result",array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'cur_state'=>'created','status'=>'active')); 
			 
			   foreach($temp_id as $cid){
				   $temp_info = $dbm->getFields($dbm->select('specimen_result_template',array('sn'=>$cid)),array('name'));
				   if(!is_null($temp_info)) $temp_info = $dbm->resort($temp_info);
				  
				   $data = array_merge(array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,
				   'template_id'=>$cid,'temp_type'=>'param_form','result'=>$scores[$n],'c_by'=>$_SESSION['admUser'],
				   'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),$temp_info); 
				   $dbm->insert('customer_specimen_result',$data);
				 $n++;  
			   } # end foreach
				## update test result on specimen id  
				$dbm->updateTb("customer_specimen",['comment'=>$test_comment,'date_perform'=>$date_perform],['ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'status'=>'active']); 
			  ## update students faculty and department --
			  ##  $fac_info = $dbm->getFields($dbm->select('uploaded_courses',array('sn'=>$course_id[0])),array('fact_id','dept_id'));
			  
		   } # end not null  
			
			echo json_encode(array('title'=>' Result Saved ','text'=>$msg,'icon'=>'success'));
		}	
		/*****  save_specimen_text_result:'this',
						custom_bill_info:custom_bill_info,result:result   *******/ 
		if(isset($_POST['save_specimen_text_result'])){ 	$dbm = new DbTool();		
			// print_r($_POST['date_perform']);exit;
			$custom_bill_info = explode('|',$_POST['custom_bill_info']);	## ticket_no  |  bill_type_id
			$ticket_no = $custom_bill_info[0];
			$bill_type_id = $custom_bill_info[1];
			$result = addslashes($_POST['result']); 
			$temp_id = $dbm->getFields($dbm->select('specimen_result_template',array('bill_type_id'=>$bill_type_id,'temp_type','temp_type'=>'text_form','status'=>'active')),array('sn','temp_type'));
			//$test_comment = $_POST['test_comment']; 
			$date_perform = $_POST['date_perform'];
			#############################################
			$criterial = array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'temp_type'=>'text_form','status'=>'active');
			$exist = $dbm->getFields($dbm->select('customer_specimen_result',$criterial),array('sn','raw_text_result'));
			$data = array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'temp_type'=>'text_form',
				   'template_id'=>$temp_id['sn'][0],'raw_text_result'=>$result,'c_by'=>$_SESSION['admUser'],
				   'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()); 
			$updData = array('raw_text_result'=>$result,'upd_by'=>$_SESSION['admUser'],'updated_at'=>Carbon::now()); 
			if(is_null($exist)){
				$dbm->insert('customer_specimen_result',$data);
				$dbm->updateTb("customer_specimen",array('date_perform'=>$date_perform),array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'status'=>'active')); 
				echo json_encode(array('title'=>' Result Saved Successfully','text'=>'Your text result has been saved','icon'=>'success'));
				}
			else {
				$dbm->updateTb('customer_specimen_result',$updData,$criterial);
				$dbm->updateTb("customer_specimen",array('date_perform'=>$date_perform),array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_type_id,'status'=>'active')); 
				echo json_encode(array('title'=>' Result Updated Successfully ','text'=>'Your text result has been updated','icon'=>'info'));
			} 
		} 
		
	/***** view_ticket_analysis:'all',ticket_no:ticket_no,comp_status:comp_status  *******/ 
		if(isset($_POST['view_ticket_analysis'])){ 	$dbm = new DbTool();
			$ticket_no =  base64_decode($dbm->clean($_POST['ticket_no']));  $comp_status = $dbm->clean($_POST['comp_status']);
			$criterial =  ['ticket_no'=>$ticket_no,'process_completed'=>$comp_status,'status'=>'active']; 		
			$exist = $dbm->select('customer_specimen',$criterial);
			$ticket_info = $dbm->select('customer_tickets',['ticket_no'=>$ticket_no]);

			# print("<pre>"); 

			# print_r($exist); exit; 

			$tcost = 0; if(!empty($exist)){ ?>
				
			<div class="row">
				<div class="col-md-6 float-left"> 
					<div class="form-group row selection">
							<label for="title" class="col-sm-4 col-form-label text-capitalize"> test alternative name  </label>
							<div class="col-sm-8">
								<div class="input-group">	 							
									<input style="font-size:14px; height:30px; " type="text" id="alt_test_name" name="alt_test_name" value="<?php echo $ticket_info[0]['alt_test_name']; ?>" class="form-control border-primary" placeholder="Alt. Test Name"> 									
								</div>
							</div> <!-- ./ col-sm-8 -->
						  </div> <!-- ./ form-group -->
				</div> <!-- ./ col-md-6 -->
				
				<div class="col-md-6 float-left"> 
					<div class="form-group row selection">
							<label for="title" class="col-sm-4 col-form-label text-capitalize">  general comment </label>
							<div class="col-sm-8">
								<div class="input-group">									
									<input style="font-size:14px;  height:30px;" type="text" id="comment" name="comment" value="<?php echo $ticket_info[0]['comment']; ?>" class="form-control border-primary" placeholder="Coment"> 									
								</div>
							</div> <!-- ./ col-sm-9 -->
						  </div> <!-- ./ form-group -->
				</div>
			</div> <!--. row -->
			
			
				<table class="table table-nogap jambo_table  "><tbody class="">
				<tr class="table-primary bold text-uppercase font-11"><td class="serial"> sn </td>   <td> Order type </td>  <td> result computed  </td>  <td> date  </td> </tr>
				<?php $n = 0; $analysis = "";  
				foreach($exist as $k=>$v){ 
					if($v['order_type']=="perform_test"):
					$bill_type = $dbm->select('bill_types',['sn'=>$v['bill_type_id'],'status'=>'active']);
					$tcost += $v['bill_price']; 
					/********* view result if computed ************/					 
					$result_saved = $dbm->select('customer_specimen_result',['ticket_no'=>$ticket_no,'bill_type_id'=>$v['bill_type_id'],'status'=>'active']);
					$analysis .= (empty($result_saved))?"no|":"yes|"; 

				elseif($v['order_type']=="donate_blood"):
					$bill_type = $dbm->select('blood_types',['id'=>$v['blood_type_id']]);
					$tcost += $v['bill_price']; 
					$result_saved = $dbm->select('blood_donation_test_result',['ticket_no'=>$ticket_no]);
					$analysis .= (empty($result_saved))?"no|":"yes|";  

				elseif($v['order_type']=="buy_blood"):
					# $stock = $dbm->select('blood_stocks',['id'=>$v['blood_stock_id']]);
					$bill_type = $dbm->select('blood_types',['id'=>$v['blood_type_id']]);
					$tcost += $v['bill_price']; 
					$result_saved =  $mydbm->runBaseQuery("select * from blood_stocks where id='".$v['blood_stock_id']."' and transaction_status not in ('donated','onsale')"); #  
					$analysis .= (empty($result_saved))?"no|":"yes|"; 
				endif;

				 ?> 
				<tr>  
				 <td class="serial"> <div class="icheck-square">  <input type="checkbox" name="specimen_results_check[]" value="<?php if($v['order_type']=='perform_test') : echo $v['bill_type_id']; elseif($v['order_type']=='donate_blood'): echo $v['blood_type_id']; endif;   ?>" class="checkbox specimen_results_check"  <?php echo (is_null($result_saved))?" disabled ":" checked "; ?> >  </div> </td> 
				 <td> <?php if($v['order_type']=="donate_blood") { echo  "<strong> Donation</strong>: "; } elseif($v['order_type']=="buy_blood") { echo "<strong> Blood Purchase</strong> &nbsp; &nbsp; "; }  echo $bill_type[0]['name']; ?> </td>
				 <td> <span class="fa <?php echo (is_null($result_saved))?" fa-times text-danger ":" fa-check text-success "; ?>   fa-2x "></span> &nbsp; &nbsp; <?php echo (is_null($result_saved))?" no ":" yes "; ?>  </td> 	
				 <td> <?php echo !empty($result_saved)? Carbon::parse($result_saved[0]['updated_at'])->diffForHumans() : "-:-"; ?> </td> 	
				</tr> 					 
				<?php $n++; } # end foreach  ?>  
				<tr> <td colspan="4"></td>  &nbsp;  </tr>				 
				<tr> <td colspan="4">  &nbsp; &nbsp; &nbsp; &nbsp;<button onclick="print_results($(this).attr('for'))" id="finalize_test_process" class="btn btn-success btn-rounded bold pull-right ladda-button" data-style="zoom-in" for="<?php echo base64_encode($ticket_no);?>" > Print Selected (Combined) </button>    
					<button onclick="finalize_test_process($(this).attr('for'),$(this).attr('data-text'))" id="finalize_test_process" class="btn btn-info btn-rounded bold pull-right ladda-button" data-style="zoom-in" data-text="<?php echo $analysis;?>" for="<?php echo $ticket_no;?>" > Finalize Result &nbsp; <i class="fa fa-check "></i>  </button> &nbsp;  </td>   </tr>
			</tbody>
			</table>
		<?php 	} # end null 
		else {
			echo "<div class='alert alert-warning'>  no specimen exists </div>";
			} 
		} # end post 
			
		

		/********************************************/
		/** finalize_test_process:'all',ticket_no:ticket_no,comment:comment,alt_test_name:alt_test_name **/
		if(isset($_POST['finalize_test_process'])){  $dbm = new DbTool(); 	
			$ticket_no = $dbm->clean($_POST['ticket_no']);  $comment = $dbm->clean($_POST['comment']); $alt_test_name = $dbm->clean($_POST['alt_test_name']);
			$msg = "Test Finalized Successfully  - with comment : $comment , alt. name : $alt_test_name"; 
			$ticket_upd = array('comment'=>$comment,'alt_test_name'=>$alt_test_name,'process_completed'=>'yes','fin_by'=>$_SESSION['admUser'],'date_fin'=>Carbon::now());
			$specimen_upd = array('process_completed'=>'yes');
			$criterial = array('ticket_no'=>$ticket_no,'process_completed'=>'no');
			$dbm->updateTb('customer_tickets',$ticket_upd,$criterial);
			$dbm->updateTb('customer_specimen',$specimen_upd,$criterial);
			echo json_encode(array('title'=>'Successful','text'=>$msg,'icon'=>'success','href'=>'tickets.php'));
		}
		/********************************************************/
		####################################################################
		 
		####
		if(isset($_POST['save_new_user'])){	// echo json_encode(array('icon'=>'success','text'=>'i can see you','title'=>'weldone'));
			/***************************/
			$dbm = new DbTool(); 
			$surname = $dbm->clean($_POST['surname']);
			$firstname = $dbm->clean($_POST['firstname']); 	$othername = $dbm->clean($_POST['othername']);
			$phone = $dbm->clean($_POST['phone']); 	$sex = $dbm->clean($_POST['sex']);
			/**$dob = $dbm->clean($_POST['dob']);**/ 	$address = $dbm->clean($_POST['address']);
			$psw = $dbm->clean($_POST['psw']); 	$date_employ = $dbm->clean($_POST['date_employ']);
			$role_id = $dbm->clean($_POST['role_id']); 	$user_id = $dbm->clean($_POST['username']);
			$mode = $dbm->clean($_POST['mode']); 	/**$serial = $dbm->clean($_POST['serial']);**/
			$fullname = $surname." ".$firstname." ".$othername;
			/***************************/
			 $data = array('surname'=>$surname,'firstname'=>$firstname,'midname'=>$othername,'fullname'=>$fullname,
				'gender'=>$sex,'address'=>$address,'phone'=>$phone, 'password'=>$psw,
				'enc_psw'=>password_hash($psw,PASSWORD_DEFAULT),'user_id'=>$user_id, 'c_by'=>$_SESSION['admUser'],'date_employ'=>$date_employ);
			 
			$id_exist = $dbm->getFields($dbm->select('users',array('user_id'=>$user_id,'acct_status'=>'active')),array('sn','user_id'));
			$phone_exist = $dbm->getFields($dbm->select('users',array('phone'=>$phone,'acct_status'=>'active')),array('sn','user_id'));
			 if(!is_null($id_exist)){
				echo json_encode(array('title'=>'Duplicate ID','text'=>"this user-name [' $user_id '] already exists, enter another Id ",'icon'=>'error'));
				} 
				else if(!is_null($phone_exist)){
					echo json_encode(array('title'=>'Duplicate Phone','text'=>"this phone number [' $phone '] already exists, enter another phone number ",'icon'=>'error'));
					}
				else { $dbm->insert('users',$data);
					# assign role also 
					$myrole =  $dbm->getFields($dbm->select("myroles",array('user_id'=>$user_id,'role_id'=>$role_id,'status'=>'active')),array('user_id','role_id','sn'));
						if(is_null($myrole)){							
							$dbm->insert("myroles",array('user_id'=>$user_id,'role_id'=>$role_id));
						}
					echo json_encode(array('title'=>'Account Created Successfully','text'=>"Congratulations, New Admin has been created successfully with User-ID [' $user_id '], name : $fullname, and Role as a [' $role_id '] ",'icon'=>'success'));
					}
			/******************************/
		}
		/********************************************************/
		
		# filtering donors 
		if(isset($_POST['filterDonors'])){  $dbm = new DbTool(); $mydbm = new DBController(); 
			$blood_types = @$_POST['blood_types']; 
		 	$customer_types = @$_POST['customer_types']; 
 			$med_report = @$_POST['med_report']; 

		 	# print "<pre>"; print_r($blood_types);  print_r($customer_types); 

		 	$query = "select * from customer_info where is_donor='1'";		 	
		 	$blood_whereIn = ""; 
		 	$custom_query = ""; 
		 	$med_cond = "";

		 	# build blood type condition 
		 	if(!empty($blood_types)):
		 		$blood_whereIn = " and blood_type_id in (".implode(',', $blood_types).")";
		 	endif; 

		 	#build customer type query 
		 	if(!empty($customer_types)):
 					$now = Carbon::now(); 
 					$last_three_months = $now->subMonths(3);
 					$due_str = " and last_donation_date < '$last_three_months'";
 					$custom_query = $custom_query.$due_str; 		 				 		 		 
		 		# $blood_whereIn = "blood_type_id in (".implode(',', $blood_types).")";
		 	endif; 

		 	# build medical report query
		 	if(!empty($med_report)):
		 		# search customer specimen where test comment is like medical report fetching
		 		$specimen_query = $mydbm->runBaseQuery("select customer_id from customer_specimen where comment like '%".$med_report."%'");
		 		foreach($specimen_query as $k=>$v):
		 			$ids[] = "'".$v['customer_id']."'";
		 		endforeach;
		 		$med_cond = " and id in (".implode(',',$ids).")";
		 	endif;
 
		 	$sql = $query . $blood_whereIn . $custom_query. $med_cond;

		 	$customers = $mydbm->runBaseQuery($sql);
		 	$blood_types = $mydbm->runBaseQuery("select id,name from blood_types");
                $k = []; $v=[];
                foreach ($blood_types as $key => $value) {
                  $k[] = $value['id']; 
                  $v[] = $value['name'];
                }
                $bloods = array_combine($k,$v); 
		 		# print output result 
               ?>
               <table class="table table-lg table-nogap table-bordered jambo_table dataTable">
                      <thead class="font-weight-bold">
                         <tr>
                            <td>SN</td>
                            <td>ID</td>
                            <td>Fullname</td>                           
                            <td>Phone</td>                                                
                            <td>Blood Type </td>                                              
                            <td>Last Donation </td> 
                            <td>Due for Donation </td>  
                            <td>Remarks</td>                                                                                               
                         </tr>
                      </thead>
                      <tbody>
                 <?php 
				 	if(!empty($customers)) : 

				 		# $donor_remarks = $mydbm->runBaseQuery("select id,remarks from donors_remarks");

				 	  foreach ($customers as $k=>$customer) : 
				 		 	$myinfo = $customer['id']."|".$customer['remarks']."|".$k ;?>
	                     <tr>
	                     <td><?php echo $k+1; ?></td>
	                     <td><?php echo $customer['id']; ?> </td>
	                     <td><button data-toggle="modal" data-target="#donorHistory" onclick="set_my_donation_history($(this).attr('data-text'))" data-text="<?php print $customer['id']; ?>" type="button" class="btn btn-primary p-2 m-2 ">  <?php echo $customer['fullname']; ?> </button></td>	                     
	                     <td><span class="mdi mdi-phone"></span> &nbsp; <?php echo "0".$customer['phone']; ?></td>
	                     <td><?php echo $bloods[$customer['blood_type_id']] ?? "--"; ?></td>                                                
	                     <td> <?php echo empty($customer['last_donation_date'])?" -- ": Carbon::parse($customer['last_donation_date'])->diffForHumans(); ?> </td>                                                 
	                     <td><?php if(empty($customer['last_donation_date'])) : echo "Maybe"; else : echo (Carbon::now() > Carbon::parse($customer['last_donation_date'])->addMonths(3)) ? "Yes" :" No"; endif; ?></td>
	                     <td class="text-capitalize">
	                     	<label class="pointer" onclick="set_my_remark('<?php echo $myinfo;?>')" data-toggle="modal" data-target="#select_remarks"> 
	                     		<i id="<php echo $k; >"><?php echo $customer['remarks'] ?>  </i>
	                     	 	&nbsp; &nbsp; 
	                     	 	<span class="fa fa-pencil font-20" title="Update Remarks"></span>
	                     	</label>
	                     </td>
	                 </tr>
		 			<?php endforeach; 	?> 
	 				  
		 		<?php endif;  ?>
	 				</tbody>
                </table>

        <?php
		 }
		 /***********************************/

		 if(isset($_POST['set_my_donation_history'])){
		 	$mydbm = new DBController();  $dbm = new DbTool();
		 	$user_id = $dbm->clean($_POST['user_info']);
		 	# print "<pre>";
		 	$user_info = $mydbm->runBaseQuery("select * from customer_info where id='".$user_id."'");
		 	$blood_types = $mydbm->runBaseQuery("select id,name from blood_types where id='".$user_info[0]['blood_type_id']."'");
		 	?>
		 	<table class="table table-responsive table-bordered table-nogap">
				<tr>
					<td class="table-info bold">Name:</td> <td><?php echo $user_info[0]['fullname']; ?></td>
					<td class="table-info bold">Phone:</td> <td><?php echo $user_info[0]['phone']; ?></td>
					<td class="table-info bold">Age:</td> <td class="text-capitalize"><?php echo str_replace("ago","", Carbon::parse($user_info[0]['dob'])->diffForHumans()) ?></td>
				</tr>		
				<tr>
					<td class="table-info bold">Blood Type:</td> <td><?php echo $blood_types[0]['name'] ?? "--"; ?></td>
					<td class="table-info bold">Last Donation Day:</td> <td><?php echo Carbon::parse($user_info[0]['last_donation_date'])->diffForHumans(); ?></td>
					<td class="table-info bold ">Gender:</td> <td class="text-capitalize"><?php echo $user_info[0]['sex']; ?></td>
				</tr>		 		
		 	</table>
			<p class="badge badge-info font-18 mt-3 w-100"> History </p>
			<?php 
				$histories = $mydbm->runBaseQuery("select * from customer_specimen where customer_id='".$user_info[0]['id']."' and order_type='donate_blood' order by donation_date desc");
				if(!empty($histories)):
					foreach ($histories as $k => $v) : ?>
						<div class="accordion basic-accordion" id="<?php echo 'accordion'.$k; ?>" role="tablist">
							<div class="card">
								<div class="card-header bg-default" role="tab" id="<?php echo 'heading'.$k; ?>"> 
								  <h6 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="<?php echo '#collapse'.$k; ?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$k; ?>">
									  <i class="card-icon mdi mdi-calendar"></i> <?php echo $v['donation_date']; ?> &nbsp; &nbsp;&nbsp; - &nbsp;&nbsp; <?php echo Carbon::parse($v['donation_date'])->diffForHumans(); ?>  </a>
								  </h6>
								</div>
								<div id="<?php echo 'collapse'.$k; ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo 'heading'.$k; ?>" data-parent="<?php echo '#accordion'.$k; ?>">
								  <div class="card-body">
									<h6> <u> Results </u> </h6>
									<?php     
									 
									display_donation_result($v['customer_id'],$v['ticket_no']); 

									# show remarks 
		 							echo "<br/><span class='text-italics font-weight-bold'> Remarks : </span>";
		 							echo $v['comment']; 
									?>
									
									</div>
								</div>
							  </div>
						</div> <!-- ./ end accordion -->
					<?php endforeach;

				endif;
				
			?>

		 <?php }

		 /***********************/

		 function display_donation_result($customer_id,$ticket_no){  $mydbm = new DBController(); $dbm= new DbTool();

		 	$categ_qtn_ids =  $mydbm->runBaseQuery("select distinct categ_qtn_id from blood_donation_test_result where customer_id='".$customer_id."' and ticket_no='".$ticket_no."'"); 
		 	 print "<pre>";
		 	# print_r($categ_qtn_ids); 
		 	# echo $customer_id; echo  $ticket_no;
		 	if(!empty($categ_qtn_ids)):
		 		foreach ($categ_qtn_ids as $k => $v) :
		 			$test = $dbm->select('blood_test_categories',['id'=>$v['categ_qtn_id']]);
		 			# show test title 
		 			#========================
		 			echo "<p class='btn  bold'>".$test[0]['name']."</p>"; 
		 			$table = "<table class='table table-bordered' style='border-color:black'>";
		 			$table .= "<thead><tr class='font-weight-bold text-center table-secondary text-dark'>";

		 			# show test headings 
		 			# =========================
		 			$qtn_ids = explode("|", $test[0]['test_qtn_ids']);
		 			foreach ($qtn_ids as $ids) :
		 				$qtn_info = $dbm->select("blood_test_questions",['id'=>$ids]);
		 				$table .= "<td>".$qtn_info[0]['question']."</td>";	
		 			endforeach; 
		 			$table .= "</tr>";
		 			$table .="</thead><tbody><tr>";
		 			## show test result in the body 
		 			#================================
		 			foreach ($qtn_ids as $ids) :
		 				$qtn_info = $dbm->select("blood_test_questions",['id'=>$ids]);
		 			 	$table .= "<td class='m-4 p-4'>"; 
		 				$answer = $dbm->select("blood_donation_test_result",
		 					['customer_id'=>$customer_id,'ticket_no'=>$ticket_no,
		 					'categ_qtn_id'=>$v['categ_qtn_id'],'test_qtn_id'=>$ids]);

		 				# check the type of the answer from question 
		 				 switch ($qtn_info[0]['option_type']):
		 				 	case "bitwise" : 
		 				 		$table .= ($answer[0]['result']==0) ? $qtn_info[0]['if_false_val'] : $qtn_info[0]['if_true_val']; 
		 				 	break;  
		 				 	default :
		 				 		$table .=  $answer[0]['result'] ;	
		 				 	break; 
		 				 endswitch;		
		 				 $table .= "</td>"; 				
		 			endforeach; 
		 			$table .= "</tr></tbody></table>";
		 			echo $table; 
		 			
		 		endforeach;
		 	else:
		 		echo "<div class='alert alert-warning'><span class='fa fa-warning fa-2x'></span> No Result Computed </div>";
		 	endif;

		 }


		 function display_purchase_result($customer_id,$ticket_no){  $mydbm = new DBController(); $dbm= new DbTool();

		 	$specimen =  $mydbm->runBaseQuery("select * from customer_specimen where customer_id='".$customer_id."' and ticket_no='".$ticket_no."'"); 
		 	 // print "<pre>";
		 	  // print_r($specimen); 
		 	# echo $customer_id; echo  $ticket_no;
		 	$patient_blood_type = $mydbm->runBaseQuery("select name from blood_types where id='".$specimen[0]['patient_blood_type_id']."'"); 
		 	$donor_blood_type = $mydbm->runBaseQuery("select name from blood_types where id='".$specimen[0]['blood_type_id']."'"); 
		 	$blood_bag = $mydbm->runBaseQuery("select ticket_no from blood_stocks where id='".$specimen[0]['blood_stock_id']."'"); 			
		 	echo "<p class='font-20 mt-5 mb-4'> RESULTS </p>"; 
 		 		
		 			$table = "<table class='table table-bordered' style='border-color:black'>";
		 			$table .= "<thead><tr class='font-weight-bold text-center table-secondary text-dark'>";
		 			$table .= "<td>Patient's Blood Group</td> <td>Donor's  Blood Group </td>"; 
		 			$table .= "<td>Cross Match </td> <td>Result </td>"; 
		 			$table .= "</tr>";
		 			$table .="</thead><tbody><tr class='text-center'>";		 			
		 			$table .= "<td  class='p-5 font-24 bold'>".$patient_blood_type[0]['name']."</td>";
		 			$table .= "<td class='p-5 font-24 bold'>".$donor_blood_type[0]['name']." <br/>"; 
		 			$table .= "<small> blood bag </small> <br/> <span class='font-weight-normal'>".$blood_bag[0]['ticket_no']."</span></td>";
		 			$table .= "<td class='p-5'>".$specimen[0]['blood_cross_matching']."</td>"; 
		 			$table .= "<td class='p-5'>".$specimen[0]['blood_compatibility']." </td>"; 		 			
		 			$table .= "</tr></tbody></table>";
		 	
		 	echo $table; 
		 	
		 }
	
		 /***********  save_donor_remark:"", remark:remark, remark_mode:remark_mode   **************/
		 if(isset($_POST['save_donor_remark'])){ $dbm = new DbTool();  			 
		 	$remark = $dbm->clean($_POST['remark']); $remark_mode = $dbm->clean($_POST['remark_mode']);

		 	switch($remark_mode) :
		 		case "new" :
		 		$rem = ['remarks'=>$remark,'c_by'=>$_SESSION['admUser'],'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]; 
		 		if(empty($remark)):
		 		echo json_encode(['title'=>"<span class='bold'>Message</span>",'text'=>"Remark Cannot be blank",'icon'=>"error"]);		
		 		exit;
		 		endif;
		 		$dbm->insert('donors_remarks',$rem); 
		 		echo json_encode(['title'=>"<span class='bold'>Message</span>",'text'=>"Remark Saved Successfully",'icon'=>"success"]);

		 		break; 

		 		case "update" :



		 		break; 

		 	endswitch; 

		 }

		 // display_donor_remarks 
		 if(isset($_POST['display_donor_remarks'])){  $dbm = new DbTool(); 	
		 	?>

		 	 <table class="table table-lg table-nogap table-hover jambo_table dataTable">
                   <thead class="font-weight-bold">
                         <tr>
                            <td>SN</td>
                            <td>Remarks </td>                           
                            <td>Last Update </td> 
                            <td>Actions</td>                                                                                               
                         </tr>
                      </thead>
                      <tbody>
                      	<?php $rems = $dbm->select('donors_remarks',['']); 
                      		if(!empty($rems)):
                      			foreach($rems as $k=>$v): ?>
                      				<tr>
                      					<td><?php echo $k+1; ?></td>
                      					<td><?php echo $v['remarks']; ?></td>
                      					<td><?php echo Carbon::parse($v['updated_at'])->diffForHumans(); ?></td>
                      					<td></td>
                      				</tr>
                      			<?php	
                      			endforeach;
                      		endif;
                      	 ?>
 
                      
                  	</tbody>
              </table>
		 	 
		 <?php }

		 # load_donor_remarks:"", myinfo:myinfo 
		if(isset($_POST['load_donor_remarks'])){  $dbm = new DbTool(); 	
 			$custom_info = explode("|", $dbm->clean($_POST['myinfo']));  # id, remarks, index
 		?>
	   <input type="hidden" id="myinfo" value="<?php echo $dbm->clean($_POST['myinfo']); ?>" />
 		<select class="form-control border-primary font-20" id="my_remark">
			<option value="">--:--</option>
 			<optgroup label="Select Remark">
 		<?php	$rems = $dbm->select('donors_remarks',['']); 
                if(!empty($rems)):
                	foreach($rems as $k=>$v): ?>
                		<option value="<?php echo $v['remarks'];?>" <?php echo ($v['remarks']==$custom_info[1])?" selected ":"";?>> <?php echo $v['remarks'];?></option>
            		<?php	
                  			endforeach;
                  		endif; ?>
                </optgroup></select>  		
                       
		<?php }

		// update_customer_remark:"", remark:remark, myinfo:myinfo 
		if(isset($_POST['update_customer_remark'])){  $dbm = new DbTool(); 	
			$custom_info = explode("|", $dbm->clean($_POST['myinfo']));  # id, remarks, index
			$remark = $dbm->clean($_POST['remark']); 
			$dbm->updateTb('customer_info',['remarks'=>$remark],['id'=>$custom_info[0]]); 

			echo json_encode(['title'=>"<span class='bold'>Message</span>",'text'=>"Remark Saved Successfully",'icon'=>"success"]);
 
		}


		if(isset($_POST['create_page_group'])){  $dbm = new DbTool(); 	
		 $_SESSION['name'] = $name = $dbm->clean($_POST['grpname']);
		 $_SESSION['id'] = $id = $dbm->clean($_POST['grpid']);
		 $_SESSION['icon'] = $icon = $dbm->clean($_POST['grpicon']);
		 $_SESSION['mode'] = $mode = $dbm->clean($_POST['mode']);
		 $_SESSION['serial'] = $serial = $dbm->clean($_POST['serial']);
			
			switch($mode){ 
				case 'new':{ 
					$exists = $dbm->getFields($dbm->select("pagegroups",array('groupname'=>$name,'groupid'=>$id,'status'=>'active')),array('sn','groupname','groupid','icon'));	
					if(!is_null($exists)){
						echo json_encode(array('title'=>'Duplicate','text'=>'please enter new page group, this page group already exists','icon'=>'error'));
					}
					else{
						$dbm->insert('pagegroups',array('groupname'=>$name,'groupid'=>$id,'icon'=>$icon));// 
						echo json_encode(array('title'=>'Pagegroup Created','text'=>'New Page-group created Successfully','icon'=>'success'));
					}
				} break; 
				case 'update':{ 
					$exists = $dbm->getFields($dbm->select("pagegroups",array('sn'=>$serial,'status'=>'active')),array('sn','groupname','groupid','icon'));	
					if(is_null($exists)){
						echo json_encode(array('title'=>'Update Not Found','text'=>'No Criteria for update found','icon'=>'error'));
					}
					else{
						$dbm->updateTb('pagegroups',array('groupname'=>$name,'groupid'=>$id,'icon'=>$icon),array('sn'=>$serial,'status'=>'active'));// 
						$dbm->updateTb('pages',array('groupid'=>$id),array('groupid'=>$exists['groupid'][0],'status'=>'active'));// 
						$dbm->updateTb('priviledges',array('groupid'=>$id),array('groupid'=>$exists['groupid'][0],'status'=>'active'));
						echo json_encode(array('title'=>'Pagegroup Updated','text'=>'Page-group updated Successfully','icon'=>'success'));
					}
				} break;  
			}
		 ## echo json_encode(array('title'=>'saved Successfully','text'=>'ok','icon'=>'info'));
		 ########
		}
		
		
		 ##############################################		 
		if(isset($_POST['load_page_groups'])){  		
                        $dbm = new DbTool(); 	$cur_id = $dbm->clean($_POST['cur_id']);
                        $types = $dbm->select('pagegroups',array('status'=>'active'),array('groupid'),'and','asc');					
                        ?> 
                        <optgroup label="Page Group">
                        <option value="">Select...</option>
                        <?php	$n = 0; 
                            if(!empty($types)) { 
                                $types = $dbm->getFields($types,['sn','groupname','groupid','icon']);
                                foreach ($types['groupid']  as $val){ 
                                        # $dtext = $val."|".$types['dept_id'][$n]."|".$types['categ_id'][$n]."|".$types['price'][$n];
                                ?>
                                 <option value="<?php echo $val; ?>"  <?php echo ($cur_id == $val)?"selected":"" ?>> <?php echo $types['groupname'][$n]." (".$val.")"; ?></option>							
                        <?php $n ++; 
                                 }
                            } ?>					 
                        </optgroup>	
                        <?php  
		}
		/**********************************************************************/
	
		if(isset($_POST['create_page_list'])){  $dbm = new DbTool(); 	
			$title = $dbm->clean($_POST['pgtitle']);
			$url = $dbm->clean($_POST['pgurl']);
			$groupid = $dbm->clean($_POST['pggroup']);
			$icon = $dbm->clean($_POST['pgicon']);
			$autoload = $dbm->clean($_POST['pgauto_load']);
			$mode = $dbm->clean($_POST['mode']);
			$serial = @$dbm->clean($_POST['serial']);
		 
			switch($mode){ 
				case 'new':{ 
					$exists = $dbm->getFields($dbm->select("pages",array('title'=>$title,'url'=>$url,'groupid'=>$groupid,'status'=>'active')),array('sn','title','url','groupid','icon'));	
					if(!is_null($exists)){
						echo json_encode(array('title'=>'Duplicate','text'=>'please enter new page list, this page list already exists','icon'=>'error'));
					}
					else{
						$dbm->insert('pages',array('title'=>$title,'url'=>$url,'groupid'=>$groupid,'icon'=>$icon,'autoload'=>$autoload));// 
						$former_url_file = "new_page/blank.php"; $new_url_file = "blank.php";
							if(file_exists($former_url_file)) {
								copy($former_url_file,$new_url_file);
								@rename($new_url_file,$url); 
							}
						echo json_encode(array('title'=>'Successful','text'=>'New Page List Created Successfully','icon'=>'success'));
					}
				} break; 
				case 'update':{ 
					$exists = $dbm->getFields($dbm->select("pages",array('sn'=>$serial,'status'=>'active')),array('sn','title','groupid','url'));	
					if(is_null($exists)){
						echo json_encode(array('title'=>'Update Not Found','text'=>'No Criteria for update found','icon'=>'error'));
					}
					else{
						$dbm->updateTb('pages',array('title'=>$title,'url'=>$url,'groupid'=>$groupid,'icon'=>$icon,'autoload'=>$autoload),array('sn'=>$serial,'status'=>'active'));// 
						$dbm->updateTb('priviledges',array('url'=>$url,'groupid'=>$groupid),array('url'=>$serial,'groupid'=>$exists['groupid'][0],'status'=>'active'));
						if($url !=$exists['url'][0]){ #create new url 
							$former_url_file = "new_page/blank.php"; $new_url_file = "blank.php";
							if(file_exists($former_url_file)) {
								copy($former_url_file,$new_url_file);
								@rename($new_url_file,$url); 
							}
						}
						echo json_encode(array('title'=>'Page List Updated','text'=>'Page updated Successfully','icon'=>'success'));
					}
				} break;  
			} ## end switch  
		 
		} 
		
		
	#### check_new_role
	##############################################		 
	if(isset($_POST['check_new_role'])){  $dbm = new DbTool(); 		
				$role = $dbm->clean($_POST['role']);
				$roleid = $dbm->clean($_POST['roleid']);
				$mode = $dbm->clean($_POST['mode']);
				$serial = $dbm->clean($_POST['serial']);
				
			switch($mode){ 
				case 'new':{ 
					$exists = $dbm->getFields($dbm->select("roles",array('name'=>$role,'id'=>$roleid,'status'=>'active')),array('sn','name'));	
					if(!is_null($exists)){
						echo json_encode(array('title'=>'Duplicate','text'=>'please enter new role, this role already exists','icon'=>'error'));
					}
					else{
						$dbm->insert("roles",array('name'=>$role,'id'=>$roleid, 'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time())));
						echo json_encode(array('title'=>'Successful','text'=>'New Role Created Successfully','icon'=>'success'));
					}
				} break; 
				case 'update':{ 
					$exists = $dbm->getFields($dbm->select("roles",array('sn'=>$serial,'status'=>'active')),array('sn','name','id'));	
					if(is_null($exists)){
						echo json_encode(array('title'=>'Update Not Found','text'=>'No Criteria for update found','icon'=>'error'));
					}
					else{
						$dbm->updateTb('roles',array('name'=>$role,'id'=>$roleid, 'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time())),array('sn'=>$serial,'status'=>'active'));// 
						$dbm->updateTb('myroles',array('role_id'=>$roleid),array('role_id'=>$exists['id'][0],'status'=>'active'));
						$dbm->updateTb('priviledges',array('role_id'=>$roleid),array('role_id'=>$exists['id'][0],'status'=>'active'));
						echo json_encode(array('title'=>'Role Updated','text'=>'Role updated Successfully','icon'=>'success'));
					}
				} break;  
			} ## end switch   
	}
	/**********************************************************************/
	####
	if(isset($_POST['del_admin'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select("users",array('sn'=>$serial)),array('sn','surname','firstname','midname','fullname'));	
				if(!is_null($exists)) {
					$dbm->updateTb("users",array('acct_status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time())),array('sn'=>$serial));				
					## remove role too 
					echo json_encode(array('icon'=>'success','text'=>$exists['fullname'][0]."'s Account has been deleted successfully",'title'=>' Administrator Account Deleted ')); 
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
				$exists = $dbm->getFields($dbm->select("roles",array('sn'=>$serial)),array('sn','name','id'));	
				if(!is_null($exists)) {
					## constraints : check if not yet assigned ## 
					$assigned =  $dbm->getFields($dbm->select("myroles",array('role_id'=>$exists['id'][0])),array('sn','user_id','role_id'));	
					if(!is_null($assigned)) {
						echo json_encode(array('icon'=>'error','text'=>$exists['name'][0]." Cannot be deleted, because it is already assigned to users",'title'=>'Cannot Delete Role')); 	 
					}
					else {
						$dbm->updateTb("roles",array('status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',(time()))),array('sn'=>$serial));										
						echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."'s Role has been deleted successfully",'title'=>'Role Deleted ')); 
					}
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Role matching your criterial was found",'title'=>'Deleting Role')); 	 
				}			 
	}
	/*******************************************************/
	 	/************************** #### display_my_roles**************/
	##############################################	##########	##########		 
	if(isset($_POST['display_my_roles'])){  
			#sleep(1);
				$myid = $dbm->clean($_POST['myid']);
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
				$user_id = $dbm->clean($_POST['user_id']);	
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
				$user_id = $dbm->clean($_POST['user_id']);	
				$role_id = $dbm->clean($_POST['roles']);	
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
		
	# create_ticket
	
	function  get_new_ticket_id(){
			
		$dbm =  new DbTool();  # database mgr.
		$cur_year = date('y'); /**  abbrv 2 digit **/ 
		$pay_type = 'labtest';
		$finalized ='yes';
		$conds = array('pay_type'=>$pay_type,'year'=>$cur_year,'finalized'=>$finalized);
		$allTransc = $dbm->getFields($dbm->select('customer_tickets',$conds),array('sn','ticket_no'));
		
		if(empty($allTransc)):
		
			$newNo = 1; 
			
		else :
		
			$tot = count($allTransc['ticket_no']);
		 
			$lastNo = $tot-1;
		
			$lastId = $allTransc['ticket_no'][$lastNo]; 
				
			$newNo = substr($lastId,7,strlen($lastId)) + 1;
			
		endif;  
		
		$newpad = str_pad($newNo,4,'0',STR_PAD_LEFT);
		
		return trim("BHC/$cur_year/$newpad");  
		  
	}

	/********* TICKET PAYMENT AND RECEIPTS *******/
	if(isset($_POST['search_ticket_payment'])){  # search_ticket_payment:"new", ticket_no:value 
		$dbm = new dbTool(); $func = new functions();  $ticket_no = $dbm->clean($_POST['ticket_no']);
			## $fields = array('c_by','sn','customer_id','ticket_no','fullname','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin','payment_completed','payment_finalized','paym_date_fin','paym_time_fin','paym_fin_by');
			$criterial = array('ticket_no'=>$ticket_no,'status'=>'active');
			$ticket = $dbm->select('customer_tickets',$criterial);
			if(empty($ticket)) { echo "<div class='alert alert-warning'> <i class='fa fa-warning'> </i> &nbsp;Ticket &nbsp; $ticket_no&nbsp; Not Found </div>"; }
			else {//  $exist = $dbm->resort($exist);					 
				$cond = array('ticket_no'=>$ticket_no,'status'=>'active'); 
				$specimen =  $dbm->select('customer_specimen',$criterial);
				$n = 0; $tcost = 0;  
				$my_specimen = ""; 
				foreach($specimen as $k=>$v){ 
					if($v['order_type']=="perform_test"):
				      $bill_type = $dbm->select('bill_types',array('sn'=>$v['bill_type_id'],'status'=>'active'));
					  $my_specimen.=" ".$bill_type[0]['name']."&nbsp;/ ".$specimen[$k]['specimen_sample']." :  &#8358; ".	number_format($bill_type[0]['price'])." <br/> "; 
					elseif($v['order_type']=="donate_blood"):
						$bill_type = $dbm->select('blood_types',array('id'=>$v['blood_type_id']));	
						$my_specimen.=" Blood Donation : (  ".$bill_type[0]['name'].") ".$specimen[$k]['specimen_sample']." :  &#8358; ".	number_format($v['bill_price'])." <br/> "; 
					elseif($v['order_type']=="buy_blood"):
						$bill_type = $dbm->select('blood_types',array('id'=>$v['blood_type_id']));	
						$my_specimen.=" Blood Purchase : (  ".$bill_type[0]['name'].") ".$specimen[$k]['specimen_sample']." :  &#8358; ".	number_format($v['bill_price'])." <br/> "; 
					endif;
				}
				  $balance = ($ticket[0]['total_cost'] - $ticket[0]['discount'] - $ticket[0]['amount_paid']);
						if($balance<=0) {   $balance = 0;
						 # auto finalize payment
						 ##  $dbm->updateTb('customer_tickets',['payment_finalized'=>'yes','payment_completed'=>'yes'],$criterial); 
					   }  
					   ## check if is in invoice 
					   $my_ticket_invoice = $dbm->select('hospital_invoice',['ticket_no'=>$ticket_no,'status'=>'active']);
						
			?>
			<div class="row"> 
				
				<div class="col-md-5 rounded float-right">
					<?php if($ticket[0]['payment_finalized']=="no" ){ ?>
					
					<div class="card"> 
					<div class="card-body pt-0 mt-0"> 
					<div class="form-group row pt-0 mt-0"> 
						<table class="table table-sm pt-0 mt-0">
						<tr>
							<td>Total Cost&nbsp; :</td>
							<td><?php echo "  <span class='h4 pt-0 mb-0'> &#8358; ".number_format($ticket[0]['total_cost'])."</span>";?> </td>
						</tr>
						<tr>    
							<td>Amount Paid&nbsp;:</td>
							<td><?php echo "  <span class='h4'> &#8358; ".number_format($ticket[0]['amount_paid'])."</span>";?> </td>
						</tr>
						<tr>
							<td>Balance&nbsp; :</td>
							<td> 
							<?php 
								if($ticket[0]['payment_completed']=="no" && empty($my_ticket_invoice)){ ?> 
									<button type="button"                                  
										onclick="manage_payment_box($(this).attr('data-text'))"
										data-text="<?php echo $ticket_no."|".$ticket[0]['fullname']."|".$ticket[0]['total_cost']."|".$ticket[0]['amount_paid']."|".$ticket[0]['discount']."|".$balance; ?>" 
										data-toggle="modal" data-target="#billPaymentForm"                                                 
										class="h4 btn btn-success btn-block btn-rounded btn-lg" > 
										<?php echo "<strong> Pay ".number_format($balance)."</strong>"; ?> 
									</button>
								
									<button type="button"                                  
										onclick="manage_invoice_box($(this).attr('data-text'))"
										data-text="<?php echo $ticket_no."|".$ticket[0]['fullname']."|".$ticket[0]['total_cost']."|".$ticket[0]['amount_paid']."|".$ticket[0]['discount']."|".$balance; ?>" 
										data-toggle="modal" data-target="#invoicePaymentForm"                                                 
										class="h4 btn btn-info btn-block btn-rounded btn-lg" > 
										<?php echo "<strong> Add To Invoice </strong>"; ?> 
									</button>
								
								
								
									<?php } 
									elseif ($ticket[0]['payment_finalized']=="no" && !empty($my_ticket_invoice) ){ ?>
										<button type="button" for="<?php echo base64_encode($ticket_no); ?>" data-text="<?php echo base64_encode($balance); ?>" onclick="alert('Ticket is On Invoice')" class=" btn btn-success btn-block btn-rounded btn-lg ladda-button" data-style="zoom-in"> On Invoice </button>
									<?php }
									elseif ($ticket[0]['payment_finalized']=="yes"){ ?>
										<span class='h4 pb-4 mb-4'>&#8358; <?php echo "<strong> ".number_format($balance)."</strong>"; ?> </span> <hr/>
										<span class="h5 text-success text-capitalize">payment finalized <i class="fa fa-check "></i></span>
									<?php }
									?> 
								</td>
							</tr>
							
						</table>
						   
					</div>
					  
				</div> 
			</div> <?php } ?>	

					<?php $myPayments = $dbm->getFields($dbm->select('payment_log',array('ticket_no'=>$ticket_no,'status'=>'active')),array('sn','expc_pay','discount','amount_paid','date_paid','paymode'));
						if(!is_null($myPayments)){  
							$url = "receipt.php?r_val=".base64_encode($ticket_no)."&prd=".base64_encode(time())."&tkm=".base64_encode('Complete Payment'); 
						   ?>
				     <div class="card card-statistics mt-3 pt-3">
						<div class="card-body"><a href="<?php echo $url; ?>" class="unstyle text-dark" target="_blank">
						  <div class="clearfix">
							<div class="float-left">
							  <i class="mdi mdi-receipt <?php echo ($ticket[0]['payment_completed']=="yes")?"text-success":"text-warning"; ?> icon-lg"></i>
							</div>
							<div class="float-right">
							  <p class="mb-0 text-right">PRINT RECEIPT</p>
							  <div class="fluid-container">
                                      <h3 class="font-weight-medium text-right mb-0"> <?php if($ticket[0]['payment_completed']=='yes') { echo " &#8358; ".number_format($ticket[0]['total_cost']); }else { echo "  &#8358; ".number_format($ticket[0]['discount'] + $ticket[0]['amount_paid']); }?></h3>
							  </div>
							</div>
						  </div> <p class="text-muted mt-3 mb-0">
									<i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Details </p>
								 
						 <?php $m = 0;  foreach($myPayments['amount_paid'] as $amounts){?>
							<div class="d-flex justify-content-between py-2 border-bottom">
								<div class="wrapper"> 
								  <h5 class="font-weight-medium text-uppercase">by <?php print $myPayments['paymode'][$m];  ?> <small> on <?php print $myPayments['date_paid'][$m];?></small></h5>								 
								</div>
								<div class="wrapper d-flex flex-column align-items-center">								  
								  <div class="badge badge-pill bold font-16"><?php echo "&#8358; ".number_format($amounts); ?></div>
								</div>
							  </div>
						 <?php $m++; } //end foreach
								?>
							 </a> 
						</div>
					  </div>
					   <?php } # end not null	?>  		
					
					
				</div> 
				
				<div class=" col-md-7 rounded float-right">
					<div class="card"> <div class="card-body"> <div class="form-group row"> 
					<label class="col-sm-4 col-form-label"> Customer ID&nbsp; :  </label>
					<label class="col-sm-8 col-form-label bold text-uppercase pull-right">  <?php print ($ticket[0]['customer_id']); ?>  </label>
					
					<label class="col-sm-4 col-form-label"> Ticket No&nbsp; :  </label>
					<label class="col-sm-8 col-form-label bold text-uppercase pull-right">  <?php echo $ticket_no; ?>  </label>
					
					<label class="col-sm-4 col-form-label"> Name.&nbsp; :  </label>
					<label class="col-sm-8 col-form-label bold text-uppercase pull-right">  <?php echo $ticket[0]['fullname']; ?>  </label>

					<label class="col-sm-4 col-form-label"> Date Created&nbsp; :  </label>
					<label class="col-sm-8 col-form-label bold text-capitalize pull-right">  <?php echo Carbon::parse($ticket[0]['date_c'])->diffForHumans();  ?> &nbsp; &nbsp;  <small class="text-muted font-12"><?php echo $ticket[0]['date_c']; ?></small> </label> 
			
					<label class="col-sm-4 col-form-label"> Bills&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php echo $my_specimen;?>  </label>
					
					<label class="col-sm-4 col-form-label"> Total Cost&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize bold pull-right">  <?php echo "  &#8358; ".number_format($ticket[0]['total_cost']);?>  </label>
					
					<label class="col-sm-4 col-form-label"> Discount&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php echo "  &#8358; ".number_format($ticket[0]['discount']);?>  </label>
			
					<label class="col-sm-4 col-form-label"> Amount Paid&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php echo "  &#8358; ".number_format($ticket[0]['amount_paid']);?>  </label>
					
					<label class="col-sm-4 col-form-label"> Balance&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php $balance = ($ticket[0]['payment_completed']=='yes')? 0 : ($ticket[0]['total_cost'] - $ticket[0]['discount'] - $ticket[0]['amount_paid']);  echo "  &#8358; ".number_format($balance);?>  </label>			
					  
					<label class="col-sm-4 col-form-label"> Payment Status &nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right bold">  <?php  echo   ($ticket[0]['payment_completed'] =='yes')?" Completed ":" Not Completed "; ;  ?>  </label>			
					
					<label class="col-sm-4 col-form-label"> Payment Finalized &nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right bold">  <?php  echo $ticket[0]['payment_finalized'];  ?>  </label>			
					
					<label class="col-sm-4 col-form-label">   &nbsp;   </label>
					<div class="col-sm-8"> <button style="display: <?php echo ($ticket[0]['payment_finalized']=="no")?"block":" none ";?>" type="button" <?php ?> onclick="reverse_payment()" for="<?php echo base64_encode($ticket_no); ?>" class="reverse_payment btn btn-danger btn-sm btn-rounded"> Reverse Payment &nbsp; <i class="fa fa-undo"> </i> </button> </div>
				</div> </div> </div> </div>
			
			</div> <!-- ./ row -->
			<p> &nbsp; </p>
			
			<?php } 
	}

	##############################################		 
		if(isset($_POST['load_accounts'])){
		  $dbm = new DbTool();
		  $account_field = $mydal->TableFields('accounts');
		  $bank_field = $mydal->TableFields('banks');
		  $types = $dbm->getFields($dbm->select('accounts', array('status'=>'active'), array('bank_id','account_name'),'and','asc'), $account_field);
		  ?>
		<optgroup label="Select Account">
		<!-- <option value="">... Account ...</option>-->
		<?php
		$n = 0;
		if (!is_null( $types))
		  foreach ( $types['bank_id'] as $val) {
			$bank_info = $dbm->getFields( $dbm->select('banks',array('sn'=>$val)),$bank_field);
			$dtext = base64_encode($types['sn'][$n]);
			?>
		<option value="<?php echo $dtext; ?>"> <?php echo $bank_info['name'][0]." - ".$types['account_name'][$n]." - ".$types['account_no'][$n]; ?></option>
		<?php $n++; } ?>
		</optgroup>
		<?php
		} 
		/**********************************************************************/
		##############################################		
	/***********************************************/
	function replace_commas($amounts){ $casted = []; 
		if(is_array($amounts)) foreach($amounts as $amount){
			$casted[] =  str_replace(",","",$amount);
		}
		else $casted = str_replace(",","",$amounts);
		
		return $casted; 
	}
	
        
     if(isset($_POST['generate_receipt'])){
	  $dbm = new DbTool();
	  $auto_finalize = $_POST['auto_finalize'];
	  $datas = $dbm->clean($_POST['datas']);  ### $ticket_no."|".$ticket[0]['fullname']."|".$ticket[0]['total_cost']."|".$ticket[0]['amount_paid']."|".$ticket[0]['discount']."|".$balance;
	  $amounts = replace_commas($_POST['amounts']); # array : cash, pos, transfer - values
	  $discount = replace_commas($_POST['discount']);
	  $mop = $_POST['mop']; # array : cash, pos, transfer 
	  $account_dep = $_POST['account_dep']; # arrays
	  $amount_paid = empty($amounts) ? 0 : array_sum($amounts);
	  $refund = 0; 
	  $infos = explode( '|', $datas );
	  ##  // ticket_no | name | tot_cost | amount_paid | discount | balance
	  ##  	 0		1	2	3               4	5	  
		$criterial = array('ticket_no'=>$infos[0],'status'=>'active');	
		$new_amount_paid = $infos[3] + $amount_paid;	
		###############################################################		
		/****************************************************/ 		
		##		
		if(($new_amount_paid + $discount) >= $infos[2] ) { $paym_comp = "yes"; $completed = " Completed "; }
		else { $paym_comp = "no";  $completed = " Not Completed ";}	
		
		## calculate refund and final amount paid
		if(($new_amount_paid + $discount) > $infos[2]) 
			{
				$refund = ($new_amount_paid + $discount) - $infos[2]; 
				$new_amount_paid = $infos[2]; 
                               // echo "<script>alert(".$new_amount_paid + $discount. ")</script>";
                               // exit; 
			}
				
		$payment_upd_data = array('payment_completed'=>$paym_comp,'amount_paid'=>$new_amount_paid,'discount'=>$discount,'refund'=>$refund,'paym_date_fin'=>Carbon::now());
		$finalize_upd_data = array('payment_finalized'=>'yes','paym_fin_by'=>$_SESSION['admUser']); 
		
		if(isset($auto_finalize) && $auto_finalize=="yes" && $paym_comp=="yes") $final_data = array_merge($payment_upd_data,$finalize_upd_data);	
		else $final_data = $payment_upd_data;
		
		/******** update database **************/
		$dbm->updateTb('customer_tickets',$final_data,$criterial);
		/******************************************/
		
		/******** save payment_log **************/		
			$i = 0;
		  foreach($mop as $mop) {
			$pay_log_data = array('ticket_no'=>$infos[0],'expc_pay'=>$infos[2],	
			'paymode'=>$mop,'amount_paid'=>$amounts[$i],'date_paid'=>Carbon::now(),
			'collected_by'=>$_SESSION['admUser']); 
			/******** insert **************/	
			$dbm->insert('payment_log',$pay_log_data);   
			$i++;
		  } # end foreach 
			
			###########################################
			$msg = " Payment Received Successfully "; 
			echo json_encode(array('ticket_no'=>$infos[0],'icon'=>'success','text'=>$msg,'title'=>'Payment Successful'));	   
	    #################################################################		
	}
	/*******************************************/

	  if(isset($_POST['generate_receipt_7.4'])){
	  $dbm = new DbTool();
	  $auto_finalize = $_POST['auto_finalize'];
	  $datas = $dbm->clean($_POST['datas']);  ### $ticket_no."|".$exist['fullname']."|".$exist['total_cost']."|".$exist['amount_paid']."|".$exist['discount']."|".$balance;
	  $amounts = replace_commas($_POST['amounts']); # array : cash, pos, transfer - values
	  $discount = replace_commas($_POST['discount']);
	  $mop = $_POST['mop']; # array : cash, pos, transfer 
	  $account_dep = $_POST['account_dep']; # arrays
	  $amount_paid = empty($amounts) ? 0 : array_sum($amounts);
	  $refund = 0; 
	  $infos = explode( '|', $datas );
	  ##  // ticket_no | name | tot_cost | amount_paid | discount | balance
	  ##  		 0			1		2			3			4			5	  
		$criterial = array('ticket_no'=>$infos[0],'status'=>'active');	
		$new_amount_paid = $infos[3] + $amount_paid;	
		###############################################################		
		/****************************************************/ 		
		##		
		if(($new_amount_paid + $discount) >= $infos[2] ) { $paym_comp = "yes"; $completed = " Completed "; }
		else { $paym_comp = "no";  $completed = " Not Completed ";}	
		
		## calculate refund and final amount paid
		if(($new_amount_paid + $discount) > $infos[2] ) 
			{
				$refund = $new_amount_paid + $discount - $infos[2]; 
				$new_amount_paid = $infos[2]; 
			}
				
		$payment_upd_data = array('payment_completed'=>$paym_comp,'amount_paid'=>$new_amount_paid,'discount'=>$discount,'refund'=>$refund);
		$finalize_upd_data = array('payment_finalized'=>'yes','paym_fin_by'=>$_SESSION['admUser'],'paym_date_fin'=>date('Y-m-d'),'paym_time_fin'=>date('H:i:s',time()-3600)); 
		
		if(isset($auto_finalize) && $auto_finalize=="yes" && $paym_comp=="yes") $final_data = array_merge($payment_upd_data,$finalize_upd_data);	
		else $final_data = $payment_upd_data;
		
		/******** update database **************/
		$dbm->updateTb('customer_tickets',$final_data,$criterial);
		/******************************************/
		
		/******** save payment_log **************/		
			$i = 0;
		  foreach($mop as $mop) {
			$pay_log_data = array('ticket_no'=>$infos[0],'expc_pay'=>$infos[2],	
			'paymode'=>$mop,'amount_paid'=>$amounts[$i],'date_paid'=>Carbon::now(),
			'collected_by'=>$_SESSION['admUser']); 
			/******** insert **************/	
			$dbm->insert('payment_log',$pay_log_data);   
			$i++;
		  } # end foreach 
			
			###########################################
			$msg = " Payment Received Successfully "; 
			echo json_encode(array('ticket_no'=>$infos[0],'icon'=>'success','text'=>$msg,'title'=>'Payment Successful'));	   
	    #################################################################		
	} 
	/*******************************************/

	if(isset($_POST['make_payment'])){ $dbm = new DbTool(); 
		$ticket_no = base64_decode($dbm->clean($_POST['ticket_no']));
		$amount_paid = $dbm->clean($_POST['amount_paid']);
		$discount = $dbm->clean($_POST['discount']);
		$paymode = $dbm->clean($_POST['paymode']);
		$expc_pay = base64_decode($dbm->clean($_POST['expc_pay']));   	
		
		/******validate *************/
		/**********************/ 
		if($discount!="" && !is_numeric($discount )) {
			echo json_encode(array('icon'=>'error','text'=>"Discount must be integer type",'title'=>'Invalid Discount!'));
		}
		else if(!is_numeric($amount_paid )) {
			echo json_encode(array('icon'=>'error','text'=>"Amount Paid must be integer type",'title'=>'Invalid Amount Paid!'));
		}
		else { 
			$payable = $expc_pay - $discount; 
			$paym_comp = ($amount_paid >=$payable)?"yes":"no"; 
			$completed = ($amount_paid >=$payable)?" Completed ":" Not Completed "; 
			/***********************************************/
			$pay_log_data = array('ticket_no'=>$ticket_no,'expc_pay'=>$expc_pay,'paymode'=>$paymode,
			'discount'=>$discount,'amount_paid'=>$amount_paid,'date_paid'=>Carbon::now(),
			'collected_by'=>$_SESSION['admUser']); 
			/************************************/ 
			$fields = array('c_by','sn','ticket_no','fullname','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin');
			$criterial = array('ticket_no'=>$ticket_no,'status'=>'active');
			$prev_trns = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
			
			$new_amount_paid = $prev_trns['amount_paid'][0]+$amount_paid;
			$new_discount = $prev_trns['discount'][0]+$discount;
			# $refund = $new_amount_paid - $expc_pay; 
			$ticket_upd_data = array('payment_completed'=>$paym_comp,'amount_paid'=>$new_amount_paid,'discount'=>$new_discount);
			
			/******** update database **************/
			$dbm->updateTb('customer_tickets',$ticket_upd_data,$criterial);
			/******** save to payment_log **************/
			$dbm->insert('payment_log',$pay_log_data);   
			
			$msg = " Payment Received Successfully : Status : ".$completed; 
			echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'successful'));
		} 
		
	}  /*** end make payment ***/
	/*******************************************************/
	if(isset($_POST['reverse_payment'])){ $dbm = new DbTool(); 
		$ticket_no = base64_decode($dbm->clean($_POST['ticket_no']));
			# get specimens and calculate their price 
			$criterial = array('ticket_no'=>$ticket_no,'status'=>'active');  
				$specimens = $dbm->select('customer_specimen',$criterial);
				if(!is_null($specimens)){
					/*******GET ALL COST PRICEE ******************************/
					$n = 0; $total_cost = 0;  foreach($specimens as $k=>$v){
					if($v['order_type']=="perform_test") :
						$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$v['bill_type_id'],'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
						$total_cost += $bill_type['price'][0]; 
						endif;
					$n++; } ## end foreach
				}	## end not null 	 			
					/**********************************************************************/
			$upd_data = array('total_cost'=>$total_cost,'amount_paid'=>0,'discount'=>0,'payment_completed'=>'no'); 
			$dbm->updateTb('customer_tickets',$upd_data,$criterial);
			## reset payment log 
			$dbm->updateTb('payment_log',array('status'=>'inactive','date_del'=>Carbon::now(),'del_by'=>$_SESSION['admUser']),
				array('ticket_no'=>$ticket_no,'status'=>'active'));
		 echo json_encode(array('icon'=>'success','text'=>"total_cost = Ticket No : $ticket_no successfully Reversed ",'title'=>'Ticket Reversed')); 	
		
	} // 
		
	/************ finalize_payment:"this",ticket_no:ticket_no *******************************************/
	if(isset($_POST['finalize_payment'])){ $dbm = new DbTool(); 
		$ticket_no = base64_decode($dbm->clean($_POST['ticket_no']));
			# get specimens and calculate their price 
			$criterial = array('ticket_no'=>$ticket_no,'status'=>'active');  
			/**********************************************************************/
			$upd_data = array('payment_finalized'=>'yes','paym_fin_by'=>$_SESSION['admUser'],'paym_date_fin'=>date('Y-m-d'),'paym_time_fin'=>date('H:i:s',time()-3600)); 
			$dbm->updateTb('customer_tickets',$upd_data,$criterial);
			## 
		 echo json_encode(array('icon'=>'success','text'=>" Ticket No : $ticket_no 's payment has now been successfully finalized  ",'title'=>'Payment Finalized')); 	
		
	} // 
		
	
	
	if(isset($_POST['auto_search_bill_for_ticket'])){ $dbm = new DbTool(); 
		$word = $dbm->clean($_POST["keyword"]); 
		if(!empty($word)) { 
			$info = $dbm->regExpSearch('bill_types', array('name'=>$word),array('name'), " DESC ",'10');
			if(!is_null($info)) $info = $dbm->getFields($info,array('name','categ_id','sn','dept_id','specimen_sample')); 
			$tot = empty($info)?0:count($info['name']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['name'] as $bill) {
				## for($p = 1;$p<=10; $p++) {
					  $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $bill).' &nbsp; - (<small>'.$info['specimen_sample'][$m].'</small>)';
					// $fname = $customs['customer_no'][$m]." -- ".$customs['customer_name'][$m]." -- ".$customs['slipno'][$m];
					// $text = $word.' found. --'.$tot;
				?> 
				<li onclick="set_bill_searched('<?php echo $bill; ?>','<?php echo $info['sn'][$m]; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 
					/// echo '<li onclick="set_no(\''.str_replace("'", "\'", $customer).'\')">'.$fname.'</li>';
				  $l++; $m++;
			    	}
				} ## end not null 	
				else {
					echo "<center> <span class='text-danger'> no test matches <b> ' $word ' </b> </span>  </center>";
				}
			 }  // end not empty keyword 
		} ### end post 
	  
	
	if(isset($_POST['auto_search_ticket_for_update'])){ $dbm = new DbTool(); $mydal = new DAL(); $mydbm = new DBController(); 
		$word = $dbm->clean($_POST["keyword"]); $fields = $mydal->TableFields('customer_tickets');
		if(!empty($word)) { 
                    $info = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE fullname like '%$word%' or ticket_no like '%$word%'  or hospital like '%$word%' ");  
                    if(!empty($info)) $info = $dbm->getFields($info,$fields);
                    #$info = $dbm->getFields($dbm->regExpSearch('customer_tickets', array('fullname'=>$word,'ticket_no'=>$word,'hospital'=>$word,'status'=>'active'),array('fullname'), " DESC ",'10'),array('fullname','ticket_no','sn','hospital','clinical_details'));
			$tot = empty($info)?0:count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['ticket_no'] as $bill) {
				 	  $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $bill).' &nbsp; - '.$info['fullname'][$m].' - '.$info['hospital'][$m].' ';
				?>
				<li onclick="set_ticket_found('<?php echo $bill; ?>','<?php echo $bill; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 					
				  $l++; $m++;
			    	}
				} ## end not null 	
				else {
					echo "<center> <span class='text-danger'> no test matches <b> ' $word ' </b> </span>  </center>";
				}
			 }  // end not empty keyword 
		} ### end post 
	  
	  if(isset($_POST['auto_search_complete_ticket'])){ $dbm = new DbTool(); 
		$word = $dbm->clean($_POST["keyword"]); 
		if(!empty($word)) { 
			$info = $dbm->getFields($dbm->regExpSearch('customer_tickets', array('fullname'=>$word,'ticket_no'=>$word,'hospital'=>$word),array('fullname'), " DESC ",'10'),array('fullname','ticket_no','sn','hospital','clinical_details'));
			$tot = empty($info)?0:count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['ticket_no'] as $bill) {
				 	  $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $bill).' &nbsp; - '.$info['fullname'][$m].' - '.$info['hospital'][$m].' ';
				?>
				<li onclick="set_ticket_found('<?php echo $bill; ?>','<?php echo $bill; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 					
				  $l++; $m++;
			    	}
				} ## end not null 	
				else {
					echo "<center> <span class='text-danger'> no test matches <b> ' $word ' </b> </span>  </center>";
				}
			 }  // end not empty keyword 
		} ### end post 
	  
	
	if(isset($_POST['auto_search_ticket_for_payment'])){ $dbm = new DbTool(); 
		$word = $dbm->clean($_POST["keyword"]); 
		if(!empty($word)) { 
			$info = $dbm->getFields($dbm->regExpSearch('customer_tickets', array('fullname'=>$word,'ticket_no'=>$word,'hospital'=>$word),array('fullname'), " DESC ",'10'),array('fullname','ticket_no','sn','hospital','clinical_details'));
			$tot = empty($info)?0:count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['ticket_no'] as $bill) {
				 	  $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $bill).' &nbsp; - '.$info['fullname'][$m].' - '.$info['hospital'][$m].' ';
				?>
				<li onclick="set_ticket_found('<?php echo $bill; ?>','<?php echo $bill; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 					
				  $l++; $m++;
			    	}
				} ## end not null 	
				else {
					echo "<center> <span class='text-danger'> no test matches <b> ' $word ' </b> </span>  </center>";
				}
			 }  // end not empty keyword 
		} ### end post 

	/***********************************************/ 
	
        if(isset($_POST['auto_search_customer_profile'])){ $dbm = new DbTool(); 
		$word = $dbm->clean($_POST["keyword"]); 
		if(!empty($word)) { 
			$info = $dbm->getFields($dbm->regExpSearch('customer_info', array('fullname'=>$word,'id'=>$word,'phone'=>$word),array('fullname'), " DESC ",'10'),array('fullname','id','sn','hospital'));
			$tot = empty($info)?0:count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['id'] as $bill) {
				 $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $bill).' &nbsp; - '.$info['fullname'][$m].' - '.$info['hospital'][$m].' ';
				?>
				<li onclick="set_customer_found('<?php echo $bill; ?>','<?php echo $bill; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 					
				  $l++; $m++;
			    	}
				} ## end not null 	
				else {
					echo "<center> <span class='text-danger'> no customer id matches <b> ' $word ' </b> </span>  </center>";
				}
			 }  // end not empty keyword 
		} ### end post 

	/***********************************************/ 
	if(isset($_POST['get_customer_profile'])){ $dbm = new DbTool(); $mydal = new DAL(); 
		$id = $dbm->clean($_POST["id"]); 
                $info = $dbm->getFields($dbm->select('customer_info', ['id'=>$id]),$mydal->TableFields('customer_info'));
                $continue = empty($info)?'no':'yes';
                echo json_encode([$continue,$info]);           
		} ### end post 

	/***********************************************/ 
	
                
         if(isset($_POST['auto_search_ticket_for_invoice'])){  
		$word = $dbm->clean($_POST["keyword"]); 
		if(!empty($word)) { 
			$info = $dbm->getFields($dbm->regExpSearch('customer_tickets', array('fullname'=>$word,'ticket_no'=>$word,'hospital'=>$word),array('fullname'), " DESC ",'10'),array('fullname','ticket_no','sn','hospital','clinical_details'));
			$tot = empty($info)?0:count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['ticket_no'] as $bill) {
				 	  $names = str_replace($word, "<b class='text-purple'>".$word."</b>", $bill).' &nbsp; - '.$info['fullname'][$m].' - '.$info['hospital'][$m].' ';
				?>
				<li onclick="set_ticket_found('<?php echo $bill; ?>','<?php echo $bill; ?>');">  <?php echo $names; ?></li>
				<?php 
					if($l>20) break; 					
				  $l++; $m++;
			    	}
				} ## end not null 	
				else {
					echo "<center> <span class='text-danger'> no test matches <b> ' $word ' </b> </span>  </center>";
				}
			 }  // end not empty keyword 
		} ### end post 
	  
	
	
	
		/*******
		save_system_info:"new" 
			sys_email:$('#sys_email').val(),
			************/
		if(isset($_POST['save_system_info'])){ $dbm = new DbTool();
			$sys_name = $dbm->clean($_POST["sys_name"]);
			$sys_shortname = $dbm->clean($_POST["sys_shortname"]); 
			$sys_theme = $dbm->clean($_POST["sys_theme"]); 
			$sys_icon = $dbm->clean($_POST["sys_icon"]); 
			$sys_email = $dbm->clean($_POST["sys_email"]); 
			$sys_phone = $dbm->clean($_POST["sys_phone"]);
			$sys_address = $dbm->clean($_POST["sys_address"]);
			$sys_manager = $dbm->clean($_POST["sys_manager"]);
			
			## validate email & phone 
			if(!filter_var($sys_email,FILTER_VALIDATE_EMAIL)){
				echo json_encode(array('icon'=>'error','text'=>"your  email $sys_email is not valid ",'title'=>'Email Invalid ')); 	
			}
			else if(!is_numeric($sys_phone) || strlen($sys_phone)!=11){
				echo json_encode(array('icon'=>'error','text'=>"your  phone $sys_phone is not valid ",'title'=>'Phone Number Invalid ')); 	
			}
			else {
                            $upd_data = array('name'=>$sys_name,'shortcut'=>$sys_shortname,'theme'=>$sys_theme,'fa_icon'=>$sys_icon,'email'=>$sys_email,'phone'=>$sys_phone,'address'=>$sys_address,'manager'=>$sys_manager); 
			    $dbm->updateTb('system_info',$upd_data,array('sn'=>1));
			
				echo json_encode(array('icon'=>'success','text'=>"system info updated successfully ",'title'=>'Update Successful ')); 	
			}
		}
	 
	/*******
		url:"formsubmit.php", data:{ display_salary_steps:'this',
					role_id:infos[0], step_val:infos[1]}, method:"POST",
					beforeSend:function(){  }
			************/
		if(isset($_POST['display_salary_steps'])){  $dbm = new DbTool();
			$role_id = $dbm->clean($_POST['role_id']);
			$step_val = $dbm->clean($_POST['step_val']); 
			$scale = $dbm->getFields($dbm->select('salary_scale',array('role_id'=>$role_id,step_val=>$step_val,'status'=>'active')),array('sn','annual_pay'));
			echo  is_null($scale)?0:$scale['annual_pay'][0]; 
		}
		/************************************/
		/******* update_salary_steps:'this',
						 role_id:infos[0], step_val:infos[1],amount:amount***********/
		if(isset($_POST['update_salary_steps'])){  $dbm = new DbTool();
			$role_id = $dbm->clean($_POST['role_id']); $step_val = $dbm->clean($_POST['step_val']); $amount = $dbm->clean($_POST['amount']);
			$scale = $dbm->getFields($dbm->select('salary_scale',array('role_id'=>$role_id,step_val=>$step_val,'status'=>'active')),array('sn','annual_pay'));
			if(!is_numeric($amount)) { echo json_encode(array('icon'=>'error','text'=>"Amount is invalid ",'title'=>'Update Successful ')); 	} 
			else { $data = array('role_id'=>$role_id,'step_val'=>$step_val,'annual_pay'=>$amount); 
			$updData = array('annual_pay'=>$amount);  $upd_crit = array('role_id'=>$role_id,'step_val'=>$step_val,'status'=>'active'); 
			if(is_null($scale)){ # insert 
				$dbm->insert('salary_scale',$data);
				echo json_encode(array('icon'=>'success','text'=>" Salary scale for $role_id has been created as [ $amount ] ",'title'=>'Created Successfully '));
			 } else {  # update 
				$dbm->updateTb('salary_scale',$updData,$upd_crit); 
				echo json_encode(array('icon'=>'info','text'=>" Salary scale for $role_id has been updated to $amount  ",'title'=>'Update Successful '));
			 }
		   }			 
		}	## end post 			 
	
	####################################################################
	
	/*******************************************/
	/** del_body_paym:"this",serial:id ,alias:data **/
		####
		if(isset($_POST['del_body_paym'])){ $dbm = new DbTool(); 
			$serial = base64_decode($dbm->clean($_POST['serial']));
			$alias = $dbm->clean($_POST['alias']);
			$exists = $dbm->getFields($dbm->select('salary_debit_bodies',array('sn'=>$serial,'status'=>'active')),array('bank_name_id','account_no','account_name','body_name'));
				if(!is_null($exists)){
					$dbm->updateTb('salary_debit_bodies',array('status'=>'inactive'),array('sn'=>$serial,'status'=>'active'));
					echo json_encode(array('icon'=>'success','text'=>$exists['body_name'][0]." Deleted Successfully",'title'=>'Successful '));	
				}
				else {
					echo json_encode(array('icon'=>'error','text'=>" No Criteria Matches For Deleting.. ",'title'=>'Cannot Delete '));	
				} 
		}
	/*******************************************/
	/**  create_paym_body:"new", body_name:$('#body_name').val(),acct_name:$('#acct_name').val(),
		bank_list:$('#bank_list').val(),acct_no:$('#acct_no').val(),mode:mode,serial:serial **/
		####
		if(isset($_POST['create_paym_body'])){
			$dbm = new DbTool(); 
			$body_name = $dbm->clean($_POST['body_name']);
			$bank_info = explode("|",base64_decode($dbm->clean($_POST['bank_list'])));
			$bank_id = $bank_info[0];
			$acct_name = $dbm->clean($_POST['acct_name']);
			$acct_no = $dbm->clean($_POST['acct_no']);
			$mode = $dbm->clean($_POST['mode']);
			$serial = $dbm->clean($_POST['serial']);
			
			switch ($mode) {
				case "new":{ 
					$exists = $dbm->getFields($dbm->select('salary_debit_bodies',array('bank_name_id'=>$bank_id,'account_no'=>$acct_no,'status'=>'active')),array('bank_name_id','account_no','account_name','body_name'));
					if(!is_null($exists)){
						echo json_encode(array('icon'=>'warning','text'=>" This bank Information already exist for another body system -  bank :  ".$bank_info[1].", Account No:  ".$acct_no,'title'=>'Duplicate Info '));	
					}
					else
					{
						$data = array('body_name'=>$body_name,'account_name'=>$acct_name,'bank_name_id'=>$bank_id,'account_no'=>$acct_no);
						$dbm->insert('salary_debit_bodies',$data);
						echo json_encode(array('icon'=>'success','text'=>"New body received $body_name, bank id : $bank_id  ",'title'=>'Successful '));	
					}
					
				} break; 
				case "update":{ 
				$exists = $dbm->getFields($dbm->select('salary_debit_bodies',array('sn'=>$serial,'status'=>'active')),array('bank_name_id','account_no','account_name','body_name'));
				if(is_null($exists)){
						echo json_encode(array('icon'=>'error','text'=>" This bank Information already exist for another body system -  bank :  ".$bank_info[1].", Account No:  ".$acct_no,'title'=>'Cannot Update '));	
					}
					else
					{
						$data = array('body_name'=>$body_name,'account_name'=>$acct_name,'bank_name_id'=>$bank_id,'account_no'=>$acct_no);
						$dbm->updateTb('salary_debit_bodies',$data,array('sn'=>$serial,'status'=>'active'));
						echo json_encode(array('icon'=>'success','text'=>" Update Successful : $body_name, bank id : $bank_id  ",'title'=>'Updated '));	
					}
				} break; 
			}
		
		}
	/*******************************************/
	/*******************************************/
	/** create_new_allowance:"new", allowance_name:$('#allowance_name').val(),mode:mode,serial:serial **/
		####
		if(isset($_POST['create_new_allowance'])){
			$dbm = new DbTool(); 
			$allowance_name = $dbm->clean($_POST['allowance_name']);			
			$mode = $dbm->clean($_POST['mode']);
			$serial = $dbm->clean($_POST['serial']);
			
			switch ($mode) {
				case "new":{ 
					$exists = $dbm->getFields($dbm->select('salary_allowance_bodies',array('name'=>$allowance_name,'status'=>'active')),array('name','sn'));
					if(!is_null($exists)){
						echo json_encode(array('icon'=>'warning','text'=>" This bank Information already exist for another body system -  bank :  ".$bank_info[1].", Account No:  ".$acct_no,'title'=>'Duplicate Info '));	
					}
					else
					{
						$data = array('name'=>$allowance_name);
						$dbm->insert('salary_allowance_bodies',$data);
						echo json_encode(array('icon'=>'success','text'=>"New Allowance [' $allowance_name '] Created Successfully ",'title'=>'Successful '));	
					}
					
				} break; 
				case "update":{ 
				$exists = $dbm->getFields($dbm->select('salary_allowance_bodies',array('sn'=>$serial,'status'=>'active')),array('name','sn'));
				if(is_null($exists)){
						echo json_encode(array('icon'=>'error','text'=>" Update Criterial Not Found for [' $allowance_name ' ] ",'title'=>'Cannot Update '));	
					}
					else 
					{
						$data = array('name'=>$allowance_name);
						$dbm->updateTb('salary_allowance_bodies',$data,array('sn'=>$serial,'status'=>'active'));
						echo json_encode(array('icon'=>'success','text'=>" Update Successful : $allowance_name.  ",'title'=>'Allowance Updated '));	
					}
				} break; 
			}
		}
	/*******************************************/
	// get_staff_salary_structure:'this',user_id:user_id 
	####
		if(isset($_POST['get_staff_salary_structure'])){ $dbm = new DbTool(); $admin = new User("users");	
			  $user_id = base64_decode(filter_var($_POST['user_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
			  $user_info = $dbm->resort($admin->getAll(array('user_id'=>$user_id))); ?>
			  <table class="table table-nogap table-striped table-hover"><thead><tr class="text-uppercase bold table-info"><td colspan="3"> <?php echo  $user_info['fullname']."&nbsp;&nbsp; Salary Settings "; ?> </td></tr> </thead>
			  <tbody class="font-16"> 
			  <form method="post" id="salary_form" >
				<tr>
				<?php 
				$earn_plus_1 = 0; $earn_plus_2 = 0; 
				$earn_neg_1 = 0; 
				$my_basic_salary = $dbm->getFields($dbm->select('basic_salary',array('user_id'=>$user_id,'status'=>'active')),array('sn','user_id','amount'));
				if(!is_null($my_basic_salary)){  $my_basic_salary = $dbm->resort($my_basic_salary); }
					$earn_plus_1 = $my_basic_salary['amount']; 
				 ?>
					<td colspan="2" class="bold">Basic Salary  <small> / month : </small> </td> 
					<td> <div class="col-md-12 float-left"> <div class="form-group"> <input type="text" value="<?php echo number_format($my_basic_salary['amount']);?>" for="<?php echo $my_basic_salary['sn'];?>" name="my_basic_salary" id="my_basic_salary" class="form-control border border-primary font-16" placeholder="0.00" style=" ;"/></div> </div>   </td> 
				 </tr>
				<tr>
					<td colspan="3">  <div class="col-md-12  float-left"> <div class="form-group"> <button for="<?php echo $user_id; ?>" onclick="save_only_basic_salary()" class="btn btn-info btn-md save_basic_salary pull-right "  >  Save Basic Salary &nbsp;&nbsp; <span class="fa fa-save"> </span> </button></div>  </div>  </td>  
				</tr>
				
				<tr>
					<td colspan="3"> &nbsp;  </td>  
				</tr>
				
				<tr>
					<td colspan="3" class="bold table-info"> Allowances:  </td>  
				</tr>
				<?php $my_allowances = $dbm->getFields($dbm->select('staff_allowance',array('user_id'=>$user_id,'status'=>'active')),array('sn','user_id','amount','ref_id','checked'));
				if(!is_null($my_allowances)){ $p=0;
					foreach($my_allowances['ref_id'] as $ref_id){ 
					$earn_plus_2 += $my_allowances['amount'][$p];
					$allowance_info = $dbm->resort($dbm->getFields($dbm->select('salary_allowance_bodies',array('sn'=>$ref_id,'status'=>'active')),array('sn','name')));
				?>
				<tr> 
					<td class="bold" colspan="2"> 
						<div class="form-group row"> <label class="col-sm-12">  <input type="checkbox" value="<?php echo $ref_id; ?>" class="bonus_fields checkbox" <?php echo ($my_allowances['checked'][$p]=="yes")?"checked":""; ?> />  &nbsp; <?php echo $allowance_info['name']; ?>: </label>  </div>  </div> 
					</td> 
					<td><div class="col-md-10 float-left"> <div class="form-group"><input type="text" for="<?php echo $ref_id; ?>" value="<?php echo  number_format($my_allowances['amount'][$p]); ?>" class="bonus form-control border border-primary font-16 input-sm" placeholder="0.00" style="max-width:180px;"/></div> </div>  <div class="col-md-2 float-left">&nbsp; <br/> <span class="fa fa-times font-20 text-warning pointer" onclick="del_staff_allowance('<?php echo $allowance_info['name']."|".$user_info['fullname']."|".$my_allowances['sn'][$p]; ?>')" ></span> </div></td> 
				</tr>
				<?php $p++; 
					} # end foreach
				} #end not null 
				else { ?> 
				<tr> 
					<td class="bold" colspan="3"> 
						<span class="text-warning font-16"> No Allowances allocated </span>
					</td>  
				</tr>
				<?php }  #end null ?>
				
				<tr>
					<td colspan="3"> <button onclick="hide_update_buttons(),$('button.add_this_staff_allowance').attr('for','<?php echo $user_id;?>'),$('span.staff_name').html('<?php echo $user_info['fullname'].' / '. $user_id; ?>')" data-toggle="modal" data-target="#add_to_staff_allowance_modal" for="<?php echo $user_id; ?>" class="btn btn-icons btn-sm btn-rounded btn-inverse-success" type="button"> <span class="fa fa-plus"></span> </button> &nbsp; &nbsp; Add More Allowances </td>  
				</tr>
				
				<tr>
					<td colspan="3"> &nbsp;  </td>  
				</tr>
				
				
				<tr>
					<td colspan="3" class="bold table-info"> Deductions:  </td>  
				</tr>
					<?php 
					$my_deductions = $dbm->getFields($dbm->select('staff_deductions',array('user_id'=>$user_id,'status'=>'active')),array('sn','user_id','amount','ref_id','checked','deduct_mode','percent_rate'));
					if(!is_null($my_deductions)){ $p=0;
						foreach($my_deductions['ref_id'] as $ref_id){ 
						$deduction_info = $dbm->resort($dbm->getFields($dbm->select('salary_debit_bodies',array('sn'=>$ref_id,'status'=>'active')),array('sn','body_name')));
						
						# calculate deductions 
						$deduct_amount = 0; 
						$disabled = ''; 
						if($my_deductions['deduct_mode'][$p]=="percent"){ 
							$deduct_amount = ( $my_deductions['percent_rate'][$p] * $my_basic_salary['amount'])/100;
							$disabled = 'disabled';
						}
						else {
							$deduct_amount = $my_deductions['amount'][$p]; 
						}
						
						$earn_neg_1 += $deduct_amount;
						
					?>
					<tr> 
						<td class="bold" colspan="2"> 
							<div class="form-group row"> <label class="col-sm-12">  <input type="checkbox" value="<?php echo $ref_id; ?>" class="debits_fields checkbox" <?php echo ($my_deductions['checked'][$p]=="yes")?"checked":""; ?> />  &nbsp; <?php echo $deduction_info['body_name']; ?>: &nbsp;&nbsp; <?php if($my_deductions['deduct_mode'][$p]=="percent") echo " <small> [ by ".$my_deductions['percent_rate'][$p].' '. $my_deductions['deduct_mode'][$p].' of &#8358;'.number_format($my_basic_salary['amount'])."  ] </small>"; ?> </label>  </div> 
						</td> 
						<td><div class="col-md-10 float-left"> <div class="form-group"><input <?php echo $disabled; ?> type="text" for="<?php echo $ref_id; ?>" value="<?php  echo number_format($deduct_amount); ?>" class="debits form-control border border-primary font-16 input-sm" placeholder="0.00" style="max-width:180px;"/></div>  </div>  <div class="col-md-2 float-left">&nbsp; <br/> <span class="fa fa-times font-20 text-warning pointer" onclick="del_staff_deduction('<?php  echo $deduction_info['body_name']."|".$user_info['fullname']."|".$my_deductions['sn'][$p]; ?>')" ></span> </div></td> 
					</tr>
					<?php $p++; 
						} # end foreach
					} #end not null 
					else { ?> 
					<tr> 
						<td class="bold" colspan="3"> 
							<span class="text-warning font-16"> No Deductions allocated </span>
						</td>  
					</tr>
					<?php }  #end null ?>				
					<tr>
						<td colspan="3"> <button onclick="hide_update_buttons(),$('button.add_this_staff_deduction').attr('for','<?php echo $user_id;?>'),$('span.staff_name').html('<?php echo $user_info['fullname'].' / '. $user_id; ?>')" data-toggle="modal" data-target="#add_to_staff_deduction_modal" for="<?php echo $user_id; ?>"  class="btn btn-icons btn-sm btn-rounded btn-inverse-danger" type="button"> <span class="fa fa-plus"></span> </button>   &nbsp; &nbsp; Add / Update Deductions  </td>  
					</tr>
					
					<tr>
						<td colspan="3"> &nbsp;  </td>  
					</tr>
				
					<tr>
						<td colspan="3" class="bold table-info"> Summary  </td>  
					</tr>
					
					<tr>
						<td colspan="2" class="bold">  Total Earnings :  </td>  
						<td > <?php $total_earn = $earn_plus_1 + $earn_plus_2; 
							echo "&#8358; ".number_format($total_earn);
						?>  </td>  
					</tr>
					
					<tr>
						<td colspan="2" class="bold">  Total Deductions :  </td>  
						<td > <?php $total_deduct = $earn_neg_1; 
							echo "&#8358; ".number_format($total_deduct);
						?> </td>  
					</tr>	
					
					<tr>
						<td colspan="2" class="bold">  Net Pay :  </td>  
						<td > <?php $net_pay = $total_earn - $total_deduct; 
							echo "&#8358; ".number_format($net_pay);
						?>   </td>  
					</tr>
					
					<tr>
						<td colspan="3">  <button  type="button"  for="<?php echo $user_id;?>" onclick="save_my_salary()" class="btn btn-primary btn-rounded btn-lg save_my_salary ladda-button" data-style="zoom-in" type="button">   &nbsp;  Save Salary  &nbsp;  </button>  </td>  
					</tr>
				
				</form>
			  </tbody>
			  </table> 
			
		<?php }
		/****************************************************************** 
		#### add_to_this_staff_allowance:"this",allowances:allowances,staff_id:staff_id
		******  *******************************************************************/
		if(isset($_POST['add_to_this_staff_allowance'])){ $dbm = new DbTool(); 
			  $staff_id = $dbm->clean($_POST['staff_id']);
			  $allowances = $_POST['allowances'];
			  if(!is_null($allowances)){ $news = 0; $dups = 0; 
				  foreach($allowances as $ref_id){
					  # check staff_allowance_table if exists 
					  $exists = $dbm->getFields($dbm->select('staff_allowance',array('user_id'=>$staff_id,'ref_id'=>$ref_id,'status'=>'active')),array('sn','user_id','amount','ref_id'));
					  if(is_null($exists)){ $news+=1; 
						  $dbm->insert('staff_allowance',array('user_id'=>$staff_id,'ref_id'=>$ref_id)); 
					  }
					  else{ $dups+=1; } # end exists 
				  } # end foreach
				  echo  "$news New Allowances Added for $staff_id, and $dups Existing one ommitted"; 
			  } # end is_null 
		} # end post 
		####
		
		/****************************************************************** 
		####  add_to_this_staff_deduction:"this",deductions:deductions,
		###   deduct_modes:deduct_modes,percent_rates:percent_rates,staff_id:staff_id
		******  *******************************************************************/
		if(isset($_POST['add_to_this_staff_deduction'])){ $dbm = new DbTool(); 
			  $staff_id = $dbm->clean($_POST['staff_id']);
			  $deductions = $_POST['deductions'];
			  $deduct_modes = $_POST['deduct_modes'];
			  $percent_rates = $_POST['percent_rates'];
			  if(!is_null($deductions)){ $news = 0; $dups = 0; $i = 0; 
				  foreach($deductions as $ref_id){
					  # check staff_allowance_table if exists 
					  $exists = $dbm->getFields($dbm->select('staff_deductions',array('user_id'=>$staff_id,'ref_id'=>$ref_id,'status'=>'active')),array('sn','user_id','amount','ref_id','deduct_mode','percent_rate'));
					  if(is_null($exists)){ $news+=1; 
						  $dbm->insert('staff_deductions',array('user_id'=>$staff_id,'ref_id'=>$ref_id,'deduct_mode'=>$deduct_modes[$i],'percent_rate'=>$percent_rates[$i])); 
					  }
					  else{ $dups++; 
						$dbm->updateTb('staff_deductions',array('deduct_mode'=>$deduct_modes[$i],'percent_rate'=>$percent_rates[$i]),array('user_id'=>$staff_id,'ref_id'=>$ref_id)); 
					  } # end exists 
					  $i++; // increment 
				  } # end foreach
				  echo  "$news New Deductions Added for $staff_id, and $dups Existing one updated"; 
			  } # end is_null 
		} # end post 
		########
		
		
		
		/*****************************************/
		#### save_salary_setup:"all", ds_form:x 
		/******
		save_my_salary_details:"this",
		staff_id:staff_id, basic_salary:basic_salary.val(), bonus_ref:bonus_ref, 
		bonus:bonus, debit_ref:debit_ref, debits:debits
		*****/
		
		if(isset($_POST['save_my_salary_details'])){ $dbm = new DbTool(); 
			# print_r($_POST);
			$staff_id = filter_var($_POST['staff_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			
			#####################################################
			#####  work on allowances :: ########
			#####################################################
			$bonus_ref = $_POST['bonus_ref'];
			$bonus = $_POST['bonus'];
			# remove allowance settings and save this new one 
			if(!is_null($bonus_ref)){ $m = 0; 
				// $dbm->deleteRow('staff_allowance',array('user_id'=>$staff_id));
				foreach($bonus_ref as $ref_id){
					$amount = (double)filter_var(str_replace(',','',$bonus[$m]),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					$bonus_data = array('amount'=>$amount,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
					$dbm->updateTb('staff_allowance',$bonus_data,array('user_id'=>$staff_id,'ref_id'=>$ref_id,'status'=>'active'));
					$m++; 
				}
			} 
			#####################################################
			#####  work on deductions :: ########
			#####################################################
			$debit_ref = $_POST['debit_ref'];
			$debits = $_POST['debits'];
			# remove deductions settings and save this new one 
			if(!is_null($debit_ref)){ $m = 0; 
				# $dbm->deleteRow('staff_deductions',array('user_id'=>$staff_id));
				foreach($debit_ref as $ref_id){
					$amount = (double)filter_var(str_replace(',','',$debits[$m]),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					$debit_data = array('amount'=>$amount,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
					$dbm->updateTb('staff_deductions',$debit_data,array('user_id'=>$staff_id,'ref_id'=>$ref_id,'status'=>'active'));
					$m++; 
				}
			} 
			
			echo "Updates has been carried out on the staff salary... thanks ";
			
		}
		
		/****************************************/
		################################## 
		# save_staff_basic_salary:"this",
		# staff_id:staff_id, basic_salary:basic_salary.val() 
		#
		if(isset($_POST['save_staff_basic_salary'])){	$dbm = new DbTool(); 
			$staff_id = filter_var($_POST['staff_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$amount =  (double)filter_var(str_replace(',','',$_POST['basic_salary']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			 
			$exists = $dbm->getFields($dbm->select('basic_salary',array('user_id'=>$staff_id,'status'=>'active')),array('sn','user_id','amount'));
			  if(is_null($exists)){ 
				 $dbm->insert('basic_salary',array('user_id'=>$staff_id,'amount'=>$amount));
				 echo json_encode(array('icon'=>'success','title'=>'Basic Salary Saved','text'=>$amount.' has been saved for '.$staff_id));
			  }
			  else{
				   $dbm->updateTb('basic_salary',array('amount'=>$amount),array('user_id'=>$staff_id,'status'=>'active'));
				   echo json_encode(array('icon'=>'info','title'=>'Basic Salary Updated','text'=>"Basic salary has been updated to $amount for ".$staff_id));
			  }
		}
		 
		##################################		
		/*****************************************/
		##  del_staff_allowance:"this",info:data_text 
		if(isset($_POST['del_staff_allowance'])){ $dbm = new DbTool(); 
			$raw_texts = $_POST['info']; 
			$info = explode('|',$raw_texts); ## allowance_name | staff_name | allowance_id
			 $exists = $dbm->getFields($dbm->select('staff_allowance',array('sn'=>$info[2],'status'=>'active')),array('sn','user_id','amount','ref_id'));
			  if(is_null($exists)){ 
				echo json_encode(array('icon'=>'error','text'=>" Cannot Delete",'title'=>"Error Deleting ".$info[1]." ".$info[0]));
			  }
			  else {
				 $dbm->updateTb('staff_allowance',array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time())),array('sn'=>$info[2])); 
				 echo json_encode(array('icon'=>'success','text'=>$info[0]."  Deleted",'title'=>$info[0]." for ".$info[1].' Deleted Successfully'));
			  }
			
		}
		/*****************************************/
		
		##################################		
		/*****************************************/
		##  del_staff_deduction:"this",info:data_text 
		if(isset($_POST['del_staff_deduction'])){ $dbm = new DbTool(); 
			$raw_texts = $_POST['info']; 
			$info = explode('|',$raw_texts); ## deduction_name | staff_name | deduction_id
			 $exists = $dbm->getFields($dbm->select('staff_deductions',array('sn'=>$info[2],'status'=>'active')),array('sn','user_id','amount','ref_id'));
			  if(is_null($exists)){ 
				echo json_encode(array('icon'=>'error','text'=>" Cannot Delete",'title'=>"Error Deleting ".$info[1]." ".$info[0]));
			  }
			  else {
				 $dbm->updateTb('staff_deductions',array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time())),array('sn'=>$info[2])); 
				 echo json_encode(array('icon'=>'success','text'=>$info[0]."  Deleted",'title'=>$info[0]." for ".$info[1].' Deleted Successfully'));
			  }
			
		}
		
		##################################		
		/*****************************************/
		#  reverse_the_staff_salary :'this', staff:staff, param:param
		###################################
		if(isset($_POST['reverse_the_staff_salary'])){ $dbm = new DbTool();   # print_r($_POST);
			 $staff = $_POST['staff'];  // staff id list [array] 
			 $param = filter_var($_POST['param'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
			 $calendar = explode("|",$param); // year | month	
			  ## check if salary has been paid 
			 if(!is_null($staff)){ $ins = 0; $dups = 0; 
				 foreach($staff as $user_id){
					 ### delete salary report #### 
					$exists = $dbm->getFields($dbm->select('staff_salary_report',array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active')),array('user_id','year','month','total_bonus','total_deduct','gross_pay','date_c','time_c','c_by'));
					if(!is_null($exists)){ 
						$data = array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time()));
						$ins++; 
						$dbm->updateTb('staff_salary_report',$data,array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active'));
						}
					/***************************************/
						else{
							$dups++; 
						}
						#########################################
						$my_allowances = $dbm->getFields($dbm->select('staff_allowance_payment',array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active')),array('sn','user_id','amount','ref_id'));
						if(!is_null($my_allowances)){
								$data = array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time()));
								$dbm->updateTb('staff_allowance_payment',$data,array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active'));
							 } 
						/***************************************/
						#########################################
						$my_deductions = $dbm->getFields($dbm->select('staff_deductions_payment',array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active')),array('sn','user_id','amount','ref_id','deduct_mode','percent_rate'));
						if(!is_null($my_deductions)){ $i=0; 
							$data = array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time()));
							$dbm->updateTb('staff_deductions_payment',$data,array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active'));
						}
						/***************************************/
						#########################################
					} ## end foreach 
					
				echo $ins." Staff salary have been Reversed successfully, while  ".$dups." staff payment have not been done"; 
			 } ## end not null - staff 
		}
		
		##################################		
		/*****************************************/
		# pay_the_staff_salary:"this",
		#	staff:staff, paym_method:paym_method.val(), paym_status:paym_status.val(), 
		#	param:param
		if(isset($_POST['pay_the_staff_salary'])){ $dbm = new DbTool(); 
			 # print_r($_POST);
			 $staff = $_POST['staff'];  // staff id list [array] 
			 $paym_method = filter_var($_POST['paym_method'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);  // bank / cash / transfer 
			 $paym_status = filter_var($_POST['paym_status'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);  // paid			 
			 $param = filter_var($_POST['param'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
			 $calendar = explode("|",$param); // year | month	
			 ## check if salary has not been paid 
			 if(!is_null($staff)){ $ins = 0; $dups = 0; 
				 foreach($staff as $user_id){
					$exists = $dbm->getFields($dbm->select('staff_salary_report',array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'status'=>'active')),array('user_id','year','month','total_bonus','total_deduct','gross_pay','date_c','time_c','c_by'));
					if(is_null($exists)){
						$paym_sum = $dbm->analyse_staff_salary_pay($user_id); 
						$data = array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],
						'basic_salary'=>$paym_sum['basic_salary'],'total_bonus'=>$paym_sum['total_bonus'],
						'total_deduct'=>$paym_sum['total_deduct'],'gross_pay'=>$paym_sum['gross_pay'],'paid_by'=>$paym_method,
						'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()));
						$ins++; 
						$dbm->insert('staff_salary_report',$data);
						/***************************************/
						#########################################
						$my_allowances = $dbm->getFields($dbm->select('staff_allowance',array('user_id'=>$user_id,'status'=>'active')),array('sn','user_id','amount','ref_id'));
						if(!is_null($my_allowances)){ $i=0; 
							foreach($my_allowances['ref_id'] as $ref_id){
								$dbm->insert('staff_allowance_payment',array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],
								'ref_id'=>$ref_id,'amount'=>$my_allowances['amount'][$i],'date_paid'=>Carbon::now(),'c_by'=>$_SESSION['admUser']));
								$i++;
							}
						}
						/***************************************/
						#########################################
						$my_deductions = $dbm->getFields($dbm->select('staff_deductions',array('user_id'=>$user_id,'status'=>'active')),array('sn','user_id','amount','ref_id','deduct_mode','percent_rate'));
						if(!is_null($my_deductions)){ $i=0; 
							foreach($my_deductions['ref_id'] as $ref_id){
								$dbm->insert('staff_deductions_payment',array('user_id'=>$user_id,'year'=>$calendar[0],'month'=>$calendar[1],'deduct_mode'=>$my_deductions['deduct_mode'][$i],'percent_rate'=>$my_deductions['percent_rate'][$i],
								'ref_id'=>$ref_id,'amount'=>$my_deductions['amount'][$i],'date_paid'=>Carbon::now(),'c_by'=>$_SESSION['admUser']));
								$i++;
							}
						}
						/***************************************/
						#########################################
					}
					else {
						$dups++; 
					}
					// print_r ();  
				 } ## end foreach
			 } ## end not null 
			  echo " $ins new staff were paid for the year ".$calendar[0].", and month ".$calendar[1].", and $dups staff already paid [ ignored ]";
		} ## end post 
		#########################################		
		/*****************************************/
		if(isset($_POST['get_staff_designation_pay'])){ $dbm = new DbTool(); 
			  $role_id = $dbm->clean($_POST['role_id']);
			  $step_val = $dbm->clean($_POST['step_val']);
			  $salary_scale = $dbm->getFields($dbm->select('salary_scale',array('role_id'=>$role_id,step_val=>$step_val,'status'=>'active')),array('sn','annual_pay'));
			  $role_info = $dbm->getFields($dbm->select('roles',array('id'=>$role_id,'status'=>'active')),array('sn','name'));
				
				if(!is_null($salary_scale)) {
					$salary_scale = $dbm->resort($salary_scale);  ?>
					<div class="table " align="center"  > 
						<table class="table bordered "> 
							<thead> 
								<tr class="bg-default  text-primary"> <td colspan="2"><strong> <?php echo $role_info['name'][0]; ?>  Salary Structure  @ <?php echo "Step ".$step_val; ?></strong> </td> </tr>
							</thead>  <tbody> 
								<tr> 
									<th> Monthly Payment : </th>
									<td> <strong> <?php echo "&#8358; ".number_format($salary_scale['annual_pay']/12); ?>&nbsp;&nbsp; <span class="text-muted"> in (  12 months : <?php echo " &#8358; ".number_format($salary_scale['annual_pay']); ?> ) </span> </strong>  </th>
								</tr>
							</tbody> 
							</table> 
					</div> 
				<?php }
				else {  ?>
					<div class="table " align="center"  > 
						<table class="table bordered "> 
							<thead> 
								<tr class="bg-default  text-danger"> <td colspan="2"><strong> <?php echo "No Annual Pay is Setup for ".$role_info['name'][0]." @ Step ".$step_val; ?></strong> </td> </tr>
							</thead>   
						</table>
				<?php }
			 /************************************************/
			 ############ for deductions ######################
			 /************************************************/
			 ?>
				<div class="table " align="center"   > 
					<table class="table bordered "> 
						<thead> 
							<tr class="bg-default text-primary"> <td colspan="2"><strong> Deductions </strong> </td> </tr>
						</thead>  <tbody>    <tr> 
								<th> Over All Annual Pay : </th>
								<td> <?php echo "&#8358; ".number_format($salary_scale['annual_pay']); ?>  </td>
							</tr>
							<tr> 
								<th> Calculated Monthly Pay : </th>
								<td> <?php echo "&#8358; ".number_format($scale['annual_pay']/12); ?>  </th>
							</tr>
						</tbody> 
						</table> 
				</div> 
				
			 <?php
			 
		}  ## end post 
		
		
		#############################################
		/*******************************************/
		if(isset($_POST['saveBillCateg'])){
			$dbm = new DbTool(); 
			$name = $dbm->clean($_POST['billCateg']);
			$id = $dbm->clean($_POST['bill_dept_id']);
			$mode = $dbm->clean($_POST['mode']); // update /  
			$serial = $dbm->clean($_POST['serial']);
			/******************/
			$data = array('name'=>$name,'dept_id'=>$id,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()));
			$updDdata = array('name'=>$name,'dept_id'=>$id,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
			
			switch($mode){
				case "new": {
					$criterial = array('name'=>$name,'dept_id'=>$id,'status'=>'active'); ### ,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()));
					$exist = $dbm->getFields($dbm->select('bill_category',$criterial),array('sn','name'));
					$tot = count($exist['sn']); 
					if($tot > 0){
							$msg = "$name already exists, record another bill category ";
							echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Category'));
						}
						else {
							$dbm->insert('bill_category',$data);
						$msg = "New Bill Category [ ' $name ' ] Successfully Saved. ";
							echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
						}
					
				} break; 
				case "update": {
					$criterial = array('sn'=>$serial,'status'=>'active'); ### ,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()));
					$exist = $dbm->getFields($dbm->select('bill_category',$criterial),array('sn','name','dept_id'));
					$tot = count($exist['sn']); 
					if($tot == 1 ){
							$dbm->updateTb('bill_category',$updDdata,$criterial);
							$dbm->updateTb('bill_types',array('dept_id'=>$id),array('dept_id'=>$exist['dept_id'][0]));
							
						$msg = "  Bill Category [ ' $name ' ] Successfully Updated. ";
							echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Category Updated !'));
						}
						else {
							$msg = " update cannot be performed on category  ";
							echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Not Found'));
						}
					
				} break; 
			}
			
			 
		}
		/********************************************************/
		####################################################################
		 
		####
		if(isset($_POST['save_new_department'])){ $dbm = new DbTool(); 
			$name = $dbm->clean($_POST['name']);
			$serial = $dbm->clean($_POST['serial']);
			$mode = $dbm->clean($_POST['mode']);
			switch($mode){
				
				case "new":{	
					$data = array('name'=>$name,'status'=>'active');
						$exist = $dbm->getFields($dbm->select('departments',$data),array('sn','name'));
						 if(!is_null($exist )){
							$msg = "$name Department already exists, record another one ";
							echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Duplicate Department'));
						}
						else {  $dbm->insert('departments',$data);
							$msg = "New Department [ ' $name ' ] Successfully Created. ";
							echo json_encode(array('icon'=>'success','text'=>$msg,'title'=>'Successful!'));
						}
				} break;
				
				case "update":{	 $exist = $dbm->getFields($dbm->select('departments',array('sn'=>$serial)),array('sn','name'));
					if(!is_null($exist)){  
					$dbm->updateTb('departments',$data,array('sn'=>$serial));
					}else { $msg = "  error updating department";
						echo json_encode(array('icon'=>'error','text'=>$msg,'title'=>'Update Error !')); }
				} break;
			}
		}
		/**************************************************/ 
	 
	
	/********** PHARMACY STOCK ITEMS ************************/
	
	if(isset($_POST['del_pharm_product'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial,'status'=>'active')),array('sn','name','barcode'));	
				if(!is_null($exists)) {
					// check if the product has not been sold, if yes, cannot delete 
					$exists2 = $dbm->getFields($dbm->select('stock_products_sales',array('ref_id'=>$serial,'status'=>'active')),array('sn','barcode'));	
					if(!is_null($exists2)) {
						echo json_encode(array('icon'=>'error','text'=>"Because Part of it has already been sold, you can either set it invisible for sales again.",'title'=>$exists['name'][0]." Cannot Be Deleted"));
					}
					else {
						$dbm->updateTb("pharm_products",array('status'=>'inactive', 'del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time())),array('sn'=>$serial));									
						echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."' has been deleted successfully",'title'=>$exists['name'][0]." Deleted Successfully "));
					}
				}
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Bill Type matches your criterial ",'title'=>'Deleting Bill Type'));
 	 
				}			 
	}
	/*******************************************************/
	if(isset($_POST['hide_pharm_product'])){  		
				$serial = $_POST['serial']; 
				$dbm = new DbTool(); # #sleep(3);
				$exists = $dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial,'status'=>'active','visible'=>'yes')),array('sn','name','barcode'));	
				if(!is_null($exists)) {
					  $dbm->updateTb("pharm_products",array('visible'=>'no', 'hide_by'=>$_SESSION['admUser'],'date_hide'=>date('Y-m-d'),'time_hide'=>date('H:i:s',time())),array('sn'=>$serial));									
						echo json_encode(array('icon'=>'success','text'=>$exists['name'][0]."' has been hidden for sales successfully",'title'=>$exists['name'][0]." Hidden Successfully "));
				 }
				else{
					echo json_encode(array('icon'=>'error','text'=>"No Bill Type matches your criterial ",'title'=>'Deleting Bill Type'));
 	 
				}			 
		}
	/*******************************************************/
	
	 /**********************************************************************/
	
	 	if(isset($_POST['saveNewProduct'])){  		
				$product_desc = $dbm->clean($_POST['product_desc']);	
				$product_code = $dbm->clean($_POST['product_code']);	
				$product_name = $dbm->clean($_POST['product_name']);	
				$no_of_pack = $dbm->clean($_POST['no_of_pack']);	
				$qty_per_pack = $dbm->clean($_POST['qty_per_pack']);	
				$product_mfd = $dbm->clean($_POST['product_mfd']);	
				$product_expd = $dbm->clean($_POST['product_expd']);	
				$product_barcode = $dbm->clean($_POST['product_barcode']);	
				$product_vendor = $dbm->clean($_POST['product_vendor']);	
				$product_sp = $dbm->clean($_POST['product_sp']);	
				$product_cp = $dbm->clean($_POST['product_cp']);	
				$date_supply = $dbm->clean($_POST['date_supply']);	
				$stock_type = $dbm->clean($_POST['stock_type']);	// new or update
				$update_serial = $dbm->clean($_POST['update_serial']);	// new or update
				 
				$dbm = new DbTool(); 
				
				$exists = $dbm->getFields($dbm->select("pharm_products",array('barcode'=>$product_barcode,'status'=>'active')),array('sn','name','barcode'));	
				if($product_barcode=="") {
					 echo json_encode(array('icon'=>'warning','text'=>'Please supply Barcode No.',
							'title'=>'Empty Barcode No.'));
				}
				else if(!is_null($exists)  && $stock_type=="new") {
					 echo json_encode(array('icon'=>'warning','text'=>'This barcode item already exists  ',
							'title'=>'Duplicate Barcode Item')); 
				 }
				 else if(is_null($exists) && $stock_type=="new") {
					 	$data = array('name'=>$product_name,'description'=>$product_desc,'code'=>$product_code,
				'barcode'=>$product_barcode,'exp_date'=>$product_expd,'mfc_date'=>$product_mfd,'cost_price'=>$product_cp, 
				'no_of_pack'=>$no_of_pack,'qty_per_pack'=>$qty_per_pack,'vendor_id'=>$product_vendor,'date_suplied'=>$date_supply,
				'rec_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()),'selling_price'=>$product_sp,
				'month_c'=>date('m'),'day_c'=>date('d'),'year_c'=>date('Y'),'week_c'=>idate('W'));
				 
				$dbm->insert('pharm_products',$data);
				
					echo json_encode(array('icon'=>'success','text'=>"  New Product Saved Successfully",
							'title'=>' Stock Data Saved Successfully '));					
				 }
				 else if(count($exists['sn'])>=0 && $stock_type=="update") {
						$data = array('name'=>$product_name,'description'=>$product_desc,'code'=>$product_code,
						'barcode'=>$product_barcode,'exp_date'=>$product_expd,'mfc_date'=>$product_mfd,'cost_price'=>$product_cp,
						'vendor_id'=>$product_vendor,'date_suplied'=>$date_supply,
						'rec_by'=>$_SESSION['admUser'],'selling_price'=>$product_sp);
						 
						$dbm->updateTb('pharm_products',$data,array('sn'=>$update_serial));
						
							echo json_encode(array('icon'=>'success','text'=>" Product Successfully Updated , please note that stock quantity and remaining quantity will not update, you have to add more items when you want to add more quantity",
								'title'=>' Stock Updated ')); 
						 } 
		}  
		/***************************************************/
		
			
		if(isset($_POST['get_stock_item_details'])){	
			$serial = $dbm->clean($_POST['serial']); ## ($_POST['value']);		
			$dbm = new DbTool(); $func = new functions();
			$products = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial),array('time_c'),'and','desc'),
			 		array('sn','name','description','code','barcode','exp_date','mfc_date','remains',
					'cost_price','selling_price','no_of_pack','qty_per_pack',
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
							'date_suplied'=>$products['date_suplied'],
							'no_of_pack'=>$products['no_of_pack'],
							'qty_per_pack'=>$products['qty_per_pack']
							);
						echo json_encode( $all_elem );
		}
		
		/************************
			no_of_pack:no_of_pack.val(),qty_per_pack:qty_per_pack.val(), 
			product_expd:product_expd.val(), 
			product_mfd:product_mfd.val(),update_serial:update_id
										
		**********************************************/
	####
	 	if(isset($_POST['update_new_import_stock'])){  		
				$no_of_pack = $dbm->clean($_POST['no_of_pack']);	
				$qty_per_pack = $dbm->clean($_POST['qty_per_pack']);	
				$product_mfd = $dbm->clean($_POST['product_mfd']);	
				$product_expd = $dbm->clean($_POST['product_expd']);	
				$update_serial = $dbm->clean($_POST['update_serial']);	// new or update
				$dbm = new DbTool(); 
				$products = $dbm->select("pharm_products",
				array('sn'=>$update_serial,'status'=>'active'));	
					 
				
				if(!is_null($products)) {
					$products = $dbm->getFields($products ,$mydal->TableFields('pharm_products'));
					$products = $dbm->resort($products);				
					# check mfd
					if($product_mfd == $products['mfc_date'] && $product_expd == $products['exp_date']){
						# shows they are the same - now increase qty
						$old_qty = $exists['no_of_pack'];
						$old_rem = $exists['rem_no_of_pack'];
						$new_qty = $old_qty + $no_of_pack ;
						$new_rem = $old_rem + $no_of_pack; 
						$updData = array('no_of_pack'=>$new_qty,'rem_no_of_pack'=>$new_rem,'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
				 
					$dbm->updateTb('pharm_products',$updData,array('sn'=>$update_serial));
				 
					echo json_encode(array('icon'=>'success','text'=>' More '.$products['name']. "&nbsp; Added Successfully",
							'title'=>' Stock Updated Successfully '));					
					
					} # end similar product 
					else {
						# when not the same : create new type 
						$new_data = array(							
							'name'=>$products['name'],
							'description'=>$products['description'],
							'code'=>$products['code'],
							'exp_date'=>$product_expd,
							'mfc_date'=>$product_mfd, 
							'no_of_pack'=>$no_of_pack, 
							'qty_per_pack'=>$qty_per_pack,
							'cost_price'=>$products['cost_price'],
							'selling_price'=>$products['selling_price'], 
							'vendor_id'=>$products['vendor_id'],
							'rec_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),
							'time_c'=>date('H:i:s',time())
							);							
							## save 
							$dbm->insert('pharm_products',$new_data);
							echo json_encode(array('icon'=>'success','text'=>' New '.$products['name']. "&nbsp; Added Successfully",
							'title'=>' Stock Added Successfully '));
						} 
					} 
					else  { echo json_encode(array('icon'=>'error','text'=>" Invalid Update Parameters ",
									'title'=>' Update Error ')); 
					} 
				}   
		/***************************************************/	
	#####################################################
	if(isset($_POST['adv_fetch_all_drug_forms'])){
		$dbm = new DbTool();  $func = new functions();
		$text = $dbm->clean($_POST['criterial']);
		#### start searching ####
		$table = "pharm_products"; 
		$criterials = array('name'=>$text,'code'=>$text,'description'=>$text,
		'barcode'=>$text,'mfc_date'=>$text,'exp_date'=>$text,'cost_price'=>$text,'selling_price'=>$text,
		'date_c'=>$text); 
		
		## , array("sn","time_c")," DESC "
		$result_01 = $dbm->getFields($dbm->regExpSearch($table, $criterials),
				array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains','rem_no_of_pack','rem_qty_per_pack','qty_per_pack')); 
			
		############################################################
		#### after result searched 
		############################################################
		if(!is_null($result_01)){ $n = 0; ?>				 	
			<b class="h5"> <span class="red"><?php echo count($result_01['name'])." results </span>  found for your criteria <span class='text-success'>' $text '</span>";  ?> 
			</b> 
			 
		<?php	foreach ($result_01['name'] as $name) {
			 ?>
		   <table class="table table-responsive"> 
				<tbody>
					<tr>  					
						<td > <h4> <b> <?php echo $name;  ?> </b> </h4> 
								<small class="text-muted bold">  Expiry </small> <h3 class="font-weight-bold mb-0"><?php echo $func->stock_expiry($result_01['mfc_date'][$n],$result_01['exp_date'][$n]); ?><small class="text-muted">  Days </small></h3>  
						</td>
						
						<td class="bold font-16"> 
							<small class="text-muted bold">  Remains </small> <h4 class="font-weight-bold mb-0"><?php echo $result_01['rem_no_of_pack'][$n]."<small class='text-muted'>  By  </small>".$result_01['qty_per_pack'][$n]."<small class='text-muted'>  Packs  </small>"; ?></h4>  
						</td>
						   
						 <td>
							<div class="form-group">
								<label class=""> Packs Needed </label>
							  <div class="input-group">
								<div class="input-group-prepend ">
								  <button <?php if ($result_01['rem_no_of_pack'][$n]<=0) echo 'disabled'; ?> type="button" onclick="decr_cart_qty($(this).closest('tr').find('input.item-cart-qty'))" class="btn pointer btn-primary btn-sm btn-rounded"> <i class="mdi mdi-minus bold"></i> </button>
								</div>
								
								<input min="1" max="<?php echo $result_01['rem_no_of_pack'][$n]; ?>" data-text="<?php echo $result_01['selling_price'][$n]; ?>" style="width:55px;" disabled type="text" class="item-cart-qty form-control bg-white border-info text-center bold font-16" oaria-label="Amount" value="<?php if ($result_01['rem_no_of_pack'][$n]>=1) echo '1'; else echo '0'; ?>">
							   
							    <!--  <input   onchange="manage_item_cart_qty2($(this).attr('for'),$(this).val(),$(this).attr('data-text'),$(this).closest('tr').find('span.sales_label'))" style="width:100px;" value="1" for="<?php echo $result_01['sn'][$n];?>"     />   -->
						
								<div class="input-group-append ">
									 <button  <?php if ($result_01['rem_no_of_pack'][$n]<=0) echo 'disabled'; ?>  type="button" onclick="incr_cart_qty($(this).closest('tr').find('input.item-cart-qty'))" class="btn  text-white pointer btn-primary btn-sm btn-rounded"> <i class="mdi mdi-plus bold"></i></button>													
								</div>
							  </div>
							</div>
						 </td>
						 <!--
						 <td class="bold font-16"> <span class="final_sale"> <?php echo "&#8358;&nbsp;".number_format($result_01['selling_price'][$n]); ?> </span> </td>
						-->
						<td> <button  <?php if ($result_01['rem_no_of_pack'][$n]<=0) echo 'disabled'; ?>  type="button" class="btn btn-success btn-lg btn-rounded item-cart-purchase" onclick="add_to_my_cart($(this).attr('for'),$(this).closest('tr').find('input.item-cart-qty').val())" for="<?php echo $result_01['sn'][$n];?>" data-text="1"> <i class="fa fa-shopping-cart"> </i> &nbsp; Take  </button> </td>
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
		$text = $dbm->clean($_POST['criterial']);
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
	
	##########################################################################
	
	if(isset($_POST['save_item_cart'])){		
		$dbm = new DbTool(); # pharm_products
		$serial =  $dbm->clean($_POST['serial']);
		$qty =   $dbm->clean($_POST['qty']);
		
		$drug_item = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial)),array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains','rem_no_of_pack','rem_qty_per_pack'))); 
			if($qty <= $drug_item['rem_no_of_pack'] && $drug_item['rem_no_of_pack']>0){
				## add to sales 
				$tcost = $drug_item['cost_price'] * $qty;
				$tsale = $drug_item['selling_price'] * $qty;
				
				## check if item exists on sales 
				$exists =  $dbm->getFields($dbm->select('stock_products_sales',array('ref_id'=>$serial,'sold_by'=>$_SESSION['admUser'],'sold'=>'no')),
					array('ref_id','code','barcode','tot_cost','tot_sales','cost_price',
				'selling_price','qty')); 
				
				if(!is_null($exists)){
					$init_qty = $exists['qty'][0];
					$init_tsale = $exists['tot_sales'][0]; 
					$new_qty = $init_qty + $qty; 
					$new_tsale = $new_qty * $exists['selling_price'][0]; 					
					### $update 
					$dbm->updateTb("stock_products_sales",array('qty'=>$new_qty,'tot_sales'=>$new_tsale),
						array('ref_id'=>$serial,'sold_by'=>$_SESSION['admUser'],'sold'=>'no')); 
					/*******************/	
					$remains = $drug_item['rem_no_of_pack'] - $qty;
					$dbm->updateTb('pharm_products',array('rem_no_of_pack'=>$remains),array('sn'=>$serial));
			
				} 
				else {
					$dbm->insert('stock_products_sales',array('ref_id'=>$serial,'code'=>$drug_item['code'],
					'barcode'=>$drug_item['barcode'],'qty'=>$qty,'cost_price'=>$drug_item['cost_price'],
					'selling_price'=>$drug_item['selling_price'],'tot_cost'=>$tcost,'tot_sales'=>$tsale,
					'sold_by'=>$_SESSION['admUser'])); 
					/*******************/	
					$remains = $drug_item['rem_no_of_pack'] - $qty;
					$dbm->updateTb('pharm_products',array('rem_no_of_pack'=>$remains),array('sn'=>$serial));
				}
				
				### update stock 
				## $drug_item = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$serial)),array('sn','name','code','description','barcode','mfc_date','exp_date','cost_price',
				// $dbm->updateTb('pharm_products',array('remains'=>$remains),array('sn'=>$serial));
			}
		echo " item id $serial, total qty : $qty sold by : ".$_SESSION['admUser'];
		
	}
	
	
	// finalize_checkout
	if(isset($_POST['finalize_checkout'])){ $dbm = new DbTool();  # stock_products_sales
		 $staff_delv_to = $dbm->clean($_POST['staff_delv_to']);  
		$drug_item = $dbm->getFields($dbm->select('stock_products_sales',array('sold_by'=>$_SESSION['admUser'],'sold'=>'no')),array('sn','ref_id','code','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains','qty','tot_cost','tot_sales'));
		 ############################################################
		if(!is_null($drug_item)){ $n = 0; 			
			$tot_price = array_sum($drug_item['tot_sales']);
			$recpno = getPharmRecpId(); 
			$data = array('sold_by'=>$_SESSION['admUser'],'sold_to'=>$staff_delv_to,'pay_type'=>'pharmacy','receipt_no'=>$recpno,'total_fee'=>$tot_price,
			'amount_paid'=>0,'balance'=>$tot_price,'refund'=>0,
			'consume'=>'no','payment_status'=>'unpaid','date_c'=>date('Y-m-d'),'week_c'=>idate('W'),'time_c'=>date('H:i:s',time()));
			$dbm->insert('stock_receipts',$data);
			
			// update pharm store for remains 
			foreach($drug_item['ref_id'] as $serial){
				### update stock 
				 $dbm->updateTb('stock_products_sales',array('sold_to'=>$staff_delv_to,'sold'=>'yes',
					'payment_status'=>'unpaid','receipt_no'=>$recpno,
					'date_sold'=>date('Y-m-d'),'week_sold'=>idate('W'),'time_sold'=>date('H:i:s',time())),
					array('ref_id'=>$serial,'sold'=>'no','sold_by'=>$_SESSION['admUser']));
			} #  end foreach   
			
			$address = "receipt_slip.php?rcn=".base64_encode($recpno);
			echo json_encode(array('icon'=>'success','address'=>$address,'text'=>" Paid Amount $amount_paid , New balance is : $tot_price  ",'title'=>'Stock Released Successfully')); 
			
		}  ## end if not null 
		############################################################################	
			 
		
	}
	##########################################################################
	/******************************************************************/// display_item_cart
	if(isset($_POST['display_item_cart'])){
		## 
		#sleep(1);
		$dbm = new DbTool(); # pharm_products
		$drug_item = $dbm->getFields($dbm->select('stock_products_sales',array('sold_by'=>$_SESSION['admUser'],'sold'=>'no')),array('sn','ref_id','code','barcode','mfc_date','exp_date','cost_price',
				'selling_price','date_c','remains','qty','tot_cost','tot_sales'));
				
		############################################################
		if(!is_null($drug_item)){ $n = 0; 
			$tot_price = array_sum($drug_item['tot_sales']);
		?>				 	
		<table class="table no-gap "> 
				<thead>
					<tr class="bold bg-info text-uppercase text-white"> 
						<td> products </td>
						<td> Unit Price </td>
						<td> Packs  </td>
						<td> Items in pack  </td>
						<td> Total cost </td>
						<td> Manage </td>
					</tr> 
				</thead>
				<tbody>  
				
		<?php	foreach ($drug_item['ref_id'] as $id) {
				  $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$id)),array('sn','name','description','remains','qty_per_pack','rem_no_of_pack','no_of_pack'))); 
			 ?>
					<tr>  					
						<td > <b> <?php echo $drug_info['name'];  ?> </b> <br/>  <small><?php echo $drug_info['description'];?> </small> </td>
						 <!-- <td> <input type="number" class="form-control border-1 font-16 bold item-cart-qty" onchange="manage_item_cart_qty2($(this).attr('for'),$(this).val(),$(this).attr('data-text'),$(this).closest('tr').find('span.sales_label'))" style="width:100px;" value="<?php echo $drug_item['qty'][$n]?>" for="<?php echo $drug_item['sn'][$n];?>"  min="1" max="<?php echo $drug_info ['remains']; ?>" data-text="<?php echo $drug_item['selling_price'][$n]; ?>"  />   </td> -->
						<td class="bold font-16"> <span class="sales_label"> <?php echo "&#8358;&nbsp;".number_format($drug_item['selling_price'][$n]); ?> </span> </td>
						<td> <b> <?php echo $drug_item['qty'][$n]; /*." by ".$drug_info['qty_per_pack']*/ ?> &nbsp; </b>  </td>						 
						<td> ( <?php echo /** $drug_item['qty'][$n]." by ".**/$drug_info['qty_per_pack']; ?> )  </td>						 
						<td class="bold font-16"> <span class="sales_label"> <?php echo "&#8358;&nbsp;".number_format($drug_item['tot_sales'][$n]); ?> </span> </td>
						<td> <span class="text-danger pointer font-20 item-cart-purchase-reverse" onclick="rem_from_my_cart($(this).attr('for'))" for="<?php echo $drug_item['sn'][$n];?>"> <i class="fa fa-times"> </i>  </span> </td>
					</tr> 
			<?php $n++; } ## end foreach.. ?>
				<tr> 
					<td colspan="4" align="right"> <strong> Delivered To : </strong> </td>
					<td  colspan="2" > 
						<input type="text" rel="" name="staff_filter" id="staff_filter" onkeyup="auto_search_staff($(this),$(this).val(),$('.num_list'))" class="form-control border border-primary font-16" placeholder="Staff Name" /> 
						 <div class="form-group">
							<ul class="num_list">  </ul>
						 </div>	
							 
						</td>
				</tr> 
				<tr> 
				<td align="right" colspan="4">
					<?php echo " <h4> <small> Total Cost : &nbsp; </small> &#8358;  ".number_format($tot_price)."</h4>"; ?>  &nbsp; &nbsp;  
				</td>
				<td colspan="2"> <button type="button"  class="checkout btn btn-primary btn-rounded btn-lg ladda-button" data-style="zoom-in" for="<?php echo $tot_price; ?>" data-text="<?php echo number_format($tot_price); ?>" onClick="manage_item_checkout()" onClickagain="$('.amount_due').html('&#8358; '+$(this).attr('data-text')),$('#pay_pharm_now').attr('for',$(this).attr('for')),$('div.output_receipt').hide('fast');"> Check Out &nbsp; <i class="fa fa-shopping-cart"> </i> </button></td>
				</tr>
				</tbody>
			  </table>
			   
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
	/******************************************************************/
		# - rem_from_my_cart
			if(isset($_POST['rem_from_my_cart'])){
				$serial = $dbm->clean($_POST['serial']);
				$dbm = new DbTool();  
				$exists = $dbm->getFields($dbm->select('stock_products_sales',array('sn'=>$serial)),array('barcode','ref_id','selling_price','tot_sales','qty'));	 
				### 
				if(!is_null($exists)) {
					 $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$exists['ref_id'][0])),array('sn','name','description','remains','rem_no_of_pack','qty_per_pack'))); 
					 $remains = $drug_info['rem_no_of_pack'] + $exists['qty'][0];
					 $dbm->updateTb('pharm_products',array('rem_no_of_pack'=>$remains),array('sn'=>$exists['ref_id'][0]));
					 $dbm->deleteRow('stock_products_sales',array('sn'=>$serial)); 
					 echo json_encode(array('icon'=>'success','text'=>$drug_info['name'].'  successfully removed','title'=>'Cart Item Removed'));
				} else {
					echo json_encode(array('icon'=>'error','text'=>'No cart item found ','title'=>'Cart Item Not Found'));
				}
				
			}
	/***********************************************/
	
		
	###################################
	if(isset($_POST['staff_name_search'])){		// customer searching 
		$word = $dbm->clean(strip_tags($_POST["keyword"])); 
		if(!empty($word)) {
			$dbm = new DbTool(); 
			$info = $dbm->getFields($dbm->regExpSearch('users', array('user_id'=>$word,'fullname'=>$word,
					'email'=>$word,'phone'=>$word),array('fullname'), " DESC ",'10'),array('fullname','user_id','fact_id','dept_id'));
			$tot = count($info['fullname']);
			 if(!is_null($info)){
			   $l=0; $m=0;
				  foreach($info['fullname'] as $staff) {
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
	
	// functions
		function getPharmRecpId(){ 
				
				$dbm =  new DbTool();  # database mgr.
				
				$allTransc = $dbm->getFields($dbm->select('stock_receipts',array('pay_type'=>'pharmacy')),array('sn','receipt_no'));
				
				$tot = count($allTransc['receipt_no']);
				
				$lastNo = $tot-1;
				
				$lastId = $allTransc['receipt_no'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,4,strlen($lastId)) + 1;
				
				$newpad = str_pad($newNo,4,'0',STR_PAD_LEFT);
				
				## $newTranscId = "PHMR".str_pad($newNo,4,'0',STR_PAD_LEFT);
				 
				return trim("LBRC$newpad");  
			}
	
	
	/*****************************************************************/
	
	###################################################################
	/****** 	WORKING ON INVOICE GENERATION ******************************/
	// functions
		function getInvoiceNo(){ 
				
				$dbm =  new DbTool();  # database mgr.
				
				$allReports = $dbm->getFields($dbm->select('hospital_invoice_report',array('status'=>'active')),array('sn','invoice_no','hosp_id'));
				
				$tot = count($allReports['invoice_no']);
				
				$lastNo = $tot-1;
				
				$lastId = $allReports['invoice_no'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,4,strlen($lastId)) + 1;
				
				$pretext = date('ym');
				
				$newpad = str_pad($newNo,3,'0',STR_PAD_LEFT);
				
				## $newTranscId = "PHMR".str_pad($newNo,4,'0',STR_PAD_LEFT);
				 
				return trim($pretext."".$newpad);  
			}
	
		### save_this_hospital:"new", hosp_name:$('#hosp_name').val(),
		### address:$('#address').val(), contact_no:$('#contact_no').val(),
		### mode:mode,serial:serial
		if(isset($_POST['save_this_hospital'])){	$dbm = new DbTool(); 
			$hosp_name = filter_var($_POST['hosp_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$address = filter_var($_POST['address'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$contact_no = filter_var($_POST['contact_no'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$mode = filter_var($_POST['mode'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$serial = filter_var($_POST['serial'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			switch ($mode) {
				case "new":{ 
					$exists = $dbm->getFields($dbm->select('hospitals',array('name'=>$hosp_name,'status'=>'active')),array('sn','name','address','contact_no'));
					if(!is_null($exists)){
						echo json_encode(array('icon'=>'warning','text'=>" This Hospital :  ".$exists['name'][0]."already exist, with  address:  ".$exists['address'][0],'title'=>'Duplicate Hospital '));	
					}
					else
					{
						$data = array('name'=>$hosp_name,'address'=>$address,'contact_no'=>$contact_no,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()));
						$dbm->insert('hospitals',$data);
						echo json_encode(array('icon'=>'success','text'=>"New Hospital [' $hosp_name '] Created Successfully ",'title'=>'Successful '));	
					}
					
				} break; 
				case "update":{ 
				  $exists = $dbm->getFields($dbm->select('hospitals',array('sn'=>$serial,'status'=>'active')),array('name','sn'));
				  if(is_null($exists)){
					  echo json_encode(array('icon'=>'error','text'=>" Update Criterial Not Found for [' $hosp_name ' ] ",'title'=>'Cannot Update '));	
					}
					else
					{
						$data = array('name'=>$hosp_name,'address'=>$address,'contact_no'=>$contact_no,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time()));
						$dbm->updateTb('hospitals',$data,array('sn'=>$serial,'status'=>'active'));
						echo json_encode(array('icon'=>'success','text'=>" Update Successful : $hosp_name.  ",'title'=>'Hospital Updated '));	
						}
					}
					break; 
				}  # end switch 
		}
	 ##################################################################
	/******************************************************************/
	
		############# del_hospital:"this",info:data_text #####################		
		/*****************************************/
		##  del_hospital:"this",info:data_text 
		if(isset($_POST['del_hospital'])){ $dbm = new DbTool(); 
			$raw_texts = $_POST['info']; 
			$info = explode('|',$raw_texts); ## hosp_name | address | contact_no | hosp_id
			 $exists = $dbm->getFields($dbm->select('hospitals',array('sn'=>$info[3],'status'=>'active')),array('sn','name','address','contact_no'));
			 if(is_null($exists)){ 
				 echo json_encode(array('icon'=>'error','text'=>" Cannot Delete",'title'=>"Error Deleting ".$info[0]." from ".$info[1]));
			   }
			  else {
			 	 $dbm->updateTb('hospitals',array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time())),array('sn'=>$info[3])); 
				 echo json_encode(array('icon'=>'success','text'=>$info[0]."  Deleted",'title'=>$info[0]." @ ".$info[1].' Was Deleted Successfully'));
			   }
			
		}
		/*****************************************/
 		 ##############################################		 
		if(isset($_POST['load_hospitals'])){  		
					$dbm = new DbTool(); 					 
					$hosp = $dbm->getFields($dbm->select('hospitals',array(''),array('name'),'and','asc'),array('name','sn','address','contact_no')); 
				  ?> 
						<optgroup label="Hospital">
						<option value=""> ..... </option>
						<?php	$n = 0; if(!is_null($hosp)) foreach ($hosp['name']  as $name){ ?>
									<option value="<?php echo $hosp['sn'][$n]; ?>" <?php echo ($_SESSION['hosp_id']==$hosp['sn'][$n])?"selected":"" ?>> <?php echo $name; ?></option>							
						<?php $n ++; } ?>					 
						</optgroup>	
					<?php  
		}
		####################################
		
		/*****************************************/
 		 ###################################
		 ###########	 add_customer_invoice:"this",customer:customer, hosp_id:hosp_id
		 if(isset($_POST['add_customer_invoice'])){   $dbm = new DbTool(); 					 
			$customer = $_POST['customer']; // group 
			$discounts = $_POST['discounts']; // group 
			$hosp_id = filter_var($_POST['hosp_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
			$ins = 0; $dups = 0;  $n = 0; 
			if(!is_null($customer)) foreach($customer as $ticket_no){
			$exist = $dbm->getFields($dbm->select('hospital_invoice',array('hosp_id'=>$hosp_id,'inv_prepared'=>'no','ticket_no'=>$ticket_no,'status'=>'active')),array('ticket_no','sn','invoice_no','hosp_id')); 
			if(is_null($exist)){ # save this to invoice 
				$data = array('hosp_id'=>$hosp_id,'ticket_no'=>$ticket_no,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600));
				$dbm->insert('hospital_invoice',$data);
				$dbm->updateTb('customer_tickets',array('discount'=>$discounts[$n]),array('ticket_no'=>$ticket_no,'status'=>'active'));
				$ins++; 
			} ## end is null 
			else { $dups++;  } 
			$n++; 
			} # end foreach 
			echo json_encode(array('icon'=>'success','title'=>$ins." Customers Added Successfully",'text'=>$dups." Existing Customers Omitted"));
		}
			/*****************************************/
 		 ###################################
		 
		 ###########	remove_customer_invoice:"this",customer:customer, hosp_id:hosp_id
		 if(isset($_POST['remove_customer_invoice'])){   $dbm = new DbTool(); 					 
			$customer = $_POST['customer']; // group 
			$hosp_id = filter_var($_POST['hosp_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
			$ins = 0; $dups = 0; 
			if(!is_null($customer)) foreach($customer as $ticket_no){
			// $exist = $dbm->getFields($dbm->select('hospital_invoice',array('hosp_id'=>$hosp_id,'inv_prepared'=>'no','ticket_no'=>$ticket_no,'status'=>'active')),array('ticket_no','sn','invoice_no','hosp_id')); 
			$exist = $dbm->getFields($dbm->select('hospital_invoice',array('hosp_id'=>$hosp_id,'ticket_no'=>$ticket_no,'status'=>'active')),array('ticket_no','sn','invoice_no','hosp_id')); 
			if(!is_null($exist)){ # remove from invoice 
				$data = array('status'=>'inactive','del_by'=>$_SESSION['admUser'],'date_del'=>date('Y-m-d'),'time_del'=>date('H:i:s',time()));
				#$dbm->updateTb('hospital_invoice',$data,array('hosp_id'=>$hosp_id,'inv_prepared'=>'no','ticket_no'=>$ticket_no,'status'=>'active'));
				$dbm->updateTb('hospital_invoice',$data,array('hosp_id'=>$hosp_id,'ticket_no'=>$ticket_no,'status'=>'active'));
				$ins++; 
			} ## end is null 
			else { $dups++;  } 
			} # end foreach 
			echo json_encode(array('icon'=>'success','title'=>$ins." Customers Removed Successfully",'text'=>$dups." Successful "));
		}
			/*****************************************/
 		 ###################################
		 
		if(isset($_POST['load_staff'])){  		
					$dbm = new DbTool(); 	
					$fields = array('surname','firstname','midname','fullname', 'gender','dob','address','phone', 'password','user_id','c_by','date_employ');
					$users = $dbm->getFields($dbm->select('users',array('acct_status'=>'active'),array('user_id'),'and','asc'),$fields);
				 ?> 
						<optgroup label="Select Staff">	
							<option value="">... Staff ...</option>
						<?php	$n = 0; if(!is_null($users)) foreach ($users['user_id']  as $val){ 
								$dtext = base64_encode($types['sn'][$n]."|".$types['alias'][$n]);
								?>
									<option value="<?php echo $val; ?>"  <?php ?>> <?php echo $users['fullname'][$n]; ?></option>							
						<?php $n++; } ?>					 
						</optgroup>	
					<?php  
		}
		/**********************************************************************/
		
		/** create_bank_account:"new", staff_id:$('#staff_list').val(),acct_name:$('#acct_name').val(),
							bank_list:$('#bank_list').val(),acct_no:$('#acct_no').val(),mode:mode,serial:serial **/
		####
		if(isset($_POST['create_bank_account'])){
			$dbm = new DbTool(); 
			$staff_id = $dbm->clean($_POST['staff_id']);
			$bank_info = explode("|",base64_decode(filter_var($_POST['bank_list'],FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
			$bank_id = $bank_info[0];
			$acct_name = filter_var($_POST['acct_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$acct_no = filter_var($_POST['acct_no'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$mode = filter_var($_POST['mode'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$serial = filter_var($_POST['serial'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);  
			switch ($mode) {
				case "new":{ 
					$exists = $dbm->getFields($dbm->select('accounts',array('staff_id'=>$staff_id,'bank_id'=>$bank_id,'account_no'=>$acct_no,'status'=>'active')),array('staff_id','account_no','account_name','sn'));
					if(!is_null($exists)){
						echo json_encode(array('icon'=>'warning','text'=>" This bank Information already exist for -  bank :  ".$bank_info[1].", Account No:  ".$acct_no,'title'=>'Duplicate Info '));	
					}
					else
					{ $data = array('staff_id'=>$staff_id,'account_name'=>$acct_name,'bank_id'=>$bank_id,'account_no'=>$acct_no);
						$dbm->insert('accounts',$data);
						echo json_encode(array('icon'=>'success','text'=>"Account $acct_name, bank id : $bank_id  ",'title'=>'Successful '));	
					} 
				} break; 
				case "update":{ 
				$exists = $dbm->getFields($dbm->select('accounts',array('sn'=>$serial,'status'=>'active')),array('bank_id','account_no','account_name','staff_id'));
				if(is_null($exists)){
						echo json_encode(array('icon'=>'error','text'=>" Update information Not Found :  ".$bank_info[1].", Account No:  ".$acct_no,'title'=>'Cannot Update '));	
					}
					else
					{ $data = array('staff_id'=>$staff_id,'account_name'=>$acct_name,'bank_id'=>$bank_id,'account_no'=>$acct_no);
						$dbm->updateTb('accounts',$data,array('sn'=>$serial,'status'=>'active'));
						echo json_encode(array('icon'=>'success','text'=>" Update Successful : $acct_name, bank id : $bank_id  ",'title'=>'Updated '));	
					}
				} break; 
			}
		}
	/*******************************************/
		/*******************************************/
	/** del_bank_account:"this",serial:id ,alias:data **/
		####
		if(isset($_POST['del_bank_account'])){ $dbm = new DbTool(); 
			$serial = base64_decode($dbm->clean($_POST['serial']));
			$alias = $dbm->clean($_POST['alias']);
			$exists = $dbm->getFields($dbm->select('accounts',array('sn'=>$serial,'status'=>'active')),array('bank_id','account_no','account_name','staff_id'));
				if(!is_null($exists)){
					$dbm->updateTb('accounts',array('status'=>'inactive'),array('sn'=>$serial,'status'=>'active'));
					echo json_encode(array('icon'=>'success','text'=>$exists['account_name'][0]." Account Deleted Successfully",'title'=>'Successful '));	
				}
				else {
					echo json_encode(array('icon'=>'error','text'=>" No Criteria Matches For Deleting.. ",'title'=>'Cannot Delete '));	
				} 
		}
	/*******************************************/
	
	#### create_invoice_memo:"new",  hosp_id:hosp_id, acct_id:default_acct_id
	############################################################################
		if(isset($_POST['create_invoice_memo'])){ $dbm = new DbTool(); 
			$hosp_id = filter_var($_POST['hosp_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$acct_id = filter_var($_POST['acct_id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			/***********************/
			$ticket_fields = $mydal->TableFields('customer_tickets');
			$invoices = $dbm->getFields($dbm->select('hospital_invoice',array('hosp_id'=>$hosp_id,'inv_prepared'=>'no','status'=>'active')),array('ticket_no','invoice_no','hosp_id','sn'));
			$account_info =  $dbm->getFields($dbm->select('accounts',array('sn'=>$acct_id,'status'=>'active')),array('bank_id','account_no','account_name','staff_id'));
			$hosp_info =  $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id,'status'=>'active')),array('name','address','contact_no','sn'));
			$t_cost = 0; $t_discount = 0;
			/****************************/
			if(is_null($invoices)){
				echo json_encode(array('icon'=>'error','text'=>" Cannot Create Invoice ",'title'=>'No Customer Found To Create Invoice'));	
			}
			else if(is_null($account_info)){
				echo json_encode(array('icon'=>'error','text'=>" Cannot Create Invoice ",'title'=>'Account To Remit Not Found'));	
			}
			else {
				$invoice_no = getInvoiceNo(); 
				foreach($invoices['ticket_no'] as $ticket_no){
					$ticket_info = $dbm->resort($dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'status'=>'active')),$ticket_fields));
					$t_cost += $ticket_info['total_cost'];
					$t_discount += $ticket_info['discount'];
				}
				$text = "Invoice Created Successfully for ".$hosp_info['name'][0]." @ ".$hosp_info['address'][0];
				$title = "Invoice #$invoice_no Was Created For ".$hosp_info['name'][0]. " Successfully with cost of N".number_format($t_cost)." and N".number_format($t_discount)." Discount";
				### invoice table 
				$dbm->updateTb('hospital_invoice',array('inv_prepared'=>'yes','invoice_no'=>$invoice_no,'prep_by'=>$_SESSION['admUser'],'date_prep'=>date('Y-m-d'),'time_prep'=>date('H:i:s',time()-3600)),array('hosp_id'=>$hosp_id,'inv_prepared'=>'no','status'=>'active'));
				### invoice_report table 
				$dbm->insert('hospital_invoice_report',array('hosp_id'=>$hosp_id,'invoice_no'=>$invoice_no,'acct_id'=>$acct_id,'total_cost'=>$t_cost,'discount'=>$t_discount,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time()-3600)));
				
				echo json_encode(array('icon'=>'success','text'=>$text,'title'=>$title));	
			}
			  // if(!is_null($exists)){
					// echo json_encode(array('icon'=>'warning','text'=>" This bank Information already exist for -  bank :  ".$bank_info[1].", Account No:  ".$acct_no,'title'=>'Duplicate Info '));	
				// }
				// else
				// { $data = array('staff_id'=>$staff_id,'account_name'=>$acct_name,'bank_id'=>$bank_id,'account_no'=>$acct_no);
					// $dbm->insert('accounts',$data);
				// 	echo json_encode(array('icon'=>'success','text'=>" $text ",'title'=>'Successful '));	
				// }  
		}
	/*******************************************/
	
	
	/******** start_new_invoice_form:'all', hosp_id:hosp_id.val(), datefrom:datefrom.val(), dateto:dateto.val()  *****************/		
			if(isset($_POST['start_new_invoice_form'])){	  set_time_limit(0);  
				$_SESSION['datefrom'] = $datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$_SESSION['dateto'] = $dateto = $dbm->clean($_POST['dateto']);  # y-m-d
				$_SESSION['hosp_id'] = $hosp_id = $dbm->clean($_POST['hosp_id']);  #  
				$hosp = $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id),array('name'),'and','asc'),array('name','sn','address','contact_no')); 
				$hosp_name = $hosp['name'][0];
				#### start process #### 
				$table1 = "customer_tickets";
				$table2 = "hospital_invoice";
				$ticket_fields = $mydal->TableFields($table1);
				$invoice_fields = $mydal->TableFields($table2);
				$where1 = "status='active' AND payment_completed='no' AND ( date_c >='$datefrom' AND date_c <='$dateto') "; # customer table - where payment not completed 
				$where1A = "status='active' AND payment_completed='no'"; # customer table - where payment not completed 
				$where2 = "status='active' AND payment_completed='no'";  # customer table - where payment not completed 
				$where2A = "status='active' and hosp_id='".$hosp_id."' and inv_prepared='no'";  # 'inv_prepared'=>'no' : to exempt : existing hospital id and invoice already prepared before 
				$whereEq = array('ticket_no');									# comparison of primary key : ticket no 
				
				$selected_tickets = $mydbm->runBaseQuery("SELECT * FROM $table1 WHERE $where1A AND EXISTS ( SELECT * FROM $table2 WHERE $where2A   AND $table1.ticket_no=$table2.ticket_no ) ");
				
				$unselected_tickets = $mydbm->runBaseQuery("SELECT * FROM $table1 WHERE $where1 AND NOT EXISTS ( SELECT * FROM $table2 WHERE $where2   AND $table1.ticket_no=$table2.ticket_no ) ");
				
				$selected_tickets = empty($selected_tickets)?null:$dbm->getFields($selected_tickets,$ticket_fields); 
				$unselected_tickets = empty($unselected_tickets)?null:$dbm->getFields($unselected_tickets,$ticket_fields); 
				
				# $selected_tickets =  "SELECT * FROM $table1 WHERE $where1  AND EXISTS ( SELECT * FROM $table2 WHERE $where2A ) AND $table1.ticket_no=$table2.ticket_no ";
			    # print_r($unselected_tickets);
				#  $dates =  $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE  date_fin >='$datefrom' and date_fin <='$dateto'  order by time_fin , date_fin desc ");
				
				# $_SESSION['selected_tickets'] = $dbm->getFields($dbm->exists($table1,$table2,$where1,$where2A,$whereEq),$fields);
				# $_SESSION['unselected_tickets'] = $dbm->getFields($dbm->not_exists($table1,$table2,$where1,$where2,$whereEq),$fields);
				 
				?>
				<div class="row">
				
				<div class="col-md-12 ">  
				
				 <span class=" h5 text-success bold"> Existing Customers in the invoice for <?php echo $hosp_name; ?> </span>
					<table class="table table-striped table-bordered table-responsive"> 
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllExisting()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Total Cost </td> 
								<td> Discount </td> 
								<td> Balance </td> 
								<td> Name / Address / Date </td> 
								<td> Test Performed </td> 
								
							</tr> 
						</thead> <tbody> 
					<?php  $t_cost = 0; $pd = 0; 
					if(!is_null($selected_tickets)) { $m=0;  
								$t_cost = array_sum($selected_tickets['total_cost']);
								$pd = array_sum($selected_tickets['amount_paid']);
								$t_discount = array_sum($selected_tickets['discount']);
								$t_balance = $t_cost - $pd - $t_discount;
									
							foreach($selected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									}
									$dated = $func->format_date($selected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($selected_tickets['time_c'][$m],'time');
									?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" value="<?php echo $ticket_no; ?>" onClick="highlight_exist_check_rows(),dis_enable_exist_stud_buttons()" class="checkbox exist_checkbox" name="exist_checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo  "&#8358; ".number_format($selected_tickets['total_cost'][$m]); ?> </td> 
								<td> <?php echo "&#8358; ".number_format($selected_tickets['discount'][$m]); ?> </td>
								<td> <?php echo "&#8358; ".number_format(($selected_tickets['total_cost'][$m]-$selected_tickets['amount_paid'][$m]-$selected_tickets['discount'][$m])); ?> </td> 
								<td> <?php echo "<b>".$selected_tickets['fullname'][$m]."</b><br/>@  ".$selected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($selected_tickets['alt_test_name'][$m]=="")?$bill_name:$selected_tickets['alt_test_name'][$m]; ?></td> 
								
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							
								
							<tr>
								<td colspan="2"> </td>
								 <td class="bold">
										<?php echo "&#8358; ".number_format($t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($t_discount);?>
								 </td> 
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($t_balance);?>
								 </td> 
								<td colspan="2"> 
									 <button disabled type="button" onclick="remove_customer($(this).attr('for'))"   for="<?php echo $hosp_id; ?>" class="btn btn-danger btn-rounded btn-lg remove-customer" name="remove-customer"> Remove <span class="exist_count"> 0 </span> Customer  &nbsp;   <i class="fa fa-times-circle font-20"></i> </button>
									  &nbsp; &nbsp; 
									 <button type="button" data-toggle="modal" data-target="#account_selection_modal" onclick="create_invoice($(this).attr('for'))" for="<?php echo $_SESSION['hosp_id']."| &#8358; ".number_format($t_balance); ?>" class="btn btn-success btn-rounded btn-lg add-customer" name="add-customer"> Create Invoice for ( <?php echo count($selected_tickets['ticket_no'])?> ) Customers &nbsp;  <i class="fa fa-send font-20"></i> </button>
								 </td>
								
							</tr>
							
							<tr>
								<td colspan="7" class="bold font-20 text-capitalize" align="center"> 
									 <?php echo "Amount To Collect : ". $func->num_to_word($t_balance)." Naira Only "?>
								 </td>
							</tr>
							
							<?php 
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody>
							
						</table> 
						</div> 
						
						<div class="col-md-12 "> 
						 
						<p>&nbsp; </p>
						<table class="table table-striped table-bordered table-responsive"> 					
						<span class=" h5 text-danger bold"> Non-Existing Customers in the invoice for <?php echo $hosp_name; ?>  </span>
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllUsers()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Total Cost </td> 
								<td> Discount </td> 
								<td> Balance </td> 
								<td> Name / Address / Date  </td> 
								<td> Test Performed </td> 
								
							</tr> 
						</thead> <tbody> 
					<?php   
						if(!is_null($unselected_tickets)) { $un_t_cost = 0; $un_pd = 0;  $m=0; 
									$un_t_cost = array_sum($unselected_tickets['total_cost']);
									$un_pd = array_sum($unselected_tickets['amount_paid']);
									
							foreach($unselected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = empty($specimens)?0:count($specimens['bill_type_id']); 
									 $n = 0;  if(!empty($specimens)) foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									$dated = $func->format_date($unselected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($unselected_tickets['time_c'][$m],'time');
									} ?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" onClick="console.log('am clicked'),highlight_check_rows(),dis_enable_stud_buttons()" value="<?php echo $ticket_no; ?>" class="checkbox stud_box" name="checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['total_cost'][$m]); ?> </td> 
								<td> <input type="text" class="non_exist_checkbox_discount only-numeric form-control font-16" value="<?php echo $unselected_tickets['discount'][$m]; ?>" style="width:100px;" /> </td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['amount_paid'][$m]); ?> </td> 
								<td> <?php echo "<b>".$unselected_tickets['fullname'][$m]." </b> <br/>@  ".$unselected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($unselected_tickets['alt_test_name'][$m]=="")?$bill_name:$unselected_tickets['alt_test_name'][$m]; ?></td> 
								
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							<tr>
								<td colspan="4"> 
									<button disabled type="button" onclick="add_customer($(this).attr('for'))" for="<?php echo $hosp_id; ?>" class="btn btn-primary btn-rounded btn-lg add-customer" name="add-customer"> Add <span class="count"> 0 </span> Customers  To Invoice &nbsp;   <i class="fa fa-plus-circle fa-2x"></i></button>
								</td>
								<td class="bold">
										<?php echo "&#8358; ".number_format($un_t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($un_pd);?>
								 </td>
							</tr>
							<tr>
								<td colspan="6" class="bold font-20 text-capitalize" align="right"> 
									 <?php echo $func->num_to_word($un_t_cost)." Naira Only "?>
								 </td>
							</tr>
							<?php  
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody> 
					</table> 	 
				</div> <!-- col-md-12 -->
				
			</div>
				
		<?php	}
		
		
	/******** update_new_invoice_form:'all', hosp_id:hosp_id.val(), datefrom:datefrom.val(), dateto:dateto.val()  *****************/		
			if(isset($_POST['update_new_invoice_form'])){	  set_time_limit(0);  
				$_SESSION['datefrom'] = $datefrom = $dbm->clean($_POST['datefrom']);  # y-m-d
				$_SESSION['dateto'] = $dateto = $dbm->clean($_POST['dateto']);  # y-m-d
				$_SESSION['hosp_id'] = $hosp_id = $dbm->clean($_POST['hosp_id']);  #  
				$invoice_no = $dbm->clean($_POST['invoice_no']);
				$hosp = $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id),array('name'),'and','asc'),array('name','sn','address','contact_no')); 
				$hosp_name = $hosp['name'][0];
				#### start process ####  
				$table1 = "customer_tickets";
				$table2 = "hospital_invoice";
				$ticket_fields = $mydal->TableFields($table1);
				$invoice_fields = $mydal->TableFields($table2);
				
				$where1 = "status='active' AND payment_completed='no' AND ( date_c >='$datefrom' AND date_c <='$dateto') ";	# customer table - where payment not completed with date duration
				$where1A = "status='active' AND payment_completed='no'";	# customer table - where payment not completed 
				$where2 = "status='active' AND payment_completed='no'";	# customer table - where payment not completed 
				$where2A = "status='active' and invoice_no='".$invoice_no."' and hosp_id='".$hosp_id."' and inv_prepared='yes'";  # 'inv_prepared'=>'yes' : to list : existing hospital id and invoice already prepared before 
				$whereEq = array('ticket_no');									# comparison of primary key : ticket no 
				
				$selected_tickets = $mydbm->runBaseQuery("SELECT * FROM $table1 WHERE $where1A AND EXISTS ( SELECT * FROM $table2 WHERE $where2A   AND $table1.ticket_no=$table2.ticket_no ) ");
				
				$unselected_tickets = $mydbm->runBaseQuery("SELECT * FROM $table1 WHERE $where1 AND NOT EXISTS ( SELECT * FROM $table2 WHERE $where2   AND $table1.ticket_no=$table2.ticket_no ) ");
				
				$selected_tickets = empty($selected_tickets)?null:$dbm->getFields($selected_tickets,$ticket_fields); 
				$unselected_tickets = empty($unselected_tickets)?null:$dbm->getFields($unselected_tickets,$ticket_fields); 
				
				# $selected_tickets =  "SELECT * FROM $table1 WHERE $where1  AND EXISTS ( SELECT * FROM $table2 WHERE $where2A ) AND $table1.ticket_no=$table2.ticket_no ";
			    # print_r($unselected_tickets);
				#  $dates =  $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE  date_fin >='$datefrom' and date_fin <='$dateto'  order by time_fin , date_fin desc ");
				
				# $_SESSION['selected_tickets'] = $dbm->getFields($dbm->exists($table1,$table2,$where1,$where2A,$whereEq),$fields);
				# $_SESSION['unselected_tickets'] = $dbm->getFields($dbm->not_exists($table1,$table2,$where1,$where2,$whereEq),$fields);
				 
				?>
				<div class="row">
				
				<div class="col-md-12 ">  
				
				 <span class=" h5 text-success bold"> Existing Customers in the invoice for <?php echo $hosp_name; ?> </span>
					<table class="table table-striped table-bordered table-responsive"> 
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllExisting()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Total Cost </td> 
								<td> Discount </td> 
								<td> Balance </td> 
								<td> Name / Address / Date </td> 
								<td> Test Performed </td> 
								
							</tr> 
						</thead> <tbody> 
					<?php  $t_cost = 0; $pd = 0; 
					if(!is_null($selected_tickets)) { $m=0;  
								$t_cost = array_sum($selected_tickets['total_cost']);
								$pd = array_sum($selected_tickets['amount_paid']);
								$t_discount = array_sum($selected_tickets['discount']);
								$t_balance = $t_cost - $pd - $t_discount;
									
							foreach($selected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									}
									$dated = $func->format_date($selected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($selected_tickets['time_c'][$m],'time');
									?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" value="<?php echo $ticket_no; ?>" onClick="highlight_exist_check_rows(),dis_enable_exist_stud_buttons()" class="checkbox exist_checkbox" name="exist_checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo  "&#8358; ".number_format($selected_tickets['total_cost'][$m]); ?> </td> 
								<td> <?php echo "&#8358; ".number_format($selected_tickets['discount'][$m]); ?> </td>
								<td> <?php echo "&#8358; ".number_format(($selected_tickets['total_cost'][$m]-$selected_tickets['amount_paid'][$m]-$selected_tickets['discount'][$m])); ?> </td> 
								<td> <?php echo "<b>".$selected_tickets['fullname'][$m]."</b><br/>@  ".$selected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($selected_tickets['alt_test_name'][$m]=="")?$bill_name:$selected_tickets['alt_test_name'][$m]; ?></td> 
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							
							<tr>
								<td colspan="2"> </td>
								 <td class="bold">
										<?php echo "&#8358; ".number_format($t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($t_discount);?>
								 </td> 
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($t_balance);?>
								 </td> 
								<td colspan="2"> 
									 <button disabled type="button" onclick="remove_customer($(this).attr('for'))"   for="<?php echo $hosp_id; ?>" class="btn btn-danger btn-rounded btn-lg remove-customer" name="remove-customer"> Remove <span class="exist_count"> 0 </span> Customer  &nbsp;   <i class="fa fa-times-circle font-20"></i> </button>
									  &nbsp; &nbsp; 
									 <button type="button" data-toggle="modal" data-target="#account_selection_modal" onclick="update_invoice($(this).attr('for'))" for="<?php echo $_SESSION['hosp_id']."| &#8358; ".number_format($t_balance)."|$invoice_no"; ?>" class="btn btn-warning btn-rounded btn-lg add-customer" name="add-customer"> Update Invoice for ( <?php echo count($selected_tickets['ticket_no'])?> ) Customers &nbsp;  <i class="fa fa-send font-20"></i> </button> 
								 </td>
								
							</tr>
							
							<tr>
								<td colspan="7" class="bold font-20 text-capitalize" align="center"> 
									 <?php echo "Amount To Collect : ". $func->num_to_word($t_balance)." Naira Only "?>
								 </td>
							</tr>
							
							<?php 
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody>
							
						</table> 
						</div> 
						
						<div class="col-md-12 "> 
						 
						<p>&nbsp; </p>
						<table class="table table-striped table-bordered table-responsive"> 					
						<span class=" h5 text-danger bold"> Non-Existing Customers in the invoice for <?php echo $hosp_name; ?>  </span>
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllUsers()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Total Cost </td> 
								<td> Discount </td> 
								<td> Balance </td> 
								<td> Name / Address / Date  </td> 
								<td> Test Performed </td> 
								
							</tr> 
						</thead> <tbody> 
					<?php   
						if(!is_null($unselected_tickets)) { $un_t_cost = 0; $un_pd = 0;  $m=0; 
									$un_t_cost = array_sum($unselected_tickets['total_cost']);
									$un_pd = array_sum($unselected_tickets['amount_paid']);
									
							foreach($unselected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = empty($specimens)?0:count($specimens['bill_type_id']); 
									 $n = 0;  if(!empty($specimens)) foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									$dated = $func->format_date($unselected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($unselected_tickets['time_c'][$m],'time');
									} ?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" onClick="console.log('am clicked'),highlight_check_rows(),dis_enable_stud_buttons()" value="<?php echo $ticket_no; ?>" class="checkbox stud_box" name="checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['total_cost'][$m]); ?> </td> 
								<td> <input type="text" class="non_exist_checkbox_discount only-numeric form-control font-16" value="<?php echo $unselected_tickets['discount'][$m]; ?>" style="width:100px;" /> </td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['amount_paid'][$m]); ?> </td> 
								<td> <?php echo "<b>".$unselected_tickets['fullname'][$m]." </b> <br/>@  ".$unselected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($unselected_tickets['alt_test_name'][$m]=="")?$bill_name:$unselected_tickets['alt_test_name'][$m]; ?></td> 
								
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							<tr>
								<td colspan="4"> 
									<button disabled type="button" onclick="add_customer($(this).attr('for'))" for="<?php echo $hosp_id; ?>" class="btn btn-primary btn-rounded btn-lg add-customer" name="add-customer"> Add <span class="count"> 0 </span> Customers  To Invoice &nbsp;   <i class="fa fa-plus-circle fa-2x"></i></button>
								</td>
								<td class="bold">
										<?php echo "&#8358; ".number_format($un_t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($un_pd);?>
								 </td>
							</tr>
							<tr>
								<td colspan="6" class="bold font-20 text-capitalize" align="right"> 
									 <?php echo $func->num_to_word($un_t_cost)." Naira Only "?>
								 </td>
							</tr>
							<?php  
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody> 
					</table> 	 
				</div> <!-- col-md-12 -->
				
			</div>
				
		<?php	}
		
	
	/******** start_new_invoice_text_form:'all', hosp_id:hosp_id.val(),ticket_no:ticket_no.val()  *****************/		
			
			if(isset($_POST['start_new_invoice_text_form'])){	 set_time_limit(0); 
				$_SESSION['ticket_no'] = $ticket_no = $dbm->clean($_POST['ticket_no']); 
				$_SESSION['hosp_id'] = $hosp_id = $dbm->clean($_POST['hosp_id']);  #  
				$hosp = $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id),array('name'),'and','asc'),array('name','sn','address','contact_no')); 
				$hosp_name = $hosp['name'][0];
				#### start process #### 
				$criterial = array('status'=>'active','payment_completed'=>'no');  
				$ticket_fields = $mydal->TableFields('customer_tickets');
				$invoice_fields = $mydal->TableFields('hospital_invoice');
				$table1 = "customer_tickets";
				$table2 = "hospital_invoice";
				$where1 = "status='active' AND payment_completed='no' AND ticket_no like '%$ticket_no%' "; #array('status'=>'active','payment_completed'=>'no');	# customer table - where payment not completed 
				$where2 = "status='active' AND payment_completed='no'"; #array('status'=>'active','payment_completed'=>'no');	# customer table - where payment not completed 
				$where2A = "status='active' and hosp_id='".$hosp_id."' and inv_prepared='no'"; #  array('status'=>'active','hosp_id'=>$_SESSION['hosp_id'],'inv_prepared'=>'no'); # 'inv_prepared'=>'no' : to exempt : existing hospital id and invoice already prepared before 
				$whereEq = array('ticket_no');									# comparison of primary key : ticket no 
				
				$selected_tickets = $mydbm->runBaseQuery("SELECT * FROM $table1 WHERE $where1 AND EXISTS ( SELECT * FROM $table2 WHERE $where2A   AND $table1.ticket_no=$table2.ticket_no ) ");
				
				$unselected_tickets = $mydbm->runBaseQuery("SELECT * FROM $table1 WHERE $where1 AND NOT EXISTS ( SELECT * FROM $table2 WHERE $where2   AND $table1.ticket_no=$table2.ticket_no ) ");
				
				$selected_tickets = empty($selected_tickets)?null:$dbm->getFields($selected_tickets,$ticket_fields); 
				$unselected_tickets = empty($unselected_tickets)?null:$dbm->getFields($unselected_tickets,$ticket_fields); 
				
				# $selected_tickets =  "SELECT * FROM $table1 WHERE $where1  AND EXISTS ( SELECT * FROM $table2 WHERE $where2A ) AND $table1.ticket_no=$table2.ticket_no ";
			    # print_r($unselected_tickets);
				#  $dates =  $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE  date_fin >='$datefrom' and date_fin <='$dateto'  order by time_fin , date_fin desc ");
				
				# $_SESSION['selected_tickets'] = $dbm->getFields($dbm->exists($table1,$table2,$where1,$where2A,$whereEq),$fields);
				# $_SESSION['unselected_tickets'] = $dbm->getFields($dbm->not_exists($table1,$table2,$where1,$where2,$whereEq),$fields);
				 
				?>
				<div class="row">
				
				<div class="col-md-12 ">  
				
				 <span class=" h5 text-success bold"> Existing Customers in the invoice for <?php echo $hosp_name; ?> </span>
					<table class="table table-striped table-bordered table-responsive"> 
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllExisting()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Total Cost </td> 
								<td> Discount </td> 
								<td> Balance </td> 
								<td> Name / Address / Date </td> 
								<td> Test Performed </td> 
							</tr> 
						</thead> <tbody> 
					<?php  $t_cost = 0; $pd = 0; 
					if(!is_null($selected_tickets)) { $m=0;  
								$t_cost = array_sum($selected_tickets['total_cost']);
								$pd = array_sum($selected_tickets['amount_paid']);
								$t_discount = array_sum($selected_tickets['discount']);
								$t_balance = ($t_cost - $t_discount - $pd); 
									
							foreach($selected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									}
									$dated = $func->format_date($selected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($selected_tickets['time_c'][$m],'time');
									?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" value="<?php echo $ticket_no; ?>" onClick="highlight_exist_check_rows(),dis_enable_exist_stud_buttons()" class="checkbox exist_checkbox" name="exist_checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo  "&#8358; ".number_format($selected_tickets['total_cost'][$m]); ?> </td> 
								<td> <?php echo "&#8358; ".number_format($selected_tickets['discount'][$m]); ?> </td> 
								<td> <?php echo "&#8358; ".number_format(($selected_tickets['total_cost'][$m] - $selected_tickets['discount'][$m]- $selected_tickets['amount_paid'][$m])); ?> </td> 
								<td> <?php echo "<b>".$selected_tickets['fullname'][$m]."</b><br/>@  ".$selected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($selected_tickets['alt_test_name'][$m]=="")?$bill_name:$selected_tickets['alt_test_name'][$m]; ?></td> 
								
							</tr> 
							
							<?php $m++;  } ## end foreach   ?>
							
								
							<tr>
								<td colspan="2"> &nbsp; </td> 
								 <td class="bold">
										<?php echo "&#8358; ".number_format($t_cost);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($t_discount);?>
								 </td> 
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($t_balance);?>
								 </td> 
								<td colspan="2"> 
									 <button disabled type="button" onclick="remove_customer($(this).attr('for'))"   for="<?php echo $hosp_id; ?>" class="btn btn-danger btn-rounded btn-lg remove-customer" name="remove-customer"> Remove <span class="exist_count"> 0 </span> Customer  &nbsp;   <i class="fa fa-times-circle font-20"></i> </button>
									  &nbsp; &nbsp; 
									 <button type="button" data-toggle="modal" data-target="#account_selection_modal" onclick="create_invoice($(this).attr('for'))" for="<?php echo $_SESSION['hosp_id']."| &#8358; ".number_format($t_balance); ?>" class="btn btn-success btn-rounded btn-lg add-customer" name="add-customer"> Create Invoice for ( <?php echo count($selected_tickets['ticket_no'])?> ) Customers &nbsp;  <i class="fa fa-send font-20"></i> </button>
								 </td>
								
							</tr>
							
							<tr>
								<td colspan="7" class="bold font-20 text-capitalize" align="center"> 
									 <?php echo "Amount To Collect : ".$func->num_to_word($t_balance)." Naira Only "?>
								 </td>
							</tr>
							
							<?php 
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody>
							
						</table> 
						</div> 
						
						<div class="col-md-12 "> 
						 
						<p>&nbsp; </p>
						<table class="table table-striped table-bordered table-responsive"> 					
						<span class=" h5 text-danger bold"> Non-Existing Customers in the invoice for <?php echo $hosp_name; ?>  </span>
						<thead> 
							<tr class="table-info bold"> 
								<td> <span class="btn btn-simple" onclick="selectAllUsers()"> <i class="fa fa-arrows font-16"> </i> </span></td> 
								<td> Ticket No. </td> 
								<td> Total Cost </td> 
								<td> Discount </td> 
								<td> Balance </td> 
								<td> Name / Address / Date  </td> 
								<td> Test Performed </td> 								
							</tr> 
						</thead> <tbody> 
					<?php   
						if(!is_null($unselected_tickets)) { $un_t_cost = 0; $un_pd = 0;  $m=0; 
									$un_t_cost = array_sum($unselected_tickets['total_cost']);
									$un_pd = array_sum($unselected_tickets['amount_paid']);
									
							foreach($unselected_tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
								$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = empty($specimens)?0:count($specimens['bill_type_id']); 
									 $n = 0;  if(!empty($specimens)) foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									$dated = $func->format_date($unselected_tickets['date_c'][$m]). ",&nbsp; ".$func->format_date($unselected_tickets['time_c'][$m],'time');
									} ?>
								<tr class=""> 
								<td> <div class="checkbox"><label class="label-control"> <input type="checkbox" onClick="console.log('am clicked'),highlight_check_rows(),dis_enable_stud_buttons()" value="<?php echo $ticket_no; ?>" class="checkbox stud_box" name="checkboxes[]"> <?php echo "&nbsp; ".($m+1); ?> </label> </div> </td> 
								<td> <?php echo "<b>".$ticket_no."</b>"; ?> </td> 
								<td> <?php echo "&#8358; ".number_format($unselected_tickets['total_cost'][$m]); ?> </td> 
								<td> <input type="text" class="non_exist_checkbox_discount only-numeric form-control font-16" value="<?php echo $unselected_tickets['discount'][$m]; ?>" style="width:100px;" /> </td> 
								<td> <?php echo "&#8358; ".number_format(($unselected_tickets['total_cost'][$m]-$unselected_tickets['amount_paid'][$m]-$unselected_tickets['discount'][$m])); ?> </td> 								
								<td> <?php echo "<b>".$unselected_tickets['fullname'][$m]." </b> <br/>@  ".$unselected_tickets['hospital'][$m]."<br/> Dated : $dated "; ?> </td> 
								<td> <?php echo ($unselected_tickets['alt_test_name'][$m]=="")?$bill_name:$unselected_tickets['alt_test_name'][$m]; ?></td> 
								
							</tr> 
							
							<?php $m++;  } ## end foreach  ?>
							<tr>
								<td colspan="2"> &nbsp; </td>
								<td class="bold">
										<?php echo "&#8358; ".number_format($un_t_cost);?>
								 </td>
						 <td class="bold">
									 <?php echo "&#8358; ".number_format($un_pd);?>
								 </td>
								 <td class="bold">
									 <?php echo "&#8358; ".number_format($un_pd);?>
								 </td>
								 
								<td colspan="2"> 
									<button disabled type="button" onclick="add_customer($(this).attr('for'))" for="<?php echo $hosp_id; ?>" class="btn btn-primary btn-rounded btn-lg add-customer" name="add-customer"> Add <span class="count"> 0 </span> Customers  To Invoice &nbsp;   <i class="fa fa-plus-circle fa-2x"></i></button>
								</td>
								
							</tr>
							<tr>
								<td colspan="7" class="bold font-20 text-capitalize" align="center"> 
									 <?php echo $func->num_to_word($un_t_cost)." Naira Only "?>
								 </td>
							</tr>
							<?php  
							} 
							else { ?>
								<tr >
									<td class="text-warning font-18" colspan="6" align="center">  No Customer Found  </td>
								</tr>
								
							<?php }
							
							?> </tbody> 
					</table> 	 
				</div> <!-- col-md-12 -->
				
			</div>
				
		<?php	}
		
		
		if(isset($_POST['pay_invoice'])){	   
			# invoice_no:invoice_no, amount_paying:amount_paying.val() 
			  $date_paid = $dbm->clean($_POST['date_paid']);
			  $invoice_no = $dbm->clean($_POST['invoice_no']);
			  $amount_paying = $dbm->clean($_POST['amount_paying']);
			  if(!is_numeric($amount_paying)){
				echo json_encode(array('icon'=>'error','text'=>'Amount Must Be Numeric','title'=>'Invalid Amount!'));  
			  }
			  else {
				  $invoice_exists = $dbm->getFields($dbm->select('hospital_invoice_report',array('status'=>'active','invoice_no'=>$invoice_no)),$mydal->TableFields('hospital_invoice_report'));
				  if(empty($invoice_exists)){
					  echo json_encode(array('icon'=>'error','text'=>"Invoice Details ($invoice_no) Not Found",'title'=>'Invalid Information!'));  
				  }
				  else {
					$invoice_exists = $dbm->resort($invoice_exists);					
					$cost = $invoice_exists['total_cost']; $discount = $invoice_exists['discount']; $amount_paid = $invoice_exists['amount_paid'];
					$fin_cost  = $cost - $discount; 
					$init_balance  = $cost - $discount - $amount_paid; 
					$new_amount_paid = $amount_paid + $amount_paying; 
					##
					$new_balance = $init_balance - $amount_paying; 
					$new_balance = ($new_balance <=0)?0:$new_balance;
					$_change = ($new_amount_paid >= $fin_cost)?$new_amount_paid - $fin_cost:0;					
					##
					$payment_completed = ($new_balance <= 0)?'yes':'no'; 
					$payment_finalized = ($payment_completed == 'yes')?'yes':'no';			
					##					
					$date_paid = Carbon::now(); 
					# $time_paid = date('H:i:s',time()-3600);
					$result = $dbm->updateTb('hospital_invoice_report',array('amount_paid'=>$new_amount_paid,
						'paym_completed'=>$payment_completed,'_change'=>$_change,
						'balance'=>$new_balance,'date_paid'=>$date_paid),
						array('status'=>'active','invoice_no'=>$invoice_no));
					# check if payment has been completed and update customer_tickets payment_completed
					if($payment_completed == "yes"){
						$ticket_nos = $dbm->getFields($dbm->select('hospital_invoice',array('invoice_no'=>$invoice_no,'status'=>'active')),$mydal->TableFields('hospital_invoice'));
						if(!is_null($ticket_nos)){
							foreach($ticket_nos['ticket_no'] as $ticket_no){
								$dbm->updateTb('customer_tickets',array('payment_completed'=>$payment_completed,'payment_finalized'=>$payment_finalized,'paym_date_fin'=>$date_paid,'paym_time_fin'=>date('H:i:s',time()-3600)),array('status'=>'active','ticket_no'=>$ticket_no));
							}
						}
					}
					echo json_encode(array('icon'=>'success','html'=>"Amount To Pay $balance - Amount Paying $amount_paying  - Invoice No $invoice_no",'title'=>'Successful'));  
				  }
				  
			  }
		}
		
		
		/***********************************************
		*********** WORKING WITH LAB REPORTS************
		************************************************/
		if(isset($_POST['search_all_test_with_dates']))	{	## search_all_test_with_dates:"new",view_mode:view_mode, datefrom:datefrom,dateto:dateto
			$datefrom = $dbm->clean($_POST['datefrom']);
			$dateto = $dbm->clean($_POST['dateto']);
			$_SESSION['view_mode'] = $view_mode = $dbm->clean($_POST['view_mode']);
			$year = date('Y',strtotime($dateto));
			### check for error
			if($datefrom > $dateto) {
				echo "<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"; 
				} # end if validating 
			else {
			$dates = get_date_range($datefrom,$dateto);
			
			switch($view_mode){
				case 'daily':{ ?>
					<div class="h5 table-info alert "> <b> Daily Report View : </b> From &nbsp; &nbsp;  <?php echo $func->format_date($datefrom); ?>&nbsp; &nbsp;<b> To </b>&nbsp; &nbsp;  <?php echo $func->format_date($dateto); ?>  </div>
					<hr/> <!-- start output  -->
					<?php 
						if(!empty($dates))foreach($dates as $days){ ?>
							 <div class="card"> <div class="card-header bold" style="margin-top:10px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;"> <i class="icon-calendar "></i> &nbsp; <?php echo $func->format_date($days) ?></div> 
								<div class="card-body" style="margin-top:0px; margin-bottom:5px; padding-top:0px; padding-bottom:5px;"> 
									
									<?php $tests =  $mydbm->runBaseQuery("SELECT bill_type_id, bill_price, count(bill_type_id) as total FROM customer_specimen WHERE date_c='".$days."' AND status='active' and finalized='yes' GROUP BY bill_type_id ORDER BY bill_type_id");
										if(!empty($tests)){ ?>
											<table class="table table-hover table-bordered tablesorter"> <thead> <tr class="bold">  <td> SN </td> <td> TEST NAME </td> <td> TOTAL </td>  <td> COST  </td> </tr> </thead>
											<tbody><?php $tsum = 0; 
												foreach( $tests as $k=>$v){
													$test_info = $mydbm->runBaseQuery("SELECT * FROM bill_types WHERE sn='".$tests[$k]['bill_type_id']."' AND status='active'");
													// $test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c='".$days."' AND bill_type_id='".$tests[$k]['bill_type_id']."' AND  status='active'");
												echo "<tr> <td> ".($k+1)." </td> <td> ".$test_info[0]['name']." "."</td>  <td> ".$tests[$k]['total']." </td> <td> &#8358; ".number_format($tests[$k]['total']*$tests[$k]['bill_price'])."<small> <br/> each  &#8358; ".number_format($tests[$k]['bill_price'])."</small> </td>  </tr>"; 
												# $tsum += ($tests[$k]['total']*$test_info[0]['price']);
												$tsum += ($tests[$k]['total']*$tests[$k]['bill_price']);
											} # end foreach ?>
											<tr> <td> </td> <td> </td> <td> </td> <th> <?php echo "&#8358; ". number_format($tsum); ?></th> </tr>
											</tbody></table>
										<?php } # end not empty 
										else {
											echo "<span class='text-danger'>No Test Was Recorded This Day </span> ";
										}
									?>
								</div>
							</div> <hr/>
							
						<?php }
					?>
					
				
				
				
				<?php } break; 
				/*********************************/
				case 'weekly':{ ?>
					<div class="h5 table-info alert "> <b> Weekly Report View : </b>  </div>
					
						<?php $weeks = array(); 
						foreach($dates as $ddate){
							$date = new DateTime($ddate); 
							$weeks[] = $date->format('W'); 
						}
					 $weeks =  array_values(array_unique($weeks)); 
					 # 	QUERY SQL 
					 if(!empty($weeks)){
						 foreach($weeks as $week){ 
							  $week_periods = get_start_end_week_dates($week,$year);  
							  /** From &nbsp; &nbsp;  <?php echo $func->format_date($datefrom); ?>&nbsp; &nbsp;<b> To </b>&nbsp; &nbsp;  <?php echo $func->format_date($dateto); ?> **/
							   ?>
							  <div class="card"> <div class="card-header bold" style="margin-top:10px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;"> <i class="icon-calendar "></i> &nbsp; <?php echo "Week ".$week." &nbsp; From  ".$func->format_date($week_periods['start'])." &nbsp; To &nbsp; ".$func->format_date($week_periods['end']); # print_r($week_periods); ?></div> 
								<div class="card-body" style="margin-top:0px; margin-bottom:5px; padding-top:0px; padding-bottom:5px;"> 
									
									<?php 
										#$tests =  $mydbm->runBaseQuery("SELECT DISTINCT bill_type_id FROM customer_specimen WHERE date_c >='".$week_periods['start']."' AND date_c <='".$week_periods['end']."' AND status='active'");
										$tests =  $mydbm->runBaseQuery("SELECT bill_type_id, bill_price, count(bill_type_id) as total FROM customer_specimen WHERE date_c BETWEEN '".$week_periods['start']."' AND  '".$week_periods['end']."'  AND status='active'  GROUP BY bill_type_id ORDER BY bill_type_id");
										if(!empty($tests)){ ?>
											<table class="table table-hover table-bordered tablesorter"> <thead> <tr class="bold">  <td> SN </td> <td> TEST NAME </td> <td> TOTAL </td>  <td> COST  </td> </tr> </thead>
											<tbody><?php $tsum = 0; 
												foreach( $tests as $k=>$v){
													$test_info = $mydbm->runBaseQuery("SELECT * FROM bill_types WHERE sn='".$tests[$k]['bill_type_id']."' AND status='active'");
													# $test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c BETWEEN '".$week_periods['start']."' AND '".$week_periods['end']."' AND bill_type_id='".$tests[$k]['bill_type_id']."' AND  status='active'");
													$test_count = $tests[$k]['total'];
												echo "<tr> <td> ".($k+1)." </td> <td> ".$test_info[0]['name']." </td>  <td> ".$test_count." </td> <td> &#8358; ".number_format($test_count*$tests[$k]['bill_price'])."<small> <br/> each  &#8358; ".number_format($tests[$k]['bill_price'])."</small> </td>  </tr>"; 
												# $tsum += ($test_count*$test_info[0]['price']);
												$tsum += ($test_count*$tests[$k]['bill_price']);
											} # end foreach ?>
											<tr> <td> </td> <td> </td> <td> </td> <th> <?php echo "&#8358; ". number_format($tsum); ?></th> </tr>
											</tbody></table>
										<?php } # end not empty 
										else {
											echo "<span class='text-danger'>No Test Was Recorded This Week </span> ";
										}
									?>
								</div>
							</div> <hr/>  
							  
						 <?php }
					 }
					 
					
					 
					 
					
				} break; 
				/*********************************/
				case 'monthly':{ ?> <div class="h5 table-info alert "> <b> Monthly Report View : </b>  </div>
					<?php
					$months = array(); 
						foreach($dates as $ddate){
							$date = new DateTime($ddate); 
							$months[] = $date->format('m'); 
						}
					 $months = array_values(array_unique($months)); 
					 
					 # 	QUERY SQL 
					 if(!empty($months)){
						 foreach($months as $month){ 
							  $month_periods = get_start_end_month_dates($month,$year);  
							  /** From &nbsp; &nbsp;  <?php echo $func->format_date($datefrom); ?>&nbsp; &nbsp;<b> To </b>&nbsp; &nbsp;  <?php echo $func->format_date($dateto); ?> **/
							   ?>
							  <div class="card"> <div class="card-header bold" style="margin-top:10px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;"> <i class="icon-calendar "></i> &nbsp; <?php echo month_name($month)." &nbsp;:  From  ".$func->format_date($month_periods['start'])." &nbsp; To &nbsp; ".$func->format_date($month_periods['end']); # print_r($month_periods); ?></div> 
								<div class="card-body" style="margin-top:0px; margin-bottom:5px; padding-top:0px; padding-bottom:5px;"> 
									
									<?php 
										$tests =  $mydbm->runBaseQuery("SELECT bill_type_id, bill_price, count(bill_type_id) as total FROM customer_specimen WHERE date_c >='".$month_periods['start']."' AND date_c <='".$month_periods['end']."' AND finalized='yes' AND  status='active' GROUP BY bill_type_id  ORDER BY bill_type_id");
										# $tests =  $mydbm->runBaseQuery("SELECT DISTINCT bill_type_id FROM customer_specimen WHERE date_c >='".$month_periods['start']."' AND date_c <='".$month_periods['end']."' AND finalized='yes' AND  status='active' ");
										#$tests =  $mydbm->runBaseQuery("SELECT DISTINCT bill_type_id FROM customer_specimen WHERE date_c BETWEEN '".$month_periods['start']."' AND  '".$month_periods['end']."' AND finalized='yes' AND status='active' ");
										if(!empty($tests)){ ?>
											<table class="table table-hover table-bordered tablesorter"> <thead> <tr class="bold">  <td> SN </td> <td> TEST NAME </td> <td> TOTAL </td>  <td> COST  </td> </tr> </thead>
											<tbody><?php $tsum = 0; 
												foreach( $tests as $k=>$v){
													$test_info = $mydbm->runBaseQuery("SELECT * FROM bill_types WHERE sn='".$tests[$k]['bill_type_id']."' AND status='active'");
													# $test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c BETWEEN '".$month_periods['start']."' AND '".$month_periods['end']."' AND bill_type_id='".$tests[$k]['bill_type_id']."' AND finalized='yes'  AND  status='active'");
													# $test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c >= '".$month_periods['start']."' AND date_c <='".$month_periods['end']."' AND bill_type_id='".$tests[$k]['bill_type_id']."' AND finalized='yes' AND  status='active'");
													$test_count = $tests[$k]['total'];
												echo "<tr> <td> ".($k+1)." </td> <td> ".$test_info[0]['name']." </td>  <td> ".$test_count." </td> <td> &#8358; ".number_format($test_count*$tests[$k]['bill_price'])."<small> <br/> each  &#8358; ".number_format($tests[$k]['bill_price'])."</small> </td>  </tr>"; 
												$tsum += ($test_count*$tests[$k]['bill_price']);
											} # end foreach ?>
											<tr> <td> </td> <td> </td> <td> </td> <th> <?php echo "&#8358; ". number_format($tsum); ?></th> </tr>
											</tbody></table>
										<?php } # end not empty 
										else {
											echo "<span class='text-danger'>No Test Was Recorded This Month </span> ";
										}
									?>
								</div>
							</div> <hr/>  
							  
						 <?php }
					 }
					  
					
				} break; 
				/*********************************/
			} /*********** END SWITCH ***********/
			
			} # end else 
			
			}
			
			/************************************************/
			if(isset($_POST['search_specific_test_with_dates'])) {	## search_all_test_with_dates:"new",view_mode:view_mode, datefrom:datefrom,dateto:dateto,bill_type_id:bill_type_id
			$datefrom = $dbm->clean($_POST['datefrom']);
			$dateto = $dbm->clean($_POST['dateto']);
			$bill_type_id = $dbm->clean($_POST['bill_type_id']);
			$_SESSION['view_mode'] = $view_mode = $dbm->clean($_POST['view_mode']);
			$year = date('Y',strtotime($dateto));
			### check for error
			if($datefrom > $dateto) {
				echo "<div class='alert alert-danger bold'> <i class='fa fa-warning'> </i> calendar date must be clockwise </div>"; 
				} # end if validating 
			else {
			$dates = get_date_range($datefrom,$dateto);
			$test_info = $mydbm->runBaseQuery("SELECT * FROM bill_types WHERE sn='".$bill_type_id."' AND status='active'");
			switch($view_mode){
				case 'daily':{ ?>
					<div class="h5 table-info alert "> <b> Daily Report View &nbsp; ( <?php echo $test_info[0]['name']; ?> ) </b> From &nbsp; &nbsp;  <?php echo $func->format_date($datefrom); ?>&nbsp; &nbsp;<b> To </b>&nbsp; &nbsp;  <?php echo $func->format_date($dateto); ?>  </div>
					<hr/> <!-- start output  -->
					<?php 
						if(!empty($dates))foreach($dates as $days){ ?>
							 <div class="card"> <div class="card-header bold" style="margin-top:10px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;"> <i class="icon-calendar "></i> &nbsp; <?php echo $func->format_date($days) ?></div> 
								<div class="card-body" style="margin-top:0px; margin-bottom:5px; padding-top:0px; padding-bottom:5px;"> 
									
									<?php 
										 $test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c='".$days."' AND bill_type_id='".$bill_type_id."' AND  status='active'");
										 if($test_count!=0){ ?>
											<table class="table table-hover table-bordered tablesorter"> <thead> <tr class="bold">  <td> SN </td> <td> TEST NAME </td> <td> TOTAL </td>  <td> COST  </td> </tr> </thead>
											<tbody><?php $tsum = 0; 
												 echo "<tr> <td> ".(1)." </td> <td> ".$test_info[0]['name']." </td>  <td> ".$test_count." </td> <td> &#8358; ".number_format($test_count*$test_info[0]['price'])."<small> <br/> each  &#8358; ".number_format($test_info[0]['price'])."</small> </td>  </tr>"; 
												$tsum += ($test_count*$test_info[0]['price']);
												?>
											<tr> <td> </td> <td> </td> <td> </td> <th> <?php echo "&#8358; ". number_format($tsum); ?></th> </tr>
											</tbody></table>
										<?php  } # end not empty 
										else {
											echo "<span class='text-danger'>No Test Was Recorded This Day </span> ";
										}
									?>
								</div>
							</div> <hr/>
							
						<?php }
					?>
					
				
				
				
				<?php } break; 
				/*********************************/
				case 'weekly':{ ?>
					<div class="h5 table-info alert "> <b> Weekly Report View : &nbsp; ( <?php echo $test_info[0]['name']; ?> ) </b>  </div>
				
						<?php $weeks = array(); 
						foreach($dates as $ddate){
							$date = new DateTime($ddate); 
							$weeks[] = $date->format('W'); 
						}
					 $weeks =  array_values(array_unique($weeks)); 
					 # 	QUERY SQL 
					 if(!empty($weeks)){
						 foreach($weeks as $week){ 
							  $week_periods = get_start_end_week_dates($week,$year);  
							  /** From &nbsp; &nbsp;  <?php echo $func->format_date($datefrom); ?>&nbsp; &nbsp;<b> To </b>&nbsp; &nbsp;  <?php echo $func->format_date($dateto); ?> **/
							   ?>
							  <div class="card"> <div class="card-header bold" style="margin-top:10px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;"> <i class="icon-calendar "></i> &nbsp; <?php echo "Week ".$week." &nbsp; From  ".$func->format_date($week_periods['start'])." &nbsp; To &nbsp; ".$func->format_date($week_periods['end']); # print_r($week_periods); ?></div> 
								<div class="card-body" style="margin-top:0px; margin-bottom:5px; padding-top:0px; padding-bottom:5px;"> 
									
									<?php 
										$test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c BETWEEN '".$week_periods['start']."' AND '".$week_periods['end']."' AND bill_type_id='".$bill_type_id."' AND  status='active'");
										 if($test_count >0){ ?>
											<table class="table table-hover table-bordered tablesorter"> <thead> <tr class="bold">  <td> SN </td> <td> TEST NAME </td> <td> TOTAL </td>  <td> COST  </td> </tr> </thead>
											<tbody><?php $tsum = 0; 
												echo "<tr> <td> ".($k+1)." </td> <td> ".$test_info[0]['name']." </td>  <td> ".$test_count." </td> <td> &#8358; ".number_format($test_count*$test_info[0]['price'])."<small> <br/> each  &#8358; ".number_format($test_info[0]['price'])."</small> </td>  </tr>"; 
												$tsum += ($test_count * $test_info[0]['price']);
											  ?>
											<tr> <td> </td> <td> </td> <td> </td> <th> <?php echo "&#8358; ". number_format($tsum); ?></th> </tr>
											</tbody></table>
										<?php } # end not empty 
										else {
											echo "<span class='text-danger'>No Test Was Recorded This Week </span> ";
										}
									?>
								</div>
							</div> <hr/>  
							  
						 <?php }
					 }
					 
					
					 
					 
					
				} break; 
				/*********************************/
				case 'monthly':{ ?>  <div class="h5 table-info alert "> <b> Monthly Report View : &nbsp; ( <?php echo $test_info[0]['name']; ?> ) </b>  </div>
				 	<?php
					$months = array(); 
						foreach($dates as $ddate){
							$date = new DateTime($ddate); 
							$months[] = $date->format('m'); 
						}
					 $months = array_values(array_unique($months)); 
					 
					 # 	QUERY SQL 
					 if(!empty($months)){
						 foreach($months as $month){ 
							  $month_periods = get_start_end_month_dates($month,$year);  
							  /** From &nbsp; &nbsp;  <?php echo $func->format_date($datefrom); ?>&nbsp; &nbsp;<b> To </b>&nbsp; &nbsp;  <?php echo $func->format_date($dateto); ?> **/
							   ?>
							  <div class="card"> <div class="card-header bold" style="margin-top:10px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;"> <i class="icon-calendar "></i> &nbsp; <?php echo month_name($month)." &nbsp;:  From  ".$func->format_date($month_periods['start'])." &nbsp; To &nbsp; ".$func->format_date($month_periods['end']); # print_r($month_periods); ?></div> 
								<div class="card-body" style="margin-top:0px; margin-bottom:5px; padding-top:0px; padding-bottom:5px;"> 
									
									<?php 
									
										$test_count = $mydbm->num_rows("SELECT * FROM customer_specimen WHERE date_c BETWEEN '".$month_periods['start']."' AND '".$month_periods['end']."' AND bill_type_id='".$bill_type_id."' AND  status='active'");
										 if($test_count >0){ ?>
											<table class="table table-hover table-bordered tablesorter"> <thead> <tr class="bold">  <td> SN </td> <td> TEST NAME </td> <td> TOTAL </td>  <td> COST  </td> </tr> </thead>
											<tbody><?php $tsum = 0; 
												echo "<tr> <td> ".($k+1)." </td> <td> ".$test_info[0]['name']." </td>  <td> ".$test_count." </td> <td> &#8358; ".number_format($test_count*$test_info[0]['price'])."<small> <br/> each  &#8358; ".number_format($test_info[0]['price'])."</small> </td>  </tr>"; 
												$tsum += ($test_count * $test_info[0]['price']);
											  ?>
											<tr> <td> </td> <td> </td> <td> </td> <th> <?php echo "&#8358; ". number_format($tsum); ?></th> </tr>
											</tbody></table>
										<?php } # end not empty 
									 
										else {
											echo "<span class='text-danger'>No Test Was Recorded This Month </span> ";
										}
									?>
								</div>
							</div> <hr/>  
							  
						 <?php }
					 } 
					
				} break; 
				/*********************************/
			} /*********** END SWITCH ***********/
			
			} # end else 
			
			}
			/******************* *************************/
			  
                  
              ## save speacialist report 
              ## save_specialist_report:'this',bill_id:bill_id,message:message,ticket_no:ticket_no
              if(isset($_POST['save_specialist_report'])){
                  $bill_id = $dbm->clean($_POST['bill_id']); 
                  $message = $dbm->clean($_POST['message'],'html'); 
                  $ticket_no = $dbm->clean($_POST['ticket_no']); 
                  $customer_id = $dbm->clean($_POST['customer_id']); 
                  $user_id =  $_SESSION['admUser']; $table = 'specialist_report';
                  $cond = ['c_by'=>$user_id, 'customer_id'=>$customer_id, 'ticket_no'=>$ticket_no,'bill_type_id'=>$bill_id];
                  
                  ## check 
                  $exists = $dbm->select($table,$cond);
                  if(empty($exists)){
                      $dbm->insert($table,array_merge($cond,['message'=>$message,'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s')])); 
                      echo "Report Successfully Saved";
                  }
                  else {
                      $dbm->updateTb($table,['message'=>$message],$cond);
                      echo "Report Successfully Updated";
                  }
                 //  echo json_encode([$bill_id,$message,$ticket_no,$user_id]);
                  
              }


     ################### NEW / EXTRA ADDITIONAL CODES #####################
       
         if(isset($_POST['save_donators_blood'])){

         		// print_r($_POST);
         		 $blood_type = $dbm->clean($_POST['blood_type']); 
         		  $cell_volume = $dbm->clean($_POST['cell_volume']); 
         		   $date_collected = $dbm->clean($_POST['date_collected']); 
         		    $customer_id = $dbm->clean($_POST['customer_id']); 
         		    $table = "donations"; $cond=['donor_id'=> $customer_id,'donation_date'=>$date_collected];

         		    if(!is_numeric($cell_volume)){
         		    	echo json_encode(array('icon'=>'error','text'=>"Cell Volume must be in figure not string",'title'=>'Invalid Cell Volume!'));  
         		    }
         		     else if($blood_type==""){
         		    	 	echo json_encode(array('icon'=>'error','text'=>"Please select blood type  ",'title'=>'No blood type !'));  
         		    	 }
         		    else {
         		    	# save the record 
         		    	 $exists = $dbm->select($table,$cond);
         		    	 if(empty($exists)){
         		    	 	$dbm->insert($table,array_merge($cond,['blood_volume_ml'=>$cell_volume,'blood_type'=>$blood_type,'c_by'=>$_SESSION['admUser']])); 
         		    	 	echo json_encode(array('icon'=>'success','text'=>"Donation Successfully Saved",'title'=>'Saved'));  
         		    	 }

         		    	 else {
         		    		$dbm->updateTb($table,['blood_volume_ml'=>$cell_volume,'blood_type'=>$blood_type,'upd_by'=>$_SESSION['admUser']],$cond);  	
							echo json_encode(array('icon'=>'success','text'=>"Donation Successfully Updated",'title'=>'Updated'));  
         		    	 }

         		    }
         }

         if(isset($_POST['view_recent_donation'])){
         	$dbm = new DbTool(); $func = new functions(); 

         	// print_r($_POST); die;  
         	$table = "donations"; 

			$process_status = $dbm->clean($_POST['process_status']);  # yes / no
			$process_date = $dbm->clean($_POST['process_date']);  # y-m-d
			
			$exist = $dbm->select($table,['test_processed'=>'no']);

			//print "<pre>"; 
			//print_r($exist); die; 
			$dt = new Carbon(); 

			if(!is_null($exist)){ 
						
				$n = 0; ?> <div class="row">
				<?php foreach($exist as $ticket_no){ 
					$me = $mydbm->runBaseQuery("select fullname from customer_info where id='".$ticket_no['donor_id']."'");
					//print "<pre>"; 
		 			//print_r($ticket_no); // die;  
					?>
					<div class="col-sm-12 col-md-6 grid-margin stretch-card">
                           <div class="card">
							<div class="card-body">
							  <div class="d-flex justify-content-center">
								<i class="mdi mdi-cup icon-lg text-primary d-flex align-items-center"></i>
								<div class="d-flex flex-column ml-4">
								  <span class="d-flex flex-column">
									<p class="mb-0 bold"> <?php echo $ticket_no['donor_id']; ?> </p>
									<h4 class="font-weight-bold pointer">  <?php $link = base64_encode($ticket_no['sn']); $pc = base64_encode('no');  echo "<a href='process_ticket.php?r_val=$link&pc=$pc' target='_blank' class='unstyle'>". $me[0]['fullname']."</a>"; ?> </h4>
									<small class="text-italic text-muted ">
									 <?php echo $ticket_no['blood_volume_ml']." ml";?> &nbsp; | &nbsp;
									 <?php echo $ticket_no['blood_type'];?>
									   </small>
								  </span> 
								</div>
							  </div>

							  <a href="#" data-toggle="modal" data-target="" class="btn btn-sm btn-outline-info btn-rounded pull-left"> Rapid Screening</a>    
							  <a href="#" data-toggle="modal" data-target="" class="btn btn-sm btn-outline-success btn-rounded pull-right">Eliza Screening</a>


                            </div><div class="card-footer bg-light border-0 borderless pt-1 pb-1 text-muted font-weight-bold">
                            	<span class=" badge badge-primary pull-left"> <?php echo $ticket_no['sn'];?>  </span>
                            	<span class="pull-right"> <?php echo Carbon::parse($ticket_no['donation_date'])->diffForHumans();?> </span>

                            </div>
						  </div>
						</div>  <!-- ./ col-12 col-sm-6 -->	
						 
				<?php $n++; }
				?>  </div> 
				  
			 <?php  } # end not null 
			else {
				echo "<center> <span class='text-primary'> No Ticket Found  </span> </center>";
			} # end null 
         }

         if(isset($_POST['view_all_blood_test_qtn'])){
         	$dbm = new DbTool(); $func = new functions(); 

         	// print_r($_POST); die;  
         	$table = "blood_test_questions"; 

			$exist = $dbm->select($table,['']);

			//print "<pre>"; 
			//print_r($exist); die; 
			$dt = new Carbon(); 

			if(!is_null($exist)){  $n = 1; 
				$response = ['bitwise'=>'True / False','filling'=>'Fill In Answers'];
				 ?> <div class="row"> <table class='table  table-striped '>
				<thead ><tr ><th class="font-weight-bold">S/N</th><th class="font-weight-bold">Type of Test </th><th class="font-weight-bold"> Possible Answer Type </th>
				<th class="font-weight-bold">Response Options </th>
				<th class="font-weight-bold">Actions</th> </thead>
				<?php foreach($exist as $tests) : 
					$data_text = $tests['question']."|".$tests['option_type']."|".$tests['id']."|".$tests['if_true_val']."|".$tests['if_false_val']."|".$tests['alt_val'];
					?>
					 <tr>
						<td> <?php echo $n;  ?> </td>
						<td> <?php echo $tests['question'];  ?> </td>
						<td> <?php echo $response[$tests['option_type']];  ?>   </td>
						<td> <?php echo $tests['if_true_val']." / ". 
							 $tests['if_false_val']. " / ". $tests['alt_val']
						;  ?>   </td>
						<td> 
							<div class="btn-group border border-white" role="group" aria-label="Basic example">
								<button onclick="show_update_buttons(),set_update_blood_test_type($(this).attr('data-text'))" data-toggle="modal" data-target="#BloodTestQtnForm" type="button" rel="tooltip" title=" Update <?php echo $tests['question']; ?>" data-text="<?php echo $data_text; ?>" class="edit-blood-test-type' unvisible btn btn-default btn-rounded">
									<i class="fa fa-pencil"></i>
								</button>
							
								<button type="button" rel="tooltip" title="Remove <?php echo $tests['question']; ?>" for="<?php echo $tests['id']; ?>" data-text="<?php echo $tests['question']; ?>"  class="del-role unvisible btn btn-danger btn-rounded">
									<i class="fa fa-close">  </i>
								</button> 
							</div> 
						</td> 
					 </tr>
						 
				<?php $n++; endforeach; 
				?> </table> </div> 
				  
			 <?php  } # end not null 
			else {
				echo "<center> <span class='text-primary'> No Test Question Found  </span> </center>";
			} # end null 
         }
		 
		 		
		/*********** view_all_blood_test_categ **************/			
			if(isset($_POST['view_all_blood_test_categ'])){	$dbm = new DbTool(); 
				$func = new functions(); 
				  #### validate ####  
				 $table = "blood_test_categories";
				 $rows = $mydbm->runBaseQuery("SELECT * FROM $table");
				
				if(empty($rows)) {
					echo "<div class='alert alert-warning bold'>  No Category of Blood Test is available </div>"; 
				}
				else {
					
					## get all blood test questions 
					
					$quests = $mydbm->runBaseQuery("SELECT * FROM blood_test_questions");
			  
					foreach($rows as $k=>$v) : 
						$selections = $v['test_qtn_ids']; 
						$selected = [];
						if($selections !=""){
							$selected = explode("|",$selections);
						}
						?>
					
					<form method="post" id="<?php echo 'quest-'.$v['id']; ?>">
						<div class="accordion basic-accordion" id="<?php echo 'accordion'.$k; ?>" role="tablist">
							<div class="card">
								<div class="card-header" role="tab" id="<?php echo 'heading'.$k; ?>"> 
								  <h6 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="<?php echo '#collapse'.$k; ?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$k; ?>">
									  <i class="card-icon mdi mdi-account-multiple-outline"></i> <?php echo $rows[$k]['name']; ?> &nbsp; &nbsp; <?php # echo $rows[$k]['fullname'].'&nbsp;&nbsp; - '.$rows[$k]['hospital']; ?>  </a>
								  </h6>
								</div>
								<div id="<?php echo 'collapse'.$k; ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo 'heading'.$k; ?>" data-parent="<?php echo '#accordion'.$k; ?>">
								  <div class="card-body">
									<h6> <u> List of Test To Be Performed  </u> </h6>
									  <p class="row">
									   <?php if(!empty($quests)) :
											foreach($quests as $q=>$qtn) :
									   ?>
									    <input type="hidden" class="parent-category" value="<?php echo $v['id']; ?>" />
										<div class="icheck-square"> <label> <input type="checkbox" name="categ_qtns[]" value="<?php echo $qtn['id'];?>" <?php echo in_array($qtn['id'],$selected)?"checked":"";?> class="checkbox specimen_results_check" >  <?php  echo $qtn['question']; ?> </label>
										</div>	
											<?php  endforeach; ?>
											
											<button type="button" id="btn<?php echo $v['id'];  ?>" onClick="submit_categ_test_questions($(this).closest('form div.accordion'))" class="btn btn-success btn-sm ladda-button" data-style="expand-right"> Update </button>
										
										<?php endif; ?>
										</p>									 
										<div class="pull-right"> <button type="button" data-toggle="modal" data-target="#newBloodTestCategForm"   onclick="show_update_buttons(), set_update_blood_test_categ('<?php echo $v['name']."|".$v['id'] ?>')" class="btn btn-warning btn-sm mb-3"> <span class="fa fa-pencil"></span> <?php echo $v['name']?></button> </div>  
									</div>
								</div>
								
							  </div>
						</div> <!-- ./ end accordion -->
					</form>	
					<?php 
							endforeach; 
					 }  # end 
			} # end post submit 

		
		// save blood type 
		if(isset($_POST['save_blood_type'])){
			$dbm = new DbTool(); 
         	// print_r($_POST); die;  
         	$table = "blood_types";  

			$blood_type = $dbm->clean($_POST['blood_type']); 
			$save_mode = $dbm->clean($_POST['save_mode']);
			$uid = $dbm->clean($_POST['uid']);  
			$price = $dbm->clean($_POST['price']);

			switch($save_mode){
				case "new":{
					$exist = $dbm->select($table,['name'=>$blood_type]);
					if(empty($exist)){ // save
						$dbm->insert($table,['name'=>$blood_type,'price'=>$price]);
						echo json_encode(array('icon'=>'success','text'=>"Blood Type Saved Successfully",'title'=>'Blood Type Saved Successfully'));  
					}
					else {
						echo json_encode(array('icon'=>'error','text'=>"Blood Type Already Exists",'title'=>'Duplicate Blood Type'));  
					}
					
					
				} break; 
				case "update":{
					$instance = $dbm->select($table,['id'=>$uid]);
					$availables = $dbm->select($table,['name'=>$blood_type]);
					$name = $instance[0]['name']; 
					if($name == $blood_type){
						 $dbm->updateTb($table,['price'=>$price],['id'=>$uid]); 
						echo json_encode(array('icon'=>'info','text'=>"Price Updated successfully",'title'=>'Update Completed'));  					
					} 
					else {
						if(!empty($availables)){
							echo json_encode(array('icon'=>'error','text'=>"Blood Type Already Exists",'title'=>'Duplicate Blood Type'));		
						}
						else {
							$dbm->updateTb($table,['name'=>$blood_type,'price'=>$price],['id'=>$uid]); 
							echo json_encode(array('icon'=>'success','text'=>"Blood Type Updated Successfully",'title'=>'Blood Type Updated Successfully'));  
						}
					}
					
					} break; 
			} # end swith 
		}
			
		//     save_blood_test_qtns 
		if(isset($_POST['save_blood_test_qtns'])){
			$dbm = new DbTool(); 
         	// data: {save_blood_test_qtns:"",question:question,answer_type:answer_type,save_mode:save_mode,uid:uid
             $table = "blood_test_questions"; 
			 ## print_r($_POST); die;
			$question = $dbm->clean($_POST['question']); 
			$answer_type = $dbm->clean($_POST['answer_type']); 			 
			$save_mode = $dbm->clean($_POST['save_mode']);
			$uid = $dbm->clean($_POST['uid']);
			$if_true_val = $dbm->clean($_POST['respt']);
			$if_false_val = $dbm->clean($_POST['respf']);
			$alt_val = $dbm->clean($_POST['fillans']);
			
			
			switch($save_mode){
				case "new":{
				  $exist = $dbm->select($table,['question'=>$question]);
					if(empty($exist)){ // save						
					 $dbm->insert($table,['question'=>$question,'option_type'=>$answer_type,'c_by'=>$_SESSION['admUser'],
					 'if_true_val'=>$if_true_val,'if_false_val'=>$if_false_val,'alt_val'=>$alt_val]); 
					 echo json_encode(array('icon'=>'success','text'=>"Test Question Saved Successfully",'title'=>'Test Question Saved Successfully'));  
					}
					else {
						echo json_encode(array('icon'=>'error','text'=>"Test Question Already Exists",'title'=>'Duplicate Test Question'));  
					}					
					
				} break; 
				case "update":{					
					  $dbm->updateTb($table,['question'=>$question,'option_type'=>$answer_type,
					  'if_true_val'=>$if_true_val,'if_false_val'=>$if_false_val,'alt_val'=>$alt_val],['id'=>$uid]); 
						echo json_encode(array('icon'=>'success','text'=>"Test Question Updated Successfully",'title'=>'Test Question Updated Successfully'));  
					} break; 
			} # end swith 
		}
			

			// save blood type 
		if(isset($_POST['save_blood_test_category'])){
			$dbm = new DbTool(); 
         	// print_r($_POST); die;  
         	$table = "blood_test_categories";  

			$categ_name = $dbm->clean($_POST['categ_name']); 
			$save_mode = $dbm->clean($_POST['save_mode']);
			$uid = $dbm->clean($_POST['uid']);
			
			switch($save_mode){
				case "new":{
					$exist = $dbm->select($table,['name'=>$categ_name]);
					if(empty($exist)){ // save
						$dbm->insert($table,['name'=>$categ_name]);
						echo json_encode(array('icon'=>'success','text'=>"New Blood Test Category Saved Successfully",'title'=>'Blood Test Category Saved Successfully'));  
					}
					else {
						echo json_encode(array('icon'=>'error','text'=>"Blood Test Category Already Exists",'title'=>'Duplicate Blood Test Category'));  
					}
					
					
				} break; 
				case "update":{
					$instance = $dbm->select($table,['id'=>$uid]);
					$availables = $dbm->select($table,['name'=>$categ_name]);
					$name = $instance[0]['name']; 
					if($name == $categ_name){
						echo json_encode(array('icon'=>'info','text'=>"No Changes Made",'title'=>'Already up to date'));  					
					} 
					else {
						if(!empty($availables)){
							echo json_encode(array('icon'=>'error','text'=>"Blood Test Category Already Exists",'title'=>'Duplicate Blood Test Category'));		
						}
						else {
							$dbm->updateTb($table,['name'=>$categ_name],['id'=>$uid]); 
							echo json_encode(array('icon'=>'success','text'=>"Blood Test Category Updated Successfully",'title'=>'Blood Test Category Updated Successfully'));  
						}
					}
					
					} break; 
			} # end swith 
		}	// save blood type 
		
		
		
		if(isset($_POST['submit_categ_test_questions'])){
			$dbm = new DbTool(); 
         	# print_r($_POST); die;  
         	$table = "blood_test_categories";  
			$serial = $dbm->clean($_POST['serial']); 						
			$ids = implode("|",$_POST['ids']);
			$dbm->updateTb($table,['test_qtn_ids'=>$ids],['id'=>$serial]); 
			echo json_encode(array('icon'=>'success','text'=>"Test To Perform Saved Successfully",'title'=>'Updated Successfully'));  
 		}

		
		function get_date_range( $start, $end ) {
		  $_start = new DateTime( $start );
		  $interval = new DateInterval( 'P1D' );
		  $_end = new DateTime( $end . ' 23:59:59' ); # to include last date 
		  $period = new DatePeriod( $_start, $interval, $_end );
		  foreach ( $period as $k => $v ) {
			$dates[] = $v->format('Y-m-d');
		  }
		  return $dates;
		}
		
		function get_start_end_week_dates($week,$year){
			$dto = new DateTime();
			$dto->setISODate($year,$week);
			$result['start'] = $dto->format('Y-m-d');
			$dto->modify('+6 days'); 
			$result['end'] = $dto->format('Y-m-d');
			return $result; 
		}
			
		function get_start_end_month_dates($month,$year){
			$query_date = strtotime("$year-$month"); 
			 $result['start'] = date("$year-$month-01");
			 $result['end'] = date("$year-$month-t",$query_date); 
			return $result; 
		}
		
		function month_name($month){
			$dateObj = DateTime::createFromFormat('!m',$month);
			return $name = $dateObj->format('F');
		}
		
		function month_day($date) {
                    $dateObj = DateTime::createFromFormat('Y-m-d',$date);
		   return $name = $dateObj->format('D M d');
                }
                
                
           
    # calculate weekly payment 
    function get_week_payment($date){    $mydbm = new DBController();
        $date = new DateTime($date); 
        $this_week = $date->format('W');  $this_year = $date->format('Y'); 
        $week_dates = get_start_end_week_dates($this_week,$this_year);       #  start - end                    
        $d1 = $week_dates['start']." 00:00:00"; $d2 = $week_dates['end']." 23:59:59";
        $periods =  get_date_range($week_dates['start'],$week_dates['end']);
        /***********************/
        # calculate total / overall payment
        $sql = $mydbm->runBaseQuery("SELECT sum(total_cost) as total, sum(amount_paid) as paid, sum(discount) as discount,sum(refund) as refund FROM customer_tickets WHERE date_c BETWEEN '$d1' AND '$d2'  AND status='active'  AND finalized='yes'");
        # $sql = $mydbm->runBaseQuery("SELECT sum(total_cost) as total, sum(amount_paid) as paid, sum(discount) as discount,sum(refund) as refund FROM customer_tickets WHERE date_c >= '$d1' AND date_c<='$d2'  AND status='active'  AND finalized='yes'");
        $tcost = empty($sql[0]['total'])?0:$sql[0]['total'];        
        $discount = empty($sql[0]['discount'])?0:$sql[0]['discount'];
        $refund = empty($sql[0]['refund'])?0:$sql[0]['refund'];
        $tpaid = $sql[0]['paid'] - $discount;// + $refund;
        //$tpaid = $sql[0]['paid'] - $discount + $refund;
        $week = "$d1 To $d2";
        ##$balance = ($tcost - $tpaid ) - $discount; 
		$balance = ($tcost - $tpaid )- $discount; 
        /***********************************/
        ## calculate daily estimates 
        foreach($periods as $period){
            $days[] = month_day($period);
            /******************************/
            $sql2 = $mydbm->runBaseQuery("SELECT sum(total_cost) as total, sum(amount_paid) as paid, sum(discount) as discount,sum(refund) as refund FROM customer_tickets WHERE date_c ='$period'  AND status='active'  AND finalized='yes'");
            $dcost[] = empty($sql2[0]['total'])?0:$sql2[0]['total'];        
            $ddiscount[] = empty($sql2[0]['discount'])?0:$sql2[0]['discount'];
            $drefund[] = empty($sql2[0]['refund'])?0:$sql2[0]['refund'];
            $dpaid[] = $sql2[0]['paid']; // - $ddiscount[] -  $drefund[];
            $dbalance[] = 0;      
        }
        if(!empty($dpaid)){ $i = 0; 
            foreach ($dpaid as $paid){
                $rdpaid[] = $paid - $ddiscount[$i]; // - $drefund[$i];
                $dbalance[] = ($dcost[$i] - $paid )- $ddiscount[$i]; //  - $drefund[$i]; 
                $i++;
            }
             $dpaid = $rdpaid;   
        }
        
        return ['days'=>$days,'weekno'=>$this_week,'week'=>$week,'cost'=>$tcost, 'paid'=>$tpaid, 'discount'=>$discount, 'refund'=>$refund, 'balance'=>$balance, 
                'dpaid'=>$dpaid,'dcost'=>$dcost, 'ddiscount'=>$ddiscount, 'drefund'=>$drefund, 'dbalance'=>$dbalance
            ];
        // $week_period 
    }


    function rand_num(){
       $mydbm = new DBController();
        $len = range(0,11);
        $values = []; 
        foreach($len as $k){
            $values[$k] = rand(50,600);
        }
        echo json_encode($values);
    }
    
    function expected_pays($year){  
        $mydbm = new DBController(); $months = get_months($year); $sums = []; 
        foreach ($months as $month){
            $sql = $mydbm->runBaseQuery("SELECT sum(total_cost) as total, sum(discount) as discount FROM customer_tickets WHERE date_c  LIKE '%$month%' AND status='active'  AND finalized='yes'"); 
            $sums[] = ($sql[0]['total'] -  $sql[0]['discount']); # deduct discount from expected pay 
        }
        echo json_encode($sums); 						
    }
    
     function amounts_paid($year){  
        $mydbm = new DBController(); $months = get_months($year); 
        $paid = [];   
        foreach ($months as $month){
            $sql = $mydbm->runBaseQuery("SELECT sum(amount_paid) as paid, sum(refund) as refund FROM customer_tickets WHERE date_c  LIKE '%$month%' AND status='active'  AND finalized='yes'"); 
            # $paid[] = ($sql[0]['paid'] - $sql[0]['refund']);            
            $paid[] = $sql[0]['paid']??0;  // - $sql[0]['refund']);            
        }
        echo json_encode($paid); 	 	
    }
    
    
     function payment_summary($year){  
        $mydbm = new DBController();            
        $sql = $mydbm->runBaseQuery("SELECT sum(total_cost) as cost, sum(amount_paid) as paid, sum(refund) as refund , sum(discount) as discount  FROM customer_tickets WHERE date_c  LIKE '%$year%' AND status='active' AND finalized='yes'"); 
           $cost = $sql[0]['cost'];        
           $paid = $sql[0]['paid'];        
           $discount = $sql[0]['discount'];        
           $refund = $sql[0]['refund'];    
           ################################
           $tcost = $cost - $discount;
           // $tpaid = $paid - $refund; 
           $tpaid = $paid; // - $refund; 
           $balance = $tcost - $tpaid; 
           
           return ['paid'=>$tpaid,'balance'=>$balance,'discount'=>$discount];           
    }
    
    
    
    function get_months($year){
        $nums = range(1, 12); $output = [];
        foreach ($nums as $k){  $month = str_pad($k,2,'0',STR_PAD_LEFT);
            $output[] = $year."-".$month; }
        return $output;
    }
    function month_abbrev(){
       $cal = cal_info(0); return json_encode(array_values($cal['abbrevmonths']));
       }
       
  function getAge($date='', $now=null)
        {
        
        $dob = empty($date) || $date =="0000-00-00 00:00:00"? "Nill" : new DateTime($date);   
        
	$min5 =  !empty($now) ? date('Y-m-d H:i:s', strtotime($now." -5 minutes ")):"";  # minus 5 minutes
		
        $now = !empty($now) ?  new DateTime($min5) : new DateTime();

        if($date=="0000-00-00 00:00:00" || $date=="") : return "Nill"; 

        else :
         
        $difference = $now->diff($dob);
         
        $year = $difference->y;  $month = $difference->m;  $days = $difference->d;
        
        $age = ""; 
        
        if($year == 0 && $month == 0 && $days == 0) {
            $age = $difference->h." Hour(s)"; 
        }        
        
        if($year == 0 && $month == 0 && $days >=1) {
            $age = $difference->d." Day(s)"; 
        }
        
        if($year == 0 && $month >= 1 ) {
            $age = $difference->m." Month(s)"; 
        }
        
        if($year >= 1 && $month == 0 ) {
            $age = $difference->y." Year(s)"; 
        }
        
        if($year >= 1 && $month >= 1 ) {
            $age = $difference->y." Year(s)"; 
        }                 

        return  $age." and ".$date;

        endif;
    }
    
    # estimateMyDOB:"",age_no:age_no,age_type:age_type	
         if(isset($_POST['estimateMyDOB'])){
           //  $text = $_POST['age_no']." ".$_POST['age_type']." ago";
           // print date('Y-m-d H:i:s', strtotime($text)); 
         	$age_no = $_POST['age_no']; $age_type = $_POST['age_type'];
         	$today = Carbon::now(); 
         	switch($age_type){
				case "year":
					{ print $today->subYears($age_no); } break;
				case "month":
					{ print $today->subMonths($age_no); } break;
				case "week":
					{ print $today->subWeeks($age_no); } break;
				case "day":
					{ print $today->subDays($age_no); } break;	
				case "hour":
					{ print $today->subHours($age_no); } break;	
         	}

            ## e.g. '24 months ago'
           
         }
                        
         function getDOB($text){
             return date('Y-m-d H:i:s', strtotime($text)); 
          }
		  
    function exclude($datas,$excludes){
              $keys = []; $vals = [];
              foreach($datas as $key=>$data){
                  if(!in_array($key, $excludes)){
                      $keys[] = $key;
                      $vals[] = $data;
                  }
              }
              return array_combine($keys, $vals);
          }
          
     function getBillName($bill_id)
     {
        $dbm = new DbTool(); 
        $bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_id,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
        
        return !empty($bill_type) ? $bill_type['name'][0]:"--unknown";
     }

     function check_expiry($expdate){

     	$now =  Carbon::now(); 
     	$diff = $now->diff($expdate);

     	return $diff;
     }


      function ordinal($number,$sup = false){

        $suffix = '';
        if ($number % 100 >= 11 && $number % 100 <= 13) {
            $suffix = 'th';
        } else {
            switch ($number % 10) {
                case 1: $suffix = 'st'; break;
                case 2:$suffix = 'nd'; break;
                case 3:$suffix = 'rd'; break;
                default:$suffix = 'th'; break;
            }
        }
        $pre_suffix = ($sup)?"<sup>".$suffix."</sup>" : $suffix; 
        return $number . $pre_suffix;
    }
    