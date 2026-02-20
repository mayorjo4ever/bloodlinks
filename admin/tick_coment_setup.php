<?php    require "usercheck.php";
    
    ## configuration 
     $table = "admin_report_setup"; $user_id = $_SESSION['admUser'];
     $my_specializations = $dbm->select($table,['user_id'=>$user_id]);
    
     ## actions 
     if(isset($_POST['save_selection'])){
       if(!isset( $_POST['categs'])){
            echo "<script> alert('No Selection, Please Select One or more areas of specialization'); </script>";
        }
       else{  $table = "admin_report_setup";
            $categs = $_POST['categs'];/* bill category id  */ $categs= implode(',', $categs); 
            $data = ['user_id'=>$user_id,'bill_categs'=>$categs];  $updData = ['bill_categs'=>$categs];
            ## check if exists or not
           
            if(empty($my_specializations)){
                $dbm->insert($table,$data);
                echo  "<script> alert('Specializations Saved Successfully');   </script>";
            }
            else {
                $dbm->updateTb($table,$updData,['user_id'=>$user_id]); 
                echo  "<script> alert('Specializations Updated Successfully') </script>";
            }
       }
    }
    
    $my_specializations = $dbm->select($table,['user_id'=>$user_id]);
    
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
				
                <div class="card-header" >  
				<div class="col-md-6 float-left"><span class="h4 text-capitalize">  <i class="<?php echo $this_page['icon']; ?> "> </i> &nbsp; <?php echo $this_page['title']; ?>  </span> &nbsp;  </div>
				</div>  <!--  ./ card-header -->  
				
				<div class="card-body ">                    
				  <div class="row">
                                      <div class="col-md-9 h4 ml-4">  Select Categories of Test That You want to be commenting upon  <hr/>  </div>
                                           
                                            <?php  
                                            $dept_id = 1;  ## laboratory 
                                            $bill_categs = $dbm->getFields($dbm->select('bill_category',array('dept_id'=>$dept_id)),array('name','dept_id','sn','status'));
                                            $areas = [];
                                            if(!empty($my_specializations)) $areas = explode (',', $my_specializations[0]['bill_categs']); 
                                            
                                            if(!empty($bill_categs)){ $i=0; 
                                                foreach($bill_categs['name'] as $key=>$bill_categ){ ?>
                                                <div class="col-md-4 mt-3">  
                                                <div class="form-group">
                                                    <div class="icheck-square">                                                        
                                                        <label  class=""> <input type="checkbox" name="categs[]" value="<?php echo $bill_categs['sn'][$i];?>" <?php if(in_array($bill_categs['sn'][$i], $areas)) echo 'checked';?> /> &nbsp; <?php echo $bill_categ; ?></label>
                                                      </div> 
                                                    </div>
                                                </div>
                                                <?php  $i++;} # end foreach 
                                            }
                                            ?>
                                      <div class="col-md-12">
                                          <button name="save_selection" type="submit" class="btn btn-primary btn-rounded w-100"> Save </button>
                                      </div>
					
				  </div>
                </div>  <!--  ./ card-body -->  
              </div>   <!--  ./ card -->  
            </div>
			  
          </div> <!-- ./ row --> 
		 </form>
            
		   
		   
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
  
  <script>
	
  </script>
  <script src="../assets/js/lab_rep_script.js"></script>
  
</body>

</html>