<?php
include('connection.php');
$id = $_POST['product_id'];


// FETCH SUBCATEGORY RECORD
$sql = "SELECT cat_name,s.cat_id ,sub_id FROM sub_category s INNER JOIN product p on s.product_id='" . $id . "' and p.product_id='" . $id . "' INNER JOIN category c on c.cat_id=s.cat_id";
$result = $connection->query($sql);

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}


// FETCH CATEGORY RECORD
$sql = "SELECT  * from category where cat_id NOT IN (SELECT  cat_id from sub_category)";
$result = $connection->query($sql);

$rows2 = array();
while ($row = $result->fetch_assoc()) {
    $rows2[] = $row;

}

$a = array('rows' => $rows);
$b = array('rows2' => $rows2);
echo $json_merge = json_encode(array_merge($a, $b));





?>