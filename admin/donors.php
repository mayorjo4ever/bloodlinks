<?php    require "usercheck.php"; require_once('formsubmit.php');
    # update bio-data     
    if(isset($_POST['update_biodata']))  {    
          $id = base64_decode($_REQUEST['edit']);
          $data = exclude($_POST,['update_biodata']);
         // print_r($data);
          $dbm->updateTb('customer_info',$data,['sn'=>$id]); 
          echo "<script>alert('Update Successful')</script>";
          }
     use Carbon\Carbon;      
      $mydbm = new DBController(); 
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   <!-- -->
      

    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
    <style type="text/css">
        .select2  {
          font-size:16px;  height: 40px; 
        }
      </style>
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
                                  <div class="col-md-3 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo !empty($_REQUEST['edit'])?"Update Customer Info":$this_page['title']; ?>  </span> &nbsp;  </div>
                                  <div class="col-md-9 pull-right">
                                    <span class="pointer" onclick="toggleDonorFilter()"> Filter Donors &nbsp;  <i class="fa fa-filter text-info fa-2x"></i></span>

                                    <button type="button" onclick="display_donor_remarks()" data-toggle="modal" data-target="#add_update_remarks" class="btn btn-primary btn-sm pull-right"> Add New Remarks </button>

                                      <p class="donor_filter mt-1"></p>
                                        <div class="form-group form-row donor_filter">
                                          <div class="col-md-12 mt-2">
                                            <p class="font-weight-bold">Blood Types</p>
                                             <?php $blood_types = $mydbm->runBaseQuery("select id,name from blood_types");  
                                              if(!empty($blood_types)):
                                                foreach($blood_types as $blood_type) :   ?>
                                                    <div class="icheck-flat float-left">
                                                      <div class="icheckbox_flat-blue checked" style="position: relative;"><input type="checkbox" name="blood_types[]" value="<?php echo $blood_type['id'];?>"  class="form-control blood_type" /></div>
                                                        <label for="flat-checkbox-2" class=""><?php echo $blood_type['name'];?> </label> &nbsp;&nbsp; &nbsp;&nbsp;
                                                      </div>
                                                   <?php endforeach; 
                                              endif; 
                                                ?>  
                                          </div><!-- col-md-12 -->

                                          <div class="col-md-12 mt-3">
                                            <p class="font-weight-bold">Customer Types </p>
                                             <div class="icheck-flat float-left">
                                                <div class="icheckbox_flat-green checked" style="position: relative;">
                                                  <input type="checkbox" name="customer_types[]" value="due"  class="form-control customer_type" /></div>
                                                  <label for="flat-checkbox-2" class=""> Due for Donation </label> &nbsp;&nbsp; &nbsp;&nbsp;
                                                </div>

                                                <div class="form-group row">
                                                  <label class="col-md-3 font-weight-bold"> Medical Reports </label>
                                                <div class="col-md-6" style="position: relative;">
                                                  <?php $comments = $mydbm->runBaseQuery("select distinct comment from customer_specimen where order_type='donate_blood' and status='active'"); ?>
                                                  <select name="medical_report" id="medical_report" class="form-control border-primary">
                                                    <option value="">--</option>
                                                    <?php if(!empty($comments)) : 
                                                      foreach ($comments as $k => $v) : ?>
                                                        <option value="<?php echo $v['comment']; ?>"><?php echo $v['comment']; ?> </option>
                                                      <?php endforeach; 
                                                        endif;
                                                      ?>

                                                  </select>   
                                                  </div>  

                                          </div><!-- col-md-12 -->

                                          <div class="col-md-4 mt-3"> 
                                            <button type="button" onclick="filterDonors()" class="btn btn-success btn-rounded filterDonors ladda-button" data-style="expand-right"> Search &nbsp; <i class="fa fa-search"></i></button>
                                          </div>

                                        </div>
                                       </p>                                    
                                  </div>
                                </div>      
                              </div>
                              <!--  ./ card-header -->  

                              <div class="card-body">

                      <div class="row">
                            
                              <div class="col-md-12" id="filtered_donors"></div>                                
                          
                     </div>
                     <!-- ./ row --> 

                      </div>
                      </div>
                      </div> 
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
      <?php require "donor_modal.php"; ?>

      <script  src="../assets/js/select2.min.js"></script>
      <script>
         
         $(function(){

          $('.dataTable').dataTable(); 
            $('.donor_filter').hide(); 
            filterDonors();   

         });

          function toggleDonorFilter(){
            $('.donor_filter').toggle();    
          }

          function filterDonors(){
            var blood_types = []; var customer_types = []; var med_report = $('select#medical_report').val(); 
            $("input[name='blood_types[]']:checked").each(function(){
             blood_types.push($(this).val()); 
            });

            $("input[name='customer_types[]']:checked").each(function(){
              customer_types.push($(this).val());
            });
            var l = Ladda.create(document.querySelector('button.filterDonors')); 
            var elem = $('div#filtered_donors');
            // submit requests
            /**************************/            
             $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { filterDonors:"", blood_types:blood_types, customer_types:customer_types, med_report:med_report  },
                  beforeSend:function(){ l.start();   },
                  success:function(res){
                  l.stop();
                  elem.html(res); $('.dataTable').dataTable(); 
                  }
                
               });

            // alert(blood_types+", "+customer_types); 

          }

          function set_my_donation_history(user_info){
              var elem =$(".my_donor_history");
              $('span.username').html(user_info+" &nbsp; -&nbsp;  ");
              spin = "<span class='fa fa-spinner fa-spin fa-3x'"
               $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { set_my_donation_history:"", user_info:user_info  },
                  beforeSend:function(){ elem.html(spin);   },
                  success:function(res){                  
                  elem.html(res); $('.dataTable').dataTable(); 
                  }
                
               });
          }

            function save_remarks(){
              var remark  = $("#remark").val(); 
              var remark_mode  = $("#remark_mode").val(); 
              var l = Ladda.create(document.querySelector('button.save_remark')); 
              
               $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { save_donor_remark:"", remark:remark, remark_mode:remark_mode  },
                  beforeSend:function(){ l.start();   },
                  success:function(res){ l.stop(); 
                       output = $.parseJSON(res);
                       showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
                       display_donor_remarks();                 
                  }
                      
                     });
                }


          function display_donor_remarks(){
              var elem  = $(".remark_lists"); 
               spin = "<span class='fa fa-spinner fa-spin fa-3x'"
               $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { display_donor_remarks:""  },
                  beforeSend:function(){ elem.html(spin);   },
                  success:function(res){                  
                  elem.html(res); $('.dataTable').dataTable(); 
                  }
                
               });
          }

          function set_my_remark(myinfo){
            // alert(myinfo);
            var elem = $('#remark_select'); spin = "<span class='fa fa-spinner fa-spin fa-3x'"; 
            $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { load_donor_remarks:"", myinfo:myinfo },
                  beforeSend:function(){ elem.html(spin);   },
                  success:function(res){                  
                     elem.html(res); 
                  }
                
               });
          }

          function update_customer_remark(){
              var remark  = $("#my_remark").val(); 
              var myinfo  = $("input#myinfo").val();  info = myinfo.split("|");  // # id, remarks, index
              var l = Ladda.create(document.querySelector('button.update_customer_remark')); 
             
               $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { update_customer_remark:"", remark:remark, myinfo:myinfo  },
                  beforeSend:function(){ l.start();   },
                  success:function(res){ l.stop(); 
                       output = $.parseJSON(res);
                       showToastPosition('bottom-center',output['title'],output['text'],output['icon']);                         
                  }
                      
                     });
                }

                

      </script>
      <script src="../assets/js/lab_rep_script.js"></script>
     
   </body>
</html>
