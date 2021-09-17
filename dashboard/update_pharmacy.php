
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
session_start();
require "includes/head.php";
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
                                    <li class="breadcrumb-item active" aria-current="page">Add Damaged Medicine</li>
									
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
              
                   <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->

                               
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title"> Add Damaged Medicine </h4>  
                                    </div> 
									</div>
													<?php
								if (isset($_GET['id'])) {
									// Get the values 
								   $id = $_GET['id'];
								 

								}
							?>
									<form class="form-horizontal form-material" action="includes/update_pharmacy_stock.php" method="post">
                                   <?php 
														
														require "includes/conn.php";
														
										$sql ="SELECT * FROM pharmacy_stock WHERE id = '$id'";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);

								//check if there are any records in the database
								if ($res == TRUE) {
									$count = mysqli_num_rows($res);
									$sn=1;
									if($count > 0){
										while ($rows=mysqli_fetch_assoc($res)) {
											$id=$rows['id'];
											$medicine_name=$rows['medicine_name'];
											$type=$rows['type'];
											$capacity=$rows['capacity'];
											$pharmacy_Qty=$rows['pharmacy_Qty'];
											$price=$rows['price'];
											$amount=$rows['amount'];
											$expiry_date= $rows['expiry_date'];
									   ?>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">

                                                <label for="example-email" class="col-md-4">Medicine Name</label>
                                                <input type="text"
                                                class="form-control form-control-line"  value="<?php echo $medicine_name?>" 
                                                name="medicine_name"
                                                id="example-email">
                                                </div>

                                                <div class="col-md-4">
                                                <label for="example-email" class="col-md-4">Stock Available</label>
                                                <input type="text"  value="<?php echo $pharmacy_Qty?>"
                                                name="pharmacy_Qty"
                                                class="form-control form-control-line" 
                                                id="price">
                                                </div>

                                                <div class="col-md-4">
                                                <label for="example-email" class="col-md-4">Quanitity Damaged</label>
                                                <input type="text" name="Qty_damaged" value=""
                                                class="form-control form-control-line" 
                                                id="price"
                                                placeholder="Enter the no. of medicine damaged"
                                                >

                                                <input type="hidden" name="price" value="<?php echo $price;?>"
                                                class="form-control form-control-line" 
                                                id="price"
                                                placeholder="Enter the no. of medicine damaged"
                                                >
												
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
									
									
									 <?php
										}

									}
								}
							?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="id" value="<?php echo $id?>">
                                            <button class="btn btn-success btn-block" type="submit" name="submit" >Update Medicine Stock</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- title -->
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

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