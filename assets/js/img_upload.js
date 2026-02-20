
	$(function(){
		
		// swal('javascript is working'); 
		
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
								{ 	alert('Wrong Image Uploaded');	return false; 	}
								{ 
									var reader = new FileReader(); // html 5 function 
									 reader.onload = imageIsLoaded; reader.readAsDataURL(file);
									
									// send to server
									 $.ajax({ url: "img_upload.php", type: "POST", data:formdata,
										cache: false, processData :false, contentType:false, 
										success: function(res) {  if(!res) {  alert('Error');  }   }
									  }); 
									
								}	 
					});
		/**********************************************************************/
		
	}); // end jquery 
	
	