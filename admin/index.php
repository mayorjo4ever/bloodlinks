<?php 
   require "usercheck.php";   include_once './formsubmit.php';
   
   ## auto set current date for today 
   $chart_year = date('Y');
   if(!isset($_SESSION['today']))  {  $today = new DateTime("today"); $_SESSION['today'] =  $today = $today->format('Y-m-d'); }
   if(isset($_POST['change_order_date'])){
   	$today = $_POST['recent_order_date'];
   	$today = new DateTime("$today");  $_SESSION['today'] = $today = $today->format('Y-m-d');
   }
      
   if(isset($_POST['change_chart_year'])){
   	$chart_year = $_POST['chart_year'];
   	 
   }

   ## print "<pre>";
   ## print_r(get_week_payment($_SESSION['today']));
   ## print "</pre>"; 
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <?php require "admin_style_link.php";?>   
      <link rel="stylesheet" href="../assets/css/calendar_widget.css" >
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_horizontal-navbar.html -->
         <?php require "partials/_horizontal-navbar.php"; ?>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <div class="main-panel container">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-12 grid-margin d-none d-lg-block">
                        <div class="intro-banner">
                           <div class="banner-image">
                              <img src="../assets/images/dashboard/banner_img.png" alt="banner image"> 
                           </div>
                           <div class="content-area">
                              <h3 class="mb-0">Welcome back, <?php echo $_SESSION['adminFullname'];?>!</h3>
                              <p class="mb-0">If you need any support, contact your administrator to put you through.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ./ row  -->
                  <?php if($_SESSION['my_cur_role_id']=="superb") require "partials/index-stats.php";  ## index-statistics.php ?>
                  <?php if($_SESSION['my_cur_role_id']=="superb") { ?>
                  <div class="row">
                     <div class="col-sm-12 col-md-6 col-lg-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-7">
                                    <?php $week_payment  = get_week_payment($_SESSION['today']); ?>
                                    <h4 class="card-title font-weight-medium mb-3">Week <?php echo $week_payment['weekno']." :: ".$week_payment['week']; ?></h4>
                                    <h3 class="font-weight-bold mb-0">NGN <?php echo number_format($week_payment['paid']);?></h3>
                                    <p class="text-muted font-weight-medium">Amounts Collected </p>
                                    <p class="mb-0">Payment for this week</p>
                                 </div>
                                 <div class="col-md-5 d-flex align-items-end mt-4 mt-md-0">
                                    <canvas id="conversionBarChart" height="150"></canvas>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 grid-margin stretch-card">
                        <div class="card card-statistics">
                           <div class="card-body pb-0">
                              <p class="text-muted">Total Cost For The Week </p>
                              <div class="d-flex align-items-center">
                                 <h4 class="font-weight-semibold">NGN <?php echo number_format($week_payment['cost']);?></h4>
                              </div>
                              <small class="text-muted bold">Discount : NGN <?php echo number_format($week_payment['discount']);?></small>
                           </div>
                           <canvas class="mt-2" height="40" id="statistics-graph-2"></canvas>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 grid-margin stretch-card">
                        <div class="card card-statistics">
                           <div class="card-body pb-0">
                              <p class="text-muted">Balance For The Week </p>
                              <div class="d-flex align-items-center">
                                 <h4 class="font-weight-semibold">NGN <?php echo number_format($week_payment['balance']);?></h4>
                              </div>
                              <small class="text-muted bold">Refunds: NGN <?php echo number_format($week_payment['refund']);?> </small>
                           </div>
                           <canvas class="mt-2" height="40" id="statistics-graph-3"></canvas>
                        </div>
                     </div>
                     <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-12 d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                       <h5 class="card-title text-uppercase font-weight-bold h5"> <span class="badge bdge-primary font-16"> Payment summary FOR THE YEAR &nbsp; <?php echo $chart_year; ?></span>  </h5>
                                       <div class="wrapper ml-auto action-bar">
                                          <div class="dropdown">
                                             <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <select name="chart_year" class="form-control font-16" style="width:150px">
                                                         <?php for($y = date('Y'); $y>=2022; $y--){?>
                                                         <option value="<?php echo $y; ?>" <?php echo ($chart_year==$y)?"selected ":""?> >Year&nbsp;<?php echo $y; ?></option>
                                                         <?php }?>
                                                      </select>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <button class="btn btn-secondary btn-md btn-icons" name="change_chart_year">Go</button>
                                                   </div>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                    <canvas class="my-4 my-md-0 mt-md-auto " id="realtime-statistics" height="200"></canvas>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title text-uppercase"> <span class="badge bdge-primary font-16"> expected Payment FOR THE YEAR&nbsp;<?php echo $chart_year; ?></span> </h4>
                              <canvas id="areaChart" style="height:250px"></canvas>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title bold"><?php echo $chart_year;?> Payment Summary </h4>
                              <?php  $payment = payment_summary($chart_year); ?>
                              <span class="small ">Amount Paid :<b>N <?php echo number_format($payment['paid']??0);?></b></span><br/>
                              <span class="small ">Balance : <b>N <?php echo number_format($payment['balance']??0);?></b></span> &nbsp; 
                              <span class="small ">Discount : <b>N <?php echo number_format($payment['discount']??0);?></b></span>
                              <div id="c3-donut-chart"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <div class="row"> 			
                     <?php 
                        # $months = get_months('2022');
                        #$money = expected_pays('2021');
                        # $money = amounts_paid('2021');
                        # print_r($money); 
                        
                        
                        // print_r($week_dates);
                         // print_r($week_payment['dpaid']);
                         // echo number_format(array_sum($week_payment['dpaid']));
                        
                        ?> 
                  </div>
                  <!-- <pre> </pre> -->
                  <div class="row">
                     <?php if($_SESSION['my_cur_role_id']=="superb") require "partials/activity_timeline.php"; ?>
                  </div>
                  <?php if(in_array($_SESSION['my_cur_role_id'],['consultant','superb'])) 
                    # require "partials/consultant_tasks.php";  ## index-statistics.php ?>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->
               <?php require "footer.php"; ?>
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <?php require "admin_js_links.php"; ?> 
      <script src="../assets/js/calendar_widget.js"> 	</script>
      <?php include "widget_script.php"; ?>
      <script>
         $(function() {
          $('#togs').change(function() {
         console.log('Toggle: ' + $(this).prop('checked'));				
         });
         
         $('table.dataTable').dataTable();
         });
                     
            function download_results(ticket_no,type=''){ 
               specimens = []; 
               $("input:checkbox.specimen_results_check:checked").each(function() {
               specimens.push($(this).val());
               });
               if(specimens.length==0){ swal({title:'Select Any One or More Result To View',icon:'error'}); }
               else {
                $(this).target = "_blank";
               /// var url = "tick_result_part_print.php?r_val="+ ticket_no+'&spc='+specimens;
                var url = (type=="excel")?"tick_excel_result_part_dnld.php?r_val=":"tick_result_part_comment.php?r_val=";
                                                url += ticket_no+'&spc='+specimens;
               // window.open($(this).prop('href'));
               $("input:checkbox.specimen_results_check").iCheck('uncheck');
               window.open(url);// part_prints

               }
         }
         
        
      </script>
   </body>
   <?php 
      ?>
</html>
