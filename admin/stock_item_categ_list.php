	
	 <table class="table"> 
		<thead class="bg-info text-white text-capitalize">
			<tr>
				<td> sn </td>
				<td> categories </td>
				<td> sub-categories </td>
				<td> manage </td>
			</tr>
		</thead>
		
	<?php 
		$item_catg = $dbm->getFields($dbm->select('stock_item_category',array('')),array('cat_id','name'));
		 $n = 0;
		 if(!is_null($item_catg)) foreach($item_catg['name'] as $catg) { ?>
			
			<tr class="list-star" >
			 <td>  <?php echo ($n+1);  ?>   </td>
			 <td>  <?php echo $catg;  ?>   </td>
			 <td>  <i class="badge badge-info">3</i>  </td>
			 <td>  
				<a href="#" class="text-warning font-20"> <i class="mdi mdi-pencil "></i> </a>  &nbsp; &nbsp; 
				<a href="#" class="text-danger font-20"> <i class="fa fa-trash"></i> </a>   
				</td>
			</tr>  
			
		<?php $n++;  } ?>
	 </table> 
	 
			  