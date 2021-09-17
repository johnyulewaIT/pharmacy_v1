<?php

session_start();

require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
	
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$total = $_POST['total'];
	$purchase_no = $_POST['purchase_no'];
	$status = $_POST['status'];
	$date = $_POST['date'];
    
  //echo "$purchase_no";

	$sql = "INSERT INTO invoice_pay SET
	qty = '$qty',
	price = '$price',
	total = '$total',
	date = '$date',
	purchase_no = '$purchase_no'
	
	";
	
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		 
		$sql2 = "UPDATE purchase_order SET
		status = '$status'
		WHERE purchase_no = '$purchase_no'
    ";
    
	$res2 = mysqli_query ($conn, $sql2);
	if($res2 = true){
		
		$_SESSION['invoice_paid'] = "<div class='alert alert-success'> Paid Successifuly</div>";
                        header ("Location:../invoice.php");
	} 
	}else{
		$_SESSION['invoice_paid_failed'] = "<div class='alert alert-success'> Failed to pay please try again</div>";
                        header ("Location:../invoice.php");
	}

}
