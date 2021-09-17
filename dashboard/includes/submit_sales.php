<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
	
	$id = $_POST['id'];
	$payment = $_POST['payment'];
	$patient_id = $_POST['patient_id'];
	$total_due = $_POST['total_due'];

	$sql = "UPDATE  sales SET
	
	price = '$price'
	WHERE id = $id
	
	";
	
	$res = mysqli_query($conn, $sql);
	
	
	
	
	if($res = true){
		$sql2 = "UPDATE  pharmacy_stock SET
	
	price = '$price'
	WHERE id = $id
	
	";
	
		$res2 = mysqli_query($conn, $sql2);	
		}if ($res2 = true){
			$_SESSION['updated_price'] = "<div class='alert alert-success'> Medicine Price Updated successifuly </div>";
							header ("Location:../medicine_list.php");
	}else{
		$_SESSION['failed_price'] = "<div class='alert alert-danger'> Failed to Update Medicine Price </div>";
		header ("Location:../medicine_list.php");
		}
		
}
	
?>

						
						