<?php

session_start();

require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
	
	$supplier_name = $_POST['supplier_name'];
	
	
	
	$sql = "INSERT INTO suppliers SET
	supplier_name = '$supplier_name'
	
	
	
	";
	
	
	$res = mysqli_query ($conn, $sql);
	if($res = true){
		
		$_SESSION['success'] = "<div class='alert alert-success'> Added Successifuly</div>";
                        header ("Location:../suppliers.php");
	} 
	}else{
		$_SESSION['failed'] = "<div class='alert alert-success'> Failed to Add</div>";
                        header ("Location:../suppliers.php");
	}
	

