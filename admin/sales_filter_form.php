
					<form method="post" id="" > 
					 
					<div class="col-md-6" style="float:left;"> 
						<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">					  					    
					  <div class="input-group border-2" title="Search Products ">
						<input type="hidden" name="reqType" id="reqType" value="<?php echo $_SESSION['reqType']; ?>"  />
						<input style="font-size:16px; height:38px;" autocomplete="off" type="text" id="searchText" name="searchText" value="<?php echo $_SESSION['searchText']; ?>" class="form-control  input-rounded border-primary select-lg" placeholder="Search Products...	 ">
						
						<div class="input-group-append">
						  <button type="submit" style="height:44px;" class="btn btn-icons btn-primary sales_filterate_btn"  id="sales_filterate_btn" name="sales_filterate_btn"> <i class="fa fa-search text-white"></i></button>
						</div> 
					  </div> 
					</div> <!-- ./  form-group -->
					 
					</div> <!-- ./  col-md-6 -->  
			 
					</form> 
					  