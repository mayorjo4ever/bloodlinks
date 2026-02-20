<?php 
   require "usercheck.php"; 
   
   $message = ""; 

   ## when changing background image 
   if(isset($_POST['changeBgImage'])){       
      $name = $_FILES["imagefile"]["name"];    
      $fieldname = $_POST['field'];
      $allowed_extension = ['jpg','jpeg','png','webp'];
      $file_array = explode(".", $name);
      $extension = end($file_array);      
      // validate 
      if(in_array($extension, $allowed_extension)){
            $new_file_name = "bg-".rand() . '.' . $extension;          
            if(copy($_FILES['imagefile']['tmp_name'], "../assets/images/".$new_file_name)){
                echo "<script> alert('File successfully uploaded')</script>";
                $dbm->updateTb('system_info',[$fieldname=>$new_file_name],['sn'=>1]);
            }
            else {
                echo "<script> alert('There is problem Uploading your file')</script>";
                }
            }            
            else
            {
             $error = 'You have uploaded wrong file: try uploading image';
            }
   }
    
    if(isset($_POST['updateBranchAddress'])):
         
        $branchAddress = $_POST['branchAddress']; 

        $dbm->updateTb('system_info',['branch_address'=>$branchAddress],['sn'=>1]);

           $message = "<div class='alert alert-success w-100'> Branch Address Successfully Updated </div>";
       

      endif; 
   
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   
      <!--  <link rel="stylesheet" href="../assets/vendors/dropzone/dropzone.css">   -->
      <link rel="stylesheet" href="../assets/vendors/dropzone/basic.css">
      <!-- <link href="../assets/vendors/zoom-magnify/dist/css/magnify.css" rel="stylesheet" type="text/css"> -->
      <link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
      <link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">
      <style>
         table tr, table thead td, table td, table thead th, table th {
         border:1px solid #fff; margin:5px; padding:5px; 
         line-height:5px; background:transparent; 
         }
         .border-lines tr th,.border-lines tr td, .border-lines tr { border:1px solid #000; }
      </style>
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_horizontal-navbar.html -->
         <?php require "partials/_horizontal-navbar.php"; ?>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <div class="main-panel container">
               <div class="content-wrapper">
                  <div class="row ">
                     <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card ">
                        <div class="card ">
                           <div class="card-body " style="height:auto">
                              <h4 class="card-title bold h3">   <?php  echo $this_page['title']; ?>  &nbsp; &nbsp;  <i class="mdi mdi-settings text-info fa-2x"></i>   </h4>
                              <input id="user_temp_code" type="hidden" value="<?php echo $_SESSION['admUser']; ?>" />
                              <ul class="nav nav-tabs tab-solid tab-solid-info tab-seperated bold " role="tablist">
                                 <li class="nav-item " >
                                    <a  class="nav-link active" id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false">  System Information  </a>
                                 </li> 
                                  <li class="nav-item ">  
                                    <a class="nav-link " id="tab12"  data-toggle="tab" href="#stock-tab12" role="tab" aria-controls="stock-tab12" aria-selected="false"> Authorized Signatory Image   </a>
                                 </li>
                                 <li class="nav-item ">  
                                    <a class="nav-link " id="tab2"  data-toggle="tab" href="#stock-tab2" role="tab" aria-controls="stock-tab2" aria-selected="false"> Printout Header Image   </a>
                                 </li>
                                 <li class="nav-item ">  
                                    <a class="nav-link " id="tab3"  data-toggle="tab" href="#stock-tab3" role="tab" aria-controls="stock-tab3" aria-selected="false"> Printout Footer Image   </a>
                                 </li>
                                 
                              </ul>
                              <div class="tab-content tab-content-solid ">
                                 <div class="tab-pane fade  show active" id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                                    <?php require "system_profile_form.php"; ?> 
                                 </div>
                                 <!-- ./ tab-pane -->
                                 <div class="tab-pane fade" id="stock-tab12" role="tabpanel" aria-labelledby="stock-tab12">
                                    <?php   require "system_authorized_signatory.php"; ?> 
                                 </div>
                                 <div class="tab-pane fade" id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 								
                                    <?php require "system_printout_imges_setup.php"; ?> 
                                 </div>
                                 <div class="tab-pane fade" id="stock-tab3" role="tabpanel" aria-labelledby="stock-tab3"> 								
                                    <?php   require "system_printout_footer_imges_setup.php"; ?> 
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
      <?php require "bill_modal.php"; ?>
      <?php require "admin_js_links.php"; ?>
      <script src="../assets/js/system_script.js"> </script>
      <script src="../assets/js/shared/iCheck.js"></script>
   </body>
   <!---->
   <script> 
      $(function(){
      	 
       initMce(); 

      });
      function initMce(){
                if(tinymce.execCommand('mceRemoveEditor', false, elem='')) {
                    tinymce.init({
                      selector: 'textarea.header-address', 
                      height:400, 
                      plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak table',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save directionality',
                        'emoticons template paste textpattern imagetools codesample toc help'
                      ],
                      toolbar1: 'undo redo | insert | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image print preview media | forecolor backcolor emoticons | codesample help',
                      
                    }); 
                }
        }

   </script> 
</html>
