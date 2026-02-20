			
		<?php 
			/*********
			**** SOURCE FOR LIST OF PRODUCT BRANDS  
			***************/
			$brands = $dbm->getFields($dbm->select('product_brands',array('status'=>'active')),array('name','sn'));
				$n = 0; 
				if(!is_null($brands )) {
					foreach($brands['name'] as $brand){ 
		?>
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <strong> <?php echo $brand; ?> </strong> &nbsp; &nbsp; <small class="pull-right pointer" onclick="manage_brand($(this).attr('data-text'))" data-toggle="modal" data-target="#new_brand_product_modal" data-text="<?php echo $brand."|".$brands['sn'][$n]; ?>"> edit  <?php echo $brand; ?>  <span class="pointer fa fa-pencil font-20 text-warning"> </span> </small></h4>
                   <!--  <p class="card-description"> Use class <code>.accordion-multiple-filled</code> for multiple filled styling</p> -->
                    <div class="accordion basic-accordion" id="<?php echo "accordion-$n"; ?>" role="tablist">
                     <?php 
						/*****
						***** LOAD EACH CATEGORIES OF ITEM BRAND 
						*****/
						$brand_categs = $dbm->getFields($dbm->select('product_brands_categs',array('brand_id'=>$brands['sn'][$n],'status'=>'active')),array('name','brand_id','sn'));						
						$m = 0; 
						if(!is_null($brand_categs )) {
							foreach($brand_categs['name'] as $categ){ 
								## $brand_categs_types = $dbm->getFields($dbm->select('product_brands_categs_type',array('brand_id'=>$brands['sn'][$n],'categ_id'=>$brand_categs['sn'][$m],'status'=>'active')),array('name','brand_id','categ_id','sn'));						
								
						?> 
					 <div class="card">
                        <div class="card-header" role="tab" id="<?php echo "heading-$m-$n"; ?>">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" href="<?php echo "#collapse-$m-$n"; ?>" aria-expanded="false" aria-controls="<?php echo "collapse-$m-$n"; ?>">   <?php echo $categ; ?>  </a>
                          </h5>
                        </div>
                        <div id="<?php echo "collapse-$m-$n"; ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo "heading-$m-$n"; ?>" data-parent="<?php echo "#accordion-$n"; ?>">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-3">
                                <img class="img-fluid rounded" src="../assets/images/lightbox/play-button.png" alt="image"> </div>
                              <div class="col-md-9">
                               <ul class="pl-3 list-arrow">
								<?php  $brand_categs_types = $dbm->getFields($dbm->select('product_brands_categs_types',array('brand_id'=>$brands['sn'][$n],'categ_id'=>$brand_categs['sn'][$m],'status'=>'active')),array('name','brand_id','sn'));
									$p = 0; if(!is_null($brand_categs_types)){ 
										 foreach($brand_categs_types['name'] as $type_name){ ?>
										<li> <?php echo $type_name; ?> &nbsp;  <span onclick="manage_brand_categ_type($(this).attr('data-text'))" data-text="<?php echo $type_name."|".$brands['sn'][$n]."|".$brand_categs['sn'][$m]."|".$brand_categs_types['sn'][$p]; ?>" data-toggle="modal" data-target="#brand_categ_type_modal" class="pull-right pointer small text-primary"> update <i class="fa fa-pencil"></i> </span></li>	
										<?php $p++; } # end foreach
									} #end not null 
									else {
										echo "<span class='text-danger'> No Category Type Yet </span>";
									}
									
								?>
								</ul>
                              </div> 
                            </div> <!-- ./ row -->
                          </div>  <!-- ./ card-body -->
						   <!-- new sub item category -->
							<button onclick="create_new_brand_categ_type($(this).attr('data-text'))" data-toggle="modal" data-target="#brand_categ_type_modal" data-text="<?php echo $categ."|".$brands['sn'][$n]."|".$brand_categs['sn'][$m]; ?>" type="button" class="btn btn-info  btn-sm"> <i class="fa fa-plus"> </i> &nbsp; New <?php echo $categ; ?>  Type </button>
							&nbsp;&nbsp;  <small class="pull-right pointer label label-primary" onclick="manage_brand_categ($(this).attr('data-text'))" data-text="<?php echo $categ."|".$brands['sn'][$n]."|".$brand_categs['sn'][$m]; ?>" data-toggle="modal" data-target="#brand_categ_modal"> [edit categ]  <?php echo $categ; ?>  <span class="pointer fa fa-pencil font-20 text-warning"> </span> </small> 
                        </div> <!-- ./ collapse -->
                      </div>  <!-- ./ card -->
					  
					  <?php 
							$m++; } ## end foreach categ
						} ## end categ not null 
					  ?>
					   
					  
					  <!-- new set of brand in the accordion -->
					  <button onclick="create_new_brand_categ($(this).attr('data-text'))" data-toggle="modal" data-target="#brand_categ_modal" type="button" data-text="<?php echo $categ."|".$brands['sn'][$n]; ?>" class="btn btn-success"> <i class="fa fa-plus"> </i> &nbsp; New <?php echo $brand; ?> Category </button>
					  
                    </div> <!-- ./ accordion -->
                  </div> <!-- ./ main-card-body -->
                </div> <!-- ./ main-card -->
			</div> <!-- ./ col-md-6 -->
				 
		<?php 
			$n++; 
			} ## end foreach brands 
		} ## end not null for brands  ?>