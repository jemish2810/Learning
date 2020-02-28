<?php
include('connection.php');

// if (isset($_POST['insert'])) {
    $cat_id = $_POST['cat_id'];


    if ($_POST['insert'] == 1) {
        $product_id = $_POST['product_id'];

        $sqlInsert = "insert into sub_category(cat_id,product_id) values('$cat_id','$product_id')";
        $connection->query($sqlInsert);

    }
    if ($_POST['delete'] == 1) {
        $sub_id = $_POST['sub_id'];

        $sqlDelete = "delete from sub_category where sub_id=" . $sub_id;
        $connection->query($sqlDelete);

    }

// }

?>