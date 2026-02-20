
		$(function(){
			$('#saveBillCateg,#updateBillCateg').on('click',function(){	 
			var bill_dept_id = $("#bill_dept_id");  	bill_dept_idMsg = $(".bill_dept_idMsg");
			var billCateg = $("#billCateg");  	billCategMsg = $(".billCategMsg");
			serial = $(this).attr('for'); 
			mode = $(this).attr('mode');

			if(!validateEmpty(bill_dept_id,bill_dept_idMsg,"Select Department ")){ 							 
				  	return false; 
					}	
					else if(!validateEmpty(billCateg,billCategMsg,"Enter Category ")){ 							 
						return false; 
					}						
				else {  
					/*********************/
					var l = Ladda.create(this);  
					/****************  save_new_labtest_categ *****/
					// 1
					var req = $.ajax({url : "formsubmit.php", method : "POST",
								data : { saveBillCateg:"new Bill Categ", bill_dept_id:bill_dept_id.val(),
								billCateg:billCateg.val(),mode:mode,serial:serial
								}, beforeSend:  function(){ l.start();  }	  
					});
					// 2
					req.fail(function(e){   alert(e.status); });
					// 3
					req.done(function(res){  // alert(res);
						 var output = $.parseJSON(res);
						 swal({title:output['title'],text:output['text'],icon:output['icon']});						
						  l.stop(); 
						  
					});   // end ajax 
				}	// else 			
			return false; 
		}); 
		
				 
		/********************************************************/
		$('#saveBillDept,#updateBillDept').on('click',function(){	 			
			var billDeptForm = $("#billDeptForm");  	billDeptFormMsg = $(".billDeptFormMsg");
			serial = $(this).attr('for'); 
			mode = $(this).attr('mode');
			if(!validateEmpty(billDeptForm,billDeptFormMsg,"Enter Department to Save")){ 							 
					hasError(billDeptForm);
				  return false; 
					}						
				else {  
					/*********************/ 
					 has_success(billDeptForm); 
					/*********************/
					var l = Ladda.create(this);  
					/****************/
					var req = $.ajax({url : "formsubmit.php", method : "POST",
								data : { save_new_department:"new save_new_department", name:billDeptForm.val(),mode:mode,serial:serial
								}, beforeSend:  function(){   l.start();
								}	
					});  //  1 - processing req
					req.fail(function(e){
						l.stop();
					});// add / -   update req
					req.fail(function(e){ alert(e.status);	});
					
					req.done(function(res){  // alert(res);
						 var output = $.parseJSON(res); l.stop();
						 swal({title:output['title'],text:output['text'],icon:output['icon']});								
						 if(output['icon']=="success"){	 
							  $('#billDeptForm').val(''); 
							  window.location.href="";
						  }
						  
					});  // end ajax 
					
				} // else stmt	 
		});
			
		});
	
	
		function togBillSearchMode(prop_status){
			if(prop_status==true) { $('div.selection-2').hide('fast'); $('div.searching').show('fast'); }
			if(prop_status==false) { $('div.selection-2').show('fast'); $('div.searching').hide('fast'); }
			
		}
	  
		 /********************************************/
		 function manage_billtype_update(dtext){
			 // dtxt = $departments['sn'][$n]."|".$dept_categs['sn'][$m].'|'.$dept_categs_types['sn'][$p].'|'.$type_name.'|'.$dept_categs_types['specimen_sample'][$p].'|'.$dept_categs_types['price'][$p].'|'.$dept_categs_types['estm_time'][$p].'|'.$dept_categs_types['estm_time_type'][$p]; 
			 elem = $('#updateBillType');// 0			1			2		3			4		5		6				7
			 infos = dtext.split('|'); // dept_id | categ_id | billtypeID | name |  sample | price | estm_time | estm_time_type
			 elem.attr('for',infos[2]);  //     
			 console.log(dtext);
			 // refill datas form 
			  load_bill_departments($('select#bill_dept_id2'));
			  setTimeout(function(){ $('select#bill_dept_id2 option[value="' + infos[0] +'"]').prop('selected', true); },1500);
			  // load category 
			  setTimeout(function(){  load_bill_category(infos[0],$('#billCateg2')); },2500); 
			  setTimeout(function(){ $('select#billCateg2 option[value="' + infos[1] +'"]').prop('selected', true); },4000); 
			   
			 // fill forms 
			 $("#billType2").val(infos[3]);
			 $("#specimen_sample").val(infos[4]);
			 $("#billCost").val(infos[5]);
			 $("#estm_time").val(infos[6]);
			 $("#estm_time_type").val(infos[7]); 
			 // $.ajax() //  load_bill_departments load_bill_category
			  /********************/
			 show_update_buttons(); 
		 }
		
		/////////////////////////////////////////////////// 
		function load_bill_departments(elem){			 		
				 var req = $.ajax({
						url:"formsubmit.php", data:{ load_bill_departments :'all'}, method:"POST",
						beforeSend: function(){  elem.html("<option value=''> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
	    /////////////////////////////////////////////////// 
		function load_bill_category(dept_id,elem){			 		
				 var req = $.ajax({
						url:"formsubmit.php", data:{ load_bill_category:'all',dept_id:dept_id}, method:"POST",
						beforeSend: function(){  elem.html("<option value=''> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/
	     /////////////////////////////////////////////////// 
		function load_bill_type(dept_id,categ_id,elem){			 		
				 var req = $.ajax({
						url:"formsubmit.php", data:{ load_bill_type:'all',dept_id:dept_id,categ_id:categ_id}, method:"POST",
						beforeSend: function(){  elem.html("<option value=''> Loading, Please Wait...</option>"); } }); 
					
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				
				req.done(function(res){ elem.html(res); }); 	 					
		}
	   /**********************************/ 
	   
	   function view_bill_result_template(bill_type_id,elem) /********* spec_template_view ***************/
			 {	
				// elem = $('.process_content'); serial = $(this).val();  ticket_no = $(this).attr('for'); .addClass('')
				var req = $.ajax({ /** data - ticket_no:ticket_no **/
				url:"temp_formsubmit.php", data:{ display_specimen_result_form:'all',serial:bill_type_id}, method:"POST",beforeSend:function(){elem.html("<span class='fa fa-spinner fa-spin fa-3x'></span>"); console.log('serial: '+bill_type_id)} }); 
				req.fail(function(e){ console.log(" --- "+e.status+" Failed"); });
				req.done(function(res){	elem.html(res); 
				hide_update_buttons();  display_temp_form_type('param_form');  
				});   
				 
			} 
	 
		function reload_unit_tinymce(){
			 	// tinymce.EditorManager.editors = []; 
				// console.log(tinymce.EditorManager.editors );
				if(tinymce.execCommand('mceRemoveEditor', false, 'unit')) {
					tinymce.init({
					height:200, 
					selector :"textarea#unit", menubar: true, plugins:[' charmap  code' ], toolbar:"undo redo | insert | styleselect | bold italic underline | table"
					}); 
				} 
		}  
 
		function reload_text_tinymce(){
			 	//  tinymce.EditorManager.editors = [];  
				 
				 if(tinymce.execCommand('mceRemoveEditor', false, 'result_text')) {
					tinymce.init({
					  selector: 'textarea#result_text', 
					  height:500, 
					  plugins: [
						'advlist autolink lists link image charmap print preview hr anchor pagebreak',
						'searchreplace wordcount visualblocks visualchars code fullscreen',
						'insertdatetime media nonbreaking save table directionality',
						'emoticons template paste textpattern imagetools codesample toc help'
					  ],
					  toolbar1: 'undo redo | insert | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
					  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
					}); 
				}
				 
			//	console.log(tinymce.EditorManager.editors);
				
		}  
 
		
     
                
		
  /*Tinymce editor*/   /***
  if ($("#tinyMceExample").length) {
    tinymce.init({
      selector: '#tinyMceExample',
      height: 500,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table directionality',
        'emoticons template paste colorpicker textpattern imagetools codesample toc help'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
      image_advtab: true,
      templates: [{
          title: 'Test template 1',
          content: 'Test 1'
        },
        {
          title: 'Test template 2',
          content: 'Test 2'
        }
      ],
      content_css: []
    });
  }
  
  **/
  
  /**** 
  
  *****/