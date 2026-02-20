
<style>
	table.table-receipt tr,table.table-receipt td {
		padding:0px 1em; margin:0px 1em; font-size:12px; 
		
	}
</style>
<?php 
if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE);
	// require "usercheck.php";
	require "../assets/php/dbTool.php"; 
	require "../assets/php/model.php";
	require_once "barcode.php"; 
	
	## require "../assets/php/timecoder.php";
	
	$dbm = new DbTool();  $func = new functions(); 
	$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));	 
			 
			$recp_no = base64_decode($_REQUEST['rcn']);
			if(!$_REQUEST['rcn']) echo "<script> alert('invalid parameters'); window.location.href='index.php'; </script>";
			$recp_info = $dbm->getFields($dbm->select('stock_receipts',array('receipt_no'=>$recp_no,'status'=>'active')),array('refund','pay_type','sold_to','sold_by','total_fee','amount_paid','balance','payment_status','ref_no','time_c','date_c','year_c','c_by','month_c','week_c','day_c'));	 
			if(!is_dir("../assets/images/barcodes/")) mkdir("../assets/images/barcodes/");
			/**
			## gnenerate the receipt barcode  ***/			
			$quantity = 1;			
			$text = $recp_no; 
			$filepath = "../assets/images/barcodes/".$text.".png";	
			$size = "50";
			$orientation = "horizontal";			 
			$code_type = "code128";
			#$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code39");
			$print = false;
			$sizefactor = "1";   
			barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor ); 
			# 
			  
	?> 


<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "admin_style_link.php";?>
	<title>  payment Receipt for  </title>
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
        
		 <div class="row ">
		   <div class="col-lg-6 col-sm-12 col-md-12 "> <!--  stretch-card grid-margin -->
              <div class="card">               
                <div class="card-body font-10 text-center">
                  <h5 class="card-title text-uppercase bold text-black font-16">
				  <img class="img img-sm" src="<?php  echo $system_info['url2'][0].''.$system_info['logo'][0];?>" style="height:30px; width:30px;" />&nbsp; &nbsp;
					<?php  echo $system_info['name'][0]; ?> <br/> 
					<span class="small"> <?php  echo $system_info['address'][0]; ?>    &nbsp; &nbsp;  <i class="fa fa-phone"> </i> <?php echo $system_info['phone'][0];?>	</span> <br/> 
					<span> <?php echo  $recp_info['pay_type'][0]; ?> receipt : [&nbsp; <?php echo $recp_no; ?> ]  </span> 
				  </h5> 
				 
						<table class="text-capitalize table-receipt nogap " style="border:none; "> 
							 <tr class=""> 								
								<td  colspan="2"  class="text-center text-uppercase"> <b><?php echo "payee :  ". $recp_info['name'][0]; ?>  </b> </td>	
							</tr>	 
							 
							<tr>	
								<td  class=" text-center" colspan="2"> on &nbsp; <?php echo $func->format_date($recp_info['date_c'][0]).' - '.date('h:i A',$recp_info['time_c'][0]); ?> </td>
							</tr>
							<tr> <td class="" align="right"><b>total Fee:</b> </td> <td class="">  <?php echo "&#8358;  ".number_format($recp_info['total_fee'][0]); ?>  </td> </tr>
							<tr> <td class="" align="right"><b> Amount Paid: </b>  </td> <td class=""> <?php echo "&#8358;  ".number_format($recp_info['amount_paid'][0]); ?>  </td> </tr>
							<tr> <td class="" align="right"><b> Balance: </b>  </td> <td class=""> <?php echo "&#8358;  ".number_format($recp_info['balance'][0]); ?>  </td> </tr>
							<tr> <td class="" align="right"><b> change: </b> </td> <td class="">   <span class="text-black"><?php echo "&#8358; ".number_format($recp_info['refund'][0]); ?>  </td> </tr>
						    
						<tr class="bold"> <td colspan="5" class="text-center text-uppercase"> <b> items </b> </td> </tr>
					   
					 <?php 
						 	
							if($recp_info['pay_type'][0]=="sales") {
								$items = $dbm->getFields($dbm->select('stock_products_sales',array('recp_no'=>$recp_no,'sales_finalized'=>'yes')),array('name','barcode','purchase_price','sn',
			'selling_price','qty','date_sold','sales_finalized','item_id','total_price'));
								if(!is_null($items)){ $n = 0;   
					?>				 	
					<table class="table-receipt"> 
					<tr class="text-uppercase bold">
						<td align="left">SN </td>
							<td align="left" style="width:40%;"><b>name </b>  </td>								
							<td align="left"><b> qty &nbsp; </b>  </td>																		 
							<td align="left"><b> selling price</b>  </td>																		 
							<td align="left"><b> total price &nbsp; </b>  </td>																		 
						
					</tr>
					<?php	foreach ($items['name'] as $name) {
							 //  $drug_info = $dbm->resort($dbm->getFields($dbm->select('pharm_products',array('sn'=>$id)),array('sn','name','description','remains'))); 
						 ?>
					   <tr>  					
							<td align="left"><?php echo $n+1;  ?> </td>
							<td align="left" style="width:40%;"><?php echo $name;  ?>  </td>								
							<td align="left"> <?php echo $items['qty'][$n];?> &nbsp;  </td>																		 
							<td align="left"><?php echo "  &#8358; ".number_format($items['selling_price'][$n]); ?> &nbsp; </td>																		 
							<td align="left"><?php echo "&#8358; ".number_format($items['total_price'][$n]);?> &nbsp;   </td>																		 
						</tr>  
						 
						<?php $n++; } ## end foreach.. 
							?> <table> 
						<?php 	
								}				
							}
							
							else {
							 
							} # end not null 
							 
						 
					 ?>
					  
					 </table>
					 
					 
					<div class="">
						<img id="" class="" src="<?php echo "../assets/images/barcodes/$text.png"; ?>"  />
					 </div>
					
					
				 
					
					
                </div> <!-- ./ card-body -->
				 <div class="card-footer">
					<small style="float:right;" class="text-capitalize text-italics"> printed by : <?php echo $_SESSION['adminFullname'] ;?> 
					  <?php # echo $func->format_date(date('Y-m-d')).' - '.date('h:i A',time()-3600); ?>
					on <?php echo $func->format_date(date('Y-m-d')).' - '.date('h:i A',time()); ?>
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
		
			// window.print(); 
	});
</script>
</html>