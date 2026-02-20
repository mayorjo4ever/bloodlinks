

<?php 
	 	error_reporting(E_ALL^E_NOTICE);
	
		if(!isset($_SESSION)) session_start();  
		 
		require "../assets/php/User.php"; 
		
		$admin = new User("users");	
		 /*************************************************************************/	
	
		$admin->sgCheckUser('admUser'); 
		  
?>



<!DOCTYPE html>
<html>
<head>
  <?php require "admin_style_link.php"; ?>
</head>
<!--<body class="hold-transition skin-blue layout-boxed sidebar-mini">  lockscreen -->
  <body class="hold-transition lockscreen">  
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index.php"><b style="font-size:28px;">I</b>nfo.. <b style="font-size:28px;">M</b>gt..<b style="font-size:28px;"> S</b>ystem</a> 
  </div>
  <!-- User name -->
  <div class="lockscreen-name">  <?php echo $_SESSION['adminFullname'] ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="dist/img/user1-128x128.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->
	
    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" accept-charset="utf-8" >
      <div class="input-group">
		<input type="hidden" name="param" id="param" value="<?php  echo base64_encode($_SESSION['admUser']); ?>" />
        <input type="password" name="psw" id="psw" class="form-control" placeholder="password" />

        <div class="input-group-btn">
          <button type="submit" class="btn " id="relog" >  <i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div> <span class="passwordMsg">  </span>
    </form>
    <!-- /.lockscreen credentials -->
  </div>   
  <p class="login-box-msg">  <?php  echo $_SESSION['logMsg']; ?></p>
 
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">  
    <a href="logout.php"> Or sign in as a different user</a>
  </div>
  
  <p> &nbsp; </p> 
  <p> &nbsp; </p> 
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2017 <b><a href="https://dmcc.com" class="text-black"> Mayorjo Computer. </a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->


	
<?php require "footlinks.php"; ?>

<?php #unset($_SESSION['logMsg']); ?>

<script>
	
		$(function(){
			/***************/
			 // Ladda.bind( 'button[type=button]' );
			/***************/
			// $('form.lockscreen-credentials').on('submit',function(e){
			$('button#relog').on('click',function(e){
					/**********************/
					e.preventDefault();												
				
					var username = $("#param"); 		
					var password = $("#psw");		passwordMsg = $('.login-box-msg');
					 
					if(!validateEmpty(password,passwordMsg,"Enter your password")){ 							 
							passwordMsg.addClass('text-danger bold');
							return false; 
						}	
					else { 	
							var l = Ladda.create(this);
							l.start();
						/**********************/							
							var req = $.ajax({
								url : "formscript.php",
								method : "POST",
								data : { 
									relogUser:"new user", username:username.val(),password:password.val()
								},
								beforeSend:  function(){ 
									passwordMsg.show('fast');									  								 
									 passwordMsg.html('Processing Login...');
									
									// alert('sending');
							}	
					});
					
					req.fail(function(e){
						// console.log(e.status+" Failed");						 
						 l.stop();
					/**********************/	
						alert(e.status);
						});
					
						req.done(function(res){
													 
						 l.stop();
						 
							var output = $.parseJSON(res);
							 
							 if(output['psw']==false){
								 
								passwordMsg.addClass('text-danger bold');
								passwordMsg.html('Wrong Password...');
							}							 
							// now redirect 
							 if(output['user']==true && output['psw']==true){
								window.location.href = output['address'];
							 }
							
						});
				
					}
				 
				
				e.preventDefault(); 
			});
			
			
			
		});
		
		
		/*****************************************************************/ 
		   function validateEmpty(mainInput,msgInput,textWarning){
				var status = false; 
			   if(mainInput.val()==""){ 
					give_warn(mainInput,msgInput,textWarning);
					status = false; 
			   }
			   else {
				   give_success(mainInput,msgInput);
					status = true; 
			   }
			   /////////////////// 
			   return status; 
		   }
		   
		   /********************************************/
		   function give_warn(mainInput,msgInput,textWarning){
					mainInput.parent().removeClass('has-success'); 
					mainInput.parent().addClass('has-warning'); 
					msgInput.show('fast');
					msgInput.text(textWarning);
					msgInput.removeClass('text-success'); 
					msgInput.addClass('text-danger'); 
					mainInput.focus(); 
		 }
		


</script>


</body>
</html>
