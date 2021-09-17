<?php

session_start();

require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
	
	$item_name = $_POST['item_name'];
	$capacity = $_POST['capacity'];
	$price = $_POST['price'];
	
	
	
	$sql = "INSERT INTO pharmacy_stock_items SET
	item_name = '$item_name',
	capacity = '$capacity',
	price = '$price'
	
	
	";
	
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		 
		 $sql = "INSERT INTO store_items SET
	item_name = '$item_name',
	capacity = '$capacity',
	price = '$price'
	
	";
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		
		$_SESSION['success'] = "<div class='alert alert-success'> Added Successifuly</div>";
                        header ("Location:../items_list.php");
	} 
	}else{
		$_SESSION['failed'] = "<div class='alert alert-success'> Failed to Add</div>";
                        header ("Location:../items_list.php");
	}
	
}
