<?php

include "connection.php";
if(!isset($_POST['searchTerm'])){ 
    $fetchData = mysqli_query($con,"select * from countries order by name ");
  }else{ 
    $search = $_POST['searchTerm'];   
    $fetchData = mysqli_query($con,"select * from countries where name like '%".$search."%' limit 5");
  } 
  
  $data = array();
  while ($row = mysqli_fetch_array($fetchData)) {    
    $data[] = array("id"=>$row['id'], "text"=>$row['name']);
  }
  echo json_encode($data);
