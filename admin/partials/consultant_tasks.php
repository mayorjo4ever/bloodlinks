<?php ?> 
<div class="row mt-4">
   <div class="col-md-12 grid-margin">
      <div class="card">
         <div class="card-header header-sm">
            <div class="d-flex align-items-center">
               <h5 class="card-title text-uppercase font-weight-bold h5">Recent Orders : THIS DAY,&nbsp; <?php echo date('l jS F, Y',strtotime($_SESSION['today']));?> </h5>
               <div class="wrapper ml-auto action-bar">
                  <div class="dropdown">
                     <form id="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="date" name="recent_order_date" class="btn btn-outline-secondary btn-sm datepicker" value="<?php echo $_SESSION['today'];?>"  aria-haspopup="true"  aria-expanded="false"/>  
                        <button class="btn btn-secondary btn-md btn-icons" name="change_order_date">Go</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <?php 
            $table = "admin_report_setup"; $user_id = $_SESSION['admUser'];
            
            $operations = []; 
            
            $my_task = $dbm->select($table,['user_id'=>$user_id]);
            if(!empty($my_task)){
                $operations = explode(',', $my_task[0]['bill_categs']);
            }  
            
            ?>
         <div class="card-body">
            <?php 
               # check if your operations ar not empty
               if(!empty($operations)){ 
                   # get my bills to comment upon 
                   $bills = $mydbm->runBaseQuery("select sn,name from bill_types where status='active' and categ_id in (".implode(',',$operations).")");
                   $ids = $dbm->getFields($bills,['sn']);
                   // print "<pre>";
                   //  print implode(',', $ids['sn']);
                   //  print_r($ids);
                   // print "</pre>";
                   ?>
            <table id="order-listing-1" class="table-sm table-bordered w-100 dataTable">
               <thead>
                  <tr class="text-capitalize">
                     <th>#</th>
                     <th>Ticket No.</th>
                     <th>Customer</th>
                     <th>Test(s) Performed </th>
                     <th>Result Computation </th>
                     <th>View Report </th>
                     <th> Comment(s) </th> 
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $staff = new User('users');                            
                     # $tickets = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_c like '%".$_SESSION['today']."%' AND status='active' AND finalized='yes' "); #  $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'status'=>'active','finalized'=>'yes')),$mydal->TableFields('customer_tickets'));
                     $tickets = $mydbm->runBaseQuery("SELECT DISTINCT ticket_no FROM customer_specimen WHERE date_c like '%".$_SESSION['today']."%' AND status='active' AND finalized='yes' AND bill_type_id IN (".implode(',', $ids['sn']).") "); #  
                     // print_r($tickets); 
                     # 
                     
                     if(!empty($tickets)) foreach($tickets as $k=>$v) {
                         $ticket_details = $mydbm->runBaseQuery("SELECT fullname,c_by,process_completed FROM customer_tickets WHERE ticket_no = '".$v['ticket_no']."' AND status='active' AND finalized='yes' "); #  $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'status'=>'active','finalized'=>'yes')),$mydal->TableFields('customer_tickets'));
                         $specimens = $dbm->getFields($dbm->select('customer_specimen',['ticket_no' =>$v['ticket_no'],'status'=>'active']),array('sn','bill_type_id','specimen_sample','comment')); 
                         $reports = $mydbm->runBaseQuery("SELECT count(ticket_no) as total FROM specialist_report WHERE ticket_no = '".$v['ticket_no']."' "); 
                         // $tick_rev = $mydbm->runBaseQuery("SELECT * FROM customer_ticket_reversion WHERE ticket_no='".$tickets[$k]['ticket_no']."'"); 
                         // $paym_rev = $mydbm->runBaseQuery("SELECT * FROM customer_payment_reversion WHERE ticket_no='".$tickets[$k]['ticket_no']."'"); 
                     
                        //  if(!empty($tick_rev)) $tick_rev = $dbm->getFields($tick_rev,array('ticket_no','rev_by','time_rev'));
                        // if(!empty($paym_rev)) $paym_rev = $dbm->getFields($paym_rev,array('ticket_no','rev_by','time_rev'));
                     ?>				 
                  <tr class="<?php #echo ($tickets[$k]['process_completed']=="no")?"text-info":""; ?>">
                     <td><?php echo ($k+1);?> </td>
                     <td><?php echo $v['ticket_no']; ?> </td>
                     <td><?php   echo $ticket_details[0]['fullname']; ?> </td>
                     <td><?php echo implode("</br>", array_map(fn($id)=>getBillName($id),$specimens['bill_type_id'])); ?> </td>
                     <td><span class="<?php echo ($ticket_details[0]['process_completed']=="no")?"icon-hourglass text-warning bold":"icon-check text-success bold"; ?>"></span> &nbsp; <?php  echo ($ticket_details[0]['process_completed']=="no")?"Pending":"Completed";?></td>
                     <td>
                        <?php 
                           $n = 0;  if(!empty($specimens)){ 
                               foreach($specimens['bill_type_id'] as $serial){
                                 ?>
                        <div class="icheck-square">
                           <p><label> <input type="checkbox" name="specimen_results_check[]" value="<?php echo base64_encode($serial); ?>" class="checkbox specimen_results_check" >  <?php echo getBillName($serial); ?> </label> </p>
                        </div>
                        <?php   }  # end foreach 
                           } # end if 							
                           ?> 
                        <button onclick="download_results($(this).attr('for'))" class="btn btn-primary btn-rounded bold "  for="<?php echo base64_encode($v['ticket_no']);?>" > View Report </button>
                     </td>
                     <td> <i class="fa fa-comment text-success"></i>&nbsp;  <?php echo $reports[0]['total'];?> </td>
                  </tr>
                  <?php }  # echo @$today; ?>
               </tbody>
            </table>
            <?php }
               else { ?> 
            <div class="alert alert-info ">
               <div class="h4"><i class="fa  fa-warning font-20"></i> &nbsp;  You have not set your area of specializations,<a href="tick_coment_setup.php" target="_blank"> click here to set it up </a>.</div>
            </div>
            <?php }
               ?>
         </div>
      </div>
   </div>
</div>
