
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
                        <h4 class="page-title">Purchase Report </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Purchase Report </li>
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
                                        <h4 class="card-title">Purchase Report </h4>
                                    </div>
                                    
                                    <div class="ml-auto">
                                      <a href="purchase_report.php" class="btn btn-success">Print Report</a> 
                                      <a href="purchase_report.php" class="btn btn-success">Download CSV</a> 
                                    </div>

                                </div>
                                
                                <!-- title -->
                            </div>
                           
                            <div class="table-responsive">
<center>
<form action="" method="post" id="manage-receiving">
					
					<div class="col-md-12 align-center">
                    <p>Get the Purchases Transactions between Dates</p>
						<hr>
						<div class="row mb-3">

								<div class="col-md-4">
									<label class="control-label">As from Date</label>
									<input type="date" name="start_date"  class="form-control text-right" step="any"  >	
								</div>
								<div class="col-md-4">
									<label class="control-label">To  Date</label>
									<input type="date" name="end_date"  class="form-control text-right" step="any"  >	
								</div>
                                <div class="col-md-4 ">
                                <label class="control-label">&nbsp</label>
                                <button type="submit" class="btn btn-success btn-block" name="search">Query</button>
								</div>
                               
						</div>
                        
						</form>

</center>
                            
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th class="border-top-0">Purchase Number</th>
                                            <th class="border-top-0">Patient Name</th>
                                            <th class="border-top-0">Medicine Name</th> 
                                            <th class="border-top-0">Quanitity</th> 
                                            <th class="border-top-0">Price</th> 
                                            <th class="border-top-0">Status</th> 
                                            <th class="border-top-0 col-span-4">Action</th>
  
                                        </tr>
                                    </thead>
                                    <?php 
                                  require "includes/conn.php";
                                  if(isset($_POST['search'])){
                                      //echo "Was clicked";
                                      
                                      $start_date = $_POST['start_date'];
                                      $end_date = $_POST['end_date'];
                                        ?>
                                        <h6 class="text-center">Purchase Report  from <?php echo $start_date;?>   to   <?php echo $end_date?></h6>
                                        <?php
                                     
                                    
                                      $query = "SELECT * FROM purchase_order WHERE purchase_date BETWEEN '$start_date' AND '$end_date' " ;
                                      $result = $conn->query ($query);
                                     
                                      if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            
                                            ?>
                                           
                                            <tr>
                                           
                                            <td><?php echo $row['purchase_no'];?></td>
                                            <td><?php echo $row['supplier'];?></td>
                                            <td><?php echo $row['medicine_name'];?></td>
                                            <td><?php echo $row['qty'];?></td>
                                            <td><?php echo $row['price'];?></td>
                                           
                                            <td><?php 
                                                        if ( $row['status']==0) {
                                                            ?>
                                                            <p class="text-danger">Unpaid</p>
                                                            <?php
                                                        }else {
                                                            ?>
                                                            <p class="text-success">Paid</p>
                                                            <?php
                                                        }
                                                
                                                ?></td>
                                            <td><a href="" class="btn btn-success">View More</a> </td>
                                            </tr>
                                            <?php
                                        }
                                      }else {
                                          ?>

                                          <h6 class="text-center text-danger">There no records matching the dates selected</h6>
                                          <?php
                                      }
                                      
                                  }
                                   
                                ?>

                                  

                                </table>
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
	
	<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'pharmacy_search.php',
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