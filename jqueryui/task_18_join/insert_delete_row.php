<?php
include_once 'connection2.php';
//recive Data
if (isset($_POST['receive'])) {
    $index = $_POST['receive'];
    // drop row 
    $sql1 = "DELETE FROM `pivot_pc` WHERE `p_id` = $index ";
    $res1 = mysqli_query($con, $sql1);
    exit('successfully recived inserted and deleted..');
}
//remove Data
if (isset($_POST['remove'])) {
    $product_id = $_POST['remove'];
    $cat_id = $_POST['cat_id'];
    // insert recored
    $sql3 = "INSERT INTO `pivot_pc`  (`id`, `p_id`, `c_id`) VALUES (NULL, '$product_id', $cat_id)";
    $res = mysqli_query($con, $sql3);
    exit('successfully inserted and deleted..');
}
?>