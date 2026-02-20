 
	 
				   <div class="mt-2">
				   
				   <?php 
					if(isset($_POST['search_pharm_dates'])){
						 $_SESSION['date_from'] = mysql_real_escape_string($_POST['date_from']);
						 $_SESSION['date_to'] = mysql_real_escape_string($_POST['date_to']);
						
						$time_from = strtotime($_SESSION['date_from']); 
						$time_to = strtotime($_SESSION['date_to'])+86400; 
					########
						
						
						if($time_from == $time_to ) $dates = mysql_query("SELECT DISTINCT date_c FROM patient_receipts WHERE pay_type='pharmacy' and date_c ='$time_from' order by date_c desc") or mysql_error();
						else $dates = mysql_query("SELECT DISTINCT date_c FROM patient_receipts WHERE pay_type='general' and time_c >='$time_from' and time_c <='$time_to' order by date_c desc ") or mysql_error();
						##########	
						  
						# $dates = $dbm->getFields($dbm->select_distinct('date_c','patient_receipts',array('pay_type'=>'general'),array('date_c'),'AND','DESC'),array('date_c')); 
						
					?>
				   
                      <div class="vertical-timeline">
                       <?php $n = 0;   while($days = mysql_fetch_assoc($dates)){
						
							$recp = $dbm->getFields($dbm->select_distinct('receipt_no','patient_receipts',array('pay_type'=>'general','date_c'=>$days['date_c']),array('receipt_no'),'AND','DESC'),array('receipt_no')); 
						   ?>
					    
					   <div class="timeline-wrapper <?php echo (($n%2)==1)?"timeline-inverted  timeline-wrapper-primary":" timeline-wrapper-success" ?> ">
                          <div class="timeline-badge"></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h6 class="timeline-title text-capitalize bold"> on <?php echo $func->format_date($days['date_c']); ?> </h6>
                            </div>
                            <div class="timeline-body">
                               <ol style="line-height:30px;"> 
							   <?php $tot_paid = $tot_bal = $tot_fees =  0; 
									if(!is_null($recp)) foreach($recp['receipt_no'] as $rcn){
									$info = $dbm->resort($dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$rcn)),array('name','sn','total_fee','amount_paid','refund'))); 
									#  $paid = "&#8358; ".($info['amount_paid']-$info['refund'])." / &#8358;  ".$info['total_fee'];
									
									$tot_paid += ($info['amount_paid']-$info['refund']); 
									$tot_fees += $info['total_fee'];
									$balance += $info['total_fee'];
									
									?> 
										<li>  <a href="<?php echo "receipt_slip.php?rcn=".base64_encode($rcn);?>" target="_blank"> <?php echo $info['name']."<small> &nbsp;&nbsp; - &nbsp;&nbsp;".$rcn."</small>"; ?> </a> </li>
									<?php	}  ?> 
								 
                               </ol>
                            </div>
                            <div class="timeline-footer d-flex align-items-center">
                               
                              <span class="h4 bold"> Payment :  </span> 
                              <span  class="h4 bold">  <?php echo "  &nbsp; &nbsp;&#8358; &nbsp; ".$tot_paid." / &#8358; &nbsp; ".$tot_fees; ?> </span>
                              <span class="ml-auto font-16 font-weight-bold"> <?php # echo  ?> </span>
                            </div>
                          </div> <!-- ./ timeline-panel -->
                        </div> <!-- ./ timeline-wrapper -->
						<?php $n++;  } ## end foreach  ?> 
						 
					</div>
					
					<?php } # end if search_pharm_dates ?>
					
                   </div>
