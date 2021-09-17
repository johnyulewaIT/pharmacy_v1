
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

    <?php 
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone_no = $_POST['phone_no'];
            $email = $_POST['email'];

        }
    
    ?>
    <div class="wrapper">
        <section class="form sign up">
            <center><header> Pharmacy Accounts Information </header></center>
            <form  action="includes/insert_pharmacy_info.php" class="header form-inline"  method="post" >
                
                   <!--- Information from the previouse page --->
                        <div class="field input">
                            <input type="hidden" name="name" value="<?php echo $name;?>"  placeholder="Provide your Username">
                            <input type="hidden" name="address" value="<?php echo $address;?>"  placeholder="Provide your Username">
                            <input type="hidden" name="phone_no" value="<?php echo $phone_no;?>"  placeholder="Provide your Username">
                            <input type="hidden" name="email" value="<?php echo $email;?>"  placeholder="Provide your Username">
                        </div>

                        <div class="field input">
                            <label for="">Pharmacy Opening Date</label>
                            <input type="date" name="opening_date" placeholder="Input Pharmacy Opening Date" required>
                        </div>
                        <div class="field input">
                            <label for="">Pharmacy Closing Date</label>
                            <input type="date" name="closing_balance" placeholder=" Input Pharmacy Closing Date" required>
                       </div>
                        <div class="field input">
                            <label for="">Opening balance</label>
                            <input type="number" name="opening_balance" placeholder="Input Opening balance" required>
                       </div>
                        
                       
                        <div class="field button col-md-4"> 
                                <div class="row ">

                                    <div class="col-md-2" align="left">
                                    <input type="submit" name="submit" value="Continue">
                                    </div>
                                    
                                 </div>
                        </div>
                      
                            </form>
            
        </section>
    </div>
</body>
</html>