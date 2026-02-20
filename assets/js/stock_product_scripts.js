// jquery 
		
	$(function(){ 
		// alert('founded me ');
	 	
			/************************************/		  
			$('#save_newbrand,#update_newbrand').on('click',function(){			
				var brand = $('#brand');								
			 	mode = $(this).attr('mode'); // type: new / update 
				serial = $(this).attr('rel'); // serial for update	
				/***** validate the form ***********/
				// alert('working'); 
				if(brand.val()=="") { hasError(brand);	 brand.focus(); }
				 else {
					 /**********************/
						var l = Ladda.create(this);  l.start();
					  has_success(brand); 
					 /**********************/
				  
					var req = $.ajax({
							url:"formscript.php", data:{ save_newbrand:'this',brand:brand.val(),
							mode:mode,serial:serial}, method:"POST",
							beforeSend:function(){  }
							}); 							
						
						req.fail(function(e){ console.log(e.status+" Failed"); });	
						
						req.done(function(res){  // alert($.trim(res));							
							 l.stop();  var output = $.parseJSON(res);							
							 swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});								
							  
						});
				}  				
			});
			/*****************************/
			
			/************************************/		  
			$('#save_brand_categ,#update_brand_categ').on('click',function(){			
				var brand_id = $('#item_brand');								
				var brand_categ = $('#brand_categ');								
			 	mode = $(this).attr('mode'); // type: new / update 
				serial = $(this).attr('rel'); // serial for update	
				/***** validate the form ***********/
				// alert('working'); 
				if(brand_id.val()=="") { hasError(brand_id);	 brand_id.focus(); }
				else if(brand_categ.val()=="") { hasError(brand_categ);	 brand_categ.focus(); }
				 else {
					 /**********************/
						var l = Ladda.create(this);  l.start();
					  has_success(brand_id); has_success(brand_categ); 
					 /**********************/
				  
					var req = $.ajax({
							url:"formscript.php", data:{ save_brand_categ:'this',brand_id:brand_id.val(),
							brand_categ:brand_categ.val(),mode:mode,serial:serial}, method:"POST",
							beforeSend:function(){  }
							}); 							
						
						req.fail(function(e){ console.log(e.status+" Failed"); });	
						
						req.done(function(res){  // alert($.trim(res));							
							 l.stop();  var output = $.parseJSON(res);							
							 swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});															  
						});
				}  				
			});
			/*****************************/
	
			/************************************/		  
			$('#save_brand_categ_type,#update_brand_categ_type').on('click',function(){			
				var brand_id = $('#item_brand2');								
				var brand_categ = $('#item_categ');								
				var categ_type = $('#categ_type');								
			 	mode = $(this).attr('mode'); // type: new / update 
				serial = $(this).attr('rel'); // serial for update	
				/***** validate the form ***********/
				// alert('working'); 
				if(brand_id.val()=="") { hasError(brand_id);	 brand_id.focus(); }
				else if(brand_categ.val()=="") { hasError(brand_categ);	 brand_categ.focus(); }
				else if(categ_type.val()=="") { hasError(categ_type);	 categ_type.focus(); }
				 else {
					 /**********************/
						var l = Ladda.create(this);  l.start();
					  has_success(brand_id); has_success(brand_categ); has_success(categ_type); 
					 /**********************/
				  
					var req = $.ajax({
							url:"formscript.php", data:{ save_brand_categ_type:'this',brand_id:brand_id.val(),
							brand_categ:brand_categ.val(),categ_type:categ_type.val(),
							mode:mode,serial:serial}, method:"POST",
							beforeSend:function(){  }
							}); 							
						
						req.fail(function(e){ console.log(e.status+" Failed"); });	
						
						req.done(function(res){    // alert($.trim(res));							
							 l.stop();  var output = $.parseJSON(res);							
							 swal({title:output['title'],text:output['text'],content:true,icon:output['icon'],closeonclickoutside:false,closeonesc:false});															  
						});
				}  				
			});
			/*****************************/
			$('#item_brand2').on('change',function(){ 
				brand_id = $(this).val();
				load_product_brands_categ($('#item_categ'),brand_id); 
			});
			/*****************************/
			
	});
		/*****************************/
			function create_new_brand_categ(data){
				datas = data.split('|'); // brand_name | serial
				$('.brand_name').html(datas[0]);   
				$('#item_brand').val(datas[1]); $('#item_brand').trigger('change');
					 
				 console.log(datas[2]+"| serial : "+datas[3]);
				 hide_update_buttons(); 
			} 
			 /*****************************/
			function manage_brand_categ(data){
				datas = data.split('|'); // categ_name | brand_serial | categ_serial 
				$('.brand_name').html(datas[0]);    $('#item_brand').val(datas[1]);  $('#item_brand').trigger('change');
				$('#brand_categ').val(datas[0]);  $('#brand_categ').trigger('change');
				$('#update_brand_categ').attr('rel',datas[2]);
				console.log(data);
				show_update_buttons(); 
			} 
			/***********  ******************/
			function create_new_brand_categ_type(data){
				datas = data.split('|'); // categ_name | brand serial | categ_serial
				$('.categ_name').html(datas[0]);   
				$('#item_brand2').val(datas[1]); $('#item_brand2').trigger('change'); // item_brand2
				load_product_brands_categ($('#item_categ'),datas[1]); 	
				hide_update_buttons(); 
				// console.log('brand '+datas[1]+"| categ : "+datas[2]);
				window.setTimeout(function(){$('#item_categ').val(datas[2]);},1000);
				
				} 
			/*****************************/
			
			function manage_brand_categ_type(data){
				datas = data.split('|'); // categ_type_name | brand serial | categ_serial | type_serial
				$('#categ_type').val(datas[0]); $('#categ_type').trigger('change'); // 
				$('.categ_name').html('update '+datas[0]);   
				$('#item_brand2').val(datas[1]); $('#item_brand2').trigger('change'); // item_brand2
				load_product_brands_categ($('#item_categ'),datas[1]); 	
				show_update_buttons(); 
				window.setTimeout(function(){
					$('#item_categ').val(datas[2]);},1000);					
					$('#update_brand_categ_type').attr('rel',datas[3]);
				} 
				/***********  ******************/
			function manage_brand(data){
				datas = data.split('|'); // brand name | brand serial
				$('#brand').val(datas[0]);   
				$('#update_newbrand').attr('rel',datas[1]);
				show_update_buttons(); 
				console.log('brand :'+data); 				 
				} 
			
			
			function load_product_brands(elem){			 		
						 var req = $.ajax({
								url:"formscript.php", data:{ load_product_brands:'all' }, method:"POST", beforeSend: function(){  elem.html("<option value=''>Loading..</option>"); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res); elem.trigger('change');
						}); 	
				
			}
		/**********************************************/
			function load_product_brands_categ(elem,brand_id,categ_id=''){			 		
						 var req = $.ajax({
								url:"formscript.php", data:{ load_product_brands_categ:'all',brand_id:brand_id,categ_id:categ_id }, method:"POST", beforeSend: function(){  elem.html("<option value=''>Loading..</option>"); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res);   elem.trigger('change'); // alert(res);
						}); 	
				
			}
		/**********************************************/
		 
		 function load_product_brands_categ_subs(elem,brand_id,categ_id=''){			 		
						 var req = $.ajax({
								url:"formscript.php", data:{ load_product_brands_categ_subs:'all',brand_id:brand_id,categ_id:categ_id }, method:"POST", beforeSend: function(){  elem.html("<option value=''>Loading..</option>"); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){ elem.html(res);   elem.trigger('change'); // alert(res);
						}); 	
				
			}
		/**********************************************/
		// 
		 function load_sales_history_dates(elem,order='desc'){			 		
						 var req = $.ajax({
								url:"formscript.php", data:{ load_sales_history_dates:'all',order:order}, method:"POST", beforeSend: function(){  elem.html("<center> <span class='fa fa-spin fa-spinner fa-2x'> </span></center>"); } }); 
							
						req.fail(function(e){ console.log(e.status+" Failed"); });
						
						req.done(function(res){  elem.html(res);  // alert(res);
						}); 	
				
			}
		/**********************************************/
			/*****************************/
			function hide_update_buttons(){
				$('.updators').hide('fast');
				$('.creators').show('fast');
			}
			function show_update_buttons(){
				$('.updators').show('fast');
				$('.creators').hide('fast');
			}