 
			<div class="col-md-12"> 
				<h4> <strong class="text-danger text-capitalize"> un-assigned pages <i class="fa fa-subway">  </i> &nbsp; </strong></h4>
					<div class="undef">
					<?php    
						$uniques  = "select distinct groupid from pages where pages.status = 'active' and not exists (select * from priviledges where priviledges.status = 'active' and pages.url = priviledges.url and priviledges.role_id = '".$_SESSION['cur_role']."') order by groupid asc";
						$result = $mydbm->runBaseQuery($uniques); 
						$admin = new User("users"); 
						 #print_r($result); 
					
					if(!empty($result)) foreach($result as $k => $v){ # echo $v['groupid']; 
						$groupinfo = $admin->page_group_info($v['groupid']);  ?>
						
						<label class="badge badge-primary"> <?php echo $v['groupid']; ?></label>  
						<label class="bold"> &nbsp; <?php  echo $groupinfo['groupname'];?> </label>
												
					<?php 
						 $sql = "select * from pages where pages.status = 'active' and pages.groupid='".$v['groupid']."' and not exists (select * from priviledges where priviledges.status = 'active' and pages.url = priviledges.url and priviledges.role_id = '".$_SESSION['cur_role']."')";
						  $query = $mydbm->runBaseQuery($sql);
						  
						  if(!empty($query)) foreach($query  as $k=>$v){
						 	$pg_info = $pmg->page_info($v['url']);   ?> 

							<div title="<?php echo $v['url']; ?>" class="form-group form-group-inline" style="margin-top:1px; padding-top:1px; margin-bottom:1px; padding-bottom:1px;"> 
								 <div class="checkbox"> 
									<label class=" black"> 
										<input type="checkbox" class="checkbox undefined" name="roles" id="roles" value="<?php echo $_SESSION['cur_role']."|".$v['url']; ?>" title="<?php echo $_SESSION['cur_role']."|".$v['url']; ?>" /> &nbsp; &nbsp; 
											 <?php echo $pg_info['title']; # ." | <label class='badge badge-warning'> ".$pg_info['groupid']."</label>";; ?>
										</label>
											 </div>	
									</div> 							 
								<?php } # end while  
							}
					
					 ?>
						  
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="assign_page" id="assign_page"> <i class="fa fa-sign-in"> </i> &nbsp; assign page                                                                     
						</button>
					</div>										
													
					</div>
				   
				   </div>  <!-- ./ col-md-12 -->