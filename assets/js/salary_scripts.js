
// jquery 
	$(function(){
		// load all banks to select box 
		
		/****** FIRST TAB - SCHEDULE PAYMENT *****************/
		$('button:submit.search_payment').on('click submit',function(e){
			 
			staff_range = $('select.staff_range'); 
			year = $('select.year'); 
			month = $('select.month');
			
			if(staff_range.val()=="")  { e.preventDefault(); 
				staff_range.removeClass('border-success').addClass('border-danger');  
				showToastPosition('bottom-center','Select Staff','Please ensure you fill all the parameters ','error'); 
			}
			
			else if(year.val()=="") {    e.preventDefault(); 
				year.removeClass('border-success').addClass('border-danger');  
				showToastPosition('bottom-center','Select Year','Please ensure you fill all the parameters ','error'); 
			}
			else if(month.val()=="") {    e.preventDefault(); 
				month.removeClass('border-success').addClass('border-danger');  
				showToastPosition('bottom-center','Select Month','Please ensure you fill all the parameters ','error'); 
			}
			else {
				staff_range.removeClass('border-danger').addClass('border-success');  
				year.removeClass('border-danger').addClass('border-success');  
				month.removeClass('border-danger').addClass('border-success');  
				// showToastPosition('bottom-center','Successful','Please ensure you fill all the parameters ','success'); 
			}
		});
		
		
		/*****		UNDER PAYMENT MODULE		******/
			
			$('button.search-staff-paym-schedule').on('click',function(){
					user_id = $(this).attr('data-text'); elem = $('div.salary_module_page'); 
					spin = "<span class='fa fa-spinner fa-spin fa-2x'></span>";
					$('tr').removeClass('table-success');
					$(this).closest('tr').addClass('table-success');	
					/****************************/ 
					var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { get_staff_salary_structure:'this',user_id:user_id  }, beforeSend:  function(){  elem.html('...please wait...'+spin); }	
						}); // end ajax
					req.fail(function(err){ alert(); });
					req.done(function(res){ elem.html(res);});
					
			});
		/*****		./ UNDER PAYMENT MODULE		******/
		
		bank_elem = $('select#bank_list');
		load_banks(bank_elem); 
		highlight_check_rows(); 
		dis_enable_card_stud_buttons(); 
		
		
		/*********************************************************/
		$('input:checkbox.stud_box').on('click',function(){			
			highlight_check_rows(); 
			dis_enable_card_stud_buttons(); 
		});
		/*********************************************/
		
		
		/*********************************************/
		
		$("input:text.salaryforms,select.salaryforms").on('change keyup focus',function(){
				name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
				switch(name){
					case "body_name": case "acct_name": case "bank_list": case "allowance_name":
					 {
						if(value!="" && value.length>=3 ){							 
							$('.'+id+'_text').removeClass('border-danger').addClass('border-success');  
							$('#'+id).removeClass('border-danger').addClass('border-success');  
							$('.'+id+'_icon').removeClass('text-danger').addClass('text-success'); 
						}
						else { 
							$('.'+id+'_text').removeClass('border-success').addClass('border-danger'); 
							$('#'+id).removeClass('border-success').addClass('border-danger');  
							$('.'+id+'_icon').removeClass('text-success').addClass('text-danger');
						}
					} break; 
					case "acct_no":{
							if(value!="" && value.length>=10 ){							 
							$('.'+id+'_text').removeClass('border-danger').addClass('border-success');  
							$('#'+id).removeClass('border-danger').addClass('border-success');  
							$('.'+id+'_icon').removeClass('text-danger').addClass('text-success'); 
						}
						else { 
							$('.'+id+'_text').removeClass('border-success').addClass('border-danger'); 
							$('#'+id).removeClass('border-success').addClass('border-danger');  
							$('.'+id+'_icon').removeClass('text-success').addClass('text-danger');
						}
					} break;
				} // end switch 
					
			}); // end input texts  
		
		/**********************************************/
		$('#create_allowance_btn,#update_allowance_btn').on('click',function(){
			mode = $(this).attr('mode');  serial = $(this).attr('for'); 
				 $('input:text.salaryforms,select.salaryforms').each(function(){
					 name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
					 switch(name){
						case "allowance_name": {
						if(value!="" && value.length>=3 ){							 
							$('.'+id+'_text').removeClass('border-danger').addClass('border-success');  
							$('#'+id).removeClass('border-danger').addClass('border-success');  
							$('.'+id+'_icon').removeClass('text-danger').addClass('text-success'); 
						}
					else { 
							$('.'+id+'_text').removeClass('border-success').addClass('border-danger'); 
							$('#'+id).removeClass('border-success').addClass('border-danger');  
							$('.'+id+'_icon').removeClass('text-success').addClass('text-danger');
						}
					} break; 	
				} // end switch 
			}); // end each
		/***  now validate  ***/
					if($('#allowance_name').val()!="" && $('#allowance_name').val().length>=3){
					// send to ajax 
					 /*********************/
						var l = Ladda.create(this);  
						/*********************/
						 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { create_new_allowance:"new", allowance_name:$('#allowance_name').val(),mode:mode,serial:serial
							 }, beforeSend:  function(){  l.start(); }	
						}); // end ajax
						// 2
						req.fail(function(e){
							console.log(e.status);  l.stop(); 
						});
						// 3
						req.done(function(res){  // alert(res);
							  var output = $.parseJSON(res);
							  swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
						   l.stop(); 
						   if(output['icon']=='success') { $('input:text').val(''); $('select option[value=""]').prop('selected', true); }
						}); 
				} 
				else{
					showToastPosition('bottom-center','Form Not Complete','Please Enter The Allowance','error');
				} 
		});
		/**********************************/ 

 		
		/***************************************/
		$('#create_paym_body,#update_paym_body').on('click',function(){
			mode = $(this).attr('mode');  serial = $(this).attr('for'); 
				 $('input:text.salaryforms,select.salaryforms').each(function(){
					 name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
					 switch(name){
						case "body_name": case "acct_name": case "bank_list": case "paym_type": {
						if(value!="" && value.length>=3 ){							 
							$('.'+id+'_text').removeClass('border-danger').addClass('border-success');  
							$('#'+id).removeClass('border-danger').addClass('border-success');  
							$('.'+id+'_icon').removeClass('text-danger').addClass('text-success'); 
						}
						else { 
							$('.'+id+'_text').removeClass('border-success').addClass('border-danger'); 
							$('#'+id).removeClass('border-success').addClass('border-danger');  
							$('.'+id+'_icon').removeClass('text-success').addClass('text-danger');
						}
					} break; 
					case "acct_no":{
							if(value!="" && value.length>=10 ){							 
							$('.'+id+'_text').removeClass('border-danger').addClass('border-success');  
							$('#'+id).removeClass('border-danger').addClass('border-success');  
							$('.'+id+'_icon').removeClass('text-danger').addClass('text-success'); 
						}
						else { 
							$('.'+id+'_text').removeClass('border-success').addClass('border-danger'); 
							$('#'+id).removeClass('border-success').addClass('border-danger');  
							$('.'+id+'_icon').removeClass('text-success').addClass('text-danger');
						}
					} break;
 
					} // end switch 
				 }); // end each
				
				/***  now validate  ***/
					if($('#body_name').val()!="" && $('#body_name').val().length>=3 && $('#acct_name').val().length>=3 && $('#acct_name').val()!="" && $('#bank_list').val()!="" && $('#bank_list').val().length>=3  && $('#acct_no').val()!="" && $('#acct_no').val().length>=10 ){
					// send to ajax 
					 /*********************/
						var l = Ladda.create(this);  
						/*********************/
						 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { create_paym_body:"new", body_name:$('#body_name').val(),acct_name:$('#acct_name').val(),
							bank_list:$('#bank_list').val(),acct_no:$('#acct_no').val(),mode:mode,serial:serial
							 }, beforeSend:  function(){  l.start(); }	
						}); // end ajax
						// 2
						req.fail(function(e){
							console.log(e.status);  l.stop(); 
						});
						// 3
						req.done(function(res){  // alert(res);
							  var output = $.parseJSON(res);
							  swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
						   l.stop(); 
						   if(output['icon']=='success') { $('input:text').val(''); $('select option[value=""]').prop('selected', true); }
						}); 
				} 
				else{
					showToastPosition('bottom-center','Form Not Complete','Please ensure you fill all the fields before submitting','error');
				} 
		});
		/**********************************/
		
		
		/***************************************/
		$('#add_this_staff_allowance').on('click',function(){
			mode = $(this).attr('mode');  staff_id = $(this).attr('for'); 
			var allowances = [];							
				$("input:checkbox.alloc_allowance:checked").each(function() {
					allowances.push($(this).val());
				});
			 // swal('allowances '+allowances+', staff id = '+staff_id);
			 if(allowances==null || allowances==""){
				 showToastPosition('bottom-center','No Allowance Selected','Please Select one or more allowances','error');
			 }
			 else{ 
				 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { add_to_this_staff_allowance:"this",allowances:allowances,staff_id:staff_id },
							beforeSend:  function(){   }	
						}); // end ajax
					
					req.fail(function(e){ 	console.log(e.status);   });
						
					req.done(function(res){ swal(res); 	}); 
				//showToastPosition('bottom-center','Successful','Good to go, '+allowances,'success');
			 }
			 
		});
		
		/***************************************/
		$('#add_this_staff_deduction').on('click',function(){
			mode = $(this).attr('mode');  staff_id = $(this).attr('for'); 
			var deductions = [];  var deduct_modes = [];  var percent_rates = [];							
			
			$("input:checkbox.alloc_deduction:checked").each(function() {
				deductions.push($(this).val());
			});
			
			proceed = true;
			
			 // swal('deductions '+deductions+', staff id = '+staff_id);
			 if(deductions==null || deductions==""){
				proceed = false; 
				// return false; 
				 showToastPosition('bottom-center','No deduction Selected','Please Select one or more deductions','error');
			 }
			 else{ 
				$("input:checkbox.alloc_deduction:checked").each(function() {
					 var percent_rate = $(this).closest('tr').find('input[type=text]');
					 var deduct_mode = $(this).closest('tr').find('select'); // amount/percent
					 
						if (deduct_mode.val() == "percent" && !parseFloat(percent_rate.val()))  {							
							percent_rate.removeClass('border-success').addClass('border-danger'); //textbox is empty							
							proceed = false; percent_rate.focus();  
							showToastPosition('bottom-center','Percentage Rate Empty','Please Enter The Percentage Rate','error');
						} 
						else {
							/****** save all results ***********/   
							deduct_modes.push(deduct_mode.val());
							percent_rates.push(percent_rate.val()); 
							/*******************************/
							percent_rate.removeClass('border-danger').addClass('border-success'); 						 
						}
				});
				
				if(proceed == true){
				/**********************/
				// alert('deduct_id='+deductions+', modes = '+deduct_modes+', percents = '+percent_rates);
				 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { add_to_this_staff_deduction:"this",deductions:deductions,deduct_modes:deduct_modes,percent_rates:percent_rates,staff_id:staff_id },
							beforeSend:  function(){   }	
						}); // end ajax
					
					req.fail(function(e){ 	console.log(e.status);   });
						
					req.done(function(res){ swal(res); 	}); 
				} // end if 
			 } /* end else */
			 
		});
		
		/***************************************************************/
		 
		$('select.deduct_mode').on('change',function(){
			mode = $(this).val(); elem = $(this).closest('tr').find('input[type=text]');
			switch(mode){
				case 'amount':{ elem.prop('disabled',true); } break; 
				case 'percent':{ elem.prop('disabled',false); } break; 
			}
		
		});
		/***************************************************************/
		
		
		$('select#role_id,select#step_val').on('change',function(){
			role_id = $('select#role_id'); 
			step_val = $('select#step_val'); 
			/************************/
			if(role_id.val()==""){ role_id.removeClass('border-success').addClass('border-danger'); }
			else {role_id.removeClass('border-danger').addClass('border-success');}
			if(step_val.val()==""){ step_val.removeClass('border-success').addClass('border-danger'); }
			else {step_val.removeClass('border-danger').addClass('border-success');}
			
			spins = "<span class='fa fa-spin fa-spinner fa-3x'></span>";
			elem = $('div.designation_result');
			
			if(role_id.val()!="" && step_val.val()!=""){
				 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { get_staff_designation_pay:"all", role_id:role_id.val(),step_val:step_val.val() },
							beforeSend:  function(){ elem.html(spins); }	
						}); // end ajax
					
					req.fail(function(e){
							console.log(e.status);  elem.html(e);; 
						});
						
					req.done(function(res){
							elem.html(res);
						}); 
			}
			else{ 	$('div.designation_result').html(''); 	}
			
		});
		/*******************************************/
		
		
		
	}); // end jQuery 
	
	/*******************************************/
	
	function del_staff_deduction(data_text){ 	// swal(data_text);  deduction_name | staff_name | allowance_id
		info = data_text.split('|');
		info = data_text.split('|');
		 swal({icon:'warning',title: ' Delete '+info[1]+' - '+info[0]+' ?', closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Delete!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Deleting "+info[1]+' '+info[0]+' ?',dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ del_staff_deduction:"this",info:data_text }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						  var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								window.location.reload(); 
								 }
							 });	
					 }); 
					
					/**********************************************/
					 // swal({text:data+ "'s Role with ID "+id+ " has been Deleted Successfully",icon:'success',buttons:'Thank You',timer:5000});
				  }				  
				}); 
		
	}
	/*******************************************/
	
	function del_staff_allowance(data_text){ // swal(data_text);  allowance_name | staff_name | allowance_id
		info = data_text.split('|');
		 swal({icon:'warning',title: ' Delete '+info[1]+' - '+info[0]+' ?', closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Delete!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Deleting "+info[1]+' '+info[0]+' ?',dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ del_staff_allowance:"this",info:data_text }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						  var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								window.location.reload(); 
								 }
							 });	
					 }); 
					
					/**********************************************/
					 // swal({text:data+ "'s Role with ID "+id+ " has been Deleted Successfully",icon:'success',buttons:'Thank You',timer:5000});
				  }				  
				});
			}
		
		function save_only_basic_salary(){  
				var staff_id = $('button.save_basic_salary').attr('for');
				var basic_salary = $('input#my_basic_salary');
				 
				if(basic_salary.val()=="" || parseInt(basic_salary.val())==0 ){
					basic_salary.removeClass('border-success').addClass('border-danger'); 
					salary_ok = false; 
					showToastPosition('bottom-center','Invalid Basic Salary','Basic Salary cannot be zero or blank','error'); 
					basic_salary.focus();
				}
				else{
					basic_salary.removeClass('border-danger').addClass('border-success'); 
					/***********************************************/
					 var l = Ladda.create(document.querySelector('button.save_basic_salary'));
					/***********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ save_staff_basic_salary:"this",
								staff_id:staff_id, basic_salary:basic_salary.val() 
								},
								beforeSend:function(){ l.start(); }
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed");  l.stop(); 
					 });
					
					req.done(function(res){ l.stop();
						var output = $.parseJSON(res);
						 showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
					 }); 
					/*******************************/
				
				}
		}
		
		/*******************************************/
			function save_my_salary(){  
				var bonus_ref = [];  var bonus = []; 
				var debit_ref = [];  var debits = []; 
				var bonus_ok = true;  var deducts_ok = true; 
				var salary_ok = true; var staff_id = $('button.save_my_salary').attr('for');
				
				basic_salary = $('input#my_basic_salary');
				if(basic_salary.val()=="" || parseInt(basic_salary.val())==0 ){
					basic_salary.removeClass('border-success').addClass('border-danger'); 
					salary_ok = false; 
					showToastPosition('bottom-center','Invalid Basic Salary','Basic Salary cannot be zero or blank','error'); 
					basic_salary.focus();
				}
				else {
				basic_salary.removeClass('border-danger').addClass('border-success'); 
				
				/*** calculate bonus **/
				/************************************************/  
				
				$("input:checkbox.bonus_fields:checked").each(function() {
						 
						 var amount = $(this).closest('tr').find('input[type=text]');
							if (amount.val() == "" || parseInt(amount.val())==0) {							
								amount.removeClass('border-success').addClass('border-danger'); 
								bonus_ok = false; 
								amount.focus();  
								showToastPosition('bottom-center','Invalid Bonus detail','Any Bonus checked cannot be zero or blank','error'); 
							} 
							else {
								amount.removeClass('border-danger').addClass('border-success'); 
								bonus.push(amount.val());  
								bonus_ref.push($(this).val());
								
							} 
					}); 
					/** end each [ bonus ] **/
					/*************************/
				
				
				/*** calculate deductuctions **/
				/************************************************/  
				
				$("input:checkbox.debits_fields:checked").each(function() {
						 
						 var amount = $(this).closest('tr').find('input[type=text]');
							if (amount.val() == "" || parseInt(amount.val())==0) {							
								amount.removeClass('border-success').addClass('border-danger'); 
								deducts_ok = false; 
								amount.focus();  
								showToastPosition('bottom-center','Invalid Deduction detail','Any Bonus checked cannot be zero or blank','error'); 
							} 
							else {
								amount.removeClass('border-danger').addClass('border-success'); 
								debits.push(amount.val());  
								debit_ref.push($(this).val());
							} 
					}); 
					/** end each [ bonus ] **/
					/*************************/
					
				/********************************
					*** final  approval ***
				*********************************/ 
				if(salary_ok==true && bonus_ok==true && deducts_ok==true){
					// ready to save now : swal('successful','success'); 	// 'salary: '+basic_salary.val()+', bonus : '+bonus+', deductions: '+debits+', plus bonus_ref'+bonus_ref+' and debit_ref: '+debit_ref
					/***********************************************/
					 var l = Ladda.create(document.querySelector('button.save_my_salary'));
					/***********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ save_my_salary_details:"this",
								staff_id:staff_id, basic_salary:basic_salary.val(), bonus_ref:bonus_ref, 
								bonus:bonus, debit_ref:debit_ref, debits:debits
								},
								beforeSend:function(){ l.start(); }
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed");  l.stop(); 
					 });
					
					req.done(function(res){  swal(res); l.stop();
						 /** var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								window.location.reload(); 
								 }
							 });	
							**/
					 }); 
					/*******************************/
				}
					
				}
			}
			
			/**************************/
			function reverse_salary(){
				 /********/
				  staff = []; param = $('button.pay_salary').attr('data-text'); /*** year / month  ***/ 
				 	$("input:checkbox.stud_box:checked").each(function() {
						staff.push($(this).val()); 
					}); 
					/** end each [ staff ] **/
					/*************************/
					
					month = $('select.month option:selected').text();
					
				swal({icon:'warning',title: ' Reverse '+staff.length+' Staff Payments for the month '+month, closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Reverse!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Reversing "+staff.length+" salary Payment for the month "+month,dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ reverse_the_staff_salary :'this', staff:staff, param:param }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						 
							 swal(res); setTimeout(function(){window.location.reload()},1500);
							 	
					 }); 
					
					/**********************************************/
					 // swal({text:data+ "'s Role with ID "+id+ " has been Deleted Successfully",icon:'success',buttons:'Thank You',timer:5000});
				  }				  
				});	
			}
			/**************************/
			 /******** now pay salary to***************/
			 function pay_salary(){ 
				 paym_method = $('select.paym_method'); 
				 paym_status = $('select.paym_status'); 
				 staff = []; param = $('button.pay_salary').attr('data-text'); /*** year / month  ***/ 
				 	$("input:checkbox.stud_box:checked").each(function() {
						staff.push($(this).val()); 
					}); 
					/** end each [ staff ] **/
					/*************************/
					if(paym_method.val()==""){
						paym_method.removeClass('border-success').addClass('border-danger'); 
						paym_method.focus();
						showToastPosition('bottom-center','No payment method','Please Select one of the payment method','error'); 
					}
					else {
						paym_method.removeClass('border-danger').addClass('border-success'); 
						/***********************************************/
					 var l = Ladda.create(document.querySelector('button.pay_salary'));
					/***********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ pay_the_staff_salary:"this",
								staff:staff, paym_method:paym_method.val(), paym_status:paym_status.val(), 
								param:param
								},
								beforeSend:function(){ l.start(); }
							});
					
					req.fail(function(e){   console.log(e.status+" Failed");  l.stop();   });
					
					req.done(function(res){  swal(res); l.stop(); 
						setTimeout(function(){window.location.reload()},1500);
					}); 
					 
					}
					/*******************************************/
				 
			 }
			
			
	
			function del_paym_body(data,id){
				 /********/
				swal({icon:'warning',title: ' Delete '+data+' ?', closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Delete!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Deleting "+data,dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ del_body_paym:"this",serial:id, alias:data }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						  var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								window.location.reload(); 
								 }
							 });	
					 }); 
					
					/**********************************************/
					 // swal({text:data+ "'s Role with ID "+id+ " has been Deleted Successfully",icon:'success',buttons:'Thank You',timer:5000});
				  }				  
				});	
		 }
			
			function load_banks(elem){
				spin = ""; 
				var req = $.ajax({
					url:"formsubmit.php", data:{ load_banks:'all'}, method:"POST",
					beforeSend:function(){ elem.html(spin); }
					}); 
					req.done(function(res){
						elem.html(res);
					});
			}
			
			/*****************************/
			function calc_month_pay(value){
				value = parseFloat(value);
				month_pay = value/12; 
				month_pay = month_pay.toFixed(2);
				return "&#8358; "+numberSeparator(month_pay);
			}
			/*****************************/
			function display_salary_steps(year,role_step,elem,elem_2){
			  infos = role_step.split('|');  // role - step-level 
			  span_elem = $('span.'+infos[0]); 
			  spin = "<i class='fa fa-spinner fa-spin'></i>";
				var req = $.ajax({
					url:"formsubmit.php", data:{ display_salary_steps:'this',
					role_id:infos[0], step_val:infos[1]}, method:"POST",
					beforeSend:function(){ span_elem.html(spin); elem_2.html(spin); }
					}); 				
					req.fail(function(e){ console.log(e.status+" Failed"); span_elem.html(''); });	
					
					req.done(function(res){    // swal($.trim(res));							
						  span_elem.html('');
						  elem.val($.trim(res)); 
						  month_pay = calc_month_pay(res); 
						  elem_2.html(month_pay);
						 span_elem.html('');
					});
			}  
			/*****************************/
			function update_salary_steps(role_step,amount){
				 infos = role_step.split('|');  // role - step-level 
				 if(amount==0 ||amount==""){
					showToastPosition('bottom-center','Invalid Amount','Amount must not be zero or blank','error'); 
				 }
				 else{ 
				 /***************************/
					 var l = Ladda.create(document.querySelector('button.'+infos[0]));
					 /***************************/
					 var req = $.ajax({
						url:"formsubmit.php", data:{ update_salary_steps:'this',
						 role_id:infos[0], step_val:infos[1],amount:amount}, method:"POST",
						beforeSend:function(){ l.start();  }
						});  /***************************/				
						req.fail(function(e){ console.log(e.status+" Failed"); l.stop();  });	
						/***************************/
						req.done(function(res){    // swal($.trim(res));							
							 var output = $.parseJSON(res);	   l.stop();  
							 showToastPosition('bottom-center',output['title'] ,output['text'],output['icon']); 
							 $('select.salary_step').trigger('change');
						});  
				 }
				// 
			}// end function 
			
			/*****************************/
			function manage_paym_bodies_update(data_text){
				// swal(data_text); 
				infos = data_text.split('|'); // body_name | bank_id | acct_name | acct_no | serial 
				// case "body_name": case "acct_name": case "bank_list": {
				$('input#body_name').val(infos[0]);
				$('select#bank_list option[value="'+infos[1]+'"]').prop('selected', true);
				$('input#acct_name').val(infos[2]);
				$('input#acct_no').val(infos[3]);
				/***  update button **/
				$('#update_paym_body').attr('for',infos[4]);
				
			}
			/******************************/
			/*****************************/
			function manage_credit_allow_bodies_update(data_text){
				// swal(data_text); 
				infos = data_text.split('|'); // allowance_name | serial 				
				$('input#allowance_name').val(infos[0]);
				/***  update button **/
				$('#update_allowance_btn').attr('for',infos[1]);
				
			}
			/******************************/
			function dis_enable_card_stud_buttons(){
				total = count_studs_checked(); 
					if(total > 0){
					$('button.salary_btn,select.salary_btn').prop('disabled',false);
					}
					else {
						$('button.salary_btn,select.salary_btn').prop('disabled',true);
					}
					
				}		
		/*****************************************************/	
		// counting the no of student checked
			function count_studs_checked(){
				total = $('input:checkbox.stud_box:checked').length; 	
				/***show total selected ***/ 
					$('span.count').text(total); 
				/*** return result  ***/
				return total; 
			}
		/****************************************/
			
			/*****************************/
			function hide_update_buttons(){
				$('.updators').hide('fast');
				$('.creators').show('fast');
				$('input:text').val('');
				$('select option[value=""]').prop('selected', true);
			}
			function show_update_buttons(){
				$('.updators').show('fast');
				$('.creators').hide('fast');
			}