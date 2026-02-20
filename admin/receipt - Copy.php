
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
			<div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="card">  
                  <div class="card-body" style="height:auto"> 
					<p class="h5 bold"> 
						<?php
							$ticket_no = strtoupper(base64_decode($_REQUEST['r_val'])); $proc_comp = base64_decode($_REQUEST['pc']); // yes
							$print_time = $proc_comp = base64_decode($_REQUEST['prd']); // period
							$ticket_mode = $proc_comp = base64_decode($_REQUEST['tkm']); // invoice / full receipt
							# $ticket_mode = $proc_comp = base64_decode($_REQUEST['tkm']); // invoice / full receipt
							$serial = base64_decode($_REQUEST['rcpid']); // receipt id 
							### PRINT HEADER NAME 
							echo "".$system_info['name'][0]." <small class='md-font'></small>  <br/> <small class='md-font'>".$system_info['address'][0]."<br/><span class='fa fa-phone'></span> call : ".$system_info['phone'][0]."</small>"; ?> 
							<br/><span class="text-uppercase md-font-2"> <?php echo "receipt : ".$ticket_mode; ?> &nbsp;  </span>
						</p>
					<?php 
					
						## requests : href="receipt.php?r_val=".base64_encode($ticket_no).
						# "&prd=".base64_encode(time()-3600)."&tkm=".base64_encode('invoice')."&rcpid=".base64_encode($myPayments['sn'][$m]); "
					
						## validate 
						$criterial = array('ticket_no'=>$ticket_no,'status'=>'active'); 
						$fields = array('c_by','sn','discount','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin','comment','alt_test_name','payment_completed');
						$custom_info = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
						 if(is_null($custom_info)) { echo "<script> alert('Invalid Parameters'); window.location.href='ticket_paym.php';  </script> "; }
						 else $custom_ticket_id = $dbm->resort($custom_info);
						
						switch($ticket_mode){
							 case 'invoice': { 
								$payment_info = $dbm->resort($dbm->getFields($dbm->select('payment_log',array('sn'=>$serial,'ticket_no'=>$ticket_no,'status'=>'active')),array('ticket_no','discount','amount_paid','expc_pay','paymode','date_paid','time_paid','collected_by')));
								$expected_pay = $payment_info['expc_pay'];
								$discount = $payment_info['discount']; 
								$amount_paid = $payment_info['amount_paid'];
								$balance = $expected_pay - $discount - $amount_paid;
								$paym_date = $payment_info['date_paid'];
								$paid_by = $payment_info['paymode'];
							 } break; 
							 default:{
								$expected_pay = $custom_ticket_id['total_cost']; 
								$discount = $custom_ticket_id['discount']; 
								$amount_paid = $custom_ticket_id['amount_paid']; 
								$paym_date = $custom_ticket_id['date_c']; 
								$balance = $expected_pay - $discount - $amount_paid;
								$paid_by = $payment_info['paymode'];
								} break; 
						 } # end switch 
					?>
						<table class=" table-nogap border-none large-font" >
							<tr><td  class="text-capitalize bold"> lab no : </td> <td > <span class="bold text-uppercase"><?php echo $ticket_no; ?> </span>  </td></tr>  
							<tr><td  class="text-capitalize  align-right">name :  </td> <td > <?php echo $custom_ticket_id['fullname']; ?>  </td></tr>  													
							<tr><td  class="text-capitalize "> address :  </td> <td ><?php echo $custom_ticket_id['hospital']; ?></td></tr> 			
							<tr><td  class="text-capitalize "> date :   </td> <td ><?php echo date('d/m/y',strtotime($paym_date)); #echo $func->format_date($paym_date);  ?>  </td></tr> 
							<tr><td  class="text-capitalize "> amount due :  </td> <td ><?php echo "&#8358;&nbsp;".number_format($expected_pay);  ?>  </td></tr> 							
							<tr><td  class="text-capitalize "> discount :  </td> <td ><?php echo "&#8358;&nbsp;".number_format($discount);  ?>  </td></tr> 
							<tr><td  class="text-capitalize "> amount paid :  </td> <td ><?php echo "&#8358;&nbsp;".number_format($amount_paid);  ?>  </td></tr> 
							<tr><td  class="text-capitalize "> balance :</td> <td ><?php echo "&#8358;&nbsp;".number_format($balance);  ?>  </td></tr> 
							<!-- <tr><td  class="text-capitalize ">paid by :</td> <td  class="text-uppercase"><?php echo  $paid_by;  ?>  </td></tr> -->
							<tr><td colspan="2" class="bold"> <u> BILLS </u> </td></tr>
						 
						 <?php 
						  	$cond = array('ticket_no'=>$ticket_no,'status'=>'active'); 
							$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample')); 
							$n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
							$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
							 ?>
							 <tr class="text-capitalize "> <td colspan="2" >    <?php echo ($custom_ticket_id['alt_test_name']=="")?$bill_type['name'][0]:$custom_ticket_id['alt_test_name']; ?>  (<?php echo $specimens['specimen_sample'][$n];  ?>) </td></tr>
							 
							 <?php  } ## ends foreach ?>
						  <tr> <td colspan="2"> &nbsp; </td></tr>
						  <tr> <td colspan="2">  <?php $_SESSION['qr_data'] = "$ticket_no Cost N".$expected_pay."  Bal N ".$balance;  require "php_qr_gen.php"; ?>   </td></tr>
						 
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