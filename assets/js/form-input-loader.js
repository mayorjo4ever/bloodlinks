// JavaScript Document
	// form input loader 
	
	 
	/********/
	// javascript date and time 
	function getToday(){ 
			var d = new Date(); 
			var month = d.getMonth()+1; 
			var day = d.getDate(); 
			var today = d.getFullYear() + '-'+(month<10?'0':'')+month+'-'+(day<10?'0':'')+day; 
			return today; 
		}
	/**********************************************/ 
	/********/
	function hasError(elem){
			elem.removeClass('border-primary');
			elem.removeClass('border-success');
			elem.removeClass('border-info');
			elem.addClass('border-danger');
			 elem.parent('div.form-group').find('label').addClass('text-danger');
			
	}
	function has_success(elem){
			elem.removeClass('border-primary');
			elem.removeClass('border-danger');
			elem.removeClass('border-info');
			elem.addClass(' border-success ');		
	}
	//// ///////////////////////////////////////////////////// 			
	 
		function save_active_tab(tab,tab_type){ 
			  var req = $.ajax({url:"../assets/php/form-processor.php", data:{ save_active_tab:tab,tab_type:tab_type }, method:"POST"}); 
					req.fail(function(e){ console.log(e.status+" Failed"); });
					req.done(function(res){  console.log(res);   
						});   
			 }
		/***********************************************/	 
		 function  unlink_image(img_dir){
			 	swal({icon:'warning',title: ' Remove Image ?', closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Remove!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Removing Image for this stock ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({
					url:"formscript.php", data:{ unlink_image:'this',img_dir:img_dir }, method:"POST",}); 							
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
		 
	  
			////////////////////////////////////////////////////// 
			function display_my_roles(elem,myid){			 		
						 var req = $.ajax({
								url:"formsubmit.php", data:{ display_my_roles:'all',myid:myid }, method:"POST", beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>");  } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
		/////////////////////////////////////////////
			function assign_roles(user_id,roles){
					 
					//  swal(' role has been assigned for '+user_id);
					  var req = $.ajax({
								url:"formsubmit.php", data:{ assign_roles:'all',user_id:user_id,roles:roles }, method:"POST", beforeSend: function(){ 
								 
								 $('.myroles').html("<span class='fa fa-spin fa-spinner fa-3x'> </span>");  } }); 							
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ 
							// $('.myroles').html($.trim(res));
							  display_my_roles($(".myroles"),user_id);
						swal({title:'successful','text':$.trim(res),'icon':'success'});
						}); 
						// return false; 	
			}
			
			/////////////////////////////////////////////
			function remove_user_role(user_id,roles){
					 
			 /********/
				swal({icon:'warning',title: ' Unschedule Role ?', closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Unschedule!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Removing "+user_id+"' As "+roles,dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ remove_user_role:"this",user_id:user_id,roles:roles }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						  var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 display_my_roles($(".myroles"),user_id); 
							 });	
					 });
					
					
					/**********************************************/
					 // swal({text:data+ "'s Role with ID "+id+ " has been Deleted Successfully",icon:'success',buttons:'Thank You',timer:5000});
				  }
				  
				});
				}
				
					 /// swal(" remove "+user_id+" : "+roles)	
			 
		 
		////////////////////////////////////////////////////// 
			function display_priviledges(elem,role){			 		
						 var req = $.ajax({
								url:"dist/php/form-processor.php", data:{ display_priviledges:'all',role:role }, method:"POST", beforeSend: function(){  elem.html(' Loading '+role+' priviledges , Please Wait...'); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
		/////////////////////////////////////////////
			
		function assign_pages(selected){
				 var req = $.ajax({
								url:"formsubmit.php", data:{ assign_pages:'all',contents:selected }, method:"POST", beforeSend: function(){  
								// elem.html(' Loading '+role+' priviledges , Please Wait...'); 
								$("button#assign_page").prop('disabled',true);
								} 
							}); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ 
							$("button#assign_page").prop('disabled',false);
							swal('message',$.trim(res),'info').then((next)=>{
								window.location.href="";
							 }); 
							
						}); 	
				
			}		
		///////////////////////////////
			
			function reverse_pages(selected){
				 var req = $.ajax({
								url:"formsubmit.php", data:{ reverse_pages:'all',contents:selected }, method:"POST", beforeSend: function(){  
								// elem.html(' Loading '+role+' priviledges , Please Wait...'); 
								$("button#reverse_page").prop('disabled',true);
								} 
							}); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ 
							$("button#reverse_page").prop('disabled',false);
							swal($.trim(res),'message replied','info').then((next)=>{
								window.location.href="";
							 }); 
						
						}); 	
				
			}
		
		  
		////////// create new department  /////////////
		/************************************************/
		function validate_new_role(role,roleid){
				// check if this role exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ check_if_is_new_role:"this",role:role, roleid:roleid }, method:"POST",
							beforeSend: function(){  /*alert('about saving department');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res==true){
						 	swal("Ooops!", " This Role  '"+role+"' already exists, try another one ", "error");							
						 }
						 else
						 {
							swal("successful","you have now created a new role, called : "+role,"success");
							window.location.reload();	
						 }						 
					 }); 					
		}
		/***********************************************************/
		
		 
		function set_session(mydate){
			 
			var ymd = mydate.split("-");
			var a = Math.round((ymd[0]-1));			
			var b = Math.round(ymd[0]);
			var c = Math.round(b+1);
			
			if(ymd[1]<10) return a+"/"+b;
			else return  b+"/"+c; 
		}
		 // under certificate processing: 
			// counting the no of student checked
			function count_studs_checked(){
				total = $('input:checkbox.stud_box:checked').length; 	
				return total; 
			}
		/****************************************************************/
		function count_progs_checked(){
				total = $('input:checkbox.prog_box:checked').length; 	
				return total; 
			}
		/****************************************************************/
		function selectAllUsers(){
			elem = document.getElementsByName("checkboxes[]");
				for(i=0; i< elem.length; i++){
				if(elem[i].type='checkbox') 
				elem[i].click()};		
				// 				
		}
		/****************************************************************/
		
		
		function getSelectedUsers(){				
				var users = [];							
				/* look for all checkboxes that have a class 'checkme'
					 attached to it and check if it was checked */
						$("input:checkbox.stud_box:checked,input:checkbox.prog_box:checked").each(function() {
							users.push($(this).val());
						});
					return users;
				}
				
		function getSelectedStuds(){				
				var users = [];							
				/* look for all checkboxes that have a class 'checkme'
					 attached to it and check if it was checked */
						$("input:checkbox.stud_box:checked,input:checkbox.prog_box:checked").each(function() {
							users.push($(this).val());
						});
						tot_stud = count_studs_checked();
						$('span.new_selected_cards').html(tot_stud);
						$('button#update_program').attr('data-text',users);
						$('button.update_mult_completion').attr('ref',users);
						$('button.mult_not_completion').attr('ref',users);
						$('button.update_mult_dept').attr('ref',users);
					dis_enable_card_stud_buttons();
				}
			function submitStuds(){
				studs = $('button#update_program').attr('data-text');
				// alert(studs);
			}
			
		
		function display(elem,type){
			// alert(type); 
		/*** time conditions ***/
		switch(type){
			case "gettime":
			{
				var req = $.ajax({
						url : "formscript.php",method : "POST",data : { gettime:"now"},
						beforeSend:  function(){ // elem.html('loading....');
					}	
				});			
				req.fail(function(e){ console.log(e.status+" Failed"); /**alert(e.status);**/});
				
				req.done(function(res){ // alert(res);
					// var output = $.parseJSON(res);
					elem.html(res); 				 
				});
			} 
			break; 
			
			case "doc_awaiting_patient":
			{
				var req = $.ajax({
						url : "formscript.php",method : "POST",data : { doc_awaiting_patient:"now"},
						beforeSend:  function(){ // elem.html('loading....');
					}	
				});			
				req.fail(function(e){ console.log(e.status+" Failed"); /**alert(e.status);**/});
				
				req.done(function(res){
					// var output = $.parseJSON(res);
					elem.html(res); 				 
				});
			} 
			break; 
			
			case "count_patient_on_queue":
			{
				var req = $.ajax({
						url : "formscript.php",method : "POST",data : { count_patient_on_queue:"now"},
						beforeSend:  function(){ // elem.html('loading....');
					}	
				});			
				req.fail(function(e){ console.log(e.status+" Failed"); /**alert(e.status);**/});
				
				req.done(function(res){
					// var output = $.parseJSON(res);
					elem.html(res); 				 
				});
			} 
			break; 
		
			case "spec_scheduled_task":
			{
				var req = $.ajax({
						url : "formscript.php",method : "POST",data : { spec_scheduled_task:"now"},
						beforeSend:  function(){ // elem.html('loading....');
					}	
				});			
				req.fail(function(e){ console.log(e.status+" Failed"); /**alert(e.status);**/});
				
				req.done(function(res){
					// var output = $.parseJSON(res);
					elem.html(res); 				 
				});
			} 
			break; 
		
			case "all_patients":
			{
				var req = $.ajax({
						url : "formscript.php",method : "POST",data : { spec_scheduled_task:"now"},
						beforeSend:  function(){ // elem.html('loading....');
					}	
				});			
				req.fail(function(e){ console.log(e.status+" Failed"); /**alert(e.status);**/});
				
				req.done(function(res){
					// var output = $.parseJSON(res);
					elem.html(res); 				 
				});
			} 
			break; 
		
			 
			} // end switch 
				 
		 } // end function 
		 
		 
		
	
	 
			 
		/*******************************************
		********************************************		
		** GENERATING TEMPLATE FILE ****************
		********************************************		
		********************************************/		
		function download_templates(progs){
			// progs - is a collection of programmes to download for faculties
			// send the report to php file 
			
			
		}
			
		function load_states(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_states:'all' }, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading States, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(e.status+" Failed"); });
				
				req.done(function(res){ console.log(res); elem.html(res); }); 						
		}
		/////////////////////////////////////////////////
			
		function load_lga(elem,state){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_lga:'all',state:state }, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading L.G.A, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 						
		}
		///////////////////////////////////////////////// 
		/////////////////////////////////////////////////// 
		function load_patient_categories(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_patient_categories:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading Categories, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
		function display_patient_categories(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ display_patient_categories:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}	
		
		/**********************************/
		function display_conversation_type(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ display_conversation_type:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}	
		
		///////////////////////////////////////////////// 
		
	 
		/////////////////////////////////////////////////// 
		function load_all_bill_type(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_all_bill_type:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
	   // del_patient_bill_record  manage_receipt_view
	   function manage_receipt_view(data_text){
		   infos = data_text.split('|'); 
			// $data_text = $mysib['fullname'][$m]."|".$sid."|".$result_01['military_no'][$n]."|".$result_01['category'][$n]."|".$mysib['type'][$m];
			$('.pt_name').html(infos[0]);  
			$('.pt_hsp_id').html(infos[1]);  
			$('.pt_mil_id').html(infos[2]);  
			$('.pt_categ').html(infos[3]);   
			$('.pt_type').html(infos[4]);   
			$('#addPatientBillType').attr('data-text',data_text);  
			$('#generate_patient_receipt').attr('data-text',data_text);
			
			
			// add attr to button 
			// alert(data_text);
			// display all receipt 
			// displayPatientReceiptBillType 
			elem = $('.all_my_bills');
			var req = $.ajax({
						url:"formscript.php", data:{ displayPatientReceiptBillType:'all',datas:data_text}, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	
	   }
	   
		/////////////////////////////////////////////////// 
		
		function load_conversation_type(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_conversation_type:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
		
		/////////////////////////////////////////////////// 
		function load_sibling_types(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_sibling_types:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); /**** alert(res); ****/ }); 	 					
		}
	   /**********************************/
		function display_sibling_types(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ display_sibling_types:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}	
		
		function display_my_sibling(elem,ref,mode='few'){
				// swal(ref+' -- '+elem,'my siblings');
				// alert('fetch siblings ');	 		
				 var req = $.ajax({
						url:"formscript.php", data:{ display_my_sibling:'all',ref:ref,mode:mode}, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}	
		
		function manage_patient_docs(texts,ref){
			/************************************************/
					// swal(ref);
					$('.patient_name').html(texts);
					id = ref.split('_'); 	/** id + type  **/
					$('.patient_no').html(id[0]);
					$('.patient_status').html(id[1]); 
					
					/************************************************/ 
					 var req = $.ajax({
						url:"formscript.php", data:{ get_patient_info:'all',ref:ref}, method:"POST",
						beforeSend: function(){ /****  
									elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>");
								**/
								
								} 
						}); 
						
					req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
					
					req.done(function(res){ 
						 
						var output = $.parseJSON(res);
						 
						$('.patient_age').html(output['old']);
						$('.patient_on_schedule').html(output['onschedule']); 
						/*****   display all scheduled ticket for doctor *********/ 
						 display_patient_tickets($('.mytickets'),ref);
						}); 
					/************************************************/ 
						display_avail_docs($('.avail_docs')); 
					 /********************************************/						
		}
		
		 /**********************************/
		function display_avail_docs(elem){	 /** available doctors **/
				 var req = $.ajax({
						url:"formscript.php", data:{ display_avail_docs:'all'}, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}	
		
		/******************************/
		function display_patient_tickets(elem,ref){	 /** available doctors **/
				 var req = $.ajax({
						url:"formscript.php", data:{ display_patient_tickets:'all',ref:ref}, method:"POST",
						beforeSend: function(){ elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); alert(res);  });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}	
		/******************************/
		
		function forward_to_specs(user_id,role){			
			from_user_id = $('#from_user_id').attr('for');
			from_role_id = $('#from_role_id').attr('for');
			com_type = $('#fw_com_type').attr('for');
			/************************************/
			com_msg = $('#cur_com_msg').attr('data-text'); 
			ref_no = $('#cur_ticket_no').attr('for');
			/************************************/
			// final_forward_to_specs
			/*************************************/
			var req = $.ajax({url : "formscript.php",method : "POST",
							data:{ final_forward_to_specs:"this",from_user_id:from_user_id,
							from_role_id:from_role_id, dest_user_id:user_id,dest_role_id:role,
							ref:ref_no,com_type:com_type,com_msg:com_msg }  	
							});
						
					req.fail(function(e){   alert(e.status); 
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						// alert(res);
						   var output = $.parseJSON(res);
						   swal({title:output['title'],text:output['text'],icon:output['icon']})
							.then((next)=>{
								 if(output['icon']=="success"){
								    window.location.href="";
								 }
							 });
						});
		}
		/************************/
		function schedule_patient_docs(doctor){
			patient_id = $.trim($('.patient_no').html());
			patient_type = $.trim($('.patient_status').html());
			patient_name = $.trim($('.patient_name').html()); 
			
			 var req = $.ajax({
						url:"formscript.php", data:{ schedule_patient_docs:'all',doctor:doctor, patient_id:patient_id,patient_type:patient_type }, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){
					alert(res);  
					var output = $.parseJSON(res);
					swal({title:output['title'],text:output['text'],icon:output['icon']})
						.then((next)=>{
								 if(output['icon']=="success"){
								   manage_patient_docs(patient_name,patient_id+'_'+patient_type); // patient name 
								 }
							 });
					
				}); 			 
		}				
		/************************************************/
		function schedule_new_task(doctor){
			patient_id = $.trim($('.patient_no').html());
			patient_type = $.trim($('.patient_status').html());
			patient_name = $.trim($('.patient_name').html()); 
			
			 var req = $.ajax({
						url:"formscript.php", data:{ schedule_new_task:'all',doctor:doctor, patient_id:patient_id,patient_type:patient_type }, method:"POST",
						beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){
					// alert(res);  
					var output = $.parseJSON(res);
					swal({title:output['title'],text:output['text'],icon:output['icon']})
						.then((next)=>{
								 if(output['icon']=="success"){
								   manage_patient_docs(patient_name,patient_id+'_'+patient_type); // patient name 
								 }
							 }); 
				}); 			 
		}				
		
		/******************************/
		function delete_ticket(texts,ref){
			patient_doc = texts.split('_');
			patient_id = $.trim($('.patient_no').html());
			patient_type = $.trim($('.patient_status').html());
			patient_name = $.trim($('.patient_name').html());
			
				swal({icon:'warning',title: ' Delete Doctor Schedule  ?', closeOnEsc:false,closeOnClickOutside:false,				 
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
				text:"Do you want to delete this Schedule for "+patient_doc[0]+' assigned to doctor '+patient_doc[1],dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formscript.php",method : "POST",
								data:{ del_ticket:"this",ticket_no:ref }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						  var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								    manage_patient_docs(patient_name,patient_id+'_'+patient_type); // patient name 
								 }
							 });	
					 }); 
					
					/**********************************************/
					}
				  
				}); 
		} /**********************************************/ 
		
		function manage_comment_conversation(ref = '', com_type = '',com_msg = '',action = ''){
			// msg = ref+', '+com_type+', '+com_msg+', '+action;
			if(com_type==""){
				swal({title:'Select Conversation Type First',icon:'warning'});
			} else {
			switch (action){
				case 'save':{
						/**********************************************/
					var req = $.ajax({url : "formscript.php",method : "POST",
								data:{ save_comment_conversation:"this",
								ref:ref,com_type:com_type,com_msg:com_msg }  	
							});
						
					req.fail(function(e){   alert(e.status); 
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ 
						 alert(res);
						   var output = $.parseJSON(res);
						   swal({title:output['title'],text:output['text'],icon:output['icon']})
							.then((next)=>{
								 if(output['icon']=="success"){
								    window.location.href="";
								 }
							 });
						}); 
					 
				} break; 
				//  
				case 'forward':{
					 $('#cur_com_msg').attr('data-text',com_msg);
					 $('#cur_ticket_no').attr('for',ref);					 
					 $('#fw_com_type').attr('for',com_type);					 
					 $('.tog-messageTransferMedium').click(); 
					 // next schedule is : forward_to_specs(user_id,role)
					 
					 
				} break;
				
				case 'finish':{
					swal({title:'Finish Conversation: ',text:'About Forwarding To: '+msg});
				} break; 
				
				case 'cancel':{
					swal({title:'Cancel Conversation ',text:'About Forwarding To: '+msg});
				} break; 
				
				
			} // end switch 
			} // end else 
			return false; 
		}
	 
	 
		/******************************/
			function manage_payment_balance(recp_no,amount){
					
					var req = $.ajax({url : "formscript.php", method : "POST",
						data : { add_to_my_payment :"all", recp_no:recp_no,amount:amount
						}, beforeSend:  function(){ 
						// elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
						}	
						});
						/************************************************/
						req.fail(function(e){   alert(e.status); console.log(e.status); });
						/************************************************/
						req.done(function(res){
							 var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
									 $('.get_barcode_info').click();
								    // manage_patient_docs(patient_name,patient_id+'_'+patient_type); // patient name 
								 }
							 });    
						}); 
					 /**************** ***************/
					
			}
		/******************************/
		
		
		 /********************************************/
		 function manage_form_update(dtext,dfor,elem){
			 // dtxt = echo $type.'|'.$bill_categ['sn'][$n].'|'.$dept_info['sn'].'|'.$bill_types['price'][$m]; 
			 elem.attr('data-text',dtext);
			 elem.attr('for',dfor); 
			 console.log(dtext);
			 infos = dtext.split('|'); // name | categ_id | dept_id | price 
			 // save bill categ and department to server 
			 // $.ajax() //  load_bill_departments load_bill_category
			 var req = $.ajax({url : "formscript.php", method : "POST",
						data : { store_info :"all", bill_dept_id:infos[2],bill_categ_id:infos[1]
						}, beforeSend:  function(){ 
							console.log(':   '+dtext);
						}	
						});
			
			 /** unnder category **/
			 load_bill_departments($('select#bill_dept_id'));
			 // load_bill_departments($('#bill_dept_id2')),load_bill_category($('#bill_dept_id2').val(),$('#billCateg2');
			 $('select#bill_dept_id option[value="' + infos[2] +'"]').prop('selected', true);
			 $('select#bill_dept_id').trigger('change');
			 $('input#billCateg').val(infos[0]);
			 
			 // updateBillType 
			 /**** under category / bill type ***/
			 $('select#bill_dept_id2 option[value="' + infos[2] +'"]').prop('selected', true);
			 $('select#bill_dept_id2').trigger('change');
			 setTimeout(function(){
				load_bill_category(infos[2],$('#billCateg2')) ;
			 },1000);	 
			 $("#billType2").val(infos[0]);  //  $("#billType").val(infos[1]);
			 $("#billCost").val(infos[3]);   // $("#billCateg").val(infos[1]);
			 /*********************/
			 show_update_buttons(); 
		 }
		 /********************************************/
		 /********************************************/
		  function show_update_buttons(){
			  $("button.updators").show('fast');
			  $("button.creators").hide('fast');
		  }
		  function hide_update_buttons(){
			  $("button.updators").hide('fast');
			  $("button.creators").show('fast');			  
		  }
		/**********************************************/
		
	
	function clear_inputs(e) {
		$('input:text').val('');
	}
	  
	
	function rem_from_my_labtest(serial){
		// alert(' removing cart items id '+serial); 
		swal({icon:'warning',title: ' Remove Lab Test Result  ?', closeOnEsc:false,closeOnClickOutside:false,
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Yes, Remove!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"Do you want to remove this item from the list?  ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					  var req = $.ajax({url : "formscript.php",method : "POST",
								data:{ rem_from_my_labtest:"this",serial:serial }  
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){  // alert(res);
						  var output = $.parseJSON(res); 
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								   display_lab_test_results($('.all_lab_result'));
								 }
							 });	
					 }); 
					
					/**********************************************/
					}
				});
				
	}
	/*********************************************/
	
	function save_labtest_result(){
		/**************************************************************/
			var categ_id = $('#billCateg2');  categ_idMsg = $('.billCategMsg2');
			var dept_id = $('#bill_dept_id2'); dept_idMsg = $('.bill_dept_idMsg2');
			var billType = $('#billType2'); billTypeMsg = $('.billTypeMsg2');
			var result = $('#test_result'); resultMsg = $('.test_resultMsg');
			 	 
			if(!validateEmpty(dept_id,dept_idMsg,"Select  Department")){ 							 
				  	return false; 
				} 	 
			else if(!validateEmpty(categ_id,categ_idMsg,"Select Category ")){ 							 
				  	return false; 
					} 	
				else if(!validateEmpty(billType,billTypeMsg,"Select Test Type ")){ 							 
				  	return false; 
					} 	 
				else if(!validateEmpty(result,resultMsg,"Enter The Result")){ 							 
				  	return false; 
					} 	 
					else {
						var req = $.ajax({
							url:"formscript.php", data:{ save_labtest_result:"this",categ_id:categ_id.val(),
							dept_id:dept_id.val(),billType:billType.val(),result:result.val()}, method:"POST",
							beforeSend: function(){  
								// elem.html("<span class='fa fa-spin fa-spinner fa-2x'> </span>");
							} }); 
				
						req.fail(function(e){  console.log(e.status+" Failed");  //elem.html(""); 
						 });
					
							req.done(function(res){
								// alert(res); 
								 var output = $.parseJSON(res); 
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								   display_lab_test_results($('.all_lab_result'));
								 }
							 });	
							});
						} // end else 
		
	}
	////////////////////////////////////////
	
	/************************************************/
	function display_lab_test_results(elem){
		 
		var req = $.ajax({
			url:"formscript.php", data:{ display_lab_test_results:"all" }, method:"POST",
			beforeSend: function(){  
				 elem.html("<span class='fa fa-spin fa-spinner fa-2x'> </span>");
			  } }); 
				
			req.fail(function(e){  console.log(e.status+" Failed");  //elem.html(""); 
			 });
		
				req.done(function(res){
					elem.html(res);
				}); 
	}
	
	
	/************************************************/
			function auto_search_patient(elem,data,displayer) {
				var min_length = 2; // min caracters to display the autocomplete
				var keyword = data;
				if (keyword.length >= min_length) {
					console.log(keyword);
					$.ajax({							
						url: 'formscript.php',
						type: 'POST',
						data: {patient_name_search:"",keyword:keyword},
						success:function(data){ 
							console.log(data);
							displayer.show();
							displayer.html(data);
						}
					});
				} else {
					displayer.hide();
				}
			}
			/////////////////////////////////////////
	function del_patient_bill_record(id,data_text){		
				infos = id.split('|');  // sn | bill name
				
				 /********/
				swal({icon:'warning',title: ' Delete Bill ?', closeOnEsc:false,closeOnClickOutside:false,				 
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
				text:"About Deleting  a Bill of  "+infos[1]+"  ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formscript.php",method : "POST", 
								data:{ del_patient_bill:"this",serial:infos[0] }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){ // alert(res);
						  var output = $.parseJSON(res);
						  
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
									manage_receipt_view(data_text);
								 }
							 });	
					 }); 
					/**********************************************/
					 // swal({text:data+ "'s Role with ID "+id+ " has been Deleted Successfully",icon:'success',buttons:'Thank You',timer:5000});
				  }
				  
				});				 
			}
	 
	function manage_product_import_update(id,data_text){
			// id  = serial 
			infos = data_text.split('|'); // name | cost price | selling_price
			$('#product_cp2').val(infos[1]);
			$('#product_sp2').val(infos[2]);
			$('#update_new_import_stock').attr('data-text',id);
			$('span.product_name').html(infos[0]);
	}
		 
	
	function imageIsLoaded(e) {
		$("#itemImage").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', 'auto');
		$('#previewing').attr('height', '120px');

	}
	
	// 
	function check_expiry(){
		/************* working fine  ******************/
		 var has_expiry = $('input:radio.has-expiry:checked').val(); 
			 // alert(has_expiry);
			 if(has_expiry=="yes") $('div.has-expiry').show();
			  else $('div.has-expiry').hide(); 
		/*******************************************/ 
	}
	
	/*********************************************************/
		function saveBillDept(){	   // bill department 
			
		} // end function 
		// 
		   
		
		function saveBillCateg(){	 
			var billCateg = $("#billCateg");  	billCategMsg = $(".billCategMsg");
			 if(!validateEmpty(billCateg,billCategMsg,"Enter Bill Category ")){ 							 
				  	return false; 
					}						
				else {  
					/*********************/
					// var l = Ladda.create(this);  
					/*********************/
					// 1
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { save_new_bill_categ:"new bill categ", billCateg:billCateg.val()
								}, beforeSend:  function(){  // l.start(); 
								}	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							  $('#billCateg').val(''); 
							  window.location.href="";
						  }
						 // l.stop(); 
						 // load_conversation_type($('#pconverseType'));  
						 // display_conversation_type($('#converse_view'));  
					});  
				}	// else 			
			return false; 
		}

		 function updateBillType(){	 
			 dtext = $('button#updateBillType').attr('data-text');
			 dfor = $('button#updateBillType').attr('for'); 
			/********************************************************/
			var billCategFm = $("#billCategFm");  	billCategFmMsg = $(".billCategFmMsg");
			var billType = $("#billType");  	billTypeMsg = $(".billTypeMsg");
				  
			
			if(!validateEmpty(billCategFm,billCategFmMsg,"Select Bill Category ")){ 							 
				  	return false; 
					}
			else if(!validateEmpty(billType,billTypeMsg,"Enter Bill Type ")){ 							 
				  	return false; 
					}
				else {  
					/*********************/
					// var l = Ladda.create(this);  
					/*********************/
					// 1
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { update_bill_type:"new billType", billCategFm:billCategFm.val(),
										billType:billType.val(),serial:dfor
								}, beforeSend:  function(){  // l.start(); 
								}	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']})
							.then((next)=>{
								  if(output['icon']=="success"){
								window.location.reload(); 
								  }
							 });
						  l.stop(); 
						 // load_conversation_type($('#pconverseType'));  
						 // display_conversation_type($('#converse_view'));  
					}); 
				}	// else 			
			return false; 
		} 
		/********************************************************/
		
		/********************************************************/
			
			function updateBillCateg(){	 
			 dtext = $('button#updateBillCateg').attr('data-text');
			 dfor = $('button#updateBillCateg').attr('for');  // alert(dfor);
			/********************************************************/
			var billCateg = $("#billCateg");  	billCategMsg = $(".billCategMsg");
			 
			if(!validateEmpty(billCateg,billCategMsg,"Enter The Category of Bill  ")){ 							 
				  	return false; 
					} 
				else {  
					/*********************/
					// var l = Ladda.create(this);  
					/*********************/
					// 1
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { update_bill_category:"new Bill Category", billCateg:billCateg.val(),
										serial:dfor
								}, beforeSend:  function(){ //  l.start(); // alert(dtext+' + '+dfor);								
							}	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']})
							.then((next)=>{
								  if(output['icon']=="success"){ 
								window.location.reload(); 
								  }
							 });
						 //  l.stop(); 
						 // load_conversation_type($('#pconverseType'));  
						 // display_conversation_type($('#converse_view'));  
					}); 
				}	// else 			
			return false; 
		}
		/********************************************************/
			  
		 function set_vs_info(dtext){
			 $('#saveVitalScience').attr('data-text',dtext); 
			 info = dtext.split('|'); // refno | type | name 
			 $('span.patient_info').html(info[2]+" &nbsp; &nbsp; <small>"+info[1]+"</small>");
		 
		 }
		
		/** parameters  **/ 
			var start = 0;
            var limit = 100;
            var reachedMax = false;
			

		function getPatient(criteria = "",reqType="default"){
			// var criteria = $('#patient_filterate').val();
			 if (reachedMax)
                    return;
				else {
                $.ajax({
                   url: 'formscript.php',
                   method: 'POST',
                    dataType: 'text',
                   data: {
                       getPatient: 1,
					   criteria:criteria,
                       start: start,
                       limit: limit,
					   reqType:reqType
                   },
				   beforeSend:function(){ 
						console.log('sending message : data : '+criteria+' , '+start+', '+limit+', '+reqType);
						// $(".patientResult").append('<span class="badge badge-success badge-block font-16"> Patient : '+ (start+1)+' - '+(limit+start)+' </span>');
					},
				   
                   success: function(response) { 
						 console.log(response);
					   output = $.parseJSON(response); // next,response
					   
                        if (output['response'] == "reachedMax")
                            reachedMax = true;
                        else {
                            start = output['next'];
                            $(".patientResult").append(output['response']);   
                            $("span.found").html(output['found']);   
							
                            console.log('next : '+start+', limit : '+limit);							 
                        }
                    } 
                });
			} // not reachedMax 
		}
		 
		 
		// scrolling to a medical report position
		function editMedReport(serial){
			var req = $.ajax({url : "formscript.php", method : "POST",
				data : { get_report_content:"all",serial:serial
				}, beforeSend:  function(){  
				}	
			});
			req.fail(function(e){   alert(e.status); });
			req.done(function(res){   console.log(res);
				output = $.parseJSON(res); //  echo json_encode(array('report_type'=>$report['report_type'],'content'=>stripslashes($report['content']),'date_vs'=>$report['date_vs']));
				 tinymce.get('medReportTinyMice').setContent(output['content']);					
				 $('#date_rec').val(output['date_vs']);
				 $('select#report_type option[value="' + output['report_type'] + '"]')
								.prop('selected', true);
				
				 $('#save_patient_report').attr('mode','update');
				 $('#save_patient_report').removeClass('btn-success','update');
				 $('#save_patient_report').addClass('btn-warning','update');
				 $('#save_patient_report').attr('rel',serial);
				 $('span.btn-name').html('Update Report'); 
				 
				});					
			console.log('current id ref : '+serial);
			gotoPos();
		}///////////////////
		
		
		///////////////////////////
		// scrolling to a medical report position
		function gotoPos(){
			$('html, body').animate({scrollTop:$('div.medReportTinyMice').offset().top},1000);
		}
		
		
		function decr_cart_qty(elem){
		exact = elem.val(); 
		exact = parseInt(exact); 
		max = elem.attr('max');
		/**********************/
		if(max >= exact && exact > 1){ 
			nval = (exact-1); 
			nprice = nval*price; 
			elem.val(nval);
			elem.closest('tr').find('span.final_sale').html('&#8358; '+numberSeperator(nprice)); 
			// new price 
		}
		else {
			showToastPosition('mid-center','Mnimum Limit Reached','It cannot be less than  '+1,'info'); 
		}
			
	}  /********* end function  ***********/
	
	function incr_cart_qty(elem){
		exact = elem.val(); 
		exact = parseInt(exact); 
		max = elem.attr('max');
		price = elem.attr('data-text');
		/**********************/
		if(exact < max){ 
			nval = (exact+1); 
			nprice = nval*price; 
			elem.val(nval);
			elem.closest('tr').find('span.final_sale').html('&#8358; '+numberSeperator(nprice));
			// new price 
		}
		else {
			showToastPosition('mid-center','Maximum Limit Reached','It cannot exceed '+max,'info'); 
		}	 
	} /********* end function  ***********/
	
		// Currency Separator
    var commaCounter = 10;

    function numberSeperator(Number) {
        Number += '';

        for (var i = 0; i < commaCounter; i++) {
            Number = Number.replace(',', '');
        }

        x = Number.split('.');
        y = x[0];
        z = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(y)) {
            y = y.replace(rgx, '$1' + ',' + '$2');
        }
        commaCounter++;
        return y + z;
    }

	// javascript 
		function highlight_check_rows(){
			$('tr .stud_box').each(function() {
					if(this.checked) {
						$(this).closest('tr').removeClass('table-default');
						$(this).closest('tr').addClass('table-success');
					}	
					else {
						$(this).closest('tr').removeClass('table-success');
						$(this).closest('tr').addClass('table-default');
					}
				});	
		}
		