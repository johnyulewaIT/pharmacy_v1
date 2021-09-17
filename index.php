<?php
require('dashboard/includes/conn.php');
$error='';
session_start();
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

    //echo "$username";
    //echo "$password";
 
	$sql="select * from users where username='$username' and password='$password'";
	$res=mysqli_query($conn,$sql);
	$count= mysqli_num_rows($res);
	if($count> 0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['IS_LOGIN']='yes';
		if($row['role']== 'Nurse'){
            $_SESSION['sessionId'] = $row ['id'];
              $_SESSION ['sessionUsername'] = $row['username'];
			header('location:dashboard/nurse/index.php');
			die();
		}if($row['role']== 'Pharmacisit'){
            $_SESSION['sessionId'] = $row ['id'];
            $_SESSION ['sessionUsername'] = $row['username'];
			header('location:dashboard/index.php');
			die();
		}if ($row['role' ]== 'Registrar') {
            $_SESSION['sessionId'] = $row ['id'];
            $_SESSION ['sessionUsername'] = $row['username'];
			header('location:dashboard/registration/index.php');
			die();
        }if($row['role' ]== 'lab'){
            $_SESSION['sessionId'] = $row ['id'];
            $_SESSION ['sessionUsername'] = $row['username'];
			header('location:dashboard/lab/index.php');
			die();
        }
	}else{
		$error="<div class='alert alert-danger'> 
        Please enter valid details</div>";
	}
   
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHARMACY</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
    <div class="wrapper">
        <section class="form sign up">
            <center><header> Login</header></center>
            <form class="header"  method="post">
                
                   
                        <div class="field input">
                            <label for="">Username</label>
                            <input type="text" name="username" placeholder="Provide your Username">
                        </div>
                        <div class="field input">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Password">
                       </div>
                       
                        <div class="field button"> 
                            
                            <input type="submit" name="submit" value="LOGIN">
                        </div>
                        <?php echo $error?>
                            </form>
            
        </section>
    </div>
</body>
</html>