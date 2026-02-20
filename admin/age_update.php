<?php 
	
	
	if(!isset($_SESSION)) session_start(); 
	  error_reporting(E_ALL^E_NOTICE); 
	
	require_once "../assets/php/dbTool.php"; 
	require_once "../assets/php/DBController.php";
	require_once "../assets/php/pdo_dal.php";
	//require_once "../assets/php/User.php";
	//require_once "../assets/php/timecoder.php"; 	
	 
	$dbm = new DbTool(); 
	$mydbm = new DBController(); 
	$mydal = new DAL(); 
	
	// $admin = new User("users");	
	$tickets = $dbm->getFields($dbm->select('customer_tickets',array('status'=>'active')),$mydal->TableFields('customer_tickets'));
?>
<table border="1" style="width:60%">
	<tr>
		<td> S/N  </td> 
		<td> ticket  </td> 
		<td> name  </td> 
		<td> age  </td> 
		<td> age type  </td> 
		<td> age text before  </td>  
		<td> combined  </td>  
	</tr>
	<?php $n = 0; if(!is_null($tickets)) foreach($tickets['ticket_no'] as $ticket_no){ ?>
	<tr>
		<td> <?php echo ($n+1); ?>  </td> 
		<td> <?php echo $ticket_no; ?>  </td> 
		<td> <?php echo $tickets['fullname'][$n]; ?>  </td> 
		<td> <?php echo $tickets['age'][$n]; ?>  </td> 
		<td> <?php echo $tickets['age_type'][$n]; ?> </td> 
		<td> <?php echo $tickets['age_text'][$n]." "; ?>  </td>  
		<td> <?php $new_text = $tickets['age'][$n]." ".$tickets['age_type'][$n]; $new_text.= ($tickets['age'][$n]>1)?"s":""; echo $new_text;  ?> 
		<?php # $dbm->updateTb('customer_tickets',array('age_text'=>$new_text),array('ticket_no'=>$ticket_no,'status'=>'active')); ?>
		</td>  
	</tr>
	<?php $n++; } ?>
</table>