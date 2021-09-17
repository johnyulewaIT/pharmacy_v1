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
						header ("Location:sales.php");
						exit();

		//if the pharmacy is stocked insert the data collected to sales order
	}
	elseif ($pharmacy_Qty < $qty) {
		$_SESSION['stock-exceeds'] = "<div class='alert alert-danger'> The Quantity Requested Exceeds the pharmacy Stock Available</div>";
						header ("Location:sales.php");
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
		if($res2 = true){
			$_SESSION['update'] = "<div class='alert alert-success'> Updated Succesifuly</div>
			";
			header("Location:sales.php");
		}else{
			$_SESSION['failed'] = "<div class='alert alert-danger'> Failed to Update</div>
			";
			header("Location:sales.php");
		}
	}
	

	
}


?>