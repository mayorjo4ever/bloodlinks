<?php 
	if(isset($_POST['adv_fetch_all_drug_forms'])){
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
							<a class="btn btn-primary btn-sm" href="<?php echo "reg_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> registration slip </a> 
							<a class="btn btn-success btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> treatment slip </a> 
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
							$old = $func->years_old($mysib['dob'][$m],date('Y-m-d'));
							$dob = base64_encode($old);
							$data_text = $mysib['fullname'][$m]."|".$sid."|".$result_01['military_no'][$n]."|".$result_01['category'][$n]."|".$mysib['type'][$m];
							$url3 = "receipt_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c"; 
						?> 
					<tr>
						<td class="text-info bold text-uppercase"> <?php echo $mysib['type'][$m]; ?>   </td>
						 
						 <td> <b><?php echo $mysib['fullname'][$m]; ?> </b> </td> 
						
						 <td>										
							<a class="btn btn-primary btn-sm" href="<?php echo "reg_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> Registration Slip </a> 
							<a class="btn btn-success btn-sm" href="<?php echo "treatment_slip.php?n=$myname&tp=$mytype&mln=$mymilno&hn=$myhsp&db=$dob&dtc=$mydate_c";?>" target="_blank"> Treatment Slip </a> 
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
	