<div class="tab-pane fade show active pr-3" id="user-profile-info" role="tabpanel" aria-labelledby="user-profile-info-tab">
                              <table class="table table-borderless w-100 mt-4">
                               
								
								<tr>
                                  <td>
                                    <strong>Full Name :</strong> <?php echo $my_info['fullname']; ?></td>
                                  <td>
                                    <strong>Gender :</strong> <?php echo $my_info['gender']; ?>  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <strong>Home Address :</strong> <?php echo $my_info['address']; ?></td>
                                  <td>
                                    <strong>Date of birth :</strong> <?php echo $func->format_date($my_info['dob']); ?></td>
                                  
                                </tr>
								
								<tr>
                                  <td>
                                    <strong>Phone Number :</strong> <?php echo $my_info['phone']; ?></td>                                   
                                   <td>
                                    <strong> Age  :</strong> <?php echo $func->years_old($my_info['dob'],date('Y-m-d')); ?>  </td>
								  </tr> 	
								
								<tr class="border-bottom">
                                  <td>
                                    <strong> State  :</strong> <?php echo $my_info['state']; ?> 
								   </td>
								    <td>
                                    <strong> Local Govt :</strong> <?php echo $my_info['lga']; ?></td>                                   
                                   
                                </tr> 
								
                              </table>
							  
							  
							  
							  <table class="table table-borderless w-100 mt-4 text-capitalize">
								<br/> &nbsp; &nbsp; &nbsp; <label  class="h5 bold text-primary"> Next of Kin  </label>
                                
								<tr> 
								  <td colspan="2">
                                    <strong> relationship :</strong> <?php echo $my_info['nokrelationship']; ?></td>
                                  
                                </tr> 
								
								<tr>
                                  <td>
                                    <strong> Full Name :</strong> <?php echo $my_info['nokname']; ?></td>
                                  <td>
                                    <strong>phone number :</strong> <?php echo $my_info['nokphone']; ?>  </td>
                                </tr>
                                
								
								<tr class="border-bottom">
								
                                  <td>
                                    <strong>Date Registered :</strong> <?php echo $func->format_date($my_info['date_c']); ?></td>
                                  <td>
                                    <strong>Registered By :</strong>  <?php echo $my_info['c_by']; ?> </td>
                                </tr> 
								
                              </table> 
                            </div>  <!-- ./ end bio-data pane -->
							