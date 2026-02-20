
	$(function(){
		
		/**************************************************************/
		$("button#update_new_import_stock").on('click',function(e){
				e.preventDefault();  //  
				var product_mfd = $('#product_mfd2'), product_mfdMsg = $('.product_mfdMsg2');
				var product_expd = $('#product_expd2'), product_expdMsg = $('.product_expdMsg2');
				var no_of_pack = $('#no_of_pack2'), no_of_packMsg = $('.no_of_packMsg2');
				var qty_per_pack = $('#qty_per_pack2'), qty_per_packMsg = $('.qty_per_packMsg2');
				var product_cp = $('#product_cp2'), product_cpMsg = $('.product_cpMsg2');
				var product_sp = $('#product_sp2'), product_spMsg = $('.product_spMsg2');
				update_id = $(this).attr('data-text');
				/**
				var product_vendor = $('#product_vendor'), product_vendorMsg = $('.product_vendorMsg');
				var date_supply = $('#date_supply'), date_supplyMsg = $('.date_supplyMsg');
				**/
				if(!validateEmpty(product_mfd,product_mfdMsg,"Enter Manufacture Date ")){
					 	return false; 
						}
					else if(!validateEmpty(product_expd,product_expdMsg,"Enter  Expiring Date ")){ 							 
					return false; 
					}				
					else if(!validateEmpty(no_of_pack,no_of_packMsg,"Enter Total Packs")){ 							 
						return false; 
						}
						else if(!validateEmpty(qty_per_pack,qty_per_packMsg,"Enter Quantity Per Packs")){ 							 
						return false; 
						}
						 
						 else {
							/*********************/
							var l = Ladda.create(this);  
							/*********************/
							var req = $.ajax({url : "formsubmit.php", method : "POST",
										data : { update_new_import_stock :'',
										no_of_pack:no_of_pack.val(),qty_per_pack:qty_per_pack.val(), 
										product_expd:product_expd.val(), 
										product_mfd:product_mfd.val(),update_serial:update_id
										}, beforeSend:  function(){  l.start(); /*alert(update_id); */ }	
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
							  } l.stop(); 
							});
						 }  // end else 						 		
					});
	
		/*************************************/
		$('.data-dismiss').on('click',function(){  window.location.reload(); });
	
			/**************************************************************/
		$("button#save_new_stock,button#update_new_stock").on('click',function(e){
				e.preventDefault();   // alert('not seen'); 
				var stock_type = $(this).attr('for'); // alert(stock_type);
				var update_serial = $(this).attr('data-text'); // alert(stock_type);
				var has_expiry = $('input:radio.has-expiry:checked').val(); 
				var product_name = $('#product_name'), product_nameMsg = $('.product_nameMsg');
				var product_code = $('#product_code'), product_codeMsg = $('.product_codeMsg');
				var product_desc = $('#product_desc'), product_descMsg = $('.product_descMsg');
				var product_barcode = $('#product_barcode'), product_barcodeMsg = $('.product_barcodeMsg');
				var product_mfd = $('#product_mfd'), product_mfdMsg = $('.product_mfdMsg');
				var product_expd = $('#product_expd'), product_expdMsg = $('.product_expdMsg');
				var no_of_pack = $('#no_of_pack'), no_of_packMsg = $('.no_of_packMsg');
				var qty_per_pack = $('#qty_per_pack'), qty_per_packMsg = $('.qty_per_packMsg');
				var product_cp = $('#product_cp'), product_cpMsg = $('.product_cpMsg');
				var product_sp = $('#product_sp'), product_spMsg = $('.product_spMsg');
				var product_vendor = $('#product_vendor'), product_vendorMsg = $('.product_vendorMsg');
				var date_supply = $('#date_supply'), date_supplyMsg = $('.date_supplyMsg');
				
				if(!validateEmpty(product_name,product_nameMsg,"Enter The Product Name ")){
				  	return false; 
					} 
					else if(!validateEmpty(no_of_pack,no_of_packMsg,"Enter Total Packs")){ 							 
						return false; 
						}
						else if(!validateEmpty(qty_per_pack,qty_per_packMsg,"Enter Quantity Per Packs")){ 							 
						return false; 
						}
					 /** else if(!validateEmpty(product_cp,product_cpMsg,"Enter The Cost Price")){ 							 
						return false; 
						}
					else if(!validateEmpty(product_sp,product_spMsg,"Enter The Selling Price")){ 							 
						return false; 
						}
					else if(!validateEmpty(product_vendor,product_vendorMsg,"Select Product Vendor")){ 							 
						return false; 
						}
						
					else if(!validateEmpty(date_supply,date_supplyMsg,"Select Date Supplied")){ 							 
						return false; 
					} **/
					else if(has_expiry == "yes" && !validateEmpty(product_mfd,product_mfdMsg,"Enter Product Manufacture Date ")){
					 	return false; 
						}
						else if(has_expiry == "yes" && !validateEmpty(product_expd,product_expdMsg,"Enter Product Expiring Date ")){ 							 
						return false; 
						}
						 else {
							/*********************/
							var l = Ladda.create(this);   // no_of_pack qty_per_pack
							/*********************/
							var req = $.ajax({url : "formsubmit.php", method : "POST",
										data : { saveNewProduct:"new",product_desc:product_desc.val(),
										product_code:product_code.val(), product_name:product_name.val(),
										no_of_pack:no_of_pack.val(),qty_per_pack:qty_per_pack.val(), product_expd:product_expd.val(), product_mfd:product_mfd.val(),
										product_barcode:product_barcode.val(), date_supply:date_supply.val(),
										product_vendor:product_vendor.val(),  product_sp:product_sp.val(),
										product_cp:product_cp.val(),stock_type:stock_type,update_serial:update_serial
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
							 if(output['icon']=="success"){
								 //  window.setTimeout(function(){window.location.href="index.php";},5000 );
								 clear_inputs(); 
							  } l.stop(); 
							});
						 }  // end else 
					  
		});
		
		/*************************    ************/
		$(".search_drug_forms").on('click',function(){
				data = $("#query").val();
				elem = $(".stock-search-result"); 
				
				if(data==""){
					swal({title:"Empty Search!",text:"Search Parameters cannot be empty ",icon:"warning"}); 
				}
				else {
				/************************************************/
					var req = $.ajax({url : "formsubmit.php", method : "POST",
								data : { adv_fetch_all_drug_forms :"all", criterial:data
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
			  
			$(".add_more_drug_forms").on('click',function(){
				data = $("#query").val();
				elem = $(".stock-search-result"); 
				
				if(data==""){
					swal({title:"Empty Search!",text:"Search Parameters cannot be empty ",icon:"warning"}); 
				}
				else {
				/************************************************/
					var req = $.ajax({url : "formscript.php", method : "POST",
								data : { adv_fetch_add_more_drug_forms :"all", criterial:data
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
			$('input#staff_filter').on('keyup',function(){
				elem = $(this);
				data = $(this).val();
				displayer = $('.num_list');
				console.log('searching for '+data);
				auto_search_staff(elem,data,displayer); 
				
			});
			/****************************************************/
	
	}); // end jQuery 
	
	/**********************************************/
	////////////////////////////////////////
	function manage_item_checkout(){
		 staff_delv_to = $('#staff_filter').attr('rel'); 
		  if(staff_delv_to ==""){
			  $('#staff_filter').removeClass('border border-success').addClass('border border-danger ');
			  showToastPosition('bottom-center','No Staff Selected','You must specify which of the admin staff that the products will be delivered to','warning'); 
			  $('#staff_filter').focus(); 
		  }
		  else{
			  $('#staff_filter').removeClass('border border-danger').addClass('border border-success ');
				/*********************/
				var l = Ladda.create( document.querySelector('button.checkout'));			
				/**********************/
			  var req = $.ajax({
				url:"formsubmit.php", data:{ finalize_checkout:"all", staff_delv_to:staff_delv_to}, method:"POST",
				beforeSend: function(){  
					 l.start();
				} }); 
				
				req.fail(function(e){  console.log(e.status+" Failed");   l.stop();   });
		
				req.done(function(res){
					 l.stop(); alert(res);
				});
				
			   showToastPosition('bottom-center','Successful','You must specify which of the admin staff that the products will be delivered to','success'); 
		  }
	}
	/*********************************************/
	
	
		////////////////////////////////////////
			function auto_search_staff(elem,data,displayer) {
				console.log('i am called '+data);
				var min_length = 1; // min caracters to display the autocomplete
				var keyword = data;
				if (keyword.length >= min_length) {
					$.ajax({							
						url: 'formsubmit.php',
						type: 'POST',
						data: {staff_name_search:"",keyword:keyword},
						success:function(data){
							displayer.show();
							displayer.html(data);
						}
					});
				} else {
					displayer.hide(); $('#staff_filter').attr('rel','');	
				}
			}
			/////////////////////////////////////////
			// set_item : this function will be executed when we select an item				
				function set_name(name,id) {
					// change input value
					$('#staff_filter').val(name);
					$('#staff_filter').attr('rel',id);									
					$('.num_list').hide();
				}
				///////////////////////

		  
	/**********************************************/
	function manage_stock_items_update(serial){ 
	 // get updates 
		show_update_buttons();  
		elem = $('.loader'); 
		$('button#update_new_stock').attr('data-text',serial);  
			 var req = $.ajax({
							url:"formsubmit.php", data:{ get_stock_item_details:"all",serial:serial }, method:"POST",
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
						 $('#no_of_pack') .val(infos['no_of_pack']);	 									  
						 $('#qty_per_pack') .val(infos['qty_per_pack']);	 									  
						 });						
			 
				}
				  
	// at the stock sales page 
	function add_to_my_cart(serial,qty){
		 /// swal({title:'goods purchased',text:serial+' with '+qty+' quantity'});
		console.log('goods purchased id : '+serial+', qty : '+qty);
		var req = $.ajax({
			url:"formsubmit.php", data:{ save_item_cart:"this",serial:serial,qty:qty }, method:"POST",
			beforeSend: function(){  
				 // elem.html("<span class='fa fa-spin fa-spinner fa-2x'> </span>");
			  } }); 
				
			req.fail(function(e){  console.log(e.status+" Failed");  //elem.html(""); 
			 });
		
				req.done(function(res){
					display_item_cart($('.all_item_cart'));
					$(".search_drug_forms").click(); 
				});
		 
	}
	
	function display_item_cart(elem){
		var req = $.ajax({
			url:"formsubmit.php", data:{ display_item_cart:"all" }, method:"POST",
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
					  var req = $.ajax({url : "formsubmit.php",method : "POST",
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
	