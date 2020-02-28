<?php

include "connection.php";
$state_id= $_REQUEST['state_id'];
  if(!isset($_POST['searchTerm'])){ 
    $sql = "SELECT * FROM `cities` WHERE  `state_id` =$state_id order by name";
    $fetchData = mysqli_query($con, $sql);
  }else{ 
    $search = $_POST['searchTerm'];   
    $sql = "SELECT * FROM `cities` WHERE `name` LIKE '%".$search."%' AND `state_id` =$state_id";
    $fetchData = mysqli_query($con,$sql);
  } 
  
  $data = array();
  while ($row = mysqli_fetch_array($fetchData)) {    
    $data[] = array("id"=>$row['id'], "text"=>$row['name']);
  }
  echo json_encode($data);
