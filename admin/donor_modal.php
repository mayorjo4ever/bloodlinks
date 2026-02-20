<!-- Modal 7 for new Laboratory Test category form  -->
<div style="z-index:-999px" class="modal fade" id="donorHistory" tabindex="-1" role="dialog" aria-labelledby="donorHistorySample" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> <span class="username"></span>My Donation History  &nbsp; &nbsp; <i class="fa fa-calendar"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:245px;">
            <div class="row">
               <div class="col-lg-12 col-sm-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; min-height:230px;">
                       
                        <div class="my_donor_history mt-4">
                           <span class="fa fa-spinner fa-spin fa-3x"></span>
                        </div>

                     </div>
                     <!-- ./  card-body --> 
                  </div>
               </div>
            </div>
         </div>
         <!-- ./ modal body -->
         <div class="modal-footer">
            <center>
               <button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer --> 
      </div>
      <!-- ./ modal-content -->
   </div>
</div>

<!-- Modal 2 for adding new remarks  -->
<div style="z-index:-999px" class="modal fade" id="add_update_remarks" tabindex="-1" role="dialog" aria-labelledby="add_update_remarks" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> <span class="username"></span> Customer's Remarks For Donation&nbsp; &nbsp; <i class="fa fa-comments"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; min-height:245px;">
            <div class="row">
               <div class="col-lg-6 col-sm-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; min-height:230px;">
                       
                        <div class="form-row mt-4">
                           <div class="col-sm-8">
                              <label> Enter Remark </label>
                              <input type="text" class="form-control border-primary" name="remark" id="remark" placeholder="e.g. Low PCV, Out of Ilorin, etc" />
                              <input type="hidden" name="remark_mode" id="remark_mode" value="new" />
                           </div>
                           <div class="col-sm-4 mt-4 pt-2">
                              <button type="button" class="btn btn-info btn-lg save_remark ladda-button" data-style="expand-right" onclick="save_remarks()"> Save Remarks </button>
                           </div>

                        </div>

                     </div>
                     <!-- ./  card-body --> 
                  </div>
               </div>  <!-- ./ col-lg-6 -->

                <div class="col-lg-6 col-sm-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; min-height:230px;">
                       
                        <div class="remark_lists mt-4">
                           <span class="fa fa-spinner fa-spin fa-3x"></span>
                        </div>

                     </div>
                     <!-- ./  card-body --> 
                  </div>
               </div> <!-- ./ col-lg-6 -->

            </div>
         </div>
         <!-- ./ modal body -->
         <div class="modal-footer">
            <center>
               <button type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer --> 
      </div>
      <!-- ./ modal-content -->
   </div>
</div>

<!-- Modal 3 for selecting remarks  -->
<div style="z-index:-999px" class="modal fade" id="select_remarks" tabindex="-1" role="dialog" aria-labelledby="select_remarks" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> <span class="username"></span> Customer's Remarks For Donation&nbsp; &nbsp; <i class="fa fa-comments"> </i> </h4>
         </div>
         <div class="modal-body mb-1 pb-1" style="margin-top:0px; padding-top:0px; min-height:245px;">
            <div class="row">
               <div class="col-lg-12 col-sm-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; min-height:230px;">
                       
                        <div class="form-row mt-4">
                           <div class="col-sm-12" id="remark_select">
                             
                           </div>
                           <div class="col-sm-4 mt-4 pt-2">
                              <button type="button" class="btn btn-info btn-lg update_customer_remark ladda-button" data-style="expand-right" onclick="update_customer_remark()"> Save Remarks </button>
                           </div>

                        </div>

                     </div>
                     <!-- ./  card-body --> 
                  </div>
               </div>  <!-- ./ col-lg-12 -->

                

            </div>
         </div>
         <!-- ./ modal body -->
         <div class="modal-footer mt-1 pt-1">
            <center>
               <button type="button" onclick="filterDonors()" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer --> 
      </div>
      <!-- ./ modal-content -->
   </div>
</div>