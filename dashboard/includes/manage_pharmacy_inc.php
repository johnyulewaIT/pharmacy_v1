<?php
session_start();

require "conn.php";

if(isset($_POST['submit'])){
	
	$id = $_POST['id'];
	// THE NAME OF THE MEDICINE BEING ADDED TO THE PHARMACY
	
	$medicine_name =$_POST['medicine_name'];
	// THE NUMBER OF DRUGS BEING ADDED TO THE PHARMACY STOCK
	
	$Aqty = $_POST['Aqty'];
	
	//THE CURRENT PHARMACY STOCK
	
	$Pqty = $_POST['Pqty'];
	
	//THE CURRENT STORE STOCK
	$Sqty = $_POST['Sqty'];
	
	// Calculations
	
	$balance = $Sqty - $Aqty;
	$pharmacy_Qty= $Aqty + $Pqty;
	
	// UPDATE THE DATABASE WITH THE COLLECTED INFORMATION

	//Update pharmacy stock

	if ($Sqty <= 0) {
		$_SESSION['out-stock'] = "<div class='alert alert-danger'> The medicine is out of stock</div>";
						header ("Location:../manage_pharmacy.php");
						exit();

	} elseif ($Aqty > $Sqty) {

		$_SESSION['exceeds-stock'] = "<div class='alert alert-danger'> The Quantity Requested Exceeds the Stock Available</div>";
						header ("Location:../manage_pharmacy.php");
						exit();
	}
	else if ($Sqty > 0) {
		$sql = "UPDATE pharmacy_stock SET
		pharmacy_Qty = '$pharmacy_Qty'
		WHERE id =$id
		";
		$res = mysqli_query ($conn, $sql);
		
	}if($Sqty > 0) {
		
		$sql2 = "UPDATE store SET 

		Qty = '$balance'
		WHERE id = $id	";
		$res2 = mysqli_query ($conn, $sql2);
	}
	
	if ($res = true) {
		$_SESSION['success'] = "<div class='alert alert-success'> Pharmacy Stock Update Successifuly</div>";
                        header ("Location:../pharmacy_stock.php");
	}else {
		$_SESSION['failed'] = "<div class='alert alert-danger'>Failed to update</div>";
                        header ("Location:../pharmacy_stock.php");
	}
}
