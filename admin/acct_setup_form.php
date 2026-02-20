				
					<?php 
					$bill_categ = $dbm->getFields($dbm->select('bill_category',array('status'=>'active')),array('name','sn','dept_id'));						
				  ?>				
				 <div class="row">
				  
					<?php if(!is_null($bill_categ))
							$n = 0 ; 
						foreach($bill_categ['name'] as $catg){  
							$dept_info = $dbm->resort($dbm->getFields($dbm->select('departments',array('status'=>'active','sn'=>$bill_categ['dept_id'][$n])),array('name','sn')));
							$bill_types = $dbm->getFields($dbm->select('bill_types',array('status'=>'active','categ_id'=>$bill_categ['sn'][$n],'dept_id'=>$dept_info['sn']),array('name'),'and','asc'),array('name','sn','price'));
						?>
						<div class="col-md-12" style="min-height:200px; margin-bottom:10px; padding-bottom:10px; ">
						 <div class="card">               
							<div class="card-header bold" style="margin:10px; padding:10px "> 
								<?php echo  $catg; ?>  &nbsp;&nbsp; <span class="fa fa-pencil" style="cursor:pointer; " data-toggle="modal" data-target="#billCategForm" data-backdrop="static" data-keyboard="false" 
									onclick="show_update_buttons(), manage_form_update($(this).attr('data-text'),$(this).attr('for'),$('#updateBillCateg'))" data-text="<?php echo $catg.'|'.$bill_categ['sn'][$n]."|".$dept_info['sn']; ?>"
										 for="<?php echo $bill_categ['sn'][$n];?>"> </span> &nbsp;&nbsp; <small class="bold text-info"> in ( <?php echo $dept_info['name']; ?> ) </small>
							</div>
							
							<div class="card-body"> 
									<table class="table table-nogap "><tbody>
							<?php $m = 0; if(!is_null($bill_types)) {
								foreach($bill_types['name'] as $type){  
								?>
								<tr class="font-20"> 
									<td class="serial"> <?php echo ($m+1); ?>. &nbsp; </td>
									<td> <?php echo $type; ?> &nbsp; </td>
									<td> <b>  &#8358; <?php echo number_format($bill_types['price'][$m]);?> </b> </td>
									<td> &nbsp;    <?php echo readTime(176000);?> &nbsp;  </td>
									<td> 
										<div class="btn-group" role="group" style="border:none">
													
										<button type="button" data-toggle="modal" data-target="#billTypeForm" data-backdrop="static" data-keyboard="false"
											onclick="manage_form_update($(this).attr('data-text'),$(this).attr('for'),$('#updateBillType')),load_bill_departments($('#bill_dept_id2')),load_bill_category($('#bill_dept_id2').val(),$('#billCateg2')),show_update_buttons()"
											 data-text="<?php echo $type.'|'.$bill_categ['sn'][$n].'|'.$dept_info['sn'].'|'.$bill_types['price'][$m]; ?>"
											 for="<?php echo $bill_types['sn'][$m];?>" class="unvisible btn btn-default btn-rounded btn-sm">
											<i class="fa fa-pencil"></i>
										</button>
									
										<button type="button" rel="tooltip"data-text="<?php echo $catg.'|'.$type; ?>"
											for="<?php echo $bill_types['sn'][$m];?>"  class="del-bill-type unvisible btn btn-danger btn-rounded btn-sm">
											<i class="fa fa-close">  </i>
										</button> 
									</div> <!-- ./ btn-group-->
								</td>
								</tr>
							 <?php 
								$m++; } # end foreach
							} ## end not null 
							 ?> 
							 </tbody> </table>
						</div>  <!--  ./ card-body  -->
						 
						
						</div> <!-- ./ card --> 
					</div> <!-- ./ col-lg-4 -->  
					
					<?php $n++; } //end foreach  ?>
				  
					</div> <!-- ./ row --> 
				   