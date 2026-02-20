<?php   
  require_once("usercheck.php");
  require_once("formsubmit.php"); 
  require "../vendor/autoload.php"; use Carbon\Carbon; 

  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
         <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   <!-- 
         <link rel="stylesheet" href="../assets/vendors/icheck/skins/all.css">
         <link rel="stylesheet" href="../assets/css/berlin-font/berlin.ttf">  -->
      <style>
         .cosmo { font-family:Comic Sans MS; font-size:14px; }
         .border-none{ border:none; }
         .table tr, table thead td, table td, table thead th, table th {
         border:1px solid #fff; margin:5px; padding:5px; 
         line-height:5px; 
         }  
         .bg-header img{
         width:100%; height:100%; no-repeat; 
         }
        

         .table>tbody>tr>td,
         .table>tbody>tr>th,
         .table>tfoot>tr>td,
         .table>tfoot>tr>th,
         .table>thead>tr>td,
         .table>thead>tr>th{
         padding:8px;line-height:1.42857143;vertical-align:top;border-top:0px solid #fff;
         font-size: 16px;
         }
         .table-btop>tbody>tr:first-child>td,
         .table-btop>tbody>tr:first-child>th,
         .table-btop>tfoot>tr:first-child>td,
         .table-btop>tfoot>tr:first-child>th,
         .table-btop>thead>tr:first-child>td,
         .table-btop>thead>tr:first-child>th{
         padding:8px;line-height:1.42857143;vertical-align:top;border-top:2px solid #000;
         }
         .dark-top-border td, { border-top:2px solid #000; }
         .dark-bottom-border td{ border-bottom:2px solid #000; }
         span.dark-top-border { border-top:1px solid #000; width:100%; display:block; }
         span.dark-bottom-border { border-bottom:1px solid #000; width:100%; display:block; }
         .bordered-dark-px{ border-top:2px solid #000;}
         @media print{
         .table-striped tbody tr:nth-of-type(even) {
         background-color: #f2f2f2; }
         }
         .table-striped tbody tr:nth-of-type(even) {
         background-color: #f2f2f2; }
         .content-wrapper {
         background:#fff;  /** #f3f4fa; **/
         padding: none; /** 1.5rem 1.7rem; **/
         width: 100%;
         -webkit-box-flex: 1;
         -ms-flex-positive: 1;
         flex-grow: 1; 
         }
         /* Footer */
         .footer {
         background: #FFF; /** #f3f4fa; **/ 
         padding: 4px 1rem;
         transition: all 0.25s ease;
         -moz-transition: all 0.25s ease;
         -webkit-transition: all 0.25s ease;
         -ms-transition: all 0.25s ease;
         border-top: 0px solid #FFF; /** 1px solid #f2f2f2; **/
         font-size: calc(0.875rem - 0.05rem); 
         font-family: "Poppins", sans-serif; 
         }
         .container {
         width: 100%;
         padding-right: none; /** 12.5px;  **/
         padding-left:  none; /** 12.5px;  **/
         margin-right: auto;
         margin-left: auto; }
         .container-fluid {
         width: 100%;
         padding-right: none; /** 12.5px;  **/
         padding-left: none; /** 12.5px;  **/
         margin-right: auto;
         margin-left: auto; }
         .table tr.no-padding td {padding-top:0px; padding-bottom:0px; }
         .table tr.no-margin td {margin-top:0px; margin-bottom:0px; }
         .no-side-margin {margin-left:0px; margin-right:0px;  padding-left:0px; padding-right:0px;}
         @mdedia print{
         .no-side-margin { margin-left:0px; margin-right:0px; padding-left:0px; padding-right:0px; }
         }
          .bg-transparent{
            background-color: transparent;
            border:none;
         }

         body{
               background-image: url('../assets/images/auth/bg-printer.jpg');
               background-size: cover;
               background-position: center;
               background-repeat: no-repeat;
               height: 100vh;

         }
      </style>
</head>
<!-- <body class="sidebar-fixed"> -->
<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <?php # require "partials/_horizontal-navbar.php"; ?>
   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php // require "sidebar_nav.php"; ?>
    
      <!-- partial -->
      <div class="main-panel container">
        <div class="content-wrapper">  
     
        
     <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">        
                
                <?php 
                  $ticket_no = $dbm->clean(base64_decode($_REQUEST['r_val'])); # $spec_code = explode(',',$_REQUEST['spc']); // specimen code : yes
                  ## validate 
                  $criterial = array('ticket_no'=>$ticket_no,'status'=>'active');
                 $criterial = array('ticket_no'=>$ticket_no,'status'=>'active');
                  $custom_info =  $dbm->select('customer_tickets',$criterial);
                   if(empty($custom_info)) { echo "<script> alert('Invalid Parameters'); window.location.href='tickets.php';  </script> ";
                   }
                  # else $custom_info[0] = $dbm->resort($custom_info);
                  # print_r($custom_info[0]); 
                   ?>

        
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-4 text-center"> <img src="../assets/images/login_2.jpg" class="no-print" style="height:160px"></div>
            <div class="col-sm-8"><?php $branch = $mydbm->runBaseQuery("select branch_address from system_info"); echo $branch[0]['branch_address']; ?></div>
          </div> 

          <div class="row mt-4">
          <div class="col-md-12">  
              <div style="border:2px solid #aaa; border-radius: 20px; padding: 10px 10px 20px 10px; margin-bottom: 20px;">
               <table class=" table-nogap table text-primary border-none line-35" > <!-- cosmo -->
                    <tbody>
                       <tr class="text-capitalize no-padding no-margin">
                          <td class="font-18" > Patient's Name :&nbsp;&nbsp;<span class="font-20 text-dark">  <?php echo $custom_info[0]['fullname']; ?>   </span> </td>
                          <td colspan=""> Investigation Name :<span class="font-20 text-dark">  &nbsp;&nbsp; &nbsp;&nbsp;CROSSMATCH (FULL)  </span>  </td> 
                       </tr>
                       <tr class="text-capitalize no-padding no-margin ">
                         <td> Gender : &nbsp;&nbsp; <span class=" font-20 text-dark">  <?php echo $custom_info[0]['sex']; ?></span>  </td>
                          <td colspan="">Registered Date / Time  :<span class="font-20 text-dark">&nbsp;&nbsp; &nbsp;&nbsp;<?php echo Carbon::parse($custom_info[0]['date_c'])->toDayDateTimeString();?> </span></td>
                       </tr>

                       <tr class="text-capitalize no-padding no-margin ">
                        <td>  Age :&nbsp;&nbsp;<span class="font-20 text-dark"> <?php echo getAge($custom_info[0]['age_text'],$custom_info[0]['date_c']); ?>  </span>  </td>
                          <td colspan="">Report Date : <span class="font-20 text-dark"> &nbsp;&nbsp; &nbsp;&nbsp;<?php echo Carbon::parse($custom_info[0]['date_fin'])->toDayDateTimeString(); ?>  </span> </td>
                       </tr>
                       <tr class="text-capitalize no-padding no-margin">
                         
                       </tr>
                       <!-- <tr class="text-capitalize "> <td colspan="3">  <span class="bold"> <?php echo " print option  :  ".base64_decode($_REQUEST['pop'])." , serial  &nbsp;&nbsp;  ".base64_decode($_REQUEST['bsr']); ?></span> &nbsp;&nbsp;</td>  </tr>-->
                    </tbody>
                 </table>
                </div>
             

              <div style="border:2px solid #aaa; border-radius: 20px; padding: 10px 10px 10px 10px; margin-bottom: 30px;">
               <table class=" table-nogap table text-primary border-none line-35" > <!-- cosmo -->
                    <tbody>
                       <tr class="text-capitalize no-padding no-margin">
                          <?php $med_history = $mydbm->runBaseQuery("select count(ticket_no) as visits, date_c as last_date from customer_tickets where customer_id='".$custom_info[0]['customer_id']."' order by sn desc");?>
                          <td class="font-18" > Medical History :&nbsp;&nbsp;<span class="font-20 text-dark">  <?php echo ordinal($med_history[0]['visits'],true)." time"; ?>   </span> </td>
                          <td class="font-18" > Sample Collected:&nbsp;&nbsp;<span class="font-20 text-dark">  Blood  </span> </td>
                          <td class="font-18" > Internal ID No. :&nbsp;&nbsp;<span class="font-20 text-dark">  <?php echo $custom_info[0]['ticket_no']; ?>   </span> </td>
                          
                       </tr>
                       <!-- <tr>
                        <td><?php # print_r($med_history); ?></td>
                       </tr> -->
                      </tbody>
                    </table>
                  </div>
                <?php 
                
                display_purchase_result ($custom_info[0]['customer_id'],$custom_info[0]['ticket_no']);

             ?>
          </div>
          </div>
                </div>  <!--  ./ card-body -->   

              </div>   <!--  ./ card -->  
            </div>
        
      
          </div> <!-- ./ row --> 
            
       
       
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      <?php $bg_image = $dbm->resort($dbm->getFields($dbm->select('system_info',array('')),array('signatory_image','manager'))); ?>
      <?php  require "tick_footer.php"; ?>
     
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php require "admin_js_links.php"; ?>
  
  <script>
  
  </script>
  <script src="../assets/js/lab_rep_script.js"></script>
  
</body>

</html>