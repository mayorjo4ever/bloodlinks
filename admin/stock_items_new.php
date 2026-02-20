
			 

<?php 
	$dbm = new DbTool(); 
		$products = $dbm->getFields($dbm->select('pharm_products',array('status'=>'active','visible'=>'yes'),array('exp_date'),'and','asc'),
			 		array('sn','name','description','code','barcode','exp_date','mfc_date','remains','rem_no_of_pack','cost_price','selling_price',
					'qty','vendor_id','date_suplied','date_c','time_c','month_c','day_c','year_c','week_c','no_of_pack','qty_per_pack'));
			
		echo '<p class="h4 text-info bold">'. count($products['sn']).' Items Found </p> '; 
				 
	## if not null  	
		if(!is_null($products))
			{  ?>
			 
			<?php $n=0; foreach($products['name'] as $name){	
				$solds  = $dbm->getFields($dbm->select('stock_products_sales',array('ref_id'=>$products['sn'][$n])),array('qty'));
				#$solds = mysql_query("select * from stock_products_sales where ref_id='".$products['sn'][$n]."'");				
				#$rows = mysql_fetch_assoc($solds); var_dump($rows);
				 if(!is_null($solds)) $data = array_sum($solds['qty']); 
			?>						
			<div class="col-md-6 col-lg-6 grid-margin float-left ">
              <div class="card border border-primary ">
                <div class="card-body no-gutter show_opacity">
                  <div class="d-flex align-items-center border-bottom py-3 px-4 " >
                    <!-- edit  --> <span class="fa fa-pencil text-warning font-18 pointer low_opacity" onclick="manage_stock_items_update($(this).attr('for'))" data-toggle="modal" data-target="#productManager" data-backdrop="static" data-keyboard="false"title=" Edit: <?php echo $myname; ?> Info " data-text="<?php echo $myname; ?>" for="<?php echo $products['sn'][$n]; ?>"> </span> &nbsp; &nbsp; 
                    <!-- delete  --> <span class="fa fa-times text-danger font-18 pointer del-stock-item low_opacity" data-text="<?php echo $name.'|'.$products['barcode'][$n]; ?>" for="<?php echo $products['sn'][$n];?>"> </span> &nbsp; &nbsp; 
                    <!-- add more  --> <span class="fa fa-plus text-primary font-18 pointer low_opacity" onclick="manage_product_import_update($(this).attr('for'),$(this).attr('data-text'))" for="<?php echo $products['sn'][$n]; ?>" data-text="<?php echo $name."|".$products['cost_price'][$n]."|".$products['selling_price'][$n]; ?>" data-toggle="modal" data-target="#updateProductManager"  data-backdrop="static" data-keyboard="false"> </span> &nbsp; &nbsp;
                    <!-- hide  --> <span class="fa fa-eye-slash text-danger font-18 pointer set-stock-invisible low_opacity" data-text="<?php echo $name.'|'.$products['barcode'][$n]; ?>" for="<?php echo $products['sn'][$n];?>"> </span> 
                    <div class="d-flex align-items-end">
                      <h5 class="font-weight-bold  mb-0 ml-0 ml-md-3"> <?php echo $name; ?> <!--Paracetamol  Syrub --> </h5>
                    </div>
                    <h4 class="ml-auto font-weight-bold text-muted"> <?php $sp = $products['selling_price'][$n]; $cp = $products['cost_price'][$n]; echo "&#8358; ".number_format($sp); ?> <small> <strike> <?php echo "&#8358; ".number_format($cp);?></strike> </small> </h4> 
                  </div>
                  <div class="d-flex align-items-center border-bottom py-3 px-4">
                    <div class=" d-flex flex-column border-right col-sm-4">
                      <small class="text-muted">  Expiry </small>
                      <div class="d-flex align-items-end">
                        <h3 class="font-weight-bold mb-0"> <?php if($products['mfc_date'][$n]!="" && $products['exp_date'][$n]!="") echo $func->stock_expiry($products['mfc_date'][$n],$products['exp_date'][$n],""); else echo "<i class='fa fa-warning fa-2x text-warning' title='Has No Expiry Date'></i> <span class='text-danger'> &nbsp; No Date </span>";  ?></h3>
                        <div class="d-flex align-items-center ml-2">
                          <h6 class="font-weight-medium small">Days </h6>
                        </div>
                      </div>  
                    </div>
					   
					<div class=" d-flex flex-column border-right col-sm-3">
                      <small class="text-muted">  Pack Used </small>
                      <div class="d-flex align-items-end">
                        <h5 class="font-weight-medium mb-0"> <?php echo $data; // print_r($data); ?></h5>
                        <div class="d-flex align-items-center ml-2">
                          <h5 class="font-weight-medium"></h5>                           
                        </div> 
                      </div> 
                    </div> 
					 
					<div class=" d-flex flex-column  border-right col-sm-3">
                      <small class="text-muted">  Rem. Packs </small>
                      <div class="d-flex align-items-end">
                        <h5 class="font-weight-medium mb-0"> <?php echo $products['rem_no_of_pack'][$n]; ?></h5>
                        <div class="d-flex align-items-center ml-2">
                                       
                        </div>
                      </div>
                    </div> 
					 
					<div class=" d-flex flex-column  col-sm-3">
                      <small class="text-muted">  Estm. Price Consumed </small>
                      <div class="d-flex align-items-end">
                        <h5 class="font-weight-bold mb-0 text-success" > <?php echo "&#8358; ".number_format($data*($sp-$cp)); ?> </h5>
                        <div class="d-flex align-items-center ml-2">
                                             
                        </div>
                      </div>
                    </div>  
                     
                  </div>
                </div>
              </div>
            </div> 
			<!--
		   
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
			<td > <?php echo $products['barcode'][$n]; ?>      </td>
		
			 <td> <span class="font-14"><?php echo $products['description'][$n]; ?></span> </td> 
			<td> <span class="font-14"> </span> </td> 
		  
			<td> <?php echo "N ".number_format($products['cost_price'][$n]) ; ?></td> 
			 
			<td> <span class="font-14"> <?php echo $products['vendor_id'][$n]; ?></span> </td> 
		 </tr>  -->
		 
		<?php $n++;  
		# if($n==5) break; 
		} ## end foreach 
	} ## end not null  

?>  
