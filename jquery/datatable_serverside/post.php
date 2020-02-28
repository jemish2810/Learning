<?php


 require( 'ssp.class.php' );


 $table = 'MyGuests';


// Table's primary key
$primaryKey = 'id';



$columns = array(
    array('db' => 'id','dt' => 0),
    array('db' => 'firstname','dt' => 1),
    array('db' => 'lastname','dt' => 2),
    array('db' => 'email','dt' => 3),   
    array('db' => 'reg_date','dt' => 4),
);  



$sql_details = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '123456',
    'db'   => 'CSV_DB'
);



if ((isset($_REQUEST['where'])) && (isset($_REQUEST['equals']))) {
	// if(!empty($_REQUEST['where']) && (!empty($_REQUEST['equals']))){

  $whereAll = $_REQUEST['where'] . ' LIKE \'%' . $_REQUEST['equals'].'%\'';
	// }
} else {
    $whereAll = NULL;
}
  echo json_encode(SSP::complex ($_POST, $sql_details, $table, $primaryKey, $columns, $whereAll, null)); 

 
// utf8_encode($columns);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */




