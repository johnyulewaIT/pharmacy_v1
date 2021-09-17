<!--  This is an individual invoice--->
<?php

require "includes/head.php";
if (isset($_GET['invoice'])) {
    $invoice = $_GET['invoice'];
}
   //echo $invoice;
   

?>

<style>

@media print{
    /* Hide every other element */
    body * {
        visibility: hidden;
    }
    /*display print container elements */
    .print-container, .print-container *{
        visibility: visible;
    }
    .print-container{
        position: absolute;
        margin: 0px;
        padding-left: 0;
        top: 0;
    }
}

body {
    font-family: 'Maven Pro', sans-serif;
    background-color: #f5f5f5;
}

hr {
    color: #0000004f;
    margin-top: 5px;
    margin-bottom: 5px
}

.add td {
    color: #c5c4c4;
    text-transform: uppercase;
    font-size: 12px
}

.content {
    font-size: 14px
}
</style>


    <div align="left" class="px-5 mb-5">
    <br>
        <a href="invoice.php" class="btn btn-success"> Back</a>
    </div>
<body>
<div class="container mt-5 mb-3 ">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-8">
            <div class="card print-container">
                <div class="d-flex flex-row p-2"> <img src="assets/images/logo-icon.png" width="48">
                    <div class="d-flex flex-column"> <span class="font-weight-bold">Invoice</div>
                </div>
                <div align="center">
                    <i>This is the start of this legal invoice</i>
                    </div>
                <hr>
                <div class="table-responsive p-2">
                    <!--- =============================================== --->
                    <!--- This is the address section ---->
               <table>

               <tr>
                        <td> <div align="center" class="align-items-center">
                            <h5>From</h5>
                            <br> 
                            <b>HOSMASTEM</b>  <br>
                                <b>P.O Box 188-10100</b> <br>
                                <b>Nyeri</b><br>
                                <b>0707 472 152</b><br>
                                
                            </div>
                        
                        </td>
                        <td width="300px"></td>
                        <?php 
														
                                                        require "includes/conn.php";	
                                                        
                                                        $sql ="SELECT SUM(amount) as 'amount' FROM sales_order  WHERE invoice ='$invoice' ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                                                        $data = mysqli_fetch_array($res);
                                                       


                                                        $sql ="SELECT * FROM patients WHERE patient_no = '$invoice'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $patient_name =$rows['patient_name'];
                                                                 
																   
                                                               ?>
                        
                        <td>
                                    <div align="center" class="align-items-center">
                                    <h5>To</h5>
                            <br> 
                                <b><?php echo $patient_name;?></b>  <br>
                                    <b>P.O Box 188-10100</b> <br>
                                    <b>Nyeri</b><br>
                                    <b>0707 472 152</b><br>
                                    
                                </div>
                        </td>
                          <?php
										}

									}
								}
							?>
               </tr>

               </table> 
               
                </div>
                
                <hr>
                <div class="products p-2">
                <h5>Medicine Prescribed</h5>
                    <table class="table table-borderless">
                    <!---================================================================----->
                    <!-- Medicine offered section --->

                        <tbody>
                            <tr class="add">
                                <td>Medicine Name</td>
                                <td>Quanitity</td>
                                <td>Price</td>
                                <td class="text-center">Total</td>
                             
                            </tr>
                            
                                       
                            <?php 
														
                                                        require "includes/conn.php";	
                                                        
                                                        $sql ="SELECT SUM(amount) as 'amount' FROM sales_order  WHERE invoice ='$invoice' ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                                                        $data = mysqli_fetch_array($res);
                                                       


                                                        $sql ="SELECT * FROM sales_order WHERE invoice = '$invoice'";
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
                            <tr class="content">
                                <td><?php echo $medicine_name;?></td>
                                <td>
                                <?php echo $qty;?> X</td>
                                <td><?php echo $price;?></td>
                                <td class="text-center">
                                <?php echo $medicine_subtotal_price;?>    
                               </td>
                              
                               
                               </tr>
                               
                            </tr>
                            <?php
										}

									}
								}
							?>	
                            <td></td>
                            <td></td>
                            <td><b>Subtotal</b></td>
                            <td> <?php echo $data['amount'];?>    </td>
                        </tbody>
                        

                    </table>

