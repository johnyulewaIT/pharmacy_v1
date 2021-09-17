
<?php

// Create connection
require "includes/conn.php";

?>
  <form method="post" action="manage_receiving.php">
  
<?php

$sql = "SELECT * FROM store WHERE medicine_name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		$id=$row['id'];
											$medicine_name=$row['medicine_name'];
											$type=$row['type'];
											$capacity=$row['capacity'];
											$Qty=$row['Qty'];
											$price=$row['price'];
											$expiry_date=$row['expiry_date'];
											$app=$row['app'];
											$dosage_sold=$row['dosage_sold'];
											$dosage=$row['dosage'];
											
		
		?>
		<tbody id="output">
		
                                        <tr>
                                          
											
										   
										   <td>
											<input  readonly class="form-control"  value="<?php echo "$medicine_name";?>" name="medicine_name">
										   </td>
										   <?php
											  if ( $dosage_sold =="Yes") {

                                            if ($Qty < 2) {
                                                ?>
                                                <td class='text-white text-bold bg-danger'><?php echo $Qty *  $app?></td>
                                              <?php
                                            }else {
                                                ?>
                                                <td class=' text-bold '><?php echo $Qty *  $app?></td>
                                              <?php
                                            }
                                          
                                           }else {
                                               if ($Qty < 2) {
                                                ?>
                                            
                                                <td class='text-white text-bold bg-danger'><?php echo $Qty  ?></td>
                                              <?php
                                               }else {
                                                ?>
                                            
                                                <td class=' text-bold '><?php echo $Qty  ?></td>
                                              <?php
                                               }
                                           }
                                            
                                            ?>
                                            </td>
											<td><?php echo "$expiry_date";;?></td>
											<td>
                      <a  href="manage_receiving.php?id=<?php echo "$id"?> && dosage_sold=<?php echo "$dosage_sold"?>" class="btn btn-success" type="button">Receive</a>
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
