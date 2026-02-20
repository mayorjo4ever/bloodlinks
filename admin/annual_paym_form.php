		<form method="post">
		
		 
	 
		<div class="row"> 
			 <div class="col-md-12">
			 <div class="card"><div class="card-body">
				<div class="col-md-3 float-left">  
				<div class="form-group">
					<label class="label-control"> List of Staff...  </label> 
					<select name="staff_range" class="staff_range form-control border border-primary font-16"  onchange="console.log($(this).val())"> 
						<optgroup label="Select  All Staff ">  
							<option value="all"> All Staff  </option> 
						</optgroup> 
						<optgroup label="Select Individual">  						
							 <?php  
								$staff = $dbm->getFields($dbm->select('users',array('acct_status'=>'active'),array('surname'),'and','asc'),array('surname','firstname','midname','fullname','dob','user_id','sn','password'));
								## if not null  	
								if(!is_null($staff)) {  $n=0; foreach($staff['user_id'] as $user_id){   ?>
									<option value="<?php echo $user_id; ?>" <?php echo ($_POST['staff_range']==$user_id)?"selected":""; ?>>  <?php echo $staff['fullname'][$n]; ?>  </option> 
									<?php $n++; } # end foreach 
									}  # end null 
									?>
						</optgroup> 
					</select>
				</div>
			</div>  <!-- ./ col-md-3 -->
			
			<div class="col-md-3 float-left">  
				<div class="form-group">
					<label class="label-control"> Year ...  </label> 
					<select name="year" class="year form-control  border border-primary font-16" onchange="console.log($(this).val())"> 
						<optgroup label="Select Year"> 
							<option value="">... Year ... </option> 
							<?php  $years = range(date('Y'),2018,-1); # $months = $cal_infos['months']; 
							foreach($years as $year){?>
								<option value="<?php echo $year; ?>" <?php echo ($_SESSION['year']==$year)?"selected":""; ?>><?php echo $year; ?></option> 
							<?php } # end foreach 
							?>
						</optgroup> 
					</select>
				</div>
			</div>  <!-- ./ col-md-3 -->
			
			<div class="col-md-3 float-left">  
				<div class="form-group">
					<label class="label-control"> Month ...  </label> 
					<select name="month" class="month form-control border border-primary font-16"  onchange="console.log($(this).val())"> 
						<optgroup label="Select Month"> 
							<option value="">... Month ... </option> 
							<?php $m = 1;  $cal_infos = cal_info(0); $months = $cal_infos['months']; 
							foreach($months as $month){?>
								<option value="<?php echo $m; ?>" <?php echo ($_SESSION['month']==$m)?"selected":""; ?>><?php echo $month; ?></option> 
							<?php $m++; } # end foreach 
							?>
						</optgroup> 
					</select>
				</div>
			</div>  <!-- ./ col-md-3 -->
			
			<div class="col-md-3 float-left">  
				<div class="form-group">
					<label class="label-control"> &nbsp;  </label> <br/> 
					<button type="submit" name="search_payment" class="btn btn-info btn-lg search_payment btn-rounded"> Search &nbsp; <i class="fa fa-search"></i> </button>
				 </div>
			</div>  <!-- ./ col-md-3 -->
				
			<?php   if($_SESSION['show_staff_list']==true) { ?> 	
			
			<marquee behavior="alternate" direction="right" scrollamount="3" class="font-16 text-dark" scrolldelay="3"> Please note that the salary structure below is based on the current setting scheduled at the staff payment module </marquee>
				
				
			
				<table class="table " style="width:80%"> 
					<thead> 
						<tr> 
							<td> <div class="form-group row"> 
									<label class="label-control bold"> Payment status </label>
									  <select disabled class="salary_btn paym_status form-control font-16 border border-primary">
										<optgroup label="Payment Status"> 										
											<option value="paid"> Paid </option> 											 	
										</optgroup>
										</select>
								</div>
							</td> 
							<td> 
								<div class="form-group row"> 
									<label class="label-control bold"> Payment Method </label>
									  <select disabled class="salary_btn paym_method form-control font-16 border border-primary">
										<optgroup label="Payment Status"> 
											<option value="">... Payment Method ... </option> 
											 	<option value="bank"> Bank </option> 
											 	<option value="cash"> Cash  </option> 
											 	<option value="transfer"> Transfer  </option> 
										</optgroup>
										</select>
									 
								</div>
							</td>
							<td> <button disabled data-text="<?php echo $_SESSION['year']."|".$_SESSION['month'];  ?>" type="button" onclick="pay_salary()" class="salary_btn pay_salary bold btn simple-btn btn-rounded btn-sm ladda-button" data-style="zoom-in"> <span class="btn btn-success btn-rounded btn-icons btn-sm"> <i class="fa fa-check"></i> </span> 
									&nbsp; Approve <span class="count"> 0 </span> Payments &nbsp;
								</button>
								&nbsp; &nbsp; 
								<button disabled data-text="<?php echo $_SESSION['year']."|".$_SESSION['month'];  ?>" type="button" onclick="reverse_salary()" class="salary_btn pay_salary bold btn simple-btn btn-rounded btn-sm ladda-button" data-style="zoom-in"> <span class="btn btn-danger btn-rounded btn-icons btn-sm"> <i class="fa fa-reply"></i> </span> 
									&nbsp; Reverse <span class="count"> 0 </span> Payments &nbsp;
								</button>  </td>	  </td>

							</tr>
					</thead> 
					</table> 
					<table class="table table-hover ">
					<thead> 
						<tr class="bold">   
							<td> ID </td> 
							<td> Name</td>  
							<td> Basic Salary  </td> 
							<td> Allowance </td> 
							<td> Deductions</td> 							
							<td> Gross Pay </td> 
							<td> Status</td> 
							<td><button type="button" class="btn simple-btn" onclick="selectAllUsers()"> <span class="fa fa-arrows font-16"> </span> </button> </td> 
						</tr>	
					<tbody>
					 <?php if(!is_null($_SESSION['staff_query'])){ $m=0;
							$all_basic = 0; $all_bonus = 0; $all_deducts = 0; $all_gross_pay = 0; 
							foreach($_SESSION['staff_query']['user_id'] as $user_id){
								$salary_paid = $dbm->getFields($dbm->select('staff_salary_report',array('user_id'=>$user_id,'year'=>$_SESSION['year'],'month'=>$_SESSION['month'],'status'=>'active')),array('sn','user_id','basic_salary','total_bonus','total_deduct','gross_pay',''));
								if(is_null($salary_paid)) {
									$salary_info = $dbm->analyse_staff_salary_pay($user_id);
									$paid = "Unpaid"; $paid_icon = "fa fa-warning font-18"; $paid_color = "text-warning";
									}
								else {$salary_info = $dbm->resort($salary_paid);
									$paid = "Paid"; $paid_icon = "fa fa-check-square font-22"; $paid_color = "text-success";
								}
								
								$all_basic += $salary_info['basic_salary']; 
								$all_bonus += $salary_info['total_bonus']; 
								$all_deducts += $salary_info['total_deduct']; 
								$all_gross_pay += $salary_info['gross_pay']; 
								?>
								<tr class="font-16">	 	 
								 <td><?php  if($paid=="Paid"){ $url = "a=".base64_encode($user_id)."&b=".base64_encode($_SESSION['year'])."&c=".base64_encode($_SESSION['month']); 
									 echo "<a href='staff_payslip.php?$url' target='_blank' class='unstyle' title='Print Payslip'>  <span class='fa fa-envelope-open text-success font-22'></span> </a> ";} ?>  &nbsp; &nbsp; <?php echo $user_id; ?>  </td>
								 <td> <?php echo $_SESSION['staff_query']['fullname'][$m];  ?>  </td>
								  
								 <td class="bold"> <?php echo "&#8358; ".number_format($salary_info['basic_salary']);  ?>  </td>
								 <td> <?php  echo "&#8358; ".number_format($salary_info['total_bonus']);  ?>  </td>
								 <td> <?php  echo "&#8358; ".number_format($salary_info['total_deduct']);  ?>  </td>
								 <td class="bold"> <?php  echo "&#8358; ".number_format($salary_info['gross_pay']);  ?>  </td>
								 <td> <span class="<?php echo $paid_color; ?> bold "> <i class="fa <?php echo $paid_icon; ?>"> </i> &nbsp;  <?php echo $paid; ?>   </span>  </td>
								 <td>  <div class="checkbox"> <input type="checkbox" name="checkboxes[]" value="<?php echo $user_id; ?>" class="checkbox stud_box" /> </div>  </td>
								</tr> 
								
							<?php $m++; } # end foreach  
					 } ?>
					 </tbody>
					 <tfoot>
						<tr class="bold">   
							<td>  </td> 
							<td> </td>  
							<td><?php echo "&#8358; ".number_format($all_basic);  ?></td> 
							<td> <?php echo "&#8358; ".number_format($all_bonus);  ?></td> 
							<td><?php echo "&#8358; ".number_format($all_deducts);  ?></td> 							
							<td><?php echo "&#8358; ".number_format($all_gross_pay);  ?>  </td> 
							<td></td> 
							<td></td> 
						</tr>	
					 </tfoot>
					 
			 </table>
			 
			 <?php } ## end show_staff_list ?> 
			 
			</div>  <!-- ./ col-md-12 -->	
		</div>			</div>			
			 					  
		</div>  <!-- ./ row -->						  
		
		
		
		</form>