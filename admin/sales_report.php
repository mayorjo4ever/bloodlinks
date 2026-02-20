
	<?php 
	   require "usercheck.php"; 
		# if(!isset($_SESSION['stock-tab'])) $_SESSION['stock-tab']='tab1';
		 /***************************/
		 
		 if(isset($_POST['sales_history_filterate_btn'])){
			 $dbm = new DbTool();
			 $_SESSION['datefrom'] = $dbm->clean($_POST['datefrom']); 
			 $_SESSION['dateto'] = $dbm->clean($_POST['dateto']); 			
		 } 
		 ###
		 if(!isset($_SESSION['datefrom']))  $_SESSION['datefrom'] = date('Y-m-d'); 
		 if(!isset($_SESSION['dateto']))  $_SESSION['dateto'] = date('Y-m-d'); 
		 
		 $display = false;  $search_dates = "single";
		 
		 ##### show text displayed 
		 if($_SESSION['datefrom'] == $_SESSION['dateto']) {  
				$display = true;  $display_text = "This Day &nbsp; <label class='badge badge-outline-primary font-16'>".
									$func->format_date($_SESSION['datefrom'])."</label>";  
				# $result_text = "  <label class='badge badge-outline-success font-16'> 2 records found &nbsp;</label>";  					
			}
		 else if($_SESSION['datefrom'] < $_SESSION['dateto']){ $search_dates = "double";
			$display = true;  $display_text = "From &nbsp; <label class='badge badge-outline-info font-16'>".
									$func->format_date($_SESSION['datefrom'])."</label>  &nbsp; To &nbsp; ".
									"<label class='badge badge-outline-primary font-16'>".
									$func->format_date($_SESSION['dateto'])."</label>";
				## $result_text = " <label class='badge badge-outline-success font-16'> 2 records found &nbsp;</label>";  	
		 }
		 else{
				$display = false;  $display_text = ""; 
				$result_text = "  <label class='badge badge-outline-danger font-16'> wrong calendar date chosen  (&nbsp;".$func->format_date($_SESSION['datefrom'])." &nbsp; To &nbsp;".$func->format_date($_SESSION['dateto']).") </label>";  					
		 }
	 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<?php require "admin_style_link.php";?>   
	<link href="../assets/vendors/zoomsl/assets/style.css" rel="stylesheet" type="text/css">
	 <!-- plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
    <!-- End plugin css for this page -->
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
				  <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					 <div class="card-body">  
						<div class="col-md-3" style="float:left;">  <h3 class="font-20 text-dark bold text-capitalize h3"> <br/>  <?php echo $this_page['title'];?>  </h3>				
						</div>
							<?php require "sales_history_filter.php"; ?> 
					  </div>
					</div>
              </div>
          </div><!-- ./ row -->
		  
		  <div class="row">
				  <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					  <div class="card-body">	<div class="row">					 
						  <div class="col-md-6 pull-left"> <?php if($display){ ## $search_dates = "double";									  
									$limit = 50; $start = 0;  $founds = 0; $order_by = "date_sold";  /**  $next = $start + $limit;  $n = $start; **/
									  switch($search_dates){ # 
										 case "single":{ $sql = $mysqli->query("SELECT DISTINCT recp_no FROM stock_item_sales WHERE date_c='".$_SESSION['datefrom']."' AND sales_finalized = 'yes' order by $order_by desc LIMIT $start, $limit ");  } break; 
										 case "double":{  $sql = $mysqli->query("SELECT DISTINCT recp_no FROM stock_item_sales WHERE date_c BETWEEN '".$_SESSION['datefrom']."' AND '".$_SESSION['dateto']."' AND sales_finalized='yes' order by $order_by desc LIMIT $start, $limit ");   } break;  								 }
								
								$total_found = $sql->num_rows; 
								echo  "<label class='badge badge-outline-success font-16'>  ".$total_found."  record(s) found &nbsp;</label>";  
							 }
							
							echo $result_text; 
							
							?> </div> 
						  <div class="col-md-6 pull-right"><?php echo $display_text; ?></div> 
						  </div>  <!-- ./ row -->
						 <div class="row">
						 <div class="col-md-12"> 
							<?php if($display){ ##
								if($total_found>0){ ## $data = $sql->fetch_array(MYSQLI_ASSOC); ## OTHERS -  MYSQLI_NUM - MYSQLI_BOTH  // $data = $result->fetch(PDO::FETCH_ASSOC);
									
									 while(
									$sales = $sql->fetch_array()){ 
										$recp_info = $dbm->getFields($dbm->select('customer_receipts',
												array('receipt_no'=>$sales['recp_no'],'status'=>'active')),array('name','total_fee','amount_paid','balance',
												'refund','payment_status','ref_id','date_c')); 
															
									?>
										<div class="card ">  
											<div class="card-body "> 
												<span class=" h4"> 	<?php echo $sales['recp_no']; ?> </span>   <small> ( <?php echo $recp_info['name'][0]; ?> ) &nbsp; on <?php echo $func->format_date($recp_info['date_c'][0]); ?> </small>
												 <?php 
													$data = $dbm->getFields($dbm->select('stock_item_sales',
														array('recp_no'=>$sales['recp_no'])),array('name','barcode','purchase_price','sn',
														'selling_price','qty','date_sold','sales_finalized','item_id','total_price'));
														
																
														if(!is_null($data)){    ?>
															<div class="table"> 
															<table class="table  table-bordered table-striped table-hover text-capitalize"> 
																<thead>
																	<tr class=" bold">
																		<td> SN. </td>
																		<td> Items </td>
																		<td> code </td>											
																		<td> Cost Price </td>
																		<td> Selling Price </td>
																		<td> Qty. Bought </td>
																		<td> Total Price </td> 
																		<td> Profit </td> 
																	</tr>
																</thead>
															<tbody>
																
															<?php $n=0;  foreach($data['name'] as $name){  
																	$item_info = $dbm->getFields($dbm->select('stock_items',
																	array('sn'=>$data['item_id'][$n],'status'=>'active')),array('name','barcode','purchase_price','sn',
																	'selling_price','qty','date_sold','rec_finalized','ref_id','total_price','remains'));
																	
																?>
																	<tr>
																	<td> <?php echo ($n+1); ?> </td>
																	<td> <?php echo $data['name'][$n]; ?> </td>
																	<td> <?php echo $data['barcode'][$n]; ?> . </td>						
																	<td> <?php echo "&#8358; ".number_format($data['purchase_price'][$n]); ?>  </td>
																	<td> <?php echo "&#8358; ".number_format($data['selling_price'][$n]); ?>  </td>
																	<td><?php echo $data['qty'][$n]; ?>  </td>
																	<td> <span class="final_sale font-16"> <?php echo "&#8358; ".number_format($data['selling_price'][$n]*$data['qty'][$n]); ?> </span> </td>																
																	<td> <span class="text-muted small"> <?php echo "&#8358; ".number_format(($data['selling_price'][$n]-$data['purchase_price'][$n])*$data['qty'][$n] ); ?> </span> </td>
																</tr>	
															<?php $n++; } ## end foreach?>
																<tr class="bg-ash bold">
																	<td colspan="3" > <span class=" font-16"> payment status : <?php echo  $recp_info['payment_status'][0]; ?>  </span> </td>  
																	<td colspan="2" > <span class=" font-16">  total  fee  : &#8358; <?php echo  number_format($recp_info['total_fee'][0]); ?> </span> </td>  
																	<td colspan="2" > <span class=" font-16">  amount paid  : &#8358; <?php echo  number_format($recp_info['amount_paid'][0]); ?> </span> </td>  
																	<td colspan="1" > <span class=" font-16">  Balance : &#8358; <?php echo  number_format($recp_info['balance'][0]); ?> </span> </td>  
																</tr>
															</tbody>
															</table>
															</div> <!-- ./ div - table -->
														<?php } # end not null ?>
											</div> <!-- ./ card-body -->
										</div> <!-- ./ card -->
										<p> &nbsp; </p>
									<?php   }
								}
							
							} # end display 
							?>
							
						  </div>  <!-- ./ col-md-12 -->
						  </div>  <!-- ./ row -->
							 
						
						 
					  </div> <!-- ./ card-body -->
					</div> <!-- ./ card -->
              </div> <!-- ./ col-md-12 -->
          </div><!-- ./ row -->
		   
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
	<?php require "admin_js_links.php"; ?>
	  
    <!-- End custom js for this page-->
	 <script src="../assets/js/shared/iCheck.js"></script>
	 <script src="../assets/js/stock_product_scripts.js"></script>
	 <script src="../assets/vendors/zoomsl/assets/zoomsl.js"> </script>
	
</body>
<script>
				$(function(){ 
				  /*******************************************/ 	
					  load_sales_history_dates($('#sales_dates'));
	 
			}); 
		 

</script>
</html>