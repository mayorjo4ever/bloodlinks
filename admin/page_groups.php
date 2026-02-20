	
		<div class="col-md-8" style="float:left;"> 
			
			<table class="table table-striped"> 
				 <thead class=""> 
					<tr class="text-capitalize table-primary text-dark  "> 
						<th class="font-weight-bold h2 ">  S/N  </th>
						<th class=" font-weight-bold h2">  group name </th>
						<th class=" font-weight-bold h2">  group id </th>
						<th class=" font-weight-bold h2">  icon </th>
						<th class=" font-weight-bold h2">  Manage </th>
					</tr>
				</thead>
				
				<tbody>
					<?php $pgroups = $dbm->getFields($dbm->select('pagegroups',array('status'=>'active'),array('groupid'),'and','asc'),array('sn','groupname','groupid','icon')); 
					# var_dump($pgroups);
						$i = 0; 
						if(!is_null($pgroups)){ foreach($pgroups['groupname'] as $name){ ?>
							<tr>
								<td class="serial"> <span class="badge badge-primary"> <?php echo $i+1; ?> </span> </td>
								<td> <?php echo $name; ?></td>
								<td><?php echo $pgroups['groupid'][$i]; ?> </td>
								<td> <i class="<?php echo $pgroups['icon'][$i]; ?>"></i> &nbsp; <code><?php echo $pgroups['icon'][$i]; ?> </code> </td>
								<td> 
									<div class="btn-group" role="group" style="border:none">
										<button type="button" 
											onclick="manage_page_group($(this).attr('data-text'))"
											 data-text="<?php echo $name.'|'.$pgroups['groupid'][$i].'|'.$pgroups['icon'][$i].'|'.$pgroups['sn'][$i]; ?>"
											  class="unvisible btn btn-outline-warning border border-warning btn-rounded btn-sm">
											<i class="fa fa-pencil"></i>
										</button>
									
										<button type="button" rel="tooltip"data-text="<?php echo $catg.'|'.$type; ?>"
											for="<?php echo $dept_categs_types['sn'][$p];?>"  class="btn btn-outline-danger  border border-danger btn-rounded btn-sm">
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
		  
						  
			<div class="col-md-4" style="float:left;"> 
				<form method="post">
				<div class="card card-inverse-primary">
				 <div class="card-body">  
					<span class="h4 text-capitalize"> create new / edit page group </span>
					<hr/>
					
				 <div class="form-group row">
					<label for="title" class="col-sm-3 col-form-label bold">Group Name </label>
					<div class="col-sm-8">
					<input style="font-size:16px;" type="text" class="form-control border-primary" id="grpname"  name="grpname" placeholder="Group Name "> 
					</div> <!-- ./ col-sm-9 -->
				  </div> <!-- ./ form-group -->
				  
				 <div class="form-group row">
					<label for="title" class="col-sm-3 col-form-label bold">Group ID </label>
					<div class="col-sm-8">
					<input style="font-size:16px;" type="text" class="form-control border-primary" id="grpid"  name="grpid" placeholder="Group ID "> 
					</div> <!-- ./ col-sm-9 -->
				  </div> <!-- ./ form-group -->
				  
				 <div class="form-group row">
					<label for="title" class="col-sm-3 col-form-label bold">Group Icon </label>
					<div class="col-sm-8">
					<input style="font-size:16px;" type="text" class="form-control border-primary" id="grpicon"  name="grpicon" placeholder="Group Icon "> 
					</div> <!-- ./ col-sm-9 -->
				  </div> <!-- ./ form-group -->
				  
				  
				  <label for="title" class="col-sm-3 col-form-label bold">&nbsp;  </label>
				  <button  mode="new" type="button" id="create_page_group" class="creators btn btn-primary btn-block btn-lg btn-rounded ladda-button" data-style="expand-right"> Create Page Group &nbsp; <i class="fa fa-save"> </i> </button>
				  <button mode="update" for="" type="button" id="update_page_group" class="updators btn btn-warning btn-block btn-lg btn-rounded ladda-button" data-style="expand-right"> Update Page Group &nbsp; <i class="fa fa-save"> </i> </button>
				
				
				</div> <!-- ./ card-body -->
			</div> <!-- ./ card --> 
			</form>
		  </div> <!-- ./ col-md-4 -->
		  
						  
								  