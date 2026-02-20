				 <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-uppercase font-weight-bold h4">Activity log for <?php echo date('l jS F, Y',strtotime($_SESSION['today'])) ?></h4>
                   
					<div class="mt-5">
                      <div class="vertical-timeline">
                       
					   <?php 
						$staff = new User('users'); $tktFields = $mydal->TableFields('customer_tickets');
					    $newTicketsBy = $mydbm->runBaseQuery("SELECT DISTINCT c_by FROM customer_tickets WHERE date_c like '%".$_SESSION['today']."%' AND status='active' ORDER BY date_c ASC ");
							if(!empty($newTicketsBy)) foreach($newTicketsBy as $k=>$v){ 
								$myTickets = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_c like '%".$_SESSION['today']."%' AND  c_by='".$newTicketsBy[$k]['c_by']."' AND status='active' ORDER BY date_c ASC ");
								if(!empty($myTickets)) {
									$myTickets = $dbm->getFields($myTickets,$tktFields);
								} 
						?>
					   
					   <div class="timeline-wrapper <?php echo ($k%2==1)?" timeline-inverted timeline-wrapper-success":"timeline-wrapper-primary"; ?> ">
                          <div class="timeline-badge"></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h6 class="timeline-title font-weight-bold"> NEW TICKETS BY  <?php echo $newTicketsBy[$k]['c_by']; ?></h6>
                            </div>
                            <div class="timeline-body">
                              <p><b><?php echo $staff->fullname($newTicketsBy[$k]['c_by'])?> </b>  Created the following Tickets   </p> <div class="divider"><hr/></div>
								<ol>
									<?php $n = 0; foreach($myTickets['ticket_no'] as $tn) { ?>
										<li><?php echo $tn." &nbsp; ".$myTickets['fullname'][$n]; ?> </li>
									<?php 
									$n++; } ?>
								</ol>
                            </div>
                            <div class="timeline-footer d-flex align-items-center">
                              <i class="mdi mdi-account text-muted mr-1"></i>
                              <span><?php echo count ($myTickets['c_by']); ?></span>
                              <span class="ml-auto font-weight-bold h4"> <?php echo "&#8358; ".number_format(array_sum($myTickets['total_cost'])); ?></span>
                            </div>
                          </div>
                        </div> <!-- end timeline -->
						<?php } ## end foreach ?>
						
						 
                      </div>
                    </div>
					</div>
                </div>
              </div>