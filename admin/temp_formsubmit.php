	<?php 
	
		error_reporting(E_ALL^E_NOTICE);
		require_once "../config/config.php";
		require_once "../assets/php/dbTool.php";
		require_once "../assets/php/timecoder.php";
		require_once "../assets/php/model.php";
		####
		
	
		/******************* display_specimen_result_form ********************************/
		if(isset($_POST['display_specimen_result_form'])){
			$dbm = new DbTool(); $func = new functions(); 
			$serial = $dbm->clean($_POST['serial']); ## $ticket_no = base64_decode($dbm->clean(@$_POST['ticket_no'])); 
			$ticket_no = "";
			if($serial=="") echo " <div class='text-warning alert border border-warning bold'> Please select type </div>"; 
			else { 
				#old method - $criterial = array('bill_type_id'=>$serial,'status'=>'active');
				$criterial = array('bill_type_id'=>$serial); 
				$fields = array('c_by','sn','bill_type_id','temp_type','raw_text_val','name','result','unit','has_unit','ref_val','has_ref_val');
				$temp_exist= $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
				
				$checked = "checked"; # $checked = (is_null($temp_exist))?"checked":""; 
				$visible = "visible"; #$visible = (is_null($temp_exist))?"visible":"invisible";  ?>
				<div class="row"> <?php  
				 echo toggle_specimen_form($checked); 
				 echo use_template_form($visible,$serial);
				 echo display_specimen_result_template($serial,$ticket_no);  				
				 ?>
				 </div>
			  
			<?php } 
		}
		 
		function toggle_specimen_form($checked){ ?>
			 
				<div class="col-md-12 float-left ">
					<label class="switch pull-right">  
					  <input type="checkbox" <?php echo $checked ?> onchange="togTemplateForm($(this).prop('checked'),$('#specimen_template_form'))">
					  <span class="slider round"></span>
					</label> &nbsp; <span class=" pull-right bold"> &nbsp; &nbsp;  show template form &nbsp; &nbsp;  </span>
				</div> 			 
		<?php }
		
		 
	function display_specimen_result_template($bill_type_id,$ticket_no=null){
			$dbm = new DbTool();
			## old -- $criterial = array('bill_type_id'=>$bill_type_id,'status'=>'active');			
			##old - - $bill_info = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_type_id,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type')); 
			$criterial = array('bill_type_id'=>$bill_type_id); 
			$bill_info = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_type_id)),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
			$bill_name = $bill_info['name'][0];
			$fields = array('c_by','sn','age_range','bill_type_id','temp_type','raw_text_val','name','unit','has_unit','ref_val','has_ref_val','status');
			$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
			if(is_null($exist)) { return "<div class='col-md-6'> <div class='alert alert-warning'> no template yet for <b>$bill_name </b></div> </div>"; }
			else { 			
				?>  
				 	<div class="col-md-6 float-left" id="specimen_template_view">  <div class="card"><div class="card-body">
						<p class="text-info bold text-capitalize"> <span class="text-primary bold">  <?php echo $bill_name." - template "; ?> </span>  &nbsp; &nbsp;  <span class="fa fa-window-maximize pointer pull-right" onclick="maximize_win($('#specimen_template_view'))">&nbsp; maxm. </span>    </p>
							<?php 
							switch($exist['temp_type'][0]){
								case "text_form": { ?> 
									<div class="col-md-12" id="raw_text_backup">  
										<?php echo stripslashes($exist['raw_text_val'][0]); ?>
									</div>  
									<div class="col-md-12" >
										<?php $edit_for = $bill_type_id."|".$exist['sn'][0]; 
											$del_text = $bill_name."|".$bill_type_id."|".$exist['sn'][0]; 
										?>
										 <hr/>
											<a href="javascript:void(0)" <?php #echo ($exist['status'][0]=="active")?"":" disabled ";?> onclick="update_specimen_text_template($('#raw_text_backup').html(),$(this).attr('for'))" for="<?php echo $edit_for; ?>" class="mdi mdi-24px  mdi-lead-pencil text-primary"> <b>Edit Template </b> </a>&nbsp;  &nbsp;
											 
											<?php if($exist['status'][0]=="active"){ ?>
												<a href="javascript:void(0)" onclick="update_specimen_text_template_status($(this).attr('data-text'))"  data-text="<?php echo $del_text; ?>"  class="pointer mdi mdi-bookmark-check mdi-36px text-success"><b>Active   </a> 
												<?php }	else { ?>
												<a href="javascript:void(0)" onclick="update_specimen_text_template_status($(this).attr('data-text'))"  data-text="<?php echo $del_text; ?>"  class="pointer mdi mdi-bookmark-remove mdi-36px text-danger"><b>Not Active</b>  </a> 
												<?php } ?> 
											<!-- <span onclick="update_specimen_text_template($(this).attr('data-text'))"  data-text="<?php echo $del_text; ?>"  class="pointer fa fa-times font-18 text-danger"></span> -->
									</div>

								<?php
								} break; # end text form 
								
								case "param_form": { 
							?>
							<table class="table table-nogap table-hover "> 
								<thead>
									<tr class="text-capitalize bold  table-info "> 
										<td> SN </td>
										<td> name </td>
										<td> unit </td>
										<td> ref. value </td>
										<td> Edit </td>
										<td> Status <br/><small>Active / Not Active</small> </td>
									</tr>
								</thead><tbody class="_sortable">
									<?php $n = 0;  
									foreach($exist['name'] as $output) {  
										# check if result is saved before  
										 $edit_text = $exist['age_range'][$n]."|".$output."|".$exist['unit'][$n]."|".$exist['ref_val'][$n]."|".$bill_type_id."|".$exist['sn'][$n];
										 $del_text = $output."|".$bill_name."|".$exist['bill_type_id'][$n]."|".$exist['sn'][$n];
									?> 
										<tr class="">  
											<td> <?php echo ($n+1) ?> </td>											
											<td> <?php echo $output ?> </td>											
											<td> <?php echo $exist['unit'][$n]; ?> </td>
											<td> <?php echo $exist['ref_val'][$n]."&nbsp; <small>(".$exist['age_range'][$n].")</small>";; ?> </td>
											<td> 
												<a href="javascript:void(0)" <?php echo ($exist['status'][$n]=="active")?"":" disabled ";?>  onclick="update_specimen_template($(this).attr('data-text'))" data-text="<?php echo $edit_text; ?>" class="mdi mdi-lead-pencil mdi-24px text-primary"> Edit</a> &nbsp;  &nbsp;  &nbsp;
											</td>
											<td>
											<?php if($exist['status'][$n]=="active"){ ?>
												<a href="javascript:void(0)" onclick="update_specimen_template_status($(this).attr('data-text'))"  data-text="<?php echo $del_text; ?>"  class="pointer mdi mdi-bookmark-check mdi-36px text-success">Active</a> 
												<?php }	else { ?>
												<a href="javascript:void(0)" onclick="update_specimen_template_status($(this).attr('data-text'))"  data-text="<?php echo $del_text; ?>"  class="pointer mdi mdi-bookmark-remove mdi-36px text-danger">Not Active</a> 
												<?php } ?></td>
										</tr>
									<?php $n++; } ?>
									 
								</tbody>
							</table> 
							<?php 	} break; # end param_form
							} # end switch ?>
							</div></div> <!-- card and card-body -->
					</div>  <!--- ./ col-md-6 -->				 
				<?php  
				
				} # end not null 
		}
		
		/*******************/ 
		function use_template_form($visible='invisible',$bill_type_id){  $dbm = new DbTool(); 
			//$bill_info = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_type_id,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
			$bill_info = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_type_id)),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
			 	$bill_name = $bill_info['name'][0];
			?>
			<div class="col-md-6 <?php echo $visible; ?>  float-left" id="specimen_template_form">
			  <div class="col-md-12 ">
					<div class="card"><div class="card-body">
					<p class="h5 text-capitalize bold font-14 text-info"> create / update template  for <?php echo $bill_name; ?> &nbsp; <span class="fa fa-window-maximize pointer pull-right" onclick="maximize_win($('#specimen_template_form'))">&nbsp; maxm. </span> </p> 
						
					<div class="form-group row selection">
						<label for="title" class="col-sm-4 col-form-label bold text-capitalize "> choose form type  </label>
						<div class="col-sm-8">
							<div class="input-group">									
								<label class="control-label"> <input type="radio" checked name="form_type" value="param_form" onchange="display_temp_form_type($(this).val())" class="radio form_type param_form" /> Parameter Form </label> &nbsp; &nbsp; &nbsp; 
								<label class="control-label"> <input type="radio"  name="form_type" value="text_form" onchange="display_temp_form_type($(this).val())" class="radio form_type text_form"/> Raw Text Form </label>
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
					
					<div class="form-group row selection param_form all">
						<label for="title" class="col-sm-4 col-form-label"> Result Name  </label>
						<div class="col-sm-8">
							<div class="input-group">									
								<input type="text" id="result_name" name="result_name" value="" class="form-control border-primary font-14 imput-sm" placeholder="Result Name"> 
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
					  
					  <div class="form-group row selection param_form all">
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
					  
					  
					  <div class="form-group row selection param_form all">						
						<div class="col-sm-4">
							<label class="switch">  
							  <input type="checkbox" id="has_unit" checked onchange="togInputDisabled($(this).prop('checked'),$('#unit'))">
							  <span class="slider round"></span>
							</label> &nbsp; <span class=""> Unit </span>
						</div>
						<div class="col-sm-8">
							<div class="input-group">									
								<textarea rows="1" cols="" id="unit" name="unit" class="form-control border-primary font-14 imput-sm"> </textarea>
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->

					  <div class="form-group row selection param_form all">						
						<div class="col-sm-4">
							<label class="switch">  
							  <input type="checkbox" id="has_ref_val" checked onchange="togInputDisabled($(this).prop('checked'),$('#ref_val'))">
							  <span class="slider round"></span>
							</label> &nbsp; <span class=""> Ref. Val. </span>
						</div>
						<div class="col-sm-8">
							<div class="input-group">									
								<textarea rows="2" cols="" id="ref_val" name="ref_val" class="form-control border-primary font-14 imput-sm"></textarea>
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->
					  
					   <div class="form-group row selection text_form all">						
						<div class="col-sm-12">
							 &nbsp; <span class="bold"> Enter Template Sample </span>  
						</div>
						<div class="col-sm-12 col-md-12">
							<div class="input-group">									
								<textarea rows="1" cols="" name="result_text" id="result_text" class="form-control border-primary"> </textarea>
							</div>
						</div> <!-- ./ col-sm-9 -->
					  </div> <!-- ./ form-group -->

					  
					  <div class="form-group row selection ">
						<div class="col-sm-6"> <br/> </div>
						<div class="col-sm-6">  
							&nbsp; &nbsp;  <button for="<?php echo $bill_type_id; ?>" onclick="save_template_settings_2('new',$(this).attr('for'))" id="save_template_settings_2" class="creators btn btn-info btn-rounded btn-lg btn-block ladda-button" data-style="expand-right"> Save Settings &nbsp; <i class="fa fa-cog"></i> </button>
							&nbsp; &nbsp;  <button for="<?php echo $bill_type_id; ?>" onclick="save_template_settings_2('update',$(this).attr('for'))" id="update_template_settings_2" class="updators btn btn-warning btn-rounded btn-lg btn-block ladda-button" data-style="expand-right"> Update Settings &nbsp; <i class="fa fa-cog"></i> </button>
						</div> 
					  </div>
					  
				</div></div></div> <!-- ./ card-body --> <!-- ./ card --> <!-- ./ col-md-8-->
			</div> <!-- ./ col-md-6-->
		<?php  
		}
		/*******************/
		
			
		if(isset($_POST['save_template_settings'])){
			$dbm = new dbTool(); 
			$name = $dbm->clean($_POST['name']);
			$age_range = $dbm->clean($_POST['age_range']);
			$has_unit = $dbm->clean($_POST['has_unit']);
			$has_ref_val = $dbm->clean($_POST['has_ref_val']);
			##$has_unit = ($has_unit==true)?'yes':'no';
			##$has_ref_val = ($has_ref_val==true)?'yes':'no';
			$unit =  $_POST['unit'];
			$ref_val = $dbm->clean($_POST['ref_val']);	
			$bill_type_id = $dbm->clean($_POST['bill_type_id']);	
			/**************************************/
			$msg = $name." &nbsp;";
			$msg .= $age_range." &nbsp;";
			$msg .= $has_unit." &nbsp;";
			$msg .= $has_ref_val." &nbsp;";
			$msg .= $unit." &nbsp;";
			$msg .= $ref_val." &nbsp;";
			/**************************************
				save_template_settings:'this',name:result_name.val(),age_range:age_range.val()bill_type_id:bill_type_id.val(),
				has_unit:has_unit.prop('checked'),has_ref_val:has_ref_val.prop('checked'), unit:unit.val(),ref_val:ref_val.val()
			/***************************************/
			 ## check database 
			 $criterial = array('bill_type_id'=>$bill_type_id,'name'=>$name,'age_range'=>$age_range,'status'=>'active'); 
			 $fields = array('c_by','sn','bill_type_id','age_range','name','result','unit','has_unit','ref_val','has_ref_val');
			 $exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
			 $data = array('bill_type_id'=>$bill_type_id,'age_range'=>$age_range,'name'=>$name,'unit'=>$unit,'has_unit'=>$has_unit,'ref_val'=>$ref_val,'has_ref_val'=>$has_ref_val,'c_by'=>$_SESSION['admUser'],'date_c'=>date('Y-m-d'),'time_c'=>date('H:i:s',time())); 
			 $updData = array('bill_type_id'=>$bill_type_id,'age_range'=>$age_range,'name'=>$name,'unit'=>$unit,'has_unit'=>$has_unit,'ref_val'=>$ref_val,'has_ref_val'=>$has_ref_val,'upd_by'=>$_SESSION['admUser'],'date_upd'=>date('Y-m-d'),'time_upd'=>date('H:i:s',time())); 
			 if(is_null($exist)){ 
				$dbm->insert('specimen_result_template',$data); 
				echo json_encode(array('title'=>'Successful','text'=>' Setting Saved Successfully with this info : '.$msg,'icon'=>'success'));
			 }
			 else{
				 $dbm->updateTb('specimen_result_template', $updData,$criterial);
				 echo json_encode(array('title'=>'Template Updated ','text'=>' Setting Already Exists but Updated with this info   : '.$msg,'icon'=>'warning'));
			 } 
			/***************************************/
			# echo json_encode(array('title'=>'Successful','text'=>$msg,'icon'=>'success'));
		} #### 
		
		#### update_specimen_template_status
		####################################################################
		// update_specimen_template_status:"this",serial:infos[2],name:infos[0]
		if(isset($_POST['update_specimen_template_status'])){
			$dbm = new DbTool();  
			$serial = $dbm->clean($_POST['serial']); ##$name = $dbm->clean($_POST['name']);
			
			## old - $exists = $dbm->getFields($dbm->select('specimen_result_template',array('sn'=>$serial,'status'=>'active')),array('sn','name'));
			$exists = $dbm->getFields($dbm->select('specimen_result_template',array('sn'=>$serial)),array('sn','name','status'));
			/*************************/
			if(!is_null($exists) && $exists['status'][0]=='active'){				 
				$dbm->updateTb('specimen_result_template',array('status'=>'inactive'),array('sn'=>$serial)); 		
			} else if(!is_null($exists) && $exists['status'][0]=='inactive'){
			   $dbm->updateTb('specimen_result_template',array('status'=>'active'),array('sn'=>$serial)); 			 
			} 
		}
		####################################################################
		
		####################################################################
		// del_specimen_template:"this",serial:infos[2],name:infos[0]
		if(isset($_POST['del_specimen_template'])){
			$dbm = new DbTool();  
			$serial = $dbm->clean($_POST['serial']);
			$name = $dbm->clean($_POST['name']);
			   $exists = $dbm->getFields($dbm->select('specimen_result_template',array('sn'=>$serial,'status'=>'active')),array('sn','name'));
			/*************************/
			if(!is_null($exists)){
				# delete 
				$dbm->updateTb('specimen_result_template',array('status'=>'inactive'),array('sn'=>$serial,'status'=>'active')); 
				echo json_encode(array('icon'=>'success','text'=>$name.' successfully deleted','title'=>'Template Deleted !')); 
			}
			else{
				echo json_encode(array('icon'=>'error','text'=>"criteria for deleting $serial not found",'title'=>'Invalid parameters !')); 
			} 
		}
		############# formerly del_specimen_text_template ########################
		// update_specimen_text_template_status:"this",serial:infos[2],name:infos[0]
		if(isset($_POST['update_specimen_text_template_status'])){
			$dbm = new DbTool();  
			$serial = $dbm->clean($_POST['serial']);
			$name = $dbm->clean($_POST['name']);
			## $exists = $dbm->getFields($dbm->select('specimen_result_template',array('sn'=>$serial,'status'=>'active')),array('sn','name'));
			$exists = $dbm->getFields($dbm->select('specimen_result_template',array('sn'=>$serial)),array('sn','name','status'));
			/*************************/
			if(!is_null($exists) && $exists['status'][0] == "active"){
				# delete 
				$dbm->updateTb('specimen_result_template',array('status'=>'inactive'),array('sn'=>$serial)); 
				 echo "status set inactive";
				 // echo json_encode(array('icon'=>'success','text'=>$name.' template successfully deleted','title'=>'Template Deleted !')); 
			}
			else{
				$dbm->updateTb('specimen_result_template',array('status'=>'active'),array('sn'=>$serial)); 
				echo "status set active";
				## echo json_encode(array('icon'=>'error','text'=>"criteria for deleting $serial not found",'title'=>'Invalid parameters !')); 
			} 
		}
	
	 
	
	/********* TICKET STATUS UPDATES *******/
	if(isset($_POST['display_ticket_status_found'])){  # search_ticket_payment:"new", ticket_no:ID 
		$dbm = new dbTool(); $func = new functions();  $ticket_no = $dbm->clean($_POST['ticket_no']);
			# $fields = array('finalized','process_completed','c_by','sn','ticket_no','fullname','total_cost','amount_paid','discount','date_c','date_fin','fin_by','payment_completed','payment_finalized');
			$criterial = array('ticket_no'=>$ticket_no,'status'=>'active');
			$exist = $dbm->select('customer_tickets',$criterial);
			if(is_null($exist)) { echo "<div class='alert alert-warning'> <i class='fa fa-warning'> </i> &nbsp;Ticket &nbsp; $ticket_no&nbsp; Not Found </div>"; }
			else { # $exist = $dbm->resort($exist);					 
					$cond = array('ticket_no'=>$ticket_no,'status'=>'active'); 
					$specimen = $dbm->select('customer_specimen',$criterial);
					$n = 0; $tcost = 0;  $nth = count($specimen); 
					$my_specimen = "";  $pos = 0;
					foreach($specimen as $k=>$v): 
						if($v['order_type']=="perform_test"):
						 $bill_type = $dbm->select('bill_types', ['sn'=>$serial,'status'=>'active']); # ,array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
						 $my_specimen.= " ".$bill_type['name']."&nbsp;/ ".$specimen['specimen_sample'][$n]." :  &#8358; ".	number_format($bill_type['price'][0]); 
						if($pos<($nth-1)) $my_specimen.="<br/><br/>";						
						endif;
						$pos++; 
					 endforeach;
					$balance = ($exist['total_cost'] - $exist['discount'] - $exist['amount_paid']);
			?>
			<div class="row">  
				
				<div class=" col-md-7 rounded float-left">
					<div class="card"> <div class="card-body"> <div class="form-group row"> 
					<label class="col-sm-4 col-form-label"> Ticket No&nbsp; :  </label>
					<label class="col-sm-8 col-form-label bold text-uppercase pull-right">  <?php echo $ticket_no; ?>  </label>
					
					<label class="col-sm-4 col-form-label"> Name.&nbsp; :  </label>
					<label class="col-sm-8 col-form-label bold text-uppercase pull-right">  <?php echo $exist['fullname']; ?>  </label>
					
					<label class="col-sm-4 col-form-label"> Created By&nbsp; :  </label>
					<label class="col-sm-8 col-form-label text-capitalize pull-right">  <?php $staff_info = $func->get_staff_info($exist['c_by']);  echo $staff_info['fullname']."&nbsp; (".$staff_info['user_id'].")"; ?>  </label>
			
					<label class="col-sm-4 col-form-label"> Date Created&nbsp; :  </label>
					<label class="col-sm-8 col-form-label text-capitalize pull-right">  <?php echo $func->format_date($exist['date_c'])."&nbsp; / ".$func->format_date($exist['time_c'],'time'); ?>  </label>
					 
					
					<label class="col-sm-12"> <hr/> </label> 
					
					<label class="col-sm-4 col-form-label bold "> Specimens &nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php echo $my_specimen;?>  </label>
					
					<label class="col-sm-12"> <hr/> </label> 
					
					<label class="col-sm-4 col-form-label "> Processing Finalized </label>
					<label class="col-sm-8 col-form-label bold text-capitalize pull-right ">  <?php echo $exist['process_completed'];  ?>  </label>
					
					<label class="col-sm-4 col-form-label"> Date Finalized  : &nbsp; </label>
					<label class="col-sm-8 col-form-label text-capitalize pull-right">  <?php echo $func->format_date($exist['date_fin'])."&nbsp; / ".$func->format_date($exist['time_fin'],'time'); ?>  </label>
					 
					<label class="col-sm-4 col-form-label bold"> Finalized By&nbsp; :  </label>
					<label class="col-sm-8 col-form-label text-capitalize pull-right">  <?php $staff_info = $func->get_staff_info($exist['fin_by']);  echo @$staff_info['fullname']."&nbsp; (".@$staff_info['user_id'].")"; ?>  </label>
			
					<label class="col-sm-12"> <hr/> </label> 
					
					<label class="col-sm-4 col-form-label"> Total Cost&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize bold pull-right">  <?php echo "  &#8358; ".number_format($exist['total_cost']);?>  </label>
					
					<label class="col-sm-4 col-form-label"> Discount&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php echo "  &#8358; ".number_format($exist['discount']);?>  </label>
			
					<label class="col-sm-4 col-form-label"> Amount Paid&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php echo "  &#8358; ".number_format($exist['amount_paid']);?>  </label>
					
					<label class="col-sm-4 col-form-label"> Balance&nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right">  <?php $balance = ($exist['total_cost'] - $exist['discount'] - $exist['amount_paid']);  echo "  &#8358; ".number_format($balance);?>  </label>			
					  
					<label class="col-sm-4 col-form-label"> Payment Status &nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right bold">  <?php  echo   ($exist['payment_completed'] =='yes')?" Completed ":" Not Completed "; ;  ?>  </label>			
					
					<label class="col-sm-4 col-form-label"> Payment Finalized &nbsp; :  </label>
					<label class="col-sm-8 col-form-label  text-capitalize pull-right bold">  <?php  echo $exist['payment_finalized'];  ?>  </label>			
					 
				</div> </div> </div> </div>
				
				<div class="col-md-5 rounded float-left">
					<div class="card"> <div class="card-body"> 
					
					<p class="text-info"> Take actions on the status of the specimen processing state 
					<span class="text-dark"> - then ensure that you know the specific action you are carrying out before you perform any of the operations below. </span>
					</p>
					
					<label class="col-sm-12"> <hr/> </label> 
					
					<div class="form-group row"> 
					<label class="col-sm-12 col-form-label"> Have Problem with Customer Specimen ?   </label>
					<div class="col-sm-8 float-left">
						<button type="button" <?php echo ($exist['process_completed']=="no" && $exist['finalized']=="yes")?"":" disabled "?> onclick="reverse_spec_collection('<?php echo $ticket_no; ?>')" class="btn btn-info btn-rounded btn-md ladda-button" data-style="zoom-in"> Reverse Specimen Collection </button>
						</div> </div>
						
					<label class="col-sm-12"> <hr/> </label> 
					
					<div class="form-group row"> 
					<label class="col-sm-12 col-form-label"> Have Problem with Computation ? </label>
					<div class="col-sm-12 float-left">
						<button type="button" <?php echo ($exist['process_completed']=="yes" && $exist['finalized']=="yes")?"":" disabled "?> onclick="reverse_proc_completion('<?php echo $ticket_no; ?>')" class="btn btn-success btn-rounded btn-md ladda-button" data-style="zoom-in"> Reverse Processing Completion </button>
						<span class="small text-muted">Proc done: <b><?php echo $exist['process_completed'];  ?> </b> </span>
						</div> </div> 
						
					<label class="col-sm-12"> <hr/> </label> 
					
					<div class="form-group row"> 
					<label class="col-sm-12 col-form-label"> Have Problem with payment ? </label>
					<div class="col-sm-12 float-left">
						<button type="button" <?php echo ($exist['payment_finalized']=="yes")?"":" disabled "?> onclick="reverse_paym_completion('<?php echo $ticket_no; ?>')" class="btn btn-danger btn-rounded btn-md ladda-button" data-style="zoom-in"> Reverse Payment Finalization </button>
						<span class="small text-muted">Paym Finz: <b><?php  echo $exist['payment_finalized'];  ?></b> </span>
						</div> </div> 
						
						
				</div> </div> </div> 
			
			</div> <!-- ./ row -->
			 
			<?php } 
	}
	
	####################################################################
		// reverse_proc_completion :"this",ticket_no:ticket_no
		if(isset($_POST['reverse_proc_completion'])){
			$dbm = new DbTool();  
			$ticket_no = $dbm->clean($_POST['ticket_no']);
			$exists = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'process_completed'=>'yes','finalized'=>'yes','status'=>'active')),array('sn','fullname','process_completed','finalized'));
			/*************************/
			if(!is_null($exists)){
				# reverse customer ticket 
				$dbm->updateTb('customer_tickets',array('process_completed'=>'no','date_fin'=>'','time_fin'=>'','fin_by'=>''),array('ticket_no'=>$ticket_no,'process_completed'=>'yes','finalized'=>'yes','status'=>'active')); 
				# reverse customer specimens 
				$dbm->updateTb('customer_specimen',array('process_completed'=>'no'),array('ticket_no'=>$ticket_no,'process_completed'=>'yes','finalized'=>'yes','status'=>'active')); 
				# keep comment for reversion 
				$dbm->insert('customer_ticket_reversion',array('ticket_no'=>$ticket_no,'reverse_type'=>'processed','rev_by'=>$_SESSION['admUser'],'date_rev'=>date('Y-m-d'),'time_rev'=>date('H:i:s',time()))); 
				
				echo json_encode(array('icon'=>'success','text'=>$ticket_no.' successfully reversed ','title'=>'Ticket Proccesing Reversed !')); 
			}
			else{
				echo json_encode(array('icon'=>'error','text'=>"criteria for reversing $ticket_no not found",'title'=>'This Ticket Status Cannot be Reversed To Specimen Collection!')); 
			} 
		}
		####################################################################
		
		
		####################################################################
		// reverse_paym_completion :"this",ticket_no:ticket_no
		if(isset($_POST['reverse_paym_completion'])){
			$dbm = new DbTool();  
			$ticket_no = $dbm->clean($_POST['ticket_no']);
			$exists = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'payment_finalized'=>'yes','status'=>'active')),array('sn','fullname','payment_finalized'));
			/*************************/
			if(!is_null($exists)){
				# reverse customer ticket  
				$dbm->updateTb('customer_tickets',array('payment_finalized'=>'no','paym_fin_by'=>'','paym_date_fin'=>'','paym_time_fin'=>''),array('ticket_no'=>$ticket_no,'payment_finalized'=>'yes','status'=>'active')); 
				# keep comment for reversion 
				$dbm->insert('customer_payment_reversion',array('ticket_no'=>$ticket_no,'rev_by'=>$_SESSION['admUser'],'date_rev'=>date('Y-m-d'),'time_rev'=>date('H:i:s',time()))); 
				
				echo json_encode(array('icon'=>'success','text'=>$ticket_no.' successfully reversed ','title'=>'Ticket Finalized Reversed !')); 
			}
			else{
				echo json_encode(array('icon'=>'error','text'=>"criteria for reversing $ticket_no not found",'title'=>'This Ticket Status Cannot be Reversed Before!')); 
			} 
		}
		####################################################################
		
		
	####################################################################
		// reverse_spec_collection :"this",ticket_no:ticket_no
		if(isset($_POST['reverse_spec_collection'])){
			$dbm = new DbTool();  
			$ticket_no = $dbm->clean($_POST['ticket_no']);
			$exists = $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'process_completed'=>'no','finalized'=>'yes','status'=>'active')),array('sn','fullname','process_completed','finalized'));
			/*************************/
			if(!is_null($exists)){
				# check the specimen if already specified for modification 
				$modified = $dbm->getFields($dbm->select('customer_specimen',array('ticket_no'=>$ticket_no,'process_completed'=>'no','to_modify'=>'yes','status'=>'active')),array('sn','bill_type_id','to_modify')); 
				if(!is_null($modified)) {
					echo json_encode(array('icon'=>'info','text'=>$ticket_no.' already reversed to be modified for specimen collection ','title'=>'Ticket Already Reversed Before !')); 
				}
				else {
					$dbm->updateTb('customer_specimen',array('to_modify'=>'yes'),array('ticket_no'=>$ticket_no,'process_completed'=>'no','status'=>'active')); 
					$dbm->updateTb('customer_tickets',array('payment_completed'=>'no','payment_finalized'=>'no'),array('ticket_no'=>$ticket_no,'status'=>'active')); 
                                        echo json_encode(array('icon'=>'success','text'=>$ticket_no.' has been reversed to be modified for specimen collection ','title'=>'Ticket Reversed Successfully !')); 
				}
				# reverse customer ticket 
				#$dbm->updateTb('customer_tickets',array('process_completed'=>'no','date_fin'=>'','time_fin'=>'','fin_by'=>''),array('ticket_no'=>$ticket_no,'process_completed'=>'yes','finalized'=>'yes','status'=>'active')); 
				# reverse customer specimens 
				#$dbm->updateTb('customer_specimen',array('process_completed'=>'no'),array('ticket_no'=>$ticket_no,'process_completed'=>'yes','finalized'=>'yes','status'=>'active')); 
				# keep comment for reversion 
				# $dbm->insert('customer_ticket_reversion',array('ticket_no'=>$ticket_no,'reverse_type'=>'processed','rev_by'=>$_SESSION['admUser'],'date_rev'=>date('Y-m-d'),'time_rev'=>date('H:i:s',time()))); 
				# echo json_encode(array('icon'=>'success','text'=>$ticket_no.' successfully reversed ','title'=>'Ticket Proccesing Reversed !')); 
			}
			else{
				echo json_encode(array('icon'=>'error','text'=>"criteria for reversing $ticket_no not found",'title'=>'This Ticket Status Cannot be Reversed To Specimen Collection!')); 
			} 
		}
		####################################################################
		