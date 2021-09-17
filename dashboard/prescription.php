
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
session_start();
require "includes/head.php";
require "includes/auth.php";

?>

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
                                        <h4 class="card-title">Patients Particulars </h4>  
                                    </div> 
									</div>
                                <!-- title -->
								
                            </div>
                            <?php 
                          
                            if (isset($_GET['id'])) {
                                $_SESSION ['invoice'] = $_GET['invoice'];
                                $_SESSION ['sessionId'] = $_GET['id'];
                               $patient_id = $_SESSION ['sessionId'];
                               $invoice = $_SESSION ['invoice'];
                               
                            }
                            ?>
					
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
										<input readonly type="text" name="service_name" value="<?php echo $patient_name;?>" class="form-control text-right" step="any" id="service_name" >
                                        <?php
										}

									}
								}
							?>	
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Patient Number</label>
										<input readonly type="text" name="patient_no" value="<?php echo $patient_no;?>" class="form-control text-right" step="any" id="qty" >
										
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Patient DOB</label>
										<input readonly type="text" name="invoice" value="<?php echo $dob;?>" class="form-control text-right" step="any" id="qty" >
									</div>
								</div>
								<h5>Add Medicine Prescribed</h5>
								<hr>
                                <form method="post" action="pos.php"  id="output">
										<div align="center">
										<input type="submit" value="Click to Continue" name="submit" class="btn btn-success">
										</div>
          
										<br>
								</div>
                                <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th class="border-top-0">Check</th>
                                            <th class="border-top-0">Medicine Name</th>
                                            <th class="border-top-0">Stock Available</th> 
                                            <th class="border-top-0">Price</th> 
                                            <th class="border-top-0">Amount</th> 
                                            <th class="border-top-0">Expiry Date</th>
                                            
  
                                        </tr>
                                    </thead>
                                    <?php 
											
                                                        $sql ="SELECT * FROM pharmacy_stock ";
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
                                                                    $expiry_date=$rows['expiry_date'];
                                                                    $expiry_date=$rows['expiry_date'];
                                                                   $dosage_sold=$rows['dosage_sold'];
                                                                   $dosage=$rows['dosage'];
                                                                   $price_dosage=$rows['price_dosage'];
                                                                   $dosage_sold=$rows['dosage_sold'];
																   $app=$rows['app'];
																   
                                                               ?>


                                    <tbody>
                                        <tr>
                                        <th scope="row"><input type="checkbox" name="checked" value="<?php echo "$id";?>" />
                                        <input  type="hidden" readonly class="form-control"  value="<?php echo "$invoice";?>" name="invoice">
                                        <input  type="hidden" readonly class="form-control"  value="<?php echo "$patient_id";?>" name="patient_id">
                                        </th>
                                            <td><?php echo $medicine_name; ?></td>
                                            <?php 
                                            if ( $dosage_sold =="Yes") {

                                            if ($pharmacy_Qty < 2) {
                                                ?>
                                                <td class='text-white text-bold bg-danger'><?php echo $pharmacy_Qty ?></td>
                                              <?php
                                            }else {
                                                ?>
                                                <td class=' text-bold '><?php echo $pharmacy_Qty ?></td>
                                              <?php
                                            }
                                          
                                           }else {
                                               if ($pharmacy_Qty < 2) {
                                                ?>
                                            
                                                <td class='text-white text-bold bg-danger'><?php echo $pharmacy_Qty  ?></td>
                                              <?php
                                               }else {
                                                ?>
                                            
                                                <td class=' text-bold '><?php echo $pharmacy_Qty  ?></td>
                                              <?php
                                               }
                                           
                                           }
                                            
                                            ?>
                                            </td>
                                            <?php 
                                           if ($dosage_sold == "Yes") {
                                              
                                          ?>
                                                    <td class=' text-bold '><?php echo $price_dosage?> </td>
                                          <?php
                                           }else {
                                            ?>
                                               <td><?php echo $price; ?></td>
                                            <?php
                                           }
                                            
                                            ?>

                                            <?php 
                                           if ($dosage_sold == "Yes") {
                                              
                                          ?>
                                                    <td class=' text-bold '><?php echo $price_dosage * $pharmacy_Qty ?> </td>
                                          <?php
                                           }else {
                                            ?>
                                             <td><?php echo $price * $pharmacy_Qty; ?></td>
                                            <?php
                                           }
                                            
                                            ?>

                                          
                                            <td><?php echo $expiry_date; ?></td>                                    
                                            
                                        </tr>                     
                                    </tbody>

                                    <?php
										}

									}
								}
							?>		

                                </table>
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
		<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'action2.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>


	
</body>

</html>




















