	
	<footer class="footer" >		
	  <div class="container-fluid clearfix">
		<span class="cosmo font-24"><u> Verified by: <?php echo $bg_image['manager']; ?></u></span>	 <br/>
		<img src="<?php echo "../assets/images/".$bg_image['signatory_image'];?>" class="img img-md" /> &nbsp; &nbsp; &nbsp;  <span class="cosmo"> <?php echo date('d/m/y',($custom_ticket_id['date_fin']=="")? strtotime(date('Y-m-d')): strtotime($custom_ticket_id['date_fin'])); //// echo date('d/m/y',strtotime($custom_ticket_id['date_fin'])); ; ?> </span>
		
		<img src="<?php echo "../assets/images/".$bg_image['footer_image'];?>" class="img" style="width:100%; " />		 
	  </div>
	</footer>
	<!-- partial --> 
	