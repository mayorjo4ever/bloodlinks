// JavaScript Document
	// form input loader 
	function animateObj(id,x) {
			$('#'+id).removeClass().addClass(x + ' input-group animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			  $(this).removeClass();
			  $(this).addClass('input-group');
			  
			});
		};
		/********/
		
	//////////////////////////////////////
			function loadFaculties(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadFaculties:'all' }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Faculties, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			function loadFaculty(elem){	 		 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadFaculty:'all' }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Faculties, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			// loadCardSessions 
			function loadCardSessions(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadCardSessions:'all'}, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Session, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); loadCardFaculties($('#faculty'),$('#session').val());  }); 	 					
			}
			//
			/////////////////////////////////////////////////
			// loadProcessSessions 
			function loadProcessSessions(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadProcessSessions:'all'}, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Session, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); loadCardFaculties($('#faculty'),$('#session').val());  }); 	 					
			}
			//
			/////////////////////////////////////////////////
			
			/////////////////////////////////////////////////
			// loadCompStudSession 
			function loadCompStudSession(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadCompStudSession:'all'}, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Session, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); loadCardFaculties($('#faculty'),$('#session').val());  }); 	 					
			}
			//
			/////////////////////////////////////////////////
			/////////////////////////////////////////////////
			// loadLogPaySessions 
			function loadLogPaySessions(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadLogPaySessions:'all'}, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Session, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); loadCardFaculties($('#faculty'),$('#session').val());  }); 	 					
			}
			//
			/////////////////////////////////////////////////
			
			////////////////////////////////////////////////////// 
			function loadCompStudProgrammes(elem,session){			 		
						 var req = $.ajax({
								url:"formscript_2.php", data:{ loadCompStudProgrammes:'all',session:session }, method:"POST", beforeSend: function(){  elem.html(" Loading Programmes, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 					
			}			
			////////////////////////////////////////////////////// 
						
			function loadCardFaculties(elem,session){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadCardFaculties:'all',session:session }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Faculties, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			
			function loadLogDeg(elem,pay_session){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadLogDeg:'all',pay_session:pay_session }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Degrees, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			
			function loadLogProgType(elem,pay_session,deg_type_val){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadLogProgType:'all',pay_session:pay_session,deg_type_val:deg_type_val }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Programmes, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			
			function loadProcessFaculties(elem,session){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadProcessFaculties:'all',session:session }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Faculties, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res);
					 
					}); 						
			}
			/////////////////////////////////////////////////
			//////////////////////////////////////
			function setFaculties(elem,value){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ setFaculties:'all',value:value }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Faculties, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
				
				
			////////////////////////////////////////////////////// 
			function loadCardDepartments(elem,session,faculty){			 		
						 var req = $.ajax({
								url:"formscript_2.php", data:{ loadCardDepartments:'all',session:session,faculty:faculty }, method:"POST", beforeSend: function(){  elem.html(" Loading Departments, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}							
			////////////////////////////////////////////////////// 
			////////////////////////////////////////////////////// 
			function loadProcessDepartments(elem,session,faculty){			 		
						 var req = $.ajax({
								url:"formscript_2.php", data:{ loadProcessDepartments:'all',session:session,faculty:faculty }, method:"POST", beforeSend: function(){  elem.html(" Loading Departments, Please Wait..."); } }); 
						 	
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}							
			////////////////////////////////////////////////////// 
			
			function loadCardProgrammes(elem,session,faculty,department){			 		
						 var req = $.ajax({
								url:"formscript_2.php", data:{ loadCardProgrammes:'all',session:session,faculty:faculty,department:department }, method:"POST", beforeSend: function(){  elem.html(" Loading Programmes, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
			
			////////////////////////////////////////////////////// 
			function loadProcessProgrammes(elem,session,faculty,department){			 		
						 var req = $.ajax({
								url:"formscript_2.php", data:{ loadProcessProgrammes:'all',session:session,faculty:faculty,department:department }, method:"POST", beforeSend: function(){  elem.html(" Loading Programmes, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
			
			////////////////////////////////////////////////////// 
			
			function loadDepartments(elem,data){			 		
						 var req = $.ajax({
								url:"dist/php/form-processor.php", data:{ loadDepartments:'all',data:data }, method:"POST", beforeSend: function(){  elem.html(" Loading Departments, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
		/////////////////////////////////////////////
		
			////////////////////////////////////////////////////// 
			
			function loadFactDepart(elem){			 		
						 var req = $.ajax({
								url:"formscript_2.php", data:{ loadFactDepart:'all' }, method:"POST", beforeSend: function(){  elem.html(" Loading Departments, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
		/////////////////////////////////////////////
		
			
			////////////////////////////////////////////////////// 
			function display_my_roles(elem,myid){			 		
						 var req = $.ajax({
								url:"formscript.php", data:{ display_my_roles:'all',myid:myid }, method:"POST", beforeSend: function(){  elem.html("<span class='fa fa-spin fa-spinner fa-3x'> </span>");  } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
		/////////////////////////////////////////////
			function assign_roles(user_id,roles){
					 
					//  swal(' role has been assigned for '+user_id);
					  var req = $.ajax({
								url:"formscript.php", data:{ assign_roles:'all',user_id:user_id,roles:roles }, method:"POST", beforeSend: function(){ 
								 
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
					var req = $.ajax({url : "formscript.php",method : "POST",
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
								url:"formscript.php", data:{ assign_pages:'all',contents:selected }, method:"POST", beforeSend: function(){  
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
								url:"formscript.php", data:{ reverse_pages:'all',contents:selected }, method:"POST", beforeSend: function(){  
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
		
		///////////////////////////////
			/*******	
			function setDepartments(elem,data,value){			 		
						 var req = $.ajax({
								url:"dist/php/form-processor.php", data:{ setDepartments:'all',data:data,value:value }, method:"POST", beforeSend: function(){  elem.html(" Loading Departments, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 	
				
			}
		/////////////////////////////////////////////
		
		
		////////////////////////////////////////////////////// 
			function loadDegrees(elem){			 		
						 var req = $.ajax({
								url:"dist/php/form-processor.php", data:{ loadDegrees:'all' }, method:"POST", beforeSend: function(){  elem.html(" Loading Degree, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 
			}
		/////////////////////////////////////////////
			
		////////////////////////////////////////////////////// 
			function setDegrees(elem,value){			 		
						 var req = $.ajax({
								url:"dist/php/form-processor.php", data:{ setDegrees:'all',value:value }, method:"POST", beforeSend: function(){  elem.html(" Loading Degree, Please Wait..."); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); }); 
			}
		/////////////////////////////////////////////
		
		
		/// on templates 
			//////////////////////////////////////
			function loadTemplates(elem){			 		
					 var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ loadTemplates:'all' }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Templates, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			
			/// on templates 
			//////////////////////////////////////
			function setTemplates(elem,value){			 		
					 var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ setTemplates:'all',value:value }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Templates, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
		
		//////////////////////////////////////
			function loadCategories(elem){			 		
					 var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ loadCategories:'all' }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Categories, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
	
		function loadProgByFac(elem,data,template){			 		
					 var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ loadProgrammes:'all',ptype:'fac',faculty:data, template:template }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Programmes, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
		
		function loadProgByDept(elem,fac,data){			 		
					 var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ loadProgrammes:'all',ptype:'dept',faculty:fac,department:data }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Categories, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
	/////////////////////////////////////////////////
		
	function loadHonours(elem){			 		
					 var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ loadHonours:'all' }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Honours, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
	/////////////////////////////////////////////////	
	
		function manage_temp_show (temp_val){
			if(temp_val=="Template 1"){
					$("tr.T_BC").hide('slow');
					$("tr.T_B").show('slow');					
					$("tr.T_ALL").show('slow');
				}
				
				if(temp_val=="Template 2"){
					$("tr.T_B").hide('slow');		
					$("tr.T_BC").show('slow');								
					$("tr.T_ALL").show('slow');
				}		
				
				if(temp_val=="Template 3"){
					$("tr.T_B").hide('slow');		
					$("tr.T_BC").hide('slow');								
					$("tr.T_ALL").show('slow');
				}			
		}
		
		////////// update existing templates /////////////
		/************************************************/
		function update_existing_template(data,ref){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ update_this_existing_template:"this",temp_name:data,ref:ref }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res == true){
						 	swal("successful"," the template is now updated to "+data,"success");
							window.location.reload();								
						 }
						 else
						 {
							swal("Ooops!", "No updates was found ", "error");							
						 }						 
					 }); 	
				
		}
		
		////////// delete existing template  /////////////
		/************************************************/
		function delete_template(serial){
				// check if this template exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ delete_this_existing_template:"this",serial:serial }, method:"POST",
							beforeSend: function(){  /*alert('getting template');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
				req.done(function(res){ 
						 if(res == true){
						 	swal("Successful"," the template is now deleted ","success");
							window.location.reload();								
						 }
						 else
						 {
							swal("Ooops!", " The template does not exists again ", "error");							
						 }						 
					 }); 	
			
		}
		 
		////////// create new faculty /////////////
		/************************************************/
		function validate_new_faculty(data){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ check_if_is_new_faculty:"this",faculty:data }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res == true){
						 	swal("Ooops!", "Faculty of "+data+"  already existed!", "error");							
						 }
						 else
						 {
							swal("successful","you have now created faculty of "+data,"success");
							window.location.reload();	
						 }						 
					 }); 	
				
		}
		
		////////// update existing faculty /////////////
		/************************************************/
		function update_existing_faculty(data,ref){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ update_this_existing_faculty:"this",faculty:data,ref:ref }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res == true){
						 	swal("successful"," the faculty is now updated to faculty of "+data,"success");							
							window.location.reload();	
						 }
						 else
						 {
							swal("Ooops!", "No updates was found ", "error");							
						 }						 
					 }); 	
				
		}
		
		////////// delete existing faculty  /////////////
		/************************************************/
		function delete_faculty(serial){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ delete_this_existing_faculty:"this",serial:serial }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
				req.done(function(res){ 
						 if(res == true){
						 	swal("Successful"," the faculty is now deleted ","success");
							window.location.reload();								
						 }
						 else
						 {
							swal("Ooops!", " The faculty does not exists again ", "error");							
						 }						 
					 }); 	
			
		}
		/**************************************/
		
		////////// delete existing department  /////////////
		/************************************************/
		function delete_department(serial){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ delete_this_existing_department:"this",serial:serial }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
				req.done(function(res){ 
						 if(res == true){
						 	swal("Successful"," the Department is now deleted ","success");		
							window.location.reload();						
						 }
						 else
						 {
							swal("Ooops!", " The Department does not exists again ", "error");							
						 }						 
					 }); 	
			
		}
		/**************************************/
	
	//delete_programme
	////////// delete existing department  /////////////
		/************************************************/
		function delete_programme(serial){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ delete_this_existing_programme:"this",serial:serial }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
				req.done(function(res){ 
						 if(res == true){
						 	swal("Successful"," the Programme is now deleted ","success");	
							window.location.reload();						
						 }
						 else
						 {
							swal("Ooops!", " The Programme does not exists again ", "error");							
						 }						 
					 }); 	
			
		}
		/**************************************/
	
		 /*** working under certificate-data uploading **/
			 function check_input_to_show(){
				 to_show =  $('input:radio.radio:checked').val();
				 manage_form_show(to_show); 
			 }
			 
			 function reloadProg(){
				loadProgByFac($('#programme'),$('#cert_faculty').val(),$('#template_type').val());	
				// or loadProgByDept(elem,fac,dept);
			 }
			 
			 function manage_form_show(value){
				 // alert(value); 
				 if(value=="uploading"){
					 $("div.file_uploading").show('fast');  
					 $("div.form_inputing").hide('fast');  
					 $("div.picture_import").hide('fast');  
					 $("div.signature_import").hide('fast');  
					 $("div.notification").html(' Upload with excel files ');  
				 }
				 else  if(value=="inputing"){
					 $("div.file_uploading").hide('fast');  
					 $("div.form_inputing").show('fast');  
					 $("div.picture_import").hide('fast');  
					 $("div.signature_import").hide('fast');  
					 $("div.notification").html('Type in their details here  ');  
				 }
				 else  if(value=="import_picture"){
					 $("div.file_uploading").hide('fast');  
					 $("div.form_inputing").hide('fast');  
					 $("div.signature_import").hide('fast');  
					 $("div.picture_import").show('fast');  
					  $("div.notification").html(' Now Import Their Passports ');  
				 } 
				 else  if(value=="import_signature"){
					 $("div.file_uploading").hide('fast');  
					 $("div.form_inputing").hide('fast');  
					 $("div.picture_import").hide('fast');  
					 $("div.signature_import").show('fast');  
					 $("div.notification").html(' Now Import Their Signatures ');  
				 }
				 // add more value param and search 
				  else  if(value=="param"){
					 $("div.search").hide('fast');  
					 //$("div.form_inputing").hide('fast');  
					 //$("div.picture_import").hide('fast');  
					 $("div.param").show('fast');  
					 // $("div.notification").html(' Now Import Their Signatures ');  
				 }
				 else  if(value=="search"){
					 $("div.search").show('fast');  
					 //$("div.form_inputing").hide('fast');  
					 //$("div.picture_import").hide('fast');  
					 $("div.param").hide('fast');  
					// $("div.notification").html(' Now Import Their Signatures ');  
				 }
				 
				 else {
					  $("div.file_uploading").hide('fast');  
					  $("div.form_inputing").hide('fast');  
					  $("div.picture_import").hide('fast');   
					  $("div.signature_import").hide('fast');  
					  $("div.param").hide('fast');  
					  $("div.search").hide('fast');  
					  $("div.notification").html(' ');					  
				 }
				 
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
		
		/***********************************************************/
		//  update_existing_department(selFaculty.val(),depName.val(),serial);
		function update_existing_department(faculty,data,ref){
				// check if this department exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ update_this_existing_department:"this",faculty:faculty, data:data,ref:ref }, method:"POST",
							beforeSend: function(){  /*alert('about saving department');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res==true){
						 	swal("successful","The department is  now updated to department of  "+data,"success");						 
							window.location.reload();		
						 }
						 else
						 {
							 swal("Ooops!", " No update was found for "+data+" Department ", "error");														
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
		
		
		/***********************************************************/
			////////// create new degree  /////////////
		/************************************************/
		function validate_new_degree(short_name,full_name){
				// check if this degree exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ check_if_is_new_degree:"this",short_name:short_name, full_name:full_name }, method:"POST",
							beforeSend: function(){  /*alert('about saving degree');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res==true){
						 	swal("Ooops!", " This Degree "+short_name +": "+full_name+" has  been created earlier ", "error");							
						 }
						 else
						 {
							swal("successful","You have now created a new degree "+short_name+" :  "+full_name,"success");
							window.location.reload();	
						 }						 
					 }); 					
		}
		/************************************************/
		
			////////// create new programme  /////////////
		/************************************************/
		function validate_new_programme(faculty,department,degree,data,template){
				// check if this degree exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ check_if_is_new_programme:"this",
							faculty:faculty, department:department,degree:degree,data:data,template:template }, method:"POST",
							beforeSend: function(){ /* alert('about saving programme');*/  } }); 
						
					req.fail(function(e){ 
							swal(e.message);
					 });
					
					req.done(function(res){ 
							 if(res==true){
						 	swal("Ooops!", " This Programme "+degree +": "+data+" has  been created earlier ", "error");
						 }
						 else
						 {
							swal("successful","You have now created a new Programme : "+degree+" :  "+data+" under "+template+" in faculty of "+faculty,"success");
							window.location.reload();	 
						 }		
					 }); 					
		}
		/************************************************/
		
			////////// update_existing_programme   /////////////
		/************************************************/
		function update_existing_programme(faculty,department,degree,data,template,serial){
				// check if this degree exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ update_this_existing_programme:"this",
							faculty:faculty, department:department,degree:degree,data:data,template:template,serial:serial }, method:"POST",
							beforeSend: function(){ /* alert('about saving programme');*/  } }); 
						
					req.fail(function(e){ 
							swal(e.message);
					 });
					
					req.done(function(res){ 
							 if(res==true){
						 	swal("Successful!", " This Programme "+degree +": "+data+" has  been successfully updated ", "success");
							window.location.reload();
						 }
						 else
						 {
							swal("Oops","no update found for : "+degree+" :  "+data+" under "+template+" in faculty of "+faculty,"error");
							window.location.reload();	 
						 }		
					 }); 					
		}
		/************************************************/
		
		
		
		////////// create new template /////////////
		/************************************************/
		function validate_new_template(data){
				// check if this faculty exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ check_if_is_new_template:"this",temp_name:data }, method:"POST",
							beforeSend: function(){  /*alert('getting faculty');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");

					 });
					
					req.done(function(res){ 
						 if(res == true){
						 	swal("Ooops!", ""+data+"  already existed!", "error");							
						 }
						 else
						 {
							swal("successful","You have now created  "+data+" successfully","success");
							window.location.reload();	
						 }
					 }); 	
				
		}
		
		/************************************************/
		function hide_show_cert_stud_info(){
			total = count_studs_checked(); 
				if(total > 0){
					$('#stud_count').show('fast');
					$('#prog_count').show('fast');
				}
					else {
						$('#stud_count').hide('fast');
						$('#prog_count').hide('fast');
					}
		}
		/****************************************************************/
		
		/************************************************/
		function hide_show_cert_prog_info(){
			total = count_progs_checked(); 
				if(total > 0){					
					$('#prog_count').show('fast');
				}
					else {					
						$('#prog_count').hide('fast');
					}
		}
		 
		 
		function dis_enable_card_stud_buttons(){
				total = count_studs_checked(); 
					if(total > 0){
					$('button.card_stud_buttons').prop('disabled',false);
					}
					else {
						$('button.card_stud_buttons').prop('disabled',true);
					}
				}		
		/*****************************************************/	
		
	 
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
		
			 
			} // end switch 
				 
		 } // end function 
		 
		
		////////////////////////////////////////
			function auto_search_staff(elem,data,displayer) {
				var min_length = 2; // min caracters to display the autocomplete
				var keyword = data;
				if (keyword.length >= min_length) {
					$.ajax({							
						url: 'formscript.php',
						type: 'POST',
						data: {staff_name_search:"",keyword:keyword},
						success:function(data){
							displayer.show();
							displayer.html(data);
						}
					});
				} else {
					displayer.hide(); $('#patient_filter').attr('ref','');	
					$('#patient_filter2').attr('ref','');	
				}
			}
			/////////////////////////////////////////
			// set_item : this function will be executed when we select an item				
				function set_name(name,id) {
					// change input value
					$('#patient_filter').val(name);
					$('#patient_filter').attr('ref',id);	
					$('#patient_filter2').val(name);
					$('#patient_filter2').attr('ref',id);					
					$('.num_list').hide();
				}
				///////////////////////

		  
	
	// updating student name 
		//  update_student_name  
		function update_student_name(new_name,matric,ref){
			// submit 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ update_student_name:"this",new_name:new_name,matric:matric,ref:ref }, method:"POST",
							beforeSend: function(){  /*alert('about saving department');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
					
					req.done(function(res){ 
						 if(res==true){
						 	swal("successful","The Student name is  now updated  to : "+new_name,"success");						 
							window.location.reload();		
						 }
						 else
						 {
							 swal("Ooops!", " No update was found for "+new_name, "error");														
						 }						 
					 }); 
			 		
		}
		/***********************************************************/
	////////// delete existing student info   /////////////
		/************************************************/
		function delete_student(serial,matric_no){
				// check if this student exists 
				var req = $.ajax({
							url:"dist/php/form-processor.php", data:{ delete_this_student:"this",serial:serial,matric_no:matric_no }, method:"POST",
							beforeSend: function(){  /*alert('getting student');*/ } }); 
						
					req.fail(function(e){ // console.log(e.status+" Failed");
					 });
				req.done(function(res){ 
						
							swal({title:"Certificate Deleted!",imageUrl:res,text:"This Student certificate Profile Has Been Deleted " }); 
							window.location.reload();
						 
						 /*if(res == true){
						 	swal("Successful"," the student information is now deleted ","success");
							window.location.reload();								
						 }
						 else
						 {
							swal("Ooops!", " The Studen info does not exists again ", "error");							
						 }	*/					 
					 }); 	
			
		}
		/**************************************/
	
		
			 
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
		function load_bill_category(dept_id,elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_bill_category:'all',dept_id:dept_id}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
	   /////////////////////////////////////////////////// 
		function load_bill_type(dept_id,categ_id,elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_bill_type:'all',dept_id:dept_id,categ_id:categ_id}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
	   
	   
	   /////////////////////////////////////////////////// 
		function load_bill_departments(elem){			 		
				 var req = $.ajax({
						url:"formscript.php", data:{ load_bill_departments :'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
	    
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
							console.log('request sent '+infos[2]+'|'+infos[1]);
						}	
						});
			// updateBillType 
			 $('select#bill_dept_id2 option[value="' + infos[2] +'"]').prop('selected', true);
			 $('select#bill_dept_id').trigger('change');
			 setTimeout(function(){
				load_bill_category(infos[2],$('#billCateg2')) ;
			 },1000);	 
			 $("#billType2").val(infos[0]);  //  $("#billType").val(infos[1]);
			 $("#billCost").val(infos[3]);   // $("#billCateg").val(infos[1]);
			 
		 }
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
	 
	/**********************************************/
	function manage_stock_items_update(serial){ 
	 // get updates 
		show_update_buttons();  
		elem = $('.loader'); 
		$('button#update_new_stock').attr('data-text',serial);  
			 var req = $.ajax({
							url:"formscript.php", data:{ get_stock_item_details:"all",serial:serial }, method:"POST",
							beforeSend: function(){  
								 elem.html("<span class='fa fa-spin fa-spinner fa-2x'> </span>");
							  } }); 
						
					req.fail(function(e){  console.log(e.status+" Failed");  //elem.html(""); 
					 });
					
					req.done(function(res){  // alert(res); 
						elem.html('');  infos = $.parseJSON(res);	 
						 // $('input:radio.has-expiry:checked').val(); 
						 $('#product_name').val(infos['name']) ;
						 $('#product_code').val(infos['code']) ;
						 $('#product_desc').val(infos['description']) ;
						 $('#product_barcode').val(infos['barcode']) ;
						 $('#product_mfd') .val(infos['mfc_date']);
						 $('#product_expd').val(infos['exp_date']);
						 $('#product_qty').val(infos['qty']) ;
						 $('#product_cp') .val(infos['cost_price']);
						 $('#product_sp').val(infos['selling_price']) ;
						 $('#product_vendor').val(infos['vendor_id']) ;
						 $('#date_supply') .val(infos['date_suplied']);	 									  
						 });						
			 
		}
	
	// at the stock sales page 
	function add_to_my_cart(serial,qty){
		// swal({title:'goods purchased',text:serial+' with '+qty+' quantity'});
		console.log('goods purchased id : '+serial+', qty : '+qty);
		var req = $.ajax({
			url:"formscript.php", data:{ save_item_cart:"this",serial:serial,qty:qty }, method:"POST",
			beforeSend: function(){  
				 // elem.html("<span class='fa fa-spin fa-spinner fa-2x'> </span>");
			  } }); 
				
			req.fail(function(e){  console.log(e.status+" Failed");  //elem.html(""); 
			 });
		
				req.done(function(res){
					display_item_cart($('.all_item_cart'));
				});
		 
	}
	
	function display_item_cart(elem){
		var req = $.ajax({
			url:"formscript.php", data:{ display_item_cart:"all" }, method:"POST",
			beforeSend: function(){  
				 elem.html("<span class='fa fa-spin fa-spinner fa-2x'> </span>");
			  } }); 
				
			req.fail(function(e){  console.log(e.status+" Failed");  //elem.html(""); 
			 });
		
				req.done(function(res){
					elem.html(res);
				}); 
	}
	
	function manage_item_cart_qty(serial,qty){
		// var btn = $(this).closest('tr').find('input.item-cart-qty').val();
		// send cart via ajax 
		console.log(' item id : '+serial +', qty :  '+qty);		 
	}
	/************************************************/
	function manage_item_cart_qty2(serial,qty,price,elem){ 
		var new_price = qty*price; 
		elem.html('&#8358; '+new_price);
		console.log(' item id : '+serial +', qty :  '+qty);		 
	}
	/****************/
	function rem_from_my_cart(serial){
		// alert(' removing cart items id '+serial); 
		swal({icon:'warning',title: ' Remove Cart Item  ?', closeOnEsc:false,closeOnClickOutside:false,
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
				text:"Do you want to remove this item from cart?  ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					  var req = $.ajax({url : "formscript.php",method : "POST",
								data:{ rem_from_my_cart:"this",serial:serial }  
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){  // alert(res);
						  var output = $.parseJSON(res); 
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success"){
								   display_item_cart($('.all_item_cart'));
								 }
							 });	
					 }); 
					
					/**********************************************/
					}
				});
				
	}
	/*********************************************/
	
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
			var billDeptForm = $("#billDeptForm");  	billDeptFormMsg = $(".billDeptFormMsg");
			if(!validateEmpty(billDeptForm,billDeptFormMsg,"Enter Department to Save")){ 							 
				  	return false; 
					}						
				else {  
					/*********************/
					swal(billDeptForm.val()); 
					/*********************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { save_new_department:"new save_new_department", name:billDeptForm.val()
								}, beforeSend:  function(){  ///l.start();
								}	
					});  //  1 - processing req
					req.fail(function(e){
						
					});// add / -   update req
					req.fail(function(e){ alert(e.status);	});
					
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							  $('#billDeptForm').val(''); 
							  window.location.href="";
						  }
						  
					});  // end ajax 
					
				} // else stmt
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
						// $(".patientResult").append('<span class="badge badge-success badge-block font-16"> Patient : '+ (start+1)+' - '+(limit+start)+' </span>');
					},
				   
                   success: function(response) { 
						 alert(response);
					   output = $.parseJSON(response); // next,response
					   
                        if (output['response'] == "reachedMax")
                            reachedMax = true;
                        else {
                            start = output['next'];
                            $(".patientResult").append(output['response']);                                                        
                            console.log('start : '+start+', limit : '+limit);							 
                        }
                    } 
                });
			} // not reachedMax 
		}
		  