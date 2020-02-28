<?php
//getting all data from databse and send it to json 

require('ssp.class.php');
$table = 'MyGuests';
// Table's primary key
$primaryKey = 'id';

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'firstname', 'dt' => 1),
    array('db' => 'lastname', 'dt' => 2),
    array('db' => 'email', 'dt' => 3),
    array('db' => 'reg_date', 'dt' => 4),
);

$sql_details = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '123456',
    'db'   => 'CSV_DB'
);

// if ((isset($_REQUEST['where'])) && (isset($_REQUEST['equals']))) {
//     // $whereAll = $_REQUEST['where'] . ' LIKE \'%' . $_REQUEST['equals'].'%\'';
//     $col = $_REQUEST['where'];
//     $serch = $_REQUEST['equals'];
//     $whereAll = array("col"=>$col,"serch"=>$serch);
  
// }
//  else {
//     $whereAll= NULL;
// }
$where = '';
if (isset($_REQUEST['email'])) {
    $where = " email LIKE '%{$_REQUEST["email"]}%'" ;
}

echo json_encode(
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where, null)

    
);
