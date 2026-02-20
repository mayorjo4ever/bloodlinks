		$(function(){ 
			  
			today = getToday(); 
			  $('input.datepicker').val(today); // alert(today); 
			 /****************************************/
				$('#search_all_test_with_dates').on('click',function(){								 
					datefrom = $('input#datefrom').val();	
					dateto = $('input#dateto').val();   
					view_mode = $('input:radio.search_type:checked').val(); 
					// 
					if(datefrom ==""){ $('input#datefrom').val(); }
					else if(dateto ==""){  $('input#dateto').focus(); }
					else {
						/*********************/
						spin = "<i class='fa fa-spin fa-spinner fa-3x'></i>";
						var l = Ladda.create(this);  
						/*********************/
						var req = $.ajax({url : "formsubmit.php", method : "POST",
								data : { search_all_test_with_dates:"new", datefrom:datefrom,
								view_mode:view_mode, dateto:dateto
								}, beforeSend:  function(){  l.start(); $('div.output_result').html(spin);
								}	
							});
							req.done(function(res){ $('div.output_result').html(res);
								l.stop(); 
							}); 
					}
				}); 
				/*****************************************/
				
				$('#search_specific_test_with_dates').on('click',function(){								 
					datefrom = $('input#datefrom2').val();	
					dateto = $('input#dateto2').val();   
					bill_type_id = $('input.bill_searcher').attr('ref');   
					view_mode = $('input:radio.search_type2:checked').val(); 
					// 
					if(datefrom ==""){ $('input#datefrom').val(); }
					else if(dateto ==""){  $('input#dateto').focus(); }
					else if(bill_type_id==undefined || bill_type_id==""){
						alert('search for the Test Type');
					}
					else {
						/*********************/
						spin = "<i class='fa fa-spin fa-spinner fa-3x'></i>";
						var l = Ladda.create(this);  
						/*********************/
						var req = $.ajax({url : "formsubmit.php", method : "POST",
								data : { search_specific_test_with_dates:"new", datefrom:datefrom,
								view_mode:view_mode, dateto:dateto,bill_type_id:bill_type_id,bill_type_id:bill_type_id
								}, beforeSend:  function(){  l.start();
									  $('div.output_result2').html(spin); 
								}	
							});
							req.done(function(res){ $('div.output_result2').html(res);
								l.stop(); // alert(res);
							}); 
					}
				}); 
				/*****************************************/
				
				$('input:radio.search_type').on('ifChanged',function(){ $('#search_all_test_with_dates').click(); })
				$('input:radio.search_type2').on('ifChanged',function(){ $('#search_specific_test_with_dates').click(); })
				 /*****************************************/
				 
				
			$('#bill_searcher,.bill_searcher').on('keyup',function(){
				search_text = $(this).val();  elem = $('.search_result'); 
				displayer = $('.num_list');  
				if(search_text.length >=2) {  $.ajax({							
						url: 'formsubmit.php',
						type: 'POST',
						data: {auto_search_bill_for_ticket:"",keyword:search_text},
						success:function(data){
							displayer.show();
							displayer.html(data);
						}
					}); 
					}
					else { 
					displayer.hide();  
					 
				}
			});  
			/*****************/
			
		});
		
		 function set_bill_searched(name,id) {
		// change input value
			$('.bill_searcher').val(name);
			$('.bill_searcher').attr('ref',id);	 				
			$('.num_list').hide(); elem = $('.disp_content');
			console.log('name: '+name+', id: '+id);
			/** send request for form - **/ 
		}
	///////////////////////
	 
		 
		 