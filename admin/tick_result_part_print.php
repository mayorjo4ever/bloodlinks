<?php   require "usercheck.php";  include "formsubmit.php";  @session_start(); 
require "../vendor/autoload.php"; use Carbon\Carbon; 
?> 
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
         .bg-header img{
         width:100%; height:100%; no-repeat; 
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
          .bg-transparent{
            background-color: transparent;
            border:none;
         }

         body{
               background-image: url('../assets/images/auth/bg-printer.jpg');
               background-size: cover;
               background-position: center;
               background-repeat: no-repeat;
               height: 100vh;

         }
      </style>
   </head>
   <body  style=">
      <div class="container-scroller no-side-margin">
         <!-- partial:partials/_horizontal-navbar.html -->
         <?php // require "partials/_horizontal-navbar.php"; ?>
         <!-- partial -->
         <!--  <div class="container-fluid page-body-wrapper">  -->
         <div class="main-panel container ">
            <div class="content-wrapper bg-transparent"> 
               <div class="row no-side-margin">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                     <div class="card d-flex bg-transparent" >
                        <div class="card-body bg-transparent" style="height:auto;"> 

                           <div class="row">
                              <div class="col-sm-4 text-center"> <img src="../assets/images/login_2.jpg" class="no-print" style="height:160px"></div>
                              <div class="col-sm-8"><?php $branch = $mydbm->runBaseQuery("select branch_address from system_info"); echo $branch[0]['branch_address']; ?></div>
                            </div> 

                           <?php $bg_image = $dbm->resort($dbm->getFields($dbm->select('system_info',array('')),array('signatory_image','manager'))); ?>
                           <!-- <p style="height:135px;" class="bg-header">&nbsp;</p> -->
                           <?php 
                             $ticket_no = $dbm->clean(base64_decode($_REQUEST['r_val'])); $spec_code = explode(',',$_REQUEST['spc']); // specimen code : yes
                             #  print base64_decode($_REQUEST['spc']); exit; 
                              ## validate 
                             # print "<pre>";
                              $criterial = array('ticket_no'=>$ticket_no,'status'=>'active');
                              $custom_info =  $dbm->select('customer_tickets',$criterial);
                               if(empty($custom_info)) { echo "<script> alert('Invalid Parameters'); window.location.href='tickets.php';  </script> ";
                               }
                              # else $custom_ticket_id = $dbm->resort($custom_info);
                              # print_r($custom_ticket_id); 

                               $my_ticket_invoice = $dbm->select('hospital_invoice',array('ticket_no'=>$ticket_no,'status'=>'active'));
                               /*****************************************/
                              	if($custom_info[0]['payment_finalized']=="no" && empty($my_ticket_invoice)){
                              		$_SESSION['ticket_no'] = $ticket_no;
                              		echo "<script> alert('".$ticket_no." Payment has not been finalized ')
                              		window.location.href='ticket_paym.php';
                              		</script>";
                              	}	
                              	# echo "<script> alert(' payment has not been finalized ') </script>";
                                    $customer_id =  $custom_info[0]['customer_id'];
                                    $bill_name ="";
                                    if(!empty($spec_code))foreach($spec_code as $bill_code){ 
                                            $strings[]= "'".base64_decode($bill_code)."'";
                                    } 
                                   
                                    $whereSql = "SELECT * FROM customer_specimen WHERE ticket_no ='".$ticket_no."' AND bill_type_id in ( ".implode(" , ", $strings)." ) AND status='active'"; 
                                    
                                    $specimens = $mydbm->runBaseQuery($whereSql);  
                                    # print_r($specimens); exit ; 
                                    # $cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active'); 
                                    # $specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
                                    $count = empty($specimens)?0:count($specimens); 
                                     $n = 0;   foreach($specimens as $sk=>$sv){ 
                                            $bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$sv['bill_type_id'],'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
                                            $bill_name .= $bill_type['name'][0]." ";
                                            if($n<($count-1)) $bill_name.=", ";
                                            $n++; 									 
                                      } # end foreach 

                                      $print_option = ($count>1)?"all":"single";
                                    # print_r($whereSql); 
                                    $today = date('Y-m-d');
                                    # echo filter_var($today,FILTER_SANITIZE_STRING); 
                                    ## how to detect date for printing unfinalized result
                                    switch ($print_option){

                                            case "all": { 
                                            // $dates = $specimens[0]['date_perform'];
                                           // $dates = array_unique($dates); # ['date_perform'];

                                            // $dates2 = array_map(function($date){ return date('d/m/y',strtotime($date)); },$dates);
                                            $date_perform = $specimens[0]['date_perform'];  # implode(" and ",$dates2);
                                            } break; 

                                            case "single": { 
                                                    $dd = $specimens[0]['date_perform'];
                                                    $date_perform = date('d/m/y',strtotime($dd));
                                            } break;  
                                            /**
                              				default:{
                              						 
                              						$dates = array_unique($specimens['date_perform']); # ['date_perform'];
                              						
                              						$dates2 = array_map(function($date){ return date('d/m/y',strtotime($date)); },$dates);
                              						
                              						// $date_perform = implode(" and ",$dates2);										
                              					
                              						$date_perform = date('d/m/y',strtotime($custom_info[0]['date_fin']));
                              				}
                              				break;**/
                              			}
                              			//print_r($date_perform); exit;
                              			
                              			
                              		# } break;
                              # } 
                               /*****************************************/
                              
                               
                              ?>
               <div style="border:2px solid #aaa; border-radius: 20px; padding: 10px 10px 20px 10px; margin-bottom: 20px;">
                  <table class=" table-nogap table text-primary border-none line-35" > <!-- cosmo -->
                    <tbody>
                       <tr class="text-capitalize no-padding no-margin">
                          <td class="font-18" > Patient's Name :&nbsp;&nbsp;<span class="font-20 text-dark">  <?php echo $custom_info[0]['fullname']; ?>   </span> </td>
                          <td colspan=""> Investigation Name :<span class="font-20 text-dark">  &nbsp;&nbsp; &nbsp;&nbsp;CROSSMATCH (FULL)  </span>  </td> 
                       </tr>
                       <tr class="text-capitalize no-padding no-margin ">
                         <td> Gender : &nbsp;&nbsp; <span class=" font-20 text-dark">  <?php echo $custom_info[0]['sex']; ?></span>  </td>
                          <td colspan="">Registered Date / Time  :<span class="font-20 text-dark">&nbsp;&nbsp; &nbsp;&nbsp;<?php echo Carbon::parse($custom_info[0]['date_c'])->toDayDateTimeString();?> </span></td>
                       </tr>

                       <tr class="text-capitalize no-padding no-margin ">
                        <td>  Age :&nbsp;&nbsp;<span class="font-20 text-dark"> <?php echo getAge($custom_info[0]['age_text'],$custom_info[0]['date_c']); ?>  </span>  </td>
                          <td colspan="">Report Date : <span class="font-20 text-dark"> &nbsp;&nbsp; &nbsp;&nbsp;<?php echo Carbon::parse($custom_info[0]['date_fin'])->toDayDateTimeString(); ?>  </span> </td>
                       </tr>
                       <tr class="text-capitalize no-padding no-margin">
                         
                       </tr>
                       <!-- <tr class="text-capitalize "> <td colspan="3">  <span class="bold"> <?php echo " print option  :  ".base64_decode($_REQUEST['pop'])." , serial  &nbsp;&nbsp;  ".base64_decode($_REQUEST['bsr']); ?></span> &nbsp;&nbsp;</td>  </tr>-->
                    </tbody>
                 </table>
                </div>
                           <table class="table-btop table-nogap  table  border-none line-35 " style="border-top:5px #000 thick;" ><!-- cosmo -->
                              <tbody>
                                 <tr class="text-capitalize no-padding no-margin" >
                                    <td colspan="2" class="bold">   lab no : &nbsp;&nbsp; <?php echo $ticket_no; ?> </td>
                                    <td> <span class="bold">  Specimen Type : </span> &nbsp;&nbsp;<?php echo $specimens[0]['specimen_sample'];  ?></td>
                                 </tr>
                                 <tr class="text-capitalize no-padding no-margin">
                                    <td colspan="2"> <span class="bold">  Date Collected: </span> &nbsp;&nbsp; &nbsp;&nbsp;<?php echo date('d/m/y',strtotime($custom_info[0]['date_c']));  ?>  </td>
                                    <td colspan=""> <span class="bold">  Date Received: </span> &nbsp;&nbsp; &nbsp;&nbsp;<?php echo date('d/m/y',strtotime($custom_info[0]['date_c']));  ?>  </td>
                                 </tr>
                                 <tr class="text-capitalize no-padding no-margin">
                                    <td colspan="2" style="white-space:-o-pre-wrap; white-space:break-word; white-space:pre-wrap; white-space:pre-wrap;"><span class="bold">Test(s) Performed:</span>  <?php echo ($custom_info[0]['alt_test_name']=="")?$bill_name:$custom_info[0]['alt_test_name']; ?>  </td>
                                 </tr>
                                 <tr class="text-capitalize no-padding no-margin dark-bottom-border">
                                    <td colspan="3">  <span class="bold"> Date Performed:    </span>&nbsp;&nbsp; &nbsp;&nbsp; <?php echo $date_perform;  ?></td>
                                 </tr>
                                 <!-- <tr class="text-capitalize no-padding no-margin dark-bottom-border"> <td colspan="3">  <span class="bold"> Date Performed:    </span>&nbsp;&nbsp; &nbsp;&nbsp; <?php echo date('d/m/y',($custom_info[0]['date_fin']=="")? strtotime(date('Y-m-d')): strtotime($custom_info[0]['date_fin'])); ?></td>  </tr>-->
                              </tbody>
                           </table>
                           <?php 
                              /*******************************/
                              if(!empty($spec_code))foreach($spec_code as $bill_code){ 
                              	$strings[]= "bill_type_id='".base64_decode($bill_code)."'";
                              } 
                              $whereSql = "SELECT * FROM customer_specimen WHERE ticket_no ='".$ticket_no."' AND ( ".implode(" OR ", $strings)." ) AND status='active'"; 
                              $specimens = $dbm->getFields($mydbm->runBaseQuery($whereSql),$mydal->TableFields('customer_specimen'));  
                              
                              /*******************************/
                              # $cond = array('ticket_no'=>$ticket_no,'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active'); 
                              # $specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample','comment')); 
                              ### fetch template header reference
                              $temp_fields = $mydal->TableFields('specimen_result_template'); #  array('c_by','sn','bill_type_id','name','result','unit','has_unit','ref_val','has_ref_val');
                              foreach($specimens['bill_type_id'] as $serial){ 
                              	$criterial = array('bill_type_id'=>$serial,'status'=>'active'); 										
                              	$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$temp_fields);
                              	$all_units[] = $exist['has_unit'][0];
                              	$all_ref_val[] = $exist['has_ref_val'][0];
                              	$all_temp_type[] = $exist['temp_type'][0];
                              }										
                              $has_unit = in_array("true",$all_units); 
                              $has_ref = in_array("true",$all_ref_val); 
                              $has_param = in_array("param_form",$all_temp_type); 
                              ?>
                           <table class=" table table-nogap border-none  line-20" ><!-- cosmo -->
                              <tbody>
                                 <tr class="text-uppercase dark-bottom-border">
                                    <td colspan="4" style="padding:15px 15px; ">
                                       <span class="bold dark-bottom-border dark-top-border">   result  </span>   
                                    </td>
                                 </tr>
                                 <?php if($has_param){ ?>
                                 <tr class="text-capitalize bold dark-bottom-border">
                                    <td>  </td>
                                    <td> result </td>
                                    <?php if($has_unit) {  ?>
                                    <td> unit </td>
                                    <?php } ?>
                                    <?php if($has_ref) { ?>
                                    <td> reference value  </td>
                                    <?php } ?>
                                 </tr>
                                 <?php }
                                    $n = 0;  
                                    foreach($specimens['bill_type_id'] as $serial){ 
                                    	$criterial = array('bill_type_id'=>$serial,'status'=>'active'); 										
                                    	$exist = $dbm->getFields($dbm->select('specimen_result_template',$criterial),$temp_fields);
                                    	/***************/
                                    	switch($exist['temp_type'][0]){ 
                                    		case "text_form": { 
                                    		$text_result = $dbm->getFields($dbm->select('customer_specimen_result',array('ticket_no'=>$ticket_no,'bill_type_id'=>$serial,'temp_type'=>'text_form','status'=>'active')),array('sn','raw_text_result','template_id'));
                                    		if($print_option!="single"){ $bill_info = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),$mydal->TableFields('bill_types'));
                                    				echo "<tr><td colspan='5' class=''> <small> <b> <u>".$bill_info['name'][0]."</u> </b></small></td></tr>"; 
                                    			}
                                    		?>
                                 <tr>
                                    <!-- <td colspan="5" style="font-size:18px; white-space:-o-pre-wrap; white-space:break-word; white-space:pre-wrap; white-space:pre-wrap; "> -->
                                    <td colspan="5">
                                       <?php echo $text_result['raw_text_result'][0]; ?>
                                    </td>
                                 </tr>
                                 <?php } break; 
                                    /***************/
                                     case "param_form": {
                                    /***************/
                                    # $bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),$mydal->TableFields('bill_types'));
                                    echo display_specimen_result_printout($serial,$ticket_no,$print_option); 
                                     } break; 
                                    } # end switch  
                                    $n++; 
                                    } ## ends foreach   display_specimen_result_template($bill_type_id,$ticket_no) ##	?>
                              </tbody>
                           </table>
                           <p class="cosmo" style="font-size:32px; color:red; ">   <?php echo ($custom_info[0]['comment']!="")?"<hr/> <b> COMMENT : </b>&nbsp;&nbsp;&nbsp;".$custom_info[0]['comment']:""; ?>  </p>
                           <hr/>
                           
                             <?php $edit = false;
                            @require "specialist_comments.php";
                           ?>
                        </div>
                        <!-- card-body -->
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
   </body>
   <!---->
</html>
