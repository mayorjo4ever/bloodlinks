r
<!-- modal - 01-  brand / category / types -->  
		<div style="z-index:-999px" class="modal fade" id="brand_categ_type_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-briefcase"> </i> &nbsp;&nbsp; [ <span class="categ_name"> </span>  ] Types  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12 col-md-offset-1">
							<div class="card"> <div class="card-body"> 								 
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Brand  </label>
									<div class="col-sm-8">
										<select class="form-control border-primary font-16" id="item_brand2" name="item_brand2"> 
											<optgroup label="Brand Type">
												<option value=""> </option>
											</optgroup>
										</select> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->	
					 
								<div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Category  </label>
									<div class="col-sm-8">
										<select class="form-control border-primary font-16" id="item_categ" name="item_categ"> 
											<optgroup label="Category">
												<option value=""> </option>
											</optgroup>
										</select> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->	
					 
									<div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Types </label>
										<div class="col-sm-8"> 
											<input style="font-size:16px;" type="text" class="form-control border-primary" id="categ_type"  name="categ_type" placeholder="e.g. HP Laptop, Dell Computer "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									  
									 <button id="save_brand_categ_type" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Save &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_brand_categ_type" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update &nbsp; <i class="fa fa-save"> </i> </button>  
									   
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
	

<!-- modal - 02- brand categories  -->  
		<div style="z-index:-999px" class="modal fade" id="brand_categ_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-briefcase"> </i> &nbsp;&nbsp; [ <span class="brand_name"> </span>  ] Categories  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12 col-md-offset-1">
							<div class="card"> <div class="card-body"> 								 
								 <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label"> Brand Type  </label>
									<div class="col-sm-8">
										<select class="form-control border-primary font-16" id="item_brand" name="item_brand"> 
											<optgroup label="Brand Type">
												<option value=""> </option>
											</optgroup>
										</select> 
									</div> <!-- ./ col-sm-9 -->
								</div> <!-- ./ form-group -->	
					 
									<div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Category </label>
										<div class="col-sm-8"> 
											<input style="font-size:16px;" type="text" class="form-control border-primary" id="brand_categ"  name="brand_categ" placeholder="e.g. laptop "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
									 
										 
									  
									 <button id="save_brand_categ" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Save &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_brand_categ" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update &nbsp; <i class="fa fa-save"> </i> </button>  
									   
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->
	
		

<!-- modal - 03-    -->  
		<div style="z-index:-999px" class="modal fade" id="new_brand_product_modal" tabindex="-1" role="dialog" aria-labelledby="grade_level_modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title bold text-info text-center text-capitalize"> &nbsp; <i class="fa fa-briefcase"> </i> &nbsp;&nbsp; Update / Create New Product Brand  </h4>
			  </div>
				  <!-- ***************************************	-->
				   <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:auto;">
						<div class="row">
						 <div class="col-md-12 col-md-offset-1">
							<div class="card"> <div class="card-body"> 								 
								   <div class="form-group row">
										<label for="title" class="col-sm-3 col-form-label"> Brand Name </label>
										<div class="col-sm-8">
											<input style="font-size:16px;" type="text" class="form-control border-primary" id="brand"  name="brand" placeholder="e.g: Men Fashion, Electronics  "> 
										</div> <!-- ./ col-sm-9 -->
									</div> <!-- ./ form-group -->
								    
									 <button id="save_newbrand" onclick="" rel="" type="button" mode="new" class="creators btn btn-info mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Save &nbsp; <i class="fa fa-save"> </i> </button>  
									 <button id="update_newbrand" rel="" type="button" mode="update" class="updators btn btn-warning mr-2 btn-lg btn-md btn-block btn-rounded ladda-button" data-style="expand-right"> Update &nbsp; <i class="fa fa-save"> </i> </button>  
									   
							</div> </div> <!-- ./card, card-body -->
							</div>  <!-- ./ col-md-12 -->
							</div>  <!-- ./ row --> 
						</div>  <!-- ./ modal-body --> 
				   
				   <div class="modal-footer">  
						<button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal" > Cancel   </button> 
				  </div>  <!-- ./ modal-footer --> 
				</div><!-- ./ modal-content -->
			  </div>
		</div> <!-- end modal  -->