 
	
	 
				   <div class="mt-2">
				   
				   <?php 
					
					## var_dump(filter_var("Hello Mayowa, this is your alert ",FILTER_SANITIZE_STRING));
					
					# if(isset($_POST['search_pharm_dates'])){
						// $_SESSION['date_from'] = $date_from  = filter_var($_POST['date_from'],FILTER_SANITIZE_STRING);
						 // $_SESSION['date_to'] = $date_to  = filter_var($_POST['date_to'],FILTER_SANITIZE_STRING);
					 
						$_SESSION['date_from'] = $date_from = '2020-01-29';
						$_SESSION['date_to'] = $date_to = '2020-03-29';
						########
						#if($time_from == $time_to ) $query = mysql_query("SELECT * FROM patient_receipts WHERE pay_type='pharmacy' and date_c ='$time_from'  $pquery ") or mysql_error();
					
						if($date_from == $time_to ) $dates = mysql_query("SELECT DISTINCT date_c FROM stock_receipts WHERE pay_type='pharmacy' and date_c ='$date_from' ") or mysql_error();
						else $dates = mysql_query("SELECT DISTINCT date_c FROM stock_receipts WHERE pay_type='pharmacy' and date_c >='$date_from' and date_c <='$date_to' ") or mysql_error();
						##########	
						# $dates = $dbm->getFields($dbm->select_distinct('date_c','patient_receipts',array('pay_type'=>'pharmacy'),array('date_c'),'AND','DESC'),array('date_c')); 
						 
					?>
				   
                      <div class="vertical-timeline">
                       <?php $n = 0;  
					   while($days = mysql_fetch_assoc($dates)){
							 
					   ## if(!is_null($dates)) foreach($dates['date_c'] as $days) {
							$recp = $dbm->getFields($dbm->select_distinct('receipt_no','stock_receipts',array('pay_type'=>'pharmacy','date_c'=>$days['date_c']),array('receipt_no'),'AND','DESC'),array('receipt_no')); 
						   ?>
					    
					   <div class="timeline-wrapper <?php echo (($n%2)==1)?"timeline-inverted  timeline-wrapper-primary":" timeline-wrapper-success" ?> ">
                          <div class="timeline-badge"></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h6 class="timeline-title text-capitalize bold"> on <?php echo $func->format_date($days['date_c']); ?> :  <br/> Release of stock items  </h6>
                            </div>
                            <div class="timeline-body">
                               <ol style="line-height:30px;"> 
							   <?php $tot_paid = $tot_bal = $tot_fees =  0; 
									if(!is_null($recp)) foreach($recp['receipt_no'] as $rcn){
									$info = $dbm->resort($dbm->getFields($dbm->select('stock_receipts',array('receipt_no'=>$rcn)),array('sold_to','sn','total_fee','amount_paid','refund','sold_by'))); 
									 $tot_fees += $info['total_fee'];
									
									?> 
										<li>  <a href="<?php echo "receipt_slip.php?rcn=".base64_encode($rcn);?>" target="_blank">To <?php echo $info['sold_to']." by - ".$info['sold_by']." Recp. No:&nbsp;".$rcn."</small>"; ?> </a>
										<p><strong> <u>Details </u></strong> <br/> <?php $m=0;
											$goods = $dbm->getFields($dbm->select('stock_products_sales',array('receipt_no'=>$rcn)),array('sn','ref_id','qty')); 
											foreach($goods['ref_id'] as $prd_serial){
												$goods_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$prd_serial)),array('sn','name','qty_per_pack'))); 
												echo $goods['qty'][$m]." pack(s) of ".$goods_info['name']."&nbsp;(".$goods_info['qty_per_pack']." pcs per pack)<br/>"; $m++; 
											}
										?>  </p>
										<div class="clear"> <hr/> </div>
										</li>
										
									<?php	} # end foreach  ?> 
								 
                               </ol>
                            </div>
                            <div class="timeline-footer d-flex align-items-center">
                               
                              <span class="h4 bold"> Cost Implicatiion :  </span> 
                              <span  class="h4 bold">  <?php echo "  &nbsp; &nbsp;&#8358; &nbsp; ".$tot_fees; ?> </span>
                              <span class="ml-auto font-16 font-weight-bold"> <?php # echo  ?> </span>
                            </div>
                          </div> <!-- ./ timeline-panel -->
                        </div> <!-- ./ timeline-wrapper -->
						<?php $n++;  } ## end while 
						 
							
						?> 
						
						 
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
					<?php # } # end if search_pharm_dates  ?>
					
                   </div>
