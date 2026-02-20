<?php 
	
	if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE); 
	
	$name = mysql_real_escape_string($_GET['username']);
	$_SESSION['temp_img'] = $realname = $name."_".time().".jpg";
	if(!is_dir('images/users/')) mkdir('images/users/');
	move_uploaded_file($_FILES['webcam']['tmp_name'], 'images/users/'.$_SESSION['temp_img']);
	
	echo "captured";

?>