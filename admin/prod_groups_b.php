	<table class="table table-nogap table-responsive dataTable">
		<thead>
			<tr class="bold bg-dark text-white  ">
									<td class="serial text-center"> SN </td>
									<td> Name </td>
									<td> Sample Required</td>
									<td> Price </td>
									<td> Estim. Time </td>
									<td> Edit </td>
									<td> Status <br/><small>Active / Not Active</small></td>
									<td> Result Temp.</td>
								</tr>
		
		</thead>
		<tbody>	
								 
						<?php  
								## $dept_categs_types = $dbm->getFields($dbm->select('bill_types',array('dept_id'=>$departments['sn'][$n],'categ_id'=>$dept_categs['sn'][$m],'status'=>'active')),array('name','sn','price','specimen_sample','estm_time','estm_time_type'));
								  $dept_categs_types = $dbm->getFields($dbm->select('bill_types',['']), ['name','sn','price','specimen_sample','estm_time','estm_time_type','status','dept_id','categ_id']);
									$p = 0; if(!is_null($dept_categs_types)){ ?>								
												
								<?php $days = array(0,60,3600,86400,604800,2419200); ## sec, min, hour, day, week, month				
									 foreach($dept_categs_types['name'] as $type_name){   
									 
										$template_setup = $dbm->getFields($dbm->select('specimen_result_template',array('bill_type_id'=>$dept_categs_types['sn'][$p])),array('sn','name','has_unit','unit','has_ref_val','ref_val','age_range')); 
									 ?>									 
									<tr class="font-20"> 
										<td class="serial text-center"> <span class="badge badge-primary"><?php echo ($p+1); ?></span> &nbsp;  </td>
										<td> <?php echo $type_name; ?> &nbsp; <span class="small text-italics pull-right"><strong><?php # print "  Total Test(s) : ". $tot_tests[0]['total'];?></strong> </span></td>
										<td> <small> <?php echo $dept_categs_types['specimen_sample'][$p]; ?> </small>  </td>
										<td> <b>  &#8358; <?php echo number_format($dept_categs_types['price'][$p]);?> </b> </td>
										<td> &nbsp;    <?php  $val = $dept_categs_types['estm_time'][$p] * $days[$dept_categs_types['estm_time_type'][$p]]; /** echo $val; **/ ##echo strtoupper(readTime($val));?> &nbsp;  </td>
										<td>  <a  data-toggle="modal" data-target="#billTypeForm" data-backdrop="static" data-keyboard="false"
												onclick="manage_billtype_update($(this).attr('data-text'))"
												 data-text="<?php echo $dept_categs_types['dept_id'][$p]."|".$dept_categs_types['categ_id'][$p].'|'.$dept_categs_types['sn'][$p].'|'.$type_name.'|'.$dept_categs_types['specimen_sample'][$p].'|'.$dept_categs_types['price'][$p].'|'.$dept_categs_types['estm_time'][$p].'|'.$dept_categs_types['estm_time_type'][$p]; ?>"
												 class="unvisible btn  btn-md">
												<i class="fa fa-pencil text-warning"></i>
                        </a>  
										</td>
										<td> <?php if($dept_categs_types['status'][$p]=="active"){ ?> 
                          <a  href="javascript:void(0)" id="bill_id_<?php echo $dept_categs_types['sn'][$p];?>" bill_id="<?php echo $dept_categs_types['sn'][$p];?>"  
                              class="del-bill-type update_bill_status" >
												<i class="mdi mdi-bookmark-check mdi-36px text-success" status="active">  </i>
											</a>  
                        <?php } else { ?> 
                             <a href="javascript:void(0)" id="bill_id_<?php echo $dept_categs_types['sn'][$p];?>" bill_id="<?php echo $dept_categs_types['sn'][$p];?>" 
                                class="update_bill_status" >
												<i class="mdi mdi-bookmark-remove mdi-36px text-danger"  status="inactive">  </i>
											</a> 
                            <?php } ?>   
                            </td>
										<td> &nbsp;&nbsp; <span  for="<?php echo $dept_categs_types['sn'][$p]; ?>" onclick="view_bill_result_template($(this).attr('for'),$('#result_template'))" data-toggle="modal" data-target="#spec_template_view" class="pointer mdi mdi-book-open-page-variant  mdi-24px <?php echo (is_null($template_setup))?'text-warning':'text-primary'; ?>"> </span> </td>
										
									</tr>
									<?php $p++; } # end foreach
								} #end not null 
								
							?> 
					   
	</tbody> </table>