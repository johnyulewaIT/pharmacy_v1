
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
require "includes/head.php";
	session_start();
?>


<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php require "includes/header.php"?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php require "includes/aside.php";?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Medicine Form </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
              
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Medicine</h4>
                            <h6 class="card-subtitle">Use this form to Add Medicine</h6>
                        </div>
                        <div class="table-responsive">
                        <div class="col-lg-12 ">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal form-material"
                             action="includes/add_medicine_inc.php" enctype="multipart/form-data" method="post">

                             <?php
                                if(isset($_POST['submit'])){
                                    //echo "Was clicked";
                                    
                                    $medicine_name = $_POST['medicine_name'];
                                    $capacity = $_POST['capacity'];
                                    $type = $_POST['type'];
                                   
                                    
                                }
                                        ?>
                                            <div class="form-group">
                                                    
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="medicine_name" placeholder="Enter Medicine Name"
                                                            class="form-control form-control-line" "
                                                            id="example-email"
                                                            value="<?php echo $medicine_name;?>"
                                                            >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                   
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="type" placeholder="Enter Medicine Type e.g Tablet"
                                                            class="form-control form-control-line" "
                                                            id="example-email"
                                                            value="<?php echo $type;?>"
                                                            >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                  
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="capacity" placeholder="Enter the capacity of the Item e.g. 250gms"
                                                            class="form-control form-control-line" 
                                                            id="example-email"
                                                            value="<?php echo $capacity;?>"
                                                            >
                                                    </div>
                                                </div>

                                        <?php


                               
                             ?>
                               
                              <?php
                                     
                                   if (isset($_POST['submit'])) {
                                    $dosage_sold = $_POST['dosage_sold'];
                                   }
                                     
                                     if ($dosage_sold =="Yes") {
                                         ?>
                                         

                                              <div class='form-group'>
                                                        <label for='example-email' class='col-md-12'><b>Dosage</b> </label>
                                                        <div class='col-md-12'>
                                                            <input type='number' name='dosage' placeholder='Enter the Dosage for the Medicine'
                                                                class='form-control form-control-line' 
                                                                id='example-email'>
                                                        </div>
                                                    </div>
                    
                                                    <div class='form-group'>
                                                        <label for='example-email' class='col-md-12'><b>Amount Per Packet</b> </label>
                                                        <div class='col-md-12'>
                                                            <input type='number' name='app' placeholder='Enter the number of medicine in one packet '
                                                                class='form-control form-control-line' 
                                                                id='example-email'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='example-email' class='col-md-12'><b>Price per Full dosage</b> </label>
                                                        <div class='col-md-12'>
                                                            <input type='number' name='price_dosage' placeholder='Enter Amount Per Packet '
                                                                class='form-control form-control-line' 
                                                                id='example-email'>
                                                        </div>
                                                    </div>
													
													<div class='form-group'>
                                                        <label for='example-email' class='col-md-12'><b>Price per Half dosage</b> </label>
                                                        <div class='col-md-12'>
                                                            <input type='number' name='half_price_dosage' placeholder='Enter Full Dose Price '
                                                                class='form-control form-control-line' 
                                                                id='example-email'>
																<input type="hidden" name="dosage_sold" placeholder="Enter the capacity of the Item e.g. 250gms"
                                                            class="form-control form-control-line" 
                                                            id="example-email"
                                                            value="<?php echo $dosage_sold;?>"
                                                            >
                                                        </div>
                                                    </div>
                                         <?php
                                     }else {
                                        ?>
                                            <div class='form-group'>
                                                  <label for='example-email' class='col-md-12'><b>Price</b> </label>
                                                  <div class='col-md-12'>
                                                      <input type='number' name='price' placeholder='Enter Price'
                                                          class='form-control form-control-line' 
                                                          id='example-email'>
                                                  </div>
                                              </div>
                                        <?php
                                     }
                                     
                                     ?>
                               
    
								

                                 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                            


                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
           
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved 
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>

