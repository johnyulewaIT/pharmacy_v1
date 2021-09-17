<?php
session_start();
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='Purchase No-  '.createRandomPassword();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
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
                                    <li class="breadcrumb-item active" aria-current="page">Pay</li>
									
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
                                        <h4 class="card-title"> Pay </h4>  
                                    </div> 
									</div>
	<!-- =========================================================---->

    <!-------- Here we are getting the id of the invoice--------->
                                    <?php
                                                if (isset($_GET['purchase_no'])) {
                                                    // Get the values 
                                                $purchase_no = $_GET['purchase_no'];
                                                //echo "$purchase_no";
                                                //$dosage_sold = $_GET['dosage_sold'];    
                                                }
                                                ?>

	<!-- =========================================================---->
                            </div>

                            <!--- ================================================= ---> 

                           <!-- Form to submit  medicine if it is sold as a dose-->
                            <!--- ================================================= ---> 

             
                                   <!--- ================================================= ---> 

                           <!-- Form to submit  medicine if it NOT sold as a dose-->
                            <!--- ================================================= ---> 

            <form action="includes/payinvoice_inc.php" method="post" id="pay_invoice">
					<div class="col-md-12">

                    <h5><?php echo "$purchase_no";?></h5>

						<hr>
						<div class="row mb-3">

                        <div class="col-md-2 form-group">
									<label class="control-label">Date</label>
									<input type="date"  name="date" class="form-control text-right prc" id="qty" step="any" >
								</div>

								<div class="col-md-3">
                                <label class="control-label">Medicine Name</label>
                                    <?php 
										//	sql to collect the drugs available in the store where the id is the checked id
											require "includes/conn.php";			
											$sql ="SELECT * FROM purchase_order WHERE purchase_no = '$purchase_no'";
									//create a query that fetch data from the database
									$res = mysqli_query($conn,$sql);

									//check if there are any records in the database
									if ($res == TRUE) {
										$count = mysqli_num_rows($res);
										$sn=1;
										if($count > 0){
											while ($rows=mysqli_fetch_assoc($res)) {
												$purchase_id=$rows['purchase_id']; 
												 $medicine_name =$rows['medicine_name'];  
												 $total =$rows['total'];  
												 $qty =$rows['qty'];  
												 $price =$rows['price'];  
                                                											
										   ?>
                                   <input type="text" name="expiry_date" value="<?php echo $medicine_name;?>" class="form-control text-right disabled" step="any"  >
									<?php
										}

									}
								}
							?>
								</div>		

								
								<div class="col-md-2 form-group">
									<label class="control-label">Qty</label>
									<input type="number" value="<?php echo $qty;?>" name="qty" class="form-control text-right prc" id="qty" step="any" >
								</div>


                                <div class="col-md-2 form-group">
									<label class="control-label">Price</label>
									<input type="number" value="<?php echo $price;?>" name="price" class="form-control text-right prc" id="qty" step="any" >
									<input type="hidden" value="<?php echo $purchase_no;?>" name="purchase_no" class="form-control text-right prc" id="qty" step="any" >
									<input type="hidden" value="1" name="status" class="form-control text-right prc" id="qty" step="any" >
								</div>

                                <div class="col-md-3 form-group">
									<label class="control-label">Total</label>
									<input type="number" value="<?php echo $total;?>" name="total" class="form-control text-right prc" id="qty" step="any" >
								</div>

                              
						</div>

                        <div class="col-md-12 mb-3 float-right">
									<label class="control-label">&nbsp</label>
									<button class="btn btn-block btn-lg btn-success " name="submit"  value="Reload Page" 
									type="submit" id="add_list"><i class="mdi mdi-cash"></i> Pay</button>
								</div>
						</form>

                            <!--- ================================================= ---> 

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