
                         <!-- fetch other comments from the specialist -->
                           <?php 
                              $bill_ids = $specimens['bill_type_id']; $table = 'specialist_report';
                              # print_r($bill_ids);
                               $sp_report = $mydbm->runBaseQuery("select * from $table where customer_id='".$customer_id."' and ticket_no='".$ticket_no."' and bill_type_id in (".implode(',', $bill_ids).")");
                              #  print_r($query);
                              if(!empty($sp_report)){ 
                                  
                                  echo "<div class='mt-3 mb-2 badge badge-light text-dark'><i class='fa fa-comment'></i> &nbsp; &nbsp; <span class=''> Comments from Specialist </span></div>"; 
                                  
                                  foreach ($sp_report as $key=>$message){ ?>
                         <div class="ml-5"> <i class="mdi mdi-check"></i> &nbsp;   <?php echo $message['message']; ?>
                                        <?php if($message['c_by']==$_SESSION['admUser'] && $edit){ ?> &nbsp; &nbsp; 
                                        <a href="javascript:void()" data-toggle="modal" data-target="#comment_modal" onclick="reedit($(this).attr('data_id'),$(this).attr('data_value'))" data_id="<?php echo $message['bill_type_id']; ?>" data_value="<?php echo $message['message']; ?>"> Edit </a>
                                           <?php }?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php }
                                    }
                                    ?>
                                 <!-- end report from specialist -->
                           