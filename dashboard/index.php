<?php
require('includes/conn.php');
    $sql="select * from info";

    $res=mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);
        if($count> 0){
            $row=mysqli_fetch_assoc($res);
            header('location:dashboad.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHARMACY</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
    <div class="wrapper">
        <section class="form sign up">
            <center><header> Pharmacy Set Up</header></center>
            <form action="index_2.php" class="header"  method="post">
                
                   
                        <div class="field input">
                            <label for="">Pharmacy Name</label>
                            <input type="text" name="name" placeholder="Input pharmacy name" required>
                        </div>
                        <div class="field input">
                            <label for="">Address</label>
                            <input type="text" name="address" placeholder="Input the address" required>
                       </div>
                        <div class="field input">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_no" placeholder="Input phone number" required>
                       </div>
                        <div class="field input">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Input the pharmacy's email" required>
                       </div>
                       
                        <div class="field button"> 
                            
                            <input type="submit" name="submit" value="Continue">
                        </div>
                      
                            </form>
            
        </section>
    </div>
</body>
</html>