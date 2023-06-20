
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
$finalcode='Patient_No.:  '.createRandomPassword();
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
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
                                    <li class="breadcrumb-item active" aria-current="page">Store List</li>
									
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
                                        <h4 class="card-title">Store List </h4> 
                                        <?php 
                                            if (isset($_SESSION['Dsuccess'])) {
                                                echo $_SESSION['Dsuccess'];
                                                unset ($_SESSION['Dsuccess']);
                                            }
                                ?>
                                    <?php 
                                            if (isset($_SESSION['Dfailed'])) {
                                                echo $_SESSION['Dfailed'];
                                                unset ($_SESSION['Dfailed']);
                                            }
                                ?> 
                                    </div> 
									</div>
									<div class="float-right"> <a href="manage_receiving1.php" class="btn btn-success float-right"> Receive Medicine</a>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                            <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-warning">
                                            
                                            <th class="border-top-0">Medicine Name</th>
                                            <th class="border-top-0">Stock Available</th> 
                                            <th class="border-top-0">Price</th> 
                                            <th class="border-top-0">Amount</th> 
                                            <th class="border-top-0">Expiry Date</th>
                                            <th class="border-top-0">Action</th>
                                            <th class="border-top-0"></th>
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

														
                                                        $sql ="SELECT * FROM store limit $start_from,$num_per_page";
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
                                                                    $expiry_date=$rows['expiry_date'];
                                                                    $expiry_date=$rows['expiry_date'];
                                                                   $dosage_sold=$rows['dosage_sold'];
                                                                   $dosage=$rows['dosage'];
                                                                   $price_dosage=$rows['price_dosage'];
                                                                   
                                                                   $app=$rows['app'];
                                                               ?>
                                                
                                                                    
                                    <tbody>
                                        <tr>
                                        
                                            <td><?php echo $medicine_name; ?></td>
                                            
                                                                    
                                            <?php 
                                            
                                           if ($dosage_sold =="Yes") {

                                            if ($Qty < 2) {
                                                ?>
                                                <td class='text-white text-bold bg-danger'><?php echo $Qty ?></td>
                                              <?php
                                            }else {
                                                ?>
                                                <td class=' text-bold '><?php echo $Qty?></td>
                                              <?php
                                            }
                                          
                                           }else {
                                               if ($Qty < 2) {
                                                ?>
                                            
                                                <td class='text-white text-bold bg-danger'><?php echo $Qty  ?></td>
                                              <?php
                                               }else {
                                                ?>
                                            
                                                <td class=' text-bold '><?php echo $Qty  ?></td>
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
                                                    <td class=' text-bold '><?php echo $price_dosage * $Qty?> </td>
                                          <?php
                                           }else {
                                            ?>
                                             <td><?php echo $price * $Qty; ?></td>
                                            <?php
                                           }
                                            
                                            ?>

                                          
                                            <td><?php echo $expiry_date; ?></td>                                    
                                            <td><a href="updateDrugs.php?id=<?php echo $id;?>" class="btn btn-success">Edit</a></td>
                                            <td><a href="includes/deleteDrugs.php?id=<?php echo $id;?>" class="btn btn-danger">Delete</a></td>
                                        </tr>   
                                                      
                                    </tbody>

                                    <?php
										}

									}
								}
							?>		
                                    <tr>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td><h4>Total</h4></td>
                                           <td>
                                           <?php 
										$sql ="SELECT SUM(price) as 'price' FROM store";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
									   ?>

                                           <h4><?php echo $data['price'];?></h4></td>
                                        </tr>    
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="col-md-6 md-3">
										<?php 
									$pr_query = "select * from store";
									$pr_result = mysqli_query($conn, $pr_query);
									$total_record = mysqli_num_rows($pr_result);
									
									$total_page = ceil($total_record/$num_per_page);
									
									if($page>1)
                {
                    echo "<a href='receiving.php?page=".($page-1)."' class='btn btn-warning'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='receiving.php?page=".$i."' class='btn btn-success'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='receiving.php?page=".($page+1)."' class='btn btn-warning'>Next</a>";
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
