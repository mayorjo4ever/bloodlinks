<?php 
  require "usercheck.php";  
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
  <?php require "admin_style_link.php";?>   <!-- -->

</head>
<!-- <body class="sidebar-fixed"> -->

<!-- <body class="sidebar-fixed"> -->
<body>  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <?php require "partials/_horizontal-navbar.php"; ?>
   
    <!-- partial -->
   <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php // require "sidebar_nav.php"; ?>
    
      <!-- partial -->
      <div class="main-panel container">
        <div class="content-wrapper"> 
           
     <form method="post">
     
       <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="height:auto">
                    <h4 class="card-title bold font-18"> <i class="<?php echo $this_page['icon']; ?>  text-dark "></i>  &nbsp; <?php echo $this_page['title']; ?> </h4> 
          <ul class="nav nav-tabs tab-solid tab-solid-info" role="tablist">
             
              <li class="nav-item">
              <a class="nav-link active " id="tab2" data-toggle="tab" href="#stock-tab2" onclick="show_available_blood_for_sale()" role="tab" aria-controls="stock-tab2" aria-selected="false"> Available Bloods </a>
              </li> 

                <li class="nav-item">
              <a  class="nav-link " id="tab1" data-toggle="tab" href="#stock-tab1" role="tab" aria-controls="stock-tab1" aria-selected="false" onclick="show_blood_sales()"> Blood Sales  </a>
              </li>    <!-- add event --   -->
              

          </ul> 
           
                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade  " id="stock-tab1" role="tabpanel" aria-labelledby="stock-tab1">
                        <div class="row">         
                         <div class="col-md-6" style="float:left;">
                           <form method=""> 
                          <div class="form-group text-capitalize" id="fm20" > 
                            <div class="input-group border-1 " title="Search Store Items ">
                            <input style="font-size:16px; height:45px;" autocomplete="false" type="text" id="query" name="query"  class="form-control border-primary" placeholder="Search Store Items ... ">
                            <div class="input-group-append">
                              <button style="font-size:16px; height:45px;" class="btn btn-icons btn-primary search_drug_forms"  id="search_drug_forms" name="search_drug_forms"> <i class="fa fa-search text-white"></i></button>
                            </div>
                            </div>            
                          </div> <!-- ./  form-group -->             
                          </form> 
                        </div> <!-- ./ col-md-6  -->
                        
              <div class="col-md-12"> <hr/> </div> <!-- ./ col-md-12  -->
              
              <div class="col-md-10"> 
                <h4 class="card-title bold text-capitalize font-16"> search result &nbsp;   </h4> 
                <div class="stock-search-result">
                  <!-- results displayed here -->         
                </div>                      
              </div> <!-- ./ col-md-12  --> 
              
                          </div> <!-- ./ row -->
                        
                      </div> <!-- ./ tab-pane -->
            
                      <div class="tab-pane fade show active " id="stock-tab2" role="tabpanel" aria-labelledby="stock-tab2"> 
             <div class="row">  
              <div class="col-md-12">                
                 
                 <div class="all_item_cart">  </div>
                
              </div>  <!-- ./ col-md-12  -->
                          </div> <!-- ./ row -->
           </div>
                     
           
                    </div> <!-- ./ tab-content -->
                  </div> <!-- ./ card-body -->
                </div> <!-- ./ card -->
              </div> <!-- ./ col-md-12 -->
          </div><!-- ./ row -->
      
       
        
     </form>
          
        </div>  <!-- content-wrapper ends -->
       
        <!-- partial:partials/_footer.html -->
         
       <?php require "footer.php"; ?>
     
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
   <!-- container-scroller -->
  <?php require "admin_js_links.php"; ?>
  
    <script src="../assets/js/stock_product_scripts_2.js"></script>
  
</body>

<?php require "modals.php"; ?>

  <script>
      $(function(){
        // display_item_cart($('.all_item_cart'));

         show_available_blood_for_sale(); 
        
      }); 
      
       function show_available_blood_for_sale(){
              var spin =  "<i class='fa fa-spinner fa-spin fa-3x'></i>";  
              var elem = $("div.all_item_cart");
              var req = $.ajax({ 
                    url:"formsubmit.php", data:{ show_available_blood_for_sale:'this'}, method:"POST",beforeSend:function(){  elem.html(spin); }}); 
                    req.fail(function(e){ console.log(" --- "+e.status+" Failed"); loader('hide'); });
                    req.done(function(res){ loader('hide');   // alert(res);    
                      elem.html(res);
                  });   

            }

       
        function loader(disp_type='show'){
              if(disp_type=='show') { $('p.loader').show(); $('span.loader').addClass('fa fa-spinner fa-spin fa-3x'); }
              if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('fa fa-spinner fa-spin fa-3x'); }
              // if(disp_type=='hide') { $('p.loader').hide(); $('span.loader').removeClass('mdi mdi-loading mdi-spin fa-3x'); }
            }
      
  </script>
  
</html>