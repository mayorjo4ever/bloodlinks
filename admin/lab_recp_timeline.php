 
	
	 
				   <div class="mt-2">
				   
				   <?php $dates = $dbm->getFields($dbm->select_distinct('date_c','patient_receipts',array('pay_type'=>'laboratory'),array('date_c'),'AND','DESC'),array('date_c')); 
						
					?>
				   
                      <div class="vertical-timeline">
                       <?php $n = 0;  if(!is_null($dates)) foreach($dates['date_c'] as $days) {
							$recp = $dbm->getFields($dbm->select_distinct('receipt_no','patient_receipts',array('pay_type'=>'laboratory','date_c'=>$days),array('receipt_no'),'AND','DESC'),array('receipt_no')); 
						   ?>
					    
					   <div class="timeline-wrapper <?php echo (($n%2)==1)?"timeline-inverted  timeline-wrapper-primary":" timeline-wrapper-success" ?> ">
                          <div class="timeline-badge"></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h6 class="timeline-title text-capitalize bold"> on <?php echo $func->format_date($days); ?> </h6>
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
						
						<!--
                        <div class="timeline-wrapper  timeline-inverted timeline-wrapper-success">
                          <div class="timeline-badge"></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h6 class="timeline-title">Bootstrap 4 Beta 1</h6>
                            </div>
                            <div class="timeline-body">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                            </div>
                            <div class="timeline-footer d-flex align-items-center">
                              <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                              <span>25</span>
                              <span class="ml-auto font-weight-bold">10th Aug 2017</span>
                            </div>
                          </div>
                        </div>
						-->
					</div>
                   </div>
