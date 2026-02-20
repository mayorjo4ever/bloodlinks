<!-- Modal 7 for new Laboratory Test category form  -->
<div style="z-index:-999px" class="modal fade" id="billCategForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Add / Update Bill Category  &nbsp; &nbsp; <i class="fa fa-money"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:245px;">
            <div class="row">
               <div class="col-lg-12 col-lg-offset grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; height:230px;">
                        <form method = "post">
                           <span class="bold font-16 text-danger">  </span> <br/> 
                           <div class="col-md-12" style="height:100px; float:left; " >
                              <div class="form-group" id="fm20">
                                 <label class="bold text-info text-capitalize"> Department </label> 
                                 <div class="input-group " title=" Department ">
                                    <select class="form-control border border-primary" style="font-size:16px; height:45px;" name="bill_dept_id" id="bill_dept_id">
                                       <option value="">...</option>
                                    </select>
                                    <div class="input-group-append">
                                       <span class="input-group-text border-primary" style="height:45px;">
                                       <i class="fa fa-money text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="bill_dept_idMsg"> </span>
                              </div>
                              <!-- ./  form-group --> 
                              <div class="form-group" id="fm20">
                                 <label class="bold text-info text-capitalize"> &nbsp; <i class="fa fa-plus"> </i> &nbsp;&nbsp; Bill Category </label> 
                                 <div class="input-group " title="Bill Category ">
                                    <input style="font-size:16px; height:45px;" value="" autocomplete="false" type="text" id="billCateg" name="billCateg"  class="form-control border border-primary" placeholder="Immunology, e.t.c">
                                    <div class="input-group-append">
                                       <span class="input-group-text border-primary" style="height:45px;">
                                       <i class="fa fa-pencil text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="billCategMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
                           </div>
                           <!-- ./  col-md-4-->				  
                        </form>
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
               <button mode="new" type="button" class="btn btn-primary btn-rounded ladda-button creators" data-style="expand-right" name="saveBillCateg" id="saveBillCateg"> Add Bill Category &nbsp; <i class="fa fa-plus"> </i>  </button>
               <button mode="update" type="button" class="btn btn-warning btn-rounded ladda-button updators" data-style="expand-right" name="updateBillCateg" id="updateBillCateg"> Update Bill Category &nbsp; <i class="fa fa-save"> </i>  </button>
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer --> 
      </div>
      <!-- ./ modal-content -->
   </div>
</div>