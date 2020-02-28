<?php 
    require_once 'connection.php';
    if(isset($_GET['id']))   {   
     $id = trim($_GET['id']);
     $sql = "DELETE FROM insertdemo WHERE autoid= $id";
     $result =mysqli_query($con,$sql);   
     header( "Location: read.php" );
 }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center ">
    <h4>Data Removed successfully..</h4>
    
    </div>
    <a href="read.php" class="btn btn-info">view data</a>
</div>    
</body>
</html>