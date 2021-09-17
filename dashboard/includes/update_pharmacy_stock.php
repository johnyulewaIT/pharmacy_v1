<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
	
	$id = $_POST['id'];
	$pharmacy_Qty = $_POST['pharmacy_Qty'];
	$medicine_name = $_POST['medicine_name'];
	$price = $_POST['price'];
	$Qty_damaged = $_POST['Qty_damaged'];
	
	$amount = $Qty_damaged * $price;
	$new_qty = $pharmacy_Qty - $Qty_damaged;

	//echo "$medicine_name";


			$sql = "INSERT INTO damaged SET

			name = '$medicine_name',
			price = '$price',
			qty = '$Qty_damaged',
			amount = '$amount'
		

			";
		$res = mysqli_query($conn, $sql);	

		if ($res = true) {
			$query = "UPDATE  pharmacy_stock SET

			pharmacy_Qty = '$new_qty'
			WHERE id = $id
			";
	
	
		$res2 = mysqli_query($conn, $query);	
		}
		
		if ($res2 = true){
			$_SESSION['updated_stock'] = "<div class='alert alert-success'> Damaged Medicine added successifuly </div>";
							header ("Location:../expensis.php");
	}else{
		$_SESSION['failed_price'] = "<div class='alert alert-danger'> Failed to add damaged medicine  </div>";
		header ("Location:../expensis.php");
		}

	}
		

	
?>

						
						