	
	

// jquery 
	$(function(){
		 
		/*********************************************************/
		$('input:checkbox.stud_box').on('click',function(){			
			highlight_check_rows(); 
			dis_enable_stud_buttons(); 
		});
		/*********************************************************/
		$('input:checkbox.exist_checkbox').on('click',function(){			
			highlight_exist_check_rows(); 
			dis_enable_exist_stud_buttons(); 
		});
		/*********************************************/
		$("input:text.hospital_form").on('change keyup focus',function(){
				name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
				switch(name){
					case "hosp_name": case "address":
					 {
						if(value!="" && value.length>=6 ){							 
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
					case "contact_no":{
							if(value!="" && value.length>=11 ){							 
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
		$('#save_hospital,#update_hospital').on('click',function(){
			mode = $(this).attr('mode');  serial = $(this).attr('for'); 
				 $('input:text.hospital_form,select.hospital_form').each(function(){
					 name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
					 switch(name){
						case "hosp_name": case "address": {
						if(value!="" && value.length>=6 ){							 
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
					case "contact_no":{
							if(value!="" && value.length>=11 ){							 
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
					if($('#hosp_name').val()!="" && $('#hosp_name').val().length>=6 && $('#address').val()!="" && $('#address').val().length>=6  && $('#contact_no').val()!="" && $('#contact_no').val().length>=11  ){
					// send to ajax 
					 /*********************/
						var l = Ladda.create(this);  
						/*********************/
						 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { save_this_hospital:"new", hosp_name:$('#hosp_name').val(),
							address:$('#address').val(), contact_no:$('#contact_no').val(),
							mode:mode,serial:serial
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
						  // if(output['icon']=='success') { $('input:text').val(''); $('select option[value=""]').prop('selected', true); }
						}); 
				} 
				else{
					showToastPosition('bottom-center','Form Not Complete','Please Fill All The Entries','error');
				} 
		});
		/**********************************/ 
		
		$('select#staff_list').on('change',function(){
			id = $(this).val(); texts = "";
			if(id!=""){
				texts = $('select#staff_list option:selected').text(); 
				$('input#acct_name').val(texts); 
				$('input#acct_name').trigger('change'); 
			}
		}); 
		
		/***************************************/
		$("input:text.salaryforms,select.salaryforms").on('change keyup focus',function(){
				name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
				switch(name){
					 case "acct_name": case "bank_list": case "staff_list": 
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
		/***************************************/
		$('#create_bank_account,#update_bank_account').on('click',function(){
			mode = $(this).attr('mode');  serial = $(this).attr('for'); 
				 $('input:text.salaryforms,select.salaryforms').each(function(){
					 name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
					 switch(name){
					 case "acct_name": case "bank_list": case "staff_list": {
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
					if( $('#acct_name').val().length>=3 && $('#acct_name').val()!="" && $('#bank_list').val()!="" && $('#bank_list').val().length>=3 && $('#staf_list').val()!=""  && $('#acct_no').val()!="" && $('#acct_no').val().length>=10 ){
					// send to ajax 
					 /*********************/
						var l = Ladda.create(this);  
						/*********************/
						 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { create_bank_account:"new", staff_id:$('#staff_list').val(),acct_name:$('#acct_name').val(),
							bank_list:$('#bank_list').val(),acct_no:$('#acct_no').val(),mode:mode,serial:serial
							 }, beforeSend:  function(){  l.start(); }	
						}); // end ajax
						// 2
						req.fail(function(e){
							console.log(e.status);  l.stop(); 
						});
						// 3
						req.done(function(res){   alert(res);
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
	

		$('#create_invoice_memo').on('click',function(){
			hosp_id = $(this).attr('for');
			default_acct_id = $('input:radio.default_acct:checked').val(); 
			
			if(default_acct_id ==undefined || default_acct_id == ""){
				$('input:radio.default_acct').removeClass('has-success').addClass('has-error');
				showToastPosition('bottom-center','Select Account To  Remit','Please ensure you select the default account that the invoice will be remited ','error');
			}
			else {
				$('input:radio.default_acct').removeClass('has-error').addClass('has-success');
				// send to ajax 
				 /*********************/
					var l = Ladda.create(this);  
					/*********************/
				 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { create_invoice_memo:"new",  hosp_id:hosp_id, acct_id:default_acct_id
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
						   if(output['icon']=='success') { window.setTimeout(function(){ window.location.reload();  },10000); }
						}); 
					//showToastPosition('bottom-center','Successful','Acct ID :'+default_acct_id+', Hosp ID '+hosp_id,'success');
				} 
			
		});
		
		
		
		/**********************************/
		
	}); // end jQuery 
	
	/**********************************************/ 
		function create_invoice(hosp_id){
			//  hosp_id  | amount 
			info = hosp_id.split('|'); 
			$('#create_invoice_memo').attr('for',info[0]); 
			$('span.total_invoice').text(info[1]);  
		}
	/*******************************************/
	 
	function del_hospital(data_text){ // swal(data_text);  hosp_name | address | hosp_id
		info = data_text.split('|');
		 swal({icon:'warning',title: ' Delete '+info[0]  , closeOnEsc:false,closeOnClickOutside:false,				 
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
				text:"About Deleting "+info[0]+' @ '+info[1]+' ?',dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ del_hospital:"this",info:data_text }  	
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
		         
			/*****************************/
			function manage_hospital_update(data_text){
				// swal(data_text); 
				infos = data_text.split('|'); // hosp_name | address | contact_no | serial 
				$('input#hosp_name').val(infos[0]);
				$('input#address').val(infos[1]);
				$('input#contact_no').val(infos[2]);
				 /***  update button **/ 
				$('#update_hospital').attr('for',infos[3]); 
			}
			/******************************/
			/////////////////////////////////////////////////// 
		function load_hospitals(elem){			 		
				 var req = $.ajax({
						url:"formsubmit.php", data:{ load_hospitals :'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option value=''> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
			/******************************/
			  
		// counting the no of student checked
			function count_studs_checked(){
				total = $('input:checkbox.stud_box:checked').length; 	
				/***show total selected ***/ 
					$('span.count').text(total); 
				/*** return result  ***/
				return total; 
			}
		/****************************************/	  
		// counting the no of student checked
			function count_exist_studs_checked(){
				total = $('input:checkbox.exist_checkbox:checked').length; 	
				/***show total selected ***/ 
					$('span.exist_count').text(total); 
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
		 function selectAllExisting(){
			elem = document.getElementsByName("exist_checkboxes[]");
				for(i=0; i< elem.length; i++){
				if(elem[i].type='checkbox') 
				elem[i].click()};		
				// 				
		}
		/****************************************************************/
		function clap(){
			swal('i clapped my hand ');
		}			
	// javascript 
		
		function highlight_exist_check_rows(){
			$('tr .exist_checkbox').each(function() {
					if(this.checked) {
						$(this).closest('tr').removeClass('table-default');
						$(this).closest('tr').addClass('table-danger');
					}	
					else {
						$(this).closest('tr').removeClass('table-danger');
						$(this).closest('tr').addClass('table-default');
					}
				});	
		}
		
		/******************************/
		function dis_enable_exist_stud_buttons(){
			total = count_exist_studs_checked(); 
				if(total > 0){
				$('button.remove-customer').prop('disabled',false);
				}
				else {
					$('button.remove-customer').prop('disabled',true);
				}
				
			}		
		/*****************************************************/	
		/******************************/
		function dis_enable_stud_buttons(){
			total = count_studs_checked(); 
				if(total > 0){
				$('button.add-customer').prop('disabled',false);
				}
				else {
					$('button.add-customer').prop('disabled',true);
				}
				
			}		
		/*****************************************************/	
	
		function add_customer(hosp_id){
			var customer = []; 	
			var discounts = []; 
			
				$("input:checkbox.stud_box:checked").each(function() {
					customer.push($(this).val());
					discounts.push($(this).closest('tr').find('input:text.non_exist_checkbox_discount').val());
				});
			/** prompt for saving selected customers **/
			swal({icon:'info',title: ' Include this '+customer.length+' Customer to the Invoice ? '  , closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Include !", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Including "+customer.length+" Customers to the invoice with discount amounts  ? "+discounts.join(' , '),dangerMode:false})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ add_customer_invoice:"this",customer:customer, hosp_id:hosp_id, discounts:discounts }  	
							});
						
					req.fail(function(e){  	console.log(e.status+" Failed");   });
					
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
				  }				  
				});
			
			/******/ 
		}
		
		/*************************************/
		function remove_customer(hosp_id){
			var customer = []; 			
				$("input:checkbox.exist_checkbox:checked").each(function() {
					customer.push($(this).val()); 
				});
                               // alert(customer);
                                // alert(hosp_id);
                               /** prompt for removing selected customers **/
			swal({icon:'info',title: ' Remove this '+customer.length+' Customer from the Invoice ? '  , closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Remove !", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Removing "+customer.length+' Customers from the invoice  ?',dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ remove_customer_invoice:"this",customer:customer, hosp_id:hosp_id }  	
							});
						
					req.fail(function(e){  	console.log(e.status+" Failed");   });
					
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
				  }				  
				});
			
			/******/ 
		}
	
		
		function load_banks(elem){
				spin = ""; 
				var req = $.ajax({
						url:"formsubmit.php", data:{ load_banks:'all'}, method:"POST", 	beforeSend:function(){ elem.html(spin); } }); 
					req.done(function(res){ 	elem.html(res); });
			}
			/**********************************************/ 
			function load_staff(elem){
				spin = ""; 
				var req = $.ajax({
						url:"formsubmit.php", data:{ load_staff:'all'}, method:"POST", beforeSend:function(){ elem.html(spin); } }); 
					req.done(function(res){ elem.html(res); });
			}
			/**********************************************/ 
			
		
			function del_bank_account(data,id){
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
								data:{ del_bank_account:"this",serial:id, alias:data }  	
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
		/*************************************/
		
		function manage_accounts_update(data_text){
				//  alert(data_text); 
				infos = data_text.split('|'); //staff_id | bank_id | acct_name | acct_no | serial 
				 $('select#staff_list option[value="'+infos[0]+'"]').prop('selected', true);
				$('select#bank_list option[value="'+infos[1]+'"]').prop('selected', true);
				$('input#acct_name').val(infos[2]);
				$('input#acct_no').val(infos[3]);
				/***  update button **/
				$('#update_bank_account').attr('for',infos[4]);
			}
		
		