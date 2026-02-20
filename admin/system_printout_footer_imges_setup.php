<div class="row">
   <div class="col-md-1 float-left ">  &nbsp;</div>
   <div class="col-md-11 float-left ">
      <div class="card border border-primary">
         <div class="card-body">
            <div class="row">
                <?php $bg_image = $dbm->resort($dbm->getFields($dbm->select('system_info',array('')),array('footer_image','header_image'))); ?>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data"> 
                  <div class="col-md-12 text-capitalize" style="float:left;">
                     <div class="form-group row selection">
                        <label for="title" class="col-sm-3 col-form-label mt-4"> Image Attached <br/>  <br/>(700 x 60) <span class="text-danger bold">*</span> </label>
                        <div class="col-sm-9">
                           <p style="height:135px;" class="bg-header"><img src="<?php echo '../assets/images/'.$bg_image['footer_image']; ?>" alt="<?php echo $bg_image['footer_image']; ?>"/></p>
                        </div>
                        <!-- ./ col-sm-9 -->
                     </div>
                     <!-- ./ form-group -->
                     <div class="col-md-8 offset-4 pt-3" style="float:left;">
                        <div class="input-group row selection">									
                            
                            <input type="hidden" name="field" value="footer_image"> 
                            <input style="font-size: 16px;" type="file" name="imagefile" class="form-control border-primary" required=""> 
                           <button  type="submit" class="btn btn-info btn-lg btn-rounded ladda-button creators w-50" data-style="zoom-in" name="changeBgImage" id="changeFootImage"> Change Footer &nbsp; <i class="fa fa-image"> </i>  </button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- ./ col-md-6 -->	
   </div>
   <!-- ./ row -->
</div>
<!-- ./ row -->
