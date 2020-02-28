<?php
require_once'connection.php';
 $id=  $_GET['id'];
 $fname =  $_GET['fname'];
  $lname = $_GET['lname'];
 $email = $_GET['email'];
 $date = $_GET['date'];
$edit = $_GET['edit'];
 if($edit == 'yes'){
    $query = "UPDATE `MyGuests` SET  `firstname` = '$fname', `lastname` = '$lname', `email` = '$email' WHERE `MyGuests`.`id` = $id";
    echo $query;
    $result = mysqli_query($con,$query);
 }
