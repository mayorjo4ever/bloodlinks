<?php 
	   require "usercheck.php"; 
	   include_once "invoice_script.php";   
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?> 
	<link rel="stylesheet" href="../assets/vendors/dropzone/basic.css"> 	 
	 
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
                    <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?> &nbsp; &nbsp; <span class="<?php echo $this_page['icon']; ?>"> </span> </h4>
                    <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
					<ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold " role="tablist"> 
						<li class="nav-item " >
							<a  class="nav-link active" id="tab4" data-toggle="tab" href="#stock-tab4" role="tab" aria-controls="stock-tab4" aria-selected="false"> Prepare New  Invoice   </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						<li class="nav-item " >
							<a  class="nav-link " id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Unpaid Invoices   </a>
						  </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
						  
						  <li class="nav-item"> <!-- disabled -->
							<a class="nav-link " id="tab2"   data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Paid Invoices   </a>
						  </li> 
						  
						  <li class="nav-item "> <!-- disabled -->
							<a class="nav-link " id="tab3"   data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> List of Hospitals Servicing  </a>
						  </li>  
						  
						   <li class="nav-item "> <!-- disabled -->
							<a class="nav-link " id="tab6"   data-toggle="tab" href="#stock-tab6" role="tab" aria-controls="stock-tab6" aria-selected="false"> Our Bank Accounts  </a>
						  </li>  
					  </ul> 
					 
                    <div class="tab-content tab-content-solid ">
                       <div class="tab-pane fade  show active" id="stock-tab4" role="tabpanel" aria-labelledby="stock-tab4"> 								
							<?php  require "new_invoice_tab.php"; ?> 
					  </div>  
					  
					  <div class="tab-pane fade" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                         	<?php  require "unpaid_invoice_tab.php"; ?> 
                      </div> <!-- ./ tab-pane -->
					  
                      <div class="tab-pane fade" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
							<?php require "paid_invoice_tab.php"; ?> 
					  </div> 
					   
                      <div class="tab-pane fade " id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3"> 								
							<?php require "hospitals_tab.php"; ?> 
					  </div>   
					  
					  <div class="tab-pane fade " id="stock-tab6" role="tabpanel" aria-labelledby="stock-tab6"> 								
							<?php  require "our_bank_account_tab.php"; ?> 
					  </div>  
					  
                    </div> <!-- ./ tab-content -->
                  </div>
                </div>
              </div>
          </div>
		  
		  <div class="row">
			<?php # require "workflow_stats.php"?>
		  </div> <!-- row ends -->
		    
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
	 
	<?php require "admin_js_links.php"; ?>
	  
	  <script src="../assets/js/invoice_scripts.js"></script>
	   <script src="../assets/js/billing_scripts.js"> </script>
	  <script src="../assets/js/lab_schedule_scripts.js"></script>
	  <!-- <script src="../assets/js/payment_script.js"></script> -->
	  
	  
	 <?php require "invoice_modals.php";?>
	
