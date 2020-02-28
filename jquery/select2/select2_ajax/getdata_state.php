<?php

include "connection.php";
$country_id= $_REQUEST['country_id'];
if(!isset($_POST['searchTerm'])){ 
    $sql = "SELECT * FROM `states` WHERE  `country_id` =$country_id order by name ";
    $fetchData = mysqli_query($con, $sql);
  }else{ 
    $search = $_POST['searchTerm'];   
    $sql = "SELECT * FROM `states` WHERE `name` LIKE '%".$search."%' AND `country_id` =$country_id";
    $fetchData = mysqli_query($con,$sql);
  } 
  
  $data = array();
  while ($row = mysqli_fetch_array($fetchData)) {    
    $data[] = array("id"=>$row['id'], "text"=>$row['name']);
  }
  echo json_encode($data);
