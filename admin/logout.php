<?php 
	
	
	if(!isset($_SESSION)) session_start(); 
	## error_reporting(E_ALL^E_NOTICE);
	require_once "../config/config.php";
	require "../assets/php/User.php"; 
	 
	$admin = new User("users");	
	
	echo $admin->logout($_SESSION['admUser'],'../index.php');
	  
	
?>