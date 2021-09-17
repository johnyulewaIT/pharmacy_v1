<?php

$q = intval($_GET['q']);
require "includes/conn.php";

mysqli_select_db($conn, "waka_pharmacy");
$sql ="SELECT * FROM store WHERE id = ' " .$q." ' " ;
$result = mysqli_query($conn, $sql);

echo "
    <table>
    <tr>
    <th>Medicine Name </th>
    <th> Price</th>
    </tr>";

  while ($row = msqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" .$row['medicine_name'] . "</td>";
      echo "<td>" .$row['price'] . "</td>";
      echo "</tr>";

    echo "</table>"
mysqli_close($con);