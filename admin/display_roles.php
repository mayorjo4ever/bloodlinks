		
		<div class="row">
			<div class="col-md-10 ">
				 <?php  
					$roles = $dbm->getFields($dbm->select('roles',array('status'=>'active'),array('name'),'and','asc'),array('name','id','sn'));
					## if not null  	
					if(!is_null($roles))
						{  ?>
						<table class="table table-responsive table-striped "> 
							<tr class="bold text-capitalize bg-success white" > 
								<td> sn </td>
								<td > roles </td> 
								<td > users  </td> 
								<td > page priviledges  </td> 
								<td colspan="2"> manage  </td> 
							</tr>
						<?php 
							$pages = $dbm->getFields($dbm->select("pages",array('status'=>'active'),array('sn'),'AND','ASC'),array('title','url','sn')); 					
							$n=0; foreach($roles['name'] as $role){ 
							$users_defn = $dbm->getFields($dbm->select_distinct('user_id','myroles',array('role_id'=>$roles['id'][$n],'status'=>'active')),array('user_id'));
							$priviledges = $dbm->getFields($dbm->select("priviledges",array('role_id'=>$roles['id'][$n],'status'=>'active'),array('sn'),'AND','ASC'),array('role_id','url','sn')); 					
						?>
						<tr> 
							<td> <span class="badge badge-success"> <?php echo $n+1; ?> </span> </td>
							<td > <?php echo "<b>".$role."</b>"; ?> &nbsp; &nbsp; &nbsp; <small>( <?php echo $roles['id'][$n]; ?> ) </small> </td>
                                                        <td>   <?php echo empty($users_defn)?0 : count($users_defn['user_id']); ?>   </td>
							<td>  <?php echo count($priviledges['role_id'])." / ". count($pages['sn']) ; ?>   </td>
							
							 <td>
								<div class="btn-group border border-white" role="group" aria-label="Basic example">
									<button data-toggle="modal" data-target="#newRoleForm" type="button" rel="tooltip" title=" Update <?php echo $role; ?>" data-text="<?php echo $role."|".$roles['id'][$n]."|".$roles['sn'][$n]; ?>" class="edit-role unvisible btn btn-default btn-rounded">
										<i class="fa fa-pencil"></i>
									</button>
								
									<button type="button" rel="tooltip" title="Remove <?php echo $role; ?>" for="<?php echo $roles['sn'][$n]; ?>" data-text="<?php echo $role; ?>"  class="del-role unvisible btn btn-danger btn-rounded">
										<i class="fa fa-close">  </i>
									</button> 
								</div>
							 </td>
						 </tr>
						
						<?php $n++; } ## end foreach  ?>
					
					</table>
					<?php } ## end not null  ?>  
					
					<button onclick="hide_update_buttons()" data-toggle="modal" data-target = "#newRoleForm" data-custom-class="tooltip-primary"  data-placement="right" class="btn btn-rounded btn-warning btn-icons" title="Create More Roles"> <i class="fa fa-plus"></i> </button>
					
					
			</div> <!-- ./ col-md-10 -->	
		</div> <!-- ./ row -->	