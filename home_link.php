
<!-- Required meta tags -->
	<?php 
	 require_once 'config/config.php'; 
	 require_once "assets/php/dbTool.php"; 
	$dbm = new DbTool();
	$system_info = $dbm->getFields($dbm->select('system_info',array('')),array('theme','fa_icon','name','shortcut','address','street','logo','url','url2','date_c','year_c','c_by','manager','phone','email'));

	?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php  echo $system_info['name'][0]; ?> </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/puse-icons-feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- endinject -->
     <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
  <!-- End plugin css for this page -->
 
  <link rel="shortcut icon" href="<?php  echo $system_info['url'][0]."".$system_info['logo'][0]; ?>" />
  <!-- ladda-themeless -->
  <link rel="stylesheet" href="assets/css/ladda-themeless.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
     
	