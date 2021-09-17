<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
session_start();
    require "includes/head.php";
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php 
    require "includes/header.php";
?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
                    <?php 
                require "includes/aside.php";
            ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Create Invoice</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Invoice</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!---
                    <div class="col-7">
                        <div class="text-right upgrade-btn">
                            <a href="https://wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div>
                    --->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                
                                
                                    <h4 class="card-title m-t-10">Create Invoice</h4>
                                    
                                </center>
                            </div>
                            <div>
                            <?php 
                                    if (isset($_GET['invoice'])) {
                                        $_SESSION['invoice_no'] =  $_GET['invoice'];
                                        $invoice_no = $_SESSION['invoice_no'];
                                    }
                            ?>
                                <hr>
                            </div>
                            <div class="card-body"> 
                               <form action="" method="post">
                                    
                                    <input type="hidden" class="form-control" value="<?php echo $invoice_no;?>"
                                     name="invoice_number" id="">

                                    <center>Customer Details</center>
                                    <label for="">Customer Name</label>
                                    <input type="text" class="form-control" name="c_name" id="">

                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" id="">

                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control item_price" name="p_no" id="" />
                                    <br>
                                     <hr>

                                        <br>
                                    <button class="btn btn-success btn-block"  name="submit" type="submit">Create</button>
                               </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                   
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                               <h4>Invoice</h4>
                               <!--- Invoice Header--->
                          
                                   
                                    <?php
    
    if (isset($_POST['submit'])) {
        

        $c_name = $_POST['c_name'];
        $address = $_POST['address'];
        $p_no = $_POST['p_no'];



        ?>
    <form action="">
<table class="table table-borderless">
                                <tr>
                                <td class="font-weight-bold"> From:<br>
                                <?php echo $c_name;?><br>
                                <?php echo $address;?><br>
                                <?php echo $p_no;?><br>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="font-weight-bold"> From:<br>
                                Amblex pharmacy<br>
                                P.O Box 007 1011<br></td>
                                </tr>
                                
                                </table>
                               
                                   
                                   <div class="table-respsonsive">
                                   <span id="error"></span>
                                           <table class="table table-borderless" id="item_table">

                                                   <tr class="add">
                                                           <td>Medicine Name</td>
                                                           <td>Quantity</td>
                                                           <td>Price</td>
                                                           <td>Total</td>
                                                           <td><button type="button" name="addd" class="btn btn-success btn-sm addd" > 
                                                                   Add
                                                            </button>
                                                            </td>
                                                   </tr>
                                                           
                                                            
                                           </table>
                                   </div>
                              <!---  The subtotal and total goes here--->

                                   <table class="table table-borderless">

                                           <tbody>

                                                           <tr>
                                                                   <td></td>
                                                                   <td></td>
                                                                   <td></td>
                                                                   <td></td>
                                                                   <!-- Subtotal goes here--->

                                                                          <td> <h5>Sub total</h5>
                                                                           <input type="text id="subtotal" class="form-control" placeholder="subtotal"> <br>
                                                                           </td>
                                                                             <!-- The transport/shipping fee goes here-->   

                                                                           <td>
                                                                           <h5>Tranport/Shipping</h5>
                                                                           <input type="text" class="form-control" placeholder="transport/shipping"><br>
                                                                           </td>

                                                                            <!-- The Total  goes here-->   
                                                                           <td>
                                                                           <h5>Total</h5>
                                                                           <input type="text" class="form-control" placeholder="Total"><br>
                                                                           </td>
                                                           </tr>
                                           
                                           </tbody>
                                   
                                   </table>

                                           <div align="center" class="col-md-12">
                                           <input type="submit" name="submit" class="btn btn-block btn-success" value="Insert" />
                                           </div>

                              </form>
        <?php
       }else {
           echo "Invoice will appear here...";
       }

        ?>
                                       
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/app-style-switcher.js"></script>

    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
	
  
    <script src="jquery-3.5.0.min.js"></script>

    <script>
                $(document).ready(function(){
                        //Append the table while the click button is clicked
                        $(document).on('click', '.addd', function(){
                                var html = '';
                                html += '<tr>';
                                html += ' <td width="200px"><select name="" id="" name="medicine_name" class="form-control medicine_name"><option value="">Medicine Name</option> </select></td> ';
                                html += '<td> <input  type="text" name="quanitity[]" class="form-control quanitity "  /> </td>';
                                html += '<td> <input  type="text" name="price[]" class="form-control price " /> </td>';
                                html += '<td> <input  type="text" name="total[]" class="form-control total "  /> </td>';
                                html += '<td> <button type="button" name="remove" class="btn btn-danger btn-sm remove">Remove</button> </td></tr>';
                                $('#item_table').append(html);

                        });

                        // Remove the table row when the remove button is clicked
                        $(document).on('click', '.remove', function(){
                                        $(this).closest('tr').remove();
                        });

                        // Insert the collected data when the submit button is clicked
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.medicine_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter medicine Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.quanitity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Quanitity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.price').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Price at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.total').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Total at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Invoice Created Succesifully</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
                });
       </script>

</body>

</html>