<!---================================================================----->
<!--- Lab test taken--->
<h5>Laboratory Test(s)</h5>
                    <hr>
 <table class="table table-borderless">
                    

                    <tbody>
                            <tr class="add">
                                <td>Test Name</td>
                                <td>Quanitity</td>
                                <td>Price</td>
                                <td class="text-center">Total</td>
                             
                            </tr>
                            
                                       
                            <?php 
														
                                                        require "includes/conn.php";	
                                                        $sql ="SELECT SUM(price) as 'price' FROM lab_results  WHERE patient_no ='$invoice'  ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                                                        $data2 = mysqli_fetch_array($res);
                                                       
                                                        $sql ="SELECT * FROM lab_results WHERE patient_no = '$invoice'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                  
                                                                    
                                                                    $price =$rows['price'];
                                                                    $test_name =$rows['test_name'];
                                                                    
																   
                                                               ?>
                            <tr class="content">
                                <td><?php echo $test_name;?></td>
                                <td>
                                <?php echo $price;?> X</td>
                                <td><?php echo $price;?></td>
                                <td class="text-center">
                                <?php echo $medicine_subtotal_price;?>    
                               </td>
                              
                               
                               </tr>
                               
                            </tr>
                            <?php
										}

									}else {
                                        ?>
                                        <p align="center" class="lead">No laboratory Test taken!!</p>
                                        <?php
                                    }
								}
							?>	 
                            <td></td>
                            <td></td>
                            <td><b>Subtotal</b></td>
                            <td> <?php
                                if ($data2 == "") {
                                    echo "0";
                                }else {
                                   ?>
                                   <?php echo $data2['price'];?>
                                   <?php
                                }
                            ?>    </td>
                        </tbody>
                        

                    </table>
<!---================================================================----->
<!-- Services offered section --->
                    <h5>Services Offered</h5>
                    <hr>
                    <table class="table table-borderless">
                    

                        <tbody>
                        <tr class="add">
                                <td>Service Name</td>
                                <td>Quanitity</td>
                                <td>Price</td>
                               
                            </tr>

                            <?php 
														
                                                        require "includes/conn.php";	
                                                        
                                                        $sql ="SELECT SUM(price) as 'price' FROM service_order  WHERE patient_no ='$invoice'  ";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                                                        $data3 = mysqli_fetch_array($res);


                                                        $sql ="SELECT * FROM service_order WHERE patient_no = '$invoice'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $service_id =$rows['service_id'];
                                                                    $service_name =$rows['service_name'];
                                                                    $price =$rows['price'];
                                                                  //  $id =$rows['id'];
                                                                    
                                                             //       $subtotal_price = $qty * $price;
																   
                                                               ?>
                            <tr class="content">
                                <td><?php echo $service_name?></td>
                                <td>
                                1 X</td>
                                <td><?php echo $price;?></td>
                                
                            </tr>
                           
                            <?php
										}

									}
								}
							?>	
<!---================================================================----->
                        </tbody>
                    </table>

                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                           
                           
                                <?php 
                                $Total = $data2['price'] + $data3['price'] + $data['amount'];
                                ?>    
                               </h5>
                               <tr>

                               <td></td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                 <!-- ============================================== -->
                                    <!--- Total--->
                                    <td>
                                    <h5>Total:</h5>
                                <h5><?php echo $Total;?>.00</h5> <br>
                                </td>
                                    <!-- ============================================== -->
                                  
                                 
                               </tr>

                        </tbody>
                    </table>
                </div>
                
                <div class="address p-2">
                    
                  
                    <div align="center">
                    <i>This is the end of this legal invoice</i>
                    
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
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

    <div align="center">
    <button class="btn btn-success" onclick="window.print()">Print this page</button>	
                    </div>
</div>
</body>
</html>
