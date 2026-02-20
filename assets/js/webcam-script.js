
	// temp_img = $('input:hidden#temp_img_dir').val(); 
	// if(temp_img !="")  { initCam();   }
	// else {  } 
	
	
	$('#pic_result').show();  $('#pic_scan').hide();
	$('#mil_tag').hide();
	
	function initCam(){
		
		  $('#pic_result').hide();
		  $('#pic_scan').show();  
		
		Webcam.attach('#my_camera');
		Webcam.set({
		 	width: 180,
		 	height: 180,
			  crop_width: 180,
			 crop_height: 180
		});
		
		Webcam.on('load',function(){
			console.log('webcam is ready to use');
			// $('.scan_report').html('webcam is ready to use');
			
		});
		
		Webcam.on('live',function(){
			console.log('webcam is now running');
			// $('.scan_report').html('webcam is running now');
		});
		
		Webcam.on('error',function(err){
			console.log(' some error occured '+err); initCam(); 
			// $('.scan_report').html(' some error occured '+err);
		});
		
		Webcam.on('uploadProgress',function(progress){
			console.log(' picture upload in progress '+(progress*100)+'%');
			$('.scan_report').html((progress*100)+'% done');
			 
		});
		/** Webcam.on('uploadComplete', function(res){
			console.log(' uploading successful : here is the response :  '+res);
			$('.scan_report').html(' uploading successful : here is the response :  '+res);
			$('.scan_report').html(' message after upload :  '+text);
		});  
		**/
	} // end initCam  
 		
		  
		$('.rescan').on('click',function(e){ e.preventDefault(); 
			$('#pic_result').hide();  $('#pic_scan').show(); 	initCam(); 		
		});
		
		
		
		function take_snapshot() {
			// e.preventDefault(); 
			//  
			$('#pic_result').show();  $('#pic_scan').hide(); 
			
			Webcam.snap( function(data_uri) {
				// alert(data_uri);
				// Webcam.freeze(); 
				
				  document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
					var username = 'temp_scan';
					var image_fmt = 'jpeg';
					var url = 'webcam_form.php?username=' + username + '&format=' + image_fmt;
				 
					Webcam.upload( data_uri, url, function(code, text) {
					// Upload complete!
					// preventDefault(); 
					// console.log(' uploading successful : here is the response :  '+res);
					$('.scan_report').html('  '+text);
				 });  
				
			});
			 
		}
	