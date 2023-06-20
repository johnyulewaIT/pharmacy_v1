<?php
session_start();
require "conn.php";
if(isset($_GET['id'])){
	//echo "Was clicked";
    $id = $_GET['id'];
    //echo $id;
    
    $sql = "DELETE FROM store WHERE id= $id";

    $res = mysqli_query ($conn, $sql);
	if($res = true){
		$_SESSION['Dsuccess'] = "<div class='py-4 alert alert-success flex justify-center items-center text-white'>That Was Successifull</div>
			";
         header ("Location:../receiving.php");
	} 
	}else{
		$_SESSION['Dfailed'] = "<div class='alert alert-danger'> Failed to Delete</div>";
                        header ("Location:../receiving.php");

	}


    ?>