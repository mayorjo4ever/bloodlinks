<!-- Modal  for new Laboratory Test category form  -->
<div style="z-index:-999px" class="modal fade" id="newRoleForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Add / Update Roles &nbsp; &nbsp; <i class="fa fa-user"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:235px;">
            <div class="row">
               <div class="col-lg-12 col-lg-offset grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; height:230px;">
                        <form method = "post">
                           <div class="col-md-12" style="height:100px; float:left; " >
                              <p> &nbsp; </p>
                              <div class="form-group" id="fm1" title="Role Name">
                                 <label class="bold text-info ">  Role Name </label> 
                                 <div class="input-group border-1">
                                    <input style="font-size:16px; height:45px;" type="text" id="role" class="form-control border border-primary" placeholder="Role : e.g Super Admin" data-toggle="tooltip" data-displacement="top" title="Role : e.g Super Admin" >
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-user text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="roleMsg"> </span>
                              </div>
                              <!-- ./  form-group -->
                              <div class="form-group" id="fm2" title="Role ID ">
                                 <label class="bold text-info "> Short Name </label> 
                                 <div class="input-group border-1">
                                    <input style="font-size:16px; height:45px;" type="text" id="roleid" class="form-control border border-primary" placeholder=" Acronym : e.g. superb" data-toggle="tooltip" data-displacement="top" title="Acronym : e.g. superb">
                                    <div class="input-group-append">
                                       <span class="input-group-text border border-primary" style="height:45px;">
                                       <i class="fa fa-user text-black"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <span class="roleidMsg"> </span>
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
               <button  onclick="window.location.refresh" type="button" class="btn btn-secondary  btn-rounded" data-dismiss="modal"> Close &nbsp; <i class="fa fa-close"> </i>  </button>
               <button mode="new" type="button" class="btn btn-primary btn-lg btn-rounded ladda-button creators" data-style="expand-right" name="saveRole" id="saveRole"> Save Role&nbsp; <i class="fa fa-save"> </i>  </button>
               <button mode="update" type="button" class="btn btn-warning btn-lg btn-rounded ladda-button updators" data-style="expand-right" name="updateRole" id="updateRole"> Update Role &nbsp; <i class="fa fa-save"> </i>  </button>								
            </center>
            <p>&nbsp;</p>
         </div>
         <!-- ./ modal-footer -->
      </div>
      <!-- ./ modal-content -->
   </div>
</div>
<!-- *********************************************************************************** -->	 

