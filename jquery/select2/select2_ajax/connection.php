<?php
        $servername = "localhost";
        $username ="root";
        $pwd = "123456";
        $db = "ajax_demo1";
        $con = mysqli_connect($servername,$username,$pwd,$db);
       if(!$con){
           echo 'connection error';
       }
       
?>