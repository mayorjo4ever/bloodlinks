				 <form method="post">
							 	<div class="panel panel-info">
								 <div class="panel-header bold">	<h4> online members </h4> </div>	
									<div class="panel-body">	
										  <div class="table"> 
											<table class="table jambo_table">
												<thead class=" text-uppercase ">
												 <tr class="bold">
													<td> sn </td>
													<td> id </td>
													<td> name </td> 
													<td> role </td>
													<td> online </td>
												  </tr>
												</thead>
												
												<tbody>
												<?php 
													$dbm = new DbTool();  $n = 0;   $admin = new User('users');
													$allstaff = $dbm->getFields($dbm->select('users',array('acct_status'=>'active')),array('sn','password','user_id','fullname','email','phone','acct_status','c_by','date_c','time_c','online','online_icon'));
													if(!is_null($allstaff)){ foreach($allstaff['user_id'] as $id) { 
														$myroles = $admin->get_my_roles($id); ## by id 
														if(!is_null($myroles)) $rolename = $admin->get_role_name($myroles['role_id'][0])['name'] ;  ## by id 				
													?>
													<tr class="selected" title="<?php echo "eMail: ".$allstaff['email'][$n]."&nbsp; Phone:  ".$allstaff['phone'][$n]?>">
														<td><span class="badge badge-primary"><?php echo $n+1; ?> </span> </td>
														<td> <img class="img img-circle img-sm img-bordered" src="../assets/images/default-user.png"  /> &nbsp;  &nbsp; <?php echo $id; ?></td>
														<td><?php echo $allstaff['fullname'][$n]; ?></td> 
														<td><?php echo $rolename; ?></td> 
														<td> <i class=" fa-2x <?php echo $allstaff['online_icon'][$n]?>">  </i> </td> 
													</tr>
													
													<?php $n++; } // end foreach
													} // end not null ?>
												</tbody>
											
											</table>
										 </div> 
									</div> <!-- ./ panel-body -->
									 
									
								</div> <!-- ./ panel --> 
 
						</form>
					 	