
<div style="z-index:-999px" class="modal fade" id="newBloodTypeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Add / Update Blood Type &nbsp; &nbsp; <i class="fa fa-filter"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:235px;">
            <div class="row">
               <div class="col-lg-12 col-lg-offset grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; height:230px;">
                        <form method = "post">
                           <div class="col-md-12" style="height:100px; float:left; " >
                              <p> &nbsp; </p>
                              
                              <div class="form-group" id="fm1" title="Blood Type ">
                                 <label class="bold text-info ">Blood Type </label> 
                                 <div class="input-group border-1">
         									<input type="hidden" id="save_mode" value="new" />
         									<input type="hidden" id="uid" value="" />
         									
                                    <input style="font-size:16px; height:45px;" type="text" id="btype" class="form-control border border-primary" placeholder="Blood Type : e.g A+ | B+ | 0+" data-toggle="tooltip" data-displacement="top" title="Blood Type : e.g e.g A+ | B+ | 0+" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-user text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="roleMsg"> </span>
                              </div>
                              <!-- ./  form-group -->

                              <div class="form-group" id="fm1" title="Sales Price">
                                 <label class="bold text-info "> Sales Price</label> 
                                 <div class="input-group border-1">
                                   <input style="font-size:16px; height:45px;" type="number" id="bloodprice" class="form-control border border-primary" placeholder="e.g 20,000 " data-toggle="tooltip" data-displacement="top" title="Sales Price" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-money text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="salesPriceMsg"> </span>
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
               <button  onclick="window.location.reload" type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
               <button mode="new" type="button" class="btn btn-primary btn-lg btn-rounded ladda-button creators saveBloodType" data-style="expand-right" name="saveBloodType" id="saveBloodType"> Save Blood Type &nbsp; <i class="fa fa-save"> </i>  </button>
               <button mode="update" type="button" class="btn btn-warning btn-lg btn-rounded ladda-button updators saveBloodType" data-style="expand-right" name="updateBloodType" id="updateBloodType"> Update  Blood Type &nbsp; <i class="fa fa-save"> </i>  </button>								
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer -->
      </div>
      <!-- ./ modal-content -->
   </div>
</div>
<!-- *********************************************************************************** -->	



