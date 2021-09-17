<?php

require "conn.php";

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    

	$opening_date = $_POST['opening_date'];
	$closing_balance = $_POST['closing_balance'];
	$opening_balance = $_POST['opening_balance'];



	$query = "INSERT INTO info SET
	
	name = '$name',
	address = '$address',
	phone_no = '$phone_no',
	email = '$email',
	opening_date = '$opening_date',
	closing_balance = '$closing_balance',
	opening_balance = '$opening_balance'
	";

}
$res = mysqli_query($conn, $query);

if($res = true){
	header("Location:../dashboad.php");

}

?>