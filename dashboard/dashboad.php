
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
session_start();
require "includes/head.php";
require "includes/conn.php";
 require "includes/auth.php";
?>
<?php 
require "includes/head.php";
require "includes/conn.php";
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
$finalcode='Invoice No-  '.createRandomPassword();
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
      <?php require_once"includes/aside.php";?>
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
                                    <li class="breadcrumb-item "><a href="#">Home</a></li>
                                   
                                </ol>
                               
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="text-right upgrade-btn">
                            <a href="add_patients.php?id=<?php echo $finalcode ?>" class="btn btn-danger text-white">Add Patient</a>
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
                <?php 
                        if (isset($_SESSION['success'])) {
                            echo $_SESSION['success'];
                            unset ($_SESSION['success']);
                        }
               ?>
			    <?php 
                        if (isset($_SESSION['updated_price'])) {
                            echo $_SESSION['updated_price'];
                            unset ($_SESSION['updated_price']);
                        }
               ?>


                   <!-- ============================================================== -->
                <!-- This is the count of Medicine sales -->
                <!-- ============================================================== -->

                <div class="row">

                    <div class="col-sm-3">
                        <div class="card bg-success  ">
                        
                            <div class="card-body">
                                <div class="d-md-flex align-items-center ">
                                    <div>
                                        <h4 class="card-title">Pharmacy Year</h4>
                                        <?php 
														
														
														
                                                        $sql ="SELECT * FROM info";
                                                    //create a query that fetch data from the database
                                                    $res = mysqli_query($conn,$sql);
                    
                                                    //check if there are any records in the database
                                                    if ($res == TRUE) {
                                                        $count = mysqli_num_rows($res);
                                                        $sn=1;
                                                        if($count > 0){
                                                            while ($rows=mysqli_fetch_assoc($res)) {
                                                                $id=$rows['id'];
                                                                $opening_date=$rows['opening_date'];
                                                                $closing_balance=$rows['closing_balance'];
                                                               
                                                           ?>
                                            
                                            <h5> <?php echo $opening_date;?> - <?php echo $closing_balance;?></h5> 

                                                                <?php
                                                            }
                    
                                                        }
                                                    }
                                                ?>
                                       
                                    </div>
                                    
                                </div>
                                <!--<div class="row">-->
                                    <!-- column -->
                                   <!-- <div class="col-lg-12">
                                        <div class="campaign ct-charts"></div>
                                    </div>-->
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                        
                    <div class="col-sm-3">
                        <div class="card bg-success  ">
                        
                            <div class="card-body">
                                <div class="d-md-flex align-items-center ">
                                    <div>
                                        <h4 class="card-title">Medicine Sales</h4>
                                        <?php 
										$sql ="SELECT SUM(total) as 'total' FROM sales";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
									   ?>
                                        <h2 class="card-title"><?php echo $data['total'];?></h2>
                                       
                                    </div>
                                    
                                </div>
                                <!--<div class="row">-->
                                    <!-- column -->
                                   <!-- <div class="col-lg-12">
                                        <div class="campaign ct-charts"></div>
                                    </div>-->
                                    <!-- column -->
                                </div>
                            </div>
                        </div>

                        
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center ">
                                    <div>
                                    <?php 
                                $sql ="SELECT SUM(Qty) as 'Qty' FROM store";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
                                ?>
                                        <h4 class="card-title align-items-center">MEDICINE STOCK</h3>
                                        
                                        <h2 class="card-title"><?php echo $data['Qty'];?></h2>
                                    </div>
                                    
                                </div>
                              
                                <?php 																
									$sql ="SELECT * FROM store";
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
											$Qty=$rows['Qty'];
											$price=$rows['price'];
											$amount=$rows['amount'];
											$expiry_date= $rows['expiry_date'];
											$drug_expiry_date = date("Y-m-d", strtotime(date("Y-m-d")));
									   ?>
						
											<?php
										}

									}
								}
							?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                   <?php 
                                
                                         $sql ="SELECT * FROM store WHERE Qty = '0'";
                                        //execute query
                                        $res = mysqli_query($conn, $sql);
                                        //count
                                        $count = mysqli_num_rows($res);
                                        ?>
                                        <h4 class="card-title">OUT OF STOCK</h4>
                                        
                                        <h2 class="card-title"><?php echo $count?></h2>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- ============================================ -->
                                            <!--- This is the count of all Expired Medicine---->
                       <!--- ============================================ -->

                    <div class="col-sm-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                   <?php 
                                
                                         $sql ="SELECT * FROM store WHERE expiry_date < '$drug_expiry_date'";
                                        //execute query
                                        $res = mysqli_query($conn, $sql);
                                        //count
                                        $count = mysqli_num_rows($res);
                                        ?>
                                        <h4 class="card-title">EXPIRED DRUGS</h4>
                                        
                                        <h2 class="card-title"><?php echo $count?></h2>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-sm-3">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                   <?php 
                                require('includes/conn.php');
                                $sql="select * from info";
                            
                                $res=mysqli_query($conn,$sql);
                                $count= mysqli_num_rows($res);
                                    if($count> 0){
                                        $row=mysqli_fetch_assoc($res);
                                         $opening_balance =$row['opening_balance'];
                                    }
                                        ?>

                                        <?php 
										$sql ="SELECT SUM(price) as 'price' FROM purchase_order";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
									   ?>
                                        <h4 class="card-title">Opening Balance</h4>
                                       
                                        <?php 
                                         $total = $data['price'];
                                        ?>
                                        <h2 class="card-title"><?php echo  $opening_balance -$price; ?></h2>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>

                        <!--- ============================================ -->
                                            <!--- This is the count of all damaged Medicine---->
                       <!--- ============================================ -->

                    <div class="col-sm-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                    <?php 
										$sql ="SELECT SUM(price) as 'price' FROM purchase_order WHERE status = '0' ";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
									   ?>
                                       <h4 class="card-title">Account Payable</h4>
                                        <h2 class="card-title"><?php echo $data['price'];?></h2>
                                       
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>

                        <!--- ============================================ -->
                                            <!--- This is the count of all Pharmacy Stock ---->
                       <!--- ============================================ -->

                    <div class="col-sm-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                   <?php 
                                
                                         $sql ="SELECT * FROM store_items ";
                                        //execute query
                                        $res = mysqli_query($conn, $sql);
                                        //count
                                        $count = mysqli_num_rows($res);
                                        ?>
                                        <h4 class="card-title">ITEMS LIST</h4>
                                        
                                        <h2 class="card-title"><?php echo $count?></h2>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    
                    <!--- ============================================ -->
                                            <!--- This is the count of all Transaction Today---->
                       <!--- ============================================ -->
               
                        <div class="col-sm-3">
                            <div class="card sha bg-warning">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                        <?php 
                                
                                        $sql = "SELECT * FROM sales WHERE sales_date = '$drug_expiry_date'";
                                        //execute query
                                        $res = mysqli_query($conn, $sql);
                                        //count
                                        $count = mysqli_num_rows($res);
                                        ?>
                                            <h4 class="card-title"> Transaction Today</h4>
                                            <h2 class="card-title"><?php echo $count?></h2>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>       
                    </div>

                 
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Patients Awaiting </h4>
                                    </div>
                                   
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th class="border-top-0">Patient No.</th>
                                            <th class="border-top-0">Patient Name</th>
                                            <th class="border-top-0">Date of Birth</th> 
											<th class="border-top-0">Action</th> 
                                        </tr>
                                    </thead>
                                    <?php 
														
                                                        require "includes/conn.php";	


																			if(isset($_GET['page']))
																				{
																					$page = $_GET['page'];
																				}
																				else
																				{
																					$page = 1;
																				}

																				$num_per_page = 10;
																				$start_from = ($page-1)*10;
														
                                                        $sql ="SELECT * FROM patients WHERE status ='0'  limit $start_from,$num_per_page ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $id=$rows['id'];
                                                                    $patient_no =$rows['patient_no'];
                                                                    $patient_name=$rows['patient_name'];
                                                                    $dob=$rows['dob'];
                                                                    
                                                                    
                                                                    
																   
                                                               ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $patient_no; ?></th>
                                            <td><?php echo $patient_name; ?></td>
                                            <td><?php echo $dob; ?></td>    
											<td><a href="prescription.php?invoice=<?php echo $patient_no;?> && id=<?php echo $id;?>" class="btn btn-success">Attend</a></td>  											
                                            
                                        </tr>    
                                                  
                                    </tbody>

                                    <?php
										}

									}else {
                                       ?>
                                      <h4 class="text-danger " align="center">No Patients are Awating ....</h4>
                                        <?php
                                    }
								}
							?>		

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-6 md-3">
										<?php 
									$pr_query = "select * FROM patients ";
									$pr_result = mysqli_query($conn, $pr_query);
									$total_record = mysqli_num_rows($pr_result);
									
									$total_page = ceil($total_record/$num_per_page);
									
									if($page>1)
                {
                    echo "<a href='index.php?page=".($page-1)."' class='btn btn-warning'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='index.php?page=".$i."' class='btn btn-success'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='index.php?page=".($page+1)."' class='btn btn-warning'>Next</a>";
                }
								?>
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
