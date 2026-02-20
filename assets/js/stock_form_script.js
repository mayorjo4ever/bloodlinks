	
		$(function(){
			
			load_stock_item_category($('#item_categ'));  
			  
			  
			$('#savetab1,#updatetab1').on('click',function(){
				var itemname = $('#itemname');
				var brand_id = $('#item_brand3');
				var prod_type_id = $('#prod_type');
				var codenumber = $('#itembarcode');
				var item_desc = $('#item_desc');
				mode = $(this).attr('mode'); // type: new / update 
				serial = $(this).attr('rel'); // serial for update	
				/***** validate the form ***********/
				if(itemname.val()=="") {
					itemname.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Item Name Empty','Please enter Item Name ','warning'); 
					itemname.focus();
				}
				else if(codenumber.val()=="") {
					codenumber.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Barcode Number Empty','Please enter or scan the barcode number for this item','warning'); 
					codenumber.focus();
				}
				else if(brand_id.val()=="") {
					brand_id.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Product Brand Empty','Please Select The Product Brand ','warning'); 
					item_categ.focus();
				}
				else if(prod_type_id.val()=="") {
					prod_type_id.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Product Type Empty','Please Select The Product Type ','warning'); 
					item_categ.focus();
				}
				/***** validate the form ***********/
				
				else{
					brand_id.removeClass('border-danger').addClass('border-success');
					prod_type_id.removeClass('border-danger').addClass('border-success');
					codenumber.removeClass('border-danger').addClass('border-success');
					itemname.removeClass('border-danger').addClass('border-success');
					mode = $(this).attr('mode'); // type: new / update 
					serial = $(this).attr('rel'); // serial for update	
					var req = $.ajax({ url : "codegen.php", method : "GET",
								data : { create_barcode:"new code", text:codenumber.val(),quantity:1 },								
								beforeSend :function(){ 
								$('img#textcode').attr('src','default.png');
								}
							});
					
							req.fail(function(e){ console.log(e.status+" Failed"); 
								alert(e.status);  
							});
					
						req.done(function(res){	
						   $('img#textcode').attr('src','barcodes/'+codenumber.val()+'.png'); 
							 var req2 = $.ajax({ url : "formscript.php", method : "POST",
								data : { save_stock_tab1_form:"new texts",brand_id:brand_id.val(),
								itemname:itemname.val(),codenumber:codenumber.val(),
								prod_type_id:prod_type_id.val(),item_desc:item_desc.val(),
								mode:mode,serial:serial
								} 
							});
							req2.done(function(res){
								var output = $.parseJSON(res); // title  / msg / icon 
								showToastPosition('mid-center',output['title'],output['text'],output['icon']); 
							})
						}); 
				} // end else stmt
					
 			});
			/************************************/
			
			$('#savetab3,#updatetab3').on('click',function(){
				var item_purchase_price = $('#item_purchase_price');
				var item_selling_price = $('#item_selling_price');
				var item_qty = $('#item_qty');
				var purchase_date = $('#purchase_date');
				mode = $(this).attr('mode'); // type: new / update 
				serial = $(this).attr('rel'); // serial for update	
				
				/***** validate the form ***********/
				if(item_purchase_price.val()=="") {
					item_purchase_price.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Purchase Price Empty','Please Enter Item Purchase Price ','warning'); 
					item_purchase_price.focus();
				}
				else if(item_selling_price.val()=="") {
					item_selling_price.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Selling Price Empty','Please Enter Item Selling Price','warning'); 
					item_selling_price.focus();
				}
				else if(item_qty.val()=="") {
					item_qty.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Item Quantity Empty','Please Enter Item Quantity ','warning'); 
					item_qty.focus();
				}
				else if(purchase_date.val()=="") {
					purchase_date.removeClass('border-primary').addClass('border-danger');
					showToastPosition('mid-center','Item Quantity Empty','Please Enter Item Quantity ','warning'); 
					purchase_date.focus();
				}
				/***** validate the form ***********/
				
				else{
					item_purchase_price.removeClass('border-danger').addClass('border-success');
					item_selling_price.removeClass('border-danger').addClass('border-success');
					item_qty.removeClass('border-danger').addClass('border-success');
					purchase_date.removeClass('border-danger').addClass('border-success');
					
					var req = $.ajax({ url : "formscript.php", method : "POST",
							data : { save_stock_tab3_form:"new texts",
							item_purchase_price:item_purchase_price.val(),item_selling_price:item_selling_price.val(),
							item_qty:item_qty.val(),purchase_date:purchase_date.val(),
								mode:mode,serial:serial
							} 
						});
						
						req.done(function(res){
							var output = $.parseJSON(res); // title  / msg / icon 
								showToastPosition('mid-center',output['title'],output['text'],output['icon']); 
							 
						});
					  
						req.fail(function(e){ console.log(e.status+" Failed"); 
							alert(e.status);  
						});
					
						 
				} // end else stmt
					
 			});
			/************************************/
			});	
		 
			// savetabs
			$('#savetabs,#updatetabs').on('click',function(){
				mode = $(this).attr('mode'); // type: new / update 
				serial = $(this).attr('rel'); // serial for update	
				
				var req = $.ajax({ url : "formscript.php", method : "POST", data : { finalize_stock_form:"new texts", mode:mode,serial:serial  }  });
					req.done(function(res){ 
						// alert(res);
					var output = $.parseJSON(res);
							 swal({title:output['title'],text:output['text'],icon:output['icon']})
							 .then((next)=>{
								 if(output['icon']=="success")  window.location.reload();
							 });
							  
						}); 
			
			});
	 
		 