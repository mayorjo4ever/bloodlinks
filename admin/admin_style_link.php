
 <?php $system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email')); ?>
 
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/iconfonts/puse-icons-feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
	
	<!-- plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
	 <link rel="stylesheet" href="../assets/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css" />
	 <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
	
    <!-- End plugin css for this page -->
	   
	<!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo_2/style.css">
	
    <!-- End Layout styles -->
  <link rel="shortcut icon" href="<?php  echo $system_info['url2'][0]."".$system_info['logo'][0]; ?>" />
  <!-- ladda-themeless -->
  <link rel="stylesheet" href="../assets/css/ladda-themeless.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../assets/css/animate.css"> 
 <!--  <link rel="stylesheet" href="../assets/css/DataTables/datatables.css"> -->
 <link rel="stylesheet" href="../assets/pace/pace-2.css">
	
 <!-- datepicker  -->	
 <link href="../assets/css/roboto.css" rel="stylesheet" /> 
 <link href="../assets/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
 
 <!-- bootstrap check toggle (switch) 
 <link href="../assets/toggle/css/bootstrap-toggle.css" rel="stylesheet">
 <link href="../assets/toggle/css/bootstrap.css" rel="stylesheet">
 -->
	
  <title> <?php  echo $this_page['title']??""; ?>  </title> 