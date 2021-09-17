<?php 

if(isset($_POST['submitt'])){
	session_start();

	require "includes/conn.php";
	
	$medicine_name = $_POST['medicine_name'];
	$supplier = $_POST['supplier'];
	$price = $_POST['price'];
	$purchase_no = $_POST['purchase_no'];

	$id = $_POST['id'];
	$expiry_date = $_POST['expiry_date'];
	$price = $_POST['price'];
	$sprice = $_POST['sprice'];
	$profit = $_POST['profit'];
	$newQty = $_POST['newQty'];
	$old_Qty = $_POST['old_Qty'];

	$total = $newQty * $price;

	$query = " INSERT INTO purchase_order SET

	medicine_name = '$medicine_name',
	supplier = '$supplier',
	price = '$price',
	purchase_no = '$purchase_no',
	total = '$total',
    qty = '$newQty'

	";
$res = mysqli_query ($conn, $query);


		//update the store Quanitity if the medicine is not sold as a dose
		$balance = $newQty + $old_Qty;

		//echo "<br>";
		//echo "$balance";

		$sql = " UPDATE store SET
		Qty = '$balance',
		price = '$price',
		sprice = '$sprice',
		expiry_date = '$expiry_date'

		WHERE id = $id
		
		";
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		
		$sql2 = " UPDATE pharmacy_stock SET
		price = '$price',
		sprice = '$sprice',
		expiry_date = '$expiry_date'
		WHERE id = $id

		";
		$res2 = mysqli_query ($conn, $sql2);

	} if ($res = true) {
		$_SESSION['se'] = "<div class='alert alert-success'> Received Successifuly</div>";
                        header ("Location:invoice.php");
	}
	else{
		$_SESSION['failed'] = "<div class='alert alert-danger'> Failed to Receive</div>";
                        header ("Location:invoice.php");
	}

}


?>