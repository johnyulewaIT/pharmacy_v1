
<?php 
session_start();
if(isset($_POST['submit'])){

	
	require "includes/conn.php";

	$patient_no = $_POST['patient_no'];
	$amount_given = $_POST['amount_given'];
	$invoice = $_POST['invoice'];
	$invoice_due = $_POST['invoice_due'];
   // $admission_status = $_POST['admission_status'];
     $change = $amount_given - $invoice_due;
     //echo "$invoice";


     $sql = "UPDATE  sales SET
     total = '$invoice_due',
     payment = '$amount_given',
     payment_change= '$change'

     WHERE invoice = '$invoice'
	
	";
	
	$res = mysqli_query($conn, $sql);

	
	if($res = true)$sql2 = "UPDATE  sales_order SET
	
	status = '1'
	WHERE invoice = '$invoice'
	
	";
$res2 = mysqli_query($conn, $sql2);	
		
		if($res2 = true){
			$sql3 = "UPDATE  patients SET
	
	status = '1'
	WHERE patient_no = '$invoice'";
		}
		
		$res3 = mysqli_query($conn, $sql3);	
		
		if ($res3 = true){
            $_SESSION ['sessioninvoice'] =  $_POST['invoice'];
            $_SESSION ['sessionpaymentid'] =  $_POST['patient_no'];
							header ("Location:receipt.php");
	}else{
		$_SESSION['failed_price'] = "<div class='alert alert-danger'> Failed to Update Medicine Price </div>";
		header ("Location:../receipt.php");
		}

}

	
?>

<!--- The receipt starts here..---->

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
</style>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<?php 

require "includes/head.php";
$invoice =  $_SESSION ['sessioninvoice'];
?>
<style>

@import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');

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
        <a href="index.php" class="btn btn-success"> Back</a>
    </div>
<body>
<div class="container mt-5 mb-3 ">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-8">
            <div class="card print-container">
                <div class="d-flex flex-row p-2"> <img src="assets/images/logo-icon.png" width="48">
                    <div class="d-flex flex-column"> <span class="font-weight-bold">Receipt</div>
                </div>
                <div align="center">
                    <i>This is the start of this legal receipt</i>
                    </div>
                <hr>
                <div class="table-responsive p-2">
                
                <div align="center" class="align-items-center">
                       <b>PHARMACY</b>  <br>
                        <b>P.O Box 108-10100</b> <br>
                        <b>Nyeri</b><br>
                        <b>0707 000 100</b><br>
                    </div>
                    
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
                                                       


                                                        $sql ="SELECT * FROM sales WHERE invoice = '$invoice'";
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
                                                                    $payment_change =$rows['payment_change'];
                                                                    
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


                    </table>

                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                           
                           
                                <?php 
                                $Total =  $data['amount'];
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
                                    <!--- Cash Given--->
                                    <td>
                                    <h5>Cash:</h5>
                                <h5><?php echo $Total+ $payment_change;?>.00</h5> <br>
                                </td>
                                    <!-- ============================================== -->
                                    <!--- Balance--->
                                    <td>
                                    <h5>Balance:</h5>
                                <h5><?php echo $payment_change;?>.00</h5> <br>
                                </td>
                               </tr>

                        </tbody>
                    </table>
                </div>
                
                <div class="address p-2">
                    
                  
                    <div align="center">
                    <i>This is the end of this legal receipt</i>
                    
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
