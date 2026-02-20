
	
	// jquery 
	$(function(){
		/***********************************/
	 		$("input:text.newuserform,select.newuserform").on('change keyup focus',function(){
				name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
				switch(name){
					case "surname": case "dob": case "firstname": case "sex": case "psw": 
					case "date_employ": case "role_id": case "address": case "username": 
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
					case "phone":{
							if(value!="" && value.length==11 ){							 
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

			$('button#save_new_user').on('click',function(){	
				mode = $(this).attr('mode');  serial = $(this).attr('for'); 
				 $('input:text.newuserform,select.newuserform').each(function(){
					 name = $(this).attr('name'); id = name = $(this).attr('id');  value = $(this).val(); 
					 switch(name){
						case "surname": case "dob": case "firstname": case "sex": case "psw": 
						case "date_employ": case "role_id": case "address": case "username": 					
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
					case "phone":{
							if(value!="" && value.length==11 ){							 
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
				
				if($('#surname').val()!="" && $('#surname').val().length>=3 && $('#firstname').val().length>=3 && $('#firstname').val()!="" && $('#username').val()!="" && $('#username').val().length>=3  && $('#psw').val()!="" && $('#psw').val().length>=3   && $('#sex').val()!=""){
					// send to ajax 
					 /*********************/
						var l = Ladda.create(this);  
						/*********************/
						 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { save_new_user:"new", surname:$('#surname').val(),phone:$('#phone').val(),
							firstname:$('#firstname').val(),othername:$('#othername').val(),psw:$('#psw').val(),
							sex:$('#sex').val(),dob:$('#dob').val(),address:$('#address').val(),date_employ:$('#date_employ').val(),
							mode:mode,serial:serial,role_id:$('#role_id').val(),username:$('#username').val()
							 }, beforeSend:  function(){  l.start(); }	
						}); // end ajax
						// 2
						req.fail(function(e){
							console.log(e.status);  l.stop(); 
						});
						// 3
						req.done(function(res){  alert(res);
							  var output = $.parseJSON(res);
							  swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
						   l.stop(); 
						   if(output['icon']=='success') { $('input:text').val(''); $('select option[value=""]').prop('selected', true); }
						});
					
				} 
			 });  // end button  			

		 
		/*************************************/
		 $('.del-admin').on('click',function(){
				var id = $(this).attr('for');
				var role = $(this).attr('rel');
				  
				var data = $(this).attr('data-text');
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
				text:"About Deleting "+data+" who is a  "+role,dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ del_admin:"this",serial:id }  	
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
	
		 });
		/*************************************/
		
				
		$("#saveRole,#updateRole").on('click',function(){
			 
				var role = $("#role"); 	roleMsg = $(".roleMsg"); 				
				var roleid = $("#roleid"); 	 roleidMsg = $(".roleidMsg"); 				
				mode = $(this).attr('mode'); // type
				serial = $(this).attr('for'); // serial for update	
				 
				 if(!validateEmpty(role,$(".roleMsg"),"Enter The Role ")){ 	return false; 
					} 
				  else if(!validateEmpty(roleid,roleidMsg,"Enter The Role Acronym ")){ return false; 
					} 
					 else {
						 /**********************/
							var l = Ladda.create(this);
							l.start();
							/**********************/
						var req = $.ajax({  url : "formsubmit.php", method : "POST",
							data:{ check_new_role:"this",role:role.val(), roleid:roleid.val(),mode:mode, serial:serial }								  	
							});
						
					req.fail(function(e){ console.log(e.status+" Failed"); l.stop();  });
					
					req.done(function(res){ 
						  var output = $.parseJSON(res);
								 swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
								 if(output['icon']=="success"){
									 window.setTimeout(function(){window.location.reload();},5000 ); 
							  } l.stop(); 
					 });
				 
					 }
				 return false; 
		 });
		   	 
		 
		 $('.edit-role').on('click',function(){				
				var data = $(this).attr('data-text');
				datas = data.split('|'); // name | id  | serial
				$("#role").val(datas[0]); 	 $("#roleid").val(datas[1]); 	 
				$("#updateRole").attr('for',datas[2]);
				show_update_buttons(); 
				
		 });
		
		/*************************************/
		 $('.del-role').on('click',function(){
				var id = $(this).attr('for');
				var data = $(this).attr('data-text');
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
				text:"About Deleting "+data+"'s Role ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST",
								data:{ del_role:"this",serial:id }  	
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
		 });
		/*************************************/
			 		 
		 // assign_role
		 $("button#assign_role").on('click',function(){
				var user_id = $("#anyuser").val(); 	// user 	
				var roles = $("#roles").val(); 	// user 	
				 				
				/**$("input:checkbox:checked").each(function() {
                     roles.push($(this).val());
                }); **/ 
				 // validate 
				 if(user_id == ""){
				  swal({title:'Oops',text:'No Admin has been selected for Role Assignment',icon:'error',buttons:{text:'Select Admin Now'}});
				 }
				 else if(roles == ""){
					 swal({title:'Oops',text:'No role has been selected for '+user_id,icon:'error',buttons:{text:'Select Role Now'}});
				 }
				 else{					
					  assign_roles(user_id,roles);					 
					 return false;			
				 }
				 return false;				
		 });
		 
		 /***** xeditible forms ******/
		 /************************************/
			
		  
		  /*** end *****/
			
	});		// jQuery
