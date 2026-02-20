	
		<div class="col-md-12" style="float:left;"> 
			
			<table class="table table-striped  dataTable"> 
				 <thead class=""> 
					<tr class="text-capitalize table-info text-dark "> 
						<th class="font-weight-bold h2 ">  S/N  </th>
						<th class=" font-weight-bold h2">  title </th>
						<th class=" font-weight-bold h2">  id </th>
						<th class=" font-weight-bold h2">  url </th>
						<th class=" font-weight-bold h2">  icon </th>
						<th class=" font-weight-bold h2">  autoload </th>
						<th class=" font-weight-bold h2">  Manage </th>
					</tr>
				</thead>
				
				<tbody>
					<?php $pgs = $dbm->getFields($dbm->select('pages',array('status'=>'active'),array('groupid'),'and','asc'),array('sn','title','url','icon','groupid','autoload')); 
					# var_dump($pgs);
						$i = 0; 
						if(!is_null($pgs)){ foreach($pgs['title'] as $name){ ?>
							<tr>
								<td class="serial"> <span class="badge badge-primary"> <?php echo $i+1; ?> </span> </td>
								<td> <?php echo $name; ?></td>
								<td><?php echo $pgs['groupid'][$i]; ?> </td>
								<td><?php echo $pgs['url'][$i]; ?> </td>
								<td> <i class="<?php echo $pgs['icon'][$i]; ?>"></i> &nbsp; </td>
								<td><?php echo $pgs['autoload'][$i]; ?> </td>
								<td> 
									<div class="btn-group" role="group" style="border:none">
										<button type="button"  data-toggle="modal" data-target="#new_page_modal" 
											onclick="manage_page_list($(this).attr('data-text'))"
											 data-text="<?php echo $name.'|'.$pgs['url'][$i].'|'.$pgs['groupid'][$i].'|'.$pgs['icon'][$i].'|'.$pgs['autoload'][$i].'|'.$pgs['sn'][$i]; ?>"
											  class="unvisible btn btn-outline-warning border border-warning btn-rounded btn-lg">
											<i class="fa fa-pencil"></i>
										</button>
									
										<button type="button" rel="tooltip"data-text="<?php echo $catg.'|'.$type; ?>"
											for="<?php echo $dept_categs_types['sn'][$p];?>"  class="btn btn-outline-danger  border border-danger btn-rounded btn-lg">
											<i class="fa fa-close">  </i>
										</button> 
									</div> <!-- ./ btn-group-->
								</td>
							</tr>
							
						<?php $i++; } # end foreach

						} # end not null 
					?>
				</tbody>
				 
			</table>
				   
		  </div> <!-- ./ col-md-6-->
		  
				
						  
								  