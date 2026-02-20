<?php 
   require "usercheck.php"; 
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   <!-- 
         <link rel="stylesheet" href="../assets/vendors/dropzone/dropzone.css">   -->
      <link rel="stylesheet" href="../assets/vendors/dropzone/basic.css">
      <!-- <link href="../assets/vendors/zoom-magnify/dist/css/magnify.css" rel="stylesheet" type="text/css"> -->
      <link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_horizontal-navbar.html -->
         <?php require "partials/_horizontal-navbar.php"; ?>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <div class="main-panel container">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body" style="height:auto">
                              <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?> <button type="button" data-toggle="modal" data-target="#new_page_modal" class="pull-right btn btn-success"> <b>Create New Page &nbsp; <i class="fa fa-plus-circle bold"></i></b> </button> </h4>
                              <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
                              <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold" role="tablist">
                                 <li class="nav-item " >
                                    <a  class="nav-link active" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false"> Page Groups  </a>
                                 </li>
                                 <!-- add event -- onclick="save_active_tab('tab4','stock')"  -->
                                 <li class="nav-item" >
                                    <a class="nav-link " id="tab2" data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false">  Pages  </a>
                                 </li>
                              </ul>
                              <div class="tab-content tab-content-solid">
                                 <div class="tab-pane fade show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                                    <div class="row">					
                                       <?php require "page_groups.php"; ?>
                                    </div>
                                    <!-- ./ row -->
                                 </div>
                                 <!-- ./ tab-pane -->
                                 <div class="tab-pane fade " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2">
                                    <div class="row">					
                                       <?php require "all_pages.php"; ?>
                                    </div>
                                    <!-- ./ row -->
                                 </div>
                              </div>
                              <!-- ./ tab-content -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <?php # require "workflow_stats.php"?>
                  </div>
                  <!-- row ends -->
               </div>
               <!-- content-wrapper ends -->
               <?php require "footer.php"; ?>
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <?php require "admin_js_links.php"; 
         require "administration_modal.php";
         ?>
      <script src="../assets/js/page_scripts.js"> </script>
      <script src="../assets/js/shared/iCheck.js"></script>
   </body>
   <!---->
   <script> 
      $(function(){
      	hide_update_buttons(); 
      	load_page_groups($('#pg_group'));
         $(".dataTable").dataTable();
      });
      
      
        function load_page_groups(elem,cur_id=""){	//	alert(res);	 		
                    var req = $.ajax({ url:"formsubmit.php", data:{ load_page_groups:'all',cur_id:cur_id}, method:"POST", beforeSend: function(){  elem.html("<option value=''>Loading...</option>"); } }); 							
                       req.fail(function(e){ console.log(e.status+" Failed"); });
                            req.done(function(res){  
                                elem.html(res);   
                                elem.trigger('change');
                }); 	

               }
      
   </script> 
</html>