<div style="z-index:-999px" class="modal  fade" id="BloodTestQtnForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered  modal-lg" style="width:50%" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Add / Update Blood Test Question / Answers  &nbsp; &nbsp; <i class="fa fa-filter"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px;">
            <div class="row">
               <div class="col-lg-12 col-lg-offset grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px;">
                        <form method = "post">
                           <div class="col-md-12" style=" float:left; " >
                              <p> &nbsp; </p>
                              <div class="form-group" id="fm1" title="Type of Test ">
                                 <label class="bold text-info "> Type of Test </label> 
                                 <div class="input-group border-1">
									<input type="hidden" id="test_save_mode" value="new" />
									<input type="hidden" id="test_uid" value="" />
									
                                    <input style="font-size:16px; height:45px;  font-size:20px" type="text" id="test_qtn" class="form-control border border-primary" placeholder="Type of Test  : e.g HIV Rapid Test,   Hepatitis B & C" data-toggle="tooltip" data-displacement="top" title="Type of Test  : e.g HIV Rapid Test,  Hepatitis B & C" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-pencil text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="test_qtnMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
							  
							   <div class="form-group" id="fm1" title="Possible Answer Type ">
                                 <label class="bold text-info "> Possible Answer Type  </label> 
                                 <div class="input-group"> 
										<div class="icheck ml-2 p-2 "> <label class="control-label" style="font-size:20px"> <input type="radio" name="answer_type" value="bitwise" class="radio answer_type" />&nbsp;  True / False  </label> </div>
										<div class="icheck ml-2 p-2 "> <label class="control-label" style="font-size:20px"> <input type="radio" name="answer_type" value="filling" class="radio answer_type" />&nbsp;  Fill In Answers  </label> </div>
                                 </div>
                                 <span class="test_typeMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
							  
							  <div class="form-group truefalse p-2" title="Response if True">
                                 <label class="bold text-info "> Response if True </label> 
                                 <div class="input-group border-1">
									
                                    <input style="font-size:16px; height:45px;  font-size:20px" type="text" id="resp1" name="resp1" class="form-control border border-primary" placeholder="e.g Reactive, Positive" data-toggle="tooltip" data-displacement="top" title="" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-pencil text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="test_qtnMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
							  
							    
							  <div class="form-group truefalse p-2" title="Response if True">
                                 <label class="bold text-info "> Response if Not True </label> 
                                 <div class="input-group border-1">
									
                                    <input style="font-size:16px; height:45px;  font-size:20px" type="text" id="resp2" name="resp2" class="form-control border border-primary" placeholder="e.g Not Reactive, Negative" data-toggle="tooltip" data-displacement="top" title="" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-pencil text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="test_qtnMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
							  
							  <div class="form-group fillings p-2" title="Response if True">
                                 <label class="bold text-info "> Alternative Fill In Answer </label> 
                                 <div class="input-group border-1">
									
                                    <input style="font-size:16px; height:45px;  font-size:20px" type="text" id="fillans" name="fillans" class="form-control border border-primary" placeholder="e.g Any Observation " data-toggle="tooltip" data-displacement="top" title="" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-pencil text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="test_qtnMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
                             
                           </div>
                           <!-- ./  col-md-12-->				  
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
               <button  onclick="window.location.reload" type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
               <button mode="new" type="button" class="btn btn-primary btn-lg btn-rounded ladda-button creators saveBloodTestType" data-style="expand-right" name="saveBloodTestType" id="saveBloodTestType"> Save Blood Test Questions &nbsp; <i class="fa fa-save"> </i>  </button>
               <button mode="update" type="button" class="btn btn-warning btn-lg btn-rounded ladda-button updators saveBloodTestType" data-style="expand-right" name="updateBloodTestType" id="updateBloodTestType"> Update  Blood Test Questions &nbsp; <i class="fa fa-save"> </i>  </button>								
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer -->
      </div>
      <!-- ./ modal-content -->
   </div>
</div>
<!-- *********************************************************************************** -->	 

<div style="z-index:-999px" class="modal fade" id="newBloodTestCategForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Add / Update Blood Test Category &nbsp; &nbsp; <i class="fa fa-filter"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:235px;">
            <div class="row">
               <div class="col-lg-12 col-lg-offset grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; height:230px;">
                        <form method = "post">
                           <div class="col-md-12" style="height:auto; float:left; " >
                              <p> &nbsp; </p>
                              <div class="form-group" id="fm1" title="Role Name">
                                 <label class="bold text-info ">Category Name </label> 
                                 <div class="input-group border-1">
                           <input type="hidden" id="btcateg_save_mode" value="new" />
                           <input type="hidden" id="btcateg_id" value="" />
                           
                                    <input style="font-size:16px; height:45px;" type="text" id="btcateg"  name="btcateg" class="form-control border border-primary" placeholder="e.g Rapid Screening" data-toggle="tooltip" data-displacement="top" title="e.g e.g Rapid Screening" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-user text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="btcategMsg"> </span>
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
               <button  onclick="window.location.reload" type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
               <button mode="new" type="button" class="btn btn-primary btn-lg btn-rounded ladda-button creators saveBloodTestCateg" data-style="expand-right" name="saveBloodTestCateg" id="saveBloodType"> Save Blood Test Category &nbsp; <i class="fa fa-save"> </i>  </button>
               <button mode="update" type="button" class="btn btn-warning btn-lg btn-rounded ladda-button updators saveBloodTestCateg" data-style="expand-right" name="updateBloodTestCateg" id="updateBloodTestCateg"> Update  Blood Test Category &nbsp; <i class="fa fa-save"> </i>  </button>                       
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer -->
      </div>
      <!-- ./ modal-content -->
   </div>
</div>
<!-- *********************************************************************************** --> 
