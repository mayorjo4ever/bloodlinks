<?php 	
		@session_start();
		#@session_destroy();
		
		require_once "dbTool.php";
		 
		class pagemanager{
			
			public function getActivist($url){
			 
				$cur_url = explode("/",$_SERVER['PHP_SELF'])[2]; 
				
				$act_pg = "active bold font-18";
				
				return ($cur_url == $url) ? $act_pg : "";
			}
			
			//
			
			public function page_info($url)
				{
					$dbm = new DbTool();
					$info = $dbm->getFields($dbm->select("pages",array('url'=>$url)),array('sn','title','icon','groupid','autoload')); 	
					if(!is_null($info))  return $dbm->resort($info);
				}
			public function page_group_info($groupid)
				{
					$dbm = new DbTool();
					$info = $dbm->getFields($dbm->select("pagegroups",array('groupid'=>$groupid)),array('sn','groupname','icon','groupid')); 	
					
					if(!is_null($info)) return $dbm->resort($info);
				}
				
			public function get_cur_address(){
				
				return $cur_url = explode("/",$_SERVER['PHP_SELF'])[2]; 
			}
			
			
	}
	################################################
	## current page infomation
	$pmg = new pagemanager();  
	############################################
	$address = $_SERVER['PHP_SELF']; 											
	$address_info = explode("/",$address);  
	// print_r($filenames); 
	$tot = count($address_info); 
	$_SESSION['cur_file']  = $cur_file = $address_info[$tot-1];
	$this_page = $pmg->page_info($cur_file);  
	
	$cur_groupid = $this_page['groupid'];
	$permited = false; 	
	if(@in_array($cur_file,$_SESSION['mypages']['url'])) $permited = true;  
	
	################################################
	 if(!$permited){  echo "<script> alert('access denied '); window.location.href='index.php' </script>";
         }
	################################################
		
	
?>