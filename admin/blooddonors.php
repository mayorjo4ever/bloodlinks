<?php    require "usercheck.php"; 	
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
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card"> 
				
        <div class="card-header" style="padding-bottom:5px;">  
						<div class="col-md-12 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo $this_page['title']; ?>  </span> &nbsp;  </div>
				</div>  <!--  ./ card-header -->  
				
				<div class="card-body">                    
				     <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="height:auto">
                    
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
          <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist"> 
            <li class="nav-item " >
              <a  class="nav-link active"  id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Take New Donation  </a>
              </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
              
              <li class="nav-item "> <!-- disabled -->
              <a class="nav-link  "  onclick="view_recent_donation('no',$('.drv'))" id="tab2"  data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Recent Donors  </a>
              </li> 
            </ul> 
           
              <div class="tab-content tab-content-solid">
                <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                   <?php require "donor_customer_checker.php"; ?> 
                </div> <!-- ./ tab-pane -->
      
                <div class="tab-pane fade " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2">                 
                  <?php require "recent_donors.php"; ?> 
                </div>  
             
              </div> <!-- ./ tab-content -->

                  </div>
                </div>
              </div>
          </div>
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			  
          </div> <!-- ./ row --> 
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
  
  <script src="../assets/js/lab_rep_script.js"></script>
  <script src="../assets/js/shared/iCheck.js"></script>
</body>

  <script>

      $(function(){
          $('.step-1').show('fast');  $('.step-2,.step-3').hide('fast');
          
          $('input:radio.blood_type').on('ifChanged',function(){
             var blood_type = ($(this).val());            
             $('div.icheck').removeClass('table-success');
             $(this).closest('div.icheck').addClass('table-success');
          });
          
          // saving save_donor_supply  
          $('button#save_donor_supply').on('click',function(){
             var blood_type = $('input:radio.blood_type:checked').val(); 
             var cell_volume = $('#cell_volume').val(); 
             var date_collected =  $('#date_collected').val(); 
             var customer_id = $('input#customer_id').val(); 
               var l = Ladda.create( document.querySelector('#save_donor_supply'));  
             // alert( blood_type+" -- "+cell_volume +" "+date_collected +" "+ customer_id);
             // save to db

             if(blood_type==undefined || cell_volume=="" || date_collected==""){
                  showToastPosition('bottom-center','You must complete all the required filled','Blood Type, Cell Volume and Date Received cannot be null','error'); 
             }
             else { 

             $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: {save_donators_blood:"",blood_type:blood_type,cell_volume:cell_volume,
                       date_collected:date_collected, customer_id:customer_id
                },
                beforeSend:function(){ l.start(); },
                success:function(res){
                      output = $.parseJSON(res);
                        showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
                         l.stop();
                         // cond 
                         if(output['icon']=="success"){
                           wipe_donation(); stepBack(); 
                         }

                        }
                    }); 
                } // end else 
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
                                  }, beforeSend:  function(){  l.start();  }  }); 

                          req.fail(function(e){ console.log(e.status);  l.stop();  });
                          req.done(function(res){  l.stop();
                              // elem.html(res);  
                              output = $.parseJSON(res);
                              if(output[0]=='no'){
                                  custom_id.removeClass('border-success').addClass('border-danger'); 
                                      showToastPosition('bottom-center','Unrecognized Customer Details',' Record Not Found','error');                                        
                                  }
                                  else {
                                    // hide step-1 search form 
                                    $('div.step-1').hide('fast');  
                                    $('div.step-2').show('fast');  
                                    //
                                      $('input:hidden#customer_type').val('existing'); 
                                      $('span.customer_type').html('Create Existing Customer Ticket ( '+value+') ');                                                                                                                                       
                                      $('span.customer_type').removeClass('badge-success').addClass('badge-info')
                                      $('button#save_custom_profile').removeClass('btn-success').addClass('btn-info');
                                      $('input:hidden#customer_id').val(value); 
                                      // id = "stock-tab1";  enableTab(id);   showTab(id);
                                      fill_bio_info(output[1]); 
                                      } 
                          });
                     }

                     return false; 
            }); 
        /*****************************************************************/
            
        function fill_bio_info(data=[]){
              // $('#surname').val(data['surname']);
              // $('#othername').val(data['othername']);
              //$('#sex').val(data['sex']);
              //$('#age').val(data['dob']);
              //$('#phone').val(data['phone']);
              //$('#hospital').val(data['hospital']);

              $('.customer_name').html(data['surname']+" "+data['othername']);
              $('.customer_phone').html(data['phone']); 
               $('.customer_gender').html(data['sex']); 
              $('.customer_id').html(data['id']); 
              $('input#customer_id').val(data['id']); 
               $('.customer_blood_type').html(data['blood_type']==""?"----":data['blood_type']); 
              $('.customer_last_donation_date').html(data['last_donation_date']=="" ? "----": data['last_donation_date']); 
               
            }
              
               function  view_recent_donation(process_status,elem,process_date=""){ 
                var req = $.ajax({ 
                    url:"formsubmit.php", data:{ view_recent_donation:'this',process_status:process_status,process_date:process_date}, method:"POST",beforeSend:function(){  elem.html("<i class='fa fa-spinner fa-spin fa-3x'></i>"); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                  }); 
               }

              function wipe(){
                  $('#surname').val('');
                    $('#othername').val('');
                    $('#sex').val('');
                    $('#age').val('');
                    $('#phone').val('');
                    $('#hospital').val(''); 
              }

               function wipe_donation(){
                  $('input').val('');
                  $("input[type='radio']").prop('checked',false);                  
                  $('div.icheck').removeClass('table-success');
                  
              }


              function stepBack(){
                 $('div.step-1').show('fast'); 
                 $('div.step-2').hide('fast');
                 $('div.step-3').hide('fast'); 
              }

              function stepBack2(){
                 $('div.step-2').show('fast'); 
                 $('div.step-1').hide('fast'); 
                 $('div.step-3').hide('fast'); 
              }

               function toStep3(){
                // alert('to next step');
                 $('div.step-3').show('fast'); 
                 $('div.step-2').hide('fast'); 
              }
              
              
            function loader(disp_type='show'){
              if(disp_type=='show') { $('p.loader').show(); $('span.loader').addClass('fa fa-spinner fa-spin fa-3x'); }
              if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('fa fa-spinner fa-spin fa-3x'); }
              // if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('mdi mdi-loading mdi-spin fa-3x'); }
            }
        
  </script>
</html>