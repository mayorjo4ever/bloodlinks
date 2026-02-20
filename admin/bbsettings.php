<?php    require "usercheck.php";
 	
  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   <!-- -->

</head>
<!-- <body class="sidebar-fixed"> -->
<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php // require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel container">
        <div class="content-wrapper">  
		 
        	<form method="post"> 
		 <div class="row"> 
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card"> 
				
                <div class="card-header" style="padding-bottom:5px;">  
						<div class="col-md-12 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo $this_page['title']; ?>  </span> &nbsp;  </div>
				</div>  <!--  ./ card-header -->  
				
				<div class="card-body">                    
				   
               <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="height:auto">
                    
            <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
           <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist"> 
            <li class="nav-item " >
              <a  class="nav-link active"  id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> List of Blood Types  </a>
              </li> <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
              
              <li class="nav-item "> <!-- disabled -->
              <a class="nav-link  " onclick="view_all_blood_test_qtn($('.blood_test_qtn'))" id="tab2"  data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false">Blood Test Questions and Answers </a>
              </li> 
			  
			 		 <li class="nav-item "> <!-- disabled -->
              <a class="nav-link  " onclick="view_all_blood_test_categ($('.blood_test_categ'))" id="tab3"  data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> Categories of Blood Test </a>
              </li> 

			 		 <li class="nav-item "> <!-- disabled -->
              <a class="nav-link  " onclick="view_all_blood_test_categ($('.blood_test_categ'))" id="tab4"  data-toggle="tab" href="#stock-tab4" role="tab" aria-controls="stock-tab4" aria-selected="false">   Donation & Purchase </a>
              </li>
            </ul> 
           
              <div class="tab-content tab-content-solid">
                <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                   <?php require "blood_type_list.php"; ?> 
                </div> <!-- ./ tab-pane -->
      
                <div class="tab-pane fade " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2">                 
                  <?php  require "blood_test_qtn_list.php"; ?> 
                </div>  

                <div class="tab-pane fade " id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3">                 
                  <?php  require "blood_test_categ_list.php"; ?> 
                </div>  
             		
             		<div class="tab-pane fade " id="stock-tab4" role="tabpanel" aria-labelledby="stock-tab4">                 
                  <?php  require "blood_test_categ_list.php"; ?> 
                </div>

              </div> <!-- ./ tab-content -->

                  </div>
                </div>
              </div>
          </div>  <!-- ./ row -->
 
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			  
          </div> <!-- ./ row --> 
		 </form>
            
		   
  <?php require "blood_setting_modal.php"; ?>

		   
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
         
       <?php require "footer.php"; ?>
	   
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php require "admin_js_links.php"; ?>
  
  <script src="../assets/js/lab_rep_script.js"></script>
  
