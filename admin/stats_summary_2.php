	<?php for($m = 1; $m<5; $m++){ ?>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="fa fa-user text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right bold"> Awaiting Patients </p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"> <strong> <span class="doc_awaiting_patient"> 0 </span> </strong> </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0 text-center">
                   <a href="#" class="green bold font-16"> <i class="fa fa-clock-o mr-1" aria-hidden="true"> </i> <?php echo readTime(344);?> ago </a>
                  </p>
                </div>
              </div> <!-- ./ card -->
            </div> <!-- ./ col-xl-3 col-lg-3  --> 
			 
	<?php } ?>