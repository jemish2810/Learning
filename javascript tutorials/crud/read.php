<?php
require_once 'connection.php';

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <title>Document</title>
</head>
<?php

$sql = "SELECT * FROM `insertdemo`";
$result = mysqli_query($con, $sql);


?>

<body>

    <form method="post" >
        <div class="container ">
        
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['autoid']; ?></td>
                            <td><?= $row['member']; ?></td>
                            <td><?= $row['percentage']; ?></td>
                            <td><a href="update.php?id=<?php echo $row['autoid']?>" class= "btn btn-info btn-sm">update</a>
                            <a href="delete.php?id=<?php echo $row['autoid']?>" class="btn btn-danger btn-sm" name ='delete'>Delete</a></td>
                            
                        </tr>
                <?php 
                } ?>
                </tbody>
            </table>
            <a href="insert.php" class="btn btn-info" >insert Data</a>
        </div>
    </form>
</body>

</html>