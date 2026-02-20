	// jquery 
	$(function(){
			
			/**$(".se-pre-con").fadeOut("400");;
			
			$('.zoom').imagezoomsl({
				zoomrange: [3,6]
			});
			***/  
			
		/***********************************/
		// searching barcode for sales 
		$('button.sales_filterate_btn').on('click',function(e){
			e.preventDefault(); 
			searchText = $('input:text#searchText'); 
			elem = $('.search_result_2');
			
			if(searchText.val()==""){
				hasError(searchText);	//  staff_delv_to			
				showToastPosition('mid-center','Word Search Empty','Please Enter the Name or Scan the barcode on the item you want to sell ','warning'); 
			}
			else{ has_success(searchText); 
				manage_stock_sale_searches(elem,searchText.val());
			}
			
		});
		/***********************************/
	
	/***********************************/
		//  
		$('button.checkout-cart').on('click',function(e){
			e.preventDefault(); 
			searchText = $('input:text#searchText'); 
			elem = $('.search_result_2');
			
			if(searchText.val()==""){
				hasError(searchText);				
				showToastPosition('mid-center','Word Search Empty','Please Enter the Name or Scan the barcode on the item you want to sell ','warning'); 
			}
			else{ has_success(searchText); 
				manage_stock_sale_searches(elem,searchText.val());
			}
			
		});
		/***********************************/




		/***********************************/
	 			$("button#change_psw").on('click',function(){
					var cur_psw = $("#cur_psw"); 	cur_pswMsg = $(".cur_pswMsg");
					var new_psw = $("#new_psw"); 	new_pswMsg = $(".new_pswMsg"); 
					var confirm_psw = $("#confirm_psw"); 	confirm_pswMsg = $(".confirm_pswMsg"); 
				  
					if(!validateEmpty(cur_psw,cur_pswMsg,"Enter Current Password")){ 							 
							animateObj('fm1','shake');
							return false; 
						}
					else if(!validateEmpty(new_psw,new_pswMsg,"Enter New Password")){ 							 
							animateObj('fm2','shake');
							return false; 
						}
						else if(!validateEmpty(confirm_psw,confirm_pswMsg,"Enter Confirm Password")){ 							 
							animateObj('fm3','shake');
							return false; 
						}
					 						
					else { 		
							/**********************/
							var l = Ladda.create(this);
							l.start();
							/**********************/
							
							var req = $.ajax({
								url : "formscript.php",
								method : "POST",
								data : { 
									change_psw:"change_psw", cur_psw:cur_psw.val(),new_psw:new_psw.val(),
									confirm_psw:confirm_psw.val() 
								},
								beforeSend:  function(){ 
									$(this).prop('disabled',true); 
									// alert('');
							}	
					});
					
					req.fail(function(e){
						// console.log(e.status+" Failed");
						alert(e.status); l.stop();
						});
					
						req.done(function(res){
							 //alert($.trim(res));
							 l.stop();
							 var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['msg'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
							 if(output['icon']=="success"){
								  window.setTimeout(function(){window.location.href="index.php";},5000 );
							  }
						}); 
					return false; 
						}// end else submit
				});	
			/********************************************************************/
		
		 /******************************* 
		 $('.datepicker').datepicker({
			  autoclose: true,
			  format : 'yyyy-mm-dd',
			  todayHighlight: true						  
			}); 
		********************************/
		 
		 $('.datepicker').bootstrapMaterialDatePicker
					({
						time: false,
						clearButton: true
					});
			
			$('.datetimepicker').bootstrapMaterialDatePicker
					({
						time: true,
						format: 'YYYY-MM-DD H:m:s',
						clearButton: true
					});
				
		 /*************************************/
		 
		
		/*************************************/
		 $('.del-bill-type__').on('click',function(){
				var id = $(this).attr('for'); // alert(id);
				var data = $(this).attr('data-text'); // categ | type
				infos = data.split('|'); // alert(data);
				 /********/
				swal({icon:'warning',title: id+ ' - Delete '+infos[1]+' :  under '+infos[0], closeOnEsc:false,closeOnClickOutside:false,				 
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
				text:"About Deleting "+infos[1]+" "+id,dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formscript.php",method : "POST",								
								data:{ del_bill_type:"this",serial:id }  	
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
		
		
		
		/*************************************/
		 $('.del-bill-type__').on('click',function(){
                    var id = $(this).attr('for'); // alert(id);
                    var data = $(this).attr('data-text'); // categ | type
                    // infos = data.split('|'); // alert(data);
                     /********/
                    swal({icon:'warning',title: ' Delete '+infos[1]+' :  under '+infos[0], closeOnEsc:false,closeOnClickOutside:false,				 
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
                    text:"About Deleting "+infos[1]+"  ",dangerMode:true})
                    .then((value) => {
                      if(value) {
                            /** when confirmed.. send to server **/
                            /**********************************************/
                            var req = $.ajax({url : "formsubmit.php",method : "POST",
                                                    // data:{ del_role:"this",serial:id }  	
                                                    data:{ del_bill_type:"this",serial:id }  	
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
		
		
		/*************************************/
		 $('.del-stock-item').on('click',function(){
				var id = $(this).attr('for'); // alert(id);
				var data = $(this).attr('data-text'); // name | barcode no.
				infos = data.split('|'); // alert(data);
				 /********/
				swal({icon:'warning',title: ' Delete '+infos[0]+' :  with barcode no: '+infos[1], closeOnEsc:false,closeOnClickOutside:false,				 
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
				text:"About Deleting a Pharmacy product: "+infos[0]+"  ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST", 
								data:{ del_pharm_product:"this",serial:id }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){  alert(res);
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
		
		
		/*************************************/
		 $('.set-stock-invisible').on('click',function(){
				var id = $(this).attr('for'); // alert(id);
				var data = $(this).attr('data-text'); // name | barcode no.
				infos = data.split('|'); // alert(data);
				 /********/
				swal({icon:'warning',title: ' Set '+infos[0]+' Invisible from stock list? ', closeOnEsc:false,closeOnClickOutside:false,				 
				buttons: {
				  cancel: {
					text: "Cancel",value: null,visible: true,
					closeModal: true,
				  },
				  confirm: {
					text: "Set Invisible!", value: true,visible: true,
					closeModal: false
				  }
				},
				text:"About Setting  a Pharmacy product: "+infos[0]+" To be Invisible for viewing again ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formsubmit.php",method : "POST", 
								data:{ hide_pharm_product:"this",serial:id }  	
							});
						
					req.fail(function(e){  
						console.log(e.status+" Failed"); 
					 });
					
					req.done(function(res){  alert(res);
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
		
		
		
		
				/************************************************/ 
				$("button#create_admin").on('click',function(){
					var surname = $("#surname"); 		snameMsg = $(".surnameMsg");
					var firstname = $("#firstname"); 	fnameMsg = $(".firstnameMsg"); 
					var othername = $("#othername"); 	
					var phone = $("#phone"); 	phoneMsg = $(".phoneMsg"); 					
					var user_id = $("#user_id"); 	user_idMsg = $(".user_idMsg"); 
					var psw = $("#psw"); 	pswMsg = $(".pswMsg"); 
					
					
					if(!validateEmpty(surname,snameMsg,"Enter SurName")){ 							 
							return false; 
						}
					else if(!validateEmpty(firstname,fnameMsg,"Enter First Name")){ 							 
							return false; 
						}
						else if(!validateEmpty(phone,phoneMsg,"Enter Phone Number ")){ 							 
							return false; 
						}
						 
						else if(!validateEmpty(user_id,user_idMsg,"Enter Username ")){ 							 
							return false; 
						}
						else if(!validateEmpty(psw,pswMsg,"Set Default Password ")){ 							 
							return false; 
						}						
					else { 				
							var l = Ladda.create(this);  
				 
							var req = $.ajax({
								url : "formscript.php",
								method : "POST",
								data : { 
									create_admin:"new user", surname:surname.val(),firstname:firstname.val(),
									othername:othername.val(),phone:phone.val(),
									user_id:user_id.val(),psw:psw.val()
								},
								beforeSend:  function(){ 
									l.start(); 
							}	
					});
					
					req.fail(function(e){
						  console.log(e.status+" Failed");
						alert(e.status); l.stop();
						});
					
						req.done(function(res){ // alert(res);
							 l.stop(); 
							 var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']});								
							 if(output['icon']=="success"){
								  window.location.reload(); 
							  }
						}); 
					return false; 
						}// end else submit
				});	
			
		
		
		
		/****
		swal({icon:'warning',title: ' Delete Report', closeOnEsc:false,closeOnClickOutside:false, closeModal:false,
				buttons:['Cancel','Delete'],content:'Do you want to delete this report?',dangerMode:true})
			.then((value) => {
			  if(value) {			
				  swal({text:'Report Deleted ',icon:'success',buttons:'Thank You',timer:5000});
			  }
			  
			});
		***/
		
		/*** 
		swal({
		  text: 'Search for a movie. e.g. "La La Land".',
		  content: "input",
		  button: {
			text: "Search!",
			closeModal: false,
		  },
		})
		.then(name => {
		  if (!name) throw null;
		 
		  return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
		})
		.then(results => {
		  return results.json();
		})
		.then(json => {
		  const movie = json.results[0];
		 
		  if (!movie) {
			return swal("No movie was found!");
		  }
			const name = movie.trackName;
		  const imageURL = movie.artworkUrl100;
		 
		  swal({
			title: "Top result:",
			text: name,
			icon: imageURL,
		  });
		})
		.catch(err => {
		  if (err) {
			swal("Oh noes!", "The AJAX request failed!", "error");
		  } else {
			swal.stopLoading();
			swal.close();
		  }
		});
	****/
	
	/*************************************/

				
			}); /// END JQUERY 
			
			
			
			/*************************************************************/
			/********************************************/
		   function give_warn(mainInput,msgInput,textWarning){
					mainInput.parent().removeClass('has-success'); 
					mainInput.parent().addClass('has-warning'); 
					msgInput.show('fast');
					msgInput.text(textWarning);
					msgInput.removeClass('text-success'); 
					msgInput.addClass('text-danger'); 
					mainInput.focus(); 
		 }
		
		 function give_success(mainInput,msgInput){
					mainInput.parent().removeClass('has-warning'); 
					mainInput.parent().addClass('has-success'); 
					// msgInput.text(textOk);										 			
					msgInput.hide('fast'); 					
					// mainInput.focus(); 
		 }
		/**********************************************/
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
		   
		   
		  $(function(){
		  /****
		  $("select#pcategory").on('change',function(){
				category = $(this).val();	
		    
			if(category == "Military") {					
						$("div#mil_tag").show('fast');
						}
					else { 
						$("div#mil_tag").hide('fast');
						}			    
		   }); ***/ 

		   /******************************/
		   // $('#create_patient').on('click',function(){
		   $('form#newpatient').on('submit',function(e){
			  //  e.preventDefault();
				// return false; 
			 	  /** 
				   var surname = $("#surname"); 		surnameMsg = $(".surnameMsg"); 
					var firstname = $("#firstname"); 	firstnameMsg = $(".firstnameMsg"); 
					var othername = $("#othername"); 	othernameMsg = $(".othernameMsg"); 
					var dob = $("#dob"); 	var dobMsg = $(".dobMsg"); 						
					var phone = $("#phone"); 	var phoneMsg = $(".phoneMsg"); 						
					var mystate = $("#mystate"); 	mystateMsg = $(".mystateMsg"); 
					var mylga = $("#mylga"); 	mylgaMsg = $(".mylgaMsg"); 
					var gender = $("#gender"); 	genderMsg = $(".genderMsg"); 
					var hosp_no = $("#hosp_no"); 	hosp_noMsg = $(".hosp_noMsg"); 
					var address = $("#address"); 	addressMsg = $(".addressMsg"); 
					var nokName = $("#nokName"); 	nokNameMsg = $(".nokNameMsg"); 
					var nokRelation = $("#nokRelation"); 	nokRelationMsg = $(".nokRelationMsg"); 
					var nokPhone = $("#nokPhone"); 	nokPhoneMsg = $(".nokPhoneMsg"); 
					var military_no = $("#military_no"); 	military_noMsg = $(".military_noMsg"); 
					var pcategory = $("#pcategory"); 	pcategoryMsg = $(".pcategoryMsg"); 
					// var pix_option = $("input#pix_option"); 
					 
					 // alert(method); 
					 
					 if(!validateEmpty(surname,surnameMsg,"Enter Patient Surname..")){ 
						animateObj('fm1'); 
							return false; 
						}
					else if(!validateEmpty(firstname,firstnameMsg,"Enter First Name")){ 							 
							animateObj('fm2'); 
							return false; 
					}
					else if(!validateEmpty(gender,genderMsg,"Select Gender ")){ 							 
						animateObj('fm5');
						return false; 
					}
					
					else if(!validateEmpty(dob,dobMsg,"Select Date of Birth ")){ 							 
						animateObj('fm4');
						return false; 
					}
					
						
					else if(!validateEmpty(phone,phoneMsg,"Enter Phone Number ")){ 							 
						animateObj('fm6');
						return false; 
					}
					
					else if(!validateEmpty(mystate,mystateMsg,"Select State of Origin ")){ 							 
						animateObj('fm7');
						return false; 
					}
					else if(!validateEmpty(mylga,mylgaMsg,"Select L.G.A")){ 							 
						animateObj('fm8');
						return false; 
					}
						
					else if(!validateEmpty(address,addressMsg,"Enter Patient Contact Address ")){ 							 
						animateObj('fm6');
						return false; 
					}
					else if(!validateEmpty(pcategory,pcategoryMsg,"Select Category of Patient")){ 							 
						animateObj('fm10');
						return false; 
					}
					else if(!validateEmpty(hosp_no,hosp_noMsg,"Enter Hospital Number")){ 							 
						// animateObj('fm9');
						return false;						
					}
					 
					else if(pcategory.val() == "Military" && military_no.val()=="") {					
						 validateEmpty(military_no,military_noMsg,"Enter the Military No.")
						 return false; 
					  }
					 else if(!validateEmpty(nokName,nokNameMsg,"Enter Patient Next of Kin Name ")){ 							 
						// animateObj('fm6');
						return false; 
					}
					
					else if(!validateEmpty(nokRelation,nokRelationMsg,"Enter Relationship of Next of Kin ")){ 							 
						// animateObj('fm6');
						return false; 
					}
					else if(!validateEmpty(nokPhone,nokPhoneMsg,"Enter Phone Number of Next of Kin ")){ 							 
						// animateObj('fm6');
						return false; 
					}
					/**	else * 
				else { 
					  
					  /** if(pix_option.prop('checked')==true){
						  if($("#itemImage").val()==""){
							alert('browse the client passport');
							$("input[type='file'].itemImage").click(); 
							return false; 
						}
						else { 
							  return true; 
						
					  }   
					 return true; 
				}  // else end
			***/
			// return false; 
				
			});
		/***********************************************/
		
		
		
		/**** users passport upload *****/
		//
			$('.alt_itemImage').on('click',function(){
					$("input[type='file'].itemImage").click(); 
				});
			
			// $('#chn_img').on('click',show_img);
			
			
		 formdata = false;
			
		  if (window.FormData) {
			formdata = new FormData();
			$('#btn,.itemImage').css('display','none');
		  }	
		  /*********************************************************/
		  
		  			$("#itemImage").change(function() {						
						var file = this.files[0];
						var imagefile = file.type;
						formdata.append('file', file);
						
						var match= ["image/jpeg","image/png","image/jpg","image/gif","image/GIF"];
							if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])|| (imagefile==match[3])))
								{
									alert('Wrong Image Uploaded');
									// $("#itemImage").click(); 
								return false;
								}
								{ 
									var reader = new FileReader(); // html 5 function 
									reader.onload = imageIsLoaded;
									reader.readAsDataURL(file);
									
									// send to server
									/*** $.ajax({
										url: "formscript2.php",
										type: "POST",
										data: "file="+file,
										cache: false,

										success: function(reponse) {
										  if(reponse) {
											alert(reponse);

											// console.log(reponse);
											// $('#devis').trigger("reset");
										  } else {
											alert('Erreur');
										  }
										}
									  }); ****/
									
								}	 
					});
		/**********************************************************************/
		
		
		 /** $('#newSibling').on('click',function(){
			 	      
					  
					var surname = $("#sib_surname"); 		surnameMsg = $(".sib_surnameMsg"); 
					var firstname = $("#sib_firstname"); 	firstnameMsg = $(".sib_firstnameMsg"); 
					var othername = $("#sib_othername"); 	othernameMsg = $(".sib_othernameMsg"); 
					var dob = $("#sib_dob"); 	var dobMsg = $(".sib_dobMsg"); 						
					var type = $("#sib_type"); 	var typeMsg = $(".sib_typeMsg"); 						
					var gender = $("#gender"); 	var genderMsg = $(".genderMsg"); 						
					var phone = $("#phone"); 	var phoneMsg = $(".phoneMsg"); 						
					var hosp_no = $(this).attr('for'); 
					// alert(hosp_no);
					 // alert(method);
					
					if(!validateEmpty(type,typeMsg,"Select Type..")){ 
						animateObj('fm1'); 
							return false; 
						}
					else if(!validateEmpty(surname,surnameMsg,"Enter Sibling Surname..")){ 
					animateObj('fm1'); 
						return false; 
						}
					else if(!validateEmpty(firstname,firstnameMsg,"Enter First Name")){ 							 
							animateObj('fm2'); 
							return false; 
					}
					else if(!validateEmpty(gender,genderMsg,"Select Gender ")){ 							 
						animateObj('fm4');
						return false; 
					} 
					else if(!validateEmpty(dob,dobMsg,"Select Date of Birth ")){ 							 
						animateObj('fm4');
						return false; 
					} 						
				else { 		
						/***************
						var l = Ladda.create(this);  
						/***************
							var req = $.ajax({
								url : "formscript.php",
								method : "POST",
								data : { 
									create_patient_sibling:"new user",surname:surname.val(), 
									firstname:firstname.val(), othername:othername.val(), phone:phone.val(),
									dob:dob.val(), hosp_no:hosp_no, type:type.val(), gender:gender.val()
								},
								beforeSend:  function(){ 
									l.start();
							}	
					});
					
					req.fail(function(e){
						console.log(e.status+" Failed"); alert(e.status); 
						 l.stop();
						});
					
						req.done(function(res){
							  l.stop(); console.log(res);
							 var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']}).then((next)=>{
								  if(output['icon']=="success"){
								window.location.reload(); 
								  }
							 });								
							   
						}); 
				}
			return false; 
		});
		/***********************************************/
		
		
		/********************************************/
		$('button.addSiblings').on('click',function(){	 
			var texts = $(this).attr('data-text');
			var ref = $(this).attr('for');
			$('#newSibling').attr('for',ref);
			 $('.client_name').text(texts);
			 $('.client_id').text('( '+ref+' )');
		}); 
		/***************************************************/	 
		
		$('#newPCategory').on('click',function(){	 
			var category = $("#category"); 		categoryMsg = $(".categoryMsg");
			 if(!validateEmpty(category,categoryMsg,"Enter The Patient Category ")){ 							 
				  	return false; 
					}						
				else {  
					/*********************/
					var l = Ladda.create(this);  
					/*********************/
					// 1
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { new_patient_category:"new category", category:category.val()
								}, beforeSend:  function(){  l.start(); }	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							  $('#category').val(''); 
						  }
						  l.stop(); 
						 load_patient_categories($('#pcategory'));  
						 display_patient_categories($('#cat_view'));  
					}); 
					
					
				}	// else 			
			return false; 
		}); 
	/********************************************************/
		$('#bill_dept_id2').on('change',function(){
			dept_id = $(this).val(); // alert(dept_id);
			load_bill_category(dept_id,$('#billCateg2'));
		});
		
		
		  
		
		
		/********************************************************/
		$('#saveBillType,#updateBillType').on('click',function(){				
			serial = $(this).attr('for'); 
			mode = $(this).attr('mode');
			/********************************************************/
			dept_id = $('#bill_dept_id2'); dept_idMsg = $('.bill_dept_idMsg2');
			categ_id = $('#billCateg2'); categ_idMsg = $('.billCategMsg2');
			billType = $('#billType2'); billTypeMsg = $('.billTypeMsg2');
			billCost = $('#billCost'); billCostMsg = $('.billCostMsg');
			estm_time = $('#estm_time'); estm_timeMsg = $('.estm_timeMsg');
			specimen_sample = $('#specimen_sample'); 
			estm_time_type = $('#estm_time_type'); 
			/********************************************************/
				if(!validateEmpty(dept_id,dept_idMsg,"Select Department ")){ 							 
				  	hasError(dept_id);
					return false; 
					}
			else if(!validateEmpty(categ_id,categ_idMsg,"Select Category ")){ 							 
				  	hasError(categ_id);
					return false; 
					}
			 else if(!validateEmpty(billType,billTypeMsg,"Enter Bill Type  ")){ 							 
				  	hasError(billType); 	return false; 
					}
				else if(!validateEmpty(estm_time,estm_timeMsg,"Enter Estimated Time  ")){ 							 
				  	hasError(estm_time); 	return false; 
					}
			else if(!validateEmpty(billCost,billCostMsg,"Enter Bill Cost  ")){ 							 
				  hasError(billCost);	return false; 
					}
				else { 
				/*********************/
				var l = Ladda.create(this);  
				/*********************/ 
				var req = $.ajax({url:"formsubmit.php", method : "POST",
					data : { saveBillType:"new bill type",
						 dept_id:dept_id.val(), categ_id:categ_id.val(), estm_time:estm_time.val(),
						 billType:billType.val(),  billCost:billCost.val(),estm_time_type:estm_time_type.val(),
						 serial:serial,mode:mode, specimen_sample:specimen_sample.val()
					}, beforeSend:  function(){  l.start();  }	
				});
				// 2
				req.fail(function(e){   alert(e.status); });
				// 3
				req.done(function(res){  // alert(res);
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});	  
					  l.stop();  
				}); 
					
			}	// else 			
			
		}); 
		 /********************************************************/
		/********************************************************/
		/********************************************************/
		/********************************************************/
			
			 
		
		$('#saveConverseType').on('click',function(){	 
			var converseType = $("#converseType");  	converseTypeMsg = $(".converseTypeMsg");
			 if(!validateEmpty(converseType,converseTypeMsg,"Enter The Conversation Type ")){ 							 
				  	return false; 
					}						
				else {  
					/*********************/
					var l = Ladda.create(this);  
					/*********************/
					// 1
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { save_new_conversation_type:"new converseType", converseType:converseType.val()
								}, beforeSend:  function(){  l.start(); }	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							  $('#converseType').val(''); 
						  }
						  l.stop(); 
						 load_conversation_type($('#pconverseType'));  
						 display_conversation_type($('#converse_view'));  
					}); 
					
					
				}	// else 			
			return false; 
		}); 
		/********************************************************/
		
		$('#newSibType').on('click',function(){	 
			var sib_type = $("#sib_type_form"); 		sib_type_formMsg = $(".sib_type_formMsg");
			 if(!validateEmpty(sib_type,sib_type_formMsg,"Enter The Sibling Type ")){ 							 
				  	return false; 
					}						
				else {  
					/*********************/
					var l = Ladda.create(this);  
					/*********************/
					// 1
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { new_sibling_type:"new sibling type", sib_type:sib_type.val()
								}, beforeSend:  function(){  l.start(); }	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							  $('#sib_type_form').val(''); 
						  }
						  l.stop(); 
						 load_sibling_types($('#sib_type_form'));  
						 display_sibling_types($('#sib_view'));  
					}); 
					
					
				}	// else 			
			return false; 
		}); 
		/**************/
		
			$(".search_patient").on('click',function(){
				data = $("#patient_info").val();
				elem = $("#query_results"); 
				
				if(data==""){
					swal({title:"Empty Search!",text:"Search Parameters cannot be empty ",icon:"warning"}); 
				}
				else {
				/************************************************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { adv_fetch_all_patients:"all", criterial:data
								}, beforeSend:  function(){  
								elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
					});
					/************************************************/
					req.fail(function(e){   alert(e.status); console.log(e.status); });
					/************************************************/
					req.done(function(res){
						  elem.html(res); 
					}); 
				 /************************************************/
				} 
				return false; 
			  
				 });			
			/*************************************************/	 
			
			 /**************/
		
			$(".search_patient_forms").on('click',function(){
				data = $("#patient_info").val();
				elem = $("#query_results,.stock-search-result"); 
				
				if(data==""){
					swal({title:"Empty Search!",text:"Search Parameters cannot be empty ",icon:"warning"}); 
				}
				else {
				/************************************************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { adv_fetch_all_patients_forms :"all", criterial:data
								}, beforeSend:  function(){ 
								elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
					});
					/************************************************/
					req.fail(function(e){   alert(e.status); console.log(e.status); });
					/************************************************/
					req.done(function(res){
						  elem.html(res); 
					}); 
				 /************************************************/
				} 
				return false; 
			  
				 });			
			/*************************************************/	 
			
		
		/**************/
		
			
			 /**************/
		
			$("#pay_balance").on('click',function(){
				
				alert('ok');
			}); 
			
			
			
			
			$(".get_barcode_info").on('click',function(){
				data = $("#recp_barcode").val();
				elem = $("#query_results"); 
				elem2 = $("#query_results2"); 
				
				if(data==""){
					swal({title:"Empty Search!",text:"Search Parameters cannot be empty ",icon:"warning"}); 
				}
				else {
				/************************************************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { get_recp_barcode :"all", recp_barcode:data
								}, beforeSend:  function(){ 
								elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
					});
					/************************************************/
					req.fail(function(e){   alert(e.status); console.log(e.status); });
					/************************************************/
					req.done(function(res){
						  elem.html(res); 
						  // make second request 
							  var req2 = $.ajax({url : "formscript.php", method : "POST",
								data : { get_recp_barcode_pay_form :"all", recp_barcode:data
								}, beforeSend:  function(){ 
								elem2.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
								});
								/************************************************/
								req2.fail(function(e){   alert(e.status); console.log(e.status); });
								/************************************************/
								req2.done(function(res){
									  elem2.html(res); 
									  // make second request 
										  
									/** end second request **/   
								}); 
							 /**************** ***************/
						/** end first request **/   
					}); 
				 /************************************************/
				} 
				return false; 
			  
				 });			
			/*************************************************/	 
			
			/**************/
		
			$(".search_patient_reports").on('click',function(){
				data = $("#patient_info").val();
				elem = $("#query_results"); 
				
				if(data==""){
					swal({title:"Empty Search!",text:"Search Parameters cannot be empty ",icon:"warning"}); 
				}
				else {
				/************************************************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { adv_fetch_all_patients_reports :"all", criterial:data
								}, beforeSend:  function(){ 
								elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
					});
					/************************************************/
					req.fail(function(e){   alert(e.status); console.log(e.status); });
					/************************************************/
					req.done(function(res){
						  elem.html(res); 
					}); 
				 /************************************************/
				} 
				return false; 
			  
				 });			
			/*************************************************/	 
			 
			/******** selecting a specialist for another task..  ****************/	
			 
				$('input:radio.role_type').on('change',function(){
					elem = $('.avail_specs'); 
					role_id = $(this).val(); 
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { display_avail_specs:"all", role_id:role_id
								}, beforeSend:  function(){ 
								elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
					});
					/************************************************/
					req.fail(function(e){   alert(e.status); console.log(e.status); });
					/************************************************/
					req.done(function(res){
						  elem.html(res); 
					}); 
				 /************************************************/
				}); 
		
				/****************/
				
				$('#addPatientBillType').on('click',function(){
					 data = $(this).attr('data-text'); // alert(data);
					 elem = $('.all_my_bills');
					 infos = data.split('|');
					// $data_text = $mysib['fullname'][$m]."|".$sid."|".$result_01['military_no'][$n]."|".$result_01['category'][$n]."|".$mysib['type'][$m];
					// name|hsp_id|mil_id|categ|type
					allBillType = $('#allBillType');
					// allBillTypeMsg = $('#allBillTypeMsg');
					if(allBillType.val()==""){
						alert('Select Bill Type' ); 
						allBillType.focus(); 
						return false; 
					}				
					else{
						// info = $('select #allBillType option:selected').attr('data-text');
						// alert(info);
						// alert(data+' ++++++ '+allBillType.val());
						var req = $.ajax({url : "formscript.php", method : "POST",
								data : { savePatientReceiptBillType:"bill", billType:allBillType.val(),
								datas:data
								}, beforeSend:  function(){ 
								elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				
								}	
					});
					/************************************************/
					req.fail(function(e){   alert(e.status); console.log(e.status); });
					/************************************************/
					req.done(function(res){
						//  elem.html(res); 
						manage_receipt_view(data);
					}); 
					}
					
				});
		
		/*************************************/
		 
		 $('.del-patient-bill-record2').on('click',function(){
				var id = $(this).attr('for');
				var data = $(this).attr('data-text'); // categ | type
				infos = data.split('|');
				 /********/
				swal({icon:'warning',title: ' Delete '+infos[1]+' :  under '+infos[0], closeOnEsc:false,closeOnClickOutside:false,				 
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
				text:"About Deleting "+infos[1]+"  ",dangerMode:true})
				.then((value) => {
				  if(value) {
					/** when confirmed.. send to server **/
					/**********************************************/
					var req = $.ajax({url : "formscript.php",method : "POST",
								// data:{ del_role:"this",serial:id }  	
								data:{ del_bill_type:"this",serial:id }  	
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
		
		
		$('#generate_patient_receipt').on('click',function(){
			total_fee = $('#total_fee'); 
			amount_paid = $('#amount_paid'); 
			datas = $(this).attr('data-text');
			if(total_fee.val()==""){
				alert('Enter Total Fee');	total_fee.focus();		
			}
			else if(amount_paid.val()==""){
				alert('Enter Amount Paid'); amount_paid.focus();
			}
			
			else {
				/*********************/
					var l = Ladda.create(this);  
					/*********************/
				var req = $.ajax({
						url:"formscript.php", data:{ generatePatientReceipt:'all',
						datas:datas,total_fee:total_fee.val(),amount_paid:amount_paid.val()}, method:"POST",
						beforeSend: function(){  l.start(); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); l.stop();

					});
				
				req.done(function(res){ l.stop(); // alert(res);
					 var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								//  display_my_roles($(".myroles"),user_id); 
								if(output['icon']=="success"){
							  window.location.href= "receipt_slip.php?rcn="+output['recpno']; 
									//  alert(output['recpno']);
								}
							 }); 
					
					});
				// alert('receipt saved  ++ '+ datas); 
			}
			
		});
		
					 
			 $('button#save_patient_report,button#update_patient_report').on('click',function(e){
				 e.preventDefault(); 
				 ref_no = $(this).attr('for'); // ref_no
				 mytype = $(this).attr('data-text'); // type
				 mode = $(this).attr('mode'); // type
				 serial = $(this).attr('rel'); // serial for update				  
				 // alert(serial);				   
				 date_rec = $('#date_rec');				 
				 report_type = $('#report_type');  				  
				 var contents = tinymce.get('medReportTinyMice').getContent();	
				 
				 /******** now validate *******/
				 if(date_rec.val()==""){
					 swal({title:'Please select report date',text:"report date shouldn't be blank",icon:'warning'}).then((next)=>{
								date_rec.focus();
							 });  
				 }
				 
				 else if(report_type.val()==""){
					  swal({title:'Please select report type',text:"report type shouldn't be blank",icon:'warning'}).then((next)=>{
								 report_type.focus();
							 }); 
				 }
				  else if(contents=="<p>Report...</p>" || contents==""){
					  swal({title:'Please enter some report ',text:'',icon:'warning'}).then((next)=>{
								 $('#medReportTinyMice').focus();	
							 });
				  }
				  else {
					  var l = Ladda.create(this);  
					  var req = $.ajax({url : "formscript.php", method : "POST",
								data : { savePatientMedicalReport:"new",ref_no:ref_no,mytype:mytype, 
								date_rec:date_rec.val(),serial:serial,
								report_type:report_type.val(),contents:contents,mode:mode
								}, beforeSend:  function(){  l.start(); }	
					}); 
						req.done(function(response){
							l.stop(); 
							// alert (response);
							var output = $.parseJSON(response);
						 swal({title:output['title'],text:output['text'],icon:output['icon']}).then((next)=>{
							if(output['icon']=="success"){	 
							   window.location.href="";
							}
						}); 
							
						}); 
				  }
			 }); 
		
						
			 $('button#save_patient_report2').on('click',function(e){
				 e.preventDefault(); 
				 ref = $(this).attr('for'); // ref_no
				 type = $(this).attr('data-text'); // type
				 
				 date_rec = $('#date_rec');
				 report_no = $('#report_no'); 
				 report_no = $('#report_no'); 
				 
				 report = $('#medReportTinyMice'); 
				 
				 if(ref=="" || type==""){
					 alert('invalid patient info'); 
				 }
				 else if(date_rec.val()==""){
					 alert('select date'); date_rec.focus(); 
				 }
				 else if(recp_no.val()==""){
					 alert('Enter Receipt No. '); recp_no.focus(); 
				 }
				 
				 else if(complaints_report.val()==""){
					 alert('Enter Conplain Report'); complaints_report.focus(); 
				 }
				 else if(diagnosis_report.val()==""){
					 alert('Enter Diagnosis Report'); diagnosis_report.focus(); 
				 }
				 
				 else if(treatment_report.val()==""){
					 alert('Enter Treatment Report'); treatment_report.focus(); 
				 }
				 else {
					 /*********************/
					var l = Ladda.create(this);  
					/*********************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { savePatientMedicalReport:"new",ref:ref,types:type, date_rec:date_rec.val(),
								recp_no:recp_no.val(), diagnosis_report:diagnosis_report.val(),
								complaints_report:complaints_report.val(), treatment_report:treatment_report.val()
								}, beforeSend:  function(){  l.start(); }	
					});
					// 2
					req.fail(function(e){   alert(e.status); l.stop();  });
					// 3
					req.done(function(res){ alert(res);
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							   window.location.href="";
						  }
						  l.stop();  
					}); 
					
				 }
				 
				//  swal({title:'saving report',text:ref,icon:'error'}); 
			 }); 
		

			$('input#recp_no').on('change',function(){
				
				id = $(this).val(); elem = $('#receipt_infos');
				
				var req = $.ajax({url : "formscript.php", method : "POST",
								data : { verify_receipt:"new",recp_no:id	},
								beforeSend:  function(){ elem.html("<span class='fa fa-spin fa-spinner fa-3x' style='margin-left:250px;'> </span>");				 }	
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){ // alert(res);
						 elem.html(res); 
					}); 
				
			});
			
			
			report_ref = $('input#report_ref').attr('for');
			if(report_ref==""){
				alert('invalid patient info');
				window.location.href="index.php";
			}
		 
            /******************************/
             $("input.only-numeric").keydown(function(event) {
            // Allow: backspace, delete, tab, escape, and enter
                if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
                     // Allow: Ctrl+A
                    (event.keyCode == 65 && event.ctrlKey === true) || 
                     // Allow: home, end, left, right
                    (event.keyCode >= 35 && event.keyCode <= 39)) {
                         // let it happen, don't do anything
                         return;
                        }
                                else {
                                    // Ensure that it is a number and stop the keypress
                                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                                            event.preventDefault(); 
                                    }   
                                }
                        }); 
	
	/******************************/
		$('input.only-numeric').bind("contextmenu",function(e){
                    alert('disbled');
                   return false;
                 });
	/******************************/
		// shopping cart items 
		$('input.item-cart-qty').on('change',function(){
				console.log(' QTY changes to '+$(this).val());
		});
		// var star = $(this).closest('tr').find('i.fa-star');
	
	/***********************************************************************/	
		/****************************************************/ 
			$('input#customer_filter,input#customer_filter2').on('keyup',function(){
				elem = $(this);
				data = $(this).val();
				displayer = $('.num_list');
				// alert('searching ');
				auto_search_customer(elem,data,displayer); 
				
			});
			/****************************************************/
			// checkout_amount_paidcheckout_amount_paid  
			$('#pay_checkout_now').on('click',function(){
				due = $(this).attr('for');
				customer = $('#customer_filter').val();	
				custom_ref = $('#customer_filter').attr('ref');	
				amount_paid = $('#checkout_amount_paid').val(); 
				// alert(due + ' + ' +patient_ref);
				if(customer==""){
					swal({title:'search for Customer paying ',icon:'warning'});  $('#customer_filter').focus(); 
				}
				else if(amount_paid <= 0 ||amount_paid=="" ){
					swal({title:'Enter Amount To Pay ',icon:'warning'});
				}
				else {
					// send to ajax 
					 /*********************/
							var l = Ladda.create(this);  
							/*********************/
							 var req = $.ajax({url : "formscript.php", method : "POST",
								data : { make_checkout_payment:"new",due:due,
								amount_paid:amount_paid, custom_ref:custom_ref,customer:customer
								}, beforeSend:  function(){  l.start(); }	
							}); // end ajax
							// 2
							req.fail(function(e){
								console.log(e.status);  l.stop(); 
							});
							// 3
							req.done(function(res){ // alert(res);
								 var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
							 if(output['icon']=="success"){
								 //  window.setTimeout(function(){window.location.href="index.php";},5000 );
								 clear_inputs(); 
								 $('#pay_checkout_now,#checkout_amount_paid,#customer_filter').prop('disabled',true);  
								 $('div.output_receipt').show('fast'); 
								 $('a.output_receipt').attr('href',output['address']); 
								 
							  } l.stop(); 
							});
				}
				
			});
	/***********************************************************************/	
		// saveVitalScience  
			$('#saveVitalScience').on('click',function(){
				dtext = $(this).attr('data-text'); 
				info = dtext.split('|'); // refno | type | name 
				/*******************************/
				weight = $('#pweight'); weightMsg = $('.pweightMsg'); 
				pbp = $('#pbp'); pbpMsg = $('.pbpMsg'); 
				height = $('#pheight'); pheightMsg = $('.pheightMsg'); 	
				temp = $('#ptemp'); ptempMsg = $('.ptempMsg'); 	
				/*******************************/
				if(!validateEmpty(weight,weightMsg,"Enter Patient Weight ")){ 							 
					return false; 
					}
					 else if(!validateEmpty(pbp,pbpMsg," Enter Patient B.P ")){ 							 
						return false; 
						}
						else if(!validateEmpty(height,pheightMsg," Enter Patient Height ")){ 							 
						return false; 
						}else if(!validateEmpty(temp,ptempMsg," Enter Patient Temperature ")){ 							 
						return false; 
						}
					 else {
						  var req = $.ajax({url : "formscript.php", method : "POST",
								data : { savePatientVitalScience:"new",weight:weight.val(),
								pbp:pbp.val(), height:height.val(),temp:temp.val(),ref_no:info[0],types:info[1],
								fullname:info[2]
								}, beforeSend:  function(){ }	
							}); // end ajax
							// 2
							req.fail(function(e){
								console.log(e.status);   
							});
							req.done(function(res){
									var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								//  display_my_roles($(".myroles"),user_id); 
								if(output['icon']=="success"){
									clear_inputs();
									//  alert(output['recpno']);
								}
							 });
								
							});
							
					 }
			}); 
			
			
			// pay_lab_now  
			$('#pay_lab_now').on('click',function(){
				due = $(this).attr('for');
				patient_ref = $('#patient_filter2').attr('ref');	
				amount_paid = $('#lab_amount_paid').val(); 
				// alert(due + ' + ' +patient_ref);
				if(patient_ref=="" || patient_ref==undefined){
					swal({title:'search for patient paying ',icon:'warning'});  $('#patient_filter2').focus(); 
				}
				else if(amount_paid <= 0 ||amount_paid=="" ){
					swal({title:'Enter Amount To Pay ',icon:'warning'});
				}
				else {
					// send to ajax 
					 /*********************/
							var l = Ladda.create(this);  
							/*********************/
							 var req = $.ajax({url : "formscript.php", method : "POST",
								data : { make_lab_payment:"new",due:due,
								amount_paid:amount_paid, patient_ref:patient_ref,
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
							 if(output['icon']=="success"){
								 //  window.setTimeout(function(){window.location.href="index.php";},5000 );
								 clear_inputs(); 
								 $('#pay_lab_now,#lab_amount_paid,#patient_filter2').prop('disabled',true);  
								 $('div.output_receipt').show('fast'); 
								 $('a.output_receipt').attr('href',output['address']); 								 
							  } l.stop(); 
							});
				}
				
			});
	/***********************************************************************/	
		/****  fetching stock records **************/
			$("form#fetch_stocks").on('submit',function(e){
				/**e.preventDefault();
				var data  = $('#stock_filterate').val();
				$('#reqType').val('search');
				var reachedMax = false;				 
				getStocks(data,$('#reqType').val()); // criterial | reqType 
				 **/
			});
			/***************/
			

			
			
			/***************/
			// under medical task report [ no more in use - display is on head_nav.php ]
			var pos = $('div.medReportTinyMice'); 			
			// $('span.form_top').html(Math.round(pos.top));
			$(window).scroll(function () {
				 winTop = $(window).scrollTop();
				 winHeight =  $(window).height();
				// $('span.form_top').html(Math.round(pos.offset().top)+' winTop: '+winTop+', winHeight: '+winHeight);
			});
			
		  }); /***** end jQuery ******/
		   
	
	  
		 $(document).ajaxStart(function () {
			Pace.restart()
		  }); 
		  
		