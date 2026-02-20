			<form method="post"> 
			<div class="col-md-12 ">
				 <?php  
					$patients = $dbm->getFields($dbm->select('patients',array('status'=>'active'),array('time_c'),'and','desc'),array('phone','state','lga','gender','surname','firstname','sn','hosp_no','othername','dob','category','title','psp','psp_dir',
					'nokphone','address','nokname','nokrelationship'));     
					## if not null  	
					 
					if(!is_null($patients))
						{   
					?>
					<p class="h4 text-info bold">  <?php  echo count($patients['sn']). " Patients Found  , total pages : ".$pages; ?></p>
					 
						<table id="patient_table" class="table table-striped text-capitalize"> 
							<thead>
							<tr class="bold text-uppercase text-black  font-16" > 
								<td> sn </td>
								<td> actions &nbsp;&nbsp; <i class="fa fa-wrench"></i> </td>
								<td> image </td>
								<td > name  </td>
								<td> hsp no. </td>								 
								<td> Phone </td>								 
								 <td> Address </td>  
								<!-- <td> siblings </td> -->
								<td> category   </td>
								
							</tr>
							</thead>
							<tbody>
						<?php $n=0; foreach($patients['hosp_no'] as $id){ 
							if($n==10) break; 
							$ref_no = base64_encode($id);
							$nm = base64_encode($patients['surname'][$n]." ".$patients['firstname'][$n]." ".$patients['othername'][$n]);
							$mil_no = base64_encode($patients['military_no'][$n]);
							####### bio info updates
							$tit = base64_encode($patients['title'][$n]);
							$snm = base64_encode($patients['surname'][$n]);
							$fnm = base64_encode($patients['firstname'][$n]);
							$otn = base64_encode($patients['othername'][$n]);
							$dob = base64_encode($patients['dob'][$n]);
							$phn = base64_encode($patients['phone'][$n]);
							$mst = base64_encode($patients['state'][$n]);
							$mlg = base64_encode($patients['lga'][$n]);
							$gd = base64_encode($patients['gender'][$n]);
							$pctg = base64_encode($patients['category'][$n]);
							$psp = base64_encode($patients['psp'][$n]);
							$pspd = base64_encode($patients['psp_dir'][$n]);
							$upd_sn = base64_encode($patients['sn'][$n]);
							$nknm = base64_encode($patients['nokname'][$n]);
							$adr = base64_encode($patients['address'][$n]);
							$nkr = base64_encode($patients['nokrelationship'][$n]);
							$nkp = base64_encode($patients['nokphone'][$n]);
							
							###################
							$mysib = $dbm->getFields($dbm->select('patients_siblings',array('status'=>'active','ref_no'=>$id),array('time_c'),'and','desc'),array('surname','firstname','sn','ref_no','othername','dob','type'));
							$mypsp = $patients['psp_dir'][$n].$patients['psp'][$n];
							$myname = $patients['title'][$n]." ".$patients['surname'][$n]." ".$patients['firstname'][$n]." ".$patients['othername'][$n];
							$url2 = "biodata_edit_interface.php?act=edit&refn=$ref_no&tit=$tit&snm=$snm&fnm=$fnm&otn=$otn
								&dob=$dob&upd_sn=$upd_sn&phn=$phn&mst=$mst&mlg=$mlg&gd=$gd&pctg=$pctg&psp=$psp&pspd=$pspd&nknm=$nknm&adr=$adr&nkr=$nkr&nkp=$nkp"; 
							$url3 = "add_sibling_interface.php?refn=$ref_no&mln=$mil_no&nm=$nm";	
							?>
						<tr style="font-size:16px;"> 
							<td> <span class="btn btn-sm btn-rounded btn-default bold"> <?php echo ($n+1); ?> </span> </td>
							 <td>
								 <div class="ticket-actions">
								  <div class="btn-group dropdown">
									<button style="height:30px;" type="button" class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Edit </button>
										<div class="dropdown-menu">
										  <a class="dropdown-item" href="<?php echo $url2; ?>"  title=" Edit: <?php echo $myname; ?> Info " data-text="<?php echo $myname; ?>" for="<?php echo $id; ?>">
											<i class="fa fa-pencil"></i>Edit Profile </a>
										  <a  href="<?php echo $url3;  ?>" title=" Add More Sibling for : <?php echo $myname; ?>" data-text="<?php echo $myname; ?>" for="<?php echo $id; ?>" class="dropdown-item">
											<i class="fa fa-user-plus fa-fw"></i> Add Siblings </a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#">
											<i class="fa fa-user fa-fw"></i> view full profile.</a> 
										</div>
								  </div>
								</div>  
							 
							 </td>
							<td>  <img src="<?php echo file_exists($mypsp)?$mypsp: "images/users/default-user.png"; ?>" alt="image" class="img img-circle" style="height:60px; width:60px;" /> </td>							
							<td > <?php echo $myname; ?>      </td>
							<td> <span class="font-14"> <?php echo $id; ?> </span> </td>
							<td> <span class="font-14"> <?php echo $patients['phone'][$n]; ?> </span> </td> 
							<td> <span class="font-14"> <?php echo $patients['address'][$n]; ?> </span> </td> 
						
							<!-- <td> 
								 <a class="count-indicator" href="#" data-text="<?php echo $myname; ?>" for="<?php echo $id; ?>" data-toggle="modal" data-target="#displaySiblings" onclick="display_my_sibling($('#sib_view3'),'<?php echo $id; ?>','lg') " >
								  <i class="fa fa-female fa-2x"></i>
								  <span class="count red font-16">  <?php echo count($mysib['sn']);?> </span>
								</a> 
								<!-- <button class="btn btn-primary btn-icons btn-rounded"> <?php echo count($mysib['sn']);?> </button>  
							</td> --> 
							<td> <?php echo  $patients['category'][$n] ; ?></td> 
							  
						 </tr>
						</tbody>
						<?php $n++; } ## end foreach  ?>
					
					</table>
					<?php } ## end not null  

		?>   
			</div> <!-- ./ col-md-9 -->	
			
			</form>