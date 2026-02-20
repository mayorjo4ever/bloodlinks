
	<?php   require "usercheck.php";  include "formsubmit.php"; ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- 
	<tr><td nk rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	<tr><td nk rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">  -->
	
	<style>
		.cosmo { font-family:Comic Sans MS; font-size:16px; }
		.border-none{ border:none; }
		
		table tr, table thead td, table td, table thead th, table th {
					  border:1px solid #fff; margin:5px; padding:5px; 
					    background:transparent; 
			}
		td.align-right { text-align:left; }
		
		table.large-font tr,table.large-font tr td  { font-size: 14px;  padding:5px;  margin:5px; }
		
		small.md-font { font-size: 14px;}
		
		.md-font-2 { font-size: 14px; bold; }
		
		body,.card  { margin:0px; padding:0px; line-height:10px; font-family:Times New Roman;  }  
		  p.h5 { margin:0px; padding:0px;  font-family:Times New Roman;  }  
		 .main-panel,.container,.col-md-4, .col-sm-6, 
		 .col-xs-6, .card, .card-body { 
			margin:0px; padding:0px;   word-wrap: break-word;
			}
		.card-footer {
			margin-top:0px; padding-top:0px;
			margin-bottom:0px; padding-bottom:0px;
			}
		tr.border-bottom td {  border-top:2px solid #ddd; border-bottom:2px solid #ddd; }	
		
	</style>
</head>

<body>
  <!-- <div class="container-scroller"> -->
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php // require "partials/_horizontal-navbar.php"; ?>
    <!-- partial -->
    <!-- <div class="container-fluid page-body-wrapper"> -->
       <div class="main-panel container">   
       <!--   <div class="content-wrapper"> -->
          <div class="row">
			<!-- <div class="col-md-3 col-sm-6 col-xs-4 grid-margin stretch-card">-->
			<div class="col-md-8 col-sm-12 col-xs-12 ">
                <div class="card">  
                  <div class="card-body" style="height:auto"> 
					<p class="h5 bold"> 
						<?php
							$user_id =  base64_decode($_REQUEST['a']);
							$year = base64_decode($_REQUEST['b']); //  
							$month = base64_decode($_REQUEST['c']); //  
							$cal_infos = cal_info(0); $months = $cal_infos['months']; 
							$admin = new User('users');
							  ## PRINT HEADER NAME 
							echo "<h3>".strtoupper($system_info['name'][0]."</h3><br/> <h5> pay advice for ".$months[$month]).", ".$year."</h5>"; ?> 
							
						</p>
					<?php  
						 $staff_info = $dbm->resort($admin->getAll(array('user_id'=>$user_id)));
					?>
						<table class=" table h4 table-nogap" >
							<tr><td  class="text-capitalize bold"> Name : </td> <td > <span class="bold text-uppercase"><?php echo $staff_info['fullname']; ?> </span>  </td></tr>  
							<tr><td  class="text-capitalize bold"> Emp. No:  </td> <td class="text-capitalize bold"> <?php echo $user_id; ?>  </td></tr>  													
							<tr><td  class="text-capitalize "> Department :  </td> <td ><?php echo $custom_ticket_id['hospital']; ?></td></tr> 			
							<tr><td  class="text-capitalize "> Designation :   </td> <td ><?php $my_roles = $dbm->getFields($dbm->select('myroles',array('user_id'=>$user_id,'status'=>'active')),array('role_id','step_val'));
							echo $rolename = (is_null($my_roles))?"":$admin->get_role_name($my_roles['role_id'][0])['name']; ?> </td></tr> 
							<tr><td  class="text-capitalize "> Date Employed :  </td> <td ><?php echo $func->format_date($staff_info['date_employ']);  ?>  </td></tr> 							
						 </table>  
						 
						 <table class="table h4 table-nogap" >
							<thead>
							<tr  class="text-capitalize bold border-bottom">	
								<td >  PAY ITEM     : </td> 
								<td > AMOUNT </td>  
								<td >TODATE  </td></tr>  
							</thead>
							<tbody> 
								<?php 
								$my_salary_details = $dbm->getFields($dbm->select('staff_salary_report',array('user_id'=>$user_id,'year'=>$year,'month'=>$month,'status'=>'active')),array('user_id','year','month','basic_salary','total_bonus','total_deduct','gross_pay','date_c','time_c','c_by'));
								
								?>
								
								<tr>
									<td> Basic Salary  </td> 
									<td> <?php echo "&#8358; ".number_format($my_salary_details['basic_salary'][0]); ?></td> 			
									<td> </td>
								</tr>
								
								<?php 
								$my_allowances = $dbm->getFields($dbm->select('staff_allowance_payment',array('user_id'=>$user_id,'year'=>$year,'month'=>$month,'status'=>'active')),array('sn','user_id','amount','ref_id'));
								if(!is_null($my_allowances)){ $i=0; 
									foreach($my_allowances['ref_id'] as $ref_id){
										$allowance_info = $dbm->resort($dbm->getFields($dbm->select('salary_allowance_bodies',array('sn'=>$ref_id,'status'=>'active')),array('sn','name')));?>
									<tr class="<?php if($i==(count($my_allowances['ref_id'])-1)) echo 'border-bottom'; ?>">
										<td><?php echo $allowance_info['name']; ?>  </td> 
										<td> <?php echo "&#8358; ".number_format($my_allowances['amount'][$i]); ?></td> 			
										<td> </td>
									</tr> 	 
									<?php $i++;
									}
								}
									 
								?>
								
								
								<tr class="bold border-bottom">
									<td >    TOTAL EARNINGS   </td> 
									<td > <?php echo "&#8358; ".number_format($my_salary_details['total_bonus'][0]+$my_salary_details['basic_salary'][0]); ?></td> 			
									<td > </td>
								</tr> 
								
								<?php 
									$my_deductions = $dbm->getFields($dbm->select('staff_deductions_payment',array('user_id'=>$user_id,'year'=>$year,'month'=>$month,'status'=>'active')),array('sn','user_id','amount','ref_id','deduct_mode','percent_rate'));
										if(!is_null($my_deductions)){ $i=0; 
											foreach($my_deductions['ref_id'] as $ref_id){
												$deduction_info = $dbm->resort($dbm->getFields($dbm->select('salary_debit_bodies',array('sn'=>$ref_id,'status'=>'active')),array('sn','body_name')));
												?>
											<tr class="<?php if($i==(count($my_deductions['ref_id'])-1)) echo 'border-bottom'; ?>">
												<td><?php echo $deduction_info['body_name']; ?>  </td> 
												<td><?php echo "&#8358; ".number_format($my_deductions['amount'][$i]); ?> </td> 			
												<td> </td>
											</tr> 	 
									<?php $i++;
									}}
										/***************************************/
								?>
								<tr class="bold text-underline border-bottom">
									<td >  TOTAL DEDUCTIONS     </td> 
									<td > <?php echo "&#8358; ".number_format($my_salary_details['total_deduct'][0]); ?></td> 			
									<td > </td>
								</tr> 
								
								<tr class="bold border-bottom">
									<td >  NET PAY     </td> 
									<td class="bold h2"> <?php echo "&#8358; ".number_format($my_salary_details['gross_pay'][0]); ?></td> 			
									<td > </td>
								</tr> 
							</tbody>								
						 </table>  
                  </div>   <!-- card-body
				  <div class="card-footer bg-white"> 
					<?php $_SESSION['qr_data'] = "$ticket_no Cost N".$expected_pay."  Bal N ".$balance;  require "php_qr_gen.php"; ?>  
				  </div>  <!-- card-footer -->
                </div>
              </div>
          </div>
		  
		  <div class="row">
			<?php # require "workflow_stats.php"?>
		  </div> <!-- row ends -->
		     
       <!--  </div>  -->
        <!-- content-wrapper ends -->
          
		  <?php // require "footer.php"; ?>
		   
        <!-- partial -->
      </div>   
      <!-- main-panel ends -->
    <!-- </div> -->
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
	<?php # require "bill_modal.php"; ?>
	<?php require "admin_js_links.php"; ?>
	 
	     
	 
</body> <!---->
		 
</html>