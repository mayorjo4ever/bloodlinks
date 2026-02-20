<?php 
   require "usercheck.php"; 
   include_once "new_ticket_reminder.php";  
   
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   <!-- 
         <link rel="stylesheet" href="../assets/vendors/dropzone/dropzone.css">   -->
      <link rel="stylesheet" href="../assets/vendors/dropzone/basic.css">
      <!-- <link href="../assets/vendors/zoom-magnify/dist/css/magnify.css" rel="stylesheet" type="text/css"> -->
      <link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
      <link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">
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
                  <div class="row ">
                     <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card ">
                        <div class="card ">
                           <div class="card-body " style="height:auto">
                              <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?>  </h4>
                              <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
                              <input id="customer_type" type="hidden" value="new" />
                              <input id="customer_id" type="hidden" value="" />
                              <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold " role="tablist">
                                
                                   <li class="nav-item " >
                                    <a  class="nav-link active" id="tabNO" data-toggle="tab" href="#stock-tabNO" role="tab" aria-controls="stock-tabNO" aria-selected="false"> 01 -  New / Existing Customer   </a>
                                 </li>
                                 
                                 <li class="nav-item disabled" >
                                    <a  class="nav-link " id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> 02 - Profile Summary  </a>
                                 </li>
                                 <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
                                 <li class="nav-item disabled">
                                    <!--  -->
                                    <a class="nav-link " id="tab2" onclick="display_my_specimen($('.specimen_added'))" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> 03 -  Specimen Samples  </a>
                                 </li>
                                 <li class="nav-item disabled">
                                    <!--  -->
                                    <a class="nav-link " id="tab3" onclick="display_my_final_specimen($('.final_specimen_form'))" data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> 04 - Finalize Ticket </a>
                                 </li>
                              </ul>
                              <div class="tab-content tab-content-solid ">
                                  <div class="tab-pane fade show active" id="stock-tabNO" role="tabpanel" aria-labelledby="stock-tabNO">
                                    <?php require "customer_profile_checker.php"; ?> 
                                 </div>                                  
                                  <div class="tab-pane fade" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                                    <?php require "customer_profile_form.php"; ?> 
                                 </div>
                                 <!-- ./ tab-pane -->
                                 <div class="tab-pane fade" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
                                    <?php require "lab_schedule_form1.php"; ?> 
                                 </div>
                                 <div class="tab-pane fade" id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3"> 								
                                    <?php require "lab_schedule_form2.php"; ?> 
                                 </div>
                              </div>
                              <!-- ./ tab-content -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <?php # require "workflow_stats.php"?>
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
   </body>
   <!---->
   <script> 
      $(function(){
      	hide_update_buttons(); 
      	 display_form(); 
      	 loader('show'); 
      	 
      	 // to display saved specimen 
      	 elem = $('.specimen_added');    elem2 = $('.final_specimen_form');   
      	 display_my_specimen(elem); 
      	 display_my_final_specimen(elem2); 
      	 
      	 // stage two searching bills
      	 togBillSearchMode(true);  
      	 
         $("#specimen_bill_form").on('shown.bs.modal',function(){
            $(".dateicker").bootstrapMaterialDatePicker();
         });
      });


       function show_modal_form(formtype)  {
                var modal_title = "";

                if(formtype=="perform_test"){
                   
                    modal_title = "Add More Specimen for Testing ";                   
                    $("div.test_request_form").show();
                    $("div.donation_request_form,div.purchase_request_form").hide();
                 }  

                  else if (formtype=="donate_blood"){  
                        modal_title = "Blood Donation";

                        $("div.donation_request_form").show();
                        $("div.test_request_form,div.purchase_request_form").hide();

                    }  

                   else if (formtype=="buy_blood") {
                        modal_title = "Purchase Blood";
                        $("div.purchase_request_form").show();
                        $("div.test_request_forstart_blood_donationm,div.donation_request_form").hide();
                        
                    }   
                    $("div.disp_content").html('..');
                    $('span.modal_title').html(modal_title);
               
           }
            
            // blood purchase         
            function show_available_blood(){
              var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
              var elem = $("div.disp_content");
              var req = $.ajax({ 
                    url:"formsubmit.php", data:{ show_available_blood:'this'}, method:"POST",beforeSend:function(){  elem.html(spin); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                  });   

            }

            //start_blood_donation
            function start_blood_donation(){
              var customer_id = $('input#customer_id').val();   
              var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
              var elem = $("div.disp_content");
              var req = $.ajax({ 
                    url:"formsubmit.php", data:{ start_blood_donation:'this', customer_id:customer_id }, method:"POST",beforeSend:function(){  elem.html(spin); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                      init_datepicker(); 
                  });  
            }
            /*************************/
            function save_blood_donation(){
              var customer_id = $('input#customer_id').val(); 
              var date_collected = $('input#date_collected').val(); 
              var blood_type = $('select#blood_type').val();  
              var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
              var elem = $("div.disp_content");
              // alert(customer_id +" "+blood_type+ " "+ date_collected + " " + time_collected);
             
             if(blood_type=="" || date_collected =="")
                 {
                     showToastPosition('bottom-center','Please Complete The Form ',' All must not be empty','error');  
                 }
            else { 
              var req = $.ajax({ 
                    url:"formsubmit.php", data:{ save_blood_donation:'this',
                    customer_id:customer_id,date_collected:date_collected,
                        blood_type:blood_type
                    }, method:"POST",beforeSend:function(){  elem.html(spin); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                  });  
            }
                 
            }

      
   </script> 
   
   <script>
         
       $(function(){
        
        $('button.calc_dob').on('click',function(){
              var age_no = $('#age_sample').val();
               var age_type = $('select.age_type').val();
               if(age_no==""){
                    showToastPosition('bottom-center','Enter The Age Calculator',' Empty Value','error');  
               }
               else {
                    $.ajax({							
                url: 'formsubmit.php',
                type: 'POST',
                beforeSend:function(){ console.log(age_no+" "+age_type);},
                data: {estimateMyDOB:"",age_no:age_no,age_type:age_type},                
                success:function(response){
                    $('#age').val(response);  
                    console.log(response);
                 }
                 });  // ajax
             } // end else  
           });

          $('input:radio.blood_type').on('ifChanged',function(){
             var blood_type = ($(this).val());            
             $('div.icheck').removeClass('table-success');
             $(this).closest('div.icheck').addClass('table-success');
          });

        }); 
        
        
       $('#profile_checker').on('keyup',function(){
        search_text = $(this).val();  elem = $('.search_result'); 
        /*********************/
        var l = Ladda.create( document.querySelector('#search_profile'));			
        /**********************/
        displayer = $('.num_list2');  
        if(search_text.length >=1) {  $.ajax({							
                url: 'formsubmit.php',
                type: 'POST',
                data: {auto_search_customer_profile:"",keyword:search_text},
                beforeSend:function(){l.start(); /**  $('.search_result').html(''); **/},
                success:function(data){
                        displayer.show();
                        displayer.html(data);
                        l.stop();
                        }
                    }); 
                }
                else {
                displayer.hide(); 						
                }
        });  
      /*****************/
      
       function set_customer_found(name,id) {
		// change input value
		$('#profile_checker').val(name);
		$('.num_list2').hide(); 
		/*********************/
                $("div.search_result").html('');
		$('#search_profile').click(); 		
	}
        
	/*****************/
        
        $('#new_custom_profile').on('click',function(e){  
              elem = $("div.search_result"); elem.html('');
              id = "stock-tab1";  enableTab(id);  showTab(id);
              $('input#customer_type').val('new'); 
              $('input#customer_id').val(''); 
              $('span.customer_type').html('Create New Customer Ticket '); 
              $('span.customer_type').removeClass('badge-info').addClass('badge-success');
              $('button#save_custom_profile').removeClass('btn-info').addClass('btn-success');
              wipe(); 
        });
       
        $('#search_profile').on('click',function(e){  
                    custom_id = $('#profile_checker'); value = custom_id.val();   
                    elem = $("div.search_result");
                     if(value=="" ){ // hrm/20/0000 
                            custom_id.removeClass('border-success').addClass('border-danger'); 
                            showToastPosition('bottom-center','Invalid Customer ID','ID Must be 10 digits - '+value,'error'); 
                     } // end if 
                     else{
                            custom_id.removeClass('border-danger').addClass('border-success');  
                             /*********************/
                             var l = Ladda.create(this);  
                            /*********************/
                                     var req = $.ajax({url : "formsubmit.php", method : "POST",
                                            data : { get_customer_profile:"new", id:value 
                                            }, beforeSend:  function(){  l.start();  elem.html(loader); }	 }); 

                                    req.fail(function(e){ console.log(e.status);  l.stop();  });
                                    req.done(function(res){  l.stop();
                                        // elem.html(res);  
                                        output = $.parseJSON(res);
                                        if(output[0]=='no'){
                                            custom_id.removeClass('border-success').addClass('border-danger'); 
                                                showToastPosition('bottom-center','Unrecognized Customer Details',' Record Not Found','error');                                        
                                            }
                                            else {
                                                $('input#customer_type').val('existing'); 
                                                $('span.customer_type').html('Create Existing Customer Ticket ( '+value+') ');                                                                                                                                       
                                                $('span.customer_type').removeClass('badge-success').addClass('badge-info')
                                                $('button#save_custom_profile').removeClass('btn-success').addClass('btn-info');
                                                $('input#customer_id').val(value); 
                                                id = "stock-tab1";  enableTab(id);   showTab(id);
                                                fill_bio_info(output[1]); 
                                                } 
                                    });
                     }

                     return false; 
            }); 
        /*****************************************************************/
            
        function fill_bio_info(data=[]){
              $('#surname').val(data['surname']);
              $('#othername').val(data['othername']);
              $('#sex').val(data['sex']);
              $('#age').val(data['dob']);
              $('#phone').val(data['phone']);
              $('#hospital').val(data['hospital']);
              }
              
          function wipe(){
                  $('#surname').val('');
                    $('#othername').val('');
                    $('#sex').val('');
                    $('#age').val('');
                    $('#phone').val('');
                    $('#hospital').val('');
              }

            function loader(disp_type='show'){
              if(disp_type=='show') { $('p.loader').show(); $('span.loader').addClass('fa fa-spinner fa-spin fa-3x'); }
              if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('fa fa-spinner fa-spin fa-3x'); }
              // if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('mdi mdi-loading mdi-spin fa-3x'); }
            }

            function init_datepicker(){
                 $('.datepicker').bootstrapMaterialDatePicker
                    ({  
                        time: false,  clearButton: true    
                    });
            
                    $('.datetimepicker').bootstrapMaterialDatePicker
                     ({ 
                        time: true,  format: 'YYYY-MM-DD H:m:s', clearButton: true  
                        });
            }

   </script>
</html>
