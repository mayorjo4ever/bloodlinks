<?php
	error_reporting(E_ALL^E_NOTICE);
	
	$ImageTempname  = $_FILES['ImageFile']['tmp_name'];
	$ImageFilename  = $_FILES['ImageFile']['name'];
	$ImageType      = $_FILES['ImageFile']['type'];
	
   //  $name = $_POST['file'];
    //$ext = pathinfo($name, PATHINFO_EXTENSION);
    // $name = explode("_", $name);
      // $fileName = $_POST['file']['name'];
      # $fileName = $_FILES['file']['name']; 
	var_dump($_POST);
	 
	/*
   if(move_uploaded_file( $_FILES["itemImage"]["tmp_name"], "../images/users/" .  $imagename)){

		echo "<h2>Successfully Uploaded Images</h2>";
   }
   else echo " error uploading $name ";
   
   
   */