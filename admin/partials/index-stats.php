<?php ?>
<div class="row">
 <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-header header-sm">
                  <div class="d-flex align-items-center">
                    <h5 class="card-title text-uppercase font-weight-bold h5">Recent Orders : THIS DAY,&nbsp; <?php echo date('l jS F, Y',strtotime($_SESSION['today']));?> </h5>
                    <div class="wrapper ml-auto action-bar">
                      <div class="dropdown"><form id="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="date" name="recent_order_date" class="btn btn-outline-secondary btn-sm datepicker" value="<?php echo $_SESSION['today'];?>"  aria-haspopup="true"  aria-expanded="false"/>  
						<button class="btn btn-secondary btn-md btn-icons" name="change_order_date">Go</button>
                      </form></div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table id="order-listing-1" class="table-sm table-bordered w-100 dataTable">
                    <thead>
					<tr class="text-capitalize">
                <th>#</th>
                <th>Ticket No.</th>
                <th>Customer</th>                        
                <th>Total Cost(&#8358;)</th>
                <th>Recorded By </th>
                <th>Completion </th>  
							 <th>Ticket reversed </th>  
							 <th>payment reversed </th>  
              </tr>					  
            </thead>
					<tbody>
					<?php
					$staff = new User('users'); 

					 $tickets = $mydbm->runBaseQuery("SELECT * FROM customer_tickets WHERE date_c like  '%".$_SESSION['today']."%' AND status='active' AND finalized='yes' "); #  $dbm->getFields($dbm->select('customer_tickets',array('ticket_no'=>$ticket_no,'status'=>'active','finalized'=>'yes')),$mydal->TableFields('customer_tickets'));
					if(!empty($tickets)) foreach($tickets as $k=>$v) {
						$tick_rev = $mydbm->runBaseQuery("SELECT * FROM customer_ticket_reversion WHERE ticket_no='".$tickets[$k]['ticket_no']."'"); 
						$paym_rev = $mydbm->runBaseQuery("SELECT * FROM customer_payment_reversion WHERE ticket_no='".$tickets[$k]['ticket_no']."'"); 											

						if(!empty($tick_rev)) $tick_rev = $dbm->getFields($tick_rev,array('ticket_no','rev_by','time_rev'));
						if(!empty($paym_rev)) $paym_rev = $dbm->getFields($paym_rev,array('ticket_no','rev_by','time_rev'));
					?>				 
           <tr class="<?php echo ($v['process_completed']=="no")?"text-info":""; ?>">
						<td><?php echo ($k+1);?> </td>
						<td><?php echo $v['ticket_no']; echo "<br/>"; display_my_orders($v['ticket_no']); ?> </td>
						<td><?php echo $v['fullname']; ?> </td>
						<td><?php echo number_format($v['total_cost']); ?> </td>
						<td class=""><?php echo $tickets[$k]['c_by']; ?> </td>
						<td><span class="<?php echo ($tickets[$k]['process_completed']=="no")?"icon-hourglass text-warning bold":"icon-check text-success bold"; ?>"></span> &nbsp; <?php echo ($tickets[$k]['process_completed']=="no")?"Pending":"Completed";?></td>
						<td> <?php echo empty($tick_rev)?"No":"Reversed";  echo empty($tick_rev)?"":" By <b>".implode(" and ",$tick_rev['rev_by'])." </b>";?> </td>
						<td> <?php echo empty($paym_rev)?"No":"Reversed";  echo empty($paym_rev)?"":" By <b>".implode(" and ",$paym_rev['rev_by'])."</b>";?> </td>
						 
					  </tr>
					  <?php }  # echo @$today; ?>
					</tbody>
                  </table>
                </div>
              </div>
            </div>
</div>
 