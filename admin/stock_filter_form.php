
					<form method="post" id="" > 
					<div class="col-md-2" style="float:left;">
						<div class="icheck-square">
                          <label for="minimal-radio"> &nbsp;<input tabindex="7" type="radio" id="view_mode" name="view_mode" value="slide_view" <?php echo ($_SESSION['view_mode']=="slide_view")?"checked":""; ?> >
                          Slide View</label>
                        </div>
                        <div class="icheck-square">
                          <label for="minimal-radio"> &nbsp;<input tabindex="8" type="radio" id="view_mode" name="view_mode" value="list_view" <?php echo ($_SESSION['view_mode']=="list_view")?"checked":""; ?> >
                          List View</label>
                        </div>
					</div>
					
					<div class="col-md-2 " style="float:left;"> 
						 <div class="form-group">								 
						  <select class="form-control border-primary font-16" style="font-size:16px; height:44px;"  id="stock_limit" name="stock_limit">
							 <optgroup label="Records per row">
								<option value="50" <?php echo ($_SESSION['limit']=="50")?"selected":"";?>> 50 </option>
								<option value="100" <?php echo ($_SESSION['limit']=="100")?"selected":"";?>> 100 </option>
								<option value="200" <?php echo ($_SESSION['limit']=="200")?"selected":"";?>> 200 </option>
								<option value="500" <?php echo ($_SESSION['limit']=="500")?"selected":"";?>> 500 </option>
								<option value="1000" <?php echo ($_SESSION['limit']=="1000")?"selected":"";?>> 1000 </option>
							 </optgroup>
						  </select>
							</div> <!-- ./ form-group -->							
					</div> <!-- ./ col-md-2 -->
					
					<div class="col-md-2 " style="float:left;"> 
						 <div class="form-group">								 
						  <select class="form-control border-primary font-16" style="font-size:16px; height:44px;"  id="stock_order" name="stock_order">
							 <optgroup label="Order By..">
								<option value="name|asc" <?php echo ($_SESSION['order_by']=="name|asc")?"selected":"";?>> Name ASC... </option>
								<option value="name|desc" <?php echo ($_SESSION['order_by']=="name|desc")?"selected":"";?>> Name DESC... </option>
							  </optgroup>
							  
							  <optgroup label="Order By.." >
								<option value="categ_id|asc" <?php echo ($_SESSION['order_by']=="categ_id|asc")?"selected":"";?>> Category ASC... </option>
								<option value="categ_id|desc" <?php echo ($_SESSION['order_by']=="categ_id|desc")?"selected":"";?>> Category DESC... </option>								 
							 </optgroup>
							 
							  <optgroup label="Order By..">	
								<option value="date_purchased|asc" <?php echo ($_SESSION['order_by']=="date_purchased|asc")?"selected":"";?>> Date Purchased ASC... </option>
								<option value="date_purchased|desc" <?php echo ($_SESSION['order_by']=="date_purchased|desc")?"selected":"";?>> Date Purchased DESC... </option>
							  </optgroup>
							  
							  <optgroup label="Order By.." >
								<option value="selling_price|asc" <?php echo ($_SESSION['order_by']=="selling_price|asc")?"selected":"";?>> Prices ASC... </option>
								<option value="selling_price|desc" <?php echo ($_SESSION['order_by']=="selling_price|desc")?"selected":"";?>> Prices DESC... </option>								 
							 </optgroup>
						  </select>
							</div> <!-- ./ form-group -->							
					</div> <!-- ./ col-md-2 -->
					
					<div class="col-md-3" style="float:left;"> 
						<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  					    
					  <div class="input-group border-2" title="Search Patient Informations by Name, or Hospital Number. ">
						<input type="hidden" name="reqType" id="reqType" value="<?php echo $_SESSION['reqType']; ?>"  />
						<input style="font-size:16px; height:38px;" autocomplete="off" type="text" id="stock_filterate" name="stock_filterate" value="<?php echo $_SESSION['criteria']; ?>" class="form-control rounded border-primary select-lg" placeholder="Search Records Text ... ">
						
						<div class="input-group-append">
						  <button type="submit" style="height:44px;" class="btn btn-icons btn-rounded btn-primary stock_filterate_btn"  id="stock_filterate_btn" name="stock_filterate_btn"> <i class="fa fa-search text-white"></i></button>
						</div>
						
					  </div> 
					</div> <!-- ./  form-group -->
					</div> <!-- ./  col-md-6 -->  
			 
					</form> 
					  