</body>

	<script>
	
		
      $(function(){  
	  
		// auto hide : 
		$('div.truefalse').hide(); $('div.fillings').hide(); 
           
          // saving save_donor_supply  
          $('button.saveBloodType').on('click',function(){
             var blood_type = $('input#btype').val(); 
             var save_mode = $('input#save_mode').val(); // new/update
             var uid = $('input#uid').val(); // update id
             var price = $('input#bloodprice').val();
             
               var l = Ladda.create( document.querySelector('.saveBloodType'));  	
				// save to db

             if(blood_type==undefined || blood_type=="" ){
                  showToastPosition('bottom-center','Enter the Blood Type','Blood Type must not be empty','error'); 
             }
             else { 

             $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: {save_blood_type:"",blood_type:blood_type,save_mode:save_mode,uid:uid,price:price
                },
                beforeSend:function(){ l.start(); },
                success:function(res){
                      output = $.parseJSON(res);
                        showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
                         l.stop();
                         // cond 
                         if(output['icon']=="success"){
                           // wipe_donation(); stepBack(); 
                         }

                        }
                    }); 
                } // end else 
          }); 

      
		
		$('button.saveBloodTestType').on('click',function(){
             var question = $('input#test_qtn').val(); 
             var answer_type = $('input:radio.answer_type:checked').val(); 
             var save_mode = $('input#test_save_mode').val(); // new/update
             var uid = $('input#test_uid').val(); // update id
			 var respt = $('input#resp1').val();
			 var respf = $('input#resp2').val();
			 var fillans = $('input#fillans').val();
             
               var l = Ladda.create( document.querySelector('.saveBloodTestType'));  	
				// save to db

             if(question==undefined || question=="" || answer_type=="" ){
                  showToastPosition('bottom-center','Enter the Blood Type or Select Answer Type','Blood Type or Select Answer Type must not be empty ','error'); 
             }
             else { 

             $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: {save_blood_test_qtns:"",question:question,answer_type:answer_type,save_mode:save_mode,uid:uid,
						respt:respt, respf:respf, fillans:fillans
                },
                beforeSend:function(){ /** l.start(); **/ },
                success:function(res){
                      output = $.parseJSON(res);
                        showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
                         l.stop();
                         // cond 
                         if(output['icon']=="success"){
                           // wipe_donation(); stepBack(); 
                         }

                        }
                    }); 
                } // end else 
          }); 
		
      $('button.saveBloodTestCateg').on('click',function(){
             var categ_name = $('input#btcateg').val(); 
             var save_mode = $('input#btcateg_save_mode').val(); // new/update
             var uid = $('input#btcateg_id').val(); // update id
             
               var l = Ladda.create( document.querySelector('.saveBloodTestCateg'));   
        // save to db

             if(categ_name==undefined || categ_name=="" ){
                  showToastPosition('bottom-center','Enter the Blood Test Category Name','Blood Test Category Name must not be empty','error'); 
             }
             else { 

             $.ajax({              
                url: 'formsubmit.php',
                type: 'POST',
                data: {save_blood_test_category:"",categ_name:categ_name,save_mode:save_mode,uid:uid
                },
                beforeSend:function(){ l.start(); },
                success:function(res){
                      output = $.parseJSON(res);
                        showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
                         l.stop();
                         // cond 
                         if(output['icon']=="success"){
                           // wipe_donation(); stepBack(); 
                         }

                        }
                    }); 
                } // end else 
          }); 
          
      

		// changing option for blood test
			$('input:radio.answer_type').on('ifChanged',function(){
				var opt = $('input:radio.answer_type:checked').val(); 
				console.log(opt);
				if(opt == "bitwise") {
					$('div.truefalse').show(); 
					$('div.fillings').hide(); 					
				}
				else {
					$('div.truefalse').hide(); 
					$('div.fillings').show(); 					
				}
			});
		
		
		
      }); 
		
		function set_update_bloodtype(data_text){
			
			info = data_text.split('|');
			$('input#save_mode').val('update');
			$('input#btype').val(info[0]);
			$('input#uid').val(info[1]);
			$('input#bloodprice').val(info[2]);
			
		}
		
		function set_update_blood_test_categ(data_text){
			
			info = data_text.split('|');
			 $('input#btcateg_save_mode').val('update');
			 $('input#btcateg').val(info[0]);
			 $('input#btcateg_id').val(info[1]);
				
		}
		
		
		function set_new_bloodtype(){
			
			info = data_text.split('|');
			$('input#save_mode').val('new');
			$('input#btype').val('');
			$('input#uid').val('');
			
		}
		
		function set_update_blood_test_type(data_text){
			
			info = data_text.split('|');
			$('input#test_save_mode').val('update');
			 $('input#test_qtn').val(info[0]);
			 $('input:radio[name="answer_type"][value="'+info[1]+'"]').iCheck('check');
			 $('input#test_uid').val(info[2]);
			 $('input#resp1').val(info[3]);  
			 $('input#resp2').val(info[4]);
			 $('input#fillans').val(info[5]);		 
			
		}
		
		function  view_all_blood_test_qtn(elem){
			
			var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
			
			  var req = $.ajax({ 
                    url:"formsubmit.php", data:{ view_all_blood_test_qtn:'this'}, method:"POST",beforeSend:function(){  elem.html(spin); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                  });   
			
		}
		
		function  view_all_blood_test_categ(elem){
			
			var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
			
			  var req = $.ajax({ 
                    url:"formsubmit.php", data:{ view_all_blood_test_categ:'this'}, method:"POST",beforeSend:function(){  elem.html(spin); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                  });   
			
		}
		
		 function loader(disp_type='show'){
              if(disp_type=='show') { $('p.loader').show(); $('span.loader').addClass('fa fa-spinner fa-spin fa-3x'); }
              if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('fa fa-spinner fa-spin fa-3x'); }
              // if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('mdi mdi-loading mdi-spin fa-3x'); }
            }
			
		function submit_categ_test_questions(elem){
			var vals = []; 
			var parent_categ = elem.find("input:hidden.parent-category").val();
			var l = Ladda.create( document.querySelector('button#btn'+parent_categ));  	
			
			 elem.find("input:checkbox:checked").each(function() {
				vals.push($(this).val());
			});
			
			if(vals.length == 0){
				showToastPosition('bottom-center','No Selection','You must select one or  more options','error');                        
			}
			else {
				var req = $.ajax({ 
                    url:"formsubmit.php", data:{ submit_categ_test_questions:'this',serial:parent_categ,ids:vals}, method:"POST",beforeSend:function(){ l.start() }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); l.stop(); });
                    req.done(function(res){ l.stop();
                    output = $.parseJSON(res);
					showToastPosition('bottom-center',output['title'],output['text'],output['icon']); 
                  });   
			}
			
			// alert("parent =  "+parent_categ +", children = "+vals);
		}
			
	</script>

</html>