
	// jquery 
	/********************************************/								
		function toggle_login_password(){
			elem = $('input#password');
			ref = $('#pswType').val(); 
			var icon_elem = $('#icon_change');


			if(ref=='lock'){
				elem.attr('type','text'); 
				ref = $('#pswType').val('open');
				icon_elem.removeClass('mdi-lock').addClass('mdi-lock-open');
			}
			else {
				elem.attr('type','password'); 
				ref = $('#pswType').val('lock');
				icon_elem.removeClass('mdi-lock-open').addClass('mdi-lock');
			}
			//  elem.trigger('change'); 

		}


	/********************************************/	
		 function login(){
			var username = $("#username"); 	 
			var psw = $("#password");	 
			/***********************************/						 
			if(username.val()==""){ 
					showToastPosition('bottom-right','Enter Username','Username cannot be empty','warning'); 
					username.focus();
					return false; 
				}
				else if(psw.val()==""){ 
					showToastPosition('bottom-right','Enter Password','Password cannot be empty','warning'); 
					psw.focus();
					return false; 
				}	
				else {
					 /**********************/
						 var l = Ladda.create(document.querySelector('.login'));
						  l.start();
						/**********************/
						var req = $.ajax({				
						url:"assets/php/forms.php",
						method: "POST",
						data:
							{
								CheckUser:"user_id", username:username.val()				
							},						
						});
				
						req.fail(function(e){
							// alert(e.status+" error accessing server:   "+e.message);
							showToastPosition('bottom-right','Server Error','Cannot Connect To Server  '+e.message,'error'); 
							l.stop();
							});
			
						req.done(function(d){ // alert(d); 
							if(d==false){
								showToastPosition('bottom-right','User Not Found','This username is not registered','warning'); 
								l.stop(); username.focus(); 
								status = false;
							}
								else if(d==true){  									
									// make 2nd request 
									var req2 = $.ajax({				
										url:"assets/php/forms.php",
										method: "POST",
										data:
											{
											CheckPass:"user_id",psw:psw.val(),username:username.val()
											} 
										});
										
										req2.fail(function(e){
										 showToastPosition('bottom-right','Server Error','Cannot Connect To Server','error'); 
											l.stop(); 
										});
										
										req2.done(function(msg){   //  alert(msg);
											var vals = $.parseJSON(msg);
											if(vals[0]==false){
												showToastPosition('bottom-right','Wrong Password','Your password is not valid','warning'); 
												l.stop(); psw.focus(); 
												status = false;
											}
											if(vals[0]==true){
												l.stop();
												showToastPosition('bottom-right','Login Successful','Redirecting ...','success'); 
												top.location.href = vals[1];
											}
										}); 
								    }	 
								});
							 return false;
						 } // showToastPosition('mid-center','Well done','Login Successful','success'); 
				// }
			 
		} 
		//  end function login 
			
	$(function(){
		/***********************************/					
		 
		
		$("button#userLogin").on('click',function(){
				
					var username = $("#username"); 		usernameMsg = $(".usernameMsg");
					var password = $("#password");		passwordMsg = $(".passwordMsg");
					
					/***********************************/						 
					
					if(!validateEmpty(username,usernameMsg,"Enter your username")){ 							 							animateObj('fm1','shake');
							return false; 
						}
					else if(!validateEmpty(password,passwordMsg,"Enter your password")){ 							 							animateObj('fm2','shake');
							return false; 
						}	
					 else {
						 /**********************/
						var l = Ladda.create(this);
						  l.start();
						/**********************/
						var req = $.ajax({				
						url:"assets/php/forms.php",
						method: "POST",
						data:
							{
								CheckUser:"user_id", username:username.val()				
							},						
						});
				
						req.fail(function(e){
							alert(e.status+" error accessing server:   "+e.message); l.stop();
							});
			
						req.done(function(d){ 
							if(d==false){
								give_warn(username,usernameMsg,"User Not Found");								
									animateObj('fm1','shake');
								    l.stop();
								status = false;
							}
								else if(d==true){  
									$('div.submit-progress').hide('fast');
									// make 2nd request 
									var req2 = $.ajax({				
										url:"assets/php/forms.php",
										method: "POST",
										data:
											{
											CheckPass:"user_id",password:password.val(),username:username.val()
											} 
										});
										
										req2.fail(function(e){
										alert(e.status+" error accessing server "); 
										l.stop();
										});
										
										req2.done(function(msg){ //  alert(msg);
											var vals = $.parseJSON(msg);
											if(vals[0]==false){
												animateObj('fm2','shake');
													give_warn(password,passwordMsg,"Wrong Password");																
													l.stop();
													status = false;
											}
											if(vals[0]==true){
												l.stop();
												top.location.href = vals[1];
											}
										}); 
								    }	 
								});
							 return false;
						 }
						//	
		
			 // alert("ladda button couldn't be activated ");
					 return false; 
				});	// end button click 
			
			/****************************************/
			// $('form.lockscreen-credentials').on('submit',function(e){
			
			$('button#relog').on('click',function(e){
					/**********************/ 
					var username = $("#param"); 		
					var password = $("#password");		passwordMsg = $('.passwordMsg');
					 
					if(!validateEmpty(password,passwordMsg,"Enter your password")){ 							 
							passwordMsg.addClass('text-danger bold');
							animateObj('fm1','shake');
							return false; 
						}	
					else { 	
							var l = Ladda.create(this);
							l.start();
						/**********************/							
							var req = $.ajax({
								url : "../assets/php/forms.php",
								method : "POST",
								data : { 
									relogUser:"new user", username:username.val(),password:password.val()
								}
							});
					
					req.fail(function(e){
						 console.log(e.status+" Failed"); alert(e.status);
						 l.stop();
					/**********************/	
						alert(e.status);
						});
					
						req.done(function(msg){
							  // alert(msg); 
							l.stop(); 
							var vals = $.parseJSON(msg);
							if(vals['psw']==false){
								animateObj('fm1','shake');
									give_warn(password,passwordMsg,"Wrong Password");																
									l.stop();
									status = false;
							}
							if(vals['psw']==true){
								l.stop();
								top.location.href = vals['address'];
							}
						}); 
				
					}
				 
				
				e.preventDefault(); 
			});
			
			
			
			/****************************************/
	}); /**** end jquery *****/
	
		
			/**** javascript functions ***/
		
			/*****************************************************************/ 
		   function validateEmpty(mainInput,msgInput,textWarning){
				var status = false; 
			   if(mainInput.val()==""){ 
					give_warn(mainInput,msgInput,textWarning);
					status = false; 
			   }
			   else {
				   give_success(mainInput,msgInput);
					status = true; 
			   }
			   /////////////////// 
			   return status; 
		   }
		 
		 function give_warn(mainInput,msgInput,textWarning){
					mainInput.parent().removeClass('has-success'); 
					mainInput.parent().addClass('has-error'); 
					msgInput.show('fast');
					msgInput.text(textWarning);
					msgInput.removeClass('text-success'); 
					msgInput.addClass('text-danger'); 
					mainInput.focus(); 
		 }
	 	
		 function give_success(mainInput,msgInput){
					// msgInput.text(textOk);										 			
					msgInput.hide('fast'); 					
					// mainInput.focus(); 
		 }
		/**********************************************/
	
		
		function animateObj(id,x) {
			$('#'+id).removeClass().addClass(x + ' input-group animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			  $(this).removeClass();
			  $(this).addClass('input-group');
			  
			});
		};
		/********/
		
		
	function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
						
		/*** page landing background slider ****/	
		// var images = ["landing1.jpg","landing2.jpg"];
		/**** 
		var images = ["landing2.jpg"];
			$(function () {
				var i = 0;
				$(".section").css("background-image", "url(assets/img/" + images[i] + ")");
				setInterval(function () {
					i++;
					if (i == images.length) {
						i = 0;
					}
					$(".section").fadeOut("slow", function () {
						$(this).css("background-image", "url(assets/img/" + images[i] + ")");
						$(this).fadeIn("slow");
					});
				}, 10000);
			}); ***/
			
			/********************** 
			$.ctrl = function(key, callback, args) {
			$(document).keydown(function(e) {
				if(!args) args=[]; // IE barks when args is null 
				if(e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
					callback.apply(this, args);
					return false;
				}
				});        
			};
		/********/

	




	/***** disable mouse right click *****/
		 
		/***
		 $(document).bind("contextmenu",function(e){
			 	alert('disbled');
		   return false;
		 });
		 // 
		***/ 
		
		
		/** disable other keys */
		/***** 
	$.ctrl('U', function(e) {		
    	alert('disbled');
	});
	/***** 
	$.ctrl('S', function(e) {		
    	alert('disbled');
	});
	/***** 
	$.ctrl('V', function(e) {		
    	alert('disbled');
	});
	/******/