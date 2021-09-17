<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
	$medicine_name = $_POST['medicine_name'];
	$Qty = $_POST['Qty'];
	$price = $_POST['price'];
	$expiry_date = $_POST['expiry_date'];
	$amount =$_POST['amount'];
	
	
	$sql = "INSERT INTO store SET
	medicine_name = '$medicine_name',
	Qty = '$Qty',
	price = '$price',
	expiry_date = '$expiry_date',
	amount = '$amount'
	
	";
	
	$res = mysqli_query($conn, $sql);
	if($res = true){
		$_SESSION['updated'] = "<div class='alert alert-success'> Medicine Received successfully </div>";
                        header ("Location:../receiving.php");
	}else{
		$_SESSION['failed'] = "<div class='alert alert-success'> Failed to Receive Medicine </div>";
                        header ("Location:../receiving.php");
	}
	
}
?>