<?php 
    require_once 'connection.php';
    echo 'sdf';
    // echo '<pre>';
    // print_r($members);
    // print_r($percentage);
    if(isset($_POST['submit'])){
        echo 'sdf';
        $members = $_POST['members'];
        $percentage = $_POST['percentage'];
        $sql = 'INSERT INTO `insertdemo` (`member`, `percentage`) VALUES ($members, $percentage)';
        // $result = mysqli_query($con, $sql);
        if(mysqli_query($con,$sql)){
            echo 'inserted';
        }
        else{
            echo 'no';
        }
    }
    
    

?>