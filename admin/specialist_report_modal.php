<!-- *********************************************************************************** -->	 
<div style="z-index:-999px" class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width:50%">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Make A Report  &nbsp; &nbsp; <i class="fa fa-comment"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:auto;">
            <div class="row">
               <div class="col-md-12" style="float:left;">
                  <div class="card ">
                     <div class="card-body">
                        <form method="post">
                           <span class="h4 text-capitalize"> Comment on this report  </span>
                           <hr/>
                           <div class="form-group row">
                              <label for="title" class="col-sm-4 col-form-label bold"> Select Test Type </label>
                              <div class="col-sm-8">
                                  <input type="hidden" name="ticket_no" id="ticket_no" value="<?php echo $ticket_no; ?>"  />
                                  <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>"  />
                                 <select  class="form-control border-primary font-16 text-dark" id="bill_id"  name="bill_id" title="Select Test Sample ">
                                    <?php foreach($specimens['bill_type_id'] as $bill_id){  ?>
                                    <option value="<?php echo $bill_id; ?>"><?php echo getBillName($bill_id); ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <!-- ./ col-sm-9 -->
                           </div>
                           <!-- ./ form-group -->
                           <div class="form-group row">
                              <label for="title" class="col-sm-4 col-form-label bold">Your Message  </label>
                              <div class="col-sm-8">
                                 <textarea class="form-control border border-primary font-16" id="message" name="message" rows="10" placeholder="Type Your Report / Observation / Advise Here"></textarea>
                              </div>
                              <!-- ./ col-sm-9 -->
                           </div>
                           <!-- ./ form-group -->
                           <label for="title" class="col-sm-4 col-form-label bold">&nbsp;  </label>
                           <button type="submit" id="save_specialist_report" class="creators btn btn-primary btn-block btn-lg btn-rounded ladda-button" data-style="expand-right">Save Report &nbsp; <i class="fa fa-comment"> </i> </button>                 
                        </form>
                     </div>
                     <!-- ./ card-body -->
                  </div>
                  <!-- ./ card --> 
               </div>
               <!-- ./ col-md-12 -->
            </div>
            <!-- ./ row -->
         </div>
         <!-- ./ modal body -->
      </div>
      <!-- ./ modal-content -->
   </div>
</div>
<!-- *********************************************************************************** -->
