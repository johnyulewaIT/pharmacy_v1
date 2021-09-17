<?php

// Create connection
require "includes/conn.php";
$sql = "SELECT * FROM store WHERE medicine_name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		         
				  <th scope='row' class='text-success'>Results</th>
					<td>
					<p> MID: <b>".$row['id']."</b></p>
					<p> Name:<b>".$row['medicine_name']."</b>
					<small class='text-transform:superscript;'><i>".$row['capacity']."</i> </small>
					</p>
					<p> Expiry Date: <b>".$row['expiry_date']."</b></p>
					</td>
																		
					<td>".$row['type']."</td>
					<td>".$row['price']."</td>
					<td>
                     <a  href='update_price.php?id=".$row['id']."' class='btn btn-success' type='button'>Update Price</a>
                     </td>
		          
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>