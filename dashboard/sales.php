
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 


session_start ();
require "includes/conn.php";

if(isset($_POST['submit'])){
	
	
	$id = $_POST['id'];
	$patient_name = $_POST['patient_name'];
	$patient_no = $_POST['patient_no'];
	$pharmacy_Qty = $_POST['pharmacy_Qty'];
	$medicine_name = $_POST['medicine_name'];
	$invoice = $_POST['invoice'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	$child_dose_price = $_POST['child_dose_price'];
	$dosage_sold = $_POST['dosage_sold'];
	$half_dosage_price = $_POST['half_dosage_price'];
	

	//echo "$invoice";
	//echo"<br>";
	//echo "$id";
	//echo"<br>";
	//echo "$patient_no";
	//echo"<br>";
	//echo "$price";
	//echo"<br>";
	//echo "$medicine_name";
	//echo"<br>";
	//echo "$qty";
	//echo"<br>";
	//echo "$child_dose_price";
	//echo"<br>";
	//echo "$half_dosage_price";
	

	//new pharmacy balance
	$new_balance = $pharmacy_Qty - $qty;
	
	if($child_dose_price == "Yes"){
		// if the medicine is sold as half  dose
		$amount = $qty * $half_dosage_price;
	}elseif($child_dose_price == "No"){
		// if the medicine is sold as full  dose
		$amount = $qty * $price;
	}elseif ($dosage_sold == "No") {
		$amount = $qty * $price;
	}
	
	//echo "$amount";
	//echo "$dosage_sold";
	

	//check whether the pharmacy is stocked

	if ($pharmacy_Qty <= 0) {
		$_SESSION['out-stock'] = "<div class='alert alert-danger'> The medicine is out of stock</div>";
                        header ("Location:checkout.php");
                        $_SESSION['patient_no'] = $_POST['patient_no'];
                        $_SESSION['invoice'] = $_POST['invoice'];
						exit();

		//if the pharmacy is stocked insert the data collected to sales order
	}
	elseif ($pharmacy_Qty < $qty) {
		$_SESSION['stock-exceeds'] = "<div class='alert alert-danger'> The Quantity Requested Exceeds the pharmacy Stock Available</div>";
						header ("Location:checkout.php");
						exit();
	}
	elseif ($pharmacy_Qty > 0) {
		$sql = "INSERT INTO sales_order SET
	
	invoice = '$invoice',
	qty = '$qty',
	price = '$price',
	customer = '$patient_name',
	medicine_name = '$medicine_name',
	medicine_name_id= '$id',
	amount  = '$amount',
	patient_no ='$patient_no' 

	";
	$res = mysqli_query($conn, $sql);

	if ($res = true) {
		$_SESSION ['sessionpatient'] = $invoice;
	}
	}
	if($pharmacy_Qty > 0 ){
		
		$sql2 = " UPDATE pharmacy_stock SET
		
		pharmacy_Qty = '$new_balance'
		WHERE id = '$id';
		";
		$res2 = mysqli_query($conn, $sql2);
	}
	

	
}


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
<?php 

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
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            PHARMACY
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
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
                                    <li class="breadcrumb-item active" aria-current="page">Diagonise Section </li>
									
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php 
                            
                            if (isset($_POST['patient_no'])) {
                              $patient_id = $_POST['patient_no'];
                              
                            }
                            ?>
                              <!-- Container fluid  -->

            <!-- ============================================================== -->
            <!-- This Php script is to help us get the patient Id to help us produce the receipt for this patient--!>

            <?php 
														
                                                        require "includes/conn.php";	
                                                        $sql ="SELECT * FROM patients WHERE patient_no = '$id'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $patient_name=$rows['patient_name'];
                                                                    $patient_no=$rows['patient_no'];
                                                                    $location=$rows['location'];
                                                                    $dob=$rows['dob'];
                                                               ?>
									
                                        <?php
										}

									}
								}
							?>	
              
            <!-- ============================================================== -->

            <div class="container-fluid">
               
                <!-- ============================================================== -->
                <!-- Patient Details -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                
                        <div class="card">
						 <div class="card-body">  
						  <div align="left">
								 
                                 <a href="prescription.php?invoice=<?php echo $invoice;?> && id=<?php echo $patient_id;?>" class="btn btn-warning">Add More</a>
								</div>
						  <div align="right">
								 
                                 <a href="pos2.php?id=<?php echo $invoice;?> && patient_id=<?php echo $id;?>" class="btn btn-warning">Continue to sales</a>
								</div>
                            </div>
							<div class="col-md-12">
								<div class="row">    
                                <div class="form-group col-md-12">
                                    <br>
                                    <h4>Patients Details</h4>
                                    <hr>
                                    </div>         
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
										<input readonly type="text" name="invoice" value="<?php echo $patient_no;?>" class="form-control text-right" step="any" id="qty" >
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Patient DOB</label>
										<input readonly type="text" name="invoice" value="<?php echo $dob;?>" class="form-control text-right" step="any" id="qty" >
									</div>
                                    <hr>
                                    

								</div>
                 <!-- ============================================================== -->
                <!-- Patient Details -->
                <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               
                <!-- ============================================================== -->
                <!-- Prescription -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
               
                        <div class="card">
						 <div class="card-body">  
                            </div>
							<div class="col-md-12">
								<div class="row">    
                                <div class="form-group col-md-12">
								
                                    <br>
                                    <h4>Medicine Details</h4>
                                    <hr>
                                    </div>         
									
                                    <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="30%">Patient Name</th>
      <th width="20%">Invoice No.</th>
      <th width="45%">Medicine Name</th>
      <th width="45%">Medicine Quanitity</th>
      <th width="10%">Price</th>
      <th width="5%"></th>
     </tr>
                                                      <?php 
														
                                                        require "includes/conn.php";				
                                                        $sql ="SELECT * FROM sales_order WHERE invoice ='$patient_no'  && status = '0'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $transaction_id=$rows['transaction_id'];
                                                                    $invoice =$rows['invoice'];
                                                                    $customer=$rows['customer'];
                                                                    $medicine_name=$rows['medicine_name'];
                                                                    $price=$rows['price'];
                                                                    $qty=$rows['qty'];
                                                                    
																   
                                                               ?>
     <tr>
      <td contenteditable="true" class="customer"><?php echo $customer?></td>
      <td contenteditable="true" class="invoice"><?php echo $invoice?></td>
      <td contenteditable="true" class="medicine_name"><?php echo $medicine_name?></td>
      <td contenteditable="true" class="qty"><?php echo $qty?></td>
      <td contenteditable="true" class="price"><?php echo $price?></td>
      
     </tr>
     <?php
										}

									}else {
                                       ?>
                                      <h4 class="text-danger " align="center">Patient Already Discharged</h4>
                                        <?php
                                    }
								}
							?>		
                           
    </table>
    <div align="right">
    <h4>Total:
    <?php 
										$sql ="SELECT SUM(amount) as 'amount' FROM sales_order  WHERE invoice ='$patient_no' && status = '0' ";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
								
								
										
									   ?>
                                       <h2 class="card-title"><?php echo $data['amount'];?></h2>
    
    </h4>
	<button type="button" name="save" id="save" class="btn btn-success btn-block">Submit</button>
    </div>
 
    

								
                                    

								</div>
                 <!-- ============================================================== -->
                <!-- Prescription -->
                <!-- ============================================================== -->
                                
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
	
    <script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
  html_code += "<td contenteditable='false' class='customer' ><?php echo $customer?></td>";
   html_code += "<td contenteditable='true' class='invoice'><?php echo $invoice?></td>";
   html_code += "<td contenteditable='true' class='medicine_name'><?php echo $medicine_name?></td>";
   html_code += "<td contenteditable='true' class='qty'><?php echo $qty?></td>";
   html_code += "<td contenteditable='true' class='price' ><?php echo $price?></td>";
   
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();


 });
 $('#save').click(function(){
  var customer = [];
  var invoice = [];
  var medicine_name = [];
  var price = [];
  var qty = [];

  $('.customer').each(function(){
    customer.push($(this).text());
  });
  
  $('.invoice').each(function(){
    invoice.push($(this).text());
  });
  $('.medicine_name').each(function(){
    medicine_name.push($(this).text());
  });
  $('.price').each(function(){
    price.push($(this).text());
  });
  $('.qty').each(function(){
    qty.push($(this).text());
  });
  
  
  $.ajax({
   url:"sales_inc.php",
   method:"POST",
   data:{customer:customer, invoice, medicine_name, price,qty},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 

});

</script>

	
</body>

</html>




















