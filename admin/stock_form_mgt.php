<html>
<pre>
<?php 

		
	if(!isset($_SESSION)) session_start(); 
	 error_reporting(E_ALL^E_NOTICE);
	
	require "../assets/php/dbTool.php"; 
	 
	$dbm = new DbTool(); 
	

	$action = $_REQUEST['act']; # action 
	$data = base64_decode( $action);
	$infos = explode("|",$data); # update | serial_no 
	$_SESSION['stock_save_mode'] = $infos[0]; ## update
	$_SESSION['stock_upd_sn'] = $infos[1]; ## update
	
	$rec = $dbm->getFields($dbm->select('stock_items',array('sn'=>$_SESSION['stock_upd_sn'],'status'=>'active')),
					array('name','brand_id','categ_id','categ_type_id','barcode','description',
					'purchase_price','selling_price','qty','date_purchased'));
				##
		if(!is_null($rec)){
				$rec = $dbm->resort($rec);
				$_SESSION['itemname'] = $rec['name'];
				$_SESSION['codenumber'] = $rec['barcode'];
				$_SESSION['prod_type_id'] = $rec['brand_id']."|".$rec['categ_id']."|".$rec['categ_type_id'];			 
				$_SESSION['product_brand'] = $rec['brand_id'];						
				$_SESSION['item_desc'] =  $rec['description'];
				
				$_SESSION['item_qty'] = $rec['qty'];
				$_SESSION['purchase_date'] = $rec['date_purchased'];				
				$_SESSION['item_purchase_price'] =  $rec['purchase_price'];	
				$_SESSION['item_selling_price'] =  $rec['selling_price'];	
				
				header("Location:newstock.php"); 
		}
		else{
			echo "<script> alert('Invalid Parameters'); window.location.href='index.php'; </script> ";
		}
		
	# print_r($rec);
?>
<?php  ?>
</html>