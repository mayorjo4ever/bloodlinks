<?php 
		require_once "../config/config.php";
		require_once "../assets/php/dbTool.php";
		require_once "../assets/php/DBController.php";
		require_once "../assets/php/pdo_dal.php";
		require "../vendor/autoload.php";
		####
		$dbm = new DbTool(); 
		$mydbm = new DBController(); 
		$mydal = new DAL(); 
		use Carbon\Carbon; 

## delete bill type  now  update_bill_status
		if(isset($_POST['update_bill_status'])){  $dbm = new DbTool(); # #sleep(3);	
			     $serial = $dbm->clean($_POST['bill_id']); 						
			     $status = $dbm->clean($_POST['status']); 
				// $exists = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ'));	
				if($status=='active') { $status = "inactive";  } else { $status = "active"; }
				// do update
				//  Section::where('id',$data['section_id'])->update(['status'=>$status]); 
			    $dbm->updateTb("bill_types",array('status'=>$status, 'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time())),array('sn'=>$serial));
				
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


			if(isset($_POST['load_report_template'])){  $dbm = new DbTool(); #sleep(1);	
 				$temp_type = $dbm->clean($_POST['temp_type']);
 				$report = $dbm->select('report_templates',['report_type'=>$temp_type]);
 				$message = empty($report) ?"<p><b>type your expected output template here</b></p>" : $report[0]['templates'];
 				echo "<textarea  class='extra-report-template w-100 v-100,'>".$message."</textarea>";

			}

			## load_final_report_template:'this',temp_type:temp_type,
            ## 	temp_from:temp_from , ticket_no:ticket_no , blood_type_id:blood_type_id

			if(isset($_POST['load_final_report_template'])){ $dbm = new DbTool();  $mydbm = new DBController(); #sleep(1);	
 				$temp_type = $dbm->clean($_POST['temp_type']);  ## donation or purchase
 				$temp_from = $dbm->clean($_POST['temp_from']);	## result or template
 				$ticket_no = $dbm->clean($_POST['ticket_no']);
 				$blood_type_id = $dbm->clean($_POST['blood_type_id']);

 				# print_r($_POST); exit; 
 				if($temp_from=="result") : 
 					$table = "customer_specimen"; $field = "blood_purchase_report";
 					$query = "Select $field from $table where ticket_no='$ticket_no' and blood_type_id='$blood_type_id' and  order_type='buy_blood'";
 				else :
 					$table = "report_templates"; $field = "templates";
 					$query = "Select $field from $table where report_type='$temp_type'";
 				endif; 

 				# echo $query; exit; 
 				
 				$report = $mydbm->runBaseQuery($query); 

 				$message =  $report[0][$field];

 				echo "<textarea  class='extra-report-template w-100 v-100,'>".$message."</textarea>";

			}


			if(isset($_POST['submitTemplate'])){  $dbm = new DbTool(); #sleep(1);	
 				$temp_type = $dbm->clean($_POST['temp_type']);
 				$newReport = $_POST['rawText']; 
 				# submitTemplate:'report',temp_type:temp_type,rawText:rawText
 				$exists = $dbm->select('report_templates',['report_type'=>$temp_type]);
 				if(empty($exists)):
 					$dbm->insert('report_templates',['report_type'=>$temp_type,'templates'=>$newReport,
 						'c_by'=>$_SESSION['admUser'],'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
 				else:
 					$dbm->updateTb('report_templates',['templates'=>$newReport,
 						'upd_by'=>$_SESSION['admUser'],'updated_at'=>Carbon::now()],['report_type'=>$temp_type]);
 				endif; 				

 				echo json_encode(['icon'=>"success",'title'=>"<b>Successful</b>",'text'=>'Template Successfully Saved']);

			}

?>