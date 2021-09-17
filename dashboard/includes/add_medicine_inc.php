<?php

session_start();

require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
	
	$medicine_name = $_POST['medicine_name'];
	$capacity = $_POST['capacity'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$dosage_sold = $_POST['dosage_sold'];
	$dosage = $_POST['dosage'];
	$app = $_POST['app'];
	$price_dosage = $_POST['price_dosage'];
	$half_price_dosage = $_POST['half_price_dosage'];
	
	
	$sql = "INSERT INTO pharmacy_stock SET
	medicine_name = '$medicine_name',
	capacity = '$capacity',
	type = '$type',
	price = '$price',
	dosage_sold = '$dosage_sold',
	dosage = '$dosage',
	app = '$app',
	price_dosage = '$price_dosage',
	half_dosage_price = '$half_price_dosage'
	
	";
	
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		 
		 $sql = "INSERT INTO store SET
	medicine_name = '$medicine_name',
	capacity = '$capacity',
	type = '$type',
	price = '$price',
	dosage_sold = '$dosage_sold',
	dosage = '$dosage',
	app = '$app',
	price_dosage = '$price_dosage',
	half_dosage_price = '$half_price_dosage'
	
	";
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		
		$_SESSION['success'] = "<div class='alert alert-success'> Added Successifuly</div>";
                        header ("Location:../medicine_list.php");
	} 
	}else{
		$_SESSION['failed'] = "<div class='alert alert-success'> Failed to Add</div>";
                        header ("Location:../medicine_list.php");
	}
	
}
