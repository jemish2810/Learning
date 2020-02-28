<?php
        $servername = "localhost";
        $username ="root";
        $pwd = "123456";
        $db = "product";
        $con = mysqli_connect($servername,$username,$pwd,$db);
       
?>SELECT pp.p_name FROM category c INNER JOIN pivot_pc p ON c.c_id=1 AND p.c_id=1 INNER JOIN product pp ON p.p_id=pp.p_id
SELECT * FROM product WHERE p_id NOT IN (SELECT p_id FROM pivot_pc)