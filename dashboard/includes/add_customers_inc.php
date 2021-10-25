<?php

require "conn.php";

if(isset($_POST['submit'])){
	$patient_no = $_POST['patient_no'];
	$patient_name = $_POST['patient_name'];
	$dob = $_POST['dob'];
	$location = $_POST['location'];
	$status = $_POST['status'];

	$query = "INSERT INTO patients SET
	
	patient_no = '$patient_no',
	patient_name = '$patient_name',
	dob = '$dob',
	location = '$location',
	status = '$status'
	";
	
	
}
$res = mysqli_query($conn, $query);

if($res = true){
	header("Location:../index.php");

}

?>
