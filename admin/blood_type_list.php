		
		<div class="row">
			<div class="col-md-10 ">
				 <div class="pb-3 mb-3 p-3  border border-primary  rounded" >
						<table class="table  table-striped mt-0 mb-3 pb-3"> 
							<tr class="bold text-capitalize " > 
								<td> sn </td>
								<td > Types </td> 
								<td > Sales Price </td> 
								<td colspan="2"> manage  </td> 
							</tr>
						<?php 
							$bloodtypes = $mydbm->runBaseQuery("select * from blood_types"); 
							$n=0; foreach($bloodtypes as $bloodtype){ 							
							
						?>
						<tr> 
							<td> <span class=""> <?php echo $n+1; ?> </span> </td>
							<td > <?php echo "<b>".$bloodtype['name']."</b>"; ?>  </td>
                             <td > <?php echo "<b>". number_format($bloodtype['price'])."</b>"; ?>  </td>
							 <td>
								<div class="btn-group border border-white" role="group" aria-label="Basic example">
									<button onclick="show_update_buttons(),set_update_bloodtype($(this).attr('data-text'))" data-toggle="modal" data-target="#newBloodTypeForm" type="button" rel="tooltip" title=" Update <?php echo $bloodtype['name']; ?>" data-text="<?php echo $bloodtype['name']."|".$bloodtype['id']."|".$bloodtype['price']; ?>" class="edit-bloodtype' unvisible btn btn-default btn-rounded">
										<i class="fa fa-pencil"></i>
									</button>
								
									<button type="button" rel="tooltip" title="Remove <?php echo $bloodtype['name']; ?>" for="<?php echo $bloodtype['id']; ?>" data-text="<?php echo $bloodtype['name']; ?>"  class="del-role unvisible btn btn-danger btn-rounded">
										<i class="fa fa-close">  </i>
									</button> 
								</div>
							 </td>
						 </tr>
						
						<?php $n++; } ## end foreach  ?>
					
					</table>
				</div> <!-- ./ div -->	  
					
					<button type="button" onclick="hide_update_buttons(),set_new_bloodtype()" class="btn simple-btn btn-rounded btn-sm" data-toggle="modal" data-target="#newBloodTypeForm"> 
						<span class="btn btn-dark btn-rounded btn-icons btn-lg"> <i class="fa fa-plus fa-2x"></i> </span> 
								&nbsp; Add New Blood Type
							</button>
					
					
			</div> <!-- ./ col-md-10 -->	
		</div> <!-- ./ row -->	