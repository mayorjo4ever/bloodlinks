
	$(function(){ 
		
			$('#ticket_searcher').on('keyup',function(){
				search_text = $(this).val();  elem = $('.search_result'); 
				/*********************/
				var l = Ladda.create( document.querySelector('#search_ticket'));			
				/**********************/
				displayer = $('.num_list');  
				if(search_text.length >=2) {  $.ajax({							
						url: 'formsubmit.php',
						type: 'POST',
						data: {auto_search_ticket_for_update:"",keyword:search_text},
						beforeSend:function(){l.start(); /**  $('.search_result').html(''); **/},
						success:function(data){
							displayer.show();
							displayer.html(data);
							l.stop();
						}
					}); 
					}
					else {
					displayer.hide(); // $('#patient_filter').attr('ref','');	
					// $('#patient_filter2').attr('ref','');	
				}
			});  
			/*****************/
			
			$('#search_ticket').on('click',function(){
				  ticket_no = $('#ticket_searcher').val(); 
				  elem = $('.search_output'); 
				 /*********************/
				var l = Ladda.create(this);			
				/**********************/		
				var req = $.ajax({
					url:"temp_formsubmit.php", data:{ display_ticket_status_found:'all',ticket_no:ticket_no},beforeSend:function(){ l.start();  }, method:"POST" }); 
					req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
					req.done(function(res){ elem.html(res);   l.stop(); /** alert(res); **/ });
				});  
					/*****************/
			 
			
	}); 
	
	 function set_ticket_found(name,id) {
		// change input value
		$('#ticket_searcher').val(name);
		$('#ticket_searcher').attr('ref',id);	 				
		$('.num_list').hide(); 
		/*********************/
		$('#search_ticket').click(); 		
	}
	///////////////////////
	
	function maximize_win(elem){
		// elem.removeClass('col-md-6').addClass('col-md-12');
		elem.toggleClass('col-md-12');
		alert('done');
	}
	/************************************/
	function reverse_spec_collection(ticket_no){
		 /********/
			swal({icon:'warning',title: " Reverse Specimen Collection of "+ticket_no+"'s Ticket ? ", closeOnEsc:false,closeOnClickOutside:false,				 
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
			text:"About Reversing  Specimen Collection for  "+ticket_no+", this will result to ticket not yet ready for processing  ",dangerMode:true})
			.then((value) => {
			  if(value) {
				/** when confirmed.. send to server **/
				/**********************************************/
				var req = $.ajax({url : "temp_formsubmit.php",method : "POST",data:{reverse_spec_collection :"this",ticket_no:ticket_no},beforeSend:function(){console.log('reversing completion ')}  	});
				req.fail(function(e){  console.log(e.status+" Failed"); });
				req.done(function(res){   // alert(res);
					  var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']})
						 .then((next)=>{
							 if(output['icon']=="success"||output['icon']=="info"){
								$('#search_ticket').click(); 	
								window.setTimeout(function(){window.location.href="tickets.php";},500);
							 }
						 });	
				 }); 
				/**********************************************/				
			  } 
			});
	}
	/************************************/
	
	function reverse_proc_completion(ticket_no){
		 /********/
			swal({icon:'warning',title: " Reverse Completion State of "+ticket_no+"'s Ticket ? ", closeOnEsc:false,closeOnClickOutside:false,				 
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
			text:"About Reversing Completion State of This Ticket "+ticket_no+", this will result to ticket not yet completed for processing  ",dangerMode:true})
			.then((value) => {
			  if(value) {
				/** when confirmed.. send to server **/
				/**********************************************/
				var req = $.ajax({url : "temp_formsubmit.php",method : "POST",data:{reverse_proc_completion :"this",ticket_no:ticket_no},beforeSend:function(){console.log('reversing completion ')}  	});
				req.fail(function(e){  console.log(e.status+" Failed"); });
				req.done(function(res){   // alert(res);
					  var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']})
						 .then((next)=>{
							 if(output['icon']=="success"){
								$('#search_ticket').click(); 	
								window.setTimeout(function(){window.location.href="tickets.php";},500);
							 }
						 });	
				 }); 
				/**********************************************/				
			  } 
			});
	}
	/************************************/
	function reverse_paym_completion(ticket_no){
		 /********/
			swal({icon:'warning',title: " Reverse Payment State of "+ticket_no+"'s Ticket ? ", closeOnEsc:false,closeOnClickOutside:false,				 
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
			text:"About Reversing Payment State of This Ticket "+ticket_no+", this will result to payment not yet completed ",dangerMode:true})
			.then((value) => {
			  if(value) {
				/** when confirmed.. send to server **/
				/**********************************************/
				var req = $.ajax({url : "temp_formsubmit.php",method : "POST",data:{reverse_paym_completion :"this",ticket_no:ticket_no},beforeSend:function(){console.log('reversing payment ')}  	});
				req.fail(function(e){  console.log(e.status+" Failed"); });
				req.done(function(res){   // alert(res);
					  var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']})
						 .then((next)=>{
							 if(output['icon']=="success"){
								$('#search_ticket').click(); 	
								// window.setTimeout(function(){window.location.href="tickets.php";},500);
							 }
						 });	
				 }); 
				/**********************************************/				
			  } 
			});
	}
	/************************************/