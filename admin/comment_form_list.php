<?php ?>

		<!-- <h5 class="card-title mb-4"> Ticket No. <?php echo $ticket_no;?> </h5> -->
		  <div class="fluid-container">
		  <?php $comments = $dbm->getFields($dbm->select('tickets_converse',array('ticket_no'=>$ticket_no),array('time_c'),'and','desc'),
				array('sn','converse_type','msg','from_user_id','date_c','month_c','year_c','week_c','time_c',''));
				echo $tot_com = count($comments['sn']).' comments found ';
				$n=0;
				if(!is_null($comments))foreach($comments['converse_type'] as $com_type) {
				?>
			
			<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
			  <div class="col-md-1">
				<img class="img-sm rounded-circle mb-4 mb-md-0" src="../images/faces/face1.jpg" alt="profile image">
			  </div>
			  <div class="ticket-details col-md-8">
				<div class="d-flex">
				  <p class="text-dark font-weig ht-semibold mr-2 mb-0 no-wrap"> <?php echo  $comments['from_user_id'][$n];?> :</p>
				  <p class="text-primary mr-1 mb-0">[# <?php echo ($tot_com - $n); ?> ]</p>
				  <p class="mb-0 ellipsis bold"> <?php echo $comments['converse_type'][$n]; ?> .</p>
				</div>
				<p class="text-gray ellipsis mb-2">  <?php echo stripslashes($comments['msg'][$n]); ?>
				</p>
				<div class="row text-gray d-md-flex d-none">
				  <div class="col-6 d-flex">
					<small class="mb-0 mr-2 text-info"> Since :</small>
					<small class="Last-responded mr-2 mb-0 text-info">  <?php echo readTime(time()-$comments['time_c'][$n]).' ago';?></small>
				  </div>
				 <!--  <div class="col-6 d-flex">
					<small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
					<small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
				  </div>  -->
				</div>
			  </div>
			  <div class="ticket-actions col-md-2">
				<div class="btn-group dropdown">
				  <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Manage
				  </button>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="#">
					  <i class="fa fa-reply fa-fw"></i>Quick reply</a>
					<a class="dropdown-item" href="#">
					  <i class="fa fa-history fa-fw"></i>Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">
					  <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
					<a class="dropdown-item" href="#">
					  <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
				  </div>
				</div>
			  </div>
			</div> <!-- ./ row -->
			<?php $n++;  } // end foreach  ?>
			