</body> <!---->
        <script> 
                $(function(){
                        hide_update_buttons(); 
                        load_hospitals($('select.hospitals')); 

                        bank_elem = $('select#bank_list');
                        staff_elem = $('select#staff_list');
                        load_banks(bank_elem); 					
                        load_staff(staff_elem); 				


                        // start-invoice by param - date
                        $('button.start-invoice-by-param').on('click',function(){
                         datefrom  = $('#datefrom'); 
                         dateto  = $('#dateto'); 
                         hosp_id = $('#hosp_id');
                         elem = $('.invoice_date_result'); 

                         if(hosp_id.val()==""){ hosp_id.focus(); alert('Select Hospital'); }
                         else if(datefrom.val()==""){ datefrom.focus(); }
                         else if(dateto.val()==""){ dateto.focus(); }
                         else {
                                 var req = $.ajax({
                                        url:"formsubmit.php", data:{ start_new_invoice_form:'all', hosp_id:hosp_id.val(), datefrom:datefrom.val(), dateto:dateto.val()}, method:"POST",beforeSend:function(){ elem.html("<i class='fa fa-spinner fa-spin fa-3x'></i>");} }); 
                                        req.fail(function(e){ console.log(" --- "+ e.status+" Failed"); elem.html(''); });
                                        req.done(function(res){ elem.html("<p>&nbsp;</p>"+res);  /** alert(res); **/ }); 				 
                                } 
                        });
                /******************************/

                // start-invoice by text search 
                        $('button.start-invoice-by-text').on('click',function(){ 
                         ticket_no  = $('#invoice_ticket_no'); 
                         hosp_id = $('#hosp_id');
                         elem = $('.invoice_date_result'); 

                         if(hosp_id.val()==""){ hosp_id.removeClass('border-success').addClass('border-danger');
                                 swal({title:'Select Hospital',text:'No Hospital Selected',icon:'warning'});
                                 }
                         else if(ticket_no.val()==""){ swal('Supply TIcket No','No TIcket Entered','warning'); ticket_no.removeClass('border-success').addClass('border-danger'); }
                         else {
                                 var req = $.ajax({
                                        url:"formsubmit.php", data:{ start_new_invoice_text_form:'all', hosp_id:hosp_id.val(),ticket_no:ticket_no.val()}, method:"POST",beforeSend:function(){ elem.html("<i class='fa fa-spinner fa-spin fa-3x'></i>");} }); 
                                        req.fail(function(e){ console.log(" --- "+ e.status+" Failed"); elem.html(''); });
                                        req.done(function(res){ elem.html("<p>&nbsp;</p>"+res);  /** alert(res); **/ }); 				 
                                } 
                        });
                /******************************/	

                display_search_type('param_form'); // text_form

                $('input:radio').on('ifChanged',function(){
                        val = $('input:radio:checked').val();
                        if(val!=undefined)  display_search_type(val); 
                });

                /*******************************/
				
					
			$('#invoice_ticket_no').on('keyup',function(){
				search_text = $(this).val();  elem = $('.search_result'); 
				/*********************/
				// var l = Ladda.create( document.querySelector('#search_ticket'));			
				/**********************/
				displayer = $('.num_list');  
				if(search_text.length >=1) {  $.ajax({							
						url: 'formsubmit.php',
						type: 'POST',
						data: {auto_search_ticket_for_invoice:"",keyword:search_text},
						beforeSend:function(){/** l.start();   $('.search_result').html(''); **/},
						success:function(data){
							displayer.show();
							displayer.html(data);
							// l.stop();
							}
					}); 
					}
					else {
					displayer.hide(); 						
				}
			});  
			/*****************/
			
			$('button#pay_invoice').on('click',function(){
				invoice_no = $(this).attr('for'); 
				amount_paying = $('#invoice_paying');  
				date_paid = $('#date_paid');  
				
				if(amount_paying.val()==""){
					swal('Enter Amount Paying','No Amount Entered','warning'); 
				}
				else if(!parseFloat(amount_paying.val()) || !parseInt(amount_paying.val())){
					swal('Invalid Amount','Amount Must Not Be Zero or String Value','warning'); 
				}
				else if(date_paid.val()==""){
					swal('Select Date Paid','You have not selected Payment Date','warning'); 
				}
				else {
				/*********************/
				var l = Ladda.create(this);  l.start(); 
				/**********************/
				 var req =  $.ajax({							
						url: 'formsubmit.php',
						method: 'POST',
						data: {pay_invoice:"this",invoice_no:invoice_no, amount_paying:amount_paying.val(),date_paid:date_paid.val() },
						beforeSend:function(){}						
					}); 
					
					req.done(function(res){  // alert(res);
						 var output = $.parseJSON(res);
							  swal({title:output['title'],text:output['html'],icon:output['icon']}).then((value) => {
								  window.location.reload();
								  });  
						   l.stop(); 
					});
				}
					 
			});  
			/*****************/
				
				
				});  // End jQuery 
				
		function set_ticket_found(name,id) {
		// change input value
			$('#invoice_ticket_no').val(name);
			$('#invoice_ticket_no').attr('ref',id);	 				
			$('.num_list').hide(); 
			/*********************/
			// $('#search_ticket').click(); 		
		}		
		
		function set_invoice_payment(data_text){
			info = data_text.split('|'); // invoice_no | hospital_name
			$('.invoice_no').html(info[0]);
			$('.hospital_name').html(info[1]);
			$('.total_cost').html(info[2]);
			$('.discount').html(info[3]);
			$('.fin_cost').html(info[4]);
			$('.amount_paid').html(info[5]);
			$('.invoice_balance').html(info[6]);
			
			$('button#pay_invoice').attr('for',info[0]);
			$('input#invoice_paying').val(0);
		}

		</script> 
</html>