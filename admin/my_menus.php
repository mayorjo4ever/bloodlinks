		<!-- 
		<div class="col-md-12 grid-margin stretch-card float-left">
			<p class="btn btn-block table-primary bold text-capitalize"> my page menu </p>
		</div> -->
		
		<?php foreach($_SESSION['mypages']['url'] as $url){ 
			$page_info = $pmg->page_info($url);
					if( $page_info['autoload']=='yes') {
		?>
		
		<div class="col-md-4 grid-margin stretch-card float-left">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-top">
                    <a class="unstyle text-muted" href="<?php echo $url; ?>" target="_blank">
						<i class="<?php echo $page_info['icon']?> icon-md"></i>
						<div class="ml-3">
						  <h6 class="text-facebook bold"> <?php echo $page_info['title']; ?>  </h6>
						  <p class="mt-2 text-muted card-text text-capitalize"> <i class="fa fa-map-marker"> </i> &nbsp; visit page now </p>
					  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		 
		<?php }  # end autoload 
		 } #end foreach 
		?>  