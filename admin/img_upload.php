
<?php
	if(!isset($_SESSION)) session_start(); 
	error_reporting(E_ALL^E_NOTICE);
			 
		/* Getting file name */
		$filename = $_FILES['file']['name']; 
		$_SESSION['temp_img'] = $nfn = $_SESSION['admUser'].'_user_temp_img.jpg';

		/* Location */
		$location = "images/users/".$nfn;
		$uploadOk = true;
		$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

		/* Valid extensions */
		$valid_extensions = array("jpg","jpeg","png");

		/* Check file extension */
		if(!in_array(strtolower($imageFileType), $valid_extensions)) {
		   $uploadOk = false;
		}

		if($uploadOk == 0){
		   echo 0;
		}else{
		   /* Upload file */
		   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			 echo $location;
		   }else{
			 echo 0;
		   }
		}
	 
	 
	 
	/*
   if(move_uploaded_file( $_FILES["itemImage"]["tmp_name"], "../images/users/" .  $imagename)){

		echo "<h2>Successfully Uploaded Images</h2>";
   }
   else echo " error uploading $name ";
   
   
   */