
	//////////////////////////////////////
			function loadCourses(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php", data:{ loadCourses:'all' }, method:"POST",
							beforeSend: function(){  elem.html("<option> Loading Courses, Please Wait...</option>"); } }); 
						
					req.fail(function(e){ console.log(e.status+" Failed"); });
					
					req.done(function(res){ elem.html(res); }); 						
			}
			/////////////////////////////////////////////////
			
			////////////////
	function loadCountries(elem){			 		
					 var req = $.ajax({
							url:"formscript_2.php",
							data:
								{
								loadCountries:'all'
								},
							method:"POST",
							 beforeSend: function(){  
							 elem.html("<option>Loading Countries...</option>");
							 },
									
								}); 
						
					req.fail(function(e){
						 console.log(e.status+" Failed");
						  alert(e.status);
						});
					
						req.done(function(res){
						elem.html(res);
						// alert(res);
						}); 						
		}
		//////////
		
		function loadStates(elem,countryID){			 		
					 var req = $.ajax({
							url:"formscript_2.php",
							data:
								{
								loadStates:'all',countryID:countryID
								},
							method:"POST",
							 beforeSend: function(){  
							 elem.html("<option>Loading States...</option>");
							 },
									
								}); 
						
					req.fail(function(e){
						 console.log(e.status+" Failed");
						// alert(e.status);
						});
					
						req.done(function(res){
						elem.html(res);
						}); 						
		}
		//////////
	
	function loadCities(elem,stateID){			 		
			
			var req = $.ajax({url:"formscript_2.php",
						method: "POST",
						data:
							{
								loadCities:"all cities ", stateID:stateID
							},
							beforeSend:  function(){ 
								elem.html("<option value=''>Loading Cities </option>");
							}	
						});
						
						req.fail(function(e){
							// alert(e.status); 
							elem.html("<option value=''>failed to load LGA </option>");
						});
						
					req.done(function(msg){
						 elem.html(msg); // alert(msg);
						});
		}		
	////////////////////////////
	  