 <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
<div style="z-index:-999px" class="modal fade" id="billPaymentForm" tabindex="-1" role="dialog" aria-labelledby="billPaymentForm" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" style="width:60%" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Make Payment  &nbsp; &nbsp; <i class="fa fa-money"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:auto;">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                         <form method="post">
                         <table class="table table-sm table-responsive table-striped"> 
                            <tbody>
                            <tr>
                               <td style="width: 25%" class="table-primary h4 text-right bold">Customer Info   </td>
                              <td colspan="3">
                                 <div class="bold">
                                    <span class="customer_name h4"> .. </span>
                                 </div>
                              </td>
                           </tr>
						   <tr class="mt-0 mb-0 pt-0 pb-0">
                              <td class="table-primary bold text-right"> Total Fees:   &nbsp;<span class=" fa fa-money"> </span></td>
                              <td style="width: 25%">
                                 <div class="bold">
                                     <span class="tot_fee h3"> 0 </span> 
                                </div>
                              </td>
                              <td style="width:20%" class="table-primary bold text-right"> Initial Pay:   &nbsp;<span class=" fa fa-money"> </span></td>
                              <td style="width:30%" class="mt-0 mb-0 pt-0 pb-0">
                                <div class="bold">
                                     <span class="init_pay h3"> 0 </span> 
                                </div>
                              </td>
                           </tr>
                           <tr class="mt-0 mb-0 pt-0 pb-0">
                               <td style="width: 20%" class="table-primary bold text-right"> Discount:   &nbsp;<span class=" fa fa-money"> </span></td>
                              <td style="width: 30%" class="mt-0 mb-0 pt-0 pb-0">
                                <input type="text" min="0" onchange="calc_remains($('#discount'))" onkeyup="calc_remains($('#discount'))" tot_fee="" init_pay="" id="discount" name="discount" value="0" placeholder="Discount" class="form-control font-18 bold only-numeric border-primary"  />
                              </td>
							  <td class="table-primary bold text-right">Balance:   &nbsp;<span class=" fa fa-money"> </span></td>
                              <td style="width: 25%">
                                 <div class="bold">
                                     <span class="balance h3"> 0 </span> 
                                </div>
                              </td>
                             
                           </tr>
                           <tr>
                              <td class="table-primary bold text-center"> Method of Payment &nbsp;<span class=" fa fa-money"> </span> </td>
                              <td colspan="3">
                                 <div class="form-group form-group-inline" style="margin-top:1px;  padding:1px 10px 1px 1px; margin-bottom:1px; ">
                                    <div class="col-md-12 row pb-2">
                                       <label class="label-control col-md-2 pt-3"> 
                                       <input type="checkbox" class="form-check-primary mop" value="cash" onclick="calc_amounts()" />&nbsp;&nbsp;Cash
                                       </label>
                                       <div class="col-md-5"><!-- paid by cash  -->
                                           <input type="text" min="0" name="pbcash" id="pbcash" onkeyup="reval($(this))" placeholder="Amount" class="form-control mop font-18 bold only-numeric border-primary"  />
                                       </div>
                                       <div class="col-md-5">
                                           <select style="display:none;" class="form-control input-lg account_form" disabled>  </select>
                                       </div>
                                    </div>
                                    <div class="col-md-12 row pb-2"><!-- paid by pos  -->
                                      <label class="form-check-label col-md-2  pt-3"> 
                                       <input type="checkbox" class="form-check-primary mop" value="pos" onclick="calc_amounts()" />&nbsp;&nbsp;POS
                                       </label>
                                       <div class="col-md-5">
                                           <input type="text" min="0" name="pbpos" id="pbpos" onkeyup="reval($(this))" placeholder="Amount" class="form-control mop font-18 bold only-numeric  border-primary "  />
                                       </div> 
                                       <div class="col-md-5">
                                          <select class="form-control account_form select-lg  font-16 border-primary">  </select>
                                       </div>
                                    </div>
                                     
                                    <div class="col-md-12 row pb-2"><!-- paid by transfer  -->
                                       <label class="label-control col-md-2  pt-3"> 
                                       <input type="checkbox" class="form-check-primary  mop" value="transfer" onclick="calc_amounts()" />&nbsp;&nbsp;Tranfer
                                       </label>
                                       <div class="col-md-5">
                                           <input type="text" min="0" name="pbtrans" id="pbtrans"  onkeyup="reval($(this))"[ placeholder="Amount" class="form-control mop font-18 bold only-numeric  border-primary" />
                                       </div>
                                       <div class="col-md-5">
                                          <select class="form-control account_form select-lg  font-16  border-primary">  </select>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="toprint" > <!-- style="display:none;" -->
                              <td class="table-primary bold text-right"> Auto Finalize Payment &nbsp; </td>
                              <td colspan="1">  <label class="label-control   pt-3"> 
										<input id="auto_finalize" type="checkbox" class="form-check-primary" value="yes" checked />&nbsp;&nbsp; Finalize
									</label>
                              </td>
							   <td colspan="2">
                                        <button onclick ="make_payment()" id="generate_receipt" name="generate_receipt" class="btn btn-rounded btn-success ladda-button btn-lg  pull-right" data-style="expand-right"> Pay <span class="final_pay"></span> &nbsp; <i class="fa fa-money"> </i> </button> &nbsp; &nbsp; 
                                        <button type="button" onclick="window.location.reload()" class="btn btn-secondary btn-rounded btn-lg pull-right" data-dismiss="modal">Close&nbsp;<i class="fa fa-times"></i></button>                                        
                                    </td>
                           </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                   
                                </tr>
                            </tfoot>
                        </table></form>
                     </div>
                  </div>
                  <!-- ./ row -->
               </div>
               <!-- ./ card-body -->
            </div>
         </div>
      </div>
      <!-- ./ modal body -->
   </div>
   <!-- ./ modal-content -->
</div>
<!-- *********************************************************************************** -->

<div style="z-index:-999px" class="modal fade" id="invoicePaymentForm" tabindex="-1" role="dialog" aria-labelledby="billPaymentForm" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" style="width:90%" role="document">
      <div class="modal-content">
          <div class="modal-header"> 
              <div class="pull-left">  <h4 class="modal-title bold text-info text-center text-capitalize"> Add To Invoice  &nbsp; &nbsp; <i class="fa fa-money"> </i></h4> </div>
              <div class="pull-right"><button type="button" class=" btn btn-danger  btn-rounded" data-dismiss="modal" onclick="window.location.reload()"> Close &nbsp; <i class="fa fa-close"> </i>  </button> </div>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:auto;">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                         <form method="post">
                             <div class="invoice_body">
                                 
                             </div>
                         </form>
                     </div>
                  </div>
                  <!-- ./ row -->
               </div>
               <!-- ./ card-body -->
            </div>
         </div>
      </div>
      <!-- ./ modal body -->
   </div>
   <!-- ./ modal-content -->
</div>
<!-- *********************************************************************************** -->

