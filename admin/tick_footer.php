	
	<footer class="footer" >		
	  <div class="container-fluid clearfix">
		<span class="cosmo font-24"><u> Verified by: <?php echo $bg_image['manager']; ?></u></span>	 <br/>
		<img src="<?php echo "../assets/images/".$bg_image['signatory_image'];?>" class="img img-md" /> &nbsp; &nbsp; &nbsp;  <span class="cosmo"> <?php  echo date('d/m/y',($custom_info[0]['date_fin']=="")? strtotime(date('Y-m-d')): strtotime($custom_info[0]['date_fin']));  //// echo "date ".$custom_info[0]['date_fin']; // date('d/m/y',strtotime( )); ; ?> </span>
			 
	  </div>
	</footer>
	<!-- partial -->
	
        