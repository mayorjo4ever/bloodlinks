<?php 
	$dbm = new DbTool(); 
		$products = $dbm->getFields($dbm->select('pharm_products',array(''),array('time_c'),'and','desc'),
			 		array('sn','name','description','code','barcode','exp_date','mfc_date','remains','cost_price','selling_price',
					'qty','vendor_id','date_suplied','date_c','time_c','month_c','day_c','year_c','week_c'));
			
				 
	## if not null  	
					if(!is_null($products))
						{  ?>
					<p class="h4 text-info bold">  <?php  echo count($products['sn']). " Items Found  "; ?></p>
						<table id="patient_table" class="table dataTable table-responsive text-capitalize sortable-table"> 
							<thead class="bg-dark">
							<tr class="bold text-uppercase bg-dark text-white  font-16" > 
								<td> sn </td>
								<td> actions &nbsp;&nbsp; <i class="fa fa-cog"></i> </td>	
								<td> expiry </td>								
								<td > name  </td>
								<td> barcode no </td>								 
								<td> description </td>								 
								 <td> qty </td>  								 
								<td> cost price   </td>
								<td> selling price  </td>								
								<td> vendor </td>
								
							</tr>
							</thead>
							<tbody>
						<?php $n=0; foreach($products['name'] as $name){							
						?>
						<tr style="font-size:16px;"> 
							<td> <span class="btn btn-sm btn-rounded btn-default bold"> <?php echo ($n+1); ?> </span> </td>
							 <td> <div class="form-group">
								<a class="dropdown-item text-primary" href="#" onclick="manage_stock_items_update($(this).attr('for'))" data-toggle="modal" data-target="#productManager" data-backdrop="static" data-keyboard="false"title=" Edit: <?php echo $myname; ?> Info " data-text="<?php echo $myname; ?>" for="<?php echo $products['sn'][$n]; ?>">
											<i class="fa fa-pencil fa-2x"></i> &nbsp; </a>	
								 <a class="dropdown-item  text-primary" href="#" onclick="manage_product_import_update($(this).attr('for'),$(this).attr('data-text'))" for="<?php echo $products['sn'][$n]; ?>" data-text="<?php echo $name."|".$products['cost_price'][$n]."|".$products['selling_price'][$n]; ?>" data-toggle="modal" data-target="#updateProductManager"  data-backdrop="static" data-keyboard="false">
											<i class="fa fa-plus fa-2x"></i> &nbsp; </a> 
								 <a class="dropdown-item  text-danger del-stock-item" href="#"  data-text="<?php echo $name.'|'.$products['barcode'][$n]; ?>"
										  for="<?php echo $products['sn'][$n];?>">
											<i class="fa fa-close fa-2x"></i> &nbsp; </a> 
								 </div>
							  
							 </td>
							 <td> 
								  <?php if($products['mfc_date'][$n]!="" && $products['exp_date'][$n]!="") echo $func->stock_expiry($products['mfc_date'][$n],$products['exp_date'][$n],"fa-2x"); else echo "<i class='fa fa-warning fa-2x text-warning' title='Has No Expiry Date'></i> <span class='text-danger'> &nbsp; No Date </span>";  ?>
							 </td> 
							<td> <span class="font-14"> <?php echo $name; ?> </span> </td>
							<td > <?php echo $products['barcode'][$n]; ?>      </td>
						
							<!-- <td> <span class="font-14"><?php echo $products['description'][$n]; ?></span> </td> -->
							<td> <span class="font-14"> <?php echo $products['remains'][$n]; ?></span> </td> 
						  
							<td> <?php echo "N ".number_format($products['cost_price'][$n]) ; ?></td> 
							<td> <?php echo  "N ".number_format($products['selling_price'][$n]) ; ?></td> 
							
							<td> <span class="font-14"> <?php echo $products['vendor_id'][$n]; ?></span> </td> 
						 </tr>
						</tbody>
						<?php $n++; } ## end foreach  ?>
					
					</table>
					<?php } ## end not null  

		?>  
