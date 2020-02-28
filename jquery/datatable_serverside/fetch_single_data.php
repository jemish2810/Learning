<?php
include "connection.php";

$userid = $_GET['id'];

$sql = "select * from MyGuests where id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<table class='table-responsive' border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
 $id = $row['id'];
 $fname = $row['firstname'];
 $lname = $row['lastname'];
 $email = $row['email'];
 $date = $row['reg_date'];
 
 $response .= "</tr>";
 $response .= "<tr>";
 $response .= "<td><input type='hidden'  class='form-control' name='id' value=".$id."></td>";
 $response .= "</tr><br/>";

 $response .= "<tr>";
 $response .= "<td class=''>Firstname : </td><td><input type='text' class='form-control 'name='fname' value=".$fname."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Lastname : </td><td><input type='text' class='form-control' name='lname' value=".$lname."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>E-mail : </td><td><input type='text' class='form-control' name='email' value=".$email."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Date : </td><td><input type='text' class='form-control' name='date' value=".$date."></td>";
 $response .= "</tr>";

}
$response .= "</table>";

echo $response;
exit;


