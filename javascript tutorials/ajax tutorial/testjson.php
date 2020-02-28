
<?php
require_once 'connection.php';
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];


if ($country_id != "") {
    $sql = "select id,name from states where country_id = $country_id";
    $res = mysqli_query($con, $sql);
    $jsondata = array();

    while ($row = mysqli_fetch_assoc($res)) {
        $jsondata[] = $row;
    }

    echo json_encode($jsondata);
}


if ($state_id != "") {

    $sql = "select id,name from cities where state_id = $state_id";

    $res = mysqli_query($con, $sql);
    $jsoncities = array();

    while ($row = mysqli_fetch_assoc($res)) {
        $jsoncities[] = $row;
    }

    echo json_encode($jsoncities);
}
?>