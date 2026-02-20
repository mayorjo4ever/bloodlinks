	
				
						 <div class="col-md-5 col-md-offset-1" style="float:left; "> 
							 
								  <div class="form-group">
									<label for="">Purchase Price</label>
									<input type="text" class="only-numeric form-control border-primary font-16" id="item_purchase_price" value="<?php echo $_SESSION['item_purchase_price']; ?>" placeholder="Purchase Price"> 
								  </div>
								  
								  <div class="form-group">
									<label for="">Selling Price </label>
									<input type="text" class="only-numeric form-control border-primary font-16" id="item_selling_price" value="<?php echo $_SESSION['item_selling_price']; ?>" placeholder="Selling Price"> 
								  </div>
								   
								  <?php switch($_SESSION['stock_save_mode']){
									 case "new":{ ?> 
											 <button id="savetab3" mode="new" type="button" class="btn btn-info mr-2 btn-lg"> Save & Continue &nbsp; <i class="mdi mdi-chevron-right"></i></button>
									 <?php } break; 	
									
									 case "update":{ ?> 
										<button id="updatetab3" mode="update" rel="<?php echo $_SESSION['stock_upd_sn']; ?>" type="button" class="btn btn-warning mr-2 btn-lg"> Update & Continue &nbsp; <i class="mdi mdi-chevron-right"> </i> </button>
									 <?php } break; 
									 
									}?>  
									
								
								 
						  </div> <!-- ./ col-md-6-->
						  
						  <div class="col-md-5 col-md-offset-1" style="float:left; "> 
							 
								  <div class="form-group">
									<label for=""> Quantity </label>
									<input type="text" class="only-numeric form-control border-primary font-16" id="item_qty" value="<?php echo $_SESSION['item_qty']; ?>" placeholder="Quantity "> 
								  </div>
								  
								  <div class="form-group">
									<label for=""> Date Purchased </label>
									<input type="text" class="form-control border-primary datepicker font-16" id="purchase_date" value="<?php echo $_SESSION['purchase_date']; ?>" placeholder="Date Purchased"> 
								  </div>
								     
							</div> <!-- ./ col-md-6-->
						  