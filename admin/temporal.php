	
	
	<?php 
	
		function showPatients($start,$limit,$criteria = "",$reqType="default"){ 
			$func = new functions();
			$conn = new mysqli('localhost', 'root', 'mayoskele', 'hpms'); 			 
			$next = $start + $limit; 
			$n = $start; 
			######################
			
			if($reqType == "default") { 
				$sql = $conn->query("SELECT * FROM patients order by date_c ASC LIMIT $start, $limit "); 
				$found = $conn->query("SELECT * FROM patients order by date_c ASC "); 
			}
			else if($reqType == "search"){
				$sql = $conn->query("SELECT * FROM patients WHERE fullname REGEXP '".$criteria."' or dob REGEXP '".$criteria."' or state REGEXP '".$criteria."'  or lga REGEXP '".$criteria."' or phone REGEXP '".$criteria."' or gender REGEXP '".$criteria."'  or hosp_no REGEXP '".$criteria."' or address REGEXP '".$criteria."' or nokname REGEXP '".$criteria."'  or nokphone REGEXP '".$criteria."'  order by date_c desc LIMIT $start, $limit ");
				$found = $conn->query("SELECT * FROM patients WHERE fullname REGEXP '".$criteria."' or dob REGEXP '".$criteria."' or state REGEXP '".$criteria."'  or lga REGEXP '".$criteria."' or phone REGEXP '".$criteria."' or gender REGEXP '".$criteria."'  or hosp_no REGEXP '".$criteria."' or address REGEXP '".$criteria."' or nokname REGEXP '".$criteria."'  or nokphone REGEXP '".$criteria."'  order by date_c desc ");
			}
			
			if ($sql->num_rows > 0) {
				$response = "";

				while($data = $sql->fetch_array()) { $n++;
					$pic_source = (file_exists($data['psp_dir'].''.$data['psp']))?$data['psp_dir']."".$data['psp']:"images/users/default-user.png";
					$editor = "biodata_edit_interface.php?md=".base64_encode('update')."&tp=".base64_encode('host')."&sn=".base64_encode($data['sn']);
					$new_med_record = "medical_task_reports.php?n=".base64_encode($data['fullname'])."&mctg=".base64_encode($data['category'])."&tp=".base64_encode('host')."&hn=".base64_encode($data['hosp_no'])."&db=".base64_encode($data['dob'])."&dtc=".base64_encode($data['date_c'])."&mode=".base64_encode('new');
					$mysibs = $conn->query("SELECT * FROM patients_siblings WHERE  ref_no='".$data['hosp_no']."'");
					$totsib = $mysibs->num_rows;
					$hsp_report = $conn->query("SELECT * FROM tickets_converse WHERE ref_no='".$data['hosp_no']."' and type='".$data['type']."'");
					$hsp_report_count = $hsp_report->num_rows;
					$all_siblings = ""; 
					if($totsib > 0){ 
						while($data2 = $mysibs->fetch_array()){
							$hsp_report2 = $conn->query("SELECT * FROM tickets_converse WHERE ref_no='".$data2['hosp_no']."' and type='".$data2['type']."'");
							$hsp_report_count2 = $hsp_report2->num_rows;
							$all_siblings.='
							 <p><span class="text-black font-14 bold">'.'<span class="badge badge-success font-14">'.$data2['type'].'</span>:  &nbsp; <span class="fa fa-edit text-warning"></span> &nbsp;  '.$data2['fullname'].' </span>  &nbsp;  <span class="fa fa-male text-success"></span> &nbsp;'.$data2['gender'].'&nbsp;&nbsp;    <span class="fa fa-calendar text-info"></span> &nbsp;'.$data2['dob'].'
							€'.'&nbsp;&nbsp;<span class="fa fa-phone text-info"></span> &nbsp;'.$data2['phone'].'&nbsp;&nbsp; <a href="medical_task_reports.php?n='.base64_encode($data2['fullname']).'&mctg='.base64_encode($data['category']).'&tp='. base64_encode($data2['type']).'&hn='.base64_encode($data2['ref_no']).'&db='.base64_encode($data2['dob']).'&dtc='.base64_encode($data2['date_c']).'";" target="_blank"><i class="fa fa-comments text-success"></i> medical reports &nbsp;  <span class="badge badge-danger font-15"> '.$hsp_report_count2 .' </span> </a></p>';
						}
					}
					 
					$response .= '
					<span class="badge badge-info badge-block font-16"> '. $n.' </span>
					 <div class="row"> 
						<div class="col-md-12">						
							<div class="card">							
								<div class="card-body">
									<div class="col-md-2 col-sm-4" style="float:left;">
										<img class="img rounded-circle " src='.$pic_source.' style="height:auto; max-height:140px; width:auto; max-width:98%;  border:6px solid #DDD; -webkit-border:6px solid #DDD;; -moz-border:6px solid #DDD;;" />
									 </div><!-- col-md-1 -->
								
									<div class="col-md-10 col-sm-8" style="float:left;">
										<h4> <a href='.$editor.' target="_blank"> <i class="fa fa-edit text-warning pointer"> </i> </a> &nbsp; <i class="fa fa-trash text-danger pointer"></i> &nbsp; '.$data['title'].'&nbsp;'.$data['fullname'].' :&nbsp; <span class="h6 bold text-info"> '.$data['hosp_no']. ' :: '.$data['category'].' ( '.$data['type'].' )  </span> '.
										'&nbsp;&nbsp;&nbsp;<span class="font-16"><i class="fa fa-phone"></i>&nbsp;'.$data['phone'].
										'&nbsp;&nbsp;&nbsp;<span class="font-16"><i class="fa fa-map-marker"></i>&nbsp;'.$data['address'].
										',&nbsp;&nbsp;'.$data['lga'].',&nbsp;&nbsp;'.$data['state'].'&nbsp;state, &nbsp;  <i class="fa fa-calendar"></i> '.$data['dob'].'&nbsp;&nbsp; <a href='.$new_med_record.' target="_blank"><i class="fa fa-comments text-success"></i> view medical reports :  <span class="badge badge-danger font-15"> '.$hsp_report_count.' </span> </a>
										<br/><b>Next of Kin: </b>'.$data['nokname'].'&nbsp; (<b>'.$data['nokrelationship'].'</b>)&nbsp; <span class="fa fa-phone"></span>&nbsp;'.$data['nokphone'].'
										'.
										' </h4><hr/> <span class="h5 bold"> Siblings: <label class="badge badge-success">'.$totsib.'</label> &nbsp;&nbsp; <span class="text-danger bold"> Details : </span> '.$all_siblings.' </span>'.
										'<p> <i> created by : '.$data['createdby'].', &nbsp; on '. $data['date_c'].'   &nbsp;  : '.date('h:s A',$data['time_c']).' </i></p>
									</div> <!-- col-md-10 -->
								
								</div> <!-- card-body -->							
							</div> <!-- card -->
						</div> <!-- col-md-12 -->
					</div> <!-- row -->				  
					';
				 
				} // end while 	
				######################
				
				$result  = array('next'=>$next,'response'=>$response,'found'=>$found->num_rows);
				exit(json_encode($result)); 		 
			} else
					exit(json_encode(array('next'=>$next,'response'=>'','found'=>$found->num_rows)));
		}	   
	#################
	
	
	?>