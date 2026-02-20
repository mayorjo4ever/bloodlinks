<?php 

		error_reporting(E_ALL^E_NOTICE);
		require_once "../config/config.php";
		require_once "../assets/php/dbTool.php";
		require_once "../assets/php/DBController.php";
		require_once "../assets/php/pdo_dal.php";
		
		$dbm = new DbTool(); 
		$mydbm = new DBController(); 
		$mydal = new DAL();  
		 // print "<pre>"; 
		set_time_limit(0);  print "<table cellpadding='3' cellspacing='3' border='1'>";
		
		/** **/
		
		$all_bills = $mydbm->runBaseQuery("SELECT distinct sp.ticket_no, sp.date_c, tk.date_c as date2,tk.fullname FROM `customer_specimen` sp, customer_tickets tk where sp.date_upd<>'' and sp.status='active' and tk.status='active' and sp.ticket_no=tk.ticket_no LIMIT 0,250"); 
		 
		
		// $tsum = 0;
		 if(!empty($all_bills)){ $n = 0;
			foreach($all_bills as $k=>$v){
				 $mydbm->runBaseQuery("update customer_specimen set date_c = '".$all_bills[$k]['date2']."' where ticket_no = '".$all_bills[$k]['ticket_no']."'  and status ='active'");
				 ?><tr> 
					<td title='sn'> <?php echo $n+1; ?></td>
					<td title='ticket_no'> <?php echo $all_bills[$k]['ticket_no']; ?></td>
					<td title='date_c'> <?php var_dump($all_bills[$k]['date_c']); ?></td>
					<td title='date2'> <?php echo $all_bills[$k]['date2']; ?></td>
					<td title='comment'> <?php echo $all_bills[$k]['fullname']; ?></td>
					<td title='comment'> <?php // print_r($query); ?></td>
				</tr>
				
			<?php $n++; }
			}
		  
		
		 print "</table>";
		/**
		if(!empty($all_bills)) foreach($all_bills as $k=>$v){
			$tcost = get_ticket_sum_price($all_bills[$k]['ticket_no']);
			  echo "\tID : ".$all_bills[$k]['ticket_no']."\t price : ".$tcost." "; 
			 /// echo $dbm->updateTb('customer_tickets',array('total_cost'=>$tcost),array('ticket_no'=>$all_bills[$k]['ticket_no'])); 
			  $tsum += $tcost;
			echo "<br/>";
		}**/
		//echo "<h3>\t\t$tsum</h3> \n\n\n";
		 
		 
		
		
		/**
		$all_bills = $mydbm->runBaseQuery("select * from customer_specimen where date_c  BETWEEN '2022-02-01' and  '2022-02-28' group by ticket_no"); 
		// $tsum = 0;
		if(!empty($all_bills)) foreach($all_bills as $k=>$v){
			$tcost = get_ticket_sum_price($all_bills[$k]['ticket_no']);
			  echo "\tID : ".$all_bills[$k]['ticket_no']."\t price : ".$tcost." "; 
			 // echo $dbm->updateTb('customer_tickets',array('total_cost'=>$tcost),array('ticket_no'=>$all_bills[$k]['ticket_no'])); 
			  $tsum += $tcost;
			echo "<br/>";
		}
		// echo "<h3>\t\t$tsum</h3> \n\n\n";
		 
		 ***/
		 
		 
		 
		 
		
		/** deleted samples */
		###############################
		/**
		$del_specs = $mydbm->runBaseQuery("select * from customer_specimen where status='inactive'"); 
		if(!empty($del_specs)) foreach($del_specs as $k=>$v){
			$samp = array('custom_ticket_id'=>$del_specs[$k]['custom_ticket_id'],'bill_type_id'=>$del_specs[$k]['bill_type_id'],
			'bill_price'=>$del_specs[$k]['bill_price'],'ticket_no'=>$del_specs[$k]['ticket_no'],
			'specimen_sample'=>$del_specs[$k]['specimen_sample'],'date_del'=>$del_specs[$k]['date_del'],
			'del_by'=>$del_specs[$k]['del_by'],'time_del'=>$del_specs[$k]['time_del']);
			$dbm->insert('customer_specimen_trash',$samp);
			$dbm->deleteRow("customer_specimen",array('sn'=>$del_specs[$k]['sn']));
		}
		
		
		
		$all = 0;
		$sql = $mydbm->runBaseQuery("SELECT  bill_type_id as sn, COUNT(bill_type_id) as total from customer_specimen where date_c='2022-02-17' and status='active' GROUP by bill_type_id");
		foreach($sql as $u=>$v){
			$price = $mydbm->runBaseQuery("SELECT  price from bill_types  where sn ='". $sql[$u]['sn']."'"); 
			print "ID ".$sql[$u]['sn']." \t Tot ".$sql[$u]['total']."\t Price ".$price[0]['price']."\t Sum ".($sql[$u]['total']*$price[0]['price'])."\n";
			$all += ($sql[$u]['total']*$price[0]['price']);
		}
		print "<b>$all</b> \n\n";
		 
		
		  
		  
		$all = 0;
		$sql = $mydbm->runBaseQuery("SELECT distinct bill_type_id as sn from customer_specimen where date_c='2022-02-17' and status='active'");
		
		foreach($sql as $u=>$v){
			$qr = $mydbm->runBaseQuery("SELECT * from customer_specimen where date_c='2022-02-19' and bill_type_id='". $sql[$u]['sn']."'");
			if(!empty($qr)) { $qr = $dbm->getFields($qr,array('bill_type_id')); 
			$total = count($qr['bill_type_id']);
			$price = $mydbm->runBaseQuery("SELECT  price from bill_types  where sn ='". $sql[$u]['sn']."'"); 
			print "ID ".$sql[$u]['sn']." \t Tot ".$total."\t Price ".$price[0]['price']."\t Sum ".($total*$price[0]['price'])."\n";
			$all += ($total*$price[0]['price']);
			}
			else {
				print "<b style='color:red'> empty : "; print_r($qr); print " </b>\n";
			}
		}
		print "<b>$all</b> \n\n";
		  **/ 
		  
		  
		// $bill_type = $dbm->getFields($dbm->select('bill_types',array('sn'=>$serial,'status'=>'active')),array('sn','name','categ_id','dept_id','price','estm_time','estm_time_type'));
		print "</pre>";
		 
		function get_ticket_sum_price($ticket_no){
			$mydbm = new DBController(); $dbm = new DbTool(); 
			# $specs = $dbm->select('customer_specimen',array('ticket_no'=>$ticket_no,'status'=>'active','finalized'=>'yes'));
			$specs = $mydbm->runBaseQuery("SELECT * FROM customer_specimen WHERE status = 'active' AND ticket_no ='".$ticket_no."' AND finalized='yes'");
			if(!empty($specs)){
				$specs = $dbm->getFields($specs,array('bill_price'));
				$total = array_sum($specs['bill_price']);
			}
			return empty($specs)?0:$total;
		}
		?>
		