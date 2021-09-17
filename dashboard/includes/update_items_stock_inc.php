<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
	
	$id = $_POST['id'];
	$capacity = $_POST['capacity'];
	$expiry_date = $_POST['expiry_date'];
	$price = $_POST['price'];
	$existing_capacity = $_POST['existing_capacity'];
	$balance = $capacity + $existing_capacity;
	

	//echo "$balance";
	
	$sql = "UPDATE  store_items SET
	
	capacity = '$balance',
	expiry_date = '$expiry_date',
	price = '$price'
	WHERE id = $id
	
	";
	
	$res = mysqli_query($conn, $sql);

		if ($res = true){
			$_SESSION['updated_item'] = "<div class='alert alert-success'>Item Updated successifuly </div>";
							header ("Location:../items_list.php");
	}else{
		$_SESSION['failed_item'] = "<div class='alert alert-danger'> Failed to Update Item </div>";
		header ("Location:../items_list.php");
		}

}
	
?>

						
						