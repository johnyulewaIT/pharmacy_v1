
<!DOCTYPE html>
<html dir="ltr" lang="en">
    
<?php
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
$finalcode='WAKA-'.createRandomPassword();
?>

<?php 
session_start();
require "includes/head.php";
require "includes/auth.php";

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
                                    <li class="breadcrumb-item active" aria-current="page">Issue Medicine </li>
									
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
                                        <h4 class="card-title">Issue Medicine </h4>  
                                    </div> 
									</div>
                                <!-- title -->
								<?php 
									if(isset($_POST['submit'])){
										$medicine_id = $_POST['checked'];
										$invoice = $_POST['invoice'];		
										$patient_id = $_POST['patient_id'];		
									}
								?>
                            </div>
                            <form action="sales.php" method="post" id="manage-sales">
					
							<div class="col-md-12">
								<div class="row">
                                <div class="form-group col-md-5">
                                    <label class="control-label">Patient Name</label>
                                        <?php 
														
                                                        require "includes/conn.php";	
                                                        $sql ="SELECT * FROM patients WHERE id = '$patient_id'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $id=$rows['id'];
                                                                    $patient_name=$rows['patient_name'];
                                                                    $patient_no=$rows['patient_no'];
                                                                    $location=$rows['location'];
                                                                    $dob=$rows['dob'];
                                                                    
                                                               ?>
										<input readonly type="text" name="patient_name" value="<?php echo $patient_name;?>" class="form-control text-right" step="any" id="service_name" >
                                        <?php
										}

									}
								}
							?>	
									</div>

                                    <div class="form-group col-md-3">
										<label class="control-label">Patient Number</label>
										<input readonly type="text" name="patient_no" value="<?php echo $patient_id;?>" class="form-control text-right" step="any" id="qty" >
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Patient DOB</label>
										<input readonly type="text" name="dob" value="<?php echo $dob;?>" class="form-control text-right" step="any" id="qty" >
									</div>
								</div>
								
								<hr>
								<div class="row mb-3">
								<div class="col-md-6">
											<label class="control-label"><b>Medicine Name</b></label>
											<?php 
														
														require "includes/conn.php";
														
																	  $sql ="SELECT * FROM pharmacy_stock WHERE id = '$medicine_id'";
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
											$dosage_sold=$rows['dosage_sold'];
                                            $expiry_date= $rows['expiry_date'];
                                            $price_dosage= $rows['price_dosage'];
											$half_dosage_price= $rows['half_dosage_price'];
                                            $dosage=$rows['dosage'];
											
                                            if ($dosage_sold == "Yes") {
                                                $medicine_price = $price_dosage;
                                            }else {
                                                $medicine_price = $price;
                                            }

									   ?>
											<input type="text"  value="<?php echo $medicine_name;?> || <?php echo $capacity;?> || Expiry Date: <?php echo $expiry_date;?> " class="form-control text-right" step="any" id="qty" readonly >
											<input type="hidden" name="medicine_name" value="<?php echo $medicine_name;?> " class="form-control text-right" step="any" id="qty" readonly >
											
											<input type="hidden" name="pharmacy_Qty" value="<?php echo $pharmacy_Qty;?>">
											 <?php
										}

									}
								}
							?>
										</div>
                                        <div class="col-md-2"><br>
									<p class="bg-warning">
                                <?php 
                                
                                if ($dosage_sold == "Yes") {
                                    echo "A dosage is available for Children";
                                }else {
                                    echo "No dosage is available for Children";
                                }
                                ?></p>	
											</div>
                                            <div class="col-md-2"><br>
										<label class="control-label"><b>Child</b></label><br>
										<input type="radio" name="child_dose_price" value="Yes"> Yes
											<input type="radio" name="child_dose_price" value="No" checked> No
											</div>

												
												
										<div class="col-md-2">
											<label class="control-label"><b>Qty</b></label>
											<input type="number" name="qty" class="form-control text-right" step="any" id="qty" >
											<input type="hidden" name="invoice" value="<?php echo $patient_no;?>" class="form-control text-right" step="any" id="qty" >
											<input type="hidden" name="price" value="<?php echo $medicine_price;?>" class="form-control text-right" step="any" id="qty" >
											<input type="hidden" name="half_dosage_price" value="<?php echo $half_dosage_price;?>" class="form-control text-right" step="any" id="qty" >
											<input type="hidden" name="dosage_sold" value="<?php echo $dosage_sold;?>" class="form-control text-right" step="any" id="qty" >
											<input type="hidden" name="app" value="<?php echo $app;?>" class="form-control text-right" step="any" id="qty" >
											<input type="hidden" name="dosage" value="<?php echo $dosage;?>" class="form-control text-right" step="any" id="qty" >
											<input type="id" name="id" value="<?php echo $id;?>" class="form-control text-right" step="any" id="qty" >
										</div>
										<div class="col-md-12">
											<label class="control-label">&nbsp</label>
											<button class="btn btn-block btn-block btn-success" name="submit" type="submit"><i class="fa fa-plus"></i> Issue Medicine</button>
										</div>
								</div>
						</form>
				
                           
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