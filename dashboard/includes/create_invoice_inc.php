<?php
    require "conn.php";
if (isset($_POST['submit'])) {
    $invoice_number = $_POST['invoice_number'];
    $item_name = $_POST['item_name'];
    $item_qty = $_POST['item_qty'];
    $item_price = $_POST['item_price'];
    $total = $_POST['total'];

    //echo $invoice_number;
    //echo "<br>";
    //echo $item_name;
   // echo "<br>";
   // echo $item_qty;
   // echo "<br>";
  //  echo $item_price;
   // echo "<br>";
   // echo $total;
   // echo "<br>";

 
   $sql = "INSERT INTO invoices SET
   
   invoice_number = '$invoice_number',
   item_name = '$item_name',
   item_qty = '$item_qty',
   item_price = '$item_price',
   total = '$total'
   
   ";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['success'] = "<div class='alert alert-success'> Invoice Created Successfuly</div>";
        header ("Location:../create_invoice.php");
    }

}