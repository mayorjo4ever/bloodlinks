<?php    require "usercheck.php"; require_once('formsubmit.php');
    # update bio-data     
    if(isset($_POST['update_biodata']))  {    
          $id = base64_decode($_REQUEST['edit']);
          $data = exclude($_POST,['update_biodata']);
         // print_r($data);
          $dbm->updateTb('customer_info',$data,['sn'=>$id]); 
          echo "<script>alert('Update Successful')</script>";
          }
          
          
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   <!-- -->
   </head>
   <!-- <body class="sidebar-fixed"> -->
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_horizontal-navbar.html -->
         <?php require "partials/_horizontal-navbar.php"; ?>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php // require "sidebar_nav.php"; ?>
            <!-- partial -->
            <div class="main-panel container">
               <div class="content-wrapper">
                  <form method="post">
                     <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card pt-2 mb-2 mt-2">
                           <div class="card">
                              <div class="card-header">
                                  <div class="col-md-8 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo !empty($_REQUEST['edit'])?"Update Customer Info":$this_page['title']; ?>  </span> &nbsp;  </div>
                                    <small>This record shows the last saved 100 customers </small>
                              </div>
                              <!--  ./ card-header -->  
                           </div></div></div>
                            
                      <div class="row"><div class="col-lg-12">
                            <div class="card">                               
                              <div class="card-body">
                                  
                                  <?php if(!isset($_REQUEST['edit'])) { ?>
                                      
                                 <div class="row">
                                    <div class="col-md-12">
                                       <table class="table table-sm table-hover jambo_table dataTable">
                                          <thead class="font-weight-bold">
                                             <tr>
                                                <td>SN</td>
                                                <td>ID</td>
                                                <td>Fullname</td>
                                                <td>Sex</td>
                                                <td>Phone</td>                                                
                                                <td>Has Donated </td>
                                                <td>Due for Donation </td>
                                                <td>Donation History</td>
                                                <td>Update</td>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php 
                                                $customers = $mydbm->runBaseQuery("select * from customer_info order by is_donor desc ");  
                                                if(!empty($customers)) foreach ($customers as $k=>$custmer) { ?>
                                             <tr>
                                                 <td><?php echo $k+1; ?></td>
                                                 <td><?php echo $custmer['id']; ?></td>
                                                 <td><?php echo $custmer['fullname']; ?></td>
                                                 <td><?php echo $custmer['sex']; ?></td>
                                                 <td><?php echo "0".$custmer['phone']; ?></td>
                                                 <td><?php echo ($custmer['is_donor']==1) ? "Yes" :" No"; ?></td>
                                                 <td><?php echo ($custmer['is_donor']==1) ? "Yes" :" No"; ?></td>
                                                 <td> <button type="button" class="btn btn-primary btn-lg m-3"> 2 </button> </td>
                                                 <td><a href="<?php echo "customers.php?edit=". base64_encode($custmer['sn']);?>" class="text-warning font-28"> <span class="fa fa-pencil"></span> </a></td>
                                             </tr>
                                             <?php } # end foreach 
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div> <!-- ./ row -->
                                 
                                 <?php } # end not request edit 
                                 
                                 else { ?> 
                                 <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                 <div class="row">
                                      <div class="col-md-7" style="float:left;">
                                          <?php 
                                          $sn = base64_decode($_REQUEST['edit']);
                                           $customer = $mydbm->runBaseQuery("select * from customer_info where sn=$sn limit 1");  
                                           // $customer= json_decode(json_encode($customer));
                                           //  print_r($customer);
                                          ?>
                                          <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> ID Number.  <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                      <input disabled="" style="font-size:14px; height:45px; background: #fff;  " type="text" id="idno" name="idno" value="<?php echo $customer[0]['id'] ?? ""; ?>" class="form-control border-primary newuserform" placeholder="ID Number"> 
                                                     <div class="input-group-append"><span class="surname_text input-group-text border border-primary"><i class="surname_icon mdi mdi-card"></i></span> </div>
                                                  </div>
                                               </div>
                                               <!-- ./ col-sm-9 -->
                                            </div>
                                          
                                          <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> Surname  <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                     <input style="font-size:14px; height:45px;" type="text" id="surname" name="surname" value="<?php echo $customer[0]['surname'] ?? ""; ?>" class="form-control border-primary newuserform" placeholder="Surname"> 
                                                     <div class="input-group-append"><span class="surname_text input-group-text border border-primary"><i class="surname_icon mdi mdi-account-outline"></i></span> </div>
                                                  </div>
                                               </div>
                                               <!-- ./ col-sm-9 -->
                                            </div>
                                            <!-- ./ form-group -->
                                            <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> Othername  <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                     <input style="font-size:14px; height:45px;" type="text" id="othername" name="othername" value="<?php echo $customer[0]['othername'] ?? ""; ?>" class="form-control border-primary newuserform" placeholder="Other Name"> 
                                                     <div class="input-group-append"><span class="othername_text input-group-text border border-primary"><i class="othername_icon mdi mdi-account-outline"></i></span> </div>
                                                  </div>
                                                   
                                               </div>
                                               <!-- ./ col-sm-9 --> 
                                            </div>
                                            <!-- ./ form-group -->
                                            <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> Date of Birth <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                     <input type="text" class="datetimepicker form-control border border-primary font-14 newuserform" name="dob" id="dob" value="<?php echo $customer[0]['dob'] ?? ""; ?>" placeholder="6 Years" /> 
                                                     <!--
                                                        <select class="form-control border-primary age_text" style="font-size:14px; height:44px;" name="age_type" id="age_type">														  												
                                                               <option value="year" <?php echo ($prev_rec['age_type']=="year")?"selected":""; ?>>Years(s)</option>
                                                               <option value="month" <?php echo ($prev_rec['age_type']=="month")?"selected":""; ?>>Month(s)</option> 
                                                               <option value="week" <?php echo ($prev_rec['age_type']=="week")?"selected":""; ?>>Week(s)</option>  
                                                               <option value="day" <?php echo ($prev_rec['age_type']=="day")?"selected":""; ?>>Day(s)</option>  
                                                        </select>  -->
                                                     <div class="input-group-append"><span class="age_text input-group-text border border-primary"><i class="age_icon fa fa-calendar"></i></span> </div>
                                                  </div>
                                               </div>
                                               <!-- ./ col-sm-9 --> 
                                            </div>
                                            <!-- ./ form-group -->
                                            <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> Sex <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                     <select class="form-control border border-primary newuserform" style="font-size:14px; height:45px;" name="sex" id="sex">
                                                        <option value="">...</option>
                                                        <option value="male" <?php echo ($customer[0]['sex']=="male")?"selected":""; ?>>Male</option>
                                                        <option value="female" <?php echo ($customer[0]['sex']=="female")?"selected":""; ?>>Female</option>
                                                     </select>
                                                     <div class="input-group-append"><span class="sex_text input-group-text border border-primary"><i class="sex_icon fa fa-male "></i></span> </div>
                                                  </div>
                                               </div>
                                               <!-- ./ col-sm-9 --> 
                                            </div>
                                            <!-- ./ form-group --> 
                                            <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> Phone No. <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                     <input style="font-size:14px; height:45px;" type="text" id="phone" name="phone" value="<?php echo $customer[0]['phone'] ?? ""; ?>" class="form-control border-primary newuserform only-numeric" placeholder=" Phone Number"> 
                                                     <div class="input-group-append"><span class="phone_text input-group-text border border-primary"><i class="phone_icon fa fa-phone"></i></span> </div>
                                                  </div>
                                               </div>
                                               <!-- ./ col-sm-9 --> 
                                            </div>
                                            <!-- ./ form-group --> 
                                            
                                            <div class="form-group row selection">
                                               <label for="title" class="col-sm-3 col-form-label"> Hospital <span class="text-danger bold">*</span> </label>
                                               <div class="col-sm-9">
                                                  <div class="input-group">
                                                     <input style="font-size:14px; height:45px;" type="text" id="hospital" name="hospital" value="<?php echo $customer[0]['hospital'] ?? ""; ?>" class="form-control border-primary newuserform" placeholder="Hospital"> 
                                                     <div class="input-group-append"><span class="phone_text input-group-text border border-primary"><i class="phone_icon fa fa-phone"></i></span> </div>
                                                  </div>
                                               </div>
                                               <!-- ./ col-sm-9 --> 
                                            </div>
                                            <!-- ./ form-group --> 
                                            
                                            <div class="form-group row selection mt-3 pt-3">
                                               
                                               <div class="col-sm-12">
                                                   <button type="submit" name="update_biodata" class="btn btn-primary btn-lg btn-block btn-rounded"> Update Customer Info </button>
                                               </div>
                                               <!-- ./ col-sm-9 --> 
                                            </div>
                                            <!-- ./ form-group --> 
                                            
                                         </div>
                                         <!-- ./ col-md-7 -->      
                                         <div class="col-md-5">
                                             <a href="customers.php" class="btn btn-primary btn-lg btn-rounded"> View All Customers </a>
                                         </div>
                                    
                                 </div> <!-- ./ row --> </form>
                                 <?php }?> 
                              </div>
                              <!--  ./ card-body -->  
                           </div>
                           <!--  ./ card -->  
                        </div>
                     </div>
                     <!-- ./ row --> 
                  </form>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->
               <?php require "footer.php"; ?>
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <?php require "admin_js_links.php"; ?>
      <script>
         
         $(function(){

            $('.dataTable').dataTable(); 


         });

      </script>
      <script src="../assets/js/lab_rep_script.js"></script>
   </body>
</html>
