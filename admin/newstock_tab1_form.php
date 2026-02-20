						<div class="col-md-5 col-md-offset-1"> 
							 
								  <div class="form-group">
									<label for="">Product Name</label>
									<input style="font-size:16px;" type="text" class="form-control border-primary" id="itemname" value="<?php echo $_SESSION['itemname']; ?>" placeholder="Name"> 
								  </div> <!-- ./ form-group -->
								  
								  <div class="form-group">
									<label for="">Barcode No. </label>
									<input style="font-size:16px;" type="text" class="form-control border-primary" id="itembarcode"  value="<?php echo $_SESSION['codenumber']; ?>" placeholder="Barcode No."> 
								  </div> <!-- ./ form-group -->
								   
								<div class="form-group"> <label for="">Barcode Image. </label>
									<div class="img border-primary">
										<?php if(isset($_SESSION['codenumber'])) { ?>
											<img src="<?php echo 'barcodes/'.$_SESSION['codenumber'].'.png'; ?>" id="textcode" class="img img-square " style="max-height:100px; width:auto; "/>
										<?php } else { ?><img src="../assets/images/samples/barcode_sample.jpg" id="textcode" class="img img-square " style="max-height:100px; width:auto; "/>
										<?php } ?>
									</div>
								</div> <!-- ./ form-group -->
								
								 <?php switch($_SESSION['stock_save_mode']){
									 case "new":{ ?> 
										<button id="savetab1" mode="new" type="button" class="btn btn-info mr-2 btn-lg"> Save & Continue &nbsp; <i class="mdi mdi-chevron-right"> </i> </button>								
									 <?php } break; 	
									
									 case "update":{ ?> 
										<button id="updatetab1" mode="update" rel="<?php echo $_SESSION['stock_upd_sn']; ?>" type="button" class="btn btn-warning mr-2 btn-lg"> Update & Continue &nbsp; <i class="mdi mdi-chevron-right"> </i> </button>
									 <?php } break; 
									 
									}?>  
								 
						  </div> <!-- ./ col-md-6-->
						  
                          <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
								 <label for="">Product Brand </label> &nbsp; <i class="fa fa-info-circle text-primary pointer"  data-custom-class="popover-primary" data-toggle="popover" title="Product Brand" data-content="Select what brand that the product you wanted to add belongs to, you can view more @ Stocks / Product-Brands & Category"></i>
								  <select class="form-control border-primary font-16" id="item_brand3">
									 
								  </select>
							</div> <!-- ./ form-group -->
							
							<div class="form-group">
								 <label for="">Product Type </label> &nbsp; <i class="fa fa-info-circle text-primary pointer"  data-custom-class="popover-primary" data-toggle="popover" title="Product Type" data-content="This is a sub-category / further description of your product after selecting the brand "></i>
								  &nbsp; <?php # echo $_SESSION['prod_type_id'];?>
								  <select class="form-control border-primary font-16" id="prod_type">
									 
								  </select>
							</div> <!-- ./ form-group -->
							<div class="form-group">
									<label for="">Short Description</label> 
									<textarea class="form-control border-primary font-16" id="item_desc" rows="4"><?php echo $_SESSION['item_desc']; ?></textarea> 
							</div> <!-- ./ form-group -->
						  </div>  <!-- ./ col-md-5 -->
                        