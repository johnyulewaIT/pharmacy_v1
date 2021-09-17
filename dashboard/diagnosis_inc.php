<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "waka_pharmacy");
if(isset($_POST["patient_no"]))
{
 $patient_no = $_POST["patient_no"];
 $diagnosis_name = $_POST["diagnosis_name"];
 $description = $_POST["description"];
 
 $query = '';
 for($count = 0; $count<count($patient_no); $count++)
 {
  $patient_no_clean = mysqli_real_escape_string($connect, $patient_no[$count]);
  $diagnosis_name_clean = mysqli_real_escape_string($connect, $diagnosis_name[$count]);
  $description_clean = mysqli_real_escape_string($connect, $description[$count]);
  
  if($patient_no_clean != '' && $diagnosis_name_clean != '' && $description_clean != '' )
  {
   $query .= '
   INSERT INTO diagnosis(patient_no, diagnosis_name, description) 
   VALUES("'.$patient_no_clean.'", "'.$diagnosis_name_clean.'", "'.$description_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Diagnosis Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>