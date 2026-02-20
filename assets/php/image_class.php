<?php


	class zip_images {
				
			private $zip, $path, $zip_dir, $zip_name,$img_temp_dir;
			 
			private $img_source, $img_name, $original_sources; 
			##############################################
			public function __construct(array $image_names, array $image_sources, $output_filename, $output_directory,$img_temp_dir = "PASSPORTS/")
			   {
					$this->img_name = $image_names;									## array
					$this->img_source = $image_sources;								## array	   
					 
					$this->zip = new ZipArchive();									## php function 
					$this->path = $output_directory . $output_filename . '.zip';	## final filename path	
					$this->zip_dir = $output_directory; 							## where to write d zip
					$this->zip_name = $output_filename; 							## filenow to download
					$this->$img_temp_dir = $img_temp_dir; 							## filenow to download
					$this->flush_dir();												## Remove any previous files
					
					// START WRITING ZIP FILE
					$this->zip->open( $this->path, ZipArchive::CREATE);

					/** AUTO-ADD THE FILES TO ZIP **/								## empty any previous file					
					$this->auto_create_zip(); 
					 
				}
			 ############################################
			 
			 private function flush_dir(){
				 // clear any img dir
				 if(is_dir($this->img_temp_dir)){
						$files = glob($this->img_temp_dir."*"); 
						// delete all files 
						foreach($files as $file){
							if(is_file($file)) @unlink($file); 									  
							}							 
					}
					// now create img_dir for writing zip if not exists 
					if(!is_dir($this->img_temp_dir)) mkdir($this->img_temp_dir);				
					
					## CHECK IF THE ZIP FILENAME ALSO EXISTS
					if(is_file($this->path)) @unlink($this->path);  	// remove previous zip file to AVOID overwrite
					## ENSURE THE ZIP FILE PATH EXISTS 
					if(!is_dir($this->zip_dir)) mkdir($this->zip_dir);
					
					
				 }
				 
				########################################### 
				private function auto_create_zip(){
					
					/*** PREVENT FILE FROM WRITING BUG ERROR - WHEN FILE SIZE EXITS DEFAULT LIMIT ***/
					/***/	ini_set('memory_limit',-1);			/*******************************/
					/***	PREVENT TIME INTERUPT 				***/
					/***/   set_time_limit(0);					/**/
					/***************************************************************************/
					
					// loop through each images and sources 
					$sn = 0;  
					foreach($this->img_source as $old_path){
						$new_name = $old_path.$this->img_name[$sn].".jpg";	
						if(file_exists($new_name)) 
						{
							// copy from old path to new path : PASSPORTS/filenames.jpg
							if(@copy($new_name,$this->img_temp_dir.$this->img_name[$sn].".jpg"));  
							
							// NOW ADD ALL THE NEW PICTURE PATHS TO THE ZIP FILE
							$this->zip->addFile($this->img_temp_dir.$this->img_name[$sn].".jpg"); 
						
						}
						
						$sn++;
					} 
					
					$this->zip->close(); ### the zip file is now created / SAVED
					
				}
		
		##	Auto Download the file

		##	To start the zip file auto-downloading we get the zip path from the zip class, set the page headers and 		then use
		##	'readfile' to output the contents of the zip.
	
		public function download(){
			
			$zip_path = $this->path; 
			header( "Pragma: public" );
			header( "Expires: 0" );
			header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
			header( "Cache-Control: public" );
			header( "Content-Description: File Transfer" );
			header( "Content-type: application/zip" );
			header( "Content-Disposition: attachment; filename=\"" . $this->zip_name . ".zip\"" );
			header( "Content-Transfer-Encoding: binary" );
			header( "Content-Length: " . filesize($zip_path ));
			ob_clean();
			flush();			
			readfile($zip_path);
			exit; 

		}
		######################################################
		
		
		/* creates a compressed zip file */
		private function create_zip($files = array(),$destination = '',$overwrite = false) {
			//if the zip file already exists and overwrite is false, return false
			if(file_exists($destination) && !$overwrite) { return false; }
			//vars
			$valid_files = array();
			//if files were passed in...
			if(is_array($files)) {
				//cycle through each file
				foreach($files as $file) {
					//make sure the file exists
					if(file_exists($file)) {
						$valid_files[] = $file;
					}
				}
			}
			//if we have good files...
			if(count($valid_files)) {
				//create the archive
				$zip = new ZipArchive();
				if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
					return false;
				}
				//add the files
				foreach($valid_files as $file) {
					$zip->addFile($file,$file);
				}
				//debug
				//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
						
				//close the zip -- done!
				$zip->close();
				
				//check to make sure the file exists
				return file_exists($destination);
					}
					else
					{
						return false;
					}
				}
				
					} 	##### END CLASS ZIP 
			## Sample Usage
			
			$files_to_zip = array(
				'preload-images/1.jpg',
				'preload-images/2.jpg',
				'preload-images/5.jpg',
				'kwicks/ringo.gif',
				'rod.jpg',
				'reddit.gif'
			);	
			
			//if true, good; if false, zip creation failed
			// $result = create_zip($files_to_zip,'my-archive.zip');
		   
	//	}
	?>