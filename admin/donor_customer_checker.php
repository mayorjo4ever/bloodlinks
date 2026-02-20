<?php require_once "../vendor/autoload.php";   use Carbon\Carbon;  ?>

<div class="row">
   <div class="col-md-2 " style="float:left;">
      <center class="bold">
         <i class="mdi mdi-account-plus text-info fa-4x"></i>  
         <br/> Search Customer  
      </center>
   </div>
   <div class="col-md-10 " style="float:left;">
      <div class="card border border-primary">
         <div class="card-body">
            <form method="post">
               <div class="row">
                  <div class="col-md-12 step-1" style="float:left;">
                     <div class="form-group row selection">
                        <span for="title" class="col-sm-3 h4"> Search Donator <span class="text-danger bold">*</span> </span>
                        <div class="col-sm-9">
                           <div class="input-group">
                              <input style="font-size:14px; height:45px;" type="text" id="profile_checker" name="profile_checker" value="<?php // echo $prev_rec['surname'] ?? ""; ?>" class="form-control border-primary newuserform" placeholder=" Search With Fullname /  Customer ID "> 
                              <div class="input-group-append"><span class="surname_text input-group-text border border-primary"><i class="surname_icon  fa fa-search "></i></span> </div>
                           </div>
                        </div>
                        <!-- ./ col-sm-9 -->
                     </div>
                     <!-- ./ form-group -->
                    <div class="form-group row searching">
                        <div class="form-group col-md-8 offset-2">
                               <ul class="num_list2 list-inline2"></ul>
                        </div>	
                  </div> <!-- ./ form-group --> 
                  
                  <div class="search_result"></div>
                  
                     <div class="col-md-9 offset-3" style="float:left;">
                        <div class="form-group row selection">
                           <button mode="<?php echo $_SESSION['ticket_mode'] ?? "new"; #new/update ?>" for="<?php echo $_SESSION['ticket_no'] ?? ""; #new/update ?>" type="button" class="btn btn-info btn-lg btn-rounded ladda-button creators" data-style="zoom-in" name="save_custom_profile" id="search_profile"> Continue &nbsp; <i class=" fa fa-search "> </i>  </button>
                           &nbsp; &nbsp;
                           <button mode="<?php echo $_SESSION['ticket_mode']  ?? "new";; #new/update ?>" for="<?php echo $_SESSION['ticket_no'] ?? ""; #new/update ?>" type="button" class="btn btn-success btn-lg btn-rounded ladda-button creators" data-style="zoom-in" name="new_custom_profile" id="new_custom_profile"> Create New Customer &nbsp; <i class=" fa fa-user-plus "> </i>  </button>
                        </div>
                     </div>
                  </div> <!--  end step 1 -->


                   <div class="col-md-12 step-2" style="float:left;">
                        <span class="h4 mb-4"> Step 2 - Confirm Donator details </span>
                          <input type="hidden" name="customer_id" id="customer_id" />                                                
                        <table class="table font-weight-bold mt-3">
                           <tr> <td class="table-info"> Customer Name </td><td><span class="customer_name"></td>
                                <td class="table-info"> Customer ID </td><td><span class="customer_id"></td></tr>
                           <tr> <td class="table-info"> Contact Number  </td><td><span class="customer_phone"></td>
                                <td class="table-info"> Gender</td><td><span class="customer_gender"></td></tr>
                           <tr> <td class="table-info"> Blood Type  </td><td><span class="customer_blood_type"></td>
                                <td class="table-info"> Last Donation Date</td><td><span class="customer_last_donation_date"></td></tr>
                        </table>

                         <div class="col-md-12 mt-4" style="float:left;">
                           <div class="form-group row selection">
                              <button  type="button" class="btn btn-success btn-lg btn-rounded ladda-button creators" data-style="zoom-in" onclick="toStep3()"> Approve /  Continue &nbsp; <i class=" fa fa-check "> </i>  </button>
                              &nbsp; &nbsp;
                              <button  type="button" class="btn btn-secondary btn-lg btn-rounded ladda-button creators" onclick="stepBack()"> Back  &nbsp; <i class=" fa fa-times "> </i>  </button>
                           </div>
                     </div>                        
                   </div> <!--  end step 2 -->

                    <div class="col-md-12 step-3" style="float:left;">
                        <span class="h4 mb-4"> Step 3 - Record The Blood Donation -  </span> 
                        <span class="h4 mb-4 customer_id pull-right badge ml-2  badge-info font-18"></span>  <span class="h4 mb-4 customer_name pull-right ml-4 badge badge-info font-18"></span>
                                                    
                          <div class="col-md-12 mt-3 pt-3" style="float:left;">
                            <div class="form-group form-row  font-weight-bold">   
                              <span class="h5 font-weight-bold"> Blood Type? </span>
							  
							  <?php $blood_types = $dbm->select('blood_types',['']);  
								if(!empty($blood_types)):
									foreach($blood_types as $blood_type) :  
							  ?>
                              <div class="icheck ml-2 p-2 "> <label class="control-label" style="font-size:20px"> <input type="radio" name="blood_type" value="<?php echo $blood_type['name'];?>" class="radio blood_type" />&nbsp; <?php echo $blood_type['name'];?> </label> </div>
                               <?php endforeach; 
								endif; 
							?>						 
                              
                          </div> 

                          <div class="form-group form-row  bold">   
                            <span class="col-sm-4 h5 font-weight-bold">Blood Cell Volume? </span>
                              <div class="col-sm-6">
                                <div class="input-group">
                                   <input required="" style="font-size:14px; height:45px;" type="text" id="cell_volume" name="cell_volume" value="" class="form-control border-primary" placeholder="Blood Cell Volume Recieved "> 
                                   <div class="input-group-append"><span class="input-group-text border border-primary"><i class="cell_volume_icon  mdi mdi-cup "></i></span> </div>
                                </div>
                             </div>
                             <!-- ./ col-sm-9 -->
                           </div>

                            <div class="form-group form-row  bold">   
                            <span class="col-sm-4 h5 font-weight-bold">Date / Time Received? </span>
                              <div class="col-sm-6">
                                <div class="input-group">
                                   <input required="" style="font-size:14px; height:45px;" type="text" id="date_collected" name="date_collected" value="<?php echo Carbon::now();  ?>" class="form-control datetimepicker border-primary" placeholder="Date / Time Received "> 
                                   <div class="input-group-append"><span class="input-group-text border border-primary"><i class="date_collected_icon  fa fa-calendar "></i></span> </div>
                                </div>
                             </div>
                             <!-- ./ col-sm-9 --> 
                           </div>

                          </div>  

                         <div class="col-md-12 mt-4" style="float:left;">
                           <div class="form-group row selection">
                              <button  type="button" class="btn btn-success btn-lg btn-rounded ladda-button creators" data-style="zoom-in" name="save_donor_supply" id="save_donor_supply"> Safe and Complete &nbsp; <i class=" fa fa-check "> </i>  </button>
                              &nbsp; &nbsp;
                              <button  type="button" class="btn btn-secondary btn-lg btn-rounded ladda-button creators" onclick="stepBack2()"> Back  &nbsp; <i class=" fa fa-times "> </i>  </button>
                           </div>
                     </div>                        
                   </div> <!--  end step 2 -->



            </form>
            </div>		
         </div>
      </div>
      <!-- ./ col-md-6 -->	
   </div>
   <!-- ./ row -->
</div>
<!-- ./ row -->
