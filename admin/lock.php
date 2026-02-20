<?php 
	
	if(!isset($_SESSION)) session_start();
	
	unset($_SESSION['admKey']); 
	@session_start();
	$_SESSION['logMsg'] = "<span class=' bold'> Account Locked Successfully </span>";
	$_SESSION['alert-type'] = "alert-success"; 
	header("Location:lockuser.php"); 
	
?>