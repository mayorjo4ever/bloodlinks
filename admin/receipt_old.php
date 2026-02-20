<?php   require "usercheck.php";  include "formsubmit.php"; ?> 
<?php $system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email')); 

	print "<pre>";
	$req = $_REQUEST;
	$rrr = array_map(fn($txt)=>base64_decode($txt),$req); //  ($req as $r) echo base64_decode($r); echo "<br>";
	print_r($rrr);
	print "</pre>";
	// exit; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "headlinks.html";?>   <!-- 
	<tr><td nk rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	<tr><td nk rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">  -->
	
	<style>
	table tr,table td {
		padding:0em 0em; margin:0em 0em; font-size:16px; 
		border-bottom:1px solid #FFF; webkit-border:0px solid #FFF;
	} 
	table tr td, table tr{
		line-height:10px;
	}
	
	table.table-receipt tr,table.table-receipt td {
		padding:0em 1em; margin:0em 1em; font-size:16px; 
		border-bottom:1px solid #FFF; webkit-border:0px solid #FFF;
	}
	
	/* CSS Document */
	table.table-nogap { border:10px thin #00bcd4; } 
	table.table-nogap tr td,table.table-nogap tr { margin-top:0.0em; margin-bottom:0.0em; padding-top:0.0em; padding-bottom:0.0em; text-align:left; }
	table.table-nogap td div.form-group{ margin-top:0em; margin-bottom:0em; padding-top:0em; padding-bottom:0em;} 
	
	table.table-nogap td{ padding-left:0.4em; padding-right:0.4em; min-width:16%;   } 
	table.table-nogap td.serial{ min-width:5%; } 
	table.table-nogap td.titles{ min-width:8%; } 

	
	/** 
		.border-none{ border:none; }
		
		table tr, table thead td, table td, table thead th, table th {
					  border:1px solid #fff; margin:5px; padding:5px; 
					    background:transparent; 
			}
		td.align-right { text-align:left; }
		
		table.large-font tr,table.large-font tr td  { font-size:13px;  padding:5px;  margin:5px; }
		
		small.md-font { font-size: 11px;}
		
		.md-font-2 { font-size: 13px; bold; }
		
		body,.box  { margin:0px; padding:0px; line-height:10px;}  
		  p.h5 { margin:0px; padding:0px;  }  
		 .main-panel,.container,.col-md-4, .col-sm-6, 
		 .col-xs-6, .box, .box-body { 
			margin:0px; padding:0px;   word-wrap: break-word;
			}
		.box-footer {
			margin-top:0px; padding-top:0px;
			margin-bottom:0px; padding-bottom:0px;
			} 
			
			**/
	</style>
</head>

<body>
  <!-- <div class="container-scroller"> -->
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php // require "partials/_horizontal-navbar.php"; ?>
    <!-- partial -->
    <!-- <div class="container-fluid page-body-wrapper"> -->
      
       <!--   <div class="content-wrapper"> -->
          <div class="row">
			 <!-- <div class="col-md-3 col-sm-6 col-xs-6 "> --> 
			<div class="col-xs-12 col-lg-3 col-sm-12 col-md-3 col-lg-offset-3  col-md-offset-3" style=""> <!--  stretch-box grid-margin -->
			    <div class="box">  
                  <div class="box-body"> 
					<p class="h4 bold"> 
						<?php
							$ticket_no = strtoupper(base64_decode($_REQUEST['r_val'])); $proc_comp = base64_decode($_REQUEST['pc']); // yes
							$print_time = $proc_comp = base64_decode($_REQUEST['prd']); // period
							$ticket_mode = $proc_comp = base64_decode($_REQUEST['tkm']); // invoice / full receipt
							# $ticket_mode = $proc_comp = base64_decode($_REQUEST['tkm']); // invoice / full receipt
							$serial = base64_decode($_REQUEST['rcpid']); // receipt id 
							### PRINT HEADER NAME 
							echo  "<strong><span class='text-uppercase bold'>".$system_info['name'][0]."</span></strong> <br/> <small class='md-font'>".$system_info['address'][0]."&nbsp;&nbsp; <span class='fa fa-phone'></span> ".$system_info['phone'][0]."</small>"; ?> 
							<br/> <center class="h4 text-uppercase"><strong> <?php echo $ticket_no; ?> receipt</strong></center>
						</p>
					<?php 
					
						## requests : href="receipt.php?r_val=".base64_encode($ticket_no).
						# "&prd=".base64_encode(time()-3600)."&tkm=".base64_encode('invoice')."&rcpid=".base64_encode($myPayments['sn'][$m]); "
					
						## validate 
						$criterial = array('ticket_no'=>$ticket_no,'status'=>'active'); 
						$fields = array('c_by','sn','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','paym_fin_by','paym_date_fin','paym_time_fin','date_fin','time_fin','comment','alt_test_name','payment_completed');
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
								$paym_time = $payment_info['time_paid'];
								$paid_by = $payment_info['paymode'];
							 } break; 
							 default:{
								$expected_pay = $custom_ticket_id['total_cost']; 
								$discount = $custom_ticket_id['discount']; 
								$amount_paid = $custom_ticket_id['amount_paid']; 
								$paym_date = $custom_ticket_id['paym_date_fin']; 
								$paym_time = $custom_ticket_id['paym_time_fin']; 
								$balance = $expected_pay - $discount - $amount_paid;
								$paid_by = $payment_info['paymode'];
								} break; 
						 } # end switch 
					?>
						<table class="table table-nogap table-receipt large-font text-capitalize" >
							<!--<tr><td  class="text-capitalize bold"> lab no : </td> <td > <span class="bold text-uppercase"><?php echo $ticket_no; ?> </span>  </td></tr>  -->
							<tr><td class="bold">name:  <span class="pull-right"> <?php echo $custom_ticket_id['fullname']; ?>  </span> </td></tr>  													
							<tr><td>address: <span class="pull-right"><?php echo $custom_ticket_id['hospital']; ?> </span> </td></tr> 			
							<tr><td>date: <span class="pull-right"><?php echo date('d/m/y',strtotime($paym_date));  echo " - ".$func->format_date($paym_time,'time');   ?>  </td></tr> 
							
							<tr><td class="bold">amount due: <span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($expected_pay);  ?>  </span>  </td></tr> 							
							<tr><td>discount: <span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($discount);  ?>   </span> </td></tr> 
							<tr><td>amount paid:<span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($amount_paid);  ?>   </span> </td></tr> 
							<tr><td class="bold">balance:<span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($balance);  ?>  </span>  </td></tr> 
							<!-- <tr><td  class="text-capitalize ">paid by :</td> <td  class="text-uppercase"><?php echo  $paid_by;  ?>  </td></tr> -->
							<tr><td class="bold"> <u> BILLS </u> </td></tr>
						 
						 <?php 
						  	$cond = array('ticket_no'=>$ticket_no,'status'=>'active'); 
							$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample')); 
							$n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
							$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
							 ?>
							 <tr class="text-capitalize "> <td>    <?php echo ($custom_ticket_id['alt_test_name']=="")?$bill_type['name'][0]:$custom_ticket_id['alt_test_name']; ?>  <span class="pull-right"> <?php echo "&#8358; ".number_format($bill_type['price'][0]);  ?></span> </td></tr>
							 
							 <?php  } ## ends foreach ?>
						  <tr> <td> &nbsp; </td></tr>
						  <tr> <td>  <?php $_SESSION['qr_data'] = "$ticket_no ".$custom_ticket_id['fullname']." Cost N".$expected_pay."  Bal N ".$balance;  require "php_qr_gen.php"; ?>   </td></tr>
						 
						 </table>  
                  </div>   <!-- box-body
				  <div class="box-footer bg-white"> 
					<?php $_SESSION['qr_data'] = "$ticket_no Cost N".$expected_pay."  Bal N ".$balance;  require "php_qr_gen.php"; ?>  
				  </div>  <!-- box-footer -->
                </div>
              </div>
          </div>
		  
       <!--  </div>  -->
        <!-- content-wrapper ends -->
          
		  <?php // require "footer.php"; ?>
		   
        <!-- partial -->
        
      <!-- main-panel ends -->
    <!-- </div> -->
    <!-- page-body-wrapper ends -->
 
  <!-- container-scroller -->
	
	<?php require "footlinks.php"; ?>     
	 
</body> <!---->
		 
</html>