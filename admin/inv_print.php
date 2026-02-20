<?php   require "usercheck.php";  include "formsubmit.php"; ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- 
	<link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	<link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">  -->
	
	<style>
		@page{
			/* margin:2mm;  */
		}
		.header, .header-space { height:150px; }
		.header { position:fixed; top:0;}
		.inv-footer { position:fixed; bottom:0;}
		.inv-footer, .footer-space { height:50px; }
		
		.cosmo { font-family:Comic Sans MS; font-size:14px; }
		.border-none{ border:none; }
		
		.table tr, table thead td, table td, table thead th, table th {
					  border:1px solid #fff; margin:5px; padding:5px; 
					   line-height:5px; 
				}	
		 
		.table>tbody>tr>td,
		.table>tbody>tr>th,
		.table>tfoot>tr>td,
		.table>tfoot>tr>th,
		.table>thead>tr>td,
		.table>thead>tr>th{
			padding:8px;line-height:1.42857143;vertical-align:top;border-top:0px solid #fff;
			}
			
		.table-btop>tbody>tr:first-child>td,
		.table-btop>tbody>tr:first-child>th,
		.table-btop>tfoot>tr:first-child>td,
		.table-btop>tfoot>tr:first-child>th,
		.table-btop>thead>tr:first-child>td,
		.table-btop>thead>tr:first-child>th{
			padding:8px;line-height:1.42857143;vertical-align:top;border-top:2px solid #000;
			}
			 
		 .dark-top-border td, { border-top:2px solid #000; }
		 .dark-bottom-border td{ border-bottom:2px solid #000; }
		 
		 span.dark-top-border { border-top:1px solid #000; width:100%; display:block; }
		 span.dark-bottom-border { border-bottom:1px solid #000; width:100%; display:block; }
		 
		
		.bordered-dark-px{ border-top:2px solid #000;}
		
		@media print{
			.table-striped tbody tr:nth-of-type(even) {
			 background-color: #f2f2f2; }
		}
		.table-striped tbody tr:nth-of-type(even) {
			 background-color: #f2f2f2; }
			 
		.content-wrapper {
		  background:#fff;  /** #f3f4fa; **/
		  padding: none; /** 1.5rem 1.7rem; **/
		  width: 100%;
		  -webkit-box-flex: 1;
		  -ms-flex-positive: 1;
		  flex-grow: 1; 
		  }
		 
		 
		 /* Footer */
		.footer {
		  background: #FFF; /** #f3f4fa; **/ 
		  padding: 4px 1rem;
		  transition: all 0.25s ease;
		  -moz-transition: all 0.25s ease;
		  -webkit-transition: all 0.25s ease;
		  -ms-transition: all 0.25s ease;
		  border-top: 0px solid #FFF; /** 1px solid #f2f2f2; **/
		  font-size: calc(0.875rem - 0.05rem); 
		  font-family: "Poppins", sans-serif; 
		  }
		  
	  .container {
		  width: 100%;
		  padding-right: none; /** 12.5px;  **/
		  padding-left:  none; /** 12.5px;  **/
		  margin-right: auto;
		  margin-left: auto; }
		  
	.container-fluid {
		  width: 100%;
		  padding-right: none; /** 12.5px;  **/
		  padding-left: none; /** 12.5px;  **/
		  margin-right: auto;
		  margin-left: auto; }
	.table tr.no-padding td {padding-top:0px; padding-bottom:0px; }
	.table tr.no-margin td {margin-top:0px; margin-bottom:0px; }
	.no-side-margin {margin-left:0px; margin-right:0px;  padding-left:0px; padding-right:0px;}
	@mdedia print{
		.no-side-margin { margin-left:0px; margin-right:0px; padding-left:0px; padding-right:0px; }
	}
	</style>
</head>

<body>
    <div class="container-scroller no-side-margin">  
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php // require "partials/_horizontal-navbar.php"; ?>
    <!-- partial -->
     <!--  <div class="container-fluid page-body-wrapper">  -->
       <div class="main-panel container ">   
           <div class="content-wrapper ">  
          <div class="row no-side-margin">
				  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                <div class="card d-flex">
                  <div class="card-body" style="height:auto">
				   <table>
					<thead><tr><td>
						<div class="header-space">&nbsp;  </div>
					</thead>
					<tbody><tr><td>
						<div class="content">
				      	 		
						<?php 
							$invoice_no = filter_var(base64_decode($_REQUEST['a']),FILTER_SANITIZE_SPECIAL_CHARS);
							$paym_comp = filter_var(base64_decode($_REQUEST['b']),FILTER_SANITIZE_SPECIAL_CHARS);
						// echo "<span class='h3'>".$invoice_no."<br/>";
						// echo $paym_comp."</span>";
						$invoices = $dbm->getFields($dbm->select('hospital_invoice_report',array('invoice_no'=>$invoice_no,'status'=>'active')),$mydal->TableFields('hospital_invoice_report'));
						if(is_null($invoices)) { echo "<script> alert('Invalid Parameters'); window.location.href='ticket_invoice.php';  </script> ";}
						else{
							$hosp_id = $invoices['hosp_id'][0]; $m = 0; 
							$hosp_info = $dbm->getFields($dbm->select('hospitals',array('sn'=>$hosp_id,'status'=>'active')), array('sn','name','address','contact_no')); // 
							$acct_info =  $dbm->getFields($dbm->select('accounts',array('sn'=>$invoices['acct_id'][$m],'status'=>'active')),array('bank_id','account_no','account_name','staff_id'));
							$bank_info = $dbm->getFields($dbm->select('banks',array('sn'=>$acct_info['bank_id'][0])),array('name','sn','alias','icon','address'));
							$tickets = $dbm->getFields($dbm->select('hospital_invoice',array('status'=>'active','invoice_no'=>$invoices['invoice_no'][$m])),$mydal->TableFields('hospital_invoice'));
						?>	
						
						 <span class="h4"> Invoice # <?php echo $invoice_no; ?> </span> <br/> <br/> 
						 <span class="h4"> To :  <?php echo @$hosp_info['name'][0]." ( ".@$hosp_info['address'][0]." )"; ?> </span> <br/> <br/> 
						
						 <?php if(!is_null($tickets)){
								# $fields = array('c_by','sn','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','paym_fin_by','paym_date_fin','paym_time_fin','date_fin','time_fin','comment','alt_test_name','payment_completed');
								$fields = $mydal->TableFields('customer_tickets'); # array('c_by','sn','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','paym_fin_by','paym_date_fin','paym_time_fin','date_fin','time_fin','comment','alt_test_name','payment_completed');
							 ?>
							 <table class="table table-striped table-bordered "> 
								<thead> 
									<tr class=" bold"> 										
										<td> SN </td> 
										<td> Name  </td> 
										<td> Test Performed </td> 
										<td> Date </td> 
										<td> Total Cost </td> 
										
									</tr> 
								</thead> <tbody> 
							<?php $p = 0;  $t_cost = 0;  $t_discount = 0; foreach($tickets['ticket_no'] as $ticket_no ){ $bill_name ="";
									$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','status'=>'active'); 
									$ticket_info = $dbm->getFields($dbm->select('customer_tickets',$cond),$fields); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= @$bill_type['name'][0]."";
										if($n<($count-1)) $bill_name.="<br/> ";
										$n++; 
									}
									$dated =  date('d/m/y',strtotime($ticket_info['date_c'][0])); # $func->format_date($tickets['date_c'][$p]);
									$t_cost +=  $ticket_info['total_cost'][0];
									$t_discount +=  $ticket_info['discount'][0];
									$init_pay = $invoices['amount_paid'][0]; 
                                                                        $balance = $invoices['balance'][0]; 
									?>
								<tr class=""> 
									<td> <?php echo "&nbsp; ".($p+1); ?>  </td> 									
									<td> <?php echo $ticket_info['fullname'][0]; ?>  <br/> <strong><?php echo $ticket_no; ?></strong></td> 
									<td> <?php echo $bill_name;## ($tickets['alt_test_name'][$p]=="")?$bill_name:$tickets['alt_test_name'][$p]; ?></td> 
									<td> <?php echo  $dated; ?> </td> 									
									<td> <?php echo  "&#8358; ".number_format($ticket_info['total_cost'][0] - $ticket_info['discount'][0]); ?> </td> 									
								</tr> 
							
							<?php $p++;  } ## end foreach   ?>
								
                                                                <tr class="bold">
									<td colspan="3" align="left"> <span class="h4 text-capitalize">  <?php  $func->num_to_word($t_cost - $t_discount)." naira only "; ?>  </span></td>
                                                                        <td align="left"> <span class="h4">TOTAL BILL</span> <?php if($t_discount>0) { echo "<br/><small>Discounted: </small>";}?> </td>
                                                                        <td ><span class="h4"> <?php echo "&#8358; ".number_format($t_cost - $t_discount); ?></span>  <?php if($t_discount>0) { echo "</br/><small> &#8358;".number_format($t_discount)."</small>";}?></td>
								</tr>
                                                                
                                                                <?php if($init_pay > 0) { ?>
                                                                <tr class="bold">
									<td colspan="3" align="left"> <span class="h4 text-capitalize">   </span></td>
									<td align="left"> <span class="h5">PREVIOUS PAYMENT </span>  </td>
									<td ><span class="h4"> <?php echo "&#8358; ".number_format($init_pay); ?></span> </td>
								</tr>
                                                                <tr class="bold">
									<td colspan="3" align="left">  </td>
									<td align="left"> <span class="h5">BALANCE </span>  </td>
									<td ><span class="h4"> <?php echo "&#8358; ".number_format($balance); ?></span> </td>
								</tr>
                                                                <tr><td class="table-dark h5 text-center  text-uppercase" colspan="5"> <?php echo $func->num_to_word($balance)." naira only "; ?></td></tr>
                                                                <?php } 
                                                                else { ?>
                                                                    <tr><td class="table-dark  h5 text-center text-uppercase" colspan="5"> <?php echo $func->num_to_word($t_cost - $t_discount)." naira only "; ?></td></tr>
                                                                    <?php }
                                                                ?>
                                                                
							</tbody>
							</table>
						 <?php } # end not null (tickets)

						else{ ?>
							<br/> <br/> <span class="h3 text-warning"> <i class="fa fa-warning"></i> &nbsp;&nbsp; NO CUSTOMER TICKET FOUND   </span> <br/> <br/>  
						<?php }?>
							
						<p>&nbsp; </p>
						<p class="text-uppercase font-16">Account name : &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $acct_info['account_name'][0]; ?></p>
						<p class="text-uppercase font-16">Account Number :&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $acct_info['account_no'][0]; ?></p>
						<p class="text-uppercase font-16" >Bank : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bank_info['name'][0]; ?> </p>
						<?php } # end not null (invoices)
						?>		 
					 </div> <!-- content -->
					</tbody>
					
					<tfoot>
						<tr><td>
						<div class="footer-space"> &nbsp; </div>						
						</td></tr>
					</tfoot>
					
					</table> 
					<div class="header"> </div>	
					<div class="inv-footer"> </div>		
                  </div>   <!-- card-body -->
				  <!-- 
				  <div class="card-footer bg-white"> <!-- style="top:490px; display:block; position:relative;" -->
				  <!-- 
				  </div>  card-footer -->
                </div>
              </div>
          </div>
		   
		     
         </div>   
        <!-- content-wrapper ends -->
          
		  <?php  require "invoice_footer.php"; ?>
		   
        <!-- partial -->
      </div>   
      <!-- main-panel ends -->
     <!-- </div>   -->
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
	<?php # require "bill_modal.php"; ?>
	<?php require "admin_js_links.php"; ?>
	 
	     
	 
</body> <!---->
		 
</html>