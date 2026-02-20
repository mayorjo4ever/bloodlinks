
 <div class="row bg-inverse-info" style="margin:12px; padding:12px; ">				
	 <div class="col-md-12 float-left"> 
		<div class="card">
			<div class="card-body">   <form method="post">
				 <div class="form-group col-md-8 row selection">
					<label for="title" class="col-sm-3 col-form-label bold"> Enter Ticket No.  <span class="text-danger bold">*</span> </label>
					<div class="col-sm-9"> 
						<div class="input-group">									
							<input style="font-size:14px; height:45px;" type="text" id="ticket_no" name="ticket_no" ref="<?php echo $_SESSION['ticket_no'] ??""; ?>" value="<?php echo $_SESSION['ticket_no'] ?? ""; ?>" class="form-control border-primary newuserform bold" placeholder="GML/22/0000"> 
							<div class="input-group-append"> <button type="submit" id="search_ticket" name="search_ticket" class="btn btn-info ladda-button" data-style="zoom-in"> <i class="fa fa-search"> </i> </button>  </div> 
						</div>
						</div> <!-- ./ col-sm-9 -->
				 </div> <!-- ./ form-group -->
				  <div class="form-group row searching">
					 <div class="form-group col-md-8 offset-2">
						<ul class="num_list list-inline"></ul>
					 </div>	
				   </div> <!-- ./ form-group -->  
				 <div class="search_result"></div>
				</form>
			</div> <!-- ./ card-body -->
	 </div> <!-- ./ card -->
	  
	</div> <!-- ./ col-md-8 -->
</div> <!-- ./ row -->