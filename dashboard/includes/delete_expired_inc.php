<?php 

if(isset($_POST['delete'])){
	session_start();
	
	require "conn.php";
	
	
	$id = $_POST['id'];
	$medicine_name = $_POST['medicine_name'];
	$available_quanitity = $_POST['available_quanitity'];
	$expiry_date = $_POST['expiry_date'];
	$expiried_qty = $_POST['expiried_qty'];
	$amount = $_POST['amount'];
	$price = $_POST['price'];

	// Formulae to calaculate the balance of drugs remaining
	$balance =  $available_quanitity - $expiried_qty;
	
	//Get the total cost of expired drugs
	$xpense = ($expiried_qty * $price);

	//echo "$xpense";

	

	$sql = "UPDATE  store SET
	
	Qty = '$balance',
	expiry_date = '$expiry_date',
	confirm = '1'
	
	WHERE id = $id";
	
	$res = mysqli_query($conn, $sql);

		if ($res = true){

			$sql2 = "INSERT INTO expired_medince SET 
			medicine_name = '$medicine_name',
			date_expired = '$expiry_date',
			qty = '$expiried_qty',
			amount = '$xpense'
			";
			$result = mysqli_query($conn, $sql2);

			if($res = true){
				$_SESSION['confirmed'] = "<div class='alert alert-success'> Expired Medicine Date  successfully </div>";
								header ("Location:../expired.php");
			}else{
				$_SESSION['failed to confirm'] = "<div class='alert alert-success'> Failed to Confirm Expired Medicine Date </div>";
								header ("Location:../expired.php");
		}

	}
}
	
?>

						
						