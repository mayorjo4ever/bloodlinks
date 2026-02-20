<?php 
   require "usercheck.php"; 
   include_once "new_ticket_reminder.php";  
   include_once "formsubmit.php";  
   
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   <!-- 
         <link rel="stylesheet" href="../assets/vendors/dropzone/dropzone.css">   -->
      <!-- <link href="../assets/vendors/zoom-magnify/dist/css/magnify.css" rel="stylesheet" type="text/css"> -->
      <link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
      <link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">
      <!-- bootstrap check toggle (switch)  
         <link href="../assets/toggle/css/bootstrap-toggle.css" rel="stylesheet">
         <link href="../assets/toggle/css/bootstrap.css" rel="stylesheet">-->
      <style>
         table tr, table thead td, table td, table thead th, table th {
         border:1px solid #fff; margin:5px; padding:5px; 
         line-height:5px; background:transparent; 
         }
         .border-lines tr th,.border-lines tr td, .border-lines tr { border:1px solid #000; }
      </style>
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_horizontal-navbar.html -->
         <?php require "partials/_horizontal-navbar.php"; ?>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <div class="main-panel container">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body" style="height:auto">
                              <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?>  </h4>
                              <div class="row bg-inverse-info " style="margin:12px; padding:12px; ">
                                 <?php $ticket_no = base64_decode($_REQUEST['r_val']); 
                                    $proc_comp = base64_decode($_REQUEST['pc']); 
                                    ## validate 
                                    $criterial = array('ticket_no'=>$ticket_no,'status'=>'active','process_completed'=>$proc_comp); 
                                    $fields = $mydal->TableFields('customer_tickets');

                                    $exist = $dbm->getFields($dbm->select('customer_tickets',$criterial),$fields);
                                     #  print_r($exist);

                                    if(is_null($exist)) { echo "<script> alert('Invalid Parameters'); window.location.href='tickets.php';  </script> "; }
                                    
                                    ?> 
                                 <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="card">
                                       <div class="card-header " style="padding-bottom:12px; margin-bottom:12px;">
                                          <div class="col-md-3 float-left" style="padding:0px; margin:0px;"> <i class="fa fa-bathtub icon-lg text-primary d-flex align-items-center"></i>  </div>
                                          <div class="col-md-9  float-left"  style="padding:0px; margin:0px;">
                                             <h4 class="card-title bold h3 font-20 text-info"> enter the lab report </h4>
                                          </div>
                                       </div>
                                       <!-- ./ card-header -->
                                       <div class="card-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <?php  # print_r($fields);
                                                $test_catogories = $mydbm->runBaseQuery("Select distinct order_type from customer_specimen where ticket_no='$ticket_no' and finalized='yes' and process_completed='$proc_comp' and status='active' order by order_type ");
                                                # print "Select distinct order_type from customer_specimen where ticket_no='$ticket_no' and finalized='yes' and process_completed='$proc_comp' and status='active' order by order_type ";
                                                # print_r( $test_catogories);
                                                 ?>
                                                <div class="form-group row text-capitalize">
                                                   <label for="title" class="col-sm-3 col-form-label bold"> select order type   </label>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <select class="form-control border border-primary" for="<?php echo base64_encode($ticket_no); ?>" style="font-size:16px; height:45px;" name="ticket_specimens" id="ticket_specimens">
                                                            <option value="">...</option>
                                                            <?php 
                                                               $orders = ['perform_test'=>'Blood Test','donate_blood'=>'Blood Donation','buy_blood'=>'Blood Purchase']; 

                                                                if(!is_null($exist)) :                                                               
                                                               	$test_catogories = $mydbm->runBaseQuery("Select distinct order_type from customer_specimen where ticket_no='$ticket_no' and finalized='yes' and process_completed='$proc_comp' and status='active' order by order_type ");
                                                                  if(!empty($test_catogories)):
                                                                     foreach($test_catogories as $k=>$v):                                                                       
                                                                      $cond = array('ticket_no'=>$ticket_no,'order_type'=>$v['order_type'], 'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active'); ?>
                                                                     <optgroup label="<?php echo $orders[$v['order_type']]?>">                                                                           
                                                                         <?php 
                                                                               $specimens = $dbm->getFields($dbm->select('customer_specimen',$cond),array('sn','bill_type_id','specimen_sample')); 
                                                                                    $n = 0; $tcost = 0; 
                                                                                    if($v['order_type']=="perform_test"):
                                                                                     foreach($specimens['bill_type_id'] as $serial):
                                                                                      $bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
                                                                                     ?>
                                                                                       <option value="<?php echo "perform_test|".$serial; ?>"> <?php echo $bill_type['name'][0]; ?></option>
                                                                                    <?php  ?>
                                                                              <?php endforeach;
                                                                              # end perform test
                                                                              elseif($v['order_type']=="donate_blood"):
                                                                                 # search for the expected blood type
                                                                                 $cond = array('ticket_no'=>$ticket_no,'order_type'=>$v['order_type'], 'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active');
                                                                                 $donation = $dbm->select('customer_specimen',$cond); 
                                                                                 $blood_info = $mydbm->runbaseQuery("select name from blood_types where id='".$donation[0]['blood_type_id']."'");
                                                                               ?>
                                                                                 <option value="<?php echo "donate_blood|".$donation[0]['blood_type_id'] ?>"> Test Donation : <strong>  <?php echo $blood_info[0]['name']; ?> </strong> </option>
                                                                              
                                                                              <?php 
                                                                                 elseif($v['order_type']=="buy_blood"):
                                                                                 # search for the expected blood type
                                                                                 $cond = array('ticket_no'=>$ticket_no,'order_type'=>$v['order_type'], 'finalized'=>'yes','process_completed'=>$proc_comp,'status'=>'active');
                                                                                 $blood_samples = $dbm->select('customer_specimen',$cond); 
                                                                                 $blood_info = $mydbm->runbaseQuery("select name from blood_types where id='".$blood_samples[0]['blood_type_id']."'");
                                                                               ?>
                                                                                 <option value="<?php echo "buy_blood|".$blood_samples[0]['blood_stock_id'] ?>"> Provide Blood  : <strong>  <?php echo $blood_info[0]['name']; ?> </strong> </option>
                                                                          <?php endif; 
                                                                           ?>
                                                                     </optgroup>      
                                                                     <?php endforeach; 
                                                                    endif; 
                                                                 endif; 
                                                                ?> 
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <!-- ./ col-sm-9 --> 
                                                </div>
                                                <!-- ./ form-group --> 
                                                <p class="loader"> <span class="loader"> &nbsp;  </span></p>
                                                <div class="process_content"></div>
                                             </div>
                                             <!-- ./ col-md-12 -->
                                          </div>
                                          <!-- ./ row -->
                                       </div>
                                       <!-- ./ card-body -->
                                    </div>
                                    <!-- ./ card -->
                                    <p> &nbsp;  </p>
                                    <div class="card">
                                       <div class="card-header">
                                          <div class="col-md-3 float-left"> <span class="bold text-info "> <i class="fa fa-bar-chart-o icon-lg "> </i>  </span>  </div>
                                          <div class="col-md-9 float-left"> <span class="h5 bold text-info "> View Report Summary </span> &nbsp;&nbsp;&nbsp;&nbsp;  <span id="view_project_analysis" class=" fa fa-eye icon-lg pull-right text-info pointer"> </span> </div>
                                       </div>
                                       <!-- ./ card-header -->
                                       <div class="card-body">
                                          <div class="summary_result">
                                          </div>
                                          <!-- ./   -->
                                       </div>
                                       <!-- ./ card-body -->
                                    </div>
                                    <!-- ./ card -->
                                 </div>
                                 <!-- ./ col-md-8 -->
                                 <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="card ">
                                       <div class="card-header " style="padding-bottom:12px; margin-bottom:12px;">
                                          <div class="col-md-3 float-left" style="padding:0px; margin:0px;"> <i class="mdi mdi-account icon-lg text-primary d-flex align-items-center"></i>  </div>
                                          <div class="col-md-9  float-left"  style="padding:0px; margin:0px;">
                                             <h4 class="card-title bold h3 font-20 text-info">  <?php echo $ticket_no;?> </h4>
                                          </div>
                                       </div>
                                       <!-- ./ card-header -->
                                       <div class="card-body ">
                                          <ul class="text-capitalize  list-star font-13">
                                             <li>  <span class="bold">  name: </span>	<span class="pull-right"> <?php echo $exist['fullname'][0];?>  </span>	</li>
                                             <li>  <span class="bold">  age: </span>	<span class="pull-right">  <?php echo getAge($exist['age_text'][0],$exist['date_c'][0]);?> </span>	</li>
                                             <li>  <span class="bold">  sex: </span>	<span class="pull-right"> <?php echo $exist['sex'][0];?>  </span>	</li>
                                             <li>  <span class="bold">  refered by: </span>	<span class="pull-right"> <?php echo $exist['doctor'][0];?>  </span>	</li>
                                             <li>  <span class="bold">  address:  </span>	<span class="pull-right"> <?php echo $exist['hospital'][0];?>  </span>	</li>
                                             <hr/>
                                             <li>  <span class="bold">  Total Charges:  </span>	<span class="pull-right"> <?php echo "&#8358; ".number_format($exist['total_cost'][0]);?>  </span>	</li>
                                             <li>  <span class="bold">  Discount: </span>	<span class="pull-right">  <?php echo "&#8358; ".number_format($exist['discount'][0]); ?> </span>	</li>
                                             <li>  <span class="bold">  Amount Paid:  </span>	<span class="pull-right"> <?php echo "&#8358; ".number_format($exist['amount_paid'][0]);?>  </span>	</li>
                                             <li>  <span class="bold">  Balance: </span>	<span class="pull-right"> <?php $balance = ($exist['total_cost'][0] - $exist['discount'][0] - $exist['amount_paid'][0]); echo "&#8358; ".number_format($balance);?>  </span>	</li>
                                             <hr/>
                                             <li>  <span class="bold">  date created:  </span>	<span class="pull-right"> <?php echo $func->format_date($exist['date_c'][0]);?>  </span>	</li>
                                             <li>  <span class="bold">  time created:  </span>	<span class="pull-right"> <?php echo $func->format_date($exist['date_c'][0],'time');?>  </span>	</li>
                                             <li>  <span class="bold">  created by:  </span>	<span class="pull-right"> <?php echo $exist['c_by'][0];?>  </span>	</li>
                                          </ul>
                                       </div>
                                       <!-- ./ card-body -->
                                    </div>
                                    <!-- ./ card -->
                                    <p> &nbsp; </p>
                                 </div>
                                 <!-- ./ col-md-4 -->
                              </div>
                              <!-- ./ row --> 
                           </div>
                           <!-- card-body -->
                        </div>
                        <!-- card -->
                     </div>
                     <!-- col-md-12 -->
                  </div>
                  <!-- row ends -->
               </div>
               <!-- content-wrapper ends -->
               <?php require "footer.php"; ?>
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <?php require "bill_modal.php"; ?>
      <?php require "admin_js_links.php"; ?>
      <script src="../assets/js/lab_schedule_scripts.js"> </script>
      <script src="../assets/js/billing_scripts.js"> </script>
      <script src="../assets/js/shared/iCheck.js"></script> 
      <!-- bootstrap check toggle (switch) 
         <script src="../assets/toggle/js/bootstrap-toggle.js"> </script>
         <script src="../assets/toggle/js/bootstrap.js"> </script>-->
   </body>
   
   
   <!---->
   <script> 

      function process_blood_purchase(data_text,action_type){      
         var compatibility = $('input.is_blood_compatible:checked').val();
         var investigation = $('input.crossmatch_investigation:checked').val(); 
         // alert(compatibility+' '+investigation); // exit; 
        swal({icon:'warning',action_type : '  ?', closeOnEsc:false,closeOnClickOutside:false,           
            buttons: {
              cancel: {
               text: "Cancel",value: null,visible: true,
               closeModal: true,
              },
              confirm: {
               text: "Yes, "+action_type, value: true,visible: true,
               closeModal: false
              }
            },
            text:" About To "+action_type +" Blood Purchase",dangerMode:true})
            .then((value) => {
              if(value) {
               /** when confirmed.. send to server **/
               /**********************************************/
               var req = $.ajax({
               url:"formsubmit.php", data:{ process_blood_purchase:'this',data_text:data_text, action_type:action_type,
               compatibility:compatibility, investigation:investigation}, method:"POST",});                    
               req.fail(function(e){ console.log(e.status+" Failed"); });   
                
               req.done(function(res){ 
                    var output = $.parseJSON(res);
                      swal({title:output['title'],text:output['text'],icon:output['icon'],html:true})
                      .then((next)=>{
                           window.location.reload();
                      });   
                });               
               /**********************************************/
               } 
            }); 
      }


      function confirmSaveToBank(){

         true_results = $('input[type="checkbox"]:checked'); 
         false_results = $('input[type="checkbox"]:not(:checked)'); 

         var true_ans = [], false_ans = [];
         true_results.each(function(){  true_ans.push($(this).val());  });
         false_results.each(function(){  false_ans.push($(this).val());  });

         if(true_ans.length > 1) {
             $('input#save_to_bank').prop('checked',false);
         }
         else {
            $('input#save_to_bank').prop('checked',true);
         }

         console.log(' true '+ true_ans.length);
          console.log(' false '+ false_ans.length);
      }

    function submitDonationTestReport(){
         
         true_results = $('input[type="checkbox"]:checked'); 
         false_results = $('input[type="checkbox"]:not(:checked)'); 
         text_results = $('input[type="text"].donation_result'); 
         var ticket_no = $('input:hidden#ticket_no').val(); 
         var donation_comment = $('input#donation_comment').val(); 
         /***********************/
         var final_blood_type = $('select#final_blood_type').val();
         var save_to_bank = $('input#save_to_bank:checked').val();
         /****************/
         if(save_to_bank == undefined){ save_to_bank = "no"; }
            
         var true_ans = [], false_ans = [], text_ans = [], text_refs = [];
         var l = Ladda.create(document.querySelector('button.donationReportBtn')); 

         true_results.each(function(){  true_ans.push($(this).val());  });
         false_results.each(function(){  false_ans.push($(this).val());  });
         text_results.each(function(){  
            text_refs.push($(this).attr('data-text')); 
            text_ans.push($(this).val());  
          });
         
         $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { submit_donation_test_report:"",true_ans:true_ans,false_ans:false_ans,ticket_no:ticket_no,
                        text_refs:text_refs, text_ans:text_ans, final_blood_type:final_blood_type, 
                        save_to_bank:save_to_bank ,donation_comment:donation_comment },
                  beforeSend:function(){ l.start(); },
                  success:function(res){
                  l.stop();
                  showToastPosition('bottom-center','Status', res,  'success'); 
                  }
                
               });

    }

   function submitLowDonationTestReport(){
      var donation_comment = $('input#low_donation_comment').val(); 
       var ticket_no = $('input:hidden#ticket_no').val(); 
       var l = Ladda.create(document.querySelector('button.LowDonationReportBtn')); 
       // submit 
        $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { submit_low_donation_test_report:"",ticket_no:ticket_no,
                           donation_comment:donation_comment },
                  beforeSend:function(){ l.start(); },
                  success:function(res){
                  l.stop();
                  showToastPosition('bottom-center','Status', res,  'success'); 
                  }
                
               });
   }

    function show_fitted_blood_form(){
       var status = $('input.is_blood_fitted:checked').val();
       
       $('table tr.not_fitted_blood').hide();
       $('table tr.fitted_blood, tbody.fitted_blood').hide();

       if(status =="yes"){
         $('table tr.fitted_blood, tbody.fitted_blood').show();
         $('table tr.not_fitted_blood').hide();
         
       }
       else if(status =="no") {
          $('table tr.fitted_blood, tbody.fitted_blood').hide();
           $('table tr.not_fitted_blood').show();
       }        
    }

    function load_final_template_report(temp_type='purchase',temp_from='template',ticket_no='',blood_type_id=''){
           elem = $("#"+temp_type+"_final_report_template");
           // alert(temp_type+' , '+temp_from+' , '+ticket_no+' , '+blood_type_id); exit; 
            spin = "<span class='fa fa-spinner fa-spin fa-3x'></span>"; 
            $.ajax({  
                    method:'post',   url:'ajax.php',
                    data:{load_final_report_template:'this',temp_type:temp_type,
                     temp_from:temp_from , ticket_no:ticket_no , blood_type_id:blood_type_id},
                     beforeSend:function(){ elem.html(spin);  },
                     success:function(resp){  
                           elem.html(resp); initMce(); 
                     },error:function(resp){
                          elem.html(resp); 
                    }
                });  // end ajax
        }

 
      $(function(){
      //	hide_update_buttons(); 
      	  
      //	 loader('hide'); 
      	 
      	 // to display saved specimen 
      	 elem = $('.pd');    
      	 view_tickets('no',$('.pd'));

         
      });

      function load_donation_categ_qtn(qtn_ids,ticket_no){
         var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
         
         elem = $('.test_qtn_displayer');
           $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: { load_donation_categ_qtn:"",qtn_ids:qtn_ids,ticket_no:ticket_no },
                beforeSend:function(){ elem.html(spin);},
                success:function(res){
                  elem.html(res);                  
                  }
                
               });
      }     

      
      
   </script> 
</html>
