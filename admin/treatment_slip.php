

<?php 
if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE);
	
	require "../assets/php/dbTool.php"; 
	require "../assets/php/model.php";
	## require "../assets/php/timecoder.php";
	
	$dbm = new DbTool();  $func = new functions(); 
	$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));	 
			$myname = base64_decode($_REQUEST['n']);
			## $mymilno = base64_decode($_REQUEST['mln']);
			$myhsp = base64_decode($_REQUEST['hn']);
			$mytype = base64_decode($_REQUEST['tp']);
			$mytype2 = base64_decode($_REQUEST['tp2']);
			$mydob = base64_decode($_REQUEST['db']);
			$mydate = base64_decode($_REQUEST['dtc']);
			# $data = array('ref_no'=>$ref_no,'type'=>$type ,'fullname'=>$fullname,
			# 'weight'=>$weight ,'bp'=>$bp ,'height'=>$height ,'date_c'=>date('Y-m-d'),'time_c'=>time()); 
		## ###
		
			$myVitalSci = $dbm->getFields($dbm->select('vital_science',
				array('ref_no'=>$myhsp,'type'=>$mytype2)),
				array('height','bp','weight','sn'));	 
			$totVs = count($myVitalSci['sn']); 
			$lastVS = ($totVs-1);    //  var_dump($myVitalSci);
			
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
	
	
	<style>
	
		table tr td ,table tr  {
			border:1px solid #fff; line-height:15px; margin:3px 0px;  padding:3px 0px; 
		}
	</style>
</head>

<body>
   
      <!-- partial -->
      <div class="main-panel">
		  <div class="row">
		  
			<div class="col-lg-12 col-sm-12 col-xs-12 ">
              <div class="card">               
                <div class="card-body">
                  <h4 class="card-title bold text-capitalize text-center text-black font-18">
				  <img class="img img-sm" src="<?php echo $system_info['url2'][0].''.$system_info['logo'][0];?>" style="height:40px; width:40px;" />&nbsp; &nbsp;
					<?php  echo $system_info['name'][0]; ?> <br/> 
					<span class="small font-16"> <?php  echo $system_info['address'][0]; ?>  </span> 	<br/> 
					<span class="bold font-16"> Patient treatment Slip  @  <?php echo $func->format_date(date('Y-m-d'),'date').' - '.date('h:i A',time()); ?>  </span>  
				  </h4> 
				
				<label class="font-14 text-uppercase bold " style=" margin:0px 0px; padding:0px 0px; width:25%;">
						  &nbsp; basic information </label> 
				<div style="border:2px solid #000; margin:0px 0px; padding:0px 0px; ">						
						<table class="table text-capitalize nogap " style="border:20px solid #fff; "> 
							 <tr class=""> 
								<td  class="bold"> name :</td>
								<td> <?php echo $myname; ?>    </td>	
								<td  class="bold">  category : </td>
								<td> <?php echo $mytype; ?>    </td>	
								<td  class="bold"> age </td>
								<td> <?php echo $mydob; ?>    </td>								 
							</tr>  
							<tr>  
								
								<td  class="bold"> hosp. no </td>
								<td> <?php echo $myhsp; ?>     </td>	
								<th> Vital Science:  </th>
								<th colspan="3">  
									weight&nbsp;&nbsp;:&nbsp; <span class="badge badge-success font-18" > <?php echo $myVitalSci['weight'][$lastVS];?> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
									BP&nbsp;:&nbsp;&nbsp; <span class="badge badge-info font-18"> <?php echo $myVitalSci['bp'][$lastVS];?> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									height&nbsp;&nbsp;:&nbsp;&nbsp; <span class="badge badge-primary font-18"> <?php echo $myVitalSci['height'][$lastVS];?> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</th> 
								 
							</tr>   
						</table>
						 
					</div>  
					
					<label class="font-14 text-uppercase bold " style=" margin:0px 0px; padding:0px 0px; width:20%;">
						  &nbsp; complaints </label> 
					<div  style="margin:0px 0px; padding:0px 0px; ">
						
					 <textarea rows="7" cols="50" class="form-control" style="height:300px; border:2px solid #000;  ">
					 
					 </textarea>
					</div> 
					
					<label class="font-14 text-uppercase bold " style=" margin:0px 0px; padding:0px 0px; width:20%;">
						  &nbsp; diagnosis </label> 
					<div  style="margin:0px 0px; padding:0px 0px; ">
						
					 <textarea rows="7" cols="50" class="form-control" style="height:300px; border:2px solid #000;  ">
					 
					 </textarea>
					</div> 
					
					 
					<label class="font-14 text-uppercase bold " style=" margin:0px 0px; padding:0px 0px; width:20%;">
						  &nbsp; prescriptions </label> 
					<div  style="margin:0px 0px; padding:0px 0px;">
						
					 <textarea rows="7" cols="50" class="form-control" style="height:300px; border:2px solid #000;  ">
					 
					 </textarea>
					</div> 
					<label class="font-14 text-uppercase bold " style=" margin:0px 0px; padding:0px 0px; width:20%;">
						  &nbsp; Costing Summary/Billing: </label> 
					<div  style="margin:0px 0px; padding:0px 0px;">
						
					 <textarea rows="7" cols="50" class="form-control" style="height:100px; border:2px solid #000;  ">
					 
					 </textarea>
					</div> 
					
					 
					 
					
					
                </div> <!-- ./ card-body -->
				<div class="card-footer">
					<small style="float:right;" class="text-capitalize text-italics"> printed by : <?php echo $_SESSION['adminFullname'] ;?> 
					on <?php echo $func->format_date(date('Y-m-d')).' - '.date('h:i A',time()-3600); ?>
					</small>
				  
              </div> <!-- ./ card -->
            </div>
          </div> <!-- ./ row --> 
		 
        </div>
         <!-- partial:partials/_footer.html -->
         
       <?php ## require "footer.php"; ?>
	   
      <?php require "admin_js_links.php"; ?>
  
</body>
<script>
	$(function(){
		
			// window.print(); 
	});
</script>
</html>