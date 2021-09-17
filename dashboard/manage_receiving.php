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
$finalcode='Pn'.createRandomPassword();
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
                                    <li class="breadcrumb-item active" aria-current="page"> Receive Medicine</li>
									
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
                                        <h4 class="card-title"> Receive Medicine </h4>  
                                    </div> 
									</div>
	<!-- =========================================================---->

    <!-------- Here we are getting the id of the selected medicine as well as the dosage_sold values--------->
                                    <?php
                                                if (isset($_GET['id'])) {
                                                    // Get the values 
                                                $id = $_GET['id'];
                                                $dosage_sold = $_GET['dosage_sold'];    
                                                }
                                                ?>

	<!-- =========================================================---->
                            </div>

                            <!--- ================================================= ---> 

                           <!-- Form to submit  medicine if it is sold as a dose-->
                            <!--- ================================================= ---> 

                            <?php
                            if ($dosage_sold == "Yes") {
                              ?>
  <form action="manage_dosage_medicine.php" method="post" id="manage-receiving">
					
					<div class="col-md-12">
                    <p>This medicine is sold as a dose</p>
						<hr>
						<div class="row mb-3">
								<div class="col-md-4">
									<label class="control-label">Medicine Name </label>

                                    <?php 
										//	sql to collect the drugs available in the store where the id is the checked id
											require "includes/conn.php";			
											$sql ="SELECT * FROM store WHERE id = '$id'";
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
                                                $Qty=$rows['Qty']; 	
                                                $expiry_date =$rows['expiry_date'];	
												$app =$rows['app'];		
												$dosage_sold =$rows['dosage_sold'];												
												$half_dosage_price =$rows['half_dosage_price'];												
												$price_dosage =$rows['price_dosage'];												
										   ?>
                                    <input type="text" readonly name="medicine_name" value="<?php echo "$medicine_name";?>" class="form-control text-right" step="any"  >
									<?php
										}

									}
								}
							?>
								</div>
								<div class="col-md-4">
									<label class="control-label">Expiry Date</label>
									<input type="date" name="expiry_date" value="<?php echo $expiry_date;?>" class="form-control text-right" step="any"  >
									
								</div>
								
								<div class="col-md-2 form-group">
									<label class="control-label">Qty in Doses</label>
									<input type="number" name="newQty" class="form-control text-right prc" id="qty" step="any" >
								</div>
								
								<div class="col-md-2 form-group">
									<label class="control-label">Dosage</label>
									<input type="number" name="dosage" class="form-control text-right prc" id="qty" step="any" >
								</div>

								<div class="col-md-4 form-group">
									<label class="control-label">Amount Per Packate</label>
									<input type="number" name="app" readonly value="<?php echo $app;?>" class="form-control text-right prc" id="qty" step="any" >
								</div>
								
								<div class="col-md-4 form-group">
									<label class="control-label">Price Per Adult Dose</label>
									<input type="number" name="price_dosage" value="<?php echo $price_dosage;?>"  class="form-control text-right prc" id="qty" step="any" >
								</div>
								
								<div class="col-md-4 form-group">
									<label class="control-label">Price Per Child Dose</label>
									<input type="number" name="half_dosage_price" value="<?php echo $half_dosage_price;?>"  class="form-control text-right prc" id="qty" step="any" >
                                    <input type="hidden" name="old_Qty" value="<?php echo "$Qty";?>" class="form-control text-right prc" id="qty" step="any" >
                                    <input type="hidden" name="id" value="<?php echo "$id";?>" class="form-control text-right prc" id="qty" step="any" >
								</div>

						</div>
                        <div class="col-md-12 mb-3 float-right">
									<label class="control-label">&nbsp</label>
									<button class="btn btn-block btn-lg btn-success " name="submit"  value="Reload Page" 
									type="submit" id="add_list"><i class="fa fa-plus"></i> Receive</button>
								</div>
						</form>


                              <?php
                            }else {
                                ?>
                                   <!--- ================================================= ---> 

                           <!-- Form to submit  medicine if it NOT sold as a dose-->
                            <!--- ================================================= ---> 

            <form action="manage_non_dosage.php" method="post" id="manage-receiving">
					<div class="col-md-12">

                    <div class="col-md-4">
									<label class="control-label">Select Supplier</label>
									<select name="supplier" id="" class="form-control">
                                    <?php 
										//	sql to collect the drugs available in the store where the id is the checked id
											require "includes/conn.php";			
											$sql ="SELECT * FROM suppliers";
									//create a query that fetch data from the database
									$res = mysqli_query($conn,$sql);
									//check if there are any records in the database
									if ($res == TRUE) {
										$count = mysqli_num_rows($res);
										$sn=1;
										if($count > 0){
											while ($rows=mysqli_fetch_assoc($res)) {
												$supplier_id=$rows['id']; 
												 $supplier_name=$rows['supplier_name'];  
                                              											
										   ?>
                                   <option value="<?php echo $supplier_name;?>"><?php echo $supplier_name;?></option>
									<?php
										}

									}
								}
							?>
                                        
                                        
                                    </select>
								</div>

						<hr>
						<div class="row mb-3">
								<div class="col-md-4">
									<label class="control-label">Medicine Name </label>

                                    <?php 
										//	sql to collect the drugs available in the store where the id is the checked id
											require "includes/conn.php";			
											$sql ="SELECT * FROM store WHERE id = '$id'";
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
                                                $Qty=$rows['Qty']; 	
                                                $expiry_date =$rows['expiry_date'];	
												$app =$rows['app'];		
												$dosage_sold =$rows['dosage_sold'];												
												$price =$rows['price'];												
										   ?>
                                    <input type="text" name="medicine_name" value="<?php echo "$medicine_name";?>" class="form-control text-right" step="any"  >
									<?php
										}

									}
								}
							?>
								</div>

								<div class="col-md-4">
									<label class="control-label">Expiry Date</label>
									<input type="date" name="expiry_date" value="<?php echo $expiry_date;?>" class="form-control text-right" step="any"  >
								</div>
								
                                <div class="col-md-2 form-group">
									<label class="control-label">Available Qty</label>
									<input type="number" name="old_Qty"  value ="<?php echo "$Qty";?>" class="form-control text-right prc" id="qty" step="any" >
                                    <input type="hidden" name="id" value="<?php echo "$id";?>" class="form-control text-right prc" id="qty" step="any" > 
								</div>

								<div class="col-md-2 form-group">
									<label class="control-label">Qty</label>
									<input type="number" name="newQty" class="form-control text-right prc" id="qty" step="any" >
								</div>



                                <div class="col-md-3 form-group">
									<label class="control-label">Buying Price</label>
									<input type="number" value="<?php echo $price;?>"  name="price" class="form-control text-right prc" id="bprice" step="any" >
								</div>

                                <div class="col-md-3 form-group">
									<label class="control-label">Selling Price</label>
									<input type="number" value="<?php echo $price;?>"  name="sprice" class="form-control text-right prc" id="sprice" step="any" >
								</div>

                                <div class="col-md-3 form-group">
									<label class="control-label">Profit</label>
									<input type="number" name="profit" class="form-control text-right prc " disabled  id="profit" step="any" >
								</div>

                                <input type="hidden" name="status" value="0" class="form-control text-right prc" id="qty" step="any" >
                                <input type="hidden" name="purchase_no" value="<?php echo$finalcode;?>" class="form-control text-right prc" id="qty" step="any" >
						        </div>

                                <div class="col-md-12 mb-3 float-right">
									<label class="control-label">&nbsp</label>
									<button class="btn btn-block btn-lg btn-success " name="submitt"  value="Reload Page" 
									type="submit" id="add_list"><i class="fa fa-plus"></i> Receive</button>
								</div>

						</form>

                                <?php
                            }

                            ?>
                          
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

    <script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#bprice, #sprice").keyup(function(){

    	var total=0;    	
    	var y = Number($("#bprice").val());
    	var x = Number($("#sprice").val());
    	var balance=x - y;  

    	$('#profit').val(balance);

    });
});
</script>
</body>

</html>