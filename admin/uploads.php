<?php 

	@session_start();
		/*********************************************/
	if(!empty($_FILES)){ 
				$targetDir = "uploads/"; 
				if(!is_dir($targetDir)) mkdir($targetDir);
				$_SESSION['input_method'] = "import_picture";
				
				$fileName = $_SESSION['admUser']."_upload_".$_FILES['file']['name'];
				$targetFile = $targetDir.$fileName;
				
				set_time_limit(0);
				/**********************************************/
				if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
					$_SESSION['alert_message'] = " images has been loaded to dir ".$targetDir; 		
					//$nfile =  @str_replace(".jpg",".jpg",$targetFile);
					//$nfile =  @str_replace(".jpeg",".jpg",$targetFile);
					// @rename($targetFile,$nfile);
				}
				//////////////////////// 
			}
			 
	/****************************/		
		
	
	// 



?>