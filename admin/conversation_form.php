						
						
					<div class="col-md-12" style="float:left;">
						<div class="form-group" id="fm7" style="border:5px thin #000;">
						  <label class="bold text-info">  Conversation Type </label> 
						  <div class="input-group border-1" title=" Conversation Type">  
							<select class="form-control" style="font-size:16px; height:40px;"  id="pconverseType">
							   <option value="">...</option>
							</select>
							
							<div class="input-group-append">
							  <span class="input-group-text" style="height:40px;">
								<i class="fa fa-comment"></i>
							  </span>
							</div>
						  </div>
						  
						</div> <!-- ./  form-group -->
							
						<div class="form-group text-capitalize" id="fm20" style="border:5px thin #000;">
						  <label class="bold text-info">  Comments  </label> 
						  <div class="input-group border-1" title="Patient category">
							<textarea id="txt_qtn" name="pd_converse" class="pd_converse form-control font-18" rows="5" cols="20" style="line-height:25px; ">  

							</textarea> 
							</div>
							<input type="hidden" id="cur_ref" value="<?php echo $ticket_no; ?>"/>
							<a href="#" class="tog-messageTransferMedium" data-toggle="modal" data-target="#messageTransferMedium" data-backdrop="static" data-keyboard="false"> </a>
						  </div> <!-- ./  form-group -->
						
						<div class="btn-group dropdown">
						  <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Actions
						  </button>
						  <div class="dropdown-menu">
							<a class="dropdown-item" href="#" 
							 onclick="manage_comment_conversation($('#cur_ref').val(), $('#pconverseType').val(),tinymce.get('pd_converse').getContent(),'save')">
							  <i class="fa fa-save fa-fw text-info"></i> Save Comment </a>
							<a class="dropdown-item" href="#"
								onclick="manage_comment_conversation($('#cur_ref').val(), $('#pconverseType').val(),tinymce.get('pd_converse').getContent(),'forward')">
							  <i class="fa fa-mail-forward fa-fw text-warning"  ></i> Forward To </a>
							<!-- <a class="dropdown-item" href="#">
							  <i class="fa fa-history fa-fw"></i>Another action</a> -->
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" 
								onclick="manage_comment_conversation($('#cur_ref').val(), $('#pconverseType').val(),tinymce.get('pd_converse').getContent(),'finish')">
							  <i class="fa fa-check text-success fa-fw"></i> Finish Converse </a>
							<a class="dropdown-item" href="#" 
							onclick="manage_comment_conversation($('#cur_ref').val(), $('#pconverseType').val(),tinymce.get('pd_converse').getContent(),'cancel')">
							  <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
						  </div>
						</div>
					 
					</div> <!-- ./  col-md-12 -->
				  
					
				 