
	
	// jquery 
	$(function(){
		/***********************************/
	 			
            /************************************************/ 
            $("#create_page_group,#update_page_group").on('click',function(){
                    var grpname = $("#grpname"); 	 var grpid = $("#grpid"); 	 
                    var grpicon = $("#grpicon"); 	 mode = $(this).attr('mode');
                    serial = $(this).attr('for');

                    if(grpname.val()==""){  hasError(grpname);  }
                    else if(grpid.val()==""){  hasError(grpid);  }
                    else if(grpicon.val()==""){  hasError(grpicon);  }
                    else { 	has_success(grpname) ; has_success(grpid); has_success(grpicon);			
                     var l = Ladda.create(this);  

                        var req = $.ajax({
                                url : "formsubmit.php",
                                method : "POST",
                                data : { 
                                        create_page_group:"new page", grpname:grpname.val(),grpid:grpid.val(),
                                        grpicon:grpicon.val(),mode:mode,serial:serial
                                },
                                beforeSend:  function(){ 
                                        l.start(); 
                        }	
                    });

                    req.fail(function(e){
                              console.log(e.status+" Failed");
                            alert(e.status); l.stop();
                            });

                            req.done(function(res){  // alert(res);
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
    /************************************************/ 
            $("#create_page_list,#update_page_list").on('click',function(){
                var pgtitle = $("#pgtitle"); 	var pgurl = $("#pgurl"); 	 
                var pggroup = $("#pg_group");  	var pgicon = $("#pgicon"); 	  
                var pgauto_load = $("input:radio.pgauto_load:checked").val(); 	 mode = $(this).attr('mode');
                serial = $(this).attr('for');

                if(pgtitle.val()==""){  hasError(pgtitle);  }
                else if(pgurl.val()==""){  hasError(pgurl);  }
                else if(pggroup.val()==""){  hasError(pggroup);  }
                else { 	has_success(pgtitle) ; has_success(pgurl); has_success(pggroup);			
                 var l = Ladda.create(this);  
                        var req = $.ajax({
                                url : "formsubmit.php",
                                method : "POST",
                                data : { 
                                        create_page_list:"new page", pgtitle:pgtitle.val(),pgurl:pgurl.val(),
                                        pggroup:pggroup.val(),pgicon:pgicon.val(),pgauto_load:pgauto_load,
                                        mode:mode,serial:serial
                                },
                                beforeSend:  function(){ 
                                     l.start();    }	
                                });

                req.fail(function(e){
                          console.log(e.status+" Failed");
                            alert(e.status); l.stop();
                        });

                        req.done(function(res){  // alert(res);
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

	});
	
		function manage_page_group(data){
                    datas = data.split('|'); // grpname | grpid   | grpicon | serial
                    $("#grpname").val(datas[0]); 	 $("#grpid").val(datas[1]); 	 
                    $("#grpicon").val(datas[2]);	 $("#update_page_group").attr('for',datas[3]);
                    show_update_buttons(); 
		}	 
		/***********  ******************/
		function manage_page_list(data){
                        datas = data.split('|'); // name | url   | groupid | icon   | autoload | serial
                        $("#pgtitle").val(datas[0]); 	 $("#pgurl").val(datas[1]); 
                        $('select#pg_group option[value="' + datas[2] + '"]') .prop('selected', true).trigger('change');				
                        $("#pgicon").val(datas[3]);	
                        $('input:radio#pgauto_load[value="' + datas[4] + '"]').prop('checked', true).trigger('change');
                        $("#update_page_list").attr('for',datas[5]);
                        show_update_buttons(); 
		}	 
		/***********  ******************/
		
		// 
		/**********************************************/
		