<?php
require_once("connection.php");
$table = 'MyGuests';

$delete = $_GET["delete"];

$id = $_GET["id"];
if($delete == 'yes') {
    $query = "DELETE FROM $table WHERE id=".$id;
    $result = mysqli_query($con,$query);
}

?>