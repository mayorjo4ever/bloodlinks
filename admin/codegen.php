<?php 
	
	if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE);
	
	include_once "barcode.php";	
	# include_once "src/BarcodeGeneratorHTML.php";	
	 // This function call can be copied into your project and can be made from anywhere in your code
	if(!is_dir("barcodes/")) mkdir("barcodes/");
 	# $quantity = (isset($_GET["quantity"])?$_GET["quantity"]:1);
	$quantity = 1; 
	for($q = 1; $q<=$quantity; $q++) {
	$text = (isset($_GET["text"])?$_GET["text"]:"shoonexit");
	# $text = "SE".$q.$text; 
	$filepath = (isset($_GET["filepath"])?$_GET["filepath"]:"barcodes/".$text.".png");	
	$size = (isset($_GET["size"])?$_GET["size"]:"50");
	$orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
	 
	$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code128");
	#$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code39");
	$print = (isset($_GET["print"])&&$_GET["print"]=='true'?true:true);
	$sizefactor = (isset($_GET["sizefactor"])?$_GET["sizefactor"]:"1");  
	barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor ); 
	# 
	}
	
?>

	 