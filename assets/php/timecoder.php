<?php 

	if(!isset($_SESSION)) session_start();
	  
	// error_reporting(E_ALL ^ E_NOTICE);
	// error_reporting(1);
	

		function readTime($ut){
		if($ut == 0 ){
		return 0;
		}
		
		else if($ut < 60 ){
		return secs($ut);
		}
		
		else if($ut < 3600 ){
		return mins($ut)." ";
		}
		
		else if($ut < 86400 ){
		return hrs($ut);
		}
		
		else if($ut < 604800 ){
		return days($ut);
		}
		
		else if($ut <= 3155760000 ){
		return weeks($ut);
		}
		
		}
		 
		///// seconds manager
		function secs($ut){
		$sec = $ut;
		
		if($sec ==0)
		 return "";
		
		if($sec ==1)
		 return $sec;
		
		
		if($sec >1)
		 return $sec;
		}
		
		function mins($ut){

		$min = (int)(secs(@$ut)/60);
		$rems = (int)(secs(@$ut) % 60);
		
		if($min == 0 && $rems==0)
		 return 0;
		 
		 if($min == 0 && $rems==1)
		 return $rems;
		
		if($min == 1 && $rems==0)
		 return $min." <small>m</small>";
		 
		 if($min == 1 && $rems==1)
		 return $min." <small>m</small> :  ".$rems." <small>s</small>";
		 
		 //////
		 
		 if($min == 0 && $rems >1)
		 return $rems." <small>s</small> ";
		
		if($min == 1 && $rems >1)
		 return $min." <small>m</small> :  ".$rems." <small>s</small>";
		
		if($min > 1 && $rems==0)
		 return $min." <small>m</small>";
		 
		 if($min > 1 && $rems ==1)
		 return $min." <small>m</small> :  ".$rems." <small>s</small>";
		 
		 if($min > 1 && $rems >1)
		 return $min." <small>m</small> :  ".$rems." <small>s</small>";
		 
		 else 
		 return $min." <small>m</small> :  ".$rems." <small>s</small>";
		
		}	

			///// <small>h</small> manager	
		function hrs($ut){
		$hr = (int)(mins($ut)/60);
		$remm = (int)(mins($ut) % 60);
		$remS = (int)($ut % 60);
		
		 
		 if($hr == 1 && $remm==0)
		 return $hr." <small>h</small> ";	
		
		
		if($hr == 1 && $remm == 1)
		 return $hr." <small>h</small> :  ".$remm." <small>m</small> ";
		
		if($hr == 1 && $remm > 1 && $remS == 0) 
		 return $hr."<small>h</small> : ".$remm."<small>m</small> ";
		
		if($hr == 1 && $remm > 1 && $remS > 0) 
		 return $hr."<small>h</small> : ".$remm."<small>m</small> : ".$remS."<small>s</small> ";
		
		///// 
		
		if($hr > 1 && $remm === 0 )
		 return $hr." <small>h</small> ";
		
		if($hr > 1 && $remm === 1 )
		 return $hr." <small>h</small> :  ".$remm." <small>m</small> ";
		 
		  if($hr > 1 && $remm > 1 )
		 return $hr." <small>h</small> :  ".$remm." <small>m</small> ";
		}
		
	//////////////////   /////<small>d</small>manager	

		 function days($ut){
			
		$day = (int)(mins($ut/1440)); // 60 * 24hr * || 60
		
		$remh = (int)(mins($ut/60) %24);
		$remm = (int)(mins($ut)% 60);	
		
		
		if($day ==1 && $remh==0 && $remm==0 )
		return $day." <small>d</small> ";
		
		if($day ==1 && $remh==0 && $remm == 1)
		return $day." <small>d</small>  :  ".$remm." <small>m</small>";
		
		if($day ==1 && $remh==0 && $remm > 1)
		return $day." <small>d</small>  :  ".$remm." <small>m</small>";
		
		if($day ==1 && $remh==1 && $remm == 0)
		return $day." <small>d</small>  :  ".$remh." <small>h</small> ";
		
		if($day ==1 && $remh==1 && $remm == 1 )
		return $day." <small>d</small>  :  ".$remh." <small>h</small>  :  ".$remm." <small>m</small>";
		
		if($day ==1 && $remh==1 && $remm > 1 )
		return $day." <small>d</small>  :  ".$remh." <small>h</small>  :  ".$remm." <small>m</small>";
		
		if($day ==1 && $remh >1 && $remm == 0 )
		return $day." <small>d</small>  :  ".$remh." <small>h</small> ";
		
		if($day ==1 && $remh >1 && $remm == 1 )
		return $day." <small>d</small>  :  ".$remh." <small>h</small> ".$remm." <small>m</small>";
		
		if($day ==1 && $remh >1 && $remm > 1 )
		return $day." <small>d</small>  :  ".$remh." <small>h</small> ".$remm." <small>m</small>";
		
		
		//////
		
		if($day >1 && $remh==0 && $remm==0 )
		return $day."<small>d</small>";
		
		if($day >1 && $remh==0 && $remm == 1 )
		return $day."<small>d</small>:  ".$remm." <small>m</small>";
		
		if($day >1 && $remh==0 && $remm > 1 )
		return $day."<small>d</small>:  ".$remm." <small>m</small>";
		
		
		if($day >1 && $remh==1 && $remm == 0)
		return $day."<small>d</small>:  ".$remh." <small>h</small>";
		
		if($day >1 && $remh==1 && $remm == 1)
		return $day."<small>d</small>:  ".$remh." <small>h</small>";
		
		if($day >1 && $remh==1 && $remm > 1)
		return $day."<small>d</small>:  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		//////////
		
		if($day >1 && $remh>1 && $remm == 0 )
		return $day."<small>d</small>:  ".$remh." <small>h</small>";
		
		if($day >1 && $remh>1 && $remm == 1 )
		return $day."<small>d</small>:  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($day >1 && $remh >1 && $remm > 1 )
		return $day."<small>d</small>:  ".$remh." <small>h</small> :  ".$remm." <small>m</small> ";
			
		// else return $day."<small>d</small>".$remh." <small>h</small> ".$remm." <small>m</small>";
		}
		
		
		///// <small>w</small> manager	
		 function weeks($ut){
		
		$week= (int)(mins($ut/10080)); 		// 7 * 24 * 60 * || 60
		$rday = (int)(mins($ut/1440)%7); 	// 24 * 60 * || 60
		$remh = (int)(mins($ut/60) % 24);
		$remm = (int)(mins($ut) % 60);
		
		
		/// a week plus Mins
		if($week ==1 && $rday == 0 && $remh==0 && $remm==0 )
		return $week." <small>w</small> ";
		
		if($week ==1 && $rday == 0 && $remh==0 && $remm==1 )
		return $week." <small>w</small> :  ". $remm." <small>m</small> ";
		
		if($week ==1 && $rday == 0 && $remh==0 && $remm >1 )
		return $week." <small>w</small> :  ". $remm." <small>m</small> ";
		
		
		////// a week plus hour plus <small>m</small>
		if($week ==1 && $rday == 0 && $remh==1 && $remm==0 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> ";
		
		if($week ==1 && $rday == 0 && $remh==1 && $remm==1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week ==1 && $rday == 0 && $remh==1 && $remm >1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		
		///// a week plus <small>h</small> 
		if($week ==1 && $rday == 0 && $remh >1 && $remm ==0 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> ";
		
		if($week ==1 && $rday == 0 && $remh >1 && $remm ==1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week ==1 && $rday == 0 && $remh >1 && $remm >1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		//////// a week plus a day and <small>m</small>
		if($week ==1 && $rday == 1 && $remh ==0 && $remm ==0 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> ";
		
		if($week ==1 && $rday == 1 && $remh ==0 && $remm ==1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remm." <small>m</small>";
		
		if($week ==1 && $rday == 1 && $remh ==0 && $remm >1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remm." <small>m</small>";
		
		///////// a week plus a day and hour
		
		if($week ==1 && $rday == 1 && $remh ==1 && $remm == 0 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small>";
		
		if($week ==1 && $rday == 1 && $remh ==1 && $remm ==1 )
		return $week." week :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week ==1 && $rday == 1 && $remh ==1 && $remm >1 )
		return $week." week :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		////// a week plus a day and <small>h</small> 13/15ca049
		if($week ==1 && $rday == 1 && $remh >1 && $remm == 0 )
		return $week." week :  ". $rday." <small>d</small> :  ".$remh." <small>h</small>";
		
		if($week ==1 && $rday == 1 && $remh >1 && $remm ==1 )
		return $week." week :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week ==1 && $rday == 1 && $remh >1 && $remm >1 )
		return $week." week :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		/////// a week plus<small>d</small>and <small>m</small>
		
		if($week ==1 && $rday > 1 && $remh==0 && $remm==0 )
		return $week." week :  ".$rday." days" ;
		
		if($week ==1 && $rday > 1 && $remh==0 && $remm==1 )
		return $week." week :  ".$rday."<small>d</small>:  ". $remm." <small>m</small>";
		
		if($week ==1 && $rday > 1 && $remh==0 && $remm >1 )
		return $week." week :  ". $remm." <small>m</small> ";

		//// 
		
		if($week ==1 && $rday > 1 && $remh==1 && $remm==0 )
		return $week." week :  ".$rday." days". $remh." <small>h</small> " ;
		
		if($week ==1 && $rday > 1 && $remh==1 && $remm==1 )
		return $week." week :  ".$rday."<small>d</small>:  ". $remh." <small>h</small>". $remm." <small>m</small>";
		
		if($week ==1 && $rday > 1 && $remh==1 && $remm >1 )
		return $week." week :  ".$rday."<small>d</small>:  ". $remh." <small>h</small> ". $remm." <small>m</small> ";

		/////////	
		
		if($week ==1 && $rday > 1 && $remh >1 && $remm==0 )
		return $week." week :  ".$rday."<small>d</small>:  ". $remh." <small>h</small> " ;
		
		if($week ==1 && $rday > 1 && $remh >1 && $remm==1 )
		return $week." week :  ".$rday."<small>d</small>:  ". $remh." <small>h</small>". $remm." <small>m</small>";
		
		if($week ==1 && $rday > 1 && $remh >1 && $remm >1 )
		return $week." week :  ".$rday."<small>d</small>:  ". $remh." <small>h</small> ". $remm." <small>m</small> ";
		
		///////////////////////////////////////////////
		///////////////////////////////////////////////
		///////////////////////////////////////////////
		
		
		
		
		if($week >1 && $rday == 0 && $remh==0 && $remm==0 )
		return $week." <small>w</small>";
		
		if($week >1 && $rday == 0 && $remh==0 && $remm==1 )
		return $week." <small>w</small> :  ". $remm." <small>m</small> ";
		
		if($week >1 && $rday == 0 && $remh==0 && $remm >1 )
		return $week." <small>w</small> :  ". $remm." <small>m</small> ";
		
		
		//////  <small>w</small> plus hour plus <small>m</small>
		if($week >1 && $rday == 0 && $remh==1 && $remm==0 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> ";
		
		if($week >1 && $rday == 0 && $remh==1 && $remm==1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week >1 && $rday == 0 && $remh==1 && $remm >1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		
		///// <small>w</small> plus <small>h</small> 
		if($week >1 && $rday == 0 && $remh >1 && $remm ==0 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> ";
		
		if($week >1 && $rday == 0 && $remh >1 && $remm ==1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week >1 && $rday == 0 && $remh >1 && $remm >1 )
		return $week." <small>w</small> :  ". $remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		////////  <small>w</small> plus a day and <small>m</small>
		if($week >1 && $rday == 1 && $remh ==0 && $remm ==0 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> ";
		
		if($week >1 && $rday == 1 && $remh ==0 && $remm ==1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remm." <small>m</small>";
		
		if($week >1 && $rday == 1 && $remh ==0 && $remm >1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remm." <small>m</small>";
		
		///////// <small>w</small> plus a day and hour
		
		if($week >1 && $rday == 1 && $remh ==1 && $remm == 0 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small>";
		
		if($week >1 && $rday == 1 && $remh ==1 && $remm ==1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week >1 && $rday == 1 && $remh ==1 && $remm >1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		////// a week plus a day and <small>h</small>
		if($week >1 && $rday == 1 && $remh >1 && $remm == 0 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small>";
		
		if($week >1 && $rday == 1 && $remh >1 && $remm ==1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		if($week >1 && $rday == 1 && $remh >1 && $remm >1 )
		return $week." <small>w</small> :  ". $rday." <small>d</small> :  ".$remh." <small>h</small> :  ".$remm." <small>m</small>";
		
		
		/////// a week plus<small>d</small>and <small>m</small>
		
		if($week >1 && $rday > 1 && $remh==0 && $remm==0 )
		return $week." <small>w</small> :  ".$rday." days" ;
		
		if($week >1 && $rday > 1 && $remh==0 && $remm==1 )
		return $week." <small>w</small> :  ".$rday."<small>d</small>: ". $remm." <small>m</small>";
		
		if($week >1 && $rday > 1 && $remh==0 && $remm >1 )
		return $week." <small>w</small> :  ". $remm." <small>m</small> ";

		//// 
		
		if($week >1 && $rday > 1 && $remh==1 && $remm==0 )
		return $week." <small>w</small> :  ".$rday." days". $remh." <small>h</small> " ;
		
		if($week >1 && $rday > 1 && $remh==1 && $remm==1 )
		return $week." <small>w</small> :  ".$rday."<small>d</small>: ". $remh." <small>h</small> :  ". $remm." <small>m</small>";
		
		if($week >1 && $rday > 1 && $remh==1 && $remm >1 )
		return $week." <small>w</small> :  ".$rday."<small>d</small>: ". $remh." <small>h</small> :  ". $remm." <small>m</small> ";

		/////////	
		
		if($week >1 && $rday > 1 && $remh >1 && $remm==0 )
		return $week." <small>w</small> :  ".$rday."<small>d</small>:  ". $remh." <small>h</small> " ;
		
		if($week >1 && $rday > 1 && $remh >1 && $remm==1 )
		return $week." <small>w</small> :  ".$rday."<small>d</small>:  ". $remh." <small>h</small> :  ". $remm." <small>m</small>";
		
		if($week >1 && $rday > 1 && $remh >1 && $remm >1 )
		return $week." <small>w</small> :  ".$rday."<small>d</small>:  ". $remh." <small>h</small> :  ". $remm." <small>m</small> ";
		
		////////////////////////////////////////////////////
		////////////////////////////////////////////////////
		////////////////////////////////////////////////////
		////////// 52 <small>w</small> PLUS //////////////////////////
		////////// 1 DAY PLUS  /////////////////////////////
		////////// 6 <small>h</small> MAKES A YEAR ////////////////////
		////////////////////////////////////////////////////
		////////////////////////////////////////////////////

		}

		function checkTime($from , $to){
			
			$now = time(); 
			
			if($now < $from ){
				$leftTime = abs($from-$now); 
				
				if($leftTime > 3600 ) $sec = " : ".secs($leftTime%60); 
				
				return " Is About ".readTime(abs($leftTime)).$sec." To Start ";
			}
			
			if($now > $from && $now < $to){
				$past = abs($to-$now);
				
				if($past > 3600 ) $sec = " : ".secs($past%60); 
				
				return " Has Started And is: ".readTime(abs($past)).$sec." To End ";
			}
			
			if($now > $to){
				$past = abs($now-$to); 
				  if($past > 3600 ) $sec = " : ".secs($past%60); 
				return " Has Ended ".readTime(abs($past)).$sec." Ago ";
			}
			
		}
?>