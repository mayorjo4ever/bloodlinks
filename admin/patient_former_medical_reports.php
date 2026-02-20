	
		<div class="row">  
				<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">               
                <div class="card-body">                
				  
					<span class="h3 text-capitalize"> 
						<i class="fa fa-comments text-success "> </i> medical reports&nbsp; :&nbsp; <?php echo $myname; ?> 
					</span> &nbsp;  <span class="h3 badge badge-outline-dark font-16 bold" style="padding:10px; margin:10px;">  <i class="fa fa-building text-primary"> </i> <?php echo $myhsp; ?> : <?php echo $category ." [ ".$mytype." ]"; ?>  </span> &nbsp; 
					
				<?php 
					$myVitalSci = $dbm->getFields($dbm->select('vital_science',
						array('ref_no'=>$myhsp,'type'=>$mytype)),
						array('height','bp','weight','temp','sn','time_c'));	 
					$totVs = count($myVitalSci['sn']); 
					$lastVS = ($totVs-1);    //  var_dump($myVitalSci);
				
				
				?> <br/>
				 <span class="btn btn-dark btn-sm bold "> Vital Sciences &nbsp;  <i class="fa fa-stethoscope"> </i>   </span> &nbsp; &nbsp; Weight: <span class="btn btn-outline-dark text-uppercase">  <?php echo ($myVitalSci['weight'][$lastVS]=="")?"0":$myVitalSci['weight'][$lastVS];?> </span> &nbsp;
				 Height : <span class="btn btn-outline-dark text-uppercase"> <?php echo ($myVitalSci['height'][$lastVS]=="")?"0":$myVitalSci['height'][$lastVS];?>   </span>
					 &nbsp; BP : <span class="btn btn-outline-dark text-uppercase"> <?php echo ($myVitalSci['bp'][$lastVS]=="")?"0":$myVitalSci['bp'][$lastVS];
					 ?>  </span> &nbsp;
					  Temp : <span class="btn btn-outline-dark text-uppercase"> <?php echo ($myVitalSci['temp'][$lastVS]=="")?"0":$myVitalSci['temp'][$lastVS];?> </span>
					 &nbsp; <button rel="tooltip" data-placement="left" title="Take new Vital Science" data-text="<?php echo "$myhsp|$mytype|$myname"; ?>" onclick="set_vs_info($(this).attr('data-text'))" data-toggle="modal" data-target="#vitalScienceModal" class="bth btn-outline-dark btn-sm bold pointer">Take  New&nbsp;  <i class="fa fa-stethoscope"> </i></button> &nbsp; &nbsp; &nbsp; <i class="text-muted font-13"> Day Taken : <?php echo ($myVitalSci['time_c'][$lastVS]=="")?"--:--": $func->format_date(date('Y-m-d' ,$myVitalSci['time_c'][$lastVS]))?>  </i>  &nbsp;&nbsp;
					
					 
				</div> <!-- ./ card body -->
			  </div> <!-- ./ card -->
			  </div> <!-- ./ col-lg-12 -->
			  </div> <!-- ./ row -->	
	
		<?php 
		
			$dates = $dbm->getFields($dbm->select_distinct('date_vs','tickets_converse',array('ref_no'=>$myhsp,'type'=>$mytype),array('date_vs'),'AND','DESC'),array('date_vs')); 
			  $n=0;
				if(!is_null($dates)) foreach($dates['date_vs'] as $days) { 
					 # $j++; 
				### if(!is_null($comments))foreach($comments['converse_type'] as $com_type) {
				?>
				
	
		<div class="row">  
				<div class="col-lg-12 grid-margin stretch-card">
              <div class="card"  style="min-height:250px;">               
                <div class="card-body">   
		
		  <div class="fluid-container">
		 
				<p class="text-gray text-uppercase bold">  <?php echo $func->format_date($days); ?></p>
                    <ul class="bullet-line-list pb-3">
					<?php
						# show comments 						
						 $comments = $dbm->getFields($dbm->select('tickets_converse',array('ref_no'=>$myhsp,'type'=>$mytype,'date_vs'=>$days),array('ref_no'),'and','DESC'),
							array('sn','rec_by','report_type','content','from_user_id','date_vs','month_vs','year_vs','week_vs','time_vs','time_c'));
								$c=0; 
							if(!is_null($comments)) foreach($comments['report_type'] as $report_type) { 
							?>
					
                      <li>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">                         
                            <div class="ml-3">
                              <h6 class="mb-0 bold text-capitalize"> <?php echo $report_type; ?>  </span>  
							  &nbsp; <div class="pull-right"> <a href="#" for="<?php echo  $comments['sn'][$c]; ?>"  class="fa fa-pencil text-warning pointer font-18" onclick="editMedReport($(this).attr('for'))"> </a> &nbsp; &nbsp; <span class="small text-italics text-muted"> recorded_by  <?php echo $comments['rec_by'][$c]; ?>  @ <?php echo  date('D d M Y - h:i A', $comments['time_c'][$c]); ?></span> 
							  &nbsp;  &nbsp; <!-- <span class="fa fa-trash text-danger pointer font-18" onclick="swal('delete this <?php echo $report_type;?>','yes or no ','warning')">  </span> --> &nbsp; &nbsp; </div></h6>
                              <p class="" style="word-wrap:break-word; line-height:30px; "><?php echo stripslashes($comments['content'][$c]); ?></p>
                            </div>
                          </div> <!--
                          <div>
                            <small class="d-block mb-0">06</small>
                            <small class="text-muted d-block">pm</small>
                          </div> -->
                        </div>
                      </li>
							<?php $c++;  } ### end $report_type  ?>
					  </ul>				
				</div> 
					
					<?php # $reports = $dbm->getFields());  ?>
					
				</div>  
			</div>	 <!-- ./ col-lg-6 -->	
			 
		</div> <!-- </ COL-LG12  -->
		</div> <!-- </ row  -->
				  
<?php $n++;  } // end foreach  dates ?>
			
			

			