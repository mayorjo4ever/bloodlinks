	
		 <div class="col-md-12 ">
				<h4>  <strong class="text-info text-capitalize"> all pages <i class="fa fa-subway"> </i> &nbsp;   </strong>  </h4>  
				<?php  
				$unique_pages = $dbm->getFields($dbm->select_distinct('groupid','pages',array('status'=>'active'),array('groupid'),'and','asc'),array('groupid'));
				$admin = new User("users");	
				if(!is_null($unique_pages)){
					foreach($unique_pages['groupid'] as $up){
						$groupinfo = $admin->page_group_info($up); 
						$pages = $dbm->getFields($dbm->select('pages',array('status'=>'active','groupid'=>$up),array('title'),'and','asc'),array('sn','title','url','icon','groupid'));				
					?> 
						<div class=""> 
							<label class="badge badge-primary"> <?php echo $up; ?></label>  
							<label class="bold"> &nbsp; <?php echo $groupinfo['groupname'];?> </label>
								<?php if(!is_null($pages)) { $n = 0;  ?>
								<ul class="list-arrow"> 
									<?php foreach($pages['title'] as $pg){ ?>
									<li>
									  &nbsp; &nbsp;   <?php echo $pg;  ?>  
									</li> <!--./ form-group-->										
									<?php $n++; } // end foreach   ?>
								</ul> 
						</div> 	
					<?php }
					} 
				## if not null 
				} // end not null   ?> 
		 </div> <!-- ./ col-md-12 -->
						 