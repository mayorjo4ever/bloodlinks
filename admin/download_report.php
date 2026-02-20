<?php 
 	
		error_reporting(1);  
			
			if(!isset($_SESSION))session_start();
		/// authenticate the downloader
 
			require "../assets/php/dbTool.php";	
			## require "dist/php/model.php";	
			
			require "../assets/Classes/PHPExcel.php";
			
			set_time_limit(0);  
			
			try{  	 
				$dbm = new DbTool(); $func = new functions(); 
				$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));	 
	
			////////////////////////////////////////
			## $cards = explode(",",mysql_real_escape_string($_REQUEST['token']));
			 			 
			###########################################################			 
			 // start PHPExcel object 				
			 $extName = "report_summary.xls";
				//
			/*** PREVENT FILE FROM WRITING BUG ERROR - WHEN FILE SIZE EXITS DEFAULT LIMIT ***/
			/***/	@ini_set('memory_limit',-1);			/*******************************/
			/*************************************************************************/ 
			$objPhp = new PHPExcel(); $func = new functions(); 
			$objDraw = new PHPExcel_Worksheet_Drawing();
			$objPhp->getProperties()->setCreator("ABMC")
				->setLastModifiedBy($_SESSION['adminFullname'])
				->setTitle("ABMC Monthly Report.")							
				->setKeywords("office 2007")				
				->setCategory("Summary of Monthly Report");
			
			 # WRITE IMAGE ON HEADER
			 $objDraw->setWorksheet($objPhp->getActiveSheet());
			 $objDraw->setName("logo");
			 $objDraw->setPath($system_info['url2'][0].''.$system_info['logo'][0]);
			 $objDraw->setCoordinates("G1");
			 $objDraw->setOffsetX(70);
			 $objDraw->setOffsetY(5);
			 $objDraw->setWidth(35);
			 $objDraw->setHeight(35);
			 
			 $infos = explode('_',$_REQUEST['token']); // time-from, time-to, category 
			 ## WRITE THE PRELIMINARY HEADER MENU
			 $headtitle = strtoupper($system_info['name'][0]); 
			 $subhead =  strtoupper($system_info['address'][0]); 
			 $subhead2 = " MONTHLY REPORT FROM ".$func->format_date(date('Y-m-d',$infos[0]))." TO ".$func->format_date(date('Y-m-d',$infos[1])); 			
			  
			 ## WRITE SUB-MENU HEADER 
			 $objPhp->getActiveSheet()->setCellValue('A3',$headtitle); 
			 $objPhp->getActiveSheet()->setCellValue('A4',$subhead); 
			 $objPhp->getActiveSheet()->setCellValue('A5',$subhead2); 
			 
			 ## MERGE HEADER 	
			$objPhp->getActiveSheet()->mergeCells('A3:L3'); //merge and write in the cell 
			$objPhp->getActiveSheet()->mergeCells('A4:L4'); //merge and write in the cell 
			$objPhp->getActiveSheet()->mergeCells('A5:L5'); //merge and write in the cell 
			$objPhp->getActiveSheet()->mergeCells('A6:L6'); //merge and write in the cell 
			
			## BOLDEN HEADER 
			$objPhp->getActiveSheet()->getStyle('A3:M7')->getFont()->setBold(true);	
			// $objPhp->getActiveSheet()->getColumnDimension('A')->setWidth(10); // auto adjust the width
 			
			## CENTER THE HEADER 
			 $style = array('alignment' => array('horizontal' =>PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
			 $objPhp->getActiveSheet()->getStyle("A3:A6")->applyFromArray($style);
			 
			
			## WRITE THE HEADER MENU								###########  + 5 
			 $row_1 = 7; $row_2 = 8;
			 $objPhp->getActiveSheet()->setCellValue('A'.$row_1,'S/N');  
			 $objPhp->getActiveSheet()->setCellValue('B'.$row_1,'TYPE');  
			 $objPhp->getActiveSheet()->setCellValue('C'.$row_1,'CATEGORY');  
			 $objPhp->getActiveSheet()->setCellValue('D'.$row_1,'NAME');  
			 $objPhp->getActiveSheet()->setCellValue('E'.$row_1,'MILITARY NO.');  
			 $objPhp->getActiveSheet()->setCellValue('F'.$row_1,'HOSPITAL NO.');  
			 $objPhp->getActiveSheet()->setCellValue('G'.$row_1,'AGE');  
			 $objPhp->getActiveSheet()->setCellValue('H'.$row_1,'SEX');  
			 $objPhp->getActiveSheet()->setCellValue('I'.$row_1,'DIAGNOSIS');  
			 $objPhp->getActiveSheet()->setCellValue('J'.$row_1,'TREATMENT');  
			 $objPhp->getActiveSheet()->setCellValue('K'.$row_1,'TOTAL COST');  
			 $objPhp->getActiveSheet()->setCellValue('L'.$row_1,'PAYMENT');  
			 $objPhp->getActiveSheet()->setCellValue('M'.$row_1,'BALANCE');  
			
			  
			 ################ cell merging #############		###########  + 5 
			/* $objPhp->getActiveSheet()->mergeCells('A'.$row_1.':A'.$row_2);  
			 $objPhp->getActiveSheet()->mergeCells('B'.$row_1.':B'.$row_2);  
			 $objPhp->getActiveSheet()->mergeCells('C'.$row_1.':C'.$row_2);  
			 $objPhp->getActiveSheet()->mergeCells('D'.$row_1.':G'.$row_1);  
			 $objPhp->getActiveSheet()->mergeCells('H'.$row_1.':H'.$row_2);  
			 $objPhp->getActiveSheet()->mergeCells('I'.$row_1.':I'.$row_2);  
			 $objPhp->getActiveSheet()->mergeCells('J'.$row_1.':J'.$row_2);  
			 */ 
			          
			 ######## bolden text #################		###########  + 5 	
			 $objPhp->getActiveSheet()->getStyle('A'.$row_1.':J'.$row_1)->getFont()->setBold(true);
			
			######## autosize text #################		###########  + 5 	
			 $objPhp->getActiveSheet()->getColumnDimension('C'.$row_2)->setAutoSize(true); // auto adjust the width
			 $objPhp->getActiveSheet()->getColumnDimension('D'.$row_2)->setAutoSize(true); // auto adjust the width
			 $objPhp->getActiveSheet()->getColumnDimension('E'.$row_2)->setAutoSize(true); // auto adjust the width
			 $objPhp->getActiveSheet()->getColumnDimension('F'.$row_2)->setAutoSize(true); // auto adjust the width
			
			## give the cells border 		APPLIED @ THE END 
			##	$styleArray = array('borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN)));
			##	$objPhp->getActiveSheet()->getStyle("A$row_1:J$row_2")->applyFromArray($styleArray); 
			##	## $objPhp->getActiveSheet()->getStyle('B7:G'.($rowNo-1))->applyFromArray($styleArray); 
			##	unset($styleArray);
				////////////////////////////////////////////////////////////////////////////////////////////////
				
				#### start body setup #####
				$time_from = $infos[0];  $time_to = $infos[1];
				$categ = $infos[2];
				if($infos[2]=="") $pquery = ""; 
				 else $pquery = "and category = '$categ'";
	 
				$query = mysql_query("SELECT * FROM tickets_converse WHERE time_vs >='$time_from' and time_vs <='$time_to' $pquery ") or mysql_error();
				// $all_staff = $dbm->getFields($dbm->select_distinct('staff_id','logbooks',$org),array('staff_id')); 
				
				$rowNo = 8;  $tcost = $tbal = $tpay = 0; 
				while($results = mysql_fetch_assoc($query)){
					$ref_no = $results['ref_no'];
					$type = $results['type'];
					switch($type){
						case "host":{ $table = "patients"; $field = "hosp_no";  } break;
						default : { $table = "patients_siblings"; $field = "ref_no"; } break;
					}
					
				$myinfo = $dbm->getFields($dbm->select($table,array($field=>$ref_no,'type'=>$type)),array('dob','fullname','gender'));
				$age = $func->years_old($myinfo['dob'][0],date('Y-m-d'));
				$receipt_no = $results['receipt_no'];
				$receipt_info = $dbm->getFields($dbm->select('patient_receipts',array('receipt_no'=>$receipt_no)),array('total_fee','amount_paid','balance'));
						 
				
				  $objPhp->getActiveSheet()->setCellValue('A'.$rowNo,($rowNo-7));  
				  $objPhp->getActiveSheet()->setCellValue('B'.$rowNo,strtoupper($type));  
				  $objPhp->getActiveSheet()->setCellValue('C'.$rowNo,$results['category']);  
				  $objPhp->getActiveSheet()->setCellValue('D'.$rowNo,$myinfo['fullname'][0]);  
				  $objPhp->getActiveSheet()->setCellValue('E'.$rowNo,$results['military_no']);  
				  $objPhp->getActiveSheet()->setCellValue('F'.$rowNo,$results['ref_no']);  
				  $objPhp->getActiveSheet()->setCellValue('G'.$rowNo,$age);  
				  $objPhp->getActiveSheet()->setCellValue('H'.$rowNo,$myinfo['gender'][0]);  				  
				  $objPhp->getActiveSheet()->setCellValue('I'.$rowNo,$results['diagnosis']);  
				  $objPhp->getActiveSheet()->setCellValue('J'.$rowNo,$results['treatment']);  
				  $objPhp->getActiveSheet()->setCellValue('K'.$rowNo,"N ".number_format($receipt_info['total_fee'][0]));  
				  $objPhp->getActiveSheet()->setCellValue('L'.$rowNo,"N ".number_format($receipt_info['amount_paid'][0]));  
				  $objPhp->getActiveSheet()->setCellValue('M'.$rowNo,"N ".number_format($receipt_info['balance'][0]));  
					$rowNo++;
					$tcost+=$receipt_info['total_fee'][0];
					$tpay +=$receipt_info['amount_paid'][0];
					$tbal +=$receipt_info['balance'][0];
				} // end while 
				
				## write the total output 

				$objPhp->getActiveSheet()->setCellValue('J'.($rowNo+1),"TOTAL : ");
				$objPhp->getActiveSheet()->setCellValue('K'.($rowNo+1),number_format($tcost));  
				$objPhp->getActiveSheet()->setCellValue('L'.($rowNo+1),number_format($tpay));  				  
				$objPhp->getActiveSheet()->setCellValue('M'.($rowNo+1),number_format($tbal));  
				 ### bolden totals
				 $objPhp->getActiveSheet()->getStyle('J'.($rowNo+1).':M'.($rowNo+1))->getFont()->setBold(true);
				
				/****************************************************/ 
				// freeze pane so that heading lines won't scroll 
				# $objPhp->getActiveSheet()->freezePane('A2');
				$objWriter = PHPExcel_IOFactory::createWriter($objPhp,'Excel5');  // for xls file  
				#$objWriter = PHPExcel_IOFactory::createWriter($objPhp,'Excel2007'); 
					
					header('Content-Type:application/vnd.ms-excel');
					header('Content-disposition:attachment;filename="'.$extName);
					header('Cache-Control:max-age=0');
					$objWriter->save('php://output');										
					exit();
					## 
				}
						catch(Exception $e){
								throw  $e; 
						}
					
			 

		?>
		
		
		
		<?php 
		
			class functions{
		
		//////////////////////////////////////////////////////////////////////
	public function years_old($date_1 , $date_2 , $differenceFormat =' %y Year, %m Months, %d Days' )
	{
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);
		
		$interval = date_diff($datetime1, $datetime2);
		
		return $interval->format($differenceFormat);
		
	}
		##########################################################
		
		
		public function swap_text($text){
			// split text into array 
			$text = str_replace(",","",$text);
			$array_a = explode(" ",$text);
			$array_b = explode(" ",$text); 
			
			$tot = count($array_a); 
			
			if($tot==1) return $text;
			 // 2 keys
			if($tot==2) {
				$array_a[0] = $array_a[1]; 
				$array_a[1] = $array_b[0];				
			}
			/// 3 keys
			if($tot==3) {
				$array_a[0] = $array_a[1]; 
				$array_a[1] = $array_b[2];
				$array_a[2] = $array_b[0];
			}
			
			return implode(" ",$array_a);
			
		} // end swap_text
		
		
		public function match_name_and_matric($name,$matric){
			$matric = str_replace("/","",$matric);
			return $name."".$matric;
		}
		// end match_name_matric
		
		public function add_pix_ext($text,$type="jpg"){
			return $text.$type;
		}
		// end add_pix_ext
		
		public function resort(array $data){
			
			$ork = array_keys($data);  // original array keys 
			$aVal = array(); $n = 0;  // array values 
					foreach($data as $k=>$v){
						$aVal[] = $data[$ork[$n]][0];
						$n++;
					}
			return $output = array_combine($ork,$aVal);
		}
		/*********************************************************************/
		
		function show_img($filename, $dir){
				if(file_exists($dir."".$filename.".jpg")){
					echo "<img src='$dir$filename.jpg' class='img img-circle' style='height:40px; width:40px; '/>";
				}
				else {
					echo "<img src='dist/img/default-user.png' class='img img-circle' style='height:40px; width:40px; '/>";
				}
			}
			// end show img
			
			function show_sign($filename, $dir){
				if(file_exists($dir."".$filename.".jpg")){
					echo "<img src='$dir$filename.jpg' class='img img-circle' style='height:40px; width:40px; '/>";
				}
				else {
					echo "<img src='dist/img/signs.jpg' class='img img-responsive' style='height:40px; width:80px; '/>";
				}
			}
		
		
		public function format_date($text,$type='date'){
			
			$date = new DateTime($text);
			$output = "";
			
			switch($type){
					case 'date': $output = $date->format('D jS M, Y' ); break;
					case 'datetime': $output = $date->format('D jS M, Y - g:i A' ); break;
					case 'time': $output = $date->format('g:i s A' ); break; 
			} 
			
			return ($text!="")?$output:"";  
		
		}
		 
		public function set_session($date){
			$ymd = explode("-",$date);
			if($ymd[1]<10) return ($ymd[0]-1)."/".$ymd[0];
			else return  $ymd[0]."/".($ymd[0]+1);
			}
			
		public function get_degree_prog($programme)	{
			$seperator = array('B.','B.Sc.','Pg.D.','B.A.','M.A.','Ph.D.','M.Phil.','B.Sc.(Ed.)','B.A.(Ed.)','M.Sc.','B.(Ed.)', 'M.Phil.','M.Sc.(Ed).','M.(Ed.)','B.Eng.','LL.B.','M.Eng.');
			$programme = trim($programme);
			  $bb = array(); 
			  $result = ""; 
			 foreach($seperator as $cutter){
				$values = explode($cutter,$programme); 
				 
					 $result .= $cutter." = ". count($values)."<br/>";
					if(count($values)==2) { 
						 $bb = array($cutter,trim($values[1]));
					break;
					}
					
				}
				
				$dbm = new DbTool(); 
			
			$info = @$dbm->resort($dbm->getFields($dbm->select("programmes",array('name'=>$bb[1])),
				array('prog_id','fact_id','dept_id')));
			
			  return json_encode(array($programme));
				// return $info; 
		}
		
		################################################
		public function get_staff_info($id)	{
			$fields = array('user_id','name','fact_id','dept_id','email','phone','createdby','datecreated','timecreated');
			$dbm = new DbTool(); 
			if($id!="" || !empty($id)){
				$info = @$dbm->resort($dbm->getFields($dbm->select("staff",array('user_id'=>$id)),
				$fields));
			
			  return $info;
				// return $info; 
			}
			else return null;
			
		}
		##########################################################
			
	function num_to_text($num){
		
		if(($num < 0)|| $num>999999999999999){
			throw new Exception(" data out of range");	
		}
		#
		if(!is_numeric($num)){
			throw new Exception(" enter correct number ");	
		}
		#
		$tn = floor($num/pow(10,12)); // trillion
		$num-=$tn*(pow(10,12));
		#
		$bn = floor($num/pow(10,9)); // billion
		$num-=$bn*(pow(10,9));
		#
		$gn = floor($num/pow(10,6)); // million
		$num-=$gn*(pow(10,6));
		#
		$kn = floor($num/pow(10,3)); // thousand
		$num-=$kn*(pow(10,3));
		#
		$hn = floor($num/pow(10,2)); // hundred
		$num-=$hn*(pow(10,2));
		#		
		$dn = floor($num/pow(10,1));
		$num-=$dn*(pow(10,1));
		#
		$n = $num%10;
		$res = "";
		#
		# start work
		if($tn){$res.=$this->num_to_text($tn)." trillion  ";}
		if($bn){$res.=$this->num_to_text($bn)." billion  ";}
		if($gn){$res.=$this->num_to_text($gn)." million  ";}
		if($kn){$res.=(empty($res)?'':'').$this->num_to_text($kn)." thousand  ";}
		if($hn){$res.=(empty($res)?'':'').$this->num_to_text($hn)." hundred  ";}
		#
		$ones = array('','one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');
		$tens = array('','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety');
		#
		if($dn || $n){
			if(!empty($res)){
				$res.=' and ';
			}
			if($dn<2){
				$res.=$ones[$dn*10+$n];	
			}
			else{
				$res.=$tens[$dn-1];
				
				if($n){ $res.='-'.$ones[$n];
					}
				}
			
			}
		if(empty($res)){
				$res = 'zero';
		}
		
		return $res;
		}
	
	///////////////

		##########################################################
		
			
	} // end class functions 
		
		
		?>