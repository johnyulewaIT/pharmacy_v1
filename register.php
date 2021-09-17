<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAKA PHARMACY :: REGISTER </title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
    <div class="wrapper">
        <section class="form sign up">
            <header>Registration form</header>
            <form class="header" action="register_inc.php" method="post">
                
                    <div class="name-details">
                        
                        
                        </div>
                        <div class="field input">
                            <label for="">Username</label>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="field input">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="field input">
                            <label for="">confirm Password</label>
                            <input type="text" name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                          
                        <div class="field button">
                            
                            <input type="submit" name="submit" value="REGISTER">
                        </div>
            </form>
            
        </section>
    </div>
</body>
</html>