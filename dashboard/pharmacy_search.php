
<?php

// Create connection
require "includes/conn.php";

?>
  <form method="post" action="manage_receiving.php">
  
<?php

$sql = "SELECT * FROM pharmacy_stock WHERE medicine_name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
    $id=$row['id'];
    $medicine_name=$row['medicine_name'];
    $type=$row['type'];
    $capacity=$row['capacity'];
    $pharmacy_Qty=$row['pharmacy_Qty'];
    $price=$row['price'];
    $expiry_date=$row['expiry_date'];
    $expiry_date=$row['expiry_date'];
    $dosage_sold=$row['dosage_sold'];
    $dosage=$row['dosage'];
    $price_dosage=$row['price_dosage'];
    $dosage_sold=$row['dosage_sold'];
    $app=$row['app'];
                      
											
		
		?>
		<tbody id="output">
                                        <tr>
                                            <th scope="row"><?php echo $sn++; ?></th>
                                            <td><?php echo $medicine_name; ?></td>
                                            <?php 
                                            if ( $dosage_sold =="Yes") {

                                            if ($pharmacy_Qty < 2) {
                                                ?>
                                                <td class='text-white text-bold bg-danger'><?php echo $pharmacy_Qty ?></td>
                                              <?php
                                            }else {
                                                ?>
                                                <td class=' text-bold '><?php echo $pharmacy_Qty ?></td>
                                              <?php
                                            }
                                          
                                           }else {
                                               if ($pharmacy_Qty < 2) {
                                                ?>
                                            
                                                <td class='text-white text-bold bg-danger'><?php echo $pharmacy_Qty  ?></td>
                                              <?php
                                               }else {
                                                ?>
                                            
                                                <td class=' text-bold '><?php echo $pharmacy_Qty  ?></td>
                                              <?php
                                               }
                                           
                                           }
                                            
                                            ?>
                                            </td>
                                            <?php 
                                           if ($dosage_sold == "Yes") {
                                              
                                          ?>
                                                    <td class=' text-bold '><?php echo $price_dosage?> </td>
                                          <?php
                                           }else {
                                            ?>
                                               <td><?php echo $price; ?></td>
                                            <?php
                                           }
                                            
                                            ?>

                                            <?php 
                                           if ($dosage_sold == "Yes") {
                                              
                                          ?>
                                                    <td class=' text-bold '><?php echo $price_dosage * $pharmacy_Qty ?> </td>
                                          <?php
                                           }else {
                                            ?>
                                             <td><?php echo $price * $pharmacy_Qty; ?></td>
                                            <?php
                                           }
                                            
                                            ?>

                                          
                                            <td><?php echo $expiry_date; ?></td>                                    
                                            <td>
                                            <a  href="update_pharmacy.php?id=<?php echo "$id"?>" class="btn btn-success" type="button">Update Stock</a>
                                             </td>
                                        </tr>                     
                                    </tbody>
		
		<?php
	}
}

else{
	echo "<tr><td>0 result's found</td></tr>";
}
?>
	</form>
<?php
?>
