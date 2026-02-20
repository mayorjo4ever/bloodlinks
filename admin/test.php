
<p>&nbsp; </p><p>&nbsp; </p><p>&nbsp; </p><p>&nbsp; </p>
<center> <h2>  pharmacy receipts issues </h2>
<style>
	body{
		font-size:22px; 
	}
</style>
<?php 
	error_reporting(E_ALL^E_NOTICE);
	
	require "../assets/php/dbTool.php"; 
	set_time_limit(0);
	########################
	
		// functions
		function  getPharmRecpId(){
			
				$dbm =  new DbTool();  # database mgr.
				
				$allTransc = $dbm->getFields($dbm->select('patient_receipts',array('pay_type'=>'pharmacy')),array('sn','receipt_no'));
				
				$tot = count($allTransc['receipt_no']);
				
				$lastNo = $tot-1;
				
				$lastId = $allTransc['receipt_no'][$lastNo];  // $con->getFields($lastApp,array('applc_id'));
				
				// $ftcId  = $lastId['applc_id'][$lastNo];  // last fetched applc Id
				
				$newNo = substr($lastId,4,strlen($lastId)) + 1;
				
				$newpad = str_pad($newNo,4,'0',STR_PAD_LEFT);
				 
				// $newTranscId = "TRNS".str_pad($newNo,4,'0',STR_PAD_LEFT);
				
				 return  trim("PHMR$newpad"); 
			}
			   
		
		# str_pad ( string $input , int $pad_length [, string $pad_string = " " [, int $pad_type = STR_PAD_RIGHT ]] ) : string
		
		
	
	echo " ".getPharmRecpId()." <br/> <br/> "; 
	# echo " ".getLabRecpId()." <br/> <br/> "; 
	# echo " ".getGenRecpId()." <br/> <br/> "; 
	
	$dbm =  new DbTool();
	$allTransc = $dbm->getFields($dbm->select('patient_receipts',array('pay_type'=>'pharmacy')),array('sn','receipt_no'));
				
	echo "  LEN PHMR1830 ".strlen('PHMR1830')." <br/> <br/> ";
	
	 # exit("transaction has been completed");
	 
?>
  	
		<p class="box-title small text-uppercase bold" style="font-size:14px; ">
	 
			<?php 
			  $trans = mysql_query("select * from patient_receipts where sn>1119 and pay_type='pharmacy'") or die(mysql_error());   
			   if(mysql_num_rows($trans)>0){ $n = 0; 
				   while($res = mysql_fetch_assoc($trans)){
					   $subs = (int) substr($res['receipt_no'],4);
					   $sub1 = substr($res['receipt_no'],0,4);
					  
					   $sub2 = substr($res['receipt_no'],4);
					  # $nno = " TRNS".(1000+$subs); 
					   $nno =  trim("PHMR".(1000+$subs)); 
					   $len = strlen($res['receipt_no']);
					   
					   $paydate = $res['date_c']; // 
					   
					   ## get papers $newTranscId = "PHMR".str_pad($newNo,4,'0',STR_PAD_LEFT);
					   // $coses = $dbm->getFields($dbm->select("transcripts",array('stud_id'=>$res['stud_id'],'regno'=>$res['regno'],'ref_id'=>$res['ref_id'])),array('sn','regno'));
					   // $counts = count($coses['regno']);
					   # echo $res['sn'].": sub = ".$subs.", new sub =   $nno,  stud_id = ". $res['stud_id']."&nbsp;, regno= ". $res['regno']."&nbsp; ". $res['ref_id']."&nbsp; courses : &nbsp;".$counts ."  <br/>" ; 
					  # echo $res['sn'].": sub = ".$subs.", new sub =   $nno    <br/>" ; 
					   echo  " receipt : ".$res['receipt_no'].", &nbsp;  len : $len,  &nbsp;  sub1 =   $sub1,  &nbsp;  sub2 : $sub2, &nbsp; exact : &nbsp; $subs  <br/>" ; 						 
						# $dbm->updateTb("patient_receipts",array('receipt_no'=>$nno),array('sn'=>$res['sn']));   
						# $dbm->updateTb("pharm_products_sales",array('receipt_no'=>$nno),array('receipt_no'=>$res['receipt_no'],'date_sold'=>$paydate));   
					   ?> 
				   <?php $n++; } ##  end while 
				   } ## end if. 
			    
			  ?>
			  </p>			  
	</center>