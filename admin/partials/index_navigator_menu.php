<div class="row">
   <div class="col-lg-12 col-md-12">
      <ul class="nav nav-tabs tab-solid tab-solid-success tab-seperated bold" role="tablist">
         <li class="nav-item btn btn-primary"> Quick Menu &nbsp;&nbsp;&nbsp;<i class="icon-arrow-right"></i> </li>
         <?php 
            ####################################################
            ## list all sub-group headers 
             if(!is_null($_SESSION['mysubpages']))foreach ($_SESSION['mysubpages']['groupid'] as $ph){ // page header  				  
            	$groupinfo = $admin->page_group_info($ph); 					 
            	?> &nbsp;&nbsp;&nbsp;
         <li class="nav-item ">
            <a class="nav-link" id="<?php echo $ph; ?>" data-toggle="tab" href="<?php echo "#tab-$ph";?>" role="tab" aria-controls="<?php echo "tab-$ph";?>" aria-selected="false"> <?php echo $groupinfo['groupname'];?>  </a>
         </li>
         <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
         <?php } ?>		  
      </ul>
      <div class="tab-content tab-content-solid">
         <?php 
            if(!is_null($_SESSION['mysubpages']))foreach ($_SESSION['mysubpages']['groupid'] as $ph){ // page header
            $subpages = $admin->get_sub_pages($myroles['role_id'][0],$ph); ## by role-id										
            	?> 
         <div class="tab-pane fade " id="<?php echo "tab-$ph";?>" role="tabpanel" aria-labelledby="<?php echo "tab-$ph";?>">
            <div class="row">
               <?php foreach($subpages['url'] as $url) {
                  $page_info = $pmg->page_info($url);
                  if( $page_info['autoload']=='yes') { ?>
               <!-- <li class="nav-item ">
                  <a class="nav-link " href="<?php echo $url; ?>"> <?php echo $page_info['title']; ?> </a>
                   </li>	-->
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
               <?php	} ## end if page is to be autoload 
                  } # end foreach sub ?> 
            </div>
            <!-- ./ row -->
         </div>
         <!-- ./ tab-pane -->
         <?php } ?>
      </div>
      <?php #  print_r($_SESSION['mysubpages']); 
         # if($_SESSION['my_default_role']=="superb")
         # require "my_menus.php"; 
         ?>  
   </div>
   <!-- ./ col-lg-8 -->  
</div>
<!-- ./ row -->
