<div class="row">
   <div class="col-md-2 " style="float:left;">
      <center class="bold">
         <i class="mdi mdi-account-plus text-info fa-4x"></i>  
         <br/> Customer details  
      </center>
   </div>
   <div class="col-md-10 " style="float:left;">
      <div class="card border border-primary">
         <div class="card-body">
            <form method="post">
               <div class="row">
                  <div class="col-md-12" style="float:left;">
                     <div class="form-group row selection">
                        <label for="title" class="col-sm-3 col-form-label"> Search Customer Details  <span class="text-danger bold">*</span> </label>
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
                           <button mode="<?php echo $_SESSION['ticket_mode']; #new/update ?>" for="<?php echo $_SESSION['ticket_no'] ?? ""; #new/update ?>" type="button" class="btn btn-info btn-lg btn-rounded ladda-button creators" data-style="zoom-in" name="save_custom_profile" id="search_profile"> Continue &nbsp; <i class=" fa fa-search "> </i>  </button>
                           &nbsp; &nbsp;
                           <button mode="<?php echo $_SESSION['ticket_mode']; #new/update ?>" for="<?php echo $_SESSION['ticket_no'] ?? ""; #new/update ?>" type="button" class="btn btn-success btn-lg btn-rounded ladda-button creators" data-style="zoom-in" name="new_custom_profile" id="new_custom_profile"> Create New Customer &nbsp; <i class=" fa fa-user-plus "> </i>  </button>
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
