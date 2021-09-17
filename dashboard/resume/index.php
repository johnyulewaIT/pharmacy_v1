<?php


 require '../../../includes/conn.php';
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EAJIRA :: Home</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/live-resume.css">
</head>

<body>
    <header>
       <a href="../index.php" class="btn btn-primary">Back</a>
    </header>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    

$sql ="SELECT *  FROM job_seeker  WHERE  id= '$id'";
//create a query that fetch data from the database
$res = mysqli_query($conn,$sql);

//check if there are any records in the database
if ($res == TRUE) {
    $count = mysqli_num_rows($res);
   
    if($count > 0){
        while ($rows=mysqli_fetch_assoc($res)) {
            $id=$rows['id'];
            $username = $rows['username'];
            $email = $rows['email'];
            $pnumber = $rows['pnumber'];
            $profession = $rows['profession'];
            $objective = $rows['objective'];
            $dob = $rows['dob'];
            $home_location = $rows['home_location'];
            $image_name = $rows['image_name'];
            $yos = $rows['yos'];
            $level_education = $rows['level_education'];
            $course = $rows['course'];
            $Edescription = $rows['Edescription'];
            $year_work = $rows['year_work'];
            $place_work = $rows['place_work'];
            $description = $rows['description'];
            ?>
            
            <?php
        }

    }
}
    }
             ?>

    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
            <?php
                                                if ($image_name!="") {
                                                    //display the image
                                                    ?>
                                                    
                                                    <img  src="../../../job_seeker/dashboard/resume/assets/images/<?php  echo $image_name; ?> " alt="Profile">
                                                    <?php
                                                }else {
                                                    //show error
                                                    echo "<div class='alert alert-danger'>No Profile</div>";
                                                }
                                                
                                                ?>
            </div>
            <h1 class="profile-name"><?php  echo "$username";?></h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation"><?php  echo "$profession";?></span>
            </div>
           
            <div class="widget">
                <h5 class="widget-title"><b>Personal information</b></h5>
                <div class="widget-content">
                    <p>BIRTHDAY : <?php  echo "$dob";?></p>
                    <p>PHONE : <?php  echo "$pnumber";?></p>
                    <p>MAIL : <?php  echo "$email";?></p>
                    <p>Location <?php  echo "$home_location";?></p>
                    <button class="btn btn-download-cv btn-primary rounded-pill">UPLOAD CV </button>
                </div>
            </div>
            <!---
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">LANGUAGES</h5>
                        <p>English : native</p>
                        <p>Spanish : fluent</p>
                       
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">INTERESTS</h5>
                        <p>Video games</p>
                        <p>Finance</p>
                        <p>Basketball</p>
                        <p>Theatre</p>
                    </div>
                </div>
            </div>
        -->
        </aside>
        <main>
            <section class="intro-section">
                <h2 class="section-title">Objective</h2>
                <p><?php  echo "$objective";?></p>
                <a href="#!" class="btn btn-primary btn-hire-me">HIRE ME</a>
            </section>
            <section class="resume-section">
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="section-subtitle">RESUME</h6>
                        <h2 class="section-title">EDUCATION</h2>
                        <ul class="time-line">
                            <li class="time-line-item">
                                <span class="badge badge-primary"><?php  echo "$yos";?></span>
                                <h6 class="time-line-item-title"><?php  echo "$course";?></h6>
                                <p class="time-line-item-subtitle"><?php  echo "$level_education";?></p>
                                <p class="time-line-item-content"><?php  echo "$Edescription";?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="section-subtitle">RESUME</h6>
                        <h2 class="section-title">Experience</h2>
                        <ul class="time-line">
                            <li class="time-line-item">
                                <span class="badge badge-primary"><?php  echo "$year_work";?></span>
                                <h6 class="time-line-item-title"><?php  echo "$profession";?></h6>
                                <p class="time-line-item-subtitle"><?php  echo "$place_work";?></p>
                                <p class="time-line-item-content"><?php  echo "$description";?></p>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </section>
   
        </main>
    </div>
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/@popperjs/core/dist/umd/popper-base.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/live-resume.js"></script>
</body>

</html>