
<!DOCTYPE html>
<html dir="ltr" lang="en">

<style>

.container{
    padding-left: 600px;
}

</style>
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
          


        <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Diagonise Section </li>
									
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php 
                            
                            if (isset($_GET['id'])) {
                              $patient_id = $_GET['id'];
                              $patient_no = $_GET['patient_id'];
                                // Get the patient no.
                              //echo "$patient_id";
                            }
                            ?>
                            <br>
                           <div class="card shadow col-md-6 container px-5">
                            <div class="card-header bg-success text-white">
                               <center> <h5>Sales Form</h5></center>
                            
                            </div>
                                <div class="card-body">
                                <form class="form-horizontal form-material"
                             action="receipt.php" enctype="multipart/form-data" method="post">
                               
								<div class="form-group">
                                    <label for="example-email" class="col-md-12"> <b>Money Given</b></label>
                                    <div class="col-md-12">
                                        <input type="text" name="amount_given" placeholder="Enter the amount received from the patient"
                                            class="form-control form-control-line text-right amount_given" 
                                            id="amount_given">
                                    </div>
                                </div>
                                <div align="right">
                                            <h6>
                                            
                                            
                                            <?php 
														
                                                        require "includes/conn.php";	
                                                        
                                                        $sql ="SELECT SUM(amount) as 'amount' FROM sales_order  WHERE invoice ='$patient_id' && status = '0' ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                                                        $data = mysqli_fetch_array($res);
                                                        // Get the total amount for services issued
                                                        $sql ="SELECT SUM(price) as 'price' FROM service_order  WHERE patient_no ='$patient_id'  ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                                                        $data2 = mysqli_fetch_array($res);

                                                    //Get the the sales details based on patient number
                                                        $sql ="SELECT * FROM sales WHERE invoice = '$patient_no'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $invoice =$rows['invoice'];
                                                                    $customer =$rows['customer'];
                                                                    $price =$rows['price'];
                                                                    $qty =$rows['qty'];
                                                                    $medicine_name =$rows['medicine_name'];
                                                                    
                                                                    $medicine_subtotal_price = $qty * $price;
																   
                                                               ?>
                                                    <?php
                                                                                            }

                                                                                        }
                                                                                    }
                                                                                ?>	

                                            Total Amount Due: Ksh. <br> <br> <?php 
                                $Total = $data2['price'] + $data['amount'];
                                
                                ?>
                                
                               <input type="text" id="amount_due" class="form-control amount_due text-right col-md-4 " value="<?php echo $Total;?> ">
                                            
                                            </h6>
                                             Balance <br> <br><input  class="form-control col-md-4 text-right"  name="change" type="text" id="balance" disabled>
								</div>
                                <input type="hidden" name="invoice" placeholder="Patients Id"
                                            class="form-control form-control-line" "
                                            id="example-email"
                                            value ="<?php echo $patient_id;?>"
                                            >

                                <input type="hidden" name="invoice_due" placeholder="Patients Id"
                                            class="form-control form-control-line" "
                                            id="example-email"
                                            value ="<?php echo $Total;?>"
                                            >

                                <input type="hidden" name="patient_no" placeholder="Enter the amount received from the patient"
                                            class="form-control form-control-line" "
                                            id="example-email"
                                            value ="<?php echo $patient_no;?>"
                                            >

                               
                                            
                                            <hr>
                                <div class="form-group">
                                    <div  align="left" class="col-sm-12">
                                        <button class="btn btn-success btn-block" type="submit" name="submit"><i class="mdi mdi-content-save"></i>  Save Paymeent</button>
                                    </div>
                                </div>
                                
                                
                            </form>
                                </div>
                           </div>
                           
                                    
                                
		<div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
	
  
    <script src="jquery-3.5.0.min.js"></script>

    <script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#amount_given, #amount_due").keyup(function(){

    	var total=0;    	
    	var x = Number($("#amount_given").val());
    	var y = Number($("#amount_due").val());
    	var balance=x - y;  

    	$('#balance').val(balance);

    });
});
</script>
</body>

</html>




















