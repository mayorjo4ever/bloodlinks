<?php 
	 require "usercheck.php";  	 
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
</head>


<!-- <body class="sidebar-fixed"> -->
<body> 
 <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
		<?php require "partials/_horizontal-navbar.php"; ?>
    <!-- partial -->
    
	<div class="container-fluid page-body-wrapper">
      <div class="main-panel container">
        <div class="content-wrapper"> 
           <div class="row">
			<div class="col-lg-12 col-lg-offset grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
                   <h4 class="card-title bold text-capitalize font-22"> 
                        <i class="fa fa-money  text-primary"></i>  &nbsp; <?php  echo $this_page['title']; ?>                         
                        
                        &nbsp; <button type="btn" class="btn btn-inverse-dark  btn-rounded"  data-toggle="modal" data-target="#billTypeForm" onclick="load_bill_departments($('select#bill_dept_id2')),hide_update_buttons()" data-backdrop="static" data-keyboard="false"> <i class="fa fa-money"></i>  <span class=""> Create Bill Type </span> </button>
                        <!-- &nbsp; <button onclick="load_report_template('purchase')" type="btn" class="btn btn-info  btn-rounded" data-toggle="modal" data-target="#purchase_extra_report_modal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-building-o"></i>  <span class="">  </span> Set-up Blood Purchase Report </button> 
                        &nbsp; &nbsp; <button type="btn" class="btn btn-inverse-dark btn-rounded"  onclick="load_report_template()" data-toggle="modal" data-target="#donation_extra_report_modal" data-backdrop="static" data-keyboard="false"> <i class="fa fa-money"></i>  <span class=""> Set-up Blood Donation Report </span> </button>  -->
                    </h4>    

                    <div class="row">
                        <?php  require "prod_groups_b.php"; ?> 
                    </div><!-- ./ row -->


                </div> <!-- ./ card-body --> 
              </div> <!-- ./ card --> 
            </div> <!-- ./ col-lg-12 -->  
          </div> <!-- ./ row --> 
		   
		 
		    
        </div>  <!-- content-wrapper ends -->
       
        <!-- partial:partials/_footer.html -->
         
       <?php  require "footer.php"; ?>
	   
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
   <!-- container-scroller -->
  <?php require "admin_js_links.php"; ?>
  <script src="../assets/js/billing_scripts.js"> </script> 
  <script src="../assets/js/lab_schedule_scripts.js"> </script>
  <script src="../assets/js/tooltip.js"> </script>
   <script src="../assets/js/jquery-ui.js"> </script>
  <script src="../assets/vendors/tinymce/tinymce.min.js"> </script>
  <script src="../assets/vendors/tinymce/themes/modern/theme.js"> </script>
  
  
</body>

<?php require "bill_modal.php"; ?>

	<script>
            $(function(){ 

                    $('.datepicker').datepicker({});
                    $('.dataTable').dataTable(); 

                    // alert('dataTable'); 

                    $('input.only-numeric').bind("contextmenu",function(e){
                            alert('disbled');
                       return false;
                     });

                     // $('table tbody._sortable').sortable();

            }); 
            
                       
      // update_bill_status
        $(document).on('click','.update_bill_status',function(){  
        
            var status = $(this).children('i').attr('status');
            var bill_id = $(this).attr('bill_id');
             $.ajax({  
                    method:'post',   url:'ajax.php',
                    data:{update_bill_status:'ubs',status:status,bill_id:bill_id},
                   // beforeSend:function(){ console.log('status'+status+'bill_id'+bill_id)},
                    success:function(resp){ resp = $.parseJSON(resp); 
                            if(resp['status'] == "inactive") { // 
                                 $("#bill_id_"+bill_id).html("<i class='mdi mdi-bookmark-remove mdi-36px text-danger' status='inactive'></i>");
                                // alert('inactive');
                            }
                            else if(resp['status'] == "active") { 
                               // alert('active');
                                 $("#bill_id_"+bill_id).html("<i class='mdi mdi-bookmark-check mdi-36px text-success' status='active'></i>");
                            }
                            showToastPosition('bottom-right','Successful',"<span class='font-16 bold text-uppercase'>NOW "+resp['status']+"</span>",'success');
                    },error:function(resp){
                        console.log(resp);
                    }
             });
        });

        function load_report_template(temp_type='donation'){
            elem = $("#"+temp_type+"_report_template");
            spin = "<span class='fa fa-spinner fa-spin fa-3x'></span>"; 
            $.ajax({  
                    method:'post',   url:'ajax.php',
                    data:{load_report_template:'this',temp_type:temp_type},
                     beforeSend:function(){ elem.html(spin);  },
                     success:function(resp){  
                             elem.html(resp); initMce(); 
                     },error:function(resp){
                          elem.html(resp); 
                    }
                });  // end ajax
        }

        function submitTemplate(temp_type='donation'){
            var rawText = tinymce.activeEditor.getContent();
            // SUBMIT
            $.ajax({  
                    method:'post',   url:'ajax.php',
                    data:{submitTemplate:'report',temp_type:temp_type,rawText:rawText},
                    success:function(resp){ 
                        var output = $.parseJSON(resp); 
                         showToastPosition('bottom-center',output['title'],output['text'],output['icon']);                   
                    
                    },
                    
                    error:function(){}
                   }); 
        }

        function initMce(){
                if(tinymce.execCommand('mceRemoveEditor', false, elem)) {
                    tinymce.init({
                      selector: 'textarea.extra-report-template', 
                      height:400, 
                      plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak table',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save directionality',
                        'emoticons template paste textpattern imagetools codesample toc help'
                      ],
                      toolbar1: 'undo redo | insert | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image print preview media | forecolor backcolor emoticons | codesample help'
                      
                    }); 
                }
        }

	</script>
	
</html>