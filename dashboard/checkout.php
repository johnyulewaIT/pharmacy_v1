
	<html>
    <?php 
    require "includes/head.php";
    
    ?>
        <style>


{
        background:#f2f2f2;
    }

    .payment
	{
		border:1px solid #f2f2f2;
		height:280px;
        border-radius:20px;
        background:#fff;
	}
   .payment_header
   {
	   background-color:red;
	   padding:20px;
       border-radius:20px 20px 0px 0px;
	   
   }
   
   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }
   
   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content 
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:rgba(255,102,0,1);
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }
   
        </style>
        	<body>
	<div class="container">
	   <div class="row">
		  <div class="col-md-6 mx-auto mt-5">
			 <div class="payment">
				<div class="payment_header bg-danger">
				   <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
				</div>
				<div class="content">
				   <h1>Failed !</h1>
                   <?php 
                   session_start();
                        if (isset($_SESSION['out-stock'])) {
                            echo $_SESSION['out-stock'];
                            unset ($_SESSION['out-stock']);
                        }
               ?>
				   <?php 
                        if (isset($_SESSION['patient_no'])) {
                          $id = $_SESSION['patient_no'];
                          $invoice = $_SESSION['invoice'];
                          
                        }
               ?>
				   <a href="prescription.php?invoice=<?php echo $invoice;?> && patient_id=<?php echo $id;?>">Go Back </a>
				</div>
				
			 </div>
		  </div>
	   </div>
	</div>
	</body>
	</html>


