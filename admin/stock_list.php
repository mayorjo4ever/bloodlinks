			
			<div class="search_result_2">  
				 <?php 
					$order_by = str_replace("|"," ",$_SESSION['order_by']);								
					$func = new functions();
					$conn = new mysqli('localhost', 'root', 'mayoskele', 'inv_2'); 			 
					#$conn = new mysqli('localhost', 'root', '', 'inv_2'); 			 
					$start = 0; 								
					$limit = $_SESSION['limit'];
					$reqType = $_SESSION['reqType'];
					$criteria = $_SESSION['criteria'];
					$next = $start + $limit; 
					$n = $start; 
					###################### 
					
					if($reqType == "default") { 
						$sql = $conn->query("SELECT * FROM stock_items order by $order_by  LIMIT $start, $limit "); 
						$found = $conn->query("SELECT * FROM stock_items order by $order_by "); 
					}
					 
					else if($reqType == "search"){
						$sql = $conn->query("SELECT * FROM stock_items WHERE name REGEXP '".$criteria."' or barcode REGEXP '".$criteria."' or description REGEXP '".$criteria."'  or date_purchased REGEXP '".$criteria."'  or rec_by REGEXP '".$criteria."' or date_c REGEXP '".$criteria."'  order by $order_by  LIMIT $start, $limit ");
						$found = $conn->query("SELECT * FROM stock_items WHERE name REGEXP '".$criteria."' or barcode REGEXP '".$criteria."' or description REGEXP '".$criteria."' or date_purchased REGEXP '".$criteria."'  or rec_by REGEXP '".$criteria."' or date_c REGEXP '".$criteria."'  order by $order_by ");				
					}
					
					#####################					
					
					$founds = $sql->num_rows." of ".$found->num_rows; 
					
					
					if ($sql->num_rows > 0) { 
						$_SESSION['found'] = $sql->num_rows; 
					?>
						<div class="row"> 
						<input type="hidden" class="rec_count" value="<?php echo $founds; ?>" />
						
						<?php 
						## navigate view mode 
						if($_SESSION['view_mode']=="slide_view"){
						while($data = $sql->fetch_array()) { $n++; ?>
							<div class="col-md-4 " style="float:left; border:0.5px solid #ddd; height:auto;">
								<!-- <span class="badge badge-info"> <?php echo $n; ?> </span> -->								
								<!-- <p class="text-muted"> <span> description</span> <br/> <?php echo $data['description']; ?></p> -->
							 		<div class="">
										<?php 
											$images = $conn->query("SELECT * FROM stock_item_imgs where barcode='".$data['barcode']."'"); 
											if ($images->num_rows > 0){ ?>
												<div class="owl-carousel owl-theme full-width text-justify-center" >
												<?php while($img_src = $images->fetch_array()){ ?>
													<div class="item"> <img src="<?php echo $img_src['url']."".$img_src['name']; ?>" class="" style="height:250px; max-width:300px; " /> </div>
												<?php 
												}  ?>
												</div>
											<?php } 
										?>
									</div>
								<div class="text-dark"> <?php echo $data['name']; ?>  <br/>
									<span class="text-muted"> Avail.  <span class="fa fa-heart-o"> </span> <?php echo $data['qty']; ?>&nbsp; &nbsp;  Solds.  <span class=" text-success fa fa-shopping-cart"> </span> <?php echo $data['qty']; ?>  </span> <br/>
									
								<span class="h4 bold"> <?php echo "&#8358; ".number_format($data['selling_price'])." &nbsp;&nbsp; <small class='text-muted'> <strike>&#8358;".number_format($data['purchase_price'])."</strike></small>";  ?> 
									&nbsp;&nbsp; <a href="#" class="font-12"> more... </a>
								</span>							
								
								</div>									
							</div> <!-- ./ col-md-4 -->
						<?php 
						} #end while
						} #end slide view mode 
						else if($_SESSION['view_mode']=="list_view"){?>
							<div class="table"> 
								<table class="table table-striped table-hover table-responsive"> 
									<thead>
										<tr class="bg-info text-white bold">
											<td> SN. </td>
											<td> Name. </td>											
											<td> Purchased Price. </td>
											<td> Selling Price. </td>
											<td> In Stock </td>
											<td> Qty Left. </td>
											<td> Total Solds. </td>
											<td> Manage </td>
										</tr>
									</thead>
									<tbody>
									<?php 
										while($data = $sql->fetch_array()) { $n++; 
											$tot_solds = $dbm->getFields($dbm->select('stock_item_sales',
												array('item_id'=>$data['sn'],'status'=>'active','sales_finalized'=>'yes')),array('item_id','name','barcode','ref_id','selling_price','qty','total_price')); 
										?>											
											<tr rel="tooltips" title="<?php echo $dbm->product_desc($data['ref_id']);  ?>">
												<td> <?php echo $n; ?> </td>
												<td> <?php echo $data['name']; ?> </td>												
												<td> <?php echo "&#8358; ".number_format($data['purchase_price']); ?>  </td>
												<td> <?php echo "&#8358; ".number_format($data['selling_price']); ?>  </td>
												<td> <?php echo number_format($data['qty']); ?>  </td>
												<td> <?php echo number_format($data['remains']); ?>  </td>
												<td> <?php if(!is_null($tot_solds)) echo array_sum($tot_solds['qty']); else echo '0'; ?></td>
												<td> 
													<span class="update_product mdi mdi-pencil text-warning pointer fa-2x" data-text="<?php echo base64_encode("update|".$data['sn']); ?>" title="<?php echo base64_encode("update|".$data['sn']); ?>"> </span> &nbsp;
													<!-- <span class="fa fa-times red pointer fa-2x" data-text="<?php echo base64_encode("delete|".$data['sn']); ?>" title="<?php echo base64_encode("delete|".$data['sn']); ?>"></span> -->
												</td>
											</tr>										
										<?php } #end while ?>
									 </tbody>
								</table>
							</div>
						<?php } #end list view 
						?> 
						</div>
			<?php #  $response.=' </div> limit:'.$start.' '.$limit.', criteria  - '.$reqType.', text : '.$criteria; 
			
			// $result  = array('next'=>$next,'response'=>$response,'found'=>$found->num_rows);
			//	exit(json_encode($result)); 
			 }
			 
			 # echo $response;
																	 
							 
							 ?>
						 </div>
