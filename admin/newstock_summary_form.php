	
						<div class="col-md-12 col-md-offset-1"> 
							
							<table class="table table-striped"> 
								<center><span onclick="window.location.reload()" class="text-center text-primary pointer"> please  refresh <i class="mdi mdi-refresh fa-2x"> </i> this page to get latest update details </span></center>
								<thead> 
									<tr class="text-capitalize text-center"> 
										<th colspan="2" class=" font-weight-bold h2">  new stock item informations  </th>
									</tr>
								</thead>
								
								<tbody>
									<tr> 
										<th class="text-right" style="width:45%"> Item Name:  </th>
										<td  style="max-width:50%"> <?php echo $_SESSION['itemname']; ?></td>
									</tr>
									
									<tr> 
										<th class="text-right"> Product Category:  </th>
										<td> <?php ## brand / categ / type
											
											echo $dbm->product_desc($_SESSION['prod_type_id']); ?> 
											 
										</td>
									</tr>
									
									<tr> 
										<th class="text-right"> Barcode Number:  </th>
										<td> <?php echo $_SESSION['codenumber']; ?></td>
									</tr>
									
									<tr> 
										<th class="text-right"> Barcode Image:  </th>
										<td> <div class="img border-primary"><img class="img img-lg rounded" style="width:auto; height:80px;" src="<?php echo 'barcodes/'.$_SESSION['codenumber'].'.png'; ?>" /> </div> </td>
									</tr>
									<tr> 
										<th class="text-right"> Short Description:  </th>
										<td> <?php echo $_SESSION['item_desc']; ?></td>
									</tr>
									
									<tr> 
										<th class="text-right"> Purchased  Price:  </th>
										<td> <?php echo "&#8358; ".number_format($_SESSION['item_purchase_price'],2);  ?></td>
									</tr>
									
									<tr> 
										<th class="text-right"> Selling  Price:  </th>
										<td> <?php echo "&#8358; ".number_format($_SESSION['item_selling_price'],2);  ?></td>
									</tr>
									
									<tr> 
										<th class="text-right"> Quantity:  </th>
										<td> <?php echo number_format($_SESSION['item_qty'],0);  ?></td>
									</tr>
									
									<tr> 
										<th class="text-right"> Date Purchased:  </th>
										<td> <?php echo $_SESSION['purchase_date'];  ?></td>
									</tr> 
									
									<tr> 										
										<td colspan="2" class="text-center font-weight-bold text-capitalize"> attached images </td>
									</tr> 

									<tr> 										
										<td colspan="2" class="text-center"> <center>  
									<?php 
										$images = glob("{uploads/".$_SESSION['admUser']."*.jpg,uploads/".$_SESSION['admUser']."*.JPG}",GLOB_BRACE);
										if(!is_null($images)) {foreach($images as $src){?>
											<div class="img " style="float:left; margin:5px; padding:5px;">
												<img alt="<?php echo $src;?>" class="img img-lg rounded zoom" src="<?php echo $src; ?>"  style="height:200px; width:auto;"/> <br/>
												<span data-text="<?php echo $src;?>" class="pointer text-info" onclick="return unlink_image($(this).attr('data-text'))"> Remove &nbsp; <i class="fa fa-close text-danger"></i> </span>
												<!-- $(this).closest('div.img').remove(), -->
												</div>
										<?php }
										} # end if 
										else if(is_null($images)) {
											echo "<span class=' bold font-18'>No image found </span>";
										}
									?> </center>
										</td>
									</tr> 
									
									<tr> 										
										<td colspan="2" align="center"> 
											<?php switch($_SESSION['stock_save_mode']){
												 case "new":{ ?> 
													<button id="savetabs" mode="new" type="button" class="btn btn-info mr-2 btn-lg"> Submit Form &nbsp;   <i class="fa fa-save"></i></button>
												 <?php } break; 	
												
												 case "update":{ ?> 
													<button id="updatetabs" mode="update" rel="<?php echo $_SESSION['stock_upd_sn']; ?>" type="button" class="btn btn-warning mr-2 btn-lg"> Update Form &nbsp; <i class="fa fa-save"> </i> </button>
												 <?php } break; 
												 
												}?>  
											</td>
									</tr> 
									
									
								</tbody>
							</table>
								   
						  </div> <!-- ./ col-md-6-->
						  
						  
								  