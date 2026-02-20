<?php 
include "BackUp.php";
use \Djunehor\DB\BackUp;

/**
	 *
	 *
	 * @param string $host
	 * @param string $username
	 * @param string $password
	 * @param string $database
	 * @param string $charset
	 * @param string $lang
	 */
	$db = new BackUp('localhost', 'root', 'mayoskele', 'hrm_db');

	// To backup DB
	   $db->backup ();
	
	
	//To restore from backup
	// $db->restore ('hrmpl_@2020_05_14@05_20_15_AM_full_v1.sql'); 



?>