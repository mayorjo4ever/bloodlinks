<?php   require "usercheck.php";  include "formsubmit.php"; ?> 
<?php $system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email')); 
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
			
			 #watermark {
                position: fixed;

                /** 
                    Set a position in the page for your image
                    This should center it vertically
                **/
                left:300px; 
				top:230px;

                /** Change image dimensions**/
                

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }
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
				  <div style="background-color:#fff;">
					<p class="h4 bold bg-grey"> 
						<?php
							$ticket_no = strtoupper(base64_decode($_REQUEST['r_val']));
							$print_time = $proc_comp = base64_decode($_REQUEST['prd']); // period
							### PRINT HEADER NAME 
							echo  "<strong><span class='text-uppercase bold'>".$system_info['name'][0]."</span></strong> <br/> <small class='md-font'>".$system_info['address'][0]."&nbsp;&nbsp;<b> <span class='fa fa-phone'></span> ".$system_info['phone'][0]."&nbsp;&nbsp;&nbsp; <span class='fa fa-envelope'></span> &nbsp;".$system_info['email'][0]."</b></small>"; ?> 
							<br/> <center class="h4 text-uppercase"><strong> <?php echo $ticket_no; ?> receipt</strong></center>
						</p>
						</div>
					<?php 
					
						## validate 
						$criterial = array('ticket_no'=>$ticket_no,'status'=>'active'); 
						$fields = $mydal->TableFields('customer_tickets'); // array('c_by','sn','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','paym_fin_by','paym_date_fin','paym_time_fin','date_fin','time_fin','comment','alt_test_name','payment_completed');
						$ticket_info = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
						 if(is_null($ticket_info)) { echo "<script> alert('Invalid Parameters'); window.location.href='ticket_paym.php';  </script> "; }
						 else $custom_ticket_id = $dbm->resort($ticket_info);
						
						$payment_info = $dbm->getFields($dbm->select('payment_log',array('ticket_no'=>$ticket_no,'status'=>'active')),array('ticket_no','discount','amount_paid','expc_pay','paymode','date_paid','collected_by'));
						$expected_pay = $custom_ticket_id['total_cost']; 
						$discount = $custom_ticket_id['discount']; 
						$amount_paid = $custom_ticket_id['amount_paid']; 
						$paym_date = $custom_ticket_id['paym_date_fin']; 
						# $paym_time = $custom_ticket_id['paym_time_fin']; 
						$balance = $expected_pay - $discount - $amount_paid;
 						$balance = ($balance < 0 ) ? 0 : $balance; 
						$refund = $custom_ticket_id['refund']; 
						$paym_status_img = ($custom_ticket_id['payment_completed']=="yes")?"../assets/images/fpay.jpg":"../assets/images/ppay.jpg";
								
					?>
						<table class="table table-nogap table-receipt large-font text-capitalize" style=" background:transparent;" >
							<!--<tr><td  class="text-capitalize bold"> lab no : </td> <td > <span class="bold text-uppercase"><?php echo $ticket_no; ?> </span>  </td></tr>  -->
							<tr><td class="bold">name:  <span class="pull-right"> <?php echo $custom_ticket_id['fullname']; ?>  </span> </td></tr>  													
							<tr><td>address: <span class="pull-right"><?php echo $custom_ticket_id['hospital']; ?> </span> </td></tr> 			
							<tr><td>date: <span class="pull-right"><?php echo $paym_date;  # echo " - ".$func->format_date($paym_time,'time');   ?>  </td></tr> 
							
							<tr><td class="bold">amount due: <span class="pull-right"><?php echo "<b>&#8358;&nbsp;".number_format($expected_pay)."</b>";  ?>  </span>  </td></tr> 							
							<?php if(is_numeric($discount) && $discount>0) {?>
							<tr><td>discount: <span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($discount);  ?>   </span> </td></tr> 
							<?php } ?>
							<tr><td>amount paid:<span class="pull-right"><?php echo "<b>&#8358;&nbsp;".number_format($amount_paid)."</b>";  ?>   </span> </td></tr> 
							<tr><td > 
									<?php $i=0; if(!empty($payment_info)) foreach($payment_info['paymode'] as $pm){
										echo " <i><small class='pull-right'>&nbsp;(".$pm."&nbsp; &#8358; ".$payment_info['amount_paid'][$i].")&nbsp;</small></i>  ";
										$i++;
									}?>							
							</td></tr> 							
							
							<tr><td class="bold">balance:<span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($balance);  ?>  </span>  </td></tr> 
							
							<?php if(is_numeric($refund) && $refund>0) {?>
							<tr><td>change : <span class="pull-right"><?php echo "&#8358;&nbsp;".number_format($refund);  ?>   </span> </td></tr> 
							<?php } ?>
							
							<!-- <tr><td  class="text-capitalize ">paid by :</td> <td  class="text-uppercase"><?php echo  $paid_by;  ?>  </td></tr> -->
                            <tr><td> <strong><u> BILLS </u> </strong></td></tr>
						 
						 <?php 
						  	# print "<pre>"; 
						  	$cond = array('ticket_no'=>$ticket_no,'status'=>'active'); 
							  $specimens = $dbm->select('customer_specimen',$cond); 
							  # print "Cond";  print_r($cond);  print_r($specimens);
							  $n = 0;   foreach($specimens as $k=>$v){ 
								if($v['order_type']=="perform_test"):
									$bill_type = $dbm->select('bill_types',array('sn'=>$v['bill_type_id'],'status'=>'active'));
								#	print_r($bill_type); exit;  	
								
								elseif($v['order_type']=="donate_blood" || $v['order_type']=="buy_blood"):
									$bill_type =  $dbm->select('blood_types', ['id'=>$v['blood_type_id']]);
								endif; 
							 ?>
							 <tr class="text-capitalize "> <td> <i> <?php if($v['order_type']=="donate_blood") { echo "Blood Donation "; }  elseif($v['order_type']=="buy_blood") { echo "Blood Purchase ( ".$bill_type[0]['name'].")"; }  else { echo ($custom_ticket_id['alt_test_name']=="")?$bill_type[0]['name']:$custom_ticket_id['alt_test_name']; ?>  <span class="pull-right"> <?php echo "&#8358; ".number_format($bill_type[0]['price']); }  ?></span> </i></td></tr>
							 
							 <?php  } ## ends foreach ?>
						  <tr> <td> &nbsp; </td></tr>
						  <tr> <td>  <?php $_SESSION['qr_data'] = "$ticket_no ".$custom_ticket_id['fullname']." Cost N".$expected_pay."  Bal N ".$balance; # require "php_qr_gen.php"; ?> 
							<img src="<?php echo $paym_status_img; ?>" style="width:auto; height:30px;" />
							
						  </td></tr>
						 
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