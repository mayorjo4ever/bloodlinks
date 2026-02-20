
	// jquery 
	
			
	$(function(){
		// swal("Please don't alter the informations if you don't have any update to perform "); 
		 
		 $('#save_system_info').on('click',function(){
			 
				sys_name = $('#sys_name');
				sys_shortname = $('#sys_shortname');
				sys_theme = $('#sys_theme');
				sys_icon = $('#sys_icon');
				sys_email = $('#sys_email');
				sys_phone = $('#sys_phone');
				sys_address = $('#sys_address');
				sys_manager = $('#sys_manager');
				
				if($('#sys_name').val()!="" &&  $('#sys_shortname').val()!="" && $('#sys_theme').val()!="" && $('#sys_icon').val()!=""&&  $('#sys_email').val()!="" && $('#sys_phone').val()!="" && $('#sys_address').val()!=""){
					// send to ajax 
					 /*********************/
						var l = Ladda.create(this);  
						/*********************/
						 var req = $.ajax({url : "formsubmit.php", method : "POST",
							data : { save_system_info:"new", sys_name:$('#sys_name').val(),sys_manager:$('#sys_manager').val(),
							sys_shortname:$('#sys_shortname').val(),sys_theme:$('#sys_theme').val(),sys_icon:$('#sys_icon').val(),
							sys_email:$('#sys_email').val(),sys_phone:$('#sys_phone').val(),sys_address:$('#sys_address').val()
							}, beforeSend:  function(){  l.start(); }	 }); 
						
						req.fail(function(e){ console.log(e.status);  l.stop();  });
						 
						req.done(function(res){ 
							var output = $.parseJSON(res);
							showToastPosition('bottom-center',output['title'],output['text'],output['icon']);
							l.stop(); 							
							if(output['icon']=="success"){id = "stock-tab2";  enableTab(id);   showTab(id);}
						}); // end ajax 
					 
				}
				else { 
					showToastPosition('bottom-center','Complete The Form','All The Fields Cannot be left empty','error'); 
				 }
			 
		 });
		 
	}); /**** end jquery *****/
	 