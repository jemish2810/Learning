<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','123456');
define('DB_NAME','ajax_demo1');

$connection=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>