<!-- Modal 8 for new bill type form  -->
<div style="z-index:-999px" class="modal fade" id="new_admin_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div style="width:80%" class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <div class="col-md-10">
               <h4 class="modal-title bold text-info text-capitalize"> create new / update admin  &nbsp; &nbsp; <i class="fa fa-user-plus"> </i>  </h4>
            </div>
            <div class="col-md-2  pull-right">	 <button type="button" class="btn btn-outline-danger btn-rounded btn-sm" data-dismiss="modal"><i class="fa fa-close"> </i></button>	</div>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:auto;">
            <div class="row">
               <div class="col-lg-12 col-lg-offset grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body" style="padding-top:2px; margin-top:2px; height:auto;">
                        <form method = "post">
                           <div class="col-md-6" style="float:left;">
                              <center><label for="title" class="col-sm-12 col-form-label bold"> Basic Info   </label> </center>
                              <br/>
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Surname <span class="text-danger bold">*</span> </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="surname" name="surname" value="" class="form-control border-primary newuserform" placeholder="Surname"> 
                                       <div class="input-group-append"><span class="surname_text input-group-text border border-primary"><i class="surname_icon mdi mdi-account-outline"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-8 -->
                              </div>
                              <!-- ./ form-group -->
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> First Name <span class="text-danger bold">*</span> </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="firstname" name="firstname" value="" class="form-control border-primary newuserform" placeholder="Firstname"> 
                                       <div class="input-group-append"><span class="firstname_text input-group-text border border-primary"><i class="firstname_icon mdi mdi-account-outline"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group -->
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Other Name </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="othername" name="othername" value="" class="form-control border-primary newuserform" placeholder="Othername"> 
                                       <div class="input-group-append"><span class="othername_text input-group-text border border-primary"><i class="othername_icon mdi mdi-account-outline"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group -->  
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Sex <span class="text-danger bold">*</span> </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <select class="form-control border border-primary newuserform" style="font-size:14px; height:45px;" name="sex" id="sex">
                                          <option value="">...</option>
                                          <option value="male">Male</option>
                                          <option value="female">Female</option>
                                       </select>
                                       <div class="input-group-append"><span class="sex_text input-group-text border border-primary"><i class="sex_icon fa fa-male "></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group -->
                              <!--
                                 <div class="form-group row">
                                 	<label for="title" class="col-sm-3 col-form-label"> Date of Birth <span class="text-danger bold">*</span> </label>
                                 	<div class="col-sm-8">
                                 		<div class="input-group">
                                 			<input style="font-size:14px; height:45px;" type="text" id="dob" name="dob" value="" class="form-control border-primary newuserform datepicker" placeholder="Date of Birth"> 
                                 			<div class="input-group-append"><span class="dob_text input-group-text border border-primary"><i class="dob_icon fa fa-calendar"></i></span> </div> 
                                 		</div>														
                                 	</div> <!-- ./ col-sm-9 
                                   </div>  ./ form-group -->
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Phone No.   </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="phone" name="phone" value="" class="form-control border-primary newuserform only-numeric" placeholder="08030001000"> 
                                       <div class="input-group-append"><span class="phone_text input-group-text border border-primary"><i class="phone_icon mdi mdi-phone"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group --> 
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Address  </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="address" name="address" value="" class="form-control border-primary newuserform" placeholder="Address"> 
                                       <div class="input-group-append"><span class="address_text input-group-text border border-primary"><i class="address_icon fa fa-map-marker"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group -->  
                           </div>
                           <!-- ./ col-md-6 -->
                           <div class="col-md-6" style="float:left;">
                              <center><label for="title" class="col-sm-12 col-form-label bold"> Administrative Info   </label> </center>
                              <br/>
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Login ID.   </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="username" name="username" value="" class="form-control border-primary newuserform" placeholder="Login ID"> 
                                       <div class="input-group-append"><span class="username_text input-group-text border border-primary"><i class="username_icon mdi mdi-account"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group --> 
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Designation / Role  </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <select class="form-control border border-primary newuserform" style="font-size:14px; height:45px;" name="role_id" id="role_id">
                                          <option value="">...</option>
                                          <?php $roles = $dbm->getFields($dbm->select('roles',array('status'=>'active'),array('name'),'and','asc'),array('name','id','sn')); 
                                             if(!is_null($roles)){ $n = 0;  foreach($roles['id'] as $id){?>
                                          <option value="<?php echo $id; ?>"><?php echo $roles['name'][$n]; ?> </option>
                                          <?php $n++; } #end foreach
                                             } # end not null 
                                             ?>
                                       </select>
                                       <div class="input-group-append"><span class="role_id_text input-group-text border border-primary"><i class="role_id_icon mdi mdi-account "></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group -->  
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Date Employed <span class="text-danger bold">*</span> </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="date_employ" name="date_employ" value="" class="form-control border-primary newuserform datepicker" placeholder="Date Employed"> 
                                       <div class="input-group-append"><span class="date_employ_text input-group-text border border-primary"><i class="date_employ_icon fa fa-calendar"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group -->
                              <div class="form-group row">
                                 <label for="title" class="col-sm-3 col-form-label"> Login Password   </label>
                                 <div class="col-sm-8">
                                    <div class="input-group">
                                       <input style="font-size:14px; height:45px;" type="text" id="psw" name="psw" value="" class="form-control border-primary newuserform" placeholder="*****************"> 
                                       <div class="input-group-append"><span class="password_text input-group-text border border-primary"><i class="password_icon fa fa-lock"></i></span> </div>
                                    </div>
                                 </div>
                                 <!-- ./ col-sm-9 -->
                              </div>
                              <!-- ./ form-group --> 
                              <p> &nbsp;	</p>
                              <div class="form-group row ">
                                 <button mode="new" type="button" name="save_new_user" id="save_new_user" class="btn btn-info btn-rounded btn-lg creators ladda-button btn-block " data-style="zoom-in" > Save Admin &nbsp; <i class="fa fa-save"></i> </button>
                                 <button mode="update" type="button" name="update_user" id="update_user" class="btn btn-warning btn-rounded btn-lg btn-block updators ladda-button btn-block" data-style="zoom-in" > Update Admin &nbsp; <i class="fa fa-save"></i> </button>
                              </div>
                              <!-- ./ form-group -->  
                           </div>
                           <!-- ./ col-md-6 -->	
                        </form>
                     </div>
                     <!-- ./  card-body --> 
                  </div>
               </div>
            </div>
         </div>
         <!-- ./ modal body |   updators creators-->
         <div class="modal-footer"> 
         </div>
         <!-- ./ modal-footer -->
      </div>
      <!-- ./ modal-content -->
   </div>
</div>
<!-- *********************************************************************************** -->	 
<div style="z-index:-999px" class="modal fade" id="new_page_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width:50%">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title bold text-info text-center text-capitalize"> Add / Update new page  &nbsp; &nbsp; <i class="fa fa-navigation"> </i> </h4>
         </div>
         <div class="modal-body" style="margin-top:0px; padding-top:0px; height:auto;">
            <div class="row">
               <div class="col-md-12" style="float:left;">
                  <form method="post">
                     <div class="card ">
                        <div class="card-body">
                  <form method="post">
                  <span class="h4 text-capitalize"> create new / edit pages </span>
                  <hr/>
                  <div class="form-group row">
                  <label for="title" class="col-sm-4 col-form-label bold">Page Title</label>
                  <div class="col-sm-8">
                  <input style="font-size:16px;" type="text" class="form-control border-primary" id="pgtitle"  name="pgtitle" placeholder="Page Title "> 
                  </div> <!-- ./ col-sm-9 -->
                  </div> <!-- ./ form-group -->
                  <div class="form-group row">
                  <label for="title" class="col-sm-4 col-form-label bold">Page URL</label>
                  <div class="col-sm-8">
                  <input style="font-size:16px;" type="text" class="form-control border-primary" id="pgurl"  name="pgurl" placeholder="Page URL "> 
                  </div> <!-- ./ col-sm-9 -->
                  </div> <!-- ./ form-group -->
                  <div class="form-group row">
                  <label for="title" class="col-sm-4 col-form-label bold">Page Group </label>
                  <div class="col-sm-8">
                  <div class="form-group">								 
                  <select class="form-control border-primary " style="font-size:16px; height:44px;"  id="pg_group" name="pg_group">
                  <optgroup label="Page Group">
                  </optgroup>
                  </select>
                  </div> <!-- ./ form-group -->	
                  </div> <!-- ./ col-sm-9 -->
                  </div> <!-- ./ form-group -->
                  <div class="form-group row">
                  <label for="title" class="col-sm-4 col-form-label bold">Page Icon </label>
                  <div class="col-sm-8">
                  <input style="font-size:16px;" type="text" class="form-control border-primary" id="pgicon"  name="pgicon" placeholder="Page Icon "> 
                  </div> <!-- ./ col-sm-9 -->
                  </div> <!-- ./ form-group -->
                  <div class="form-group row">
                  <label for="title" class="col-sm-4 col-form-label bold">Auto-load </label>
                  <div class="col-sm-8">
                  <div class="icheck-square">
                  <label for="minimal-radio"> &nbsp;<input type="radio" id="pgauto_load" name="pgauto_load" value="yes" class="pgauto_load" checked >
                  Yes </label>
                  </div>
                  <div class="icheck-square">
                  <label for="minimal-radio"> &nbsp;<input type="radio" id="pgauto_load" name="pgauto_load"  class="pgauto_load" value="no"  >
                  No </label>
                  </div>
                  </div> <!-- ./ col-sm-9 -->
                  </div> <!-- ./ form-group -->
                  <label for="title" class="col-sm-4 col-form-label bold">&nbsp;  </label>
                  <button mode="new" type="button" id="create_page_list" class="creators btn btn-primary btn-block btn-lg btn-rounded ladda-button" data-style="expand-right"> Create Page List&nbsp; <i class="fa fa-save"> </i> </button>
                  <button mode="update" for="" type="button" id="update_page_list" class="updators btn btn-warning btn-block btn-lg btn-rounded ladda-button" data-style="expand-right"> Update Page List&nbsp; <i class="fa fa-save"> </i> </button>
                  </form>
                  </div> <!-- ./ card-body -->
                  </div> <!-- ./ card --> 
                  </form>	   
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
