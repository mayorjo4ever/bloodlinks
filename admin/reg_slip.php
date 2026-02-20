<?php 
if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE);
	
	require "../assets/php/dbTool.php"; 
	require "../assets/php/model.php";
	## require "../assets/php/timecoder.php";
	
	$dbm = new DbTool();  $func = new functions(); 
	$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));	 
			$title = base64_decode($_REQUEST['tit']);
			$myname = base64_decode($_REQUEST['n']);
			### $mymilno = base64_decode($_REQUEST['mln']);
			$myhsp = base64_decode($_REQUEST['hn']);
			$mytype = base64_decode($_REQUEST['tp']);
			$mydob = base64_decode($_REQUEST['db']);
			$mydate = base64_decode($_REQUEST['dtc']); 
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
</head>

<body>
  <div class="container-scroller">
    
	<?php ### require "head_nav.php"; ?>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php ## require "sidebar_nav.php"; ?>
		
      <!-- partial -->
      <div class="main-panel">
		<center>      
	  <div class="content-wrapper">
        
		 <div class="row">
		  
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">
					 <h4 class="card-title bold text-uppercase text-center text-black font-18">
				  <img class="img img-sm" src="<?php  echo $system_info['url2'][0].''.$system_info['logo'][0];?>" style="height:30px; width:30px;" />&nbsp; &nbsp;
					<?php  echo $system_info['name'][0]; ?> <br/> 
					<span class="small font-16"> <?php  echo $system_info['address'][0]; ?>    &nbsp; &nbsp;  <i class="fa fa-phone"> </i> <?php echo $system_info['phone'][0];?>	</span> <br/> 
					<span class="bold font-16"> Patient Registration Slip </span> 
				  </h4> 
				   
				
				<fieldset style="border:1px solid #bbb; margin:5px 20px; padding:5px 20px; ">
						<legend class="font-14 text-uppercase bold " style=" margin:10px 15px; padding:10px 15px; width:25%;">
						  &nbsp; bio-data information </legend>
						
						<table class="table table-striped text-capitalize "> 
							 <tr class=""> 
								<td  class="bold"> name </td>
								<td> <?php echo $myname; ?> &nbsp; &nbsp; &nbsp;    </td>	
								<td  class="bold">  category : </td>
								<td> <?php echo $mytype; ?> &nbsp; &nbsp; &nbsp;    </td>								 
							</tr>  
							 <tr > 
								<td  class="bold"> hospital number </td>
								<td> <?php echo $myhsp; ?> &nbsp; &nbsp; &nbsp;    </td>	
								<td  class="bold"> age </td>
								<td> <?php echo $mydob; ?> &nbsp; &nbsp; &nbsp;    </td>								 
								
							</tr>  
							  
							 <tr class=""> 
								<td  class="bold"> date registered </td>
								<td> <?php echo $mydate; ?> &nbsp; &nbsp; &nbsp;    </td>								 
							</tr>  
							 
						</table>
					</fieldset>  
					
                </div> <!-- ./ card-body -->
				 <div class="card-footer">
					<small style="float:right;" class="text-capitalize text-italics"> printed by : <?php echo $_SESSION['adminFullname'] ;?> 
					on <?php echo $func->format_date(date('Y-m-d')).' - '.date('h:i A',time()-3600); ; ?>
					</small>
				 </div> 
              </div> <!-- ./ card -->
            </div>
          </div> <!-- ./ row --> 
		 
        </div>
        </center>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
         
       <?php ## require "footer.php"; ?>
	   
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php require "admin_js_links.php"; ?>
  
</body>
<script>
	$(function(){
		
			window.print(); 
	});
</script>
</html>