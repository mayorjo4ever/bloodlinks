
	<?php   require "usercheck.php";  include "formsubmit.php"; ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- 
	<link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	<link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">  -->
	
	<style>
		 
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
				   <p style="height:135px;"> </p>
					<?php 
						$ticket_no = base64_decode($_REQUEST['r_val']); $proc_comp = base64_decode($_REQUEST['pc']); // yes
						$print_option = base64_decode($_REQUEST['pop']);  #  single / all 
						## validate 
						$criterial = array('ticket_no'=>$ticket_no,'status'=>'active','process_completed'=>$proc_comp); 
						$fields = array('c_by','sn','ticket_no','fullname','doctor','hospital','age','age_type','sex','total_cost','amount_paid','discount','date_c','time_c','date_fin','time_fin','comment','alt_test_name','clinical_details');
						$custom_info = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
						 if(is_null($custom_info)) { echo "<script> alert('Invalid Parameters'); window.location.href='tickets.php';  </script> "; }
						 else $custom_ticket_id = $dbm->resort($custom_info);
						 /*****************************************/
						 switch($print_option){
								case "single": {
									$bill_serial = base64_decode($_REQUEST['bsr']); 
									$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
									$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','process_completed'=>$proc_comp,'bill_type_id'=>$bill_serial,'status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 									
									$bill_name = $bill_type['name'][0];
								} break; 
								default: { $bill_name ="";
									$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									$count = count($specimens['bill_type_id']); 
									 $n = 0;   foreach($specimens['bill_type_id'] as $serial){ 
										$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
										$bill_name .= $bill_type['name'][0]." ";
										if($n<($count-1)) $bill_name.=", ";
										$n++; 
									} 
									
								} break;
						 }
						 /*****************************************/
						 
					?>
						<table class="table-btop table-nogap  table  cosmo border-none line-35" >
						 <tbody>
							<tr class="text-capitalize no-padding no-margin"> <td > <span class="bold"> Patient's Name : </span> &nbsp;&nbsp; <?php echo $custom_ticket_id['fullname']; ?>  </td> <td> <span class="bold">  Age : </span> &nbsp;&nbsp;<?php echo $custom_ticket_id['age']." ".$custom_ticket_id['age_type'].'(s)'; ?>  </td> <td> <span class="bold">  Sex : </span> &nbsp;&nbsp;<?php echo $custom_ticket_id['sex']; ?></td>  </tr>
							<tr class="text-capitalize no-padding no-margin "> <td colspan="3"> <span class="bold">   Clinical details : </span> &nbsp;&nbsp; &nbsp;&nbsp;<?php   echo $custom_ticket_id['clinical_details']; ?>    </td>  </tr>
							<tr class="text-capitalize no-padding no-margin"> <td colspan="3">  <span class="bold">  Refered by : </span> &nbsp;&nbsp; &nbsp;&nbsp;<?php echo $custom_ticket_id['doctor']; ?>  </td> </tr>
							<tr class="text-capitalize no-padding no-margin"> <td colspan="3">  <span class="bold">  Referrer’s Address : </span>&nbsp;&nbsp; &nbsp;&nbsp;<?php echo $custom_ticket_id['hospital']; ?></td>  </tr>				
							<!-- <tr class="text-capitalize "> <td colspan="3">  <span class="bold"> <?php echo " print option  :  ".base64_decode($_REQUEST['pop'])." , serial  &nbsp;&nbsp;  ".base64_decode($_REQUEST['bsr']); ?></span> &nbsp;&nbsp;</td>  </tr>-->
						 </tbody>
						</table>
							
							<table class="table-btop table-nogap  table  cosmo border-none line-35 " style="border-top:5px #000 thick;" >
								<tbody>
									<tr class="text-capitalize no-padding no-margin" > <td colspan="2" class="bold">   lab no : &nbsp;&nbsp; <?php echo $ticket_no; ?> </td>  <td> <span class="bold">  Specimen Type : </span> &nbsp;&nbsp;<?php echo $specimens['specimen_sample'][0];  ?></td>  </tr>
									<tr class="text-capitalize no-padding no-margin"> <td colspan="3"> <span class="bold">  Collection/Received Date: </span> &nbsp;&nbsp; &nbsp;&nbsp;<?php echo date('d/m/y',strtotime($custom_ticket_id['date_c']));  ?>  </td>  </tr>								
									<tr class="text-capitalize no-padding no-margin"> <td colspan="2">  <span class="bold">  Test(s) Performed:    </span> &nbsp;&nbsp; &nbsp;&nbsp; <?php echo ($custom_ticket_id['alt_test_name']=="")?$bill_name:$custom_ticket_id['alt_test_name']; ?>  </td> </tr>											
									<tr class="text-capitalize no-padding no-margin dark-bottom-border"> <td colspan="3">  <span class="bold">   Performed Date:    </span>&nbsp;&nbsp; &nbsp;&nbsp; <?php echo date('d/m/y',strtotime($custom_ticket_id['date_fin'])); ?></td>  </tr>							
								</tbody>
							</table>				 
						 <?php 
							
							switch($print_option){
								case "single": {
									$bill_serial = base64_decode($_REQUEST['bsr']); 
									$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$bill_serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
									$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','process_completed'=>$proc_comp,'bill_type_id'=>$bill_serial,'status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 									
									### fetch template header reference
									$criterial = array('bill_type_id'=>$bill_serial,'status'=>'active'); 
									$fields = array('c_by','sn','bill_type_id','name','result','unit','has_unit','ref_val','has_ref_val','temp_type');
									$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
									?>
									<table class=" table table-nogap cosmo border-none ">
										<tbody> 
											<tr class="text-uppercase no-padding no-margin  dark-bottom-border"> 
												<td colspan="4" style="padding:15px 15px; ">
													<span class="bold dark-bottom-border dark-top-border">   result  </span>   
												</td>  
											</tr>
											<?php switch($exist['temp_type'][0]){ 
												case "text_form": { 
												$text_result = $dbm->getFields($dbm->select('customer_specimen_result',array('ticket_no'=>$ticket_no,'bill_type_id'=>$bill_serial,'temp_type'=>'text_form','status'=>'active')),array('sn','raw_text_result','template_id'));
												
												?>
											<tr>
												<td colspan="5">
													<?php echo $text_result['raw_text_result'][0]; ?>
												</td>
											</tr>
												
												<?php } break; 
												
												case "param_form": {  ?>
											<tr class="text-capitalize bold dark-bottom-border">  
												<td> &nbsp; </td>
												<td> result </td>
												<?php if($exist['has_unit'][0]=="true") {  ?><td> unit </td> <?php } ?>
												<?php if($exist['has_ref_val'][0]=="true") { ?><td> reference value  </td> <?php } ?>
											 </tr>  
									      <?php  echo display_specimen_result_printout($bill_serial,$ticket_no,$print_option); 
										  
											# check each comment 
 
										  } break; # end param_form 
										}# end switch ?> 
										  
										  	</tbody>
									 </table> 
										  
								<?php	 
								} break; 
								default: {
									$cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active'); 
									$specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
									### fetch template header reference
									$fields = array('c_by','sn','bill_type_id','name','result','unit','has_unit','ref_val','has_ref_val');
									foreach($specimens['bill_type_id'] as $serial){ 
										$criterial = array('bill_type_id'=>$serial,'status'=>'active'); 
										$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$fields);
										$all_units[] = $exist['has_unit'][0];
										$all_ref_val[] = $exist['has_ref_val'][0];
									}										
									$has_unit = in_array("true",$all_units); 
									$has_ref = in_array("true",$all_ref_val); 
								
									?>
									<table class=" table table-nogap cosmo border-none  line-20" >
									<tbody>
										 <tr class="text-uppercase dark-bottom-border"> 
											<td colspan="4" style="padding:15px 15px; ">
												<span class="bold dark-bottom-border dark-top-border">   result  </span>   
											</td>  
										</tr>
										
										<tr class="text-capitalize bold dark-bottom-border">  
											<td>  </td>
											<td> result </td>
											<?php if($has_unit) {  ?><td> unit </td> <?php } ?>
											<?php if($has_ref) { ?><td> reference value  </td> <?php } ?>
										 </tr> 
										
										<?php 
											$n = 0;  
											foreach($specimens['bill_type_id'] as $serial){ 
											$bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
											echo display_specimen_result_printout($serial,$ticket_no,$print_option); 
											
											$n++; 
										} ## ends foreach   display_specimen_result_template($bill_type_id,$ticket_no) ##	?>
									 
									</tbody>
								 </table> 
								<p class="" style="font-size:32px; color:red; ">   <?php echo ($custom_ticket_id['comment']!="")?"<hr/> <b> COMMENT : </b>&nbsp;&nbsp;&nbsp;".$custom_ticket_id['comment']:""; ?>  </p>	
								<?php } # end case default 
								break; 
							} # end switch 
						 
						  	 ?>
							 
							   
							
							
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
          
		  <?php  require "tick_footer.php"; ?>
		   
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